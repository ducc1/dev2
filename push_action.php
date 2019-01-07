<?php
	require_once "./common.php";

	//print_R($_FILES);
	//exit;

	### classes ###
	
	$dbapi =  Loader::getInstance('DbApis');
	$userapi = Loader::getInstance('USER_APIS');

	$userapi->admin_check();


	//print_R($_POST);
	//exit;

	$result = array(); 

	if($_POST['user_type'] == 1){

		$m_no = $_POST['m_no'];
		$p_type= $_POST['p_type'];
		$msg = $_POST['msg'];

		if($p_type == "4"){

			
			
			$push_act = $dbapi->push_send_li($m_no,"1",$p_type,"고객문의 답변이 작성 되었습니다.!",$key_val);

			//print_R($push_act);

			$result['result'] = "ok";
			$result['msg'] = "정상적으로 푸시가 발송되었습니다";
			/*
			if($push_act->success == 1){
				$result['result'] = "ok";
				$result['msg'] = "정상적으로 푸시가 발송되었습니다";
			}else{
				$result['result'] = "ok";
				$result['msg'] = "푸쉬전송에  실패햇습니다";
			}
			*/


		}else if($p_type == "6" || $p_type == "7" || $p_type == "8"){

			$m_no  = "SELECT * FROM {$db[table][member]} WHERE 1=1 AND (m_push_all = '1' or m_push_info='1')"; 
			
			$push_act = $dbapi->push_admin($m_no,"1",$p_type, $msg, $key_val);


			//echo "성공 = ".$push_act->success;
			//$rseult['result'] = "ok";
			//$result['msg'] = "성공 : ".$push_act->success."건 실패 : ".$push_act->failure."건이 전송되었습니다.";
			$result['result'] = "ok";
			$result['msg'] = "정상적으로 푸시가 발송되었습니다";

			


		}else if($p_type == "10"){
			
			$m_no  = "SELECT * FROM {$db[table][member]} WHERE 1=1 AND m_no in ({$_POST[member_no_arr]})"; 
			

			$result['qry'] = $m_no;
			
			$push_act = $dbapi->push_admin($m_no,"1",$p_type, $msg, $key_val);


			//echo "성공 = ".$push_act->success;
			//$rseult['result'] = "ok";
			//$result['msg'] = "성공 : ".$push_act->success."건 실패 : ".$push_act->failure."건이 전송되었습니다.";
			$result['result'] = "ok";
			$result['msg'] = "정상적으로 푸시가 발송되었습니다";

		}

	
	}else{


		$t_no  = $_POST['t_no'];
		$p_type = $_POST['p_type'];
		$msg = $_POST['msg'];
		
	
		if($p_type == "4"){
			
			$push_act = $dbapi->push_send_li($t_no,"2",$p_type,"고객문의 답변이 작성 되었습니다.!",$key_val);

			$result['result'] = "ok";
			$result['msg'] = "정상적으로 푸시가 발송되었습니다";
			/*
			if($push_act->success == 1){
				$result['result'] = "ok";
				$result['msg'] = "정상적으로 푸시가 발송되었습니다";
			}else{
				$result['result'] = "ok";
				$result['msg'] = "푸쉬전송에  실패햇습니다";
			}
			*/
	

		}else if($p_type == "5"){
			
			$push_act = $dbapi->push_send_li($t_no,"2",$p_type,"공지사항 제목입니다.",$key_val);


		}else if($p_type == "6"){
			
			$m_no  = "SELECT * FROM {$db[table][tmember]} WHERE 1=1 AND t_no in ({$_POST[member_no_arr]})"; 

			$result['qry'] = $m_no;
			
			$push_act = $dbapi->push_admin($m_no,"2",$p_type, $msg, $key_val);


			//echo "성공 = ".$push_act->success;
			$rseult['result'] = "ok";
			//$result['msg'] = "성공 : ".$push_act->success."건 실패 : ".$push_act->failure."건이 전송되었습니다.";
			$result['msg'] = "정상적으로 처리 되었습니다.";

		}
	
	}
	
	echo json_encode($result);
	exit;
	

?>