<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>jquery.js"></script>

<script type="text/javascript">
function delete_pic(picId)
{
	var conf=confirm("Do you really want to delete this Picture?");
	if (conf==true)
	{ 
	$.post("<?php print WEB_URL ?>index/delete_picture", {"picId":picId},
	function(data){
		//alert(data); 
		if(data != ""){
			alert("Selected photo deleted successfully!");
			window.location.href='<?php echo WEB_URL ?>index/add_hotel_images/<?php echo $this->uri->segment(3); ?>';
		}
	});
	}
	else{
		return false;
	}
}
function status_pic(picId,status)
{
	$.post("<?php print WEB_URL ?>carrental/status_pic", {"picId":picId, "status":status},
	function(data){ 
		if(data != ""){
				alert("Selected photo status updated successfully!");
				window.location.href='<?php echo WEB_URL ?>carrental/add_car_images/<?php echo $this->uri->segment(3); ?>';
		}
	});
}
function Checkfiles()
{
	var fup = document.f2.hotel_video_name,value;
	alert('djkdsdn');
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc")
	{
		return true;
	} 
	else
	{
	alert("Upload Gif or Jpg images only");
	fup.focus();
	return false;
}
</script>

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
         <?php 	if($this->session->userdata('edit_hotel')==1) { ?>
        <li><a href="<?php echo WEB_URL;?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>"  id="tabs_active">Hotel Details</a></li>
        <?php } ?>
        <?php if($this->session->userdata('view_hotel_rooms')==1) { ?>
        <li><a href="<?php echo WEB_URL;?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>"  style="width:200px;">Hotel Rooms</a></li>
          <?php } ?>
         
       
       
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	<?php 	if($this->session->userdata('edit_hotel')==1) { ?>
	<li><a href="<?php echo WEB_URL ?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>" >Hotel Information</a></li>
	<li><a href="<?php echo WEB_URL ?>index/insert_amenities/<?php echo $this->uri->segment(3); ?>" style="width:149px;">Hotel Amenities</a></li>
    <li><a href="<?php echo WEB_URL ?>index/add_hotel_images/<?php echo $this->uri->segment(3); ?>">Photo Gallery & Video</a></li>
    <li><a href="<?php echo WEB_URL ?>index/approve_hotel_reviews/<?php echo $this->uri->segment(3); ?>" id="tabs_active">Hotel Reviews</a></li>
    <li><a href="<?php echo WEB_URL ?>index/extra_products/<?php echo $this->uri->segment(3); ?>"  >Extra Products</a></li>
    <li><a href="<?php echo WEB_URL ?>index/hotel_near_by_location/<?php echo $this->uri->segment(3); ?>">Near By Location</a></li>
    <?php } ?>
</ul>
            </div>
            </div>
        <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
        </div>
    
      </div>
      <div  style="margin-top:15px;" ></div>
      <h4>Hotel Reviews</h4>
      <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
 	<td align="center" class="admin-table-colo">User Review</td>
    <td align="center" class="admin-table-colo">Star Rating</td>
     <td align="center" class="admin-table-colo">View Review</td>
    <td align="center" class="admin-table-colo">Status</td>
     <td align="center" class="admin-table-colo">Action</td>
  </tr>
  <?php //print '<pre />';print_r($sup_details);exit; ?>
  <?php 
  if($result!='')
  {
	  
for($i=0;$i<count($result);$i++)
{
	
	?>
    
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php  echo  substr($result[$i]->user_review,0,40); ?></td>
    <td align="center" class="admin-table-colo1">
	<?php  if($result[$i]->star_rating == 0 ) { ?><img src="<?php echo WEB_DIR ?>images/0 star.jpg" /><?php } ?>
    <?php  if($result[$i]->star_rating == 1 ) { ?><img src="<?php echo WEB_DIR ?>images/1 star.jpg" /><?php } ?>
    <?php  if($result[$i]->star_rating == 2 ) { ?><img src="<?php echo WEB_DIR ?>images/2 star.jpg" /><?php } ?>
    <?php  if($result[$i]->star_rating == 3 ) { ?><img src="<?php echo WEB_DIR ?>images/3 star.jpg" /><?php } ?>
    <?php  if($result[$i]->star_rating == 4 ) { ?><img src="<?php echo WEB_DIR ?>images/4 star.jpg" /><?php } ?>
    <?php  if($result[$i]->star_rating == 5 ) { ?><img src="<?php echo WEB_DIR ?>images/5 star.jpg" /><?php } ?>
    </td>
     <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL ?>index/view_hotel_review/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_reviews_id; ?>" style="color:#2485BE;">View Review</a></td>
    <td align="center" class="admin-table-colo1"><?php if($result[$i]->status==0) { echo 'Approval Pending'; } else if($result[$i]->status==1) { echo 'Approved'; } else { echo "Rejected"; } ?></td>
    <td align="center" class="admin-table-colo1">
    <a href="<?php echo WEB_URL ?>index/update_hotel_reviews/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_reviews_id; ?>/1" style="color:#2485BE;">Approve</a> /
<span style="font-size:12px;"><?php echo anchor(WEB_URL.'index/update_hotel_reviews/'.$this->uri->segment(3).'/'.$result[$i]->sup_hotel_reviews_id.'/2', '<span style="color:#2485BE;">Reject</span>', array('onClick' => "return confirm('Are you sure you want to Reject?')")); ?> </span>
    
    <!--<a href="<?php echo WEB_URL; ?>index/update_hotel_list/<?php echo $sup_details[$i]->sup_hotel_id ; ?>/2">Delete</a>--></td>
  </tr>
 <?php
} ?>
	<!--<tr><td align="right" colspan="7" ><p><?php echo $links; ?></p></td></tr>-->
<?php  }
  else
  {
	  
?>
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...
<?php
  }
  ?>
</table>
      <div class="tablebox" style="width:910px; margin:0px">
        
        
         <!--<table width="900">
         	<tr>
            	<td>
                 <form name="f2" action="<?php echo WEB_URL;?>carrental/car_images/<?php echo $this->uri->segment(3)?>" method="post" enctype="multipart/form-data">
                <table width="250">
                    <tr>
                        <td>Uplaod Your Photos</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="file" name="car_image_name" id="facility_name" required></td>
                        <td><input type="submit" name="add_new" id="add_new" value="upload"></td>
                    </tr>
                </table>
                </form>
                </td>
                <td>
                 
                </td>
        </tr>
        </table>-->
	
        <div class="contete_area">
			
            
                   
                           
                            	
		<div class="content flights">
		
       
        <!--<div class="wi680_search_branc" style="width:900px; margin-top:0px">
		
		<h4>Hotel Reviews</h4>
		 <?php
        if (!empty($result)) {
        for($i=0;$i< count($result);$i++) { ?>
       
        <div class="image-box" style="float:left; width:400px; margin-right:30px; margin-bottom:10px;" id="pic1">
         <h5>User Review<?php echo $i+1;?></h5>
        <span style="font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:20px;">
		<?php  echo  substr($result[$i]->user_review,0,250); ?>.. <a href="<?php echo WEB_URL ?>index/view_hotel_review/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_reviews_id; ?>" >Read More</a></span></br>
        <?php if($result[$i]->status == 0) { ?>
        <center><span><a href="<?php echo WEB_URL ?>index/update_hotel_reviews/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_reviews_id; ?>/1"><img src="<?php echo WEB_DIR_FRONT ?>images/approve_button.png" alt="jhxvb" width="80" height="25" /></a></span>
        
        <span><a href="<?php echo WEB_URL ?>index/update_hotel_reviews/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_reviews_id; ?>/2"><img src="<?php echo WEB_DIR_FRONT ?>images/reject_button.png" alt="jhxvb" width="80" height="25" /></a></span>
        </center>
        <?php } else { ?>
        	
              <center><span><a href="<?php echo WEB_URL ?>index/update_hotel_reviews/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_reviews_id; ?>/0"><img src="<?php echo WEB_DIR_FRONT ?>images/approved_button.png" alt="jhxvb" width="80" height="25" /></a></span>
          <span><a href="<?php echo WEB_URL ?>index/update_hotel_reviews/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_reviews_id; ?>/2"><img src="<?php echo WEB_DIR_FRONT ?>images/reject_button.png" alt="jhxvb" width="80" height="25" /></a></span></center>
        <?php } ?>
        <div>
       
      
        
        </div>
        
        </div>
        
       
       
        <?php }} ?>
     
        

         </div>-->
        </div>
        </div>
        <span class="clear"></span>
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
