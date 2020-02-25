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
												<table class="table" width="100%">
													<tr  style="background-color:#E1E1E1">
														<td ><?php echo $this->lang->line('Totalprice');?></td>
														<td  align="right" ><span id="AllTotalPrice"><?php echo number_format($data->total_price,2)?></span></td>
													</tr>
												</table>
								 		 </div>
                                        </div>
                                    </div>
                            </div>
                             <div class="col-md-6" id="rightSpace">
								<form id="confirmForm" name="confirmForm" method="post">
								
                                <h2><?php echo $this->lang->line('information');?></h2>
                                <div class="form-field">
                                    <input type="text" id="cust_name" name="cust_name" placeholder="<?php echo $this->lang->line('Firstname');?>" class="field-input" value="">
                                </div>
                                <div class="form-field">
                                    <input type="text" id="cust_lastname" name="cust_lastname" placeholder="<?php echo $this->lang->line('lastname');?>" class="field-input"  value="">
                                </div>
                                <div class="form-field">
                                    <input type="text" id="cust_email" name="cust_email" placeholder="<?php echo $this->lang->line('email');?>" class="field-input" value="">
                                </div>
                               
                                <div class="form-field">
                                    <input type="text" id="cust_telephone_num" name="cust_telephone_num" placeholder="<?php echo $this->lang->line('phone');?>" class="field-input"  value="">
                                </div>
                                <div class="form-field">
                                    <input type="text" id="line_id" name="line_id" placeholder="<?php echo $this->lang->line('line');?>" class="field-input"  value="">
                                </div>
                                <div class="form-field">
                                    <input type="text" id="Pickuplocation" name="Pickuplocation" placeholder="<?php echo $this->lang->line('Pickuplocation');?>" class="field-input"  value="">
                                </div>
                                <div class="form-field">
                                    <input type="text" id="Pickuptime" name="Pickuptime" placeholder="<?php echo $this->lang->line('Pickuptime');?>" class="field-input"  value="">
                                </div>
                                <input type="hidden" id="booklandtran_id" name="booklandtran_id" value="<?php echo $data->Booking_id?>">
                            </form>
							 <div class="radio-checkbox">
                                    <input type="checkbox" class="checkbox" id="accept" onChange="enableBooking(this.checked)">
                                    <label for="accept"><?php echo $this->lang->line('Iaccept');?></label>
                             </div>
                           			<button id="btnBooknow" class="awe-btn awe-btn-lager" onClick="booknow()" disabled><?php echo $this->lang->line('book');?><?php echo $this->lang->line('now');?></button>
						   </div>
                        </div>

                        <div class="submit text-center">
                          

                        </div>
						
                    </div>
		<!----------------->
						<div>&nbsp;</div>
       </div>

                    </div>