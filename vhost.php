<?
	require_once "common.php";

	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');
	$userapi->admin_check();
	### 배열 변수 ###

	$state_Arr  = Array("0"=>"정상","1"=>"비정상");
	//$login_Arr  = Array("0"=>"비로그인","1"=>"로그인");
	//$grade_Arr = Array("0"=>"비정상", "1"=>"정상", "2"=>"탈퇴");

	$doc_name = "vhost";

	require_once _DR . "/adm/_header.php";

	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "list";
	include  "doc/vhost/".$_REQUEST['doc'].".php";
	
	require_once _DR . "/adm/_footer.php";
?>