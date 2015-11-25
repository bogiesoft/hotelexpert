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
	var sub_admin_type_id = $('#jumpMenu').val();
	//alert(sub_admin_type_id);
	
	$.ajax({
		type: "POST",
		url: "<?php echo WEB_URL.'index/getSubAdminPrevilages'; ?>/"+sub_admin_type_id,
		success: function(data) {
			//alert(data);
			$( "input[type=checkbox]" ).removeAttr('checked');
			if(data != '')
			{
				if(data.hotelSupplierPrevilages[0].add_admin =="1")	{
					$('#add_admin').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_admin =="1")	{
					$('#edit_admin').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_admin =="1")	{
					$('#delete_admin').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_admin_users =="1")	{
					$('#view_admin_users').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_admin_type =="1")	{
					$('#add_admin_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_admin_type =="1")	{
					$('#edit_admin_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_admin_type =="1")	{
					$('#delete_admin_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_admin_type =="1")	{
					$('#view_admin_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_supplier_type =="1")	{
					$('#add_supplier_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_supplier_type =="1")	{
					$('#edit_supplier_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_supplier_type =="1")	{
					$('#delete_supplier_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_supplier_type =="1")	{
					$('#view_supplier_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_supplier_user =="1")	{
					$('#add_supplier_user').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_supplier_user =="1")	{
					$('#edit_supplier_user').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_supplier_user =="1")	{
					$('#delete_supplier_user').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_supplier_users =="1")	{
					$('#view_supplier_users').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].static_pages =="1")	{
					$('#static_pages').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].email_templates =="1")	{
					$('#email_templates').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].top_destinations =="1")	{
					$('#top_destinations').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].deals =="1")	{
					$('#deals').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].news =="1")	{
					$('#news').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_b2c_customer =="1")	{
					$('#add_b2c_customer').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_b2c_customer =="1")	{
					$('#edit_b2c_customer').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_b2c_customer =="1")	{
					$('#delete_b2c_customer').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_b2c_customers =="1")	{
					$('#view_b2c_customers').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].create_order =="1")	{
					$('#create_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_order =="1")	{
					$('#edit_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_order =="1")	{
					$('#delete_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_order =="1")	{
					$('#view_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].amenity_list =="1")	{
					$('#amenity_list').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].currencies =="1")	{
					$('#currencies').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].payment_gateways =="1")	{
					$('#payment_gateways').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].commision =="1")	{
					$('#commision').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_cities =="1")	{
					$('#manage_cities').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_amenities =="1")	{
					$('#manage_amenities').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_discounts =="1")	{
					$('#manage_discounts').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_previliges =="1")	{
					$('#manage_previliges').attr('checked','checked');
				}
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
					$('#hotel_pricing').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_villa =="1")	{
					$('#add_villa').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_villa =="1")	{
					$('#edit_villa').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_villa =="1")	{
					$('#delete_villa').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_villa =="1")	{
					$('#view_villa').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].villa_room_inventory =="1")	{
					$('#villa_room_inventory').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].villa_pricing =="1")	{
					$('#villa_pricing').attr('checked','checked');
				}
					if(data.hotelSupplierPrevilages[0].user_reports =="1")	{
					$('#user_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].order_reports =="1")	{
					$('#order_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].order_reports_status_wize =="1")	{
					$('#order_reports_status_wize').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].inventory_reports =="1")	{
					$('#inventory_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].sales_reports =="1")	{
					$('#sales_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].account_reports =="1")	{
					$('#account_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].call_center_reports =="1")	{
					$('#call_center_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].call_center_tracking_reports =="1")	{
					$('#call_center_tracking_reports').attr('checked','checked');
				}
	
				if(data.hotelSupplierPrevilages[0].add_car =="1")	{
					$('#add_car').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_car =="1")	{
					$('#edit_car').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_car =="1")	{
					$('#delete_car').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_cars =="1")	{
					$('#view_cars').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].car_room_inventory =="1")	{
					$('#car_room_inventory').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].car_pricing =="1")	{
					$('#car_pricing').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_travel_agents =="1")	{
					$('#add_travel_agents').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_travel_agents =="1")	{
					$('#edit_travel_agents').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_travel_agents =="1")	{
					$('#delete_travel_agents').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_travel_agents =="1")	{
					$('#view_travel_agents').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_room_categorys =="1")	{
					$('#manage_room_categorys').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].global_near_by_location =="1")	{
					$('#global_near_by_location').attr('checked','checked');
				}
			
			}
		}
	});
	return false;
}
<?php if(isset($user_id) && $user_id !=''){ ?>
$(document).ready(function(){
	
	var sub_admin_type_id = <?php echo $user_id;?>;
	$.ajax({
		type: "POST",
		url: "<?php echo WEB_URL.'index/getSubAdminPrevilages'; ?>/"+sub_admin_type_id,
		success: function(data) {
			//alert(data);
			$( "input[type=checkbox]" ).removeAttr('checked');
			if(data != '')
			{
				if(data.hotelSupplierPrevilages[0].add_admin =="1")	{
					$('#add_admin').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_admin =="1")	{
					$('#edit_admin').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_admin =="1")	{
					$('#delete_admin').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_admin_users =="1")	{
					$('#view_admin_users').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_admin_type =="1")	{
					$('#add_admin_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_admin_type =="1")	{
					$('#edit_admin_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_admin_type =="1")	{
					$('#delete_admin_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_admin_type =="1")	{
					$('#view_admin_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_supplier_type =="1")	{
					$('#add_supplier_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_supplier_type =="1")	{
					$('#edit_supplier_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_supplier_type =="1")	{
					$('#delete_supplier_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_supplier_type =="1")	{
					$('#view_supplier_type').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_supplier_user =="1")	{
					$('#add_supplier_user').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_supplier_user =="1")	{
					$('#edit_supplier_user').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_supplier_user =="1")	{
					$('#delete_supplier_user').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_supplier_users =="1")	{
					$('#view_supplier_users').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].static_pages =="1")	{
					$('#static_pages').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].email_templates =="1")	{
					$('#email_templates').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].top_destinations =="1")	{
					$('#top_destinations').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].deals =="1")	{
					$('#deals').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].news =="1")	{
					$('#news').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_b2c_customer =="1")	{
					$('#add_b2c_customer').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_b2c_customer =="1")	{
					$('#edit_b2c_customer').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_b2c_customer =="1")	{
					$('#delete_b2c_customer').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_b2c_customers =="1")	{
					$('#view_b2c_customers').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].create_order =="1")	{
					$('#create_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_order =="1")	{
					$('#edit_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_order =="1")	{
					$('#delete_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_order =="1")	{
					$('#view_order').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].amenity_list =="1")	{
					$('#amenity_list').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].currencies =="1")	{
					$('#currencies').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].payment_gateways =="1")	{
					$('#payment_gateways').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].commision =="1")	{
					$('#commision').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_cities =="1")	{
					$('#manage_cities').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_amenities =="1")	{
					$('#manage_amenities').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_discounts =="1")	{
					$('#manage_discounts').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_previliges =="1")	{
					$('#manage_previliges').attr('checked','checked');
				}
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
					$('#hotel_pricing').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_villa =="1")	{
					$('#add_villa').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_villa =="1")	{
					$('#edit_villa').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_villa =="1")	{
					$('#delete_villa').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_villa =="1")	{
					$('#view_villa').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].villa_room_inventory =="1")	{
					$('#villa_room_inventory').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].villa_pricing =="1")	{
					$('#villa_pricing').attr('checked','checked');
				}
					if(data.hotelSupplierPrevilages[0].user_reports =="1")	{
					$('#user_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].order_reports =="1")	{
					$('#order_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].order_reports_status_wize =="1")	{
					$('#order_reports_status_wize').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].inventory_reports =="1")	{
					$('#inventory_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].sales_reports =="1")	{
					$('#sales_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].account_reports =="1")	{
					$('#account_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].call_center_reports =="1")	{
					$('#call_center_reports').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].call_center_tracking_reports =="1")	{
					$('#call_center_tracking_reports').attr('checked','checked');
				}
	
				if(data.hotelSupplierPrevilages[0].add_car =="1")	{
					$('#add_car').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_car =="1")	{
					$('#edit_car').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_car =="1")	{
					$('#delete_car').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_cars =="1")	{
					$('#view_cars').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].car_room_inventory =="1")	{
					$('#car_room_inventory').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].car_pricing =="1")	{
					$('#car_pricing').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].add_travel_agents =="1")	{
					$('#add_travel_agents').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].edit_travel_agents =="1")	{
					$('#edit_travel_agents').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].delete_travel_agents =="1")	{
					$('#delete_travel_agents').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].view_travel_agents =="1")	{
					$('#view_travel_agents').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].manage_room_categorys =="1")	{
					$('#manage_room_categorys').attr('checked','checked');
				}
				if(data.hotelSupplierPrevilages[0].global_near_by_location =="1")	{
					$('#global_near_by_location').attr('checked','checked');
				}
			
			}
		}
	});
	return false;
});
<?php } ?>

