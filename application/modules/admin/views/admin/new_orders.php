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
		
<script type="text/javascript">
			// for datepicker in reservation
			$(function() {
				$( "#from_date" ).datepicker();
				$( "#to_date" ).datepicker();
				});
				
				
			
	function getSupIds(id)
	{
		//alert(id);
		
		$.ajax({
		  url:'<?php echo WEB_URL; ?>home/view_suppliers/'+id,
		  data: '',
		  //dataType: "json",
		  beforeSend:function(){
			//alert('ajax working');
		  },
		  success: function(data){
			 
			  //alert(data);    
			 
			   $('#suppliers').html(data);
			
		  },
		 
		  
		});
		
		
	}
	function view_product_name(id)
	{
		//alert(id);
		var supplier_type = document.getElementById('supplier_type').value;
		$.ajax({
		  url:'<?php echo WEB_URL; ?>home/view_product_name/'+id+'/'+supplier_type,
		  data: '',
		  //dataType: "json",
		  beforeSend:function(){
			//alert('ajax working');
		  },
		  success: function(data){
			 
			  //alert(data);    
			 
			   $('#product_name').html(data);
			
		  },
		 
		  
		});
		
		
	}
	
	function getrooms_and_extraprod(id)
	{
	  var supplier_type = document.getElementById('supplier_type').value;
		$.ajax({
		  url:'<?php echo WEB_URL; ?>dashboard/getrooms_and_extraprod/'+id+'/'+supplier_type,
		  data: '',
		  //dataType: "json",
		  beforeSend:function(){
			//alert('ajax working');
		  },
		  success: function(data){
			 
			  //alert(data);    
			 
			   $('#extra_product').html(data);
			
		  },
		
		  
		});
		 $('#extra_product_price').val('');
		 $('#extra_product_quantity').val('');
	}
	function get_extra_product_price(price){
		$('#extra_product_price').val(price);
		startCalc()
	}
	
function startCalc(){
  interval = setInterval("calc()",1);
}
function calc(){
  one   = document.getElementById("extra_product_price").value;
  two   = document.getElementById("extra_product_quantity").value; 
  total = one*two;
  document.getElementById("extra_product_price_total").value = total;
  
}
function stopCalc(){
  clearInterval(interval);
}




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
	<li><a href="<?php echo WEB_URL ?>home/manage_orders"  >Manage Orders</a></li>
     <?php } ?>
    <?php if($this->session->userdata('create_order')==1) { ?>
	<li><a  href="<?php echo WEB_URL ?>home/add_orders"  id="tabs_active" style="width:200px;">Place New Order</a></li>
     <?php } ?>

</ul>

