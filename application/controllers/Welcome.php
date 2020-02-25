<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('Package_model');
        $this->load->model('transport_model');
        $this->load->model('Partner_api_model');
          if($this->session->userdata('weblang')==''){
			 $this->session->set_userdata('weblang', 'en');
		 }
    }
        //-------------------	
    public function index() {
		$partnerID = '1';
	$rout_active ='1';
	$routeID='';
         $data['listLand'] = $this->transport_model->listLand($rout_active,$routeID,$partnerID);
          $data['getlandList'] = $this->Package_model->getlandList();
        $this->load->view('package/fontend/landtransfer',$data);
    }
    //-------------------	
	public function testpage(){
		$this->load->view('package/fontend/RoutebookingSumary');
	}
	 //-------------------	
    public function package_list() {
        $this->load->view('package/fontend/package_list');
    }
        //-------------------	
    public function package_detail($currentid=null) {
        $data['currentID'] = $currentid;
        $this->load->view('package/fontend/package_detail',$data);
    }
             //-------------------	
    public function book_package($currentid=null) {
        $data['currentID'] = $currentid;
        $this->load->view('package/fontend/book_package',$data);
    }
             //-------------------	
    public function book_package_comfirm($currentid=null) {
        $data['currentID'] = $currentid;
        $this->load->view('package/fontend/book_package_comfirm',$data);
    }
             //-------------------	
    public function timetable() {
        $this->load->view('package/fontend/timetable');
    }
             //-------------------	
    public function payment() {
        $this->load->view('package/fontend/payment');
    }
             //-------------------	
    public function contact() {
        $this->load->view('package/fontend/contact');
    }
             //-------------------	
    public function charter_boat() {
        $partnerID = '1';
	$dataID ='';
         $data['listcharter'] = $this->transport_model->loadcharter($partnerID,$dataID);
        $this->load->view('package/fontend/charter_boat',$data);
    }
              //-------------------	
    public function landtransfer() {
        $partnerID = '1';
	$rout_active ='1';
	$routeID='';
         $data['listLand'] = $this->transport_model->listLand($rout_active,$routeID,$partnerID);
          $data['getlandList'] = $this->Package_model->getlandList();
        $this->load->view('package/fontend/landtransfer',$data);
    }
             //-------------------	
    public function email_book_transport() {
        $this->load->view('package/fontend/email_book_transport');
    }
            //------------------------------- 	
    public function AddBooking() {
        $Departing = $this->input->post('Departing');
        $Adults = $this->input->post('Adults');
        $Children = $this->input->post('Children');
        $Name = $this->input->post('Name');
        $Last = $this->input->post('Last');
        $Email = $this->input->post('Email');
        $Line = $this->input->post('Line');
        $Phone = $this->input->post('Phone');
        $currentID = $this->input->post('currentID');
        $price = $this->input->post('price');
        $accept = $this->input->post('accept');
          if(($Departing != '')&&($Departing!= '0000-00-00')){
			
			$dateArray = explode("/",$Departing);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$Departing = $year."-".$mon."-".$date;
		/*} else {
			$txtWhere2 = '';*/
         }
        $keygroup = $this->Package_model->generateRandomString();
        $ch_keygroup = $this->Package_model->check_keygroup($keygroup);
        if($ch_keygroup >0){
            $keygroup = $this->Package_model->generateRandomString();
        }        
        $result_id = $this->Package_model->AddBooking($Departing, $Adults, $Children, $Name ,$Last,$Email,$Line,$Phone,$currentID,$price,$keygroup,$accept);
        if($result_id==1){$result_id = $keygroup;}
        echo $result_id;
//         '............................',$Departing,$Adults,$Children,$Name,$Last,$Email,$Line,$Phone;
    }
               //-------------------	
    public function email_book_package($keygroup=null) {
        $data['keygroup'] = $keygroup;
        $this->load->view('package/fontend/email_book_package',$data);
    }
    //-------------------
	public function send_mail(){
            $this->lang->load('content', $this->session->userdata('weblang'));
		$txt='';
		/*$emaildata = $this->input->post('email');
		$typedata = $this->input->post('type');
		$userID = $this->input->post('userID');*/		
		$keygroup = $this->input->post('keygroup');				
             $checkinData = $this->Package_model->getbooking($keygroup);
             foreach($checkinData->result() as $Data){} 
             if($this->session->userdata('weblang') == 'en'){
                 $package_name = $Data->package_name_en;
             if ($Data->cf_status == 1){ $txt='Pending';}else if($Data->cf_status == 2){ $txt='Confirm';}else{ $txt='Cancel';} 
             }else{
                 $package_name = $Data->package_name_th;
             if ($Data->cf_status == 1){ $txt='รอดำเนินการ';}else if($Data->cf_status == 2){ $txt='ยืนยัน';}else{ $txt='ยกเลิก';}
             }
             $table = 'tbl_package_booking';
		$key_value1 = $this->Package_model->generateRandomString();	
		$key_value3 = $this->Package_model->generateRandomString();	
		$date1 = date("d");
		$key_value2 = $key_value1.$keygroup.'#'.$date1.$key_value3;		
		
		$from_email = 'chuleeporntravel2019@gmail.com';
		$subject = "Booking Package ใบแจ้งการจองแพ็คเกจ";		
		//$to_email = $editor_data2->email;
		//$to_email = $emaildata;
		$to_email = $Data->customer_email;
		$email_body = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking Package</title>
<style>
	body{
		margin: 15px 0px 0px;
		
	}
	tr td{
		font-family: tahoma, serif;
		font-size: 10pt;
		color: #56201D; 
	}
</style>
</head>
        <link href="'.base_url().'assets/css/icons.css" rel="stylesheet" type="text/css" />
                <link href="'.base_url().'assets/css/style.css" rel="stylesheet" type="text/css" />
                 <link href="'.base_url().'assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr width="100%">
      <td width="100%" bgcolor="#E7E7E7" colspan="2"><img src="'.base_url().'images/logo-header.png" align="center" width="200"  style="margin-top: -55px; padding-left: 15px;"></td>
      
    </tr>
    <tr>
      <td  colspan="2" bgcolor="#E7E7E7"><table width="90%"  border="0" cellspacing="2" align="center" cellpadding="0" bgcolor="#FFFFFF">
        <tbody>
          <tr>
            <td width="19%" height="25" align="right"><strong>'.$this->lang->line('customername').' : </strong></td>
            <td height="25" colspan="5" align="left">'.$Data->customer_name.' '.$Data->customer_Lastname.'</td>
          </tr>
          <tr>
            <td height="25" align="right"><strong>'.$this->lang->line('phone').' : </strong></td>
            <td width="19%" height="25" align="left">'.$Data->customer_telephone.'</td>
            <td width="9%" height="25" align="left"><strong>'.$this->lang->line('email').' : </strong></td>
            <td width="28%" height="25" align="left">'.$Data->customer_email.'</td>
            <td width="10%" height="25" align="left"><strong>'.$this->lang->line('line').' : </strong></td>
            <td width="15%" height="25" align="left">'.$Data->IDLine.'</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="197" colspan="2" bgcolor="#E7E7E7"><table width="90%" align="center" border="0" cellspacing="4" cellpadding="0" bgcolor="#FFFFFF">
              
        <tbody>
          <tr>
            <td width="40%" height="25" align="right"><strong>'.$this->lang->line('BookingID').' : </strong></td>
            <td width="62%" height="25" align="left">'.$keygroup.'</td>
          </tr>
          <tr>
            <td height="25" align="right"><strong>'.$this->lang->line('package').' : </strong></td>
            <td height="25" align="left">'.$package_name.'</td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong>'.$this->lang->line('departdate').' : </strong></td>
            <td height="25" align="left">'.$this->transport_model->GetEngDate($Data->date_depart).'</td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong>'.$this->lang->line('Adult').' : </strong></td>
            <td height="25" align="left">'.$Data->customer_adult.'</td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong>'.$this->lang->line('childen').' (3-10 '.$this->lang->line('year').') : </strong></td>
            <td height="25" align="left">'.$Data->customer_child.'</td>
          </tr>
            <tr>
            <td width="40%" height="25" align="right"><strong>'.$this->lang->line('Totalprice').' : </strong></td>
            <td height="25" align="left">'. number_format($Data->total_price).'</td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong>'.$this->lang->line('status').' : </strong></td>
            <td height="25" align="left">'.$txt.'</td>
          </tr>
          </tbody>
      </table></td>
    </tr>
    <tr>
      <td bgcolor="#B8B8B8"><img src="" align="left" width="287" height="97"/></td>
      <td align="right" bgcolor="#B8B8B8"><img src="" style="padding-right: 50px;" /></td>
    </tr>
  </tbody>
</table>
</body>
</html>';	 	
		
//		$this->email->from($from_email, 'Booking Package Moonlight Travel'); 
//        $this->email->to($to_email);
//        $this->email->subject($subject); 
//       	$this->email->message($email_body); 
//        //Send mail 
//		//$this->email->send();  
//		if($this->email->send()){ 
                    $subject = "[".$this->lang->line('ForAdmin')."] Booking Package ใบแจ้งการจองแพ็คเกจ";		
                    $this->email->from($from_email, 'Booking Package ใบแจ้งการจองแพ็คเกจ'); 
        $this->email->to($from_email);
        $this->email->subject($subject); 
       	$this->email->message($email_body); 
        if($this->email->send()){
            $this->linenotifypack($keygroup);
		   	$result2 = 1;			
        }	
          	$result = $result2;  
       // }			
		echo $result;		
	}		
	//-------------------
        public function totaladult() {
        $Adults = $this->input->post('Adults');
        $currentID = $this->input->post('currentID');
        $result = $this->Package_model->totaladult($Adults,$currentID);
        echo $result;	
        
}
         //-----------------------------------------trip_list dateReturn 
    public function trip_list() { 
		
		redirect(base_url('Welcome/'), 'refresh');
		
        $Adults = $this->input->post('Adults');
        $Children = $this->input->post('Children');
        $Total = $Adults+$Children;
        $data['routedata'] = $this->input->post('routedata');
        $data['placedata'] = $this->input->post('placedata');
        $data['datedata'] = $this->input->post('datedata');
        $data['dateReturn'] = $this->input->post('dateReturn');
        $data['Adults'] = $Adults;
        $data['Children'] = $Children;
        $data['Total'] = $Total;
        $data['spanRoute'] = $this->input->post('spanRoute');
        $data['spanTo'] = $this->input->post('spanTo');
        $data['idroute'] = $this->input->post('idroute');
		
		$data['routeData'] = $this->Package_model->getrouteList();
		
		$rout_active='1';
		$routeID='';
		
		if(!isset($data['routedata'])){
			 redirect(base_url(), 'refresh');
		}else{ 
        	$this->load->view('package/fontend/trip_list',$data);
		}
		
    }
        //------------------dataID changeValue //
	public  function placedataupdate(){
		$changeValue = $this->input->post('changeValue');
		//$changeValueArray = explode(",",$changeValue);
		
		//$beginPlace = $changeValueArray[0];
		//$partnerID = $changeValueArray[1];
		
		$placeData = $this->input->post('placeData');
		
		$result = $this->Package_model->placedataupdate($changeValue);?>


                 <option value="">- เลือกปลายทาง -</option>
            <?php $select3 ='';    
            foreach ($result->result() as $result2){
                 if($result2->destination_place_id  == $placeData){ $select3 = 'selected';}?>
		<option value="<?php echo $result2->destination_place_id ?>"<?php echo $select3?>><?php echo $result2->place_name_en ?></option>
                <?php $select3 ='';  }
         }
	
	
      //------------------dataID changeValue //
	public  function transportDetail(){
		$transportID = $this->input->post('transportID');
		$transportData = $this->Package_model->list_transportData($transportID);
                foreach ($transportData->result() as $transportData2){}?>

	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 18px; font-weight: bold;"><?php echo $transportData2->transport_name_en?> Information
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		</h5>
      </div>
      <div class="modal-body">
		  
		  <div class="row">
    <!--<div><h5><?php //echo $transportData2->transport_name_en?> Information</h5></div>
    <div>--><p class="col-12" style="padding-left: 15px; padding-bottom: 15px;"><?php echo $transportData2->transport_info_en?></p>
        <?php  $imglist = $this->Package_model->loadImg3($transportID);
        foreach ($imglist->result() AS $data) {?>
    <!--<div >--><div class="col-12 col-sm-6"><img class="img-fluid" src="<?php echo base_url('uploadfile/').$data->images?>"></div><!--</div>
    </div>-->
                <?php }?>
               </div>
		  
        
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>



        <?php }
     //---------------------------------
	public  function mapDetail(){
		$routeID = $this->input->post('routeID');
		$listRoute = $this->transport_model->listRoute($routeID);
                foreach ($listRoute->result() as $listRoute4){}?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
		  <div class="row">
    <img src="<?php echo base_url('uploadfile/').$listRoute4->route_image?>" class="img-responsive">
               </div>
		  
        
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>



        <?php }
      //------------------dataID changeValue //
	public  function selecttrip(){
                $timesid = $this->input->post('timesid');
                $transportid = $this->input->post('transportid');
                $priceAdults = substr($this->input->post('priceAdults'),1);
                $priceChildren = substr($this->input->post('priceChildren'),1);
                $pricetotal = $this->input->post('pricetotal');
                $Adults = $this->input->post('Adults');
                $Children = $this->input->post('Children');
                $datedata = $this->input->post('datedata');
                $routeid = $this->input->post('routeid');
                 if(($datedata != '')&&($datedata!= '0000-00-00')){
			
			$dateArray = explode("/",$datedata);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$datedata = $year."-".$mon."-".$date;
		/*} else {
			$txtWhere2 = '';*/
         }
        $keygroup = $this->Package_model->generateRandomString();
        $ch_keygroup = $this->Package_model->check_keygroup($keygroup);
        if($ch_keygroup >0){
            $keygroup = $this->Package_model->generateRandomString();
        }        
                $selecttrip = $this->Package_model->selecttrip($timesid,$transportid,$priceAdults,$priceChildren,$pricetotal,$Adults,$Children,$datedata,$routeid,$keygroup);
                 if($selecttrip == 1){$selecttrip = $keygroup;}
                echo $selecttrip;
         }
    //-------------------	
    public function book_transport($keygroub=null) {
        $data['keygroub'] = $keygroub;
        $this->load->view('package/fontend/book_transport',$data);
    }
                //------------------------------- 	
    public function AddBookingTransport() {
        $Name = $this->input->post('Name');
        $Last = $this->input->post('Last');
        $Email = $this->input->post('Email');
        $Line = $this->input->post('Line');
        $Phone = $this->input->post('Phone');
        $keygroub = $this->input->post('keygroub');
        $accept = $this->input->post('accept');
       
        $result_id = $this->Package_model->AddBookingTransport($Name ,$Last,$Email,$Line,$Phone,$keygroub,$accept);
        if($result_id==1){$result_id = $keygroub;}
        echo $result_id;
//         '............................',$Departing,$Adults,$Children,$Name,$Last,$Email,$Line,$Phone;
    }
    //-------------------	
    public function book_transport_comfirm($keygroub=null) {
        $data['keygroub'] = $keygroub;
        $this->load->view('package/fontend/book_transport_comfirm',$data);
    }    
       //-------------------
	public function send_mailtransport(){	 
		$txt=''; $r='';		
		$keygroup = $this->input->post('keygroup');	
                //echo '.................................'.$keygroup;
             $getbooking_title = $this->Package_model->getbooking_title($keygroup);
                        foreach ($getbooking_title->result() AS $getbooking_title2) { }
                        $adultstravel = $getbooking_title2->adult_traveller;
                        $childtravel = $getbooking_title2->child_traveller;
                        $totalpeople = $adultstravel+$childtravel;
             if ($getbooking_title2->cf_status == 1){ $txt='Pending';}else if($getbooking_title2->cf_status == 2){ $txt='Confrimed ';}else{ $txt='Cancel';}
              $route_id = $getbooking_title2->route_id;
          $list_route = $this->transport_model->listRoute($r,$route_id);
          foreach ($list_route->result() AS $list_route2) {}
          $list_placebegin = $this->Package_model->list_placeData($list_route2->begin_place_id);
                        foreach ($list_placebegin->result() AS $list_placebegin2) {}
           $list_placedes = $this->Package_model->list_placeData($list_route2->destination_place_id);
                        foreach ($list_placedes->result() AS $list_placedes2) {}
              $Routetype = $this->transport_model->get_routeType($route_id, $getbooking_title2->route_type_id, $r, 'yes', 'id');
foreach ($Routetype->result() as $Data){}
$dayofweek = date('l', strtotime($getbooking_title2->date_depart));
$times = $this->transport_model->get_timeDetail($r,$r,$r,$r,$getbooking_title2->time_id);	
						   //$numTime = $times->num_rows();
                                                   
						   //if($numTime >0){						   	
                                                                foreach($times->result() as $times2){}  
						   		$times1 = date('H:i', strtotime($times2->arrive_time.'+'.$Data->transfer_h_time.' hours'));	
						   		$times1 = date('H:i', strtotime($times1.'+'.$Data->transfer_m_time.' minutes'));
             $table = 'tbl_package_booking';
		$key_value1 = $this->Package_model->generateRandomString();	
		$key_value3 = $this->Package_model->generateRandomString();	
		$date1 = date("d");
		$key_value2 = $key_value1.$keygroup.'#'.$date1.$key_value3;		
		
		$from_email = 'chuleeporntravel2019@gmail.com';
		$subject = "Booking Transport ใบแจ้งการจองเรือ";		
		//$to_email = $editor_data2->email;
		//$to_email = $emaildata;
		$to_email = $getbooking_title2->cust_email;
		$email_body = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking Package</title>
<style>
	body{
		margin: 15px 0px 0px;
		
	}
	tr td{
		font-family: tahoma, serif;
		font-size: 10pt;
		color: #56201D; 
	}
</style>
</head>
<body>      
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td height="120" bgcolor="#E7E7E7"><img src="'.base_url().'html/images/email/logo-trip.png" align="left" width="550" height="127" style="margin-top: -55px; padding-left: 15px;"></td>
      <td align="right" bgcolor="#E7E7E7"><img src="'.base_url().'html/images/email/promotion.png" width="167" height="58"  style="padding-right: 50px;" /></td>
    </tr>
    <tr>
      <td height="70" colspan="2" bgcolor="#E7E7E7"><table width="90%"  border="0" cellspacing="2" align="center" cellpadding="0" bgcolor="#FFFFFF">
        <tbody>
          <tr>
            <td width="19%" height="25" align="right"><strong>CUSTOMER NAME  :</strong></td>
            <td height="25" colspan="5" align="left">'.$getbooking_title2->cust_name.' '.$getbooking_title2->cust_lastname.'</td>
          </tr>
          <tr>
            <td height="25" align="right"><strong>TEL :</strong></td>
            <td width="19%" height="25" align="left">'.$getbooking_title2->cust_telephone_num.'</td>
            <td width="9%" height="25" align="left"><strong>EMAIL  :</strong></td>
            <td width="28%" height="25" align="left">'.$getbooking_title2->cust_email.'</td>
            <td width="10%" height="25" align="left"><strong>ID LINE :</strong></td>
            <td width="15%" height="25" align="left">'.$getbooking_title2->cust_line.'</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="197" colspan="2" bgcolor="#E7E7E7">
       <table width="90%" align="center" border="0" cellspacing="4" cellpadding="0" bgcolor="#FFFFFF">
        <tbody>
          <tr>
            <td width="40%" height="25" align="right"><strong>BOOKING ID :</strong></td>
            <td width="62%" height="25" align="left">'.$keygroup.'</td>
          </tr>
          <tr>
            <td height="25" align="right"><strong>ROUTING :</strong></td>
            <td height="25" align="left">'.$list_placebegin2->place_name_en.'  to  '. $list_placedes2->place_name_en.'</td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong>DEPARTING :</strong></td>
            <td height="25" align="left">'. $dayofweek.','. $this->Package_model->GetEngDateTime2($getbooking_title2->date_depart).'</td>
          </tr>
          <tr>  
            <td width="40%" height="25" align="right"><strong>TIME :</strong></td>
            <td height="25" align="left">'.$times2->arrive_time.' > '. $times1.'</td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong>ADULT :</strong></td>
            <td height="25" align="left"> '.$adultstravel.'</td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong>CHILDREN (3-10 YEARS) :</strong></td>
            <td height="25" align="left"> '. $childtravel.'</td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong>PAYMENT TOTAL : </strong></td>
            <td height="25" align="left">'. number_format($getbooking_title2->total_price).' THB</td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong>STATUS : </strong></td>
            <td height="25" align="left">'.$txt.'</td>
          </tr>
          
          <tr>
            <td colspan="2">
            	<!------ Trip Detail ------->         
       			<div style="margin:0 auto; padding: 10px; background-color: #FFFFFF; width: 84%">            
				 <h2 class="title-detail" style="color: #2f79b1;">Trip Details:</h2>
				 <!-- Accordion -->
					  <div class="panel-group no-margin" id="accordion">
								  <!-- Accordion 1 -->
								  <div class="panel">
									 <div id="collapseOne" class="panel-collapse collapse in" aria-labelledby="headingOne">';
                                                                         
                                                  $checkDetail = $this->transport_model->checkDetail($getbooking_title2->time_id);
                                                    $a =0; 
                                                 $priceArray = explode("/",$getbooking_title2->adult_price);
                                                 $priceArray2 = explode("/",$getbooking_title2->child_price);
 foreach ($checkDetail->result() as $checkDetail2){
     $checkroute = $this->Package_model->list_placeData($checkDetail2->begin_place_id);  foreach ($checkroute->result() as $checkroute2){}
     $checktransport = $this->Package_model->list_transportData($checkDetail2->transport_id);foreach ($checktransport->result() as $checktransport2){}
     $p1 = $priceArray[$a];
     $p2 = $priceArray2[$a];
     $totalprice = ($adultstravel*$p1)+($childtravel*$p2);
     $checkroute3 = $this->Package_model->list_placeData($checkDetail2->destination_place_id); foreach ($checkroute3->result() as $checkroute4){}
     $email_body = $email_body.'
										 <div class="panel-body" style="padding-top: 10px;">                                                   
											<div class="" style="background-color: #f1f1f1; border: 1px solid #E5E5E5">
												<div class="row" style="padding: 20px 0px 20px 25px;">
													<div class="col-sm-10">
														<div class="item">
															<span><i class="fa fa-map-marker"></i></span>
															<div><strong>'.$checkDetail2->arrive_time.' '.$checkroute2->place_name_en.'</strong></div>														</div>
														<div class="item">															<span><i class="fa fa-ship" aria-hidden="true"  style="color:#2f79b1;"></i></span>
															<div style="color:#2f79b1; padding-top: 20px;  font-size: 14pt"><strong>'.$checktransport2->transport_name_en.'</strong></div>
															<p>
<!--																<small><strong>Check-in: </strong>'.$checkDetail2->note_checkin_en.'<br></small>-->
															</p>
                                                                                                            <p style="font-size: 10pt !important"><strong><?php echo $totalpeople?> Travellers = '.number_format($totalprice).' THB</strong> 			
																<ul style="font-size: 10pt; padding-bottom: 15px !important">
																	<li style="font-size: 10pt; font-weight: 100;">'.$adultstravel.' Adults x '.number_format($p1).' = '. number_format($adultstravel*$p1).' THB</li>
																	<li style="font-size: 10pt; font-weight: 100;">'. $childtravel.' Children x '. number_format($p2).' = '. number_format($childtravel*$p2).' THB</li>
																</ul>
															</p>															
														</div>

														<div class="item-end">
															<span><i class="fa fa-map-marker"></i></span>
															<div><strong>'. $checkDetail2->depart_time.' '.$checkroute4->place_name_en.'</strong></div>																	
														</div>
													</div>														
												</div>                                                    
											 </div>
										 </div>';
 $a++; } 
										 
									$email_body = $email_body.' </div>
									 <!-- End Accordion 1 -->                                          
								   </div>
								   <!-- Accordion -->
								</div>
				 <!------ Trip Detail ------->
			   </div>
            </td>
          </tr>
        </tbody>
      </table>
      
       
      </td>
    </tr>
    
    <tr>
    <td bgcolor="#B8B8B8"><img src="'.base_url().'html/images/email/address.png" align="left" width="287" height="97"/></td>
      <td align="right" bgcolor="#B8B8B8"><img src="'.base_url().'html/images/email/logo-header.png" style="padding-right: 50px;" /></td>
    </tr>
  </tbody>
</table>
</body>
</html>';		
		
//		$this->email->from($from_email, 'Booking Transport Moonlight Travel'); 
//        $this->email->to($to_email);
//        $this->email->subject($subject); 
//       	$this->email->message($email_body); 
//        //Send mail 
//		//$this->email->send();  
//		if($this->email->send()){ 
                    $subject = "[For Admin] Booking Transport ใบแจ้งการจองเรือ";		
                    $this->email->from($from_email, 'Booking Transport Moonlight Travel'); 
        $this->email->to($from_email);
        $this->email->subject($subject); 
       	$this->email->message($email_body); 
        if($this->email->send()){ 
		   	$result2 = '1';		
        }	
          	$result = $result2;  
        //}			
		echo $result;		
	}
            //------------------------------------------
	public  function checkemail(){
		$changeValue = $this->input->post('email');
		$result = $this->Package_model->count_email($changeValue);
		echo $result;
		
	}
            //-------------------------
    public function subsribe(){
        $sub = $this->input->post('sub');
         $result = $this->Package_model->addsub($sub);
        echo $result;
    }
         //---------------------------------------------------------
    public function loaddetail() {
         $tranid = $this->input->post('tranid');
         $timestart = $this->input->post('timestart');
         $timeend = $this->input->post('timeend');
         $x = $this->input->post('x');
         $landid = $this->input->post('landid');
         $landbook_id = $this->input->post('landbook_id');
        $landbookdetail_id = $this->input->post('landbookdetail_id');
        $landData = $this->transport_model->listLand('',$landid,'1');
        $priceland = $this->transport_model->listprice($tranid,$timestart,$timeend);
        foreach ($landData->result() AS $landData2){}
        foreach ($priceland->result() AS $priceland2){}
        
        
        $listTransport = $this->Package_model->list_transferData($priceland2->transport_id);
        foreach ($listTransport->result() AS $listTransport2){}
        $timestartarray = explode(":",$timestart);
			$h = $timestartarray[0];
			$m = $timestartarray[1];
			$timestart1 = $h.":".$m;
                        
            $timeendarray = explode(":",$timeend);
			$h1 = $timeendarray[0];
			$m1 = $timeendarray[1];
			$timeend1 = $h1.":".$m1;
        ?>
       <div id="detail<?php echo $x?>">
           <table class="table" width="100%" >
               <tr>
                   <td colspan="2" style="background-color:#E1E1E1"><?php echo $landData2->route_name_en?> <button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm" style="float:right" onclick="deleteselect('<?php echo $x?>','<?php echo $landbook_id?>','<?php echo $landbookdetail_id?>')"> <i class="fas fa-times"></i> </button><br> <?php echo $timestart1?> / <?php echo $timeend1?></td>
               </tr>
               
               
               <tr>
                   <td><span><?php echo $listTransport2->transport_name?></span></td><td align="right"><span ><?php echo number_format($priceland2->price,2)?></span></td>
               </tr>
           </table>
           <input type="hidden" class="priceland" value="<?php echo $priceland2->price?>"/>
           <input type="hidden" id="landbookdetail_id<?php echo $x?>" value="<?php echo $landbookdetail_id?>"/>
           <input type="hidden" id="priceid<?php echo $x?>" name="priceid<?php echo $x?>" value="<?php echo $priceland2->id?>"/>
       </div>
        <?php
    }
    //-----------------------------------
           //---------------------------------------------------------
    public function loaddetaillast() {
         $landbook_id = $this->input->post('landbook_id');
         $n = 0;
        $getlandbookdetail = $this->transport_model->getlandbookdetailgroupby($landbook_id);
        foreach ($getlandbookdetail->result() AS $loadland2){$n++;
        $landData = $this->transport_model->listLand('',$loadland2->landtransfer_id,'1');
        foreach ($landData->result() AS $landData2){}
//        $priceland = $this->transport_model->listprice($loadland2->transport_id,$loadland2->time_start,$loadland2->time_end);
        
        //foreach ($priceland->result() AS $priceland2){}
        
        
        //$listTransport = $this->Package_model->list_transferData($priceland2->transport_id);
        //foreach ($listTransport->result() AS $listTransport2){}
        $timestartarray = explode(":",$loadland2->time_start);
			$h = $timestartarray[0];
			$m = $timestartarray[1];
			$timestart1 = $h.":".$m;
                        
            $timeendarray = explode(":",$loadland2->time_end);
			$h1 = $timeendarray[0];
			$m1 = $timeendarray[1];
			$timeend1 = $h1.":".$m1;
                        
        ?>
       <div id="detail<?php echo $loadland2->transport_id.$loadland2->time.$loadland2->landtransfer_id?>">
           <table class="table" width="100%" >
               <tr>
                   <td colspan="2" style="background-color:#E1E1E1"><?php echo $landData2->route_name_en?> <button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm" style="float:right" onclick="deleteselect('<?php echo $loadland2->transport_id.$loadland2->time.$loadland2->landtransfer_id?>','<?php echo $landbook_id?>','<?php echo $loadland2->id?>',<?php echo $n?>)"> <i class="fas fa-times"></i> </button></td>
                   
                    <?php $getlandbookdetailgroupby1 = $this->transport_model->getlandbookdetailbytime($landbook_id,$loadland2->time_start,$loadland2->time_end);
                   $test = '';$xx='';
        foreach ($getlandbookdetailgroupby1->result() AS $loadlandgroupby1){
            $priceland1 = $this->transport_model->listprice($loadlandgroupby1->transport_id,$loadlandgroupby1->landtransfer_id,$loadland2->time);
        
        foreach ($priceland1->result() AS $priceland21){}
        $listTransport1 = $this->Package_model->list_transferData($priceland21->transport_id);
        foreach ($listTransport1->result() AS $listTransport21){}
          $test = $test.'||'.$loadlandgroupby1->priceland_id; 
          $xx = $xx.'||'.$loadlandgroupby1->transport_id.$loadland2->time.$loadlandgroupby1->landtransfer_id; 
          
                    }?>
               <input type="hidden" id="iddetail<?php echo $n?>" value="<?php echo substr($test,2)?>">
               <input type="hidden" id="xx<?php echo $n?>"  value="<?php echo substr($xx,2)?>"/>
               </tr>
               <?php $getlandbookdetailgroupby = $this->transport_model->getlandbookdetailbytime($landbook_id,$loadland2->time_start,$loadland2->time_end);
        foreach ($getlandbookdetailgroupby->result() AS $loadlandgroupby){
            $priceland = $this->transport_model->listprice($loadlandgroupby->transport_id,$loadlandgroupby->landtransfer_id,$loadland2->time);
        
        foreach ($priceland->result() AS $priceland2){}
        $listTransport = $this->Package_model->list_transferData($priceland2->transport_id);
        foreach ($listTransport->result() AS $listTransport2){}
            ?>
               <tr>
                   <td><span><?php echo $listTransport2->transport_name?></span> (<?php echo number_format($priceland2->price,2)?> x <?php echo $loadlandgroupby->transport_amount?>)</td><td align="right"><span ><?php echo number_format(intval($priceland2->price)*intval($loadlandgroupby->transport_amount),2)?></span></td>
               </tr>
               <input type="hidden" class="priceland" value="<?php echo intval($priceland2->price)*intval($loadlandgroupby->transport_amount)?>"/>
           <input type="hidden" id="landbookdetail_id<?php echo $loadlandgroupby->transport_id.$loadland2->time.$loadlandgroupby->landtransfer_id?>" value="<?php echo $loadlandgroupby->id?>"/>
           <input type="hidden" id="priceid<?php echo $loadlandgroupby->transport_id.$loadland2->time.$loadlandgroupby->landtransfer_id?>" name="priceid<?php echo $loadlandgroupby->transport_id.$loadland2->time.$loadlandgroupby->landtransfer_id?>" value="<?php echo $priceland2->id?>"/>
        <?php }?>
           </table>
           
       </div>
        <?php
    }
    }
    //----------------------------------------------
    public function addtran(){
        $tranid = $this->input->post('tranid');
        $order = $this->input->post('order');
        $landid = $this->input->post('landid');
        $priceland = $this->transport_model->listprice($tranid,$landid,$order);
        foreach ($priceland->result() AS $priceland2){}
        $keygroup = $this->input->post('keygroup');
        $landbook_id = $this->input->post('landbook_id');
        $Adults = $this->input->post('Adults');
        $datedata = $this->input->post('datedata');
        $Adultspepreple = $this->input->post('Adultspepreple');
        $Children = $this->input->post('Children');
        
        if($datedata!=''){
        $datearray = explode("/",$datedata);
			$d = $datearray[0];
			$m = $datearray[1];
			$y = $datearray[2];
			$datedata = $y."-".$m."-".$d;
        }
         if($keygroup == ''){
        $keygroup = $this->transport_model->generateRandomString();
        $ch_keygroup = $this->transport_model->check_keygroup($keygroup);
        if($ch_keygroup >0){
            $keygroup = $this->Package_model->generateRandomString();
        }        
        }
        $result = $this->transport_model->bookinglandfirst($landbook_id,$keygroup,$priceland2->id,$Adults,$datedata,$Adultspepreple,$Children);
        echo $keygroup.','.$result;
    }
    //----------------------------------------------
    public function updateday(){
        $landbook_id = $this->input->post('landbook_id');
        $Adults = $this->input->post('Adults');
        $datedata = $this->input->post('datedata');
        $Children = $this->input->post('Children');
        
        if($datedata!=''){
        $datearray = explode("/",$datedata);
			$d = $datearray[0];
			$m = $datearray[1];
			$y = $datearray[2];
			$datedata = $y."-".$m."-".$d;
        }
        $result = $this->transport_model->updateday($landbook_id,$Adults,$datedata,$Children);
        echo $result;
    }
    //----------------------------------------------
    public function updatetran(){
        $tranid = $this->input->post('tranid');
        $landid = $this->input->post('landid');
        $order = $this->input->post('order');
        $priceland = $this->transport_model->listprice($tranid,$landid,$order);
        foreach ($priceland->result() AS $priceland2){}
        $landbook_id = $this->input->post('landbook_id');
        $Adults = $this->input->post('Adults');
        $keygroup = $this->input->post('keygroup');
        $getdetailbyid = $this->transport_model->getdetailbyid($landbook_id,$priceland2->id);
        foreach ($getdetailbyid->result() AS $getdetailbyid2){}
        $result = $this->transport_model->updatetran($landbook_id,$priceland2->id,$Adults,$getdetailbyid2->id);
        echo $keygroup.','.$result;
    }
    //---------------------------------------------
    public function deletelandbookdetail(){
        $landbook_id = $this->input->post('landbook_id');
        $landbookdetail_id = $this->input->post('landbookdetail_id');

        $result = $this->transport_model->deletelandbookdetail($landbook_id,$landbookdetail_id);
        echo $result;
    }
    //---------------------------------------------
    public function deletelandbookdetailbyid(){
        $landbook_id = $this->input->post('landbook_id');
        $landbookdetail_id = $this->input->post('landbookdetail_id');
        $iddetail = $this->input->post('iddetail');
        
        $result = $this->transport_model->deletelandbookdetailbyid($landbook_id,$landbookdetail_id,$iddetail);
       
        echo $result;
    }
         //---------------------------------------------------------
    public function loaddetailfirst() {
        $landbook_id = $this->input->post('landbook_id');
        $getlandbookdetail = $this->transport_model->getlandbookdetail($landbook_id);
        $numlandbookdetail = $getlandbookdetail->num_rows();
        if($numlandbookdetail>0){
        foreach ($getlandbookdetail->result() AS $getlandbookdetail2){
        $landbookdetail_id = $getlandbookdetail2->id;
        $getlandtransfer = $this->transport_model->getlandtransfer($getlandbookdetail2->priceland_id);
        foreach ($getlandtransfer->result() AS $getlandtransfer2){}
        

        $listTransport = $this->Package_model->list_transferData($getlandtransfer2->transport_id);
        foreach ($listTransport->result() AS $listTransport2){}
        $timestartarray = explode(":",$getlandtransfer2->time_start);
			$h = $timestartarray[0];
			$m = $timestartarray[1];
			$timestart1 = $h.":".$m;
                        
            $timeendarray = explode(":",$getlandtransfer2->time_end);
			$h1 = $timeendarray[0];
			$m1 = $timeendarray[1];
			$timeend1 = $h1.":".$m1;
                        
                         $getVehicle = $this->transport_model->getVehicleinRoute($getlandtransfer2->landtransfer_id);
                         foreach ($getVehicle->result() AS $VehicleData){}
                         $x = $VehicleData->tranID.$h.$getlandtransfer2->landtransfer_id;
        ?>
       <div id="detail<?php echo $x?>">
           <table class="table" width="100%" >
               <tr>
                   <td colspan="2" style="background-color:#E1E1E1"><?php echo $getlandtransfer2->route_name_en?> <button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm" style="float:right" onclick="deleteselect('<?php echo $x?>','<?php echo $landbook_id?>','<?php echo $landbookdetail_id?>')"> <i class="fas fa-times"></i> </button><br> <?php echo $timestart1?> / <?php echo $timeend1?></td>
               </tr>
               
               
               <tr>
                   <td><span><?php echo $listTransport2->transport_name?></span></td><td align="right"><span ><?php echo number_format($getlandtransfer2->price,2)?> x <?php echo $getlandbookdetail2->transport_amount?> = <?php echo intval($getlandtransfer2->price)*intval($getlandbookdetail2->transport_amount)?></span></td>
               </tr>
           </table>
           <input type="hidden" class="priceland" value="<?php echo intval($getlandtransfer2->price)*intval($getlandbookdetail2->transport_amount)?>"/>
           <input type="hidden" id="landbookdetail_id<?php echo $x?>" value="<?php echo $landbookdetail_id?>"/>
           <input type="hidden" id="priceid<?php echo $x?>" name="priceid<?php echo $x?>" value="<?php echo $getlandtransfer2->id?>"/>
       </div>
        <?php
    }
        }
    }
  
 //-------------------------------------------------------
 public function PDF_preview($bookingid=NULL){
                if($bookingid==''){
		$data['bookingid'] = $this->input->post('bookingid');
                }else{
                $data['bookingid'] = $bookingid;
                }
                $this->load->library('Pdf');
                $this->load->model("transport_model"); 
                $this->load->view('package/fontend/booking_voucher_preview' , $data);
//$result = 1;
		//echo $result;		
	}
 //-------------------------------------------------------
 public function PDF_charter_preview($bookingid=NULL){
                if($bookingid==''){
		$data['bookingid'] = $this->input->post('bookingid');
                }else{
                $data['bookingid'] = $bookingid;
                }
                $this->load->library('Pdf');
                $this->load->model("transport_model"); 
                $this->load->view('package/fontend/booking_charter_preview' , $data);
//$result = 1;
		//echo $result;		
	}
 //-------------------------------------------------------
 public function addpdf($booklandtran_id=NULL){
                if($booklandtran_id==''){
		$data['booklandtran_id'] = $this->input->post('booklandtran_id');
                }else{
                $data['booklandtran_id'] = $booklandtran_id;
                }
                $this->load->library('Pdf');
                $this->load->model("transport_model"); 
                $this->load->view('package/fontend/booking_voucher_pdf' , $data);
//$result = 1;
		//echo $result;		
	}
 //-------------------------------------------------------
 public function addpdfcharter($bookingid=NULL){
                if($bookingid==''){
		$data['bookingid'] = $this->input->post('bookingid');
                }else{
                $data['bookingid'] = $bookingid;
                }
                $this->load->library('Pdf');
                $this->load->model("transport_model"); 
                $this->load->view('package/fontend/bookingcharter_voucher_pdf' , $data);
//$result = 1;
		//echo $result;		
	}
 //-------------------------------------------------------
