<?php
	 $filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/db.class.php");
	include_once($filepath."/../function/jdf.php");
	// include_once($filepath."/../function.php");

	class product{


	public  $db;
	public  $query;
    public  $info;
    public  $error;

    public static $productName;
    public static $catID;
    public static $body;
    public static $price;
    public static $picture;

    public function __construct(){

      $this->db = new Dbh;
    }





    public function Query($sql){
      $res = $this->db->connect()->prepare($sql);
      return $res->execute();
    }


    public function insertProduct($data,$file){

        $productName = cleaninput($data['productName']);
        $catId       = cleaninput($data['catId']);
        $typeId      = cleaninput($data['typeId']);
        $body        = cleaninput($data['editor1']);
        $price       = cleaninput($data['price']);


        $picFormat   = array('jpeg','jpg','png','gif');
        $file_name   = $file['picture']['name'];
        $file_size   = $file['picture']['size'];
        $file_tmp    = $file['picture']['tmp_name'];

        $div          = explode('.',$file_name);
        $file_text    = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_text;
        $upload_image = 'upload/'.$unique_image;


        if(empty($productName) || empty($catId) || empty($typeId) || empty($body) || empty($price)){

            return $this->error .= "کادرها خالی هستند";

        }else{

            if(empty($file_name)){

              return $this->error .= "لطفا عکس را انتخاب کنید";

            }elseif ($file_size > 4048567) {
              
              return $this->error .= "حجم عکس باید کتر از 4 مگابایت باشد";

            }elseif (in_array($file_text,$picFormat) === false) {
              
              return $this->error .= "شما فقط میتوانید فرمت های  :".implode(',', $picFormat);

            }else{

              move_uploaded_file($file_tmp, $upload_image);
              $query = "INSERT INTO `product` (`id`, `product_name`, `cat_id`, `type_id`, `body`, `price`, `picture`) VALUES (NULL, '$productName', '$catId', '$typeId', '$body', '$price','$upload_image')";

              $res = $this->db->insert($query);
              if($res){

                 return  $this->info .= "محصول با موفقیت انجام شد";
                  

              }else{

                 return  $this->error .= "خطا در درج محصول"; 

              }
            }
        }


    }////insert product



    //update product
    public function updateProduct($data, $file, $id){

        $productName = cleaninput($data['productName']);
        $catId       = cleaninput($data['catId']);
        $typeId      = cleaninput($data['typeId']);
        $body        = cleaninput($data['editor1']);
        $price       = cleaninput($data['price']);


        $picFormat   = array('jpeg','jpg','png','gif');
        $file_name   = $file['picture']['name'];
        $file_size   = $file['picture']['size'];
        $file_tmp    = $file['picture']['tmp_name'];

        $div          = explode('.',$file_name);
        $file_text    = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_text;
        $upload_image = 'upload/'.$unique_image;


        if(empty($productName) || empty($catId) || empty($typeId) || empty($body) || empty($price)){

               return $this->error .= "کادرها خالی هستند";

        }else{

          if(!empty($file_name)){

            if($file_size > 1048567){

               return $this->error .= "حجم عکس باید کمتر از 4 مگ باشد";

            }elseif (in_array($file_text,$picFormat) === false) {
              
              return $this->error .= "شما فقط میتوانید فرمت های  :".implode(',', $picFormat);

            }else{

              move_uploaded_file($file_tmp,$upload_image);
              $sql = "UPDATE `product`SET `product_name` = '$productName',`cat_id`= '$catId',`type_id`= '$typeId',`body` = '$body',`price`= '$price',`picture` = '$upload_image' WHERE `product`.`id`= '$id'";

              $res = $this->Query($sql);
              
              if($res){

                 return  $this->info .= "محصول با موفقیت انجام شد";
                  

              }else{

                 return $this->error .= "خطا در درج محصول"; 

              }
            }

            


            }else{

            $sql = "UPDATE `product`SET `product_name` = '$productName',`cat_id`= '$catId',`type_id`= '$typeId',`body` = '$body',`price`= '$price' WHERE `product`.`id`= '$id'";

              $res = $this->Query($sql);
              if($res){

                 return  $this->info .= "محصول با موفقیت انجام شد";
                  

              }else{

                 return  $this->error .= "خطا در درج محصول"; 

              }
            }


          }

        }


    





     public function getAllproduct(){

        $sql = "SELECT * FROM product ORDER BY id DESC";
        $this->query = $this->db->queryDB($sql);
        return $this->query;
     }


     public function getLast6Product(){

        $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 6";
        $this->query = $this->db->queryDB($sql);
        return $this->query;
     }




     public function getProductById($id){

        $result =  $this->db->Query("SELECT * FROM `product` WHERE `product`.`id` = '$id' ");
        foreach ($result as $key) {

           self::$productName   = $key['product_name'];
           self::$catID         = $key['cat_id'];
           self::$body          = $key['body'];
           self::$price         = $key['price'];
           self::$picture       = $key['picture'];

        }
      }


     public function deleteProduct($id){

      $sql = "SELECT * FROM product WHERE id = '$id'";
      $getData = $this->db->queryDB($sql);

      if($getData){
        while ($delImg = $getData->fetch()) {
          $delLink = $delImg['picture'];
          unlink($delLink);
        }
      }

      $sql = "DELETE FROM product WHERE id = '$id'";
      $this->query = $this->db->deleteDB($sql);
      return $this->query;

     }


     public function productCount(){
        $res = $this->getAllproduct();
        $i=0;
        foreach ($res as $rows) {

          $i++;
        
        }
        echo $i;

     }



     public function getProductByCat($id){

        $sql = "SELECT * FROM product WHERE cat_id = '$id'";
        $this->query = $this->db->queryDB($sql);
        return $this->query; 

     }



	}











?>