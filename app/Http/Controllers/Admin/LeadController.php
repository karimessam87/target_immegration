<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classess\Mediaable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Marketing\Lead\StoreRequest;
use App\Http\Requests\Marketing\Lead\UpdateRequest;
use App\Models\Department;
use App\Models\Flag;
use App\Models\Label;
use App\Models\Lead;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeadController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $title = 'Campaign Leads';
    $leads = Lead::latest()->get();
    $leads->load('flag', 'label', 'department', 'project');
    return response()
      ->view('backend.leads', [
        'title' => $title,
        'leads' => $leads,
        'projects' => Project::get(),
        'labels' => Label::get(),
        'flags' => Flag::get(),
        'departments' => Department::get()
      ]);
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(StoreRequest $request)
  {
    $attributes = $request->validated();

    if ($request->hasFile('attachment')) {
      $attributes['attachment'] = (new Mediaable($request))
        ->moveToDir('marketing/leads/' . date("Y-m-d")) // Directory
        ->getMediaFromRequestByName('attachment') // InputName
        ->getMediaNameAfterUpload(); // To Upload
    }
    Lead::create($attributes);
    return back()->with('success', 'Leads has been added successfully!!!');
  }

  /**
   * Display the specified resource.
   *
   * @param string $project_name
   * @return \Illuminate\Http\Response
   */
  public function show(Lead $lead)
  {
    $title = 'Show Lead';
    return response(404);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRequest $request, Lead $lead)
  {

    $attributes = $request->validated();
    if ($request->hasFile('attachment')) {
      $attachment = $lead->attachment() ? Storage::disk('public')->delete($lead->attachment()) : '';
      $attributes['attachment'] = (new Mediaable($request))
        ->moveToDir('marketing/leads/' . date("Y-m-d")) // Directory
        ->getMediaFromRequestByName('attachment') // InputName
        ->getMediaNameAfterUpload(); // To Upload
    }
    $lead->update($attributes);
    return back()->with('success', 'Lead has been updated successfully!!!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function status(Lead $lead)
  {
    $lead->update([
      'status' => !$lead->status
    ]);
    return redirect()->back()->with('success', $lead->status ? 'Marked As Read ' : 'Marked As Unread ');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function destroy(Lead $lead)
  {
    $lead->delete();
    return back()->with('success', 'Lead has been Deleted successfully!!!');
  }
}
