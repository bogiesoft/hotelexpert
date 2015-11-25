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
      <td width="580" valign="top"><div id="navjam" style="margin-top:0px;">
          <div id="navjam">
	<div class="tabs_width">
    <ul class="tabs1">
         <?php if($this->session->userdata('view_admin_users')==1) { ?>  
        <li><a href="<?php echo WEB_URL;?>index/view_admin_user">Super Admin</a></li>
         <li><a href="<?php echo WEB_URL;?>index/view_sub_admin_user" >Sub Admin</a></li>
        <?php } ?>  
         <?php if($this->session->userdata('view_supplier_users')==1) { ?>
        <li><a style="width: 184px;" href="<?php echo WEB_URL;?>index/view_supplier_details" id="tabs_active" >Vendor/Supplier Account</a></li>
         <?php } ?>  
         <?php if($this->session->userdata('view_travel_agents')==1) { ?>   
        <li><a href="<?php echo WEB_URL;?>home/view_b2b_user_details">Manage B2B </a></li>
 		  <?php } ?>
         <?php if($this->session->userdata('view_b2c_customers')==1) { ?> 
        <li><a href="<?php echo WEB_URL;?>index/view_b2c_user_details">Manage B2C </a></li>
          <?php } ?>
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	<?php if($this->session->userdata('view_supplier_type')==1) { ?>
	<li><a href="<?php echo WEB_URL ?>index/supplier_type" id="tabs_active"  >Create Supplier Type </a></li>
     <?php } ?>  
    <?php if($this->session->userdata('view_supplier_users')==1) { ?>
	<li><a  href="<?php echo WEB_URL ?>index/view_supplier_details" style="width:200px;" >Edit/ Delete Supplier User</a></li>
     <?php } ?>  

</ul>

</div>
        </div>
      
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
   
      <div class="rightpartbox">
      
  <div  class="right_header"><a href="<?php echo WEB_URL;?>index/supplier_type" style="color:#2485BE;">Back</a></div>      
        
        <div class="tablebox"  >
        <form method="post" name="admin_type" action="<?php echo WEB_URL; ?>index/update_supplier_type_details/<?php echo $sup_name->supplier_type_id ; ?>" enctype="multipart/form-data">
        
          <table width="100%" align="left" border="0" cellspacing="1" cellpadding="5" style="margin-left:10px;">
           
            <tr>
              <td class="colo-td" align="left">Supplier Type:&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="supplier_type" size="30" value="<?php echo $sup_name->supplier_type; ?>" required /></td>
               <td class="colo-td" align="center" colspan="2"><input type="submit"value="Update supplier Type"  
              style="width:150px; border-radius:5px; height:35px; background-color:#517ba5; color:#fff;border:1px solid #ccc;"/></td>
              </br><?php echo form_error('name', '<div class="validation_error">', '</div>'); ?>
              
             
            </tr>
           
            
            <tr>
              <td class="colo-td" align="center" colspan="2">&nbsp;</td>
            </tr>
           
          </table>
          </form>
          
        </div>
       
<table align="right" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:20px;">

  
 </table> 

  
 
 

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
