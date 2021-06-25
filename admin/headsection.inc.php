
<?php

include_once 'includes/autoloader.inc.php';
include_once '../function/function.php';
include_once '../lib/Session.php';


$users     = new users;
$product   = new product;
$category  = new category;

if(isset($_POST["btnuser"]) AND $_SERVER['REQUEST_METHOD'] == 'POST'){

    
    $fname            =  cleaninput($_POST["fname"]);
    $lname            =  cleaninput($_POST["lname"]);
    $username         =  cleaninput($_POST["username"]);
    $password         =  cleaninput($_POST["password"]);
    $email            =  cleaninput($_POST["email"]);
    $confirm_password =  cleaninput($_POST["confirm_password"]);

    $users->ValidationUser($fname,$lname,$username,$password,$email,$confirm_password);
    
}


if(isset($_POST['btnpro']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){

    
    $product->insertProduct($_POST,$_FILES);
    

}




?>



<header>
  <div class="container">
    <div class="row headerpart">
      <!-- dropdown part -->
    <div class="col-md-2">
      <div class="dropdown create ">
              <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                افزودن محتوا
              <span class="caret"></span>
              </button>
          <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenu1">
              <li><a type="button" data-toggle="modal" data-target="#addproduct">افزودن محصول</a></li>

              <li><a>افزودن پست</a></li>

              <li><a  type="button" data-toggle="modal" data-target="#adduser">افزودن کاربر</a></li>
          </ul>
        </div>
    </div><!-- dropdown part -->

      <!-- title part -->
      <div class="col-md-10 title d-flex flex-row-reverse">
        <h3>داشبورد  <small>مدیریت سایت</small> <i class="bi bi-gear"></i></h3>
      </div> <!-- title part -->
    </div>
  </div>
</header>













    <!-- Modals -->

    <!-- Add product -->
    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">افزودن محصول جدید</h4>
      </div>
      <div class="modal-body">
        <div class="form-group mb-4">
          <label>نام محصول</label>
          <input type="text" class="form-control" name="productName" placeholder="نام محصول را وارد کنید ">
        </div>

        <!-- select category name -->
        <div class="form-group mb-4">
          <?php $catFetch = $category->getAllcat();?>
          <label>دسته بندی</label>
        <select class="form-control form-control-sm" name="catId">
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
          <input type="file" class="form-control-file" name="picture" placeholder="عکس محصول">
        </div>



        <div class="form-group mb-4">
          <label>توضیحات محصول</label><br><br>
          <textarea name="editor1" class="form-control" rows="2" placeholder="محتوای بدنه صفحه"></textarea>
        </div>

        <div class="form-group mb-4">
          <label>قیمت محصول</label>
          <input type="text" class="form-control" name="price" placeholder="قیمت محصول را وارد کنید">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
        <button type="submit" name="btnpro" class="btn btn-danger main-color-bg btn-sm">ذخیره تغییرات</button>
      </div>
    </form>
    </div>
  </div>
</div><!--add product-->








<!-- Add users -->
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">افزودن کاربر جدید</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>نام </label>
          <input type="text" name="fname" class="form-control" placeholder="نام کاربر">
        </div>

        <div class="form-group">
          <label>نام خانوادگی</label>
          <input type="text"  name="lname" class="form-control" placeholder="نام خانوادگی کاربر">
        </div>

        <div class="form-group">
          <label>نام کاربری</label>
          <input type="text" name="username" class="form-control" placeholder="نام کاربری">
        </div>

        <div class="form-group">
          <label>رمز عبور</label>
          <input type="text" name="password" class="form-control" placeholder="رمز عبور">
        </div>


        <div class="form-group">
          <label>تایید رمز عبور</label>
          <input type="text" name="confirm_password" class="form-control" placeholder="رمز را کجدد وارد کنید">
        </div>

 
        <div class="form-group">
          <label>ایمیل کاربر</label>
          <input type="text" name="email" class="form-control" placeholder="ایمیل کاربر">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
        <button type="submit" name="btnuser" class="btn btn-danger main-color-bg btn-sm">افزودن</button>
      </div>
    </form>
    </div>
  </div>
</div><!--add users-->















<!-- update cat modal Page -->
    <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="direction: rtl;">
    <div class="modal-content">
      <form method="post" action="">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">افزودن دسته بندی</h4>
      </div>
      <div class="modal-body">


        <div class="form-group">
          <label>نام دسته</label>
          <input type="text" name="catname" class="form-control fetched-data">
        </div>
        <textarea class="form-control mt-4" name="body" rows="4" cols="3" placeholder="توضیحات ...."></textarea>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
        <button type="submit"  class="btn btn-danger main-color-bg btn-sm">افزودن</button>
      </div>
    </form>
    </div>
  </div>
</div><!--add page-->

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

<script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>


