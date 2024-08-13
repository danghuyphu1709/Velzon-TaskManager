function actionDelete(e) {
    e.preventDefault();
    Swal.fire({
        title: "Xóa thành viên ?",
        text: "Bạn có muốn xóa thành viên này !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes !",
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).submit();
        }
    });
}

function actionAddRoles(e) {
    e.preventDefault();
    Swal.fire({
        title: "Thêm quyền cho thành viên ?",
        text: "Bạn có muốn thêm quyền thành viên này !",
        icon: "success",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes !",
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).submit();
        }
    });
}

function actionDeleteRoles(e) {
    e.preventDefault();
    Swal.fire({
        title: "Xóa quyền cho thành viên ?",
        text: "Bạn có muốn xóa quyền thành viên này !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes !",
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).submit();
        }
    });
}



function actionDeleteTable(e) {
    e.preventDefault();
    Swal.fire({
        title: "Xóa nhiệm vụ ?",
        text: "Bạn có muốn xóa nhiệm vụ này !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes !",
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).submit();
        }
    });
}
$(function () {
    // delete
    $(document).on("click", ".deleteUserSpace", actionDelete);

    $(document).on("click", ".deleteFlashSale", actionDelete);

    //deleteTaskList
    $(document).on("click", ".deleteTaskList", actionDeleteTable);

    // add role
    $(document).on("click",".addUserRoleTables", actionAddRoles);

    // delete role
    $(document).on("click",".deleteUserRoleTables", actionDeleteRoles);
});
