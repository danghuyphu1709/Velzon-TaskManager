$(document).ready(function() {
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
                minlength: "Tên không gian quá ngắn !",
                maxlength: "Tên không gian quá dài !",
            },
            access_level_tables_id : "Vui lòng  chọn trường này !",
            description : 'Mô tả không gian quá dài !'
        },
        submitHandler: function(form) {
            form.submit();

            form.reset();
        }
    });

});
