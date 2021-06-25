<?php
 $filepath = realpath(dirname(__FILE__));
include_once($filepath."/../lib/db.class.php");
include_once($filepath."/../function/jdf.php");

class category {

  	public $id;
  	public $cat_name;

  	public $query;
  	public $db;

  	public $errormsg;
  	public $infomsg ;

    public $catName;
    public $catBody;


  	public function __construct(){
     $this->db = new Dbh();
    }

    public function insertcat($catname,$body){

    $catname   =  cleaninput($catname);
  	$body      =  cleaninput($body);

    	if(empty($catname)){

    		 $this->errormsg .= "کادر خالی است";

      	}else{

          		$query = "INSERT INTO category(category_name, body) VALUES('$catname','$body')";
              $catinsert = $this->db->insert($query);

          		if($catinsert){

          			return $this->infomsg .="دسته با موفقیت اضافه شد";
              
          		}else{

          			return $this->errormsg .= "خطا در اجرای دستور";
            
          		}

      	}
    }


  	public function getAllcat(){

          $sql  = "SELECT * FROM category ORDER BY id DESC";
          $this->query = $this->db->queryDb($sql);
          return $this->query;
      }


    public function getCatById($id){

        $result =  $this->db->Query("SELECT * FROM `category` WHERE `category`.`id` = '$id' ");
        foreach ($result as $key) {

           $this->catName = $key['category_name'];
           $this->catBody = $key['body'];

        }     
      }

    public function deleteCat($id){
      
        $result = $this->db->Query("DELETE  FROM `category` WHERE `category`.`id`=?",[$id]);
        if($result){

               $infomsg ="دسته با موفقیت حذف شد";
        }else{

               $errormsg ="خطا در حذف";

        }

      }


    public function updateCat($catName,$body,$catId){

        $sql = "UPDATE `category` SET `category_name` = '$catName', `body` = '$body' WHERE `category`.`id` = '$catId'";
         return $this->db->queryDB($sql);

  

        }


    public function catmember(){
      
        $res = $this->getAllcat();
        $i=0;
        foreach ($res as $rows) 
        {
        $i++;
        }
      echo $i;
      }



}
?>