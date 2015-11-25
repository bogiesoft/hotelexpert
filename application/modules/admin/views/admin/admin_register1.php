<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

</head>

<body>
 <div id="div_wrapper">
 	<div id="div_container">
    	
        <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
         <?php $this->load->view('admin/header'); ?>
          <tr>
          	<td>
            	<table width="966" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#edefed; border-radius:8px;">
                    <tr>
                      <td width="580" valign="top">
                      <script src="<?php echo WEB_DIR ?>jquery.js"></script>
                      
                      <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		</script>
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="<?php echo WEB_URL; ?>index/super_admin" style="border-radius:8px 0 0 0" >Admin Type</a></li>
	<li><a href="<?php echo WEB_URL; ?>index/admin_user" id="tabs_active">Add Admin User</a></li>
	<li><a href="javascript:void(0)">View Admin List</a></li>
  
</ul>

</div>
<span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="javascript:history.go(-1)"> Go Back</A></span>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	
<form action="<?php echo WEB_URL; ?>index/admin_registration_page" method="post" name="profile" enctype="multipart/form-data">     
<div class="tab_right_section"  style="width:450px;">
<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Login Information: </td>
  </tr>
   <tr>
    <td align="left" valign="top">Admin Type<br />
    <?php  $admin=$this->admin_model->get_details_of_admin();
			//print '<pre />';print_r($admin);exit;
	 ?>
   <select name='admin_type' id='admin_type' style="width:150px;"  required>
                <option value="">Select</option>
               <?php
               
                if(isset($admin[0]->admin_type_id))
                    {
                    for($i=0;$i<count($admin);$i++){
                    ?>
                      <option value="<?php echo $admin[$i]->admin_type_id; ?>"><?php echo $admin[$i]->admin_type; ?></option>
                    <?php	
                    }
                    }
                    ?>          
                </select>
												<div style="color:#FF0000;"> <?php echo form_error('admin_type');?></div></td>
  </tr>
  <tr>
    <td align="left" valign="top">Email ID <br /><input class="ma_pro_txt" name="email" type="text" value="<?php if( isset($email)) echo $email; ?>" />
												<div style="color:#FF0000;"> <?php echo form_error('email');?></div></td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  <tr>
    <td align="left" valign="top">Password <br /><input class="ma_pro_txt" name="password" type="password" />
												<div style="color:#FF0000;"> <?php echo form_error('password');?></div></td>
  </tr>
   <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  <tr>
    <td align="left" valign="top">Confirm Password <br /><input class="ma_pro_txt" name="comform_password" type="password" />
												<div style="color:#FF0000;"> <?php echo form_error('comform_password');?></div></td>
  </tr>
  
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name">Admin Profile:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r">
      Name
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input class="ma_pro_txt" name="name" type="text" value="<?php if( isset($name)) echo $name; ?>" />
												<div style="color:#FF0000;"> <?php echo form_error('name');?></div></td>
  </tr>
  
    <td align="left" valign="top" class="account_font_pos_r">
    Mobile Number
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input class="ma_pro_txt" name="mobile_no" type="text" value="<?php if( isset($mobile_no)) echo $mobile_no; ?>" />
												<div style="color:#FF0000;"> <?php echo form_error('mobile_no');?></div></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
</table>

</div>
<div class="tab_right_section" style="width:450px;"><table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Contact Information: </td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
  Office Phone Number
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input class="ma_pro_txt" name="office_phone_no" type="text" value="<?php if( isset($office_phone_no)) echo $office_phone_no; ?>" />
												<div style="color:#FF0000;"> <?php echo form_error('office_phone_no');?></div></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Adddress
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name">
   <textarea cols="28" rows="8" name="address"></textarea>
   
												<div style="color:#FF0000;"> <?php echo form_error('address');?></div></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Notes
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name">
   
   <textarea name="notes" cols="28" rows="8" ></textarea>
												<div style="color:#FF0000;"> <?php echo form_error('notes');?></div></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="my_profile_name"><!--<input name="" class="ma_pro_txt" type="text" />--></td>
  </tr>
</table></div>

<div class="wi_for_cancel">
			<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:0 0 25px 0;">
  <tr>
    <td align="left" valign="top">
    
  
    </td>
    <td align="left" valign="top"><table width="250" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td>
    <td><a href="#"></a></td>
  </tr>
</table>
</td>
  </tr>
</table>

</div>
</form>
    
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
