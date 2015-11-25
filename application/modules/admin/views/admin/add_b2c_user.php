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
      <td width="580" valign="top">
        <div id="navjam" style="margin-top:0px;">
          <div id="navjam">
	<div class="tabs_width">
    <ul class="tabs1">
       <?php if($this->session->userdata('view_admin_users')==1) { ?>  
        <li><a href="<?php echo WEB_URL;?>index/view_admin_user">Super Admin</a></li>
        <li><a href="<?php echo WEB_URL;?>index/view_sub_admin_user" >Sub Admin</a></li>
        <?php } ?>  
       
        <?php if($this->session->userdata('view_supplier_users')==1) { ?>
        <li><a style="width: 184px;" href="<?php echo WEB_URL;?>index/view_supplier_details">Vendor/Supplier Account</a></li>
        <?php } ?>
       
        <?php if($this->session->userdata('view_travel_agents')==1) { ?>   
        <li><a href="<?php echo WEB_URL;?>home/view_b2b_user_details" >Manage B2B </a></li>
        <?php } ?>
       
        <?php if($this->session->userdata('view_b2c_customers')==1) { ?>
        <li><a href="<?php echo WEB_URL;?>index/view_b2c_user_details" id="tabs_active" >Manage B2C </a></li>
        <?php } ?>
       <!-- <li><a href="<?php echo WEB_URL;?>index/view_call_center_details">Manage Call Center</a></li>-->
       
       
       </ul>
          
        </div>
       <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
      <div class="rightpartbox">
      <div class="right_header"><a href="<?php echo WEB_URL;?>index/view_b2c_user_details" style="color:#2485BE;">Go Back</a></div>
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"><strong></strong></div>
        
        
        <div class="tablebox">
        <form method="post" name="admin_register" action="<?php echo WEB_URL; ?>index/b2c_registration_page" enctype="multipart/form-data">
        
          <table width="900px" align="left" border="0" cellspacing="1" cellpadding="5" style="margin-left:10px;">
           
            
            <tr>
              <td class="colo-td" align="left">Name :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="name" size="30" value="<?php echo set_value('name'); ?>"/>
              </br><?php echo form_error('name', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
              <td class="colo-td" align="left">Email :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="email" size="30" value="<?php echo set_value('email'); ?>"/>
               </br><?php echo form_error('email', '<div class="validation_error">', '</div>'); ?>
              </td></br>
            
            </tr>
            <tr>
              <td class="colo-td" align="left">Password :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="password" name="password" size="30"  value="<?php echo set_value('password'); ?>"/>
               </br><?php echo form_error('password', '<div class="validation_error">', '</div>'); ?>
              </td>
            
            </tr>
            <tr>
              <td class="colo-td" align="left">Confirm Password :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="password" name="comform_password" size="30" value="<?php echo set_value('comform_password'); ?>" />
              </br><?php echo form_error('comform_password', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
              <td class="colo-td" align="left">Address :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><textarea name="address" cols="23" rows="5"  style="width:210px; border-radius:5px; height:125px; border:1px solid #ccc"><?php echo set_value('address'); ?></textarea>
              </br><?php echo form_error('address', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
              <td class="colo-td" align="left">Phone No :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="mobile_no" size="30" value="<?php echo set_value('mobile_no'); ?>" />
              </br><?php echo form_error('mobile_no', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
              <td class="colo-td" align="left">Alt Phone No :</td>
              <td class="colo-td"><input type="text" name="office_phone_no" size="30" value="<?php echo set_value('office_phone_no'); ?>" />
              </br><?php echo form_error('office_phone_no', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
              <td class="colo-td" align="left">Notes & Comments :</td>
              <td class="colo-td"><textarea name="notes" cols="23" rows="5" style="width:210px; border-radius:5px; height:125px; border:1px solid #ccc"><?php echo set_value('notes'); ?></textarea>
              </br><?php echo form_error('notes', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
              </tr>
             <tr>
              <td class="colo-td" align="left">Supplier Logo:</td>
              <td class="colo-td"><input type="file" name="b2c_user_logo" />
              </br><?php echo form_error('notes', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
              <td class="colo-td" align="center" colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td class="colo-td" align="center" colspan="2"><input type="submit"value="Create B2C User"  
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
