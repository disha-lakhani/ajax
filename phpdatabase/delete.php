<?php
    include 'mysqldb.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
     
 
      if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM students WHERE id = '$id'";

        if($conn->query($sql)==true){
            echo "delete data...";
            header("Location: display.php");
            exit;
        }
        else{
            echo "error". $conn->error;
        }
      }
     
       



    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<form action=" " method="POST"  class="w-50 m-auto">
   
    
<section class="">
  <div class="container">
    <!-- <div class="row d-flex justify-content-center align-items-center h-100"> -->
     
        <div class="card card-registration my-4">
          <div class="row g-0">
           
            <div class="col-lg-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="text-uppercase">Student Delete  Data</h3>
                <div class="col-lg-12 mb-4">
                    <!-- <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example1n">Id</label>
                    <input type="text" id="id" name="id" class="form-control form-control-lg" />
                     
                    </div> -->
                  </div>
              
              

        

                <div class="d-flex justify-content-end">
                 
                  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2" value="Update"  >Delete</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- <input type="submit" value="Update"> -->
</form>
</body>
 <!-- <script>
  function confirdelete(id){
    const userconform=confirm("Are you sure delete recorde?");
    if(userconform){
      window.location.href='delete.php?id='+id;
    }
  }
</script> -->
</html>
