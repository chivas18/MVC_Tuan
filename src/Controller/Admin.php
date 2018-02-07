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
			$this->view('admin/index/users/list');
		}else{
			$this->view('admin/login');
		}
	}
	public function login()
	{
		$this->view('admin/login');
	}
	public function do_login()
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
					$this->redirect('users');
				}else{
					$this->redirect('admin/login?message=Sorry babe! Your account is member not admin.');
					$this->destroySS();
				}
			} else {
				$session['user'] = false;
				$this->setSS($session);
				$this->redirect('admin/login?message=Your username or password is incorected!');

			}

		} else {
			$this->redirect('admin/login?message=Your username or password empty!');
		}

	}
	public function logout()
	{
		$this->destroySS();
		$this->redirect('admin/login');
	}
}