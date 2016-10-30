<?php

function index(){
	global $url;
	global $CoupePhrase;
	$tableusers = find(['table'=>'users','order'=>'created DESC','limit' => 5 ]);
	$news = find([
		'table' => 'news',
		'fields' => ['news.*','categories.name AS cat_name'],
		'join' => ['categories' => "categories.id=news.cat_id"],
		'order'=> 'created DESC',
		'conditions' => ['online' => 1]
		]);
	$cat = find([
		'table' => 'categories',
	]);

    require ROOT.'switch/index/index.php';
}
function post(){
	global $url;
	$tableusers = find(['table'=>'users','order'=>'created DESC','limit' => 5 ]);
	$news = find([
		'table' => 'news',
		'fields' => ['news.*','categories.name AS cat_name'],
		'join' => ['categories' => "categories.id=news.cat_id", 'users' => "users.id=news.user_id"],
		'order'=> 'created DESC',
		'conditions' => ['online' => 1,'news.slug' => $url[2]]
		]);

	$postnews = find([
		'table' => 'news',
		'fields' => ['news.*','categories.name AS cat_name'],
		'join' => ['categories' => "categories.id=news.cat_id"],
		'order'=> 'created DESC',
		'conditions' => ['online' => 1]
		]);
	$cat = find([
		'table' => 'categories',
	]);

    require ROOT.'switch/index/news.php';
}

$action = isset($url[1]) ? $url[1]: '';
switch ($action):
    case 'post':
    	post();
    	break;	
    default:
        index();
endswitch;
?>