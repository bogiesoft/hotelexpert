<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR ?>js/nicEdit-latest.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR_FRONT; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
<link rel="stylesheet" href="<?php print WEB_DIR_FRONT; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
 <script type="text/javascript">
    //<![CDATA[
    bkLib.onDomLoaded(function() {
		//alert('zfkjd');
    new nicEditor({maxHeight : 110,iconsPath : '<?php print WEB_DIR_FRONT; ?>images/nicEditIcons-latest.gif'}).panelInstance('area1');
    new nicEditor({maxHeight : 110,iconsPath : '<?php print WEB_DIR_FRONT; ?>images/nicEditIcons-latest.gif'}).panelInstance('area2');
	
   // new nicEditor({fullPanel : true}).panelInstance('area2');
   //new nicEditor({iconsPath : '../nicEditorIcons.gif'}).panelInstance('area3');
   // new nicEditor({buttonList : ['fontSize','bold','italic','underline','left','right','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4',{maxHeight : 100});
   // new nicEditor({maxHeight : 100}).panelInstance('area5');
    });
    //]]>
    </script> 
<script type="text/javascript">
$(document).ready(function(){
	//alert('sdfkjds');

$("input:radio[name=top_city]").click(function() {
var top_city = $(this).val();
$('#testinput').val(top_city);
});
return false;
});

</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php  $lat='';
		$lon='';
if(isset($contact_inf[0]->latitude) && $contact_inf[0]->latitude!='' ) {
	$lat=$contact_inf[0]->latitude;
}
else {
	 $lat=54.95869420484606;
}
if(isset($contact_inf[0]->longitude) && $contact_inf[0]->longitude!='' ) {
	$lon=$contact_inf[0]->longitude;
}
else {
	$lon=-2.7575678906250687;
}

