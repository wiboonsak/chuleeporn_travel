<?php //echo $detailRoute?>

<div class="row">
<!--
<div class="col-md-12" >
	 <h5 align="center"> Number of passengers 	Adult : <?php //echo $NAdult?> , Child : <?php //echo $NChild?> </h5><hr>
</div>
-->
<?php 

	foreach($loadImg->result() AS $data){ 
	
	?>
	
<div class="col-12 col-sm-6" > 
	  
    <img class="img-fluid" src="<?php echo base_url('uploadfile/').$data->images?>">
</div>
<?php  }?>
	
</div>	