<?php 

 class enc
 {
 	
 	function enc()
 	{
 	}


 	function encry($str, $hash){
	$encry = "";
	$arr = str_split($str);

	for ($x = 0; $x < count( $arr ); $x++ ){
	    $chr = ord($arr[$x]);
	    $chr -= $hash;
	    $encry .= chr($chr);
	}
	 return $encry;
 }

}

?>