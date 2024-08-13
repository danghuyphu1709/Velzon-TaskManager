$(document).ready(function() {

    $(".important").on('click',function (){
        let important = $(this).hasClass('active');
        let url = $(this).data('url');
        let id = $(this).data('id');
        $.ajax({
            url: url,
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({
                id: id,
                type:important
            }),
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Có lỗi xảy ra khi gửi bình luận.Vui lòng thử lại sau !");
            }
        });
    });

    // table
    var modalCreateTable = $('#createTableModal');
    var createTable = modalCreateTable.find('#createTableForm');

    createTable.validate({
        rules: {
            title: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            access_level_tables_id: {
                required: true,
                min: 1
            },
            description : {
                maxlength: 1000
            }
        },
        messages: {
            title: {
                required: "Vui lòng nhập trường này !",
                minlength: "Tên dự án quá ngắn !",
                maxlength: "Tên dự án quá quá dài !",
            },
            access_level_tables_id : "Vui lòng  chọn trường này !",
            description : 'Mô tả không gian quá dài !'
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});
