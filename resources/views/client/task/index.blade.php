@extends('client.layouts.master')
@include('client.task.sidebar')
@section('css')
    <link rel="stylesheet" href="{{ asset('default/assets/libs/dragula/dragula.min.css') }}" />
    <style>
        #image{
            height: 300px;
            width: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center;
            object-position: center;
            margin: 12px 0;
        }
        #comment-main .d-flex {
            align-items: flex-start;
        }

        #comment-main .flex-shrink-0 img {
            width: 36px;
            height: 36px;
        }
    </style>
@endsection
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Nội dung nhiệm vụ</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Nhiệm vụ</a></li>
                                <li class="breadcrumb-item active">Nội dung nhiệm vụ</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h6 class="card-title mb-3 flex-grow-1 text-start">Thời gian</h6>
                            @if($task->status  == \App\Enums\StatusSystem::COMPLETE->value)
                                <div class="mb-2">
                                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#405189,secondary:#02a8b5" style="width:90px;height:90px"></lord-icon>
                                </div>
                                <h3 class="mb-1">Hoàn thành</h3>
                                <h5 class="fs-14 mb-4">Ngày kết thúc: {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->translatedFormat('H:i:s, d F Y') : 'Chưa xác định ' }}</h5>
                            @else
                                <div class="mb-2">
                                    <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="loop" colors="primary:#405189,secondary:#02a8b5" style="width:90px;height:90px"></lord-icon>
                                </div>
                                <h3 class="mb-1"> {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->translatedFormat('H:i:s, d F Y') : 'Không có thời hạn ' }}</h3>
                                <h5 class="fs-14 mb-4">Thời hạn nhiệm vụ </h5>
                            @endif
                            <div class="hstack gap-2 justify-content-center">
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#endDueTime"><i class="ri-stop-circle-line align-bottom me-1"></i>Kết thúc</button>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#startDueTime"><i class="ri-play-circle-line align-bottom me-1"></i> Bắt đầu</button>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-card">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="fw-medium">Mã nhiệm vụ</td>
                                        <td>#{{ $task->code }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Tên nhiệm vụ</td>
                                        <td>{{ $task->task_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Danh sách nhiệm vụ</td>
                                        <td>{{ $task->ListTask->title }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-medium">Trạng thái</td>
                                        <td><span class="badge bg-secondary-subtle text-secondary">{{ \App\Enums\StatusSystem::from($task->status)->label() }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Thời gian tạo</td>
                                        <td>{{ mb_convert_case($task->created_at->diffForHumans(), MB_CASE_TITLE, "UTF-8") }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <h6 class="card-title mb-0 flex-grow-1">Thành viên tham gia</h6>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Thành viên</button>
                                </div>
                            </div>
                            <ul class="list-unstyled vstack gap-3 mb-0">
                                @foreach($task->user as $user)
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{ $user->avatar }}" alt="" class="avatar-xs rounded-circle">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-1">{{ $user->name }}</h6>
                                            <p class="text-muted mb-0">Tham gia</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Hoạt động</h5>
                            <div class="vstack gap-2">
                             <div class="acitivity-timeline py-3 simplebar-content-wrapper" style="height: 400px; overflow: hidden scroll;">
                                 @foreach($task->historyTask as $item)
                                     @if($item->type == 'created')
                                         <div class="acitivity-item py-3 d-flex">
                                             <div class="flex-shrink-0">
                                                 <div class="avatar-xs acitivity-avatar">
                                                     <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                         <i class="ri-line-chart-line"></i>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="flex-grow-1 ms-3">
                                                 <h6 class="mb-1">{{ json_decode($item->data)->title }}</h6>
                                                 <p class="text-muted mb-2"><span class="text-primary">{{ json_decode($item->data)->user_name }}</span> {{ json_decode($item->data)->message }} <span class="text-success">{{ json_decode($item->data)->content }}</span></p>
                                                 <small class="mb-0 text-muted">{{ mb_convert_case($item->created_at->diffForHumans(), MB_CASE_TITLE, "UTF-8") }}</small>
                                             </div>
                                         </div>
                                     @endif
                                     @if($item->type == 'created_dueTime')
                                             <div class="acitivity-item py-3 d-flex">
                                                 <div class="flex-shrink-0">
                                                     <div class="avatar-xs acitivity-avatar">
                                                         <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                             <i class=" ri-calendar-event-line"></i>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="flex-grow-1 ms-3">
                                                     <h6 class="mb-1">{{ json_decode($item->data)->title }}</h6>
                                                     <p class="text-muted mb-2"><span class="text-primary">{{ json_decode($item->data)->user_name }}</span> {{ json_decode($item->data)->message }}  <span class="text-danger">{{ json_decode($item->data)->content }}</span></p>
                                                     <small class="mb-0 text-muted">{{ mb_convert_case($item->created_at->diffForHumans(), MB_CASE_TITLE, "UTF-8") }}</small>
                                                 </div>
                                             </div>
                                         @endif
                                 @endforeach
                             </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!---end col-->
                <div class="col-xxl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-muted">
                                <h6 class="mb-3 fw-semibold text-uppercase">Mô tả</h6>
                                <p>{{ $task->task_description }}</p>
                                <div class="d-flex mb-3">
                                    <h6 class="card-title mb-0 flex-grow-1">Đang triển khai</h6>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal" data-bs-target="#createStepTaskModal"><i class="ri-share-line me-1 align-bottom"></i>Thêm bước nhiệm vụ</button>
                                    </div>
                                </div>
                                <form action="{{ route('step.updateStatus',$task) }} " method="post">
                                    @csrf
                                    @method('POST')
                                <ul class="ps-3 list-unstyled vstack gap-2">
                                    @foreach($task->StepTask as $item)
                                    <li>
                                        <div class="d-flex gap-1 justify-content-between mt-3">
                                            <div class="d-flex justify-content-around">
                                                <input class="form-check-input" type="checkbox" name="steps[]" value="{{$item->id}}" id="productTask" {{ $item->status == App\Enums\StatusSystem::COMPLETE->value ? 'checked' : ''  }}>
                                                <label class="form-check-label" for="productTask" style="margin-left: 10px">
                                                    {{ $item->content }}
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                    <button type="submit" class="mt-3 btn btn-soft-success btn-sm" name="update">Cập nhật</button>
                                    <button type="submit" class="mt-3 btn btn-soft-danger btn-sm" name="delete">Xóa</button>
                                </form>
                                @if($task->task_image)
                                    <div class="pt-3 border-top border-top-dashed mt-4">
                                        <h6 class="mb-3 fw-semibold text-uppercase"> Ảnh đại diện</h6>
                                        <div id="image" style="background-size: cover; background-position: center; background-image: url('{{ asset('storage/'.$task->task_image) }}');"></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                           Bình luận
                                        </a>
                                    </li>
                                </ul>
                                <!--end nav-->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="home-1" role="tabpanel">
                                    <h5 class="card-title mb-4">Bình luận</h5>
                                    <div data-simplebar style="height: 508px;" class="px-3 mx-n3 mb-2" >
                                        <div id="comment-main">
                                        @foreach($task->CommentTask as $item)
                                                <div class="d-flex mb-4" >
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ $item->user->avatar }}" alt="" class="avatar-xs rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3" >
                                                        <h5 class="fs-13">{{ $item->user->name }}</h5>
                                                        <p class="text-muted">{{ $item->content }}</p>
                                                        <a href="javascript: void(0);" class="badge text-muted bg-light"><small class="text-muted">{{ mb_convert_case($item->created_at->diffForHumans(), MB_CASE_TITLE, "UTF-8") }}</small></a>
                                                    </div>
                                                </div>
                                        @endforeach
                                        </div>
                                    </div>

                                    <form class="mt-4" id="postComment" data-url="{{ route('comment.sendMessage',$task) }}">
                                        <div class="row g-3">
                                            <div class="col-lg-12">
                                                <label for="exampleFormControlTextarea1" class="form-label">Bình luận</label>
                                                <textarea class="form-control bg-light border-light" id="comment" rows="3" placeholder="Nhập bình luận" name="comment"></textarea>
                                            </div>
                                            <!--end col-->
                                            <div class="col-12 text-end">
                                                <button type="submit" class="btn btn-success">Gửi bình luận </button>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="modal fade" id="createStepTaskModal" tabindex="-1" aria-labelledby="createStepTaskModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="createTaskModalLabel">Bước nhiệm vụ</h5>
                            <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action=" {{ route('step.store',$task) }} " method="post" id="add-step-task-list">
                                @method('POST')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="boardName" class="form-label">Nội dung</label>
                                        <textarea type="text" class="form-control" name="content"></textarea>
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

            <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 ps-4 bg-success-subtle">
                            <h5 class="modal-title" id="inviteMembersModalLabel">Thành viên</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('task.inviteMembers',$task) }}" method="post">
                            @csrf
                            @method('POST')
                        <div class="modal-body p-4">
                            <div class="search-box mb-3">
                                <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                            <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                                <div class="vstack gap-3">
                                    @foreach($usersInTable as $user)
                                     <div class="d-flex align-items-center">
                                        <div class="avatar-xs flex-shrink-0 me-3">
                                            <img src="{{ $user->avatar }}" alt="" class="img-fluid rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">{{ $user->name }}</a></h5>
                                        </div>
                                        <div class="flex-shrink-0">

                                            <input type="checkbox" class="btn btn-light btn-sm" name="users[]" value="{{ $user->id }}" {{ $user->checked == true ? 'checked' : '' }} >
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- end list -->
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Quay lại</button>
                            <button type="submit" class="btn btn-success w-xs">Thêm</button>
                        </div>
                        </form>
                    </div>
                    <!-- end modal-content -->
                </div>
                <!-- modal-dialog -->
            </div>

            <div class="modal fade" id="updateTaskModal" tabindex="-1" aria-labelledby="updateTaskModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="updateTask">Sửa nhiệm vụ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('task.update',$task) }}" method="post" enctype="multipart/form-data" id="updateTaskForm">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <label for="projectName" class="form-label">Tên dự án</label>
                                        <input type="text" class="form-control" id="projectName" placeholder="Nhập tên dự án" name="task_name" value="{{ $task->task_name }}">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="task-description" class="form-label">Mô tả</label>
                                        <textarea class="form-control" id="task-description" rows="3" placeholder="Nhập mô tả" name="task_description">{{ $task->task_description }}</textarea>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="formFile" class="form-label">Ảnh dự án</label>
                                        <input class="form-control" type="file" id="formFile"  name="task_image">
                                        <input type="hidden" name="task_image_old" value="{{ $task->task_image }}">
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="tasks-progress" class="form-label">Thành viên tham gia</label>
                                        <div data-simplebar style="height: 95px;">
                                            <ul class="list-unstyled vstack gap-2 mb-0">
                                                @foreach($task->User as $user)
                                                    <li>
                                                        <div class="form-check d-flex align-items-center">
                                                            <input class="form-check-input me-3" type="checkbox" value="{{ $user->id }}" id="anna-adame" name="users[]" checked>
                                                            <label class="form-check-label d-flex align-items-center" for="anna-adame">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="{{ $user->avatar }}" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                                <span class="flex-grow-1 ms-2">
                                                                        {{ $user->name }}
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
                                        <label for="due-date" class="form-label">Ngày kết thúc</label>
                                        <input type="datetime-local" class="form-control" id="due-date" data-provider="flatpickr" placeholder="Select date" name="due_date" value="{{ $task->due_date ?? '' }}">
                                    </div>
                                    <!--end col-->
                                    <div class="mt-4">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" class="btn btn-success">Thêm</button>
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

            <div class="modal fade" id="endDueTime" aria-hidden="true" aria-labelledby="..." tabindex="-1">
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
                                <h4>Kết thúc!</h4>
                                <p class="text-muted"> Bạn có muốn kết thúc nhiệm vụ này ? </p>
                                <!-- Toogle to second dialog -->
                                <form action="{{ route('task.endDueTime',$task) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-warning" type="submit"> Kết thúc </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- accedeModal -->
            <div class="modal fade" id="startDueTime" aria-hidden="true" aria-labelledby="..." tabindex="-1">
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
                                <h4>Bắt đầu </h4>
                                <p class="text-muted"> Bạn có muốn bắt đầu nhiệm vụ này ? </p>
                                <!-- Toogle to second dialog -->
                                <form action="{{ route('task.startDueTime',$task) }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" value="{{ $task->due_date }}" name="due_date">
                                    <button class="btn btn-success" type="submit">Bắt đầu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('default/vendor/comment_task.js') }}"></script>
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
            var updateTaskModal = $("#updateTaskModal");
            var updateTaskForm = updateTaskModal.find('#updateTaskForm');