public function send_maillandbook(){
        $this->lang->load('content', $this->session->userdata('weblang'));
		$booklandtran_id = $this->input->post('booklandtran_id');
                $getlandbookbybookno = $this->transport_model->getlandbookbybookno($booklandtran_id);
        foreach($getlandbookbybookno->result() AS $data1){}
        $booklandtran = $data1->id;
		$getbookland = $this->transport_model->getlandbooking($booklandtran);
        foreach($getbookland->result() AS $data){}
if($this->session->userdata('weblang') == 'en'){
        $dateGo = $this->transport_model->GetEngDatetrue($data->depart_date);
        $datereturn = $this->transport_model->GetEngDatetrue($data->return_date);
        $datebook = $this->transport_model->GetEngDateTimetrue($data->date_booking);
        }else{
        $dateGo = $this->transport_model->GetEngDate($data->depart_date);
        $datereturn = $this->transport_model->GetEngDate($data->return_date);
        $datebook = $this->transport_model->GetEngDateTime($data->date_booking);
        }
       $getlandbookdetail = $this->transport_model->getlandbookdetail($booklandtran);
		$from_email = 'chuleeporntravel2019@gmail.com';		
		$to_email = $data->customer_email;
		$email_body = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Booking Transport || CHULEEPORN TRAVEL</title>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	

<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

</head>

<body style="margin: 0;font-size: 8px;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;">
	

<div style="padding: 10px;">

    
    <div style="position: relative;background-color: #FFF;min-height: 680px;padding: 15px;overflow: auto!important;">
        <div style="100%">
            <header style="padding: 10px 0;margin-bottom: 20px;border-bottom: 1px solid #3989c6;">
            <table>
				<tr>
					<td style="width:380px"> <a target="_blank" href="#"> <img src="http://chuleeporntravel.com/images/logo-header.png" data-holder-rendered="true" /></a>                    
						 <div style="font-size: 2em;padding:0px;margin:0px">โทร. +66 (0) 99-3599635 /  Line ID: 0993599635  <br>Email: chuleeporntravel2019@gmail.com</div>
					</td>
					<td style="width:380px"> 
						<div style="font-size: 5em;color: #3989c6; font-weight:bold; line-height: 5em;">'.$this->lang->line('Booking').'</div>
						<div style="font-size: 3em;color: #3989c6;">'.$this->lang->line('BookingID').'. '.$data->Booking_id.'</div>
						<div style="font-size: 2em;">'.$this->lang->line('datebooking').': '.$datebook.'</div>
					</td>
				</tr>
			</table>
                
            </header>
            <main style="padding-bottom: 50px;">
            <table >
  <tr >
    <td style="width:380px">
    <div style="font-size: 3em;">'.$this->lang->line('information').':</div>
    <div style="font-size: 2em;"><strong>'.$this->lang->line('customername').':</strong> '.$data->customer_name.' '.$data->customer_Lastname.'<br><strong>'.$this->lang->line('phone').':</strong> '.$data->customer_telephone.'<br><strong>'.$this->lang->line('email').':</strong> '.$data->customer_email.'<br><strong>'.$this->lang->line('line').': </strong>'.$data->Line_id.'</div>

                        
</td>
    <td style="width:380px">  
    <div style="font-size: 3em;color: #3989c6;"> </div>
    <div style="font-size: 2em;"><strong>'.$this->lang->line('departdate').':</strong> '.$dateGo.'<br><strong>'.$this->lang->line('returndate').':</strong> '.$datereturn.'<br><strong>'.$this->lang->line('Numberofpassengers').':</strong> '.$this->lang->line('Adult').' x '.$data->adult.'  |  '.$this->lang->line('childen').' x '.$data->child.'<br><strong>'.$this->lang->line('Pickuplocation').':</strong> '.$data->Pickuplocation.' <strong>'.$this->lang->line('Pickuptime').':</strong> '.$data->Pickuptime.'</div>

</td>
  </tr>
 
</table>
                <br>
                <br>
                <table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-collapse: collapse;border-spacing: 0;margin-bottom: 20px;">
                    <thead>
                        <tr>
                            <th width="10%" style="white-space: nowrap;font-weight: 400;font-size: 16px;text-align: center!important; padding: 15px;background-color: #D6D6D6;border-bottom: 1px solid #fff;">#</th>
                            <th width="35%" style="white-space: nowrap;font-weight: 400;font-size: 16px;text-align: center!important;background-color: #D6D6D6; border-bottom: 1px solid #fff;" >'.$this->lang->line('Type').'</th>
			    			<th width="35%" style="white-space: nowrap;font-weight: 400;font-size: 16px;text-align: center!important;background-color: #D6D6D6; border-bottom: 1px solid #fff;" >'.$this->lang->line('route').'</th>
                            <th width="20%" style="white-space: nowrap;font-weight: 400;font-size: 16px;text-align: center!important;background-color: #D6D6D6;border-bottom: 1px solid #fff;">'.$this->lang->line('Totalprice').'</th>
                        </tr>
                    </thead>
                    <tbody>
					';
                          foreach ($getlandbookdetail->result() AS $getlandbookdetailhead){}
                                              $getlandtransfer = $this->transport_model->getlandtransfer($getlandbookdetailhead->priceland_id);
                                              foreach ($getlandtransfer->result() AS $getlandtransfer2){}                      $listPlace = $this->transport_model->listPlace('1',$getlandtransfer2->begin_place_id);
                  foreach ($listPlace->result() AS $listPlace2){}
       $listPlacereturn = $this->transport_model->listPlace('1',$getlandtransfer2->destination_place_id);                    foreach ($listPlacereturn->result() AS $listPlacereturn2){}
                                              if($this->session->userdata('weblang') == 'en'){
                        $route_name = $listPlace2->place_name_en.' - '.$listPlacereturn2->place_name_en;
                      }else{
                        $route_name = $listPlace2->place_name_th.' - '.$listPlacereturn2->place_name_th;
                      }
   $n = 1;
                       
        $numlandbookdetail = $getlandbookdetail->num_rows();
        if($numlandbookdetail>0){
        foreach ($getlandbookdetail->result() AS $landbookdetail){
                                                           $getlandtransfer = $this->transport_model->listtransportland($landbookdetail->transport_id); 
                                                           foreach ($getlandtransfer->result() AS $landtransfer){}
                                                            if($this->session->userdata('weblang') == 'en'){
                                                            $transport_name = $landtransfer->transport_name_en;    
                                                            }else{
                                                            $transport_name = $landtransfer->transport_name_th;        
                                                            }
                                                            if($data->datetotal!='0'){
                                                            $total = $landbookdetail->price*$landbookdetail->transport_amount*$data->datetotal;
                                                            $pricexp = number_format($landbookdetail->price,2).' x '.$landbookdetail->transport_amount.' x '.$data->datetotal.' '.$this->lang->line('Day');
                                                            }else{
                                                            $total = $landbookdetail->price*$landbookdetail->transport_amount;   
                                                             $pricexp = number_format($landbookdetail->price,2).' x '.$landbookdetail->transport_amount;
                                                            }
    $email_body = $email_body.'
	<tr>
                            <td width="10%" class="no text-center" style="color: #000;font-size: 2em;background-color: #E8EFEB;text-align: center!important;">'.$n.'</td>
                            <td width="35%" style="padding: 15px;background-color: #E8EFEB;border-bottom: none;text-align: left!important;margin: 0;font-weight: 400;color: #000;font-size: 2em;">'.$transport_name.' ('.$pricexp.')</td>
							<td width="35%" style="padding: 15px;background-color: #E8EFEB;border-bottom: none;text-align: left!important;margin: 0;font-weight: 400;color: #000;font-size: 2em;">'.$route_name.'</td>                          
                            <td width="20%" style="background: #E8EFEB;color: #000;text-align: right;font-size: 1em;background-color: #E8EFEB;font-size: 2em;">'.number_format($total,2).' '.$this->lang->line('THB').' &nbsp;&nbsp;</td>
                        </tr>';
        $n++;}}
        $email_body = $email_body.'
				</tbody>
                    <tfoot>
                        <tr>
                            <td colspan="1" style="border: none;color: #000;font-size: 1.6em;background: 0 0; border-bottom: 2px solid #999;white-space: nowrap;text-align: right;padding: 10px 20px;"></td>
                            <td colspan="2" style="color: #000;font-size: 1.6em;border-top: none;background: 0 0; border-bottom: 2px solid #999;white-space: nowrap;text-align: right;padding: 10px 20px;font-size: 2em;">'.$this->lang->line('Totalprice').'</td>
                            <td style="border-top:none; background: 0 0;border-bottom: 2px solid #999;white-space: nowrap;text-align: right;padding: 10px 20px;color: #000;font-size: 2em;">'.number_format($data->total_price,2).' '.$this->lang->line('THB').' &nbsp;&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>
<table >
  <tr >
    <td style="width:100%; border-top: 2px solid #666;">
     <div style="font-size: 2.2em;">'.$this->lang->line('Thecompanyhas').': '.$data->customer_email.' '.$this->lang->line('Atthistime').'<br><strong style="color:red">'.$this->lang->line('Note').'</strong><br>1.'.$this->lang->line('Bookingviathe').' <br>2.'.$this->lang->line('Pricesmaychange').' </div>
</td>
 
  </tr>
</table>
                <br>  <br>
                
                              <table width="100%" >
								  <tbody>
								    <tr>
									  <td width="100%" height="30" colspan="3"  align="center" style="background-color: #666; color: #FFFFFF; font-size: 18px;"><strong> '.$this->lang->line('Payment').'</strong></td>
								    </tr>
									<tr>
									  <td width="32%" height="30" align="center" style="background-color: #00b14f; color: #FFFFFF;font-size: 16px;"><strong>BANK NAME</strong></td>
									  <td width="32%" height="30" align="center" style="background-color: #00b14f; color: #FFFFFF;font-size: 16px;"><strong>ACCOUNT NAME</strong></td>
									  <td width="36%" height="30" align="center" style="background-color: #00b14f; color: #FFFFFF;font-size: 16px;"><strong>ACCOUNT NO.</strong></td>
								    </tr>
									<tr>
									  <td height="50" align="center" style="background-color: #c6eed7;font-size: 16px;">'.$this->lang->line('KasikornBank').' <br>
								      '.$this->lang->line('Robinson').'</td>
									  <td height="50" align="center" style="background-color: #c6eed7;font-size: 16px;">'.$this->lang->line('Chuleeporn').'</td>
									  <td height="50" align="center" style="background-color: #c6eed7;font-size: 16px;">023-8-36459-0</td>
								    </tr>
									<tr>
									  <td height="50" align="center" style="background-color: #97dbb5;font-size: 16px;">'.$this->lang->line('KrungThai').'<br>
								      '.$this->lang->line('Punnakan').' </td>
									  <td height="50" align="center" style="background-color: #97dbb5;font-size: 16px;">'.$this->lang->line('Chuleeporn').'</td>
									  <td height="50" align="center" style="background-color: #97dbb5;font-size: 16px;">879-0-32920-1 </td>
								    </tr>
								  </tbody>
								</table>
                                                                <br>
                                                                <table >
  <tr >
    <td style="width:30%">
    <div  align="center"><img src="http://chuleeporntravel.com/images/line_id.jpg" alt="chuleeporntravel" title="" style="width: 150px; height: auto" class="img-responsive"/></div>
</td>
 <td style="width:70%">  
    <div style="font-size: 2em;"><strong>'.$this->lang->line('Payment').' ('.$this->lang->line('Chooseone').')</strong><br>'.$this->lang->line('Proofofpayment').'<br>- '.$this->lang->line('Calltopay').' +66 (0) 99-3599635<br>- '.$this->lang->line('Sendproofof').' <a href="mailto:chuleeporntravel2019@gmail.com" class="text-color" target="_blank">chuleeporntravel2019@gmail.com</a> '.$this->lang->line('Andspecify').'<br>- '.$this->lang->line('Sendevidence').' Line ID: <a href="http://line.me/ti/p/~0993599635" target="_blank">0993599635</a></div>

</td>
  </tr>
</table>
            </main>
        </div>
    </div>
</div>
</body>
</html>';		
		

        $subject = "".$this->lang->line('BookingTransport')."";	
        
        $this->email->from($from_email, ''.$this->lang->line('BookingTransport').' || CHULEEPORN TRAVEL'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
       	$this->email->message($email_body); 
        $this->email->attach(base_url().'application/views/package/fontend/transportPDF/booking_pdf_'.$booklandtran_id.'.pdf');
        if($this->email->send()){
             $subject1 = "[".$this->lang->line('ForAdmin')."] ".$this->lang->line('BookingTransport')."";	
        
        $this->email->from($from_email, '['.$this->lang->line('ForAdmin').'] '.$this->lang->line('BookingTransport').' || CHULEEPORN TRAVEL'); 
        $this->email->to($from_email);
        $this->email->subject($subject1); 
       	$this->email->message($email_body); 
        $this->email->attach(base_url().'application/views/package/fontend/transportPDF/booking_pdf_'.$booklandtran_id.'.pdf');
        $this->email->send();
        $this->linenotify($booklandtran);
		   	$result2 = '1';		
        }else{
            $result2 = '0';
        }	
          	$result = $result2;  
        //}			
		echo $result;		
	}
  
         //-------------------	
	public function booking_transport_voucher($booklandtran_id=NULL){
		$this->load->view('package/fontend/transportPDF/booking_pdf_'.$booklandtran_id.'.pdf');
	}
         //-------------------	
	public function preview_pdf($booklandtran_id=NULL){
		if($booklandtran_id==''){
		$data['booklandtran_id'] = $this->input->post('booklandtran_id');
                }else{
                $data['booklandtran_id'] = $booklandtran_id;
                }
                $this->load->library('Pdf');
                $this->load->model("transport_model"); 
                $this->load->view('package/fontend/booking_voucher_preview' , $data);
	}
         //-------------------	
	public function booking_charter_voucher(){
		$this->load->view('package/fontend/booking_charter_voucher');
	}
          //----------------------------------------------
    public function updatecharter(){

        $charterid = $this->input->post('charterid');
        $charterbook_id = $this->input->post('charterbook_id');
        $Adults = $this->input->post('Adults');
        $keygroup = $this->input->post('keygroup');
        $getdetailcharterbyid = $this->transport_model->getdetailcharterbyid($charterbook_id,$charterid);
        foreach ($getdetailcharterbyid->result() AS $getdetailcharterbyid2){}
        $result = $this->transport_model->updatecharter($charterbook_id,$charterid,$Adults,$getdetailcharterbyid2->id);
        echo $keygroup.','.$result;
    }
    //----------------------------------------------
    public function updatedaycharter(){
        $charterbook_id = $this->input->post('charterbook_id');
        $Adults = $this->input->post('Adults');
        $datedata = $this->input->post('datedata');
        $Children = $this->input->post('Children');
        
        if($datedata!=''){
        $datearray = explode("/",$datedata);
			$d = $datearray[0];
			$m = $datearray[1];
			$y = $datearray[2];
			$datedata = $y."-".$m."-".$d;
        }
        $result = $this->transport_model->updatedaycharter($charterbook_id,$Adults,$datedata,$Children);
        echo $result;
    }
     //------------------dataID changeValue //
	public  function placedataland(){
		$changeValue = $this->input->post('changeValue');
		//$changeValueArray = explode(",",$changeValue);
		
		//$beginPlace = $changeValueArray[0];
		//$partnerID = $changeValueArray[1];
		
		$placeData = $this->input->post('placeData');
		
		$result = $this->Package_model->placedataland($changeValue);?>


                 <option value="">-- <?php echo $this->lang->line('select');?> --</option>
            <?php $select3 ='';    
            foreach ($result->result() as $result2){
                if($this->session->userdata('weblang') == 'en'){
                                                            $place_name = $result2->place_name_en;
                                                       }else{
                                                            $place_name = $result2->place_name_th;
                                                       }
                 if($result2->destination_place_id  == $placeData){ $select3 = 'selected';}?>
		<option value="<?php echo $result2->destination_place_id ?>"<?php echo $select3?>><?php echo $place_name ?></option>
                <?php $select3 ='';  }
         }
              //-------------------	
    public function rate() {
        $this->load->view('package/fontend/rate');
    }
   //------------------------------------------
         public function adddetail(){
             $landid = $this->input->post('landid');
             $priceid = $this->input->post('priceid');
             $transport = $this->input->post('transport');
             $price = $this->input->post('price');
             $amount = $this->input->post('amount');
             $datetotal = $this->input->post('datetotal');
             if($datetotal!='0'){
             $total = $price*$amount*$datetotal;
             }else{
              $total = $price*$amount;   
             }
             ?>
            <div id="detail<?php echo $priceid?>">
          
                 <table class="table" width="100%" >
                <tr >
                   <td colspan="2" style="background-color:#E1E1E1"><?php echo $transport?>  <button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm" style="float:right" onclick="deleteselect('<?php echo $priceid?>')"> <i class="fas fa-times"></i> </button></td>
                   </tr>
                    <tr >
                        <td colspan="2" style="background-color:#E1E1E1">(<?php echo number_format($price,2)?> x <?php echo $amount?> <?php if($datetotal!='0'){?>x <?php echo $datetotal?> วัน<?php }?>) <span style="float:right"><?php echo number_format($total,2)?></span></td>
                    </tr>
               <input type="hidden" class="priceland" value="<?php echo $total?>"/>
               <input type="hidden" name="landid[]" value="<?php echo $landid?>">
               <input type="hidden" name="priceid[]"  value="<?php echo $priceid?>"/>
               <input type="hidden" name="totalamount[]"  value="<?php echo $amount?>"/>
               
                </table>
            </div>
        <?php }
        //---------------------------------------------
        function calculatedate(){
         $datedata = $this->input->post('datedata');
         $returndate = $this->input->post('returndate');
         $date1 = str_replace('/', '-', $datedata);
         $date2 = str_replace('/', '-', $returndate);
         $calculate =strtotime("$date2")-strtotime("$date1");
         $summary=floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)
            
        echo $summary;
    }
    //-----------------------------------------
