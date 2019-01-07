<?PHP
	require_once  "common.php";

	$menu_manage_arr  =  array("manage"=>"관리자관리","member"=>"사용자관리","sub"=>"서브메뉴", "search"=>"검색어관리","category"=>"카테고리","vhost"=>"가상호스트 관리","push"=>"PUSH관리","banner"=>"공용배너관리","statistic"=>"접속통계","board"=>"게시판관리","contents"=>"컨텐츠관리");


	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');
	$userapi->admin_check();
	### 테이블 ###

	$manage_table = "admin_manage";
	$member_table = "member";

	$doc_name = "manage";


	require_once _DR . "/adm/_header.php";

	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "list";
	include  "doc/manage/".$_REQUEST['doc'].".php";
	
	require_once _DR . "/adm/_footer.php";
?>