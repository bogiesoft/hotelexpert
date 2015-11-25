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
        <li><a href="<?php echo WEB_URL;?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>"  id="tabs_active">Hotel Details</a></li>
        <li><a href="<?php echo WEB_URL;?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>"  style="width:200px;">Inventory & Pricing</a></li>
       
         
       
       
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	<li><a href="<?php echo WEB_URL ?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>" >Hotel Information</a></li>
	<li><a href="<?php echo WEB_URL ?>index/insert_amenities/<?php echo $this->uri->segment(3); ?>" style="width:149px;">Hotel Amenities</a></li>
    <li><a href="<?php echo WEB_URL ?>index/add_hotel_images/<?php echo $this->uri->segment(3); ?>">Photo Gallery & Video</a></li>
    <li><a href="<?php echo WEB_URL ?>index/approve_hotel_reviews/<?php echo $this->uri->segment(3); ?>" id="tabs_active">Hotel Reviews</a></li>
    <li><a href="<?php echo WEB_URL ?>index/extra_products/<?php echo $this->uri->segment(3); ?>"  >Extra Products</a></li>
</ul>
            </div>
            </div>
        <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
        </div>
    
      </div>
      <div class="tablebox" style="width:910px; margin:0px">
         <div class="right_header"><a href="<?php echo WEB_URL;?>index/approve_hotel_reviews/<?php echo $this->uri->segment(3); ?>" style="color:#2485BE;">Go Back</a></div>	
        
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
		
       
        <div class="wi680_search_branc" style="width:900px; margin-top:0px">
		
		<h4>Hotel Reviews</h4>
		 <?php
        if (!empty($result)) {
        for($i=0;$i< count($result);$i++) { ?>
       
        <div class="image-box" style="float:left; width:900px; margin-right:30px; margin-bottom:10px;" id="pic1">
         <h5>User Review</h5>
        <span style="font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:20px;">
		<?php  echo  $result->user_review; ?></span>
        </br></br>
        <span> Star Rating :
        
        <?php  if($result->star_rating == 0 ) { ?><img src="<?php echo WEB_DIR ?>images/0 star.jpg" /><?php } ?>
    	<?php  if($result->star_rating == 1 ) { ?><img src="<?php echo WEB_DIR ?>images/1 star.jpg" /><?php } ?>
    	<?php  if($result->star_rating == 2 ) { ?><img src="<?php echo WEB_DIR ?>images/2 star.jpg" /><?php } ?>
    	<?php  if($result->star_rating == 3 ) { ?><img src="<?php echo WEB_DIR ?>images/3 star.jpg" /><?php } ?>
    	<?php  if($result->star_rating == 4 ) { ?><img src="<?php echo WEB_DIR ?>images/4 star.jpg" /><?php } ?>
    	<?php  if($result->star_rating == 5 ) { ?><img src="<?php echo WEB_DIR ?>images/5 star.jpg" /><?php } ?>
        </span>
        
        <center><span><a href="<?php echo WEB_URL ?>index/update_hotel_reviews/<?php echo $this->uri->segment(3); ?>/<?php echo  $this->uri->segment(4); ?>/1"><img src="<?php echo WEB_DIR_FRONT ?>images/approve_button.png" alt="jhxvb" width="80" height="25" /></a></span>
        
          <span><a href="<?php echo WEB_URL ?>index/update_hotel_reviews/<?php echo $this->uri->segment(3); ?>/<?php echo  $this->uri->segment(4); ?>/2"><img src="<?php echo WEB_DIR_FRONT ?>images/reject_button.png" alt="jhxvb" width="80" height="25" /></a></span>
        </center>
        
        <div>
       
      
        
        </div>
        
        </div>
        
       
       
        <?php }} ?>
     
        

         </div>
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
