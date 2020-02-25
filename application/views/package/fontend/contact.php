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
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7COpen+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Prompt|Sarabun&display=swap" rel="stylesheet">

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
								<span></span>
								<ins style="font-size: 30pt; margin-top:40px !important">Contact Us</ins>
								<!--<span>Koh Lipe</span>-->
							</div>
						</div>
                        <div class="col-sm-9">
                        <div class="about-text">
                            <h1 style="font-family: 'Sarabun', sans-serif;"><?php echo $this->lang->line('Questions');?></h1>
                            <!--<div class="post post-single">
								<div class="post-meta-share">
									<ul class="post-meta float-left">
										<li><a href="" style="font-size: 18px; color: #2f79b1 !important">Contact Us</a></li></li>
									</ul>
								</div>
							</div>-->
                                    
                            <div class="about-description" style="font-size: 12pt !important">                                
								<p><?php echo $this->lang->line('Youcanask');?></p>

								<p style="padding: 5px 25px;  border-radius: 10px;  background-color: #f1f1f1;"><?php echo $this->lang->line('email');?>: <a href="mailto:chuleeporntravel2019@gmail.com" class="text-color" target="_blank">chuleeporntravel2019@gmail.com</a></p>   
								<p style="padding: 5px 25px;  border-radius: 10px;  background-color: #f1f1f1;"><?php echo $this->lang->line('phone');?>: +66 (0) 99-3599635 </p>                          
								<p style="padding: 5px 25px;  border-radius: 10px;  background-color: #f1f1f1;">Line ID: <a href="http://line.me/ti/p/~0993599635" target="_blank">0993599635</a></p>
								<p style="padding: 5px 25px;  border-radius: 10px;  background-color: #f1f1f1;">Facebook: <a href="https://www.facebook.com/Chuleeporn-Travel-102052581269377/" target="_blank">ChuleepornTravel</a></p>
								<p style="padding: 5px 25px;  border-radius: 10px;  background-color: #f1f1f1;"><?php echo $this->lang->line('office');?></p>
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
			setTopmenySelect('liContact');	

  </script>
</body>
</html>
