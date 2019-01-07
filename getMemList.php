<?
	require_once "./common.php";

	//print_R($_FILES);
	//exit;

	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');

	$userapi->admin_check();

	$result = array(); 
	$act = $_POST['act'];


	function get_datetime($date, $type='m.d') {

				$diff = time() - $date;

				$s = 60; //1분 = 60초
				$h = $s * 60; //1시간 = 60분
				$d = $h * 24; //1일 = 24시간
				$y = $d * 10; //1년 = 1일 * 10일

				if ($diff < $s) {
					$time = $diff."초전";
				} else if ($h > $diff && $diff >= $s) {
					$time = round($diff/$s)."분전";
				} else if ($d > $diff && $diff >= $h) {
					$time = round($diff/$h)."시간전";
				} else if ($y > $diff && $diff >= $d) {
					$time = round($diff/$d)."일전";
				} else {
					$time = date($type, $date);
				} 

				return $time;
	}

	
	
	$page = $_REQUEST['page'] == "" ? "1" : $_REQUEST['page'];
	$where  =  " WHERE 1=1";
	
	$follow_page  = "";

	
	if($_POST['shop_sc_no']){
		$where .= " AND sc_no='".$_POST['shop_sc_no']."'";
		$follow_page .= "&shop_sc_no=".$_POST['shop_sc_no'];
	}
	if($_POST['mem_search']){
		$where .= " AND {$_POST[mem_search]} like '%".$_POST['mem_keyword']."%'";
		$follow_page .= "&mem_search=".$_POST['mem_search']."&mem_keyword=".$POST['mem_keyword'];
	}
	
	
	//$where = " WHERE 1=1 ";
	if($searchvolume != ""){
		/*
		switch($searchtype){
			case "t1.title":
				$sqlWhere .= " and t1.contents_title like '%".$searchvolume."%' ";
				break;
			default:
				$sqlWhere .= " and ".$searchtype." = '".$searchvolume."' ";
				break;
		}
		*/
	}
	
	//$res["sql"] = $sqlWhere;
	
	$limit_end		= "10";
	$limit_start	= ($page-1) * $limit_end;
	$orderby		= " order by sm_no desc";
	$limitis			= " LIMIT ".$limit_start.", ".$limit_end;

	//if($_SERVER[REMOTE_ADDR] == "218.54.201.133"){
	
	
	$sql = "select count(sm_no) as total from {$db[table][shop_member]} " .$where;
	//echo $sql."<br>";
	$query = $dbapi->dbQuery($sql);	
	$data = $dbapi->dbFetchRow($query);
	
	$res["total"] = $data["total"];
	$res["total_page"] = ceil($res["total"] / $limit_end);
	$res["listNum"] = $res["total"] - ($page - 1) * $limit_end;
	$res["contents_list"] = "";

	$start = $userapi->getStart($res["total"],  $page, $limit_end);
	$num = $userapi->num;

	if($res["total"] > 0){

		$sql = "SELECT * FROM {$db[table][shop_member]} ".$where.$orderby.$limitis;
		//echo $sql;
		$query = $dbapi->dbQuery($sql);
		while($data = $dbapi->dbFetchRow($query)) $list[] = $data;

			
			


			$res['contents_list']  = "<table style=\"width:100%;background:#fff;\">".PHP_EOL;
			$res['contents_list']  .= "<colgroup>".PHP_EOL;
			//$res['contents_list']  .= "<col width=\"\" />".PHP_EOL;
			//$res['contents_list']  .= "<col width=\"\" />".PHP_EOL;
			//$res['contents_list']  .= "<col width=\"\" />".PHP_EOL;
			//$res['contents_list']  .= "<col width=\"\" />".PHP_EOL;
			//$res['contents_list']  .= "<col width=\"\" />".PHP_EOL;
			//$res['contents_list']  .= "</colgroup>".PHP_EOL;
			$res['contents_list']  .= "<thead>".PHP_EOL;
			$res['contents_list']  .= "<tr style=\"backgroun:#000;\">".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">&nbsp;</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">프로필사진</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">담당자</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">직급</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">경력</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">전문분야</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">색상코드</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">휴무</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">휴일</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">좋아요</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">등록일</th>".PHP_EOL;
		
			$res['contents_list']  .= "</tr>".PHP_EOL;
			$res['contents_list']  .= "</thead>".PHP_EOL;
			$res['contents_list']  .= "<tbody>".PHP_EOL;
			
			$day_holi_arr = Array("0"=>"일","1"=>"월","2"=>"화","3"=>"수","4"=>"목","5"=>"금","6"=>"토");
			$week_holi_arr = Array("99"=>"매주" ,"1"=>"1주 ","2"=>"2주" , "3"=>"3주" , "4"=>"4주");
			$sm_img_url = "";
			for($i=0;$i<count($list);$i++){
				
					if($list[$i]['sm_profile']){
						$sm_img_url = $userapi->getImgUrl('profile', $list[$i]['sm_profile']);

						if($sm_img_url) {
							$sm_img = "<img src='".$sm_img_url."' width='50px'>";
						}else{
							$sm_img = "";
						}
					}

					if($list[$i]['sm_holi']){
						$dd = explode("," ,$list[$i]['sm_holi']);
						$yoil = "";
						foreach($day_holi_arr as $kk=>$vv){
							for($c=0; $c<count($dd); $c++){
								if($kk == $dd[$c]) $yoil .= $vv . ",";

							}
						}

						$yoil = substr($yoil , 0, -1);
					}
					
					$res["contents_list"] .= "<tr>";
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\"><input type='checkbox' name=chk[] value='".$list[$i]['sm_no']."' class='chk' sm_name='".$list[$i]['sm_name']."'></td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$sm_img."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$list[$i]['sm_name']."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$list[$i]['sm_grade']."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$list[$i]['sm_career']."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$list[$i]['sm_major']."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\"><div style='width:100%;height:50px;background:#".$list[$i]['sm_color']."'></div></td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$week_holi_arr[$list[$i]['sm_holi_chk']]."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$yoil."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".Number_Format($list[$i]['sm_like'])."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$list[$i]['sm_regdate']."</td>".PHP_EOL;
					$res["contents_list"] .= "</tr>".PHP_EOL; 
					$res["contents_list"] .="<tr><td height=1 bgcolor=#cccccc colspan=11></td></tr>";
				$num--;
			}
			
			$res['contents_list']  .= "</tbody>".PHP_EOL;
			$res['contents_list']  .= "</table>".PHP_EOL;
		
			$res["page_text"] = $userapi->mainPageNav2_2($limit_end);

		
	}else{
		$res["contents_list"] = "<tr><td style=\"text-align:center\" colspan=4>검색된 담당자가 없습니다.</td></tr>";
		$res["page_text"] = "";
	}
	//break;

	
	$resJson = json_encode($res);
	echo  $resJson;	
	exit;	


	
?>