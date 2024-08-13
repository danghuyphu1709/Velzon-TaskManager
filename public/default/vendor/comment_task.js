
$(document).ready(function () {
    $("#postComment").validate({
        rules: {
            comment: {
                required: true,
                minlength: 1,
                maxlength: 1000
            },
        },
        messages: {
            comment: {
                required: "Vui lòng nhập bình luận.",
                minlength: "Bình luận phải có ít nhất 1 ký tự.",
                maxlength: "Bình luận không được vượt quá 1000 ký tự."
            },
        },
        submitHandler: function(form) {
            var comment = $(form).find('textarea[name="comment"]').val();
            var url = $(form).data('url');

            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ content: comment }),
                success: function(response) {
                    console.log(response);
                    form.reset();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Có lỗi xảy ra khi gửi bình luận.Vui lòng thử lại sau !");
                }
            });
            return false;
        }
    });
});
