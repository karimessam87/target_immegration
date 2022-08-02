@extends('layouts.backend')

@section('styles')

@endsection

@section('page-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Clients</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Clients</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add
                Client</a>
            <div class="view-icons">
                <a href="{{route('clients.index')}}"
                   class="grid-view btn btn-link {{route_is('clients') ? 'active' : '' }}"><i class="fa fa-th"></i></a>
                <a href="{{route('clients-list')}}"
                   class="list-view btn btn-link {{route_is('clients-list') ? 'active' : '' }}"><i
                        class="fa fa-bars"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row staff-grid-row">
        @if (!empty($clients->count()))
            @foreach ($clients as $client)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="row ">
                        <span style="background:{{$client->flag->color}} !important; " class="badge badge-success mr-1">
                            {{$client->flag->name}}
                        </span>
                            <span style="background:{{$client->label->color}} !important; " class="badge badge-success">
                            {{$client->label->name}}
                        </span>
                        </div>

                        <div class="profile-img">
                            <a href="javascript:void(0)" class="avatar">
                                <img alt=""
                                     src="@if(!empty($client->avatar))
                                      {{asset('storage/clients/'.$client->avatar)}} @else assets/img/profiles/default.jpg @endif"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-id="{{$client->id}}" data-firstname="{{$client->firstname}}"
                                   data-middlename="{{$client->middlename}}"
                                   data-lastname="{{$client->lastname}}" data-email="{{$client->email}}"
                                   data-phone="{{$client->phone}}" data-avatar="{{$client->avatar}}"
                                   data-company="{{$client->company}}" class="dropdown-item editbtn"
                                   href="javascript:void(0)" data-toggle="modal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <form method="post" action="{{route('clients.destroy',$client)}}">
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
                                href="{{route('clients.show',$client)}}">{{$client->firstname}} {{$client->middlename}} {{$client->lastname}}</a>
                        </h4>
                        <h5 class="user-name m-t-10 mb-0 text-ellipsis">
                            <a style="color:{{$client->clientType->color}};"
                               href="javascript:void(0)">{{$client->clientType->name}}</a>
                        </h5>

                    </div>
                </div>
            @endforeach


            <!-- Edit Client Modal -->
            <div id="edit_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Client {{$client->firstname}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="text-center">
                            <h6>
                                {{$client->region}}
                            </h6>
                            <span class="badge badge-success"
                                  style="background:{{$client->label->color}} !important;">{{$client->label->name}} </span>
                            <span class="badge badge-success"
                                  style="background:{{$client->flag->color}} !important;">{{$client->flag->name}}</span>
                            <span class="badge badge-success"
                                  style="background:{{$client->clientType->color}} !important;">{{$client->clientType->name}}</span>

                        </div>
                        <div class="modal-body">

                            <form method="POST" enctype="multipart/form-data"
                                  action="{{route('clients.update',$client)}}">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <input type="hidden" id="edit_id" name="id">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control edit_firstname" name="firstname" type="text"
                                                   value="{{$client->firstname}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Middle Name <span class="text-danger">*</span></label>
                                            <input class="form-control edit_middle" name="middlename" type="text"
                                                   value="{{$client->middlename}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name</label>
                                            <input class="form-control edit_lastname" name="lastname" type="text"
                                                   value="{{$client->lastname}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control floating edit_email" name="email" type="email"
                                                   value="{{$client->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Password <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control floating" name="password" type="password"
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Client Picture<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control floating edit_avatar" name="avatar" type="file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone </label>
                                            <input class="form-control edit_phone" name="phone" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Company Name</label>
                                            <input class="form-control edit_company" name="company" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-top: 1rem;">
                                            <label class="col-form-label mr-1">
                                                Male
                                                <input class=" custom-radio" id="male" name="gender" type="radio"
                                                       value="male"
                                                    {{$client->gender ==  'male' ? 'checked' : ''}}
                                                >
                                            </label>
                                            <label class="col-form-label ml-1">
                                                Female
                                                <input class=" custom-radio" id="female" name="gender" type="radio"
                                                       value="female"
                                                    {{$client->gender ==  'female' ? 'checked' : ''}}
                                                >


                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Change The Label<span class="text-danger">*</span></label>
                                            <select name="label_id" class="select">
                                                <option value="{{$client->label->id}}" hidden
                                                        selected>{{$client->label->name}}
                                                </option>
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
                                            <label>Change a Flag <span class="text-danger">*</span></label>
                                            <select name="flag_id" class="select">
                                                <option value="{{$client->flag->id}}" hidden
                                                        selected>{{$client->flag->name}}</option>
                                                @foreach ($flags as $flag)
                                                    <option
                                                        {{ old('client_type_id') == $flag->id ? 'selected' : '' }}
                                                        value="{{$flag->id}}"
                                                    >{{$flag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Client Type <span class="text-danger">*</span></label>
                                            <select name="client_type_id" class="select">
                                                <option hidden selected value="{{$client->clientType->id}}">
                                                    {{$client->clientType->name}}
                                                </option>
                                                @foreach ($client_types as $type)
                                                    <option

                                                        {{$client?->type == $type?->id ? 'selected' : ''}}
                                                        value="{{$type->id}}"
                                                    >{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mr-2">
                                        <div class="form-group">
                                            <label>Marital<span class="text-danger">*</span></label>
                                            <select name="marital" class="select">
                                                <option hidden selected value="{{$client->marital}}">
                                                    {{marital()[$client->marital]}}
                                                </option>
                                                @foreach (marital() as $status_key => $status)
                                                    <option
                                                        {{ old('marital') == $status_key? 'selected' : '' }}
                                                        value="{{$status_key}}"
                                                    >{{$status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Client Governorate <span class="text-danger">*</span></label>
                                            <select name="governorates" class="select">
                                                <option hidden selected
                                                        value="{{trim(explode('-',$client->region)[0])}}">
                                                    {{trim(explode('-',$client->region)[0])}}
                                                </option>

                                                {{--                                                <option hidden selected--}}
                                                {{--                                                        value="{{trim(explode('-',(string)$client->region)[0])}}">--}}
                                                {{--                                                    {{trim(explode('-',(string)$client->region)[0])}}--}}
                                                {{--                                                </option>--}}
                                                @foreach (governorates()  as $key => $value)
                                                    @for($i = 0; $i < count((array)$value); $i++)
                                                        <option
                                                            value="{{$value[$i]->governorate_name_en}}"
                                                        >{{$value[$i]->governorate_name_en}}</option>
                                                    @endfor
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Client City <span class="text-danger">*</span></label>
                                            <select name="city" class="select">
                                                <option hidden selected
                                                        value="{{trim(explode('-',$client->region)[1])}}">
                                                    {{trim(explode('-',$client->region)[1])}}
                                                </option>

                                                @foreach (governorates('cities')  as $key => $value)
                                                    @for($i = 0; $i < count((array)$value); $i++)
                                                        <option
                                                            {{ old('city') == $value[$i]->city_name_en ? 'selected' : '' }}
                                                            value="{{$value[$i]->city_name_en}}"
                                                        >{{$value[$i]->city_name_en}}</option>
                                                    @endfor
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

    </div>

    <!-- Add Client Modal -->
    <div id="add_client" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('clients.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="firstname" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Middle Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="middlename" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="lastname" type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control floating" name="email" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Password <span class="text-danger">*</span></label>
                                    <input class="form-control floating" name="password" type="password">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Client Picture<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control floating" name="avatar" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone </label>
                                    <input class="form-control" name="phone" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Company Name</label>
                                    <input class="form-control" name="company" type="text">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-top: 1rem;">
                                    <label class="col-form-label mr-1">
                                        Male
                                        <input class=" custom-radio" id="male" name="gender" type="radio" value="male">
                                    </label>
                                    <label class="col-form-label ml-1">
                                        Female
                                        <input class=" custom-radio" id="female" name="gender" type="radio"
                                               value="female">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                                    <label>Set a Flag<span class="text-danger">*</span></label>
                                    <select name="flag_id" class="select">
                                        <option hidden selected>Select Flags</option>
                                        @foreach ($flags as $flag)
                                            <option
                                                {{ old('client_type_id') == $flag->id ? 'selected' : '' }}
                                                value="{{$flag->id}}"
                                            >{{$flag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Client Type <span class="text-danger">*</span></label>
                                    <select name="client_type_id" class="select">
                                        <option hidden selected>Select Type</option>
                                        @foreach ($client_types as $type)
                                            <option

                                                {{ old('client_type_id') == $type->id ? 'selected' : '' }}
                                                value="{{$type->id}}"
                                            >{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 mr-2">
                                <div class="form-group">
                                    <label>Marital<span class="text-danger">*</span></label>
                                    <select name="marital" class="select">
                                        <option hidden selected>Select Status</option>
                                        @foreach (marital() as $status_key => $status)
                                            <option
                                                {{ old('marital') == $status_key? 'selected' : '' }}
                                                value="{{$status_key}}"
                                            >{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Client Governorate <span class="text-danger">*</span></label>
                                    <select name="governorates" class="select">
                                        <option hidden selected>Select Governorate</option>
                                        @foreach (governorates()  as $key => $value)
                                            @for($i = 0; $i < count((array)$value); $i++)
                                                <option
                                                    {{ old('governorates') == $value[$i]->governorate_name_en ? 'selected' : '' }}
                                                    value="{{$value[$i]->governorate_name_en}}"
                                                >{{$value[$i]->governorate_name_en}}</option>
                                            @endfor
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Client City <span class="text-danger">*</span></label>
                                    <select name="city" class="select">
                                        <option>Select City</option>

                                        @foreach (governorates('cities')  as $key => $value)
                                            @for($i = 0; $i < count((array)$value); $i++)
                                                <option
                                                    {{ old('city') == $value[$i]->city_name_en ? 'selected' : '' }}
                                                    value="{{$value[$i]->city_name_en}}"
                                                >{{$value[$i]->city_name_en}}</option>
                                            @endfor
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

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.editbtn').on('click', function () {
                $('#edit_client').modal('show');
                var id = $(this).data('id');
                var firstname = $(this).data('firstname');
                var middlename = $(this).data('middlename');
                var lastname = $(this).data('lastname');
                var email = $(this).data('email');
                var phone = $(this).data('phone');
                var avatar = $(this).data('avatar');
                var company = $(this).data('company');

                $('#edit_id').val(id);
                $('.edit_firstname').val(firstname);
                $('.edit_middle').val(middlename);
                $('.edit_lastname').val(lastname);
                $('.edit_email').val(email);
                $('.edit_phone').val(phone);
                $('.edit_company').val(company);
                $('.edit_avatar').val(avatar);
            })
        })
    </script>
@endsection
