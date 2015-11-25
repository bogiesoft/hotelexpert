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
        <li><a href="<?php echo WEB_URL;?>index/myacc_details" id="tabs_active">Edit My Profile</a></li>
         <li><a href="<?php echo WEB_URL;?>index/change_password">Change Password</a></li>
    
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
        <form method="post" name="admin_register" action="<?php echo WEB_URL; ?>index/update_user_profile" enctype="multipart/form-data">
        
          <table width="900px" align="left" border="0" cellspacing="1" cellpadding="5" style="margin-left:10px;">
           
              <?php if($admin_user->admin_type ==2){?>
			  <tr>
              <td class="colo-td" align="left">Admin Type :&nbsp;<font class="required">*</font></td>
              <td class="colo-td">
               <?php  $admin=$this->admin_model->get_details_of_sub_admin();
					//print '<pre />';print_r($admin);exit;
	 			?>
              <select name="sub_admin_type_id"  style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required>
                  <option value="">Select</option>
                   <?php
               
                if(isset($admin[0]->sub_admin_type_id))
                    {
                    for($i=0;$i<count($admin);$i++){
                    ?>
                      <option value="<?php echo $admin[$i]->sub_admin_type_id; ?>" <?php if($admin_user->sub_admin_type_id == $admin[$i]->sub_admin_type_id) echo "selected='selected'" ?> ><?php echo $admin[$i]->sub_admin_type; ?></option>
                    <?php	
                    }
                    }
                    ?>       
                  
                </select>
                 </br><?php echo form_error('admin_type', '<div class="validation_error">', '</div>'); ?>
                </td>
            </tr>
			  
			  <?php } ?>
			<?php if($admin_user->admin_type ==3){?> 
			
<tr>
              <td class="colo-td" align="left">Supplier Type :&nbsp;<font class="required">*</font></td>
              <td class="colo-td">
               <?php  $supplier=$this->admin_model->get_details_of_supplier();
					// print '<pre />';print_r($supplier);exit;
	 			?>
              <select name="supplier_type_id"  style="width:210px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required >
                  <option value="">Select</option>
                   <?php
               
                if(isset($supplier[0]->supplier_type_id))
                    {
                    for($i=0;$i<count($supplier);$i++){
                    ?>
                      <option value="<?php echo $supplier[$i]->supplier_type_id; ?>" <?php if($admin_user->supplier_type_id == $supplier[$i]->supplier_type_id ) echo "selected='selected'"?> > <?php echo $supplier[$i]->supplier_type; ?></option>
                    <?php	
                    }
                    }
                    ?>       
                  
                </select>
                 </br><?php echo form_error('supplier_type_id', '<div class="validation_error">', '</div>'); ?>
                </td>
            </tr>			
			
			
			 <?php } ?>
			<tr>
              <td class="colo-td" align="left">Name :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="name" size="30" value="<?php if(isset($admin_user->firstname))  echo $admin_user->firstname; ?>"/>
              </br><?php echo form_error('name', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
              <td class="colo-td" align="left">Email :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="email" size="30" value="<?php if(isset($admin_user->email))  echo $admin_user->email; ?>"/>
               </br><?php echo form_error('email', '<div class="validation_error">', '</div>'); ?>
              </td></br>
            
            </tr>
            
            <tr>
              <td class="colo-td" align="left">Address :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><textarea name="address" cols="23" rows="5"  style="width:210px; border-radius:5px; height:125px; border:1px solid #ccc"><?php if(isset($admin_user->address))  echo $admin_user->address; ?></textarea>
              </br><?php echo form_error('address', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
              <td class="colo-td" align="left">Phone No :&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="mobile_no" size="30" value="<?php if(isset($admin_user->mobile_no))  echo $admin_user->mobile_no; ?>" />
              </br><?php echo form_error('mobile_no', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
              <td class="colo-td" align="left">Alt Phone No :</td>
              <td class="colo-td"><input type="text" name="office_phone_no" size="30" value="<?php if(isset($admin_user->office_phone_no))  echo $admin_user->office_phone_no; ?>" />
              </br><?php echo form_error('office_phone_no', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
			<?php if($admin_user->admin_type ==3) { ?>
			<tr>
              <td class="colo-td" align="left">Contact Person Name :</td>
              <td class="colo-td"><input type="text" name="contact_person_name" size="30" value="<?php  if(isset($admin_user->contact_person_name)) echo  $admin_user->contact_person_name; else { echo set_value('contact_person_name'); } ?>" />
              </br><?php echo form_error('contact_person_name', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
			
            <tr>
              <td class="colo-td" align="left">Designation of Contact :</td>
              <td class="colo-td"><input type="text" name="desig_of_contact" size="30" value="<?php  if(isset($admin_user->desig_of_contact)) echo  $admin_user->desig_of_contact; else { echo set_value('desig_of_contact'); } ?>" />
              </br><?php echo form_error('desig_of_contact', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
			<?php } ?>
            <tr>
              <td class="colo-td" align="left">Notes & Comments :</td>
              <td class="colo-td"><textarea name="notes" cols="23" rows="5" style="width:210px; border-radius:5px; height:125px; border:1px solid #ccc"><?php if(isset($admin_user->notes))  echo $admin_user->notes; ?></textarea>
              </br><?php echo form_error('notes', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
			
               <?php if($admin_user->admin_type !=1) { ?>
               <tr>
              <td class="colo-td" align="left">Supplier Logo:</td>
              <td class="colo-td"><input type="file" name="supplier_logo" />
              </br><?php echo form_error('notes', '<div class="validation_error">', '</div>'); ?>
              </td>
            </tr>
            <tr>
            	<td></td>
                <td>
					<?php if(isset($admin_user->supplier_logo) && $admin_user->supplier_logo != '') { ?>
					<div style="float:left;"> 
						<img src="<?php echo WEB_DIR_FRONT ?>supplier_logos/<?php echo $admin_user->supplier_logo; ?>" width="240" height="140" border="0" />
					</div>
					<?php } ?>
				</td>
            </tr>
            <input type="hidden" name="image1" value="<?php echo $admin_user->supplier_logo; ?>" />
            <tr>
             <?php } ?>
              <td class="colo-td" align="center" colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td class="colo-td" align="center" colspan="2"><input type="submit"value="Update Profile"  
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
