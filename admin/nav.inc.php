
<?php   
    include_once '../lib/Session.php';  
    Session::checkSession();
?>




  <!-- navbar -->
 <nav class="navbar navbar-expand-md navbar-light bg-light ">
  <div class="container">
  <a class="navbar-brand" href="#">مدیریت</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon icn"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class=" navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">داشبورد<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="posts.php">پست ها</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="category.php">دسته بندی ها</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="users.php">کاربران</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="product.php">محصولات</a>
      </li>
    </ul>
    <!-- navabr right -->
  
    <ul class="navbar-nav navabr-right">
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo Session::get('fname');?> صفا آوردی </a>
      </li>
      <li class="nav-item">
        <?php if(isset($_GET['action']) AND $_GET['action']=='logout'){
          Session::destroy();
        } ?>
        <a class="nav-link " href="?action=logout">خروج  <span style="font-size: 16px; font-weight: 700;"><i class="bi bi-box-arrow-right"></i></span></a>
      </li>
    </ul>
   
  </div>
</div>
</nav>
<!-- navbar -->
