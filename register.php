<!DOCTYPE html>
<html>
<head>
	<title>LOGIN/REGISTER</title>
    <?php include_once 'includes/header.inc.php';?>
    <?php include_once 'includes/autoloader.inc.php';?>
    <?php include_once 'function/function.php';?>
    <?php

    $Users = new users;

        if(isset($_POST["register-btn"]) AND $_SERVER['REQUEST_METHOD'] == 'POST'){

            
            $fname            =  cleaninput($_POST["fname"]);
            $lname            =  cleaninput($_POST["lname"]);
            $username         =  cleaninput($_POST["username"]);
            $password         =  cleaninput($_POST["password"]);
            $email            =  cleaninput($_POST["email"]);
            $confirm_password =  cleaninput($_POST["confirm_password"]);

            $Users->ValidationUser($fname,$lname,$username,$password,$email,$confirm_password);
            
        }

    ?>
</head>
<body>
        <?php if (isset($Users->infomsg)) {?>
          <div class="alert alert-success text-center"><?php echo $Users->infomsg; ?></div>
          <?php }?>

          <?php if (isset($Users->errormsg)) {?>
          <div class="alert alert-danger text-center"><?php echo $Users->errormsg; ?></div>
    <?php }?>
	<div class="allPage">
		<div class="inner">
            <div class="form-box">
                <div class="form-head">
                    <h5 class="text-center mb-5">عضویت </h5>
                </div>

                <form method="post">
                    <div class="form-group d-flex">
                        <input class="form-control mr-2" type="text" name="lname" placeholder="نام خانوادگی">
                        <input class="form-control ml-2" type="text" name="fname" placeholder="نام">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="نام کاربری">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="آدرس ایمیل">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="رمز عبور">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="confirm_password" placeholder="تایید رمز ">
                    </div>

                    <div class="sign-btn text-center">  
                    <input type="submit" class="btn btn-primary" name="register-btn" value="ورود">
                    </div>
                </form>
            </div>
            <div class="form-footer text-center mt-3">
                    <ul>
                       <li> <a  href="index.php">برگشت به خانه</a></li>
                       <li> <a  href="login.php">ورود</a></li>
                    </ul>
            </div>
        </div>
	</div>
</body>
</html>