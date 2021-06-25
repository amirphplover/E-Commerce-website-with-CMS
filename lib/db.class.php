<?php
class Dbh{



	private   $host     ;
	private   $username ;
	private   $password ;
	private   $dbname   ;
	protected $db     ;
	public    $query     ;

	public function connect(){


		$this->host 	= "localhost"  ;
		$this->username = "pmauser";
		$this->password = "Aa@Fz!8787" ;
		$this->dbname   = "ooppj"  ;

		/*******MYsqli way*********/

		/*$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		return $conn;*/


		/***********PDO**************/

		
		try {

			$dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
		    $conn = new PDO($dsn, $this->username, $this->password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $conn->query("SET character set utf8");
		    return $conn;
		    }catch(PDOException $e)
		    {
		    echo "Connection failed: " . $e->getMessage();
		    }




	}



	public function select($query){
        $result = $this->connect()->query($query) or die($this->connect()->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        } else {
            return false;
        }
    }



		public  function queryDB($sql){

		return $result = $this->connect()->query($sql);
		// $res= mysqli_query($this->connect(),$sql);  procudaul
	
	}



	    public function deleteDB($sql){
        return $result = $this->connect()->query($sql);
    }



    //     public function insertDB($sql, $val = [] ,$body = []){
    //     $this->db = $this->connect()->prepare($sql);
    //     return $this->db->execute($val,$body);
    // }

        public function insert($query){
        $result = $this->connect()->query($query) or die($this->connect()->error.__LINE__);
        if($result){
            return $result;
        } else {
            return false;
        }
    }


    	public function updateDB($sql, $val = []){

    	$this->db = $this->connect()->prepare($sql);
        return $this->db->execute($val);
    }




    public function Query($query, $val = [] ){

		//if we dont have val
		if(empty($val)){

			return  $this->queryDB($query); 

		//if we have val
		}else{

			$this->query = $this->connect()->prepare($query);
			return $this->query->execute($val);
 

		}
	}












}

?>


 <!-- dont refresh the page -->
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
 <!-- dont refresh the page -->