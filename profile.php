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
 					<div class="Dsahbord-box mt-5 "> 
	 						<div class="row">
	 							<div class="col-md-12 Dsahbord-box1 text-center">


								    <?php if (isset($users->infomsg)) {?>
								          <div class="alert alert-success text-center"><?php echo $users->infomsg; ?></div>
								          <?php }?>

								          <?php if (isset($Users->errormsg)) {?>
								          <div class="alert alert-danger text-center"><?php echo $users->errormsg; ?></div>
								    <?php }?>
	 								<?php

	 								$userId = Session::get("userID_login");
	 								$res = $users->getUserById($userId);
	 								foreach ($res as $row) {
	 								?>

	 								<img width="100px" height="100px;" alt="profile" src=<?php echo $row['image']; ?>>
	 								<p class="mt-2"><?= $row['fname']." ".$row['lname']; ?></p><?php } ?>
	 									
	 							 </div>

	 							 <div class="col-12 infoListBox ">

	 							 	<!-- info user -->
	 							 	<?php 
	 								$userId = Session::get("userID_login");
	 								$res = $users->getUserById($userId);
	 								foreach ($res as $row) {?>

									<ul class="list-group ">
									  <li class="list-group-item ">

									  	نام  :  <?php echo $row['fname']; ?></li>

									  <li class="list-group-item">نام خانوادگی : <?php echo $row['lname'];?></li>

									  <li class="list-group-item"><?php echo $row['email'] ?> : ایمیل </li>
									  <li class="list-group-item"><?php echo $row['username'];?> : نام کاربری  </li>
									  <li class="list-group-item"><?php echo "*****"; ?> : رمز عبور </li>
									</ul>

									<?php } ?>

									<a href="editProf.php" class="btn">ویرایش مشخصات</a>
 						   		</div>
 						    </div>
 						   <div class="col-12">
 						   	
 						   </div>

 						</div>
 					</div>
 				</div>
 			</div>
 		</div>

 </section>


<?php include'includes/footer.inc.php';?>


</body>
</html>

