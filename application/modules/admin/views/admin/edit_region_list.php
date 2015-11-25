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
  
             <li><a href="<?php echo WEB_URL;?>home/manage_regions"  >Region List</a></li>
        	<li><a href="<?php echo WEB_URL;?>home/manage_cities" id="tabs_active">City Lists</a></li>
       
       </ul>
          
      
        </div>
      
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
   
      <div class="rightpartbox">
       
    <div  class="right_header"><a href="<?php echo WEB_URL; ?>home/manage_regions" style="color:#2485BE;">Go Back</a></div>    
        
        <div class="tablebox"  >
        <form name="f2" action="<?php echo WEB_URL;?>home/update_regions/<?php echo $this->uri->segment(3); ?>" method="post">
		<table width="250">
			<tr>
				<td>Regions</td>
                <td></td>
			</tr>
			<tr> 
				<td><input type="text" name="region_name" id="region_name" value="<?php echo $result->region_name; ?>" size="30" required></td>
				<td><input type="submit" name="add_new" id="add_new" value="update"></td>
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
