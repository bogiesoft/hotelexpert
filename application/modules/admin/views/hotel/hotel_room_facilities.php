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
    	<?php if($this->session->userdata('edit_hotel')==1) { ?>
        <li><a href="<?php echo WEB_URL;?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>"  >Hotel Details</a></li>
        <?php } ?>
        <?php if($this->session->userdata('view_hotel_rooms')==1) { ?>
        <li><a href="<?php echo WEB_URL;?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:200px;">Hotel Rooms</a></li>
       <?php } ?>
         
       
       
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
    <li><a href="<?php echo WEB_URL ?>index/hotel_room_facility/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4);  ?>" id="tabs_active"  >Room Amenities</a></li>

	
</ul>

</div>
        </div>
       <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
      <div class="rightpartbox" style="margin:0px;">
      
          <div class="rightpartbox">
 <div  class="right_header"><strong><a href="<?php echo WEB_URL;?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>">Go back</a></strong></div>

      </div>
        
        <div class="tablebox" style="width:910px; margin:0px">
        
        <h4>Amenity List</h4>
    <form action="<?php echo WEB_URL;?>index/add_hotel_room_facility/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="post">
    <table width="300" >
   
       <?php //print '<pre />';print_r($result);exit;
        
            if(isset($result))
            {
                for($i=0; $i<count($result); $i++)
                {
                ?>
                <tr>
                <td>
                    <input type="checkbox" name="facility_name[]" id="<?php echo $result[$i]->amenity_list_id ?>" value="<?php echo $result[$i]->amenity_list_id ?>" 
                     <?php if($sup_room_faci = $this->admin_model->get_hotel_room_facilities($this->uri->segment(3),$this->uri->segment(4), $result[$i]->amenity_list_id)) { echo "checked='checked'" ; } ?>
                     />
                   <?php echo $result[$i]->amenity_name; ?>
                </td>
                </tr>	
                <?php
                }
            }
       
        ?>
         <tr><td colspan="2" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"/></td></tr>
 </table>
 </form>
    
 
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
