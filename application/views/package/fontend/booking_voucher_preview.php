<?php
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');
$this->lang->load('content', $this->session->userdata('weblang'));
if($booklandtran_id==''){
$booklandtran_id = $this->uri->segment(3); 
}else{
    $booklandtran_id = $booklandtran_id;
}
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('CHULEEPORN TRAVEL - Transport Booking ID # '.$booklandtran_id.'');
//$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
$pdf->SetMargins(20, 10, 20, true);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('thsarabun', '',16);


$pdf->AddPage('P', 'A4');

        
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
		
		$html = '<!doctype html>
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
                                              foreach ($getlandtransfer->result() AS $getlandtransfer2){}
       $listPlace = $this->transport_model->listPlace('1',$getlandtransfer2->begin_place_id);
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
    $html = $html.'
	<tr>
                            <td width="10%" class="no text-center" style="color: #000;font-size: 2em;background-color: #E8EFEB;text-align: center!important;">'.$n.'</td>
                            <td width="35%" style="padding: 15px;background-color: #E8EFEB;border-bottom: none;text-align: left!important;margin: 0;font-weight: 400;color: #000;font-size: 2em;">'.$transport_name.' ('.$pricexp.')</td>
							<td width="35%" style="padding: 15px;background-color: #E8EFEB;border-bottom: none;text-align: left!important;margin: 0;font-weight: 400;color: #000;font-size: 2em;">'.$route_name.'</td>                          
                            <td width="20%" style="background: #E8EFEB;color: #000;text-align: right;font-size: 1em;background-color: #E8EFEB;font-size: 2em;">'.number_format($total,2).' '.$this->lang->line('THB').' &nbsp;&nbsp;</td>
                        </tr>';
        $n++;}}
        $html = $html.'
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


$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();
ob_clean();
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('booking_pdf_'.$data->Booking_id.'.pdf', 'I');
//$pdf->Output(__DIR__ .'/transportPDF/booking_pdf_'.$data->Booking_id.'.pdf', 'F');
//============================================================+
// END OF FILE
//============================================================+
//