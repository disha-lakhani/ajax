$(document).ready(function () {
    var current_fs, next_fs, previous_fs; 
    var opacity;

    for (let i = 1; i <= 15; i++) {
        $("#demo" + i).hide();
    }

    function validateFieldset() {
        let isValid = true; 

        function showError(elementId, inputSelector, message = "") {
            $(elementId).text(message).show();
            $(inputSelector).parent().css("margin-bottom", "0");
            isValid = false;
        }

        function hideError(elementId, inputSelector) {
            $(elementId).hide();
            $(inputSelector).parent().css("margin-bottom", "1rem");
        }

        // First Page Validations
        if (current_fs.attr('id') === "personal-details") {
            var fname = $("#fname").val().trim();
            if (fname === "") {
                showError("#demo1", "#fname", "***First name is required***");
            } else {
                hideError("#demo1", "#fname");
            }

            var lname = $("#lname").val().trim();
            if (lname === "") {
                showError("#demo2", "#lname", "***Last name is required***");
            } else {
                hideError("#demo2", "#lname");
            }

            var field = $("#field").val().trim();
            if (field === "") {
                showError("#demo3", "#field", "***Field is required***");
            } else {
                hideError("#demo3", "#field");
            }

            var dob = $("#dob").val().trim();
            if (dob === "") {
                showError("#demo4", "#dob", "***Date of birth is required***");
            } else {
                var enteredDate = new Date(dob);
                var today = new Date();
                today.setHours(0, 0, 0, 0);
                if (enteredDate >= today) {
                    showError("#demo4", "#dob", "***Enter a valid birthdate***");
                } else {
                    hideError("#demo4", "#dob");
                }
            }

            var gender = $("input[name='gender']:checked").val();
            if (!gender) {
                showError("#demo5", "input[name='gender']", "***Gender is required***");
            } else {
                hideError("#demo5", "input[name='gender']");
            }
        }

        // Second Page Validations
        if (current_fs.attr('id') === "contact-info") {
            var contact = $("#contact").val().trim();
            if (contact === "" || isNaN(contact) || contact.length !== 10) {
                if (contact.length !== 10) {
                    showError("#demo6", "#contact", "***Only 10 digits are allowed***");
                } else {
                    showError("#demo6", "#contact", "***Contact number is required***");
                }
            } else {
                hideError("#demo6", "#contact");
            }

            var email = $("#email").val().trim();
            var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!emailPattern.test(email)) {
                showError("#demo7", "#email", "***Enter a valid email address***");
            } else {
                hideError("#demo7", "#email");
            }

            var address = $("#address").val().trim();
            if (address === "") {
                showError("#demo8", "#address", "***Address is required***");
            } else {
                hideError("#demo8", "#address");
            }

            var city = $("#city").val();
            if (city === "") {
                showError("#demo9", "#city", "***City is required***");
            } else {
                hideError("#demo9", "#city");
            }

            var state = $("#state").val();
            if (state === "") {
                showError("#demo10", "#state", "***State is required***");
            } else {
                hideError("#demo10", "#state");
            }
        }

        return isValid;
    }


    
    function validateAccountSetup() {
        let isValid = true; 
        function showError(elementId, inputSelector, message = "") {
            $(elementId).text(message).show();
            $(inputSelector).parent().css("margin-bottom", "0");
            isValid = false;
        }

        function hideError(elementId, inputSelector) {
            $(elementId).hide();
            $(inputSelector).parent().css("margin-bottom", "1rem");
        }

        // Account Setup Validations
        var image = $("#image").val();
        var validExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp|\.jfif)$/i;
        if (image === "") {
            showError("#demo11", "#image", "***Profile image is required***");
        } else if (!validExtensions.exec(image)) {
            showError("#demo11", "#image", "***Please upload a valid image file***");
            alert("Allowed formats: .jpg, .jpeg, .png, .gif, .webp, .jfif");
        } else {
            hideError("#demo11", "#image");
        }

        var username = $("#username").val().trim();
        if (username === "") {
            showError("#demo12", "#username", "***Username is required***");
        } else {
            hideError("#demo12", "#username");
        }

        var password = $("#password").val().trim();
        if (password === "") {
            showError("#demo13", "#password", "***Password is required***");
        } else {
            hideError("#demo13", "#password");
        }

        var confirmPassword = $("#confirmpassword").val().trim();
        if (confirmPassword === "") {
            showError("#demo14", "#confirmpassword", "***Confirm password is required***");
        } else if (confirmPassword !== password) {
            showError("#demo14", "#confirmpassword", "***Passwords do not match***");
        } else {
            hideError("#demo14", "#confirmpassword");
        }

        var terms = $("#terms").is(":checked");
        if (!terms) {
            showError("#demo15", "#terms", "***You must agree to the terms***");
        } else {
            hideError("#demo15", "#terms");
        }

        return isValid; 
    }

    $(".next").click(function () {
        current_fs = $(this).parent(); 
        next_fs = $(this).parent().next(); 

        if (validateFieldset()) {
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            next_fs.show();
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
        }
    });

    $(".previous").click(function () {
        current_fs = $(this).parent(); 
        previous_fs = $(this).parent().prev(); 

        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        previous_fs.show();
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
    });


    $(".submit-btn").click(function (e) {
        e.preventDefault();
      
        if (validateAccountSetup()) {
            $("#msform").submit();
        }
    });

    
});
