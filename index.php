<?php
error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING );
ini_set("display_errors", 1);
session_Start();



require_once  "common.php";


if(!$_SESSION['userid']) {
	$doc = "login";
	include  "doc/login/".$doc.".php";
}else{
	
	//header("Location: http://pimang.net/admin/statistic.php?doc=total_log");
	//exit;

	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');

	### 테이블 ###
	$userapi->admin_check();

	$doc_name = "list";	


	require_once _DR . "/adm/_header.php";
	$doc = "list";
	include  "doc/member/".$doc.".php";
	require_once _DR . "/adm/_footer.php";
	
	

}
?>