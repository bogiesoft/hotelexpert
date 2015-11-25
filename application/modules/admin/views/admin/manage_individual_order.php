<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>jquery.js"></script>

	<!-- for calender -->
		<link rel="stylesheet"  type="text/css" media="all" href="<?php echo WEB_DIR ?>css/jquery-ui.css" />
		<script type="text/javascript" src="<?php echo WEB_DIR ?>js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="<?php echo WEB_DIR ?>js/jquery-ui.js"></script>
		
<script>
			// for datepicker in reservation
			$(function() {
				$( "#from_date" ).datepicker();
				$( "#to_date" ).datepicker();
				});
</script>
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
	<li><a href="<?php echo WEB_URL ?>home/manage_orders"  id="tabs_active"  >Manage Orders</a></li>
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
        <form method="post" name="admin_register" action="<?php echo WEB_URL; ?>home/save_managed_order/<?php echo $this->uri->segment(3); ?>" enctype="multipart/form-data">
        
          <table width="900px" align="left" border="0" cellspacing="1" cellpadding="5" style="margin-left:10px;">
           
          <tr>
              <td class="colo-td" align="left"><b>Product ID :</b>
			  
			  <input type="text" style="margin-left:25px;width:172px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" name="product_id" value="<?php if(isset($result->product_id)){ echo  $result->product_id; }?>"  size="30"/>
			  <br/> <br/>
			  <b>Product Name :</b>
			  <input type="text" style="width:172px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" name="product_name" value="<?php if(isset($result->product_name)){ echo  $result->product_name; }?>"  size="30"/>
			   <br/> <br/>
			   <b>Supplier ID :</b><?php if(isset($result->supplier_id)){ echo  $result->supplier_id; }?>
			  </td>
			  <td class="colo-td" align="left">
			  <b>Unique Order ID :</b><?php if(isset($result->id)){ echo  $result->id; }?><br/>
			  <b>Order Details : </b><br/>
			  <?php if(isset($result->order_details)){ echo "<p style='width:300px;float:left'>". $result->order_details . "</p>"; }?>
              </td>
			  <td class="colo-td" rowspan="2" align="left" >
			  <table border="1"><tr><td style="padding: 0px 0px 0px 20px;">
			  <p style="margin: 20px 32px 50px 32px;border-style:solid;text-align:center;border-width:1px;"><b>Order Checklist : </b></p>
			
			  <input type="checkbox" name="payment_clear" value="checked"     <?php if(isset($result->payment_clear)){ echo $result->payment_clear;} ?>>Payment Clear<br/><br/>
			  <input type="checkbox" name="supplier_called" value="checked" <?php if(isset($result->supplier_called)){ echo $result->supplier_called;} ?>>Supplier Called<br/><br/>
			  <input type="checkbox" name="customer_called" value="checked" <?php if(isset($result->customer_called)){ echo $result->customer_called;} ?>>Customer Called<br/><br/>
			  <input type="checkbox" name="order_confirmed" value="checked" <?php if(isset($result->order_confirmed)){ echo $result->order_confirmed;} ?>>Order Confirmed<br/>
            	  </td></tr></table></td>
            </tr>
			
			   <tr>
               <td class="colo-td" align="left">
			   <b>Supplier Contact Details</b><br/>
			<?php $supplier = $this->common_model->get_supplier_name($result->supplier_id); if($supplier){ 
			echo "<p style='width:300px;float:left'>Name :" .$supplier[0]->firstname."<br/>";
			echo "Email :" .$supplier[0]->email."<br/>";
			echo "Mobile :" .$supplier[0]->mobile_no."<br/>";
			echo "Office_Ph :" .$supplier[0]->office_phone_no."<br/>";
			echo "Address :" .$supplier[0]->address."</p><br/>";
			}
			?>
			   </td>
			  <td class="colo-td" align="left">
			  <b>Payment Method :</b><br/>
			  <select style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" name="payment_method">
			  <option value="<?php if(isset($result->payment_method)){ echo  $result->payment_method; }?>"><?php if(isset($result->payment_method)){ echo  $result->payment_method; }?></option>
			  <option value="cash">Cash</option>
			  <option value="cheque">Cheque</option>
			  <option value="bank_transfer">Bank transfer</option>
			  </select>
			<br/>
			  <b>Payment Amount :</b><br/>
			  <input type="text" name="pay_amount" style="width:90px; line-height:30px;padding:3px; border-radius:5px; height:20px; border:1px solid #ccc" value="<?php if(isset($result->payment_amount)){ echo  $result->payment_amount; }?>"/><br/>
			  <b>Payment Status :</b><br/><select style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" name="payment_status"><?php if(isset($result->payment_status)){ echo  "<option>".$result->payment_status."</option>"; }?><option>Pending</option><option>Received</option></select><br/>
			  
			  </td>
            </tr>
			
			<tr>
              <td class="colo-td" align="left">
			  <b>Date & Time of Placing Order : </b><br/><?php if(isset($result->datetime)){ echo  $result->datetime; }?><br/><br/>
			  <b>Customer ID  : </b>
			  <?php  $b2c=$this->common_model->get_details_b2c();	?>
			  <select name="b2c_id"  style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required >
                  <option value="<?php if(isset($result->b2c_id)){ echo  $result->b2c_id; }?>"><?php if(isset($result->b2c_id)){ echo  "B2C/".$result->b2c_id; }?></option>
                   <?php
               
                if(isset($b2c[0]->b2c_user_id))
                    {
                    for($i=0;$i<count($b2c);$i++){
                    ?>
                      <option value="<?php echo $b2c[$i]->b2c_user_id; ?>" ><?php echo "B2C/".$b2c[$i]->b2c_user_id."-".$b2c[$i]->name; ?></option>
                    <?php	
                    }
                    }
                    ?>       
                  
                </select>
				
               <br/>
			   
				<b>B2B ID :&nbsp;</b><font class="required">*</font>
			
			<?php  $b2b=$this->common_model->get_details_b2b();	?>
			
			
			
			<select name="b2b_id"  style="width:210px; line-height:30px;margin-left: 29px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" >
                  <option value="<?php if(isset($result->b2b_id)){ echo  $result->b2b_id; }?>"><?php if(isset($result->b2b_id)){ echo "B2B/".$result->b2b_id; }?></option>
                   <?php
               
                if(isset($b2b[0]->id))
                    {
                    for($i=0;$i<count($b2b);$i++){
                    ?>
                      <option value="<?php echo $b2b[$i]->id; ?>" ><?php echo "B2B/".$b2b[$i]->id."-".$b2b[$i]->name; ?></option>
                    <?php	
                    }
                    }
                    ?>       
                  
                </select><br/><br/>
			
			   <b><u>Customer Details</u></b><br/>Street Address :&nbsp;<font class="required">*</font><br/>
			  <input type="text" value="<?php if(isset($result->customer_street_address	)){ echo $result->customer_street_address; }?>" name="customer_street_address" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_street_address', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
			   City :&nbsp;<font class="required">*</font><br/>
			  <input type="text" value="<?php if(isset($result->customer_city	)){ echo $result->customer_city; }?>" name="customer_city" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_city', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
			   Country :&nbsp;<font class="required">*</font><br/>
			  <input type="text" value="<?php if(isset($result->customer_country	)){ echo $result->customer_country; }?>" name="customer_country" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_country', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
			   Phone :&nbsp;<font class="required">*</font><br/>
			  <input type="text" value="<?php if(isset($result->customer_phone	)){ echo $result->customer_phone; }?>" name="customer_phone" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_phone', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
			   Mobile :&nbsp;<font class="required">*</font><br/>
			  <input type="text" value="<?php if(isset($result->customer_mobile	)){ echo $result->customer_mobile; }?>" name="customer_mobile" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_mobile', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
              
			  </td>
			  <td class="colo-td" align="left">
			  Booking :&nbsp;<font class="required">*</font><br/>
			  <?php if(isset($result->booking_range	)){ $date = explode("-", $result->booking_range); }?>
			  <input type="text" style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc;" value="<?php echo $date[0];?>" name="from_date" id="from_date" size="12" placeholder="mm/dd/yyyy"/>
			  <input type="text" style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc;" value="<?php echo $date[1];?>" name="to_date" id="to_date" size="12" placeholder="mm/dd/yyyy"/>
               <br/><?php echo form_error('from_date', '<div class="validation_error">', '</div>'); ?>
			   <?php echo form_error('to_date', '<div class="validation_error">', '</div>'); ?>
			   <br/>
			  <b>Order Comments :</b><br/>
			  <textarea name="order_comments" style="height: 99px;width: 210px;" >
			  <?php if(isset($result->order_comments)){ echo  $result->order_comments; }?>
			  </textarea>
			  <?php echo form_error('order_comments', '<div class="validation_error">', '</div>'); ?>
               <br/>
              </td>
			  
			   <td class="colo-td" align="left">
			   
			   <b>Order Status :</b><br/>
			 <select name="order_status" style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" ><?php if(isset($result->order_status)){ echo  "<option>".$result->order_status."</option>"; }?><option>Pending</option><option>Approved</option></select>
               <br/><br/><br/>
			    <input type="submit" class="update" value="SAVE" style="width:50px;cursor:pointer; border-radius:5px; height:25px; background-color:#517ba5; color:#fff;border:1px solid #ccc;"/></td>
         
              </td>
            </tr>
           
          
     <style>.update:hover{background-color: #1171CA !important;} </style>
      
          </table>
          </form>
          
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
