<?php
/**
* Class User
*/

class Users extends Controller
{
	protected $user;

	public function __construct()
	{
		$this->user = $this->model('User');
	}

	public function index()
	{ 
		$users = $this->user->find(1)->get();
		$this->view('users/list',['users'=> $users]);
		return;
	}

	/**
	* Example for create user use Modle User 
	*/
	public function viewbyid($user_id)
	{
		$users = $this->user->find(1)->where('id',$user_id)->get(); 
		//return view
		$this->view('users/viewbyid',array( 'users'=> $users));
		return;
	}


	/**
	* Example for create user use Modle User 
	*/
	public function edit($user_id)
	{
		$users = $this->user->find()->where('id',$user_id)->get();
		//return view
		$this->view('users/edit',array( 'users'=> $users));
	}



	/**
	* Example for create user use Modle User 
	* @method POST
	*/
	public function add()
	{
		$this->view('users/add');
	}

	/**
	* Example for create user use Modle User 
	* @method POST
	*/
	public function create()
	{     

		if (isset($_POST['username']) && !empty($_POST['username'])) {
			$_SESSION['username'] = $_POST['username'];

			if (isset($_POST['password']) && isset($_POST['re-password']) && !empty($_POST['password']) && !empty($_POST['re-password'])) {

				if ($_POST['password'] == $_POST['re-password']) {

					if (isset($_POST['fullname']) && !empty($_POST['fullname'])) {
						$_SESSION['fullname'] = $_POST['fullname'];

						if (isset($_POST['email']) && !empty($_POST['email'])){
							$Password = $_POST['password'];
							$data = [
								'username' => $_POST['username'],
								'password' => md5($Password),
								'display_name' => $_POST['fullname'],
								'email' => $_POST['email'],
								'position' => $_POST['position'],
								'facebook' => $_POST['facebook'],
								'google' => $_POST['google'],
								'twitter' => $_POST['twitter'],
								'phone' => $_POST['phone'],
								'description' => $_POST['description'],
								'url_avatar' => empty($_POST['file']) ? 'https://kenh14cdn.com/2017/1-1506422137960.jpg' : $_POST['file']
							]; 
							$insert = $this->user->insert($data);
								$_SESSION['message'] = 'Successfully!!!';
								$this->redirect('users');
						} else {
							$_SESSION['err_message'] = 'Email is empty!';

							$this->view('users/add');
						}
						
					} else {
						$_SESSION['err_message'] = 'Full name is empty!';
						$this->view('users/add');
					}
				}else{
					$_SESSION['err_message'] = 'Password and Re-Password not equal!';
					$this->view('users/add');
				}
			} else {
				$_SESSION['err_message'] = 'Password or Re-Password is empty!';				
				$this->view('users/add');
			}
		} else {
			$_SESSION['err_message'] = 'User name is empty!';
			$this->view('users/add');
		}
		
	}


	/**
	* Example for create user use Modle User 
	* @method POST
	*/
	public function update()
	{
		$user_id = $_POST['user_id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		//thiss
		$user = $this->user->where('id',$user_id);

		$user->username = $username;
		$user->password = $password;
		$user->email = $email;
		$user->save();
	}

	/**
	* Example for create user use Modle User 
	* @method POST
	*/
	public function delete($user_id)
	{
		//thiss
		$user = $this->user->where('id',$user_id);
		$user->delete();
		$this->redirect('users/list');
	}
}