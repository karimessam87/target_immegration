@extends('layouts.backend')

@section('styles')
  <!-- Datatable CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('page-header')
  <div class="row align-items-center">
    <div class="col">
      <h3 class="page-title">Leads</h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('projects')}}">Campaigns</a></li>
        <li class="breadcrumb-item active">Leads</li>
      </ul>
    </div>
    <div class="col-auto float-right ml-auto">
      <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_lead"><i class="fa fa-plus"></i>
        Add Lead
      </a>
      <div class="view-icons">
        <a href="{{route('leads.index')}}"
           class="grid-view btn btn-link {{route_is('files.index') ? 'active' : '' }}"><i
            class="fa fa-th"></i></a>
        <a href="{{route('leads.index')}}"
           class="list-view btn btn-link {{route_is('clients-list') ? 'active' : '' }}"><i
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
            <th>Attachment</th>
            <th>Status</th>
            <th>Project</th>
            <th>Department</th>
            <th>Helpers</th>
            <th class="text-right">Action</th>
          </tr>
          </thead>
          <tbody>
          @if ($leads->isNotEmpty())
            @foreach ($leads as $lead)
              <tr>
                <td>
                  <h2 class="table-avatar">
                    <a href="client-profile.html" class="avatar avatar-fix">
                      <i class="font-22 la la-folder-open">
                      </i>
                    </a>
                    <a href="client-profile.html">
                      {{$lead->name}}
                    </a>
                  </h2>
                </td>
                <td>LID-{{$lead->id}}</td>
                <td>{{$lead->description}}</td>
                <td>
                  <a href="{{$lead->attachment()}}">
                  <span class="badge badge-success">
                    Click To Download
                  </span>
                  </a>
                </td>
                <td>
                  <a href="{{route('leads.status',$lead)}}">
                  <span class="badge {{$lead->status ? 'badge-dark' : 'badge-warning'}} ">
                    {{$lead->status ? 'Completed' : 'ongoing'}}
                  </span>
                  </a>
                </td>
                <td>{{$lead->project->name}}</td>
                <td>{{$lead->department->name}}</td>
                <td>
                  <span class="badge badge-success" style="background: {{$lead->flag->color}} !important;">
                    {{$lead->flag->name}}
                  </span>
                  <span class="badge badge-success" style="background: {{$lead->label->color}} !important;">
                    {{$lead->label->name}}
                  </span>
                </td>

                <td class="text-right">
                  <div class="dropdown dropdown-action">
                    <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                       data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a data-id="{{$lead->id}}"
                         data-name="{{$lead->name}}"
                         data-description="{{$lead->description}}"
                         data-attachment="{{$lead->attachment()}}"
                         class="dropdown-item editbtn"
                         href="javascript:void(0)" data-toggle="modal"><i
                          class="fa fa-pencil m-r-5"></i> Edit</a>
                      <a data-id="{{$lead->id}}" class="dropdown-item deletebtn"
                         href="javascript:void(0)" data-toggle="modal"><i
                          class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                    <h5 class="modal-title">Edit Lead {{$lead->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="text-center">
                    <span class="badge badge-success"
                          style="background:{{$lead->label->color}} !important;">{{$lead->label->name}} </span>
                    <span class="badge badge-success"
                          style="background:{{$lead->flag->color}} !important;">{{$lead->flag->name}}</span>

                  </div>
                  <div class="modal-body">

                    <form method="POST" enctype="multipart/form-data"
                          action="{{route('leads.update',$lead)}}">
                      @csrf
                      @method("PATCH")
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-form-label">Lead Name<span
                                class="text-danger">*</span></label>
                            <input class="form-control edit_name " name="name"
                                   type="text">
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
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="col-form-label">Description<span class="text-danger">*</span></label>
                            <input class="form-control  edit_description" name="description"
                                   type="text"


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
                                  {{ $lead->label_id == $label->id ? 'selected' : '' }}
                                  value="{{$label->id}}"
                                >{{$label->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Department<span class="text-danger">*</span></label>
                            <select name="department_id" class="select">
                              <option hidden selected>Select Department</option>
                              @foreach ($departments as $department)
                                <option
                                  {{ $lead->department_id == $department->id ? 'selected' : '' }}
                                  value="{{$department->id}}"
                                >{{$department->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Set A Label<span class="text-danger">*</span></label>
                            <select name="flag_id" class="select">
                              <option hidden selected>Select Label</option>
                              @foreach ($flags as $flag)
                                <option
                                  {{ $lead->flag_id == $flag->id ? 'selected' : '' }}
                                  value="{{$flag->id}}"
                                >{{$flag->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Assign To Project <span class="text-danger">*</span></label>
                            <select name="project_id" class="select">
                              <option hidden selected>
                                Choose A Project
                              </option>
                              @foreach ($projects as $project)
                                <option
                                  {{ $lead->project_id == $project->id ? 'selected' : '' }}
                                  value="{{$project->id}}"
                                  {{ old('project_id') == $project->id ? 'selected' : '' }}
                                >{{$project->name}}</option>
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
          <h5 class="modal-title">Add New Lead</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data" action="{{route('leads.store')}}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Lead Name<span
                      class="text-danger">*</span></label>
                  <input class="form-control " name="name"
                         type="text">
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
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-form-label">Description<span class="text-danger">*</span></label>
                  <input class="form-control " name="description"
                         type="text"


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
                  <label>Department<span class="text-danger">*</span></label>
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
                  <label>Set A Flag<span class="text-danger">*</span></label>
                  <select name="flag_id" class="select">
                    <option hidden selected>Select Flag</option>
                    @foreach ($flags as $flag)
                      <option
                        {{ old('flag_id') == $flag->id ? 'selected' : '' }}
                        value="{{$flag->id}}"
                      >{{$flag->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Assign To Campaign <span class="text-danger">*</span></label>
                  <select name="project_id" class="select">
                    <option hidden selected>
                      Choose A Campaign
                    </option>
                    @foreach ($projects as $project)
                      <option
                        value="{{$project->id}}"
                        {{ old('project_id') == $project->id ? 'selected' : '' }}
                      >{{$project->name}}</option>
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


