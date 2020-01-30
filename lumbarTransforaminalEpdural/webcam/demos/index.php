<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>WebcamJS Test Page</title>
	<style type="text/css">
		body { font-family: Helvetica, sans-serif; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
	</style>
</head>
<body>
	<div id="results">Your captured image will appear here...</div>
	
	<h1>WebcamJS Test Page</h1>
	<h3>Demonstrates horizontal flipped (mirrored) 320x240 capture &amp; display</h3>
	
	<div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="../webcam.min.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90,
			flip_horiz: true
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	<body class="body_top">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h2><?php echo xlt('Lumbar Transforaminal Epidural'); ?></h2>
                </div>
            </div>
            <div class="row">
            <form method='post' name='my_form' action='save.php'>
                <input type="hidden" name="csrf_token_form" value="<?php echo attr(CsrfUtils::collectCsrfToken()); ?>" />
                <fieldset>
                    <legend><?php echo xlt('Enter Details'); ?></legend>
                    <div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Date of Procedure'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="date" name="procedure['date']" class="form-control code" value="">
							</div>
						</div>
                    </div>
                    <div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Title of Procedure'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="procedure['title']" class="form-control code" value="">
							</div>
						</div>
                    </div>

					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Preoperative Diagnosis'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="procedure['prediagnosis']" class="form-control code" value="">
							</div>
						</div>
                    </div>
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Postoperative Diagnosis'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="procedure['postdiagnosis']" class="form-control code" value="">
							</div>
						</div>
                    </div>

					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Indication for Fluoroscopy'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="procedure['fluoroscopy']" class="form-control code" value="">
							</div>
						</div>
                    </div>

					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Anesthesia'); ?>:</label>
							</div>
							<div class="forms col-xs-4">
								<input type="text" name="procedure['anesthesia']" class="form-control code" value="">
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
								<textarea name="procedure['details']" class="form-control code"></textarea>
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
					<div class="col-xs-12" id="my_camera">
					
					</div>
					<div class="col-xs-12">
						<button class="btn btn-default" onClick="take_snapshot()">Take Dicome Image</button>
					</div>
					<div class="col-xs-12" style="margin-bottom: inherit;">
						<div class="form-group">
							<div class=" forms col-xs-3" id="dicom1">
								
							</div>
							<div class=" forms col-xs-3" id="dicom2">
								
							</div>
							<div class=" forms col-xs-3" id="dicom3">
								
							</div>
							<div class=" forms col-xs-3" id="dicom4">
								
							</div>
						</div>
                    </div>
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-3" id="dicom5">
								
							</div>
							<div class=" forms col-xs-3" id="dicom6">
								
							</div>
							<div class=" forms col-xs-3" id="dicom7">
								
							</div>
							<div class=" forms col-xs-3" id="dicom8">

							</div>
						</div>
                    </div>
					
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-2">
								<label for="code" class="h5"><?php echo xlt('Provider sign'); ?>:</label>
							</div>
						</div>
                    </div>
					<div class="col-xs-12">
						<div class="form-group">
							<div class=" forms col-xs-12">
								<canvas id="provideSign" style="background: white;width: 100%;height: 36%;border-radius: 8px;" onclick='showCoords(event)'></canvas>
							</div>
						</div>
                    </div>
                 </fieldset>
                 <div class="form-group clearfix">
                    <div class="col-sm-12 position-override">
                        <div class="btn-group oe-opt-btn-group-pinch" role="group">
                            <button type="submit" onclick="top.restoreSession()" class="btn btn-default btn-save"><?php echo xlt('Save'); ?></button>
                            <button type="button" class="btn btn-link btn-cancel oe-opt-btn-separate-left" onclick="top.restoreSession(); parent.closeTab(window.name, false);"><?php echo xlt('Cancel');?></button>
                            <input type="hidden" id="clickId" value="">
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </body>
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+data_uri+'"/>';
			} );
		}
	</script>
	
</body>
</html>
