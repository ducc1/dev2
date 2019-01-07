	<div class="moreoption clearfix" style="display:none;">
				
		<div class="colorlink01 clearfix">
		<div class="boxheader">Gradient Colors</div>
		<a class="buttoncolor gry-grdt" href="#" onClick=' $(".wsmenu").removeClass().addClass("wsmenu pm_buttoncolor gry-grdt")'></a>
		<a class="buttoncolor red-grdt" href="#"></a>
		<a class="buttoncolor orange-grdt" href="#"></a>            
		<a class="buttoncolor blue-grdt" href="#"></a>
		<a class="buttoncolor green-grdt" href="#"></a>
		<a class="buttoncolor yellow-grdt" href="#"></a>
		<a class="buttoncolor purple-grdt" href="#"></a>
		<a class="buttoncolor pink-grdt" href="#"></a>
		</div>
		
		<div class="colorlink02 clearfix">
		<div class="boxheader">Solid Colors</div>
		<a class="buttoncolor gry" href="#"></a>
		<a class="buttoncolor red" href="#"></a>
		<a class="buttoncolor orange" href="#"></a>
		<a class="buttoncolor blue" href="#"></a>
		<a class="buttoncolor green" href="#"></a>
		<a class="buttoncolor yellow" href="#"></a>
		<a class="buttoncolor purple" href="#"></a>
		<a class="buttoncolor pink" href="#"></a>
		</div>
		
		<div class="colorlink03 clearfix">
		<div class="boxheader">White & Transpant</div>
		<a class="buttoncolor02 whitebg"></a>
		<a class="buttoncolor02 tranbg"></a>
		</div>
				
	</div>
