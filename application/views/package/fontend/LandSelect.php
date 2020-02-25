<?php 
 // print_r($travelGo);
//  echo "<br>";
//echo 'num_rows'.$travelGo->num_rows();
//echo $travelRound." dateGo->".$dateGo."  dateReturn->".$dateReturn?><?php $this->lang->load('content', $this->session->userdata('weblang'));?>
<style>

</style>
<div class="main-cn flight-page bg-white clearfix" id="BcHead">
                    <div class="row">

                        <!-- Flight Right -->
                        <div class="col-md-9 col-md-push-3">
                          <?php //echo date("H:i:s")?>
                            
                            <section class="breakcrumb-sc text-red">
                                <ul class="breadcrumb arrow">
                                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                                    <li><a href="#" title=""><?php echo $FromLocationName." >>".$ToLocationName?></a></li>
                                    
                                </ul>
                            </section>
							<div id="routeList">
                            <!------DEPART------------>
							<?php 
                                                         if($this->session->userdata('weblang') == 'en'){
                                                         $WAYTO ="Depart";
                                                         }else{
                                                         $WAYTO ="ออกจาก";
                                                         }
									$DateTravel = $dateGo;
									$Datereturn = $datereturn;
                                                                        
	                                $location1 = $FromLocationName;
									$location2 = $ToLocationName;
									include('landSelectList.php');?>
							<!-----### Return -------->
     					
							</div>
								<!-- Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Modal title</h4>
									  </div>
									  <div class="modal-body">
										...
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										
									  </div>
									</div>
								  </div>
								</div>	
								<!-- Modal -->
                        </div>
                        <!-- End Flight Right -->

                        <!-- Sidebar -->
                        <div class="col-md-3 col-md-pull-9">
                            <!-- Sidebar Content -->
                            <div class="sidebar-cn">

                                <!-- Search Result -->
                                <div class="search-result">
                                    <p id="headSumary"><?php echo $this->lang->line('BOOKINGSUMMARY');?></p>
                                </div>
                                <!-- End Search Result -->
                                <!-- Search Form Sidebar -->
                                <div class="search-sidebar">
                                  
                                    <div class="row">
                                        <div class="form-search clearfix" >
                                            <form id="landform" name="landform" class="form-wizard validate"  method="post">
                                            <div class="col-md-12 td-airline"  >
                                                <input type="hidden" name="datetotal" value="<?php echo $datetotal?>">
                                                <input type="hidden" name="returndate" value="<?php echo $returndate?>">
                                                <input type="hidden" name="datedata" value="<?php echo $datedata?>">
                                                <input type="hidden" name="Adults" value="<?php echo $Adults?>">
                                                <input type="hidden" name="Children" value="<?php echo $Children?>">
                                                <table class="table" width="100%" style="margin-bottom:10px">
													<tr>
														<td colspan="2" style="background-color:#E1E1E1"><strong><?php echo $WAYTO?>:</strong> <strong><span id="departName"><?php echo $FromLocationName."-".$ToLocationName?></span></strong><br>
												    <span style="color:red;font-size: 12px;" ><span id="dateGo"><?php echo $dateGo?> - <?php echo $datereturn?></span>
														<span id="DepartTime"></span></td>
													</tr>
													

												</table>
                                                </div>
                                                <div class="col-md-12 td-airline" id="showdata">
                                        
                                            </div>
                                            <div class="col-md-12 td-airline" style="padding-top: 15px;">
												<table class="table" width="100%">
													<tr  style="background-color:#E1E1E1">
														<td ><?php echo $this->lang->line('Totalprice');?></td>
														<td  align="right" ><span id="AllTotalPrice"></span></td>
                                                                                                        <input type="hidden" id="totalprice" name="totalprice" >
													</tr>
													
                                                                                                        <tr>
														<td colspan="2" align="center">
															<!--<button id="conBtn" type="button" class="btn btn-success btn-sm" onClick="doBooking()">CONTINUE</button>-->
                                                                                                                        <button id="conBtn" type="button" class="btn btn-success btn-sm" onClick="goConfirm()"><?php echo $this->lang->line('continue');?></button>
														</td>
													
													</tr>
												</table>
								 		 </div>
                                           
                                            </form>	
                                                                                   
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- End Search Form Sidebar -->
                                <!-- Narrow your results -->
    

                            </div>
                            <!-- End Sidebar Content -->
                        </div>
                        <!-- End Sidebar -->

                        
                    </div>
				
                </div>


<!-- //Modal -->

<script>
    $( document ).ready(function() {
        $('#conBtn').hide();
});
	 $('#preloader2').css('display','none');
	 //------------------------------------
                function adddetail(ch1,landid,priceid,transport,price,amount,datetotal){
                    if(ch1==true){
                    $.post('<?php echo base_url('Welcome/adddetail') ?>', {landid:landid,priceid:priceid,transport:transport,price:price,amount:amount,datetotal:datetotal}, function (data) {
                        
                        $('#showdata').append(data);
                        calculate_totalPrice();
                         $('#conBtn').show();
                        //$('#check'+x).prop("checked", true);
                        });
                    }else{
                        $('#detail'+priceid).remove();
                         $('#amount'+priceid).val('1');
                        calculate_totalPrice();
                        
                       // $('#radio-air-'+priceid).prop("checked", false);
                    }
                }
	 //------------------------------------
                function setnumber(amount,landid,priceid,transport,price,datetotal){
                    $.post('<?php echo base_url('Welcome/adddetail') ?>', {landid:landid,priceid:priceid,transport:transport,price:price,amount:amount,datetotal:datetotal}, function (data) {
                        $('#detail'+priceid).remove();
                        $('#showdata').append(data);
                        $('#radio-air-'+priceid).prop("checked", true);
                        calculate_totalPrice();
                        $('#conBtn').show();
                        });
                    
                }
	 //------------------------------------
                function deleteselect(priceid){
                        $('#detail'+priceid).remove();
                        $('#radio-air-'+priceid).prop("checked", false);
                         $('#amount'+priceid).val('1');
                        calculate_totalPrice();
                }
                  //-----------------------------------------
                       function calculate_totalPrice(){		
		   var className = '.priceland';	

		var totalPoints = 0;		
		$(className).each(function(){ 
 
			if($(this).val() ==''){
				
				var numPrice = 0;
				
			} else {
				
				var numPrice = $(this).val();				
				if(numPrice.indexOf(',') != -1){
					numPrice = numPrice.replace(",", "");
				}
				numPrice = parseInt(numPrice); 
				
				console.log('numPrice....'+numPrice);
				totalPoints += numPrice;		console.log('totalPoints....'+totalPoints);
			}
			//$('#'+fieldTotal).val(totalPoints);
		});		
		$('#AllTotalPrice').text(totalPoints.toLocaleString()+'.00');
                $('#totalprice').val(totalPoints);
	}
         //------------------------------------  
		function goConfirm(){
			
                var postData = new FormData($("#landform")[0]);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Welcome/booklanddetail') ?>',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function (data, status) {
                        //console.log(data);
                       // $('#currentID').val(data);
                        if (status == 'success') {
                    $('#DataArea').empty();
                    $('#DataArea').html(data);
                } else {
                         alert('ไม่สามารถบันทึกข้อมูลได้');
                        }
                    }
                });

		}
               
                
	 
	
</script>
