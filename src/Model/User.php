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
	public $name;
	protected $table = 'users';
	protected $fillable = ['id','username','password','email','display_name','position','status','facebook','google','twitter','phone','description','url_avatar'];

	public static function checkLogin($username,$password)
	{
		$user = User::find(1)->where('username',$username)->where('password',$password)->get()->toarray(); 
		
		if (!empty($user)) {
			return $user;
		} else {
			return false;
		}
		
	}

	public static function insert(array $value)
	{
		$insert = User::create($value);
		
	}

	public static function paging()
	{
		$list = DB::table('users')->paginate(10);
	}
}