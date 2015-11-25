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
/*function delete_pic(picId)
{
	alert('sfkcldkf');
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
	alert('sfjk');
	$.post("<?php print WEB_URL ?>index/status_pic", {"picId":picId, "status":status},
	function(data){ 
		if(data != ""){
				alert("Selected photo status updated successfully!");
				window.location.href='<?php echo WEB_URL ?>index/add_hotel_images/<?php echo $this->uri->segment(3); ?>';
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
}*/


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
	<li><a href="<?php echo WEB_URL ?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>"   >Hotel Information</a></li>
	<li><a href="<?php echo WEB_URL ?>index/insert_amenities/<?php echo $this->uri->segment(3); ?>"  >Hotel Amenities</a></li>
    <li><a href="<?php echo WEB_URL ?>index/add_hotel_images/<?php echo $this->uri->segment(3); ?>" id="tabs_active">Photo Gallery & Video</a></li>
    <li><a href="<?php echo WEB_URL ?>index/approve_hotel_reviews/<?php echo $this->uri->segment(3); ?>">Hotel Reviews</a></li>
     <li><a href="<?php echo WEB_URL ?>index/extra_products/<?php echo $this->uri->segment(3); ?>">Extra Products</a></li>
      <li><a href="<?php echo WEB_URL ?>index/hotel_near_by_location/<?php echo $this->uri->segment(3); ?>">Near By Location</a></li>
     <?php } ?>
	
</ul>

</div>
        </div>
       <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
      <div class="tablebox" style="width:910px; margin:0px">
        
        
         <table width="900">
         	<tr>
            	<td>
                 <form name="f2" action="<?php echo WEB_URL;?>index/hotel_images/<?php echo $this->uri->segment(3)?>" method="post" enctype="multipart/form-data">
                <table width="250">
                    <tr>
                        <td>Uplaod Your Photos</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="file" name="hotel_image_name" id="facility_name" required></td>
                        <td><input type="submit" name="add_new" id="add_new" value="upload"></td>
                    </tr>
                </table>
                </form>
                </td>
                <td>
                 <form name="f3" action="<?php echo WEB_URL;?>index/hotel_videos/<?php echo $this->uri->segment(3)?>" method="post" enctype="multipart/form-data" onsubmit="return Checkfiles();">
                <table width="250">
                    <tr>
                        <td>Upload Your Videos</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="file" name="hotel_video_name" id="hotel_video_name" required></td>
                        <td><input type="submit" name="add_new" id="add_new" value="upload"></td>
                    </tr>
                </table>
                </form>
                </td>
        </tr>
        </table>
	
        <div class="contete_area">
			
            
                   
                           
                            	
		<div class="content flights">
		
       
        <div class="wi680_search_branc" style="width:900px; margin-top:10px">
		
		<h4>Photo Gallery</h4>
		 <?php
        if (!empty($result)) {
        for($i=0;$i< count($result);$i++) { ?>
        <div class="image-box" style="float:left;" id="pic1"><div>
        
        <img src="<?php echo WEB_DIR_FRONT ?>supplier_hotels_images/<?php echo $result[$i]->image_name; ?>" width="165" height="120" border="0" style="margin:4px;  " />
       
        <div class="checkbox-bg" style="width:165px; height:auto;"> 
           
            
        <span style="float:left;">
        <?php if($result[$i]->status=="1") { ?>
        <a href="<?php  echo WEB_URL ?>index/update_hotel_images/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_images_id; ?>/0" ><img src="<?php echo WEB_DIR_FRONT ?>images/active.png"  width="14" height="14" border="0" style="vertical-align:top;cursor:pointer; position:relative;margin-left:5px; top:-115px; z-index:999;" onclick="return confirm('Are you sure you want to InActive?');" /></a>
        <?php }  else { ?>
         <a href="<?php  echo WEB_URL ?>index/update_hotel_images/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_images_id; ?>/1" ><img src="<?php echo WEB_DIR_FRONT ?>images/inactive.png" width="14" height="14" border="0" style="vertical-align:top;cursor:pointer; position:relative;margin-left:5px; top:-115px; z-index:999;" onclick="return confirm('Are you sure you want to Active?')" /></a>
         <?php } ?>
        </span>
     
        <span class="img-fix"><a href="<?php  echo WEB_URL ?>index/update_hotel_images/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_hotel_images_id; ?>/2" ><img src="<?php echo WEB_DIR_FRONT ?>images/b2b-booking-icon.png" width="14" height="14" border="0" style="margin-left:5px; position:relative; top:-115px; z-index:999;cursor:pointer;" onclick="return confirm('Are you sure you want to delete?')" /></a></span> 
       
	   <form action="<?php echo WEB_URL ?>dashboard/update_hotel_image_desc/<?php echo $result[$i]->sup_hotel_images_id; ?>" method="POST">
	  <input type="hidden" name="hotel_id" value="<?php echo $this->uri->segment(3); ?>"/>
	  <textarea style="width: 163px;height: 100px;" name="image_desc_<?php echo $result[$i]->sup_hotel_images_id; ?>" id="image_desc"><?php echo $result[$i]->image_desc; ?></textarea><br/>
        <input type="submit" value="save description">
		<div id="respond" style="width:122px;height:25px;float:left;"></div>
      </form>
        </div>
		  </div>
        
        </div>
        
       
       
        <?php }} ?>
        <div style="clear:both;"></div>
        
        <h4>Videos</h4>
		
         <script type="text/javascript" src="http://www.webestools.com/page/js/flashobject.js"></script>
           <a href="http://get.adobe.com/fr/flashplayer/">You need to install the Flash plugin</a> - <a href="http://www.webestools.com/">Webestools</a> - <a href="http://www.webestools.com/flv-player-free-flash-mp4-mov-h264-put-videos-on-your-website-streaming-video-player-flv.html">Flash Flv Video Player</a>

        <?php
        if (!empty($videos)) {
        for($i=0;$i< count($videos);$i++) { ?>
        <div style="display:inline-block; float:left;">

    <div id="lecteur_72193" style="display:inline-block;">
    </div>
    <script type="text/javascript">
    //<!--
  var flashvars_72193 = {};
  var params_72193 = {
    quality: "high",
    bgcolor: "#000000",
    allowScriptAccess: "always",
    allowFullScreen: "true",
    wmode: "transparent",    
	flashvars: "fichier=<?php echo WEB_DIR_FRONT ?>supplier_hotels_videos/<?php echo $videos[$i]->video_name ?>"
   };
  var attributes_72193 = {};
        flashObject("http://flash.webestools.com/flv_player/v1_27.swf", "lecteur_72193", "400", "225", "8", false, flashvars_72193, params_72193, attributes_72193);
    //-->
    </script>
</div>
<?php }}?>

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
