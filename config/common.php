<?php 
define("COMMON", [
	'test'=> 'abc',
	'base_url'=> base_url(),
]);

/**
* func get base_url
*/
function base_url(){
  return sprintf(
    "%s://%s/%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    'MVC_Tuan'
  );
}
?>