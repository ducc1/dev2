<?
	require_once "common.php";


	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');

	### 테이블 ###
	$userapi->admin_check();

	$doc_name = "account";

	### 배열 ###


	//$qa_type_arr = Array("1"=>"고객문의[관리자에게상담]" , "3"=>"상점고객이 관리자에게");
	//$singo_arr = Array("1"=>"광고/홍보성" , "2"=>"욕설/인신공격" , "3"=>"불법정보" , "4"=>"개인정보침해" , "5"=>"음산/선정성" , "6"=>"권리침해신고");
	//$del_Arr = Array("0"=>"정상","1"=>"삭제");

	$shop_state_arr =  Array("0"=>"승인대기","1"=>"정상","2"=>"차단","3"=>"탈퇴" , "4"=>"상점정보입력중", "5"=>"사업자정보입력중");
	$shop_commit_arr = Array("0"=>"승인대기" , "2"=>"차단" , "4"=>"승인");
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

	$shop_cate_arr = Array(
		"write"=>array("샵회원관리"=>array("write","list")),
		"shop_write"=>array("샵(상점)관리"=>array("shop_write","shop_list")),
		"tmoney_list"=>array("판매/정산 내역"=>array("tmoney_list","tmoney_view")),
		"goods_list"=>array("상품정보"=>array("goods_list","goods_write","goods_view")),
		"shop_member_list"=>array("담당자관리"=>array("shop_member_list")),
		"order_list"=>array("결제내역"=>array("order_list","order_view")),
		"tpay_list"=>array("충전/사용내역"=>array("tpay_list")),
		"notice_list"=>array("샵공지사항"=>array("notice_list","notice_view")),
		"img_list"=>array("샵갤러리"=>array("img_list")),
		"qa_list"=>array("상점상담"=>array("qa_list","qa_write")),
		"review_list"=>array("리뷰관리"=>array("review_list","review_write")),
	);

	$singo_arr = Array("1"=>"광고/홍보성" , "2"=>"욕설/인신공격" , "3"=>"불법정보" , "4"=>"개인정보침해" , "5"=>"음산/선정성" , "6"=>"권리침해신고");

	$shop_week_arr = array("0"=>"휴무없음" , "99"=>"매주");
	$shop_yoil_arr = array("0"=>"일","1"=>"월","2"=>"화","3"=>"수","4"=>"목","5"=>"금","6"=>"토");
	
	$order_state = Array("1"=>"결제완료" , "2"=>"취소" , "3"=>"상점측취소" , "4"=>"상점측완료");


	//$shop_cate_arr = array("1"=>array("write"=>array("")),"2"=>array("shop_write"=>"상점정보"),"tmoney_list"=>"판매/정산 내역","goods_list"=>"상품정보","shop_member_list"=>"담당자관리","order_list"=>"결제내역","tpay_list"=>"충전/사용내역","notice_list"=>"샵갤러리","notice_write"=>"샵공지사항");
	$shop_cou_arr = array("1"=>"적용","2"=>"적용안함");
	$shop_24_arr = array("0"=>"없음" , "1"=>"24시간");
	$sho_faq_arr = Array("1"=>"켜짐"  , "2"=>"꺼짐");
	$shop_tmoney_arr = Array("1"=>"처리중", "2"=>"반려" ,"3"=>"입금완료");
	$tpay_type_arr = Array("1"=>"충전","2"=>"사용");
	$tpay_kind_arr = Array("1"=>"전화상담" , "2"=>"1:1문의" , "3"=>"리뷰" , "4"=>"견적");
	$a_no  = $_SESSION['userno'];


	if(!$_REQUEST['f_type']) $_REQUEST['f_type'] = "1";

	require_once _DR . "/adm/_header.php";

	if(!$_REQUEST['doc']) $_REQUEST['doc'] = "list";
	include  "doc/{$doc_name}/".$_REQUEST['doc'].".php";
	
	require_once _DR . "/adm/_footer.php";
?>