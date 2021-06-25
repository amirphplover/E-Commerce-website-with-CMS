<!DOCTYPE html>
<html>
<head>
<title>dashbord</title>
<?php include_once 'header.inc.php';?>
<style type="text/css">
</style>
</head>
<body>
  <!-- php includes -->
  <?php include_once 'includes/autoloader.inc.php';
   $users   = new users;
   $product = new product;

   ?>
  <!-- php includes -->


  <!-- navbar -->
  <?php include_once 'nav.inc.php';?>
  <!-- navbar -->
  

<!-- header -->
  <?php include_once 'headsection.inc.php';?>
<!-- header -->


<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
          <li class="active">داشبورد</li>
        </ol>
      </div>
</section>

<section class="main"><!--main part-->
  <div class="container">
    <div class="row">
       <!-- Website Overview -->
      <div  class="col-md-9 pb-3">
        <div class="panel panel-default ">
          <div class="panel-heading d-flex flex-row-reverse  main-color-bg">
            <h6 class="panel-title">نمای کلی سایت</h6>
          </div>
          <div class="panel-body text-center">
            <div class="row mt-4">

              <div class="col-md-3">
                  <div class="well dash-box">
                  <h3><i class="bi bi-people"></i></h3>
                  <h6>کاربران  <?php $users->usermember(); ?></h6>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="well dash-box">
                  <h3><i class="bi bi-box"></i><span class="glyphicon glyphicon-user" aria-hidden="true"></span> </h3>
                  <h6>محصولات  <?php $product->productCount();?></h6>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="well dash-box">
                  <h3><i class="bi bi-bar-chart"></i></h3>
                  <h6>بازدید   203</h6>
                  </div>
              </div>

              <div class="col-md-3">
                 <div class="well dash-box">
                  <h3><i class="bi bi-stickies"></i></h3>
                  <h6>پست ها  22</h6>
                  </div>
              </div>
            </div>
          </div>
        </div>  <!-- Website Overview -->

              <!-- tabel of users -->
              <div class="panel panel-default mt-4">
                <div class="panel-heading headeruser main-color-bg d-flex flex-row-reverse ">
                  <h5 class="panel-title mr-4 mt-1">آخرین کاربران ثبت نام کرده</h5>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover text-center">
                      <tr>
                        <th>تاریخ ثبت نام</th>
                        <th>ایمیل</th>
                        <th>نام کاربری</th>
                      </tr>
                      <!-- select all users  -->
                      <?php 
                      $row=$users->getAllUser();
                       foreach ($row  as $rows) {
                      ?> 

                      <tr>                     
                        <td> <?php echo $rows["date"]; ?></td>
                        <td> <?php echo $rows["email"]; ?></td>
                        <td> <?php echo $rows["username"]; ?></td>
                      </tr>
                      <?php }?>
                    </table>
                </div>
              </div>
              <!-- tabel of users -->

      </div> <!-- end of col-9 -->

      <!---list group dashbord-->
      <?php include 'sidbardash.inc.php'?>
      <!---list group dashbord-->

    </div>
  </div>
</section>





<?php include_once 'footer.php';?>

</body>
</html>