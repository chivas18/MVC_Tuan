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
	public function editbyid($user_id)
	{
		$users = $this->user->find(1)->where('id',$user_id)->get();
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
							$this->user->create([
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
								'created_at' =>$_POST['created_at'],
								'url_avatar' => empty($_POST['file']) ? 'https://kenh14cdn.com/2017/1-1506422137960.jpg' : $_POST['file']
							]); 
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
	public function updated()
	{
		$check = true;
		$id = $_POST['id'];
		$password = $_POST['password'];
		if (empty($_POST['display_name'])) {
			$_SESSION['err_message'] = 'Full name is empty!';
			$check = false;
		}
		if (empty($_POST['email'])){
			$_SESSION['err_email'] = 'Email is empty!';
			$check = false;
		}
		if (empty($password) || $password != $_POST['re-password']) {
			$_SESSION['err_password'] = 'Password error!!!';
			$check = false;
		}
		if ($check == true) {
			$password = md5($password);
			$user = $this->user->where('id',$id);

			$user->display_name = $_POST['display_name'];
			$user->email = $_POST['email'];
					//$user->position = $_POST['position'];
			$user->facebook = $_POST['facebook'];
			$user->google = $_POST['google'];
					//$user->twitter = $_POST['twitter'];
			$user->phone = $_POST['phone'];
			$user->description = $_POST['description'];
			$user->updated_at = $_POST['updated_at'];
			$user->save();
			$_SESSION['message'] = 'Update successfully!!!';
			$user = $this->redirect('/users/viewbyid/'.$user->id);
		}else{
			$this->redirect('/users/editbyid/'.$id);
		}
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