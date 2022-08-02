@extends('layouts.backend')

@section('styles')
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('page-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Files</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Files</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i>
                Open
                File
            </a>
            <div class="view-icons">
                <a href="{{route('files.index')}}"
                   class="grid-view btn btn-link {{route_is('files.index') ? 'active' : '' }}"><i
                        class="fa fa-th"></i></a>
                <a href="{{route('clients-list')}}"
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
                        <th>File NO</th>
                        <th>#ID</th>
                        <th>NOC</th>
                        <th>CIC NO</th>
                        <th>Overall Score</th>
                        <th>Application Effective Date</th>
                        <th>Job Seeker Code</th>
                        <th>Helpers</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (!empty($files->count()))
                        @foreach ($files as $file)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="client-profile.html" class="avatar avatar-fix">
                                            <i class="font-22 la la-folder-open">
                                            </i>
                                        </a>
                                        <a href="client-profile.html">
                                            {{$file->number}}
                                        </a>
                                    </h2>
                                </td>
                                <td>FLI-{{$file->id}}</td>
                                <td>{{$file->noc}}</td>
                                <td>{{$file->cic}}</td>
                                <td>{{$file->score}}</td>
                                <td>{{$file->application_effective_date}}</td>
                                <td>{{$file->job_seeker_code}}</td>
                                <td>
                                    <span class="badge badge-success"
                                          style="background:{{$file->fileLabel->color}} !important;">{{$file->fileLabel->name}} </span>
                                    <span class="badge badge-success"
                                          style="background:{{$file->fileStatue->color}} !important;">{{$file->fileStatue->name}}</span>
                                    <span class="badge badge-success"
                                          style="background:{{$file->fileType->color}} !important;">{{$file->fileType->name}}</span>
                                </td>

                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                                           data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-id="{{$file->id}}"
                                               data-number="{{$file->number}}"
                                               data-noc="{{$file->noc}}"
                                               data-cic="{{$file->cic}}"
                                               data-job_seeker_code="{{$file->job_seeker_code}}"
                                               data-score="{{$file->score}}"
                                               data-file_type_id="{{$file->file_type_id}}"
                                               data-file_statue_id="{{$file->file_statue_id}}"
                                               data-client_id="{{$file->client_id}}"
                                               data-application_effective_date="{{$file->application_effective_date}}"
                                               class="dropdown-item editbtn"
                                               href="javascript:void(0)" data-toggle="modal"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-id="{{$file->id}}" class="dropdown-item deletebtn"
                                               href="javascript:void(0)" data-toggle="modal"><i
                                                    class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <!-- Edit Client Modal -->
                        <div id="edit_client" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit File NO-{{$file->number}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="text-center">

                                        <span class="badge badge-success"
                                              style="background:{{$file->fileLabel->color}} !important;">{{$file->fileLabel->name}} </span>
                                        <span class="badge badge-success"
                                              style="background:{{$file->fileStatue->color}} !important;">{{$file->fileStatue->name}}</span>
                                        <span class="badge badge-success"
                                              style="background:{{$file->fileType->color}} !important;">{{$file->fileType->name}}</span>

                                    </div>
                                    <div class="modal-body">

                                        <form method="POST" enctype="multipart/form-data"
                                              action="{{route('files.update',$file)}}">
                                            @csrf
                                            @method("PATCH")
                                            <div class="row">
                                                <input type="hidden" id="edit_id" name="id">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">File Number [NO]<span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control edit_number" name="number"
                                                               type="number"
                                                               maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">NOC Code<span class="text-danger">*</span></label>
                                                        <input class="form-control edit_noc" name="noc"
                                                               type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">CIC Application number <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control edit_cic" name="cic"
                                                               type="text">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Application Effective Date <span
                                                                class="text-danger">*</span></label>
                                                        <br>


                                                        <input
                                                            class="form-control floating edit_application_effective_date"
                                                            name="application_effective_date" type="date"
                                                            min="{{date('Y-m-d')}}"

                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Job Seeker Code <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control floating edit_job_seeker_code"
                                                               name="job_seeker_code" type="text">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Overall Score<span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control floating edit_score"
                                                               name="score" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>File Label<span
                                                                class="text-danger">*</span></label>
                                                        <select name="file_label_id" class="select">
                                                            <option value="{{$file->fileLabel->id}}" hidden
                                                                    selected>{{$file->fileLabel->name}}
                                                            </option>
                                                            @foreach ($labels as $label)
                                                                <option
                                                                    {{ old('file_label_id') == $label->id ? 'selected' : '' }}
                                                                    value="{{$label->id}}"
                                                                >{{$label->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>File Status<span
                                                                class="text-danger">*</span></label>
                                                        <select name="file_statue_id" class="select">
                                                            <option value="{{$file->fileStatue->id}}" hidden
                                                                    selected>{{$file->fileStatue->name}}
                                                                -{{$file->fileStatue->value}}</option>
                                                            @foreach ($status as $state)
                                                                <optio
                                                                    value="{{$state->id}}"
                                                                >{{$state->name}} - {{$state->value}}</optio>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>File Type <span class="text-danger">*</span></label>
                                                        <select name="file_type_id" class="select">
                                                            <option hidden selected value="{{$file->fileType->id}}">
                                                                {{$file->fileType->name}}
                                                            </option>
                                                            @foreach ($types as $type)
                                                                <option
                                                                    value="{{$type->id}}"
                                                                >{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>The Client<span class="text-danger">*</span></label>
                                                        <select name="client_id" class="select">
                                                            <option hidden selected value="{{$file->client->id}}">
                                                                {{$file->client->firstname}} {{$file->client->lastname}}
                                                            </option>
                                                            @foreach ($clients as $client)
                                                                <option
                                                                    value="{{$client->id}}">
                                                                    {{$client->firstname}} {{$client->middlename}} {{$client->firstname}}
                                                                </option>
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
    <div id="add_client" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Open New File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('files.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">File Number [NO]<span
                                            class="text-danger">*</span></label>
                                    <input {{old('number')}}  class="form-control" name="number" type="number"
                                           maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">NOC Code<span class="text-danger">*</span></label>
                                    <input {{old('noc')}} class="form-control" name="noc" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">CIC Application number <span
                                            class="text-danger">*</span></label>
                                    <input {{old('cic')}}  class="form-control" name="cic" type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Application Effective Date <span
                                            class="text-danger">*</span></label>
                                    <input {{old('application_effective_date')}}  class="form-control floating"
                                           name="application_effective_date" type="date"
                                           min="{{date('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Job Seeker Code <span
                                            class="text-danger">*</span></label>
                                    <input {{old('job_seeker_code')}} class="form-control floating"
                                           name="job_seeker_code" type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Overall Score<span
                                            class="text-danger">*</span></label>
                                    <input {{old('score')}} class="form-control floating" name="score" type="number">
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Set A Label<span class="text-danger">*</span></label>
                                    <select name="file_label_id" class="select">
                                        <option hidden selected>Select Label</option>
                                        @foreach ($labels as $label)
                                            <option
                                                {{ old('file_label_id') == $label->id ? 'selected' : '' }}
                                                value="{{$label->id}}"
                                            >{{$label->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Set a Status<span class="text-danger">*</span></label>
                                    <select name="file_statue_id" class="select">
                                        <option hidden selected>Select Status</option>
                                        @foreach ($status as $state)
                                            <option
                                                {{ old('file_statue_id') == $state->id ? 'selected' : '' }}
                                                value="{{$state->id}}"
                                            >{{$state->name}} - {{$state->value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>File Type <span class="text-danger">*</span></label>
                                    <select name="file_type_id" class="select">
                                        <option hidden selected>Select Type</option>
                                        @foreach ($types as $type)
                                            <option
                                                {{ old('client_type_id') == $type->id ? 'selected' : '' }}
                                                value="{{$type->id}}"
                                            >{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Assign To Client <span class="text-danger">*</span></label>
                                    <select name="client_id" class="select">
                                        <option hidden selected>
                                            Choose A Client
                                        </option>
                                        @foreach ($clients as $client)
                                            <option
                                                value="{{$client->id}}"
                                                {{ old('client_id') == $type->id ? 'selected' : '' }}
                                            >{{$client->firstname}} {{$client->middlename}} {{$client->firstname}}</option>
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
                $('#edit_client').modal('show');
                var id = $(this).data('id');
                var number = $(this).data('number');
                var noc = $(this).data('noc');
                var cic = $(this).data('cic');
                var job_seeker_code = $(this).data('job_seeker_code');
                var score = $(this).data('score');
                var application_effective_date = $(this).data('application_effective_date');


                $('#edit_id').val(id);
                $('.edit_number').val(number);
                $('.edit_noc').val(noc);
                $('.edit_cic').val(cic);
                $('.edit_job_seeker_code').val(job_seeker_code);
                $('.edit_score').val(score);
                $('.edit_application_effective_date').val(application_effective_date);
            })
        })
    </script>
@endsection


