<?
	require_once "common.php";

	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');
	$userapi->admin_check();
	
	
	### 배열 변수 ###
	
	$device_arr  = Array("1"=>"안드로이드","2"=>"IOS");
	$login_arr = Array("1"=>"페이스북","2"=>"카카오","3"=>"이메일");
	$sex_arr = Array("1"=>"남성","2"=>"여성");
	$nation_arr = Array("1"=>"내국인","2"=>"외국인");
	$common_alram_arr = Array("1"=>"수신","2"=>"수신안함");
	$state_arr  = Array("1"=>"정상","2"=>"차단","3"=>"탈퇴");
	$mychk_arr = Array("0"=>"없음", "1"=>"인증");
	$bankcode_arr =  Array(
	"02"=>"산업",
	"03"=>"기업",
	"04"=>"국민",
	"05"=>"외환",
	"07"=>"수협" ,
	"08"=>"수출입" ,
	"10"=>"농협" ,
	"20"=>"우리",
	"21"=>"신한" ,
	"23"=>"SC제일" ,
	"25"=>"하나" ,
	"27"=>"한국씨티", 
	"31"=>"대구" ,
	"32"=>"부산" ,
	"34"=>"광주" ,
	"35"=>"제주" ,
	"37"=>"전북" ,
	"39"=>"경남" ,
	"45"=>"새마을금고" ,
	"48"=>"신협" , 
	"50"=>"상호저축은행" ,
	"54"=>"HSBC" ,
	"71"=>"우체");
	$push_Arr  = Array("Y"=>"수신","N"=>"수신안함");
	$order_state = Array("1"=>"결제완료" , "2"=>"취소" , "3"=>"상점측취소" , "4"=>"상점측완료");
	//$login_Arr  = Array("0"=>"비로그인","1"=>"로그인");
	//$grade_Arr = Array("0"=>"비정상", "1"=>"정상", "2"=>"탈퇴");

	$doc_name = "member";

	require_once _DR . "/adm/_header.php";

	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "list";
	include  "doc/member/".$_REQUEST['doc'].".php";
	
	require_once _DR . "/adm/_footer.php";
?>
