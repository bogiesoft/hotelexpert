<?php $this->load->view('header'); ?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<div class="container">
<div class="row">
	<div class="col-sm-12">
			<div class="col-sm-4">
				
			</div>
				<div class="col-sm-8">
				<?php  foreach($hotels as $hotel){
                        //$photo  = theme_img('no_picture.png', lang('no_image_available'));
                 ?>
					<div class="col-sm-12">
						<!-- recent item for slider -->
						<div class="sale-item">
							
							<a href=""><?php  //echo $boximage; ?></a>
							
							<h3><?php echo $hotel->hotel_name; ?></h3>
							<?php $desc = (strlen($hotel->hotel_desc) > 30) ? substr($hotel->hotel_desc,0,30).'...' : $hotel->hotel_desc; ?>
							<span class="details"><?php echo $desc; ?></span>
							
							<div class="cart-btn">
							
								
								
									<span class="price-sale">Rs.<?php echo $hotel->selling_price; ?></span>
								
								
								<a href="<?php echo WEB_DIR; ?>hotel/hotel_details/<?php echo $hotel->sup_hotel_id; ?>" class="btn btn-danger" type="button" target="_blank"> Book</a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
		</div>			
	</div>
				
</div>
<?php $this->load->view('footer'); ?>