<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classess\Mediaable;
use App\Http\Requests\Client\Detail\UpdateRequest;
use App\Http\Requests\Client\Education\UpdateRequest as EducationsUpdateRequest;
use App\Http\Requests\Client\Document\UpdateRequest as DocumentUpdateRequest;
use App\Http\Requests\Client\Language\UpdateRequest as LanguageUpdateRequest;
use App\Http\Requests\Client\FinancialReport\UpdateRequest as UpdateFinancialRequest;
use App\Http\Requests\Client\WorkHistory\UpdateRequest as UpdateWorkRequest;
use App\Http\Requests\Client\CanadianConnection\UpdateRequest as UpdateCanadianRequest;
use App\Models\CanadianConnection;
use App\Models\Client;
use App\Models\ClientDocument;
use App\Models\ClientEducation;
use App\Models\ClientType;
use App\Models\ClientWorkHistory;
use App\Models\DocumentType;
use App\Models\FinancialReport;
use App\Models\Flag;
use App\Models\Label;
use App\Settings\ThemeSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Countries\Package\Countries;

class ClientController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $title = "clients";
    $clients = Client::get();
    $client_types = ClientType::whereStatus(true)->get();
    $labels = Label::all();
    $flags = Flag::all();


    return view('backend.clients', compact('title', 'clients', 'client_types', 'labels', 'flags'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function lists()
  {
    $title = "clients";
    $clients = Client::get();
    $client_types = ClientType::whereStatus(true)->get();
    $labels = Label::all();
    $flags = Flag::all();
    return view('backend.clients-list', compact('title', 'clients', 'client_types', 'labels', 'flags'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'firstname' => 'required',
      'middlename' => 'required',
      'lastname' => 'required',
      'city' => 'required',
      'governorates' => 'required',
      'marital' => 'required|integer', 'in:' . implode(',', array_keys(marital())),
      'gender' => 'required', 'in:' . implode(',', array_keys(genders())),
      'email' => 'required|email',
      'phone' => 'nullable|max:20',
      'client_type_id' => 'required',
      'flag_id' => 'sometimes|integer',
      'label_id' => 'sometimes|integer',
      'avatar' => 'file|image|mimes:jpg,jpeg,png,gif',
    ]);
    $region = "$request->governorates - $request->city";
    $imageName = null;
    if ($request->avatar != null) {
      $imageName = time() . '.' . $request->avatar->extension();
      $request->avatar->move(public_path('storage/clients'), $imageName);
    }
    Client::create([
      'firstname' => $request->firstname,
      'middlename' => $request->middlename,
      'lastname' => $request->lastname,
      'password' => $request->password,
      'gender' => $request->gender,
      'marital' => $request->marital,
      'region' => $region,
      'email' => $request->email,
      'phone' => $request->phone,
      'client_type_id' => $request->client_type_id,
      'flag_id' => $request->flag_id,
      'label_id' => $request->label_id,
      'company' => $request->company,
      'avatar' => $imageName,
    ]);
    return back()->with('success', 'Client has been added successfully!!!');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show(Client $client)
  {

    $get_countries = new Countries();
    $countries = $get_countries->all();
    $canada_province = $countries->whereNameCommon('Canada')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
    $client->load('parent', 'spouse', 'childern', 'documents.label', 'documents.flag', 'file', 'certificates', 'languages.flag', 'clientType', 'flag', 'label', 'financialReports', 'canadianConnections', 'workHistories');
    return response()
      ->view('backend.client-show',
        [
          'client' => $client,
          'canada_province' => $canada_province,
          'labels' => Label::latest()->get(),
          'flags' => Flag::all(),
          'client_types' => ClientType::all(),
          'document_types' => DocumentType::all(),
          'documents_helpers' => $client->documents,
          'file' => $client->file,
          'clients' => Client::all(),
          'title' => $client->firstname,
          'next_month' => Carbon::today()->addMonth()->format('Y-m-d'),
          'countries' => $countries
        ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    $data = $request->validate([
      'firstname' => 'sometimes',
      'middlename' => 'sometimes',
      'lastname' => 'sometimes',
      'city' => 'sometimes',
      'governorates' => 'sometimes',
      'marital' => 'sometimes|integer', 'in:' . implode(',', array_keys(marital())),
      'gender' => 'sometimes', 'in:' . implode(',', array_keys(genders())),
      'email' => 'sometimes|email',
      'phone' => 'required|max:20',
      'company' => ['sometimes'],
      'client_type_id' => 'required',
      'flag_id' => 'sometimes',
      'parent_id' => 'sometimes',
      'spouse_id' => 'sometimes',
      'label_id' => 'sometimes|integer',
      'avatar' => 'sometimes|file|image|mimes:jpg,jpeg,png,gif',
    ]);


    $data['region'] = "$request->governorates - $request->city";
    if ($request->hasFile('avatar')) {
      $data['avatar'] = time() . '.' . $request->avatar->extension();
      $request->avatar->move(public_path('storage/clients'), $data['avatar']);
    }
    $client = Client::find($request->id);
    $client->update($data);
    return back()->with('success', 'Client has been updated successfully!!!');
  }

  /**
   * @param UpdateRequest $request
   * @param Client $client
   * @return \Illuminate\Http\RedirectResponse
   */
  public function detailsUpdate(UpdateRequest $request, Client $client)
  {
    $attributes = $request->validated();
    $client->detail()->updateOrCreate(['client_id' => $client->id], $attributes);
    return back()->with('success', 'Client has been updated successfully!!!');

  }

  /**
   * @param DocumentUpdateRequest $request
   * @param Client $client
   * @return \Illuminate\Http\RedirectResponse
   */
  public function documentUpdate(DocumentUpdateRequest $request, Client $client)
  {
    $attributes = $request->validated();

    if ($request->hasFile('file')) {
      $attributes['file'] = (new Mediaable($request))
        ->moveToDir('clients/documents/' . date("Y-m-d") . '/' . $client->firstname) // Directory
        ->getMediaFromRequestByName('file') // InputName
        ->getMediaNameAfterUpload(); // To Upload
    }
    $client->documents()->create($attributes);
    return back()->with('success', 'Document has been added successfully!!!');
  }

  /**
   * @param ClientDocument $document
   * @return \Illuminate\Http\RedirectResponse
   */
  public function documentDestroy(ClientDocument $document)
  {

    $document->delete();
    return back()->with('success', 'Document has been added Deleted!!!');
  }

  /**
   * @param DocumentUpdateRequest $request
   * @param Client $client
   * @return \Illuminate\Http\RedirectResponse
   */
  public function educationUpdate(EducationsUpdateRequest $request, Client $client)
  {
    $attributes = $request->validated();

    if ($request->hasFile('certificate') || $request->hasFile('credential_report')) {
      $attributes['certificate'] = (new Mediaable($request))
        ->moveToDir('clients/documents/' . date("Y-m-d") . '/' . $client->firstname . '/education') // Directory
        ->getMediaFromRequestByName('certificate') // InputName
        ->getMediaNameAfterUpload(); // To Upload
      $attributes['credential_report'] = (new Mediaable($request))
        ->moveToDir('clients/documents/' . date("Y-m-d") . '/' . $client->firstname . '/education') // Directory
        ->getMediaFromRequestByName('credential_report') // InputName
        ->getMediaNameAfterUpload(); // To Upload
    }
    $client->certificates()->create($attributes);
    return back()->with('success', 'Document has been added successfully!!!');
  }

  /**
   * @param ClientDocument $document
   * @return \Illuminate\Http\RedirectResponse
   */
  public function educationDestroy(ClientEducation $client_education)
  {

    $client_education->delete();
    return back()->with('success', 'Document has been added Deleted!!!');
  }

  /**
   * @param DocumentUpdateRequest $request
   * @param Client $client
   * @return \Illuminate\Http\RedirectResponse
   */
  public function languageUpdate(LanguageUpdateRequest $request, Client $client)
  {
    $attributes = $request->validated();
    $client->languages()->create($attributes);
    return back()->with('success', 'Language has been added successfully!!!');
  }

  /**
   * @param ClientDocument $document
   * @return \Illuminate\Http\RedirectResponse
   */
  public function languageDestroy(ClientEducation $language)
  {

    $language->delete();
    return back()->with('success', 'Language has been added Deleted!!!');
  }

  /**
   * @param ClientDocument $document
   * @return \Illuminate\Http\RedirectResponse
   */
  public function spouseDestroy(Client $client)
  {

    $client->update(['spouse_id' => null]);
    return back()->with('success', 'Spouse has been added Deleted!!!');
  }

  /**
   * @param ClientDocument $document
   * @return \Illuminate\Http\RedirectResponse
   */
  public function parentDestroy(Client $client)
  {

    $client->update(['parent_id' => null]);
    return back()->with('success', 'Parent has been added Deleted!!!');
  }

  /**
   * @param ClientDocument $document
   * @return \Illuminate\Http\RedirectResponse
   */
  public function childDestroy(Client $child)
  {

    $child->update(['parent_id' => null]);
    return back()->with('success', 'Child has been added Deleted!!!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Client $client)
  {

    $client->delete();
    return back()->with('success', "Client has been deleted successfully!!");
  }

  /**
   * @param DocumentUpdateRequest $request
   * @param Client $client
   * @return \Illuminate\Http\RedirectResponse
   */
  public function financialUpdate(UpdateFinancialRequest $request, Client $client)
  {
    $attributes = $request->validated();
    $client->financialReports()->create($attributes);
    return back()->with('success', 'Canadian Connection has been added successfully!!!');
  }

  /**
   * @param ClientDocument $document
   * @return \Illuminate\Http\RedirectResponse
   */
  public function financialDestroy(FinancialReport $financial_report)
  {

    $financial_report->delete();
    return back()->with('success', 'Document has been added Deleted!!!');
  }

  /**
   * @param DocumentUpdateRequest $request
   * @param Client $client
   * @return \Illuminate\Http\RedirectResponse
   */
  public function canadianUpdate(UpdateCanadianRequest $request, Client $client)
  {
    $attributes = $request->validated();
    if ($request->hasFile('document')) {

      $attributes['document'] = (new Mediaable($request))
        ->moveToDir('clients/documents/canadian_connections' . date("Y-m-d") . '/' . $client->firstname) // Directory
        ->getMediaFromRequestByName('document') // InputName
        ->getMediaNameAfterUpload(); // To Upload
    }
    $client->canadianConnections()->create($attributes);
    return back()->with('success', 'Canadian Connection has been added successfully!!!');
  }

  /**
   * @param ClientDocument $document
   * @return \Illuminate\Http\RedirectResponse
   */
  public function canadianDestroy(CanadianConnection $canadian_connection)
  {

    $canadian_connection->delete();
    return back()->with('success', 'Connection has been added Deleted!!!');
  }

  /**
   * @param DocumentUpdateRequest $request
   * @param Client $client
   * @return \Illuminate\Http\RedirectResponse
   */
  public function workUpdate(UpdateWorkRequest $request, Client $client)
  {
    $attributes = $request->validated();

    if ($request->hasFile('resume') || $request->hasFile('hr_letters')) {
      $attributes['resume'] = (new Mediaable($request))
        ->moveToDir('clients/documents/' . date("Y-m-d") . '/' . $client->firstname . '/work/resume') // Directory
        ->getMediaFromRequestByName('resume') // InputName
        ->getMediaNameAfterUpload(); // To Upload
      $attributes['hr_letters'] = (new Mediaable($request))
        ->moveToDir('clients/documents/' . date("Y-m-d") . '/' . $client->firstname . '/work/hr_letters') // Directory
        ->getMediaFromRequestByName('hr_letters') // InputName
        ->getMediaNameAfterUpload(); // To Upload
    }
    $client->workHistories()->create($attributes);
    return back()->with('success', 'Document has been added successfully!!!');
  }

  /**
   * @param ClientDocument $document
   * @return \Illuminate\Http\RedirectResponse
   */
  public function workDestroy(ClientWorkHistory $work_history)
  {

    $work_history->delete();
    return back()->with('success', 'Work has been added Deleted!!!');
  }
}
