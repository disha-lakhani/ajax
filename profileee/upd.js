
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#update').addEventListener('submit', function(event) {
            let isValid = true;

            // Clear previous error messages
            document.querySelectorAll('span[id^="demo"]').forEach(span => {
                span.style.display = 'none';
            });

            // First Name Validation
            const fname = document.querySelector('input[name="fname"]').value.trim();
            if (fname === '') {
                document.querySelector('#demo1').style.display = 'block';
                isValid = false;
            }

            // Last Name Validation
            const lname = document.querySelector('input[name="lname"]').value.trim();
            if (lname === '') {
                document.querySelector('#demo2').style.display = 'block';
                isValid = false;
            }

            // Email Validation
            const email = document.querySelector('input[name="email"]').value.trim();
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!emailPattern.test(email)) {
                document.querySelector('#demo5').textContent = "Invalid email format";
                document.querySelector('#demo5').style.display = 'block';
                isValid = false;
            } else if (email === '') {
                document.querySelector('#demo5').style.display = 'block';
                isValid = false;
            }

            // City Validation
            const city = document.querySelector('input[name="city"]').value.trim();
            if (city === '') {
                document.querySelector('#demo3').style.display = 'block';
                isValid = false;
            }

            // Gender Validation
            const genderRadios = document.querySelectorAll('input[name="gender"]');
            const isGenderSelected = Array.from(genderRadios).some(radio => radio.checked);
            if (!isGenderSelected) {
                document.querySelector('#demo4').style.display = 'block';
                isValid = false;
            }

            // image
            var image = document.getElementsByName('image')[0].value; // Use name to get the input
            var validExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp|\.jfif)$/i;
            if (image === "") {
                document.querySelector('#demo6').style.display = 'block';
                isValid = false;
            }
             if (!validExtensions.exec(image)) {
                document.querySelector('#demo6').style.display = 'block';
                alert("Please upload an image in one of the following formats: .jpg, .jpeg, .webp, .jfif");
                isValid = false;
            }
            // If form is not valid, prevent submission
            if (!isValid) {
                event.preventDefault();
            }
        });
    });