$(document).ready(function() {

    $("#demo1").hide();
    $("#demo2").hide();
    $("#demo3").hide();
    $("#demo4").hide();
    $("#demo5").hide();
    $("#demo6").hide();
    $("#demo7").hide();
    $("#demo8").hide();
    $("#demo9").hide();



    $("#registrationForm").submit(function(e) {
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

        // First Name Validation
        var fname = $("#fname").val().trim();
        if (fname === "") {
            showError("#demo1", "#fname");
        } else {
            hideError("#demo1", "#fname");
        }
        // First Name Validation
        var fname = $("#lname").val().trim();
        if (fname === "") {
            showError("#demo2", "#lname");
        } else {
            hideError("#demo2", "#lname");
        }
        // Email Validation
        var email = $("#email").val().trim();
        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!emailPattern.test(email)) {
            $("#demo3").text("enter valid email address");
            showError("#demo3", "#email");
        } else {
            hideError("#demo3", "#email");
        }
        // Gender Validation
        var gender = $("input[name='gender']:checked").val();
        if (!gender) {
            showError("#demo4", "input[name='gender']");
        } else {
            hideError("#demo4", "input[name='gender']");
        }


        // Password Validation
        var password = $("#password").val().trim();
        if (password === "") {
            showError("#demo5", "#password");
        } else if (password.length < 6) {
            $("#demo5").text("Password must be at least 6 characters");
            showError("#demo5", "#password");
        } else {
            hideError("#demo5", "#password");
        }
        // confirm Password Validation
        var confirmpassword = $("#confirmpassword").val().trim();
        if (confirmpassword === "") {
            showError("#demo6", "#confirmpassword");
        } else if (password !== confirmpassword) {
            $("#demo6").text("***Passwords do not match***");
            showError("#demo6", "#confirmpassword");
        } else {
            hideError("#demo6", "#confirmpassword");
        }

        // city Selection Validation
        var city = $("#city").val();
        if (city === "") {
            showError("#demo7", "#city");
        } else {
            hideError("#demo7", "#city");
        }

        //image Validation
        var image = $("#image").val();
        var validExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp|\.jfif)$/i;
        if (image === "") {
            showError("#demo8", "#image");
        } else if (!validExtensions.exec(image)) {
            showError("#demo8", "#image");
            alert("Please upload an image in one of the following formats: .jpg, .jpeg, .webp, .jfif");
        } else {
            hideError("#demo8", "#image");
        }
        //terms validation
        if (!$("#test").is(":checked")) {
            showError("#demo9", "#test");
        } else {
            hideError("#demo9", "#test");
        }

        // Prevent form submission if any field is invalid
        if (!isValid) {
            e.preventDefault();
        }
    });
})