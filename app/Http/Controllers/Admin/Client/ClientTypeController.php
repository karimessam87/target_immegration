<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Type\StoreRequest;
use App\Http\Requests\Client\Type\UpdateRequest;
use App\Models\ClientType;
use Illuminate\Http\Request;

class ClientTypeController extends Controller
{
    public function index()
    {
        $types = ClientType::all();
        return response()
            ->view('backend.types',
                [
                    'types' => $types,
                    'title' => "Client Types",
                ]);
    }

    public function create()
    {

    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
        ClientType::create($attributes);
        return redirect()->back()->with('success', 'Successfully Created');

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(UpdateRequest $request, ClientType $type)
    {
        $attributes = $request->validated();
        $type->update($attributes);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy(ClientType $type)
    {
        $type->delete();
        return back()->with('success', "Client Type has been deleted successfully!!");
    }
}
