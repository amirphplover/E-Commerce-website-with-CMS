<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header.inc.php';?>
</head>
<body>
  <header>
    <!-- navbar -->
   <nav class="navbar navbar-expand-lg pt-4 pb-4">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="styles/picture/logo.png"></a>
        <a class="ml-2 mt-2 basket" href="#"><span class="badge">22</span><i class="bi bi-basket"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-justify-right"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class=" navbar-nav mr-auto">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                سفارشات
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="index.php">ارتباط با ما</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="posts.php">درباره ما</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="category.php">بلاگ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="users.php">فروشگاه</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="product.php">خانه</a>
            </li>
          </ul>
          <!-- navabr right -->
        
          <ul class="navbar-nav navabr-right">
            <li class="nav-item">
              <a class="nav-link loginLink" href="#">ثبت نام  |  ورود </a>
            </li>
          </ul>
        </div>
     </div>
  </nav>
<!-- navbar -->
  </header>


  <section>
    <div id="demo" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="styles/picture/slidebaner.jpg" height ="550px" alt="slider Image">
          <div class="carousel-caption mb-5 pb-3">
            <h3>فروشگاه بزرگ</h3>
            <p>بهترین کیفیت را با ما تجربه کنید</p>
            <button class="btn btn-default">مشاهده</button>
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
        <div class="col-12 p-5 mt-5">
        <h3>جدیدترین محصولات </h3>
       </div>
      </div>
    </div>


    <div class="container">
      <div class="scrollCards">
       
        <!--product card -->
          <div class="card mt-3">
            <div class="product-1 align-items-center text-center">
              <img src="styles/picture/slide1.jpg" width="100%">
              <h5>دفتر</h5>


              <div class="info mt-3">
                <span class="d-block">کتابچه</span>

              </div>

              <div class="cost mt-3">
                <span>2000</span>
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

        <!--product card -->

        <!--product card -->

          <div class="card mt-3">
            <div class="product-1 align-items-center text-center">
              <img src="styles/picture/slide1.jpg" width="100%">
              <h5>دفتر</h5>


              <div class="info mt-3">
                <span class="d-block">کتابچه</span>

              </div>

              <div class="cost mt-3">
                <span>2000</span>
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

        <!--product card -->

        <!--product card -->
 
          <div class="card mt-3">
            <div class="product-1 align-items-center text-center">
              <img src="styles/picture/slide1.jpg" width="100%">
              <h5>دفتر</h5>


              <div class="info mt-3">
                <span class="d-block">کتابچه</span>
              </div>

              <div class="cost mt-3">
                <span>2000</span>
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

        <!--product card -->

        <!--product card -->

          <div class="card mt-3">
            <div class="product-1 align-items-center text-center">
              <img src="styles/picture/slide1.jpg" width="100%">
              <h5>دفتر</h5>


              <div class="info mt-3">
                <span class="d-block">کتابچه</span>
              </div>

              <div class="cost mt-3">
                <span>2000</span>
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

        <!--product card -->
      </div><!--row-->
    </div>
  </section>


</body>
</html>

