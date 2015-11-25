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
      <td width="580" valign="top"><div id="navjam" style="margin-top:35px;">
          <div class="nav_exmaple">
            <nav>
              <ul>
                <li><a href="#">Manage Users</a>
                  <ul>
                    <li style="background:#999"><a href="#">Recent Activity</a></li>
                    <li><a href="#">Member Forum</a></li>
                    <li><a href="#">Member List</a></li>
                    <li><a href="#">Member Groups</a></li>
                  </ul>
                </li>
                <li><a href="#">Manage Products</a>
                  <ul>
                    <li><a href="#">Recent Activity</a></li>
                    <li><a href="#">Member Forum</a></li>
                    <li><a href="#">Member List</a></li>
                    <li><a href="#">Member Groups</a></li>
                  </ul>
                </li>
                <li><a href="#">CMS</a>
                  <ul>
                    <li><a href="#">Vets</a></li>
                    <li><a href="#">Hospital</a></li>
                    <li><a href="#">Insurance</a></li>
                    <li><a href="#">Service</a></li>
                  </ul>
                </li>
                <li><a href="">Order Management</a>
                  <ul>
                    <li><a href="#">Recent Activity</a></li>
                    <li><a href="#">Member Forum</a></li>
                    <li><a href="#">Member List</a></li>
                    <li><a href="#">Member Groups</a></li>
                  </ul>
                </li>
                <li><a href="#">Global</a>
                  <ul>
                    <li><a href="#">Recent Activity</a></li>
                    <li><a href="#">Member Forum</a></li>
                    <li><a href="#">Member List</a></li>
                    <li><a href="#">Member Groups</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
    <div class="contantbox">
      <div class="leftpartbox">
        <ul>
          <li class="left_menu_heading"><a href="<?php echo WEB_URL ?>index/admin_type">Create Admin Type</a></li>
          <li class="left_menu_heading"><a href="<?php echo WEB_URL ?>index/super_admin" > Add Admin User</a></li>
          <li  class="left_menu_heading"><a href="<?php echo WEB_URL ?>index/view_admin_user">Edit/ Delete Existing User</a></li>
          
        </ul>
      </div>
      <div class="rightpartbox">
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"><strong></strong></div>
        
        
        <div class="tablebox">
        
        
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
    <td align="center" class="admin-table-colo">Admin Type</td>
 	<td align="center" class="admin-table-colo">Name</td>
    <td align="center" class="admin-table-colo">Contact No</td>
    <td align="center" class="admin-table-colo">status</td>
     <td align="center" class="admin-table-colo">action</td>
  </tr>
  
  <?php 
  if($admin_details[0]!='')
  {
for($i=0;$i<count($admin_details);$i++)
{
	
	?>
    
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $admin_details[$i]->admin_type; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $admin_details[$i]->admin_type; ?></td>
    <td align="center" class="admin-table-colo1"><?php if($admin_details[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="center" class="admin-table-colo1">
    <a href="<?php echo WEB_URL; ?>index/update_admin_type/<?php echo $admin_details[$i]->admin_type_id 	; ?>/1 ">Active</a> / 
    <a href="<?php echo WEB_URL; ?>index/update_admin_type/<?php echo $admin_details[$i]->admin_type_id 	; ?>/0">InActive</a>/ 
    <a href="<?php echo WEB_URL; ?>index/update_admin_type/<?php echo $admin_details[$i]->admin_type_id 	; ?>/2">Delete</a></td>
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
