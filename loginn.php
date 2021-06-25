<?php

include 'includes/autoloader.inc.php';
include 'function/function.php';


$users=new users;
$errormsg = "";
$infomesg = "";
//my wat to login
	// if($errormsg == ""){
	// $users->setvalue(NULL,NULL,$username,$password,NULL);
	// $isselect=$users->selectuser();
	//  		if($isselect == 1){
	// 		setcookie("admin","amir",time()+ 10);
	// 		header("location:panel.php");
	// 		}else{

	// 		 $errormsg.="password or username is wrong";

	// 	}

	 	
	// }



	if(isset($_POST['btn'])){

		$username 	=	cleaninput($_POST["username"]);
		$password   = 	cleaninput($_POST["password"]);
		$email      = 	cleaninput($_POST["email"]);

	//if input are empty

	if(empty($username) || empty($password) || empty($email)){

		$errormsg.="input are empty";
	}



   if($users->query("SELECT * FROM users WHERE email = ?", [$email])){

    if($users->RowsCount() > 0){

        $row = $users->FetchUser();
        $hashpassword  = $row->password;
        $username_real = $row->username;
        $idis  		   = $row->id;

        if(password_verify($password,$hashpassword) AND ($username_real == $username))
        {
             $infomesg .= "Password Matched<br>";
        }
        else
        {
             $errormsg .= " Password or username is wrong<br>";
        }

    }
    else
        {
             $errormsg .= "Wrong Email or Password<br>";
        }

    }



	if($errormsg == ""){
		$infomesg .= "loged";
		$_SESSION['userid'] = $idis;
		header("location:panel.php");
		exit();
	}

}
?>

<!DOCTYPE html>
<html>
<head>

<title>login page</title>

<?php include 'includes/header.inc.php'; ?>

</head>


<body class="text-center">
<?php if($errormsg != ""){ ?>
 <div>               
 <?php echo $errormsg; ?>        
 </div>
 <?php } ?>

 
</body>
</html>