</div>



	<!-- shop --->
		<style>
		.shop_list{
			width:500px;
			border:1px solid #5d5d5d;
			display:none;
			background:#fff;
		}

		.shop_ajax_pageing{clear:both; line-height:normal;text-align:center;background:#fff;padding:20px 0}
		.shop_ajax_pageing a,
		.shop_ajax_pageing strong{display:inline-block;position:relative;z-index:2;margin:0 -3px;padding:1px 8px;border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5; color:#333;text-decoration:none;vertical-align:middle; background-color:#fff}
		.shop_ajax_pageing a:hover,
		.shop_ajax_pageing a:active,
		.shop_ajax_pageing a:focus{background-color:#f8f8f8; color:#f05523}
		.shop_ajax_pageing strong{color:#f05523; font-weight:normal}
		.shop_ajax_pageing .direction{border:0;font-weight:normal;color:#767676;text-decoration:none !important;z-index:1; padding:0 5px 0 5px}
		.shop_ajax_pageing .direction:hover,
		.shop_ajax_pageing .direction:active,
		.shop_ajax_pageing .direction:focus{color:#323232;background-color:#fff}
		.shop_ajax_pageing .prev{border-left:0}
		.shop_ajax_pageing .next{border-right:0}
		.shop_ajax_pageing .direction span{display:inline-block; position:relative; vertical-align:top}
		.shop_ajax_pageing .prev span.first{ padding:0 5px 0 5px !important; border-right:1px solid #d6d6d6}
		.shop_ajax_pageing .prev span.prev{ padding:0 5px 0 5px; color:#222}
		.shop_ajax_pageing .next span.next{ padding:0 5px 0 5px; color:#222}
		.shop_ajax_pageing .next span.last{ padding:0 5px 0 5px !important; border-left:1px solid #d6d6d6}	

		</style>
		<div class="shop_list">
			<div style="line-height:40px;background:#5d5d5d;color:#fff;text-align:center">상점선택</div>
			<div>
				<div class="container-fluid">
				  <form name="shopForm" method="post" action="<?=$_SERVER[PHP_SELF]?>" onSubMit="return  SearchForm();" class="form-inline">
				  <input type="hidden" name="t_no_match" value="Y">
				 <div style="text-align:right;width:100%;float:left;padding:5px;">
				 <div class="form-inline">
				 <div class="form-group">
				 <select name="shop_sc_no" class="form-control" >
				<option value="">카테고리선택</option>
				<?
				$c_qry = "SELECT * FROM {$db[table][shop_cate]} ORDER BY sc_order ASC";
				$c_data = $dbapi->DataArray($c_qry);
				

				foreach($c_data as $c_val){	

					if(strlen($c_val['sc_no']) ==  4){
					
						
						echo  "<option value='".$c_val['sc_no']."' >".$c_val['sc_name']."</option>";
					}
				}
				?>
				</select>
				</div>
				 <div class="form-group">
				  <!--<div style="text-align:right;">-->
					<select class="form-control"  name="shop_search">
						<option value="">선택</option>
						<?php
						  $ArrSearch = Array("s_name"=>"상호명","s_area_name"=>"지점명");
						  foreach($ArrSearch as $k=>$v){
							if($k == $_REQUEST['search']) $sel = "selected";
							else $sel = "";
							echo "<option value=".$k." $sel>".$v."</option>";
						  }
						  isset($k);

						?>  
						</select>	
						</div>
						 <div class="form-group">
					  <input class="form-control" name="shop_keyword" type="text" value="<?=urldecode($_REQUEST['keyword'])?>">
					  <button class="btn btn-primary shop_search_btn btm-sm" type="button">검색</button>
					  </div>
					  </div>
				  </div>
				  </form>
				</div>
			</div>
			<div class="shop_ajax_list"></div>
			<div class="shop_ajax_pageing"></div>
			<div >
		</div>
		<!-- shop --->


<script>

var sc_change_val = false;

$(document).on("change","select[name=shop_sc_no]",function(){
	sc_change_val = true;
});

$(document).on("change","select[name=t_state]",function(){
	//alert('aaa');
	if($(this).val() == 4){		
		$(".shop_search_btn").show();
	}else{
		$(".shop_search_btn").hide();
	}
	$("input[name=change_f_state]").val($(this).val());
});


$(document).on("click",".shop_search_btn",function(){
	
	if(typeof($("select[name=sc_no]").val()) != "undefined"){
		//$("input[name=state_change_num]").val("<?=$val[t_state]?>");
		if(!sc_change_val) $("select[name=shop_sc_no]").val($("select[name=sc_no]").val()).prop("selected",true);
	}

	$(".shop_list").popup('show');
	$.get_shop_list();
});

if(window.location.href.indexOf("#p^") != -1){
	var hrefSplit = window.location.href.split("#p^");
	var page = hrefSplit[1];
}else{
	var page = "1";
}
var total_cnt = "0";
var max_page = "0";
var loading = "N";
var gubun = 1;


$.get_shop_list = function(){
	var sc_no = $("select[name=shop_sc_no]").val();
	var shop_search = $("select[name=shop_search]").val();
	var shop_keyword = $("input[name=shop_keyword]").val();
	var t_no_match = $("input[name=t_no_match]").val()
	var sendData = "page="+page+"&shop_sc_no="+sc_no+"&shop_search="+shop_search+"&shop_keyword="+shop_keyword+"&t_no_match="+t_no_match;
	//alert(sendData);
	div_load = "Y";
	$.ajax({
		url:"/adm/getShopList.php",
		cache:true,
		dataType:"json",
		type:"POST",
		data:sendData,
		timeout:0,
		error:function(request, status, error){
			loading = "N";
			//etTimeout("$.get_shop_list()", 3000);
		},
		success:function(ob){
			//alert('adsfasfasd');
			//return;
			$.put_shop_html(ob);
		},
		beforeSend:function(){
			loading = "Y";
		},
		complete:function(){
		}
	});
}

$.put_shop_html = function(json){
	max_page = json.total_page;
	if(json.total > 0) {
		$(".shop_list .shop_ajax_list").html(json.contents_list);
		
		$(".shop_list").popup('show');
		
	}else{
		$(".shop_list .shop_ajax_list").css({"text-align":"center" , "font-size":"12pt" , "line-height":"50px"}).html("샵정보가 없습니다.");
		$(".shop_list .shop_ajax_pageing").html("");
		//alert("");	
	}
	//$.mobilePageTop();
	loading = "N";
};
$.NextPage = function(){
	page *= 1;
	if(max_page <= page){
		alert("마지막 페이지 입니다");
		return;
	}else{
		page = page + 1;
		location.href="#p^"+page;
		$.get_shop_list();
	}
}
$.PrevPage = function(){
	if(page > 1){
		page *= 1;
		page = page - 1;
		location.href="#c^"+page;
		$.get_shop_list();
	}else{
		alert("첫 페이지 입니다");
		return;
	}
}

$.Page = function(thiss){

	page  = $(thiss).attr("page");
	location.href="#p^"+page;
	$.get_shop_list();
};
</script>


<script src="/html/bootstrap/js/bootstrap.min.js"></script>
</div>

<!-- 모달팝업 영역 -->
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
        <!-- remote ajax call이 되는영역 -->
    </div>
  </div>
</div>

</body>
</html>
