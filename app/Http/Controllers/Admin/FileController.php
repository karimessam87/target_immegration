<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\StoreRequest;
use App\Http\Requests\File\UpdateRequest;
use App\Models\Client;
use App\Models\File;
use App\Models\FileLabel;
use App\Models\FileStatue;
use App\Models\FileType;
use App\Models\Flag;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        $labels = FileLabel::all();
        $status = FileStatue::all();
        $types = FileType::all();
        $clients = Client::all();
        return response()
            ->view('backend.files',
                [
                    'files' => $files,
                    'labels' => $labels,
                    'status' => $status,
                    'types' => $types,
                    'clients' => $clients,
                    'title' => "All files",
                ]);
    }

    public function create()
    {

    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
        File::create($attributes);
        return redirect()->back()->with('success', 'Successfully Created');

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(UpdateRequest $request, File $file)
    {
        $attributes = $request->validated();
        $file->update($attributes);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy(File $file)
    {
        $file->delete();
        return back()->with('success', "File Type has been deleted successfully!!");
    }
}
