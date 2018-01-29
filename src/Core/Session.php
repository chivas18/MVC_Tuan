<?php 
/**
* 
*/
class Session
{

	public function destroySS()
	{
		session_destroy();
	}

	public function setSS($data)
	{
		foreach ($data as $name => $value) {
			$_SESSION[$name] = $value;
		}
	}

	public function getSS($name)
	{
		if (isset($_SESSION[$name])) {
			$user = $_SESSION[$name];
		} else {
			$user = '';
		}
		
	}
}
 ?>