<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Hotel extends CI_Controller {

	public function __construct()
    {   
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
	  	$this->load->database(); 
		$this->load->library("pagination");
		$this->load->model('Hotel_Model');
		$this->load->model('index_model');
		if(!isset($_SESSION['ses_id']))
		{
			$sec_res = session_id();
	    	$_SESSION['ses_id'] = $sec_res;
			redirect('hotel/index','refresh');
		}

	}
	
	public function index()
	{
	    //print'<pre/>';print_r($_SESSION);exit;
		$_SESSION['fav_hotel_detail_new']='';
		$_SESSION['fav_hotel']='';
		$_SESSION['hashing_villa']='';
		$sec_res = session_id();
	    $_SESSION['ses_id'] = $sec_res;
		$this->load->view('home_index');
	}
	
	public function hotel_details($hote_id){
		$data['HotelDetails'] =  $this->Hotel_Model->GetHotelDetails($hote_id);
		$data['room_details'] =  $this->Hotel_Model->GetRoomDetails($hote_id);
		$data['photos'] = $this->Hotel_Model->GetHotelImages($hote_id);
		$data['facilities'] = $this->Hotel_Model->GetHotelFacilities($hote_id);
		$this->load->view('hotel/hotel_details',$data);
	}
	
	public function search_city()
	{
		$q = strtolower($_GET["q"]);

		if (!$q) return; //get term parameter sent via text field. Not sure how secure get() is

        $this->db->select('city_name,global_cities.id as city_id');
        $this->db->from('global_cities');
		$this->db->join('global_regions', 'global_cities.reg_id = global_regions.id');
        $this->db->like('city_name', $username);
        $this->db->limit('5');
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
		
		$items=array();
		

        if ($query->num_rows() > 0)
        {
            $data['response'] = 'true'; //If username exists set true
            $data['message'] = array();

            foreach ($query->result() as $row)
            {
                $data['message'][] = array(
                    'label' => $row->city_name,
                    'value' => $row->city_id
                );
            }
        }
        else
        {
            $data['response'] = 'false'; //Set false if user not valid
        }

        echo json_encode($data);


	}
	function get_supplier_details()
	{
		 // $city_name;
		$x	= $_REQUEST['x'];
		
		$city = explode(',',$x);
		$city_name_new =$city[0];
		//echo $city_name_new;exit;
		
		
		//print'<pre/>';print_r($sup_name);exit;
			 
		//$this->load->view('admin/new_orders',$name);
		
		echo  '<select  name="supplier_type"  id="supplier_id"  class="text2_slider" onChange="get_check_details();" required>
                  <option value="" >What would you like to do?</option>';
				   echo  '<option class="option_select" value="1">Hotels & Resorts in '.$city_name_new.'</option>';
				    echo  '<option class="option_select" value="2">Villas & Apartments in '.$city_name_new.'</option>';
					 echo  '<option  class="option_select" value="3">Car Rental in'.$city_name_new.'</option>';
					  echo  '<option class="option_select"  value="4">Explore&nbsp;'.$city_name_new.'</option>';
					   echo  '<option class="option_select"  value="5">Activities'.$city_name_new.'</option>';
                   
           echo  '</select>';
		   // exit;
		
		
		
		
	}
	public function call_api()
	{
		$api= $_REQUEST['a'];
		//echo $api;exit;
		
		//echo 'gfd'.$_SESSION['hashing_activate'];exit;
		if($_SESSION['hashing_activate']!=1)
		{
		//s	print_r($api);exit;	
		$apiarray = array();
		
		switch ($api)
		 {
			 	case 'crs':
			    $this->crs_hotel_availabilty();
				break;
				
				
				default:
				echo '';
		}
		}
		$this->fetch_search_result();
	

	}
	public function search()
	{
		
		$_SESSION['hotel_name']='';
		$_SESSION['fav_hotel']='';
		$_SESSION['fav_hotel_detail_new']='';
		
		
		if(isset($_POST['search']) && $_POST['search']!='')
		{
			$this->form_validation->set_rules('city_name', 'City Name', 'required');
			$this->form_validation->set_rules('sd', 'CheckIn', 'required');
			$this->form_validation->set_rules('ed', 'CheckOut', 'required');
			$this->form_validation->set_rules('no_of_rooms', 'Rooms', 'required');
		
			if($this->form_validation->run()==FALSE)
			{
				redirect('hotel/index','refresh');
			}
		} else if(isset($_POST['search_form']) && $_POST['search_form']!='')
		{
			$this->form_validation->set_rules('city_name', 'City Name', 'required');
			$this->form_validation->set_rules('sd', 'CheckIn', 'required');
			$this->form_validation->set_rules('ed', 'CheckOut', 'required');
			$this->form_validation->set_rules('no_of_rooms', 'Rooms', 'required');
			if($this->form_validation->run()==FALSE)
			{
   				$this->load->view('hotel/search');
			}
		} 

		 $city_name = $this->input->post('city_name');
		 $supplier_type = $this->input->post('supplier_type');
		 $sd = $this->input->post('sd');
		 $ed = $this->input->post('ed');
		 $no_of_rooms = $this->input->post('no_of_rooms');
		 
		$city = explode(',',$city_name);
		$city_name_new =$city[0];
		$cityVal = $this->Hotel_Model->get_city_code($city_name_new);
		if(isset($cityVal))
		{
		
			$_SESSION['supplier_type'] = $supplier_type;
			$_SESSION['city_name']= $city_name;
			$_SESSION['city'] = $cityVal;
			$_SESSION['sd'] = $sd;
			$_SESSION['ed'] = $ed ;
			$_SESSION['no_of_rooms'] = $no_of_rooms;
		
			$diff = strtotime($ed) - strtotime($sd);
			$sec   = $diff % 60;
			$diff  = intval($diff / 60);
			$min   = $diff % 60;
			$diff  = intval($diff / 60);
			$hours = $diff % 24;
			$days  = intval($diff / 24);
			$_SESSION['days']=$days;
			
			$data['hotels'] = $this->Hotel_Model->SearchResult($cityVal,$sd,$ed,$no_of_rooms);
			//print_r($data['hotels']);
			$this->load->view('hotel/search_result',$data);
			
		} else {
			
			$this->load->view('home_index');
		}
 
		
		
	}
	public function crs_hotel_availabilty()
 	{
		$where ='';
		$no_of_rooms=$_SESSION['no_of_rooms'];
		$city_name=$_SESSION['city_name'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$ed=$_SESSION['ed'];
		$supplier_type=$_SESSION['supplier_type'];
		$cinval = explode("-",$sd);
		$cin = $cinval[2].'-'.$cinval[1].'-'.$cinval[0];
		$coutval = explode("-",$ed);
		$cout = $coutval[2].'-'.$coutval[1].'-'.$coutval[0];
		$days_cnt 		= floor(abs(strtotime($cin) - strtotime($cout)) / (60 * 60 * 24));
		//echo $days_cnt;exit;
		$present_day	= date('Y-m-d');
		
		
		$where .=" AND sh.city_name ='".$_SESSION['city']."'";	
			
		$where .=" AND mm.date >='".$cin."' AND mm.date <'".$cout."'";
		/*$where .=" AND mm.date BETWEEN '".$cin."' AND '".$cout."'";*/	
		
		$select ="SELECT count(*) as value, mm.sup_room_maintain_month_id, mm.avilable_rooms, mm.sup_room_details_id, mm.sup_hotel_id, mm.final_price as cost_val, mm.markup,
		 mm.discount_rule, mm.status, mm.selling_price , AVG(mm.selling_price) as sell_pri,sh.city_name, sh.sup_hotel_id,sh.hotel_name,srt.global_room_category_type_id, srt.room_name, srt.room_desc,  srt.no_of_adults, srt.no_of_childs, srt.global_room_category_type_id as srt_rate_tactis_id, sct.category_type,shr.check_markup,shr.check_discount,shr.sup_hotel_room_period_details_id
							FROM sup_room_maintain_month mm 
							INNER JOIN sup_hotels sh ON mm.sup_hotel_id = sh.sup_hotel_id
							INNER JOIN sup_hotel_room_details srt ON mm.sup_room_details_id = srt.sup_room_details_id
							INNER JOIN global_room_category_type sct ON srt.global_room_category_type_id = sct.global_room_category_type_id
							INNER JOIN sup_hotel_room_period_details shr ON shr.sup_hotel_room_period_details_id = mm.sup_hotel_room_period_details_id
							WHERE
							mm.status =1 AND mm.avilable_rooms >= $_SESSION[no_of_rooms] $where  GROUP BY srt.global_room_category_type_id,mm.sup_hotel_id ORDER BY sell_pri ASC";
		

		//echo $select;exit;
					
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			 $datas = $query->result();
			// print '<pre/>'; print_r($datas);exit;
			
			$row = $this->Hotel_Model->hotel_refresh();
			for($i=0;$i< count($datas);$i++)
		   {
			 // $i=5;
			  $currencyv1='USD';
			  $total_cost = $datas[$i]->cost_val;
			  $api="crs";
			
				$sec_res=$_SESSION['ses_id'];
					if($currencyv1 !='USD')
					{
						//$c_val1 =$this->B2b_Hotel_Model->get_currecy_detail($currencyv1);
						//$c_val = $c_val1->value;
						//$org_amt=$cost_val;
						//$amountv = $cost_val /  $c_val;
					}
					else
					{
						$c_val =1; 
						$org_amt=$total_cost;
						$amountv = $total_cost;
					}
					$amountv1 = $amountv;
					$adult =  $datas[$i]->no_of_adults;
					$child = $datas[$i]->no_of_childs;
					$hotel_code=$datas[$i]->sup_hotel_id;
					$room_code=$datas[$i]->sup_room_details_id;
					$room_type=$datas[$i]->category_type;
					$room_type_id= $datas[$i]->global_room_category_type_id;
					$selling_price= $datas[$i]->selling_price;
					$hotel_name= $datas[$i]->hotel_name;
					$totFinalPri ='';
					//echo $datas[$i]->sell_pri;
					$selling_tot_amt	= $no_of_rooms*$days_cnt * $datas[$i]->sell_pri;
					//echo $selling_tot_amt;exit;
					$status_val='Available';
					//$meals_val='Include';
					$city_code = $_SESSION['city'];
					$cust_type			= 'B2C';
					$prdct				= 'hotel';
					$avgFinalPric		= 0;
					
					$HotelPrices			= $this->Hotel_Model->get_hotel_prices_by_dates($datas[$i]->sup_hotel_room_period_details_id,$cin, $cout,$no_of_rooms);
					
					//$discount_types	= $this->Hotel_Model->get_discount_parameters();
					$discounts_ar[$i]	= $this->Hotel_Model->get_hotel_discounts($cust_type,$prdct,$selling_tot_amt, $days_cnt, $cin, $cout, $present_day, $city, $hotel_name,$room_type_id);
				
					//print '<pre />';print_r($discounts_ar);exit;	
					
					if(!empty($discounts_ar[$i]['x']) || !empty($discounts_ar[$i]['y'])){
						
						//$disc_ar_cnt			= count($discounts_ar[$i]);
						//echo $disc_ar_cnt;exit;
						$cout_new = date('Y-m-d', strtotime($cout .' -1 day'));
						//echo $cout_new;exit;
						$btwDates = $this->getDatesBetween2Dadtes($cin, $cout_new);
						//print '<pre />';print_r($btwDates);exit;
						$btwDatesCnt			= count($btwDates);
						//echo $btwDatesCnt;
						
						$btwDatesCnt			= count($btwDates);
						$finalPr				= 0;
						$finalSum				= 0;
						$finalMissSum			= 0;
						if(!empty($discounts_ar[$i]['x'])) 
						{
						 	$basis1			= $discounts_ar[$i]['x'][0]->basis;
							$discount_rate1	= $discounts_ar[$i]['x'][0]->discount_rate;
							
							if($basis1	== 'fixed') {
							$totFinalPric	=  $selling_tot_amt -  $discount_rate1;
							} else {
							$totFinalPric	=  $selling_tot_amt - ($selling_tot_amt * $discount_rate1)/100;
							}
							
						} else {
				
							$cnt				= 0;
							$missedcnt			= 0;
							$checked_dates		= array();
							
							$disc_ar_cnt			= count($discounts_ar[$i]['y']);
							//echo $disc_ar_cnt;exit;
							for($q=0; $q<$disc_ar_cnt; $q++){
								//$q=0;
							$from_date		= $discounts_ar[$i]['y'][$q]->from_date;
							$to_date		= $discounts_ar[$i]['y'][$q]->to_date;
							$basis			= $discounts_ar[$i]['y'][$q]->basis;
							$discount_rate	= $discounts_ar[$i]['y'][$q]->discount_rate;
							$disc_Ar[$q]	= $discount_rate;
							
							
							//echo $from_date.$to_date.$discount_rate;exit;
								for($r=0; $r<$btwDatesCnt; $r++){
									//$r=0;
									if($btwDates[$r]>=$from_date && $btwDates[$r]<=$to_date){
										
									//echo $btwDates[$r].$from_date;exit;
										if(!in_array($btwDates[$r], $checked_dates)){
										
											if($basis	== 'fixed') {
												$finalPr		= $selling_tot_amt -  $discount_rate;
											} else {
											$finalPr			= $selling_tot_amt - ($selling_tot_amt * $discount_rate)/100;
											}
											$finalSum			= $finalSum+$finalPr;
											$cnt				= $cnt+1;
											$checked_dates[]	= $btwDates[$r];
										}
										
										} else {
											 $missed_Ar[]		= $btwDates[$r];
										}
								}
							}
							//echo $finalSum;exit;
							//print '<pre />';print_r($missed_Ar);exit;
							$missed_unique		= array_unique($missed_Ar);
							
							$missed_dates		= array_diff_key($missed_Ar,$missed_unique);
							//print '<pre />';print_r($missed_unique);exit;
							sort($missed_dates);
							
						if($disc_ar_cnt ==1)
						{
							
							if(!empty($missed_unique)){
								for($s=0; $s<count($HotelPrices); $s++) {
								
									$selling_Pric		= $HotelPrices[$s]->selling_price;
									$date				= $HotelPrices[$s]->date;
	
									if(in_array($date, $missed_unique)){
										$finalMissSum		= ($selling_Pric*$days_cnt*$no_of_rooms)+$finalMissSum;
										$missedcnt			= $missedcnt+1;
									}
								
								}
							} 
						} else {
							
							if(!empty($missed_dates)){
								for($s=0; $s<count($HotelPrices); $s++) {
								
									$selling_Pric		= $HotelPrices[$s]->selling_price;
									$date				= $HotelPrices[$s]->date;
	
									if(in_array($date, $missed_dates)){
										$finalMissSum		= ($selling_Pric*$days_cnt*$no_of_rooms)+$finalMissSum;
										$missedcnt			= $missedcnt+1;
									}
								
								}
							} 
						}
							
						$totFinalPric		= round(($finalSum+$finalMissSum)/($cnt+$missedcnt));
						
						//echo $totFinalPri;exit;	
						unset($missed_Ar);
						unset($checked_dates);
							
						}
						
						$avgFinalPric	= round($totFinalPric/($days_cnt*$no_of_rooms));
						//echo $avgFinalPric;exit;	
					}
					
					if(isset($avgFinalPric) && $avgFinalPric!=0){
					$final_price		= $avgFinalPric;
					$totFinalPri		= $totFinalPric;
					} else {
					$final_price		= $datas[$i]->sell_pri;
					$totFinalPric		= $no_of_rooms*$days_cnt * $datas[$i]->sell_pri;
					}
					
					//$this->Hotel_Model->insert_crs_api_permanant();
					$this->Hotel_Model->insert_crs_temp_result($sec_res,'crs',$hotel_code,$room_code,$room_type,$selling_price,$final_price,$status_val,$totFinalPric,$adult,$child,$currencyv1,$city_code,$room_type_id,$cin,$cout,$no_of_rooms,$days_cnt);
					
					//echo "fnsd";exit;			
		   }
		}
	}
	
	public function fetch_search_result() 
	{
		
		if (isset($_SESSION['sorting'])) {
			unset($_SESSION['sorting']); 
		}
		
		$page			= 1;
		$cur_page		= $page;
		$page			-= 1;
		$per_page		= 10;
		$previous_btn 	= true;
		$next_btn 		= true;
		$first_btn 		= true;
		$last_btn 		= true;
		$start			= $page * $per_page;
		
		// echo $cur_page;exit;
		$msg	= "";
		
		$msg1	= "";
		//echo $_SESSION['ses_id'];
		$tmp_data = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];

		//print '<pre />';print_r($data);exit;
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
			
			$min_val = floor($tmp_data['minVal']);
		$max_val = round($tmp_data['maxVal']);
		 $tot_rec = $tmp_data['totRow'];
		//print '<pre/ >';print_r($hotel_search_result);exit;
		//echo $hotel_search_result;exit;
		//echo "tt:".$min_val . "," . $max_val . ",". $tot_rec;exit;
		
		// FOR PAGINATION
		
			$per_page1=$start+$per_page;
			if($tot_rec<$per_page1)
			{
					$per_page2 = $tot_rec;
			} else {
				  $per_page2 = $per_page1;
			 }
						 //echo $per_page2;
			$_SESSION['start']=$start;
			$_SESSION['per_page1']=$per_page2;
			$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data

			$query_pag_num = $tot_rec;

			$count = $tot_rec;

			$no_of_paginations1 = ceil($count / $per_page);
			$no_of_paginations = ceil($count / $per_page); //$no_of_paginations1-1;
			//echo $count.'---'.$no_of_paginations;exit;
			/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
			$pages_show = 10;
			if ($cur_page >= $pages_show) {

					 $start_loop = $cur_page - 4;
					if ($no_of_paginations > $cur_page + 5)
							$end_loop = $cur_page + 5;
					else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 9) {
					 $start_loop = $no_of_paginations - 9;
					 $end_loop = $no_of_paginations;
					} else {
					$end_loop = $no_of_paginations;
					 } 
			} else {
				$start_loop = 1;
				if ($no_of_paginations > $pages_show)
					$end_loop = $pages_show;
				else
					$end_loop = $no_of_paginations;
			}

		/* ----------------------------------------------------------------------------------------------------------- */
			$msg .= "<div class='pagination1' id='pagination1'><ul>";

			// FOR ENABLING THE FIRST BUTTON
			if ($first_btn && $cur_page > 1) {
				$msg .= "<li p='1' onclick='javascript:rrr1(1);' class='active'>First</li>";
			} else if ($first_btn) {
				$msg .= "<li p='1' class='inactive'>First</li>";
			}

			// FOR ENABLING THE PREVIOUS BUTTON
			
			if ($previous_btn && $cur_page > 1) {
				$pre = $cur_page - 1;
				$msg .= "<li p='$pre'  onclick='javascript:rrr1({$pre});' class='active'>Prev</li>";
			} else if ($previous_btn) {
				$msg .= "<li class='inactive' >Prev</li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
				if ($cur_page == $i)
					$msg .= "<li p='$i' onclick='javascript:rrr1({$i});'  style='color:#fff;background-color:#333399;' class='active'>{$i}</li>";
				else
					$msg .= "<li p='$i'  onclick='javascript:rrr1({$i});' class='active'>{$i}</li>";
			}

			// TO ENABLE THE NEXT BUTTON
			if ($next_btn && $cur_page < $no_of_paginations) {
				$nex = $cur_page + 1;
				$msg .= "<li p='$nex' onclick='javascript:rrr1({$nex});'  class='active'>Next</li>";
			} else if ($next_btn) {
				$msg .= "<li class='inactive'>Next</li>";
			}

			// TO ENABLE THE END BUTTON
			if ($last_btn && $cur_page < $no_of_paginations) {
				$msg .= "<li p='$no_of_paginations' onclick='javascript:rrr1({$no_of_paginations});'   class='active'>Last</li>";
			} else if ($last_btn) {
				$msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
			}
			$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
			$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
			$msg = $msg . "</ul></div>";  // Content for pagination
		
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result,
			'total_result' => $tot_rec,
			'min_val' => $min_val,
			'max_val' => $max_val,
			'msg' => $msg
			));
	}
	public function fetch_search_result_filter() 
	{
		$minVal = 0;
		$maxVal = 0;
		$minStar = 0;
		$maxStar = 5;
		$star_rating = 0;
		$page			= 1;
		
		//if (isset($_REQUEST['minVal'])) $minVal = ceil($_REQUEST['minVal']/$this->session->userdata('currency_value'));
		//if (isset($_REQUEST['maxVal'])) $maxVal = ceil($_REQUEST['maxVal']/$this->session->userdata('currency_value'));
		
		if (isset($_REQUEST['minVal'])) $minVal = $_REQUEST['minVal'];
		if (isset($_REQUEST['maxVal'])) $maxVal = $_REQUEST['maxVal'];
	

		
		if (isset($_REQUEST['minStar'])) $minStar = $_REQUEST['minStar'];
  		if (isset($_REQUEST['maxStar'])) $maxStar = $_REQUEST['maxStar'];
		
		if (isset($_REQUEST['room_type_id'])) $room_type_id = trim(rawurldecode(stripslashes($_REQUEST['room_type_id'])));
		if (isset($_REQUEST['hotel_name_val'])) $hotel_name_val = $_REQUEST['hotel_name_val'];
		if (isset($_REQUEST['fac'])) $fac =trim(rawurldecode(stripslashes( $_REQUEST['fac'])));
		if (isset($_REQUEST['loc'])) $loc = trim(rawurldecode(stripslashes($_REQUEST['loc'])));
		
		//echo  'minVal'.$_REQUEST['minVal']; echo 'maxVal'.$_REQUEST['maxVal'];echo 'hotel_name_val'.$_REQUEST['hotel_name_val'];echo 'room_type_id'.$_REQUEST['room_type_id']; exit;
  
		// facilities ccc
		
  		/*$_SESSION['minVal'] = $minVal;
		$_SESSION['maxVal'] = $maxVal;
		$_SESSION['minStar'] = $minStar;
		$_SESSION['maxStar'] = $maxStar;*/

		//echo $minStar.'-'.$maxStar;exit;
		
		if($hotel_name_val!='')
		{
		 $hotel_name_vals = $hotel_name_val;
		}else {
			
			 $hotel_name_vals = '';
		}
		
		if($room_type_id!='')
		{
			$room_type = explode(',',$room_type_id);
		}
		 else {
			$room_type = '';
		}
		
		//print_r($room_type);
		
		
		if($loc!='')
		{
			$hotel_location = explode(',',$loc);
		}
		 else {
			$hotel_location = '';
		}
		
		//print_r($fac);
		
		
		
		if($fac!=''){
			$facilities = explode(',',$fac);
			// echo 'dddddddddddddddddddd';
		} else {
			$facilities = '';
		}
		
		//print_r($facilities);exit;
		//echo $hotel_location;exit;
		
		$sorting = '';
		
		/* $facility = trim(rawurldecode(stripslashes($_REQUEST['facilities'])));
		 $facility_value =  '+'.$facility;
		 $fac =  rtrim($facility_value);*/
		//echo $fac;
		
		if (isset($_REQUEST['sorting'])) {
			$sorting = $_REQUEST['sorting'];
			$_SESSION['sorting'] = $sorting;
		} else if (!empty($_SESSION['sorting'])) {
			$sorting = $_SESSION['sorting'];
		} 
		
		//echo 'bbb'.$minVal; echo 'ccc'.$maxVal; 
		if (isset($_REQUEST['star_rating']))
		{ 
			$star_rating = $_REQUEST['star_rating'];
		}
		
		$cur_page		= $page;
		$page			-= 1;
		$per_page		= 10;
		$previous_btn 	= true;
		$next_btn 		= true;
		$first_btn 		= true;
		$last_btn 		= true;
		$start			= $page * $per_page;
		
		// echo $cur_page;exit;
		$msg	= "";
		
		$msg1	= "";
		$tmp_data = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'], 1, $minVal, $maxVal, $minStar, $maxStar, $sorting,$room_type,$hotel_name_vals,$facilities,$hotel_location,$star_rating);
		
		//echo '<pre/>';print_r($tmp_data); exit;

		$data['result'] = $tmp_data['result'];
		
		//$total_result = $tmp_data['count'];
		//$low_val = round($data['result'][0]->total_cost);
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		
		//echo 'af'.$tmp_data['minVal'];
		//echo 'max'.$tmp_data['maxVal']; //exit;
		
		$min_val = floor($tmp_data['minVal']);
		$min_val = $tmp_data['minVal'];
		$max_val = round($tmp_data['maxVal']);
		$tot_rec = $tmp_data['totRow'];
		
		//echo "tt:".$min_val . "," . $max_val . ",". $tot_rec; //exit;
		
		
	// FOR PAGINATION
		
		$per_page1=$start+$per_page;
		if($tot_rec<$per_page1)
		{
				$per_page2 = $tot_rec;
		} else {
			  $per_page2 = $per_page1;
		 }
					 //echo $per_page2;
		$_SESSION['start']=$start;
		$_SESSION['per_page1']=$per_page2;
		$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data

		$query_pag_num = $tot_rec;

		$count = $tot_rec;

		$no_of_paginations1 = ceil($count / $per_page);
		$no_of_paginations = ceil($count / $per_page); //$no_of_paginations1-1;
		//echo $count.'---'.$no_of_paginations;exit;
		/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
		$pages_show = 10;
		if ($cur_page >= $pages_show) {

				 $start_loop = $cur_page - 4;
				if ($no_of_paginations > $cur_page + 5)
						$end_loop = $cur_page + 5;
				else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 9) {
				 $start_loop = $no_of_paginations - 9;
				 $end_loop = $no_of_paginations;
				} else {
				$end_loop = $no_of_paginations;
				 } 
		} else {
			$start_loop = 1;
			if ($no_of_paginations > $pages_show)
				$end_loop = $pages_show;
			else
				$end_loop = $no_of_paginations;
		}

	/* ----------------------------------------------------------------------------------------------------------- */
		$msg .= "<div class='pagination1'><ul>";

		// FOR ENABLING THE FIRST BUTTON
		if ($first_btn && $cur_page > 1) {
			$msg .= "<li p='1' onclick='javascript:rrr1(1);' class='active'>First</li>";
		} else if ($first_btn) {
			$msg .= "<li p='1' class='inactive'>First</li>";
		}

		// FOR ENABLING THE PREVIOUS BUTTON
		
		if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$msg .= "<li p='$pre'  onclick='javascript:rrr1({$pre});' class='active'>Prev</li>";
		} else if ($previous_btn) {
			$msg .= "<li class='inactive' >Prev</li>";
		}
		for ($i = $start_loop; $i <= $end_loop; $i++) {
		
			if ($cur_page == $i)
				$msg .= "<li p='$i' onclick='javascript:rrr1({$i});'  style='color:#fff;background-color:#333399;' class='active'>{$i}</li>";
			else
				$msg .= "<li p='$i'  onclick='javascript:rrr1({$i});' class='active'>{$i}</li>";
		}

		// TO ENABLE THE NEXT BUTTON
		if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$msg .= "<li p='$nex' onclick='javascript:rrr1({$nex});'  class='active'>Next</li>";
		} else if ($next_btn) {
			$msg .= "<li class='inactive'>Next</li>";
		}

		// TO ENABLE THE END BUTTON
		if ($last_btn && $cur_page < $no_of_paginations) {
			$msg .= "<li p='$no_of_paginations' onclick='javascript:rrr1({$no_of_paginations});'   class='active'>Last</li>";
		} else if ($last_btn) {
			$msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
		}
		$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
		$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
		$msg = $msg . "</ul></div>";  // Content for pagination
		
		
		//echo $msg;exit;
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result,
			'total_result' => $tot_rec,
			'min_val' => $min_val,
			'max_val' => $max_val,
			'msg' => $msg
			));
	}
	
	public function hotel_detail($id)
	{
		$fav_hotel_detail=array();
		$idd=$this->Hotel_Model->get_cancel_attrib_new($id);
		if($idd->hotel_code !='')
		{
			//echo $idd->api_temp_hotel_id;exit;
			$this->Hotel_Model->get_cancel_attrib_new_nerw($idd->hotel_code,$idd->api_temp_hotel_id);
		}
		
		if(isset($_SESSION['fav_hotel_detail']))
		{
			$hote_id = $_SESSION['fav_hotel_detail'];
		//	print_r($hote_id);exit;
				//echo "sssss";exit;
			if($hote_id!='')
			{
			
			for($i=0;$i< count($hote_id);$i++)
			{
				$a = explode(",",$hote_id[$i]);
				if($a[0] !='images' && $a[0] !='Array')
				{
				if($id != $a[0])
				{
					//echo $a[0];
					//$iddd=$this->Hotel_Model->get_cancel_attrib_new($a[0]);
					
					//echo $iddd->hotel_code;
					$fav_hotel[] = $a[0].','.$idd->hotel_code;
				}
				}
			}
			}
			$fav_hotel[] = $id.','.$idd->hotel_code;
			$fav_hotel= array_merge($fav_hotel);
			$_SESSION['fav_hotel_detail'] = $fav_hotel;
		}
		else
		{
			
			$fav_hotel[] = $id.','.$idd->hotel_code;
			$hote_id = $fav_hotel;
			$_SESSION['fav_hotel_detail'] = $fav_hotel;
			
		}
		$service=$this->Hotel_Model->get_searchresult($id);		
		//echo $service->phone;exit;
		$phone=$service->phone;
		$api = $service->api;
		$hotel_code = $service->hotel_code;
		$hotel_name = $service->hotel_name;
		$image = $service->image;
		$tot_amt= $service->total_cost;
		$data['service']=$service;
		$sec_res=$_SESSION['ses_id'];
			//$data['hotel_facility'] = $this->Hotel_Model->get_facility_details_hotel($hotel_code);
			//$data['room_facility'] = $this->Hotel_Model->get_facility_details_room($hotel_code);
			
			$data['hotel_facility'] = $service->hotel_facilities;
			$data['room_facility'] = $service->room_facilities;
			
			$data['hotelCode']=$hotel_code;
			$data['star']=$service->star;
			$data['phone']=$service->phone;
			$data['location']=$service->location;
			
			
			$data['lat']=$service->latitude;
			$data['long']=$service->longitude;
			$data['hotel_name']=$service->hotel_name;
			
			$data['description'] = $service->description;
			$data['address'] = $service->address;
			$data['dest'] = $service->city ;
			
			$data['result_id']=$id;
			$data['cur_id'] = $id;
			$data['api'] = $api;
			
			$sup_hotel = $this->Hotel_Model->get_sup_hotel($hotel_code);
			
			$sup_hotel_id = $sup_hotel->sup_hotel_id;
			$data['sup_hotel_id'] = $sup_hotel_id;
			
			$data['hotel_images'] = $images = $this->Hotel_Model->get_hotel_images($sup_hotel_id);
			$data['hotel_products'] = $images = $this->Hotel_Model->get_hotel_extra_products($sup_hotel_id);
			
			$start_date = explode('-',$_SESSION['sd']);
			$end_date = explode('-',$_SESSION['ed']);
		
			$room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
			$room_vecate_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
			
			$data['room_avil_category'] = $room_avil_category =  $this->Hotel_Model->get_hotel_room_categorys($sup_hotel_id,$room_alloc_date,$room_vecate_date);
			
			//print '<pre />'; print_r($data);exit;
			$hotel_review = $this->Hotel_Model->get_review($sup_hotel_id);		
			$data['hotel_review'] = $hotel_review;
			$fetch_city = $this->Hotel_Model->fetch_city();
			$data['fetch_city'] = $fetch_city;
			$this->load->view('hotel/hotel_detail',$data);	
		
	}
	public function getDatesBetween2Dadtes($startTime, $endTime) {
					$day 		= 86400;
					$format 	= 'Y-m-d';
					$startTime 	= strtotime($startTime);
					$endTime 	= strtotime($endTime);
					$numDays 	= round(($endTime - $startTime) / $day) + 1;
					$days 		= array();

					for ($i = 0; $i < $numDays; $i++) {
						$days[] = date($format, ($startTime + ($i * $day)));
					}
					//print '<pre />';print_r($days);exit;
					return $days;
				}
	public function hotel_booking_item_details()
	{
		//print '<pre />';print_r($_POST);exit;
		$this->load->view('hotel/add_to_cart');
	}
	public function checkout_page()
	{
		$this->load->view('hotel/checkout_page');
	}
	
	public function add_review(){

		  $result   = $this->Hotel_Model->add_review();
			if($result == true){
			 echo "1"; exit;
			}
		
	}
	public function get_hotel_room_temp_details()
	{
		//print '<pre />';print_r($_REQUEST);exit;
		$api_temp_hotel_id= $_REQUEST['id'];
		$hotel_room_final_price = $this->Hotel_Model->get_hotel_room_temp_details($api_temp_hotel_id);
		
		//print '<pre />';print_r($hotel_room_final_price);exit;
		
		$total_final_price = $hotel_room_final_price->total_final_price;
		$total_cost = $hotel_room_final_price->total_cost;
		$selling_price = $hotel_room_final_price->selling_price;
		
		echo json_encode(array(
				'total_final_price' => $total_final_price,
				'total_cost' => $total_cost,
				'selling_price' => $selling_price,
				
		)); 
		
	}
	public function booking_item_details($temp_id='')
	{
		//print '<pre />';print_r($_POST);exit;
		
		//echo $_POST['room_type'];exit;	
		if(isset($_POST['room_type']) && $_POST['room_type']!='')
		{
			
		$api_temp_hotel_id= $_POST['room_type'];
		//echo $api_temp_hotel_id;exit;
		
		} else {
			$api_temp_hotel_id = $temp_id;
		}
		$service=$this->Hotel_Model->get_searchresult($api_temp_hotel_id);	
		//print '<pre />';print_r($service);exit;
		$data['service'] = $service;
		
		$check_in = $service->check_in;
		$check_out = $service->check_out;
		
		$hotel_code = $service->hotel_code;
		$sup_hotel = $this->Hotel_Model->get_sup_hotel($hotel_code);
		$sup_hotel_id = $sup_hotel->sup_hotel_id;
		$sessId = $service->session_id;
		
		$timestamp			= strtotime($check_in);
		$data['check_in']	= date('d M y ', $timestamp); 
		
		$timestamp	= strtotime($check_out);
		$data['check_out']	= date(' d M y', $timestamp);
		
		$data['sup_hotel_id'] = $sup_hotel_id;
		$data['hotel_products'] = $images = $this->Hotel_Model->get_hotel_extra_products($sup_hotel_id);
		
		$res_cart_data 	= $this->Hotel_Model->get_hotel_add_cart_details($sessId, $api_temp_hotel_id);
		$data['res_cart_data'] = $res_cart_data;
		$data['grand_total']	= $service->grand_total;
		
		$data['api_temp_hotel_id'] = $api_temp_hotel_id;
		$this->load->view('hotel/add_to_cart',$data);
	}
	public function add_to_cart()
	{
		$quanity 	= 1;
		$sub_total	= 0;
		//echo '<pre>';print_r($_REQUEST);echo '</pre>';
		// exit;
		
		$sessId 		= $_REQUEST['sessId'];
		$products_id 	 = $_REQUEST['products_id'];
		$products_name 	= $_REQUEST['products_name'];
	
		$quanity 		= $_REQUEST['quanity'];
		$payment_mode 	= $_REQUEST['payment_mode'];
		$priceId 		= $_REQUEST['priceId'];
		
		$api_temp_hotel_id 	= $_REQUEST['api_temp_hotel_id'];
		$total_days 		= $_REQUEST['total_days'];
		$total_rooms 		= $_REQUEST['total_rooms'];
		$total_final_price  = $_REQUEST['total_final_price'];
		$sup_hotel_id 		= $_REQUEST['sup_hotel_id'];
		$hotel_code 		= $_REQUEST['hotel_code'];
	
		if($payment_mode==1) {
			$sub_total		= $priceId * $quanity * $total_days;
		} if($payment_mode==2) {
			
			$sub_total		= $priceId * $quanity * $total_days;
		}else {
			$sub_total		= $priceId * $quanity;
		}
		$check_data = $this->Hotel_Model->get_hotel_add_cart_details_by_para($sessId,$api_temp_hotel_id,$products_id);
		//echo '<pre>';print_r($check_data);echo '</pre>';
		//exit;
		
		if(empty($check_data)) {
			// echo 'sdsds';
			$tmp_data = $this->Hotel_Model->add_cart_to_hotel($sessId, $api_temp_hotel_id, $products_id, $products_name, $quanity, $payment_mode,$sub_total);
		} else {
			
			if($check_data[0]->quantity != $quanity) {
				$update_data = $this->Hotel_Model->update_cart_to_hotel($sessId,$api_temp_hotel_id, $products_id, $quanity, $sub_total);
				//echo '<pre>';print_r($update_data);echo '</pre>';
			}
		
		}
		
		$sub_total_sum	= $this->Hotel_Model->get_hotel_add_cart_sum($sessId, $api_temp_hotel_id);
		
		$grand_total	= $total_final_price + $sub_total_sum[0]->subTotal;
		
		$update_data 	= $this->Hotel_Model->update_api_hotel_details($sessId, $hotel_code, $grand_total,$api_temp_hotel_id);
		
		$res_cart_data 	= $this->Hotel_Model->get_hotel_add_cart_details($sessId, $api_temp_hotel_id);
		
		$service		= $this->Hotel_Model->get_searchresult($api_temp_hotel_id);	
		
		$data['res_cart_data']	= $res_cart_data;
		$data['service']		= $service;
		$data['grand_total']	= $service->grand_total;
		
		$hotel_search_result	= $this->load->view('hotel/add_to_cart_ajax', $data, true); 
		$grandTotal	= $data['grand_total']; 
		
		echo json_encode(array(
				'hotel_search_result' => $hotel_search_result,
				'grandTotal' => $grandTotal,
				
				));
	}
	public function delete_add_to_cart_hotel()
	{
		//print '<pre />';print_r($_REQUEST);exit;
		$api_temp_hotel_id = $_REQUEST['api_temp_hotel_id'];
		$id = $_REQUEST['id'];
		
		$check_data = $this->Hotel_Model->get_hotel_add_cart_details_by_Id($id);
		$service1		= $this->Hotel_Model->get_searchresult($api_temp_hotel_id);	
		
		
		$grand_total 	= $service1->grand_total;
		$hotel_code 	= $service1->hotel_code;
		$sessId 		= $service1->session_id;
		
		if(!empty($check_data)) {
			$grand_total	= $grand_total - $check_data[0]->sub_total;
			// echo '<pre>';print_r($grand_total);echo '</pre>';die();
			$update_data 	= $this->Hotel_Model->update_api_hotel_details($sessId, $hotel_code, $grand_total,$api_temp_hotel_id);
			
			$delRes 		= $this->Hotel_Model->delete_added_cart($id);
		}
		
		$res_cart_data 	= $this->Hotel_Model->get_hotel_add_cart_details($sessId, $api_temp_hotel_id);
		
		//print '<pre />';print_r($res_cart_data);
		$service		= $this->Hotel_Model->get_searchresult($api_temp_hotel_id);	
		$data['res_cart_data']	= $res_cart_data;
		$data['service']		= $service;
		$data['grand_total']	= $service->grand_total;
		
		$hotel_search_result	= $this->load->view('hotel/add_to_cart_ajax', $data, true);
		
		
		//echo $hotel_search_result;exit;
		$grandTotal	= $data['grand_total'];
		echo json_encode(array(
				'hotel_search_result' => $hotel_search_result,
				'grandTotal' => $grandTotal,
				
				));
		
	}
	public function add_to_cart_hotel_detail()
	{
		$quanity 	= 1;
		$sub_total	= 0;
		//echo '<pre>';print_r($_REQUEST);echo '</pre>';
		 //exit;
		
		$sessId 		= $_REQUEST['sessId'];
		$products_id 	 = $_REQUEST['products_id'];
		$products_name 	= $_REQUEST['products_name'];
	
		$quanity 		= $_REQUEST['quanity'];
		$payment_mode 	= $_REQUEST['payment_mode'];
		$priceId 		= $_REQUEST['priceId'];
		
		$api_temp_hotel_id 	= $_REQUEST['api_temp_hotel_id'];
		$total_days 		= $_REQUEST['total_days'];
		$total_rooms 		= $_REQUEST['total_rooms'];
		//$total_final_price  = $_REQUEST['total_final_price'];
		$sup_hotel_id 		= $_REQUEST['sup_hotel_id'];
		$hotel_code 		= $_REQUEST['hotel_code'];
	
		$price_details		= $this->Hotel_Model->get_searchresult($api_temp_hotel_id);	
		
		$total_final_price = $price_details->total_final_price;
		
		
		
		if($payment_mode==1) {
			$sub_total		= $priceId * $quanity * $total_days;
		} if($payment_mode==2) {
			
			$sub_total		= $priceId * $quanity * $total_days;
		}else {
			$sub_total		= $priceId * $quanity;
		}
		$check_data = $this->Hotel_Model->get_hotel_add_cart_details_by_para($sessId,$api_temp_hotel_id,$products_id);
		//echo '<pre>';print_r($check_data);echo '</pre>';
		//exit;
		
		if(empty($check_data)) {
			// echo 'sdsds';
			$tmp_data = $this->Hotel_Model->add_cart_to_hotel($sessId, $api_temp_hotel_id, $products_id, $products_name, $quanity, $payment_mode,$sub_total);
		} else {
			
			if($check_data[0]->quantity != $quanity) {
				$update_data = $this->Hotel_Model->update_cart_to_hotel($sessId,$api_temp_hotel_id, $products_id, $quanity, $sub_total);
				//echo '<pre>';print_r($update_data);echo '</pre>';
			}
		
		}
		
		$sub_total_sum	= $this->Hotel_Model->get_hotel_add_cart_sum($sessId, $api_temp_hotel_id);
		
		$grand_total	= $total_final_price + $sub_total_sum[0]->subTotal;
		
		$update_data 	= $this->Hotel_Model->update_api_hotel_details($sessId, $hotel_code, $grand_total,$api_temp_hotel_id);
		
		$res_cart_data 	= $this->Hotel_Model->get_hotel_add_cart_details($sessId, $api_temp_hotel_id);
		
		$service		= $this->Hotel_Model->get_searchresult($api_temp_hotel_id);	
		
		$data['res_cart_data']	= $res_cart_data;
		$data['service']		= $service;
		$data['grand_total']	= $service->grand_total;
		
		//$hotel_search_result	= $this->load->view('hotel/add_to_cart_ajax', $data, true); 
		//$grandTotal	= $data['grand_total']; 
		
		return true;
		/*echo json_encode(array(
				'hotel_search_result' => $hotel_search_result,
				'grandTotal' => $grandTotal,
				
				));*/
	}
	
	public function checkout_page_detail($api_temp_hotel_id)
	{
		//echo $id;exit;
		$service		= $this->Hotel_Model->get_searchresult($api_temp_hotel_id);	
		
		$sessId 		= $service->session_id;
		
		$res_cart_data 			= $this->Hotel_Model->get_hotel_add_cart_details($sessId, $api_temp_hotel_id);	
		$data['service']		= $service;
		$data['res_cart_data']	= $res_cart_data;
		$data['grand_total']	= $service->grand_total;
		
		$data['api_temp_hotel_id']	= $api_temp_hotel_id;
		
		$this->load->view('hotel/checkout_page', $data);	
	}
	public function pagination_call()
	{
		//print '<pre />';print_r($_REQUEST);exit;
		
		if($_REQUEST['page'])
		{
			
			$page = $_REQUEST['page'];
			
			//echo $page;exit;
			if (isset($_REQUEST['minVal'])) $minVal = $_REQUEST['minVal'];
			if (isset($_REQUEST['maxVal'])) $maxVal = $_REQUEST['maxVal'];
	

		
			$minStar ='0';
			$maxStar ='5';
			$sorting ='';
			$star_rating='';
		
			if (isset($_REQUEST['room_type_id'])) $room_type_id = trim(rawurldecode(stripslashes($_REQUEST['room_type_id'])));
			if (isset($_REQUEST['hotel_name_val'])) $hotel_name_val = $_REQUEST['hotel_name_val'];
			if (isset($_REQUEST['fac'])) $fac =trim(rawurldecode(stripslashes( $_REQUEST['fac'])));
			if (isset($_REQUEST['loc'])) $loc = trim(rawurldecode(stripslashes($_REQUEST['loc'])));
			
			if($hotel_name_val!='')
			{
			 $hotel_name_vals = $hotel_name_val;
			}else {
				
				 $hotel_name_vals = '';
			}
			
			if($room_type_id!='')
			{
				$room_type = explode(',',$room_type_id);
			}
			 else {
				$room_type = '';
			}
			
			//print_r($room_type);
		
		
			if($loc!='')
			{
				$hotel_location = explode(',',$loc);
			}
			 else {
				$hotel_location = '';
			}
		
				//print_r($fac);
		
			if($fac!=''){
				$facilities = explode(',',$fac);
				// echo 'dddddddddddddddddddd';
			} else {
				$facilities = '';
			}
			
			if (isset($_REQUEST['star_rating']))
			{ 
				$star_rating = $_REQUEST['star_rating'];
			}
			//print_r($facilities);exit;
			
			$cur_page = $page;
			$page -= 1;
			$per_page = 1;
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
			$start = $page * $per_page;
			//echo $cur_page;exit;
			$msg = "";
			
			$msg1 = "";
			
			 $hotellisst=$this->Hotel_Model->fetch_search_result($_SESSION['ses_id'], 1, $minVal, $maxVal, $minStar, $maxStar, $sorting,$room_type,$hotel_name_vals,$facilities,$hotel_location,$star_rating);
				
				//print '<pre />';print_r($hotellisst);exit;
				$hotellist = $hotellisst['totRow'];	 
				//print '<pre />';print_r($hotellist);exit;
				$per_page1=$start+$per_page;
				if($hotellist<$per_page1)
				{
						$per_page2 = $hotellist;
				} else {
					  $per_page2 = $per_page1;
				 }
							 //echo $per_page2;
				$_SESSION['start']=$start;
				$_SESSION['per_page1']=$per_page2;
				$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data

				$query_pag_num = $hotellist;

				$count = $hotellist;

				$no_of_paginations1 = ceil($count / $per_page);
				$no_of_paginations = ceil($count / $per_page); //$no_of_paginations1-1;
				//echo $count.'---'.$no_of_paginations;exit;
				/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
				$pages_show = 10;
				if ($cur_page >= $pages_show) {
	
   						 $start_loop = $cur_page - 4;
    					if ($no_of_paginations > $cur_page + 5)
        						$end_loop = $cur_page + 5;
   				 		else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 9) {
       					 $start_loop = $no_of_paginations - 9;
        				 $end_loop = $no_of_paginations;
    					} else {
       				 	$end_loop = $no_of_paginations;
   						 } 
				} else {
					$start_loop = 1;
					if ($no_of_paginations > $pages_show)
						$end_loop = $pages_show;
					else
						$end_loop = $no_of_paginations;
				}

			/* ----------------------------------------------------------------------------------------------------------- */
				$msg .= "<div class='pagination1'><ul>";

				// FOR ENABLING THE FIRST BUTTON
				if ($first_btn && $cur_page > 1) {
					$msg .= "<li p='1' onclick='javascript:rrr1(1);' class='active'>First</li>";
				} else if ($first_btn) {
					$msg .= "<li p='1' class='inactive'>First</li>";
				}

				// FOR ENABLING THE PREVIOUS BUTTON
				
				if ($previous_btn && $cur_page > 1) {
					$pre = $cur_page - 1;
					$msg .= "<li p='$pre'  onclick='javascript:rrr1({$pre});' class='active'>Prev</li>";
				} else if ($previous_btn) {
					$msg .= "<li class='inactive' >Prev</li>";
				}
				for ($i = $start_loop; $i <= $end_loop; $i++) {
				
					if ($cur_page == $i)
						$msg .= "<li p='$i' onclick='javascript:rrr1({$i});'  style='color:#fff;background-color:#333399;' class='active'>{$i}</li>";
					else
						$msg .= "<li p='$i'  onclick='javascript:rrr1({$i});' class='active'>{$i}</li>";
				}

				// TO ENABLE THE NEXT BUTTON
				if ($next_btn && $cur_page < $no_of_paginations) {
					$nex = $cur_page + 1;
					$msg .= "<li p='$nex' onclick='javascript:rrr1({$nex});'  class='active'>Next</li>";
				} else if ($next_btn) {
					$msg .= "<li class='inactive'>Next</li>";
				}

				// TO ENABLE THE END BUTTON
				if ($last_btn && $cur_page < $no_of_paginations) {
					$msg .= "<li p='$no_of_paginations' onclick='javascript:rrr1({$no_of_paginations});'   class='active'>Last</li>";
				} else if ($last_btn) {
					$msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
				}
				$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
				$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
				$msg = $msg . "</ul></div>";  // Content for pagination
				echo json_encode(array(
				'msg' => $msg
				
				));

		}

	}
	public function all_filter_new1()
	{
		
			$id = $_REQUEST['id'];
			
			//print '<pre />';print_r($_REQUEST);exit;
			if (isset($_REQUEST['minVal'])) $minVal = $_REQUEST['minVal'];
			if (isset($_REQUEST['maxVal'])) $maxVal = $_REQUEST['maxVal'];
	

		
			$minStar ='0';
			$maxStar ='5';
			$sorting ='';
			$star_rating='';
		
			if (isset($_REQUEST['room_type_id'])) $room_type_id = trim(rawurldecode(stripslashes($_REQUEST['room_type_id'])));
			if (isset($_REQUEST['hotel_name_val'])) $hotel_name_val = $_REQUEST['hotel_name_val'];
			if (isset($_REQUEST['fac'])) $fac =trim(rawurldecode(stripslashes( $_REQUEST['fac'])));
			if (isset($_REQUEST['loc'])) $loc = trim(rawurldecode(stripslashes($_REQUEST['loc'])));
			
			if($hotel_name_val!='')
			{
			 $hotel_name_vals = $hotel_name_val;
			}else {
				
				 $hotel_name_vals = '';
			}
			
			if($room_type_id!='')
			{
				$room_type = explode(',',$room_type_id);
			}
			 else {
				$room_type = '';
			}
			
			//print_r($room_type);
		
		
			if($loc!='')
			{
				$hotel_location = explode(',',$loc);
			}
			 else {
				$hotel_location = '';
			}
		
				//print_r($fac);
		
			if($fac!=''){
				$facilities = explode(',',$fac);
				// echo 'dddddddddddddddddddd';
			} else {
				$facilities = '';
			}
			if (isset($_REQUEST['star_rating']))
			{ 
				$star_rating = $_REQUEST['star_rating'];
			}
			//print_r($facilities);exit;
		
		
			$page			= $id;
			$cur_page		= $page;
			$page			-= 1;
			$per_page		= 10;
			$previous_btn 	= true;
			$next_btn 		= true;
			$first_btn 		= true;
			$last_btn 		= true;
			$start			= $page * $per_page;
			
			$msg	= "";
			
			$msg1	= "";
		
			$tmp_data = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'], $id, $minVal, $maxVal, $minStar, $maxStar, $sorting,$room_type,$hotel_name_vals,$facilities,$hotel_location,$star_rating);
		
		$data['result'] = $tmp_data['result'];
		
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
			
		$min_val = floor($tmp_data['minVal']);
		$max_val = round($tmp_data['maxVal']);
		$tot_rec = $tmp_data['totRow'];
			
			// FOR PAGINATION
		
		$per_page1=$start+$per_page;
		if($tot_rec<$per_page1)
		{
				$per_page2 = $tot_rec;
		} else {
			  $per_page2 = $per_page1;
		 }
					 //echo $per_page2;
		$_SESSION['start']=$start;
		$_SESSION['per_page1']=$per_page2;
		$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data

		$query_pag_num = $tot_rec;

		$count = $tot_rec;

		$no_of_paginations1 = ceil($count / $per_page);
		$no_of_paginations = ceil($count / $per_page); //$no_of_paginations1-1;
		//echo $count.'---'.$no_of_paginations;exit;
		/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
		$pages_show = 10;
		if ($cur_page >= $pages_show) {

				 $start_loop = $cur_page - 4;
				if ($no_of_paginations > $cur_page + 5)
						$end_loop = $cur_page + 5;
				else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 9) {
				 $start_loop = $no_of_paginations - 9;
				 $end_loop = $no_of_paginations;
				} else {
				$end_loop = $no_of_paginations;
				 } 
		} else {
			$start_loop = 1;
			if ($no_of_paginations > $pages_show)
				$end_loop = $pages_show;
			else
				$end_loop = $no_of_paginations;
		}

	/* ----------------------------------------------------------------------------------------------------------- */
		$msg .= "<div class='pagination1'><ul>";

		// FOR ENABLING THE FIRST BUTTON
		if ($first_btn && $cur_page > 1) {
			$msg .= "<li p='1' onclick='javascript:rrr1(1);' class='active'>First</li>";
		} else if ($first_btn) {
			$msg .= "<li p='1' class='inactive'>First</li>";
		}

		// FOR ENABLING THE PREVIOUS BUTTON
		
		if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$msg .= "<li p='$pre'  onclick='javascript:rrr1({$pre});' class='active'>Prev</li>";
		} else if ($previous_btn) {
			$msg .= "<li class='inactive' >Prev</li>";
		}
		for ($i = $start_loop; $i <= $end_loop; $i++) {
		
			if ($cur_page == $i)
				$msg .= "<li p='$i' onclick='javascript:rrr1({$i});'  style='color:#fff;background-color:#333399;' class='active'>{$i}</li>";
			else
				$msg .= "<li p='$i'  onclick='javascript:rrr1({$i});' class='active'>{$i}</li>";
		}

		// TO ENABLE THE NEXT BUTTON
		if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$msg .= "<li p='$nex' onclick='javascript:rrr1({$nex});'  class='active'>Next</li>";
		} else if ($next_btn) {
			$msg .= "<li class='inactive'>Next</li>";
		}

		// TO ENABLE THE END BUTTON
		if ($last_btn && $cur_page < $no_of_paginations) {
			$msg .= "<li p='$no_of_paginations' onclick='javascript:rrr1({$no_of_paginations});'   class='active'>Last</li>";
		} else if ($last_btn) {
			$msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
		}
		$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
		$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
		$msg = $msg . "</ul></div>";  // Content for pagination
			
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
				echo json_encode(array(
					'hotel_search_result' => $hotel_search_result,
					'total_result' => $tot_rec,
					'min_val' => $min_val,
					'max_val' => $max_val,
					'msg' => $msg
				));
			
	}
	public function lahore()
	{
		$this->load->view('hotel/lahore');
	}
	public function success_pay($h_cus_contact_details_id,$api_temp_hotel_id)
	{
		
		//echo '<pre>';print_r($_GET);echo '</pre>';
		// echo '<pre>';print_r($h_cus_contact_details_id);echo '</pre>';
		$hotel_pay_data = $this->Hotel_Model->get_hotel_pay_details_by_id($h_cus_contact_details_id);
		//echo '<pre>';print_r($hotel_pay_data);echo '</pre>';
		if(empty($hotel_pay_data)){
			$hotel_trans_id	= 'TXHOTEL00123'.$h_cus_contact_details_id;
			
			$booking_number	= 'GH1H00123'.$h_cus_contact_details_id;
			
			$update_data 				= $this->Hotel_Model->update_hotel_pay_details_by_id($h_cus_contact_details_id,$booking_number);
		
			$hotel_booking_info_id 		= $this->Hotel_Model->insert_hotel_booked_details($h_cus_contact_details_id,$api_temp_hotel_id);
			//echo $ins_id;exit;
			
			$hotel_booked_info 			= $this->Hotel_Model->get_hotel_booked_details($hotel_booking_info_id);
		
			//echo '<pre>';print_r($hotel_booked_info);echo '</pre>';
		
			$check_in					= $hotel_booked_info->check_in;
			$check_out					= $hotel_booked_info->check_out;
			$hotel_code					= $hotel_booked_info->hotel_code;
			$sup_hotel_id				= $hotel_booked_info->sup_hotel_id;
			$no_of_rooms				= $hotel_booked_info->no_of_rooms;
			$room_code					= $hotel_booked_info->room_code;
		
			//$update_data = $this->Hotel_Model->update_sup_hotel_inv_list($sup_hotel_id,$check_in,$check_out,$no_of_rooms,$room_code);
		
		} else {
			
			$hotel_booked_info = $this->Hotel_Model->get_hotel_booked_details_by_apiId($h_cus_contact_details_id);
			//$hotel_pay_data = $this->Hotel_Model->get_hotel_pay_details_by_id($h_cus_contact_details_id);
			
		}
		
		$hotel_pay_data = $this->Hotel_Model->get_hotel_pay_details_by_id($h_cus_contact_details_id);
		
		$city_name = $this->Hotel_Model->get_city_name_by_code($hotel_booked_info->city);
		
		$data['hotel_booked_info'] = $hotel_booked_info;
		$data['hotel_pay_data'] = $hotel_pay_data;
		
		$data['vocher_date']= $hotel_booked_info->current_date;
		//echo '<pre>';print_r($hotel_booked_info);echo '</pre>';
		$data['city_name'] = $city_name;
		//echo '<pre>';print_r($hotel_pay_data);echo '</pre>';
		
		$dt = strtotime($data['vocher_date']);
		
		$data['vocher_date']= date('Y M d',$dt);
		// $this->voucher_email($data);
		$this->load->view('hotel/booking_confirm',$data);
		
	}
	
	public function voucher_email($data)
	{
			include('PHPMailer/class.phpmailer.php');
		
			$mail = new PHPMailer();
		
			$mail->Host='mail.provab.com';
			$mail->Port='25';
			$mail->Username   = 'christin@provab.com';
			$mail->Password   = 'provab123';
		
		
			$mail->SMTPKeepAlive = true;
			$mail->Mailer = "smtp";
			$mail->IsSMTP();
			$mail->IsHTML(true);
	//$pas_det = $_SESSION['passenger_det_info'];
	
			$msg='';
			$msg .= '<html>
			<head>

			</head>
			<body>
			<div >
 
    			<div >

   					<div>

   					<div>
                        <tr>
                            <td width="350" align="left" valign="top"><table style="font-size:15px;"width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                                  <tr>
                                    <td colspan="2" class="mid-txt" style="color:#fff; background-color:#99CC00; font-size:15px; text-align:center">Traveller Details</td>
                                  </tr>
                                  <tr>
                                    <td width="128">Guest Name</td>
                                    <td width="270">: Mr/Mrs '.$data['hotel_pay_data']['0']->first_name.'&nbsp;'.$data['hotel_pay_data']['0']->last_name.'</td>
                                  </tr>
                                  <tr>
                                    <td width="128">E-Mail</td>
                                    <td width="270">: '.$data['hotel_pay_data']['0']->email.'</td>
                                  </tr>
                                  <tr>
                                    <td>No. of Rooms</td>
                                    <td>: '.$data['hotel_booked_info']->no_of_rooms.' </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>Voucher Date</td>
                                    <td>: '.$data['vocher_date'].'</td>
                                  </tr>
                                  <tr>
                                    <td>Supplier</td>
                                    <td>: Provab</td>
                                  </tr>
                                </table>
                                </td>
                            <td width="350" align="left" valign="top"><table  style="font-size:15px;" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                                  <tr>
                                    <td colspan="2" class="mid-txt" style="color:#fff; font-size:15px; background-color:#99CC00;   text-align:center">Your Reservation</td>
                                  </tr>
                                  <tr>
                                    <td width="171">Check in Date</td>
                                    <td width="228">: '.$data['hotel_booked_info']->check_in.'</td>
                                  </tr>
                                  <tr>
                                    <td>Check out Date</td>
                                    <td>: '.$data['hotel_booked_info']->check_out.'</td>
                                  </tr>
                                  <tr>
                                    <td>Hotel Name</td>
                                    <td>: '.$data['hotel_booked_info']->hotel_name.' </td>
                                  </tr>
                                   <tr>
                                    <td>Nights</td>
                                    <td>: '.$data['hotel_booked_info']->no_of_nights.' </td>
                                  </tr>
                                   <tr>
                                    <td>Amount</td>
                                    <td>: Rs.'.$data['hotel_booked_info']->grand_total .'/-</td>
                                  </tr>
                                </table>
                                </td>
                        </tr>
		  
    		</div>
    		<table align="left" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold;
             background-color:#99CC00; border-radius:10px;">
      
                <tr>
                    <td width="200" align="left">Hotel Details</td>
                    <td  align="left">&nbsp;</td>
                </tr>
    		</table>
			<div style="clear:both"></div>
			
     		<table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; 
            font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      			<tr>
         			<td align="left">
  					<p class="mid-txt">'.$data['hotel_booked_info']->hotel_name.' 
 					</p>

                    <p>'.$data['hotel_booked_info']->description.'</p>
            		<br /> Address :       '.$data['hotel_booked_info']->address.'<br>City : '.$data['city_name'].'	<br>Phone :'.$data['hotel_booked_info']->phone.'
            		<br>Fax : '.$data['hotel_booked_info']->fax.'	
            
         			</td>
      			</tr>
   		 	</table>
    		<div style="clear:both"></div>
    
     		<table align="left" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; 
            font-weight:bold; background-color:#99CC00; border-radius:10px;">
    			  <tr>
                    <td width="200" align="left">Fare Summary</td>
                    <td  align="left">&nbsp;</td>
                   </tr>
    		</table>
			<div style="clear:both"></div>
     		<table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; 
    		 border:1px #bee7ff solid; border-radius:10px;">
      			<tr>
         			<td align="left">
         			<div style="width:700px; margin:0 auto;">
            
            		<div class="hotelfa-div" style="border:none">
            		<div style="width:150px; float:left;">Total Price:  </div>
                	<div style="width:550px; float:left" class="mid-txt">Rs.'.$data['hotel_booked_info']->grand_total .' /-</div>
                	</div>
                
           			 </div>
         			</td>
      			</tr>
    		</table>
    
    		<div style="clear:both"></div>
    		<table align="left" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; 
            font-weight:bold; background-color:#99CC00; border-radius:10px;">
              <tr>
                 <td width="200" align="left">Cancellation Policy</td>
                 <td  align="left">&nbsp;</td>
                 
              </tr>
    		</table>
			<div style="clear:both"></div>
     		<table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; 
     border:1px #bee7ff solid; border-radius:10px;">
      		<tr>
         		<td align="left">
                    <div style="width:700px; margin:0 auto;">
                    
                        <div class="hotelfa-div" style="border:none">
                        <div style="float:left;"></div>
                        </div>
                        
                    </div>
         		</td>
      		</tr>
       </table>
    
			<div style="clear:both"></div>
    
     		
    <div style="float:left; margin-top:25px;">
    	
    </div>
   
  </div>
  </div>
</div>
      
</body>
</html>
';
	
	//echo $msg;exit;
		$email_id = $data['hotel_pay_data']['0']->email;
		$name='Hotel Booking Voucher - goghoom.com';
		$mail->AddReplyTo('nirmala.provab@gmail.com',  'goghoom');
		$mail->AddAddress($email_id, $name);
		$mail->SetFrom('nirmala.provab@gmail.com', 'goghoom');
		$mail->Subject ='Hotel Booking Voucher - goghoom.com';
		
		
		$mail->Body			= $msg;										
		$mail->SMTPAuth		= true;                 // enable SMTP authentication
		$mail->CharSet		= 'utf-8';
		$mail->SMTPDebug	= 0;
		$mail->Send();
	
	}	
	
	public function my_account_page()
	{
		$this->load->view('hotel/my_account_page');
	}
	public function voucher_print($hotel_booking_info_id,$h_cus_contact_details_id)
	{
		$this->Hotel_Model->vocher_print($hotel_booking_info_id,$h_cus_contact_details_id);
		
		
	}

}

