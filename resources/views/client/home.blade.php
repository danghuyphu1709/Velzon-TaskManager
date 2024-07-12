@extends('client.layouts.master')
@include('client.home.sidebar')

@section('content')

    @if(session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif

<div class="vertical-overlay"></div>
 <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Không gian làm việc</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                                        <li class="breadcrumb-item active">Không gian làm việc</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    @foreach($tables as $item)
                    <a href="{{ route('spaces.show',$item->code ) }}"> <h4> {{ $item->space_name }}</h4></a>
                    <div class="row">
                        <div class="col-xxl-3 col-sm-6 project-card" data-bs-toggle="modal" data-bs-target="#createTableModal">
                            <div class="card card-height-100 bg-transparent">
                                <div class="card-body text-center py-4">
                                    <i class="ri-function-line" style="font-size: 30px"></i>
                                    <h5 class="mt-4">Tạo</h5>
                                    <p class="text-muted mb-0">Tạo bảng công việc</p>
                                </div>
                            </div>
                        </div>

                        @foreach($item->tables as $table)
                        <div class="col-xxl-3 col-sm-6 project-card">
                            <div class="card card-height-100">
                                <div class="card-body">
                                    <div class="d-flex flex-column h-100">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-4">Updated 3hrs ago</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-1 align-items-center">
                                                    <button type="button" class="btn avatar-xs mt-n1 p-0 favourite-btn">
                                                        <span class="avatar-title bg-transparent fs-15">
                                                            <i class="ri-star-fill"></i>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <i data-feather="more-horizontal" class="icon-sm"></i>
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                            <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-warning-subtle rounded p-2">
                                                        <img src="assets/images/brands/slack.png" alt="" class="img-fluid p-1">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fs-15"><a href="apps-projects-overview.html" class="text-body">{{ $table->title }}</a></h5>
                                                <p class="text-muted text-truncate-two-lines mb-3">{{ $table->description }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="d-flex mb-2">
                                                <div class="flex-grow-1">
                                                    <div>Tasks</div>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div><i class="ri-list-check align-bottom me-1 text-muted"></i> 18/42</div>
                                                </div>
                                            </div>
                                            <div class="progress progress-sm animated-progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%;"></div><!-- /.progress-bar -->
                                            </div><!-- /.progress -->
                                        </div>
                                    </div>

                                </div>
                                <!-- end card body -->
                                <div class="card-footer bg-transparent border-top-dashed py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Darline Williams">
                                                    <div class="avatar-xxs">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-fluid">
                                                    </div>
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">
                                                    <div class="avatar-xxs">
                                                        <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                            +
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="text-muted">
                                                <i class="ri-calendar-event-fill me-1 align-bottom"></i> 10 Jul, 2021
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- end card footer -->
                            </div>
                            <!-- end card -->
                        </div>
                        @endforeach

                    </div>
                    @endforeach
                    <!-- end row -->

                    <!-- Danger Alert -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
             @include('client.layouts.modal');
        </div>
@endsection
<!-- Close icon Display -->

