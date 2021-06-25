<!DOCTYPE html>
<html>
<head>
<title>dashbord/product</title>
<?php include 'header.inc.php';?>
<style type="text/css">
</style>
</head>
<body>
  <!-- php includes -->
  <?php include_once 'includes/autoloader.inc.php';?>
  <!-- php includes -->


  <!-- navbar -->
  <?php include 'nav.inc.php';?>
  <!-- navbar -->
  

<!-- header -->
  <?php include 'headsection.inc.php';?>
<!-- header -->
  
  <?php $product  = new product;?> 
  <?php $category = new category;?>
  <?php 
  if($_SERVER['REQUEST_METHOD'] == 'GET' AND isset($_GET['delProduct'])){
    $proId = $_GET['delProduct'];
    $product->deleteProduct($proId);
  }


  ?>
 
<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
          <li class="active">داشبورد  / محصولات</li>
        </ol>
      </div>
</section>

<section class="main"><!--main part-->
  <div class="container">
    <div class="row">
       <!-- Website Overview -->
      <div  class="col-md-9 pb-3"> 
                
          <?php if (isset($product->infomsg)) {?>
          <div class="alert alert-success text-center"><?php echo $product->infomsg; ?></div>
          <?php }?>

         <?php if (isset($product->errormsg)) {?>
          <div class="alert alert-danger text-center"><?php echo $product->errormsg; ?></div>
          <?php }?>


          
           
                    <!-- tabel of users -->
              <div class="panel panel-default mt-4">
                <div class="panel-heading headeruser main-color-bg d-flex flex-row-reverse ">
                  <h5 class="panel-title mr-4 mt-1">صفحات سایت</h5>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover text-center">
                      <tr>
                        <th>عملیات</th>
                        <th>دسته بندی</th>
                        <th>قیمت</th>
                        <th>عکس محصول</th>
                        <th>نام محصول</th>
                      </tr>
                      <!-- select all users  -->
                      <?php 
                      $row = $product->getAllproduct();
                       foreach ($row  as $rows) {
                        

                      ?> 

                      <tr class="text-center">
                        <td>
                                                                     
                        <a onclick="return confirm('آیا از حذف کاربر مطمعنید ?');" type="button" href=?delProduct=<?php echo $rows['id'];?> class="btn btn-danger mt-1 btn-sm">حذف</a>

                        <?php echo '<a type="button" href="editProduct.php?upProId='.$rows["id"].'&catId='.$rows["cat_id"].'" class="btn btn-danger mt-1 btn-sm">ویرایش</a>';?>

                        </td>
                                         
                        <?php $catId = $rows["cat_id"];?>
                        <?php $category->getCatById($catId);?>
                        
                        <td><?php echo $category->catName;?> </td>
                        <td> <?php echo $rows["price"];?></td>
                        <td> <img width="100px" height="100px;" src=<?php echo $rows["picture"];?>> </td>
                        <td> <?php echo $rows["product_name"]; ?></td>
                      </tr>
                      <?php }?>
                    </table>
                </div>
                <div class="ml-4 mr-5">
                  <a style="color: #fff;" type="button" class="btn btn-sm main-color-bg" data-toggle="modal" data-target="#addproduct">افزودن محصول</a>
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