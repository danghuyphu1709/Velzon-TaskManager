@extends('client.layouts.master')
@include('client.home.sidebar')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-warning-subtle">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{ asset('default/assets/images/brands/slack.png') }}" alt="" class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">{{ $spaceDetail->space_name }}</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-building-line align-bottom me-1"></i> {{ $spaceDetail->AccessLevelSpace->access_name }}</div>
                                                        <div class="vr"></div>
                                                        <div>Create Date : <span class="fw-medium">{{ $spaceDetail->created_at }}</span></div>
                                                        <div class="vr"></div>
                                                        <div class="vr"></div>
                                                        <div class="badge rounded-pill bg-info fs-12">New</div>
                                                        <div class="badge rounded-pill bg-danger fs-12">High</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="hstack gap-1 flex-wrap">
                                            <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                                <i class="ri-star-fill"></i>
                                            </button>
                                            <button type="button" class="btn py-0 fs-16 text-body">
                                                <i class="ri-share-line"></i>
                                            </button>
                                            <button type="button" class="btn py-0 fs-16 text-body">
                                                <i class="ri-flag-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview" role="tab">
                                            Thông tin
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 fw-semibold text-uppercase"> Mô tả </h6>
                                                <p>{{ $spaceDetail->space_description }}</p>
                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <h6 class="mb-3 fw-semibold text-uppercase">Bảng</h6>

                                                        <div class="row">
                                                            @foreach($tableSpace as $table)
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
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->

                                    <!-- end card -->
                                </div>
                                <!-- ene col -->
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                                            <h4 class="card-title mb-0 flex-grow-1">Members</h4>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Invite Member</button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                                                <div class="vstack gap-3">
                                                    @foreach($members as $item)
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-xs flex-shrink-0 me-3">
                                                            <img src="{{ $item['user']->avatar }}" alt="" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h5 class="fs-13 mb-0">{{ $item['user']->name}}</h5>
                                                        </div>

                                                            <div class="flex-shrink-0">
                                                            <div class="d-flex align-items-center gap-1">
                                                                    <button type="button" class="btn btn-light btn-sm">{{ $item['role_name'] }}</button>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-fill"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        @if($item['role_space_id'] == 1)
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Rời nhóm</a></li>
                                                                        @else
                                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Quản trị viên </a></li>
                                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Rời nhóm</a></li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    @endforeach
                                                    <!-- end member item -->

                                                    <!-- end member item -->
                                                </div>
                                                <!-- end list -->
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->

                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
        @include('client.layouts.modal')
    </div>
    <!-- End Page-content -->
</div>
@endsection
