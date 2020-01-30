<?php

require_once("../../globals.php");
require_once("$srcdir/api.inc");
//require_once("$srcdir/client.inc");
require_once("$srcdir/options.inc.php");
require_once($GLOBALS['srcdir'] . '/csv_like_join.php');
require_once($GLOBALS['fileroot'] . '/custom/code_types.inc.php');

//use OpenEMR\Common\Csrf\CsrfUtils;
use OpenEMR\Core\Header;

$sql = "SELECT * FROM interventional_procedures_form where pid=".$pid." and encounter=".$encounter;
$res = sqlStatement($sql);
$data = sqlFetchArray($res);
$datalen = sizeof($data);

//echo "Test --- ".$datalen;
// interventional_procedures_template
$today = date("Y-m-d"); 
?>
<!doctype html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title><?php echo xlt("Interventional Procedures"); ?></title>
	<!--  Lumbar Transforaminal Epidural -->
	<?php Header::setupHeader(['datetime-picker']);?>
	
	<style type="text/css" title="mystyles" media="all">
		@media only screen and (max-width: 768px) {
			[class*="col-"] {
			width: 100%;
			text-align:left!Important;
		}
		
		/* Style the Image Used to Trigger the Modal */
		#myImg {
		  border-radius: 5px;
		  cursor: pointer;
		  transition: 0.3s;
		}

		#myImg:hover {opacity: 0.7;}

		/* The Modal (background) */
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}

		/* Modal Content (Image) */
		.modal-content {
		  margin: auto;
		  display: block;
		  width: 80%;
		  max-width: 700px;
		}

		/* Caption of Modal Image (Image Text) - Same Width as the Image */
		#caption {
		  margin: auto;
		  display: block;
		  width: 80%;
		  max-width: 700px;
		  text-align: center;
		  color: #ccc;
		  padding: 10px 0;
		  height: 150px;
		}

		/* Add Animation - Zoom in the Modal */
		.modal-content, #caption {
		  animation-name: zoom;
		  animation-duration: 0.6s;
		}

		@keyframes zoom {
		  from {transform:scale(0)}
		  to {transform:scale(1)}
		}

		/* The Close Button */
		.close {
		  position: absolute;
		  top: 15px;
		  right: 35px;
		  color: #f1f1f1;
		  font-size: 40px;
		  font-weight: bold;
		  transition: 0.3s;
		}

		.close:hover,
		.close:focus {
		  color: #bbb;
		  text-decoration: none;
		  cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px){
		  .modal-content {
			width: 100%;
		  }
		}		
		
	</style>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		
	
	</script>
