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
   $comments = new comment;
   $users = new users;
   $products = new product;

   ?>
  <!-- php includes -->

  <!--delete comments-->
  <?php 

    if(isset($_GET["delcom"])){
     $id = $_GET["delcom"];
     $res = $comments->delete($id);
  }

  if(isset($_GET['accept'])){
    $id = $_GET["accept"];
    $res = $comments->commentValidation($id,1);
  }elseif(isset($_GET['unAccept'])){

    $id = $_GET["unAccept"];
    $res = $comments->commentValidation($id,0);
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
                
          <?php if (isset($comments->infomsg)) {?>
          <div class="alert alert-success text-center"><?php echo $comments->infomsg; ?></div>
          <?php }?>

         <?php if (isset($comments->errormsg)) {?>
          <div class="alert alert-danger text-center"><?php echo $comments->errormsg; ?></div>
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
                      $row=$comments->selectAllComments();
                       foreach ($row  as $rows) {
                      ?> 

                      <tr>
                        <td>
                                                                     
                        <a onclick="return confirm('آیا از حذف کاربر مطمعنید ?');" type="button" href=?delcom=<?php echo $rows['id'];?> class="btn btn-danger mt-1 btn-sm">حذف</a>
                        <?php if($rows['status']==0) { ?>
                        <a onclick="return confirm(' کامنت را تایید میکنید?');" type="button" href=?accept=<?php echo $rows['id'];?> class="btn btn-danger mt-1 btn-sm">تایید</a>
                        <?php }else{ ?>
                          <a onclick="return confirm('نظر را رد میکنید ?');" type="button" href=?unAccept=<?php echo $rows['id'];?> class="btn btn-warning mt-1 btn-sm">رد صلاحیت</a>
                        <?php } ?>
                        </td>
                        <?php $user = $users->usercomment($rows['user_id']);?>
                        <?php $product = $products->getProductById($rows['product_id']); 
                              
                        ?>
                        <td> <?php echo $rows["time"]; ?></td>
                        <td> <?php echo $rows["text"];?></td>
                        <td> <img height="80px" src=<?php echo product::$picture;?>></td>
                        <td> <?php echo $users->fname;?></td>
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