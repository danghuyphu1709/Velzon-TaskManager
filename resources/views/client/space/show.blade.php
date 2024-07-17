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
                                                    <form action=" {{ route('khong-gian.update',$space->id) }}"
                                                          method="post" id="form-edit-space">
                                                        <div id="title_old" class="d-flex" style=" gap: 9px"><h4
                                                                class="fw-bold mt-3">{{ $space->space_name }}</h4>
                                                            @if($auth != null)
                                                                @if( $auth->pivot->role_space_id == \App\Enums\UserHasRole::admin->value)
                                                                    <button data-bs-toggle="modal"
                                                                            data-bs-target="#updateBoardModal"
                                                                            class="btn" type="button"
                                                                            id="edit-title-space"><i
                                                                            class="ri-pencil-line"
                                                                            style="font-size: 23px"></i></button>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </form>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-building-line align-bottom me-1"></i>{{ $space->AccessLevelSpace->access_name }}</div>
                                                        <div class="vr"></div>
                                                        <div> Thời gian tạo  : <span class="fw-medium">{{ $space->created_at->diffForHumans(\Illuminate\Support\Carbon::now()) }}</span></div>
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
                                            @if($auth != null)
                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#leaveModal"><i class="ri-logout-box-r-line"></i></button>
                                            @else
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#accedeModal"><i class="ri-logout-box-line"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview" role="tab">
                                            Thông tin
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        @if($auth != null)
                                         @if( $auth->pivot->role_space_id == \App\Enums\UserHasRole::admin->value)
                                         <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-team" role="tab">
                                                    Quản lý thành viên
                                         </a>
                                         @endif
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
                                                <p>{{ $space->space_description }}</p>
                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <h6 class="mb-3 fw-semibold text-uppercase">Bảng</h6>
                                                        <div class="row">
                                                            @if($auth != null)
                                                            @foreach($space->tables as $table)
                                                                <div class="col-xxl-3 col-sm-6 project-card">
                                                                    <div class="card card-height-100">
                                                                        <div class="card-body">
                                                                            <div class="d-flex flex-column h-100">
                                                                                <div class="d-flex">
                                                                                    <div class="flex-grow-1">
                                                                                        <p class="text-muted mb-4">{{ $table->created_at->diffForHumans(\Illuminate\Support\Carbon::now()) }} </p>
                                                                                    </div>
                                                                                    <div class="flex-shrink-0">
                                                                                        <div class="d-flex gap-1 align-items-center">
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                                                    <i data-feather="more-horizontal" class="icon-sm"></i>
                                                                                                </button>

                                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                                    <a class="dropdown-item" href="{{ route('bang.show',$table->code) }}"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                                                                    <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                                                                    <div class="dropdown-divider"></div>
                                                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="{{ route('bang.show',$table->code) }}" class="text-body">
                                                                                <div class="d-flex mb-2">
                                                                                    <div class="flex-shrink-0 me-3">
                                                                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-warning-subtle rounded p-2">
                                                        <img src="{{ asset('default/assets/images/brands/slack.png')  }}" alt="" class="img-fluid p-1">
                                                    </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <h5 class="mb-1 fs-15">{{ $table->title }}</h5>
                                                                                        <p class="text-muted text-truncate-two-lines mb-3">{{ $table->description }}</p>
                                                                                    </div>
                                                                                </div>
                                                                                </a>
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
                                                                                        @foreach($space->users as $item)
                                                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Darline Williams">
                                                                                            <div class="avatar-xxs">
                                                                                                <img src="{{ $item->avatar }}" alt="" class="rounded-circle img-fluid">
                                                                                            </div>
                                                                                        </a>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex-shrink-0">
                                                                                    <div class="text-muted">
                                                                                        <i class="ri-calendar-event-fill me-1 align-bottom"></i> {{ $table->created_at->format('d M, Y') }}
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <!-- end card footer -->
                                                                    </div>
                                                                    <!-- end card -->
                                                                </div>
                                                            @endforeach
                                                            @endif
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
                                            <h4 class="card-title mb-0 flex-grow-1">Thành viên</h4>
                                            <div class="flex-shrink-0">

                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                                                <div class="vstack gap-3">
                                                    @foreach($space->users as $item)
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-xs flex-shrink-0 me-3">
                                                            <img src="{{ $item->avatar }}" alt="" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h5 class="fs-13 mb-0">{{ $item->name}}</h5>
                                                        </div>
                                                            <div class="flex-shrink-0">
                                                            <div class="d-flex align-items-center gap-1">
                                                                @if($item->pivot->role_space_id == 1)
                                                                    <button type="button" class="btn btn-light btn-sm">Quản trị viên</button>
                                                                @else
                                                                    <button type="button" class="btn btn-light btn-sm">Thành viên</button>
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
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addMemberModal"><i class="ri-share-line me-1 align-bottom"></i> Invite Member</button>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="team-list list-view-filter">
                                @foreach ($space->users as $item)
                                    @if($item->id === Auth::user()->id)
                                        <div class="card team-box" id="card_items">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">

                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <img src="{{ $item->avatar }}" alt="" class="img-fluid d-block rounded-circle" />
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
                                                    <button type="button" class="btn btn-light btn-sm mt-3">Quản trị viên(Bạn)</button>
                                                @else
                                                    <button type="button" class="btn btn-light btn-sm mt-3">Thành viên(Bạn)</button>
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
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    @if($item->pivot->role_space_id == 1)
                                                                        <li><button class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Xóa quản trị viên</button></li>
                                                                    @else
                                                                        <li><button class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Thêm quản trị viên</button></li>
                                                                    @endif
                                                                    <form action="{{ route('space.destroy',['spaces' => $space->code, 'user' => $item->id]) }}" method="post" class="deleteUserSpace">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <li><button class="dropdown-item" type="submit"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Xóa</button></li>
                                                                    </form>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <img src="{{ $item->avatar }}" alt="" class="img-fluid d-block rounded-circle" />
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
                                                    <button type="button" class="btn btn-light btn-sm mt-3">Quản trị viên</button>
                                                @else
                                                    <button type="button" class="btn btn-light btn-sm mt-3">Thành viên</button>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
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
                                <form action="{{ route('space.leave', $space->id) }}" method="post">
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
                                <p class="text-muted"> Bạn có muốn tham gia  không gian làm việc này ? </p>
                                <!-- Toogle to second dialog -->
                                <form action="{{ route('space.accede',$space) }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-success" type="submit">Tham gia</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="addMemberModal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0 overflow-hidden">
                        <form action="{{ route('send.member',$space) }}" method="post" id="add-member">
                            @csrf
                            @method('POST')
                        <div class="row g-0">
                            <div class="col-lg-7">
                                <div class="modal-body p-5">
                                    <h2 class="lh-base">Thêm thành viên</h2>
                                    <div class="row mb-3">
                                        <input type="text" class="form-control" placeholder="Enter your email" name="email_member" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    </div>
                                    <button class="btn btn-primary" type="submit" id="button-addon1">Send Now</button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="subscribe-modals-cover h-100">
                                    <img src="{{ asset('default/assets/images/auth-one-bg.jpg') }}" alt="" class="h-100 w-100 object-fit-cover" style="clip-path: polygon(100% 0%, 100% 100%, 100% 100%, 0% 100%, 25% 50%, 0% 0%);">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        @include('client.layouts.modal')
    </div>
    <!-- End Page-content -->
