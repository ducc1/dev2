<!DOCTYPE html>
<html lang="ko">
<head>
<title>::::: 관리자 :::::</title>
<meta name="description" content="multiple level dropdown menu for website" />
<meta charset="utf-8">
<!--Meta Tag-->
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="True">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--Meta Tag-->
<script src="/adm/html/js/jquery-1.10.2.min.js"></script>
<!--<script type="text/javascript" src="/adm/html/js/jquery.min.js"></script>-->
<script  src="/cgi/html/js/jquery-migrate-1.3.0.js"></script>

<!--Bootstrap-->
<link rel="stylesheet" href="/cgi/html/bootstrap/css/bootstrap.min.css" />
<script type="text/javascript" src="/cgi/html/bootstrap/js/bootstrap.min.js"></script>
<!--Bootstrap-->
<!--Bootstrap tagsinput-->
<link rel="stylesheet" href="/cgi/html/css/bootstrap-tagsinput.css" />
<script type="text/javascript" src="/cgi/html/js/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="/cgi/html/js/typeahead.bundle.js"></script>
<!--Bootstrap tagsinput-->

<!--Main Menu File-->
<link rel="stylesheet" type="text/css" media="all" href="/adm/html/css/color-theme.css" />
<link rel="stylesheet" type="text/css" media="all" href="/adm/html/css/webslidemenu.css" />

<script type="text/javascript" src="/adm/html/js/webslidemenu.js"></script>
<!--Main Menu File-->

<!-- font awesome -->
<link rel="stylesheet" href="/cgi/html/Font-Awesome/css/font-awesome.min.css" />
<!-- font awesome -->
<!--For Demo Only (Remove below css file and Javascript) -->
<link rel="stylesheet" type="text/css" media="all" href="/adm/html/css/demo.css" />
<script src="/adm/html/js/jquery.popupoverlay.js"></script>
<script type='text/javascript'>
$(document).ready(function() {
	/*$(".wsmenu")
            .removeClass().addClass('wsmenu pm_buttoncolor gry-grdt');*/

    $(".gry, .blue, .green, .red, .orange, .yellow, .purple, .pink, .whitebg, .tranbg").bind("click", function() {
        $(".wsmenu")
            .removeClass()
            .addClass('wsmenu pm_' + $(this).attr('class') );       
    });
	
	$(".blue-grdt, .gry-grdt, .green-grdt, .red-grdt, .orange-grdt, .yellow-grdt, .purple-grdt, .pink-grdt").bind("click", function() {
        $(".wsmenu")
            .removeClass()
            .addClass('wsmenu pm_' + $(this).attr('class') );       
    });

	$(".gry-grdt").trigger("click");
});

jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();
</script>
<!--For Demo Only (End Removable) -->
<style>
.table .first_td {


	background-color:#5d5d5d;
	color :  #fff !important;
	color:#fff;
	font-size:11pt;

}

.table .text_center td{
	text-align:center;
}

.table-hover {

}
</style>
</head>
<body>
<div class="wsmenucontainer clearfix">
<div class="wsmenucontent overlapblackbg"></div>
  <div class="wsmenuexpandermain slideRight">
  <a id="navToggle" class="animated-arrow slideLeft"><span></span></a>
  <a class="callusicon" href="tel:123456789"><span class="fa fa-phone"></span></a>
  </div>

  <div class="header">
  <div style="float:right;margin-right:10px;"></div>
  <div class="wrapper clearfix">
  <div class="logo clearfix"></div>

  <!--Main Menu HTML Code-->
      <nav class="wsmenu slideLeft clearfix">
                    <ul class="mobile-sub wsmenu-list">
					 <li><a href="/adm" class="active"><i class="fa fa-home"></i><span class="hometext">&nbsp;&nbsp;Home</span></a></li>
					<?php
					foreach($admin_menu_arr as $m_key=>$m_val){
						echo "<li>";
						if(is_array($m_val)){
							
							foreach($m_val as $m_key2=>$m_val2){
						
								if($m_key == $doc_name){
									$atvie_class = "sb-submenu-active";
									$display = "block;";
									$css = "color:#49AEF2;border-left:3px solid #49AEF2;";
								}else{
									$atvie_class = "";
									$display = "none;";
									$css = "";
								}
								if(!is_array($m_val2)){
								echo "<a href=\"".$m_key.".php?doc=".$m_val2."\"><i class=\"fa fa-align-justify\"></i>&nbsp;".$m_key2."</a>";	
								}else{
								echo "<a href=\"javascript:void(0);\"><i class=\"fa fa-align-justify\"></i>&nbsp;".$m_key2."</a>";
								}
								if(is_array($m_val2)){
									echo "  <ul class=\"wsmenu-submenu\">";
									foreach($m_val2 as $m_key3=>$m_val3){
										
										if($_REQUEST['doc'] == $m_key3 && $m_key == $doc_name) $css2 = "color:#49AEF2;";
										else $css2 = "";

										echo "<li><a href=\"".$m_key.".php?doc=".$m_key3."\" style=\"{$css2}\">".$m_val3."</a></li>";
									}
									echo "</ul>";
								}
							}
						}
						echo "</li>";
					}

					?>
					<li><a href="/adm/doc/login/logout.php"><i class="fa fa-user-times" aria-hidden="true"></i>로그아웃</a></li>
                    </ul>
                  </nav>
  <!--Menu HTML Code--> 
  
	</div>
</div>

<div class="wrapper">
<br>
	


		
           

		