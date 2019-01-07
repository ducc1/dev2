<?
	require_once "common.php";


	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');

	### 테이블 ###
	if ($_GET['doc']!='c_data') {
		$userapi->admin_check();
	}

	$doc_name = "board";

	### 배열 ###

	$app_type_arr  = Array("1"=>"유저앱", "2"=>"샵앱");

	$del_Arr = Array("0"=>"정상","1"=>"삭제");
	$a_no  = $_SESSION['userno'];

	if ($_GET['doc']!='c_data') { 
		require_once _DR . "/adm/_header.php";
	}
	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "list";
	include  "doc/board/".$_REQUEST['doc'].".php";
	
	if ($_GET['doc']!='c_data') { 
		require_once _DR . "/adm/_footer.php";
	}
?>