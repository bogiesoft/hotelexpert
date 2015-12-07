	
	<?php include('header.php'); ?>
<style>.select-wrapper {width:90px};</style>
		<div id="slider">
			
			<!-- BEGIN .slider -->
			<div class="slider">
				<ul class="slides">
					
					<li>
						<img src="<?=WEB_DIR;?>assets/images/demo_image_05.jpg" alt="" />
						<div class="slider-caption-wrapper">
							<div class="slider-caption">
								<p class="colour-caption medium-caption">BEST RATE
 GUARANTEE &amp;-50% PROMOTIONS</p>
								<div class="clearboth"></div>
								<p class="dark-caption large-caption">HANDPICKED,UNIQUE HOTELS</p>
							</div>
						</div>
					</li>
					
					<li>
						<img src="<?=WEB_DIR;?>assets/images/demo_image_03.jpg" alt="" />
						<div class="slider-caption-wrapper">
							<div class="slider-caption">
								<p class="colour-caption medium-caption">HOT DEALS AND NEW HOTELS</p>
								<div class="clearboth"></div>
								<p class="dark-caption large-caption">BOOK WITH US TODAY </p>
							</div>
						</div>
					</li>
					
					<li>
						<img src="<?=WEB_DIR;?>assets/images/demo_image_04.jpg" alt="" />
						<div class="slider-caption-wrapper">
							<div class="slider-caption">
								<p class="colour-caption medium-caption">Enjoy the crystal clear water,</p>
								<div class="clearboth"></div>
								<p class="dark-caption large-caption">tropical surroundings with 15% off </p>
							</div>
						</div>
					</li>
					
				</ul>
			<!-- END .slider -->
			</div>
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
    $( "#sdate" ).datepicker({
    numberOfMonths: 1,
    dateFormat: 'dd-mm-yy',
    
    minDate: 0
    });
    
	$('#sdate').change(function(){
    //$t=$(this).val();
    var selectedDate = $(this).datepicker('getDate');
    
    
    });
	
	$( "#edate" ).datepicker({
    numberOfMonths: 1,
    dateFormat: 'dd-mm-yy',
    
    minDate: 0
    });
    
	
	$('#edate').change(function(){
    //$t=$(this).val();
    var selectedDate = $(this).datepicker('getDate');
    
    
    });
	 $('#sdate').change(function(){
		   //$t=$(this).val();
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#edate" ).val();
		
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
					$( "#edate" ).datepicker({
	             		numberOfMonths: 1,
						dateFormat : 'dd-mm-yy',
						minDate: 1
					});
		   $( "#edate" ).val($t);
		  // $('#datepicker1').datepicker('option', 'minDate', $t);s
	}
		

		  });
		 $('#edate').change(function(){
		   //$t=$(this).val();
		 
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#sdate" ).val();
		
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
					$( "#sdate" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: 0
					});
		   $( "#sdate" ).val($t);
	}
	else
	{
		 
		  // $('#datepicker1').datepicker('option', 'minDate', $t);s
	}
		

		  });
	
     });
	 
	 
</script> 		
			<!-- BEGIN .home-reservation-box -->
			<div class="home-reservation-box clearfix" style="position: absolute;top: 36%;">
				
				<form class="booking-form" name="bookroom" action="<?php echo WEB_URL;?>hotel/search" method="POST">
					<input type="hidden"  name="id" value="Bi3Wkj9.kdFFw" class="datepicker">
					<input type="hidden" name="search" value="search_form">
					<input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px; z-index:99999; position:absolute;" disabled="disabled"  />
				
					<input class="text1_slider"  type="text" name="city_name" onblur="fetch_city();" placeholder="Where would you like to go?" id="testinput" required />
					<input type="text"  name="sd" id="sdate"  value="Check In" class="datepicker">
					<input type="text" id="edate" name="ed" value="Check Out" class="datepicker">
					
					<div class="select-wrapper">
						<select id="no_of_rooms" name="no_of_rooms">
							<option value="none">Rooms</option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					
					<div class="select-wrapper">
						<select id="adults" name="adults">
							<option value="none">Adults</option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					
					<div class="select-wrapper">
						<select id="children" name="children">
							<option value="none">Children</option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					<br/><br/><br/>
					<div style="text-align:center;">
					<input class="bookbutton" type="submit" value="Check Availability" />
					</div>
				</form>
				
			<!-- END .home-reservation-box -->
			</div>
			
		</div>

		<!-- BEGIN .content-wrapper -->
		
		
		<!-- BEGIN #footer -->
<?php include('footer.php'); ?>
<script type="text/javascript">

	var options = {
	script:"<?php print WEB_DIR; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
	var as_json = new AutoSuggest('testinput', options);
	function fetch_city(){
		$( "#city" ).val($( "#testinput" ).val())
	}
</script> 
