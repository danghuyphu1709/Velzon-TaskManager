@extends('client.layouts.master')
@include('client.home.sidebar')
@section('content')
    <div class="vertical-overlay"></div>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Danh sách dự án</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Danh sách dự án</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTableModal"><i class="ri-add-line align-bottom me-1"></i> Tạo dự án</button>
                        </div>
                    </div>
                    <div class="col-sm">

                    </div>
                </div>

                <div class="row">
                    @foreach($user->tables as $item)
                        @php
                            $taskComplete = 0;
                            $totalTask = count($item->tasks); // Tính tổng số task ngay từ đầu
                            $progressbar = 0;

                            foreach ($item->tasks as $task) {
                                if ($task->status == \App\Enums\StatusSystem::COMPLETE->value) {
                                    $taskComplete++;
                                }
                            }

                            if($totalTask > 0) {
                                $progressbar = floor(($taskComplete / $totalTask) * 100);
                            }
                        @endphp
                    <div class="col-xxl-3 col-sm-6 project-card">
                        <div class="card card-height-100">
                            <div class="card-body">
                                <div class="d-flex flex-column h-100">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-4">Nội dung dự án</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="d-flex gap-1 align-items-center">
                                                <button type="button" class="important btn avatar-xs mt-n1 p-0 favourite-btn {{ $item->important ? 'active' : ''}}" data-id="{{ $item->id }}" data-url="{{ route('tables.important') }}">
                                                        <span class="avatar-title bg-transparent fs-15">
                                                            <i class="ri-star-fill"></i>
                                                        </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('tables.index',$item->code) }}" class="text-body">
                                    <div class="row mb-2">
                                        <div class="col-xl-2 flex-shrink-0 me-3">
                                            <div class="avatar-sm">
                                                    <span class="avatar-title bg-info-subtle rounded p-2">
                                                        <img src="{{ asset('default/assets/images/brands/dropbox.png') }}" alt="" class="img-fluid p-1">
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 flex-grow-1">
                                            <h5 class="mb-1 fs-15 text-truncate-two-lines">{{ $item->title }}</h5>
                                            <p class="text-muted text-truncate-two-lines mb-3">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                    </a>

                                    <div class="mt-auto">
                                        <div class="d-flex mb-2">
                                            <div class="flex-grow-1">
                                                <div>Nhiệm vụ </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div><i class="ri-list-check align-bottom me-1 text-muted"></i> {{ $taskComplete }}/{{ $totalTask }}</div>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm animated-progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="{{ $totalTask }}" style="width: {{ $progressbar }}%;"></div><!-- /.progress-bar -->
                                        </div><!-- /.progress -->
                                    </div>
                                </div>

                            </div>
                            <!-- end card body -->
                            <div class="card-footer bg-transparent border-top-dashed py-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="avatar-group">
                                            @foreach($item->users as $user)
                                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Kristin Turpin">
                                                    <div class="avatar-xxs">
                                                            <img src="{{ $user->avatar }}" alt="" class="rounded-circle img-fluid">
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="text-muted">
                                            <i class="ri-calendar-event-fill me-1 align-bottom"></i> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- end card footer -->
                        </div>
                        <!-- end card -->
                    </div>
                    @endforeach
                    <!-- end col -->
                </div>
            </div>
            @if(session('error'))
                <script>
                    alert(@json(session('error')))
                </script>
            @endif
            <!-- container-fluid -->
        </div>
        @include('client.home.modal')
        <!-- End Page-content -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('default/assets/js/pages/project-list.init.js') }}"></script>
    <script src="{{ asset('default/vendor/main.js') }}"></script>
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
    </script>
@endsection



