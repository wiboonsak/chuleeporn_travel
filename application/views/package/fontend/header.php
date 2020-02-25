<!-- Header -->
<?php $this->lang->load('content', $this->session->userdata('weblang'));?>
        <header id="header" class="header" style="height: 120px !important">
            <div class="container">
						<div class="follow-us" style="padding-top: 10px; z-index: 999999999999; position: relative; right: 10px" >
                                <div class="follow-group">
                                    <a href="<?php echo base_url('switchLang/index/th')?>" style="width: 30px; height: 30px; line-height: 25px; color: #666; font-size: 16px; <?php if($this->session->userdata('weblang') == 'th'){?> background-color: #ffbc00; cursor: none; <?php }else{?> background-color: #ccc; cursor: pointer;<?php }?> text-decoration: none;  float: right !important"> TH </a>
                                    <a href="<?php echo base_url('switchLang/index/en')?>" style="width: 30px; height: 30px; line-height: 25px; color: #666; font-size: 16px; <?php if($this->session->userdata('weblang') == 'en'){?> background-color: #ffbc00; cursor: none; <?php }else{?> background-color: #ccc; cursor: pointer;<?php }?> text-decoration: none; float: right !important"> EN </a>
                                </div>
                         </div>
				<!--<div class="row" style=" padding-top: 10px; position: relative; z-index: 99999999999 !important">
					<div class="col-sm-5">
						<div class="follow-us" style="line-height: 25px; width: 30px; height: 30px;">
                                <div class="follow-group">
                                    <a href="https://www.facebook.com/Chuleeporn-Travel-102052581269377/" target="_blank" title=""><i class="fa fa-facebook"></i></a>
                                    <a href="" title=""><i class="fa fa-twitter"></i></a>
                                    <a href="" title=""><i class="fa fa-instagram"></i></a>
                                </div>
                         </div> 
					</div>
					<div class="col-sm-6">
						<div style="float: right; font-size: 14pt">
							<i class="fa fa-phone"></i> <a href="tel:+660993599635" style="text-decoration: none">(0) 99-3599635</a> &nbsp;&nbsp; <img src="../../../../html/images/line-logo.png"> <a href="http://line.me/ti/p/~0993599635" target="_blank"  style="text-decoration: none">0993599635</a>&nbsp;&nbsp;
						</div>
					</div>
					
					<div class="col-sm-12">						
						 
					</div>
					
						<div class="follow-us" style="z-index: 99999; position: absolute; right: 10px" >
                                <div class="follow-group">
                                    <a href="<?php echo base_url('switchLang/index/th')?>" style="width: 30px; height: 30px; line-height: 25px; color: #666; font-size: 16px; background-color: #ffbc00; text-decoration: none; cursor: pointer; float: right !important"> TH </a>
                                    <a href="<?php echo base_url('switchLang/index/en')?>" style="width: 30px; height: 30px; line-height: 25px; color: #666; font-size: 16px; background-color: #ccc; text-decoration:none; cursor: pointer; float: right !important"> EN </a>
                                </div>
                         </div>
                </div>-->
                <!-- Logo -->
                <div class="logo float-left">
                    <a href="<?php echo base_url('Welcome/index')?>" title=""><img src="<?php echo base_url('images/logo-header.png')?>" alt=""></a>
                </div>
                <!-- End Logo -->
                <!-- Bars -->
                <div class="bars" id="bars"></div>
                <!-- End Bars -->

                <!--Navigation-->
                <nav class="navigation nav-c" id="navigation" data-menu-type="1200"  style="padding-top: 60px; !important">
                    <div class="nav-inner">
                        <a href="#" class="bars-close" id="bars-close">Close</a>
                        <div class="tb">
                            <div class="tb-cell">
                                <ul class="menu-list text-uppercase">
                                    <li id="liindex" class="topmenu"><a href="<?php echo base_url('Welcome/index')?>" title=""><?php echo $this->lang->line('Booktran');?></a></li>
                                    
                                    <li id="lirate" class="topmenu"><a href="<?php echo base_url('Welcome/rate')?>"><?php echo $this->lang->line('rates');?></a></li>
									<li id="liPackage" class="topmenu"><a href="<?php echo base_url('Welcome/package_list')?>" title=""><?php echo $this->lang->line('package');?></a></li>   									
                                    <li id="liHowto" class="topmenu"><a href="<?php echo base_url('Welcome/payment')?>" title=""><?php echo $this->lang->line('Payment');?></a></li>   
                                    <li id="liContact" class="topmenu"><a href="<?php echo base_url('Welcome/contact')?>" title=""><?php echo $this->lang->line('ContactUs');?></a></li> 
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                </nav>
                <!--End Navigation-->
                
				
            </div>
        </header>
        <!-- End Header -->