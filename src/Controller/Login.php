<?php 
	/**
	 * 
	 */
	class Login extends Controller
	{
		protected $User;	
		public function __construct()
		{
			$this->User = $this->model('User');
		}
		public function index()
		{ 
			$this->view('login/index');
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
					$this->setSS($session);
					$this->redirect('users/list');
					
				} else {
					$session = [
						'user' => false,
						'message' => 'Your username or password is incorected!'
					];
					$this->setSS($session);
					$this->redirect('login');
					
				}
				
			} else {
				$session = [
					'message' =>'Your username or password empty!'
				];
				$this->setSS($session);
				$this->redirect('login');
			}

		}
	}
	?>