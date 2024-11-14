<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
    <div class="col-lg-8">
    <div class="card z-depth-3">
        <div class="card-body">
            <ul class="nav nav-pills nav-pills-primary nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="icon-envelope-open"></i> <span class="hidden-xs">Messages</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link active show"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                </li>
            </ul>
            <br><br>
            <form method="POST" action="update.php">
                <ul class="list-style9 no-margin">
                    <li>
                        <div class="row">
                            <div class="col-md-5 col-5">
                                <i class="fas fa-user text-orange"></i>
                                <strong class="margin-10px-left text-orange">First Name:</strong>
                            </div>
                            <div class="col-md-7 col-7">
                                <input type="text" name="fname" value="<?php echo htmlspecialchars($user['fname']); ?>" class="form-control" required>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-5 col-5">
                                <i class="far fa-user text-yellow"></i>
                                <strong class="margin-10px-left text-yellow">Last Name:</strong>
                            </div>
                            <div class="col-md-7 col-7">
                                <input type="text" name="lname" value="<?php echo htmlspecialchars($user['lname']); ?>" class="form-control" required>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-5 col-5">
                                <i class="fas fa-envelope text-pink"></i>
                                <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                            </div>
                            <div class="col-md-7 col-7">
                                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="form-control" required>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-5 col-5">
                                <i class="far fa-user text-lightred"></i>
                                <strong class="margin-10px-left text-lightred">Gender:</strong>
                            </div>
                            <div class="col-md-7 col-7">
                                <select name="gender" class="form-control" required>
                                    <option value="male" <?php echo ($user['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="female" <?php echo ($user['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                                    <option value="other" <?php echo ($user['gender'] == 'other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-5 col-5">
                                <i class="fas fa-map-marker-alt text-green"></i>
                                <strong class="margin-10px-left text-green">City:</strong>
                            </div>
                            <div class="col-md-7 col-7">
                                <input type="text" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" class="form-control" required>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="row">
                    <div class="col p-2">
                        <button type="submit" name="update" class="btn-custom">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


    </form>
</body>

</html>