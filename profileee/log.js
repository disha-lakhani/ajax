$(document).ready(function() {
    $("#demo1").hide();
    $("#demo2").hide();
    $("#loginform").submit(function(e) {
        var isValid = true;

        function showError(elementId, inputGroup) {
            $(elementId).show();
            $(inputGroup).parent().css("margin-bottom", "0");
            isValid = false;
        }

        function hideError(elementId, inputGroup) {
            $(elementId).hide();
            $(inputGroup).parent().css("margin-bottom", "1rem");
        }

        // Email Validation
        var email = $("#email").val().trim();
        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!emailPattern.test(email)) {
            $("#demo1").text("enter valid email address");
            showError("#demo1", "#email");
        } else {
            hideError("#demo1", "#email");
        }
         // Password Validation
        var password = $("#password").val().trim();
        if (password === "") {
            showError("#demo2", "#password");
        } else if (password.length < 6) {
            $("#demo2").text("Password must be at least 6 characters");
            showError("#demo2", "#password");
        } else {
            hideError("#demo2", "#password");
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
})