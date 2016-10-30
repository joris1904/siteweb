<?php  

/**
* Session
*
* setFlash(param1, param2)
*
* flash()
*
* write(param1, param2) $_SESSION['User'] = value
*
* read(param)
*
* islogged(param = User)
*
* user() if
* 
*/
class Session
{
	
	public function __construct()
	{
		if (!isset($_SESSION)) {
			session_start();
		}
	}
	/**
	 * [setFlash description]
	 * @param [type] $message [description]
	 * @param string $type    [description]
	 */
	public function setFlash($message, $type = "success",$arg = '',$array = true) {
		if ($array == true) {
			$_SESSION['flash'][$arg]  = [
				"message" => $message,
				"type" => $type,
			];
		} else {
			$_SESSION['flash']  = [
				"message" => $message,
				"type" => $type,
			];
		}
	}


	/**
	 * Retourne a la vue les message flash
	 */
	public function Flash(){
		if (isset($_SESSION['flash'])) {
			$html = '';
			foreach ($_SESSION['flash'] as $key => $value) {
				
				if (is_array($value)) {
					$html .= '<div id="flash" class="flash '. $value['type'] .'">';
					$html .= '<div class="flash-group-addon"><i class="fa fa-fw fa-circle"></i></div>';
					$html .= ' <p class="flash-control">'. $value['message'] .'</p> </div>';
					
					$html .= '</div>';
				}
			}
			unset($_SESSION['flash']);
			return $html;
		}
	}


}
