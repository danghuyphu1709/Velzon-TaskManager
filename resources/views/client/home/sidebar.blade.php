@section('sidebar')
    <div class="app-menu navbar-menu">
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
                    <li class="menu-title"><span data-key="t-menu">Cơ bản</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('home') }}">
                            <i class="ri-projector-line"></i> <span data-key="t-widgets" style="font-size: 20px;margin-left: 10px">Dự án</span>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav mt-1" id="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#important" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-star-line"></i><span class="text-truncate-two-lines" data-key="t-dashboards" style="font-size: 20px;margin-left: 10px"> Quan trọng</span>
                        </a>
                        <div class="collapse menu-dropdown" id="important">
                            <ul class="nav nav-sm flex-column">
                                @foreach($user->tables as $item)
                                @if($item->important == \App\Enums\StatusSystem::ACTIVATE->value)
                                        <li class="nav-item">
                                            <a href="{{ route('tables.index',$item->code) }}" class="text-truncate-two-lines nav-link" data-key="t-analytics">{{ $item->title }} </a>
                                        </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
                <hr>
                <ul class="navbar-nav mt-4" id="space_sidebar">
                    <li class="menu-title"><span data-key="t-menu">Nội dung dự án</span></li>
                   @foreach($user->tables as $item)
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#table{{$item->code}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-survey-line"></i><span class="text-truncate-two-lines" data-key="t-dashboards"> {{ $item->title }} </span>
                        </a>
                        <div class="collapse menu-dropdown" id="table{{$item->code}}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('tables.index',$item->code ) }}" class="nav-link" data-key="t-analytics"> Dự án </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tables.show',$item->code ) }}" class="nav-link" data-key="t-ecommerce"> Cài đặt </a>
                                </li>
                                <li class="nav-item">
                                   <hr>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
        <div class="sidebar-background"></div>
    </div>
@endsection
