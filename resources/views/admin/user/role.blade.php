@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">{{ $user->email }}</h4>
                            </div>
                            <form action="{{ route('admin.role.store',$user) }}" method="post">
                                @csrf
                                @method('POST')
                            <div class="card-body mt-4">
                                <div class="live-preview">
                                    <div class="row">
                                        @foreach($roles as $role)
                                        <div class="col-md-3">
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" role="switch" id="SwitchCheck1" {{ $role->checked ? 'checked' : '' }}>
                                                <label class="form-check-label" for="SwitchCheck1">{{ $role->name }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--end row-->
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-outline-info"> Gửi</button>
                                    <a href="{{ route('admin.user') }}"><button type="button" class="btn btn-outline-warning">Quay lại</button></a>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!--end card-->
                    </div> <!-- end col -->
                </div>
         </div>
        </div>
    </div>
@endsection
