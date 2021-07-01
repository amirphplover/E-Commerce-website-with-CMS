<?php

	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/db.class.php");
	include_once($filepath."/../function/jdf.php");




	class comment{

		public $db ;
		public $query ;

  		public $errormsg;
  		public $infomsg ;



		public function __construct(){

			$this->db = new Dbh;
		}




	public function insertComment($proId,$userId,$txt){

		if(empty($txt)){

			 $this->errormsg .= "کادر ها را ر کنید";

		}else{

			 $userId = Session::get('userID_login');
	     	 $date	 = jdate('Y/m/d');
	     	 $sql="INSERT INTO comments  VALUES (NULL, ? , ? , ? , ? , ?)";
	     	 $results = $this->db->connect()->prepare($sql);
	     	 $res = $results->execute([$userId,$proId,$txt,$date,0]);

	     	 if($res){

	     	 	$this->infomsg .= "نظرتان در حال بررسی است";
	     	 	header("location:product-details.php?productID=".$proId."");
	     	 }
		}



	}



	public function selectAllComments(){

		$sql = "SELECT * FROM `comments`  ORDER BY id DESC";
		$res = $this->db->queryDb($sql);

		return $res;
	}





		public function delete($id){

		$result = $this->db->Query("DELETE  FROM `comments` WHERE `comments`.`id`=?",[$id]);
		if($result){

			return $this->infomsg .= "حذف با موفقیت انجام شد";
		}else{

			return $this->errormsg .= "خطا در حذف کاربر";
		}
	}





	public function commentValidation($id,$status){

		$result = $this->db->Query("UPDATE `comments` SET `status` = '$status' WHERE `comments`.`id` = ? ",[$id]);
		return $result;

	}


	public function CommentAccepted($proId){

		 $sql="SELECT `id`, `user_id`, `product_id`, `text`, `time`, `status` FROM `comments` WHERE `product_id`= '$proId' && `status`=1";
		 $res = $this->db->queryDb($sql);

		 return $res;
	}



}




?>