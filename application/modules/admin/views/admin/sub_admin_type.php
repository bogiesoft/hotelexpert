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
        <li><a href="<?php echo WEB_URL;?>index/view_admin_user"  >Super Admin</a></li>
         <li><a href="<?php echo WEB_URL;?>index/view_sub_admin_user" id="tabs_active" >Sub Admin</a></li>
        <?php } ?>  
         <?php if($this->session->userdata('view_supplier_users')==1) { ?>
        <li><a style="width: 184px;" href="<?php echo WEB_URL;?>index/view_supplier_details" >Vendor/Supplier Account</a></li>
         <?php } ?>  
         <?php if($this->session->userdata('view_travel_agents')==1) { ?>   
        <li><a href="<?php echo WEB_URL;?>home/view_b2b_user_details">Manage B2B </a></li>
 		  <?php } ?>
         <?php if($this->session->userdata('view_b2c_customers')==1) { ?> 
        <li><a href="<?php echo WEB_URL;?>index/view_b2c_user_details">Manage B2C </a></li>
          <?php } ?>
        <!--<li><a href="<?php echo WEB_URL;?>index/view_call_center_details">Manage Call Center</a></li>-->
       
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	<?php if($this->session->userdata('view_admin_type')==1) { ?>
	<li><a href="<?php echo WEB_URL ?>index/sub_admin_type"  id="tabs_active"  >Create Sub Admin Type </a></li>
     <?php } ?>
    <?php if($this->session->userdata('view_admin_users')==1) { ?> 
	<li><a  href="<?php echo WEB_URL ?>index/view_sub_admin_user" style="width:200px;">View Sub Admin List</a></li>
     <?php } ?>
</ul>

</div>
        </div>
      
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
   
      <div class="rightpartbox">
        <?php if($this->session->userdata('add_admin_type')==1) { ?>
        <div class="tablebox">
        <form method="post" name="admin_type" action="<?php echo WEB_URL; ?>index/add_sub_admin_type" enctype="multipart/form-data">
        
          <table width="100%" align="left" border="0" cellspacing="1" cellpadding="5" style="margin-left:10px;">
           
            <tr>
              <td class="colo-td" align="left">Sub Admin Type:&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="admin_type" size="30" value="<?php echo set_value('admin_type'); ?>" required /></td>
               <td class="colo-td" align="center" colspan="2"><input type="submit"value="Add Sub Admin Type"  
              style="width:210px; border-radius:5px; height:35px; background-color:#517ba5; color:#fff;border:1px solid #ccc;"/></td>
              </br><?php echo form_error('name', '<div class="validation_error">', '</div>'); ?>
              
             
            </tr>
           
            
            <tr>
              <td class="colo-td" align="center" colspan="2">&nbsp;</td>
            </tr>
           
          </table>
          </form>
          
        </div>
        <?php } ?>
       
<table align="right" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:20px;">

  
 </table> 

  
 
 

      </div>
   
    
    <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
 	<td align="center" class="admin-table-colo">Admin Type</td>
    <td align="center" class="admin-table-colo">Status</td>
     <?php if($this->session->userdata('edit_admin_type')==1 || $this->session->userdata('delete_admin_type')==1  ) { ?>
    <td align="center" class="admin-table-colo">Action</td>
     <?php } ?>
  </tr>
  
  <?php 
  if($result!='')
  {
for($i=0;$i<count($result);$i++)
{
	
	?>
    
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $result[$i]->sub_admin_type; ?></td>
    <td align="center" class="admin-table-colo1"><?php if($result[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    
     <?php if($this->session->userdata('edit_admin_type')==1 || $this->session->userdata('delete_admin_type')==1  ) { ?>
    <td align="center" class="admin-table-colo1">
    
     <?php if($this->session->userdata('edit_admin_type')==1) { ?>
    <a href="<?php echo WEB_URL; ?>index/edit_sub_admin_type/<?php echo $result[$i]->sub_admin_type_id; ?>">Edit</a> / 
     <?php } ?>
      <?php if($this->session->userdata('delete_admin_type')==1) { ?>
    <a href="<?php echo WEB_URL; ?>index/update_sub_admin_type/<?php echo $result[$i]->sub_admin_type_id; ?>/1 ">Active</a> / 
    <a href="<?php echo WEB_URL; ?>index/update_sub_admin_type/<?php echo $result[$i]->sub_admin_type_id; ?>/0">InActive</a> /
     <span style="font-size:12px;"><?php echo anchor(WEB_URL.'index/update_sub_admin_type/'.$result[$i]->sub_admin_type_id 	.'/2', '<span style="color:#2485BE;">Delete</span>', array('onClick' => "return confirm('Are you sure you want to delete?')")); ?> </span> 
     <?php } ?>
     
  <!-- <a href="<?php echo WEB_URL; ?>index/update_admin_type/<?php echo $result[$i]->sub_admin_type_id; ?>/2">Delete</a>--></td>
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
