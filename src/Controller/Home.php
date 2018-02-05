<?php
/**
* Class Home
*/

class Home extends Controller
{
	public function index()
	{
		$this->view('home/index');
	}
	public function logout()
	{
		$this->destroySS();
		$this->redirect('home/index');
	}
}