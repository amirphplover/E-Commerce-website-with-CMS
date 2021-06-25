<!DOCTYPE html>
<html lang="en">
<head>
<title>login admin</title>
<?php include 'header.inc.php';?>
<?php include 'includes/autoloader.inc.php';?>

</head>
  <body>
    <?php
    // $Adminlogin = new Adminlogin;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username  =  $_POST['username'];
    $password  =  $_POST['password'];
    $email     =  $_POST['email'];
    $res       =  $Adminlogin->userLogin($username,$password,$email);

   }


    ?>


    <!-- navbar -->
 <nav class="navbar navbar-expand-md navbar-light bg-light ">
      <div class="container">
          <a class="navbar-brand" href="#">ورود مدیر سایت</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon icn"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class=" navbar-nav mr-auto">

            </ul>
          <!-- navabr right -->
              <ul class="navbar-nav navabr-right">
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">امیر فیاض</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link " href="../index.php">برگشت به سایت</a>
              </li>
            </ul>
          </div>
      </div>
</nav>
<!-- navbar -->


    <!-- login form -->
    <section id="main">

          <?php if (isset($Adminlogin->infomsg)) {?>
          <div class="alert alert-success text-center"><?php echo $Adminlogin->infomsg; ?></div>
          <?php }?>

          <?php if (isset($Adminlogin->errormsg)) {?>
          <div class="alert alert-danger text-center"><?php echo $Adminlogin->errormsg; ?></div>
          <?php }?>

      <div class="container">
        <div class="row loginbox">
          <div class="col-md-12">
            <form id="login" class="mt-5 mb-5" method="post">

                  <div class="form-group">
                    <label>نام کاربری</label>
                    <input type="text" class="form-control" name="username" placeholder="نام کاربری را وارد کنید">
                  </div>

                  <div class="form-group">
                    <label>آدرس ایمیل</label>
                    <input type="email" class="form-control" name="email" placeholder="ایمیل را وارد کنید">
                  </div>
                  
                  <div class="form-group">
                    <label>رمز عبور را وارد کنید</label>
                    <input type="password" class="form-control" name="password" placeholder="رمز عبور ">
                  </div>

                  <div class="text-center">
                  <button type="submit" class="btn btn-adminlogin main-color-bg">ورود</button></div>
              </form>
          </div>
        </div>
      </div>
    </section>

    <?php include_once 'footer.php';?>

  </body>
</html>



<?php include 'js/Drys.php';?>