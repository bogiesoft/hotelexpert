<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>tabs/core.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>gui/ajax/ajaxsbmt.js"></script>
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
        <li><a href="<?php echo WEB_URL;?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>"  >Hotel Details</a></li>
         <?php } ?>
          <?php if($this->session->userdata('view_hotel_rooms')==1) { ?>
        <li><a href="<?php echo WEB_URL;?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:200px;">Hotel Rooms</a></li>
         <?php } ?>
         
       
       
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	<li><a href="<?php echo WEB_URL ?>index/edit_hotel_room_details/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" id="tabs_active"  >View Hotel Rooms</a></li>
   

	
</ul>
</div>
        </div>
       <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
      <div class="rightpartbox" style="margin:0px;">
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"> <strong></strong></div>
        
        <div style="float:right; color:#517BA5;"><a href="<?php echo WEB_URL; ?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3);  ?>">Go Back</a></div>
        <div style="float:left; margin-left:20px;">
        <?php  $room =$this->admin_model->get_available_category($this->uri->segment(3));
		
			//echo count($room);exit;
		?>
    
     <form name="form1" action="<?php echo WEB_URL; ?>index/update_room_plan/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="post">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
        	<tr><td>&nbsp;</td></tr>
        	<tr height="35">
            <td width="30%"> Room Category<font style="margin-left: 3px;" color="red">*</font></td>
            <td width="77%"><select name='global_room_category_type_id' id='global_room_category_type_id' style="width:150px;" required>
            <option value="" >Select</option>
            		<?php for($i=0; $i<count($room); $i++) { ?>
                <option value="<?php echo $room[$i]->global_room_category_type_id;  ?>" <?php  if($hotel_room_details->global_room_category_type_id ==$room[$i]->global_room_category_type_id) echo "selected='selected'" ?>><?php echo $room[$i]->category_type;  ?></option>
                <?php } ?> 
                </select>
            </td>
            </tr>
            
            <tr height="35">
            <td > Room Name <font style="margin-left: 3px;" color="red">*</font></td>
            <td ><input type="text" name="room_name" value="<?php  if(isset($hotel_room_details->room_name)) echo $hotel_room_details->room_name; ?>" required />
                
            </td>
            </tr>
             <tr height="35">
            <td valign="top" >Room Description</td>
            <td ><textarea cols="50" rows="5" name="room_desc" id="area1" ><?php   if(isset($hotel_room_details->room_desc)) echo html_entity_decode($hotel_room_details->room_desc); ?></textarea>
                
            </td>
            </tr>
            <tr><td>&nbsp;&nbsp;</td></tr>
           <tr height="35">
            <td valign="top" >Room Policies</td>
            <td ><textarea cols="50" rows="5" name="room_policies" id="area2" ><?php  if(isset($hotel_room_details->room_policies)) echo  html_entity_decode($hotel_room_details->room_policies); ?></textarea>
                
            </td>
            </tr>
           
            <tr height="35">
                <td colspan="2" style="padding-top:20px;"><b>Room Plan</b></td>
            </tr>

            <tr height="35">
                <td>Occupancy: <font style="margin-left: 3px;" color="red">*</font></td>
                <td><select name="occupancy" id="occupancy" style="width:150px;" required>
                      <option value="">Select capacity</option>
                    <?php
                    for($j=1;$j<=20;$j++){
                    ?>
                      <option value="<?php echo $j; ?>" <?php if($j == $hotel_room_details->occupancy){ echo "selected='selected'"; } ?>><?php echo $j; ?></option>
					<?php	
                    }
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('occupancy');?></span></td>
            </tr>
            <tr height="35">
                <td>No of Adults:<font style="margin-left: 3px;" color="red">*</font> </td>
                <td>
                <input type="text" name="no_of_adults"  value="<?php if(isset($hotel_room_details->no_of_adults)) echo $hotel_room_details->no_of_adults; ?>"required  />
              </td>
            </tr>
             <tr height="35">
                <td>No of Childs:<font style="margin-left: 3px;" color="red">*</font> </td>
                <td>
                <input type="text" name="no_of_childs"  value="<?php if(isset($hotel_room_details->no_of_childs)) echo $hotel_room_details->no_of_childs; ?>" required />
              </td>
            </tr>
        	<tr>
           <tr height="35">
                <td>Total Number of Rooms:<font style="margin-left: 3px;" color="red">*</font> </td>
                <td>
                <input type="text" name="total_no_of_rooms" value="<?php if(isset($hotel_room_details->total_no_of_rooms)) echo $hotel_room_details->total_no_of_rooms; ?>"  required />
              </td>
            </tr>
        	<tr>
            <tr>
                <td>Room Critical level: </td>
                <td> <input type="radio" name="room_critical_level"  value="0"<?php if($hotel_room_details->room_critical_level == 0) echo 'checked="checked"';?> />Percentage <input type="radio" name="room_critical_level" value="1"<?php if($hotel_room_details->room_critical_level == 1) echo 'checked="checked"';?>/> Numerical Number &nbsp;
                <input type="text" name="no_of_rooms_left"  size="10" value="<?php if(isset($hotel_room_details->no_of_rooms_left)) echo $hotel_room_details->no_of_rooms_left; ?>" />
                </td>
            </tr>
            <tr >
              <td>
               
              </td>
            </tr>
        	<tr>
                <td>&nbsp;</td>
                <td>
                
                </td></tr>
              
            </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
    <td align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td>
</tr>
<tr>
	<td height="20" colspan="2">&nbsp;</td>
</tr>
</table>
       
       </form>     
        </table>
   
    
    </table>
    
      

    
        
    
    

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
