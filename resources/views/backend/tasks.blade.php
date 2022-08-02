@extends('layouts.backend')

@section('styles')
  <!-- Datatable CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('page-header')
  <div class="row align-items-center">
    <div class="col">
      <h3 class="page-title">Tasks List</h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>

        <li class="breadcrumb-item active">Tasks List</li>
      </ul>
    </div>
    <div class="col-auto float-right ml-auto">
      <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_lead"><i class="fa fa-plus"></i>
        Add Tasks
      </a>
      <div class="view-icons">
        <a href="{{route('tasks.index')}}"
           class="list-view btn btn-link {{route_is('tasks.index') ? 'active' : '' }}"><i
            class="fa fa-bars"></i></a>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-striped custom-table datatable">
          <thead>
          <tr>
            <th>Name</th>
            <th>#ID</th>
            <th>Description</th>
            <th>Employee</th>
            <th>Department</th>
            <th>Expire</th>
            <th>Due</th>
            <th>Started At</th>
            <th>Attachments</th>
            <th>Status</th>
            <th>Helpers</th>
            <th class="text-right">Action</th>
          </tr>
          </thead>
          <tbody>
          @if ($tasks->isNotEmpty())
            @foreach ($tasks as $task)
              <tr>
                <td>
                  <h2 class="table-avatar">
                    <a href="#" style="color: {{$task->taskType->color}};" class="avatar avatar-fix">
                      <i class="font-22 la la-arrow-circle-o-right">
                      </i>
                    </a>
                    <a href="#">
                      {{$task->name}}
                    </a>
                  </h2>
                </td>
                <td>TID-{{$task->id}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->employee->Fullname}}</td>
                <td>{{$task->department->name}}</td>
                <td>
                  @if($task->expire_date < date('Y-m-d') || $task->expire_date <= date('Y-m-d')  && $task->expire_at_time < date('h:i A'))
                    <span class="badge badge-danger" data-toggle="tooltip" data-placement="top"
                          title="{{$task->expire_date}}">
                         <i class="la la-close"></i>
                          Expired
                      </span>

                  @else
                    <span class="badge badge-info">
                     <i class="la la-calendar-check-o"></i>
                    {{$task->expire_date == date('Y-m-d') ? "Today" : $task->expire_date}}
                  </span>
                    <span class="badge badge-warning">
                      <i class="la la-clock-o"></i>
                        {{$task->expire_at_time}}
                  </span>
                  @endif

                </td>
                <td>
                  @if($task->due_date)
                    @if($task->due_date < date('Y-m-d'))
                      <span class="badge badge-info">
                          Finished At {{$task->due_date}}
                        </span>
                    @elseif($task->due_date == date('Y-m-d'))
                      <span class="badge badge-success">
                        Today At {{$task->due_at_time}}
                      </span>
                    @endif
                  @else
                    <span class="badge badge-secondary">
                        {{$task->employee->fullname}} has not finished yet
                      </span>
                  @endif

                </td>
                <td>

                  @if($task->started_at)

                    @if($task->started_at->format("Y-m-d") < date('Y-m-d'))
                      <span class="badge badge-info">
                      Started At {{$task->started_at->format("Y-m-d")}}
                      </span>
                    @elseif($task->started_at->format("Y-m-d") == date('Y-m-d'))
                      <span class="badge badge-warning">
                        Today At {{$task->started_at->format("h:m A")}}
                      </span>
                    @endif
                  @else
                    <span class="badge badge-warning">
                        {{$task->employee->fullname}} has not started yet
                      </span>
                  @endif
                </td>
                <td>
                  @foreach($task->attachments as $attachment)
                    <a href="{{$attachment->attachment()}}">
                  <span class="badge badge-dark">
                    Click To Download
                  </span>
                    </a>
                  @endforeach
                </td>
                <td>
                  @foreach($status as $state_key => $state_value)
                    <a href="{{route('tasks.status',$task)}}">
                      @if($task->status == $state_key)
                        <span

                          class="badge  {
                         {{$task->status < 2 ? 'badge-warning' : 'badge-success'}} ">
                          {{$state_value}}
                      </span>
                      @endif
                    </a>
                  @endforeach
                </td>

                <td>
                  <span class="badge badge-success" style="background: {{$task->flag?->color}} !important;">
                    {{$task->flag->name}}
                  </span>
                  <span class="badge badge-success" style="background: {{$task->label?->color}} !important;">
                    {{$task->label->name}}
                  </span>
                  <span class="badge badge-success" style="background: {{$task->taskType->color}} !important;">
                    {{$task->taskType->name}}
                  </span>
                </td>

                <td class="text-right">
                  <div class="dropdown dropdown-action">
                    <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                       data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a data-id="{{$task->id}}"
                         data-name="{{$task->name}}"
                         data-description="{{$task->description}}"
                         data-attachment="{{$task->attachment?->attachment()}}"
                         class="dropdown-item editbtn"
                         href="javascript:void(0)" data-toggle="modal"><i
                          class="fa fa-pencil m-r-5"></i> Edit</a>
                      <form method="post" action="{{route('tasks.destroy',$task)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="dropdown-item ">
                          <i class="fa fa-trash-o m-r-5"></i>
                          Delete
                        </button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach

            <!-- Edit Client Modal -->
            <div id="edit_lead" class="modal custom-modal fade" role="dialog">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Task {{$task->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="text-center">
                    <span class="badge badge-success"
                          style="background:{{$task->label->color}} !important;">{{$task->label->name}} </span>
                    <span class="badge badge-success"
                          style="background:{{$task->flag->color}} !important;">{{$task->flag->name}}</span>

                  </div>
                  <div class="modal-body">

                    <form method="POST" enctype="multipart/form-data"
                          action="{{route('tasks.update',$task)}}">
                      @csrf
                      @method("PATCH")
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-form-label">Task Name<span
                                class="text-danger">*</span></label>
                            <input class="form-control edit_name " name="name"
                                   type="text" value="{{old('name')}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-form-label">Attachment<span
                                class="text-danger">*</span></label>
                            <input class="form-control floating"
                                   name="attachment" type="file">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="col-form-label">Description<span class="text-danger">*</span></label>
                            <input class="form-control  edit_description" name="description"
                                   type="text">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="col-form-label">Expire Date<span class="text-danger">*</span></label>
                            <input class="form-control " name="expire_date"
                                   type="date" value="{{$task->expire_date}}"
                                   min="{{Date('Y-m-d')}}">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="col-form-label">Expire Time<span class="text-danger">*</span></label>
                            <input class="form-control " name="expire_time"
                                   type="time" value="{{$task->expire_time}}"
                            >
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Set A Label<span class="text-danger">*</span></label>
                            <select name="label_id" class="select">
                              <option hidden selected>Select Label</option>
                              @foreach ($labels as $label)
                                <option
                                  {{ $task->label_id == $label->id ? 'selected' : '' }}
                                  value="{{$label->id}}"
                                >{{$label->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Set A Flag<span class="text-danger">*</span></label>
                            <select name="flag_id" class="select">
                              <option hidden selected>Select Flag</option>
                              @foreach ($flags as $flag)
                                <option
                                  {{ $task->flag_id == $flag->id ? 'selected' : '' }}
                                  value="{{$flag->id}}"
                                >{{$flag->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Set A Type<span class="text-danger">*</span></label>
                            <select name="task_type_id" class="select">
                              <option hidden selected>Select Type</option>
                              @foreach ($types as $type)
                                <option
                                  {{ $task->task_type_id == $type->id ? 'selected' : '' }}
                                  value="{{$type->id}}"
                                >{{$type->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>
                              Department
                              <span class="text-danger">*</span>
                            </label>
                            <select name="department_id" class="select">
                              <option hidden selected>Select Department</option>
                              @foreach ($departments as $department)
                                <option
                                  {{ $task->department_id == $department->id ? 'selected' : '' }}
                                  value="{{$department->id}}"
                                >{{$department->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Assign To Employee <span class="text-danger">*</span></label>
                            <select name="employee_id" class="select">
                              <option hidden selected>
                                Choose A Hero
                              </option>
                              @foreach ($employees as $employee)
                                <option
                                  {{  $task->employee_id == $employee->id ? 'selected' : '' }}
                                  value="{{$employee->id}}"
                                >{{$employee->fullname}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Team Leader</label>
                            <select name="leader_id" class="select">
                              <option hidden selected>
                                Assign To Leader
                              </option>
                              @foreach ($employees as $employee)
                                <option
                                  {{ $task->leader_id == $employee->id ? 'selected' : '' }}
                                  value="{{$employee->id}}"
                                >{{$employee->fullname}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Edit Client Modal -->
          @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Add Client Modal -->
  <div id="add_lead" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data" action="{{route('tasks.store')}}">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-form-label">Task Name<span
                      class="text-danger">*</span></label>
                  <input class="form-control edit_name " name="name"
                         type="text" value="{{old('name')}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Attachment<span
                      class="text-danger">*</span></label>
                  <input class="form-control floating"
                         name="attachment" type="file" value="{{old('attachment')}}">
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label>Flag For File <span class="text-danger">*</span></label>
                  <select name="flag_to_file_id" class="select">
                    <option hidden selected>Select Label</option>
                    @foreach ($flags as $flag)
                      <option
                        {{  old('flag_id') == $flag->id ? 'selected' : '' }}
                        value="{{$flag->id}}"
                      >{{$flag->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-form-label">Description<span class="text-danger">*</span></label>
                  <input class="form-control " name="description"
                         type="text" value="{{old('description')}}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">Expire Date<span class="text-danger">*</span></label>
                  <input class="form-control " name="expire_date"
                         type="date" value="{{old('expire_date')}}"
                         min="{{Date('Y-m-d')}}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">Expire Time<span class="text-danger">*</span></label>
                  <input class="form-control " name="expire_time"
                         type="time" value="{{old('expire_time')}}"
                  >
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Set A Label<span class="text-danger">*</span></label>
                  <select name="label_id" class="select">
                    <option hidden selected>Select Label</option>
                    @foreach ($labels as $label)
                      <option
                        {{ old('label_id') == $label->id ? 'selected' : '' }}
                        value="{{$label->id}}"
                      >{{$label->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Set A Flag <span class="text-danger">*</span></label>
                  <select name="flag_id" class="select">
                    <option hidden selected>Select Label</option>
                    @foreach ($flags as $flag)
                      <option
                        {{  old('flag_id') == $flag->id ? 'selected' : '' }}
                        value="{{$flag->id}}"
                      >{{$flag->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Set A Type<span class="text-danger">*</span></label>
                  <select name="task_type_id" class="select">
                    <option hidden selected>Select Label</option>
                    @foreach ($types as $type)
                      <option
                        {{ old('task_type_id') == $type->id ? 'selected' : '' }}
                        value="{{$type->id}}"
                      >
                        {{$type->name}}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>
                    Department
                    <span class="text-danger">*</span>
                  </label>
                  <select name="department_id" class="select">
                    <option hidden selected>Select Department</option>
                    @foreach ($departments as $department)
                      <option
                        {{ old('department_id') == $department->id ? 'selected' : '' }}
                        value="{{$department->id}}"
                      >{{$department->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Assign To Employee <span class="text-danger">*</span></label>
                  <select name="employee_id" class="select">
                    <option hidden selected>
                      Choose A Hero
                    </option>
                    @foreach ($employees as $employee)
                      <option
                        {{  old('employee_id') == $employee->id ? 'selected' : '' }}
                        value="{{$employee->id}}"
                        {{ old('employee_id') == $employee->id ? 'selected' : '' }}
                      >{{$employee->fullname}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Team Leader</label>
                  <select name="leader_id" class="select">
                    <option hidden selected>
                      Assign To Leader
                    </option>
                    @foreach ($employees as $employee)
                      <option
                        {{ old('leader_id') == $employee->id ? 'selected' : '' }}
                        value="{{$employee->id}}"

                      >{{$employee->fullname}}</option>
                    @endforeach
                  </select>
                </div>
              </div>


            </div>
            <div class="submit-section">
              <button class="btn btn-primary submit-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /Add Client Modal -->
@endsection
{{-- Tabs --}}


@section('scripts')
  <!-- Datatable JS -->
  <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('.editbtn').on('click', function () {
        $('#edit_lead').modal('show');
        var id = $(this).data('id');
        var name = $(this).data('name');
        var description = $(this).data('description');

        $('#edit_id').val(id);
        $('.edit_name').val(name);
        $('.edit_description').val(description);

      })
    })
  </script>
@endsection


