<?php
/**
 * DucPHP : Rapid Development Framework (http://ducpham.com)
 * @copyright     Copyright (c) DucPham Software Foundation, Inc.
 * @author        Mr-DucPham
 * @since         1.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * @package src/Core
 */
class App
{
    protected $controller = "home"; // set default controller is home

    protected $method = "index";

    protected $params = [];

    public function __construct()
    {
    	//call method
        $url = $this->parseUrl();
        //check file exist
        if (file_exists('../src/Controller/' . $url[0] . '.php')) {
        	$this->controller = $url[0];
        	unset($url[0]);
        }
        // else require $controller default above
        require_once '../src/Controller/' . $this->controller . '.php';

        // init object controller use for method_exists() and call_user_func_array()
        $this->controller = new $this->controller;

        //check isset 
        if (isset($url[1])) {
        	if (method_exists($this->controller, $url[1])) {
        		$this->method = $url[1];
        		unset($url[1]);
        	}
        }
        //set param
        $this->params = $url ? array_values($url) : [];
        
        /**
        * @description use function call_user_func_array to callback method in class 
        * @param array
        * @param1 object (is class $this->controller just init oject above)
        * @param2 method
        * @param array list value 
        */
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl(){
    	if (isset($_GET['url'])) {
    		return $url =  explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    	}
    }

}
