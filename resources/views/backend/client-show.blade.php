@extends('layouts.backend')

@section('styles')
  <!-- Datatable CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('page-header')
  {{--  Data--}}
  <a data-id="{{$client->id}}"
     data-firstname="{{$client->firstname}}"
     data-middlename="{{$client->middlename}}"
     data-lastname="{{$client->lastname}}"
     data-email="{{$client->email}}"
     data-phone="{{$client->phone}}"
     data-avatar="{{$client->avatar}}"
     data-company="{{$client->company}}"
     class="dropdown-item data-btn"
  >

  </a>
  {{--End Data--}}
  <div class="row align-items-center">
    <div class="col">
      <h3 class="page-title">Clients</h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Clients</li>
        <li class="breadcrumb-item active">{{$client->firstname}} {{$client->lastname}}</li>
      </ul>
    </div>
    <div class="col-auto float-right ml-auto row">
      <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i
          class="fa fa-plus"></i>
        Assign Task Client</a>
    </div>
  </div>
@endsection

@section('content')
  <div class="row col-md-5 ">
    <div class="card ">
      <div class="card-body">
        <div>
          <img class=" big-avatar" src="{{$client->avatar()}}">
        </div>
        <div class="text-center mt-1">
          @if($client->file)
            <h5>F-NO : {{$client->file->number}}</h5>
            <h5>NOC : {{$client->file->noc ?? ''}}</h5>
          @else
            <h5>
              <a href="{{route('files.index')}}">Open New File</a>
            </h5>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="myTabs">
      <div class="text-center mb-4">
               <span class="badge badge-success"
                     style="background:{{$client->label->color}} !important;">{{$client->label->name}} </span>
        <span class="badge badge-success"
              style="background:{{$client->flag->color}} !important;">{{$client->flag->name}}</span>
        <span class="badge badge-success"
              style="background:{{$client->clientType->color}} !important;">{{$client->clientType->name}}</span>
      </div>
      <input type="radio" id="tab1" name="tab-control" checked>
      <input type="radio" id="tab2" name="tab-control">
      <input type="radio" id="tab3" name="tab-control">
      <input type="radio" id="tab4" name="tab-control">


      <ul>
        <li title="File Contents"><label for="tab1" role="button">
            <i class="la la-pencil"></i>
            <br><span>Basic Data</span></label></li>
        <li title="Documents"><label for="tab2" role="button">
            <i class="la la-folder-open"></i>
            <br><span>Personal Documents</span></label></li>
        <li title="Education"><label for="tab3" role="button">
            <i class="la la-folder-open"></i>
            <br><span>Education</span></label></li>
        <li title="Languages"><label for="tab4" role="button">
            <i class="la la-folder-open"></i>
            <br><span>Languages</span></label></li>
      </ul>

      <div class="slider">
        <div class="indicator">
        </div>
      </div>
      <div class="content">
        <section>
          <h2>Basic Data</h2>
          <div class="row mt-3 mb-3">
            <div class="btn-group">
              <div class="ml-1">
                <a href="#more_data" class="btn btn-outline-primary"><i
                    class="la la-plus-circle"></i>
                  Additional Data</a>
              </div>
              <div class="ml-1">
                <a href="#" class="btn btn-outline-info family-btn"><i
                    class="la la-child"></i>
                  Family</a>
              </div>
            </div>

          </div>
          <form class="mb-5" method="POST" enctype="multipart/form-data"
                action="{{route('clients.updated',$client)}}">
            @csrf
            @method("PUT")


            <div class="row mt-4 family-show family">
              <div class="col-md-3 ">
                <div class="form-group">
                  <label>Pick A Parent<span class="text-danger">*</span></label>
                  <select name="parent_id" class="select">
                    <option hidden selected disabled>
                      Choose Parent
                    </option>
                    @forelse ($clients->except([$client->id,...$client->childern->pluck('id')->toArray()]) as $parent)

                      <option
                        {{$client->parent?->id == $parent->id ? 'selected' : ''}}
                        value="{{$parent->id}}">
                        {{$parent->firstname}} {{$parent->middlename}} {{$parent->firstname}}
                      </option>
                    @empty
                      <option>
                        There's No Clients To Choose
                      </option>

                    @endforelse
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Pick A Spouse<span class="text-danger">*</span></label>
                  <select name="spouse_id" class="select" value="">
                    <option hidden selected disabled>
                      Choose Spouse
                    </option>
                    @forelse($clients->except([$client->id,...$client->childern->pluck('id')->toArray()])  as $spouse)
                      <option
                        {{$client->spouse?->id == $spouse->id ? 'selected' : ''}}
                        value="{{$spouse->id}}">
                        {{$spouse->firstname}} {{$spouse->middlename}} {{$spouse->firstname}}
                      </option>
                    @empty
                      <option>
                        There's No Clients To Choose
                      </option>
                    @endforelse
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <input type="hidden" id="edit_id" name="id" value="{{$client->id}}">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">First Name

                  </label>
                  <input class="form-control edit_firstname" name="firstname"
                         type="text"
                  >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Middle Name </label>
                  <input class="form-control edit_middle" name="middlename"
                         type="text"
                  >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Last Name</label>
                  <input class="form-control edit_lastname" name="lastname"
                         type="text"
                         value="{{$client->lastname}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Email </label>
                  <input class="form-control floating edit_email" name="email"
                         type="email"
                         value="{{$client->email}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Password </label>
                  <input class="form-control floating" name="password"
                         type="password"
                  >
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Client Picture</label>
                  <input class="form-control floating edit_avatar" name="avatar"
                         type="file">
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
                  <input class="form-control edit_company" name="company"
                         type="text">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group" style="margin-top: 1rem;">
                  <label class="col-form-label mr-1">
                    Male
                    <input class=" custom-radio" id="male" name="gender"
                           type="radio"
                           value="male"
                      {{$client->gender ==  'male' ? 'checked' : ''}}
                    >
                  </label>
                  <label class="col-form-label ml-1">
                    Female
                    <input class=" custom-radio" id="female" name="gender"
                           type="radio"
                           value="female"
                      {{$client->gender ==  'female' ? 'checked' : ''}}
                    >


                  </label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Change The Label</label>
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
                        {{ old('flag_id') == $flag->id ? 'selected' : '' }}
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
                    <option selected value="{{$client->marital}}">
                      {{marital()[$client->marital]}}
                    </option>
                    @foreach (marital() as $status_key => $status)
                      <option
                        {{ $client->marital == $status_key ? 'selected' : '' }}
                        value="{{$status_key}}"
                      >{{$status}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Client Governorate </label>
                  <select name="governorates" class="select">
                    <option hidden selected
                            value="{{trim(explode('-',$client->region)[0])}}">
                      {{trim(explode('-',$client->region)[0])}}
                    </option>
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
              <button class="btn btn-primary submit-btn">Save</button>
            </div>
          </form>
          <form method="POST" enctype="multipart/form-data"
                action="{{route('clients.update.details',$client)}}">
            @csrf
            @method("PUT")
            <div class="row">
              <input type="hidden" name="client_id" value="{{$client->id}}">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Nationality Number</label>
                  <input class="form-control" name="nationality_number"
                         type="number"
                         value="{{$client->detail->nationality_number ?? old('nationality_number')}}"
                  >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Passport Number </label>
                  <input class="form-control" name="passport_number"
                         type="number"
                         value="{{$client->detail->passport_number ?? old('passport_number')}}"
                  >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Passport Date</label>
                  <input class="form-control" name="passport_date"
                         type="date"
                         min="{{$next_month}}"
                         value="{{$client->detail->passport_date ?? old('passport_date')}}"
                  >
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Additional Phone </label>
                  <input class="form-control floating" name="additional_phone"
                         type="text"
                         value="{{$client->detail->additional_phone ?? old('additional_phone')}}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">CIC Username</label>
                  <input class="form-control floating" name="cic_username"
                         value="{{$client->detail->cic_username ?? old('cic_username')}}"
                  >
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">CIC Password</label>
                  <input class="form-control " name="cic_password" type="text"
                         value="{{$client->detail->cic_username ?? old('cic_password')}}"
                  >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Additional Email</label>
                  <input class="form-control floating" name="additional_email"
                         type="email"
                         value="{{$client->detail->additional_email ?? old('additional_email')}}"
                  >
                </div>
              </div>


              <div class="col-md-3">
                <div class="form-group" style="margin-top: 1rem;">
                  <h6>
                    Sponsor’s Eligibility
                  </h6>
                  <label class="col-form-label mr-1">
                    Yes
                    <input class=" custom-radio" id="yes" name="sponsor_eligibility"
                           type="radio"
                           value="1"
                      {{$client->detail?->sponsor_eligibility == 1 ? 'checked':''}}
                    >
                  </label>
                  <label class="col-form-label ml-1">
                    No
                    <input class=" custom-radio" id="no" name="sponsor_eligibility"
                           type="radio"
                           value="0"
                      {{$client->detail?->sponsor_eligibility == 0 ? 'checked':''}}
                    >
                  </label>
                </div>
              </div>
              <div class="col-md-3 sponsor">
                <div class="form-group">
                  <label class="col-form-label">Sponsor Name</label>
                  <input class="form-control floating " name="sponsor_name"
                         type="text"
                         value="{{$client->detail->sponsor_name ?? old('sponsor_name')}}"
                  >
                </div>
              </div>
              <div class="col-md-2 sponsor">
                <div class="form-group" style="margin-top: 1rem;">
                  <label for="canadian_status" class="col-form-label mr-1">
                    Sponsor Canadian Status
                  </label>
                  <select name="canadian_status" id="canadian_status">
                    @foreach(canadianStatus() as $canadian_status => $canadian_value)
                      <option
                        value="{{$canadian_status}}" {{$canadian_status == $client->detail?->canadian_status ? 'selected' :''}}>
                        {{$canadian_value}}
                      </option>
                    @endforeach
                  </select>

                </div>
              </div>
            </div>


            <div class="submit-section">
              <button class="btn btn-primary submit-btn">Save</button>
            </div>
          </form>

          <div class="row col-md-12 mt-5 family-show family">
            <hr>

            <div class="col-md-12">
              <div class="table-responsive">
                <div class="card-header">
                  <h1 class="text-muted">
                    Parent Table
                  </h1>
                </div>
                <table class="table table-striped custom-table datatable data-table-custom">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>phone</th>
                    <th>Nationality</th>
                    <th>Passport</th>
                    <th>Birthday</th>
                    <th>Languages</th>
                    <th>Educations</th>
                    <th>Helpers</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if ($client->parent)
                    <tr>
                      <td>
                        <h2 class="table-avatar">
                          <a href="{{route('clients.show',$client->parent?->id)}}" class="avatar avatar-table ">
                            <img src="{{$client->parent->avatar()}}">
                          </a>
                          <span style="color:{{$client->parent->clientType->color}};">
                              {{$client->parent->full_name }}
                              </span>
                        </h2>
                      </td>
                      <td>
                        {{$client->parent->email}}
                      </td>
                      <td>
                        {{$client->parent->phone}}
                      </td>

                      <td>{{$client->parent->detail->passport_number ?? 'Empty'}}</td>
                      <td>{{$client->parent->detail->nationality_number ?? 'Empty'}}</td>
                      <td>
                          <span class="badge badge-info"
                          >
                            {{$client->parent->birthday ?? 'Not Determined'}}
                            </span>

                      </td>
                      <td>
                        @if($client->parent->languages->isNotEmpty())
                          @foreach($client->parent->languages as $parent_lang)
                            {{$parent_lang->name}}
                          @endforeach
                        @else
                          Empty
                        @endif
                      </td>

                      <td>
                        @if($client->parent->certificates->isNotEmpty())
                          @foreach($client->parent->certificates as $parent_certi)
                            <a href="{{$parent_certi->certificate()}}" download>
                            <span class="badge badge-info">
                              {{$parent_certi->name}}
                            </span>
                            </a>
                          @endforeach
                        @else
                          Empty
                        @endif


                      </td>
                      <td>
                           <span class="badge badge-info"
                                 style="background:{{$client->parent->flag->color}} !important;">
                            {{$client->parent->flag->name}}
                            </span>
                        <span class="badge badge-info"
                              style="background:{{$client->parent->clientType->color}} !important;">
                            {{$client->parent->clientType->name}}
                            </span>
                      </td>

                      <td class="text-right">
                        <div class="dropdown dropdown-action">
                          <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                             data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                          <div class="dropdown-menu dropdown-menu-right">

                            <a href="{{route('clients.parent.destroy',$client)}}" class="dropdown-item ">
                              <i class="fa fa-trash-o m-r-5"></i>
                              Delete
                            </a>

                          </div>
                        </div>
                      </td>
                    </tr>

                  @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <div class="card-header">
                  <h1 class="text-muted">
                    Spouse Table
                  </h1>
                </div>
                <table class="table table-striped custom-table datatable data-table-custom">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>phone</th>
                    <th>Nationality</th>
                    <th>Passport</th>
                    <th>Birthday</th>
                    <th>Languages</th>
                    <th>Educations</th>
                    <th>Helpers</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if ($client->spouse)
                    <tr>
                      <td>
                        <h2 class="table-avatar">
                          <a href="{{route('clients.show',$client->spouse?->id)}}" class="avatar avatar-table ">
                            <img src="{{$client->spouse->avatar()}}">
                          </a>
                          <span style="color:{{$client->spouse->clientType->color}};">
                              {{$client->spouse->full_name }}
                              </span>
                        </h2>
                      </td>
                      <td>
                        {{$client->spouse->email}}
                      </td>
                      <td>
                        {{$client->spouse->phone}}
                      </td>

                      <td>{{$client->spouse->detail->passport_number ?? 'Empty'}}</td>
                      <td>{{$client->spouse->detail->nationality_number ?? 'Empty'}}</td>
                      <td>
                          <span class="badge badge-info"
                          >
                            {{$client->spouse->birthday ?? 'Not Determined'}}
                            </span>

                      </td>
                      <td>
                        @if($client->spouse->languages->isNotEmpty())
                          @foreach($client->spouse->languages as $spouse_lang)
                            {{$spouse_lang->name}}
                          @endforeach
                        @else
                          Empty
                        @endif
                      </td>

                      <td>
                        @if($client->spouse->certificates->isNotEmpty())
                          @foreach($client->spouse->certificates as $spouse_certi)
                            <a href="{{$spouse_certi->certificate()}}" download>
                            <span class="badge badge-info">
                              {{$spouse_certi->name}}
                            </span>
                            </a>
                          @endforeach
                        @else
                          Empty
                        @endif


                      </td>
                      <td>
                           <span class="badge badge-info"
                                 style="background:{{$client->spouse->flag->color}} !important;">
                            {{$client->spouse->flag->name}}
                            </span>
                        <span class="badge badge-info"
                              style="background:{{$client->spouse->clientType->color}} !important;">
                            {{$client->spouse->clientType->name}}
                            </span>
                      </td>

                      <td class="text-right">
                        <div class="dropdown dropdown-action">
                          <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                             data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                          <div class="dropdown-menu dropdown-menu-right">

                            <a href="{{route('clients.spouse.destroy',$client)}}" class="dropdown-item ">
                              <i class="fa fa-trash-o m-r-5"></i>
                              Delete
                            </a>

                          </div>
                        </div>
                      </td>
                    </tr>

                  @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <div class="card-header">
                  <h1 class="text-muted">
                    Children
                  </h1>
                </div>
                <table class="table table-striped custom-table datatable data-table-custom">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>phone</th>
                    <th>Nationality</th>
                    <th>Passport</th>
                    <th>Birthday</th>
                    <th>Languages</th>
                    <th>Educations</th>
                    <th>Helpers</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @if ($client->childern->isNotEmpty())
                    @foreach($client->childern as $child)
                      <tr>
                        <td>
                          <h2 class="table-avatar">
                            <a href="{{route('clients.show',$child->id)}}" class="avatar avatar-table ">
                              <img src="{{$child->avatar()}}">
                            </a>
                            <span style="color:{{$child->clientType->color}};">
                              {{$child->full_name}}
                              </span>
                          </h2>
                        </td>
                        <td>
                          {{$child->email}}
                        </td>
                        <td>
                          {{$child->phone}}
                        </td>

                        <td>{{$child->detail->passport_number ?? 'Empty'}}</td>
                        <td>{{$child->detail->nationality_number ?? 'Empty'}}</td>
                        <td>
                          <span class="badge badge-info"
                          >
                            {{$child->birthday ?? 'Not Determined'}}
                            </span>

                        </td>
                        <td>
                          @if($child->languages->isNotEmpty())
                            @foreach($child->languages as $child_lang)
                              {{$child_lang->name}}
                            @endforeach
                          @else
                            Empty
                          @endif
                        </td>

                        <td>
                          @if($child->certificates->isNotEmpty())
                            @foreach($child->certificates as $child_certi)
                              <a href="{{$child_certi->certificate()}}" download>
                            <span class="badge badge-info">
                              {{$child_certi->name}}
                            </span>
                              </a>
                            @endforeach
                          @else
                            Empty
                          @endif


                        </td>
                        <td>
                           <span class="badge badge-info"
                                 style="background:{{$child->flag->color}} !important;">
                            {{$child->flag->name}}
                            </span>
                          <span class="badge badge-info"
                                style="background:{{$child->clientType->color}} !important;">
                            {{$child->clientType->name}}
                            </span>
                        </td>

                        <td class="text-right">
                          <div class="dropdown dropdown-action">
                            <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                               data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">

                              <a href="{{route('clients.spouse.destroy',$client)}}" class="dropdown-item ">
                                <i class="fa fa-trash-o m-r-5"></i>
                                Delete
                              </a>

                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>

        <section>
          <h2>Personal Documents</h2>
          <div class="row col-md-12">
            <form class="mb-5" method="POST" enctype="multipart/form-data"
                  action="{{route('clients.document.upload.update',$client)}}">
              @csrf
              @method("POST")
              <div class="row">
                <input type="hidden" name="client_id" value="{{$client->id}}">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Document Name</label>
                    <input class="form-control " name="name"
                           type="text"
                           value="{{old('name')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Issue Date</label>
                    <input class="form-control floating " name="issue_date"
                           type="date"
                           max="{{date("Y-m-d")}}"
                           value="{{old('issue_date')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Expire Date</label>
                    <input class="form-control floating " name="expire_date"
                           type="date"
                           min="{{$next_month}}"
                           value="{{old('expire_date')}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">File Description</label>
                    <input class="form-control " name="description"
                           type="text"
                           value="{{old('description')}}">
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Attache File</label>
                    <input class="form-control edit_company" name="file"
                           type="file">
                  </div>
                </div>
                <div class="mt-5 col-12 row">
                  <div class="col-lg-5 col-md-12 ">
                    <div class="form-group">
                      <label for="country_issue">Country Issue<span
                          class="text-danger">*</span></label>
                      <select name="country_issue" class="select" id="country_issue">
                        <option hidden selected>
                          Choose A Country
                        </option>
                        @foreach ($countries  as $key => $value)
                          <option
                            {{old('country_issue') === $value->name->common ? 'selected' : ''}}
                            value="{{$value->name->common}}"
                          >
                            {{$value->name->common}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-3 ">
                    <div class="form-group">

                      <label>Set A Label <span
                          class="text-danger">*</span></label>
                      <select name="label_id" class="select">
                        <option selected hidden>
                          Select A Label
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

                  <div class="col-3 col-md-3">
                    <div class="form-group">
                      <label>Change a Flag <span class="text-danger">*</span></label>
                      <select name="flag_id" class="select">
                        <option selected hidden>
                          Select A Flag
                        </option>
                        @foreach ($flags as $flag)
                          <option
                            {{ old('client_type_id') == $flag->id ? 'selected' : '' }}
                            value="{{$flag->id}}"
                          >{{$flag->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-3 col-md-3">
                    <div class="form-group">
                      <label>Document Type <span class="text-danger">*</span></label>
                      <select name="document_type_id" class="select">
                        <option selected hidden>
                          Select A Type
                        </option>
                        @foreach ($document_types as $d_type)
                          <option
                            {{ old('document_type_id') == $d_type->id ? 'selected' : '' }}
                            value="{{$d_type->id}}"
                          >{{$d_type->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                </div>

              </div>

              <div class="submit-section">
                <button class="btn btn-primary submit-btn">Save</button>
              </div>
            </form>
          </div>
          <hr>
          <div class="row col-md-12 mt-5">
            <div class="col-md-12">
              <div class="table-responsive data-table-custom">
                <table class="table table-striped custom-table datatable">
                  <thead>
                  <tr>
                    <th>File Name</th>
                    <th>Description</th>
                    <th>Attachment</th>
                    <th>Issue Date</th>
                    <th>Expire Date</th>
                    <th>Helpers</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @if ($client->documents->isNotEmpty())
                    @foreach ($documents_helpers as $client_document)
                      <tr>
                        <td>
                          <h2 class="table-avatar">
                            <a href="{{$client_document->attachment()}}" class="avatar avatar-fix">
                              <i class="la la-file-archive-o font-32"></i>
                            </a>
                            <span style="color:{{$client->clientType->color}};">
                            {{$client_document->name}}
                            </span>
                          </h2>
                        </td>
                        <td>{{$client_document->description}}</td>
                        <td>

                          <a href="{{$client_document->attachment()}}" download>
                              <span class="badge badge-info">
                              Click To Download
                               </span>
                          </a>

                        </td>
                        <td>{{$client_document->issue_date}}</td>
                        <td>{{$client_document->expire_date}}</td>
                        <td>
                          <span class="badge badge-success"
                                style="background:{{$client_document->flag->color}} !important;">
                            {{$client_document->flag->name}}
                          </span>
                          <span class="badge badge-success"
                                style="background:{{$client_document->label->color}} !important;">
                            {{$client_document->label->name}}
                          </span>

                        </td>

                        <td class="text-right">
                          <div class="dropdown dropdown-action">
                            <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                               data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">

                              <form method="post"
                                    action="{{route('clients.document.upload.destroy',$client_document)}}">
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

                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </section>
        <section>
          <h2>Education</h2>
          <div class="row col-md-12">

            <form class="mb-5" method="POST" enctype="multipart/form-data"
                  action="{{route('clients.education.certificate.update',$client)}}">
              @csrf
              @method("POST")
              <div class="row">
                <input type="hidden" name="client_id" value="{{$client->id}}">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Degree</label>
                    <input class="form-control" name="degree"
                           type="number"
                           value="{{old('degree')}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Transcript</label>
                    <input class="form-control" name="transcript"
                           type="text"
                           value="{{old('transcript')}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">ECA</label>
                    <input class="form-control" name="eca"
                           type="text"
                           value="{{old('eca')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">University</label>
                    <input class="form-control " name="university"
                           type="text"
                           value="{{old('university')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Field</label>
                    <input class="form-control " name="field"
                           type="text"
                           value="{{old('field')}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Faculty Name</label>
                    <input class="form-control " name="faculty_name"
                           type="text"
                           value="{{old('faculty_name')}}">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">From Date</label>
                    <input class="form-control floating " name="from_date"
                           type="date"
                           value="{{old('from_date')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">To Date</label>
                    <input class="form-control floating " name="to_date"
                           type="date"
                           min="{{$next_month}}"
                           value="{{old('to_date')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Issue Date</label>
                    <input class="form-control floating " name="issue_date"
                           type="date"
                           max="{{date("Y-m-d")}}"
                           value="{{old('issue_date')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Graduation Date</label>
                    <input class="form-control floating " name="graduation_date"
                           type="date"
                           value="{{old('graduation_date')}}">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Certificate</label>
                    <input class="form-control " name="certificate"
                           type="file" value="{{old('certificate')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Credential Report</label>
                    <input class="form-control" name="credential_report"
                           type="file" value="{{old('credential_report')}}"
                    >
                  </div>
                </div>
                <div class="mt-5 col-12 row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="country_issue">Country Issue<span
                          class="text-danger">*</span></label>
                      <select name="country_issue" class="select" id="country_issue">
                        <option hidden selected>
                          Choose A Country
                        </option>
                        @foreach ($countries  as $key => $value)
                          <option
                            {{old('country_issue') === $value->name->common ? 'selected' : ''}}
                            value="{{$value->name->common}}"
                          >
                            {{$value->name->common}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Change a Flag <span class="text-danger">*</span></label>
                      <select name="flag_id" class="select">
                        <option hidden selected>
                          Select Flag
                        </option>
                        @foreach ($flags as $flag)
                          <option
                            {{ old('client_type_id') == $flag->id ? 'selected' : '' }}
                            value="{{$flag->id}}"
                          >{{$flag->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                </div>

              </div>

              <div class="submit-section">
                <button class="btn btn-primary submit-btn">Save</button>
              </div>
            </form>
          </div>
          <hr>
          <div class="row col-md-12 mt-5">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped custom-table datatable data-table-custom">
                  <thead>
                  <tr>
                    <th>University / Faculty</th>
                    <th>Field /Degree</th>
                    <th>ECA</th>
                    <th>Graduation Date</th>
                    <th>From / To</th>
                    <th>Issue Date</th>
                    <th>Downloads</th>
                    <th>Helpers</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if ($client->certificates->isNotEmpty())
                    @foreach ($client->certificates as $client_education)
                      <tr>

                        <td>
                          <h2 class="table-avatar">
                            <a href="{{$client_education->certificate()}}" class="avatar avatar-fix" download>
                              <i class="la la-file-archive-o font-32"></i>
                            </a>
                            <span style="color:{{$client->clientType->color}};">
                              {{$client_education->university .' /'. $client_education->faculty_name }}
                              </span>
                          </h2>
                        </td>

                        <td>
                          {{$client_education->field}}
                          <span class="badge badge-info">
                            {{$client_education->degree}}
                          </span>
                        </td>

                        <td>{{$client_education->eca}}</td>
                        <td>{{$client_education->graduation_date}}</td>
                        <td>
                          <span class="badge badge-success"
                          >
                            {{$client_education->from_date}}
                            </span>
                          <span class="badge badge-warning">
                            {{$client_education->to_date}}
                            </span>
                        </td>
                        <td>{{$client_education->issue_date}}</td>

                        <td>
                          <a href="{{$client_education->certificate()}}" download>
                            <span class="badge badge-info">
                              Download Certificate
                            </span>
                          </a>
                          <a href="{{$client_education->report()}}" download>
                            <span class="badge badge-info">
                              Download Report
                            </span>
                          </a>
                        </td>
                        <td>
                           <span class="badge badge-info"
                                 style="background:{{$client_education->flag->color}} !important;">
                            {{$client_education->flag->name}}
                            </span>
                        </td>

                        <td class="text-right">
                          <div class="dropdown dropdown-action">
                            <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                               data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">

                              <form method="post"
                                    action="{{route('clients.education.certificate.destroy',$client_education)}}">
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

                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
        <section>
          <h2>Languages</h2>
          <div class="row col-md-12">

            <form class="mb-5" method="POST" enctype="multipart/form-data"
                  action="{{route('clients.education.language.update',$client)}}">
              @csrf
              @method("POST")
              <div class="row">
                <input type="hidden" name="client_id" value="{{$client->id}}">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Name</label>
                    <input class="form-control" name="name"
                           type="text"
                           value="{{old('name')}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Test</label>
                    <input class="form-control" name="test"
                           type="text"
                           value="{{old('test')}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Certificate Number</label>
                    <input class="form-control" name="certificate_number"
                           type="text"
                           value="{{old('certificate_number')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Issue Date</label>
                    <input class="form-control floating " name="issue_date"
                           type="date"
                           max="{{date("Y-m-d")}}"
                           value="{{old('issue_date')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Expire Date</label>
                    <input class="form-control floating " name="expire_date"
                           type="date"
                           min="{{$next_month}}"
                           value="{{old('expire_date')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Listening</label>
                    <input class="form-control " name="listening"
                           type="number"
                           value="{{old('listening')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Reading</label>
                    <input class="form-control " name="reading"
                           type="number"
                           value="{{old('reading')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Writing</label>
                    <input class="form-control " name="writing"
                           type="number"
                           value="{{old('writing')}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Speaking</label>
                    <input class="form-control " name="speaking"
                           type="number"
                           value="{{old('speaking')}}">
                  </div>
                </div>


                <div class="mt-5 col-12 row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Change a Flag <span class="text-danger">*</span></label>
                      <select name="flag_id" class="select">
                        <option hidden selected>
                          Select Flag
                        </option>
                        @foreach ($flags as $flag)
                          <option
                            {{ old('client_type_id') == $flag->id ? 'selected' : '' }}
                            value="{{$flag->id}}"
                          >{{$flag->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

              </div>

              <div class="submit-section">
                <button class="btn btn-primary submit-btn">Save</button>
              </div>
            </form>
          </div>
          <hr>
          <div class="row col-md-12 mt-5">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped custom-table datatable data-table-custom">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Test</th>
                    <th>Certificate Number</th>
                    <th>Listening</th>
                    <th>Reading</th>
                    <th>Writing</th>
                    <th>Speaking</th>
                    <th>Issue - Expire Date</th>
                    <th>Helpers</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if ($client->languages->isNotEmpty())
                    @foreach ($client->languages as $language)
                      <tr>

                        <td>
                          <h2 class="table-avatar">
                            <a href="#" class="avatar avatar-fix" download>
                              <i class="la la-language font-32"></i>
                            </a>
                            <span style="color:{{$client->clientType->color}};">
                              {{$language->name}}
                              </span>
                          </h2>
                        </td>

                        <td>
                          {{$language->test}}
                        </td>

                        <td>{{$language->certificate_number}}</td>
                        <td>
                          <span class="badge badge-info">
                            {{$language->listening}}
                          </span>
                        </td>
                        <td>
                           <span class="badge badge-success">
                            {{$language->reading}}
                          </span>
                        </td>
                        <td>
                           <span class="badge badge-warning">
                            {{$language->writing}}
                          </span>
                        </td>
                        <td>
                           <span class="badge badge-purple">
                            {{$language->speaking}}
                          </span>
                        </td>
                        <td>
                          <span class="badge badge-success">
                            {{$language->expire_date}}
                          </span>
                          <span class="badge badge-danger">
                            {{$language->issue_date}}
                          </span>
                        </td>

                        <td>
                           <span class="badge badge-info"
                                 style="background:{{$language->flag->color}} !important;">
                            {{$language->flag->name}}
                            </span>
                        </td>

                        <td class="text-right">
                          <div class="dropdown dropdown-action">
                            <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                               data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">

                              <form method="post"
                                    action="{{route('clients.education.language.destroy',$language)}}">
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

                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="second-tabs col-12">

      <div class="wrapper" id="more_data">
        <div class="tabs">
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
            <label for="tab-1" class="tab-label"><i class="la la-paperclip"></i>Financial And Reports</label>
            <div class="tab-content col-12">
              <div class="row col-md-12">
                <form class="mb-5 col-12" method="POST" enctype="multipart/form-data"
                      action="{{route('clients.financial.report.update',$client)}}">
                  @csrf
                  @method("POST")
                  <div class="row col-12">
                    <input type="hidden" name="client_id" value="{{$client->id}}">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Bank Name</label>
                        <input class="form-control " name="bank_name"
                               type="text"
                               value="{{$client->financialReport->bank_name ?? old('bank_name')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Balance</label>
                        <input class="form-control " name="balance"
                               type="number"
                               value="{{$client->financialReport->balance ?? old('balance')}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">Due Date</label>
                        <input class="form-control " name="due_date"
                               type="date"
                               value="{{$client->financialReport->due_date ?? old('due_date')}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">Payment Date</label>
                        <input class="form-control " name="payment_date"
                               type="date"
                               value="{{$client->financialReport->payment_date ?? old('payment_date')}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">Statement Date</label>
                        <input class="form-control " name="statement_date"
                               type="date"
                               value="{{$client->financialReport->statement_date ?? old('statement_date')}}">
                      </div>
                    </div>


                  </div>

                  <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Save</button>
                  </div>
                </form>
              </div>
              <hr>
              <div class="row col-md-12 mt-5">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped custom-table datatable data-table-custom">
                      <thead>
                      <tr>
                        <th>Bank Name</th>
                        <th>Balance</th>
                        <th>Statement Date</th>
                        <th>Due Date</th>
                        <th>Payment Date</th>
                        <th class="text-right">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @if ($client->financialReports->isNotEmpty())
                        @foreach ($client->financialReports as $financial_report )
                          <tr>

                            <td>
                              <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-fix" download>
                                  <i class="la la-dollar font-32"></i>
                                </a>
                                <span style="color:{{$client->clientType->color}};">
                                {{$financial_report->bank_name}}
                              </span>
                              </h2>
                            </td>

                            <td>

                              <span class="badge badge-warning">
                                {{$financial_report->balance}} &dollar;
                             </span>
                            </td>

                            <td>
                              <span class="badge badge-warning">
                              {{$financial_report->due_date}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{$financial_report->statement_date}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{$financial_report->payment_date}}
                              </span>
                            </td>


                            <td class="text-right">
                              <div class="dropdown dropdown-action">
                                <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                                   data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">

                                  <form method="post"
                                        action="{{route('clients.financial.report.destroy',$financial_report)}}">
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

                      @endif
                      @if ($client->spouse && count($client->spouse->financialReports))
                        <h1>
                          With Spouse Data
                        </h1>
                        @foreach ($client->spouse->financialReports as $client_spouse_financial)
                          <tr>
                            <td>
                              <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-fix" download>
                                  <i class="la la-dollar font-32"></i>
                                </a>
                                <span style="color:{{$client_spouse_financial->clientType?->color}};">
                                  <span class="badge badge-warning">
                                      Spouse
                                  </span>
                                <strong>{{$client_spouse_financial->bank_name}}</strong>
                              </span>
                              </h2>
                            </td>

                            <td>

                              <span class="badge badge-warning">
                                {{$client_spouse_financial->balance}}
                             </span>
                            </td>

                            <td>
                              <span class="badge badge-warning">
                              {{$client_spouse_financial->due_date}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{$client_spouse_financial->statement_date}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{$client_spouse_financial->payment_date}}
                              </span>
                            </td>


                            <td class="text-right">
                              <div class="dropdown dropdown-action">
                                <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                                   data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">


                                </div>
                              </div>
                            </td>
                          </tr>
                        @endforeach

                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
            <label for="tab-2" class="tab-label">
              <i class="la la-wifi"></i>
              Canadian Connections
            </label>
            <div class="tab-content col-12">
              <div class="row col-md-12">
                <form class="mb-5 col-12" method="POST" enctype="multipart/form-data"
                      action="{{route('clients.canadian.connection.update',$client)}}">
                  @csrf
                  @method("POST")
                  <div class="row col-12">
                    <input type="hidden" name="client_id" value="{{$client->id}}">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Firstname</label>
                        <input class="form-control " name="firstname"
                               type="text"
                               value="{{old('firstname')}}">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Lastname</label>
                        <input class="form-control " name="lastname"
                               type="text"
                               value="{{old('lastname')}}">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="col-form-label">Related</label>
                        <input class="form-control " name="related"
                               type="text"
                               value="{{old('related')}}">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="col-form-label">Relationship</label>
                        <input class="form-control " name="relationship"
                               type="text"
                               value="{{old('relationship')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Leave A Note</label>
                        <input class="form-control " name="note"
                               type="text"
                               value="{{old('note')}}">
                      </div>
                    </div>
                    <div class="col-md-4 mt-4">
                      <div class="form-group">
                        <label>Connection City <span class="text-danger">*</span></label>
                        <select name="province" class="select">
                          <option hidden selected disabled>
                            Select Province
                          </option>
                          @foreach ($canada_province  as $key => $value)
                            <option
                              {{ old('province') == $value ? 'selected' : '' }}
                              value="{{$value}}"
                            >{{$value}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 mt-4">
                      <div class="form-group">
                        <label>Connection Status <span class="text-danger">*</span></label>
                        <select name="status" class="select">
                          <option hidden selected disabled>
                            Select Status
                          </option>
                          @foreach (canadianStatus()  as $key => $value)
                            <option
                              {{ old('status') == $key ? 'selected' : '' }}
                              value="{{$key}}"
                            >{{$value}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>


                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="col-form-label">Attach Document</label>
                        <input class="form-control " name="document"
                               type="file"
                               value="{{old('document')}}">
                      </div>
                    </div>
                    <div class="row col-12">
                      <div class="col-md-3  col-lg-2 edu-main-select">
                        <h6>Has Education ?</h6>
                        <div class="form-group">
                          <label class="col-form-label">Yes
                            <input class="form-control " name="education"
                                   type="radio"
                                   value="1" {{old('education') == '0' ? 'checked' : ''}} checked
                            >
                          </label>
                          <label class="col-form-label">No
                            <input class="form-control " name="education"
                                   type="radio"
                                   value="0" {{old('education') == '1' ? 'checked' : ''}}
                            >
                          </label>
                        </div>
                      </div>
                      <div class="col-md-3 col-lg-2 work-main-select">
                        <h6>Has Work ?</h6>
                        <div class="form-group">
                          <label class="col-form-label">Yes
                            <input class="form-control " name="work"
                                   type="radio"
                                   value="1" {{old('work') == '0' ? 'checked' : ''}} checked
                            >
                          </label>
                          <label class="col-form-label">No
                            <input class="form-control " name="work"
                                   type="radio"
                                   value="0" {{old('work') == '1' ? 'checked' : ''}}
                            >
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 work-select work-visible">
                      <div class="form-group">
                        <label class="col-form-label">More Education Information</label>
                        <input class="form-control " name="education_note"
                               type="text"
                               value="{{old('education_note')}}">
                      </div>
                    </div>
                    <div class="col-md-6 edu-select edu-visible">
                      <div class="form-group">
                        <label class="col-form-label">More Work Information</label>
                        <input class="form-control " name="work_note"
                               type="text"
                               value="{{old('work_note')}}">
                      </div>
                    </div>

                  </div>

                  <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Save</button>
                  </div>
                </form>
              </div>
              <hr>
              <div class="row col-md-12 mt-5">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped custom-table datatable data-table-custom">
                      <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>Related</th>
                        <th>Relationship</th>
                        <th>Province</th>
                        <th>Education</th>
                        <th>Work</th>
                        <th>Status</th>
                        <th>Note</th>
                        <th>Attachment</th>
                        <th class="text-right">Action</th>
                      </tr>
                      </thead>
                      <tbody>

                      @if ($client->canadianConnections->isNotEmpty())
                        @foreach ($client->canadianConnections as $canadian_connection)
                          <tr>

                            <td>
                              <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-fix">
                                  <i class="la la-signal font-32"></i>
                                </a>
                                <span style="color:{{$client->clientType->color}};">
                                {{$canadian_connection?->firstname .' '. $canadian_connection->lastname }}
                              </span>
                              </h2>
                            </td>

                            <td>

                              <span class="badge badge-warning">
                                {{$canadian_connection->related}} &dollar;
                             </span>
                            </td>

                            <td>
                              <span class="badge badge-warning">
                              {{$canadian_connection->relationship}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{$canadian_connection->province}}
                              </span>
                            </td>
                            <td>
                              <span class="text-muted">
                              {{$canadian_connection->education ? $canadian_connection->education_note : 'Empty'}}
                              </span>
                            </td>
                            <td>
                              <span class="text-muted">
                              {{$canadian_connection->work ? $canadian_connection->work_note : 'Empty'}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{canadianStatus()[$canadian_connection->status]}}
                              </span>
                            </td>
                            <td>
                              {{$canadian_connection->note}}
                            </td>
                            <td>
                              <a href="{{$canadian_connection->document()}}" download>
                              <span class="badge badge-info">
                               Download
                              </span>
                              </a>
                            </td>

                            <td class="text-right">
                              <div class="dropdown dropdown-action">
                                <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                                   data-toggle="dropdown" aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">

                                  <form method="post"
                                        action="{{route('clients.canadian.connection.destroy',$canadian_connection)}}">
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

                      @endif
                      @if ($client->spouse && count($client->spouse->canadianConnections))
                        <h1>
                          With Spouse Data
                        </h1>
                        @foreach ($client->spouse->canadianConnections as $client_spouse_canadian)
                          <tr>
                            <td>
                              <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-fix" download>
                                  <i class="la la-heart font-32"></i>
                                </a>
                                <span style="color:{{$client->clientType->color}};">
                                {{$client_spouse_canadian->firstname .' '. $client_spouse_canadian->lastname }}
                              </span>
                              </h2>
                            </td>

                            <td>

                              <span class="badge badge-warning">
                                {{$client_spouse_canadian->related}} &dollar;
                             </span>
                            </td>

                            <td>
                              <span class="badge badge-warning">
                              {{$client_spouse_canadian->relationship}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{$client_spouse_canadian->province}}
                              </span>
                            </td>
                            <td>
                              <span class="text-muted">
                              {{$client_spouse_canadian->education ? $client_spouse_canadian->education_note : 'Empty'}}
                              </span>
                            </td>
                            <td>
                              <span class="text-muted">
                              {{$client_spouse_canadian->work ? $client_spouse_canadian->work_note : 'Empty'}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{canadianStatus()[$client_spouse_canadian->status]}}
                              </span>
                            </td>
                            <td>
                              {{$client_spouse_canadian->note}}
                            </td>
                            <td>
                              <a href="{{$client_spouse_canadian->document()}}">
                              <span class="badge badge-info">
                               Download
                              </span>
                              </a>
                            </td>
                          </tr>
                        @endforeach

                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
            <label for="tab-3" class="tab-label">
              <i class="la la-briefcase"></i>
              Work History
            </label>
            <div class="tab-content col-12">
              <div class="row col-md-12">
                <form class="mb-5 col-12" method="POST" enctype="multipart/form-data"
                      action="{{route('clients.work.history.update',$client)}}">
                  @csrf
                  @method("POST")
                  <div class="row col-12">
                    <input type="hidden" name="client_id" value="{{$client->id}}">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Company</label>
                        <input class="form-control " name="company"
                               type="text"
                               value="{{old('company')}}">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Title</label>
                        <input class="form-control " name="title"
                               type="text"
                               value="{{old('title')}}">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Noc</label>
                        <input class="form-control " name="noc"
                               type="text"
                               value="{{old('noc')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Main Applicant</label>
                        <input class="form-control " name="main_applicant"
                               type="text"
                               value="{{old('main_applicant')}}">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="col-form-label">Work From</label>
                        <input class="form-control " name="work_from"
                               type="date"
                               value="{{old('work_from')}}">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="col-form-label">Work To</label>
                        <input class="form-control " name="work_to"
                               type="date"
                               value="{{old('work_to')}}">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="col-form-label">Attach Resume</label>
                        <input class="form-control " name="resume"
                               type="file"
                               value="{{old('resume')}}">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="col-form-label">Hr Letter</label>
                        <input class="form-control " name="hr_letters"
                               type="file"
                               value="{{old('hr_letters')}}">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Country</label>
                        <select name="country" class="select">
                          <option hidden selected disabled>
                            Select A Country
                          </option>
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
                        <label>City <span class="text-danger">*</span></label>
                        <select name="city" class="select">
                          <option hidden selected disabled>
                            Select A City
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
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Change a Flag <span class="text-danger">*</span></label>
                        <select name="flag_id" class="select">
                          <option hidden selected disabled>
                            Choose A Flag
                          </option>
                          @foreach ($flags as $flag)
                            <option
                              {{ old('flag_id') == $flag->id ? 'selected' : '' }}
                              value="{{$flag->id}}"
                            >{{$flag->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Save</button>
                  </div>
                </form>
              </div>
              <hr>
              <div class="row col-md-12 mt-5">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped custom-table datatable data-table-custom">
                      <thead>
                      <tr>
                        <th>Company</th>
                        <th>Title</th>
                        <th>Noc</th>
                        <th>Location</th>
                        <th>From / To</th>
                        <th>Attachment</th>
                        <th>Helpers</th>
                        <th class="text-right">Action</th>
                      </tr>
                      </thead>
                      <tbody>

                      @if ($client->workHistories->isNotEmpty())
                        @foreach ($client->workHistories as $work_history)
                          <tr>

                            <td>
                              <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-fix">
                                  <i class="la la-briefcase font-32"></i>
                                </a>
                                <span style="color:{{$client->clientType->color}};">
                                {{$work_history?->company}}
                              </span>
                              </h2>
                            </td>

                            <td>

                              <span class="badge badge-warning">
                                {{$work_history->title}}
                             </span>
                            </td>

                            <td>
                              <span class="badge badge-warning">
                              {{$work_history->noc}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{$work_history->country .' At '. $work_history->city}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                                {{$work_history->work_from}}
                              </span>
                              To
                              <span class="badge badge-warning">
                                {{$work_history->work_to}}
                              </span>
                            </td>
                            <td>
                              <a href="{{$work_history->resume()}}" download>
                              <span class="badge badge-primary">
                               {{$work_history->resume() ?'Resume': 'Empty'}}
                              </span>
                              </a>
                              <a href="{{$work_history->hr_letters()}}" download>
                              <span class="badge badge-primary">
                               {{$work_history->hr_letters() ?'Hr Letter': 'Empty'}}
                              </span>
                              </a>
                            </td>
                            <td>
                              <span class="badge badge-primary"
                                    style="background:{{$work_history->flag->color ?? 'tomato'}} !important;">
                              {{$work_history->flag->name ?? 'No Flags'}}
                              </span>
                            </td>


                            <td class="text-right">
                              <div class="dropdown dropdown-action">
                                <a href="javascript:void(0)" class="action-icon dropdown-toggle"
                                   data-toggle="dropdown" aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">

                                  <form method="post"
                                        action="{{route('clients.work.history.destroy',$work_history)}}">
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

                      @endif
                      @if ($client->spouse && count($client->spouse->workHistories))
                        <h1>
                          With Spouse Data
                        </h1>
                        @foreach ($client->spouse->canadianConnections as $client_spouse_work)
                          <tr>
                            <td>
                              <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-fix">
                                  <i class="la la-signal font-32"></i>
                                </a>
                                <span style="color:{{$client->spouse->clientType->color}};">
                                {{$client_spouse_work?->company}}
                              </span>
                              </h2>
                            </td>

                            <td>

                              <span class="badge badge-warning">
                                {{$client_spouse_work->title}} &dollar;
                             </span>
                            </td>

                            <td>
                              <span class="badge badge-warning">
                              {{$client_spouse_work->noc}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                              {{$client_spouse_work->country .' At '. $client_spouse_work->city}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-info">
                                {{$client_spouse_work->work_from}}
                              </span>
                              To
                              <span class="badge badge-warning">
                                {{$client_spouse_work->work_to}}
                              </span>
                            </td>
                            <td>
                              <span class="badge badge-primary"
                                    style="background:{{$client_spouse_work->flag->color}} !important;">
                              {{$client_spouse_work->flag->name ?? 'No Flags'}}
                              </span>
                            </td>
                            <td>
                              <a href="{{$client_spouse_work->resume()}}" download>
                              <span class="badge badge-primary">
                               {{$client_spouse_work->resume() ?'Resume': 'Empty'}}
                              </span>
                              </a>
                              <a href="{{$client_spouse_work->hr_letters()}}" download>
                              <span class="badge badge-primary">
                               {{$client_spouse_work->hr_letters() ?'Hr Letter': 'Empty'}}
                              </span>
                              </a>
                            </td>
                          </tr>
                        @endforeach

                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Client Modal -->





  <!-- /Add Client Modal -->
@endsection

@section('scripts')
  <!-- Datatable JS -->
  <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      var id = $('.data-btn').data('id');
      var firstname = $('.data-btn').data('firstname');
      var middlename = $('.data-btn').data('middlename');
      var lastname = $('.data-btn').data('lastname');
      var email = $('.data-btn').data('email');
      var phone = $('.data-btn').data('phone');
      var avatar = $('.data-btn').data('avatar');
      var company = $('.data-btn').data('company');


      $('.edit_firstname').val(firstname);
      $('.edit_middle').val(middlename);
      $('.edit_lastname').val(lastname);
      $('.edit_email').val(email);
      $('.edit_phone').val(phone);
      $('.edit_company').val(company);
      $('.edit_avatar').val(avatar);

    });
    let sponsor_part = $('.sponsor');
    let educ_part = $('.edu-select');
    let work_part = $('.work-select');
    $('[name="sponsor_eligibility"]:checked').val() == 0 ? sponsor_part.hide() : sponsor_part.show(100);
    $('[name="sponsor_eligibility"]').on('change', () => {
      $('[name="sponsor_eligibility"]:checked').val() == 0 ? sponsor_part.hide() : sponsor_part.show(100);
    });

    $('[name="education"]:checked').val() == 0 ? educ_part.hide() : educ_part.show(100);
    $('[name="education"]').on('change', () => {
      $('[name="education"]:checked').val() == 0 ? educ_part.hide() : educ_part.show(100);
    });
    $('[name="work"]:checked').val() == 0 ? work_part.hide() : work_part.show(100);
    $('[name="work"]').on('change', () => {
      $('[name="work"]:checked').val() == 0 ? work_part.hide() : work_part.show(100);
    });

    $('.family-btn').click(() => {
      $('.family-show').toggleClass('family');
    });


  </script>
@endsection


