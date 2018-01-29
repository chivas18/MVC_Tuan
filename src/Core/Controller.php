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
		//include file view
		require_once '../src/Views/' .$view. '.php';
	}

	/**
	* 
	*/
	public function redirect($link)
	{
		header('location: '.COMMON['base_url'].'/'.$link);
	}
}