// Kiểm tra loại file hợp lệ
            $.validator.addMethod("validFileType", function(value, element) {
                const validTypes = ["image/jpeg", "image/png", "image/gif"];
                const fileType = element.files[0]?.type || "";
                return this.optional(element) || validTypes.includes(fileType);
            }, "Vui lòng chọn một tệp hình ảnh hợp lệ (jpeg, png, gif).");

// Kiểm tra kích thước file hợp lệ
            $.validator.addMethod("validFileSize", function(value, element) {
                const maxSizeMB = 2;
                const maxSizeBytes = maxSizeMB * 1024 * 1024;
                const fileSize = element.files[0]?.size || 0;
                return this.optional(element) || fileSize <= maxSizeBytes;
            }, "Tệp không được vượt quá 2 MB.");

// Kiểm tra định dạng ngày giờ hợp lệ
            $.validator.addMethod("validDatetime", function(value, element) {
                const datetimePattern = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}(?::\d{2})?$/;
                return this.optional(element) || datetimePattern.test(value);
            }, "Vui lòng nhập thời gian theo định dạng YYYY-MM-DDTHH:mm:ss.");

// Kiểm tra thời gian due_date phải lớn hơn thời gian hiện tại
            $.validator.addMethod("futureDatetime", function(value, element) {
                const inputDate = new Date(value);
                const currentDate = new Date();
                return this.optional(element) || inputDate > currentDate;
            }, "Thời gian phải lớn hơn thời gian hiện tại.");

            updateTaskForm.validate({
                rules: {
                    task_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    task_description: {
                        required: true,
                        minlength: 3,
                        maxlength: 1000
                    },
                    task_image: {
                        validFileType: true,
                        validFileSize: true
                    },
                    due_date: {
                        validDatetime: true,
                        futureDatetime: true
                    }
                },
                messages: {
                    task_name: {
                        required: "Vui lòng nhập tên dự án.",
                        minlength: "Tên dự án phải có ít nhất 3 ký tự.",
                        maxlength: "Tên dự án không được vượt quá 255 ký tự."
                    },
                    task_description: {
                        required: "Vui lòng nhập mô tả.",
                        minlength: "Mô tả phải có ít nhất 3 ký tự.",
                        maxlength: "Mô tả không được vượt quá 1000 ký tự."
                    },
                    due_date: {
                        validDatetime: "Vui lòng nhập thời gian theo định dạng YYYY-MM-DDTHH:mm:ss.",
                        futureDatetime: "Thời gian phải lớn hơn thời gian hiện tại."
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                    form.reset();
                }
            });

        });
    </script>

@endsection
