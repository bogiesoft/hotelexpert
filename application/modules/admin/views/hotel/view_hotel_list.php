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
    
  
  <table width="966"  border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#efefef; border-radius:8px;">
    <tr>
      <td width="580" valign="top"><div id="navjam" style="margin-top:0px;">
          <div id="navjam">
	<div class="tabs_width">
    <ul class="tabs1">
    	<?php if($this->session->userdata('view_hotels')==1) { ?>
        <li><a href="<?php echo WEB_URL;?>index/manage_hotels"  id="tabs_active">Hotels & Rooms</a></li>
        <?php } ?>
       
       </ul>
          
        </div>
      
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
   
    <div class="rightpartbox">
    	<?php if($this->session->userdata('add_hotel')==1){ ?>
        <div class="right_header"><a href="<?php echo WEB_URL;?>index/add_new_hotel" style="color:#2485BE;">Add New Hotel</a></div>
        <?php } ?>
        <form method="post" action="<?php echo WEB_URL; ?>index/manage_hotels">
        <div class="right_header" style="float:left;">
        	<input type="text" name="keyword" id="keyword" value="<?php echo set_value('keyword'); ?>" />
            <input type="submit" value="Search" style="width:90px; height:25px; background-color:#517ba5; color:#fff;border:1px solid #ccc;"/>
            <a href="<?php echo WEB_URL; ?>index/manage_hotels"><input type="button" value="Reset" style="width:90px; height:25px; background-color:#517ba5; color:#fff;border:1px solid #ccc;" /></a></div>
        </form>
    </div>
    
    
    </div>
    
    <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
 	<td align="center" class="admin-table-colo">Hotel name</td>
    <td align="center" class="admin-table-colo"><a href="<?php echo WEB_URL;?>index/manage_hotels/asc" style="color:#2485BE;"><img src="<?php echo WEB_DIR; ?>images/arrow2_n.gif" border="0" /></a>Supplier Name<a href="<?php echo WEB_URL;?>index/manage_hotels/desc" style="color:#2485BE;"><img src="<?php echo WEB_DIR; ?>images/arrow2_s.gif" border="0"/></a></td>
    <?php if($this->session->userdata('edit_hotel')==1) {?>
     <td align="center" class="admin-table-colo">View Hotel</td>
     <?php  } ?>
      <?php if($this->session->userdata('view_hotel_rooms')==1) {?>
      <td align="center" class="admin-table-colo">Hotel Rooms</td>
      <?php  } ?>
    <td align="center" class="admin-table-colo">Status</td>
     <?php if($this->session->userdata('delete_hotel')==1) { ?>
     <td align="center" class="admin-table-colo">Action</td>
      <?php } ?>
  </tr>
  <?php //print '<pre />';print_r($sup_details);exit; ?>
  
  
				
  <?php 
  if($sup_details!='')
  {
	  
for($i=0;$i<count($sup_details);$i++)
{
	
	?>
    
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $sup_details[$i]->hotel_name; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $this->admin_model->get_details_of_sup_user_selected($sup_details[$i]->supplier_id); ?></td>
    <?php if($this->session->userdata('edit_hotel')==1) {?>
     <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/update_hotel_details/<?php echo $sup_details[$i]->sup_hotel_id; ?>" style="color:#2485BE;">View</a></td>
       <?php  } ?>
       <?php if($this->session->userdata('view_hotel_rooms')==1) {?>
      <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/hotel_inventory_pricing/<?php echo $sup_details[$i]->sup_hotel_id; ?>" style="color:#2485BE;">View Hotel Rooms</a></td>
       <?php  } ?>
    <td align="center" class="admin-table-colo1"><?php if($sup_details[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <?php if($this->session->userdata('delete_hotel')==1) { ?>
    <td align="center" class="admin-table-colo1">
    <a href="<?php echo WEB_URL; ?>index/update_hotel_list/<?php echo $sup_details[$i]->sup_hotel_id; ?>/1 " style="color:#2485BE;">Active</a> / 
    <a href="<?php echo WEB_URL; ?>index/update_hotel_list/<?php echo $sup_details[$i]->sup_hotel_id ; ?>/0" style="color:#2485BE;">InActive</a> /
    
    <span style="font-size:12px;"><?php echo anchor(WEB_URL.'index/update_hotel_list/'.$sup_details[$i]->sup_hotel_id.'/2', '<span style="color:#2485BE;">Delete</span>', array('onClick' => "return confirm('Are you sure you want to delete?')")); ?> </span>
    <?php } ?>
    
    <!--<a href="<?php echo WEB_URL; ?>index/update_hotel_list/<?php echo $sup_details[$i]->sup_hotel_id ; ?>/2">Delete</a>--></td>
  </tr>
 <?php
} ?>
	<tr><td align="right" colspan="7" ><p><?php echo $links; ?></p></td></tr>
<?php  }
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
<script type="text/javascript">
$('#keyword').live('keyup submit',function(){
	var keyword = $('#keyword').val();
	var action= "searchHotelRooms",
	dataString = 'keyword='+keyword+'&action='+action;
	$.ajax({ 
		type:"POST",
		url:'../include/chatFriends.php',
		data: dataString,
		dataType: 'json',
		async: false,
		success: function(answer){
			alert(answer);
		}
	});
});
</script>
