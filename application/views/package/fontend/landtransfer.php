<!DOCTYPE html>
<!--[if IE 7 ]> <html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>CHULEEPORN TRAVEL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- Font Google -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7COpen+Sans:300,400,600' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Prompt|Sarabun&display=swap" rel="stylesheet">		
        <!-- End Font Google -->
		
        <!-- Library CSS -->
        <link rel="stylesheet" href="<?php echo base_url('html/css/library/font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('html/css/library/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('html/css/library/jquery-ui.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('html/css/library/owl.carousel.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('html/css/library/jquery.mb.YTPlayer.min.css') ?>">
        <!-- End Library CSS -->
        <link rel="stylesheet" href="<?php echo base_url('html/css/style.css') ?>">
		
		<!---modal-------->
 
		<style>
.clockdate-wrapper {
    /*background-color: #333;*/
    background-color:#00b14f;
    padding:0px;
    
    width:100%;
    text-align:center;
    border-radius:5px;
    margin:5 auto;
    margin-top:1%;
}
#clock{
   /* background-color:#930002;*/
	 background-color:#252e1c;
    font-family: sans-serif;
    font-size:25px;
    text-shadow:0px 0px 1px #fff;
    color:#fff;
}
#clock span {
    color:#DCDCDC;
    text-shadow:0px 0px 1px #333;
    font-size:20px;
    position:relative;
    top: 0px;
    left:-3px;
}
#date {
    letter-spacing:10px;
    font-size:14px;
    font-family:arial,sans-serif;
    color:#fff;
}	
		
		</style>
    </head>
    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div class="tb-cell">
                <div id="page-loading">
                    <div></div>
                    <p>Loading</p>
                </div>
            </div>
        </div>

        <!-- Wrap -->
        <div id="wrap">

            <!-- Header -->
            <?php include('header.php'); ?>
            <!-- End Header -->


            <!--Banner-->
            <section class="banner" style="background-image: url(../../../../html/images/background/bg-10.jpg); background-repeat: no-repeat; background-size: cover;">

                <!--Background
                <div class="bg-parallax bg-1"></div>-->
                <!--End Background-->

                <div class="container">

                    <div class="logo-banner text-center">
                        <a href="" title="">
                            <img src="<?php echo base_url('images/logo-header.png') ?>" alt="">
                        </a>
                    </div>

                    <!-- Banner Content -->
                    <div class="banner-cn">
                        <!-- Tabs Content -->
                        <div class="tab-content" style="">
                            <!-- Search Cruise-->
                            <div class="form-cn form-cruise tab-pane active in" id="form-cruise">
                               <div class="row">
									<div class="col-md-8">
								  		<h2><?php echo $this->lang->line('Booktran');?></h2> 
										 <p style="color:red; font-size: 13px;">** <?php echo $this->lang->line('reserve');?></p>
										 <p style="color:red; font-size: 13px;">** <?php echo $this->lang->line('manydays');?></p>
								   </div>
								   <div class="col-md-4">
									   	 <div id="clockdate">
										  <div class="clockdate-wrapper">
											<div id="clock"></div>
											<div id="date"></div>
										  </div>
										</div>
								   </div>
								</div> 

                                    <div class="form-search clearfix">
                                        <div class="form-field field-select field-lenght">
                                            <div class="select">
                                                <span id="formroute"><?php echo $this->lang->line('form');?>:</span>
                                                <select id="routedata" name="routedata"onchange="placedataupdate(this.value,'<?php echo $this->lang->line('to');?>')">
                                                    <option value="">-- <?php echo $this->lang->line('select');?> --</option>
                                                    <?php
                                                        foreach ($getlandList->result() as $routeData2) {
                                                       if($this->session->userdata('weblang') == 'en'){
                                                            $place_name = $routeData2->place_name_en;
                                                       }else{
                                                            $place_name = $routeData2->place_name_th;
                                                       }
                                                        ?>
                                                        <option value="<?php echo $routeData2->begin_place_id ?>"><?php echo $place_name ?> </option>
													<?php } ?>
													
													
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-field field-select field-lenght">
                                            <div class="select">
                                                <span id="formto"><?php echo $this->lang->line('to');?>:</span>
                                                <select id="placedata" name="placedata">
                                                    <option value="">-- <?php echo $this->lang->line('select');?> --</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-field field-date" style="width: 180px;">
                                            <input type="text" class="field-input calendar-input" placeholder="<?php echo $this->lang->line('departdate');?>" id="datedata" name="datedata" autocomplete="off" onchange="calculatedate(this.value)">
                                        </div>
                                        <div class="form-field field-date" style="width: 180px;">
                                            <input type="text" class="field-input calendar-input" placeholder="<?php echo $this->lang->line('returndate');?>" id="returndate" name="returndate" autocomplete="off" onchange="calculatereturndate(this.value)">
                                            <input type="hidden" id="datetotal" name="datetotal" value="">
                                        </div>
                                        <div class="form-field field-select field-adult">
                                            <div class="select">
                                                <span><?php echo $this->lang->line('Adult');?></span>
                                                <select id="Adults" name="Adults">
                                                    <option value="0"><?php echo $this->lang->line('select');?></option>
                                                    <?php for ($a = 1; $a <= 10; $a++) {
                                                        ?>													<option value="<?php echo $a ?>"><?php echo $a ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-field field-select field-children">
                                            <div class="select" >
                                                <span><?php echo $this->lang->line('childen');?></span>
                                                <select id="Children" name="Children">
                                                    <option value="0"><?php echo $this->lang->line('select');?></option>
                                                    <?php for ($a = 1; $a <= 10; $a++) { ?>													<option value="<?php echo $a ?>"><?php echo $a ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-submit">
                                            <button type="button" class="awe-btn awe-btn-medium awe-search" onClick="getRoute()"> <?php echo $this->lang->line('search');?> </button>
                                        </div>
                                        <input type="hidden" id="spanRoute" name="spanRoute" value=""><!--onClick="CheckForm()" -->
                                        <input type="hidden" id="spanTo" name="spanTo" value="">
                                       
                                    </div>
									
                              
                            </div>
                            <!-- End Search Cruise -->   
                        </div>
                        <!-- End Tabs Content -->

                    </div>
                    <!-- End Banner Content -->

                </div>

            </section>
            <!--End Banner-->

            <!-- Sales -->
            <section class="sales">
                <!-- Title -->
                <div class="title-wrap">
                    <div class="container">
                        <div class="travel-title float-left">
                            <h2><?php echo $this->lang->line('Popular');?> </h2><br>
							<span style="font-size: 14pt; color:#FF6E00; font-style: italic;"><?php echo $this->lang->line('Includingpackages');?></span>
                        </div>
                        <a id="btnAllPackage" href="<?php echo base_url('Welcome/package_list') ?>" title="" class="awe-btn awe-btn-5 awe-btn-lager arrow-right text-uppercase float-right"><?php echo $this->lang->line('Allpackages');?></a>
                    </div>
                </div>
                <!-- End Title -->
                <!-- Hot Sales Content -->
                <div class="container">
                    <div class="sales-cn">
						 <div id="preloader2" style="display: none" align="center">
							<div class="tb-cell">
								<div id="page-loading">
									<div></div><?php echo $this->lang->line('Checking');?>
									<p><?php echo $this->lang->line('Loading');?></p>
								</div>
							</div>
						</div>
                        <div class="row" id="DataArea">
                            <!-- HostSales Item -->
                            <?php
                            $packageData = $this->Package_model->getpackageList();
                            foreach ($packageData->result() AS $Data) {
                                 if($this->session->userdata('weblang') == 'en'){
                                $package_name = $Data->package_name_en;
                                }else{
                                $package_name = $Data->package_name_th;
                                }
                                ?>	
                                <div class="col-xs-6 col-md-3">
                                    <div class="sales-item" style="height:465px">
                                        <figure class="home-sales-img">
                                            <a href="<?php echo base_url('Welcome/package_detail/' . $Data->id) ?>" title="">
                                                <img width="293" height="190"src="<?php echo base_url('uploadfile/') . $Data->images_name ?>" alt="">
                                            </a>
                                            <figcaption>
                                                <?php echo $this->lang->line('book');?> <span><?php echo $this->lang->line('now');?></span>
                                            </figcaption>
                                        </figure>
                                        <div class="home-sales-text">
                                            <div class="home-sales-name-places">
                                                <div class="home-sales-name" style="width: 100%;height: 130px">
                                                    <a href="<?php echo base_url('Welcome/package_detail/' . $Data->id) ?>" title="" ><?php echo $package_name ?></a>
                                                </div>
                                                <div class="home-sales-places">
                                                    <a href="" title=""><?php echo $this->lang->line('Thailand');?></a>
                                                </div>
                                            </div>
                                            <hr class="hr">
                                          <?php $txt =''; $txt2 ='';
  $packageoptionData = $this->Package_model->listpackage_option($Data->id);
  $numoption = $packageoptionData->num_rows();
  if ($numoption>0){
      foreach ($packageoptionData->result() AS $Dataoption) {
          
          if($numoption>1){  $txt2 = '<br>'; }
          
          if(($Dataoption->min_person ==1) && ($Dataoption->max_person ==1) && ($numoption ==1)){
              $txt = number_format($Dataoption->adult_price).' '.$this->lang->line('THB').' / 1 '.$this->lang->line('Person').'';
          } else {
          
          $txt = $txt.$Dataoption->min_person.' - '.$Dataoption->max_person.' '.$this->lang->line('Person').' '.number_format($Dataoption->adult_price).' '.$this->lang->line('THB').''.$txt2;
          $txt2 ='';
          }
      }?>      
                <div style="height: 60px; width: 100%; margin-top: 10px;">             
                     <button type="button"  class="btn btn-primary" onClick="window.location.href='<?php echo base_url('Welcome/package_detail/' . $Data->id) ?>'"> <?php echo $txt;?>  </button>
				</div>  							
											
								<!--			
									<button type="button"  class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php //echo $txt;?>" > Price option    </button>-->
<?php /*foreach ($packageoptionData->result() AS $Dataoption) { ?><?php echo $Dataoption->min_person?> - <?php echo $Dataoption->max_person?> PERSON <?php echo $Dataoption->adult_price?> THB   <?php if($numoption>1){?><br><?php } }*/ ?> 
                                  
<?php } ?>
                                        </div>
                                    </div>
                                </div>
<?php } ?>
                            <!-- End HostSales Item -->




                        </div>
                    </div>
                </div>
                <!-- End Hot Sales Content -->
            </section>
            <!-- End Sales -->
<div class="main main-dt" style="margin-top: 50px;">
            <div class="container">
                <div class="main-cn bg-white clearfix">
			
    		<!-- Hotel Content One -->
                    <section class="hotel-content detail-cn" id="hotel-content">
                        <div class="row">                        
                            <div class="col-lg-3 detail-sidebar">
                                <!-- Hight Light -->
                                <div class="hight-light">

                                    <h2><?php echo $this->lang->line('Carbooking');?></h2>
                                    <!-- Vote Text -->
                                    <div class="row">
                                        <!-- Recommend 
                                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-6 vote-text">
                                            <p><span>95</span>%</p>
                                            <small>Member Recommend</small>
                                            <a href="" title="">Read 36 Reviews</a>

                                        </div>
                                        <!-- End Recommend -->
										
                                        <!-- Tripadvitsor
                                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-6  vote-text">
                                            <img src="images/icon-tripadvitsor.png" alt="">
                                            <small>4.5 Very Good</small>
                                            <a href="" title="">145 Reviews</a>
                                        </div>
                                        <!-- End Tripadvitsor -->
										
										<!-- Quote 
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
                                            <hr class="hr">

                                            
                                            <blockquote class="quote-sidebar">
                                                <p>
                                                    Great location tucked behind the Ritz Hotel on Piccadilly. Good value for money. The suite I booked was good.<br>
                                                    <span><b>Daniel Brown</b> - Sweden,  28/3/2013</span>
                                                </p>
                                            </blockquote>
                                            
                                        </div>
										<!-- End Quote -->
                                    </div>
                                    <!-- End Vote Text -->

                                    

                                </div>
                                <!-- End Hight Light -->
                            </div>

                            <!-- Description -->
                            <div class="col-lg-9 hl-customer-like">

                                <h2><?php echo $this->lang->line('Bookingcartransfer');?></h2>
								<p>Chureeporn Travel <?php echo $this->lang->line('Personalcar');?></p>

                                <!-- Custom link field -->
                                <div class="customer-like">
                                    <span class="cs-like-label">
                                        <?php echo $this->lang->line('Travel');?> : 
                                    </span>
                                    <ul>
                                        <li><?php echo $this->lang->line('bothsedans');?></li>
                                    </ul>
                                </div>
                                <!-- End Custom link field -->

                                <!-- Custom link field -->
                                <div class="customer-like">
                                    <span class="cs-like-label">
                                         <?php echo $this->lang->line('Rental');?> :
                                    </span>
                                    <ul>
                                        <li><?php echo $this->lang->line('Rentacar');?></li>
                                    </ul>
                                </div>
                                <!-- End Custom link field -->

                                <!-- Custom link field -->
                                <div class="customer-like">
                                    <span class="cs-like-label">
                                        <?php echo $this->lang->line('Services');?> :
                                    </span>
                                    <ul>
                                        <li><?php echo $this->lang->line('Intown');?></li>
                                    </ul>
                                </div>
                                <!-- End Custom link field -->

                                <!-- Custom link field -->
                                <div class="customer-like">
                                    <span class="cs-like-label">
                                        <?php echo $this->lang->line('book');?> : 
                                    </span>
                                    <ul>
                                        <li><?php echo $this->lang->line('reserve');?><br><font color="red">(<?php echo $this->lang->line('Incaseof');?> <span style="text-decoration: underline"><?php echo $this->lang->line('season');?></span><?php echo $this->lang->line('Pleasecontact');?>)</font></li>
                                    </ul>
                                </div>
                                <!-- End Custom link field -->

                            </div>
                            <!-- End Description -->
                        </div>

                    </section>
                    <!-- End Hotel Content One -->
				</div>
			</div>
			</div>
			<!-- Main -->
        

            <!-- Footer -->
			<?php include('footer.php'); ?>
            <!-- End Footer -->

        </div>

        <!-- Library JS -->
        <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery-1.11.0.min.js') ?>"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery-ui.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('html/js/library/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('html/js/library/owl.carousel.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('html/js/library/parallax.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery.nicescroll.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery.ui.touch-punch.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery.mb.YTPlayer.min.js') ?>"></script>
       <!-- <script type="text/javascript" src="<?php //echo base_url('html/js/library/SmoothScroll.js') ?>"></script>-->
        <!-- End Library JS -->
        <!-- Main Js -->
        <script type="text/javascript" src="<?php echo base_url('html/js/script.js') ?>"></script>
		<script src="https://www.paypalobjects.com/api/checkout.js"></script>
		 <!--modal -->
		
		
        <script type="text/javascript">
		 //---------------------------------
		function calculatereturndate(returndate){
                    var datedata = $('#datedata').val();
                    
			$.post('<?php echo base_url('Welcome/calculatedate')?>' ,{datedata:datedata,returndate:returndate }, function(data){
                            
				$('#datetotal').val(data);
			});
		}	
		function calculatedate(date){
                     $('#returndate').val(date);
			$.post('<?php echo base_url('Welcome/calculatedate')?>' ,{datedata:date,returndate:date }, function(data){
                            
				$('#datetotal').val(data);
			});
		}	
		 //---------------------------------
		function payTransfer(){
			if(confirm('select transfer money payment ?')){
				$.post('<?php echo base_url('Travelcontroller/payBytransfer')?>', { },
					  function(data){
					  	  $('#titleSelectPay').empty();
						  $('#paymentSpace').empty();
						  $('#paymentSpace').html(data);
					
					     if ($(window).width() < 960) {
							$('html, body').animate({
								scrollTop: $("#totalPriceSpan").offset().top
							}, 1000);
						}
					  
				})
			}else{
				return false;
			}
		}
                  //---------------------------------
		function booknow(){

			var custname = $('#cust_name').val(); 
			var custlastname = $('#cust_lastname').val(); 
			var Email = $('#cust_email').val(); 
			var cust_telephone_num = $('#cust_telephone_num').val(); 
			var line_id = $('#line_id').val(); 
			var booklandtran_id = $('#booklandtran_id').val(); 
			var Pickuplocation = $('#Pickuplocation').val(); 
			var Pickuptime = $('#Pickuptime').val(); 

			if(custname.trim()==''){
                        <?php  if($this->session->userdata('weblang') == 'en'){?>
                                alert('Please enter First Name.');
                        <?php }else{?>
                                alert('กรุณาใส่ ชื่อจริง.');
                        <?php }?>
				return false;
			}else if(custlastname.trim()==''){
                        <?php  if($this->session->userdata('weblang') == 'en'){?>
                                alert('Please enter Last Name.');
                        <?php }else{?>
                                alert('กรุณาใส่ นามสกุล.');
                        <?php }?>
				return false;
			}else if(Email.trim()==''){
                        <?php  if($this->session->userdata('weblang') == 'en'){?>
                                alert('Please enter Email.');
                        <?php }else{?>
                                alert('กรุณาใส่ อีเมล์.');
                        <?php }?>
				return false;
			}else if(!validateEmail(Email)) {
                        <?php  if($this->session->userdata('weblang') == 'en'){?>
                                alert('Invalid email.');
                        <?php }else{?>
                                alert('อีเมล์ ไม่ถูกต้อง.');
                        <?php }?>
				return false;	
			}else if(cust_telephone_num.trim()==''){
                        <?php  if($this->session->userdata('weblang') == 'en'){?>
                                alert('Please enter Telephone Number.');
                        <?php }else{?>
                                alert('กรุณาใส่ เบอร์โทรศัพท์.');
                        <?php }?>
				return false;
			}else if(Pickuplocation.trim()==''){
                        <?php  if($this->session->userdata('weblang') == 'en'){?>
                                alert('Please enter Pick up location.');
                        <?php }else{?>
                                alert('กรุณาใส่ สถานที่รับรถ.');
                        <?php }?>
				return false;
			}else if(Pickuptime.trim()==''){
                        <?php  if($this->session->userdata('weblang') == 'en'){?>
                                alert('Please enter Pick up time.');
                        <?php }else{?>
                                alert('กรุณาใส่ เวลาที่รับรถ.');
                        <?php }?>
				return false;
			}else if($('#chkbox').is(':checked')){ 
				
			}else{
				$.post('<?php echo base_url('Welcome/updatebookland')?>',  { custname : custname,custlastname:custlastname,Email:Email,cust_telephone_num:cust_telephone_num,line_id:line_id,booklandtran_id:booklandtran_id,Pickuplocation:Pickuplocation,Pickuptime:Pickuptime }, function(data){
					
						$('#DataArea').empty();
                                                $('#DataArea').html(data);
                                $.post('<?php echo base_url('Welcome/addpdf')?>',  {booklandtran_id:booklandtran_id }, function(data1){
                                              
					$.post('<?php echo base_url('Welcome/send_maillandbook')?>',  {booklandtran_id:booklandtran_id }, function(data2){
                                            if(data2!='0'){
                                                window.open('<?php echo base_url('Welcome/preview_pdf/')?>'+booklandtran_id);
                                            }else{
                                            alert('error booking.');
                                        }
                                            });
                                            
                                            });
				});
			}
			
		}
		 //---------------------------------
		function enableBooking(ischecked){
			//console.log(ischecked)
			if(ischecked==true){
				$('#btnBooknow').attr("disabled", false);
				$('#btnBooknow').addClass("awe-btn-1")
			}else{
				$('#btnBooknow').attr("disabled", true);
				$('#btnBooknow').removeClass("awe-btn-1")
			}
		}
		 //------------------------------------  dateReturn ReturnDepartTime dreturnDate 
		function validateEmail($email) {
			  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			  return emailReg.test( $email );
		}
                 //------------------------------------
		 function showInfo(tranid, tranname){
			$('#myModalLabel').text(tranname);
			$('#myModal .modal-body').empty();

			$.post('<?php echo base_url('Travelcontroller/timetable_detail')?>' , { tranid : tranid , tranname:tranname },function(data){
				$('#myModal .modal-body').html(data);
					//$('#modal_Large33').modal('show'); 
					$('#myModal').modal('show'); 
			})
			
		 }
		
		 //------------------------------------
		 function selectTimeTravel(timeTableID , DepartTime , DepartDuration , priceAdult , priceChild , way , ischecked ){
			   // console.log('ischecked:'+ischecked);
			   if(ischecked==false){
				   $('#radio-air-'+timeTableID).prop('checked', false);
				   clearAllValue(way)
			   }else{
				   $('.'+way).prop('checked', false);
				   $('#radio-air-'+timeTableID).prop('checked', true);
				   //-----calculate price-------------------//
				   var NChild  =  parseInt($('#NChild').val());
				   var NAdult  =  parseInt($('#NAdult').val());
				   var priceAdult = parseInt(priceAdult);
				   var priceChild = parseInt(priceChild);
				   
				   var totalPriceAdultValue = NAdult*priceAdult;
				   var totalPriceChildValue = NChild*priceChild;
				   var totalAll = totalPriceAdultValue+totalPriceChildValue;
				   
				   var totalPriceAdultTXT = totalPriceAdultValue.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				   var totalPriceChildTXT = totalPriceChildValue.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				   var totalAllTXT = totalAll.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				  
				   //console.log('totalPriceAdultValue->'+totalPriceAdultValue+' totalPriceChildValue->'+totalPriceChildValue+' totalAll->'+totalAll+' totalAllTXT->'+totalAllTXT);   DChildPrice
				   
				   if(way=='DEPART'){
					   $('#DepartTotalAdult').text(totalPriceAdultTXT);
					   $('#DepartTotalChildren').text(totalPriceChildTXT);
					   $('#DepartTotalPrice').text(totalAllTXT);
					   $('#DTotalPrice').val(totalAll);
					   $('#TimeIDGo').val(timeTableID);
					   $('#DepartTime').text(' ,'+DepartTime);
					   $('#DAdultPrice').val(priceAdult);
					   $('#DChildPrice').val(priceChild);
					   $('#DepartDuration').text(DepartDuration);
					   
					   
					   
				   }else if(way=="RETURN"){
					   $('#ReturnTotalAdult').text(totalPriceAdultTXT);
					   $('#ReturnTotalChildren').text(totalPriceChildTXT);
					   $('#ReturnTotalPrice').text(totalAllTXT);
					   $('#RTotalPrice').val(totalAll);
					   $('#TimeIDBack').val(timeTableID); 
					   $('#RTotalPrice').val(totalAll); 
					   $('#ReturnDepartTime').text(' ,'+DepartTime)
					   $('#RAdultPrice').val(priceAdult);
					   $('#RChildPrice').val(priceChild); 
					   $('#ReturnDuration').text(DepartDuration);
					   if ($(window).width() < 960) { 
					    $('html, body').animate({
						 	scrollTop: $("#headSumary").offset().top
					 	}, 1000);
					   }
				   }
				   
				   //---------------------------------------// TimeIDGo
			   }
			 	 calculateSumTotal();
			 	 
		 }
		 //------------------------------------
		function calculateSumTotal(){
			 var DTotalPrice = parseInt($('#DTotalPrice').val());
			 var RTotalPrice = parseInt($('#RTotalPrice').val());
			
			 //console.log('calculateSumTotal-> DTotalPrice='+DTotalPrice+' RTotalPrice='+RTotalPrice)
			 if(DTotalPrice==''){ var DTotalPrice = 0; }
			 if(RTotalPrice==''){ var RTotalPrice = 0; }

			 var sumAll = (DTotalPrice+RTotalPrice).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");;
			 
			//console.log('result =>calculateSumTotal-> DTotalPrice='+DTotalPrice+' RTotalPrice='+RTotalPrice)
			 $('#AllTotalPrice').html('<span style="color:red">'+sumAll+'</span>');
			 
		}
		
		 //----------------------------------- routedata placedata DepartTotalAdult 
		 function getRoute(){

			  //-------  
		  var routedata = $('#routedata option:selected').val();
		  var routeName = $('#routedata option:selected').text();
          var placedata = $('#placedata option:selected').val();
		  var placeName = $('#placedata option:selected').text();			 
          var datedata = $('#datedata').val();
          var returndate = $('#returndate').val();
		  var Adults = $('#Adults option:selected').val();
		  var Children = $('#Children option:selected').val();	  
		  var datetotal = $('#datetotal').val();	  
	
		// console.log('Adults->'+Adults+' Children->'+Children+' datedata->'+datedata+' dateReturn->'+dateReturn+' routeName->'+routeName+' placeName->'+placeName)	  
		
           if ((routedata == '')) {
                <?php  if($this->session->userdata('weblang') == 'en'){?>
                    alert('Please Select Form.');
                <?php }else{?>
                    alert('กรุณาเลือก ต้นทาง.');
                <?php }?>
             return false;
           } else if ((placedata == '')) {
                <?php  if($this->session->userdata('weblang') == 'en'){?>
                    alert('Please Select To.');
                <?php }else{?>
                    alert('กรุณาเลือก ปลายทาง.');
                <?php }?>
             return false;
		    } else if ((datedata == '')) {
                 <?php  if($this->session->userdata('weblang') == 'en'){?>
                    alert('Please Select Depart Date.');
                <?php }else{?>
                    alert('กรุณาเลือก วันเดินทางไป.');
                <?php }?>
             return false;
		    } else if ((returndate == '')) {
                    <?php  if($this->session->userdata('weblang') == 'en'){?>
                    alert('Please Select Return Date.');
                <?php }else{?>
                    alert('กรุณาเลือก วันเดินทางกลับ.');
                <?php }?>
             return false;
		  
           } else if ((Adults == '0')) {
                <?php  if($this->session->userdata('weblang') == 'en'){?>
                    alert('Please Select Adult.');
                <?php }else{?>
                    alert('กรุณาเลือก จำนวนผู้ใหญ่.');
                <?php }?>
             return false;
           }else{
               $('#spanRoute').val($('#formroute').text());
               $('#spanTo').val($('#formto').text());
		var travelRound = "oneWay";	 
			 	 //------clear area---------//
				 $('.title-wrap').empty();
				 $('.title-wrap').remove();
				 $('#DataArea').empty();
				 $('#btnAllPackage').hide();
			     //-------loading------------//preloader2
			      $('#preloader2').css('display','block');
				 //-------get route Data------// 
			    
			    // console.log('dateReturn->'+dateReturn)
				 $.post('<?php echo base_url('Travelcontroller/getland')?>',{ idFrom : routedata , idTo : placedata , dateGo : datedata,returndate : returndate , Adults : Adults , Children : Children , travelRound:travelRound , routeName:routeName , placeName:placeName,datetotal:datetotal }, function(data){
					  $('#DataArea').html(data);
					  $('html, body').animate({
						 	scrollTop: $("#Children").offset().top
					 	}, 1000);
				 }) 
			   
        }  		 
				 
	 }
                 //================================== 
	function startTimeen() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    var ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTimeen() }, 500);
}
         //================================== 
	function startTimeth() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    //var ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 24 : hr;
    hr = (hr > 24) ? hr - 24 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec ;
    
    var months = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน ', 'ธันวาคม'];
    var days = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัส', 'ศุกร์', 'เสาร์'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTimeth() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
         //================================== 
		  function 	changeSearchForm(tripType,ischecked){
			  
			  if(tripType=='roundTrip'){
				    $('#dateReturn').val('');
					$("#dateReturn").prop('disabled', false);
					$("#hrid").css("display","none")
			  }else if(tripType=='oneTrip'){ 
				    $('#dateReturn').val('');
				    //$('#dateReturn').hide();
				    $("#dateReturn").prop('disabled', true);
				    $("#dateReturn").css("cursor: not-allowed;");
				    $("#hrid").css("display","block")
			  }
		  }
			
		 // $("input").prop('disabled', true); $("input").prop('disabled', false);	

         //==================================
        function placedataupdate(changeValue,to) {
		//console.log('changeValue->'+changeValue)
		$('#placedata').focus();
        $.post('<?php echo base_url('Welcome/placedataland') ?>', {changeValue: changeValue},
         function (data) {
		 $('#formto').text(to+':');
         $('#placedata').empty();
		 
         $('#placedata').html(data);});
}
          //-------------------------------------
		function setTopmenySelect(idMenu){
			$('.topmenu').removeClass('current-menu-parent');
			$('#'+idMenu).addClass('current-menu-parent');
		}
			setTopmenySelect('liindex');	
        //----------------------------------------------
			
			
			/*
			$("#dateReturn").datepicker({
						minDate: datedata,
						
					});
				 
			
			
			*/
        $(function () {
			$('[data-toggle="tooltip"]').tooltip();
			
			$('#datedata').change(function(){
				var departDate = $('#datedata').val();
				var dateReturn = $('#returndate').val();
				 /*if($('#radio-5').is(':checked')){
					 if(dateReturn==''){
						  $('#dateReturn').val(departDate);
					  }else if(dateReturn!=''){
				 	  		if ($.datepicker.parseDate('dd/mm/yy', departDate ) >  $.datepicker.parseDate('dd/mm/yy', dateReturn)) {
									var departDate = $('#datedata').val();
       								 $('#dateReturn').val(departDate);
					  		}	
					  }
				 }*/
					 $("input#returndate").datepicker('option', 'minDate', departDate);
				
				
			})
		
		});
			
			
			
$( document ).ready( function () {
    <?php  if($this->session->userdata('weblang') == 'en'){?>
	startTimeen();
    <?php }else{?>
        startTimeth();
    <?php }?>
} );
        </script>
        <!-- End Main Js -->
    </body>
</html>
