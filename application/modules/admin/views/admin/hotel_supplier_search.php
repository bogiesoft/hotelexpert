<select name="jumpMenu" id="jumpMenu" onchange="add_hotel_place();" style="width:146px;" size="20" required>
<option value="" selected="selected" style="font-weight:bold">Select</option>
<?php if($sup_details!='') { 

for($i=0;$i<count($sup_details);$i++)  {?>
<option value="<?php echo $sup_details[$i]->user_id; ?>"<?php if(isset($user_id) && $user_id == $sup_details[$i]->user_id) echo "selected='selected'";?>><?php echo $sup_details[$i]->firstname; ?></option>
<?php } } ?>
</select>
