<?php

include_once("../../globals.php");
include_once("$srcdir/api.inc");

if($_POST['type']=="create"){
	sqlInsert("INSERT INTO interventional_procedures_template (title,prediagnosis,postdiagnosis,fluoroscopy,anesthesia,details,addtional_note) VALUES (?,?,?,?,?,?,?)", array($_POST['title'], $_POST['prediag'], $_POST['postdiag'], $_POST['fluoroscopy'],$_POST['anesthesia'],$_POST['detail'],$_POST['note']));
	$sql = "SELECT * FROM interventional_procedures_template";
    $res = sqlStatement($sql);
	$data = array();
	$count = 0;
	while($row = sqlFetchArray($res)){
		$data[$count]['id'] = $row['id'];
		$data[$count]['title'] = $row['title'];
		$data[$count]['prediagnosis'] = $row['prediagnosis'];
		$data[$count]['postdiagnosis'] = $row['postdiagnosis'];
		$data[$count]['fluoroscopy'] = $row['fluoroscopy'];
		$data[$count]['anesthesia'] = $row['anesthesia'];
		$data[$count]['details'] = $row['details'];
		$data[$count]['addtional_note'] = $row['addtional_note'];
		$count++;
	} 
	echo json_encode(array("templatedata"=>$data,"data"=>"createdata"));
} elseif($_POST['type']=="edittemplate"){
	if($_POST['data'] =="fetch"){
		$sql = "SELECT * FROM interventional_procedures_template where id=".$_POST['id'];
		$res = sqlStatement($sql);
		$data = sqlFetchArray($res);
		
		echo json_encode(array("templatedata"=>$data,"data"=>"fetcheditdata"));
	} else {
		sqlInsert("UPDATE interventional_procedures_template SET  
					title = ?,
					prediagnosis = ?,
					postdiagnosis = ?,
					fluoroscopy = ?,
					anesthesia = ?,
					details = ?,
					addtional_note = ? where id= ?
				  ", array($_POST['title'], $_POST['prediag'], $_POST['postdiag'], $_POST['fluoroscopy'],$_POST['anesthesia'],$_POST['detail'],$_POST['note'],$_POST['id']));
		//$sql = "SELECT * FROM interventional_procedures_template";
		$sql = "SELECT * FROM interventional_procedures_template";
		$res = sqlStatement($sql);
		$data = array();
		$count = 0;
		while($row = sqlFetchArray($res)){
			$data[$count]['id'] = $row['id'];
			$data[$count]['title'] = $row['title'];
			$data[$count]['prediagnosis'] = $row['prediagnosis'];
			$data[$count]['postdiagnosis'] = $row['postdiagnosis'];
			$data[$count]['fluoroscopy'] = $row['fluoroscopy'];
			$data[$count]['anesthesia'] = $row['anesthesia'];
			$data[$count]['details'] = $row['details'];
			$data[$count]['addtional_note'] = $row['addtional_note'];
			$count++;
		}
		echo json_encode(array("templatedata"=>$data,"data"=>"editeddata"));
	}
	
} elseif($_POST['type']=="getbyid"){
	$sql = "SELECT * FROM interventional_procedures_template where id=".$_POST['id'];
    $res = sqlStatement($sql);
	$data = sqlFetchArray($res);
	
	echo json_encode(array("templatedata"=>$data,"data"=>"insertdata"));
} elseif($_POST['type']=="createimage"){ 
	$file = '../../../public/dicomImage/dicomimg'.date("Ymdhis").'.png';				
	$data = $_POST['imagedata'];
	list($type, $data) = explode(';', $data);
	list(, $data)      = explode(',', $data);
	$data = base64_decode($data);
	file_put_contents($file, $data);
	echo json_encode(array("filelocation"=>$file,"data"=>"dicomeImageCreated"));
} else {
	$sql = "SELECT * FROM interventional_procedures_template";
    $res = sqlStatement($sql);
	$data = array();
	$count = 0;
	while($row = sqlFetchArray($res)){
		$data[$count]['id'] = $row['id'];
		$data[$count]['title'] = $row['title'];
		$data[$count]['prediagnosis'] = $row['prediagnosis'];
		$data[$count]['postdiagnosis'] = $row['postdiagnosis'];
		$data[$count]['fluoroscopy'] = $row['fluoroscopy'];
		$data[$count]['anesthesia'] = $row['anesthesia'];
		$data[$count]['details'] = $row['details'];
		$data[$count]['addtional_note'] = $row['addtional_note'];
		$count++;
	}
	echo json_encode(array("templatedata"=>$data,"data"=>"getalldata"));
}
