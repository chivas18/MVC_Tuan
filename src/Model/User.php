<?php
/**
 * DucPHP : Rapid Development Framework (http://ducpham.com)
 * @copyright     Copyright (c) DucPham Software Foundation, Inc.
 * @author        Mr-DucPham
 * @since         1.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * @package src/Model
 */
/**
/**
* Class User Model
*/
class User extends BaseModel
{
	protected $table = 'users';
	protected $fillable = ['id','username','password','email','display_name','position','status','facebook','google','twitter','phone','description','url_avatar','created_at,updated_at'];

	public static function checkLogin($username,$password)
	{
		$user = User::find(1)->where('username',$username)->where('password',$password)->get()->toarray(); 
		
		if (!empty($user)) {
			return $user;
		} else {
			return false;
		}
		
	}
	public static function checkUsername($username)
	{
		$user = User::find(1)->where('username',$username)->get()->toarray(); 
		
		if (!empty($user)) {
			return $user;
		} else {
			return false;
		}
		
	}
}