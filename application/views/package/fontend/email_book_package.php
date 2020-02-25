<?php $this->lang->load('content', $this->session->userdata('weblang'));?>
<html>
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
     <?php 
  $checkinData =$this->Package_model->list_bookingData($keygroup);
    foreach ($checkinData->result() AS $Data) {}?>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td height="35" colspan="2" align="center" bgcolor="#E7E7E7"><img src="<?php echo base_url('images/logo-header.png')?>" alt=""></td>
    </tr>
    <tr>
      <td height="35" colspan="2" bgcolor="#E7E7E7"><table width="90%"  border="0" cellspacing="2" align="center" cellpadding="0" bgcolor="#FFFFFF">
        <tbody>
          <tr>
            <td width="19%" height="25" align="right"><strong><?php echo $this->lang->line('customername');?>  : </strong></td>
            <td height="25" colspan="5" align="left">&nbsp;&nbsp;<?php echo $Data->customer_name?>&nbsp;<?php echo $Data->customer_Lastname?></td>
          </tr>
          <tr>
            <td height="25" align="right"><strong><?php echo $this->lang->line('phone');?> : </strong></td>
            <td width="19%" height="25" align="left">&nbsp;&nbsp;<?php echo $Data->customer_telephone?></td>
            <td width="9%" height="25" align="left"><strong><?php echo $this->lang->line('email');?>  :</strong></td>
            <td width="28%" height="25" align="left"><?php echo $Data->customer_email?></td>
            <td width="10%" height="25" align="left"><strong><?php echo $this->lang->line('line');?> :</strong></td>
            <td width="15%" height="25" align="left"><?php echo $Data->IDLine?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="197" colspan="2" bgcolor="#E7E7E7"><table width="90%" align="center" border="0" cellspacing="4" cellpadding="0" bgcolor="#FFFFFF">
              
        <tbody>
          <tr>
            <td width="40%" height="25" align="right"><strong><?php echo $this->lang->line('BookingID');?> : </strong></td>
            <td width="62%" height="25" align="left">&nbsp;&nbsp;<?php echo $Data->transfer_keygroup?></td>
          </tr>
          <tr>
              <?php 
    $packageData = $this->Package_model->list_packageData($Data->package_id);
    foreach ($packageData->result() AS $Data1) {}
    if($this->session->userdata('weblang') == 'en'){
      $package_name = $Data1->package_name_en;  
    }else{
      $package_name = $Data1->package_name_th;    
    }
    ?>
            <td height="25" align="right"><strong><?php echo $this->lang->line('package');?> : </strong></td>
            <td height="25" align="left">&nbsp;&nbsp;<?php echo $package_name?></td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong><?php echo $this->lang->line('departdate');?> : </strong></td>
            <td height="25" align="left">&nbsp;&nbsp;<?php echo $this->transport_model->GetEngDate($Data->date_depart);?></td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong><?php echo $this->lang->line('Adult');?> : </strong></td>
            <td height="25" align="left">&nbsp;&nbsp;<?php echo $Data->customer_adult?></td>
          </tr>
          <?php if($Data->customer_child >0){?>
          <tr>
            <td width="40%" height="25" align="right"><strong><?php echo $this->lang->line('childen');?> (3-10 <?php echo $this->lang->line('year');?>) : </strong></td>
            <td height="25" align="left">&nbsp;&nbsp;<?php echo $Data->customer_child?></td>
          </tr>
          <?php }?>
          <tr>
            <td width="40%" height="25" align="right"><strong><?php echo $this->lang->line('Totalprice');?> : </strong></td>
            <td height="25" align="left">&nbsp;&nbsp;<?php echo number_format($Data->total_price)?></td>
          </tr>
          <tr>
            <td width="40%" height="25" align="right"><strong><?php echo $this->lang->line('status');?> : </strong></td>
            <td height="25" align="left">&nbsp;&nbsp;<?php if($this->session->userdata('weblang') == 'en'){if ($Data->cf_status == 1){echo 'Pending';}else if($Data->cf_status == 2){echo 'Confirm';}else{echo 'Cancel';}}else{if ($Data->cf_status == 1){echo 'รอดำเนินการ';}else if($Data->cf_status == 2){echo 'ยืนยัน ';}else{echo 'ยกเลิก';}} ?></td>
          </tr>
          </tbody>
      </table></td>
    </tr>
    <tr>
      <td width="46%" bgcolor="#B8B8B8"><h4><a href="mailto:chuleeporntravel2019@gmail.com" target="_blank">chuleeporntravel2019@gmail.com</a></h4>
        <p>Line ID: 0993599635</p></td>
      <td width="54%" align="center" bgcolor="#B8B8B8"><h2>+66 (0) 99-3599635 </h2></td>
    </tr>
  </tbody>
</table>
</body>
</html>
