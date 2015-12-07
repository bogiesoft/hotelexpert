<?php $this->load->view('header'); ?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div class="container">
	<div class="container">
 
       <ul class="nav nav-pills">
		  <li class="active"><a data-toggle="tab" href="#home">Availablity</a></li>
		  <li><a data-toggle="tab" href="#photo">Photos</a></li>
		  <li><a data-toggle="tab" href="#desc">Description</a></li>
		   <li><a data-toggle="tab" href="#fac">Facilities</a></li>
		   <li><a data-toggle="tab" href="#policy">Policy</a></li>
		   <li><a data-toggle="tab" href="#map">Map</a></li>
	   </ul>
       <div class="tab-content" style="background: #f5f5f5;padding: 10px;height: 100%;overflow: auto;">
		  <div id="home" class="tab-pane fade in active">
			<h3>HOME</h3>
			<p>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
				</div>
				<br/>
				<div class="">
				<?php 
				if(count($room_details) != 0){
					for($i=0;$i<count($room_details);$i++){ ?>
					<div class="col-sm-12" style="margin-bottom:20px;">
						<?php echo isset($room_details[$i]['room_name']) ? $room_details[$i]['room_name'] : "";?>
						<div class="col-sm-3">
							<img src="<?=WEB_DIR;?>/supplier_hotels_images/<?php echo isset($room_details[$i]['room_image']) ? $room_details[$i]['room_image'] : "image-not-available-grid.jpg";?>" onerror="imgError(this);" width="200px" height="150px">
						</div>
						<div class="col-sm-6">
							<?php echo isset($room_details[$i]['room_desc']) ? $room_details[$i]['room_desc'] : "";?><br/>
							<strong>Price:</strong><?php echo isset($room_details[$i]['final_price']) ? $room_details[$i]['final_price'] : "";?>
							<a href="" class="btn btn-primary" >Book NOW</a>
						</div>
					</div>
						
				<?php	}
				}
				?>
				</div>
			</p>
		  </div>
		  <div id="photo" class="tab-pane fade">
			<h3>Images</h3>
			<p><?php 
				if(count($photos) != 0){
					for($i=0;$i<count($photos);$i++){
						echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">
								<a class="thumbnail" href="#">
									<img class="img-responsive" src="'.WEB_DIR.'supplier_hotels_images/'.$photos[$i]['image_name'].'" onerror="imgError(this);">
								</a>
							</div>';
					}
				}else{
					echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">
								<a class="thumbnail" href="#">
									<img class="img-responsive" src="'.WEB_DIR.'supplier_hotels_images/image-not-available-grid.jpg" alt="">
								</a>
							</div>';
				}
			?></p>
		  </div>
		  <div id="desc" class="tab-pane fade">
			<h3>Description</h3>
			<p><?php if($HotelDetails[0]['hotel_desc'] != ""){ echo html_entity_decode($HotelDetails[0]['hotel_desc']); } ?></p>
		  </div>
		   <div id="fac" class="tab-pane fade">
			<h3>Facilities</h3>
			<p><?php 
				if(count($facilities) != 0){
					echo "<ul>";
					for($i=0;$i<count($facilities);$i++){
						echo '<li>'.$facilities[$i]['amenity_name'].'</li>';
					}
					echo "</ul>";
				}
			?></p>
		  </div>
		  <div id="policy" class="tab-pane fade">
			<h3>Policy</h3>
			<p><?php if($HotelDetails[0]['hotel_policies'] != ""){ echo html_entity_decode($HotelDetails[0]['hotel_policies']); } ?>.</p>
		  </div>
		  <div id="map" class="tab-pane fade">
			<h3>Map</h3>
			<p>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<?php  $lat='';
		$lon='';
if(isset($HotelDetails[0]['latitude']) && $HotelDetails[0]['latitude']!='' ) {
	$lat=$HotelDetails[0]['latitude'];
}
else {
	 $lat=54.95869420484606;
}
if(isset($HotelDetails[0]['longitude']) && $HotelDetails[0]['longitude']!='' ) {
	$lon=$HotelDetails[0]['longitude'];
}
else {
	$lon=-2.7575678906250687;
}
?>

<script type="text/javascript">
		var map;
        function initialize() {
            var myLatlng = new google.maps.LatLng(<?=$lat;?>,<?=$lon;?>);
            var myOptions = {
                zoom:7,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("gmap"), myOptions);
            // marker refers to a global variable
            marker = new google.maps.Marker({
                position: myLatlng,
                map: map
            });
    }   

    window.onload = function () { initialize() };
</script>
<div id="gmap" style="height:400px;"></div>
</p>
		  </div>
		</div>

    </div><!-- /.container -->
</div>
<?php $this->load->view('footer'); ?>