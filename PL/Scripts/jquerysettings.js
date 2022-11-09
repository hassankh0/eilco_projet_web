$(document).ready(function () {
    var validusername = false;
    var validpass = false;
    var validemail = true;
    var validconfpass = false;

//email format
    $('#mail').keyup(function () {
        var input = $(this);
        var re = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var is_email = re.test(input.val());
        if (!is_email) {
            $("#email_error").removeClass("error_hide").addClass("error");
            $("#email_error").show();

            validemail = false;
        } else {
            $("#email_error").removeClass("error").addClass("error_hide");
            $("#email_error").hide();
            validemail = true;

        }
    });

//username
    $("#username").keyup(function () {
        var input = $(this);
        var re = /^[a-zA-Z'.\\s]{3,40}$/;
        var is_username = re.test(input.val());
        if (!is_username) {
            $("#username_error").removeClass("error_hide").addClass("error");
            validusername = false;
        } else {
            $("#username_error").removeClass("error").addClass("error_hide");
            $("#username_error").hide();
            validusername = true;
        }
    });


//password rules
    $("#pass").keyup(function () {
        var input = $(this);
        var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
        ;
        var is_password = re.test(input.val());

        if (is_password) {
            $("#password_error").removeClass("error").addClass("error_hide");
            $("#password_error").hide();

            $("#password_error2").removeClass("error").addClass("error_hide");
            $("#password_error2").hide();
            validpass = true;
        } else {
            $("#password_error").removeClass("error_hide").addClass("error");
            $("#password_error").show();

            $("#password_error2").removeClass("error_hide").addClass("error");
            $("#password_error2").show();
            validpass = false;

        }
    });

//password confirmation
    $("#confirm_pass").keyup(function () {
        var input = $(this);
        var pass = $("#pass");
        if (input.val() == pass.val())
        {
            $("#password_confirmation_error").removeClass("error").addClass("error_hide");
            $("#password_confirmation_error").hide();
            validconfpass = true;
        } else {
            $("#password_confirmation_error").removeClass("error_hide").addClass("error");
            $("#password_confirmation_error").show();
            validconfpass = false;

        }

    });
    $("#btn").click(function () {
        // if($('#pass').isEmpty && $('#confirm_pass').isEmpty){
        //     validpass = true;
        //     validconfpass = true;
        // }
        // if (!(validemail && validconfpass  && validpass))
        // {
        //     alert("Invalid Fields");
        //
        //     $("#form").one("click", function(event) {
        //         event.preventDefault();
        //     });
        // }
        // else {

            $("#form").submit();

        // }
    });
});
