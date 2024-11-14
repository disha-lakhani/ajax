<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <style>
        body {
            background-color: #f8f9fa; 
            padding: 20px;
        }
        h2 {
            text-align: center; 
            margin-bottom: 20px; 
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td {
            border: 1px solid #dee2e6; 
            padding: 10px; 
            text-align: center; 
        }
        th {
            background-color:bisque; 
            color: black;
           
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;   
        }
        a {
            color: #007bff; 
            text-decoration: none; 
        }
        a:hover {
            text-decoration: underline; 
        }
        .action-links {
            display: flex;
            gap: 10px; 
            justify-content: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>STUDENT DATA</h2>
    <a href="insert.php">ADD STUDENT</a><br><br>

    <table border="1" cellpadding="10" cellspacing="0" id="studentTable">
        <tr>
            <th>ID</th>
            <th>FNAME</th>
            <th>LNAME</th>
            <th>EMAIL</th>
            <th>CLASS</th>
            <th>ACTION</th>
        </tr>
        <tr id="noDataRow"><td colspan="6">Loading data...</td></tr>
    </table>

    <script>
        $(document).ready(function() {
            function fetchStudentData() {
                $.ajax({
                    url: "fetch_students.php",
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#studentTable tr:not(:first)").remove();
                        if (data.length > 0) {
                            let serialNumber = 1;
                            $.each(data, function(index, student) {
                                $("#studentTable").append(`
                                    <tr>
                                        <td>${serialNumber++}</td>
                                        <td>${student.fname}</td>
                                        <td>${student.lname}</td>
                                        <td>${student.email}</td>
                                        <td>${student.class}</td>
                                        <td class='action-links'>
                                            <a href='update.php?id=${student.id}'>EDIT</a> ||
                                            <a href='#' class='delete-link' data-id='${student.id}'>DELETE</a>
                                        </td>
                                    </tr>
                                `);
                            });
                        } else {
                            $("#studentTable").append("<tr><td colspan='6'>NO DATA FOUND</td></tr>");
                        }
                    }
                });
            }

            fetchStudentData();

            $(document).on("click", ".delete-link", function(e) {
                e.preventDefault();
                const studentId = $(this).data("id");

                if (confirm("Are you sure you want to delete this student?")) {
                    $.ajax({
                        url: "delete.php",
                        method: "POST",
                        data: { id: studentId },
                        success: function(response) {
                            fetchStudentData(); 
                        },
                        error: function() {
                            alert("Error deleting student");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
