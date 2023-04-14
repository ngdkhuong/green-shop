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
function randMHD(){
	$now = DateTime::createFromFormat('U.u', microtime(true));
	$result1 = $now->format("Y-m-d H:i:s");
	$result2 = $now->format("u");
	if ($result2 / 100 < 1000) {
		$result2 = "0" . ($result2 / 100);
	} else {
		$result2 = $result2 / 100;
	}
	return strtotime($result1).$result2;
}

function lastday($month = '', $year = '')
{
	if (empty($month)) {
		$month = date('m');
	}
	if (empty($year)) {
		$year = date('Y');
	}
	$result = strtotime("{$year}-{$month}-01");
	$result = strtotime('-1 second', strtotime('+1 month', $result));
	return date('Y-m-d', $result);
}



?>