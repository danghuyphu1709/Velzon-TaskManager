@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Người dùng</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Người dùng</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Người dùng</h5>
                            </div>
                            <div class="card-body">
                                <table id="example"
                                       class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                                       value="option">
                                            </div>
                                        </th>
                                        <th data-ordering="false">SR No.</th>
                                        <th data-ordering="false">ID</th>
                                        <th data-ordering="false">Họ và Tên</th>
                                        <th data-ordering="false">Email</th>
                                        <th data-ordering="false">Ảnh đại diện</th>
                                        <th data-ordering="false">Vai trò</th>
                                        <th>Từ Google</th>
                                        <th>Trang thái</th>
                                        <th>Ngày tạo</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                       value="option1">
                                            </div>
                                        </th>
                                        <td>01</td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><a href="#!">{{ $user->email }}</a></td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-3.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                    <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-xxs">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                <span class="badge bg-info-subtle text-info">{{ $role->name }}</span>
                                             @endforeach
                                        </td>
                                        <td>
                                            @if($user->google_id)
                                                <span class="badge bg-info-subtle text-success">Yes</span>
                                            @else
                                                <span class="badge bg-info-subtle text-danger">No</span>
                                            @endif

                                        </td>
                                        <td><span class="badge bg-info-subtle text-primary">Hoạt động</span></td>
                                        <td>{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('admin.role.create',$user) }}" class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Phân Quyền </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </div>
    </div>
@endsection
