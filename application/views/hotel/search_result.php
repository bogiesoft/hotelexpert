
	<?php $this->load->view('header'); ?>

<script language="javascript">
	
	function before_loads()
	{ 
	
		$('.nextpage').hide();
		$('#result_count').html("<img src='<?php echo WEB_DIR; ;?>images/loading3.gif' width='22' height='22' >");
		$('#result_crs').html('<div style="padding-left:240px; padding-top:55px" ><p>Loading Results...</p><img src="<?php echo WEB_DIR ?>gui/images/loading.gif" /></div>');
		$('#loading').html('<div  style=" padding-top:22px;"  class="loading" ><img width="253" height="31" src="<?php echo WEB_DIR; ?>gui/slider/images/loading_bar_animated.gif" alt="Loading..." /><br><div class="bottom-header" style="padding-left:105px">Loading</div></div>');
		$("#priceStarts").html('<img src="<?php echo WEB_DIR; ?>images/276491.gif"   />');
	}
		$(document).ready(function () {

	$('#hotel_room_cate_type input, #hotel_facility input, #relative_location input, #star_asc, #star_desc, #name_asc, #name_desc,').click(function () {
		//alert(this.id);
		filterSearch('', this.id);
		
		//loadData(1);
	});
	
	$('#basic-modal .basic').click(function (e) {
					var matches = [];
					var matches1 = [];
					$("input[name='facility_box1']:checked").each(function() {
						matches.push(this.value);
					});
					$("input[name='facility_box1']:not(:checked)").each(function() {
						matches1.push(this.value);
					});
					var i;
					
					for(i = 0; i < matches.length; ++i) {
						x=$("#facility_box"+matches[i]).val();
						if(matches[i] == x){
							$("#facility_box"+matches[i]).prop('checked', true);
						}
					}
					for(i = 0; i < matches1.length; ++i) {
						x=$("#facility_box"+matches1[i]).val();
						if(matches1[i] == x){
							$("#facility_box"+matches1[i]).prop('checked', false);
						}
					}
			
			
		$('#basic-modal-content').modal();
		return false;
	});
	/*$("#rating_btns ul li").click(function(){
		//alert('frgyh');
		filterSearch();
		loadData(1);
		
	});*/
	$('#basic-modal1 .basic1').click(function (e) {
					var matches = [];
					var matches1 = [];
					$("input[name='room_type1']:checked").each(function() {
						matches.push(this.value);
					});
					$("input[name='room_type1']:not(:checked)").each(function() {
						matches1.push(this.value);
					});
					var i;
					
					for(i = 0; i < matches.length; ++i) {
						x=$("#room_type"+matches[i]).val();
						if(matches[i] == x){
							$("#room_type"+matches[i]).prop('checked', true);
						}
					}
					for(i = 0; i < matches1.length; ++i) {
						x=$("#room_type"+matches1[i]).val();
						if(matches1[i] == x){
							$("#room_type"+matches1[i]).prop('checked', false);
						}
					}
			
			
		$('#basic-modal-content1').modal();
		return false;
	});
	$('#basic-modal2 .basic2').click(function (e) {
					var matches = [];
					var matches1 = [];
					$("input[name='near_by_location1']:checked").each(function() {
						matches.push(this.value);
					});
					$("input[name='near_by_location1']:not(:checked)").each(function() {
						matches1.push(this.value);
					});
					var i;
					
					for(i = 0; i < matches.length; ++i) {
						x=$("#near_by_location"+matches[i]).val();
						if(matches[i] == x){
							$("#near_by_location"+matches[i]).prop('checked', true);
						}
					}
					for(i = 0; i < matches1.length; ++i) {
						x=$("#near_by_location"+matches1[i]).val();
						if(matches1[i] == x){
							$("#near_by_location"+matches1[i]).prop('checked', false);
						}
					}
			
			
		$('#basic-modal-content2').modal();
		return false;
	});
	$('#basic-modal .basic').click(function (e) {
				$('#basic-modal-content').modal();
					return false;
				});
				
	$('#basic-modal1 .basic1').click(function (e) {
			$('#basic-modal-content1').modal();
			return false;
			});
	
	$('#basic-modal2 .basic2').click(function (e) {
			$('#basic-modal-content2').modal();
			return false;
			});		
			
	
	$('#facility_learner').click(function () {
		
		filterSearch();
		$('.modalCloseImg, .simplemodal-close').trigger('click');
		loadData(1);
	});
	$('#facility_learner1').click(function () {
		
		filterSearch();
		$('.modalCloseImg, .simplemodal-close').trigger('click');
		//loadData(1);
		
	});
	$('#facility_learner2').click(function () {
		
		filterSearch();
		$('.modalCloseImg, .simplemodal-close').trigger('click');
		//loadData(1);
	});
	
	$('#h_name').live("keypress",function () {
					//before_loads();                           
		//alert(this.id);
	 filterSearch('', this.id);
		//loadData(1);

	});
	$('.facility_box1').click(function(){
			filterSearch();
			//loadData(1);
		});
	$('.room_type1').click(function(){
			filterSearch();
			//loadData(1);
		});
	$('.near_by_location1').click(function(){
			//alert("sssssssss");
			filterSearch();
			//loadData(1);
		});
	
	$( "#slider-range" ).slider({
					range: true,
					min: 0,
					max: 0,
					values: [ 0, 0 ],
					slide: function( event, ui ) {
						$( "#amount" ).val( "Rs " + ui.values[ 0 ] + " - Rs " + ui.values[ 1 ] );
					}
				});
				$( "#amount" ).val( "USD " + $( "#slider-range" ).slider( "values", 0 ) +
					" - USD " + $( "#slider-range" ).slider( "values", 1 ) );
			
	function nextCall() {
			alert();
			<?php //echo $api_fs;?>
			var a = ['crs'];
			if(a!='') {
			$.ajax({
			  url:'<?php echo WEB_URL; ?>hotel/call_api',
			  data: 'a='+a,
			    beforeSend:function(){
					$('#loading').html('<div  style=" padding-top:22px;"  class="loading" ><img width="253" height="31" src="<?php echo WEB_DIR; ?>gui/slider/images/loading_bar_animated.gif" alt="Loading..." /><br><div class="bottom-header" style="padding-left:105px">Loading</div></div>');
				  },
			  success: function(data){
				 var data = eval('(' + data + ')');
					//alert(data);
					//alert(data.min_val)
					 var min_value = data.min_val;
				 
					
					//alert(data.total_result);
					
					
					$('#result_crs').html(data.hotel_search_result);
					$('#result_count').html(data.total_result);
					//alert(data.msg);
					 $(".pagination").ajaxComplete(function(event, request, settings)
                                    {
                                       // loading_hide();
                                        $(".pagination").html(data.msg);
                                            
                     });
					
					//loadData(1); 
						var minVal = data.min_val;
						var maxVal = data.max_val;
						//alert(minVal);
						//alert(maxVal);
					$( "#slider-range" ).slider({
					range: true,
					min: minVal,
					max: maxVal,
					values: [ minVal, maxVal ],
					slide: function( event, ui ) {
						
						var r = Math.round(ui.values[ 0 ]);
						var rr = Math.round(ui.values[ 1 ] );
						$( "#amount_dummy" ).val( " Rs" + ui.values[ 0 ] + "  to  RS " + ui.values[ 1 ] );
						$( "#amount" ).val( "Rs " + r + "  to  Rs " + rr );
					},
					  change: function( event, ui ) {
					  if (event.originalEvent) {
					  	filterSearch('price');
                      // loadData(1);  // For first time page load default results
                       
					  }
					}
				});	
				
			  
				
				
					
			  },
			   error:function(request, status, error){
			// failed request; give feedback to user
				$('#result_crs').html('<p class="error" style="padding:30px;text-align:center;"><strong>No records found!!!    Please try again in few moments...</strong></p>');
		 		 }
			});
			}
			}
			
	nextCall();
	//loadData(1);
			
	function filterSearch(matches,sorting){
				
				// alert(matches)
				var facility_pop = encodeURIComponent(matches); 
				// alert(facility_pop);
				
				if(matches!='')
				{
				$('.modalCloseImg, .simplemodal-close').trigger('click');
				}
				
			 	var minVal = $( "#slider-range" ).slider("values", 0 );
				var maxVal = $( "#slider-range" ).slider("values", 1 );	
				//alert(minVal);
				//alert(maxVal);
				
				var facilities=[];
				$("input[name='facility_box']:checked").each(function() {
					facilities.push(this.value);
				});
				
				
				var room_type=[];
				$("input[name='room_type']:checked").each(function() {
					room_type.push(this.value);
				});
				
				var star_rating = $("#rating_output").val();
				//alert(rating_output)
				
				var near_by_location=[];
				$("input[name='near_by_location']:checked").each(function() {
					near_by_location.push(this.value);
				});
				
				var room_type_id = encodeURIComponent(room_type); 
				var fac = encodeURIComponent(facilities); 
				var loc = encodeURIComponent(near_by_location); 
				
				
				
				//alert(room_type);
				var hotel_name_val = $("#h_name").val();
				//alert(hotel_name_val);
				var params = 'minVal='+minVal+'&maxVal='+maxVal+'&room_type_id='+room_type_id+'&fac='+fac+'&loc='+loc+'&hotel_name_val='+hotel_name_val+'&star_rating='+star_rating;
				
				// alert(matches)
				 //alert(params);
				
				
				$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/fetch_search_result_filter/',
				  data: params,
				  dataType: "json",
				 
				  success: function(data){
					 // alert('dfbsdj');
					if(data.hotel_search_result == false || data.hotel_search_result == null)
			  		{
				 		 $('#result_crs').html('<p class="error" style="padding:30px;text-align:center;"><strong>No records found!!!    Please try again in few moments...</strong></p>');
						 $('#result_count').html(0);
			  		}
					$('#result_crs').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					
					//alert(data.msg);
					 $(".pagination").ajaxComplete(function(event, request, settings)
                     {
                                       // loading_hide();
                         $(".pagination").html(data.msg);
                                            
                     });
					$("#result_count").html(data.total_result);
					
					},
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result_crs').html('<p class="error" style="padding:30px"><strong>No records found!!!    Please try again in few moments...</strong></p>');
				  }
				  
				});
			}
			
			
			 
			 

		});
		function loadData(page){
				 
				var minVal = $( "#slider-range" ).slider("values", 0 );
				var maxVal = $( "#slider-range" ).slider("values", 1 );	
				//alert(minVal);
				//alert(maxVal);
				
				var facilities=[];
				$("input[name='facility_box']:checked").each(function() {
					facilities.push(this.value);
				});
				
				
				var room_type=[];
				$("input[name='room_type']:checked").each(function() {
					room_type.push(this.value);
				});
				
				var near_by_location=[];
				$("input[name='near_by_location']:checked").each(function() {
					near_by_location.push(this.value);
				});
				
				var room_type_id = encodeURIComponent(room_type); 
				var fac = encodeURIComponent(facilities); 
				var loc = encodeURIComponent(near_by_location); 
				
				//alert(page);
				
				//alert(room_type);
				var hotel_name_val = $("#h_name").val();
				//alert(hotel_name_val);
				var star_rating = $("#rating_output").val();
				//alert(star_rating)
				var params = 'minVal='+minVal+'&maxVal='+maxVal+'&room_type_id='+room_type_id+'&fac='+fac+'&loc='+loc+'&hotel_name_val='+hotel_name_val+'&page='+page+'&star_rating='+star_rating;
				
				// alert(matches)
				 //alert(params);
				 $.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/pagination_call/',
				  data: params,
				  dataType: "json",
				 
				  success: function(data){
					  //alert(data.msg);
					  $(".pagination").ajaxComplete(function(event, request, settings)
                                    {
                                       // loading_hide();
                                        $(".pagination").html(data.msg);
                                            
                        });
					  
				},
				  error:function(request, status, error){
					//alert('sfreg');
					//$('#result_crs').html('<p class="error" style="padding:30px"><strong>No records found!!!    Please try again in few moments...</strong></p>');
				  }
				  
				});
				 
				 
				
		}
		function applyFacility()
		{
			var matches = [];
			var matches1 = [];
			$("input[name='facility_box1']:checked").each(function() {
				matches.push(this.value);
			});
			$("input[name='facility_box1']:not(:checked)").each(function() {
				matches1.push(this.value);
			});
			var i;
			
			for(i = 0; i < matches.length; ++i) {
				x=$("#facility_box"+matches[i]).val();
				if(matches[i] == x){
					$("#facility_box"+matches[i]).prop('checked', true);
				}
			}
			for(i = 0; i < matches1.length; ++i) {
				x=$("#facility_box"+matches1[i]).val();
				if(matches1[i] == x){
					$("#facility_box"+matches1[i]).prop('checked', false);
				}
			}
			return false;
			
		}
		function facilityApply()
		{
			var matches = [];
			var matches1 = [];
			$("input[name='facility_box']:checked").each(function() {
				matches.push(this.value);
			});
			$("input[name='facility_box']:not(:checked)").each(function() {
				matches1.push(this.value);
			});
			var i;
			
			for(i = 0; i < matches.length; ++i) {
				x=$("#facility_box1"+matches[i]).val();
				if(matches[i] == x){
					$("#facility_box1"+matches[i]).prop('checked', true);
				}
			}
			for(i = 0; i < matches1.length; ++i) {
				x=$("#facility_box1"+matches1[i]).val();
				if(matches1[i] == x){
					$("#facility_box1"+matches1[i]).prop('checked', false);
				}
			}
			return false;
			
		}
		function applyRoomType()
		{
			var matches = [];
			var matches1 = [];
			$("input[name='room_type1']:checked").each(function() {
				matches.push(this.value);
			});
			$("input[name='room_type1']:not(:checked)").each(function() {
				matches1.push(this.value);
			});
			var i;
			
			for(i = 0; i < matches.length; ++i) {
				x=$("#room_type"+matches[i]).val();
				if(matches[i] == x){
					$("#room_type"+matches[i]).prop('checked', true);
				}
			}
			for(i = 0; i < matches1.length; ++i) {
				x=$("#room_type"+matches1[i]).val();
				if(matches1[i] == x){
					$("#room_type"+matches1[i]).prop('checked', false);
				}
			}
			return false;
			
		}
		function roomTypeApply()
		{
			var matches = [];
			var matches1 = [];
			$("input[name='room_type']:checked").each(function() {
				matches.push(this.value);
			});
			$("input[name='room_type']:not(:checked)").each(function() {
				matches1.push(this.value);
			});
			var i;
			
			for(i = 0; i < matches.length; ++i) {
				x=$("#room_type1"+matches[i]).val();
				if(matches[i] == x){
					$("#room_type1"+matches[i]).prop('checked', true);
				}
			}
			for(i = 0; i < matches1.length; ++i) {
				x=$("#room_type1"+matches1[i]).val();
				if(matches1[i] == x){
					$("#room_type1"+matches1[i]).prop('checked', false);
				}
			}
			return false;
			
		}
		function ApplyNearLocation()
		{
			var matches = [];
			var matches1 = [];
			$("input[name='near_by_location1']:checked").each(function() {
				matches.push(this.value);
			});
			$("input[name='near_by_location1']:not(:checked)").each(function() {
				matches1.push(this.value);
			});
			var i;
			
			for(i = 0; i < matches.length; ++i) {
				x=$("#near_by_location"+matches[i]).val();
				if(matches[i] == x){
					$("#near_by_location"+matches[i]).prop('checked', true);
				}
			}
			for(i = 0; i < matches1.length; ++i) {
				x=$("#near_by_location"+matches1[i]).val();
				if(matches1[i] == x){
					$("#near_by_location"+matches1[i]).prop('checked', false);
				}
			}
			return false;
			
		}
		function NearLocationApply()
		{
			var matches = [];
			var matches1 = [];
			$("input[name='near_by_location']:checked").each(function() {
				matches.push(this.value);
			});
			$("input[name='near_by_location']:not(:checked)").each(function() {
				matches1.push(this.value);
			});
			var i;
			
			for(i = 0; i < matches.length; ++i) {
				x=$("#near_by_location1"+matches[i]).val();
				if(matches[i] == x){
					$("#near_by_location1"+matches[i]).prop('checked', true);
				}
			}
			for(i = 0; i < matches1.length; ++i) {
				x=$("#near_by_location1"+matches1[i]).val();
				if(matches1[i] == x){
					$("#near_by_location1"+matches1[i]).prop('checked', false);
				}
			}
			return false;
			
		}
		 function rrr1(id)
         {
				
         	/*$('#result').html("<div style='background-color:#FFF; clear:both;' align='middle'><img src='<?php echo WEB_DIR ?>gui/images/loading.gif'/></diV>").fadeIn('fast');*/
				
        		var minVal = $( "#slider-range" ).slider("values", 0 );
				var maxVal = $( "#slider-range" ).slider("values", 1 );	
				//alert(minVal);
				//alert(maxVal);
				
				var facilities=[];
				$("input[name='facility_box']:checked").each(function() {
					facilities.push(this.value);
				});
				
				
				var room_type=[];
				$("input[name='room_type']:checked").each(function() {
					room_type.push(this.value);
				});
				
				var near_by_location=[];
				$("input[name='near_by_location']:checked").each(function() {
					near_by_location.push(this.value);
				});
				
				var room_type_id = encodeURIComponent(room_type); 
				var fac = encodeURIComponent(facilities); 
				var loc = encodeURIComponent(near_by_location); 
				
				//alert(page);
				
				//alert(room_type);
				var hotel_name_val = $("#h_name").val();
				//alert(hotel_name_val);
				
				var star_rating = $("#rating_output").val();
				//alert(rating_output)
				var params = '&id='+id+'&minVal='+minVal+'&maxVal='+maxVal+'&room_type_id='+room_type_id+'&fac='+fac+'&loc='+loc+'&hotel_name_val='+hotel_name_val+'&star_rating='+star_rating;
				
				//alert(params);
				 $.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/all_filter_new1/',
				  data: params,
				  dataType: "json",
				 success: function(data){
					//alert(data.hotel_search_result);
					
					$('#result_crs').html(data.hotel_search_result);
					$(".pagination").ajaxComplete(function(event, request, settings)
					{
						$(".pagination").html(data.msg);
					});
					  
					},
				  error:function(request, status, error){
					//alert('sfreg');
					//$('#result_crs').html('<p class="error" style="padding:30px"><strong>No records found!!!    Please try again in few moments...</strong></p>');
				  }
				  
				});
				
				//alert(params);
				//xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1?"+params,true);
        	//xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1/"+id,true);
       			// xmlhttp.send(); //ddd
        
        
        }	 
		
 
                        
 </script>    
 
                 
                     
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
		 /*  var selectedDate = $(this).datepicker('getDate');
		   var nextdayDate  = dateADD(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker1" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: $t
					});
		   $( "#datepicker1" ).val($t);
		   $('#datepicker1').datepicker('option', 'minDate', $t);*/

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
 

	
	<link href="<?php echo WEB_DIR; ?>css/screen.css" rel="stylesheet" type="text/css" media="screen" />
