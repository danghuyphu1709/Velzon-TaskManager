@section('modal')
<div class="modal fade" id="createTableModal" tabindex="-1" aria-labelledby="createTableModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="createTableModalLabel">Tạo bảng</h5>
                <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tables.store') }} " method="post" id="createTableForm">
                    @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <label for="boardName" class="form-label">Tên bảng</label>
                        <input type="text" class="form-control name" name="title">
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="boardName" class="form-label">Quyền truy cập</label>
                        <select class="form-control space" name="access_level_tables_id">
                            <option value="0" id="defaultSpace">Chọn quyền</option>
                            @foreach($accessLevel as $items)
                                <option value="{{ $items->id }}"> {{ $items->access_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="boardName" class="form-label">Mô tả</label>
                        <label for="desc"></label><textarea class="form-control desc" name="description"></textarea>
                    </div>
                    <div class="mt-4">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Thoát</button>
                            <input type="submit" class="btn btn-success" value="Tạo">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end add board modal-->
@endsection
