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
            $(document).ready(function () {

                $('#catgo1-dropdown').change(function () {
                    var selCat1 = $('#catgo1-dropdown').val();
                    console.log(selCat1);
                    $.ajax({
                        url: "<?php echo base_url();?>index.php/sample/ajax_call", //The url where the server req would we made.
                        async: false,
                        type: "POST", //The type which you want to use: GET/POST
                        data: "category1="+selCat1, //The variables which are going.
                        dataType: "html", //Return data type (what we expect).

                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
                            //data is the html of the page where the request is made.
                            $('#cotegory').html(data);
                        }
                    })
                });
            });
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
        <li><a href="<?php echo WEB_URL;?>index/roles_super_admin" style="width:200px;" id="tabs_active">Super Admin</a></li>
        <li><a href="<?php echo WEB_URL;?>index/sub_admin_roles_previliges">Sub Admin </a></li>
        <li><a href="<?php echo WEB_URL;?>index/b2b_roles_previliges"  style="width:90px;">B2B </a></li>
       </ul>
     
        </div>
        </div>
      <!--  <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
 <form name="hotel_supplier" id="hotel_supplier" action="<?php echo WEB_URL;?>index/set_super_admin_previlages" method="post"> 
       
<div class="panes" style="padding-bottom:10px"></br>
<!--This is the contact information division-->
	
<div id="containerdount">
 
<h4 style="color:#2485BE;" >Super Admin Roles/Previliges</h4>
<div class="left_box" style="width:204px;">

   <div  class="accounts_security">
	<!--<p>Accounts Security For Pearal Continental</p>-->
    
    <div class="accounts_security_box">	
  	<h3>Admin</h3>
   <p><input name="add_admin_type"  id="add_admin_type" type="checkbox" value="1"<?php if($result->add_admin_type == '1') echo "checked='checked'"?> />Add Sup/Sub Admin Type</p><br />
 <p><input name="edit_admin_type" id="edit_admin_type" type="checkbox" value="1"<?php if($result->edit_admin_type == '1') echo "checked='checked'"?>/>Edit Sup/Sub Admin Type</p><br />
 <p><input name="delete_admin_type" id="delete_admin_type" type="checkbox" value="1"<?php if($result->delete_admin_type == '1') echo "checked='checked'"?> /> Delete Sup/Sub Admin Type</p><br /> 
 <p><input name="view_admin_type" id="view_admin_type" type="checkbox" value="1"<?php if($result->view_admin_type == '1') echo "checked='checked'"?> /> View Sup/Sub Admin Type</p><br />  
 <p><input name="add_admin"  id="add_admin" type="checkbox" value="1"<?php if($result->add_admin == '1') echo "checked='checked'"?> />Add Sup/Sub Admin</p><br />
 <p><input name="edit_admin" id="edit_admin" type="checkbox" value="1"<?php if($result->edit_admin == '1') echo "checked='checked'"?> />Edit Sup/Sub  Admin</p><br />
 <p><input name="delete_admin" id="delete_admin" type="checkbox" value="1"<?php if($result->delete_admin == '1') echo "checked='checked'"?> /> 
 Delete Sup/Sub Admin</p><br />
 <p><input name="view_admin_users" id="view_admin_users" type="checkbox" value="1"<?php if($result->view_admin_users == '1') echo "checked='checked'"?> />
 View Sup/Sub Admin Users</p><br />
	</div>
    <div class="accounts_security_box">	
  	<h3> Supplier</h3>
    
