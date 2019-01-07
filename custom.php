<?
	require_once "common.php";


	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');

	### 테이블 ###
	$userapi->admin_check();

	$doc_name = "custom";

	### 배열 ###

	$qa_type_arr = Array("1"=>"고객문의[관리자에게상담]" , "3"=>"상점고객이 관리자에게");
	$singo_arr = Array("1"=>"광고/홍보성" , "2"=>"욕설/인신공격" , "3"=>"불법정보" , "4"=>"개인정보침해" , "5"=>"음산/선정성" , "6"=>"권리침해신고");
	$del_Arr = Array("0"=>"정상","1"=>"삭제");
	$a_no  = $_SESSION['userno'];


	if(!$_REQUEST['f_type']) $_REQUEST['f_type'] = "1";

	require_once _DR . "/adm/_header.php";

	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "list";
	include  "doc/{$doc_name}/".$_REQUEST['doc'].".php";
	
	require_once _DR . "/adm/_footer.php";
?>