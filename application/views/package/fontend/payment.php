<!DOCTYPE html>
<!--[if IE 7 ]> <html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" lang="en"> <!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>CHULEEPORN TRAVEL</title>
    <!-- Font Google -->
	<link href="https://fonts.googleapis.com/css?family=Prompt|Sarabun&display=swap" rel="stylesheet">
     <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7COpen+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <!-- End Font Google -->
    <!-- Library CSS -->
    <link rel="stylesheet" href="<?php echo base_url('html/css/library/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('html/css/library/bootstrap.min.css')?>">
           <link href="<?php echo base_url('assets/plugins/sweet-alert/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('html/css/library/jquery-ui.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('html/css/library/owl.carousel.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('html/css/library/jquery.mb.YTPlayer.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('html/css/style.css')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
      	<?php include("header.php"); ?>
        <!-- End Header -->

      
    
         <!--Banner-->
        <section class="banner" style="padding-bottom: 300px !important">

            <!--Background-->
            <div class="bg-parallax bg-1"></div>
            <!--End Background-->

            <div class="container">

                <div class="logo-banner text-center">
                    <a href="<?php echo base_url('Welcome/index')?>" title="">
                        <img src="<?php echo base_url('images/logo-header.png')?>" alt="">
                    </a>
                </div>


            </div>

        </section>
        <!--End Banner-->
        <!-- Main -->
        <div class="sales">
            <div class="container">
                <div class="main-cn about-page bg-white clearfix">

                    <!-- Breakcrumb 
                    <section class="breakcrumb-sc">
                        <ul class="breadcrumb arrow">
                            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                            <li>Tiame Table</li>
                        </ul>
                    </section>
                    <!-- End Breakcrumb -->
                    <!-- About -->
                    <section class="about-cn clearfix">
                       <div class="col-sm-3">
							<div class="about-searved">
								<span>How to</span>
								<ins style="font-size: 40pt; margin-top: 20px !important">Payment</ins>
								<!--<span>Koh Lipe</span>-->
							</div>
						</div>
                        <div class="col-sm-9">
                        <div class="about-text">
                            <h1 style="font-family: 'Sarabun', sans-serif;"><?php echo $this->lang->line('Payment');?></h1>
                            <!--<div class="post post-single">
								<div class="post-meta-share">
									<ul class="post-meta float-left">
										<li><a href="" style="font-size: 18px; color: #f38522; font-family: 'Sarabun', sans-serif;">ช่องทางการชำระเงิน</a></li></li>
									</ul>
								</div>
							</div>-->
                                    
                            <div class="about-description">   
                              <table width="100%" border="0" cellspacing="0" cellpadding="0"  style="border:0px;">
								  <tbody>
									<tr>
									  <td width="32%" height="60" align="center" style="background-color: #00b14f; color: #FFFFFF"><strong>BANK NAME</strong></td>
									  <td width="32%" height="60" align="center" style="background-color: #00b14f; color: #FFFFFF"><strong>ACCOUNT NAME</strong></td>
									  <td width="36%" height="60" align="center" style="background-color: #00b14f; color: #FFFFFF"><strong>ACCOUNT NO.</strong></td>
								    </tr>
									<tr>
									  <td height="60" align="center" style="background-color: #c6eed7;"><?php echo $this->lang->line('KasikornBank');?> <br>
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
									<img src="<?php echo base_url('images/line_id.jpg')?>" alt="Akira Speedboat" title="" style="width: 90%; height: auto" class="img-responsive"/>
								 </div>
							   
								   <div class="col-md-7">
									 <hr>
									 <h4><?php echo $this->lang->line('Payment')?> (<?php echo $this->lang->line('Chooseone')?>)</h4>
									 <p><?php echo $this->lang->line('Proofofpayment')?></p>
									 <ul>
									  <li><?php echo $this->lang->line('Calltopay')?>  +66 (0) 99-3599635</li>
									  <li><?php echo $this->lang->line('Sendproofof')?> <a href="mailto:chuleeporntravel2019@gmail.com" class="text-color" target="_blank">chuleeporntravel2019@gmail.com</a> <?php echo $this->lang->line('Andspecify')?></li>
									  <li><?php echo $this->lang->line('Sendevidence')?> Line ID: <a href="http://line.me/ti/p/~0993599635" target="_blank">0993599635</a></li>
									</ul>
								  </div>
								</div>
                          </div>
                        </div>
						</div>
					</section>
                    <!-- End About -->
                   

                </div>
            </div>
        </div>
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
     <script src="<?php echo base_url('assets/plugins/sweet-alert/sweetalert2.min.js')?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.sweet-alert.init.js')?>"></script>
    <!-- Main Js -->
    <script type="text/javascript" src="<?php echo base_url('html/js/script.js')?>"></script>
    <!-- End Main Js -->
  <script>
	  	//-------------------------------------
		function setTopmenySelect(idMenu){
			$('.topmenu').removeClass('current-menu-parent');
			$('#'+idMenu).addClass('current-menu-parent');
		}
			setTopmenySelect('liHowto');	

  </script>
</body>
</html>
