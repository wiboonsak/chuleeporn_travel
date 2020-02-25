<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <title>CHULEEPORN TRAVEL</title>

    <!-- Font Google -->
   <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7COpen+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <!-- End Font Google -->
    <!-- Library CSS -->
    <link rel="stylesheet" href="<?php echo base_url('html/css/library/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('html/css/library/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('html/css/library/jquery-ui.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('html/css/library/owl.carousel.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('html/css/library/jquery.mb.YTPlayer.min.css')?>">
    <!-- End Library CSS -->
    <link rel="stylesheet" href="<?php echo base_url('html/css/style.css')?>">
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
                  <?php 
                  $keygroup = $this->uri->segment(3);
  $packbookData =$this->Package_model->getbooking($keygroup);
    foreach ($packbookData->result() AS $Databook) {}
    if($this->session->userdata('weblang') == 'en'){
                                $package_name = $Databook->package_name_en;
                                }else{
                                $package_name = $Databook->package_name_th;
                                }
    ?>
        <!-- Header -->
		<?php include("header.php"); ?>
        <!-- End Header -->

        <!--Banner-->
        <section class="sub-banner">
            <!--Background-->
            <div class="bg-parallax bg-1"></div>
            <!--End Background-->
            <!-- Logo -->
            <div class="logo-banner text-center">
                <a href="" title="">
                    <img src="<?php echo base_url('images/logo-header.png')?>" alt="">
                </a>
            </div>
            <!-- Logo -->
        </section>
        <!--End Banner-->

        <!-- Main -->
        <div class="main">
            <div class="container">
                <div class="main-cn bg-white clearfix">
                    <div class="step">
                        <!-- Step -->
                        <ul class="payment-step text-center clearfix">
                            <li class="step-select">
                                <span>1</span>
                                <p><?php echo $this->lang->line('ChoosePackageTour');?></p>
                            </li>
                            <li class="step-select">
                                <span>2</span>
                                <p><?php echo $this->lang->line('YourBooking');?> &amp; <?php echo $this->lang->line('PaymentDetails');?></p>
                            </li>
                            <li class="step-part">
                                <span>3</span>
                                <p><?php echo $this->lang->line('BookingCompleted');?>!</p>
                            </li>
                        </ul>
                        <!-- ENd Step -->
                    </div>
                    <!-- Payment Room -->
                    <div class="payment-room">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="payment-info">
                                   
                                    <h3><?php echo $package_name?></h3>
                                    <span class="star-room">
                                        <i class="glyphicon glyphicon-star"></i>
                                        <i class="glyphicon glyphicon-star"></i>
                                        <i class="glyphicon glyphicon-star"></i>
                                        <i class="glyphicon glyphicon-star"></i>
                                        <i class="glyphicon glyphicon-star"></i>
                                    </span>
                                    <ul>
                                        <li>
                                            <span><?php echo $this->lang->line('departdate');?>:</span>
                                           <?php echo $this->Package_model->GetEngDateTime1($Databook->date_depart);?>
                                        </li>
                                        <li>
                                            <span><?php echo $this->lang->line('Adult');?>:</span>
                                            <?php echo $Databook->customer_adult?>
                                        </li>
                                        <li>
                                            <span><?php echo $this->lang->line('childen');?>:</span>
                                            <?php echo $Databook->customer_child?>
									    </li>
                                    </ul>  
                                     
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="payment-price">
 <?php 
  $packimgData =$this->Package_model->getpackageListall($Databook->package_id);
    foreach ($packimgData->result() AS $Dataimg) {}?>
                                    <figure>
                                        <img src="<?php echo base_url('uploadfile/') . $Dataimg->images_name ?>" alt="">
                                    </figure>
                                    <div class="total-trip">
                                       
                                        <span>
                                           <?php echo $this->lang->line('BookingID');?> : <?php echo $Databook->transfer_keygroup?>
                                            <br>
                                            <?php echo number_format($Databook->total_price)?> <?php echo $this->lang->line('THB');?><small>/ <?php echo $Databook->customer_adult?> <?php echo $this->lang->line('Person');?></small>
                                        </span>
                                       
                                        <p>
                                            <?php echo $this->lang->line('Totalprice');?> : <ins><?php echo number_format($Databook->total_price)?> <?php echo $this->lang->line('THB');?></ins>

                                           <i><?php echo $this->lang->line('Servicecharge');?></i>
                                        </p>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <!-- Payment Room -->

                    <div class="payment-form">
                        <div class="row form">
                            <div class="col-md-6">
                                <h2><?php echo $this->lang->line('information');?></h2>
                                
                                <ul>
                                     <li>
                                          <span><?php echo $this->lang->line('Firstname');?> :</span>
                                           <?php echo $Databook->customer_name?>
                                     </li>
                                     <li>
                                         <span><?php echo $this->lang->line('lastname');?> :</span>
                                          <?php echo $Databook->customer_Lastname?>
                                     </li>
                                     <li>
                                         <span><?php echo $this->lang->line('email');?> :</span>
                                          <?php echo $Databook->customer_email?>
									 </li>
                               		 <li>
                                         <span><?php echo $this->lang->line('line');?> :</span>
                                          <?php echo $Databook->customer_telephone?>
									 </li>
                                </ul>  
                                    
                                <?php if($Databook->not_travel == 1){?>
                                <div class="radio-checkbox">
                                    <input type="checkbox" class="checkbox" id="accept" name="accept" checked disabled>
                                    <label for="accept"><?php echo $this->lang->line('Iaccept');?></label>
                                </div>
                                <?php }?>
                            </div>
                             <div class="col-md-6">
                                <h2><?php echo $this->lang->line('YourBooking');?>.</h2>
                                <p><?php echo $this->lang->line('Youwillreceive');?>
                                <br><br>
                                <?php echo $this->lang->line('Incaseyou');?>
                                </p>
                            </div>
                        </div>

                        <div class="submit text-center">
                            <p>
                                <?php echo $this->lang->line('Byselecting');?> <span><?php echo $this->lang->line('rules');?> &amp; <?php echo $this->lang->line('restrictions');?> &amp; <?php echo $this->lang->line('conditions');?></span> , <?php echo $this->lang->line('and');?> <span><?php echo $this->lang->line('privacy');?></span>.
                            </p>


