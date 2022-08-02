<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\Type\StoreRequest;
use App\Http\Requests\File\Type\UpdateRequest;
use App\Models\FileType;
use Illuminate\Http\Request;

class FileTypeController extends Controller
{
    public function index()
    {
        $file_type = FileType::all();
        return response()
            ->view('backend.file-types',
                [
                    'file_types' => $file_type,
                    'title' => "File Types",
                ]);
    }

    public function create()
    {

    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
        FileType::create($attributes);
        return redirect()->back()->with('success', 'Successfully Created');

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(UpdateRequest $request, FileType $type)
    {
        $attributes = $request->validated();
        $type->update($attributes);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy(FileType $type)
    {
        $type->delete();
        return back()->with('success', "FileType Type has been deleted successfully!!");
    }
}
