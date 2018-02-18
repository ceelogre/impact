<?php
require_once'./Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_loader_Filesystem('./temp');
$twig=new Twig_Environment($loader);

define('DB_HOST', 'localhost');
define("DB_NAME", 'bitimpact');
define("DB_PORT", 3306);
define("DB_USER", "root");
define("DB_PWORD", "");

$mysqli= mysqli_connect(DB_HOST,DB_USER,DB_PWORD,DB_NAME);
		if(mysqli_connect_errno()){
		print("Connection failed: %s\n".
		mysqli_connect_errors());
		exit();
		}
$template=$twig->loadTemplate('donate.html');
$param = array('donate'=>$mydataset);

$template->display($param);


?>