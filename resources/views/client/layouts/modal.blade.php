@section('modal')
<div class="modal fade" id="addmemberModal" tabindex="-1" aria-labelledby="addmemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-warning-subtle">
                <h5 class="modal-title" id="addmemberModalLabel">Add Member</h5>
                <button type="button" class="btn-close" id="btn-close-member" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <label for="submissionidInput" class="form-label">Submission ID</label>
                            <input type="number" class="form-control" id="submissionidInput" placeholder="Submission ID">
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="profileimgInput" class="form-label">Profile Images</label>
                            <input class="form-control" type="file" id="profileimgInput">
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="firstnameInput" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstnameInput" placeholder="Enter firstname">
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="lastnameInput" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastnameInput" placeholder="Enter lastname">
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="designationInput" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designationInput" placeholder="Designation">
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="titleInput" class="form-label">Title</label>
                            <input type="text" class="form-control" id="titleInput" placeholder="Title">
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="numberInput" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="numberInput" placeholder="Phone number">
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="joiningdateInput" class="form-label">Joining Date</label>
                            <input type="text" class="form-control" id="joiningdateInput" data-provider="flatpickr" placeholder="Select date">
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="emailInput" class="form-label">Email ID</label>
                            <input type="email" class="form-control" id="emailInput" placeholder="Email">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="ri-close-line align-bottom me-1"></i> Close</button>
                <button type="button" class="btn btn-success" id="addMember">Add Member</button>
            </div>
        </div>
    </div>
</div>
<!--end add member modal-->

<div class="modal fade" id="createboardModal" tabindex="-1" aria-labelledby="createboardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="createboardModalLabel">Tạo không gian</h5>
                <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="boardName" class="form-label">Tên không gian</label>
                            <input type="text" class="form-control" id="name" placeholder="">
                            <span class="text-danger" id="error_name"></span>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <label for="boardName" class="form-label ">Quyền xem</label>
                            <select class="form-control" id="security" >
                                @foreach($accessLevel as $items)
                                <option value="{{ $items->id }}"> {{ $items->access_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <label for="boardName" class="form-label">Mô tả</label>
                            <label for="desc"></label><textarea class="form-control" id="desc"></textarea>
                        </div>

                        <div class="mt-4">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Thoát</button>
                                <button type="button" class="btn btn-success" id="create" data-url="{{ route('space.store') }}">Tạo</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!--end add board modal-->

<div class="modal fade" id="createTableModal" tabindex="-1" aria-labelledby="createTableModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="createTableModalLabel">Tạo bảng</h5>
                <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="boardName" class="form-label">Tên bảng</label>
                        <input type="text" class="form-control name" placeholder="">
                        <span class="text-danger" id="error_name"></span>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="boardName" class="form-label">Không gian làm việc</label>
                        <select class="form-control space" >
                            @foreach($spaces as $items)
                                <option value="{{ $items->id }}"> {{ $items->space_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="boardName" class="form-label">Quyền xem</label>
                        <select class="form-control security" >
                            @foreach($accessLevelTable as $items)
                                <option value="{{ $items->id }}"> {{ $items->access_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="boardName" class="form-label">Mô tả</label>
                        <label for="desc"></label><textarea class="form-control desc"></textarea>
                    </div>
                    <div class="mt-4">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Thoát</button>
                            <button type="button" class="btn btn-success" id="create" data-url="{{ route('table.store') }}">Tạo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end add board modal-->

<div class="modal fade" id="creatertaskModal" tabindex="-1" aria-labelledby="creatertaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="creatertaskModalLabel">Create New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <label for="projectName" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="projectName" placeholder="Enter project name">
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="sub-tasks" class="form-label">Task Title</label>
                            <input type="text" class="form-control" id="sub-tasks" placeholder="Task title">
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="task-description" class="form-label">Task Description</label>
                            <textarea class="form-control" id="task-description" rows="3" placeholder="Task description"></textarea>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="formFile" class="form-label">Tasks Images</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="tasks-progress" class="form-label">Add Team Member</label>
                            <div data-simplebar style="height: 95px;">
                                <ul class="list-unstyled vstack gap-2 mb-0">
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="anna-adame">
                                            <label class="form-check-label d-flex align-items-center" for="anna-adame">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                <span class="flex-grow-1 ms-2">
                                                                        Anna Adame
                                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="frank-hook">
                                            <label class="form-check-label d-flex align-items-center" for="frank-hook">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                <span class="flex-grow-1 ms-2">
                                                                        Frank Hook
                                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="alexis-clarke">
                                            <label class="form-check-label d-flex align-items-center" for="alexis-clarke">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                <span class="flex-grow-1 ms-2">
                                                                        Alexis Clarke
                                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="herbert-stokes">
                                            <label class="form-check-label d-flex align-items-center" for="herbert-stokes">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                <span class="flex-grow-1 ms-2">
                                                                        Herbert Stokes
                                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="michael-morris">
                                            <label class="form-check-label d-flex align-items-center" for="michael-morris">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                <span class="flex-grow-1 ms-2">
                                                                        Michael Morris
                                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="nancy-martino">
                                            <label class="form-check-label d-flex align-items-center" for="nancy-martino">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                <span class="flex-grow-1 ms-2">
                                                                        Nancy Martino
                                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="thomas-taylor">
                                            <label class="form-check-label d-flex align-items-center" for="thomas-taylor">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                <span class="flex-grow-1 ms-2">
                                                                        Thomas Taylor
                                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="tonya-noble">
                                            <label class="form-check-label d-flex align-items-center" for="tonya-noble">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                                    </span>
                                                <span class="flex-grow-1 ms-2">
                                                                        Tonya Noble
                                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <label for="due-date" class="form-label">Due Date</label>
                            <input type="text" class="form-control" id="due-date" data-provider="flatpickr" placeholder="Select date">
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <label for="categories" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="categories" placeholder="Enter tag">
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <label for="tasks-progress" class="form-label">Tasks Progress</label>
                            <input type="text" class="form-control" maxlength="3" id="tasks-progress" placeholder="Enter progress">
                        </div>
                        <!--end col-->
                        <div class="mt-4">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Add Task</button>
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
<!--end add board modal-->

<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="delete-btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this tasks ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