public function booklanddetail(){
             $datedata = $this->input->post('datedata');
        $returndate = $this->input->post('returndate');
        $Adults = $this->input->post('Adults');
        $Children = $this->input->post('Children');
        $totalprice = $this->input->post('totalprice');
        $datetotal = $this->input->post('datetotal');
        
        if($datedata!=''){
        $datearray = explode("/",$datedata);
			$d = $datearray[0];
			$m = $datearray[1];
			$y = $datearray[2];
			$datedata = $y."-".$m."-".$d;
        }
        if($returndate!=''){
        $datearray = explode("/",$returndate);
			$d = $datearray[0];
			$m = $datearray[1];
			$y = $datearray[2];
			$returndate = $y."-".$m."-".$d;
        }
        $booklandtran = $this->transport_model->booklandtran($datedata,$returndate,$Adults,$Children,$totalprice,$datetotal);
            $priceid = $this->input->post('priceid');
            $totalamount = $this->input->post('totalamount');

            for($i=0;$i<count($priceid);$i++){
                $priceid1 = $priceid[$i];
                $totalamount1 = $totalamount[$i];
            $resultdetail = $this->transport_model->booklanddetail($priceid1,$totalamount1,$booklandtran);
              }
              $data['getbookland'] = $this->transport_model->getlandbooking($booklandtran);
              $data['getlandbookdetail'] = $this->transport_model->getlandbookdetail($booklandtran);
      $this->load->view('package/fontend/landbookingSumary',$data);
}
 //-----------------------------------------
