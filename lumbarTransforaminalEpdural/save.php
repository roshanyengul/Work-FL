<?php 

include_once("../../globals.php");
include_once("$srcdir/api.inc");

$procDate = $_POST['proceduredate'];
$procTitle = $_POST['title'];
$procPrediagnosis = $_POST['prediagnosis'];
$procPostdiagnosis = $_POST['postdiagnosis'];
$procFluoroscopy = $_POST['fluoroscopy'];
$procMedicalNecessity = $_POST['medicalNecessity'];
$procAnesthesia = $_POST['anesthesia'];
$procDetails = $_POST['details'];
$procAdditionalNote = $_POST['additionalNote'];
$dicomimg1 = $_POST['dicomimage1'];
$dicomimg2 = $_POST['dicomimage2'];
$dicomimg3 = $_POST['dicomimage3'];
$dicomimg4 = $_POST['dicomimage4'];
$dicomimg5 = $_POST['dicomimage5'];
$dicomimg6 = $_POST['dicomimage6'];
$dicomimg7 = $_POST['dicomimage7'];
$dicomimg8 = $_POST['dicomimage8'];
//$procDate = $_POST['proceduredate'];
//$procDate = $_POST['proceduredate'];

if (!$encounter) { // comes from globals.php
    die(xlt("Internal error: we do not seem to be in an encounter!"));
}


if ($_POST['pid']==$pid  && $_POST['encounter']==$encounter) {
    sqlInsert("UPDATE interventional_procedures_form SET  
					procedureDate = ?,
					title = ?,
					prediagnosis = ?,
					postdiagnosis = ?,
					fluoroscopy = ?,
					medical_necessity = ?,
					anesthesia = ?,
					details = ?,
					addtional_note = ?,
					dicom_img1 = ?,
					dicom_img2 = ?,
					dicom_img3 = ?,
					dicom_img4 = ?,
					dicom_img5 = ?,
					dicom_img6 = ?,
					dicom_img7 = ?,
					dicom_img8 = ?
				WHERE pid = ? and encounter = ?", array($procDate,$procTitle,$procPrediagnosis,$procPostdiagnosis,$procFluoroscopy,$procMedicalNecessity,$procAnesthesia,$procDetails,$procAdditionalNote,$dicomimg1,$dicomimg2,$dicomimg3,$dicomimg4,$dicomimg5,$dicomimg6,$dicomimg7,$dicomimg8,$pid,$encounter));
	header("location:index.php"); 			
} else {
    $newid = sqlInsert("INSERT INTO interventional_procedures_form (pid,encounter,procedureDate,title,prediagnosis,postdiagnosis,fluoroscopy,medical_necessity,anesthesia,details,addtional_note,dicom_img1,dicom_img2,dicom_img3,dicom_img4,dicom_img5,dicom_img6,dicom_img7,dicom_img8) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($pid,$encounter,$procDate,$procTitle,$procPrediagnosis,$procPostdiagnosis,$procFluoroscopy,$procMedicalNecessity,$procAnesthesia,$procDetails,$procAdditionalNote,$dicomimg1,$dicomimg2,$dicomimg3,$dicomimg4,$dicomimg5,$dicomimg6,$dicomimg7,$dicomimg8));
	header("location:index.php"); 
}