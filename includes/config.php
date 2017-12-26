<?php 
	ini_set('display_errors',1); 
	// Set 0 in production
 	error_reporting(E_ALL);
	
	define("DS", DIRECTORY_SEPARATOR);
    define('ROOT', __DIR__.'/');
	define("SITE_PATH","/ausuk/");



	function redirectTo($url){
		if (!headers_sent())
		{
			header('location:'.$url);
			exit;
		}else{
			print '<script type="text/javascript">';
			print 'window.location.href="'.$url.'";';
			print '</script>';

			print '<noscript>';
			print '<meta http-equiv="refresh" content="0;url='.$url.'" />';
			print '</noscript>'; exit;
		}
	}
	