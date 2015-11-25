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

<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}

$(document).ready(function(){

$("input:radio[name=top_city]").click(function() {
var top_city = $(this).val();
$('#testinput').val(top_city);
});
return false;
});

function getXMLHTTP() { //fuction to return the xml http object
  var xmlhttp=false; 
  try{
   xmlhttp=new XMLHttpRequest();
  }
  catch(e) {  
   try{   
    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
   }
   catch(e){
    try{
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e1){
     xmlhttp=false;
    }
   }
  }
    
  return xmlhttp;
    }
	


function check_new(){
$avilable_rooms = $('#avilable_rooms').val();
$cost_price = $('#cost_price').val();
$markup = $('#markup').val();
$selling_price = $('#selling_price').val();
$discount_rule = $('#discount_rule').val();
$final_price = $('#final_price').val();
$infant = $('#infant').val();
$sup_charge = $('#sup_charge').val();


if($markup!=''){
$('input[name="markup[]"]').each(function(){
 $('input[name="markup[]"]').val($markup);
});
}
if($avilable_rooms!=''){
$('input[name="avilable_rooms[]"]').each(function(){
 $('input[name="avilable_rooms[]"]').val($avilable_rooms);
});
}
if($cost_price!=''){
$('input[name="cost_price[]"]').each(function(){
 $('input[name="cost_price[]"]').val($cost_price);
});
}
if($selling_price!=''){
$('input[name="selling_price[]"]').each(function(){
 $('input[name="selling_price[]"]').val($selling_price);
});
}
if($discount_rule!=''){
	$('input[name="discount_rule[]"]').each(function(){
 $('input[name="discount_rule[]"]').val($discount_rule);
});
}
if($final_price!=''){
$('input[name="final_price[]"]').each(function(){
 $('input[name="final_price[]"]').val($final_price);
});
}
if($infant!=''){
$('input[name="infant[]"]').each(function(){
 $('input[name="infant[]"]').val($infant);
});
}
if($sup_charge!=''){
$('input[name="sup_charge[]"]').each(function(){
 $('input[name="sup_charge[]"]').val($sup_charge);
});
}
}

function facilities()
{
	var valcheck2 = [];
	var selectedVariants = $("input[name=day]:checked").serializeArray();
	jQuery.each(selectedVariants, function(i, field){
     // alert(field.value); alert("IValue=="+i);
		valcheck2[i] = field.value;
    });
	$('#apartfec_val').val('');
	$('#apartfec_val').val(valcheck2);
	/*alert(valcheck2);
	alert($('#apartfec_val').val(valcheck2));*/
	
}
function check_all()
{
	if($('#all_day').attr('checked'))
	{

		$("#day input").each( function() {
			$(this).attr("checked",true);
		});
	}
	else
	{
		$("#day input").each( function() {
			$(this).attr("checked",false);
		});
	}
}

