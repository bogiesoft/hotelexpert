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
        <li><a href="<?php echo WEB_URL;?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>"  id="tabs_active">Hotel Details</a></li>
        <li><a href="<?php echo WEB_URL;?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>"  style="width:200px;">Inventory & Pricing</a></li>
       
         
       
       
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	<li><a href="<?php echo WEB_URL ?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>"   >Hotel Information</a></li>
	<li><a href="<?php echo WEB_URL ?>index/insert_amenities/<?php echo $this->uri->segment(3); ?>" >Hotel Amenities</a></li>
    <li><a href="<?php echo WEB_URL ?>index/add_hotel_images/<?php echo $this->uri->segment(3); ?>">Photo Gallery & Video</a></li>
    <li><a href="<?php echo WEB_URL ?>index/room_categoty_type/<?php echo $this->uri->segment(3); ?>" id="tabs_active">Room Category Type</a></li>
    <li><a href="<?php echo WEB_URL ?>index/approve_hotel_reviews/<?php echo $this->uri->segment(3); ?>">Hotel Reviews</a></li>
     <li><a href="<?php echo WEB_URL ?>index/extra_products/<?php echo $this->uri->segment(3); ?>">Extra Products</a></li>
	
</ul>

</div>
        </div>
       <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
      <div class="rightpartbox" style="margin:0px;">
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"><strong></strong></div>
          <div class="rightpartbox">
 <div  class="right_header"><strong><a href="<?php echo WEB_URL;?>index/manage_hotels">Go back</a></strong></div>

      </div>
        
        <div class="tablebox" style="width:910px; margin:0px">
        
         <form name="f2" action="<?php echo WEB_URL;?>index/add_room_categoty_type/<?php echo $this->uri->segment(3)?>" method="post">
		<table width="400">
			<tr>
				<td> Add Room Category Type	</td>
			
				<td><input type="text" name="categoty_type" id="categoty_type" required></td>
				<td><input type="submit" name="add_new" id="add_new" value="Add"></td>
			</tr>
		</table>
	</form>
        <div class="contete_area">
			
            
                   
                           
                            	
		<div class="content flights">
 
       
        <div class="wi680_search_branc" style="width:600px; margin-top:30px">
		
		<div class="tb" style="width:600px">
            <div class="tb_sample_cover" style="width:600px">
             <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Sno</div>
            <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Category Type</div>
            <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Status</div>
             <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:175px;">Action</div>
            <!--<div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000">Online Value</div>-->
         </div>
		<?php
        if (!empty($room_type)) {
        for($i=0;$i< count($room_type);$i++) { ?>
        <div class="tb_sample_cover211" style="width:600px">
        	 <div class="tr_col_01  bl_2" style="width:140px;"><?php echo $i+1; ?></div>
            <div class="tr_col_01  bl_2" style="width:140px;"><?php echo $room_type[$i]->categoty_type; ?></div>
            <div class="tr_col_01 bl_1" style="width:140px;"><?php if($room_type[$i]->status==1) { echo "Active";}else {echo "Inactive";} ?></div>
            <div class="tr_col_01 bl_1" style="width:175px;">  
          	 <a href="<?php echo WEB_URL;?>index/edit_room_categoty_type/<?php echo $this->uri->segment(3); ?>/<?php echo $room_type[$i]->sup_room_cate_type_id; ?>">Edit</a> /
             <a href="<?php echo WEB_URL;?>index/update_room_hotel_facility/<?php echo $this->uri->segment(3); ?>/<?php echo $room_type[$i]->sup_room_cate_type_id; ?>/1">Active</a> /
             <a href="<?php echo WEB_URL;?>index/update_room_hotel_facility/<?php echo $this->uri->segment(3); ?>/<?php echo $room_type[$i]->sup_room_cate_type_id; ?>/0">InActive</a>/
             <a href="<?php echo WEB_URL;?>index/update_room_hotel_facility/<?php echo $this->uri->segment(3); ?>/<?php echo $room_type[$i]->sup_room_cate_type_id; ?>/2">Delete</a>
            
           
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
