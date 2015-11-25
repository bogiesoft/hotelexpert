<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>

<script type="text/javascript">
function add_hotel_place(){
	var supplier_id = $('#jumpMenu').val();
	//alert(supplier_id);
	
	$.ajax({
		type: "POST",
		url: "<?php echo WEB_URL.'index/getHotelSupplierPrevilages'; ?>/"+supplier_id,
		success: function(data) {
			$( "input[type=checkbox]" ).removeAttr('checked');
			if(data != '')
			{
				if(data.hotelSupplierPrevilages[0].add_hotel =="1")	{
					$('#add_hotel').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_hotel =="1")	{
					$('#edit_hotel').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_hotel =="1")	{
					$('#delete_hotel').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_hotels =="1")	{
					$('#view_hotels').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_hotel_rooms =="1")	{
					$('#add_hotel_rooms').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_hotel_rooms =="1")	{
					$('#edit_hotel_rooms').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_hotel_rooms =="1")	{
					$('#delete_hotel_rooms').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_hotel_rooms =="1")	{
					$('#view_hotel_rooms').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].hotel_room_inventory =="1")	{
					$('#hotel_room_inventory').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].hotel_pricing =="1")	{
					$('#hotel_room_pricing').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_order =="1")	{
					$('#view_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_order_reports =="1")	{
					$('#view_order_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_sales_reports =="1")	{
					$('#view_sales_reports').attr('checked','checked');
				}
			}
		}
	});
	return false;
}
<?php if(isset($user_id) && $user_id !=''){ ?>
$(document).ready(function(){
	
	var supplier_id = <?php echo $user_id;?>;
	$.ajax({
		type: "POST",
		url: "<?php echo WEB_URL.'index/getHotelSupplierPrevilages'; ?>/"+supplier_id,
		success: function(data) {
			$( "input[type=checkbox]" ).removeAttr('checked');
			if(data != '')
			{
				if(data.hotelSupplierPrevilages[0].add_hotel =="1")	{
					$('#add_hotel').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_hotel =="1")	{
					$('#edit_hotel').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_hotel =="1")	{
					$('#delete_hotel').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_hotels =="1")	{
					$('#view_hotels').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_hotel_rooms =="1")	{
					$('#add_hotel_rooms').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_hotel_rooms =="1")	{
					$('#edit_hotel_rooms').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_hotel_rooms =="1")	{
					$('#delete_hotel_rooms').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_hotel_rooms =="1")	{
					$('#view_hotel_rooms').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].hotel_room_inventory =="1")	{
					$('#hotel_room_inventory').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].hotel_pricing =="1")	{
					$('#hotel_room_pricing').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_order =="1")	{
					$('#view_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_order_reports =="1")	{
					$('#view_order_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_sales_reports =="1")	{
					$('#view_sales_reports').attr('checked','checked');
				}
			}
		}
	});
	return false;
	
});
<?php } ?>
</script>
</head>

<body>
<div id="div_wrapper">
<div id="div_container">
<table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
  <?php $this->load->view('admin/header'); ?>
    <tr>
  
    <td>
  
  <table width="966"  border="0" align="center" style="">
    <tr>
      <td width="580" valign="top"><div id="navjam" style="margin-top:0px;">
      <div id="navjam">
	<div class="tabs_width">
    <ul class="tabs1">
        <li><a href="<?php echo WEB_URL;?>index/hotel_roles_previlages" id="tabs_active">Hotel Supplier</a></li>
     
        <li><a href="<?php echo WEB_URL;?>index/roles_super_admin" style="width:200px;">Super Admin</a></li>
       <li><a href="<?php echo WEB_URL;?>index/sub_admin_roles_previliges">Sub Admin </a></li>
        <li><a href="<?php echo WEB_URL;?>index/b2b_roles_previliges"  style="width:90px;">B2B </a></li>
       </ul>
     
        </div>
      <!--  <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
      
<form name="hotel_supplier" id="hotel_supplier" action="<?php echo WEB_URL;?>index/set_hotel_previlages" method="post">        
<div class="panes" style="padding-bottom:10px"></br>

