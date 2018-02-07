<?php
class Controller extends Session
{
	/**
	* Call Model
	*/
	public function model($model='')
	{
		//include file model
		require_once '../src/Model/' .$model. '.php';
		// Init class model
		return new $model();
	}

	/**
	* Call Views
	*/
	public function view($view='', $data = [])
	{	
		//extract array to var
		extract($data);
		$user = explode('/',$view);
		// echo '<pre>';
		// print_r($user);
		// echo '</pre>';
		// die('test'); 
		//include file view
		require_once '../src/Views/'.$user[0].'/'.$user[1].'.php';
	}

	/**
	* 
	*/
	public function redirect($link)
	{
		header('location: '.COMMON['base_url'].'/'.$link);
	}
}