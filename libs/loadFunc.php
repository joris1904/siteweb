<?php

function loadFunc($path,$extends = 'php'){

	$libs = glob(ROOT."$path/*.$extends");

	foreach($libs as $k=>$v){
		/**
		 * Pour retourner que le nom d'un fichier 
		 * str_replace(ROOT . $path, '', $v);
		 * c:/wamp64/www/loadFunc.php
		 * loadFunc.php
		 */
		if ($v != ROOT . $path .'/loadFunc.php') {
			if(file_exists($v)){
		        require $v;
		    }
		}
	}
}