function abc()
{
	var valcheck2 = [];
	var selectedVariants = $("input[name=day]:checked").serializeArray();
	jQuery.each(selectedVariants, function(i, field){
     // alert(field.value); alert("IValue=="+i);
		valcheck2[i] = field.value;
    });
	$('#apartfec_val').val('');
	$('#apartfec_val').val(valcheck2);
	document.getElementById("maintain_month").submit();
}
function month(month,year)
{

	$('#month').val(month);
	$('#year').val(year);
	var valcheck2 = [];
	var selectedVariants = $("input[name=day]:checked").serializeArray();
	jQuery.each(selectedVariants, function(i, field){
     // alert(field.value); alert("IValue=="+i);
		valcheck2[i] = field.value;
    });
	$('#apartfec_val').val('');
	$('#apartfec_val').val(valcheck2);
	document.getElementById("maintain_month").submit();
}
function checked()
{
	var valcheck2 = [];
	var selectedVariants = $("input[name=on_req_checked_val]:checked").serializeArray();
	jQuery.each(selectedVariants, function(i, field){
     //alert(field.value); alert("IValue=="+i);
		valcheck2[i] = field.value;
    });
	$('#on_req_checked').val('');
	$('#on_req_checked').val(valcheck2);
	var valcheck3 = [];
	var selectedVariants1 = $("input[name=on_arr_checked_val]:checked").serializeArray();
	jQuery.each(selectedVariants1, function(j, field){
     //alert(field.value); alert("IValue=="+i);
		valcheck3[j] = field.value;
    });
	$('#on_arr_checked').val('');
	$('#on_arr_checked').val(valcheck3);
	var valcheck4 = [];
	var selectedVariants2 = $("input[name=on_blk_checked_val]:checked").serializeArray();
	jQuery.each(selectedVariants2, function(k, field){
     //alert(field.value); alert("IValue=="+i);
		valcheck4[k] = field.value;
    });
	$('#on_blk_checked').val('');
	$('#on_blk_checked').val(valcheck4);
	var stdate = $('#stdate').val();
	var eddate = $('#eddate').val();
	$('#from').val(stdate);
	$('#to').val(eddate);
}
function getDates(){
	
	var sd = $("#datepicker2").val();
	var ed = $("#datepicker3").val(); 
	//alert(ed);
	//var room_plan = $("#room_plan").val();
	if(sd == ''){
		alert("Please select from date");
		return false;
	}
	if(ed == ''){
		alert("Please select end date");
		return false;
	}
	var selectedDays = new Array();
	var j=0;
	for(var i=0; i < document.form1.day.length; i++){
		if(document.form1.day[i].checked == true){
			//alert(sf);
			selectedDays[j]=document.form1.day[i].value;
			j++;			
		}
	}
	
	
	var sd1 = new Array();
	var ed1 = new Array();
	
	for(var p=0; p < document.form1.datepicker2.length; p++)
	{
		
			sd1[p]=document.form1.datepicker2[p].value;
						
		
	}
	
	for(var q=0; q < document.form1.datepicker3.length; q++)
	{
		
			ed1[q]=document.form1.datepicker3[q].value;
					
		
	}
	
	
	if(sd1 == '')
	{
		sd1 = sd;
	}
	if(ed1 == '')
	{
		ed1 = ed;
	}
	if(selectedDays == ''){ selectedDays = 'All'; }
	$.post( "<?php print WEB_URL ?>index/getDates", {mmsd:sd1, mmed:ed1, selectedDays:selectedDays},
      function(data) {
		if(data != ''){
			$("#filtering").show();
			//$("#room_id").val(room_plan);
			//$("#capacity").val(data.room_plan[0].capacity);
			$("#monthDates").html('');
			
			for(var i=0; i<data.dates.length; i++){
				var day = data.dates[i].toString().split(" ");
				$("#monthDates").append('<tr style="border-top:solid 1px #deab6f; border-bottom:solid 1px #deab6f; padding-bottom:2px; width: 108%;"><td class="tdnew" id="tdtd">'+data.dates[i]+'<input type="hidden" name="dates[]" value="'+day[0]+'"><input type="hidden" name="weekday[]" value="'+day[1]+'"></td><td class="tdnew" id="tdtd3"><input name="avilable_rooms[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td class="tdnew" id="tdtd3"><input name="cost_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td class="tdnew" id="tdtd3"><input name="markup[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:13%;" id="tdtd3"><input  type="text" name="selling_price[]" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"></td><td class="tdnew" id="tdtd3"><input type="text" name="discount_rule[]" id="discount_rule[]" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"></td><td></td><td class="tdnew" id="tdtd3"><input name="final_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td class="tdnew" id="tdtd3"></tr>');
			}
		} 
	  }
	);
}
</script>


</head>
 <script language="javascript1.5" type="text/javascript">

