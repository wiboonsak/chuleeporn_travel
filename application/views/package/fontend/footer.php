<!-- Confidence and Subscribe  -->
        <section class="confidence-subscribe">
            <!-- Background -->
            <div class="bg-parallax bg-3"></div>
            <!-- End Background -->
            <div class="container">
                <div class="row cs-sb-cn"  style="background-color: white;">

                    <!-- Confidence -->
                    <div class="col-md-6" style="background-color: white;" align="center">
                        
                          
					<div class="logo-foter" style="padding-top:30px;" >
                                                 
						<h2 style="color: #d83f3f"><?php echo $this->lang->line('Questions');?></h2>
                        <h2 class="text-color">+66 (0) 99-3599635 <br></h2>
                        <h4><a href="mailto:chuleeporntravel2019@gmail.com" class="text-color" target="_blank">chuleeporntravel2019@gmail.com</a></h4>
                        <h4>Line ID: <a href="http://line.me/ti/p/~0993599635" target="_blank">0993599635</a></h4>
                    </div>
					<div style="background-color: white; height: 35px;"></div>		
                       
                    </div>
                    <!-- End Confidence -->
                    <!-- Subscribe -->
                    <div class="col-md-6">
                        <div class="subscribe">
                            <h3><?php echo $this->lang->line('Registertoreceive');?></h3>
                            <p><?php echo $this->lang->line('Signuptoreceive');?> Chuleeporn Travel</p>
                            <!-- Subscribe Form -->
                            <div class="subscribe-form">
                                <form action="#" method="get">
                                    <input type="text" name="sub" id="sub" value="" placeholder="<?php echo $this->lang->line('Enteremail');?>" class="subscribe-input" onChange="checkEmail(this.value)">
                                    <button class="awe-btn awe-btn-5 arrow-right text-uppercase awe-btn-lager" onclick="Add()"><?php echo $this->lang->line('Register');?></button>
                                </form>
                            </div>
                            <!-- End Subscribe Form -->
                            <!-- Follow us-->
                            <div class="follow-us">
                                <h4><?php echo $this->lang->line('Followus');?></h4>
                                <div class="follow-group">
                                    <a href="https://www.facebook.com/Chuleeporn-Travel-102052581269377/" target="_blank" title=""><i class="fa fa-facebook"></i></a>
                                    <a href="" title=""><i class="fa fa-twitter"></i></a>
                                    <a href="" title=""><i class="fa fa-instagram"></i></a>
                                </div>
                            </div> 
                            <!-- Follow us -->
                        </div>
                    </div>
                    <!-- End Subscribe -->

                </div>
            </div>
        </section>
        <!-- End Confidence and Subscribe  -->

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-md-4 ">
                        <div class="logo-foter" style="color: white">
                            <a href="<?php echo base_url('Welcome/index')?>" title="" style="font-size: 22px; color: #FFFFFF; font-family: 'Sarabun', sans-serif;">Chuleeporn Travel</a>
					
                        <h4><i class="fa fa-phone"></i> +66 (0) 99-3599635</h4>
						<h4><i class="fa fa-envelope"></i> <a href="mailto:chuleeporntravel2019@gmail.com" class="text-color" target="_blank">chuleeporntravel2019@gmail.com</a></h4>
                        <h4><i class="fa fa-whatsapp"></i>Line ID: <a href="http://line.me/ti/p/~0993599635" target="_blank">0993599635</a></h4> 
                    </div>
						 </div>
                    <!-- End Logo -->
                    <!-- Navigation Footer -->
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="ul-ft">
                            <ul>
                                <li><a href="<?php echo base_url('Welcome/index')?>" title=""><?php echo $this->lang->line('home');?></a></li>
                                <li><a href="<?php echo base_url('Welcome/index')?>" title=""><?php echo $this->lang->line('Booktran');?></a></li>
                                <li><a href="<?php echo base_url('Welcome/package_list')?>" title=""><?php echo $this->lang->line('package');?></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navigation Footer -->
                    <!-- Navigation Footer -->
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="ul-ft">
                            <ul>
                                
								<li><a href="<?php echo base_url('Welcome/contact')?>" title=""><?php echo $this->lang->line('ContactUs');?></a></li>
                                <li><a href="<?php echo base_url('Welcome/payment')?>" title=""><?php echo $this->lang->line('Payment');?></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navigation Footer -->
                    <!-- Footer Currency, Language -->
                    <div class="col-sm-6 col-md-4">
                        <!--CopyRight-->
						
                        <p class="copyright" style="font-size: 9pt; margin-top: 60px;">
							© 2019 <a href="https://chuleeporntravel.com/" target="_blank">chuleeporntravel.com</a> All rights reserved.<br>Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
                        </p>
                        <!--CopyRight-->
                    </div>
                    <!-- End Footer Currency, Language -->
                </div>
            </div>
        </footer>
        <!-- End Footer -->
         <script type="text/javascript">
                function Add(){
                    var sub = $('#sub').val();
                    if(sub == ''){
                        <?php if($this->session->userdata('weblang') == 'en'){?>
                        alert('Please Enter Email');
                        <?php }else{?>
                         alert('กรุณาใส่ อีเมล์');
                        <?php }?>
                         $('#sub').val('');
                         $('#sub').focus();
                    }else if(sub != ''){
                    $.post('<?php echo base_url('Welcome/subsribe')?>', { sub : sub }, function(data){  
			if(data == '1'){
                             <?php if($this->session->userdata('weblang') == 'en'){?>
                        alert('Thank you for following');
                        <?php }else{?>
                         alert('ขอบคุณสำหรับการติดตาม');
                        <?php }?>
                            $('#sub').val('');
                            $('#sub').focus();
                        }
                                    });
                                 
                                }else{
                                   return false; 
                                }
                
            }
             //-----------------------------
        function checkEmail(email){
			$.post('<?php echo base_url('Welcome/checkemail')?>',{ email:email }, function(data){
			if(data >0){
                            <?php if($this->session->userdata('weblang') == 'en'){?>
				alert('This email already exists.');
                            <?php }else{?>
				alert('อีเมล์นี้สมัครรับข่าวสารแล้ว');
                            <?php }?>
                                $('#sub').val('');
                                $('#sub').focus();
                                return false;
				} ;
			});
		
                    }
                </script>


<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v5.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="102052581269377"
  theme_color="#67b868"
  logged_in_greeting="สวัสดีค่ะ คุณลูกค้าสนใจเช่ารถวันไหนคะ ? กรณีเร่งด่วนกรุณาโทร. 099-359-9635"
  logged_out_greeting="สวัสดีค่ะ คุณลูกค้าสนใจเช่ารถวันไหนคะ ? กรณีเร่งด่วนกรุณาโทร. 099-359-9635">
      </div>