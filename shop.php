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


	<section>

		<div class="container mt-5">
			<div class="row">
				<div class="col-lg-9 col-sm-12">
					<div class="row">

					<?php if(isset($_GET['selectCat'])){
				 		$val = $product->getProductByCat($_GET['selectCat']);
					 }else{
					 	$val = $product->getAllproduct();
					 }
					 ?>
					 <?php  
					  foreach ($val as $row) {
						 $catId = $row["cat_id"];
		                 $category->getCatById($catId);
					   ?>
						<div class="col-lg-4 col-sm-12">
							<!--product card -->
					          <div class="card mt-3">
					            <div class="product-1 align-items-center text-center">
					             <a href="product-details.php?productID=<?= $row['id'];?>" target="blank"> <img width="100%" src=<?php echo 'admin/'.$row["picture"];?>></a>
					              <h5><?php echo $row['product_name'] ?></h5>


					              <div class="info mt-3">
					                <span class="d-block"><?php echo $category->catName;?></span>

					              </div>

					              <div class="cost mt-3">
					                <span><?php echo $row['price'];?></span>
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
					                <a href="product-details.php?productID=<?= $row['id'];?>"><i class="bi bi-eye"></i></a>
					              </div>
					            </div>
					          </div>
					        <!--product card -->
						</div><!-- col-4 --> <?php } ?>
						
					</div><!-- main row -->
				</div> <!-- product cards -->





		 <?php $val = $category->getAllcat(); ?>
		        <div class="col-lg-3 col-sm-12 ">
		          <div class="row">
		            <div class="col-12 category-Sidbar">
		              <h4 class="d-flex flex-row-reverse mr-3">دسته بندی ها</h4>
		              <ul class="list-group list-group-flush mt-4">
		                <li class="list-group-item  d-flex flex-row-reverse"><a href="shop.php">همه محصولات </a></li>
		                <?php foreach($val as $row){ ?>
		                
		                <li class="list-group-item d-flex flex-row-reverse"><a href=?selectCat=<?php echo $row["id"]; ?>><?php echo $row['category_name'];?></a></li>
		                <?php } ?>
		              </ul>
		            </div>
		          </div>
		        </div><!--category part-->

			</div>
		</div>
	</section>

  <?php include'includes/footer.inc.php';?>
  <?php include'includes/Dry.php';?>
	
</body>

</html>