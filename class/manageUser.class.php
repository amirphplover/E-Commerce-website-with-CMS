<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/../lib/db.class.php");
include_once($filepath."/../function/jdf.php");
include_once($filepath."/../function/function.php");

class users{

	public $id;
	public $fname;
	public $lname;
	public $email;
	public $username;
	public $password;
	

	public $query;
	public $db;

	public $errormsg ;
	public $infomsg ;

	public function __construct(){
        $this->db = new Dbh();
    }
	

    function setvalue($fname,$lname,$username,$password,$email){

    	$this->fname    =	$fname;
    	$this->lname    =	$lname;
    	$this->username =	$username;
    	$this->password =	$password;
    	$this->email    =	$email;
    }

    public function FetchAll(){

        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }

	// //query for users
	public function query($query, $val = [] ){

		//if we dont have val
		if(empty($val)){

			return  $this->db->queryDB($query); 

		//if we have val
		}else{

			$this->query = $this->db->connect()->prepare($query);
			return $this->query->execute($val);
 

		}
	}



	// public  function select_user_email($input =[]){

	// 	 $this->db->queryDB("SELECT * FROM users WHERE email = ? ",[$input]);
	// 	// $res= mysqli_query($this->connect(),$sql);  procudaul
	
	// }


	public function getAllUser(){
        $query  = "SELECT * FROM users ORDER BY id DESC";
        $result = $this->db->queryDb($query);
        return $result;
    }
	//query for users



	// count of rows

	public  function RowsCount(){

		return $this->query->rowCount();
	}

	// count of rows


	//fetch fo query

	public function FetchUser(){

		return $this->query->fetch(PDO::FETCH_ASSOC);
	}

	//fetch fo query



	//insert query function
	public function insert(){


		 $fname        = $this->fname;
		 $lname        = $this->lname;
		 $username     = $this->username;
		 $password     = password_hash($this->password,PASSWORD_DEFAULT);
     	 $email        = $this->email;
     	 $date		   = jdate('Y/m/d"');
     	 $sql="INSERT INTO users  VALUES (NULL, ? , ? , ? , ? , ? , ?)";
     	 $results = $this->db->connect()->prepare($sql);
     	 return $results->execute([$fname, $lname, $email, $username, $password,$date]);
	}
	//insert query function




	public function ValidationUser($fname,$lname,$username,$password,$email,$confirm_password){

		 

		if(empty($fname)  || empty($lname) || empty($username) || empty($password) || empty($email) || empty($confirm_password)){

			$this->errormsg.="کادرها را پرکنید";
			return $this->errormsg;
		}

		//email validation

		if($this->query("SELECT * FROM users WHERE email = ?",[$email])){

			if( $this->RowsCount() > 0){

				$this->errormsg .= "!!شرمنده این ایمیل قبلا استفاده شده <br>";
				return $this->errormsg;

			}
		}


		if(strlen($password) < 5){

				$this->errormsg.= "!! این پسورد خیلی ضعیفه<br>";
				return $this->errormsg;

		}

		//confirm password validation

		if ($password != $confirm_password) {
			
				$this->errormsg.="!!پسورد ها یکسان نیستند <br>";
				return $this->errormsg;

		}

		//submit for form 
		if($this->errormsg ==""){

			$this->setvalue($fname , $lname , $username , $password , $email);

			$isinsert= $this->insert();

			if($isinsert){

				$this->infomsg="اطلاعات با موفقیت ثبت شد  برای  ورود ";
				return $this->infomsg;


			}

		}


	}

	// login user
	public function userLogin($email,$password){

		$email 		= cleaninput($email);
		$password   = cleaninput($password);

		if(empty($email) || empty($password)){

			return $this->errormsg.="تمام فیلد هارا پرکنید";
		}


		if($this->query("SELECT * FROM users WHERE email = ?",[$email])){

			if($this->RowsCount() > 0){

				$row 			= $this->FetchUser();
				$password_hash	= $row['password'];

			if(password_verify($password,$password_hash)){



				 $this->infomsg.="password matched";
				 Session::set("userLogin",true);
				 Session::set('userID_login',$row['id']);
				 Session::set("fname",$row['fname']);
				 
				 header("location:index.php");

			}else{

				return $this->errormsg.="گذرواژه اشتباه اشت";

			}

			}else{

			return $this->errormsg.="چنین کاربری وجود نداررد";
			}

		}
	}






	public function delete($id){

		$result = $this->query("DELETE  FROM `users` WHERE `users`.`id`=?",[$id]);
		if($result){

			return $this->infomsg .= "حذف با موفقیت انجام شد";
		}else{

			return $this->errormsg .= "خطا در حذف کاربر";
		}
	}


	public function usermember(){
		$res = $this->getAllUser();
		$i=0;
		foreach ($res as $rows) {

			$i++;
		
		}
		echo $i;

	}




}
	
?>

