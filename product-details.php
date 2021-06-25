<!DOCTYPE html>
<html lang="en">
<head>
<title>SHOP</title>
<?php include 'includes/header.inc.php';?>
</head>
<?php include 'includes/navbar.inc.php';?>
<?php include 'includes/autoloader.inc.php';?>
<?php $product  = new product;?>
<?php $category = new category;?>








<body>
	<section><!-- breadcrumb -->
		<div class=" mt-3">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12  text-center">
						<div class="breadcrumb-content">

							<ul class="breadcrumb ">
								<li><a href="index.php">خانه  \</a></li>
								<li><a href="shop.php" class="breadcrumbActive"> فروشگاه</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="details">
		<div class="container">
			<div class="row">
			
				<?php $data = $product->getProductById($_GET['productID']); ?>

				<?php   $category->getCatById(product::$catID) ;   ?>


				<div class="col-sm-12 col-md-6 details-txt ">
					<h3 class="d-flex flex-row-reverse"><?php echo product::$productName; ?></h3>
					<h5 class="d-flex flex-row-reverse"> : قیمت  <small><?php  echo product::$price; ?></small></h5>
					<h5 class="d-flex flex-row-reverse"> : دسته بندی  <small><?php echo $category->catName; ?></small></h5>
					<h5 class="d-flex flex-row-reverse"> : توضیحات <small><?php  echo product::$body; ?></small> </h5>

					<a  href="#" class="btn  btn-sm add-to-cart-btn ">افزودن به سبد خرید</a>
					<a href="#" class="btn btn-success btn-sm ">خرید حالا</a>
				</div>


				<div class="col-sm-12 col-md-6 text-center">
					<img class="product-image" height="350px" src='admin/<?php echo product::$picture; ?>' alt="product image">
				</div>

			</div>
		</div>
	</section>

	<section class="description">
		<div class="container">
			<div class="row ">
				<div class="col-12">
					<h3 class="mt-5 d-flex flex-row-reverse">توضیحات</h3>
					<div class="mt-5 d-flex flex-row-reverse"><p><?= product::$body; ?></p></div>
				</div>
			</div>
		</div>
	</section>


	<section class="comments">
		<div class="container">
		    <div class="row ">
		        <div class="col-12 ">
		            <div class="card card-white post ">
		                <div class="post-heading d-flex  flex-row-reverse">
		                    <div class="float-left image">
		                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
		                    </div>
		                    <div class="float-left meta">
		                        <div class="title h5">
		                            <a href="#"><b>Ryan Haywood</b></a>
		                            made a post.
		                        </div>
		                        <h6 class="text-muted time">1 minute ago</h6>
		                    </div>
		                </div> 
		                <div class="post-description d-flex flex-row-reverse"> 
		                    <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>

		                </div>
		            </div>
		        </div>
		        
		    </div>
		</div>
	</section>



<?php if(Session::get('userLogin')==true) {?>
	<section class="comments">
		<div class="container">
			<div class="row">
				<div class="col-12 comment-form mt-5">
					<p class="text-dark ">نظرتو بنویس برامون!</p>
					<form method="post" action="">
						<input type="hidden" name="productID" value=<?php echo $_GET['productID'];?>>
						<input type="hidden" name="userID" value=<?php Session::get('userID_login');?>>
	                    <div class="form-group">
	                        <textarea class="form-control p-3" cols="" rows="6" placeholder="نظرت رو بگو ..."></textarea> 
	                        <button class="btn mt-4" type="submit" name="btn-comment">ارسال</button>
	                    </div>
                	</form>
				</div>
			</div>
		</div>
	</section>
<?php }?>

  <?php include'includes/footer.inc.php';?>
  <?php include'includes/Dry.php';?>
	
</body>

</html>