@extends('client.layouts.master')
@include('client.home.sidebar')
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('default/vendor/delete.js') }}"></script>
@endsection
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
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#firstmodal"><i class="ri-logout-box-r-line"></i></button>
{{--                                            <form action="{{ route('space.leave', $spaceDetail->id) }}" method="post" class="deleteUserSpace" data-url="{{ route('space.destroy', ['user_id' => $item['user']->id, 'space_id' => $spaceDetail->id]) }}">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn py-0 fs-16 text-body">--}}
{{--                                                    <i class="ri-logout-box-r-line"></i>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview" role="tab">
                                            Thông tin
                                        </a>
                                    </li>
                                    @foreach ($members as $item)
                                    @if (Auth::user()->id == $item['user']->id && $item['role_space_id'] == 1)
                                            <li class="nav-item">
                                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-team" role="tab">
                                                    Quản lý thành viên
                                                </a>
                                            </li>
                                    @endif
                                    @endforeach
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
                    <div class="tab-pane fade" id="project-team" role="tabpanel">
                        <div class="row g-4 mb-3">
                            <div class="col-sm">
                                <div class="d-flex">
                                    <div class="search-box me-2">
                                        <input type="text" class="form-control" placeholder="Search member...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Invite Member</button>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="team-list list-view-filter">
                            @foreach ($members as $item)

                                @if (Auth::user()->id != $item['user']->id)
                                    <div class="card team-box" id="card_items">
                                        <div class="card-body px-4">
                                            <div class="row align-items-center team-row">
                                                <div class="col team-settings">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <div class="flex-shrink-0 me-2">
                                                                <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                    <i class="ri-star-fill"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col text-end dropdown">
                                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill fs-17"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><button class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Quản trị viên</button></li>
                                                                <form action="{{ route('space.destroy', ['user_id' => $item['user']->id, 'space_id' => $spaceDetail->id]) }}" method="post" class="deleteUserSpace" data-url="{{ route('space.destroy', ['user_id' => $item['user']->id, 'space_id' => $spaceDetail->id]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <li><button class="dropdown-item" type="submit"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Xóa</button></li>
                                                                </form>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col">
                                                    <div class="team-profile-img">
                                                        <div class="avatar-lg img-thumbnail rounded-circle">
                                                            <img src="{{ $item['user']->avatar }}" alt="" class="img-fluid d-block rounded-circle" />
                                                        </div>
                                                        <div class="team-content">
                                                            <a href="#" class="d-block">
                                                                <h5 class="fs-16 mb-1">{{ $item['user']->name }}</h5>
                                                            </a>
                                                            <p class="text-muted mb-0">{{ $item['role_name'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
            <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <lord-icon
                                src="https://cdn.lordicon.com/tdrtiskw.json"
                                trigger="loop"
                                colors="primary:#f7b84b,secondary:#405189"
                                style="width:130px;height:130px">
                            </lord-icon>
                            <div class="mt-4 pt-4">
                                <h4>Rời khỏi không gian làm việc!</h4>
                                <p class="text-muted"> bạn có muốn rời khỏi không gian làm việc này ? </p>
                                <!-- Toogle to second dialog -->
{{--                                <form action="{{ route('space.leave', $spaceDetail->id) }}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn btn-warning" type="submit">Continue</button>--}}
{{--                                </form>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- container-fluid -->
        @include('client.layouts.modal')
        @endforeach
    </div>
    <!-- End Page-content -->
</div>
@endsection
