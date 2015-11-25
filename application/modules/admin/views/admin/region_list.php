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
<?php //echo WEB_DIR_FRONT;exit; ?>
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
  
             <li><a href="<?php echo WEB_URL;?>home/manage_regions"  id="tabs_active">Region List</a></li>
        	<li><a href="<?php echo WEB_URL;?>home/manage_cities">City Lists</a></li>
           
      
       
         
       
       
       </ul>
          
          
        </div>
       <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
      <div class="rightpartbox" style="margin:0px;">
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"><strong></strong></div>
          <div class="rightpartbox">
 <div  class="right_header"><strong><a href="<?php echo WEB_URL;?>index/dashboard">Go back</a></strong></div>

      </div>
        
        <div class="tablebox" style="width:910px; margin:0px">
        
         <form name="f2" action="<?php echo WEB_URL;?>home/add_regions" method="post">
		<table width="250">
			<tr>
				<td>Regions</td>
                <td></td>
			</tr>
			<tr>
				<td><input type="text" name="region_name" id="region_name" size="30" required></td>
				<td><input type="submit" name="add_new" id="add_new" value="Add"></td>
			</tr>
		</table>
	</form>
        <div class="contete_area">
			
            
                   
                           
                            	
		<div class="content flights">
 
       
        <div class="wi680_search_branc" style="width:600px; margin-top:30px">
		
		<div class="tb" style="width:600px">
            <div class="tb_sample_cover" style="width:600px">
             <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Sl no</div>
            <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Region Name</div>
            <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">status</div>
             <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:175px;">Action</div>
            <!--<div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000">Online Value</div>-->
         </div>
		<?php
        if (!empty($result)) {
        for($i=0;$i< count($result);$i++) { ?>
        <div class="tb_sample_cover211" style="width:600px">
        	 <div class="tr_col_01  bl_2" style="width:140px;"><?php echo $i+1; ?></div>
            <div class="tr_col_01  bl_2" style="width:140px;"><?php echo $result[$i]->region_name; ?></div>
            <div class="tr_col_01 bl_1" style="width:140px;"><?php if($result[$i]->status==1) { echo "Active";}else {echo "InActive";} ?></div>
            <div class="tr_col_01 bl_1" style="width:175px;">  
          	
            	 <a href="<?php echo WEB_URL;?>home/edit_region_list/<?php echo $result[$i]->id; ?>">Edit</a> /
             <a href="<?php echo WEB_URL;?>home/update_region_list/<?php echo $result[$i]->id; ?>/1">Active</a> /
              <a href="<?php echo WEB_URL;?>home/update_region_list/<?php echo $result[$i]->id; ?>/0">InActive</a>/
                <span style="font-size:12px;"><?php echo anchor(WEB_URL.'home/update_region_list/'.$result[$i]->id.'/2', '<span style="color:#2485BE;">Delete</span>', array('onClick' => "return confirm('Are you sure you want to delete?')")); ?> </span>
       
            
          
            </div>
          
        </div>
        <?php }
        } else { 
        echo 'Result not found';
        }
        ?>
        </div>
        </div>
        </div>
        <span class="clear"></span>
        </div>
          
        </div>
      </div>
    </div>
      </td>
    
     </tr>
    
  </table></td>
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
