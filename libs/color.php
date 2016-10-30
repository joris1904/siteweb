<?php  
	
	function color($name, $number = 6) {
		return '#'.substr(md5($name),0,$number);
	}

?>