</script>
<style>
.accounts_security {
    float: left;
    height: auto;
    padding: 5px;
    width: 350px;
}
.accounts_security_box {
    border: 1px solid #333333;
    height: auto;
    margin: 4px 0;
    padding: 0;
    width: 179px;
}
</style>
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
      <td width="580" valign="top"><div id="navjam" style="margin-top:0px;">
      <div id="navjam">
	<div class="tabs_width">
  
    <ul class="tabs1">
        <li><a href="<?php echo WEB_URL;?>index/hotel_roles_previlages" >Hotel Supplier</a></li>
        <li><a href="<?php echo WEB_URL;?>index/roles_super_admin" style="width:200px;" >Super Admin</a></li>
        <li><a href="<?php echo WEB_URL;?>index/call_center_roles_previliges" id="tabs_active">Sub Admin </a></li>
         <li><a href="<?php echo WEB_URL;?>index/b2b_roles_previliges"  style="width:90px;">B2B </a></li>
       </ul>
   
        </div>
        </div>
      <!--  <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
 <form name="hotel_supplier" id="hotel_supplier" action="<?php echo WEB_URL;?>index/set_sub_admin_previlages" method="post"> 
       
<div class="panes" style="padding-bottom:10px"></br>
<!--This is the contact information division-->
	
