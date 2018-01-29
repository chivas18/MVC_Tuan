<?php
/**
 * DucPHP : Rapid Development Framework (http://ducpham.com)
 * @copyright     Copyright (c) DucPham Software Foundation, Inc.
 * @author        Mr-DucPham
 * @since         1.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * @package src/init
 */
// Composer Autoload
require_once '../vendor/autoload.php';

// Load Utility
require_once 'Utility/Util.php';
// Load All file Config 
Util::includeFiles('../config/*.php'); // in here load file database.php

//
require_once 'Core/Cookie.php';
//
require_once 'Core/Session.php';
//
require_once 'Core/App.php';
//
require_once 'Core/BaseModel.php';
//
require_once 'Core/Controller.php';
//
$base_url = COMMON['base_url'];
?>