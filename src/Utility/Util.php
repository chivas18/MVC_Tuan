<?php
/**
* The class container function method using for all project as helper
*/
class Util
{
	
	/**
	* Function load all file in directory
	*/
	public static function includeFiles($path, $ifiles=[]){
    
	    if( !empty($ifiles) ){
	        foreach( $ifiles as $key => $file ){
	            $file  = $path.'/'.$file;
	            if(is_file($file)){
	                require_once($file);
	            }
	        }
	    }else {
	        $files = glob($path);
	        foreach ($files as $key => $file) {
	            if(is_file($file)){
	                require_once($file);
	            }
	        }
	    }
	}
	public static function random5($length = 5){
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			return $randomString;
		}
}