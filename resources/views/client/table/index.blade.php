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
                                <li class="breadcrumb-item"><a href=""> Không gian làm việc</a></li>
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
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTaskModal"><i class="ri-add-line align-bottom me-1"></i>Tạo nhiệm vụ</button>
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
                                @if(isset($auth) && $auth->pivot->roles_id == \App\Enums\UserHasRole::admin->value)
                                    <a href="#addMemberModal" data-bs-toggle="modal" class="avatar-group-item">
                                        <div class="avatar-xs">
                                            <div class="avatar-title rounded-circle">
                                                +
                                            </div>
                                        </div>
                                    </a>
                                @endif
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
                @foreach($table->ListTask as $items)
                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <form class="editableForm" action="{{ route('taskList.update', $items->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div id="editableName-{{ $items->id }}">
                                    <span class="nameTaskList fs-14 fw-semibold mb-0">{{ $items->title }}</span>
                                    <i class="edit-icon"><button type="button" class="btn">✏️</button></i>
                                </div>
                                <input type="hidden" name="title" class="hiddenInput form-control">
                            </form>
                        </div>
                        <div class="flex-shrink-0 mt-2">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-medium text-muted fs-12"><i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <form
                                        action="{{ route('taskList.destroy',$items->id) }}"
                                        method="post" class="deleteTaskList">
                                        @csrf
                                        @method('DELETE')
                                        <li>
                                            <button class=" dropdown-item"
                                                    type="submit"><i
                                                    class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Xóa</button>
                                        </li>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        @foreach($items->Task as $task)
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
                                                        <img src="" alt="" class="rounded-circle avatar-xxs">
                                                    </a>
                                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">
                                                        <img src="" alt="" class="rounded-circle avatar-xxs">
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
                                                        <img src="" alt="" class="rounded-circle avatar-xxs">
                                                    </a>
                                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                                        <img src="" alt="" class="rounded-circle avatar-xxs">
                                                    </a>
                                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Anna">
                                                        <img src="" alt="" class="rounded-circle avatar-xxs">
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
                        @endforeach
                        <!--end tasks-->
                    </div>
                    <div class="my-3">
                        <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal-{{$items->id}}">Add More</button>
                    </div>
                </div>
                    <div class="modal fade" id="creatertaskModal-{{$items->id}}" tabindex="-1" aria-labelledby="creatertaskModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content border-0">
                                <div class="modal-header p-3 bg-info-subtle">
                                    <h5 class="modal-title" id="creatertaskModalLabel">Thêm nhiệm vụ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="#">
                                        <div class="row g-3">
                                            <div class="col-lg-12">
                                                <label for="projectName" class="form-label">Tên dự án</label>
                                                <input type="text" class="form-control" id="projectName" placeholder="Nhập tên dự án" name="task-projectName">
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <label for="task-description" class="form-label">Mô tả</label>
                                                <textarea class="form-control" id="task-description" rows="3" placeholder="Nhập mô tả" name="task-description"></textarea>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <label for="formFile" class="form-label">Tasks Images</label>
                                                <input class="form-control" type="file" id="formFile"  name="task-image">
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <label for="tasks-progress" class="form-label">Thành viên tham gia</label>
                                                <div data-simplebar style="height: 95px;">
                                                    <ul class="list-unstyled vstack gap-2 mb-0">
                                                        @foreach($table->users as $items)
                                                        <li>
                                                            <div class="form-check d-flex align-items-center">
                                                                <input class="form-check-input me-3" type="checkbox" value="" id="anna-adame" name="users[{{$items->id}}]">
                                                                <label class="form-check-label d-flex align-items-center" for="anna-adame">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="{{$items->avatar}}" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                                    <span class="flex-grow-1 ms-2">
                                                                        {{$items->name}}
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        @endforeach
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
                @endforeach
            </div>
            <!--end task-board-->

            <div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="createTaskModalLabel">Thêm nhiệm vụ</h5>
                            <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('taskList.store',$table) }}" method="post" id="add-task-list">
                                @method('POST')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="boardName" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" id="boardName" name="title">
                                    </div>
                                    <div class="mt-4">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Quay lại</button>
                                            <button type="submit" class="btn btn-success">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


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

            <div id="addMemberModal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0 overflow-hidden">
                        <form action="{{ route('send.member',$table) }}" method="post" id="add-member">
                            @csrf
                            @method('POST')
                            <div class="row g-0">
                                <div class="col-lg-7">
                                    <div class="modal-body p-5">
                                        <h2 class="lh-base">Thêm thành viên</h2>
                                        <div class="row mb-3">
                                            <input type="text" class="form-control" placeholder="Enter your email"
                                                   name="email_member" aria-label="Example text with button addon"
                                                   aria-describedby="button-addon1">
                                        </div>
                                        <button class="btn btn-primary" type="submit" id="button-addon1">Send Now
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="subscribe-modals-cover h-100">
                                        <img src="{{ asset('default/assets/images/auth-one-bg.jpg') }}" alt=""
                                             class="h-100 w-100 object-fit-cover"
                                             style="clip-path: polygon(100% 0%, 100% 100%, 100% 100%, 0% 100%, 25% 50%, 0% 0%);">
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
                alert(@json(session('error')))
            </script>
        @endif
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div><!-- end main content-->
@endsection
@section('js')
    <script src="{{ asset('default/assets/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('default/assets/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>
    <script src="{{ asset('default/assets/js/pages/tasks-kanban.init.js') }}"></script>

    <script src="{{ asset('default/vendor/jquery/jquery.jeditable.min.js') }}"></script>
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
            var addMemberModal = $('#addMemberModal')
            var addMember = addMemberModal.find("#add-member");

            var addTaskListModal = $('#createTaskModal');
            var addTaskList = addTaskListModal.find("#add-task-list");

            var editableForm = $("#editableForm");

            addMember.validate({
                rules: {
                    email_member: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    email_member: {
                        required: "Vui lòng nhập trường này!",
                        email: "Vui lòng nhập một địa chỉ email hợp lệ!",
                    },
                },
                submitHandler: function (form) {
                    form.submit();
                    form.reset()
                }
            });

            addTaskList.validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    }
                },
                messages: {
                    title: {
                        required: "Vui lòng nhập trường này !",
                        minlength: "Tên bảng quá ngắn !",
                        maxlength: "Tên bảng quá quá dài !",
                    },
                },
                submitHandler: function (form) {
                    form.submit();
                    form.reset();
                }
            })



         $('.nameTaskList').editable(function(value, settings) {
             // Cập nhật giá trị cho input ẩn
             $(this).closest('.editableForm').find('.hiddenInput').val(value);

             // Gửi form sau khi chỉnh sửa xong
             $(this).closest('.editableForm').submit();

             // Trả về giá trị mới để hiển thị
             return value;
         }, {
             type: 'text',
             onblur: 'submit',
             tooltip: 'Click to edit...',
             placeholder: 'Click to edit...',
             onedit: function() {

                 $(this).siblings('.edit-icon').hide();
             },
             onreset: function() {

                 $(this).siblings('.edit-icon').show();
             },
             onsubmit: function() {

                 $(this).siblings('.edit-icon').show();
             }
         });

         $('.edit-icon').on('click', function() {
             $(this).siblings('.nameTaskList').click();
         });

        })
    </script>
    <!-- dragula init js -->
@endsection
