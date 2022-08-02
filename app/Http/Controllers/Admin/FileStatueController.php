<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\Status\StoreRequest;
use App\Http\Requests\File\Status\UpdateRequest;
use App\Models\FileStatue;
use Illuminate\Http\Request;

class FileStatueController extends Controller
{
    public function index()
    {
        $status = FileStatue::all();
        return response()
            ->view('backend.file-status',
                [
                    'status' => $status,
                    'title' => "File Status",
                ]);
    }

    public function create()
    {

    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
        FileStatue::create($attributes);
        return redirect()->back()->with('success', 'Successfully Created');

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(UpdateRequest $request, FileStatue $status)
    {
        $attributes = $request->validated();
        $status->update($attributes);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy(FileStatue $status)
    {
        $status->delete();
        return back()->with('success', "FileStatue Type has been deleted successfully!!");
    }
}