<div id="containerdount">
 
<h4 style="color:#2485BE;" >Sub Admin Roles/Previliges</h4>

<?php //$admin= $this->admin_model->get_sub_admin_type_details();?>
<div style="width:100%;">
<!--<span style="float:left; font-size:14px; font-weight:bold;" > Select Sub Admin Type:</span> &nbsp; &nbsp; -->
<span style="float:left; font-size:14px; font-weight:bold;" ><input type="text" name="keyword" id="keyword"  placeholder="Sub Admin Type Filter" style="width:143px" autocomplete="off" value="<?php echo set_value('keyword'); ?>" /></span>
<select name="jumpMenu" id="jumpMenu" onchange="add_hotel_place();" size="3" style="width:180px;"  required>
<option value="" selected="selected" style="font-weight:bold">Select</option>
<?php if($admin!='') { 

for($i=0;$i<count($admin);$i++)  {?>
<option value="<?php echo $admin[$i]->sub_admin_type_id; ?>" <?php if(isset($user_id) && $user_id == $admin[$i]->sub_admin_type_id) echo "selected='selected'";?>  ><?php echo $admin[$i]->sub_admin_type; ?></option>
<?php } } ?>
</select>
<div id="div1"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#keyword").keyup(function() {
			var keyval	= $("#keyword").val();
			$.ajax({
				type: "POST",
				url: "<?php echo WEB_URL.'index/sub_admin_type_search'; ?>",
				data: "keyword="+keyval,
				success:function(result){
					$("#jumpMenu").replaceWith(result);
				}
			});
			// alert("Handler for .keypress() called.");
		});
	});
