<select name="jumpMenu" id="jumpMenu" onchange="add_hotel_place();" size="3" style="width:180px;"  required>
<option value="" selected="selected" style="font-weight:bold">Select</option>
<?php if($admin!='') { 

for($i=0;$i<count($admin);$i++)  {?>
<option value="<?php echo $admin[$i]->sub_admin_type_id; ?>" <?php if(isset($user_id) && $user_id == $admin[$i]->sub_admin_type_id) echo "selected='selected'";?>  ><?php echo $admin[$i]->sub_admin_type; ?></option>
<?php } } ?>
</select>
