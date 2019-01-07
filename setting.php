<?PHP
	require_once  "common.php";
	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');
	$userapi->admin_check();
	### 테이블 ###



	$doc_name = "setting";
	


	require_once _DR . "/adm/_header.php";

	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "list";

	//echo "doc/{$doc_name}/".$_REQUEST['doc'].".php";

	include  "doc/{$doc_name}/".$_REQUEST['doc'].".php";
		
	require_once _DR . "/adm/_footer.php";

	//echo $doc_name;
?>