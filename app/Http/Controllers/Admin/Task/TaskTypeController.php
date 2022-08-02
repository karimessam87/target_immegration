<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\Type\StoreRequest;
use App\Http\Requests\Task\Type\UpdateRequest;
use App\Models\TaskType;
use Illuminate\Http\Request;

class TaskTypeController extends Controller
{
  public function index()
  {
    $types = TaskType::all();
    return response()
      ->view('backend.task-types',
        [
          'title' => "Task Types",
          'types' => $types,
        ]);
  }

  public function create()
  {

  }

  public function store(StoreRequest $request)
  {
    $attributes = $request->validated();
    TaskType::create($attributes);
    return redirect()->back()->with('success', 'Successfully Created');
  }

  public function show()
  {

  }

  public function edit()

  {

  }

  public function update(UpdateRequest $request, TaskType $type)
  {
    $attributes = $request->validated();
    $type->update($attributes);
    return redirect()->back()->with('success', 'Successfully Updated');
  }

  public function destroy(TaskType $type)
  {
    $type->delete();
    return back()->with('success', "Task Type has been deleted successfully!!");
  }
}
