@extends('client.layouts.master')
@include('client.home.sidebar')

@section('content')
<div class="vertical-overlay"></div>
{{--    <div class="page-content">--}}
{{--        <div class="container-fluid">--}}

{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">--}}
{{--                        <h4 class="mb-sm-0">Kanban Board</h4>--}}

{{--                        <div class="page-title-right">--}}
{{--                            <ol class="breadcrumb m-0">--}}
{{--                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>--}}
{{--                                <li class="breadcrumb-item active">Kanban Board</li>--}}
{{--                            </ol>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- end page title -->--}}

{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row g-2">--}}
{{--                        <div class="col-lg-auto">--}}
{{--                            <div class="hstack gap-2">--}}
{{--                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createboardModal"><i class="ri-add-line align-bottom me-1"></i> Create Board</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end col-->--}}
{{--                        <div class="col-lg-3 col-auto">--}}
{{--                            <div class="search-box">--}}
{{--                                <input type="text" class="form-control search" id="search-task-options" placeholder="Search for project, tasks...">--}}
{{--                                <i class="ri-search-line search-icon"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto ms-sm-auto">--}}
{{--                            <div class="avatar-group" id="newMembar">--}}
{{--                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">--}}
{{--                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">--}}
{{--                                </a>--}}
{{--                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Frank">--}}
{{--                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs">--}}
{{--                                </a>--}}
{{--                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya">--}}
{{--                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-xs">--}}
{{--                                </a>--}}
{{--                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Thomas">--}}
{{--                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xs">--}}
{{--                                </a>--}}
{{--                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Herbert">--}}
{{--                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">--}}
{{--                                </a>--}}
{{--                                <a href="#addmemberModal" data-bs-toggle="modal" class="avatar-group-item">--}}
{{--                                    <div class="avatar-xs">--}}
{{--                                        <div class="avatar-title rounded-circle">--}}
{{--                                            +--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end col-->--}}
{{--                    </div>--}}
{{--                    <!--end row-->--}}
{{--                </div>--}}
{{--                <!--end card-body-->--}}
{{--            </div>--}}
{{--            <!--end card-->--}}

{{--            <div class="tasks-board mb-3" id="kanbanboard">--}}
{{--                <div class="tasks-list">--}}
{{--                    <div class="d-flex mb-3">--}}
{{--                        <div class="flex-grow-1">--}}
{{--                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">Unassigned <small class="badge bg-success align-bottom ms-1 totaltask-badge">2</small></h6>--}}
{{--                        </div>--}}
{{--                        <div class="flex-shrink-0">--}}
{{--                            <div class="dropdown card-header-dropdown">--}}
{{--                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <a class="dropdown-item" href="#">Priority</a>--}}
{{--                                    <a class="dropdown-item" href="#">Date Added</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">--}}
{{--                        <div id="unassigned-task" class="tasks">--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <h6 class="fs-15 mb-0 flex-grow-1 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Profile Page Structure</a></h6>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p class="text-muted">Profile Page means a web page accessible to the public or to guests.</p>--}}
{{--                                    <div class="mb-3">--}}
{{--                                        <div class="d-flex mb-1">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <h6 class="text-muted mb-0"><span class="text-secondary">15%</span> of 100%</h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <span class="text-muted">03 Jan, 2022</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress rounded-3 progress-sm">--}}
{{--                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Admin</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">--}}
{{--                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">--}}
{{--                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <h6 class="text-muted mb-0">#VL2436</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 04</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 19</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 02</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <h6 class="fs-15 mb-0 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Velzon - Admin Layout Design</a></h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink12" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink12">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p class="text-muted">The dashboard is the front page of the Administration UI.</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Layout</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Admin</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Dashboard</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Michael">--}}
{{--                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">--}}
{{--                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Anna">--}}
{{--                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 07 Jan, 2022</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 14</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 32</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 05</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                        </div>--}}
{{--                        <!--end tasks-->--}}
{{--                    </div>--}}
{{--                    <div class="my-3">--}}
{{--                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end tasks-list-->--}}
{{--                <div class="tasks-list">--}}
{{--                    <div class="d-flex mb-3">--}}
{{--                        <div class="flex-grow-1">--}}
{{--                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">To Do <small class="badge bg-secondary align-bottom ms-1 totaltask-badge">2</small></h6>--}}
{{--                        </div>--}}
{{--                        <div class="flex-shrink-0">--}}
{{--                            <div class="dropdown card-header-dropdown">--}}
{{--                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <a class="dropdown-item" href="#">Priority</a>--}}
{{--                                    <a class="dropdown-item" href="#">Date Added</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">--}}
{{--                        <div id="todo-task" class="tasks">--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <h6 class="fs-15 mb-0 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Admin Layout Design</a></h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink3" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink3">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p class="text-muted">Landing page template with clean, minimal and modern design.</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Design</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Website</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya">--}}
{{--                                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Frank">--}}
{{--                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Herbert">--}}
{{--                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 07 Jan, 2022</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 13</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 52</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 17</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <h6 class="fs-15 mb-0 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Marketing & Sales</a></h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink4" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink4">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p class="text-muted">Sales and marketing are two business functions within an organization.</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Marketing</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Business</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Donald">--}}
{{--                                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Thomas">--}}
{{--                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 27 Dec, 2021</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 24</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 10</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 10</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="my-3">--}}
{{--                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end tasks-list-->--}}
{{--                <div class="tasks-list">--}}
{{--                    <div class="d-flex mb-3">--}}
{{--                        <div class="flex-grow-1">--}}
{{--                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">Inprogress <small class="badge bg-warning align-bottom ms-1 totaltask-badge">2</small></h6>--}}
{{--                        </div>--}}
{{--                        <div class="flex-shrink-0">--}}
{{--                            <div class="dropdown card-header-dropdown">--}}
{{--                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <a class="dropdown-item" href="#">Priority</a>--}}
{{--                                    <a class="dropdown-item" href="#">Date Added</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">--}}
{{--                        <div id="inprogress-task" class="tasks">--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2457</a>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink5" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink5">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="text-body d-block">Brand Logo Design</a></h6>--}}
{{--                                    <p class="text-muted">BrandCrowd's brand logo maker allows you to generate and customize stand-out brand logos in minutes.</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Logo</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Design</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">UI/UX</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">--}}
{{--                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Michael">--}}
{{--                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">--}}
{{--                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 22 Dec, 2021</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 24</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 10</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 10</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2743</a>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink6" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink6">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Change Old App Icon</a></h6>--}}
{{--                                    <p class="text-muted">Change app icons on Android: How do you change the look of your apps.</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Design</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Website</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya">--}}
{{--                                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Donald">--}}
{{--                                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">--}}
{{--                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 24 Oct, 2021</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 64</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 35</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 23</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="my-3">--}}
{{--                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end tasks-list-->--}}
{{--                <div class="tasks-list">--}}
{{--                    <div class="d-flex mb-3">--}}
{{--                        <div class="flex-grow-1">--}}
{{--                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">In Reviews <small class="badge bg-info align-bottom ms-1 totaltask-badge">3</small></h6>--}}
{{--                        </div>--}}
{{--                        <div class="flex-shrink-0">--}}
{{--                            <div class="dropdown card-header-dropdown">--}}
{{--                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <a class="dropdown-item" href="#">Priority</a>--}}
{{--                                    <a class="dropdown-item" href="#">Date Added</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">--}}
{{--                        <div id="reviews-task" class="tasks">--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2453</a>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink7" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink7">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Create Product Animations</a></h6>--}}
{{--                                    <div class="tasks-img rounded" style="background-image: url('assets/images/small/img-7.jpg');"></div>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Ecommerce</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Anna">--}}
{{--                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 16 Nov, 2021</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 08</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 54</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 28</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2340</a>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink8" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink8">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Product Features Analysis</a></h6>--}}
{{--                                    <p class="text-muted">An essential part of strategic planning is running a product feature analysis.</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Product</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Analysis</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">--}}
{{--                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">--}}
{{--                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 05 Jan, 2022</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 14</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 31</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 07</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL2462</a>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink9" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink9">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Create a Graph of Sketch</a></h6>--}}
{{--                                    <p class="text-muted">To make a pie chart with equal slices create a perfect circle by selecting an Oval Tool.</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Sketch</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Marketing</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Design</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">--}}
{{--                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Thomas">--}}
{{--                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Herbert">--}}
{{--                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Anna">--}}
{{--                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 05 Nov, 2021</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 12</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 74</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 37</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="my-3">--}}
{{--                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end tasks-list-->--}}
{{--                <div class="tasks-list">--}}
{{--                    <div class="d-flex mb-3">--}}
{{--                        <div class="flex-grow-1">--}}
{{--                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">Completed <small class="badge bg-success align-bottom ms-1 totaltask-badge">1</small></h6>--}}
{{--                        </div>--}}
{{--                        <div class="flex-shrink-0">--}}
{{--                            <div class="dropdown card-header-dropdown">--}}
{{--                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <a class="dropdown-item" href="#">Priority</a>--}}
{{--                                    <a class="dropdown-item" href="#">Date Added</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">--}}
{{--                        <div id="completed-task" class="tasks">--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <h6 class="fs-15 mb-0 flex-grow-1 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Create a Blog Template UI</a></h6>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink10" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink10">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p class="text-muted">Landing page template with clean, minimal and modern design.</p>--}}
{{--                                    <div class="mb-3">--}}
{{--                                        <div class="d-flex mb-1">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <h6 class="text-muted mb-0"><span class="text-info">35%</span> of 100%</h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <span class="text-muted fw-medium">3 Day</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress rounded-3 progress-sm">--}}
{{--                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Design</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Website</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">--}}
{{--                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Frank">--}}
{{--                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya">--}}
{{--                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <h6 class="text-muted mb-0">#VL2451</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 24</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 10</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 10</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="my-3">--}}
{{--                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end tasks-list-->--}}
{{--                <div class="tasks-list">--}}
{{--                    <div class="d-flex mb-3">--}}
{{--                        <div class="flex-grow-1">--}}
{{--                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">new <small class="badge bg-success align-bottom ms-1 totaltask-badge">1</small></h6>--}}
{{--                        </div>--}}
{{--                        <div class="flex-shrink-0">--}}
{{--                            <div class="dropdown card-header-dropdown">--}}
{{--                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <a class="dropdown-item" href="#">Priority</a>--}}
{{--                                    <a class="dropdown-item" href="#">Date Added</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">--}}
{{--                        <div id="new-task" class="tasks">--}}
{{--                            <div class="card tasks-box">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex mb-2">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted fw-medium fs-14 flex-grow-1">#VL5287</a>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">--}}
{{--                                                <li><a class="dropdown-item" href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>--}}
{{--                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h6 class="fs-15 text-truncate task-title"><a href="apps-tasks-details.html" class="d-block">Banner Design for FB & Twitter</a></h6>--}}
{{--                                    <div class="tasks-img rounded" style="background-image: url('assets/images/small/img-4.jpg');"></div>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">UI/UX</span>--}}
{{--                                            <span class="badge bg-primary-subtle text-primary">Graphic</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Frank">--}}
{{--                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Herbert">--}}
{{--                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-footer border-top-dashed">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="text-muted"><i class="ri-time-line align-bottom"></i> 07 Jan, 2022</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <ul class="link-inline mb-0">--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 11</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 26</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 30</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end card-body-->--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end card-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="my-3">--}}
{{--                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end tasks-list-->--}}
{{--            </div>--}}
{{--            <!--end task-board-->--}}

{{--            @include('client.layouts.modal');--}}

{{--        </div>--}}

{{--    </div>--}}
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
                    <a href="{{ route('space.show',$item->code ) }}"> <h4> {{ $item->space_name }}</h4></a>
                    <div class="row">
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

{{--                    <div class="row">--}}
{{--                        <div class="col-xxl-3 col-sm-6 project-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="p-3 mt-n3 mx-n3 bg-danger-subtle rounded-top">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <h5 class="mb-0 fs-14"><a href="apps-projects-overview.html" class="text-body">Multipurpose landing template</a></h5>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div class="d-flex gap-1 align-items-center my-n2">--}}
{{--                                                    <button type="button" class="btn avatar-xs p-0 favourite-btn active">--}}
{{--                                                        <span class="avatar-title bg-transparent fs-15">--}}
{{--                                                            <i class="ri-star-fill"></i>--}}
{{--                                                        </span>--}}
{{--                                                    </button>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
{{--                                                            <i data-feather="more-horizontal" class="icon-sm"></i>--}}
{{--                                                        </button>--}}

{{--                                                        <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                            <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>--}}
{{--                                                            <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>--}}
{{--                                                            <div class="dropdown-divider"></div>--}}
{{--                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="py-3">--}}
{{--                                        <div class="row gy-3">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Status</p>--}}
{{--                                                    <div class="badge bg-warning-subtle text-warning fs-12">Inprogress</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Deadline</p>--}}
{{--                                                    <h5 class="fs-14">18 Sep, 2021</h5>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex align-items-center mt-3">--}}
{{--                                            <p class="text-muted mb-0 me-2">Team :</p>--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Donna Kline">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title rounded-circle bg-danger">--}}
{{--                                                            D--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Lee Winton">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle img-fluid">--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Johnny Shorter">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle img-fluid">--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">--}}
{{--                                                            +--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="d-flex mb-2">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div>Progress</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div>50%</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-sm animated-progress">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">--}}
{{--                                            </div><!-- /.progress-bar -->--}}
{{--                                        </div><!-- /.progress -->--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- end card body -->--}}
{{--                            </div>--}}
{{--                            <!-- end card -->--}}
{{--                        </div>--}}
{{--                        <!-- end col -->--}}

{{--                        <div class="col-xxl-3 col-sm-6 project-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="p-3 mt-n3 mx-n3 bg-warning-subtle rounded-top">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <h5 class="mb-0 fs-14"><a href="apps-projects-overview.html" class="text-body">Dashboard UI</a></h5>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div class="d-flex gap-1 align-items-center my-n2">--}}
{{--                                                    <button type="button" class="btn avatar-xs p-0 favourite-btn active">--}}
{{--                                                        <span class="avatar-title bg-transparent fs-15">--}}
{{--                                                            <i class="ri-star-fill"></i>--}}
{{--                                                        </span>--}}
{{--                                                    </button>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
{{--                                                            <i data-feather="more-horizontal" class="icon-sm"></i>--}}
{{--                                                        </button>--}}

{{--                                                        <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                            <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>--}}
{{--                                                            <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>--}}
{{--                                                            <div class="dropdown-divider"></div>--}}
{{--                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="py-3">--}}
{{--                                        <div class="row gy-3">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Status</p>--}}
{{--                                                    <div class="badge bg-success-subtle text-success fs-12">Completed</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Deadline</p>--}}
{{--                                                    <h5 class="fs-14"> 10 Jun, 2021</h5>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex align-items-center mt-3">--}}
{{--                                            <p class="text-muted mb-0 me-2">Team :</p>--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Bonnie Haynes">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle img-fluid">--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Della Wilson">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle img-fluid">--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">--}}
{{--                                                            +--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="d-flex mb-2">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div>Progress</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div>95%</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-sm animated-progress">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div><!-- /.progress-bar -->--}}
{{--                                        </div><!-- /.progress -->--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- end card body -->--}}
{{--                            </div>--}}
{{--                            <!-- end card -->--}}
{{--                        </div>--}}
{{--                        <!-- end col -->--}}
{{--                        <div class="col-xxl-3 col-sm-6 project-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="p-3 mt-n3 mx-n3 bg-info-subtle rounded-top">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <h5 class="mb-0 fs-14"><a href="apps-projects-overview.html" class="text-body">Vector Images</a></h5>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div class="d-flex gap-1 align-items-center my-n2">--}}
{{--                                                    <button type="button" class="btn avatar-xs p-0 favourite-btn">--}}
{{--                                                        <span class="avatar-title bg-transparent fs-15">--}}
{{--                                                            <i class="ri-star-fill"></i>--}}
{{--                                                        </span>--}}
{{--                                                    </button>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
{{--                                                            <i data-feather="more-horizontal" class="icon-sm"></i>--}}
{{--                                                        </button>--}}

{{--                                                        <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                            <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>--}}
{{--                                                            <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>--}}
{{--                                                            <div class="dropdown-divider"></div>--}}
{{--                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="py-3">--}}
{{--                                        <div class="row gy-3">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Status</p>--}}
{{--                                                    <div class="badge bg-warning-subtle text-warning fs-12">Inprogress</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Deadline</p>--}}
{{--                                                    <h5 class="fs-14">08 Apr, 2021</h5>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex align-items-center mt-3">--}}
{{--                                            <p class="text-muted mb-0 me-2">Team :</p>--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Chet Diaz">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title rounded-circle bg-info">--}}
{{--                                                            C--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">--}}
{{--                                                            +--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="d-flex mb-2">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div>Progress</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div>41%</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-sm animated-progress">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: 41%;"></div><!-- /.progress-bar -->--}}
{{--                                        </div><!-- /.progress -->--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- end card body -->--}}
{{--                            </div>--}}
{{--                            <!-- end card -->--}}
{{--                        </div>--}}
{{--                        <!-- end col -->--}}

{{--                        <div class="col-xxl-3 col-sm-6 project-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="p-3 mt-n3 mx-n3 bg-success-subtle rounded-top">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <h5 class="mb-0 fs-14"><a href="apps-projects-overview.html" class="text-body">Authentication</a></h5>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div class="d-flex gap-1 align-items-center my-n2">--}}
{{--                                                    <button type="button" class="btn avatar-xs p-0 favourite-btn active">--}}
{{--                                                        <span class="avatar-title bg-transparent fs-15">--}}
{{--                                                            <i class="ri-star-fill"></i>--}}
{{--                                                        </span>--}}
{{--                                                    </button>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
{{--                                                            <i data-feather="more-horizontal" class="icon-sm"></i>--}}
{{--                                                        </button>--}}

{{--                                                        <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                            <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>--}}
{{--                                                            <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>--}}
{{--                                                            <div class="dropdown-divider"></div>--}}
{{--                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="py-3">--}}
{{--                                        <div class="row gy-3">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Status</p>--}}
{{--                                                    <div class="badge bg-warning-subtle text-warning fs-12">Inprogress</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Deadline</p>--}}
{{--                                                    <h5 class="fs-14">22 Nov, 2021</h5>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex align-items-center mt-3">--}}
{{--                                            <p class="text-muted mb-0 me-2">Team :</p>--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Virginia Wall">--}}
{{--                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">--}}
{{--                                                            +--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="d-flex mb-2">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div>Progress</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div>35%</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-sm animated-progress">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;"></div><!-- /.progress-bar -->--}}
{{--                                        </div><!-- /.progress -->--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- end card body -->--}}
{{--                            </div>--}}
{{--                            <!-- end card -->--}}
{{--                        </div>--}}
{{--                        <!-- end col -->--}}
{{--                    </div>--}}
{{--                    <!-- end row -->--}}


{{--                    <div class="row">--}}
{{--                        <div class="col-xxl-3 col-sm-6 project-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="p-3 mt-n3 mx-n3 bg-secondary-subtle rounded-top">--}}
{{--                                        <div class="d-flex gap-1 align-items-center justify-content-end my-n2">--}}
{{--                                            <button type="button" class="btn avatar-xs p-0 favourite-btn active">--}}
{{--                                                <span class="avatar-title bg-transparent fs-15">--}}
{{--                                                    <i class="ri-star-fill"></i>--}}
{{--                                                </span>--}}
{{--                                            </button>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
{{--                                                    <i data-feather="more-horizontal" class="icon-sm"></i>--}}
{{--                                                </button>--}}

{{--                                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                    <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>--}}
{{--                                                    <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>--}}
{{--                                                    <div class="dropdown-divider"></div>--}}
{{--                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="text-center pb-3">--}}
{{--                                            <img src="assets/images/brands/dribbble.png" alt="" height="32">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="py-3">--}}
{{--                                        <h5 class="fs-14 mb-3"><a href="apps-projects-overview.html" class="text-body">Kanban Board</a></h5>--}}
{{--                                        <div class="row gy-3">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Status</p>--}}
{{--                                                    <div class="badge bg-warning-subtle text-warning fs-12">Inprogress</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Deadline</p>--}}
{{--                                                    <h5 class="fs-14">08 Dec, 2021</h5>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex align-items-center mt-3">--}}
{{--                                            <p class="text-muted mb-0 me-2">Team :</p>--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Terry Moberly">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title rounded-circle bg-danger">--}}
{{--                                                            T--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Ruby Miller">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle img-fluid">--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">--}}
{{--                                                            +--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="d-flex mb-2">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div>Tasks</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div><i class="ri-list-check align-bottom me-1 text-muted"></i> 17/20 </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-sm animated-progress">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div><!-- /.progress-bar -->--}}
{{--                                        </div><!-- /.progress -->--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- end card body -->--}}
{{--                            </div>--}}
{{--                            <!-- end card -->--}}
{{--                        </div>--}}
{{--                        <!-- end col -->--}}

{{--                        <div class="col-xxl-3 col-sm-6 project-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="p-3 mt-n3 mx-n3 bg-light rounded-top">--}}
{{--                                        <div class="d-flex gap-1 align-items-center justify-content-end my-n2">--}}
{{--                                            <button type="button" class="btn avatar-xs p-0 favourite-btn">--}}
{{--                                                <span class="avatar-title bg-transparent fs-15">--}}
{{--                                                    <i class="ri-star-fill"></i>--}}
{{--                                                </span>--}}
{{--                                            </button>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
{{--                                                    <i data-feather="more-horizontal" class="icon-sm"></i>--}}
{{--                                                </button>--}}

{{--                                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                    <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>--}}
{{--                                                    <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>--}}
{{--                                                    <div class="dropdown-divider"></div>--}}
{{--                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="text-center pb-3">--}}
{{--                                            <img src="assets/images/brands/slack.png" alt="" height="32">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="py-3">--}}
{{--                                        <h5 class="mb-3 fs-14"><a href="apps-projects-overview.html" class="text-body">Ecommerce app</a></h5>--}}
{{--                                        <div class="row gy-3">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Status</p>--}}
{{--                                                    <div class="badge bg-warning-subtle text-warning fs-12">Inprogress</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Deadline</p>--}}
{{--                                                    <h5 class="fs-14">20 Nov, 2021</h5>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex align-items-center mt-3">--}}
{{--                                            <p class="text-muted mb-0 me-2">Team :</p>--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Irma Metz">--}}
{{--                                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="James Clem">--}}
{{--                                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-xxs">--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">--}}
{{--                                                            +--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="d-flex mb-2">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div>Tasks</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div>--}}
{{--                                                    <i class="ri-list-check align-bottom me-1 text-muted"></i> 11/45--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-sm animated-progress">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div><!-- /.progress-bar -->--}}
{{--                                        </div><!-- /.progress -->--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- end card body -->--}}
{{--                            </div>--}}
{{--                            <!-- end card -->--}}
{{--                        </div>--}}
{{--                        <!-- end col -->--}}
{{--                        <div class="col-xxl-3 col-sm-6 project-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="p-3 mt-n3 mx-n3 bg-primary-subtle rounded-top">--}}
{{--                                        <div class="d-flex gap-1 align-items-center justify-content-end my-n2">--}}
{{--                                            <button type="button" class="btn avatar-xs p-0 favourite-btn">--}}
{{--                                                <span class="avatar-title bg-transparent fs-15">--}}
{{--                                                    <i class="ri-star-fill"></i>--}}
{{--                                                </span>--}}
{{--                                            </button>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
{{--                                                    <i data-feather="more-horizontal" class="icon-sm"></i>--}}
{{--                                                </button>--}}

{{--                                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                    <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>--}}
{{--                                                    <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>--}}
{{--                                                    <div class="dropdown-divider"></div>--}}
{{--                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="text-center pb-3">--}}
{{--                                            <img src="assets/images/brands/dropbox.png" alt="" height="32">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="py-3">--}}
{{--                                        <h5 class="mb-3 fs-14"><a href="apps-projects-overview.html" class="text-body">Redesign - Landing page</a></h5>--}}
{{--                                        <div class="row gy-3">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Status</p>--}}
{{--                                                    <div class="badge bg-warning-subtle text-warning fs-12">Inprogress</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Deadline</p>--}}
{{--                                                    <h5 class="fs-14">10 Jul, 2021</h5>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex align-items-center mt-3">--}}
{{--                                            <p class="text-muted mb-0 me-2">Team :</p>--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid">--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title rounded-circle bg-secondary">--}}
{{--                                                            S--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle img-fluid">--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">--}}
{{--                                                            +--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="d-flex mb-2">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div>Tasks</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div>--}}
{{--                                                    <i class="ri-list-check align-bottom me-1 text-muted"></i> 13/26--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-sm animated-progress">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div><!-- /.progress-bar -->--}}
{{--                                        </div><!-- /.progress -->--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- end card body -->--}}
{{--                            </div>--}}
{{--                            <!-- end card -->--}}
{{--                        </div>--}}
{{--                        <!-- end col -->--}}

{{--                        <div class="col-xxl-3 col-sm-6 project-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="p-3 mt-n3 mx-n3 bg-danger-subtle rounded-top">--}}
{{--                                        <div class="d-flex gap-1 align-items-center justify-content-end my-n2">--}}
{{--                                            <button type="button" class="btn avatar-xs p-0 favourite-btn active">--}}
{{--                                                <span class="avatar-title bg-transparent fs-15">--}}
{{--                                                    <i class="ri-star-fill"></i>--}}
{{--                                                </span>--}}
{{--                                            </button>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
{{--                                                    <i data-feather="more-horizontal" class="icon-sm"></i>--}}
{{--                                                </button>--}}

{{--                                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                    <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>--}}
{{--                                                    <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>--}}
{{--                                                    <div class="dropdown-divider"></div>--}}
{{--                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="text-center pb-3">--}}
{{--                                            <img src="assets/images/brands/mail_chimp.png" alt="" height="32">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="py-3">--}}
{{--                                        <h5 class="mb-3 fs-14"><a href="apps-projects-overview.html" class="text-body">Multipurpose landing template</a></h5>--}}
{{--                                        <div class="row gy-3">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Status</p>--}}
{{--                                                    <div class="badge bg-success-subtle text-success fs-12">Completed</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-muted mb-1">Deadline</p>--}}
{{--                                                    <h5 class="fs-14">18 Sep, 2021</h5>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex align-items-center mt-3">--}}
{{--                                            <p class="text-muted mb-0 me-2">Team :</p>--}}
{{--                                            <div class="avatar-group">--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Donna Kline">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title rounded-circle bg-danger">--}}
{{--                                                            D--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Lee Winton">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle img-fluid">--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Johnny Shorter">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle img-fluid">--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">--}}
{{--                                                    <div class="avatar-xxs">--}}
{{--                                                        <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">--}}
{{--                                                            +--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="d-flex mb-2">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div>Tasks</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-shrink-0">--}}
{{--                                                <div>--}}
{{--                                                    <i class="ri-list-check align-bottom me-1 text-muted"></i> 25/32--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-sm animated-progress">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div><!-- /.progress-bar -->--}}
{{--                                        </div><!-- /.progress -->--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- end card body -->--}}
{{--                            </div>--}}
{{--                            <!-- end card -->--}}
{{--                        </div>--}}
{{--                        <!-- end col -->--}}
{{--                    </div>--}}
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
             @include('client.layouts.modal');
        </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // space
            var modalCreateSpace = $('#createboardModal');
            var createSpace = modalCreateSpace.find('#create');
             // table
            var modalCreateTable = $('#createTableModal');
            var createTable = modalCreateTable.find('#create');

            var userId = $('meta[name="user_id"]').attr('content');

            function resetInput(){
                modalCreateSpace.find('#name').val('')
                modalCreateSpace.find('#desc').val('');
            }
            function resetInputTable(){
                modalCreateTable.find('.name').val('');
                modalCreateTable.find('.desc').val('');
            }
            function newSpaceHeader(response) {
                let data = response.data;
                let ui = `<li><a class="dropdown-item active" href="/table/${data.code}">${data.space_name}</a></li>`;
                $('#space_header').append(ui);
            }

            function newSpaceSidebar(response){
                let data = response.data;
                let ui = `<li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebar${data.id}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-table-2"></i><span data-key="t-dashboards"> ${data.space_name}</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebar${data.id}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/table/${data.code}" class="nav-link" data-key="t-analytics"> Bảng </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link" data-key="t-crm"> Thành viên </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link" data-key="t-ecommerce"> Cài đặt </a>
                                </li>
                            </ul>
                        </div>
                    </li>`
                $('#space_sidebar').append(ui);
            }
            createSpace.on('click',function (){
                var url = $(this).data('url');
                let name = modalCreateSpace.find('#name');
                let security = modalCreateSpace.find('#security');
                let desc = modalCreateSpace.find('#desc');
                let validator = true;
                if(name.val() === ''){
                    validator = false;
                    name.addClass('blurRed')
                }else{
                    name.removeClass('blurRed')
                }
                let data  = {
                    access_level_space_id : security.val(),
                    space_name : name.val(),
                    space_description : desc.val(),
                    user_id : userId
                }
                if(validator){
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response){
                            $('#createboardModal').modal('hide');
                            newSpaceHeader(response)
                            newSpaceSidebar(response)
                            resetInput()
                        },
                        error: function(error) {
                            console.log('Error:', error);
                        }
                    })
                }
            })

            createTable.on('click',function (){
                var url = $(this).data('url');
                let name = modalCreateTable.find('.name');
                let space = modalCreateTable.find('.space');
                let security = modalCreateTable.find('.security');
                let desc = modalCreateTable.find('.desc');
                let validator = true;
                if(name.val() === ''){
                    validator = false;
                    name.addClass('blurRed')
                }else{
                    name.removeClass('blurRed')
                }
                let data  = {
                    access_level_table_id : security.val(),
                    title : name.val(),
                    description : desc.val(),
                    user_id : userId,
                    spaces_id : space.val()
                }
                if(validator){
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response){
                            $('#createTableModal').modal('hide');
                            resetInputTable();
                            console.log(response);
                        },
                        error: function(error) {
                            console.log('Error:', error);
                        }
                    })
                }
            })
        });
    </script>
@endsection