<!--This is the contact information division-->
<div id="containerdount">
<h4 style="color:#2485BE;" >Hotel Supplier Roles/Previliges</h4>

<div class="left_box">

<div class="hotel_column">

<?php //$admin= $this->admin_model->get_hotel_supplier_details(1);?>
<input type="text" name="keyword" id="keyword"  placeholder="Hotel Supplier Filter" style="width:143px" autocomplete="off" value="<?php echo set_value('keyword'); ?>" />
<select name="jumpMenu" id="jumpMenu" onchange="add_hotel_place();" style="width:146px;" size="20" required>
<option value="" selected="selected" style="font-weight:bold">Select</option>
<?php if($sup_details!='') { 

for($i=0;$i<count($sup_details);$i++)  {?>
<option value="<?php echo $sup_details[$i]->user_id; ?>"<?php if(isset($user_id) && $user_id == $sup_details[$i]->user_id) echo "selected='selected'";?>><?php echo $sup_details[$i]->firstname; ?></option>
<?php } } ?>
</select>
</div>
<div id="div1"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#keyword").keyup(function() {
			var keyval	= $("#keyword").val();
			$.ajax({
				type: "POST",
				url: "<?php echo WEB_URL.'index/hotel_supplier_search'; ?>",
				data: "keyword="+keyval,
				success:function(result){
					$("#jumpMenu").replaceWith(result);
				}
			});
			// alert("Handler for .keypress() called.");
		});
	});
</script>
<div class="accounts_security">
<!--<p>Accounts Security For Pearal Continental</p>-->

<div class="accounts_security_box">	
<h3> Hotel</h3>
<p><input name="add_hotel" id="add_hotel" type="checkbox" value="1" /> Add Hotel</p><br />
<p><input name="edit_hotel" id="edit_hotel" type="checkbox" value="1" /> Edit Hotel</p><br />
<p><input name="delete_hotel" id="delete_hotel" type="checkbox" value="1" /> Delete Hotel</p><br />
<p><input name="view_hotels" id="view_hotels" type="checkbox" value="1" /> View  Hotels</p><br />

<p><input name="add_hotel_rooms" id="add_hotel_rooms" type="checkbox" value="1" /> Add Hotel Rooms</p><br />
<p><input name="edit_hotel_rooms" id="edit_hotel_rooms" type="checkbox" value="1" /> Edit Hotel Rooms </p><br />
<p><input name="delete_hotel_rooms" id="delete_hotel_rooms" type="checkbox" value="1" /> Delete Hotel Room</p><br />
<p><input name="hotel_room_inventory" id="hotel_room_inventory" type="checkbox" value="1" /> Room Inventory</p><br />
<p><input name="view_hotel_rooms" id="view_hotel_rooms" type="checkbox" value="1"/> View Hotel Rooms</p><br />
<p><input name="hotel_room_pricing" id="hotel_room_pricing" type="checkbox" value="1" /> Room Pricing </p><br />
</div>

<div class="accounts_security_box1">	
<h3> Order</h3>    
<p><input name="view_order" id="view_order" type="checkbox" value="1" />View Order</p>
</div>

<div class="accounts_security_box1">	
<h3> Reporting</h3>    
<p><input name="view_order_reports" id="view_order_reports" type="checkbox" value="1" /> View Order Reports</p>
<p><input name="view_sales_reports" id="view_sales_reports" type="checkbox" value="1" /> View Sales Reports</p>
</div>
</div>
<input type="submit"  style="  background: none repeat scroll 0 0 #517BA5;
    color: white;
    font-weight: bold;
    left: 175px;
    padding: 4px 14px;
    position: relative;
    text-align: center;
    top: 40px;" value="Update">
</div>

</div>     

</div>
<div style="display:table">

</div>
</form>      
  
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

</body>
</html>
<style>
.colo-td {
	font-family:Arial, Helvetica, sans-serif;
	font-size:15px;
	color:#000;
}
</style>
