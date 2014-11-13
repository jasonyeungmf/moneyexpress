<?php
$menu = false;
// we must never forget to start the session
//so config.php works ok without using index.php define browse
define("BROWSE","browse");

	Zend_Session::start();
	Zend_Session::destroy(true);
	header('Location: .');

?>