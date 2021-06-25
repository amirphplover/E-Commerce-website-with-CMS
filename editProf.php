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
    $userId = Session::get("userID_login");

    if(isset($_POST['editProf-btn']) AND $_SERVER['REQUEST_METHOD']=="POST" ){

    		$res = $users->editUserProfile($_POST,$_FILES,$userId);
    		if($res){
    			header("location:profile.php");
    		}
    }





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
	 							<div class="col-md-12 mb-3 Dsahbord-box1 text-center">
	 								<h5 class="m-4 p-4" style="border-bottom: 1px solid #ccc">ویرایش مشخصات</h5>
	 								<img alt="profile" src=<?php echo Session::get('userImage'); ?>>
	 							</div>

	 							 <div class="col-12 infoListBox ">

						 			<form method="post" enctype="multipart/form-data" action="">

						 			<?php
						 			
	 								$res = $users->getUserById($userId);

	 								foreach ($res as $row) {?>

	 									<?php
	 									 $userImage = $row['image'];
	 									 Session::set('userImage',$userImage); ?>
	 									
		 								<div class="form-group mb-5">
		 									<input name="image" type="file" style="border: none;"class="form-control" >

		 								</div>

					                    <div class="form-group d-flex">
					                        <input class="form-control mr-2" type="text" name="lname" placeholder="نام خانوادگی" value=<?= $row['lname']; ?>>
					                        <input class="form-control ml-2" type="text" name="fname" placeholder="نام" value=<?= $row['fname']; ?>>
					                    </div>
					                    <div class="form-group">
					                        <input class="form-control" type="text" name="username" placeholder="نام کاربری" value=<?= $row['username']; ?>>
					                    </div>
					                    <div class="form-group">
					                        <input class="form-control" type="email" name="email" placeholder="آدرس ایمیل" value=<?= $row['email']; ?>>
					                    </div>

					                    <div class="sign-btn text-center">  
					                    <input type="submit" class="btn" name="editProf-btn" value="ثبت تغییرات">
					                    </div>
					                <?php } ?>
					                </form>
									
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

