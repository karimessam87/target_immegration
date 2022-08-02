<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\Label\StoreRequest;
use App\Http\Requests\File\Label\UpdateRequest;
use App\Models\FileLabel;
use Illuminate\Http\Request;

class FileLabelController extends Controller
{
    public function index()
    {
        $label = FileLabel::all();
        return response()
            ->view('backend.file-labels',
                [
                    'labels' => $label,
                    'title' => "File Status",
                ]);
    }

    public function create()
    {

    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
        FileLabel::create($attributes);
        return redirect()->back()->with('success', 'Successfully Created');

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(UpdateRequest $request, FileLabel $label)
    {
        $attributes = $request->validated();
        $label->update($attributes);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy(FileLabel $label)
    {
        $label->delete();
        return back()->with('success', "FileLabel Type has been deleted successfully!!");
    }
}
