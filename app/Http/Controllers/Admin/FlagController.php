<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Flag\StoreRequest;
use App\Http\Requests\Client\Flag\UpdateRequest;
use App\Models\Flag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class FlagController extends Controller
{
    public function index()
    {
        $flags = Flag::all();
        return response()
            ->view('backend.flags',
                [
                    'flags' => $flags,
                    'title' => "Public Flags",
                ]);
    }

    public function create()
    {

    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
        Flag::create($attributes);
        return redirect()->back()->with('success', 'Successfully Created');

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(UpdateRequest $request, Flag $flag)
    {
        $attributes = $request->validated();
        $flag->update($attributes);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy(Flag $flag)
    {
        $flag->delete();
        return back()->with('success', "Flag Type has been deleted successfully!!");
    }
}