</div>
<div class="modal fade" id="updateBoardModal" tabindex="-1" aria-labelledby="updateBoardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-info-subtle">
                    <h5 class="modal-title" id="updateBoardModalLabel">Sửa không gian</h5>
                    <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action=" {{ route('khong-gian.update',$space->id) }} " method="post" id="updateBoardForm">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="boardName" class="form-label">Tên không gian</label>
                                <input type="text" class="form-control" name="space_name" value="{{ $space->space_name }}">
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="boardName" class="form-label ">Quyền xem</label>
                                <select class="form-control" name="access_level_space_id">
                                    @foreach($accessLevel as $item)
                                        @if($space->access_level_space_id == $item->id)
                                            <option value="{{ $item->id }}" selected> {{ $item->access_name }}</option>
                                        @else
                                            <option value="{{ $item->id }}"> {{ $item->access_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="boardName" class="form-label">Mô tả</label>
                                <textarea class="form-control" name="space_description" >{{ $space->space_description }}</textarea>
                            </div>

                            <div class="mt-4">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Thoát</button>
                                    <input type="submit" class="btn btn-success"  value="Sửa">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        $(document).ready(function() {
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
                submitHandler: function(form) {
                    form.submit();
                }
            });
            formUpdate.validate({
                rules: {
                    space_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    access_level_space_id: {
                        required: true,
                        min: 1
                    },
                    space_description : {
                        maxlength: 1000
                    }
                },
                messages: {
                    space_name: {
                        required: "Vui lòng nhập trường này !",
                        minlength: "Tên không gian quá ngắn !",
                        maxlength: "Tên không gian quá dài !",
                    },
                    access_level_space_id : "Vui lòng  chọn trường này !",
                    space_description : 'Mô tả không gian quá dài !'
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

        });
    </script>

@endsection

