@section('sidebar')
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Light Logo-->
            <a href="{{ route('home') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('default/assets/images/logo-sm.png') }}" alt="" height="28">
                    </span>
                <span class="logo-lg">
                        <img src=" {{ asset('default/assets/images/logo-light.png') }}" alt="" height="28">
                    </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar" class="mt-5">
            <div class="container-fluid">
                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Nhiệm vụ</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href=" {{ route('task.index',$task->code) }}">
                            <i class="ri-survey-line"></i> <span data-key="t-widgets" class="text-truncate-two-lines" style="font-size: 18px">{{ $task->task_name }}</span>
                        </a>
                    </li>
                    <div class="collapse menu-dropdown show" id="sidebar">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href=" {{ route('tables.index',$task->ListTask->Tables->code) }} " class="nav-link" data-key="t-analytics">Dự án</a>
                            </li>
                            <li class="nav-item">
                                <button data-bs-toggle="modal" data-bs-target="#updateTaskModal"  class="nav-link" data-key="t-ecommerce"> Sửa </button>
                            </li>
                            <li class="nav-item">
                                <button  class="nav-link" data-key="t-ecommerce"> Xóa </button>
                            </li>
                        </ul>
                    </div>
                </ul>
                <hr>
            </div>
            <ul class="navbar-nav mt-4" id="space_sidebar">
                <li class="menu-title"><span data-key="t-menu">Danh sách nhiệm vụ</span></li>
                @foreach($task->ListTask->task as $item)
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('task.index',$item->code) }}" aria-controls="sidebarDashboards">
                            <i class="ri-survey-line"></i><span class="text-truncate-two-lines" data-key="t-dashboards"> {{ $item->task_name }} </span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- Sidebar -->
        </div>
        <div class="sidebar-background"></div>
    </div>
@endsection