</div>
        </div>

      </div>
    
      </div>
      <div class="rightpartbox">
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"><strong></strong></div>
        
        
        <div class="tablebox">
        <form method="post" name="admin_register" action="<?php echo WEB_URL; ?>home/new_orders" enctype="multipart/form-data">
        
          <table width="900px" align="left" border="0" cellspacing="1" cellpadding="5" style="margin-left:10px;">
           
          <tr>
              <td class="colo-td" align="left">Customer ID :&nbsp;<font class="required">*</font><br/>
			
			<?php  $b2c=$this->common_model->get_details_b2c();	?>
			
			
			
			<select name="b2c_id"  style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required >
                  <option value="">Select</option>
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
			   
				B2B ID :&nbsp;<br/>
			
			<?php  $b2b=$this->common_model->get_details_b2b();	?>
			
			
			
			<select name="b2b_id"  style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" >
                  <option value="">Select</option>
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
                  
                </select>
				
               <br/>
			   <?php echo form_error('cus_b2b_id', '<div class="validation_error">', '</div>'); ?>
              </td>
			  <td class="colo-td" align="left">Booking :&nbsp;<font class="required">*</font><br/>
			  <input type="text" style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" name="from_date" id="from_date" size="12" placeholder="mm/dd/yyyy"/>
			  <input type="text" style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" name="to_date" id="to_date" size="12" placeholder="mm/dd/yyyy"/>
               <br/><?php echo form_error('from_date', '<div class="validation_error">', '</div>'); ?>
			   <?php echo form_error('to_date', '<div class="validation_error">', '</div>'); ?>
              </td>
            <tr>
			
			   <tr>
              <td class="colo-td" align="left"><b><u>Customer Details</u></b><br/>Street Address :&nbsp;<font class="required">*</font><br/>
			  <input type="text"  name="customer_street_address" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_street_address', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
			   City :&nbsp;<font class="required">*</font><br/>
			  <input type="text"  name="customer_city" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_city', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
			   Country :&nbsp;<font class="required">*</font><br/>
			  <input type="text"  name="customer_country" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_country', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
			   Phone :&nbsp;<font class="required">*</font><br/>
			  <input type="text"  name="customer_phone" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_phone', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
			   Mobile :&nbsp;<font class="required">*</font><br/>
			  <input type="text"  name="customer_mobile" size="30" style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc"  >
               <br/><?php echo form_error('customer_mobile', '<div class="validation_error">', '</div>'); ?>
			   
			   <br/>
              </td>
			  
			  <td class="colo-td" align="left">Extra Products :&nbsp;<br/>
				<label>Product Name</label><label style="margin-left:140px;">  Cost </label><label style="margin-left:30px;"> Quantity </label><label style="margin-left:30px;">Total</label>
				</br>
				<div id="extra_product" style="float: left;width: 207px;">
					<select  name="extra_products"  id="extra_products"  style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" >
						<option value="select">Select</option>
					</select>
				</div>
				<input style="width: 40px;float:left;line-height: 30px;padding: 3px;margin-left: 22px;border-radius: 5px;height: 22px;border: 1px solid #CCC;" type="text" name="extra_product_price" id="extra_product_price" onFocus="startCalc();" onBlur="stopCalc();"/>
				<input style="width: 40px;float:left;line-height: 30px;padding: 3px;margin-left: 30px;border-radius: 5px;height: 22px;border: 1px solid #CCC;" type="text" name="extra_product_quantity" id="extra_product_quantity" onFocus="startCalc();" onBlur="stopCalc();"/>
				<input style="width: 40px;float:left;line-height: 30px;padding: 3px;margin-left: 29px;border-radius: 5px;height: 22px;border: 1px solid #CCC;" type="text" name="extra_product_price_total" id="extra_product_price_total"/>

				<input type="button" class="add" value="ADD" id="add" style="display: none;background-color: #9C9C9C;cursor:pointer;width: 60px;height: 25px;"/>
              </td>
            <tr>
			
			<tr>
              <td class="colo-td" align="left">
			  <div>
			  Supplier Type :&nbsp;<font class="required">*</font><br/>
			  <?php  $supplier=$this->admin_model->get_details_of_supplier();
					//print '<pre />';print_r($admin);exit;
	 			?>
				<select name="supplier_type" id="supplier_type"  style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required  onchange="getSupIds(this.value)">
                  <option value="select">Select</option>
                   <?php
               
                if(isset($supplier[0]->supplier_type_id))
                    {
                    for($i=0;$i<count($supplier);$i++){
                    ?>
                      <option value="<?php echo $supplier[$i]->supplier_type_id; ?>"><?php echo $supplier[$i]->supplier_type; ?></option>
                    <?php	
                    }
                    }
                    ?>       
                  
                </select>
			  <?php echo form_error('supplier_type', '<div class="validation_error">', '</div>'); ?>
			  </div>
               <br/>
              </td>
			  <td class="colo-td" align="left">Total Cost :&nbsp;<font class="required">*</font><br/>
			  <input style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" type="text" name="total_cost" size="30" />
			  <?php echo form_error('total_cost', '<div class="validation_error">', '</div>'); ?>
               <br/>
              </td>
            <tr>
           
            
			 <tr>
			
              <td class="colo-td" align="left">Supplier ID :&nbsp;<font class="required">*</font><br/>
			
				<div id ="suppliers">
                   <select name="supplier_id"  style="width: 209px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required>
                  <option value="">Select </option>
                  
                 <?php /*?> <?php  foreach($name as $supplier_id){?>
                  
                      <option><?php echo "SUP/". $supplier_id->firstname; ?></option>
                    <?php	
                    }
                    
                    ?>  <?php */?>
                    </select>
				
			  
			  	 </div>

            
              </td>
			  
			   <td class="colo-td" align="left">Payment Amount :&nbsp;<font class="required">*</font><br/>
			  <input style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" type="text" name="pay_amount" size="30" />
			   <?php echo form_error('pay_amount', '<div class="validation_error">', '</div>'); ?>
               <br/>
            </tr>
			<tr>
              <td class="colo-td" align="left">Product ID-Product Name :&nbsp;<font class="required">*</font><br/>
              <div id="product_name">
			  <select name="product_name"  style="width: 209px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required>
                  <option value="">Select</option>
				  </select>
			  </div>
              </td> 
			  <td class="colo-td" align="left">
			  Payment Method : <br/>
			  <select style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" name="payment_method" style="width: 215px;">	  
			  <option value="cash">Cash</option>
			  <option value="cheque">Cheque</option>
			  <option value="bank_transfer">Bank transfer</option></select>
              </br>
			  <?php echo form_error('payment_method', '<div class="validation_error">', '</div>'); ?>
			  Payment Status : <br/>
			  <select style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" name="payment_status" style="width: 215px;"><option>Pending</option><option>Received</option></select>
			  <br/>
			  <?php echo form_error('payment_status', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
			<tr>
              <td class="colo-td" align="left">
              </td>
			   <td class="colo-td" align="left">Total Amount :&nbsp;<font class="required">*</font><br/>
			  <input style="width:100px; line-height:30px;padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" type="text" name="total_amount" size="30" />
               <br/>
			   <?php echo form_error('total_amount', '<div class="validation_error">', '</div>'); ?>
            </tr>
              <td class="colo-td" align="center" colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td class="colo-td" align="center" colspan="2"><input type="submit"value="Place New Order"  
              style="width:210px; border-radius:5px; height:35px; background-color:#517ba5; color:#fff;border:1px solid #ccc;"/></td>
            </tr>
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
