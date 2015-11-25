<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>jquery.js"></script>
</head>

<body>
<div id="div_wrapper">
<div id="div_container">
<table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
  <?php $this->load->view('admin/header'); ?>
    <tr>
  
    <td>
  
  <table width="966"  border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#efefef; border-radius:8px;">
    <tr>
      <td width="580" valign="top">
        <div id="navjam" style="margin-top:0px;">
          <div id="navjam">
	<div class="tabs_width">

          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	<?php if($this->session->userdata('view_order')==1) { ?>
	<li><a href="<?php echo WEB_URL ?>home/manage_orders"   id="tabs_active" >Manage Orders</a></li>
    <?php } ?>
    
    <?php if($this->session->userdata('create_order')==1) { ?>
	<li><a  href="<?php echo WEB_URL ?>home/add_orders" style="width:200px;">Place New Order</a></li>
    <?php } ?>

</ul>

</div>
        </div>

      </div>
    
      </div>
      <div class="rightpartbox">
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"><strong></strong></div>
        
        
        <div class="tablebox">
		 <div class="tb_sample_cover211" style="width:900px">
        	 <div class="tr_col_01  bl_2" style="width:30px;">Sl no</div>
            <div class="tr_col_01  bl_2" style="width:100px;">Customer id</div>
			<div class="tr_col_01  bl_2" style="width:150px;">Order Date And Time</div>
			<div class="tr_col_01  bl_2" style="width:150px;">Booking Period</div>
			<div class="tr_col_01  bl_2" style="width:100px;">Product Name</div>
			<div class="tr_col_01  bl_2" style="width:100px;">Supplier Name</div>
			<div class="tr_col_01  bl_2" style="width:100px;">Order Status</div>
            <div class="tr_col_01 bl_1" style="width:100px;">  
                <span style="font-size:12px;">Action</span>
            </div>
          
        </div>
        <?php
        if (!empty($result)) {
        for($i=0;$i< count($result);$i++) { ?>
        <div class="tb_sample_cover211" style="width:900px">
        	 <div class="tr_col_01  bl_2" style="width:30px;"><?php echo $i+1; ?></div>
            <div class="tr_col_01  bl_2" style="width:100px;"><?php echo $result[$i]->b2b_id; ?></div>
			<div class="tr_col_01  bl_2" style="width:150px;"><?php echo $result[$i]->datetime; ?></div>
			<div class="tr_col_01  bl_2" style="width:150px;"><?php echo $result[$i]->booking_range; ?></div>
			<div class="tr_col_01  bl_2" style="width:100px;"><?php echo $result[$i]->product_name; ?></div>
			<div class="tr_col_01  bl_2" style="width:100px;"><?php $supplier = $this->common_model->get_supplier_name($result[$i]->supplier_id); if($supplier){ 
			echo $supplier[0]->firstname;}?></div>
			<div class="tr_col_01  bl_2" style="width:100px;"><?php echo $result[$i]->order_status; ?></div>
            <div class="tr_col_01 bl_1" style="width:100px;">  
                <span style="font-size:12px;"><?php echo anchor(WEB_URL.'home/manage_individual_order/'.$result[$i]->id, '<span style="color:#2485BE;">Manage</span>'); ?> </span> / 
            <span style="font-size:12px;"><?php echo anchor(WEB_URL.'home/del_order/'.$result[$i]->id, '<span style="color:#2485BE;">Delete</span>', array('onClick' => "return confirm('Are you sure you want to delete?')")); ?> </span>
       
		   </div>
          
        </div>
        <?php }
        } else { 
        echo 'Result not found';
        }
        ?>
        </div>
      </div>
    </div>
      </td>
    
      </tr>
    
  </table>
    </td>
  
    </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<div style="clear:both; height:30px;">&nbsp;</div>
</div>
</div>
</body>
</html>
<style>
.colo-td {
	font-family:Arial, Helvetica, sans-serif;
	font-size:15px;
	color:#000;
}
</style>
	<!--order_details				
				order_comments	order_status	order_checklist	-->