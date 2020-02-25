<?php 
$this->lang->load('content', $this->session->userdata('weblang'));
foreach($getbookland->result() AS $data){}


?>
<div class=" bg-white total-trip clearfix" >
                    <div class="row">
<!-- Payment Room -->
                    <div class="payment-room">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="payment-info">
                                    <h2>CHULEEPORN TRAVEL</h2>
                                   
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                            </div>
                        </div>
                    </div>
                    <!-- Payment Room -->

                    <div class="payment-form">
                        <div class="row form">
						  <div class="col-md-6">
                                <h2><?php echo $this->lang->line('BOOKINGSUMMARY');?></h2>
                             
                                   <div class="row">
                                        <div class="form-search clearfix">
                                            <div class="col-md-12 td-airline" >
                                               <?php foreach ($getlandbookdetail->result() AS $getlandbookdetailhead){}
                                              $getlandtransfer = $this->transport_model->getlandtransfer($getlandbookdetailhead->priceland_id);
                                              foreach ($getlandtransfer->result() AS $getlandtransfer2){}
                 $listPlace = $this->transport_model->listPlace('1',$getlandtransfer2->begin_place_id);
                  foreach ($listPlace->result() AS $listPlace2){}
                  $listPlacereturn = $this->transport_model->listPlace('1',$getlandtransfer2->destination_place_id);
                  foreach ($listPlacereturn->result() AS $listPlacereturn2){}
                if($this->session->userdata('weblang') == 'en'){
                    $dateGo = $this->transport_model->GetEngDatetrue($data->depart_date);
                    $datereturn = $this->transport_model->GetEngDatetrue($data->return_date);
                    $route_name = $listPlace2->place_name_en.' - '.$listPlacereturn2->place_name_en;
                }else{
                    $dateGo = $this->transport_model->GetEngDate($data->depart_date);
                    $datereturn = $this->transport_model->GetEngDate($data->return_date);
                    $route_name = $listPlace2->place_name_th.' - '.$listPlacereturn2->place_name_th;
                }
                                               ?>
												<table class="table" width="100%" style="margin-bottom:10px">
													<tr>
														<td colspan="2" style="background-color:#E1E1E1"><strong><?php echo $this->lang->line('route');?>:</strong> <strong><span id="departName"><?php echo $route_name?></span></strong><br>
												    <span style="color:red;font-size: 12px;" ><span id="dateGo"><?php echo $dateGo?> - <?php echo $datereturn?></span>
														<span id="DepartTime"></span></td>
													</tr>
												</table>
                                           
									</div>
                                                                      <div class="col-md-12 td-airline">
                                                        <?php foreach ($getlandbookdetail->result() AS $landbookdetail){
                                                           $getlandtransfer = $this->transport_model->listtransportland($landbookdetail->transport_id); 
                                                           foreach ($getlandtransfer->result() AS $landtransfer){}
                                                            if($data->datetotal!='0'){
                                                            $total = $landbookdetail->price*$landbookdetail->transport_amount*$data->datetotal;
                                                            }else{
                                                            $total = $landbookdetail->price*$landbookdetail->transport_amount;   
                                                            }
                                                             if($this->session->userdata('weblang') == 'en'){
                                                 $transport_name = $landtransfer->transport_name_en;      
                                                            }else{
                                                 $transport_name = $landtransfer->transport_name_th;
                                                            }
                                                            ?>
                                                   <div id="detail">
          
                                                       <table class="table" width="100%" style="margin-bottom: 10px;">
                <tr >
                   <td colspan="2" style="background-color:#E1E1E1"><?php echo $transport_name?>  </td>
                   </tr>
                    <tr >
                        <td colspan="2" style="background-color:#E1E1E1">(<?php echo number_format($landbookdetail->price,2)?> x <?php echo $landbookdetail->transport_amount?> <?php if($data->datetotal!='0'){?>x <?php echo $data->datetotal?> <?php echo $this->lang->line('Day');?><?php }?>) <span style="float:right"><?php echo number_format($total,2)?></span></td>

                </table>
            </div>
                                                        <?php }?>
                                            </div>
                                           <div class="col-md-12 td-airline" >
												<table class="table" width="100%" style="margin-bottom: 10px;">
													<tr  style="background-color:#E1E1E1">
														<td ><?php echo $this->lang->line('Totalprice');?></td>
														<td  align="right" ><span id="AllTotalPrice"><?php echo number_format($data->total_price,2)?></span></td>
													</tr>
												</table>
								 		 </div>
                                            
                                        </div>
                                    </div>
                                <h2><?php echo $this->lang->line('information');?></h2>
                                <div class="row">
                                        <div class="form-search clearfix">
                                            <div class="col-md-12 td-airline" >
                                              
												<table class="table" width="100%" style="margin-bottom:10px">
													<tr>
                                                                                                            <td colspan="2" width="30%"><strong><?php echo $this->lang->line('customername');?> :</strong></td>
                                                                                                            <td> <?php echo $data->customer_name.' '.$data->customer_Lastname?></td>									
													</tr>
												
													<tr>
													  <td colspan="2" width="30%"><strong><?php echo $this->lang->line('email');?> :</strong></td>
                                                                                                            <td> <?php echo $data->customer_email?></td>
													</tr>
													<tr>
														<td colspan="2" width="30%"><strong><?php echo $this->lang->line('phone');?> :</strong></td>
                                                                                                        <td> <?php echo $data->customer_telephone?></td>
													</tr>
													<tr>
														<td colspan="2" width="30%"><strong><?php echo $this->lang->line('line');?> :</strong></td>
                                                                                                        <td> <?php echo $data->Line_id?></td>
													</tr>
													<tr>
														<td colspan="2" width="30%"><strong><?php echo $this->lang->line('Pickuplocation');?> :</strong></td>
                                                                                                        <td> <?php echo $data->Pickuplocation?></td>
													</tr>
													<tr>
														<td colspan="2" width="30%"><strong><?php echo $this->lang->line('Pickuptime');?> :</strong></td>
                                                                                                        <td> <?php echo $data->Pickuptime?></td>
													</tr>


                </table>
            </div>
                                            </div>

                                        </div>
                                    
                            </div>
                             <div class="col-md-6" id="rightSpace">
                                 <h3><?php echo $this->lang->line('Bookingsuccessful');?>!</h3>
