<?php
/**
* Class Home
*/

class Admin extends Controller
{
	protected $User;	
	public function __construct()
	{
		$this->User = $this->model('User');
	}
	public function index()
	{ 
		if (isset($_SESSION['user']) && $_SESSION['user']['position'] == 1) {
			$this->view('admin/index');
		}else{
			$this->view('admin/login');
		}
	}
	public function login()
	{
		if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['username'])) {
			$password = $_POST['password'];
			$password = md5($password);
			$login = $this->User->checklogin($_POST['username'],$password);
			if ($login) {
				$session = [
					'user' => $login,
					'message' => 'Login success!'
				];
				$session['user'] = $session['user'][0];
				$this->setSS($session);
				if ($_SESSION['user']['position'] == 1) {
					$this->view('admin/index');
				} 
			} else {
				$session = [
					'user' => false,
					'message' => 'Your username or password is incorected!'
				];
				$this->setSS($session);
				$this->redirect('admin/login');

			}

		} else {
			$session = [
				'message' =>'Your username or password empty!'
			];
			$this->setSS($session);
			$this->redirect('admin/login');
		}

	}
	public function logout()
	{
		$this->destroySS();
		$this->redirect('admin/login');
	}
}