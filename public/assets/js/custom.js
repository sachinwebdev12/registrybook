$(document).ready(function () {

    $('#data-form-submit').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById('data-form-submit'));
        jQuery.ajax({
            url: jQuery(this).attr('action'),
            method: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $('#data-form-submit').find('.text-danger').html('');
                $('#page-message').html('');
                if (response.success) {
                    console.log(1);
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else if (response.message) {
                        var msgHtml = '<div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">' + response.message + '<i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i></div>';
                        $('#page-message').html(msgHtml);
                        $(window).scrollTop(0);
                    }
                } else {
                    console.log(1);
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else if (response.validation) {
                        $.each(response.validation, function (key, message) {
                            $('#data-form-submit').find("[name=" + key + "]").parent().find('.text-danger').html(message);
                            $('#data-form-submit').find(".text-danger[name=" + key + "]").html(message);
                        });
                    } else if (response.message) {
                        var msgHtml = '<div class="alert alart_style_three alert-dismissible fade show mb20" role="alert">' + response.message + '<i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i></div>';
                        $('#page-message').html(msgHtml);
                        $(window).scrollTop(0);
                    }
                }
            }
        });
    });
});