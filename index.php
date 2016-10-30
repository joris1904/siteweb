<?php
	/**
	 * WEBROOT chemin absolue dossier web
	 * /
	 */
	session_start();
	date_default_timezone_set("Europe/Paris");
	define("WEBROOT", str_replace('index.php', '',$_SERVER['SCRIPT_NAME'] ));
	define("ROOT", str_replace('index.php', '',$_SERVER['SCRIPT_FILENAME'] ));
	define("NOM_BASE_SITE","Tako | Hell");

		$page = (isset($_GET['page']) && $_GET['page'] != "") ? $_GET['page'] : "index";

		$url = explode('/',$page);
		$page = $url[0];
		require ROOT. "config/conf.php";
		require ROOT. "class/Autoloader.php";
		require ROOT. "libs/loadFunc.php";

		Autoloader::register();

		$Session = new Session();
		$Form = new BootstrapForm();

		$type = (isset($page) && $page == "kapa") ? 'admintheme' : 'theme';

		loadFunc('libs');
		loadFunc('tako');
		//debug($url,true);

		/**
		 * [$db description]
		 * @var [type]
		 */
		$db = connect();


		if (!empty($_POST)) {
			$post = new stdClass();
			foreach ($_POST as $k => $v) {
				$post->$k = $v;
			}
		}

		if (isset($_SESSION['User'])) {
			$admin = userInfo($_SESSION['User']['id']);
		}
		ob_start();

		$file = ROOT. "view/{$page}.php";
		
		if(file_exists($file)){
		    require $file;
		}

		$content = ob_get_clean();

	include ROOT. "{$type}.php";

?>