<!-- slider -->

   <!--long slider-->
  <link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>lib/jquery.ad-gallery.css">

  <script type="text/javascript" src="<?php echo WEB_DIR; ?>lib/jquery.ad-gallery.js"></script>
  
  <style type="text/css">
#gallery {
    padding: 30px;
    background: none repeat scroll 0 0 #F6F7F7;
  }
  </style>
    <!--long slider-->
  <!--Hot Deals slider-->
  
	<script type="text/javascript" language="javascript" src="<?php echo WEB_DIR; ?>js/jquery.carouFredSel-6.2.0-packed.js"></script>
	<script type="text/javascript" language="javascript">
			$(function() {
				//	Variable number of visible items with variable sizes
				$('#foo3').carouFredSel({
					height: 'auto',
					prev: '#prev3',
					next: '#next3',
					auto: false
				});
		});
		</script>

		<style type="text/css" media="all">
	 	.tabs ul li a{background:#D3D3D3;}
		
		</style>
<!--Hot Deals slider-->


	<!-- share -->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-962b2803-63b9-42a7-14dd-b693b43b95fa", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

	<!-- /Header -->
	<div class="clear"></div>
	<!--banner Slider -->
    <div class="bannerbg">
		  <div class="container clearfix">
         </div>
	</div>
	<!-- /Slider -->
	<!-- Content -->
	  <div class="container">
	
			<div class="clear padding20"></div>
			  	<!-- Content left start-->
              <form  name="leftfilter"  id="hotels-results-form">
			  <div class="col_1_4" style="width:240px"> 	<!-- main left start-->
			 
			 <p class="left_h1"><span class="left_h1_text"><img class="left_h1_eye" src="<?php echo WEB_DIR; ?>images/listing/eye.png" />Explore & View Amritsar</span></p>
			
		
   <div  class="col_1_4" style="width:240px">
			<div class="title_div1"  style="margin-top: 6px; position: relative;">
         
			<span style=" color: #660099;
    font-family: Tahoma,Regular;
    font-size: 13pt;
    padding-left: 13px;"><img src="<?php echo WEB_DIR; ?>images/listing/small_icon.png" style="padding-right:5px;">Refine your Search</span>	
</div>
		<div style="padding-left:5px;padding-right: 5px;padding-right:5px;line-height: 10pt;">
		<div style="color: #660099;
    float: left;
    font-family: Arial,Ragular;
    font-size: 10pt;">Price</div><div style="float:right"><img src="<?php echo WEB_DIR; ?>images/listing/i.png"></div> <br/> <br/>
		<div style="  float: left;
    font-family: Arial,Regular;
    font-size: 10pt;"><input type="text" id="amount_dummy" style="border:0; color:#999;    width: 207px; text-align:center;"  />
     <input type="hidden" id="amount" style="border:0; color:#f6931f; font-weight:bold; width: 228px;" /> 
    </div> 
    <div id="slider-range">
	<!--<img width="207px" src="<?php echo WEB_DIR; ?>images/listing/2_slider.png">-->
    </div>
		<br/><hr>
		</div>
		
		<div style="padding-left:5px;padding-right: 5px;padding-right:5px;line-height: 10pt;">
		<div style="color: #660099;float: left;font-family: Arial,Ragular; font-size: 10pt;">Room Type</div>
        <div style="float:right">
         <span id='basic-modal1'><a href='#' class='basic1'><img style="padding-right:5px" src="<?php echo WEB_DIR; ?>images/listing/more1.png"></a></span>
	<!-- modal content -->
		<div id="basic-modal-content1" style="display:none;">
			<div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
					
					<div class="clear"></div>
					<div class="bordered_box">
						
						<span style="font-size: 15pt; margin-left: 15px; position: relative;top: 11px;color:#660099">Room Type</span>
							<div class="content_text" ><p>
                             <?php  $cate = $this->Hotel_Model->get_global_cate_type();
								if($cate !='') {
									for($i=0;$i<count($cate);$i++)
									{
						 	?>
							<div style="  padding-bottom: 5px;width: 253px;float:left;padding-right:10px;">
                            <span style="float:left">
                            <input type="checkbox" name="room_type" class="room_type"  id="room_type<?php echo $cate[$i]->global_room_category_type_id; ?>" value="<?php echo $cate[$i]->global_room_category_type_id; ?>" onClick="roomTypeApply();"><?php echo  $cate[$i]->category_type; ?> 
                            </span> 
							<span style=" background: none repeat scroll 0 0 lightgray; border-radius: 7px 7px 7px 7px; float: right; padding: 3px 11px;">42</span> 
                            </div>
							<?php  } } ?>
							</p><br>
</div>
<div style="clear:both;"></div>
							<div style="float:right"><input type="button" class="search_button" id="facility_learner1" name="" value="Submit" ><!--<a style="padding: 5px 13px;"  href="#">
<span style="color:white">Search</span>-->
</a>
<a style="padding: 5px 13px;" class="search_button" href="#">
<span style="color:white" class="modalCloseImg simplemodal-close"> Cancel</span>
</a></div>
						</div>
                        	<div id="tabs-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
					</div>
				</div>
		</div>
		<div style='display:none'>
			<img src='<?php echo WEB_DIR; ?>img/basic/x.png' alt='' />
		</div>
        <img src="<?php echo WEB_DIR; ?>images/listing/i.png"></div> <br/> <br/>
    	<div id="hotel_room_cate_type">
		<div style="  float: left;font-family: Arial,Regular;font-size: 8pt; line-height:27px;">
        <?php  $cate = $this->Hotel_Model->get_global_cate_type();
				if($cate !='') {
					for($i=0;$i<3;$i++)
					{
		 ?>
        <input type="checkbox" name="room_type1" class="room_type1"  id="room_type1<?php echo $cate[$i]->global_room_category_type_id; ?>" value="<?php echo $cate[$i]->global_room_category_type_id; ?>" onClick="applyRoomType();" ><?php echo $cate[$i]->category_type; ?>
        <span style="color:#0099cc">(42)</span>
        <?php  } } ?></div>
        </div>
	<!--<div style="float:left;font-family: Arial,Regular;font-size: 8pt;"><input type="checkbox" name="">Double <span style="color:#0099cc">(21)</span></div>
	<div style="float:left;font-family: Arial,Regular;font-size: 8pt;   padding-bottom: 11px;"><input type="checkbox" name="">Suite  <span style="color:#0099cc">(85)</span></div>--> 
		<br/><hr>
		</div>
		
		
		<div style="padding-left:5px;padding-right: 5px;padding-right:5px;line-height: 10pt;">
		<div style="color:#660099; float:left; font-family: Arial,Ragular; font-size: 10pt;">Amenities</div>
    	<div style="float:right">
        <span id='basic-modal'><a href='#' class='basic'><img style="padding-right:5px" src="<?php echo WEB_DIR; ?>images/listing/more1.png"></a></span>
	<!-- modal content -->
		<div id="basic-modal-content">
			<div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
					
					<div class="clear"></div>
					<div class="bordered_box">
						
						<span style="font-size: 15pt; margin-left: 15px; position: relative;top: 11px;color:#660099">Amenities</span>
							<div class="content_text" ><p>
                            <?php  $amenity = $this->Hotel_Model->get_global_amenities_list();
								if($amenity !='') {
								// echo '<pre>';print_r($amenity); echo '</pre>';
								for($i=0;$i<count($amenity);$i++)
								{
						
							 ?>	
							<div style="  padding-bottom: 5px;width: 253px;float:left;padding-right:10px;">
                            <span style="float:left">
                            <input type="checkbox" name="facility_box" class="facility_box"  id="facility_box<?php echo $amenity[$i]->amenity_list_id; ?>" value="<?php echo $amenity[$i]->amenity_list_id; ?>" onClick="facilityApply();"><?php echo  $amenity[$i]->amenity_name; ?> 
                            </span> 
							<span style=" background: none repeat scroll 0 0 lightgray; border-radius: 7px 7px 7px 7px; float: right; padding: 3px 11px;">992</span> 
                            </div>
							<?php } } ?>
							</p><br>
</div>
<div style="clear:both;"></div>
							<div style="float:right"><input type="button" class="search_button" id="facility_learner" name="" value="Submit" ><!--<a style="padding: 5px 13px;"  href="#">
<span style="color:white">Search</span>-->
</a>
<a style="padding: 5px 13px;" class="search_button" href="#">
<span style="color:white" class="modalCloseImg simplemodal-close"> Cancel</span>
</a></div>
						</div>
                        	<div id="tabs-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
					</div>
				</div>
		</div>
		<div style='display:none'>
			<img src='<?php echo WEB_DIR; ?>img/basic/x.png' alt='' />
		</div>
	<img src="<?php echo WEB_DIR; ?>images/listing/i.png"></div> <br/> <br/>
		<div style="   padding-bottom: 11px;  width: 230px;  font-family: Arial,Regular;font-size: 10pt;">
      <div id="hotel_facility">
	<?php  $amenity = $this->Hotel_Model->get_global_amenities_list();
				if($amenity !='') {
					for($i=0;$i<=2;$i++)
					{
		 ?>	
     <div style="    float: left;
    padding-bottom: 5px;
    width: 230px;"><span style="float:left">
    <input type="checkbox" name="facility_box1"  id="facility_box1<?php echo $amenity[$i]->amenity_list_id; ?>" class="facility_box1" value="<?php echo $amenity[$i]->amenity_list_id; ?>" onClick="applyFacility();"> 
	<?php echo $amenity[$i]->amenity_name; ?></span> <span style="background:none repeat scroll 0 0 lightgray;
    border-radius: 7px 7px 7px 7px;
    float: right;
    padding: 3px 11px;">992</span>
    </div> 
    <?php }} ?>
    </div>
	
	 
		</div> 
		<br/><hr>
		</div>
		
		
		
		<div style="padding-left:5px;padding-right: 5px;padding-right:5px;line-height: 10pt;" id="hotel_name">
        
		<div style="color: #660099; float: left;padding-bottom: 11px; font-family: Arial,Regular; font-size: 10pt;">Hotel Name</div>
        <div style="float:right">
        </div> <br/> <br/>
		<div style="padding-bottom: 11px; float: left;font-family: Arial,Regular;font-size: 10pt;">
		<input type="text" name="h_name"  id="h_name"  placeholder="Search hotel name" ><img style="height: 28px;
    position: relative;
    top: 8px;" src="<?php echo WEB_DIR; ?>images/listing/s.png">
		</div> 
		<br /><hr>
		</div>

		<div style="padding-left:5px;padding-right: 5px;padding-right:5px;line-height: 10pt;">
		<div style="color: #660099;float: left;padding-bottom: 11px;font-family: Arial,Regular;font-size: 10pt;">Customer Rating</div>
		<div style="float:right"><img src="<?php echo WEB_DIR; ?>images/listing/i.png"></div> <br/> <br/>
		<div id="tdabs-4" class="ui-tabs-panel ui-widget-conddtent ui-cofgrner-bottom ui-tabs-hide" style="">
		<script src='<?php echo WEB_DIR; ?>js/star_rating.js' type="text/javascript" language="javascript"></script>
		<link href='<?php echo WEB_DIR; ?>css/jquery.rating.css' type="text/css" rel="stylesheet"/>
			<div id="rating_cont">		
				<div id="rating_btns">
				
					<ul>
						<li>0</li>
						<li>0.5</li>
						<li>1.0</li>
						<li>1.5</li>
						<li>2.0</li>
						<li>2.5</li>
						<li>3.0</li>
						<li>3.5</li>
						<li>4.0</li>
						<li>4.5</li>
						<li>5.0</li>
					</ul>
				</div>	
				<div id="rating_on" >&nbsp;</div>
				<div id="rated">
					<div id="rating" style="height:17px; line-height: 17px;">not rated</div>
					<div> - &nbsp;</div>
					<div id="small_stars">&nbsp;</div>

				</div>		
			</div>
			<input type="hidden" id="rating_output" name="rating_output" value="" />
			<hr><br />
		</div>
	
		<script type='text/javascript'>
		$(document).ready(function(){
		
			$("#rating_btns ul li").click(function(){
					// alert(matches)
					
				var star_rating		= $("#rating_output").val();
					// alert(star_rating);
				
			 	var minVal = $( "#slider-range" ).slider("values", 0 );
				var maxVal = $( "#slider-range" ).slider("values", 1 );	
				//alert(minVal);
				//alert(maxVal);
				
				var facilities=[];
				$("input[name='facility_box']:checked").each(function() {
					facilities.push(this.value);
				});
				
				
				var room_type=[];
				$("input[name='room_type']:checked").each(function() {
					room_type.push(this.value);
				});
				
				var near_by_location=[];
				$("input[name='near_by_location']:checked").each(function() {
					near_by_location.push(this.value);
				});
				
				var room_type_id = encodeURIComponent(room_type); 
				var fac = encodeURIComponent(facilities); 
				var loc = encodeURIComponent(near_by_location); 
				
				
				
				//alert(room_type);
				var hotel_name_val = $("#h_name").val();
				//alert(hotel_name_val);
				var star_rating		= $("#rating_output").val();
					// alert(star_rating);
					
				var params = 'minVal='+minVal+'&maxVal='+maxVal+'&room_type_id='+room_type_id+'&fac='+fac+'&loc='+loc+'&hotel_name_val='+hotel_name_val+'&star_rating='+star_rating;
				//alert(params);
					$.ajax({
					  url:'<?php echo WEB_URL; ?>hotel/fetch_search_result_filter/',
					  data: params,
					  dataType: "json",
					 
					  success: function(data){
							if(data.hotel_search_result == false || data.hotel_search_result == null)
							{
								 $('#result_crs').html('<p class="error" style="padding:30px;text-align:center;"><strong>No records found!!!Please try again in few moments...</strong></p>');
								 $('#result_count').html(0);
							}
							$('#result_crs').html(data.hotel_search_result);
							 $(".pagination").ajaxComplete(function(event, request, settings)
                              {
                                  $(".pagination").html(data.msg);
                              });
							
							$("#result_count").html(data.total_result);
							
						},
						error:function(request, status, error){
							// failed request; give feedback to user
							$('#result_crs').html('<p class="error" style="padding:30px"><strong>No records found!!!    Please try again in few moments...</strong></p>');
						}
					  
					});
					
			});
			
			
			
		});


		</script>
		</div>
		
		<div style="padding-left:5px;padding-right: 5px;padding-right:5px;line-height: 10pt;" id="relative_location">
		<div style="color: #660099;float: left;font-family: Arial,Ragular;font-size: 10pt;">Relative Location</div>
        <div style="float:right">
        
         <span id='basic-modal2'><a href='#' class='basic2'><img style="padding-right:5px" src="<?php echo WEB_DIR; ?>images/listing/more1.png"></a></span><img src="images/listing/i.png"></div> <br/> <br/>
         
         <!-- modal content -->
		<div id="basic-modal-content2" style="display:none;">
			<div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
					
					<div class="clear"></div>
					<div class="bordered_box">
						
						<span style="font-size: 15pt; margin-left: 15px; position: relative;top: 11px;color:#660099">Amenities</span>
							<div class="content_text" ><p>
                            <?php  $amenity = $this->Hotel_Model->get_global_location_list();
									if($amenity !='') {
									for($i=0;$i<count($amenity);$i++)
									{
						
							 ?>	
							<div style="  padding-bottom: 5px;width: 253px;float:left;padding-right:10px;">
                            <span style="float:left">
                            <input type="checkbox" name="near_by_location" class="near_by_location"  id="near_by_location<?php echo $amenity[$i]->global_near_by_location_id; ?>" value="<?php echo $amenity[$i]->global_near_by_location_id; ?>"  onClick="NearLocationApply();"><?php echo  $amenity[$i]->location_name; ?> 
                            </span> 
							<span style=" background: none repeat scroll 0 0 lightgray; border-radius: 7px 7px 7px 7px; float: right; padding: 3px 11px;">992</span> 
                            </div>
							<?php } } ?>
							</p><br>
</div>
<div style="clear:both;"></div>
							<div style="float:right"><input type="button" class="search_button" id="facility_learner2" name="" value="Submit" ><!--<a style="padding: 5px 13px;"  href="#">
<span style="color:white">Search</span>-->
</a>
<a style="padding: 5px 13px;" class="search_button" href="#">
<span style="color:white" class="modalCloseImg simplemodal-close"> Cancel</span>
</a></div>
						</div>
                        	<div id="tabs-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
					</div>
				</div>
		</div>
		<div style='display:none'>
			<img src='<?php echo WEB_DIR; ?>img/basic/x.png' alt='' />
		</div>
    	<?php  $amenity = $this->Hotel_Model->get_global_location_list();
				if($amenity !='') {
					for($i=0;$i<=2;$i++)
					{
						
		 ?>	
		<div style="float: left;font-family: Arial,Regular;font-size: 10pt;">
        <input type="checkbox" name="near_by_location1"  class="near_by_location1" onClick="ApplyNearLocation();"  value="<?php echo $amenity[$i]->global_near_by_location_id; ?>" id="near_by_location1<?php echo $amenity[$i]->global_near_by_location_id; ?>"><?php echo $amenity[$i]->location_name; ?> 
        </div>
        <?php }} ?>
	
		<br/><hr>
		</div>
			
        </div>  
		
			
			
			  </div><!-- main left end-->
              
              </form>
			
			<!-- Content left end-->	
				
		
	
	<!-- Content right start-->
	  <div class="col_3_4 last">
      		<form action="<?php echo WEB_URL; ?>hotel/search" name="search_form1" method="post" autoComplete ="off">
	 		<div class="search_right_div" style=" margin-bottom: 6px;">
				<span class="col_1_5" style="float:left ;padding-right: 10px;  margin: auto; width: auto;"><br />
                <input type="hidden" name="search_form" value="search_form1" />
                <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px; z-index:99999; position:absolute;" disabled="disabled"  />
				
                <input  type="text" class="text1_lesting" name="city_name" id="testinput" value="<?php echo $_SESSION['city_name'] ?>" required ></span>
				<span class="col_1_5" style="float:left;  margin: auto;
    width: auto;">Check in<br /><input type="text" name="sd" id="sdate" value="<?php echo $_SESSION['sd'] ?>" class="text2_lesting" required></span>
				<span style="float:left;  margin: auto;
    width: auto;" class="col_1_5">Rooms<br /><select class="select1_lesting" name="no_of_rooms" required >
    											<?php for($i=1; $i<10;$i++) {?>
    											<option value="<?php echo $i; ?>"<?php if($_SESSION['no_of_rooms']==$i) echo "selected='selected'";?>><?php echo $i; ?></option>
                                                <?php } ?>
                                                </select>
                                                </span>
                 <script type="text/javascript">

	var options = {
	script:"<?php print WEB_DIR; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
	var as_json = new AutoSuggest('testinput', options);

</script> 
				<span style="float:left;  margin: auto;
    width: auto;" class="col_1_5">Check out<br /><input type="text"  id="edate" name="ed"  value="<?php echo $_SESSION['ed'] ?>" class="text3_lesting" required></span>
				<span style="float:none;color:white;" class="col_1_5 last"><input type="submit" name="" value="Submit"  class="search_button1"/></span>
			</div> 
            </form>
	  <!-- Title start-->
            <div class="title_div1">
            <div class="col_1_4" style="text-align:center">
			<span style="font-family:Arial, Regular;font-size:10pt;">Sort By:</span><select><option>Recommended</option></select>			
			</div>
            
            
            
        <div class="col_1_4" style="text-align:center;font-family:Arial, Regular;font-size:10pt;">
			<span  id="result_count"></span>&nbsp;Results found</span>
        </div> 
        <div class="col_1_4 last" style="text-align:center">
			<span style="color: #99CC00;font-family: Arial,Regular;font-size: 11pt;">Share Results</span>
			</div></div>
               <!-- Title end-->	
               <div class="clear padding60"></div>
           <!-- img + content + cost start-->
           
          
		
       <div class="col_3_4 last" id="result_crs">
        <div style="padding-left:325px; padding-top:55px" >
			<img src="<?php echo WEB_DIR ?>gui/images/loading.gif" />
		</div>
      	
        </div>
        <!-- img + content + cost start-->
		<div class="clear padding20"></div>
		<!--  <div class="pages">
				<a class="prev" href="#">&nbsp;</a>
				<a href="#">1</a>
				<a class="selected" href="#">2</a>
				<a href="#">3</a>
				<a href="#">...</a>
				<a href="#">10</a>
				<a class="next" href="#">&nbsp;</a>
			</div>-->
       <div class="nextpage"><div class="pagination" style="line-height:17px; margin-top:-5px; ">
             <div class="data"></div>
				
			</div></div>
     </div>
     <div></div>
     <div class="contents" id="result" >
			<div class="loading_gif">
			<!--<img src="<?php echo WEB_DIR ?>gui/images/loading.gif" />-->
			</div>
	  </div>
        <div style="display:none" id="noresult">
       <div class="" style=" float:left; padding-left:5px"> 
  <div style="background-attachment: scroll;
  font-family:Maian;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
clear: right;
color: #555;
display: block;

font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 110px;
line-height: 16px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
overflow-x: hidden;
overflow-y: hidden;
padding-bottom: 10px;
padding-left: 10px;
padding-right: 0px;
padding-top: 10px;
position: relative;
width: 699px;">
  <div style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
color: #555;
display: block;

font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 116px;
line-height: 16px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
padding-bottom: 0px;
padding-left: 0px;
padding-right: 0px;
padding-top: 0px;
width: 691px;">
    <div style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
border-bottom-color: #BFBFBF;
border-bottom-style: solid;
border-bottom-width: 1px;
border-left-color: #BFBFBF;
border-left-style: solid;
border-left-width: 1px;
border-right-color: #BFBFBF;
border-right-style: solid;
border-right-width: 1px;
border-top-color: #BFBFBF;
border-top-style: solid;
border-top-width: 1px;
color: #555;
display: block;

font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 100px;

line-height: 16px;
margin-bottom: 10px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
padding-bottom: 1px;
padding-left: 1px;
text-align:center;
padding-right: 1px;
padding-top: 5px;
width: 691px;">
  <table width="100%">
    <tbody>
      <tr>
       
        <td align="left"  style="font-size:16px;">
          <strong style="color:#F00;">No records found!!!    Please try again in few moments</strong></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr><td align="left"><div>
      <strong>What now? Call us and we'll help you find a hotel:</strong>
     <br />
          Speak to a ezeerooms.com travel specialist: <strong>257 88 777 (India Toll Free) +91 124 487 3878 (From abroad)</strong>,&nbsp;24 Hours,&nbsp;toll free
        
    </div>
    </td></tr>
    </tbody>
  </table>
</div>
  </div>
  <div class="paginationContainerBottom notVisible">
    <div class="paginationContainerBottom notVisible">
      </div>
  </div>
  <div class="notificationMsg">
    <p id="disclaimer">
      </p>
    </div>
</div><br /></div>
        </div>
        
  
 
        
			
		<!-- pagination end-->
			<div class="clear padding20"></div>
		</div><!-- Content right end-->
	</div><!-- container end-->


	
		
	

      <?php $this->load->view('footer'); ?>
<script type='text/javascript' src='<?php  echo WEB_DIR; ?>js/jquery.simplemodal.js'></script>

   <style type="text/css">
                  
                    .pagination ul li.inactive,
                    .pagination ul li.inactive:hover{
                      /*  background-color:#ededed;
                        color:#bababa;
                        border:1px solid #bababa;
                        cursor: default;*/
                    }
                     .data ul li{
                        list-style: none;
                        font-family: verdana;
                        margin: 5px 0 5px 0;
                        color: #000;
                        font-size: 15px;
                    }
        
                    .pagination{
                        width: 332px;
                        height: 25px;
                    }
                    .pagination ul li{
                       
            color: #333;
            float: left;
            font-family: arial;
            font-size: 9px;
            font-weight: bold;
            list-style: none outside none;
            
            padding: 4px;
                    }
                    .pagination ul li:hover{
                        color: #fff;
                        background-color: #333399;
                        cursor: pointer;
                    }
                    .go_button
                    {
                    background-color:#333399;border:1px solid #333399;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
                    }
                    .total
                    {
                    float:right;font-family:arial;color:#999;
                    }
        
                </style> 