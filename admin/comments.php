<!DOCTYPE html>
<html>
<head>
<title>dashbord</title>
<?php include 'header.inc.php';?>
<style type="text/css">
</style>
</head>
<body>
  <!-- php includes -->
  <?php include 'includes/autoloader.inc.php';
   $users = new users;?>
  <!-- php includes -->

  <!--delete users-->
    <?php if(isset($_GET["deluser"])){
     $id = $_GET["deluser"];
     $res = $users->delete($id);
  }

  ?>
  <!--delete users-->



  <!-- navbar -->
  <?php include 'nav.inc.php';?>
  <!-- navbar -->
  

<!-- header -->
  <?php include 'headsection.inc.php';?>
<!-- header -->


<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
          <li class="active">داشبورد  / نظرات</li>
        </ol>
      </div>
</section>

<section class="main"><!--main part-->
  <div class="container">
    <div class="row">
       <!-- Website Overview -->
      <div  class="col-md-9 pb-3"> 
                
          <?php if (isset($users->infomsg)) {?>
          <div class="alert alert-success text-center"><?php echo $users->infomsg; ?></div>
          <?php }?>

         <?php if (isset($users->errormsg)) {?>
          <div class="alert alert-danger text-center"><?php echo $users->errormsg; ?></div>
          <?php }?>
           
                    <!-- tabel of users -->
              <div class="panel panel-default mt-4">
                <div class="panel-heading headeruser main-color-bg d-flex flex-row-reverse ">
                  <h5 class="panel-title mr-4 mt-1">نظرات کاربران</h5>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover text-center">
                      <tr>
                        <th>عملیات</th>
                        <th>تاریخ ثبت نظر</th>
                        <th>نظر کاربر</th>
                        <th>محصول</th>
                        <th>نام کاربر</th>
                      </tr>
                      <!-- select all users  -->
                      <?php 
                      $row=$users->getAllUser();
                       foreach ($row  as $rows) {
                      ?> 

                      <tr>
                        <td>
                                                                     
                        <a onclick="return confirm('آیا از حذف کاربر مطمعنید ?');" type="button" href=?deluser=<?php echo $rows['id'];?> class="btn btn-danger mt-1 btn-sm">حذف</a>

                        <a onclick="return confirm('آیا از حذف کاربر مطمعنید ?');" type="button" href=?deluser=<?php echo $rows['id'];?> class="btn btn-danger mt-1 btn-sm">تایید</a>

                        </td>
                                         
                        <td> <?php echo $rows["date"]; ?></td>
                        <td> <?php echo $rows["email"];?></td>
                        <td> <?php echo $rows["email"];?></td>
                        <td> <?php echo $rows["username"];?></td>
                      </tr>
                      <?php }?>
                    </table>
                </div>
                <div class="ml-4 mr-5">
                  <a style="color: #fff;" type="button" class="btn btn-sm main-color-bg" data-toggle="modal" data-target="#adduser">افزودن کاربر</a>
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







</body>
</html>

<?php include 'js/Drys.php';?>