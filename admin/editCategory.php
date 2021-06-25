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


  if(isset($_POST["btnUpcat"])){
    
   $category->updateCat($_POST['catname'],$_POST['body'],$_GET['upCatid']);
   echo "<script> window.location = 'category.php'; </script>";


  }


  $category->getCatById($_GET['upCatid']);


  ?>



<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
          <li class="active">داشبورد  / دسته بندی  / ویرایش : دسته  <?php echo $category->catName; ?></li>
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
                
                <h5 class="panel-title mr-4 mt-1">ویرایش نام دسته</h5>
                                           
            </div>
            <div class="panel-body">
              <div class="row">
                    <div class="col-12" style="direction: rtl;">
                       <form action="" method="post">

                       <input class="form-control" type="text" name="catname" value=<?php echo $category->catName;?>>
                       <textarea class="form-control mt-4" name="body" rows="4" cols="3" placeholder="توضیحات ...."><?php echo $category->catBody;?></textarea>
                       <input type="submit" name="btnUpcat" class="btn btn-danger mt-3" value="ویرایش" style="float: right;">
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
