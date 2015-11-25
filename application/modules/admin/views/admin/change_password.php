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
        <li><a href="<?php echo WEB_URL;?>index/myacc_details" >Edit My Profile</a></li>
         <li><a href="<?php echo WEB_URL;?>index/change_password" id="tabs_active">Change Password</a></li>
    
       </ul>
          
         
        </div>
      <!--  <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
        
        <div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">
  <div class="right_header" style="float:right;"><a href="<?php echo WEB_URL;?>index/dashboard" style="color:#2485BE;">Go Back</a></div>

<div class="tablebox">
		<?php  $user_id = $this->session->userdata('user_id');
		
			$admin_user =$this->admin_model->get_logged_in_user_details($this->session->userdata('user_id'));
		?>
        <form method="post" name="admin_register" action="<?php echo WEB_URL; ?>index/update_password" enctype="multipart/form-data">
        
          <table width="900px" align="left" border="0" cellspacing="1" cellpadding="5" style="margin-left:10px;">
			
			<input type="hidden" name="old_password" size="30"  value="<?php if(isset($admin_user->password))  echo $admin_user->password; ?>"/>
              <tr>
              <td class="colo-td" align="left">Old Password :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="password" name="password" size="30"  value=""/>
               </br><?php echo form_error('password', '<div class="validation_error">', '</div>'); ?>
              </td>
            
            </tr>
            <tr>
              <td class="colo-td" align="left">New Password :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="password" name="new_password" size="30" value="" />
              </br><?php echo form_error('new_password', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
              <td class="colo-td" align="left">Confirm Password :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="password" name="comform_password" size="30" value="" />
              </br><?php echo form_error('comform_password', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
             <?php //} ?>
              <td class="colo-td" align="center" colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td class="colo-td" align="center" colspan="2"><input type="submit"value="Submit"  
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
