<!DOCTYPE html>
<html lang="en">
<head>
<title>HOME</title>
<?php include 'includes/header.inc.php';?>
</head>
<body>
<?php include 'includes/navbar.inc.php';?>
<?php include 'includes/autoloader.inc.php';?>


<?php
	$login =   Session::get("userLogin");
	if ($login == false) {
		
		header('Location:login.php');
	}
	$users = new users;
?>
  

 <section class="Dashbord-account">
 	
 		<div class="container">
 			<div class="row d-flex flex-row-reverse">

 				<!-- admin dashobord -->
 					<?php include 'includes/accountDashbord.inc.php'; ?>
 				<!-- admin dashobord -->

 				<div class="col-md-9">
 					<div class="Dsahbord-box mt-5"> 
 						<div class="row">
 							<div class="col-md-12 Dsahbord-box1 text-center">
 								<?php  
 								$userId = Session::get("userID_login");
	 							$res = $users->getUserById($userId); ?>

 								<?php foreach ($res as $row) { ?>
 								<img alt="profile" src=<?= $row['image'] ?>>
 								<p class="mt-2"><?php echo "خوش اومدی ".$row['fname']; ?></p >
 									<?php } ?>
 							 </div>
 						   </div>
 							 	   <table class="table text-center">
									  <thead>
									    <tr>
									      <th scope="col">جمع هزینه</th>
									      <th scope="col">محصول</th>
									      <th scope="col">تاریخ</th>
									      <th scope="col">شماره سفارش</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr>
									      <th scope="row">1</th>
									      <td>Mark</td>
									      <td>Otto</td>
									      <td>@mdo</td>
									    </tr>
									    <tr>
									      <th scope="row">2</th>
									      <td>Jacob</td>
									      <td>Thornton</td>
									      <td>@fat</td>
									    </tr>
									    <tr>
									      <th scope="row">3</th>
									      <td>Larry</td>
									      <td>the Bird</td>
									      <td>@twitter</td>
									    </tr>
									  </tbody>
									</table>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>

 </section>


<?php include'includes/footer.inc.php';?>


</body>
</html>

