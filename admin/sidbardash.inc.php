      
<?php

$users    =  new users;
$category =  new category;
$product  =  new product;

?>

      <div class="col-md-3 dashList">
        <ul class="list-group">
          <li class="list-group-item active main-color-bg d-flex flex-row-reverse"><i class="bi bi-gear"></i><span class="pr-1">داشبورد</span></li>

          <a href="category.php"><li class="list-group-item d-flex flex-row-reverse"><i class="bi bi-card-list"></i><span class="pr-1">دسته بندی ها</span><span class="badge mr-4"><?php echo $category->catmember();?></span></li></a>

          <a href="product.php"><li class="list-group-item d-flex flex-row-reverse"><i class="bi bi-box"></i><span class="pr-1">محصولات</span><span class="badge mr-4"><?php  $product->productCount();?></span></li></a>
          

          <a href="users.php"><li class="list-group-item d-flex flex-row-reverse"><i class="bi bi-people"></i><span class="pr-1">کاربران  </span> <span class="badge mr-4"><?php echo $users->usermember();  ?></span></li></a>

          <a href="comments.php"><li class="list-group-item d-flex flex-row-reverse"><i class="bi bi-people"></i><span class="pr-1">نظرات  </span> <span class="badge mr-4"><?php echo $users->usermember();  ?></span></li></a>

        </ul>
      </div>

