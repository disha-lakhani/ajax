
<?php 
    include 'db.php';


    $sql = "SELECT * FROM student ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    $student=[];
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $student[]=$row;
        }
    }

    echo json_encode($student);
    mysqli_close($conn);

?>