?>
<script type="text/javascript">
  var map;
  jQuery(document).ready(function() {
	  
  var myLatlng = new google.maps.LatLng(<?php echo $lat;  ?>,<?php echo $lon; ?>);

  var myOptions = {
     zoom: 6,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

  var marker = new google.maps.Marker({
  draggable: true,
  position: myLatlng, 
  map: map,
  title: "Your location"
  });

google.maps.event.addListener(marker, 'dragend', function (event) {

 document.getElementById("lat").value = this.getPosition().lat();
    document.getElementById("lng").value = this.getPosition().lng();

 });

});
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
	<li><a href="<?php echo WEB_URL ?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>"  id="tabs_active">Hotel Information</a></li>
	<li><a href="<?php echo WEB_URL ?>index/insert_amenities/<?php echo $this->uri->segment(3); ?>" style="width:149px;">Hotel Amenities</a></li>
    <li><a href="<?php echo WEB_URL ?>index/add_hotel_images/<?php echo $this->uri->segment(3); ?>">Photo Gallery & Video</a></li>
   <!-- <li><a href="<?php echo WEB_URL ?>index/room_categoty_type/<?php echo $this->uri->segment(3); ?>">Room Category Type</a></li>-->
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
      <div class="rightpartbox" style="margin:0px;">
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"><strong></strong></div>
          <div class="rightpartbox">
 <div  class="right_header"><strong><a href="<?php echo WEB_URL;?>index/manage_hotels">Go back</a></strong></div>

      </div>
        
        <div class="tablebox" style="width:910px; margin:0px">
        <form method="post" name="admin_register" action="<?php echo WEB_URL; ?>index/edit_hotel_details/<?php echo $contact_inf[0]->sup_hotel_id; ?>" enctype="multipart/form-data">
        
       
          <table width="900" align="left" border="0" cellspacing="1" cellpadding="0">
          <tr>
			<td class="my_profile_name" valign="top" align="left">Hotel Information: </td>
		  </tr>
           <tr>
           		<td> <table width="430" align="left" border="0" cellspacing="1" cellpadding="5" style="border-right:1px #ccc solid;">
                	<?php /*?>	<tr>
    					<td align="left" valign="top" class="account_font_pos_r">Supplier Name</td>
  						</tr>
                         <tr>
                		
  						<tr>
                        <?php //print '<pre />';print_r($contact_inf);exit; ?>
   						 <td align="right" valign="top" class="my_profile_name">
                         <?php  $sup_details=$this->admin_model->get_sup_all_users();
					//print '<pre />';print_r($admin);exit;
	 			?>
                   <select name="supplier_id"  class="ma_pro_txt"  style=" line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required>
                  <option value="">Select</option>
                   <?php
               
                if(isset($sup_details[0]->supplier_id))
                    {
                    for($i=0;$i<count($sup_details);$i++){
                    ?>
                      <option value="<?php echo $sup_details[$i]->supplier_id; ?>"><?php echo $sup_details[$i]->name; ?></option>
                    <?php	
                    }
                    }
                    ?>       
                  
                </select>
                         </td>
  						</tr><?php */?>
                         <?php if($this->session->userdata('admin_type')==1 || $this->session->userdata('admin_type')==2 ) {?>
                         <tr>
    					<td align="left" valign="top" class="account_font_pos_r">Supplier Name</td>
  						</tr>
  						<tr>
                     <?php   //echo $contact_inf[0]->sup_id;exit; ?>
   						 <td align="right" valign="top" class="my_profile_name"><input name="supplier_id" id="supplier_id" type="text" class="ma_pro_txt" 
                         value="<?php echo $this->admin_model->get_sup_type($contact_inf[0]->supplier_id); ?>"  readonly="readonly"/></td>
  				       </tr>
                        <tr>
                        <tr>
    					<td align="left" valign="top" class="account_font_pos_r">Hotel Id<font style="margin-left: 3px;" color="red">*</font></td>
  						</tr>
  						<tr>
                      <?php } ?>
                       
   						 <td align="right" valign="top" class="my_profile_name"><input name="cus_hotel_id" id="cus_hotel_id" type="text" class="ma_pro_txt" 
                         value="<?php if(isset($contact_inf[0]->custom_hotel_id)){ echo $contact_inf[0]->custom_hotel_id; } ?>" required/></td>
  						</tr>
                        <tr>
    					<td align="left" valign="top" class="account_font_pos_r">Hotel Name<font style="margin-left: 3px;" color="red">*</font></td>
  						</tr>
  						<tr>
   						 <td align="left" valign="top" class="my_profile_name"><input name="hotel_name" id="hotel_name" type="text" class="ma_pro_txt" 
                         value="<?php if(isset($contact_inf[0]->hotel_name)){ echo $contact_inf[0]->hotel_name; } ?>" required/></td>
  						</tr>
                        <tr>
    					<td align="left" valign="top" class="account_font_pos_r">City Name<font style="margin-left: 3px;" color="red">*</font></td>
  						</tr>
  						<tr>
   						 <td align="left" valign="top" class="my_profile_name">
                        <?php $city_name = $this->admin_model->get_global_city_details(); ?>
                         <select name="city_name" required class="ma_pro_txt"  style=" line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc">
                         	<option value="">Select</option>
                             <?php
               
							  if($city_name!='')
								{
								for($i=0;$i<count($city_name);$i++){
								?>
								  <option value="<?php echo $city_name[$i]->id; ?>" <?php if($contact_inf[0]->city_name == $city_name[$i]->id) echo "selected='selected'" ?> ><?php echo $city_name[$i]->city_name; ?></option>
								<?php	
								}
								}
								?>
                         </select>
                         
                         </td>
  						</tr>
                       
                         <tr>
                            <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="my_profile_name">Main Contact Information:</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="account_font_pos_r"> First Name </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="my_profile_name"><input name="main_first_name" type="text" class="ma_pro_txt" 
                            value="<?php if(isset($contact_inf[0]->main_first_name)){ echo $contact_inf[0]->main_first_name; } ?>" /></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="account_font_pos_r"> Last Name </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="my_profile_name"><input name="main_last_name" type="text" class="ma_pro_txt"
                             value="<?php if(isset($contact_inf[0]->main_last_name)){ echo $contact_inf[0]->main_last_name; } ?>" /></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="account_font_pos_r"> Email Address </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="my_profile_name"><input name="main_email" type="text" class="ma_pro_txt"
                             value="<?php if(isset($contact_inf[0]->main_email )){ echo $contact_inf[0]->main_email ; } ?>" /></td>
                          </tr>
                           <tr>
                            <td align="left" valign="top" class="account_font_pos_r"> Phone </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="my_profile_name"><input name="main_phone_no" type="text" class="ma_pro_txt"
                             value="<?php if(isset($contact_inf[0]->main_email)){ echo $contact_inf[0]->main_email;} ?>" /></td>
                          </tr>
                        </table>
                </td>
                <td> <table width="430"  valign="top" align="right" border="0" cellspacing="1" cellpadding="5" style="margin-left:25px;">
                		  <tr>
                            <td align="left" valign="top" class="account_font_pos_r"> Fax </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="my_profile_name"><input name="main_fax" type="text" class="ma_pro_txt" 
                            value="<?php if(isset($contact_inf[0]->main_fax)){ echo $contact_inf[0]->main_fax ;} ?>" /></td>
                          </tr>
                		  <tr>
    					<td align="left" valign="top" class="account_font_pos_r"> Hotel Address</td>
  						</tr>
  						<tr>
   						 <td align="left" valign="top" class="my_profile_name"> <textarea style="height:50px;" cols="50"  name="hotel_address"><?php echo $contact_inf[0]->hotel_address ; ?></textarea></td>
  						</tr>
                         <tr>
    					<td align="left" valign="top" class="account_font_pos_r"> Hotel Description</td>
  						</tr>
  						<tr>
   						 <td align="left" valign="top" class="my_profile_name"> <textarea name="hotel_desc" style="height: 100px;" cols="50"><?php if(isset($contact_inf[0]->hotel_desc)){ echo  $contact_inf[0]->hotel_desc;} ?></textarea></td>
  						</tr>
                        <tr>
    					<td align="left" valign="top" class="account_font_pos_r">Hotel Policies</td>
  						</tr>
  						<tr>
   						 <td align="left" valign="top" class="my_profile_name"> <textarea name="hotel_policies" style="height: 100px;" cols="50"><?php if(isset($contact_inf[0]->hotel_policies)){ echo  $contact_inf[0]->hotel_policies ;} ?></textarea></td>
  						</tr>
						<tr>
						<td>Near By Area</td>
						</tr>
						<tr>
						<td><input type="text" size="65" name="near_by_area" value="<?php if(isset($contact_inf[0]->near_by_area)){ echo  $contact_inf[0]->near_by_area ;} ?>" id="near_by_area"/></td>
						</tr>
						<tr>
						<td>Near By Attraction</td>
						</tr>
						<tr>
						<td><input type="text" size="65" name="near_by_attraction"  value="<?php if(isset($contact_inf[0]->near_by_attraction)){ echo  $contact_inf[0]->near_by_attraction ;} ?>" id="near_by_attraction"/></td>
						</tr>
                        </table>
                </td>
           </tr>
           				<tr>
                        <td>&nbsp;</td>
                        </tr>
                        <tr>
							<td class="my_profile_name" valign="top" align="left">Please select Your lattitude And Longitude from the Below Map: </td>
		 				 </tr>
             			<tr>
                        	<td colspan="2">
                            	<table width="100%" align="left" cellpadding="0" cellspacing="0" border="0">
                                	<tr>
                                       <td style="padding-left:11px;">Latitude:  </td>
                                        <td style="padding-left:11px;r"><input type="text" name="latitude" id="lat" size="30" value="<?php
                                         if(isset($contact_inf[0]->latitude) && $contact_inf[0]->latitude!='' ) {
                                            echo $contact_inf[0]->latitude;
                                            } else { echo '54.673831';} ?>"></td>
                                      
                                       <td style="padding-left:11px;">Longitude:  </td>
                                        <td style="padding-left:11px;r"><input type="text" name="longitude" id="lng" size="30" value="<?php
                                         if(isset($contact_inf[0]->longitude) && $contact_inf[0]->longitude!='' ) {
                                            echo $contact_inf[0]->longitude;
                                            } else { echo '-2.526855';} ?>">
                                         </td>
          							
                                </table>
                            </td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        	<td colspan="2">
                            	<table width="100%" align="left" cellpadding="0" cellspacing="0" border="0">
                                	<div style="width:650px; height:400px; margin-left:200px; margin-bottom:20px;" id="map_canvas">
                                  
          </div>
                                </table>
                            </td>
                        </tr>
           
           <tr>
           		<td>&nbsp;</td>
           </tr>
           
            <tr>
              <td class="colo-td" align="center" colspan="2"><input type="submit"value="Submit"  
              style="width:210px; border-radius:5px; height:35px; background-color:#517ba5; color:#fff;border:1px solid #ccc;"/></td>
            </tr>
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
