<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin Console</title>
		<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo WEB_DIR; ?>tabs/style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo WEB_DIR; ?>tabs/core.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo WEB_DIR ?>jquery.js"></script>

		<!-- for calender -->
		<link rel="stylesheet"  type="text/css" media="all" href="<?php echo WEB_DIR ?>css/jquery-ui.css" />
		<script type="text/javascript" src="<?php echo WEB_DIR ?>js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="<?php echo WEB_DIR ?>js/jquery-ui.js"></script>

			<script>
			// for datepicker in reservation

			$(function() {
				$( "#from1" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#to1" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#from2" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#to2" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#from3" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#to3" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#from31" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#to31" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#from4" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#to4" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#from5" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#to5" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#from32" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
				$( "#to32" ).datepicker(
					{dateFormat : 'yy-mm-dd',} 
				);
			});
$(document).ready(function() {
var product3 = $( "#product3" ).val();
if(product3 == "hotel")		{jQuery(".product_name31").show();jQuery(".room_type31").show(); }
else if(product3 == "villa") {jQuery(".product_name32").show(); jQuery(".room_type32").show();}
else if(product3 == "car")	{jQuery(".product_name33").show(); jQuery(".room_type33").show();}

var product = $( "#product5" ).val();
if(product == "hotel")		{jQuery(".product_name51").show(); jQuery(".room_type51").show();}
else if(product == "villa") {jQuery(".product_name52").show(); jQuery(".room_type52").show();}
else if(product == "car")	{jQuery(".product_name53").show(); jQuery(".room_type53").show(); }

});


			
			function show(){
			var discount_parameter = document.getElementById("discount_parameter").value;
			var one = document.getElementById("one");
			var two = document.getElementById("two");
			var three = document.getElementById("three");
			var three1 = document.getElementById("three1");
			var four = document.getElementById("four");
			var five = document.getElementById("five");
			var five1 = document.getElementById("five1");
				if(discount_parameter == "1"){
				one.style.display="block";
				two.style.display="none";
				three.style.display="none";
				three1.style.display="none";
				four.style.display="none";
				five.style.display="none";
				five1.style.display="none";
				return false;
				}
				if(discount_parameter == "2"){
				one.style.display="none";
				two.style.display="block";
				three.style.display="none";
				three1.style.display="none";
				four.style.display="none";
				five.style.display="none";
				five1.style.display="none";
				return false;
				}
				if(discount_parameter == "3"){
				one.style.display="none";
				two.style.display="none";
				three.style.display="block";
				three1.style.display="block";
				four.style.display="none";
				five.style.display="none";
				five1.style.display="none";
				return false;
				}
				if(discount_parameter == "4"){
				one.style.display="none";
				two.style.display="none";
				three.style.display="none";
				three1.style.display="none";
				four.style.display="block";
				five.style.display="none";
				five1.style.display="none";
				return false;
				}
				if(discount_parameter == "5"){
				one.style.display="none";
				two.style.display="none";
				three.style.display="none";
				three1.style.display="none";
				four.style.display="none";
				five.style.display="block";
				five1.style.display="block";
				return false;
				}
				return true;
			}
		function update(){
			var discount_parameter = document.getElementById("discount_parameter").value;
			var id = document.getElementById("discount_id").value;
			var rule_name = document.getElementById("rule_name").value;
			if(rule_name == ""){
					alert("please enter rule name");
					document.getElementById("rule_name").focus();
					return false;
			}
			if(discount_parameter == "1"){
			var days = document.getElementById("days").value;
			var discount_rate1 = document.getElementById("discount_rate1").value;
			var basis1 = document.getElementById("basis1").value;
			var customer_type1 = document.getElementById("customer_type1").value;
			var from = document.getElementById("from1").value;
			var to = document.getElementById("to1").value;
				if(days=="")
					{
					alert("please enter days");
					document.getElementById("days").focus();
					return false;
				}
				else if(discount_rate1=="")
					{
					alert("please enter value");
					document.getElementById("discount_rate1").focus();
					return false;
				}
				else
					{
					$.ajax({
						type: 'POST',
						url: '<?php echo WEB_URL;?>home/update_discount_rules_type1/'+discount_parameter,
						data: {rule_name: rule_name,days: days,discount_rate: discount_rate1,basis: basis1,id: id,customer_type: customer_type1,from: from,to: to},
						success: function( response_data ){
							if(response_data!=''){
								alert(response_data);
							//$("#content").html(response_data);
							}
						},
						dataType: "json"
					});
				}
			}
			
			if(discount_parameter == "2"){
			var costs = document.getElementById("costs").value;
			var currency = document.getElementById("currency").value;
			var discount_rate2 = document.getElementById("discount_rate2").value;
			var basis2 = document.getElementById("basis2").value;
			var customer_type2 = document.getElementById("customer_type2").value;
			var from = document.getElementById("from2").value;
			var to = document.getElementById("to2").value;
				if(costs=="")
					{
					alert("please enter costs");
					document.getElementById("costs").focus();
					return false;
				}
				else if(discount_rate2=="")
					{
					alert("please enter a value");
					document.getElementById("discount_rate2").focus();
					return false;
				}
				else
					{
					$.ajax({
						type: 'POST',
						url: '<?php echo WEB_URL;?>home/update_discount_rules_type2/'+discount_parameter,
						data: {rule_name: rule_name,costs: costs,currency: currency,discount_rate: discount_rate2,basis: basis2,id: id,from: from,to: to,customer_type: customer_type2},
						success: function( response_data ){
							if(response_data!=''){
								alert(response_data);
							//$("#content").html(response_data);
							}
						},
						dataType: "json"
					});
				}
			}
			if(discount_parameter == "3"){
					// alert('dfdf');
					if(document.getElementById("product3").value != '')
				{
				var product = document.getElementById("product3").value;
				if(product == "hotel"){
				var product_name = document.getElementById("product_name31").value;
				}
				else if(product == "villa"){
				var product_name = document.getElementById("product_name32").value;
				}
				else if(product == "car"){
				var product_name = document.getElementById("product_name33").value;
				}
				var from = document.getElementById("from3").value;
				var to = document.getElementById("to3").value;
				var discount_rate3 = document.getElementById("discount_rate3").value;
				var basis3 = document.getElementById("basis3").value;
				var customer_type3 = document.getElementById("customer_type3").value;
				var room_type3	= '';
				if(product == "hotel"){
				var room_type3 =  $("#room_type31").val();
				} else if(product == "car"){
				var room_type3 = $("#room_type32").val();
				} else {
					var room_type3 = $("#room_type33").val();
				}
				if(discount_rate3=="")
					{
					alert("please enter a value");
					document.getElementById("discount_rate3").focus();
					return false;
				}
			
					else
					{
					$.ajax({
						type: 'POST',
						url: '<?php echo WEB_URL;?>home/update_discount_rules_type3/'+discount_parameter,
						data: {rule_name: rule_name,product: product,product_name: product_name,from: from,to: to,id: id,discount_rate: discount_rate3,basis: basis3,customer_type: customer_type3,room_type: room_type3},
						success: function( response_data ){
							if(response_data!=''){
								alert(response_data);
							//$("#content").html(response_data);
							}
						},
						dataType: "json"
					});
				}
				
				
				
				}
			}
			
			if(discount_parameter == "4"){
				var from4 = document.getElementById("from4").value;
				var to4 = document.getElementById("to4").value;
				var discount_rate4 = document.getElementById("discount_rate4").value;
				var basis4 = document.getElementById("basis4").value;
				var customer_type4 = document.getElementById("customer_type4").value;
				var product4 = document.getElementById("product4").value;
				if(discount_rate4=="")
					{
					alert("please enter a value");
					document.getElementById("discount_rate4").focus();
					return false;
				}
				else
					{
					$.ajax({
						type: 'POST',
						url: '<?php echo WEB_URL;?>home/update_discount_rules_type4/'+discount_parameter,
						data: {rule_name: rule_name,from: from4,to: to4,discount_rate: discount_rate4,basis: basis4,id: id,customer_type: customer_type4,product: product4},
						success: function( response_data ){
							if(response_data!=''){
								alert(response_data);
							//$("#content").html(response_data);
							}
						},
						dataType: "json"
					});
				}
			}
			
			if(discount_parameter == "5"){
				
				if(document.getElementById("product5").value != '')
				{
				var product = document.getElementById("product5").value;
				if(product == "hotel"){
				var product_name = document.getElementById("product_name51").value;
				}
				else if(product == "villa"){
				var product_name = document.getElementById("product_name52").value;
				}
				else if(product == "car"){
				var product_name = document.getElementById("product_name53").value;
				}
				var city = document.getElementById("city").value;
				var from5 = document.getElementById("from5").value;
				var to5 = document.getElementById("to5").value;
				var discount_rate5 = document.getElementById("discount_rate5").value;
				var basis5 = document.getElementById("basis5").value;
				var customer_type5 = document.getElementById("customer_type5").value;
				var room_type5	= '';
				if(product == "hotel"){
				var room_type5 =  $("#room_type51").val();
				} else if(product == "villa"){
				var room_type5 = $("#room_type52").val();
				} else if(product == "car"){
					var room_type5 = $("#room_type53").val();
				}
				//alert(room_type5);
				if(discount_rate5=="")
					{
					alert("please enter a value");
					document.getElementById("discount_rate5").focus();
					return false;
				}
				else
					{
					$.ajax({
						type: 'POST',
						url: '<?php echo WEB_URL;?>home/update_discount_rules_type5/'+discount_parameter,
						data: {rule_name: rule_name,city: city,from: from5,to: to5,discount_rate: discount_rate5,basis: basis5,id: id,product: product,product_name: product_name,customer_type: customer_type5,room_type: room_type5},
						success: function( response_data ){
							if(response_data!=''){
								alert(response_data);
							//$("#content").html(response_data);
							}
						},
						dataType: "json"
					});
				}
				}
				
				
			}
		}


		</script>
		
<script language="javascript" type="text/javascript">
function get_product_name(product) 
{
	if(product == "hotel"){
			jQuery(".product_name1").show(); 
			jQuery(".product_name2").hide(); 
			jQuery(".product_name3").hide(); 
			return false;
	}	
	else if(product == "villa"){
			jQuery(".product_name1").hide(); 
			jQuery(".product_name2").show(); 
			jQuery(".product_name3").hide(); 
			return false;
	}
	else if(product == "car"){
			jQuery(".product_name1").hide(); 
			jQuery(".product_name2").hide(); 
			jQuery(".product_name3").show(); 
			return false;
	}
	return true;	
}

function get_product_name3(product) 
{
	if(product == "hotel"){
			jQuery(".product_name31").show(); 
			jQuery(".product_name32").hide(); 
			jQuery(".product_name33").hide(); 
			jQuery(".room_type31").show(); 
			jQuery(".room_type32").hide(); 
			jQuery(".room_type33").hide();  
			return false;
	}	
	else if(product == "villa"){
			jQuery(".product_name31").hide(); 
			jQuery(".product_name32").show(); 
			jQuery(".product_name33").hide();
			
			jQuery(".room_type31").hide(); 
			jQuery(".room_type32").show(); 
			jQuery(".room_type33").hide();  
			return false;
	}
	else if(product == "car"){
			jQuery(".product_name31").hide(); 
			jQuery(".product_name32").hide(); 
			jQuery(".product_name33").show(); 
			jQuery(".room_type31").hide(); 
			jQuery(".room_type32").hide(); 
			jQuery(".room_type33").show(); 
			return false;
	}
	return true;	
}

function get_product_name5(product) 
{
	if(product == "hotel"){
			jQuery(".product_name51").show(); 
			jQuery(".product_name52").hide(); 
			jQuery(".product_name53").hide(); 
			jQuery(".room_type51").show(); 
			jQuery(".room_type52").hide(); 
			jQuery(".room_type53").hide(); 
			return false;
	}	
	else if(product == "villa"){
			jQuery(".product_name51").hide(); 
			jQuery(".product_name52").show(); 
			jQuery(".product_name53").hide();
			jQuery(".room_type51").hide(); 
			jQuery(".room_type52").show(); 
			jQuery(".room_type53").hide(); 
			return false;
	}
	else if(product == "car"){
			jQuery(".product_name51").hide(); 
			jQuery(".product_name52").hide(); 
			jQuery(".product_name53").show(); 
			jQuery(".room_type51").hide(); 
			jQuery(".room_type52").hide(); 
			jQuery(".room_type53").show();
			return false;
	}
	return true;	
}




</script>		
<style>
	#update{
		background-color: white;
		border-radius: 16px;
		cursor:pointer;
	}
	#update:hover{margin-top:-2px;}
	#product_name1{display:none;}
	#product_name2{display:none;}
	#product_name3{display:none;}
