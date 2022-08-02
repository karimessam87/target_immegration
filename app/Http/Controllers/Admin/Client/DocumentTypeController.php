<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Document\Type\StoreRequest;
use App\Http\Requests\Client\Document\Type\UpdateRequest;
use App\Models\DocumentType;
use App\Models\Label;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
  public function index()
  {
    $types = DocumentType::all();
    return response()
      ->view('backend.document-types',
        [
          'types' => $types,
          'labels' => Label::all(),
          'title' => "Documents Types",
        ]);
  }

  public function create()
  {

  }

  public function store(StoreRequest $request)
  {
    $attributes = $request->validated();
    DocumentType::create($attributes);
    return redirect()->back()->with('success', 'Successfully Created');

  }

  public function show()
  {

  }

  public function edit()
  {

  }

  public function update(UpdateRequest $request, DocumentType $type)
  {
    $attributes = $request->validated();
    $type->update($attributes);
    return redirect()->back()->with('success', 'Successfully Updated');
  }

  public function destroy(DocumentType $type)
  {
    $type->delete();
    return back()->with('success', "DocumentType Type has been deleted successfully!!");
  }
}
