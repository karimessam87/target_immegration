@extends('layouts.backend')

@section('styles')

@endsection

@section('page-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Set File Label</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Labels</li>
            </ul>
            <div class="alert-heading mt-2">
                <h5 class="text-secondary">
                    This Types is only use for files
                </h5>
                <h6 class="badge badge-warning">
                    Be careful about names as they will appear to your Co-workers
                </h6>
            </div>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_type"><i class="fa fa-plus"></i> Add
                Label
            </a>
            <div class="view-icons">
                <a href="{{route('files.labels.index')}}"
                   class="grid-view btn btn-link {{route_is('labels.index') ? 'active' : '' }}"><i
                        class="fa fa-th"></i></a>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row staff-grid-row">
        @if (!empty($labels->count()))
            @foreach ($labels as $label)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img eighty-width">
                            <a href="javascript:void(0)" class="eighty-width avatar backgroundData"
                               background="{{$label->color}}">
                                <i class="font-32 la la-tags"></i>

                            </a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-id="{{$label->id}}" data-name="{{$label->name}}"
                                   data-color="{{$label->color}}"
                                   data-description="{{$label->description}}"
                                   class="dropdown-item editbtn"
                                   href="javascript:void(0)" data-toggle="modal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <form method="post" action="{{route('files.labels.destroy',$label)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="dropdown-item ">
                                        <i class="fa fa-trash-o m-r-5"></i>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a
                                href="javascript:void(0)">{{$label->name}}</a></h4>
                        <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a
                                href="javascript:void(0)">{{$label->description}}</a></h5>
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
                                  action="{{route('files.labels.update',$label)}}">
                                @csrf
                                @method("PATCH")
                                <div class="row">
                                    <input type="hidden" id="edit_id" name="id">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-Type">Label
                                                Name<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control edit_name" name="name" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-Type">Description</label>
                                            <input class="form-control edit_description" name="description" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-Type">Color</label>
                                            <input class="form-control edit_color" name="color" type="color">
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
                    <h5 class="modal-title">Add Label
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-Type="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('files.labels.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-Type">Label
                                        Name
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-Type">Description</label>
                                    <input class="form-control" name="description" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-Type">Color</label>
                                    <input class="form-control" name="color" type="color">
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
                var description = $(this).data('description');


                $('#edit_id').val(id);
                $('.edit_name').val(name);
                $('.edit_color').val(color);
                $('.edit_description').val(description);


            })

        });
        let avatar = document.getElementsByClassName('backgroundData');
        Array.from(avatar).forEach(e => {
            e.style.background = e.getAttribute('background');
        });
    </script>
@endsection
