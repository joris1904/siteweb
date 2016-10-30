<?php 

/**
 * [find description]
 * @param  array  $req [description]
 * @return [type]      [description]
 */
function find($req = []){

	global $db;

	$sql = 'SELECT ';

	if (isset($req['fields'])) {
		if (is_array($req['fields'])) {
			$sql .= implode(', ',$req['fields']);
		} else {
			$sql .= $req['fields'];
		}
	} else {
		$sql .= '*';
	}

	$sql .= ' FROM '.$req['table']. ' ';

	// LEFT JOIN $k(MEMBRE) on $v(MEMBRE.id = post.id) 
	if (isset($req['join'])) {
		foreach ($req['join'] as $k => $v) {
			$sql .= 'LEFT JOIN '. $k . ' ON '.$v.' ';
		}
	}

	if (isset($req['conditions'])){
		$sql .= "WHERE ";

		if (!is_array($req['conditions'])) {
			$sql .= $req['conditions'];
		} else {
			$cond = [];
			foreach ($req['conditions'] as $k=>$v) {
				if (!is_numeric($v)) {
					$v = '"'. addslashes($v). '"';
				}

				$cond[] = "$k=$v";
			}
			$sql .= implode(' AND ',$cond);
		}
	}

	if (isset($req['order'])) {
		$sql .= ' ORDER BY '. $req['order'];
	}

	if (isset($req['limit'])) {
		$sql .= ' LIMIT '. $req['limit'];
	}


	$pre = $db->prepare($sql);
	$pre->execute();

	return $pre->fetchAll(PDO::FETCH_ASSOC);

}

function findFirst($req){
	return current(find($req));
}


function findCount($req = []){

	$cond = '';

	if (!isset($req['conditions'])) {
		$req['conditions'] = "1=1";
	}
	if (!isset($req['key'])) {
		$req['key'] = 'id';
	}
	$res = findFirst([
		'table' => $req['table'],
		'fields' => 'COUNT('.$req['key'].') AS count',
		'conditions' => $req['conditions']
	]);
	return $res['count'];
}

function findList($req = []) {

	if (!isset($req['key'])) {
		$req['key'] = "id";
	}
	if (!isset($req['fields'])) {
		$req['fields'] = $req['key'] . ', name';
	}

	$d = find($req);
	$r = [];
	foreach ($d as $k=>$v) {
		$r[current($v)] = next($v);
	}

	return $r;
}

// $_POST['username'];
// $_POST['password'];
// $_POST['id'] 
// save($_POST);
//$db->query('INSERT INTO ')


/**
	* Permet de sauvegarder des données
	* @param $data Données à enregistrer
	**/
	function save($req){
		global $db;
		$key = isset($req['key']) ? $req['key'] : 'id';
		$fields =  array();
		$d = array();
		foreach($req['data'] as $k=>$v){
			if($k!=$key){
				$fields[] = "$k=:$k";
				$d[":$k"] = $v; 
			}elseif(!empty($v)){
				$d[":$k"] = $v; 
			}
		}
		
		if(isset($req['data'][$key]) && !empty($req['data'][$key]) && $req['data'][$key] != 0){
			$sql = 'UPDATE '.$req['table'].' SET '.implode(',',$fields).' WHERE '.$key.'=:'.$key;
			$id = $req['data'][$key];
			$action = 'updated';
		} else{
			$sql = 'INSERT INTO '.$req['table'].' SET '.implode(',',$fields);
			$action = 'insert';
		}
		$pre = $db->prepare($sql); 
		$pre->execute($d);

		if ($action != 'updated') {
			return $db->lastInsertId();
		} else {
			return $id;
		}
	}

function delete($req) {

	global $db;
	if (!isset($req['key'])) {
		$req['key'] = 'id';
	}
	$sql = "DELETE FROM {$req['table']} WHERE {$req['key']}={$req['id']} ";
	$db->query($sql);
}

function connect($arg = "local") {
	
	global $data;

	$data = $data[$arg];
	try {

		$pdo = new PDO(
			'mysql:host='.$data['host'].';dbname='.$data['base'].';',
			$data['user'],
			$data['pass'],
			[PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
		);
		return $pdo;
		
	} catch (PDOException $e) {
		die('Erreur' . $e->getMessage());
	}
}