function goBack()
{
	window.history.go(-1);
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
        <li><a href="<?php echo WEB_URL;?>index/update_hotel_details/<?php echo $this->uri->segment(3); ?>"  >Hotel Details</a></li>
        <li><a href="<?php echo WEB_URL;?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:200px;">Inventory & Pricing</a></li>
       
         
       
       
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
<ul class="tabs">
	<li><a href="<?php echo WEB_URL ?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3); ?>" id="tabs_active"  >Room Rates</a></li>
    <li><a href="#" >Room Amenities</a></li>

	
</ul>
</div>
        </div>
       <!-- <div style="float:right; cursor:pointer; position:absolute; top:158px; right:209px; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></div>-->
        
        <!-- tab "panes" -->
      </div>
    
      </div>
      <div class="rightpartbox" style="margin:0px;">
        <div style=" font-family:Verdana, Geneva, sans-serif; font-size:16px; float:left; color:#3366CC; border-bottom:1px solid #CCC; border-radius:8px; margin:15px; padding:0px;"><strong></strong></div>
   <div style="float:right; color:#517BA5;"><a href="<?php echo WEB_URL; ?>index/hotel_inventory_pricing/<?php echo $this->uri->segment(3);  ?>">Go Back</a></div>      
        
        <div style="float:left; margin-left:20px;">
        <?php  $room =$this->admin_model->get_available_category();
		
			//echo count($room);exit;
		?>
    
     <form name="form1" action="<?php echo WEB_URL; ?>index/add_room_plan/<?php echo $this->uri->segment(3); ?>" method="post">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
        	<tr><td>&nbsp;</td></tr>
        	<tr height="35">
            <td width="30%"> Room Category <font style="margin-left: 3px;" color="red">*</font></td>
            <td width="77%"><select name='global_room_category_type_id' id='global_room_category_type_id' style="width:150px;" required>
            <option value="" >Select</option>
            		<?php for($i=0; $i<count($room); $i++) { ?>
                <option value="<?php if(isset($room[$i]->global_room_category_type_id)) echo $room[$i]->global_room_category_type_id;  ?>"><?php if(isset($room[$i]->category_type )) echo $room[$i]->category_type ;  ?></option>
                <?php } ?> 
                </select>
            </td>
            </tr>
            
            <tr height="35">
            <td > Room Name <font style="margin-left: 3px;" color="red">*</font></td>
            <td ><input type="text" name="room_name" required />
                
            </td>
            </tr>
             <tr height="35">
            <td valign="top" >Room Description</td>
            <td ><textarea cols="50" rows="5" name="room_desc" id="area1" ></textarea>
                
            </td>
            </tr>
            <tr><td>&nbsp;&nbsp;</td></tr>
           <tr height="35">
            <td valign="top" >Room Policies</td>
            <td ><textarea cols="50" rows="5" name="room_policies" id="area2" ></textarea>
                
            </td>
            </tr>
           
            <tr height="35">
                <td colspan="2" style="padding-top:20px;"><b>Room Plan</b></td>
            </tr>

            <tr height="35">
                <td>Occupancy:<font style="margin-left: 3px;" color="red">*</font></td>
                <td><select name="occupancy" id="occupancy" style="width:150px;" required>
                      <option value="">Select capacity</option>
                    <?php
                    for($j=1;$j<=20;$j++){
                    ?>
                      <option value="<?php echo $j; ?>" <?php if(isset($rat_tac_details->occupancy) && $j == $rat_tac_details->occupancy){ echo "selected='selected'"; } ?>><?php echo $j; ?></option>
					<?php	
                    }
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('occupancy');?></span></td>
            </tr>
            <tr height="35">
                <td>No of Adults: <font style="margin-left: 3px;" color="red">*</font></td>
                <td>
                <input type="text" name="no_of_adults" required  />
              </td>
            </tr>
             <tr height="35">
                <td>No of Childs:<font style="margin-left: 3px;" color="red">*</font> </td>
                <td>
                <input type="text" name="no_of_childs"  required />
              </td>
            </tr>
        	<tr>
           <tr height="35">
                <td>Total Number of Rooms:<font style="margin-left: 3px;" color="red">*</font> </td>
                <td>
                <input type="text" name="total_no_of_rooms"  required />
              </td>
            </tr>
        	<tr>
            <tr>
                <td>Room Critical level: </td>
                <td> <input type="radio" name="room_critical_level"  value="0" />Percentage <input type="radio" value="1" name="room_critical_level"/> Numerical Number &nbsp;
                <input type="text" name="no_of_rooms_left"   size="10" />
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
              
            
            <tr height="35">
                <td colspan="2" style="padding-top:20px;"><b>Manage Inventory & Pricing</b></td>
            </tr>
        </table>
    <!--</form>   
        
    <form action="<?php echo WEB_URL; ?>index/maintain_by_month/<?php echo $this->uri->segment(3); ?>" method="post">-->

    <input type="hidden" id="apartfec_val" name="apartfec_val" value=""/>
    <input type="hidden" name="month" id="month" value=""/>
    <input type="hidden" name="year" id="year" value=""/>   
    <div style="margin-top:5px;">
    <table style="margin-left:10px;" width="100%">
    <tr>
    <td><!--Select Category and Plan Type--></td>
    <td></td>
    <td>From</td>
    <td></td>
    <td>To</td>
    <td></td>
    <td colspan="2" style="border-bottom:solid 0px #666"><strong>Day</strong> <span style="float:right;"><input name="all_day" id="all_day" type="checkbox" value="" onclick="return check_all();" /> <strong>Check All</strong></span>
    <!--<input type="checkbox" id="supplementary" name="supplementary" value="1"/> Supplementary charge -->
    </td>
    <td><!--<input type="text" id="supplementary_charge_rate" name="supplementary_charge_rate" size="5"/>--></td>
    </tr>
    
    <tr>
    <td style="width:250px;"> Room Available Dates:<font style="margin-left: 3px;" color="red">*</font>
        </td>
        <td >&nbsp;</td>
        <script>
        function zeroPad(num,count)
        {
        var numZeropad = num + '';
        while(numZeropad.length < count) {
        numZeropad = "0" + numZeropad;
        }
        return numZeropad;
        }
        function dateADD(currentDate)
        {
        var valueofcurrentDate=currentDate.valueOf()+(24*60*60*1000);
        var newDate =new Date(valueofcurrentDate);
        return newDate;
        }
        function dateADD1(currentDate)
        {
        var valueofcurrentDate=currentDate.valueOf()-(24*60*60*1000);
        var newDate =new Date(valueofcurrentDate);
        return newDate;
        }
        
        $(function() {
        $( "#datepicker2" ).datepicker({
        numberOfMonths: 1,
        dateFormat: 'dd-mm-yy',
        
        minDate: 0
        });
        $( "#datepicker3" ).datepicker({
        numberOfMonths: 1,
        dateFormat: 'dd-mm-yy',
        
        minDate: 1
        });
        
        $('#datepicker2').change(function(){
        //$t=$(this).val();
        var selectedDate = $(this).datepicker('getDate');
        var str1 = $( "#datepicker3" ).val();
        
        var predayDate  = dateADD(selectedDate);
        var str2 = zeroPad(predayDate.getDate(),2)+"-"+zeroPad((predayDate.getMonth()+1),2)+"-"+(predayDate.getFullYear());
        
        var dt1  = parseInt(str1.substring(0,2),10);
        var mon1 = parseInt(str1.substring(3,5),10);
        var yr1  = parseInt(str1.substring(6,10),10);
        var dt2  = parseInt(str2.substring(0,2),10);
        var mon2 = parseInt(str2.substring(3,5),10);
        var yr2  = parseInt(str2.substring(6,10),10);
        var date1 = new Date(yr1, mon1, dt1);
        var date2 = new Date(yr2, mon2, dt2);
        if(date2 < date1)
        {
        
        }
        else
        {
        var nextdayDate  = dateADD(selectedDate);
        var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());
        
        $t = nextDateStr;
                $( "#datepicker3" ).datepicker({
                    numberOfMonths: 3,
                    dateFormat : 'dd-mm-yy',
                    minDate: 1
                });
        $( "#datepicker3" ).val($t);
        // $('#datepicker1').datepicker('option', 'minDate', $t);s
        }
        });
        
        $('#datepicker3').change(function(){
        //$t=$(this).val();
        
        var selectedDate = $(this).datepicker('getDate');
        var str1 = $( "#datepicker2" ).val();
        
        var predayDate  = dateADD1(selectedDate);
        var str2 = zeroPad(predayDate.getDate(),2)+"-"+zeroPad((predayDate.getMonth()+1),2)+"-"+(predayDate.getFullYear());
        
        
        var dt1  = parseInt(str1.substring(0,2),10);
        var mon1 = parseInt(str1.substring(3,5),10);
        var yr1  = parseInt(str1.substring(6,10),10);
        var dt2  = parseInt(str2.substring(0,2),10);
        var mon2 = parseInt(str2.substring(3,5),10);
        var yr2  = parseInt(str2.substring(6,10),10);
        var date1 = new Date(yr1, mon1, dt1);
        var date2 = new Date(yr2, mon2, dt2);
        if(date2 < date1)
        {
        var nextdayDate  = dateADD1(selectedDate);
        var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());
        
        $t = nextDateStr;
                $( "#datepicker2" ).datepicker({
                    numberOfMonths: 3,
                    dateFormat : 'dd-mm-yy',
                    minDate: 0
                });
        $( "#datepicker2" ).val($t);
        }
        else
        {
        }
        });
        
        });
        </script>
        <?php
            $current_dte = date("d-m-Y",strtotime("+7 days"));
            $next_dte = date("d-m-Y",strtotime("+8 days"));
        ?>
    <td style="width:120px;"><input name="sd" id="datepicker2"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></td>
    <td >&nbsp;</td>
    <td  style="width:120px;"><span id="out"><input name="ed" id="datepicker3" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png'); background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></span></td>
     <td style="width:20px;">
  
      </td>
    <td colspan="3" id="day">
            <input name="day" id="dayy" type="checkbox" value="Mon" style="margin-right:5px;"/>Mon &nbsp; 
            <input name="day" id="dayy" type="checkbox" value="Tue" style="margin-right:5px;"/>Tue &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Wed" style="margin-right:5px;"/>Wed &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Thu" style="margin-right:5px;"/>Thu<br />
            <input name="day" id="dayy" type="checkbox" value="Fri" style="margin-right:5px;"/>Fri &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Sat" style="margin:5px 6px;"/>Sat &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Sun" style="margin-right:5px;"/>Sun
            
                 </td>
    <td colspan="2"><input name="" type="button"  value="submit" onclick="getDates();"/></td>
    </tr>
    </table>
    
   
    </div>
        
    
    <div id="filtering" style="coloir:#fff; width:100%; background:#f8f8f8; display:none;">
    <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="display tableStatic">
    
    <tr style="background:#517BA5"  height="45">
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-top:3px; color:#fff; padding-left:0px;">Smart Update</td>
    
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="avilable_rooms" id="avilable_rooms" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="cost_price" id="cost_price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="markup" id="markup" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></br>
    <input type="radio" name="check_markup" value="0" checked="checked" /><font color="#FFFFFF" >%</font> &nbsp;<input type="radio" name="check_markup" value="1" /><font color="#FFFFFF" >$</font>
    </td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;">
    <input name="selling_price" id="selling_price" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/>
   </td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;">
    <input type="text" name="discount_rule" id="discount_rule" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5" /></br>
    
     <input type="radio" name="check_discount" value="0"  /><font color="#FFFFFF" >%</font> &nbsp;<input type="radio" name="check_discount" value="1" /><font color="#FFFFFF" >$</font>
   </td>
     <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="final_price" id="final_price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input type="button" value="Update" style="margin-top:3px;" onclick="check_new();"/></td>
    </tr>
    
    <tr height="30" style="font-size:12px;">
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Dates</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Available Rooms</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Cost Price</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Markup</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Selling Price</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Discount Rule</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Final Price</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:9%; ">&nbsp;</td>
    </tr>
    </table>

<!--<form action="<?php echo WEB_URL; ?>index/add_maintain_month/<?php echo $this->uri->segment(3); ?>" method="post">-->

<table  width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="display tableStatic" style="background:#fff; margin-top:0px;">

<tr><td>&nbsp;</td></tr>
<span id="monthDates"></span>
<tr>
    <td height="30" style="color:red;">Once you finish all settings please click the "Save" button to save.</td>
</tr>
<input type="hidden" name="cnt" value=""/>
<input type="hidden" name="from" id="from" value=""/>
<input type="hidden" name="to" id="to" value=""/>
<input type="hidden" name="room_id" id="room_id" value=""/>
<input type="hidden" name="capacity" id="capacity" value=""/>

<input type="hidden" name="on_req_checked" id="on_req_checked"/>
<input type="hidden" name="on_arr_checked" id="on_arr_checked"/>
<input type="hidden" name="on_blk_checked" id="on_blk_checked"/>
</table>
<div style="clear:both; height:1px;"></div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
    <td align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td>
</tr>
<tr>
	<td height="20" colspan="2">&nbsp;</td>
</tr>
</table>
</div>
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
