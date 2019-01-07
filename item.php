<?
	require_once "common.php";

	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');
	$userapi->admin_check();
	### 배열 변수 ###
	
	$item_state_Arr  = Array("0"=>"미지급","1"=>"지급완료");
	//$push_Arr  = Array("Y"=>"수신","N"=>"수신안함");
	//$login_Arr  = Array("0"=>"비로그인","1"=>"로그인");
	//$grade_Arr = Array("0"=>"비정상", "1"=>"정상", "2"=>"탈퇴");

	$doc_name = "item";

	require_once _DR . "/adm/_header.php";

	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "list";
	include  "doc/$doc_name/".$_REQUEST['doc'].".php";
	
	require_once _DR . "/adm/_footer.php";
?>