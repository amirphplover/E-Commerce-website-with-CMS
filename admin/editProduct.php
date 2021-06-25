<!DOCTYPE html>
<html>
<head>
<title>dashbord</title>
<?php include 'header.inc.php';?>
</head>
<body>
  <!-- php includes -->
  <?php include 'includes/autoloader.inc.php';

   $product = new product;?>
  <!-- php includes -->




  <!-- navbar -->
  <?php include 'nav.inc.php';?>
  <!-- navbar -->
  

<!-- header -->
  <?php include 'headsection.inc.php';?>
<!-- header -->

  <?php 
  


  $product->getProductById($_GET['upProId']);

  if(isset($_POST['btnProUp']) AND isset($_SERVER["REQUEST_METHOD"])){

     $product->updateProduct($_POST,$_FILES,$_GET['upProId']);
     echo "<script> window.location = 'product.php'; </script>";

  } ?>

  <script type="text/javascript">
    $(document).ready(function() {
    $("#catId").val(<?php echo $_GET["catId"]; ?>);
    });
  </script>

<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
          <li class="active">داشبورد  / محصولات / ویرایش محصول : <?php echo product::$productName;?> </li>
        </ol>
      </div>
</section>
<section class="main"><!--main part-->
  <div class="container">
    <div class="row">
       <!-- Website Overview -->
      <div  class="col-md-9 pb-3">

          <div class="panel panel-default shadowBox">
            <div class="panel-heading headeruser main-color-bg d-flex flex-row-reverse ">
                
                <h5 class="panel-title mr-4 mt-1">ویرایش محصول</h5>
                                           
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-12" style="direction: rtl;">
                <form method="post" enctype="multipart/form-data">
                  <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel">ویرایش محصول</h4>
                  </div>
                    <div class="modal-body">
                      <div class="form-group mb-4">
                        <label>نام محصول</label>
                        <input type="text" class="form-control" name="productName" placeholder="نام محصول را وارد کنید " value=<?php echo product::$productName;?>>
                      </div>

                      <!-- select category name -->
                      <div class="form-group mb-4">
                        <?php $catFetch = $category->getAllcat();?>
                        <label>دسته بندی</label>
                      <select class="form-control form-control-sm" id="catId" name="catId">
                        <?php foreach ($catFetch as $row) {?>
                         <option value=<?php echo $row['id'];?>> <?php echo $row['category_name']; ?> </option>
                        <?php } ?>
                        </select>
                      </div>
                      <!-- select category name -->


                      <div class="form-group mb-4">
                        <label>نوع جنس</label>
                      <select class="form-control form-control-sm" name="typeId">
                          <option>1</option>
                          <option>1</option>
                        </select>
                      </div>

                      <div class="form-group mb-5">
                        <label>عکس محصول</label>
                        <input type="file" class="form-control-file" name="picture" placeholder="عکس محصول" value=<?php echo product::$picture;?>>
                      </div>



                      <div class="form-group mb-4">
                        <label>توضیحات محصول</label><br><br>
                        <textarea name="editor1" class="form-control" rows="2" placeholder="محتوای بدنه صفحه" ><?php echo product::$body;?></textarea>
                      </div>

                      <div class="form-group mb-4">
                        <label>قیمت محصول</label>
                        <input type="text" class="form-control" name="price" placeholder="قیمت محصول را وارد کنید" value=<?php echo product::$price ;?>>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="btnProUp" class="btn btn-danger main-color-bg btn-sm">ذخیره تغییرات</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
            
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
