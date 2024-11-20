
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 20px;
            color: #333;
        }

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

        .btn {
            margin: 3px;
        }

        .text-center {
            color: #007bff;
        }

        .container-fluid {
            padding: 0;
        }

        input[type="checkbox"],
        input[type="radio"] {
            accent-color: #007bff;
            transform: scale(1.2);
            margin-right: 5px;
            cursor: pointer;
        }

        label {
            font-weight: 500;
            color: #333;
            margin-right: 10px;
        }

        .form-inline input[type="text"] {
            border-radius: 20px;
            border: 1px solid #007bff;
            padding: 8px 20px;
            width: 250px;
        }

        .form-inline button[type="submit"] {
            border-radius: 20px;
            padding: 8px 20px;
        }

        .filter-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .filter-section div {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .reset {
            border-radius: 30px;
            padding: 8px 20px;
        }
        .tbl{
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h2 class="text-center">All Student Details</h2>
        <div class="text-center mb-4 mt-5">
            <a href="form.php" class="btn btn-success">Add Student Data</a>
        </div>

        <table class="table table-striped table-hover tbl" id="stdtbl">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FNAME</th>
                    <th>COURSE</th>
                    <th>DOB</th>
                    <th>GENDER</th>
                    <th>CONTACT</th>
                    <th>HOBBIES</th>
                    <th>ADDRESS</th>
                    <th>CITY</th>
                    <th>EMAIL</th>
                    <th>USERNAME</th>
                    <th>PSWD</th>
                    <th>IMAGE</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <div id="pagination" class="text-center mt-4"></div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
   $(document).ready(function () {
    const limit = 5; 
    let currentPage = 1;

    function fetchData(page = 1) {
        $.ajax({
            url: "fetch.php",
            method: "GET",
            data: { page, limit },
            dataType: "json",
            success: function (response) {
                const { data, total } = response;

               
                $("#stdtbl tbody").empty();

                if (data.length > 0) {
                   
                    data.forEach((student) => {
                        $("#stdtbl tbody").append(`
                            <tr>
                                <td>${student.id}</td>
                                <td>${student.fname}</td>
                                <td>${student.field}</td>
                                <td>${student.dob}</td>
                                <td>${student.gender}</td>
                                <td>${student.contact}</td>
                                <td>${student.hobbies || 'N/A'}</td>
                                <td>${student.address}</td>
                                <td>${student.city}</td>
                                <td>${student.email}</td>
                                <td>${student.username}</td>
                                <td>${student.password}</td>
                                <td><img src="${student.image}" alt="Profile Image" width="100" height="100"></td>
                                <td><a href="update.php?id=${student.id}" class="btn btn-warning">EDIT</a></td>
                                <td><a href="#" class="btn btn-danger delete-link" data-id="${student.id}">DELETE</a></td>
                            </tr>
                        `);
                    });

                   
                    generatePagination(total, page);
                } else {
                    $("#stdtbl tbody").append("<tr><td colspan='15'>NO DATA FOUND</td></tr>");
                }
            },
            error: function () {
                alert("Error fetching data.");
            }
        });
    }

    function generatePagination(total, currentPage) {
        const totalPages = Math.ceil(total / limit);
        const paginationContainer = $("#pagination");

        
        paginationContainer.empty();

       
        if (currentPage > 1) {
            paginationContainer.append(`<button class="btn btn-primary prev-page" data-page="${currentPage - 1}">Previous</button>`);
        }

       
        for (let i = 1; i <= totalPages; i++) {
            paginationContainer.append(`
                <button class="btn ${i === currentPage ? "btn-secondary" : "btn-light"} page-btn" data-page="${i}">${i}</button>
            `);
        }

        
        if (currentPage < totalPages) {
            paginationContainer.append(`<button class="btn btn-primary next-page" data-page="${currentPage + 1}">Next</button>`);
        }
    }

    
    fetchData(currentPage);

    
    $(document).on("click", ".page-btn, .prev-page, .next-page", function () {
        currentPage = $(this).data("page");
        fetchData(currentPage);
    });

    
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
                        fetchData(currentPage); 
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

</html>