<p><input name="add_supplier_type"  id="add_supplier_type" type="checkbox" value="1"<?php if($result->add_supplier_type == '1') echo "checked='checked'"?> />Add Supplier Type</p><br />
<p><input name="edit_supplier_type" id="edit_supplier_type" type="checkbox" value="1"<?php if($result->edit_supplier_type == '1') echo "checked='checked'"?>/>Edit Supplier Type</p><br />
<p><input name="delete_supplier_type" id="delete_supplier_type" type="checkbox" value="1"<?php if($result->delete_supplier_type == '1') echo "checked='checked'"?>/>Delete Supplier Type</p><br />
<p><input name="view_supplier_type" id="view_supplier_type" type="checkbox" value="1"<?php if($result->view_supplier_type == '1') echo "checked='checked'"?> /> View Supplier Type</p><br />  
<p><input name="view_supplier_users" id="view_supplier_users" type="checkbox" value="1"<?php if($result->view_supplier_users == '1') echo "checked='checked'"?> />View  Supplier Users</p><br />
<p><input name="add_supplier_user" id="add_supplier_user" type="checkbox" value="1"<?php if($result->add_supplier_user == '1') echo "checked='checked'"?> /> Add Supplier User</p><br />
<p><input name="edit_supplier_user" id="edit_supplier_user" type="checkbox" value="1"<?php if($result->edit_supplier_user == '1') echo "checked='checked'"?>/> Edit Supplier User</p><br />
<p><input name="delete_supplier_user" id="delete_supplier_user" type="checkbox" value="1"<?php if($result->delete_supplier_user == '1') echo "checked='checked'"?> />Delete Supplier User</p><br />


</div>
      <div class="accounts_security_box">	
  	<h3> CMS</h3>
    
<p><input name="static_pages"  id="static_pages" type="checkbox" value="1"<?php if($result->static_pages == '1') echo "checked='checked'"?> /> Static Pages</p><br />
<p><input name="email_templates" id="email_templates" type="checkbox" value="1"<?php if($result->email_templates == '1') echo "checked='checked'"?> /> Email Templates</p><br />
<p><input name="top_destinations" id="top_destinations" type="checkbox" value="1"<?php if($result->top_destinations == '1') echo "checked='checked'"?> /> Top Destinations</p><br />
<p><input name="deals" id="deals" type="checkbox" value="1"<?php if($result->deals == '1') echo "checked='checked'"?> /> Deals</p><br />
<p><input name="news" id="news" type="checkbox" value="1"<?php if($result->news == '1') echo "checked='checked'"?> /> News</p><br />
</div>


	</div>

</div>


<div class="right_box" style="width:716px;">


  
	<!--<p>Accounts Security For Pearal Continental</p>-->
    <div class="apartment_box" style="line-height:35px; margin-right:8px;">	
  	<h3>Global</h3>    
    <p><input name="amenity_list" id="amenity_list" type="checkbox" value="1"<?php if($result->amenity_list == '1') echo "checked='checked'"?> />Amenity List</p>
        <p><input name="currencies"  id="currencies" type="checkbox" value="1"<?php if($result->currencies == '1') echo "checked='checked'"?> />Currencies</p>
		  <p><input name="payment_gateways" id="payment_gateways" type="checkbox" value="1"<?php if($result->payment_gateways == '1') echo "checked='checked'"?> />Payment Gateways</p>
        <p><input name="commision" id="commision" type="checkbox" value="1"<?php if($result->commision == '1') echo "checked='checked'"?> />Commision</p>
		  <p><input name="manage_cities" id="manage_cities" type="checkbox" value="1"<?php if($result->manage_cities == '1') echo "checked='checked'"?> />Manage Cities</p>
        <p><input name="manage_amenities"  id="manage_amenities" type="checkbox" value="1"<?php if($result->manage_amenities == '1') echo "checked='checked'"?> />Manage Amenities</p>
		  <p><input name="manage_discounts" id="manage_discounts" type="checkbox" value="1"<?php if($result->manage_discounts == '1') echo "checked='checked'"?> />Manage Discounts</p>
        <p><input name="manage_previliges" id="manage_previliges" type="checkbox" value="1"<?php if($result->manage_previliges == '1') echo "checked='checked'"?> />Manage Previliges</p>
         <p><input name="manage_room_categorys" id="manage_room_categorys" type="checkbox" value="1"<?php if($result->manage_room_categorys == '1') echo "checked='checked'"?> />Manage Categorys</p>
          <p><input name="global_near_by_location" id="global_near_by_location" type="checkbox" value="1"<?php if($result->global_near_by_location == '1') echo "checked='checked'"?> />Manage Near by Location</p>
        
        
</div>
    
    <div class="apartment_box" style="margin-right:10px;">	
  	<h3> Hotel</h3>
