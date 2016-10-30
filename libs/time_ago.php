<?php

function Ago($time){

	$diff_time = time() - strtotime($time);

	if ($diff_time < 1) {
		return "A l'instant";
	}

	$cond = [

		31556926 		=> 'an',
		2629743.83 		=> 'mois',
		86400 			=> 'jour',
		3600 			=> 'heure',
		60 				=> 'minute',
		1 				=> 'seconde'

	];

	foreach ($cond as $sec => $value) {
		$div = $diff_time / $sec;
		if ($diff_time < 2629743.83) {
			if ($div >= 1) {
				$time_ago = round($div);
				$time_type = $value;
				if ($time_ago > 1 && $time_type != 'mois') {
					$time_type .= 's';
				}
				return " il y a $time_ago $time_type";
			}
		} else {
			return  AgoDe($time, '%d %B %Y');
		}
	}	
}


function AgoDe($date,$type ='%d %B %Y', $timestamp = false){
	/**
	 * "%A %d %B %Y %H %M"
	 * %A  exemple jeudi 
	 * %d jour en chifre entre 1 et 31
	 * %B mois en lettre janvier, 
	 * %Y Annee en 2020 2016
	 * %H	L'heure, sur 2 chiffres, au format 24 heures
	 * %M	Minute, sur 2 chiffres
	 */
	setlocale (LC_TIME, 'fr_FR.utf8','fra');

	if ($timestamp != false) {
		$date = $data;
	} else {
		$date = strtotime($date);
	}

	return strftime($type , $date);
}