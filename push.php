<?
	require_once "common.php";

	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');

	### 배열 변수 ###
	$push_type_Arr = Array("1"=>"개인별","2"=>"패키지별","3"=>"전체");
	
	$userapi->admin_check();
	$doc_name = "push";
	


	require_once _DR . "/adm/_header.php";

	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "list";
	include  "doc/".$doc_name."/".$_REQUEST['doc'].".php";
	
	require_once _DR . "/adm/_footer.php";
?>