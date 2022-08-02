@extends('layouts.backend')

@section('styles')

@endsection

@section('page-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Set File Type</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Files</li>
                <li class="breadcrumb-item active">Status</li>
            </ul>
            <div class="alert-heading mt-2">
                <h5 class="text-secondary">
                    This Status To difference between the files
                </h5>
                <h6 class="badge badge-warning">
                    Be careful about names as they will appear to Your co-workers
                </h6>
            </div>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_type"><i class="fa fa-plus"></i> Add
                State
            </a>
            <div class="view-icons">
                <a href="{{route('files.status.index')}}"
                   class="grid-view btn btn-link {{route_is('labels.index') ? 'active' : '' }}"><i
                        class="fa fa-th"></i></a>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row staff-grid-row">
        @if (!empty($status->count()))
            @foreach ($status as $state)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img eighty-width">
                            <a href="javascript:void(0)" class="eighty-width avatar backgroundData"
                               background="{{$state->color}}">
                                <i class="la la-folder-o font-32"></i>
                            </a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-id="{{$state->id}}" data-name="{{$state->name}}"
                                   data-color="{{$state->color}}" data-value="{{$state->value}}"
                                   class="dropdown-item editbtn"
                                   href="javascript:void(0)" data-toggle="modal"><i class="fa fa-pencil m-r-5"></i>
                                    Edit</a>
                                <form method="post" action="{{route('files.status.destroy',$state)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="dropdown-item ">
                                        <i class="fa fa-trash-o m-r-5"></i>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis">

                            <a
                                href="javascript:void(0)">

                                {{$state->name}}</a>
                        </h4>
                        <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a
                                href="javascript:void(0)">

                                {{$state->value}}
                                <b>- NO</b>
                            </a></h5>

                    </div>
                </div>
            @endforeach


            <!-- Edit Type
 Modal -->
            <div id="edit_type" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Type
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-Type="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data"
                                  action="{{route('files.status.update',$state)}}">
                                @csrf
                                @method("PATCH")
                                <div class="row">
                                    <input type="hidden" id="edit_id" name="id">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-Type">State
                                                Name<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control edit_name" name="name" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-Type">Color</label>
                                            <input class="form-control edit_color" name="color" type="color"
                                                   value="{{$state->color}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-Type">State Number</label>
                                            <input class="form-control edit_value" name="value" type="number">
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
            <!-- /Edit Type
 Modal -->
        @endif

    </div>

    <!-- Add Type
 Modal -->
    <div id="add_type" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add State
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-Type="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('files.status.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-Type">State
                                        Name
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-Type">Color</label>
                                    <input class="form-control" name="color" type="color">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-Type">State Number</label>
                                    <input class="form-control" name="value" type="number">
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
    <!-- /Add Type
 Modal -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.editbtn').on('click', function () {
                $('#edit_type').modal('show');
                var id = $(this).data('id');
                var name = $(this).data('name');
                var color = $(this).data('color');
                var value = $(this).data('value');


                $('#edit_id').val(id);
                $('.edit_name').val(name);
                $('.edit_color').val(color);
                $('.edit_value').val(value);


            })

        });
        let avatar = document.getElementsByClassName('backgroundData');
        Array.from(avatar).forEach(e => {
            e.style.background = e.getAttribute('background');
        });
    </script>
@endsection
