<?phpc

	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/db.class.php");
	include_once($filepath."/../function/jdf.php");


	class comments{

		public $Dbh ;
		public $query ;

		public function __construct(){

			$this->Dbh = new Dbh;
		}


		public function insertComment(){

			
		}
	}




?>