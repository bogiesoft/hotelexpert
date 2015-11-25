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
        <li><a href="<?php echo WEB_URL;?>index/view_admin_user" id="tabs_active">Super Admin / Sub Admin</a></li>
         <li><a href="<?php echo WEB_URL;?>index/view_sub_admin_user">Sub Admin</a></li>
      <?php } ?>
      <?php if($this->session->userdata('view_supplier_users')==1) { ?>
      <li><a style="width: 184px;" href="<?php echo WEB_URL;?>index/view_supplier_details">Vendor/Supplier Account</a></li>
       <?php } ?>
        <?php if($this->session->userdata('view_travel_agents')==1) { ?>   
        <li><a href="<?php echo WEB_URL;?>home/view_b2b_user_details">Manage B2B </a></li>
        <?php } ?>
         <?php if($this->session->userdata('view_b2c_customers')==1) { ?>
        <li><a href="<?php echo WEB_URL;?>index/view_b2c_user_details">Manage B2C </a></li>
         <?php } ?>
       <!-- <li><a href="<?php echo WEB_URL;?>index/view_call_center_details" >Manage Call Center</a></li>-->
       
     
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	 <?php if($this->session->userdata('view_admin_type')==1) { ?> 
	<li><a href="<?php echo WEB_URL ?>index/admin_type"  >Create Admin Type </a></li>
      <?php } ?>
    <?php if($this->session->userdata('view_admin_users')==1) { ?> 
	<li><a  href="<?php echo WEB_URL ?>index/view_admin_user" style="width:200px;" id="tabs_active"  >View Super Admin Details</a></li>
   <?php } ?>
</ul>

</div>
        </div>
      <!--  <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
        
        <div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">
	<?php if($this->session->userdata('add_admin')==1) { ?>
  <div class="right_header" style="float:right;"><a href="<?php echo WEB_URL;?>index/super_admin" style="color:#2485BE;">Add New Super Admin User</a></div>
  <?php } ?>
<table width="98%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5; margin:21px 0 0 8px" >

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
 	<td align="center" class="admin-table-colo">Admin Type</td>
    <td align="center" class="admin-table-colo">Name</td>
     <td align="center" class="admin-table-colo">Email</td>
    <td align="center" class="admin-table-colo">Contact No</td>
     <td align="center" class="admin-table-colo">status</td>
     <?php if($this->session->userdata('edit_admin')==1 || $this->session->userdata('delete_admin')==1 ) { ?>
     <td align="center" class="admin-table-colo">action</td>
      <?php } ?>
  </tr>
  
  <?php 
  if($admin_details[0]!='')
  {
for($i=0;$i<count($admin_details);$i++)
{
	
	?>
    
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    
    <td align="center" class="admin-table-colo1"><?php echo $this->admin_model->get_admin_type($admin_details[$i]->admin_type); ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $admin_details[$i]->firstname;  ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $admin_details[$i]->email; ?></td>
     <td align="center" class="admin-table-colo1"><?php echo $admin_details[$i]->mobile_no; ?></td>
    <td align="center" class="admin-table-colo1"><?php if($admin_details[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
     <?php if($this->session->userdata('edit_admin')==1 || $this->session->userdata('delete_admin')==1 ) { ?>
    <td align="center" class="admin-table-colo1">
    <?php if($this->session->userdata('edit_admin')==1) { ?>
     <a href="<?php echo WEB_URL; ?>index/edit_admin_user/<?php echo $admin_details[$i]->user_id ; ?> " style="color:#2485BE;">Edit</a> /
     <?php } ?>
     <?php if($this->session->userdata('delete_admin')==1) { ?>
    <a href="<?php echo WEB_URL; ?>index/update_admin_user/<?php echo $admin_details[$i]->user_id; ?>/1 " style="color:#2485BE;">Active</a> / 
    <a href="<?php echo WEB_URL; ?>index/update_admin_user/<?php echo $admin_details[$i]->user_id; ?>/0" style="color:#2485BE;">InActive</a>/ 
      <span style="font-size:12px;"><?php echo anchor(WEB_URL.'index/update_admin_user/'.$admin_details[$i]->user_id.'/2', '<span style="color:#2485BE;">Delete</span>', array('onClick' => "return confirm('Are you sure you want to delete?')")); ?> </span>
       <?php } ?>
   <!-- <a href="<?php echo WEB_URL; ?>index/update_admin_user/<?php echo $admin_details[$i]->user_id; ?>/2">Delete</a>--></td>
   		<?php } ?>
  </tr>
 <?php
}
  }
  else
  {
	  
?>
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...
<?php
  }
  ?>
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
