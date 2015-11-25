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
   
        	
             <li><a href="<?php echo WEB_URL;?>home/hotel_commission"  id="tabs_active">Hotel Commission</a></li>
        	
       
       
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
        

        <div class="contete_area">
			 <form method="post" name="admin_register" action="<?php echo WEB_URL; ?>home/check_hotel_commission/" enctype="multipart/form-data">
               <?php  $hotels=$this->common_model->get_product_name("hotel");	?>
              <select name="hotel"  style="width: 200px;"><option>Select Hotels</option><option>all</option>
			  <?php
								if(isset($hotels[0]->sup_hotel_id))
								{
									for($i=0;$i<count($hotels);$i++){
							?>
								<option value="<?php echo $hotels[$i]->sup_hotel_id; ?>"><?php echo $hotels[$i]->hotel_name; ?></option>
							<?php	
									}
								}
							?> 
			  </select>  
			  <?php  $b2b_users=$this->common_model->get_b2b_user_name("b2buser");	?>
			  <select name="agents" style="width: 200px;"><option>Select Agents</option><option>all</option>
			    <?php
								if(isset($b2b_users[0]->id))
								{
									for($i=0;$i<count($b2b_users);$i++){
							?>
								<option value="<?php echo $b2b_users[$i]->id; ?>"><?php echo "B2B/".$b2b_users[$i]->id." - ".$b2b_users[$i]->name; ?></option>
							<?php	
									}
								}
							?> 
			  </select>  
			  <input type="text" style="width:30px;" name="commission_rate"/> %
			  <input type="submit" Value="Add Hotel Commission" style="cursor:pointer;background-color: white;width: 200px;height: 25px;border-radius: 10px;"/>
            </form>   
<?php if (!empty($msg)) {echo  $msg;}else{ ?>           	
		<div class="content flights">
 
       
        <div class="wi680_search_branc" style="width:750px; margin-top:30px">
		
		<div class="tb" style="width:738px">
            <div class="tb_sample_cover" style="width:882px">
             <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Sl no</div>
			<div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Hotels</div>
            <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Agents</div>
			<div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:100px;">Commission</div>
			<div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:100px;">Last Modified On</div>
			<div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:100px;">Status</div>
             <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:155px;">Action</div>
            <!--<div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000">Online Value</div>-->
         </div>
		<?php
        if (!empty($result)) {
        for($i=0;$i< count($result);$i++) { ?>
        <div class="tb_sample_cover211" style="width:882px">
        	 <div class="tr_col_01  bl_2" style="width:140px;"><?php echo $i+1; ?></div>
            <div class="tr_col_01  bl_2" style="width:140px;"><?php if($result[$i]->product_name == "all"){echo $result[$i]->product_name;}
			else{
			$products=$this->common_model->get_hotel($result[$i]->product_name); echo $products[0]->hotel_name; }?></div>
           <div class="tr_col_01  bl_2" style="width:140px;"><?php if($result[$i]->agents == "all"){echo $result[$i]->agents;}
			else{
			$b2b_users=$this->common_model->get_b2b_user($result[$i]->agents); echo "B2B/".$b2b_users[0]->id." - ".$b2b_users[0]->name; }?></div>
           <div class="tr_col_01  bl_2" style="width:100px;"><?php echo $result[$i]->commission_rate." %"; ?></div>
		   <div class="tr_col_01  bl_2" style="width:100px;"><?php echo $result[$i]->updated_date; ?></div>
		   <div class="tr_col_01 bl_1" style="width:100px;"><?php if($result[$i]->status==1) { echo "Active";}else {echo "InActive";} ?></div>
            <div class="tr_col_01 bl_1" style="width:155px;">  
          	
            
             <a href="<?php echo WEB_URL;?>home/update_commission/<?php echo $result[$i]->product."/".$result[$i]->id; ?>/1">Active</a> /
              <a href="<?php echo WEB_URL;?>home/update_commission/<?php echo $result[$i]->product."/".$result[$i]->id; ?>/0">InActive</a>/
                <span style="font-size:12px;"><?php echo anchor(WEB_URL.'home/update_commission/'.$result[$i]->product."/".$result[$i]->id.'/2', '<span style="color:#2485BE;">Delete</span>', array('onClick' => "return confirm('Are you sure you want to delete?')")); ?> </span>
       
            
          
            </div>
          
        </div>
        <?php }}
		else { 
        echo 'Result not found';
        }
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
