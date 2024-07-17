@extends('client.layouts.master')
@include('client.table.sidebar')
@section('css')
    <link rel="stylesheet" href="{{ asset('default/assets/libs/dragula/dragula.min.css') }}" />
@endsection
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Bảng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
{{--                                // Không gian làm việc --}}
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('khong-gian.index') }}"> Không gian làm việc</a></li>
                                <li class="breadcrumb-item active">Bảng</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-lg-auto">
                            <div class="hstack gap-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createboardModal"><i class="ri-add-line align-bottom me-1"></i>Tạo nhiệm vụ</button>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-3 col-auto">

                        </div>
                        <div class="col-auto ms-sm-auto">
                            <div class="avatar-group" id="newMembar">
                                @foreach($table->users as $item)
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">
                                    <img src="{{ $item->avatar }}" alt="" class="rounded-circle avatar-xs">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->

            <div class="tasks-board mb-3" id="kanbanboard">
                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">Unassigned <small class="badge bg-success align-bottom ms-1 totaltask-badge">2</small></h6>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Priority</a>
                                    <a class="dropdown-item" href="#">Date Added</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        <div id="unassigned-task" class="tasks">
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <h6 class="fs-15 mb-0 flex-grow-1 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Profile Page Structure</a></h6>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">Profile Page means a web page accessible to the public or to guests.</p>
                                    <div class="mb-3">
                                        <div class="d-flex mb-1">
                                            <div class="flex-grow-1">
                                                <h6 class="text-muted mb-0"><span class="text-secondary">15%</span> of 100%</h6>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <span class="text-muted">03 Jan, 2022</span>
                                            </div>
                                        </div>
                                        <div class="progress rounded-3 progress-sm">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Admin</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h6 class="text-muted mb-0">#VL2436</h6>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 04</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 19</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 02</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <div class="flex-grow-1">
                                            <h6 class="fs-15 mb-0 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Velzon - Admin Layout Design</a></h6>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink12" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink12">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">The dashboard is the front page of the Administration UI.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Layout</span>
                                            <span class="badge bg-primary-subtle text-primary">Admin</span>
                                            <span class="badge bg-primary-subtle text-primary">Dashboard</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Michael">
                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Anna">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 07 Jan, 2022</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 14</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 32</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 05</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end tasks-->
                    </div>
                    <div class="my-3">
                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
                    </div>
                </div>
                <!--end tasks-list-->
                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">To Do <small class="badge bg-secondary align-bottom ms-1 totaltask-badge">2</small></h6>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Priority</a>
                                    <a class="dropdown-item" href="#">Date Added</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        <div id="todo-task" class="tasks">
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <div class="flex-grow-1">
                                            <h6 class="fs-15 mb-0 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Admin Layout Design</a></h6>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink3" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">Landing page template with clean, minimal and modern design.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Design</span>
                                            <span class="badge bg-primary-subtle text-primary">Website</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya">
                                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Frank">
                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Herbert">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 07 Jan, 2022</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 13</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 52</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 17</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <div class="flex-grow-1">
                                            <h6 class="fs-15 mb-0 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Marketing & Sales</a></h6>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink4" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">Sales and marketing are two business functions within an organization.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Marketing</span>
                                            <span class="badge bg-primary-subtle text-primary">Business</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Donald">
                                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Thomas">
                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 27 Dec, 2021</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 24</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 10</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 10</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
                    </div>
                </div>
                <!--end tasks-list-->
                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">Inprogress <small class="badge bg-warning align-bottom ms-1 totaltask-badge">2</small></h6>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Priority</a>
                                    <a class="dropdown-item" href="#">Date Added</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        <div id="inprogress-task" class="tasks">
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2457</a>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink5" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink5">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="text-body d-block">Brand Logo Design</a></h6>
                                    <p class="text-muted">BrandCrowd's brand logo maker allows you to generate and customize stand-out brand logos in minutes.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Logo</span>
                                            <span class="badge bg-primary-subtle text-primary">Design</span>
                                            <span class="badge bg-primary-subtle text-primary">UI/UX</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Michael">
                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 22 Dec, 2021</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 24</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 10</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 10</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2743</a>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink6" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink6">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Change Old App Icon</a></h6>
                                    <p class="text-muted">Change app icons on Android: How do you change the look of your apps.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Design</span>
                                            <span class="badge bg-primary-subtle text-primary">Website</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya">
                                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Donald">
                                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 24 Oct, 2021</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 64</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 35</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 23</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
                    </div>
                </div>
                <!--end tasks-list-->
                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">In Reviews <small class="badge bg-info align-bottom ms-1 totaltask-badge">3</small></h6>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Priority</a>
                                    <a class="dropdown-item" href="#">Date Added</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        <div id="reviews-task" class="tasks">
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2453</a>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink7" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink7">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Create Product Animations</a></h6>
                                    <div class="tasks-img rounded" style="background-image: url('assets/images/small/img-7.jpg');"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Ecommerce</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Anna">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 16 Nov, 2021</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 08</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 54</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 28</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2340</a>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink8" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink8">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Product Features Analysis</a></h6>
                                    <p class="text-muted">An essential part of strategic planning is running a product feature analysis.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Product</span>
                                            <span class="badge bg-primary-subtle text-primary">Analysis</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 05 Jan, 2022</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 14</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 31</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 07</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2462</a>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink9" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink9">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Create a Graph of Sketch</a></h6>
                                    <p class="text-muted">To make a pie chart with equal slices create a perfect circle by selecting an Oval Tool.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Sketch</span>
                                            <span class="badge bg-primary-subtle text-primary">Marketing</span>
                                            <span class="badge bg-primary-subtle text-primary">Design</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Thomas">
                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Herbert">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Anna">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 05 Nov, 2021</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 12</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 74</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 37</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
                    </div>
                </div>
                <!--end tasks-list-->
                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">Completed <small class="badge bg-success align-bottom ms-1 totaltask-badge">1</small></h6>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Priority</a>
                                    <a class="dropdown-item" href="#">Date Added</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        <div id="completed-task" class="tasks">
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <h6 class="fs-15 mb-0 flex-grow-1 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Create a Blog Template UI</a></h6>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink10" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink10">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">Landing page template with clean, minimal and modern design.</p>
                                    <div class="mb-3">
                                        <div class="d-flex mb-1">
                                            <div class="flex-grow-1">
                                                <h6 class="text-muted mb-0"><span class="text-info">35%</span> of 100%</h6>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <span class="text-muted fw-medium">3 Day</span>
                                            </div>
                                        </div>
                                        <div class="progress rounded-3 progress-sm">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">Design</span>
                                            <span class="badge bg-primary-subtle text-primary">Website</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">
                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Frank">
                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya">
                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h6 class="text-muted mb-0">#VL2451</h6>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 24</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 10</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 10</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
                    </div>
                </div>
                <!--end tasks-list-->
                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">new <small class="badge bg-success align-bottom ms-1 totaltask-badge">1</small></h6>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Priority</a>
                                    <a class="dropdown-item" href="#">Date Added</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        <div id="new-task" class="tasks">
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex mb-2">
                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL5287</a>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Banner Design for FB & Twitter</a></h6>
                                    <div class="tasks-img rounded" style="background-image: url('assets/images/small/img-4.jpg');"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="badge bg-primary-subtle text-primary">UI/UX</span>
                                            <span class="badge bg-primary-subtle text-primary">Graphic</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Frank">
                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Herbert">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-dashed">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 07 Jan, 2022</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 11</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 26</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 30</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
                    </div>
                </div>
                <!--end tasks-list-->
            </div>
            <!--end task-board-->

            <div class="modal fade" id="addmemberModal" tabindex="-1" aria-labelledby="addmemberModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-warning-subtle">
                            <h5 class="modal-title" id="addmemberModalLabel">Add Member</h5>
                            <button type="button" class="btn-close" id="btn-close-member" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <label for="submissionidInput" class="form-label">Submission ID</label>
                                        <input type="number" class="form-control" id="submissionidInput" placeholder="Submission ID">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="profileimgInput" class="form-label">Profile Images</label>
                                        <input class="form-control" type="file" id="profileimgInput">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <label for="firstnameInput" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstnameInput" placeholder="Enter firstname">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <label for="lastnameInput" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastnameInput" placeholder="Enter lastname">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="designationInput" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="designationInput" placeholder="Designation">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="titleInput" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="titleInput" placeholder="Title">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <label for="numberInput" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="numberInput" placeholder="Phone number">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <label for="joiningdateInput" class="form-label">Joining Date</label>
                                        <input type="text" class="form-control" id="joiningdateInput" data-provider="flatpickr" placeholder="Select date">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="emailInput" class="form-label">Email ID</label>
                                        <input type="email" class="form-control" id="emailInput" placeholder="Email">
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="ri-close-line align-bottom me-1"></i> Close</button>
                            <button type="button" class="btn btn-success" id="addMember">Add Member</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end add member modal-->

            <div class="modal fade" id="createboardModal" tabindex="-1" aria-labelledby="createboardModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="createboardModalLabel">Add Board</h5>
                            <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="boardName" class="form-label">Board Name</label>
                                        <input type="text" class="form-control" id="boardName" placeholder="Enter board name">
                                    </div>
                                    <div class="mt-4">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success" id="addNewBoard">Add Board</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end add board modal-->

            <div class="modal fade" id="creatertaskModal" tabindex="-1" aria-labelledby="creatertaskModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="creatertaskModalLabel">Create New Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#">
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <label for="projectName" class="form-label">Project Name</label>
                                        <input type="text" class="form-control" id="projectName" placeholder="Enter project name">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="sub-tasks" class="form-label">Task Title</label>
                                        <input type="text" class="form-control" id="sub-tasks" placeholder="Task title">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="task-description" class="form-label">Task Description</label>
                                        <textarea class="form-control" id="task-description" rows="3" placeholder="Task description"></textarea>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="formFile" class="form-label">Tasks Images</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="tasks-progress" class="form-label">Add Team Member</label>
                                        <div data-simplebar style="height: 95px;">
                                            <ul class="list-unstyled vstack gap-2 mb-0">
                                                <li>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input me-3" type="checkbox" value="" id="anna-adame">
                                                        <label class="form-check-label d-flex align-items-center" for="anna-adame">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                            <span class="flex-grow-1 ms-2">
                                                                        Anna Adame
                                                                    </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input me-3" type="checkbox" value="" id="frank-hook">
                                                        <label class="form-check-label d-flex align-items-center" for="frank-hook">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                            <span class="flex-grow-1 ms-2">
                                                                        Frank Hook
                                                                    </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input me-3" type="checkbox" value="" id="alexis-clarke">
                                                        <label class="form-check-label d-flex align-items-center" for="alexis-clarke">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                            <span class="flex-grow-1 ms-2">
                                                                        Alexis Clarke
                                                                    </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input me-3" type="checkbox" value="" id="herbert-stokes">
                                                        <label class="form-check-label d-flex align-items-center" for="herbert-stokes">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                            <span class="flex-grow-1 ms-2">
                                                                        Herbert Stokes
                                                                    </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input me-3" type="checkbox" value="" id="michael-morris">
                                                        <label class="form-check-label d-flex align-items-center" for="michael-morris">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                            <span class="flex-grow-1 ms-2">
                                                                        Michael Morris
                                                                    </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input me-3" type="checkbox" value="" id="nancy-martino">
                                                        <label class="form-check-label d-flex align-items-center" for="nancy-martino">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                            <span class="flex-grow-1 ms-2">
                                                                        Nancy Martino
                                                                    </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input me-3" type="checkbox" value="" id="thomas-taylor">
                                                        <label class="form-check-label d-flex align-items-center" for="thomas-taylor">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                            <span class="flex-grow-1 ms-2">
                                                                        Thomas Taylor
                                                                    </span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input me-3" type="checkbox" value="" id="tonya-noble">
                                                        <label class="form-check-label d-flex align-items-center" for="tonya-noble">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                            <span class="flex-grow-1 ms-2">
                                                                        Tonya Noble
                                                                    </span>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <label for="due-date" class="form-label">Due Date</label>
                                        <input type="text" class="form-control" id="due-date" data-provider="flatpickr" placeholder="Select date">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <label for="categories" class="form-label">Tags</label>
                                        <input type="text" class="form-control" id="categories" placeholder="Enter tag">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <label for="tasks-progress" class="form-label">Tasks Progress</label>
                                        <input type="text" class="form-control" maxlength="3" id="tasks-progress" placeholder="Enter progress">
                                    </div>
                                    <!--end col-->
                                    <div class="mt-4">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success">Add Task</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end add board modal-->

            <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="delete-btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this tasks ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div><!-- end main content-->

