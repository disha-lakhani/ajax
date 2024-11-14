<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="validation.js"></script>

<style>
    body {
 
      opacity: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            background-color: #f8f9fa;
          
        }
        h2{
          background-color: aliceblue;
          padding: 20px 0;
        }
        #empform {
            width: 100%; 
            max-width: 600px; 
            padding: 20px; 
            background-color: transparent; 
            /* opacity: 0.9; */
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        }
        .btn {
            width: 100%; 
        }
        .error{
         color: red;
        }
   
     .container .left{
      float: right;
    
     }
     .container .left img{
      background-image: url('company.avif');
     text-align: center;
     box-sizing: border-box;
     background-size: contain;
    
     }
  
  
</style>
</head>
<body>
  <div class="container mx-auto ">
    <div class=" left col-lg-6">
    <div class="text-center">
    <h3 class="text-center">Welcome!</h3>
    <h5 class="text-center">Fill in the details to Add employee.</h5>
    </div>
      <img src="company.avif" alt="">
      
    </div>
    <div class="right col-lg-6">
    <form action="insertemp.php" id="empform" method="post">
   <center> <h2>ADD EMPLOYEES DATA</h2></center><br>
  <div class="mb-3 mt-3">
    <label for="fname" class="form-label">ENAME:</label>
    <input type="text" class="form-control" id="ename" placeholder="Enter employee name.." name="ename" >
    <span id="demo1" class="error">please enter employees name</span>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">EMAIL:</label>
    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" >
    <span id="demo2" class="error">enter valid email address</span>
  </div>
  <div class="mb-3">
    <label for="class" class="form-label">CONTACT:</label>
    <input type="number" class="form-control" id="contact" placeholder="Enter contact no.." name="contact" >
    <span id="demo3" class="error">please enter contact nunber (only 10 digits allowed)</span>
  </div>
  <div class="mb-3">
    <label for="class" class="form-label">SALARY:</label>
    <input type="number" class="form-control" id="salary" placeholder="Enter salary.." name="salary" >
    <span id="demo4" class="error">please enter employees salary</span>
  </div>
  <div class="mb-3 mt-3">
    <label for="lname" class="form-label">DEPARTMENT:</label>
    <input type="text" class="form-control" id="dept" placeholder="Enter department.." name="dept" >
    <span id="demo5" class="error">please enter employees department</span>
  </div>
  <button type="submit" class="btn btn-success">ADD EMPLOYEE</button>
</form>
    </div>
  </div>

</body>
</html>