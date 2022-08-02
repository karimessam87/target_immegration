<?php

namespace App\Http\Controllers\Admin\Task;

use App\Helpers\Classess\Mediaable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Flag;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function index()
  {
    $tasks = Task::all();
    $labels = Label::all();
    $flags = Flag::all();
    $types = TaskType::all();
    $employees = Employee::all();
    $departments = Department::all();
    $tasks->load('taskType', 'label', 'flag', 'employee', 'department', 'attachments');
    return response()
      ->view('backend.tasks',
        [
          'tasks' => $tasks,
          'labels' => $labels,
          'flags' => $flags,
          'status' => Task::STATUS,
          'departments' => $departments,
          'types' => $types,
          'employees' => $employees,
          'title' => "Tasks",
        ]);
  }

  public function create()
  {

  }

  public function store(StoreRequest $request)
  {
    $attributes = $request->validated();
    $task = Task::create($attributes);
    if ($request->hasFile('attachment')) {
      $attributes['attachment'] = (new Mediaable($request))
        ->moveToDir('tasks/attachments/' . date("Y-m-d") . '/' . date("H")) // Directory
        ->getMediaFromRequestByName('attachment') // InputName
        ->getMediaNameAfterUpload(); // To Upload
      $task->attachments()->create([
        'attachment' => $attributes['attachment'],
        'task_id' => $task->id,
        'flag_id' => $attributes['flag_to_file_id']
      ]);
    }
    return redirect()->back()->with('success', 'Successfully Created');
  }

  public function show(Task $task)
  {
    return response()
      ->view('backend.task',
        [
          'title' => "Task $task->name"
        ]);
  }

  public function status(Task $task)
  {
    $task->update([
      'status' => $task->status < 1 ? 1 : 0
    ]);

    if ($task->status == 1) {
      $task->update([
        'started_at' => Carbon::now()->toDateTimeString(),
      ]);
    }
    if ($task->status == 0) {
      $task->update([
        'started_at' => null,
      ]);
    }
    return back()->with('success', "Task  has been deleted successfully!!");
  }

  public function update(UpdateRequest $request, Task $task)
  {
    $attributes = $request->validated();
    $task->update($attributes);
    return redirect()->back()->with('success', 'Successfully Updated');
  }

  public function destroy(Task $task)
  {
    $task->delete();
    return back()->with('success', "File Type has been deleted successfully!!");
  }
}
