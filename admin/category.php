<!DOCTYPE html>
<html>
<head>
<title>dashbord</title>
<?php include 'header.inc.php';?>
</head>
<body>
  <!-- php includes -->
  <?php include 'includes/autoloader.inc.php';

   $category = new category;?>
  <!-- php includes -->




  <!-- navbar -->
  <?php include 'nav.inc.php';?>
  <!-- navbar -->
  

<!-- header -->
  <?php include 'headsection.inc.php';?>
<!-- header -->

  <?php 
  

  if(isset($_GET["delCatId"])){
    $catId    = $_GET["delCatId"];
    $res      = $category->deleteCat($catId);
  }


  if($_SERVER['REQUEST_METHOD'] == 'POST' AND !empty($_POST)){
    $Catname  = $_POST['catname'];
    $body     = $_POST['body'];
    $res      = $category->insertcat($Catname,$body);
  }



  ?>



<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
          <li class="active">داشبورد  / دسته بندی</li>
        </ol>
      </div>
</section>
<section class="main"><!--main part-->
  <div class="container">
    <div class="row">
       <!-- Website Overview -->
      <div  class="col-md-9 pb-3">
          <!-- show the massage -->

          <?php if (isset($category->infomsg)) {?>
          <div class="alert alert-success text-center"><?php echo $category->infomsg; ?></div>
          <?php }?>

         <?php if (isset($category->errormsg)) {?>
          <div class="alert alert-danger text-center"><?php echo $category->errormsg; ?></div>
          <?php }?>


          <!-- show the massage -->
       


              <!-- tabel of users -->
              <div class="panel panel-default mt-4">
                <div class="panel-heading headeruser main-color-bg d-flex flex-row-reverse ">
                  <h5 class="panel-title mr-4 mt-1">دسته بندی ها</h5>
                </div>
                <div class="panel-body">                                     
                  <table class="table table-striped table-hover text-center">
                      <tr>
                        <th>عملیات</th>

                        <th>نام دسته</th>
                        <th>شماره دسته</th>
                       
                        
                      </tr>
                      <!-- select all users  -->
                      <?php 
                      $row = $category->getAllcat();
                       foreach ($row  as $rows) {
                      ?> 

                      <tr> 
                        <td>
                         
                        <a  href="editCategory.php?upCatid=<?php echo $rows['id'] ;?>" class="btn btn-danger mt-1 btn-sm">ویرایش  </a>      

                        <a onclick="return confirm('آیا از حذف دسته مطمنید ؟');" type="button" href=?delCatId=<?php echo $rows['id'];?> class="btn btn-danger mt-1 btn-sm">حذف</a>

                        </td>                    
                        <td> <?php echo $rows["category_name"];?></td>
                        <td> <?php echo $rows["id"]; ?></td>
                        
                      </tr>
                      <?php }?>
                    </table>
                </div>

                 <div class="ml-4 mr-5">
                  <a style="color: #fff;" type="button" class="btn btn-sm main-color-bg" data-toggle="modal" data-target="#addCat">افزودن کاربر</a>
                </div>
              </div>
              <!-- tabel of users -->

      </div> <!-- end of col-9 -->

      <!---list group dashbord-->
      <?php include 'sidbardash.inc.php';?>
      <!---list group dashbord-->

    </div>
  </div>
</section>


</body>
</html>

<?php include 'js/Drys.php';?>
