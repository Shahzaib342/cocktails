$(document).ready(function () {
    $('#login_btn').click(function () {
        event.preventDefault();
        console.log('button clicked');
        if ($('#loginEmail').val() == "" || $('#loginPassword').val() == "") {
            $('.statusMsg').html('<span style="color:red;">Please enter your email and password.</span>');
        } else {
            $.ajax({
                url: "../../Controllers/LoginController.php/login",
                method: "POST",
                data: $("#login_form").serialize(),
                beforeSend: function () {
                    $('.statusMsg').html('<span style="color:green;">Loading process...</span>');
                },
                success: function (response) {
                    if (response == 'ok') {
                        $('.statusMsg').html('<span style="color:green;">We are logging into your account..Wait a second.. </span>');
                        setTimeout(' window.location.href = "index.php"; ', 500);
                    } else {
                        $('.statusMsg').html('<span style="color:red;">' + response + '</span>');
                    }
                }
            });
        }
    });
});