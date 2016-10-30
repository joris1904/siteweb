<?php  

function url($url){
	trim('/'. $url);

	//$arg = ['/',':'];
	//$val = ['?','&'];
	//$url = str_replace($arg,$val,$url);

	return WEBROOT . $url . '/';
}