</script>
</div>
<div style="clear:both;"></div>
<div class="left_box" style="width:204px;">

   <div  class="accounts_security">
	<!--<p>Accounts Security For Pearal Continental</p>-->
    
    <div class="accounts_security_box">	
  	<h3>Admin</h3>
   <p><input name="add_admin_type"  id="add_admin_type" type="checkbox" value="1" />Add Sup/Sub Admin Type</p><br />
 <p><input name="edit_admin_type" id="edit_admin_type" type="checkbox" value="1"/>Edit Sup/Sub Admin Type</p><br />
 <p><input name="delete_admin_type" id="delete_admin_type" type="checkbox" value="1" /> Delete Sup/Sub Admin Type</p><br /> 
 <p><input name="view_admin_type" id="view_admin_type" type="checkbox" value="1" /> View Sup/Sub Admin Type</p><br />  
 <p><input name="add_admin"  id="add_admin" type="checkbox" value="1" />Add Sup/Sub Admin</p><br />
 <p><input name="edit_admin" id="edit_admin" type="checkbox" value="1"/>Edit Sup/Sub Admin</p><br />
 <p><input name="delete_admin" id="delete_admin" type="checkbox" value="1" /> Delete Sup/Sub Admin</p><br />
 <p><input name="view_admin_users" id="view_admin_users" type="checkbox" value="1" /> 
 View Sup/Sub Admin Users</p><br />
	</div>
   
      <div class="accounts_security_box">	
  	<h3> Supplier</h3>
    
<p><input name="add_supplier_type"  id="add_supplier_type" type="checkbox" value="1" />Add Supplier Type</p><br />
<p><input name="edit_supplier_type" id="edit_supplier_type" type="checkbox" value="1"/>Edit Supplier Type</p><br />
<p><input name="delete_supplier_type" id="delete_supplier_type" type="checkbox" value="1"/>Delete Supplier Type</p><br />
<p><input name="view_supplier_type" id="view_supplier_type" type="checkbox" value="1" /> View Supplier Type</p><br />  
<p><input name="view_supplier_users" id="view_supplier_users" type="checkbox" value="1" />View  Supplier Users</p><br />
<p><input name="add_supplier_user" id="add_supplier_user" type="checkbox" value="1" /> Add Supplier User</p><br />
<p><input name="edit_supplier_user" id="edit_supplier_user" type="checkbox" value="1"/> Edit Supplier User</p><br />
<p><input name="delete_supplier_user" id="delete_supplier_user" type="checkbox" value="1" />Delete Supplier User</p><br />


</div>
 <div class="accounts_security_box">	
  	<h3> CMS</h3>
    
<p><input name="static_pages"  id="static_pages" type="checkbox" value="1" /> Static Pages</p><br />
<p><input name="email_templates" id="email_templates" type="checkbox" value="1"/> Email Templates</p><br />
<p><input name="top_destinations" id="top_destinations" type="checkbox" value="1"/> Top Destinations</p><br />
<p><input name="deals" id="deals" type="checkbox" value="1" /> Deals</p><br />
<p><input name="news" id="news" type="checkbox" value="1" /> News</p><br />
</div>


	
	   
   
	  
	 



	  

	</div>

</div>


<div class="right_box" style="width:716px;">


  
	<!--<p>Accounts Security For Pearal Continental</p>-->
    <div class="apartment_box" style="line-height:15px; margin-right:8px;">	
  	<h3>Global</h3>    
    <p><input name="amenity_list" id="amenity_list" type="checkbox" value="1"/>Amenity List</p><br />
        <p><input name="currencies"  id="currencies" type="checkbox" value="1" />Currencies</p><br />
		  <p><input name="payment_gateways" id="payment_gateways" type="checkbox" value="1" />Payment Gateways</p><br />
        <p><input name="commision" id="commision" type="checkbox" value="1" />Commision</p><br />
		  <p><input name="manage_cities" id="manage_cities" type="checkbox" value="1"/>Manage Cities</p><br />
        <p><input name="manage_amenities"  id="manage_amenities" type="checkbox" value="1" />Manage Amenities</p><br />
		  <p><input name="manage_discounts" id="manage_discounts" type="checkbox" value="1"/>Manage Discounts</p><br />
        <p><input name="manage_previliges" id="manage_previliges" type="checkbox" value="1" />Manage Previliges</p><br />
        <p><input name="manage_room_categorys" id="manage_room_categorys" type="checkbox" value="1" />Manage Categorys</p><br />
          <p><input name="global_near_by_location" id="global_near_by_location" type="checkbox" value="1" />Manage Near by Location</p><br />
        
        
</div>
    
    <div class="apartment_box" style="margin-right:10px;">	
  	<h3> Hotel</h3>