<h3 style="color: red"><?php echo $this->lang->line('BookingID');?>  : <?php echo $data->Booking_id?></h3>
							 
<table style="padding: 20px 0px;" >
  <tr >
    <td style="width:100%; border-top: 2px solid #666;">
     <div style="font-size: 11pt;"><?php echo $this->lang->line('Thecompanyhas');?>: <?php echo $data->customer_email?> <br><?php echo $this->lang->line('Atthistime');?><br><strong style="color:red"><?php echo $this->lang->line('Note');?></strong><br>1. <?php echo $this->lang->line('Bookingviathe');?><br>2. <?php echo $this->lang->line('Pricesmaychange');?></div>
	</td> 
  </tr>
</table>
								 
								 
				<div class="about-text">
                            <div class="about-description">   
                              <table width="100%" border="0" cellspacing="0" cellpadding="0"  style="border:0px;">
								  <tbody>
									<tr>
									  <td height="60" colspan="3" align="center" style="background-color: #666; color: #FFFFFF"><strong> <?php echo $this->lang->line('Payment');?></strong></td>
								    </tr>
									<tr>
									  <td width="32%" height="60" align="center" style="background-color: #00b14f; color: #FFFFFF"><strong>BANK NAME</strong></td>
									  <td width="32%" height="60" align="center" style="background-color: #00b14f; color: #FFFFFF"><strong>ACCOUNT NAME</strong></td>
									  <td width="36%" height="60" align="center" style="background-color: #00b14f; color: #FFFFFF"><strong>ACCOUNT NO.</strong></td>
								    </tr>
									<tr>
									  <td height="60" align="center" style="background-color: #c6eed7;"><?php echo $this->lang->line('KasikornBank');?><br>
								      <?php echo $this->lang->line('Robinson');?></td>
									  <td height="60" align="center" style="background-color: #c6eed7;"><?php echo $this->lang->line('Chuleeporn');?></td>
									  <td height="60" align="center" style="background-color: #c6eed7;">023-8-36459-0</td>
								    </tr>
									<tr>
									  <td height="60" align="center" style="background-color: #97dbb5;"><?php echo $this->lang->line('KrungThai');?> <br>
								      <?php echo $this->lang->line('Punnakan');?> </td>
									  <td height="60" align="center" style="background-color: #97dbb5;"><?php echo $this->lang->line('Chuleeporn');?></td>
									  <td height="60" align="center" style="background-color: #97dbb5;">879-0-32920-1 </td>
								    </tr>
								  </tbody>
								</table>
                           
								<div class="row" style="margin-top: 10px;">
								 <div class="col-md-5" align="center">
									<img src="<?php echo base_url('images/line_id.jpg')?>" alt="chuleeporntravel" title="" style="width: 90%; height: auto" class="img-responsive"/>
								 </div>
							   
								   <div class="col-md-7">
									 <hr>
									 <h4><?php echo $this->lang->line('Payment');?> (<?php echo $this->lang->line('Chooseone');?>)</h4>
									 <p><?php echo $this->lang->line('Proofofpayment');?></p>
                                                                         <p><?php echo $this->lang->line('Calltopay');?></p>
                                                                         <p><?php echo $this->lang->line('Sendproofof');?> <a href="mailto:chuleeporntravel2019@gmail.com" class="text-color" target="_blank">chuleeporntravel2019@gmail.com</a> <?php echo $this->lang->line('Andspecify');?></p>
                                                                         <p><?php echo $this->lang->line('Sendevidence');?> Line ID: <a href="http://line.me/ti/p/~0993599635" target="_blank">0993599635</a></p>
								  </div>
							  </div>
                  </div>
                        </div>
						   </div>
                        </div>

                        <div class="submit text-center">
                          

                        </div>
						
                    </div>
		<!----------------->
						<div>&nbsp;</div>
       </div>

                    </div>