$(document).ready(function() {
    // space
    var modalCreateSpace = $('#createboardModal');
    var createSpace = modalCreateSpace.find('#createboardForm');

    // table
    var modalCreateTable = $('#createTableModal');
    var createTable = modalCreateTable.find('#createTableForm');


    createSpace.validate({
        rules: {
            space_name: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            access_level_space_id: {
                required: true,
                min: 1
            },
            space_description : {
                maxlength: 1000
            }
        },
        messages: {
            space_name: {
                required: "Vui lòng nhập trường này !",
                minlength: "Tên không gian quá ngắn !",
                maxlength: "Tên không gian quá dài !",
            },
            access_level_space_id : "Vui lòng  chọn trường này !",
            space_description : 'Mô tả không gian quá dài !'
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    createTable.validate({
        rules: {
            title: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            spaces_id: {
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
            spaces_id : "Vui lòng  chọn trường này !",
            description : 'Mô tả không gian quá dài !'
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});
