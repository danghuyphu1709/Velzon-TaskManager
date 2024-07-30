@extends('client.layouts.master')
@include('client.table.sidebar')
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
                                                            <img
                                                                src="{{ asset('default/assets/images/brands/slack.png') }}"
                                                                alt="" class="avatar-xs">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div>
                                                        <form action=" {{ route('tables.update',$table->id) }}"
                                                              method="post" id="form-edit-space">
                                                            <div class="d-flex" style=" gap: 9px"><h4
                                                                    class="fw-bold mt-3">{{ $table->title }}</h4>
                                                                    @if(isset($auth) && $auth->pivot->roles_id == \App\Enums\UserHasRole::admin->value)
                                                                        <button data-bs-toggle="modal"
                                                                                data-bs-target="#updateBoardModal"
                                                                                class="btn" type="button"
                                                                                id="edit-title-space"><i
                                                                                class="ri-pencil-line"
                                                                                style="font-size: 23px"></i></button>
                                                                    @endif
                                                            </div>
                                                        </form>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <div>
                                                                <i class="ri-building-line align-bottom me-1"></i>{{ $table->AccessLevelTables->access_name }}
                                                            </div>
                                                            <div class="vr"></div>
                                                            <div> Thời gian tạo : <span
                                                                    class="fw-medium">{{ $table->created_at->diffForHumans(\Illuminate\Support\Carbon::now()) }}</span>
                                                            </div>
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
                                                @if(isset($auth))
                                                    <button type="button" class="btn btn-primary "
                                                            data-bs-toggle="modal" data-bs-target="#leaveModal"><i
                                                            class="ri-logout-box-r-line"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#accedeModal"><i
                                                            class="ri-logout-box-line"></i></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active fw-semibold" data-bs-toggle="tab"
                                               href="#project-overview" role="tab">
                                                Thông tin
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                               href="#project-activities" role="tab">
                                                 Hoạt Động
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                               href="#project-documents" role="tab">
                                                Tải lên
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                                @if(isset($auth) && $auth->pivot->roles_id == \App\Enums\UserHasRole::admin->value)
                                                    <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                       href="#project-team" role="tab">
                                                        Quản lý thành viên
                                                    </a>
                                                @endif
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
                                                    <p>{{ $table->description }}</p>
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
                                                <h4 class="card-title mb-0 flex-grow-1">Thành viên</h4>
                                                <div class="flex-shrink-0">

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                                                    <div class="vstack gap-3">
                                                        @foreach($table->users as $item)
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-xs flex-shrink-0 me-3">
                                                                    <img src="{{ $item->avatar }}" alt=""
                                                                         class="img-fluid rounded-circle">
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-13 mb-0">{{ $item->name}}</h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <div class="d-flex align-items-center gap-1">
                                                                        @if($item->pivot->roles_id == 1)
                                                                            <button type="button"
                                                                                    class="btn btn-light btn-sm">Quản
                                                                                trị viên
                                                                            </button>
                                                                        @else
                                                                            <button type="button"
                                                                                    class="btn btn-light btn-sm">Thành
                                                                                viên
                                                                            </button>
                                                                        @endif
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
                            <div class="tab-pane fade" id="project-team" role="tabpanel">
                                <!-- end row -->
                                <div class="team-list list-view-filter">
                                    @foreach ($table->users as $item)
                                        @if($item->id === Auth::user()->id)
                                            <div class="card team-box" id="card_items">
                                                <div class="card-body px-4">
                                                    <div class="row align-items-center team-row">
                                                        <div class="col team-settings">

                                                        </div>
                                                        <div class="col-lg-4 col">
                                                            <div class="team-profile-img">
                                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                                    <img src="{{ $item->avatar }}" alt=""
                                                                         class="img-fluid d-block rounded-circle"/>
                                                                </div>
                                                                <div class="team-content">
                                                                    <a href="#" class="d-block">
                                                                        <h5 class="fs-16 mb-1">{{ $item->name }}</h5>
                                                                    </a>
                                                                    <p class="text-muted mb-0"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($item->pivot->roles_id == 1)
                                                        <button type="button" class="btn btn-light btn-sm mt-3">Quản
                                                            trị viên(Bạn)
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-light btn-sm mt-3">Thành
                                                            viên(Bạn)
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                            <div class="card team-box" id="card_items">
                                                <div class="card-body px-4">
                                                    <div class="row align-items-center team-row">
                                                        <div class="col team-settings">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <div class="flex-shrink-0 me-2">

                                                                    </div>
                                                                </div>
                                                                <div class="col text-end dropdown">
                                                                    <a href="javascript:void(0);"
                                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-fill fs-17"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        @if($item->pivot->role_space_id == 1)
                                                                            <li>
                                                                                <button class="dropdown-item"
                                                                                        href="javascript:void(0);"><i
                                                                                        class="ri-star-fill text-muted me-2 align-bottom"></i>Xóa
                                                                                    quản trị viên
                                                                                </button>
                                                                            </li>
                                                                        @else
                                                                            <li>
                                                                                <button class="dropdown-item"
                                                                                        href="javascript:void(0);"><i
                                                                                        class="ri-star-fill text-muted me-2 align-bottom"></i>Thêm
                                                                                    quản trị viên
                                                                                </button>
                                                                            </li>
                                                                        @endif
                                                                        <form
                                                                            action="{{ route('tables.destroy',['tables' => $table, 'user' => $item]) }}"
                                                                            method="post" class="deleteUserSpace">
                                                                            @csrf
                                                                            @method('POST')
                                                                            <li>
                                                                                <button class="dropdown-item"
                                                                                        type="submit"><i
                                                                                        class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Xóa</button>
                                                                            </li>
                                                                        </form>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col">
                                                            <div class="team-profile-img">
                                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                                    <img src="{{ $item->avatar }}" alt=""
                                                                         class="img-fluid d-block rounded-circle"/>
                                                                </div>
                                                                <div class="team-content">
                                                                    <a href="#" class="d-block">
                                                                        <h5 class="fs-16 mb-1">{{ $item->name }}</h5>
                                                                    </a>
                                                                    <p class="text-muted mb-0"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($item->pivot->role_space_id == 1)
                                                        <button type="button" class="btn btn-light btn-sm mt-3">Quản
                                                            trị viên
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-light btn-sm mt-3">Thành
                                                            viên
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="project-documents" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <h5 class="card-title flex-grow-1">Documents</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive table-card">
                                                    <table class="table table-borderless align-middle mb-0">
                                                        <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">File Name</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Size</th>
                                                            <th scope="col">Upload Date</th>
                                                            <th scope="col" style="width: 120px;">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-folder-zip-line"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0)" class="text-body">Artboard-documents.zip</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Zip File</td>
                                                            <td>4.57 MB</td>
                                                            <td>12 Dec 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-danger rounded fs-24">
                                                                            <i class="ri-file-pdf-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Bank Management System</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>PDF File</td>
                                                            <td>8.89 MB</td>
                                                            <td>24 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-video-line"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Tour-video.mp4</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>MP4 File</td>
                                                            <td>14.62 MB</td>
                                                            <td>19 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-success rounded fs-24">
                                                                            <i class="ri-file-excel-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Account-statement.xsl</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>XSL File</td>
                                                            <td>2.38 KB</td>
                                                            <td>14 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-warning rounded fs-24">
                                                                            <i class="ri-folder-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Project Screenshots Collection</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Folder File</td>
                                                            <td>87.24 MB</td>
                                                            <td>08 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-danger rounded fs-24">
                                                                            <i class="ri-image-2-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Velzon-logo.png</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>PNG File</td>
                                                            <td>879 KB</td>
                                                            <td>02 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <a href="javascript:void(0);" class="text-success "><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="project-activities" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Activities</h5>
                                        <div class="acitivity-timeline py-3">
                                            <div class="acitivity-item d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Oliver Phillips <span class="badge bg-primary-subtle text-primary align-middle">New</span></h6>
                                                    <p class="text-muted mb-2">We talked about a project on linkedin.</p>
                                                    <small class="mb-0 text-muted">Today</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                    <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                        N
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Nancy Martino <span class="badge bg-secondary-subtle text-secondary align-middle">In Progress</span></h6>
                                                    <p class="text-muted mb-2"><i class="ri-file-text-line align-middle ms-2"></i> Create new project Building product</p>
                                                    <div class="avatar-group mb-2">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Christi">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs" />
                                                        </a>
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Frank Hook">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs" />
                                                        </a>
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title=" Ruby">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                    R
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="more">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle">
                                                                    2+
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <small class="mb-0 text-muted">Yesterday</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Natasha Carey <span class="badge bg-success-subtle text-success align-middle">Completed</span></h6>
                                                    <p class="text-muted mb-2">Adding a new event with attachments</p>
                                                    <div class="row">
                                                        <div class="col-xxl-4">
                                                            <div class="row border border-dashed gx-2 p-2 mb-2">
                                                                <div class="col-4">
                                                                    <img src="assets/images/small/img-2.jpg" alt="" class="img-fluid rounded" />
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-4">
                                                                    <img src="assets/images/small/img-3.jpg" alt="" class="img-fluid rounded" />
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-4">
                                                                    <img src="assets/images/small/img-4.jpg" alt="" class="img-fluid rounded" />
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                    </div>
                                                    <small class="mb-0 text-muted">25 Nov</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Bethany Johnson</h6>
                                                    <p class="text-muted mb-2">added a new member to velzon dashboard</p>
                                                    <small class="mb-0 text-muted">19 Nov</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs acitivity-avatar">
                                                        <div class="avatar-title rounded-circle bg-danger-subtle text-danger">
                                                            <i class="ri-shopping-bag-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Your order is placed <span class="badge bg-danger-subtle text-danger align-middle ms-1">Out of Delivery</span></h6>
                                                    <p class="text-muted mb-2">These customers can rest assured their order has been placed.</p>
                                                    <small class="mb-0 text-muted">16 Nov</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Lewis Pratt</h6>
                                                    <p class="text-muted mb-2">They all have something to say beyond the words on the page. They can come across as casual or neutral, exotic or graphic. </p>
                                                    <small class="mb-0 text-muted">22 Oct</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs acitivity-avatar">
                                                        <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                            <i class="ri-line-chart-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Monthly sales report</h6>
                                                    <p class="text-muted mb-2"><span class="text-danger">2 days left</span> notification to submit the monthly sales report. <a href="javascript:void(0);" class="link-warning text-decoration-underline">Reports Builder</a></p>
                                                    <small class="mb-0 text-muted">15 Oct</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">New ticket received <span class="badge bg-success-subtle text-success align-middle">Completed</span></h6>
                                                    <p class="text-muted mb-2">User <span class="text-secondary">Erica245</span> submitted a ticket.</p>
                                                    <small class="mb-0 text-muted">26 Aug</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- LeaveModal -->
                <div class="modal fade" id="leaveModal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
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
                                    <form action="{{ route('tables.leave', $table,Auth::user()->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-warning" type="submit">Rời khỏi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- accedeModal -->
                <div class="modal fade" id="accedeModal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center p-5">
                                <lord-icon
                                    src="https://cdn.lordicon.com/lupuorrc.json"
                                    trigger="loop"
                                    colors="primary:#121331,secondary:#08a88a"
                                    style="width:120px;height:120px">
                                </lord-icon>
                                <div class="mt-4 pt-4">
                                    <h4>Tham gia không gian làm việc!</h4>
                                    <p class="text-muted"> Bạn có muốn tham gia không gian làm việc này ? </p>
                                    <!-- Toogle to second dialog -->
                                    <form action="{{ route('tables.accede',$table) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-success" type="submit">Tham gia</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('client.home.modal')
            </div>
            <!-- End Page-content -->
        </div>
        <div class="modal fade" id="updateBoardModal" tabindex="-1" aria-labelledby="updateBoardModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header p-3 bg-info-subtle">
                        <h5 class="modal-title" id="updateBoardModalLabel">Sửa không gian</h5>
                        <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tables.update',$table->id) }} " method="post" id="updateBoardForm">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="boardName" class="form-label">Tên không gian</label>
                                    <input type="text" class="form-control" name="title"
                                           value="{{ $table->title }}">
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label for="boardName" class="form-label ">Quyền xem</label>
                                    <select class="form-control" name="access_level_tables_id">
                                        @foreach($accessLevel as $item)
                                            <option value="{{ $item->id }}" {{ $table->access_level_tables_id == $item->id ? 'selected' : '' }}> {{ $item->access_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label for="boardName" class="form-label">Mô tả</label>
                                    <textarea class="form-control"
                                              name="description">{{ $table->description }}</textarea>
                                </div>

                                <div class="mt-4">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Thoát
                                        </button>
                                        <input type="submit" class="btn btn-success" value="Sửa">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(session('error'))
            <script>
                alert('{{ session('error') }}');
            </script>
        @endif
        @endsection
        @section('js')
            <script src="{{ asset('default/vendor/jquery/sweetalert2.main.js') }}"></script>
            <script src="{{ asset('default/vendor/delete.js') }}"></script>
            <script>
                @if(session('alert-success'))
                Toastify({
                    text: @json(session('alert-success')),
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                }).showToast();
                @endif
                @if(session('alert-error'))
                Toastify({
                    text: @json(session('alert-error')),
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #ff0000, #cc0000)",
                    },
                }).showToast();
                @endif

                $(document).ready(function () {
                    // space update
                    var modalUpdateSpace = $('#updateBoardModal');
                    var formUpdate = modalUpdateSpace.find('#updateBoardForm');

                    var addMemberModal = $('#addMemberModal')
                    var addMember = addMemberModal.find("#add-member");

                    addMember.validate({
                        rules: {
                            toMember: {
                                required: true,
                                email: true,
                            }
                        },
                        messages: {
                            toMember: {
                                required: "Vui lòng nhập trường này!",
                                email: "Vui lòng nhập một địa chỉ email hợp lệ!",
                            },
                        },
                        submitHandler: function (form) {
                            form.submit();
                            form.reset()
                        }
                    });
                    formUpdate.validate({
                        rules: {
                            title: {
                                required: true,
                                minlength: 3,
                                maxlength: 255
                            },
                            access_level_tables_id: {
                                required: true,
                                min: 1
                            },
                            description: {
                                maxlength: 1000
                            }
                        },
                        messages: {
                            title: {
                                required: "Vui lòng nhập trường này !",
                                minlength: "Tên bảng quá ngắn !",
                                maxlength: "Tên bảng quá quá dài !",
                            },
                            access_level_tables_id: "Vui lòng  chọn trường này !",
                            description: 'Mô tả không gian quá dài !'
                        },
                        submitHandler: function (form) {
                            form.submit();
                        }
                    });

                });
            </script>
@endsection

