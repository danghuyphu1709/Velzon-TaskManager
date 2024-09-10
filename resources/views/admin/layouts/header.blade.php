@section('css')
    .btn-transparent {
    background-color: transparent;
    border: 1px solid transparent;
    color: inherit;
    }

    .btn-transparent:hover,
    .btn-transparent:focus {
    background-color: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.2);
    }
@endsection
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    </button>
                </div>

                <div class="d-flex">
                    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-bell fs-22'></i>
                            <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span class="visually-hidden">unread messages</span></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold text-white"> Thông báo </h6>
                                        </div>
                                        <div class="col-auto dropdown-tabs">
                                            <span class="badge bg-light-subtle text-body fs-13"> Mới ({{ count(Auth::user()->unreadNotifications) }}) </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-2 pt-2">
                                    <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <button class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab" aria-selected="true">
                                                Tất cả ({{ count(Auth::user()->notifications) }})
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <form action="/chedkcs" method="post">
                            <div class="tab-content position-relative" id="notificationItemsTabContent">
                                <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                                        @foreach(Auth::user()->notifications as $notification)
                                            @if(!$notification->read_at)
                                                <a href="{{ route('tables.index',$notification->data['code']) }}?query={{ $notification->id }}">
                                                     <div class="text-reset notification-item d-block dropdown-item bg-light">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3 flex-shrink-0">
                                                           <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                                             <i class='bx bx-message-square-dots'></i>
                                                          </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="stretched-link">
                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->data['type'] }}</h6>
                                                            </div>
                                                            <div class="fs-13 text-muted">
                                                                <p class="mb-1"><b class="text-success">{{ $notification->data['task_name'] }}</b>,{{ $notification->data['message'] }} 🔔.</p>
                                                            </div>
                                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                <span><i class="mdi mdi-clock-outline"></i>{{ mb_convert_case($notification->created_at->diffForHumans(), MB_CASE_TITLE, "UTF-8") }}</span>
                                                            </p>
                                                        </div>
                                                        <div class="px-2 fs-15">
                                                            <div class="form-check notification-check">
                                                                <input class="form-check-input" type="checkbox" name="notifications[]" value="{{ $notification->id }}" id="messages-notification-check02">
                                                                <label class="form-check-label" for="messages-notification-check02"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            @else
                                                <a href="{{ route('tables.index',$notification->data['code']) }}?query={{ $notification->id }}">
                                                <div class="text-reset notification-item d-block dropdown-item ">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3 flex-shrink-0">
                                                           <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                                             <i class='bx bx-message-square-dots'></i>
                                                          </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="stretched-link">
                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->data['type'] }}</h6>
                                                            </div>
                                                            <div class="fs-13 text-muted">
                                                                <p class="mb-1"><b class="text-success">{{ $notification->data['task_name'] }}</b>,{{ $notification->data['message'] }} 🔔.</p>
                                                            </div>
                                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                <span><i class="mdi mdi-clock-outline"></i>{{ mb_convert_case($notification->created_at->diffForHumans(), MB_CASE_TITLE, "UTF-8") }}</span>
                                                            </p>
                                                        </div>
                                                        <div class="px-2 fs-15">
                                                            <div class="form-check notification-check">
                                                                <input class="form-check-input" type="checkbox" name="notifications[]" value="{{ $notification->id }}" id="messages-notification-check02">
                                                                <label class="form-check-label" for="messages-notification-check02"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>

                                <div class="notification-actions" id="notification-actions">
                                    <div class="d-flex text-muted justify-content-center">
                                      Thông báo <div id="select-content" class="text-body fw-semibold px-1">0</div>  đã chọn <button type="submit" class="btn btn-link link-danger p-0 ms-3">Xóa</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="{{ Auth::user()->avatar }}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                            </span>
                        </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">{{ Auth::user()->name  }}</h6>
                            <div class="dropdown-divider">
                            </div>
                            <a class="dropdown-item" href="{{ route('home') }}"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Trang người dùng</span></a>
                            <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                @csrf
                                <button type="submit" class="btn"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>Đăng xuất</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- removeNotificationModal -->
    </header>
    <script>
    </script>
</div>
