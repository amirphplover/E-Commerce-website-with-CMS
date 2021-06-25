<?php
	
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/db.class.php");
	include_once($filepath."/../lib/Session.php");
	Session::checkLogin();
	include_once($filepath."/../function/function.php");


	class Adminlogin{

		public $errormsg;
  		public $infomsg ;
  		public $query;
  		public $db;



  		public function __construct(){
  			$this->db = new Dbh();
  		}


  		public function Query($sql){

  			$this->query = $this->db->connect()->prepare($sql);
  			return $this->query->execute();

  		}

  		public  function RowsCount(){

			return $this->query->rowCount();

		}

		public function FetchAdmin(){

			return $this->query->fetch(PDO::FETCH_ASSOC);

		}



	    public  function userLogin($username,$password,$email){

			if(empty($username) || empty($password) || empty($email)){

				return $this->errormsg.="تمامی کادرها را پرکنید";
			}



		    if($this->Query("SELECT * FROM admin WHERE username = '$username' AND password = '$password' AND email = '$email'")){

			    if($this->RowsCount() > 0){

			        $row = $this->FetchAdmin();
			        Session::set("userLogin",true);
			        Session::set("userId",$row['id']);
					Session::set("username",$row['username']);
					Session::set("fname",$row['fname']);
				    $this->infomsg .= "اطلاعات درست است";
				    header("location:index.php");
				    }else{

			            return $this->errormsg .= "مشخصات وارد شده اشتباه است<br>";
			        }

		    }



		}

	}







?>