<!--<p><input name="add_hotel_supplier" id="add_hotel_supplier" type="checkbox" value="1"<?php if($result->add_hotel_supplier == '1') echo "checked='checked'"?> />Add Hotel Supplier</p><br />
<p><input name="edit_hotel_supplier" id="edit_hotel_supplier" type="checkbox" value="1"<?php if($result->edit_hotel_supplier == '1') echo "checked='checked'"?> /> Edit Hotel Supplier</p><br />
<p><input name="delete_hotel_supplier" id="delete_hotel_supplier" type="checkbox" value="1"<?php if($result->delete_hotel_supplier == '1') echo "checked='checked'"?> /> Delete Hotel Supplier</p><br /> 
<p><input name="view_hotel_suppliers" id="view_hotel_suppliers" type="checkbox" value="1"<?php if($result->view_hotel_suppliers == '1') echo "checked='checked'"?> /> Delete Hotel Supplier</p><br /> --> 
 
<p><input name="add_hotel" id="add_hotel" type="checkbox" value="1"<?php if($result->add_hotel == '1') echo "checked='checked'"?> />Add Hotel</p><br />
<p><input name="edit_hotel" id="edit_hotel" type="checkbox" value="1"<?php if($result->edit_hotel == '1') echo "checked='checked'"?> /> Edit Hotel</p><br />
<p><input name="delete_hotel" id="delete_hotel" type="checkbox" value="1"<?php if($result->delete_hotel == '1') echo "checked='checked'"?> /> Delete Hotel</p><br />
<p><input name="view_hotels" id="view_hotels" type="checkbox" value="1"<?php if($result->view_hotels == '1') echo "checked='checked'"?> /> View Hotels</p><br />
<p><input name="add_hotel_rooms" id="add_hotel_rooms" type="checkbox" value="1"<?php if($result->add_hotel_rooms == '1') echo "checked='checked'"?> /> Add Hotel Rooms</p><br />
<p><input name="edit_hotel_rooms" id="edit_hotel_rooms" type="checkbox" value="1"<?php if($result->edit_hotel_rooms == '1') echo "checked='checked'"?> /> Edit Hotel Rooms </p><br />
<p><input name="delete_hotel_rooms" id="delete_hotel_rooms" type="checkbox" value="1"<?php if($result->delete_hotel_rooms == '1') echo "checked='checked'"?> /> Delete Hotel Rooms</p><br />
<p><input name="view_hotel_rooms" id="view_hotel_rooms" type="checkbox" value="1"<?php if($result->view_hotel_rooms == '1') echo "checked='checked'"?>/> View Hotel Rooms</p><br />

<p><input name="hotel_room_inventory" id="hotel_room_inventory" type="checkbox" value="1"<?php if($result->hotel_room_inventory == '1') echo "checked='checked'"?> /> Room Inventory</p><br />

<p><input name="hotel_pricing" id="hotel_pricing" type="checkbox" value="1"<?php if($result->hotel_pricing == '1') echo "checked='checked'"?> /> Pricing</p><br />


    
	</div>
    
    
    <div class="apartment_box" style=" margin-right:10px;">	
  	<h3> Villa/Apat</h3>
<!--<p><input name="add_villa_supplier" id="add_villa_supplier" type="checkbox" value="1"<?php if($result->add_villa_supplier == '1') echo "checked='checked'"?> />Add Villa/Apt Supplier</p><br />
<p><input name="edit_villa_supplier" id="edit_villa_supplier" type="checkbox" value="1"<?php if($result->edit_villa_supplier == '1') echo "checked='checked'"?> /> Edit  Villa/Apt Supplier</p><br />
<p><input name="delete_villa_supplier" id="delete_villa_supplier" type="checkbox" value="1"<?php if($result->delete_villa_supplier == '1') echo "checked='checked'"?> /> Delete  Villa/Apt Supplier</p><br />  
<p><input name="view_villa_suppliers" id="view_villa_suppliers" type="checkbox" value="1"<?php if($result->delete_villa_supplier == '1') echo "checked='checked'"?> /> View  Villa/Apt Suppliers</p><br /> --> 
<p><input name="add_villa" id="add_villa" type="checkbox" value="1"<?php if($result->add_villa == '1') echo "checked='checked'"?> />Add Villa/Apt</p><br />
<p><input name="edit_villa" id="edit_villa" type="checkbox" value="1"<?php if($result->edit_villa == '1') echo "checked='checked'"?> /> Edit Villa/Apt</p><br />
<p><input name="delete_villa" id="delete_villa" type="checkbox" value="1"<?php if($result->delete_villa == '1') echo "checked='checked'"?> /> Delete Villa/Apt</p><br />
<p><input name="view_villa" id="view_villa" type="checkbox" value="1"<?php if($result->view_villa == '1') echo "checked='checked'"?>/> View Villa/Apt</p><br />
<p><input name="villa_room_inventory" id="villa_room_inventory" type="checkbox" value="1"<?php if($result->villa_room_inventory == '1') echo "checked='checked'"?> /> Room Inventory</p><br />
<p><input name="villa_pricing" id="villa_pricing" type="checkbox" value="1"<?php if($result->villa_pricing == '1') echo "checked='checked'"?> /> Pricing</p><br />

    
	</div>
     
    <div class="apartment_box" style="margin-top:5px;">	
  	<h3>Reports</h3>
