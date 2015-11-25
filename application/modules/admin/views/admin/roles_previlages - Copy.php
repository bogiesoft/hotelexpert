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
        <li><a href="<?php echo WEB_URL;?>index/roles_previlages" id="tabs_active">Roles/Previliges</a></li>
        <li><a href="<?php echo WEB_URL;?>index/roles_super_admin" style="width:200px;">Super Admin</a></li>
        <li><a href="#">Sub Admin </a></li>
         <li><a href="#">Hotel Supplier</a></li>
         <li><a href="#">Villa Supplier</a></li>
         <li><a href="#">Car Supplier</a></li>
       </ul>
     
        </div>
      <!--  <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
        
        <div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">

<div class="left_box">

<div class="hotel_column">
	
   
    <form name="form" id="form">
      <select name="jumpMenu" id="jumpMenu"  style=" width:146px;"  size="10">
        <option>Hotel Supplier</option>
        <option>Apprtment Supplier</option>
        <option>Villa Supplier</option>
      </select>
    </form>   
    
	</div>
    <div class="accounts_security">
	<p>Accounts Security For Pearal Continental</p>
    
    <div class="accounts_security_box">	
  	<h3> Hotel</h3>
    
<p><input name="add hotel" type="checkbox" value="add hotel" /> Add Hotel</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Edit Rooms</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Delete Hotel</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Add Hotel Rooms</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Edit Hotel Rooms </p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Delete Hotel Room</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Manage Extra Products</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Room Priceng </p><br />

    
	</div>
    
 <div class="accounts_security_box1">	
  	<h3> Order</h3>    
    <p><input name="add hotel" type="checkbox" value="add hotel" /> Add Hotel</p>


    
	</div>
    
    <div class="accounts_security_box1">	
  	<h3> Reporting</h3>    
    <p><input name="add hotel" type="checkbox" value="add hotel" /> View Order Reports</p>
        <p><input name="add hotel" type="checkbox" value="add hotel" /> View Sales Reports</p>


    
	</div>
    
    
	</div>

</div>
<div class="right_box">


  
	<p>Accounts Security For Pearal Continental</p>
    
    <div class="apartment_box">	
  	<h3> Apartment</h3>
    
<p><input name="add hotel" type="checkbox" value="add hotel" /> Add Hotel</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Edit Rooms</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Delete Hotel</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Add Hotel Rooms</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Edit Hotel Rooms </p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Delete Hotel Room</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Manage Extra Products</p><br />
<p><input name="add hotel" type="checkbox" value="add hotel" /> Room Priceng </p><br />

    
	</div>
    
 <div class="order_box1">	
  	<h3> Order</h3>    
    <p><input name="add hotel" type="checkbox" value="add hotel" /> Add Hotel</p>


    
	</div>
    
    <div class="order_box1">	
  	<h3> Reporting</h3>    
    <p><input name="add hotel" type="checkbox" value="add hotel" /> View Order Reports</p>
        <p><input name="add hotel" type="checkbox" value="add hotel" /> View Sales Reports</p>


    
	
    
    
	</div>

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
