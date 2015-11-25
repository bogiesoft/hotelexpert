
	<style type="text/css">
		.restaurant-stars { display:block; width:76px; height:20px; background:url('<?php echo WEB_DIR; ?>images/grey.png') no-repeat; }
		.restaurant-stars-rating { display:block; width:38px; height:20px; background:url('<?php echo WEB_DIR; ?>images/yellow.png') no-repeat; }
		
	</style>
 <?php
	//$result = $this->Hotel_Model->fetch_gta_temp_result($_SESSION['ses_id']);

 $room_count = $_SESSION['no_of_rooms'];
if($result != '')
{
	 $count = count($result);
	if($count > 10)
	{
		$count_val = 10;
	}
	else
	{
		 $count_val = count($result);
	}
	for($i=0;$i< $count_val;$i++)
	{
		if($result[$i]->hotel_name !='')
		{
	
 $review = $this->Hotel_Model->get_reviews($result[$i]->sup_hotel_id);		

?>
<input type="hidden" value="<?php echo $review != '' ? $review['counts'] : '0' ; ?>" id="counts">
    <script type="text/javascript">
    
	  $(document).ready(function(){ 
		var counts = $('#counts').val();
		if(counts != 0){
		$('a.review').click(function(){ 
		  var popupId = jQuery(this).attr("id");
		   $('div#popup_'+popupId).fadeIn(500);
		    $('#fade').delay(500).fadeIn('slow');
		});
		$('.close_btn').click(function() {
		 var Id = jQuery(this).attr("id");
		 $('div#popup_'+Id).fadeOut(500);
		  $('#fade').delay(500).fadeOut('slow');
	  });
	  }
	  });
    </script>
  <div class="col_1_5">
			<p>
				<img class="cont_450_1"  width="171" height="125" src="<?php echo $result[$i]->image;  ?>"/>
			</p>
		</div>
  <div class="col_1_3">
			<p class="cont_760_1">
				<span class="cont_div1"><a target="_blank" href="<?php echo WEB_URL.'hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?>"  style="color:#0099CC;"><?php echo $result[$i]->hotel_name; ?></a></span><br />
                <span style="font-family: Myriad Pro; font-size: 12pt;"><?php echo $this->Hotel_Model->get_near_by_city_name($result[$i]->sup_hotel_id);?>&nbsp;,Near By Area</span><br />
				<span style="font-family: Myriad Pro; font-size: 11pt;"><?php echo $desc =substr($result[$i]->description,0,80); ?></span><br />
                <a target="_blank" href="<?php echo WEB_URL.'hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?>"><span class="cont_div_more">more details</span></a>
                <span  class="cont_div_review" style="font-family: Myriad Pro; font-size: 11pt;float:right;color:#99cc00;">
				 <a href="#" id="<?php echo $i; ?>" class="review"><span  class="cont_div_review1" style=""><?php echo $review != '' ? $review['counts']: 0 ;?></span>Reviews</span></a>
 
			</p>
		</div>
	<?php  //$review = $this->Hotel_Model->get_reviews($result[$i]->sup_hotel_id);
		if($review != '')
		{
	 ?>
<div id="popup_<?php echo $i; ?>" class="content_holder" style="width:0px;">
            
    <div id="content" style="height:450px;width:400px;">
     <div class="close_btn_div">
         <a class="close_btn" style="cursor:pointer;" id="<?php echo $i;?>" >X</a>
    </div>

<h3 class="papupheader"><?php echo $review['counts'] ." reviews of ". $result[$i]->hotel_name; ?></h3>
<div style="margin-left:25px;">
 <div class="form_table" style="height:370px; overflow-y:scroll;">
 <div class="reg_table">

			<?php   foreach($review['result'] as $res){
						echo '<p>'.$res->date .': "'. $res->user_review . '"</p>';
						echo "<br/>";					
						echo "<p style='margin-top:-42px;'><b>from:</b> " .$res->user_name.'</p>';
						echo "<br/>";
						echo "<p style='margin-top:-45px;'><b>city:</b> " . $res->city.'</p>'; ?>
					
						<p style="margin-top:-15px;"><div class="restaurant-stars">
						<?php $ratings = (28*$res->star_rating);?>
							<div class="restaurant-stars-rating" style="width:<?php echo $ratings; ?>px;margin-top:-20px;">              
								&nbsp;
							</div>
						</div></p>
			<?php }
					
		}	
		?>
	</div>
</div>
</div>

</div>
</div>	

         <div class="col_1_5 last">
			<p>
				  <span class="right_price_1" >Rs <?php echo $result[$i]->lowest_selling_price; ?></span><br />
				<span class="right_price_2" >From <span style=" color: #660099;
    font-size: 15pt;
    font-weight: bolder;">Rs <?php echo $result[$i]->low_cost; ?></span></span><br/>
    <span class="right_price_3" >Per Night </span>
    <br />
    <br />
   <span id="share_icons" class='st_sharethis_large' displayText='ShareThis'></span>
     <span class="share_link"> Share</span>
			</p>
		</div>
        
        <hr>
        
         <?php
	
		} ?>
	<?php }  } ?>