<p><input name="user_reports" id="user_reports" type="checkbox" value="1"<?php if($result->user_reports == '1') echo "checked='checked'"?> />User Reports</p><br />
<p><input name="order_reports" id="order_reports" type="checkbox" value="1"<?php if($result->order_reports == '1') echo "checked='checked'"?> />Order Reports</p><br />
<p><input name="order_reports_status_wize" id="order_reports_status_wize" type="checkbox" value="1"<?php if($result->order_reports_status_wize == '1') echo "checked='checked'"?> />Order Reports status wize</p><br />  
<p><input name="inventory_reports" id="inventory_reports" type="checkbox" value="1"<?php if($result->inventory_reports == '1') echo "checked='checked'"?> />Inventory Reports</p><br />
<p><input name="sales_reports"  id="sales_reports" type="checkbox" value="1"<?php if($result->sales_reports == '1') echo "checked='checked'"?> />Sales Reports</p><br />
<p><input name="account_reports" id="account_reports" type="checkbox" value="1"<?php if($result->account_reports == '1') echo "checked='checked'"?> />Account Reports</p><br />  
<p><input name="call_center_reports" id="call_center_reports" type="checkbox" value="1"<?php if($result->call_center_reports == '1') echo "checked='checked'"?> />Call center Reports</p><br />
<p><input name="call_center_tracking_reports" id="call_center_tracking_reports" type="checkbox" value="1"<?php if($result->call_center_tracking_reports == '1') echo "checked='checked'"?> />Call center Tracking Reports</p><br />

</div>
	
<!--<div class="apartment_box" style="margin-right:10px;">	
  	<h3>Call Center Agents</h3>
    
<p><input name="add_call_center_user" id="add_call_center_user" type="checkbox" value="1"<?php if($result->add_call_center_user == '1') echo "checked='checked'"?> />Add Call Center User</p><br />
<p><input name="edit_call_center_user" id="edit_call_center_user" type="checkbox" value="1"<?php if($result->edit_call_center_user == '1') echo "checked='checked'"?> /> Edit Call Center User</p><br />
<p><input name="delete_call_center_user" id="delete_call_center_user" type="checkbox" value="1"<?php if($result->delete_call_center_user == '1') echo "checked='checked'"?> /> Delete Call Center User</p><br />
<p><input name="view_call_center_users" id="view_call_center_users" type="checkbox" value="1"<?php if($result->view_call_center_users == '1') echo "checked='checked'"?> /> View Call Center Users</p><br />

    
	</div>
-->

 	<div class="apartment_box" style="margin-top:-80px;">	
  	<h3> Car</h3>    
 <!-- <p><input name="add_car_supplier" id="add_car_supplier" type="checkbox" value="1"<?php if($result->add_car_supplier == '1') echo "checked='checked'"?> />Add Car Supplier</p><br />