</head>
<body class="body_top">
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title" id="modalTitle">Create Template</h4>
			</div>
			<div class="modal-body" style="overflow:auto;" id="modalbody">
				<div class="col-xs-12">
					<div class="form-group">
						<div class=" forms col-xs-3">
							<label for="code" class="h5"><?php echo xlt('Title of Procedure'); ?>:</label>
						</div>
						<div class="forms col-xs-5">
							<input type="text" name="modal['title']" class="form-control code" id="modaltitle" value="">
						</div>
					</div>
                </div>
				<div class="col-xs-12">
					<div class="form-group">
						<div class=" forms col-xs-3">
							<label for="code" class="h5"><?php echo xlt('Preoperative Diagnosis'); ?>:</label>
						</div>
						<div class="forms col-xs-5">
							<input type="text" name="modal['prediagnosis']" class="form-control code" id="modalprediagnosis" value="">
						</div>
					</div>
                </div>
				
				<div class="col-xs-12">
					<div class="form-group">
						<div class=" forms col-xs-3">
							<label for="code" class="h5"><?php echo xlt('Postoperative Diagnosis'); ?>:</label>
						</div>
						<div class="forms col-xs-5">
							<input type="text" name="modal['postdiagnosis']" class="form-control code" id="modalpostdiagnosis" value="">
						</div>
					</div>
                </div>
				
				<div class="col-xs-12">
					<div class="form-group">
						<div class=" forms col-xs-3">
							<label for="code" class="h5"><?php echo xlt('Indication for Fluoroscopy'); ?>:</label>
						</div>
						<div class="forms col-xs-5">
							<input type="text" name="modal['fluoroscopy']" class="form-control code" id="modalfluoroscopy" value="">
						</div>
					</div>
                </div>
				<div class="col-xs-12">
					<div class="form-group">
						<div class=" forms col-xs-3">
							<label for="code" class="h5"><?php echo xlt('Medical Necessity'); ?>:</label>
						</div>
						<div class="forms col-xs-5">
							<input type="text" name="modal['medicalNecessity']" class="form-control code" id="modalMedicalNecessity" value="">
						</div>
					</div>
                </div>
				
				<div class="col-xs-12">
					<div class="form-group">
						<div class=" forms col-xs-3">
							<label for="code" class="h5"><?php echo xlt('Anesthesia'); ?>:</label>
						</div>
						<div class="forms col-xs-5">
							<input type="text" name="modal['anesthesia']" class="form-control code" id="modalanesthesia" value="">
						</div>
					</div>
                </div>
				<div class="col-xs-12">
					<div class="form-group">
						<div class=" forms col-xs-3">
							<label for="code" class="h5"><?php echo xlt('Procedure in Detail'); ?></label>
						</div>
					</div>
                </div>
				<div class="col-xs-12">
					<div class="form-group">
						<div class="forms col-xs-12">
							<textarea name="modal['detail']"  class="form-control" id="modaldetail"></textarea>
						</div>
					</div>	
				</div>
				
				<div class="col-xs-12">
					<div class="form-group">
						<div class=" forms col-xs-3">
							<label for="code" class="h5"><?php echo xlt('Additional Note'); ?>:</label>
						</div>
					</div>
                </div>
				<div class="col-xs-12">
					<div class="form-group">
						<div class="forms col-xs-12">
							<textarea name="modal['note']"  class="form-control" id="modalnote"></textarea>
						</div>
					</div>	
				</div>									
				
			</div>
			<div class="modal-footer">
			   <button type="button" class="btn btn-primary" id="savetemplate" onclick="createtemplate('create')">Save</button>
			   <button type="button" class="btn btn-primary" id="edittemplate" onclick="createtemplate('edittemplate')" style="display:none">Edit</button>
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- End Modal -->

	<div class="container">
		<div class="row">
			<div class="page-header">
				<h2><?php echo xlt('Interventional Procedures'); ?></h2>
			</div>
		</div>
	<!-- A button for taking snaps -->
		<div class="row">	
            <form method='post' name='my_form' action='save.php'>
                <input type="hidden" name="csrf_token_form" value="<?php //echo attr(CsrfUtils::collectCsrfToken()); ?>" />
				<input type="hidden" name="pid" value="<?php if($datalen>1){echo $pid; }?>" /> 
				<input type="hidden" name="encounter" value="<?php if($datalen>1){echo $encounter; }?>" >
                <fieldset>
                    <legend><?php echo xlt('Enter Details'); ?></legend>
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Select Template'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<select name="templateName" id="procedureTemplate" class="form-control" onchange="createtemplate('getbyid',this.value)">
									<option value=""></option>
								</select>
							</div>
							<div class=" forms col-xs-2">
								<input type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal" value="Create Template" onclick="defaultConetnet()">
							</div>
							<div class=" forms col-xs-2">
								<input type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" value="Edit Template" onclick="editTemplate();">
							</div>
						</div>
					</div>
					
                    <div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Date of Procedure'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="date" name="proceduredate" class="form-control code" value="<?php if($datalen>1){echo $data['procedureDate']; } else{ echo $today; } ?>">
							</div>
						</div>
                    </div>
                    <div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Title of Procedure'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="title" class="form-control code" value="<?php if($datalen>1){echo $data['title']; }?>" id="procedureTitle">
							</div>
						</div>
                    </div>
					
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Preoperative Diagnosis'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="prediagnosis" class="form-control code" value="<?php if($datalen>1){echo $data['prediagnosis']; }?>" id="procedurePrediagnosis">
							</div>
						</div>
                    </div>
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Postoperative Diagnosis'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="postdiagnosis" class="form-control code" value="<?php if($datalen>1){echo $data['postdiagnosis']; }?>" id="procedurePostdiagnosis">
							</div>
						</div>
                    </div>
					
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Indication for Fluoroscopy'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="fluoroscopy" class="form-control code" value="<?php if($datalen>1){echo $data['fluoroscopy']; }?>" id="procedureFluoroscopy">
							</div>
						</div>
                    </div>
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Medical Necessity'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="medicalNecessity" class="form-control code" id="procedureMedicalNecessity" value="<?php if($datalen>1){echo $data['medical_necessity']; }?>">
							</div>
						</div>
					</div>					
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Anesthesia'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="anesthesia" class="form-control code" value="<?php if($datalen>1){echo $data['anesthesia']; }?>" id="procedureAnesthesia">
							</div>
						</div>
                    </div>					
					
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Procedure in Detail'); ?>:</label>
							</div>
						</div>
                    </div>					

					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-12">
								<textarea name="details" id="procedureDetails" class="form-control code" ><?php if($datalen>1){echo $data['details']; }?></textarea>
							</div>
						</div>
                    </div>

					<div class="col-xs-12" id="myCam" style="margin:15px;">
					
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<div class="col-xs-3">
								<input type="button" class="btn btn-success" value="Start Camera" onClick="setup(); $(this).hide().next().show();">
							</div>
							<div class="col-xs-3">
								<input type="button" class="btn btn-primery" onclick="take_snapshot()" value="Take Dicome Image" />
							</div>
						</div>
					</div>
					<div class="col-xs-12">
							<div class="form-group">
									<div class=" forms col-xs-2">
											<label for="code" class="h5"><?php echo xlt('X Ray Image'); ?>:</label>
									</div>
							</div>
       			    </div>

					<div class="col-xs-12" style="margin-bottom: inherit;">
						<div class="form-group">
							<div class=" forms col-xs-3" id="dicom1">
								<?php if($datalen >1){ ?>
									<img src="<?php echo $data['dicom_img1']; ?>" style="width: 100%;" id="dicomimage1" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage1" value="<?php echo $data['dicom_img1']; ?>">
								<?php } ?>
							</div>
							<div class=" forms col-xs-3" id="dicom2">
								<?php if($datalen >1){ ?>
									<img src="<?php echo $data['dicom_img2']; ?>" style="width: 100%;" id="dicomimage2" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage2" value="<?php echo $data['dicom_img2']; ?>">
								<?php } ?>	
								
							</div>
							<div class=" forms col-xs-3" id="dicom3">
								<?php if($datalen >1){ ?>
									<img src="<?php echo $data['dicom_img3']; ?>" style="width: 100%;" id="dicomimage3" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage3" value="<?php echo $data['dicom_img3']; ?>">
								<?php } ?>
							</div>
							<div class=" forms col-xs-3" id="dicom4">
								<?php if($datalen >1){ ?>
									<img src="<?php echo $data['dicom_img4']; ?>" style="width: 100%;" id="dicomimage4" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage4" value="<?php echo $data['dicom_img4']; ?>">
								<?php } ?>	
							</div>

						</div>
                    </div>
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-3" id="dicom5">
								<?php if($datalen >1){ ?>
									<img src="<?php echo $data['dicom_img5']; ?>" style="width: 100%;" id="dicomimage5" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage5" value="<?php echo $data['dicom_img5']; ?>">
								<?php } ?>
							</div>
							<div class=" forms col-xs-3" id="dicom6">
								<?php if($datalen >1) { ?>
									<img src="<?php echo $data['dicom_img6']; ?>" style="width: 100%;" id="dicomimage6" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage6" value="<?php echo $data['dicom_img6']; ?>">
								<?php } ?>
							</div>
							<div class=" forms col-xs-3" id="dicom7">
								<?php if($datalen >1){?>
									<img src="<?php echo $data['dicom_img7']; ?>" style="width: 100%;" id="dicomimage7" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage7" value="<?php echo $data['dicom_img7']; ?>">
								<?php } ?>								
							</div>
							<div class=" forms col-xs-3" id="dicom8">
								<?php if($datalen >1){ ?>
									<img src="<?php echo $data['dicom_img8']; ?>" style="width: 100%;" id="dicomimage8" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage8" value="<?php echo $data['dicom_img8']; ?>">
								<?php } ?>								
							</div>
						</div>
                    </div>
					
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Additional Note'); ?>:</label>
							</div>
						</div>
                    </div>					

					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-12">
								<textarea name="additionalNote" id="procedureAdditionalNote" class="form-control code"><?php if($datalen>1){echo $data['addtional_note']; }?></textarea>
							</div>
						</div>
                    </div>
                 </fieldset>
                 <div class="form-group clearfix">
                    <div class="col-sm-12 position-override">
                        <div class="btn-group oe-opt-btn-group-pinch" role="group">
							<div class="col-sm-2">
								<button type="submit" onclick="top.restoreSession()" class="btn btn-default btn-save"><?php echo xlt('Save'); ?></button>
							</div>	<div class="col-sm-1"></div>
							<div class="col-sm-2">
								<button type="submit" onclick="top.restoreSession()" class="btn btn-secondary"><i class="fa fa-sign"></i> <?php echo xlt('Sign'); ?></button>
							</div>	<div class="col-sm-1"></div>	
							<div class="col-sm-2">	
								<button onclick="top.restoreSession(); printPDF('InterventionalProceduresform');" class="btn btn-success"><i class="fa fa-print"></i> <?php echo xlt('Print'); ?></button>
							</div>	<div class="col-sm-1"></div>	
							<div class="col-sm-2">	
								<button type="button" class="btn btn-link btn-cancel oe-opt-btn-separate-left" onclick="top.restoreSession(); parent.closeTab(window.name, false);"><?php echo xlt('Cancel');?></button>
							</div>	
								<input type="hidden" id="clickId" value="">
                        </div>
                    </div>
                </div>
				<input type="hidden" value="1" id="imgAddId">
            </form>
            </div>
		</div>	
			<!-- First, include the Webcam.js JavaScript Library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script type="text/javascript" src="webcam/webcam.min.js"></script>
			
			<!-- Configure a few settings and attach camera -->
			<script language="JavaScript">
					Webcam.set({
						width: 320,
						height: 240,
						image_format: 'jpeg',
						jpeg_quality: 90
					});
				//Webcam.attach('#myCam');
			</script>
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		var modalcontent = "";
		
		$(document).ready(function(){
			modalcontent = document.getElementById("modalbody").innerHTML;
			createtemplate("getalldata");
		});
		
		function zoomImage(id){
			var imageData = document.getElementById(id).src;
			var content = '<img src="'+imageData+'" style="width:100%;">';
			document.getElementById("modalbody").innerHTML = content;
			document.getElementById("modalTitle").innerHTML = "Dicome Image";
			$("#savetemplate").css("display","none");
			//$("#myModal").css("display","");
			//modalbody 
		}
		
		function editTemplate(){
			var idtemplate = $("#procedureTemplate").val();
			if(idtemplate!=""){
				$.ajax({
						type: "POST",
						url: "createtemplate.php",
						data: {
							type: "edittemplate",
							data: "fetch",
							id: $("#procedureTemplate").val(),
						}
					}).done(function(response) {
						var obj = JSON.parse(response);
						//console.log(obj);
						$("#modaltitle").val(obj.templatedata.title);
						$("#modalprediagnosis").val(obj.templatedata.prediagnosis);
						$("#modalpostdiagnosis").val(obj.templatedata.postdiagnosis);
						$("#modalfluoroscopy").val(obj.templatedata.fluoroscopy);
						$("#modalMedicalNecessity").val(obj.templatedata.anesthesia);
						$("#modalanesthesia").val(obj.templatedata.details);
						$("#modaldetail").val(obj.templatedata.addtional_note);
						$("#modalnote").val(obj.templatedata.medical_necessity);
					});	
				document.getElementById("modalbody").innerHTML = modalcontent; 
				document.getElementById("modalTitle").innerHTML = "Edit Template";
				$("#savetemplate").css("display","none");
				$("#edittemplate").css("display","")
			} else {
				alert("Please select the template");
				$("#myModal").css("display","none");
			}
		}
		function defaultConetnet(){
			document.getElementById("modalbody").innerHTML = modalcontent; 
			document.getElementById("modalTitle").innerHTML = "Create Template";
			$("#savetemplate").css("display","");
		}
		function setup() {
			Webcam.reset();
			Webcam.attach("#myCam");
		}

		
		function take_snapshot() {
			// take snapshot and get image data
			
			//console.log(modalcontent);
			Webcam.snap( function(data_uri) {
				// display results in page
				//var j = 9;
				var imgVal= document.getElementById('imgAddId').value;
				imgVal = parseInt(imgVal);
				//alert(imgVal);
				$.ajax({
					type: "POST",
					url: "createtemplate.php",
					data: {
						type: "createimage",
						imagedata: data_uri
					}
				}).done(function(response) {
				  var obj = JSON.parse(response);
				  console.log(obj);
				  document.getElementById('dicom'+imgVal).innerHTML = '<img src="'+obj.filelocation+'" style="width: 100%;" id="dicomimage'+imgVal+'" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage'+imgVal+'" value="'+obj.filelocation+'">';	
				});
					
				
				if(imgVal==8){
					document.getElementById('imgAddId').value = 1;
				} else {
					document.getElementById('imgAddId').value = imgVal+1;
				}
				//document.getElementById('dicom1').innerHTML = '<img src="'+data_uri+'"/>';
			});
		}
		
		function createtemplate (type,templateId=""){
			createtemplateajax(type,templateId);
			
		}
		function createtemplateajax(querytype="",templateId=""){
			if(querytype=="create"){
				$.ajax({
					type: "POST",
					url: "createtemplate.php",
					data: {
						title: $("#modaltitle").val(),
						prediag: $("#modalprediagnosis").val(),
						postdiag: $("#modalpostdiagnosis").val(),
						fluoroscopy: $("#modalfluoroscopy").val(),
						note: $('textarea#modalnote').val(),
						detail: $('textarea#modaldetail').val(),
						anesthesia: $("#modalanesthesia").val(),
						type: querytype
					}
				}).done(function(response) {
					//console.log(response);
					
					var obj = JSON.parse(response);
					var content = '<option value=""></option>';
					for (var i =0;i< obj.templatedata.length;i++){
							content +='<option value="'+obj.templatedata[i].id+'">'+obj.templatedata[i].title+'</option>';
					}
					$("#myModal").css("display","none");
					$("#procedureTemplate").html(content);
					alert("Template Created Sucessfully");
					//console.log(data);
				});
			} else if(querytype=="edittemplate"){
				$.ajax({
					type: "POST",
					url: "createtemplate.php",
					data: {
						title: $("#modaltitle").val(),
						prediag: $("#modalprediagnosis").val(),
						postdiag: $("#modalpostdiagnosis").val(),
						fluoroscopy: $("#modalfluoroscopy").val(),
						note: $('textarea#modalnote').val(),
						detail: $('textarea#modaldetail').val(),
						anesthesia: $("#modalanesthesia").val(),
						type: querytype,
						data: "edit",
						id: $("#procedureTemplate").val(),
					}
				}).done(function(response) {
					//console.log(response);
					
					var obj = JSON.parse(response);
					var content = '<option value=""></option>';
					for (var i =0;i< obj.templatedata.length;i++){
							content +='<option value="'+obj.templatedata[i].id+'">'+obj.templatedata[i].title+'</option>';
					}
					$("#myModal").css("display","none");
					$("#procedureTemplate").html(content);
					alert("Template Edited Sucessfully");
					//console.log(data);
				});
				
			} else {
				$.ajax({
					type: "POST",
					url: "createtemplate.php",
					data: {
						type: querytype,
						id: templateId
					}
				}).done(function(response) {
					var obj = JSON.parse(response);
					//console.log(obj);
					if(obj.data=="getalldata"){
						var content = '<option value=""></option>';
						for (var i =0;i< obj.templatedata.length;i++){
							content +='<option value="'+obj.templatedata[i].id+'">'+obj.templatedata[i].title+'</option>';
						}
						$("#procedureTemplate").html(content);
						//console.log(content);
					} else if(obj.data=="insertdata") {
						$("#procedureTitle").val(obj.templatedata.title);
						$("#procedurePrediagnosis").val(obj.templatedata.prediagnosis);
						$("#procedurePostdiagnosis").val(obj.templatedata.postdiagnosis);
						$("#procedureFluoroscopy").val(obj.templatedata.fluoroscopy);
						$("#procedureAnesthesia").val(obj.templatedata.anesthesia);
						$("textarea#procedureDetails").val(obj.templatedata.details);
						$("textarea#procedureAdditionalNote").val(obj.templatedata.addtional_note);
					}
					$("#myModal").css("display","none");
				});
			}
		}
		
		function printPDF(name){
			window.print();
			document.title =name;
		}

		
	</script>
	
	<script>
	
	</script>
</body>
</html>