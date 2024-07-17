@section('sidebar')
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Light Logo-->
            <a href="#" class="logo logo-light">
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
                    <li class="menu-title"><span data-key="t-menu">Bảng</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="widgets.html">
                            <i class="ri-table-2"></i> <span data-key="t-widgets" style="font-size: 20px;margin-left: 10px">{{ $table->spaces->space_name }}</span>
                        </a>
                    </li>
                    <div class="collapse menu-dropdown show" id="sidebar{{$table->spaces->id}}">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('khong-gian.show',$table->spaces->code) }}" class="nav-link" data-key="t-analytics"> Bảng </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-ecommerce"> Cài đặt </a>
                            </li>
                        </ul>
                    </div>
                </ul>
                <hr>
                <ul class="navbar-nav mt-4" id="space_sidebar">
                    <li class="menu-title"><span data-key="t-menu">Nhiệm vụ</span></li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
        <div class="sidebar-background"></div>
    </div>
@endsection