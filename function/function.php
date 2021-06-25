<?php

function cleaninput($val){

	$res = trim(strip_tags(addslashes($val)));
	return htmlspecialchars($res);

}





// ramz negari


// 		function random_string($length) {
// 				$key = '';
// 				$keys = array_merge(range(0, 9), range('a', 'z'));
				
// 				for ($i = 0; $i < $length; $i++) {
// 					$key .= $keys[array_rand($keys)];
// 				}
				
// 				return $key;
// 			}


// function encryptdata($data)
// 		{			
// 			 //return $data;
			
// 			 $code = base64_encode($data);
// 			 $randomcode = random_string(53).$code.random_string(64);
// 			 return $randomcode;
			
			 
// 		}
		
		
		
// 		function decryptdata($data)
// 		{
// 			//return $data;
			
// 			$val1 	=  $data;
// 			$worlst =  substr($val1 , 53);
// 			$worlst =  substr($worlst ,0 ,-64);
// 			$worlst =  base64_decode($worlst);
// 			return $worlst;		
			
// 		}

	
		



?>