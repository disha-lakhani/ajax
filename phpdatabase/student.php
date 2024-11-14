`<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="jquery-3.7.1.js"></script> 
    <script src="validation.js"></script> 
<style>
  .img-back{
      width: 100%;
      height:80%;

   }
</style>
</head>
<body>
<form action="insert.php" method="post" id="data">
<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="back.webp"
                alt="Sample photo" class="img-back"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Student registration form</h3>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example1m">First name</label>
                      <input type="text" id="firstname" name="firstname" class="form-control form-control-lg" placeholder="Enter Your FirstName" />
                     
                      <span id="demo1" style="color: red;">Please enter name</span>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example1n">Last name</label>
                      <input type="text" id="lastname" name="lastname" class="form-control form-control-lg"  placeholder="Enter Your Lastname" />
                     
                      <span id="demo2" style="color: red;">Please enter lastname</span>
                    </div>
                  </div>
                </div>

               

                <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example8">Address</label>
                  <input type="text" id="address" name="address" class="form-control form-control-lg"  placeholder="Enter Your Address"/>
                  
                  <span id="demo3" style="color: red;">Please enter Address</span>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Gender: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="Female" />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="Male"/>
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                
                  <span id="demo4" style="color: red;">Please select gender</span>
                </div>

               

                
                <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example90">Pincode</label>
                  <input type="text" id="pincode" name="pincode" class="form-control form-control-lg"  placeholder="Enter Pincode"/>
                 
                  <span id="demo5" style="color: red;">Please enter pincode</span>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example99">Course</label>
                  <input type="text"id="course" name="course" class="form-control form-control-lg"  placeholder="Enter Your Course"/>
                 
                  <span id="demo6" style="color: red;">Please enter course</span>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example97">Email ID</label>
                  <input type="text" id="email" name="email" class="form-control form-control-lg"  placeholder="Enter Your Email"/>
               
                  <span id="demo7" style="color: red;">Please enter email</span>
                </div>

                <div class="d-flex justify-content-end pt-3">
                 
                  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2">Submit form</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>


 <h2></h2>
<!-- <?php
include 'display.php';
?>   -->

</body>
</html>