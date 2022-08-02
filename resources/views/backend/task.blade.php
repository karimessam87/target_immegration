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
  <div class="row task-way">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card">
            <div class="card-block">
              <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                  <img class="img-fluid rounded-circle" style="width:70px;"
                       src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="dashboard-user">
                </div>
                <div class="col">
                  <h5>John Doe</h5>
                  <span>UX Designer</span>
                </div>
              </div>
              <ul class="task-list">
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card">
            <div class="card-block">
              <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                  <img class="img-fluid rounded-circle" style="width:70px;"
                       src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="dashboard-user">
                </div>
                <div class="col">
                  <h5>User Doe</h5>
                  <span>UX Designer</span>
                </div>
              </div>
              <ul class="task-list">
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card">
            <div class="card-block">
              <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                  <img class="img-fluid rounded-circle" style="width:70px;"
                       src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="dashboard-user">
                </div>
                <div class="col">
                  <h5>John Doe</h5>
                  <span>UX Designer</span>
                </div>
              </div>
              <ul class="task-list">
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card">
            <div class="card-block">
              <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                  <img class="img-fluid rounded-circle" style="width:70px;"
                       src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="dashboard-user">
                </div>
                <div class="col">
                  <h5>User Doe</h5>
                  <span>UX Designer</span>
                </div>
              </div>
              <ul class="task-list">
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
                <li>
                  <i class="task-icon bg-c-green"></i>
                  <h6>Anton Knudsen<span class="float-right text-muted">14 MAY</span></h6>
                  <p class="text-muted">Lorem ipsum is dolorem…</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Client Modal -->

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