</style>
	</head>

	<body>
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
													<div id="navjam" style="margin-top:5px;">
														<ul class="tabs1">
															<li><a href="<?php echo WEB_URL;?>home/discount_rules"  >Discount Rules</a></li>
															<li><a href="<?php echo WEB_URL;?>home/new_discount_rules" >Add discount rules</a></li>
															<li><a href="<?php echo WEB_URL;?>home/edit_discount_rule/<?php echo $result[0]->id; ?>" id="tabs_active" >Edit Discount Rules</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="rightpartbox">
											<div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"><strong></strong></div>
											<div  class="right_header"><strong><a href="<?php echo WEB_URL;?>home/discount_rules">Go back</a></strong></div>
										<?php   if (!empty($result)) {	?>
										
        <div class="tablebox" style="width: 950px;">
        <input type="hidden" value="<?php echo $result[0]->id; ?>" name="discount_id" id="discount_id"/>
        <label>Discount Name : </label><input type="text" value="<?php echo $result[0]->rule_name; ?>" name="rule_name" id="rule_name"/><br/>	
        <?php  $reg_details=$this->common_model->get_all_discount_parameters(3);	?>
        
        <label>Rule Type : </label><select name="discount_parameter" id="discount_parameter" onChange="show();" style="margin-left: 33px;">
        <?php
        if(isset($reg_details[0]->id))
        {
        for($i=0;$i<count($reg_details);$i++){
        ?>
        <option value="<?php echo $reg_details[$i]->id; ?>" <?php if($result[0]->discount_parameter == $reg_details[$i]->id){echo "selected";} ?>><?php echo $reg_details[$i]->parameter; ?></option>
        <?php	
        }
        }
        ?>    
        </select><br/><br/><br/>
        
        <div id="one" <?php if($result[0]->discount_parameter != "1"){?> style="display: none;"<?php } ?>>
        <input type="text" style="width:50px;" value="<?php echo $result[0]->days; ?>" name="days" id="days"/>
        days and Customer Type is 
        <select name="customer_type1" id="customer_type1" style="width:80px;">
            <option value="B2C" <?php if($result[0]->customer_type == 'B2C') { ?> selected="selected" <?php } ?>>B2C</option>
            <option value="B2B" <?php if($result[0]->customer_type == 'B2B') { ?> selected="selected" <?php } ?>>B2B</option>
            <option value="Both" <?php if($result[0]->customer_type == 'Both') { ?> selected="selected" <?php } ?>>Both</option>
        </select>
        then discount will be 
        <input style="width:50px;" type="text" value="<?php echo $result[0]->discount_rate; ?>" name="discount_rate1" id="discount_rate1"/>
        <select name="basis1" id="basis1" style="width:150px;">
        <?php 
		$percentage = "";
		$fixed = "";
		
		if($result[0]->basis == "percentage"){$percentage = "selected";}
		else if($result[0]->basis == "fixed"){$fixed = "selected";}
		?>
        <option value="percentage" <?php echo $percentage; ?>>Percentage</option>
        <option value="fixed" <?php echo $fixed; ?>>Fixed</option>
        </select>&nbsp;&nbsp;&nbsp;
			<input type="text" size="10" value="<?php echo $result[0]->from_date; ?>" name="from1" id="from1"/><input type="text" value="<?php echo $result[0]->to_date; ?>" size="10" name="to1" id="to1"/>
          
        <input type="button" value="UPDATE" id="update" onclick="update();"/>
        </div>
        
        <div id="two"  <?php if($result[0]->discount_parameter != "2"){?> style="display: none;"<?php } ?>>
        <input type="text" style="width:70px;" value="<?php echo $result[0]->costs; ?>" name="costs" id="costs"/>
        <select name="currency" id="currency">
        <option  value="<?php echo $result[0]->currency; ?>"> <?php echo $result[0]->currency; ?></option>
        <option value="Rs">Rs</option>
        <option value="$">$</option>
        </select>
        and Customer Type is 
        <select name="customer_type2" id="customer_type2" style="width:80px;">
             <option value="B2C" <?php if($result[0]->customer_type == 'B2C') { ?> selected="selected" <?php } ?>>B2C</option>
            <option value="B2B" <?php if($result[0]->customer_type == 'B2B') { ?> selected="selected" <?php } ?>>B2B</option>
            <option value="Both" <?php if($result[0]->customer_type == 'Both') { ?> selected="selected" <?php } ?>>Both</option>
        </select>
        then discount will be 
        <input  style="width:35px;" type="text" value="<?php echo $result[0]->discount_rate; ?>" name="discount_rate2" id="discount_rate2">
        <select name="basis2" id="basis2">
       <?php 
		$percentage = "";
		$fixed = "";
		
		if($result[0]->basis == "percentage"){$percentage = "selected";}
		else if($result[0]->basis == "fixed"){$fixed = "selected";}
		?>
        <option value="percentage" <?php echo $percentage; ?>>Percentage</option>
        <option value="fixed" <?php echo $fixed; ?>>Fixed</option>
        </select>
			<input type="text" size="10" value="<?php echo $result[0]->from_date; ?>" name="from2" id="from2"/><input type="text" value="<?php echo $result[0]->to_date; ?>" size="10" name="to2" id="to2"/>
          
        <input type="button" value="UPDATE" id="update" onclick="update();"/>
        </div>
        
        <div id="three"  <?php if($result[0]->discount_parameter != "3"){?> style="display: none;"<?php } ?>>
        <select name="product" id="product3"  onChange="get_product_name3(this.value);" style="width:60px;">
        <option value="hotel" <?php if($result[0]->product == 'hotel') { ?> selected="selected" <?php } ?>>hotel</option>
        <option value="villa" <?php if($result[0]->product == 'villa') { ?> selected="selected" <?php } ?>>villa</option>
        <option value="car" <?php if($result[0]->product == 'car') { ?> selected="selected" <?php } ?>>car</option>
        </select>
        and the name is
        <?php $product_name31 = $this->common_model->get_product_name("hotel"); ?>
        <?php $product_name32 = $this->common_model->get_product_name("villa"); ?>
        <?php $product_name33 = $this->common_model->get_product_name("car"); ?>
		
        <select name="product_name31" id="product_name31" class="product_name31" style="display:none;">
        <?php
        if($product_name31!=''){
        for($i=0;$i<count($product_name31);$i++){
        ?>
        <option value="<?php echo $product_name31[$i]->hotel_name; ?>" <?php if($result[0]->product_name == $product_name31[$i]->hotel_name) { ?> selected="selected" <?php } ?>><?php echo $product_name31[$i]->hotel_name; ?></option>
        <?php	
        }
        }
        ?>
        </select>
        
        <select name="product_name32" id="product_name32" class="product_name32" style="display:none;width:120px;">
        <?php
        if($product_name32!=''){
        for($i=0;$i<count($product_name32);$i++){
        ?>
        <option value="<?php echo $product_name32[$i]->villa_name; ?>" <?php if($result[0]->product_name == $product_name32[$i]->villa_name) { ?> selected="selected" <?php } ?>><?php echo $product_name32[$i]->villa_name; ?></option>
        <?php	
        }
        }
        ?>
        </select>
        
        <select name="product_name33" id="product_name33" class="product_name33"  style="display:none;width:120px;">
        <?php
        if($product_name33!=''){
        for($i=0;$i<count($product_name33);$i++){
        ?>
        <option value="<?php echo $product_name33[$i]->car_name; ?>" <?php if($result[0]->product_name == $product_name33[$i]->car_name) { ?> selected="selected" <?php } ?>><?php echo $product_name33[$i]->car_name; ?></option>
        <?php	
        }
        }
        ?>
        </select>
          <?php $room_type31 = $this->common_model->get_room_type("hotel"); ?>
          <?php $room_type33 = $this->common_model->get_room_type("car"); ?>
        
       
		 and Room Type is 
            <select name="room_type3" id="room_type31" class="room_type31" style="width:80px; display:none;">
				<option value="" >None</option>
                <?php
				if($room_type31!=''){
				for($i=0;$i<count($room_type31);$i++){
				?>
                <option value="<?php echo $room_type31[$i]->global_room_category_type_id; ?>" <?php if($result[0]->room_type == $room_type31[$i]->global_room_category_type_id) { ?> selected="selected" <?php } ?>><?php echo $room_type31[$i]->category_type; ?></option>
                
                <?php	
				}
				}
				?>
            </select>
             
            
             <select name="room_type3" id="room_type32"  class="room_type32" style="width:80px; display:none;">
				<option value="" >None</option>
               </select>
          
          		<?php //echo $result[0]->room_type;exit;?>
         		<select name="room_type3" id="room_type33"  class="room_type33" style="width:80px; display:none;">
                
				<option value="" >None</option>
                 <?php
					if($room_type33!=''){
					for($i=0;$i<count($room_type33);$i++){
					?>
					<option value="<?php echo $room_type33[$i]->global_car_type_id; ?>"<?php if($result[0]->room_type == $room_type33[$i]->global_car_type_id) { ?> selected="selected" <?php } ?>><?php echo $room_type33[$i]->car_type; ?></option>
					<?php	
					}
					}
					?>
            </select>
         
       
        and Customer Type is 
        <select name="customer_type3" id="customer_type3" style="width:80px;">
            <option value="B2C" <?php if($result[0]->customer_type == 'B2C') { ?> selected="selected" <?php } ?>>B2C</option>
            <option value="B2B" <?php if($result[0]->customer_type == 'B2B') { ?> selected="selected" <?php } ?>>B2B</option>
            <option value="Both" <?php if($result[0]->customer_type == 'Both') { ?> selected="selected" <?php } ?>>Both</option>
        </select>
        then Discount will be 
        <input type="text" name="discount_rate3" value="<?php echo $result[0]->discount_rate; ?>" id="discount_rate3" style="width:35px;" >
        <select name="basis3" id="basis3">
         <?php 
		$percentage = "";
		$fixed = "";
		
		if($result[0]->basis == "percentage"){$percentage = "selected";}
		else if($result[0]->basis == "fixed"){$fixed = "selected";}
		?>
        <option value="percentage" <?php echo $percentage; ?>>Percentage</option>
        <option value="fixed" <?php echo $fixed; ?>>Fixed</option>
        </select>
        From<input type="text" style="width:70px;"  value="<?php echo $result[0]->from_date; ?>" name="from" id="from3"/> 
        To <input type="text" style="width:70px;" value="<?php echo $result[0]->to_date; ?>"  name="to" id="to3"/> 
        <input type="button" value="UPDATE" id="update" onclick="update();" style="margin-top:10px; margin-left:415px;"/>
        </div>
        
        
         
        
        <div id="four"  <?php if($result[0]->discount_parameter != "4"){?> style="display: none;"<?php } ?>>
        From<input type="text" style="width:70px;" value="<?php echo $result[0]->from_date; ?>" name="from4" id="from4"/> 
        To <input type="text" style="width:70px;" value="<?php echo $result[0]->to_date; ?>" name="to4" id="to4"/> 
        and Customer Type is 
        <select name="customer_type4" id="customer_type4" style="width:80px;">
            <option value="B2C" <?php if($result[0]->customer_type == 'B2C') { ?> selected="selected" <?php } ?>>B2C</option>
            <option value="B2B" <?php if($result[0]->customer_type == 'B2B') { ?> selected="selected" <?php } ?>>B2B</option>
            <option value="Both" <?php if($result[0]->customer_type == 'Both') { ?> selected="selected" <?php } ?>>Both</option>
        </select>
        then discount will be 
        <input style="width:35px;" type="text" value="<?php echo $result[0]->discount_rate; ?>" name="discount_rate4" id="discount_rate4"/>
        <select name="basis4" id="basis4">

         <?php 
		$percentage = "";
		$fixed = "";
		
		if($result[0]->basis == "percentage"){$percentage = "selected";}
		else if($result[0]->basis == "fixed"){$fixed = "selected";}
		?>
        <option value="percentage" <?php echo $percentage; ?>>Percentage</option>
        <option value="fixed" <?php echo $fixed; ?>>Fixed</option>
        </select>
        <?php 
				 $hotel='';$villa='';$car='';
			if($result[0]->product =='hotel')	{$hotel = 'selected';}
			if($result[0]->product =='villa')	{$villa = 'selected';}
			if($result[0]->product =='car')		{$car = 'selected';}
		  ?>
        <select name="product4" id="product4" style="width:60px;">
  
        <option value="hotel" <?php echo $hotel; ?>>Hotel</option>
        <option value="villa" <?php echo $villa; ?>>Villa</option>
        <option value="car" <?php echo $car; ?>>Car</option>
        </select>
        <input type="button" value="UPDATE" id="update" onclick="update();"/>
        </div>
        
        <div id="five"  <?php if($result[0]->discount_parameter != "5"){?> style="display: none;"<?php } ?>>	
        
        <?php $city_name = $this->admin_model->get_global_city_details(); ?>
        <select name="city" id="city" >
        <?php
        
        if($city_name!='')
        {
        for($i=0;$i<count($city_name);$i++){
        ?>
        <option value="<?php echo $city_name[$i]->id; ?>" <?php if($result[0]->city == $city_name[$i]->id){echo "selected";} ?>><?php echo $city_name[$i]->city_name; ?></option>
        <?php	
        }
        }
        ?>
        </select>
        and the booking is between
        From <input type="text" style="width:70px;" name="from" value="<?php echo $result[0]->from_date; ?>" id="from5"/> 
        To <input type="text" style="width:70px;" name="to" value="<?php echo $result[0]->to_date; ?>" id="to5"/> 
             <?php 
				  $hotel='';$villa='';$car='';
			if($result[0]->product =='hotel')	{$hotel = 'selected';}
			if($result[0]->product =='villa')	{$villa = 'selected';}
			if($result[0]->product =='car')		{$car = 'selected';}
		  ?>
            <select name="product5" id="product5" onChange="get_product_name5(this.value);" style="width:60px;">
      
            <option value="hotel" <?php echo $hotel; ?>>Hotel</option>
            <option value="villa" <?php echo $villa; ?>>Villa</option>
            <option value="car" <?php echo $car; ?>>Car</option>
            </select>
            and Name is
            
            <?php $product_name51 = $this->common_model->get_product_name("hotel"); ?>
            <?php $product_name52 = $this->common_model->get_product_name("villa"); ?>
            <?php $product_name53 = $this->common_model->get_product_name("car"); ?>
           
            
            <select name="product_name" id="product_name51" class="product_name51" style="width:120px;display:none;">
            <option value="">Select</option>
            <?php
            if($product_name51!=''){
            for($i=0;$i<count($product_name51);$i++){
            ?>
            <option value="<?php echo $product_name51[$i]->hotel_name; ?>" <?php if($result[0]->product_name == $product_name51[$i]->hotel_name) { ?> selected="selected" <?php } ?>><?php echo $product_name51[$i]->hotel_name; ?></option>
            <?php	
            }
            }
            ?>
            </select>
            
            <select name="product_name52" id="product_name52" class="product_name52" style="display:none;">
            <option value="">Select</option>
            <?php
            if($product_name52!=''){
            for($i=0;$i<count($product_name52);$i++){
            ?>
            <option value="<?php echo $product_name52[$i]->villa_name; ?>" <?php if($result[0]->product_name == $product_name52[$i]->villa_name) { ?> selected="selected" <?php } ?>><?php echo $product_name52[$i]->villa_name; ?></option>
            <?php	
            }
            }
            ?>
            </select>
            
            <select name="product_name53" id="product_name53" class="product_name53"  style="display:none;">
            <option value="">Select</option>
            <?php
            if($product_name53!=''){
            for($i=0;$i<count($product_name53);$i++){
            ?>
            <option value="<?php echo $product_name53[$i]->car_name; ?>" <?php if($result[0]->product_name == $product_name53[$i]->car_name) { ?> selected="selected" <?php } ?>><?php echo $product_name53[$i]->car_name; ?></option>
            <?php	
            }
            }
            ?>
            </select>
            
            
            and Room Type is 
            <select name="room_type5" id="room_type51" class="room_type51" style="width:120px; display:none;">
            <option value="">Select</option>
            <?php
            if($room_type31!=''){
            for($i=0;$i<count($room_type31);$i++){
            ?>
            <option value="<?php echo $room_type31[$i]->global_room_category_type_id; ?>"<?php if($result[0]->room_type == $room_type31[$i]->global_room_category_type_id) { ?> selected="selected" <?php } ?>><?php echo $room_type31[$i]->category_type; ?></option>
            <?php	
            }
            }
            ?>
            </select>
             <select name="room_type5" id="room_type52" class="room_type52" style="display:none;width:120px;">
            <option value="">Select</option>
            </select>
           <!-- <script type="text/javascript">
				function get_room_type()
				{
					var room_type = $("#room_type53").val();
					alert(room_type);
				}
			</script>-->
            <select name="room_type5" id="room_type53" class="room_type53" style="display:none;width:120px;"  onchange="get_room_type(this.value)">
            <option value="">Select</option>
 			<?php
            if($room_type33!=''){
            for($i=0;$i<count($room_type33);$i++){
            ?>
            <option value="<?php echo $room_type33[$i]->global_car_type_id; ?>"<?php if($room_type33[$i]->global_car_type_id == $result[0]->room_type) echo "selected='selected'";?>><?php echo $room_type33[$i]->car_type; ?></option>
            <?php	
            }
            }
            ?>
            </select>
        and Customer Type is 
        <select name="customer_type5" id="customer_type5" style="width:80px;">
            <option value="B2C" <?php if($result[0]->customer_type == 'B2C') { ?> selected="selected" <?php } ?>>B2C</option>
            <option value="B2B" <?php if($result[0]->customer_type == 'B2B') { ?> selected="selected" <?php } ?>>B2B</option>
            <option value="Both" <?php if($result[0]->customer_type == 'Both') { ?> selected="selected" <?php } ?>>Both</option>
        </select>
        
        then discount will be 
        <input style="width:35px;" type="text" value="<?php echo $result[0]->discount_rate; ?>" name="discount_rate5" id="discount_rate5"/>
        <select name="basis5" id="basis5">
 <?php 
		$percentage = "";
		$fixed = "";
		
		if($result[0]->basis == "percentage"){$percentage = "selected";}
		else if($result[0]->basis == "fixed"){$fixed = "selected";}
		?>
        <option value="percentage" <?php echo $percentage; ?>>Percentage</option>
        <option value="fixed" <?php echo $fixed; ?>>Fixed</option>
        </select>
        <input type="button" value="UPDATE" id="update" onclick="update();" style="margin-top: 10px;margin-left: 415px;"/>
        </div>
        
        
            
        <div style="width:200px;height:100px;" id="content"></div>
        
        </div>
											<?php } ?>
										</div>
			</div>
									</td>  
								</tr>   
							</table>
						</td>
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
