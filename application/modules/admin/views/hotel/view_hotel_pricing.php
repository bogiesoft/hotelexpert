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
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/demos.css">
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
        <li><a href="<?php echo WEB_URL;?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>"  style="width:200px;">Hotel Rooms</a></li>
         <?php } ?>
        <?php if($this->session->userdata('hotel_pricing')==1) { ?>
         <li><a href="<?php echo WEB_URL;?>index/hotel_room_pricing/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" id="tabs_active" style="width:200px;">Inventory & Pricing</a></li>
         <?php } ?>
         
       
       
       </ul>
          
         <div id="navjam" style="margin-top:5px;">
            <ul class="tabs">
            <?php if($this->session->userdata('hotel_room_inventory')==1) { ?>
            <li><a href="<?php echo WEB_URL;?>index/hotel_room_inventory/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>"  >
            Manage Inventory</a></li>
             <?php } ?>
              <?php if($this->session->userdata('hotel_pricing')==1) { ?>
            <li><a href="<?php echo WEB_URL;?>index/hotel_room_pricing/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" id="tabs_active"  style="width:200px;">
            Manage Pricing</a></li>
             <?php } ?>
        
            </ul>
		</div>
        </div>
       <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
      <div class="rightpartbox" style="margin:0px;">
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#517BA5; border-bottom:1px solid #CCC; border-radius:8px; margin:7px; padding:0px;"><strong></strong></div>
         <div class="right_header" style="margin:5px;"><a href="<?php echo WEB_URL;?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>" style="color:#2485BE;">Go Back</a></div>
        
        <div class="promo_details"> 
<?php echo '<B>Room Information: </B>.</br>'; ?></br>
</div>   

<?php //print '<pre />'; print_r($room_invenotory);exit;?>
<div class="promo_details"> 
<?php  echo '<b>Room Category:</b> '.$this->admin_model->get_avail_category_type($room_invenotory[0]->global_room_category_type_id).'</br>'; ?></br>
<?php  echo '<b>Room Name:</b> '.$room_invenotory[0]->room_name.'</br>'; ?>
</div>
	    <form method="post" action="<?php echo WEB_URL; ?>index/hotel_room_pricing/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>">
			<div class="right_header" style="float:left;">
				<input name="keyword" id="datepicker2" value=""  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/>
				<input type="submit" value="Search" style="width:90px; height:25px; background-color:#517ba5; color:#fff;border:1px solid #ccc;"/>
				<a href="<?php echo WEB_URL; ?>index/hotel_room_pricing/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>"><input type="button" value="Reset" style="width:90px; height:25px; background-color:#517ba5; color:#fff;border:1px solid #ccc;" /></a>
			</div>
        </form>
		<script>
		$(function() {
			$( "#datepicker2" ).datepicker({
				numberOfMonths: 1,
				dateFormat: 'dd-mm-yy',
			});
        });
		</script>
        <table width="960" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:0px 0 0 1px; ">
  <tr>
  	<td align="right" valign="top" class="" colspan="9" height="15"> &nbsp;</td>
  	<!--<?php if($this->session->userdata('hotel_pricing')==1) { ?>
    <td align="right" valign="top" class="" colspan="9" height="30"><a href="<?php echo site_url('index/add_hotel_room_pricing')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" style="color:#2485BE; font-weight:bold;">Add Hotel Room Pricing</a>
    </td>
    <?php } ?>-->
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">No</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Period Details</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">View Pricing</td>
    <?php if($this->session->userdata('hotel_pricing')==1) { ?>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
     <?php } ?>
  </tr>
  
 
  
  
	<?php 
    if(isset($result[0]))
    {
    for($i=0;$i<count($result);$i++)
    {
    ?>  
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $i+1; ?></td>
  
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">
 
<a href="<?php echo WEB_URL; ?>index/edit_hotel_room_price_details/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $result[$i]->sup_hotel_room_period_details_id; ?>" style="color:#099; "> <?php $fd = $result[$i]->room_avail_date_from; $fds = explode("-",$fd); $from_date = $fds[2].'-'.$fds[1].'-'.$fds[0]; $td = $result[$i]->room_avail_date_to; $tds = explode("-",$td); $to_date = $tds[2].'-'.$tds[1].'-'.$tds[0]; 
	
	echo '<b>'.$from_date.'</b> To <b>'.$to_date.'</b>';	
	 ?></a>
   
     </td>
     
     <td align="left" valign="top" class="my_profile_name_ex_tab_whit">
	<a href="<?php echo WEB_URL; ?>index/edit_hotel_room_price_details/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $result[$i]->sup_hotel_room_period_details_id; ?>" style="color:#2485BE;" >View Pricing</a>
    </td>
    
     <?php if($this->session->userdata('hotel_pricing')==1) { ?>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">
      
   <!--       <a href="<?php echo WEB_URL; ?>index/edit_hotel_room_price_details/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $result[$i]->sup_hotel_room_period_details_id; ?>" style="color:#2485BE;" >Edit</a> / 
  <a href="<?php echo WEB_URL; ?>index/update_hotel_room_price_details/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $result[$i]->sup_hotel_room_period_details_id; ?>/1" style="color:#2485BE;" >Active</a> / 
   <a href="<?php echo WEB_URL; ?>index/update_hotel_room_price_details/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $result[$i]->sup_hotel_room_period_details_id; ?>/0" style="color:#2485BE;" >InActive</a> /-->
   
    <span style="font-size:12px;"><?php echo anchor(WEB_URL.'index/update_hotel_room_price_details/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'. $result[$i]->sup_hotel_room_period_details_id.'/2', '<span style="color:#2485BE;">Delete</span>', array('onClick' => "return confirm('Are you sure you want to delete?')")); ?> </span> 
    
  <!-- <a href="<?php echo WEB_URL; ?>index/update_hotel_room_details/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_room_details_id ; ?>/2" >Delete</a>-->
    </td>
     <?php } ?>
  </tr>
  <?php
	}
	?>
		<tr><td align="right" colspan="7" ><p><?php echo $links; ?></p></td></tr>

	<?php
}
else
{
	  ?> <td align="center" valign="top" colspan="6" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
?> 

</table>
        
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