<p><input name="edit_car_supplier" id="edit_car_supplier" type="checkbox" value="1"<?php if($result->edit_car_supplier == '1') echo "checked='checked'"?> /> Edit Car Supplier</p><br />
<p><input name="delete_car_supplier" id="delete_car_supplier" type="checkbox" value="1"<?php if($result->delete_car_supplier == '1') echo "checked='checked'"?> /> Delete Car Supplier</p><br />  
<p><input name="view_car_suppliers" id="view_car_suppliers" type="checkbox" value="1"<?php if($result->view_car_suppliers == '1') echo "checked='checked'"?> /> View Car Suppliers</p><br /> -->
<p><input name="add_car" id="add_car" type="checkbox" value="1"<?php if($result->add_car == '1') echo "checked='checked'"?> />Add Car</p><br />
<p><input name="edit_car" id="edit_car" type="checkbox" value="1"<?php if($result->edit_car == '1') echo "checked='checked'"?> /> Edit Car</p><br />
<p><input name="delete_car" id="delete_car" type="checkbox" value="1"<?php if($result->delete_car == '1') echo "checked='checked'"?> /> Delete Car</p><br />
<p><input name="view_cars" id="view_cars" type="checkbox" value="1"<?php if($result->view_cars == '1') echo "checked='checked'"?>/> View Cars</p><br />

<p><input name="car_room_inventory" id="car_room_inventory" type="checkbox" value="1"<?php if($result->car_room_inventory == '1') echo "checked='checked'"?> /> Car Inventory</p><br />
<p><input name="car_pricing" id="car_pricing" type="checkbox" value="1"<?php if($result->car_pricing == '1') echo "checked='checked'"?> /> Pricing</p><br />
</div>

    <div class="apartment_box" style="margin-left:12px;">	
  	<h3>B2B Travel Agents</h3>
<p><input name="add_travel_agents" id="add_travel_agents" type="checkbox" value="1"<?php if($result->add_travel_agents == '1') echo "checked='checked'"?> />Add Travel Agents</p><br />
<p><input name="edit_travel_agents"  id="edit_travel_agents" type="checkbox" value="1"<?php if($result->edit_travel_agents == '1') echo "checked='checked'"?> /> Edit Travel Agent</p><br />
<p><input name="delete_travel_agents" id="delete_travel_agents" type="checkbox" value="1"<?php if($result->delete_travel_agents == '1') echo "checked='checked'"?> /> Delete Travel Agents</p><br />  
<p><input name="view_travel_agents" id="view_travel_agents" type="checkbox" value="1"<?php if($result->view_travel_agents == '1') echo "checked='checked'"?> /> View Travel Agents</p><br />
</div>
 <div class="apartment_box" style="margin-right:8px; margin-top:-130px;"  >	
  	<h3>B2B Accounts</h3>    
     <p><input name="add_b2c_customer" id="add_b2c_customer" type="checkbox" value="1"<?php if($result->add_b2c_customer == '1') echo "checked='checked'"?> />Add B2C Customer</p><br />
        <p><input  name="edit_b2c_customer" id="edit_b2c_customer" type="checkbox" value="1"<?php if($result->edit_b2c_customer == '1') echo "checked='checked'"?> />Edit B2C Customer</p><br />
		  <p><input  name="delete_b2c_customer" id="delete_b2c_customer" type="checkbox" value="1"<?php if($result->delete_b2c_customer == '1') echo "checked='checked'"?> />Delete B2C Customer</p><br />
           <p><input  name="view_b2c_customers" id="view_b2c_customers" type="checkbox" value="1"<?php if($result->view_b2c_customers == '1') echo "checked='checked'"?> />View B2C Customers</p><br />
</div> 
<div class="apartment_box" style="margin-right:8px; margin-top:-130px;">	
  	<h3> Orders</h3>
    
<p><input name="create_order"  id="create_order" type="checkbox" value="1"<?php if($result->create_order == '1') echo "checked='checked'"?> />Create Order(Backend)</p><br />
<p><input name="edit_order" id="edit_order" type="checkbox" value="1"<?php if($result->edit_order == '1') echo "checked='checked'"?> />Edit Order</p><br />
<p><input name="delete_order" id="delete_order" type="checkbox" value="1"<?php if($result->delete_order == '1') echo "checked='checked'"?> />Delete Order</p><br />
<p><input name="view_order" id="view_order" type="checkbox" value="1"<?php if($result->view_order == '1') echo "checked='checked'"?> />View Order</p><br />
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
