
<script>
    $(document).ready(function () {
        $('#updateForm').on('submit', function (event) {
            event.preventDefault();


            $('#responseMessage').addClass('d-none').removeClass('alert-success alert-danger').text('');


            const formData = new FormData(this);


            $.ajax({
                url: 'upd.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    const res = JSON.parse(response);
                    if (res.status === 'success') {
                        $('#responseMessage')
                            .removeClass('d-none alert-danger')
                            .addClass('alert-success')
                            .text(res.message);
                    } else {
                        $('#responseMessage')
                            .removeClass('d-none alert-success')
                            .addClass('alert-danger')
                            .text(res.message);
                    }
                },
                error: function (xhr) {
                    $('#responseMessage')
                        .removeClass('d-none alert-success')
                        .addClass('alert-danger')
                        .text('An error occurred. Please try again.');
                }
            });
        });
    });
</script>