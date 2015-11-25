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
     <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	<li><a href="<?php echo WEB_URL ?>index/call_center_roles_previliges/<?php echo $this->uri->segment(3); ?>" >Call Center Agents</a></li>
    <li><a href="<?php echo WEB_URL ?>index/data_entry_roles_previliges/<?php echo $this->uri->segment(3); ?>"  id="tabs_active" >Data Entry Operator</a></li>
</ul>
            </div>
        </div>
        </div>
      <!--  <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
 <form name="hotel_supplier" id="hotel_supplier" action="<?php echo WEB_URL;?>index/set_data_entry_previlages" method="post"> 
       
<div class="panes" style="padding-bottom:10px"></br>
<!--This is the contact information division-->
	
<div id="containerdount">
 
<h4 style="color:#2485BE;" >Data Entry Roles/Previliges</h4>
<div class="left_box" style="width:600px;">

   <div  class="accounts_security" style="width:600px;">
	<p>Accounts Security For Pearal Continental</p>
    
    <div class="accounts_security_box" style="margin-right:10px;">	
  	<h3>Hotel</h3>
    
<p><input name="add_hotel" id="add_hotel" type="checkbox" value="1"<?php if($result->add_hotel == '1') echo "checked='checked'"?> />Add Hotel</p><br />
<p><input name="edit_hotel" id="edit_hotel" type="checkbox" value="1"<?php if($result->edit_hotel == '1') echo "checked='checked'"?> /> Edit Hotel</p><br />
<p><input name="delete_hotel" id="delete_hotel" type="checkbox" value="1" <?php if($result->delete_hotel == '1') echo "checked='checked'"?>/> Delete Hotel</p><br />
<p><input name="add_hotel_rooms" id="add_hotel_rooms" type="checkbox" value="1"<?php if($result->add_hotel_rooms == '1') echo "checked='checked'"?> /> Add Hotel Rooms</p><br />
<p><input name="edit_hotel_rooms" id="edit_hotel_rooms" type="checkbox" value="1"<?php if($result->edit_hotel_rooms == '1') echo "checked='checked'"?> /> Edit Hotel Rooms </p><br />
<p><input name="delete_hotel_rooms" id="delete_hotel_rooms" type="checkbox" value="1"<?php if($result->delete_hotel_rooms == '1') echo "checked='checked'"?> /> Delete Hotel Rooms</p><br />
<p><input name="hotel_room_inventory" id="hotel_room_inventory" type="checkbox" value="1"<?php if($result->hotel_room_inventory == '1') echo "checked='checked'"?> /> Room Inventory</p><br />
<p><input name="hotel_pricing" id="hotel_pricing" type="checkbox" value="1"<?php if($result->hotel_pricing == '1') echo "checked='checked'"?> /> Pricing</p><br />	</div>
   

  



  
    <div class="accounts_security_box" style="margin-right:10px;">	
  	<h3>Villa/Apt</h3>    
  <p><input name="add_villa" id="add_villa" type="checkbox" value="1"<?php if($result->add_villa == '1') echo "checked='checked'"?> />Add Villa/Apt</p><br />
<p><input name="edit_villa" id="edit_villa" type="checkbox" value="1"<?php if($result->edit_villa == '1') echo "checked='checked'"?> /> Edit Villa/Apt</p><br />
<p><input name="delete_villa" id="delete_villa" type="checkbox" value="1"<?php if($result->delete_villa == '1') echo "checked='checked'"?> /> Delete Villa/Apt</p><br />
<p><input name="villa_room_inventory" id="villa_room_inventory" type="checkbox" value="1"<?php if($result->villa_room_inventory == '1') echo "checked='checked'"?> /> Room Inventory</p><br />
<p><input name="villa_pricing" id="villa_pricing" type="checkbox" value="1"<?php if($result->villa_pricing == '1') echo "checked='checked'"?> /> Pricing</p><br />

</div>

    
	
	
	
      <div class="accounts_security_box" style="margin-right:10px;">	
  	<h3> Car</h3>
    
<p><input name="add_car" id="add_car" type="checkbox" value="1"<?php if($result->add_car == '1') echo "checked='checked'"?> />Add Car</p><br />
<p><input name="edit_car" id="edit_car" type="checkbox" value="1"<?php if($result->edit_car == '1') echo "checked='checked'"?> /> Edit Car</p><br />
<p><input name="delete_car" id="delete_car" type="checkbox" value="1"<?php if($result->delete_car == '1') echo "checked='checked'"?> /> Delete Car</p><br />
<p><input name="car_room_inventory" id="car_room_inventory" type="checkbox" value="1"<?php if($result->car_room_inventory == '1') echo "checked='checked'"?> /> Room Inventory</p><br />
<p><input name="car_pricing" id="car_pricing" type="checkbox" value="1"<?php if($result->car_pricing == '1') echo "checked='checked'"?> /> Pricing</p><br />

</div>


	

	  
	  
	  


	  
	</div>

</div>





	 




</div>     
    
  
</div>

      
  <input type="submit"  style="  background: none repeat scroll 0 0 #517BA5;
    color: white;
    font-weight: bold;
    left: 15px;
    padding: 4px 14px;
    position: relative;
    text-align: center;
    top:5px;" value="Update..">
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
