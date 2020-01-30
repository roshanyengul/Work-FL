

	






<?php if($datalen >1) { ?>
	<img src="<?php echo $data['dicom_img6']; ?>" style="width: 100%;" id="dicomimage6" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage6" value="<?php echo $data['dicom_img6']; ?>">
<?php } ?>

<?php if($datalen >1){?>
	<img src="<?php echo $data['dicom_img7']; ?>" style="width: 100%;" id="dicomimage7" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage7" value="<?php echo $data['dicom_img7']; ?>">
<?php}?>								

<?php if($datalen >1){?>
	<img src="<?php echo $data['dicom_img8']; ?>" style="width: 100%;" id="dicomimage8" onclick="zoomImage(this.id);" data-toggle="modal" data-target="#myModal" /><input type="hidden" name="dicomimage8" value="<?php echo $data['dicom_img8']; ?>">
<?php}?>								