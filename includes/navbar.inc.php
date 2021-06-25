  <?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/Session.php");
     Session::init(); 
  ?>

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
              <a class="nav-link" href="shop.php">فروشگاه</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="index.php">خانه</a>
            </li>
          </ul>
          <!-- navabr right -->

          <ul class="navbar-nav navabr-right">
            <?php $login = Session::get('userLogin') ?>
            <?php if($login==true){  ?>
                
                <li class="nav-item">
                  <div class="dropdown">
                      <button class="btn btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo Session::get('fname'); ?>
                      </button>
                      <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="account.php">مدیریت حساب</a>
                            
                            <?php if(isset($_GET['action']) AND $_GET['action']=='logout'){Session::destroy();} ?>
                            <a class="dropdown-item" href="?action=logout">خروج از حساب</a>
                      </div>
                  </div>
                </li>

            <?php }else{ ?>

              <li class="nav-item">
                <a class="nav-link loginLink" href="login.php">ثبت نام  |  ورود </a>
              </li>

            <?php }?>
          </ul>
        </div>
     </div>
  </nav>
<!-- navbar -->
  </header>