public function updatebookland(){
        $custname = $this->input->post('custname');
        $custlastname = $this->input->post('custlastname');
        $Email = $this->input->post('Email');
        $cust_telephone_num = $this->input->post('cust_telephone_num');
        $line_id = $this->input->post('line_id');
        $booklandtran_id = $this->input->post('booklandtran_id');
        $Pickuplocation = $this->input->post('Pickuplocation');
        $Pickuptime = $this->input->post('Pickuptime');
        
        $booklandtranup = $this->transport_model->updatelandbook($custname,$custlastname,$Email,$cust_telephone_num,$line_id,$booklandtran_id,$Pickuplocation,$Pickuptime);
        $getlandbookbybookno = $this->transport_model->getlandbookbybookno($booklandtranup);
        foreach($getlandbookbybookno->result() AS $data1){}
        $booklandtran = $data1->id;
              $data['getbookland'] = $this->transport_model->getlandbooking($booklandtran);
              $data['getlandbookdetail'] = $this->transport_model->getlandbookdetail($booklandtran);
      $this->load->view('package/fontend/landbookingdetail',$data);
}
//-------------------
 public function linenotify($booking_no){
	  	   //---------line notify----------------//
			$getbookland = $this->transport_model->getlandbooking($booking_no);
        foreach($getbookland->result() AS $data){}
        $getlandbookdetail = $this->transport_model->getlandbookdetail($booking_no);
        foreach ($getlandbookdetail->result() AS $getlandbookdetailhead){}
        $getlandtransfer = $this->transport_model->getlandtransfer($getlandbookdetailhead->priceland_id);
        foreach ($getlandtransfer->result() AS $getlandtransfer2){}
         $listPlace = $this->transport_model->listPlace('1',$getlandtransfer2->begin_place_id);
                  foreach ($listPlace->result() AS $listPlace2){}
       $listPlacereturn = $this->transport_model->listPlace('1',$getlandtransfer2->destination_place_id);                    foreach ($listPlacereturn->result() AS $listPlacereturn2){}
                                              if($this->session->userdata('weblang') == 'en'){
                        $route_name = $listPlace2->place_name_en.' - '.$listPlacereturn2->place_name_en;
                      }else{
                        $route_name = $listPlace2->place_name_th.' - '.$listPlacereturn2->place_name_th;
                      }
        
		        //$xhtmlDetail = $this->load->view('package/backend/bookingTransport_for_line',$data);
  		       //ini_set('display_errors', 1);
				//ini_set('display_startup_errors', 1);
				//error_reporting(E_ALL);
				date_default_timezone_set("Asia/Bangkok");

				$sToken = "bX8ibIn2dB36vhZA0SzW1j9Ta33VU0VtC6wmG3k3lSc";
				///$sMessage = "รายการจอง akira-speedboat";
	            $datedepartArray = explode("-",$data->depart_date);
                    $datedepart = $datedepartArray[2];
                    $mondepart = $datedepartArray[1];
                    $yeardepart = $datedepartArray[0] ;
                    $depart_date = $datedepart.'-'.$mondepart.'-'.$yeardepart;
                    
	            $datereturnArray = explode("-",$data->return_date);
                    $datereturn = $datereturnArray[2];
                    $monreturn = $datereturnArray[1];
                    $yearreturn = $datereturnArray[0] ;
                    $return_date = $datereturn.'-'.$monreturn.'-'.$yearreturn;
                    
                    $DateTimeArray= explode(" ",$data->date_booking);
                    $datebookingArray = explode("-",$DateTimeArray[0]);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_booking = $datebooking.'-'.$monbooking.'-'.$yearbooking.' '.$DateTimeArray[1];
	 
	 			$sMessage ="\nจองรถรับ-ส่งในเมือง/นอกเมือง\nหมายเลขการจอง : ".$data->Booking_id."\nวันเดินทางไป :  ".$depart_date."\nวันเดินทางกลับ :  ".$return_date."\nเส้นทาง :  ".$route_name."\nชื่อ-นามสกุล : ".$data->customer_name." ".$data->customer_Lastname."\nโทรศัพท์ : ".$data->customer_telephone.",  อีเมล์ : ".$data->customer_email." , ไลน์ : ".$data->Line_id."\nผู้ใหญ่ : ".$data->adult." , เด็ก : ".$data->child."\n ราคารวม : ".number_format($data->total_price,2)."\n วันที่ทำการจอง : ".$date_booking."\n สถานที่รับ : ".$data->Pickuplocation."\n เวลารับ : ".$data->Pickuptime."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
//-------------------
 public function linenotifypack($keygroup){
	  	   //---------line notify----------------//
                $checkinData = $this->Package_model->getbooking($keygroup);
                foreach($checkinData->result() as $Data){} 
                if ($Data->cf_status == 1){ $txt='รอดำเนินการ';}else if($Data->cf_status == 2){ $txt='ยืนยัน ';}else{ $txt='ยกเลิก';}
		        //$xhtmlDetail = $this->load->view('package/backend/bookingTransport_for_line',$data);
  		       //ini_set('display_errors', 1);
				//ini_set('display_startup_errors', 1);
				//error_reporting(E_ALL);
				date_default_timezone_set("Asia/Bangkok");

				$sToken = "bX8ibIn2dB36vhZA0SzW1j9Ta33VU0VtC6wmG3k3lSc";
				///$sMessage = "รายการจอง akira-speedboat";
	            
	 
	 			$sMessage ="\nแพ็คเกจทัวร์\nหมายเลขการจอง : ".$keygroup."\nวันเดินทางไป :  ".$Data->date_depart."\nแพ็คเกจ :  ".$Data->package_name_en."\nชื่อ-นามสกุล : ".$Data->customer_name." ".$Data->customer_Lastname."\nโทรศัพท์ : ".$Data->customer_telephone.",  อีเมล์ : ".$Data->customer_email." , ไลน์ : ".$Data->IDLine."\nผู้ใหญ่ : ".$Data->customer_adult." , เด็ก : ".$Data->customer_child."\n ราคารวม : ".number_format($Data->total_price,2)."\n วันที่ทำการจอง : ".$Data->date_booking."\n สถานะ : ".$txt."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
}

