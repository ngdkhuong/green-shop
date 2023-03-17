<?php 
function arrayRand($min,$max,$time){
    $checkrandom=[];
	for($i=0;$i<$time;){ // <---
		$random=RAND($min,$max);
		if(!in_array($random,$checkrandom)){
			array_push($checkrandom,$random);
			$i++; // <---
		}
	}
    return $checkrandom;
}


?>