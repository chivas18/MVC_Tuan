<?php
/**
 * DucPHP : Rapid Development Framework (http://ducpham.com)
 * @copyright     Copyright (c) DucPham Software Foundation, Inc.
 * @author        Mr-DucPham
 * @since         1.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * @package config/database
 */

date_default_timezone_set('Asia/Ho_Chi_Minh');
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule();
// Init Connection
$capsule->addConnection([
	'driver'=> 'mysql',
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'newspage',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'=> ''
]); 
// Load Eloquent
$capsule->bootEloquent();