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
	
	if($_POST['su_station']){
		$where .= " AND su_station LIKE '".$_POST['su_station']."%'";
		$follow_page .= "&su_station=".$_POST['su_station'];
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
	$orderby		= " order by su_no desc";
	$limitis			= " LIMIT ".$limit_start.", ".$limit_end;

	//if($_SERVER[REMOTE_ADDR] == "218.54.201.133"){
	
	
	$sql = "select count(su_no) as total from {$db[table][subway]} " .$where;
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

		$sql = "SELECT * FROM {$db[table][subway]} ".$where.$orderby.$limitis;
		//echo $sql;
		$query = $dbapi->dbQuery($sql);
		while($data = $dbapi->dbFetchRow($query)) $list[] = $data;

			
			


			$res['contents_list']  = "<table style=\"width:100%;background:#fff;\">".PHP_EOL;
			$res['contents_list']  .= "<colgroup>".PHP_EOL;
			$res['contents_list']  .= "<col width=\"25%\" />".PHP_EOL;
			$res['contents_list']  .= "<col width=\"50%\" />".PHP_EOL;
			$res['contents_list']  .= "<col width=\"25%\" />".PHP_EOL;
			$res['contents_list']  .= "</colgroup>".PHP_EOL;
			$res['contents_list']  .= "<thead>".PHP_EOL;
			$res['contents_list']  .= "<tr style=\"backgroun:#000;\">".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">전철역명</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">정보</th>".PHP_EOL;
			$res['contents_list']  .= "<th scope=\"col\" style=\"height:35px;background:#000;color:#fff;text-align:center;\">선택</th>".PHP_EOL;

		
			$res['contents_list']  .= "</tr>".PHP_EOL;
			$res['contents_list']  .= "</thead>".PHP_EOL;
			$res['contents_list']  .= "<tbody>".PHP_EOL;
			
			for($i=0;$i<count($list);$i++){

					$shop_cate_name = $dbapi->dbCol2("SELECT sc_name FROM {$db[table][shop_cate]} WHERE sc_no='".$list[$i]['sc_no']."'");
					
					$res["contents_list"] .= "<tr>";
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$list[$i]['su_station']."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\">".$list[$i]['su_info']."</td>".PHP_EOL;
					$res["contents_list"] .= "<td style=\"height:35px;color:#5d5d5d;text-align:center;\"><button type=\"button\" class=\"btn btn-danger btn-sm subway_btn\" su_no=\"".$list[$i]['su_no']."\" su_station=\"".$list[$i]['su_station']."\" su_info=\"".$list[$i]['su_info']."\">선택</button></td>".PHP_EOL;
					$res["contents_list"] .= "</tr>".PHP_EOL; 
				$num--;
			}
			
			$res['contents_list']  .= "</tbody>".PHP_EOL;
			$res['contents_list']  .= "</table>".PHP_EOL;
		
			$res["page_text"] = $userapi->mainPageNav2_1($limit_end);

		
	}else{
		$res["contents_list"] = "<tr><td style=\"text-align:center\" colspan=4>검색된 지하철정보가 없습니다.</td></tr>";
		$res["page_text"] = "";
	}
	//break;

	
	$resJson = json_encode($res);
	echo  $resJson;	
	exit;	


	
?>