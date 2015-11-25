<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

 <script src="<?php echo WEB_DIR ?>jquery.js"></script>

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
                     
                      
                      
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="<?php echo WEB_URL; ?>index/super_admin" style="border-radius:8px 0 0 0"  id="tabs_active">Admin Type</a></li>
	<li><a href="<?php echo WEB_URL; ?>index/admin_user">Add Admin User</a></li>
	<li><a href="javascript:void(0)">View Admin List</a></li>
  
</ul>
</div>
 <span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span> 
<!-- tab "panes" -->

<div class="panes" style="padding-bottom:10px">
	<div id="containerdount1" class="admin-innerbox">
    	

<div style="margin-top:5px;">
    
   
    <div style="float:left; margin-left:20px;">
    <form name="form1" action="<?php echo WEB_URL; ?>index/add_admin_type" method="post">
    
    
    <table width="600" border="0" cellspacing="1" cellpadding="0"><caption><h4 align="left"></h4></caption>
        
    
   <tr height="35">
    <td width="">Admin Type:</td>
    <td><input name="admin_type"  size="30" required /> 
    <span style="color:#FF0000;"> <?php echo form_error('from_date');?></span>	
        </td>
        <td colspan="5" align="center"><input type="submit"  value="create Admin type" />
    <!--<input type="submit" id="submit" name="submit" value="Save and Continue" />--></td>
    </tr>
    
  
    </table>
 
   
    </form>
   
    </div>
   
    
  </div> 

<div id="g_result" style=" width:100%">


<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
 	<td align="center" class="admin-table-colo">Type of Admin</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>
  
  <?php 
  if($admin_details[0]!='')
  {
for($i=0;$i<count($admin_details);$i++)
{
	
	?>
   
    
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><font style="text-decoration:none;color:#099; font-weight:bold;"><?php  echo $admin_details[$i]->admin_type;?></font></td>

    <td align="center" class="admin-table-colo1"><?php if($admin_details[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="center" class="admin-table-colo1">
    <a href="<?php echo WEB_URL; ?>index/update_admin_type/<?php echo $admin_details[$i]->admin_type_id ; ?>/1 ">Active</a> / 
    <a href="<?php echo WEB_URL; ?>index/update_admin_type/<?php echo $admin_details[$i]->admin_type_id ; ?>/0">InActive</a>/ 
    <a href="<?php echo WEB_URL; ?>index/update_admin_type/<?php echo $admin_details[$i]->admin_type_id ; ?>/2">Delete</a></td>
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
