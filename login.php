<!DOCTYPE html>
<html>
<head>
	<title>LOGIN/REGISTER</title>
    <?php include_once 'includes/header.inc.php';?>
	<?php include_once 'includes/autoloader.inc.php';?>
    
    <?php include_once 'lib/Session.php';?>
    <?php Session::checkLogin(); ?>
    <?php 

        $Users = new users;
        if(isset($_POST['login-btn'])){

            $Users->userLogin($_POST['email'],$_POST['password']);
        }

        // $login =   Session::get("userLogin");
        // if ($login == true) {
        //  header('Location:cart.php');
        // }

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
                    <h5 class="text-center mb-5">ورود به حساب کاربری</h5>
                </div>
                <form method="post">
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="آدرس ایمیل">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="رمز عبور">
                    </div>
                    <div class="sign-btn text-center">  
                    <input type="submit" class="btn btn-primary" name="login-btn" value="ورود">
                    </div>
                </form>
            </div>
            <div class="form-footer text-center mt-3">
                    <ul>
                       <li><a  href="index.php">خانه</a></li>
                       <li><a  href="">بازیابی گذرواژه</a></li>
                       <li><a  href="register.php">عضویت</a></li>   
                    </ul>
            </div>
        </div>
	</div>
</body>
</html>

