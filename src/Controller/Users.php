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
		// var_dump($_FILES);
		// die();
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
								// 'url_avatar' => if(isset($_FILES['avatar'])){
								// 	if ($_FILES['avatar']['error'] > 0) {
								// 		$_SESSION['err_message'] = "File is error!!!";
								// 	} else {
								// 		if (($_FILES['avatar']['type'] != 'jpg') || ($_FILES['avatar']['type'] != 'jpeg') || ($_FILES['avatar']['type'] != 'png') || ($_FILES['avatar']['type'] != 'gif')) {
								// 			$_SESSION['err_message'] = "File is not image!";
								// 		}else{
								// 			if ($_FILES['avatar']['size'] > 1048000) {
								// 				$_SESSION['err_message'] = "File > 1Mb";
								// 			}else{
								// 				echo $_POST['avatar'];
								// 			}
								// 		}
								// 	}
								// }else{
								// 	echo COMMON['base_url'].'/img/users/cakephp.png';
								// }
							]); 
							if ($this->user['url_avatar'] == $_POST['avatar']) {
								move_uploaded_file($_FILES['avatar']['tmp_name'], './public/img/users/'.$_FILES['avatar']['name']);
							}
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
		$password = md5($password);
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
			$display_name = $_POST['display_name'];
			$email = $_POST['email'];
			$facebook = $_POST['facebook'];
			$google = $_POST['google'];
			$phone = $_POST['phone'];
			$description = $_POST['description'];
			$updated_at = $_POST['updated_at'];
			
			$user = $this->user->find($id);

			$user->display_name = $display_name;
			$user->email = $email;
			$user->facebook = $facebook;
			$user->google = $google;
			$user->phone = $phone;
			$user->description = $description;
			$user->updated_at = $updated_at;
			$user->save();
			$_SESSION['message'] = 'Update successfully!!!';
			$user = $this->redirect('/users/viewbyid/'.$id);
			//$user->position = $_POST['position'];
			//$user->twitter = $_POST['twitter'];
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