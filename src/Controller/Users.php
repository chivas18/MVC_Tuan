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
		//Lấy đuôi file và đổi thành chữ thường
		$i = strstr($_FILES['avatar']['name'],'.');
		$i = strtolower($i);
		//Lấy ngày hiện tại và ghép thêm 5 kí tự
		//$f = date('Ymd');
		//$f = $_POST['username'].$f.Util::random5();
		//Đổi tên file
		$str = preg_replace('([^a-z0-9])', '', $_POST['username']);
		if ($_FILES['avatar']['name'] != NULL) {
			$imgName = $_FILES['avatar']['name'] = $str.date('Ymd').$i;
		}
		if (isset($_POST['username']) && !empty($_POST['username'])) {
			if ($str === $_POST['username']) {
				$username = User::checkUsername($_POST['username']);
				if (!$username) {
					$_SESSION['username'] = $_POST['username'];
					if (isset($_POST['password']) && isset($_POST['re-password']) && !empty($_POST['password']) && !empty($_POST['re-password'])) {
						if ($_POST['password'] == $_POST['re-password']) {
							if (isset($_POST['display_name']) && !empty($_POST['display_name'])) {
								if (isset($_POST['email']) && !empty($_POST['email'])){
									$Password = $_POST['password'];
									if ($_FILES['avatar']['name'] != NULL) {
										if ($i == "jpeg" || $i == "png" || $i == "gif" || $i == "jpg") {
											$maxFileSize = 2 * 1000 * 1000;
											if ($_FILES['avatar']['size'] > $maxFileSize) {
												echo 'Tập tin không được vượt quá: '.$maxFileSize.' Byte';
											} else {
												$tmp_name = $_FILES['avatar']['tmp_name'];
												move_uploaded_file($tmp_name,PUBLICS.'uploads/users/'.$imgName);
											}
											
										} else {
											echo 'File is an image!';
										}
										
									} else {
										echo 'Please select file!';
									}
									$url_avatar = PUBLICS.'uploads/users/'.$imgName;
									$this->user->create([
										'username' => strtolower(stripslashes(trim($_POST['username']))),
										'password' => md5($Password),
										'display_name' => $_POST['display_name'],
										'email' => $_POST['email'],
										'position' => $_POST['position'],
										'facebook' => $_POST['facebook'],
										'google' => $_POST['google'],
										'twitter' => $_POST['twitter'],
										'phone' => $_POST['phone'],
										'description' => $_POST['description'],	
										'url_avatar' => $url_avatar							
									]); 
									$_SESSION['message'] = 'Successfully!!!';
									$this->redirect('users');
								} else {
									$this->redirect('users/add?username='.$_POST['username'].'&display_name='.$_POST['display_name'].'&err_message=Email is empty!');
								}
							} else {
								$this->redirect('users/add?username='.$_POST['username'].'&err_message=Full name is empty!');
							}
						}else{
							$this->redirect('users/add?username='.$_POST['username'].'&err_message=Password and Re-Password not equal!');
						}
					} else {
						$this->redirect('users/add?username='.$_POST['username'].'&err_message=Password or Re-Password is empty!');			
					}
				} else {	
					$this->redirect('users/add?username='.$_POST['username'].'&err_message=User name đã tồn tại!');			
				}
			} else {
				$this->redirect('users/add?username='.$_POST['username'].'&err_message=User name incorrected!');		
			}
		} else {
			$this->redirect('users/add?username='.$_POST['username'].'&err_message=User name is empty!');	
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
			
			$user = $this->user->find($id);

			$user->display_name = $_POST['display_name'];
			$user->email = $_POST['email'];
			$user->facebook = $_POST['facebook'];
			$user->google = $_POST['google'];
			$user->phone = $_POST['phone'];
			$user->description = $_POST['description'];
			$user->updated_at = $_POST['updated_at'];
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