<!--<p><input name="add_hotel_supplier" id="add_hotel_supplier" type="checkbox" value="1"/>Add Hotel Supplier</p><br />
<p><input name="edit_hotel_supplier" id="edit_hotel_supplier" type="checkbox" value="1"/> Edit Hotel Supplier</p><br />
<p><input name="delete_hotel_supplier" id="delete_hotel_supplier" type="checkbox" value="1" /> Delete Hotel Supplier</p><br />
<p><input name="view_hotel_suppliers" id="view_hotel_suppliers" type="checkbox" value="1"/>View Hotel Suppliers</p><br />  -->
<p><input name="add_hotel" id="add_hotel" type="checkbox" value="1" />Add Hotel</p><br />
<p><input name="edit_hotel" id="edit_hotel" type="checkbox" value="1"/> Edit Hotel</p><br />
<p><input name="delete_hotel" id="delete_hotel" type="checkbox" value="1" /> Delete Hotel</p><br />
<p><input name="view_hotels" id="view_hotels" type="checkbox" value="1" /> View Hotels</p><br />
<p><input name="add_hotel_rooms" id="add_hotel_rooms" type="checkbox" value="1"/> Add Hotel Rooms</p><br />
<p><input name="edit_hotel_rooms" id="edit_hotel_rooms" type="checkbox" value="1"/> Edit Hotel Rooms </p><br />
<p><input name="delete_hotel_rooms" id="delete_hotel_rooms" type="checkbox" value="1"/> Delete Hotel Rooms</p><br />
<p><input name="view_hotel_rooms" id="view_hotel_rooms" type="checkbox" value="1"/> View Hotel Rooms</p><br />
<p><input name="hotel_room_inventory" id="hotel_room_inventory" type="checkbox" value="1" /> Room Inventory</p><br />
<p><input name="hotel_pricing" id="hotel_pricing" type="checkbox" value="1" /> Pricing</p><br />

    
	</div>
    
    
    <div class="apartment_box" style=" margin-right:10px;">	
  	<h3> Villa/Apat</h3>
<!--<p><input name="add_villa_supplier" id="add_villa_supplier" type="checkbox" value="1"/>Add Villa/Apt Supplier</p><br />
<p><input name="edit_villa_supplier" id="edit_villa_supplier" type="checkbox" value="1"/> Edit  Villa/Apt Supplier</p><br />
<p><input name="delete_villa_supplier" id="delete_villa_supplier" type="checkbox" value="1" /> Delete  Villa/Apt Supplier</p><br />
<p><input name="view_villa_suppliers" id="view_villa_suppliers" type="checkbox" value="1" /> View  Villa/Apt Suppliers</p><br />   -->
<p><input name="add_villa" id="add_villa" type="checkbox" value="1" />Add Villa/Apt</p><br />
<p><input name="edit_villa" id="edit_villa" type="checkbox" value="1" /> Edit Villa/Apt</p><br />
<p><input name="delete_villa" id="delete_villa" type="checkbox" value="1"/> Delete Villa/Apt</p><br />
<p><input name="view_villa" id="view_villa" type="checkbox" value="1"/> View Villa/Apt</p><br />
<p><input name="villa_room_inventory" id="villa_room_inventory" type="checkbox" value="1"/> Room Inventory</p><br />
<p><input name="villa_pricing" id="villa_pricing" type="checkbox" value="1" /> Pricing</p><br />

    
	</div>
     
    <div class="apartment_box" style="margin-top:5px;">	
  	<h3>Reports</h3>
<p><input name="user_reports" id="user_reports" type="checkbox" value="1"/>User Reports</p><br />
<p><input name="order_reports" id="order_reports" type="checkbox" value="1" />Order Reports</p><br />
<p><input name="order_reports_status_wize" id="order_reports_status_wize" type="checkbox" value="1" />Order Reports status wize</p><br />  
<p><input name="inventory_reports" id="inventory_reports" type="checkbox" value="1" />Inventory Reports</p><br />
<p><input name="sales_reports"  id="sales_reports" type="checkbox" value="1"/>Sales Reports</p><br />
<p><input name="account_reports" id="account_reports" type="checkbox" value="1"/>Account Reports</p><br />  
<p><input name="call_center_reports" id="call_center_reports" type="checkbox" value="1" />Call center Reports</p><br />
<p><input name="call_center_tracking_reports" id="call_center_tracking_reports" type="checkbox" value="1" />Call center Tracking Reports</p><br />
</div>
	
