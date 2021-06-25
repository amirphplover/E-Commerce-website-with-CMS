<!DOCTYPE html>
<html lang="en">
<head>
<title>HOME</title>
<?php include 'includes/header.inc.php';?>
</head>
<body>
<?php include 'includes/navbar.inc.php';?>
<?php include 'includes/autoloader.inc.php';?>
<?php $product  = new product;?>
<?php $category = new category;?>

  <section>
    <div id="demo" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="styles/picture/slidebaner.jpg" height ="550px" alt="slider Image">
          <div class="carousel-caption mb-5 pb-3 ">
            <h3 >فروشگاه بزرگ</h3>
            <h5 >بهترین کیفیت را با ما تجربه کنید</h5>
            <button class="btn btn-default"><a href="shop.php">مشاهده </a></button>
          </div>   
        </div>
      </div>
   </div>
  </section>

  <section class="container infoSection">
    <div class="row p-5 mt-4 text-center">
      
      <div class="col-lg-4 col-sm-12  infoPart"><!-- column main -->
        <div class="row">
          <!-- column insid -->
          <div class="col-lg-2 col-sm-12 ">
            <i class="bi bi-cloud-sleet"></i>
          </div>
          <div class="col-lg-10 col-sm-12">
            <h5>ارسال رایگان</h5>
            <p>
            شرایط بینيیر برای ارسال رایگان
            </p>
            
          </div>
          <!-- column insid -->
        </div>
      </div> <!-- column main -->


      <div class="col-lg-4 col-sm-12 infoPart"><!-- column main -->
        <div class="row twoLine">
          <!-- column insid -->
          <div class="col-lg-2 col-sm-12">
            <i class="bi bi-columns-gap"></i> 
          </div>
          <div class="col-lg-10 col-sm-12">
            <h5>تخفیف  های ویژه</h5>
            <p>
            بهترین تخفیف ها برای شماست
            </p>
          </div>
          <!-- column insid -->
        </div>
      </div> <!-- column main -->



      <div class="col-lg-4 col-sm-12 infoPart"><!-- column main -->
        <div class="row">
          <!-- column insid -->
          <div class="col-lg-2 col-sm-12">
            <i class="bi bi-emoji-angry"></i>
            
          </div>
          <div class="col-lg-10 col-sm-12">
            <h5>تضمین کیفیت </h5>
            <p>
             امکان بازگشت محصول تا 8 روز بعداز خرید
            </p>
          </div>
          <!-- column insid -->
        </div>
      </div> <!-- column main -->


    </div>
  </section>



  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="img-hover-zoom">
            <img src="styles/picture/slide1.jpg">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="img-hover-zoom">
            <img src="styles/picture/slide2.jpg">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="img-hover-zoom">
            <img src="styles/picture/slide3.jpg">
          </div>
        </div>
      </div>
    </div>
  </section>





  <section>

    <div class="container text-center"><!-- title -->
      <div class="row">
        <div class="col-12 pt-5 mt-5">
        <h3>جدیدترین محصولات </h3>
       </div>
      </div>
    </div>


    <div class="container">
      <div class="mb-5 d-flex flex-row flex-nowrap overflow-auto">
       
        <!--product card -->
            <?php 
              $val = $product->getLast6Product();
              foreach ($val as $row) {
                 $catId = $row["cat_id"];
                 $category->getCatById($catId);
             ?>
          <div class="card mt-3 card-block scrollCard">
            <div class="product-1 align-items-center text-center">
              <a href="product-details.php?productID=<?= $row['id'];?>"> <img width="100%" src=<?php echo 'admin/'.$row["picture"];?>></a>
              <h5><?php echo $row['product_name'];?></h5>


              <div class="info mt-3">
                <span class="d-block"><?php echo $category->catName;?></span>

              </div>

              <div class="cost mt-3">
                <span><?php echo $row['price']?></span>
                <div>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                </div>
              </div>
              <div class="addBtn m-3">
                <a href="#"><i class="bi bi-bag-plus"></i></a>
                <a href="#"><i class="bi bi-heart"></i></a>
                <a href="#"><i class="bi bi-eye"></i></a>
              </div>
            </div>
          </div>
        <?php } ?>
        <!--product card -->
      </div><!--row-->
    </div>
  </section>

  <?php include'includes/footer.inc.php';?>


</body>
</html>

