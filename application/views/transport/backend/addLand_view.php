<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
<style>
	.xx2{
		float: right !important;
	}
</style>
<?php //$this->load->view('package/backend/side_menu'); ?>
            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">
                    <nav class="navbar-custom">                  

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Add / Edit Route</h4>
                                    <!--<ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
                                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter</li>
                                    </ol>-->
                                </div>
                            </li>
                        </ul>

                    </nav>
                </div>
                <!-- Top Bar End -->

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

					<div class="card-box">
					<div class="pull-right">
                                <button type="button" class="btn btn-info btn-sm" onClick="window.location.href = '<?php echo base_url('TransportCMS/Land_Transfer') ?>'"><i class="fa fa-arrow-left"></i> Back</button>
                            </div>
					<input type="hidden" id="arr_transport" name="arr_transport" >
						
						<ul class="nav nav-tabs">                            
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                   <i class="fa fa-file-text-o"></i> Route Data
                                </a>
                            </li>							
														
							<?php if($dataID !=''){ ?>
							<li class="nav-item">
                                <a href="#route" data-toggle="tab" aria-expanded="false" class="nav-link">
                                   <i class="mdi mdi-account-settings-variant "></i> Route Detail
                                </a>
                            </li>
						                     
							<?php } ?>
                       </ul>		
						
						
						<div class="tab-content">
                        <div class="tab-pane show active" id="profile">
						<?php if($dataID !=''){
								foreach($listLand->result() as $listLand2){}
						
						}  ?>						
						
						<form id="frm1" role="form" method="post" action="" enctype="multipart/form-data">
							
							<div class="form-group row">
                              <label class="col-md-3 col-sm-12 col-form-label" for="route_name_en">Route Name English</label>
                              <div class="col-md-9 col-sm-12">
                                  <input type="text" id="route_name_en" name="route_name_en" class="form-control" value="<?php if($dataID !=''){ echo $listLand2->route_name_en;}?>" >
                              </div>
                            </div>
							<div class="form-group row">
                              <label class="col-md-3 col-sm-12 col-form-label" for="route_name_th">Route Name Thai</label>
                              <div class="col-md-9 col-sm-12">
                                  <input type="text" id="route_name_th" name="route_name_th" class="form-control" value="<?php if($dataID !=''){ echo $listLand2->route_name_th;}?>" >
                              </div>
                            </div>
							
							<div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" for="begin_place_id">Begin Place</label>
                               <div class="col-md-9 col-sm-12">
                                  <select class="form-control" id="begin_place_id" name="begin_place_id"  ><!--onchange="placedataupdate(this.value)"-->
                                     <option value="">-- Select --</option>
									 <?php foreach($listPlace->result() as $listPlace2){ ?> 
									  
									  
                                     <option value="<?php echo $listPlace2->id?>" <?php if(($dataID !='') && ($listLand2->begin_place_id == $listPlace2->id)){ echo "selected"; }?> ><?php echo $listPlace2->place_name_en?></option>
									  <?php } ?>
									  
									
                                 </select>
                               </div>
                            </div>
							
							<div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" for="destination_place_id">Destination Place</label>
                               <div class="col-md-9 col-sm-12" id="div_destination">
                                  <select class="form-control" id="destination_place_id" name="destination_place_id">
                                     <option value="">-- Select --</option>
                                     <?php foreach($listPlace->result() as $listPlace3){ ?> 				 
									  
									  
									  <option value="<?php echo $listPlace3->id?>" <?php if(($dataID !='') && ($listLand2->destination_place_id == $listPlace3->id)){ echo "selected"; }?> ><?php echo $listPlace3->place_name_en?></option>
									 <?php } ?> 
									  
                                
                                 </select>
                               </div>
                           </div>

						   <br>
						   <div class="form-group row" >
                              <div class="col-12" style="text-align: center">
                                 <button type="button" class="btn btn-primary" onClick="addLand()" >Add / Edit Data</button>
                              </div>
							  <input type="hidden" id="dataID" name="dataID" value="<?php if($dataID !=''){ echo $dataID;}?>" > 
                           </div>						
							
					</form>	
						
				</div>
				
				<?php if($dataID !=''){	?>		
				<div class="tab-pane" id="route">	
					
					<form id="frm2" role="form" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" for="destination_place_id">Transport</label>
                               <div class="col-md-9 col-sm-12" >
                                  <select class="form-control" id="transport" name="transport">
                                     <option value="">-- Select --</option>
                                     <?php foreach($listTransport->result() as $listTransport2){ ?> 
				<option value="<?php echo $listTransport2->id?>"  ><?php echo $listTransport2->transport_name_en?></option>
									 <?php } ?> 
									  
                                
                                 </select>
                               </div>
                           </div>
                  <div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" for="destination_place_id">Price</label>
                               <div class="col-md-9 col-sm-12" >
                                 <input type="text" id="price" name="price" class="form-control" value="" >
                               </div>
                           </div>
                                    <br>
						   <div class="form-group row" >
                              <div class="col-12" style="text-align: center">
                                 <button type="button" class="btn btn-primary" onClick="addpriceLand()" >Add / Edit Data</button>
                              </div>
							  
                           </div>
                                     <input type="hidden" id="landID" name="landID" value="<?php if($dataID !=''){ echo $dataID;}?>" > 
                                     <input type="hidden" id="pricelandID" name="pricelandID"/>
                                        </form>			
					
                                                <br>
                                                <hr>
                                                <br>
                                                  <div class="card-box table-responsive" id="showland">
        </div>
				</div>
							
							
				<div class="tab-pane" id="route2" style="display: none"></div>
				<?php  } ?>			
							
				</div>
						
				</div>
                    
                    
<div id="modal_Large" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
             </div>
             <div class="modal-body"></div>
                 
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    


                    </div> <!-- container -->

                </div> <!-- content -->

<footer class="footer text-right">
                    <!--2018 © Highdmin. - Coderthemes.com-->
                </footer>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
</div>
<!-- END wrapper --> 