<!--<div class="apartment_box" style="margin-right:10px;">	
  	<h3>Call Center Agents</h3>
    
<p><input name="add_call_center_user" id="add_call_center_user" type="checkbox" value="1"/>Add Call Center User</p><br />
<p><input name="edit_call_center_user" id="edit_call_center_user" type="checkbox" value="1" /> Edit Call Center User</p><br />
<p><input name="delete_call_center_user" id="delete_call_center_user" type="checkbox" value="1" /> Delete Call Center User</p><br />
<p><input name="view_call_center_users" id="view_call_center_users" type="checkbox" value="1" /> View Call Center Users</p><br />

    
	</div>-->

 	<div class="apartment_box" style="margin-top:-80px;">	
  	<h3> Car</h3>    
<!--<p><input name="add_car_supplier" id="add_car_supplier" type="checkbox" value="1" />Add Car Supplier</p><br />
<p><input name="edit_car_supplier" id="edit_car_supplier" type="checkbox" value="1" /> Edit Car Supplier</p><br />
<p><input name="delete_car_supplier" id="delete_car_supplier" type="checkbox" value="1" /> Delete Car Supplier</p><br />
<p><input name="view_car_suppliers" id="view_car_suppliers" type="checkbox" value="1" /> View Car Suppliers</p><br />  -->

<p><input name="add_car" id="add_car" type="checkbox" value="1" />Add Car</p><br />
<p><input name="edit_car" id="edit_car" type="checkbox" value="1" /> Edit Car</p><br />
<p><input name="delete_car" id="delete_car" type="checkbox" value="1"/> Delete Car</p><br />
<p><input name="view_cars" id="view_cars" type="checkbox" value="1"/> View Cars</p><br />
<p><input name="car_room_inventory" id="car_room_inventory" type="checkbox" value="1" /> Room Inventory</p><br />
<p><input name="car_pricing" id="car_pricing" type="checkbox" value="1" /> Pricing</p><br />

</div>

    <div class="apartment_box" style="margin-left:12px;">	
  	<h3>B2B Travel Agents</h3>
<p><input name="add_travel_agents" id="add_travel_agents" type="checkbox" value="1"/>Add Travel Agents</p><br />
<p><input name="edit_travel_agents"  id="edit_travel_agents" type="checkbox" value="1" /> Edit Travel Agent</p><br />
<p><input name="delete_travel_agents" id="delete_travel_agents" type="checkbox" value="1" /> Delete Travel Agents</p><br /> 
<p><input name="view_travel_agents" id="view_travel_agents" type="checkbox" value="1" /> View Travel Agents</p><br /> 
</div>
 <div class="apartment_box" style="margin-right:8px; margin-top:-130px;"  >	
  	<h3>B2B Accounts</h3>    
    <p><input name="add_b2c_customer" id="add_b2c_customer" type="checkbox" value="1" />Add B2C Customer</p><br />
        <p><input  name="edit_b2c_customer" id="edit_b2c_customer" type="checkbox" value="1"/>Edit B2C Customer</p><br />
		  <p><input  name="delete_b2c_customer" id="delete_b2c_customer" type="checkbox" value="1" />Delete B2C Customer</p><br />
            <p><input  name="view_b2c_customers" id="view_b2c_customers" type="checkbox" value="1" />View B2C Customers</p><br />
</div> 
<div class="apartment_box" style="margin-right:8px; margin-top:-130px;">	
  	<h3> Orders</h3>
    
<p><input name="create_order"  id="create_order" type="checkbox" value="1"/>Create Order(Backend)</p><br />
<p><input name="edit_order" id="edit_order" type="checkbox" value="1" />Edit Order</p><br />
<p><input name="delete_order" id="delete_order" type="checkbox" value="1"/>Delete Order</p><br />
<p><input name="view_order" id="view_order" type="checkbox" value="1" />View Order</p><br />
</div>

</div>
 


	 




</div>     
    
  
</div>

      
  <input type="submit"  style="  background: none repeat scroll 0 0 #517BA5;
    color: white;
    font-weight: bold;
     left: 400px;
    padding: 4px 14px;
    position: relative;
    text-align: center;
    top:-10px;" value="Update..">
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
