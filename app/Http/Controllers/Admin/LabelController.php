<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Label\StoreRequest;
use App\Http\Requests\Client\Label\UpdateRequest;
use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        $labels = Label::all();
        return response()
            ->view('backend.labels',
                [
                    'labels' => $labels,
                    'title' => "Public Labels",
                ]);
    }

    public function create()
    {

    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
        Label::create($attributes);
        return redirect()->back()->with('success', 'Successfully Created');

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(UpdateRequest $request, Label $label)
    {
        $attributes = $request->validated();
        $label->update($attributes);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy(Label $label)
    {
        $label->delete();
        return back()->with('success', "Label Type has been deleted successfully!!");
    }
}
