<?
	require_once "common.php";


	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');

	### 테이블 ###
	$userapi->admin_check();

	$doc_name = "statistic";

	$del_Arr = Array("0"=>"정상","1"=>"삭제");


	require_once _DR . "/adm/_header.php";

	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "qna_list";
	include  "doc/statistic/".$_REQUEST['doc'].".php";
	
	require_once _DR . "/adm/_footer.php";
?>