<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Student Details</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .table thead {
            background-color: #d1e7fd;
            color: black;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e9ecef;
        }

        .table-striped tbody tr:hover {
            background-color: aliceblue;
        }

        .pagination {
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Student Details</h2>

        <div class="text-center mb-4 mt-4">
            <a href="form.php" class="btn btn-success">Add Student Data</a>
        </div>
        <div class="text-center mb-4 mt-4">
            <a href="csvform.php" class="btn btn-success">Add CSV Data</a>
        </div>
        <table class="table table-bordered table-striped table-hover" id="stdtbl">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div class="pagination-container text-center">
            <ul class="pagination" id="pagination">
            </ul>
        </div>



    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            let currentPage = 1; // Initialize current page
            const limit = 5;     // Records per page

            function fetchdata(page = 1) {
                $.ajax({
                    url: "fetch.php",
                    method: "GET",
                    data: { page: page, limit: limit },
                    dataType: "json",
                    success: function (response) {
                        const data = response.data;
                        const totalRecords = response.total;
                        const totalPages = Math.ceil(totalRecords / limit);

                        $("#stdtbl tbody").html("");
                        if (data.length > 0) {
                            let serialNumber = (page - 1) * limit + 1;
                            $.each(data, function (index, student) {
                                $("#stdtbl tbody").append(`
                            <tr>
                                <td>${serialNumber++}</td>
                                <td>${student.fname}</td>
                                <td>${student.email}</td>
                                <td>${student.contact}</td>
                                <td>
                                    <a href="edit.php?id=${student.id}" class="btn btn-warning">EDIT</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger delete-link" data-id="${student.id}">DELETE</a>
                                </td>
                            </tr>
                        `);
                            });
                        } else {
                            $("#stdtbl tbody").append("<tr><td colspan='6'>NO DATA FOUND</td></tr>");
                        }

                        renderPagination(totalPages, page); // Update pagination with Next/Previous buttons
                    }
                });
            }

            function renderPagination(totalPages, currentPage) {
                let paginationHTML = "";

                // Previous Button
                paginationHTML += `
            <li class="page-item ${currentPage === 1 ? "disabled" : ""}">
                <a href="#" class="page-link" data-page="${currentPage - 1}">Previous</a>
            </li>
        `;

                // Numbered Buttons
                for (let i = 1; i <= totalPages; i++) {
                    paginationHTML += `
                <li class="page-item ${i === currentPage ? "active" : ""}">
                    <a href="#" class="page-link" data-page="${i}">${i}</a>
                </li>
            `;
                }

                // Next Button
                paginationHTML += `
            <li class="page-item ${currentPage === totalPages ? "disabled" : ""}">
                <a href="#" class="page-link" data-page="${currentPage + 1}">Next</a>
            </li>
        `;

                $("#pagination").html(paginationHTML);
            }

            // Fetch initial data
            fetchdata(currentPage);

            // Handle pagination click
            $(document).on("click", ".page-link", function (e) {
                e.preventDefault();
                const selectedPage = $(this).data("page");
                if (!$(this).parent().hasClass("disabled")) {
                    currentPage = selectedPage;
                    fetchdata(currentPage);
                }
            });

            // Handle delete logic as before
            $(document).on("click", ".delete-link", function (e) {
                e.preventDefault();
                const studentId = $(this).data("id");

                if (confirm("Are you sure you want to delete this data?")) {
                    $.ajax({
                        url: "delete.php",
                        method: "POST",
                        data: { id: studentId },
                        dataType: "json",
                        success: function (response) {
                            if (response.status === "success") {
                                fetchdata(currentPage);
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function () {
                            alert("Error deleting student");
                        }
                    });
                }
            });
        });


    </script>
</body>

</html>