<!--							<a href="<?php //echo base_url('Welcome/email_book_package/'.$Databook->transfer_keygroup)?>" target="_blank"><button class="awe-btn awe-btn-1 awe-btn-lager" >PRINT PACKAGE BOOKING</button></a>-->
                            <button class="awe-btn awe-btn-1 awe-btn-lager" onclick="sendmail('<?php echo $Databook->transfer_keygroup?>')" ><?php echo $this->lang->line('Printpackage');?></button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Main -->
 <!-- Footer -->
        <?php include("footer.php"); ?>
        <!-- End Footer -->
    </div>
    
    <!-- Library JS -->
     <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery-1.11.0.min.js')?>"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery-ui.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('html/js/library/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('html/js/library/owl.carousel.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('html/js/library/parallax.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery.nicescroll.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery.ui.touch-punch.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('html/js/library/jquery.mb.YTPlayer.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('html/js/library/SmoothScroll.js')?>"></script>
    <!-- End Library JS -->
    <!-- Main Js -->
    <script type="text/javascript" src="<?php echo base_url('html/js/script.js')?>"></script>
    <!-- End Main Js -->
    <script type="text/javascript">
                     //==================================
    function sendmail(keygroup) {
 
           $.post('<?php echo base_url('Welcome/send_mail')?>' , { keygroup : keygroup } , function(data){
							//console.log(data);
							if(data == 1){
									
									var url = '<?php echo base_url('Welcome/email_book_package/')?>'+keygroup;                 window.open(url) ;
                                                       window.location.href = "<?php echo base_url('Welcome/index') ?>";
							}
						});
        }
    
    	//-------------------------------------
		function setTopmenySelect(idMenu){
			$('.topmenu').removeClass('current-menu-parent');
			$('#'+idMenu).addClass('current-menu-parent');
		}
			setTopmenySelect('liPackage');	
    </script>
</body>
</html>