<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<div class="customizer-setting d-none d-md-block">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
        <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
</div>

<!-- Theme Settings -->
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
    <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
        <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

        <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div data-simplebar class="h-100">
            <div class="p-4">
                <h6 class="mb-0 fw-semibold text-uppercase">Layout</h6>
                <p class="text-muted">Choose your layout</p>

                <div class="row gy-3">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Vertical</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                    <span class="d-flex h-100 flex-column gap-1">
                                        <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                            <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                            <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                            <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                        </span>
                                        <span class="bg-light d-block p-1"></span>
                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn" class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1">
                                                <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Two Column</h5>
                    </div>
                    <!-- end col -->

                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout04" name="data-layout" type="radio" value="semibox" class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout04">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0 p-1">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column pt-1 pe-2">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Semi Box</h5>
                    </div>
                    <!-- end col -->
                </div>

                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
                <p class="text-muted">Choose Light or Dark Scheme.</p>

                <div class="colorscheme-cardradio">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-mode-light" value="light">
                                <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check card-radio dark">
                                <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-mode-dark" value="dark">
                                <label class="form-check-label p-0 avatar-md w-100 bg-dark" for="layout-mode-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-white bg-opacity-10 d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-white bg-opacity-10 d-block p-1"></span>
                                                    <span class="bg-white bg-opacity-10 d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Dark</h5>
                        </div>
                    </div>
                </div>

                <div id="sidebar-visibility">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Visibility</h6>
                    <p class="text-muted">Choose show or Hidden sidebar.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-visibility" id="sidebar-visibility-show" value="show">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-visibility-show">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0 p-1">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column pt-1 pe-2">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Show</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-visibility" id="sidebar-visibility-hidden" value="hidden">
                                <label class="form-check-label p-0 avatar-md w-100 px-2" for="sidebar-visibility-hidden">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column pt-1 px-2">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Hidden</h5>
                        </div>
                    </div>
                </div>

                <div id="layout-width">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width</h6>
                    <p class="text-muted">Choose Fluid or Boxed layout.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-fluid" value="fluid">
                                <label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Fluid</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-boxed" value="boxed">
                                <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-width-boxed">
                                        <span class="d-flex gap-1 h-100 border-start border-end">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Boxed</h5>
                        </div>
                    </div>
                </div>

                <div id="layout-position">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Position</h6>
                    <p class="text-muted">Choose Fixed or Scrollable Layout Position.</p>

                    <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                        <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>

                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                        <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                    </div>
                </div>
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
                <p class="text-muted">Choose Light or Dark Topbar Color.</p>

                <div class="row">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-light" value="light">
                            <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Light</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-dark" value="dark">
                            <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-primary d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Dark</h5>
                    </div>
                </div>

                <div id="sidebar-size">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size</h6>
                    <p class="text-muted">Choose a size of Sidebar.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-default" value="lg">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Default</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-compact" value="md">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Compact</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small" value="sm">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small-hover" value="sm-hover">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small-hover">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Small Hover View</h5>
                        </div>
                    </div>
                </div>

                <div id="sidebar-view">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View</h6>
                    <p class="text-muted">Choose Default or Detached Sidebar view.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-default" value="default">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Default</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-detached" value="detached">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                            </span>
                                            <span class="d-flex gap-1 h-100 p-1 px-2">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Detached</h5>
                        </div>
                    </div>
                </div>
                <div id="sidebar-color">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Color</h6>
                    <p class="text-muted">Choose a color of Sidebar.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
                                <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-light" value="light">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Light</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
                                <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-dark" value="dark">
                                <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Dark</h5>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient" aria-expanded="false" aria-controls="collapseBgGradient">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </button>
                            <h5 class="fs-13 text-center mt-2">Gradient</h5>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="collapse" id="collapseBgGradient">
                        <div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">

                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient" value="gradient">
                                <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient">
                                    <span class="avatar-title rounded-circle bg-vertical-gradient"></span>
                                </label>
                            </div>
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-2" value="gradient-2">
                                <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-2">
                                    <span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
                                </label>
                            </div>
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-3" value="gradient-3">
                                <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-3">
                                    <span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
                                </label>
                            </div>
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-4" value="gradient-4">
                                <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-4">
                                    <span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sidebar-img">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Images</h6>
                    <p class="text-muted">Choose a image of Sidebar.</p>

                    <div class="d-flex gap-2 flex-wrap img-switch">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-none" value="none">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
                                    <span class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                                        <i class="ri-close-fill fs-20"></i>
                                    </span>
                            </label>
                        </div>

                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-01" value="img-1">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
                                <img src="assets/images/sidebar/img-1.jpg" alt="" class="avatar-md w-auto object-fit-cover">
                            </label>
                        </div>

                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-02" value="img-2">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
                                <img src="assets/images/sidebar/img-2.jpg" alt="" class="avatar-md w-auto object-fit-cover">
                            </label>
                        </div>
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-03" value="img-3">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
                                <img src="assets/images/sidebar/img-3.jpg" alt="" class="avatar-md w-auto object-fit-cover">
                            </label>
                        </div>
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-04" value="img-4">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
                                <img src="assets/images/sidebar/img-4.jpg" alt="" class="avatar-md w-auto object-fit-cover">
                            </label>
                        </div>
                    </div>
                </div>

                <div id="preloader-menu">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Preloader</h6>
                    <p class="text-muted">Choose a preloader.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-preloader" id="preloader-view-custom" value="enable">
                                <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-custom">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    <!-- <div id="preloader"> -->
                                    <div id="status" class="d-flex align-items-center justify-content-center">
                                        <div class="spinner-border text-primary avatar-xxs m-auto" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Enable</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-preloader" id="preloader-view-none" value="disable">
                                <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-none">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Disable</h5>
                        </div>
                    </div>

                </div>
                <!-- end preloader-menu -->

            </div>
        </div>

    </div>
    <div class="offcanvas-footer border-top p-3 text-center">
        <div class="row">
            <div class="col-6">
                <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
            </div>
            <div class="col-6">
                <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy Now</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- dragula init js -->
    <script src="{{ asset('default/assets/libs/dragula/dragula.min.js') }}"></script>

    <!-- dom autoscroll -->
    <script src="{{ asset('default/assets/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>

    <!--taks-kanban-->
    <script src="{{ asset('default/assets/js/pages/tasks-kanban.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#show-member').on('click',function (){

            })
        })

    </script>
@endsection
