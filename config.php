<?php 

session_start();

define('BURL','http://onlineservice.local/');
define('BURLA','http://onlineservice.local/admin/');
define('ASSETS','http://onlineservice.local/assets/');

define('BL',__DIR__ . '/');
define('BLA',__DIR__ . '/admin/');

require_once(BL.'functions/db.php');