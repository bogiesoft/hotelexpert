<?php 

class Hotel_model extends CI_Model {
		
	public function get_city_code($city_name_new)
	{
		 $this->db->select('*');
		 $this->db->from('global_cities');
		 $this->db->where('city_name',$city_name_new);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
			return '';			
		 }else{
		 
			$row=  $query->row();
			return $row->id;				
		}
	}
	public function delete_gta_temp_result($ses_id)
	{
		$this->db->where('session_id',$ses_id);	
		$this->db->delete('api_hotel_detail_t');	
	}
	public function delete_gta_temp_result1()
	{
		$where = "api = 'crs'";
		$this->db->delete('api_hotel_detail_t',$where);	
	}
	public function api_status_id()
	{
		 $this->db->select('api_name');
		 $this->db->from('api');
		 $this->db->where('active',1);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
				return '';
		}else{
				return $query->result();
		}

	}
	public function insert_crs_temp_result($sec_res,$api,$hotel_code,$room_code,$room_type,$selling_price,$final_price,$status_val,$totFinalPric,$adult,$child,$currencyv1,$city_code,$room_type_id,$cin,$cout,$no_of_rooms,$days_cnt)
	{ 
	
		$data = array('session_id'=>$sec_res,
						'api'=>$api,
						'hotel_code'=> 'CRS'.$hotel_code,
						'room_code'=>$room_code,
						'room_type'=>$room_type,
						'status'=>$status_val,
						'adult'=>$adult,
						'child'=>$child,
						'selling_price'=>$selling_price,
						'total_cost'=>$final_price,
						'total_final_price'=> $totFinalPric,
						'grand_total'=> $totFinalPric,
						'room_type_id'=> $room_type_id,
						'city'=>$city_code,
						'check_in'=>$cin,
						'check_out'=> $cout,
						'no_of_days'=> $days_cnt,
						'no_of_rooms'=>$no_of_rooms
						
						);
					//print '<pre />'; print_r($data);exit;
		$this->db->insert('api_hotel_detail_t',$data);
		//echo $this->db->last_query();exit;
		return $this->db->insert_id();
	}
	function fetch_search_result($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = 0, $maxStar = 5, $sorting='',$room_type='',$hotel_name_vals='',$fac = '',$hotel_location ='',$star_rating ='')
	{
		//echo $room_type.'facilities'.$fac;exit;
		//echo 'ss';exit;
		$display_perpage = 10;

		$start_pos = $display_perpage * ($page-1);
		
		
		$where = '';
		if($hotel_name_vals!='')
		{
			$where.= " AND p.hotel_name LIKE '$hotel_name_vals%' ";
		}
		
		
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal )";
		}
		

		$where.= " AND (0 BETWEEN $minStar AND 5)";
		
		if(isset($fac) && $fac!='')
		{
			$f = array('"');
			$fac_arr=$fac;
			// array_pop($fac_arr);
			// echo 'hai';
			// print_r($car_type);
			// die();
			$i=1;
			$facility_array_count=count($fac_arr);
			// echo $facility_array_count;
			//print '<pre />';print_r($fac_arr);exit;
			if($facility_array_count>0)
			{
				$where.=" AND ";
				$where.="(";
				foreach ($fac_arr as $facility_value)
				{
					if($facility_value!="")
					{
						//print_r($facility_array_count);

						if($i+1<=$facility_array_count)
						{
							$where.="p.hotel_facilities LIKE '%$facility_value%' AND ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="p.hotel_facilities LIKE '%$facility_value%'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		if(isset($room_type) && $room_type!='')
		{
			$f = array('"');
			$fac_arr=$room_type;
			// array_pop($fac_arr);
			// echo 'hai';
			// print_r($car_type);
			// die();
			$i=1;
			$facility_array_count=count($fac_arr);
			// echo $facility_array_count;
			//print '<pre />';print_r($fac_arr);exit;
			if($facility_array_count>0)
			{
				$where.=" AND ";
				$where.="(";
				foreach ($fac_arr as $facility_value)
				{
					if($facility_value!="")
					{
						//print_r($facility_array_count);

						if($i+1<=$facility_array_count)
						{
							$where.="t.room_type_id ='$facility_value' OR ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="t.room_type_id='$facility_value'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		if(isset($hotel_location) && $hotel_location!='')
		{
			$f = array('"');
			$near_location=$hotel_location;
			// array_pop($fac_arr);
			// echo 'hai';
			// print_r($car_type);
			// die();
			$i=1;
			$near_location_count=count($near_location);
			// echo $facility_array_count;
			//print '<pre />';print_r($fac_arr);exit;
			if($near_location_count>0)
			{
				$where.=" AND ";
				$where.="(";
				foreach ($near_location as $location_name)
				{
					if($location_name!="")
					{
						//print_r($facility_array_count);

						if($i+1<=$near_location_count)
						{
							$where.="p.hotel_nearest_location LIKE '%$location_name%' AND ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="p.hotel_nearest_location LIKE '%$location_name%'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		//$where =" AND p.star =";
		//$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
		$order = 'ORDER BY low_cost ASC';
		if (!empty($sorting)) {
			switch ($sorting) {
			case 'name_asc':
				$order = 'ORDER BY p.hotel_name, low_cost ASC';
				break;
			case 'name_desc':
				$order = 'ORDER BY p.hotel_name DESC, low_cost ASC';
				break;
			case 'star_asc':
				$order = 'ORDER BY p.star, low_cost ASC';
				break;
			case 'star_desc':
				$order = 'ORDER BY p.star DESC, low_cost ASC';
				break;
			case 'price_asc':
				$order = 'ORDER BY low_cost ASC';
				break;
			case 'price_desc':
				$order = 'ORDER BY low_cost DESC';
				break;
			//default :
			}
		}
		if ($star_rating != 0) {
		
			$where.= "AND (p.star = $star_rating)";
			// $where.= "AND (p.final_price>= $minVal AND p.final_price<=$maxVal)";
		}
		
		$where.= " AND `status` IN ('AVAILABLE', 'OK', 
			'Available', 'InstantConfirmation', 'true') ";
					if($_SESSION['hotel_name']!='' && isset($_SESSION['hotel_name']))
		{
		$where.= " AND p.hotel_name LIKE '".$_SESSION['hotel_name']."%'";	
		}
		$where.= "AND t.city = p.city  AND t.api = p.api ";
		/*if($_SESSION['hotel_name']!='' && isset($_SESSION['hotel_name']))
		{
		$where.= " AND p.hotel_name LIKE '%".$_SESSION['hotel_name']."%'";	
		}*/
		
		
	
	
				
				$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.selling_price) as lowest_selling_price,MAX(t.selling_price) as highest_selling_price, MIN(t.total_cost) as low_cost,MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code $order  LIMIT $start_pos, $display_perpage ";
		
		//chitta

		
		$query = $this->db->query($select);
	//echo $this->db->last_query();exit;
		
		if ($query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			
			$count = $count->result();

			 $data['totRow'] = $count[0]->rowcount;
		// echo $this->db->last_query();exit;
		// echo '<pre>';print_r($data);echo '</pre>';exit;
		/*if(($room_type!='' && $room_type!='+') || ($fac!='' && $fac!=''))  {
			$select2 = "SELECT MIN(t.total_cost) as minVal,MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code  AND t.session_id = '$ses_id' $where  $facility_where $rooom_where group by t.hotel_code";
		} else {*/
			//echo 'ss';exit;
			
			$select2 = "SELECT MIN(t.total_cost) as minVal ,MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND t.session_id = '$ses_id' $where";
				
		//	echo $select2; exit;*/
		/*}*/
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			//echo $this->db->last_query();exit;
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			//print_r($data);
			return $data;
		}
		//print_r($data);exit;
      return false;
	
	}
	
	public function get_near_by_city_name($sup_hotel_id)
	{
		 $this->db->select('*');
		 $this->db->from('sup_hotels');
		 $this->db->where('sup_hotel_id',$sup_hotel_id);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
				return '';
		}else{
				$row =  $query->row();
				return $row->near_by_area;
		}
	}
	public function get_global_cate_type()
	{
		$this->db->select('*');
		$this->db->from('global_room_category_type');
		$this->db->where('status',1);
		$query = $this->db->get();
		 if($query->num_rows() ==''){
				return '';
		}else{
				  
				return $query->result();
		}
	}
	public function get_cancel_attrib_new($result_id)
	{
			//echo $result_id;exit;
			$this->db->select('*');
			$this->db->from('api_hotel_detail_t');
			$this->db->where('api_temp_hotel_id',$result_id);
			
			$query=$this->db->get();
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->row();

			}
	}
	public function get_cancel_attrib_new_nerw($result_id,$idddss)
	{
			//echo $result_id;exit;
			$this->db->select('*');
			$this->db->from('api_permanent');
			$this->db->where('hotel_code',$result_id);
			
			$query=$this->db->get();
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				$a = $query->row();
                      $coun_val =  $a->coun;
					if($coun_val ==0)
					{
						$coun_valaa= $coun_val+substr($idddss,-2);
					}
					else
					{
						$coun_valaa= $coun_val+1;
					}
					  
					  $this->db->query("UPDATE api_permanent SET coun='$coun_valaa' WHERE hotel_code='$result_id'");
			}
	}
	public function get_searchresult($id)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('api_temp_hotel_id',$id);
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code and api_hotel_detail_t.city = api_permanent.city  and api_hotel_detail_t.api = api_permanent.api ');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }
		
	}
	public function get_facility_details_hotel($id)
	{
		//echo $id; exit;
		$hotel_code = explode('CRS',$id);
		$hotel_id = $hotel_code['1'];
		//print '<pre />';print_r($hotel_code);exit;
		$this->db->select('*');
		$this->db->from('sup_hotel_room_facilities');
		$this->db->where('sup_hotel_id',$hotel_id);
		$this->db->where('fac_type','hotel');
		$this->db->group_by("fac"); 
		$query = $this->db->get();	
//		echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  
		  return  $query->result(); 
		  }
		
	}
	public function get_sup_hotel($hotel_code)
	{
		//echo $result_id;exit;
			$this->db->select('*');
			$this->db->from('sup_hotels');
			$this->db->where('hotel_code',$hotel_code);
			
			$query=$this->db->get();
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->row();

			}
	}
	public function get_hotel_images($sup_hotel_id)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_images');
		$this->db->where('sup_hotel_id',$sup_hotel_id);
		$this->db->where('status',1);
			
		$query=$this->db->get();
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();

			}
	}
	
	public function get_hotel_extra_products($sup_hotel_id)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_extra_products');
		$this->db->where('sup_hotel_id',$sup_hotel_id);
		$this->db->where('status',1);
			
		$query=$this->db->get();
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();

			}
	}
	public function get_hotel_room_categorys($sup_hotel_id,$room_alloc_date,$room_vecate_date)
	{
			$where ='';
			$where .=" AND sh.city_name ='".$_SESSION['city']."'";	
			
			$where .=" AND mm.date BETWEEN '".$room_alloc_date."' AND '".$room_vecate_date."'";	
			
			$where .="AND mm.sup_hotel_id=".$sup_hotel_id."";
		
			$select ="SELECT count(*) as value, mm.sup_hotel_id,srt.global_room_category_type_id, sct.category_type
							FROM sup_room_maintain_month mm 
							INNER JOIN sup_hotels sh ON mm.sup_hotel_id = sh.sup_hotel_id
							INNER JOIN sup_hotel_room_details srt ON mm.sup_room_details_id = srt.sup_room_details_id
							INNER JOIN global_room_category_type sct ON srt.global_room_category_type_id = sct.global_room_category_type_id
							WHERE
							mm.status =1 AND mm.avilable_rooms >= $_SESSION[no_of_rooms] $where  GROUP BY srt.global_room_category_type_id ";
			//echo $select;exit;
			
			$query= $this->db->query($select);
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			}
	}
	public function fetch_crs_temp_result_room($ses_id,$hotel_code,$sup_hotel_id)
	{
		$this->db->select('*,MIN(total_cost) as min_cost');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->where('hotel_code',$hotel_code);
		$this->db->order_by("total_cost",'ASC'); 
		
		$this->db->group_by('room_code');
		$query = $this->db->get();	
	//	echo $this->db->last_query();exit;
		return $query->result();
	}
	public function get_hotel_room_name($room_code)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_room_details');
		$this->db->where('sup_room_details_id',$room_code);
		$query = $this->db->get();
		//	echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
				return '';
		}else{
				return $query->row();
				
		}	
	}
	public function get_global_amenities_list()
	{
		$this->db->select('*');
		$this->db->from('global_amenity_list');
		$this->db->where('status',1);
		$this->db->order_by('amenity_list_id','asc');
		$query = $this->db->get();
		//	echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
				return '';
		}else{
				return $query->result();
				 
		}	
	}
	public function get_global_location_list()
	{
		$this->db->select('*');
		$this->db->from('global_near_by_location');
		$this->db->where('status',1);
		$this->db->order_by('global_near_by_location_id','asc');
		$query = $this->db->get();
		//	echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
				return '';
		}else{
				return $query->result();
				 
		}	
	}
	public function hotel_refresh()
	{
		$this->db->select('*')
			->from('sup_hotels')
			->where('status', 1);
		$query = $this->db->get();
		$count = $query->num_rows; 
		foreach($query->result_array() as $row)
		{
			$api = 'crs';
			$hotel_code = 'CRS'.$row['sup_hotel_id'];
			$sup_hotel_id = $row['sup_hotel_id'];
			$hotel_name = $row['hotel_name'];
			$city = $row['city_name'];
			//$star = $row['star'];
			$description = $row['hotel_desc'];
			$near_by_area = $row['near_by_area'];
			$near_by_location = $row['near_by_attraction'];
			//$location = $row['detail_location'];
			$latitude = $row['latitude'];
			$longitude = $row['longitude'];
			$address = $row['hotel_address'];
			$phone = $row['main_phone_no'];
			$fax = $row['main_fax'];
			$email = $row['main_email'];
			//$web = $row['website'];
			$targetFile = '';
				$this->db->select('image_name')
				->from('sup_hotel_images')
				->where('sup_hotel_id', $row['sup_hotel_id'])
				->where('status', 1)
				->order_by('sup_hotel_images_id', 'desc');
				$query1 = $this->db->get();
				if($query1->num_rows() > 0)
				{
					$row1 = $query1->row();
					$targetFile = WEB_DIR.'supplier_hotels_images/'.$row1->image_name; 
				}else {
					
					$targetFile = '';
				}
				
				//echo $targetFile;exit;
				$room_facilities='';
				$this->db->select('sup_hotel_room_facilities.amenity_list_id as amenity_name')
				->from('sup_hotel_room_facilities')
				->where('sup_hotel_id', $row['sup_hotel_id']);
				$this->db->join('global_amenity_list', 'sup_hotel_room_facilities.amenity_list_id = global_amenity_list.amenity_list_id');
				
				$query2 = $this->db->get();
				//echo $this->db->last_query();exit;
				if($query2->num_rows() > 0){
				foreach($query2->result_array() as $row2)	{
					$room_facilities.= $row2['amenity_name'].','; 
				}
				} else { $room_facilities=''; };
				
				//print '<pre />';print_r($room_facilities);exit;
				$hotel_facilities='';
				$this->db->select('sup_hotel_facilities.amenity_list_id as amenity_name')
				->from('sup_hotel_facilities')
				->where('sup_hotel_id', $row['sup_hotel_id']);
				$this->db->join('global_amenity_list', 'sup_hotel_facilities.amenity_list_id = global_amenity_list.amenity_list_id');
				
				$query3 = $this->db->get();
				
				//echo $this->db->last_query();exit;
				if($query3->num_rows() > 0){
				foreach($query3->result_array() as $row3)	{
					$hotel_facilities.= $row3['amenity_name'].','; 
				}
				} else { $hotel_facilities=''; };
				
				$hotel_nearest_location ='';
				$this->db->select('sup_hotel_near_by_location.global_near_by_location_id as location_name')
				->from('sup_hotel_near_by_location')
				->where('sup_hotel_id', $row['sup_hotel_id']);
				$this->db->join('global_near_by_location', 'sup_hotel_near_by_location.global_near_by_location_id = global_near_by_location.global_near_by_location_id');
				
				$query4 = $this->db->get();
				//echo $this->db->last_query();exit;
				if($query4->num_rows() > 0){
				foreach($query4->result_array() as $row3)	{
					$hotel_nearest_location.= $row3['location_name'].','; 
				}
				} else { $hotel_nearest_location=''; };
			
			
			$hotelRating =$this->get_hotel_reviews($sup_hotel_id);
			
			if(isset($hotelRating[0])){
					if($hotelRating[0]->star_rating !=''){
						$x		= $hotelRating[0]->star_rating;
						
						$var 	= round($x,1);
						//echo $var;exit;
						$arr 	= explode('.',$var);
						//print '<pre />';print_r($arr);exit;
						if(isset($arr[1])){
							if($arr[1] <= 5){
								$arr[1] = 5;
								$star_rating = implode('.',$arr);
							}else{
								$star_rating = implode('.',$arr);
								$star_rating = ceil($star_rating);
							}
						} else {
							$star_rating = $arr[0];
						}

						// $star_rating			= round($carRating[0]->star_rating);
					} else {
						$star_rating			= '';
					}
				} 	
			//echo $star_rating;exit;
			$hotel_details = $this->check_hotel_permant($sup_hotel_id);		
			
			if(!empty($hotel_details))
			{
			$data = array(
						'api' => $api,
						'hotel_name' => $hotel_name,
						'city' => $city,
						'image' => $targetFile,
						'description' => $description,
						'latitude' => $latitude,
						'longitude' => $longitude,
						'address' => $address,
						'phone' => $phone,
						'email' => $email,
						'fax' => $fax,
						'room_facilities' => $room_facilities,
						'hotel_facilities' => $hotel_facilities,
						'near_by_location' => $near_by_location,
						'near_by_area' => $near_by_area,
						'hotel_nearest_location' => $hotel_nearest_location,
						'star' => $star_rating
						);
			$where ="sup_hotel_id = $sup_hotel_id";
		
			$this->db->update('api_permanent',$data,$where);
			$id = $this->db->insert_id();
			} else {
				
				$data = array(
						'api' => $api,
						'hotel_code' => $hotel_code,
						'hotel_name' => $hotel_name,
						'sup_hotel_id' => $sup_hotel_id,
						'city' => $city,
						'image' => $targetFile,
						'description' => $description,
						'latitude' => $latitude,
						'longitude' => $longitude,
						'address' => $address,
						'phone' => $phone,
						'email' => $email,
						'fax' => $fax,
						'room_facilities' => $room_facilities,
						'hotel_facilities' => $hotel_facilities,
						'near_by_location' => $near_by_location,
						'near_by_area' => $near_by_area,
						'hotel_nearest_location' => $hotel_nearest_location,
						'star' => $star_rating
			);
			
			
			//print '<pre />';print_r($data);exit;
			$this->db->insert('api_permanent',$data);
			$id = $this->db->insert_id();
			}
			
		}
	}
	
	public function get_hotel_reviews($sup_hotel_id)
	{
		$this->db->select_avg('star_rating');
		$this->db->from('sup_hotel_reviews');
		$this->db->where('sup_hotel_id',$sup_hotel_id);
		$this->db->where("status =1");
		$query = $this->db->get();
		 
		//echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}
	}
	public function check_hotel_permant($sup_hotel_id)
	{
		 $this->db->select('*');
		 $this->db->from('api_permanent');
		 $this->db->where('sup_hotel_id',$sup_hotel_id);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
			return '';			
		 }else{
		 
			return  $query->row();
							
		}
	}
	public function get_discount_parameters()
	{
		$this->db->select('*');
		$this->db->from('discount_parameters');
		
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
			
			// return $result = $query->row();
			
			
		}
	}
	function get_hotel_discounts($cust_type, $prdct, $selling_tot_amt, $days, $cin, $cout, $present_day, $city_id, $hotel_name,$room_type_id)
	{
		$result6='';
		
		$select5 = "select * from discount_rules where status=1 AND customer_type='B2C'  AND (from_date <= '$cin' AND to_date >= '$cout') AND (days<=$days OR days IS NULL)  AND (product='hotel' OR product IS NULL) AND (costs<=$selling_tot_amt OR costs IS NULL) AND (product_name ='$hotel_name' OR product_name IS NULL) AND (room_type= '$room_type_id' OR room_type IS NULL) AND (city=$city_id OR city IS NULL) ORDER BY discount_rate DESC limit 0,1";

		
		$query5 = $this->db->query($select5);
		
		// echo $this->db->last_query();exit;
		$result5 = $query5->result();
		
		if(empty($result5)){
			$select6 = "select * from discount_rules where status=1 AND customer_type='B2C'  AND ((from_date <= '$cin' AND to_date >= '$cin') OR (from_date <= '$cout' AND to_date >= '$cout')) AND (days<=$days OR days IS NULL)  AND (product='hotel' OR product IS NULL) AND (product_name ='$hotel_name' OR product_name IS NULL) AND (costs<=$selling_tot_amt OR costs IS NULL) AND (room_type= '$room_type_id' OR room_type IS NULL) AND (city=$city_id OR city IS NULL) ORDER BY discount_rate DESC ";
		
			$query6 = $this->db->query($select6);
			
			//echo $this->db->last_query();exit;
						
			$result6 = $query6->result();
		}	
		
		$data['x'] = $result5;
		$data['y'] = $result6;
		
		return $data;
			
	
	}
	public function get_hotel_room_ameenities($sup_hotel_id,$amenity_list_id,$room_code)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_room_facilities');
		$this->db->where('sup_hotel_id',$sup_hotel_id);
		$this->db->where('amenity_list_id',$amenity_list_id);
		$this->db->where('sup_room_details_id',$room_code);
		$this->db->where('status',1);
			
		$query=$this->db->get();
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				$row = $query->row();
				return $row->amenity_list_id;

			}
	}
	public function get_hotel_ameenities($sup_hotel_id,$amenity_list_id)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_facilities');
		$this->db->where('sup_hotel_id',$sup_hotel_id);
		$this->db->where('amenity_list_id',$amenity_list_id);
		$this->db->where('status',1);
			
		$query=$this->db->get();
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				$row = $query->row();
				return $row->amenity_list_id;

			}
	}
	public function get_hotel_prices_by_dates($sup_hotel_room_period_details_id,$cin, $cout,$no_of_rooms)
	{
		$this->db->select('date,selling_price');
		$this->db->from('sup_room_maintain_month');
		$this->db->where('sup_hotel_room_period_details_id',$sup_hotel_room_period_details_id);
		$this->db->order_by("date", "asc"); 
		// $this->db->where('status',1);
		/*	$this->db->where("date BETWEEN '$cin' AND '$cout'");	*/
			/*$this->db->where("date<=$cin AND date>=$cout");	*/
		$this->db->where('date >=',$cin);
		$this->db->where('date <',$cout);
		$query = $this->db->get();
		 
		//echo  $this->db->last_query();exit;
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}

	}
	
	public function add_review()
	{
		 $data=array(	
			'sup_hotel_id'=>$this->input->post('id'),		 
			'user_name'		=> $this->input->post('name'),
			'user_review'	=> $this->input->post('review'),
			'city'    => $this->input->post('city'),
			'star_rating'	=> $this->input->post('rating'),
			'date' => date('Y-m-d'),
			'status'=>'0',
		  );
		$result = $this->db->insert('sup_hotel_reviews',$data);
		return $result;
	}
	
	public function get_review($id)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_reviews');
		$this->db->where('sup_hotel_id',$id);
		$query=$this->db->get();
	
		if ($query->num_rows() > 0)
		{
			$result =  $query->result_array();
			return $result;
		}else{
			
			return '';

		}
	}
	
	public function fetch_city()
	{
		$this->db->select('*');
		$this->db->from('global_cities');
		$query=$this->db->get();
	
		if ($query->num_rows() > 0)
		{
			$result =  $query->result_array();
			return $result;
		}else{			
			return '';
		}
	}
	public function get_minimum_cost_of_hotel($hotel_code,$SessId)
	{
		$this->db->select('*,MIN(total_cost) as min_cost,MIN(selling_price) as min_selling_price,MIN(total_final_price) as min_total_final_price');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('hotel_code',$hotel_code);
		$this->db->where('session_id',$SessId);
		$this->db->group_by('hotel_code');
		$this->db->order_by('total_cost','desc');
		$query=$this->db->get();
	
		if ($query->num_rows() > 0)
		{
			$result =  $query->row();
			return $result;
		}else{
			
			return '';

		}
		
	}
	public function get_hotel_room_temp_details($api_temp_hotel_id)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('api_temp_hotel_id',$api_temp_hotel_id);
		$query=$this->db->get();
	
		if ($query->num_rows() > 0)
		{
			$result =  $query->row();
			return $result;
		}else{
			
			return '';

		}
	}
	 public function get_hotel_add_cart_details_by_para($sessId,$api_temp_hotel_id,$products_id)
	 {
		   $this->db->select('*');
		   // $this->db->select_sum('sub_total');
		   $this->db->from('add_cart_hotel');
		   $this->db->where('session_id',$sessId);
		   $this->db->where('api_temp_hotel_id',$api_temp_hotel_id);
		   $this->db->where('product_id',$products_id);
		   $this->db->where('status','1');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			} else{
				return $query->result();				
			}
	  }
	  public function add_cart_to_hotel($sessId, $api_temp_hotel_id, $products_id, $products_name, $quanity, $payment_mode,$sub_total)
	  {
		   $data =array(
				'session_id' => $sessId,
				'api_temp_hotel_id'	=> $api_temp_hotel_id,
				'product_id'	=> $products_id,
				'product_name' => $products_name,
				'quantity'   => $quanity,
				'payment_mode' =>$payment_mode,
				'sub_total' => $sub_total,
				'status'    =>'1',
		         );
				 
			//print '<pre />';print_r($data);exit;
		     $this->db->insert('add_cart_hotel',$data);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	  }
	  public function update_cart_to_hotel($sessId,$api_temp_hotel_id, $products_id, $quanity, $sub_total)
	  {
		   $data =array(
				'quantity'   => $quanity,
				'sub_total' => $sub_total,
		         );
				 
			$where =array(
				'session_id'   => $sessId,
				'api_temp_hotel_id'   => $api_temp_hotel_id,
				'product_id'   => $products_id,
				);
						 
		     $this->db->update('add_cart_hotel',$data,$where);
			 // echo  $this->db->last_query();exit;
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function get_hotel_add_cart_sum($sessId, $api_temp_hotel_id)
	   {
		   $this->db->select_sum('sub_total','subTotal');
		   $this->db->from('add_cart_hotel');
		   $this->db->where('session_id',$sessId);
		   $this->db->where('api_temp_hotel_id',$api_temp_hotel_id);
		   $this->db->where('status','1');
		   $query = $this->db->get();
		   
		  // echo  $this->db->last_query();exit;
		   if($query->num_rows() ==''){
				return '';			
			}else{
				return $query->result();				
			}
	   }
	   public function update_api_hotel_details($sessId, $hotel_code, $grand_total,$api_temp_hotel_id)
	   {
		   $data =array(
				'grand_total'   => $grand_total,
		         );
				 
			$where =array(
				'session_id'   => $sessId,
				'hotel_code'   => $hotel_code,
				'api_temp_hotel_id'   => $api_temp_hotel_id,
				);
				 
			 
		     $this->db->update('api_hotel_detail_t',$data,$where);
			 
			 
			 $id=$this->db->insert_id();
			 // echo  $id;exit;
			if(!empty($id))
		  	{
			 	return $id;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function get_hotel_add_cart_details($sessId, $api_temp_hotel_id)
	   {
		   $this->db->select('*');
		   $this->db->from('add_cart_hotel');
		   $this->db->where('session_id',$sessId);
		   $this->db->where('api_temp_hotel_id',$api_temp_hotel_id);
		   $this->db->where('status','1');
		   $query = $this->db->get();
		   
		  // echo  $this->db->last_query();exit;
		   if($query->num_rows() ==''){
				return '';			
			}else{
				return $query->result();				
			}
	   }
	   public function get_hotel_add_cart_details_by_Id($id)
	   {
			$this->db->select('*');
		   // $this->db->select_sum('sub_total');
		   $this->db->from('add_cart_hotel');
		   $this->db->where('id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			} else{
				return $query->result();				
			}
		}
		public function delete_added_cart($id)
		{
			$where = "id = $id";
			$this->db->delete('add_cart_hotel', $where);
		}
		function fetch_search_result_for_page2($ses_id, $page, $minVal = '', $maxVal = '', $minStar = 0, $maxStar = 5, $sorting='',$room_type='',$hotel_name_vals='',$fac = '',$hotel_location ='',$star_rating='')
	{
		//echo $room_type.'facilities'.$fac;exit;
		//echo 'ss';exit;
		$display_perpage = 1;

		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if($hotel_name_vals!='')
		{
			$where.= " AND p.hotel_name LIKE '$hotel_name_vals%' ";
		}
		
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal )";
		}
		

	
		$where.= " AND (0 BETWEEN $minStar AND 5)";
		
		if(isset($fac) && $fac!='')
		{
			$f = array('"');
			$fac_arr=$fac;
			// array_pop($fac_arr);
			// echo 'hai';
			// print_r($car_type);
			// die();
			$i=1;
			$facility_array_count=count($fac_arr);
			// echo $facility_array_count;
			//print '<pre />';print_r($fac_arr);exit;
			if($facility_array_count>0)
			{
				$where.=" AND ";
				$where.="(";
				foreach ($fac_arr as $facility_value)
				{
					if($facility_value!="")
					{
						//print_r($facility_array_count);

						if($i+1<=$facility_array_count)
						{
							$where.="p.hotel_facilities LIKE '%$facility_value%' AND ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="p.hotel_facilities LIKE '%$facility_value%'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		if(isset($room_type) && $room_type!='')
		{
			$f = array('"');
			$fac_arr=$room_type;
			// array_pop($fac_arr);
			// echo 'hai';
			// print_r($car_type);
			// die();
			$i=1;
			$facility_array_count=count($fac_arr);
			// echo $facility_array_count;
			//print '<pre />';print_r($fac_arr);exit;
			if($facility_array_count>0)
			{
				$where.=" AND ";
				$where.="(";
				foreach ($fac_arr as $facility_value)
				{
					if($facility_value!="")
					{
						//print_r($facility_array_count);

						if($i+1<=$facility_array_count)
						{
							$where.="t.room_type_id ='$facility_value' OR ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="t.room_type_id='$facility_value'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		if(isset($hotel_location) && $hotel_location!='')
		{
			$f = array('"');
			$near_location=$hotel_location;
			// array_pop($fac_arr);
			// echo 'hai';
			// print_r($car_type);
			// die();
			$i=1;
			$near_location_count=count($near_location);
			// echo $facility_array_count;
			//print '<pre />';print_r($fac_arr);exit;
			if($near_location_count>0)
			{
				$where.=" AND ";
				$where.="(";
				foreach ($near_location as $location_name)
				{
					if($location_name!="")
					{
						//print_r($facility_array_count);

						if($i+1<=$near_location_count)
						{
							$where.="p.hotel_nearest_location LIKE '%$location_name%' AND ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="p.hotel_nearest_location LIKE '%$location_name%'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		//$where =" AND p.star =";
		//$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
		$order = 'ORDER BY low_cost ASC';
		if (!empty($sorting)) {
			switch ($sorting) {
			case 'name_asc':
				$order = 'ORDER BY p.hotel_name, low_cost ASC';
				break;
			case 'name_desc':
				$order = 'ORDER BY p.hotel_name DESC, low_cost ASC';
				break;
			case 'star_asc':
				$order = 'ORDER BY p.star, low_cost ASC';
				break;
			case 'star_desc':
				$order = 'ORDER BY p.star DESC, low_cost ASC';
				break;
			case 'price_asc':
				$order = 'ORDER BY low_cost ASC';
				break;
			case 'price_desc':
				$order = 'ORDER BY low_cost DESC';
				break;
			//default :
			}
		}
		$where.= " AND `status` IN ('AVAILABLE', 'OK', 
			'Available', 'InstantConfirmation', 'true') ";
					if($_SESSION['hotel_name']!='' && isset($_SESSION['hotel_name']))
		{
		$where.= " AND p.hotel_name LIKE '".$_SESSION['hotel_name']."%'";	
		}
		$where.= "AND t.city = p.city  AND t.api = p.api ";
		/*if($_SESSION['hotel_name']!='' && isset($_SESSION['hotel_name']))
		{
		$where.= " AND p.hotel_name LIKE '%".$_SESSION['hotel_name']."%'";	
		}*/
		
		
		if ($star_rating != 0) {
		
			$where.= "AND (p.star = $star_rating)";
			// $where.= "AND (p.final_price>= $minVal AND p.final_price<=$maxVal)";
		}
	
				
				$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.selling_price) as lowest_selling_price,MAX(t.selling_price) as highest_selling_price, MIN(t.total_cost) as low_cost,MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code $order LIMIT $start_pos, $display_perpage";
		
		//chitta

		
		$query = $this->db->query($select);
	//echo $this->db->last_query();exit;
		
		if ($query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
			
			
			return $data;
		}
		//print_r($data);exit;
      return false;
	
	}		
	
	
	public function get_reviews($sup_hotel_id)
	{
		 $this->db->select('*');
		 $this->db->from('sup_hotel_reviews');
		 $this->db->where('sup_hotel_id',$sup_hotel_id);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
				return '';
		}else{
			$review['result'] = $query->result();
			$review['counts'] = $query->num_rows();
			return $review;
		}
	}
	public function get_hotel_pay_details_by_para($api_temp_hotel_id,$user_name,$email)
	{
		 $this->db->select('*');
		 $this->db->from('hotel_customer_contact_details');
		 $this->db->where('api_temp_hotel_id ',$api_temp_hotel_id );
		 $this->db->where('status',0);
		 $this->db->where('email',$email);
		 $this->db->like('first_name ',$user_name);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
				return '';
		}else{
			return $query->result();
		}
	}
	 public function insert_into_hotel_pay_details($user_id,$api_temp_hotel_id, $username, $payAmt,$email,$lname,$city,$zip_code,$state,$mobile_no,$office_phone,$fax)
	 {
		   $data =array(
				'user_id' 				=> $user_id,
				'api_temp_hotel_id'		=> $api_temp_hotel_id,
				'first_name'			=> $username,
				'last_name'				=> $lname,
				'email' 				=> $email,
				'city'    				=> $city,
				'zip_code' 				=> $zip_code,
				'state'					=> $state,
				'mobile_no' 			=> $mobile_no,
				'office_phone'  		=> $office_phone,
				'fax'  					=> $fax,
				'amount' 				=> $payAmt,
				'status'    			=>'0',
		         );
				 
			//print '<pre />';print_r($data);exit;
		     $this->db->insert('hotel_customer_contact_details',$data);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return $id;
			 }
			else {
				  
				  return false;
			  }
	  }
	   public function update_hotel_pay_details($h_cus_contact_details_id,$user_id,$user_name,$usdAmt,$email,$lname,$city,$zip_code,$state,$mobile_no,$office_phone,$fax)
	   {
		   $data =array(
				'user_id' 				=> $user_id,
				'first_name'			=> $user_name,
				'last_name'				=> $lname,
				'email' 				=> $email,
				'city'    				=> $city,
				'zip_code' 				=> $zip_code,
				'state'					=> $state,
				'mobile_no' 			=> $mobile_no,
				'office_phone'  		=> $office_phone,
				'fax'  					=> $fax,
				'amount' 				=> $usdAmt,
		         );
				 
			//print '<pre />';print_r($data);exit;
			$where =array(
				'h_cus_contact_details_id'   => $h_cus_contact_details_id
				);
						 
		     $this->db->update('hotel_customer_contact_details',$data,$where);
			 //echo  $this->db->last_query();exit;
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function update_hotel_pay_details_by_id($h_cus_contact_details_id,$booking_number)
	   {
		   $data =array(
				'status'   => 1,
				'booking_number'=> $booking_number
		         );
				 
			$where =array(
				'h_cus_contact_details_id'   => $h_cus_contact_details_id,
				);
						 
		     $this->db->update('hotel_customer_contact_details',$data,$where);
			 // echo  $this->db->last_query();exit;
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function insert_hotel_booked_details($h_cus_contact_details_id,$api_temp_hotel_id)
	   {
		  
		   $service = $this->get_searchresult($api_temp_hotel_id);
		   
		   //echo '<pre />';print_r($service); echo '<pre />';//exit;
		   
		   $check_data = $this->check_hotel_booking_info($h_cus_contact_details_id,$api_temp_hotel_id);
		   
		  // echo '<pre />';print_r($check_data); echo '<pre />';//exit;
		   if(empty($check_data))
		   {
			   $data   =     array(
							'h_cus_contact_details_id'  => $h_cus_contact_details_id,
							'check_in'  				=> $service->check_in,
							'check_out' 				=> $service->check_out,
							'hotel_code' 				=> $service->hotel_code,
							'hotel_name'  				=> $service->hotel_name,
							'sup_hotel_id'  			=> $service->sup_hotel_id,
							'image'  					=> $service->image,
							'selling_price'  			=> $service->selling_price,
							'total_cost'  				=> $service->total_cost,
							'total_final_price'  		=> $service->total_final_price,
							'grand_total'  				=> $service->grand_total,
							'near_by_area'  			=> $service->near_by_area,
							'near_by_location'  		=> $service->near_by_location,
							'city'  					=> $service->city,
							'room_type'  				=> $service->room_type,
							'room_code'  				=> $service->room_code,
							'star'  					=> $service->star,
							'address'  					=> $service->address,
							'no_of_rooms'  				=> $service->no_of_rooms,
							'no_of_nights'  			=> $service->no_of_days,
							'adult'  					=> $service->adult,
							'child'  					=> $service->child,
							'description'  				=> $service->description,
							'phone'  					=> $service->phone,
							'fax'  						=> $service->fax,
							'api'  						=> $service->api,	
							'api_temp_hotel_id'  		=> $service->api_temp_hotel_id,	
							'session_id'  				=> $service->session_id,	
			   
							);
					
			//echo '<pre />';print_r($data); echo '<pre />';//exit;
		     $this->db->insert('hotel_booking_info',$data);
			  $id = $this->db->insert_id();
			
		   } else {
			   
			   $check_data->hotel_booking_info_id;
			   $data   =     array(
			   				'h_cus_contact_details_id' => $h_cus_contact_details_id,
							'check_in'  				=> $service->check_in,
							'check_out' 				=> $service->check_out,
							'hotel_code' 				=> $service->hotel_code,
							'hotel_name'  				=> $service->hotel_name,
							'image'  					=> $service->image,
							'sup_hotel_id'  			=> $service->sup_hotel_id,
							'selling_price'  			=> $service->selling_price,
							'total_cost'  				=> $service->total_cost,
							'total_final_price'  		=> $service->total_final_price,
							'grand_total'  				=> $service->grand_total,
							'near_by_area'  			=> $service->near_by_area,
							'near_by_location'  		=> $service->near_by_location,
							'city'  					=> $service->city,
							'room_type'  				=> $service->room_type,
							'room_code'  				=> $service->room_code,
							'star'  					=> $service->star,
							'address'  					=> $service->address,
							'no_of_rooms'  				=> $service->no_of_rooms,
							'no_of_nights'  			=> $service->no_of_days,
							'adult'  					=> $service->adult,
							'child'  					=> $service->child,
							'description'  				=> $service->description,
							'phone'  					=> $service->phone,
							'fax'  						=> $service->fax,
							'api'  						=> $service->api,		
							'session_id'  				=> $service->session_id,
							'api_temp_hotel_id' 		=> $service->api_temp_hotel_id,	
			   
							);
							
				$where = array( 
								'hotel_booking_info_id' 	=>  $check_data->hotel_booking_info_id
								);
								
				$this->db->update('hotel_booking_info',$data,$where);
				
				 $id = $check_data->hotel_booking_info_id;
		   }
		   
		   return $id;
	   }
	   public function check_hotel_booking_info($h_cus_contact_details_id,$api_temp_hotel_id)
	   {
		   	 $this->db->select('*');
			 $this->db->from('hotel_booking_info');
			 $this->db->where('api_temp_hotel_id ',$api_temp_hotel_id );
		 	 $this->db->where('h_cus_contact_details_id',$h_cus_contact_details_id);
		     $query = $this->db->get();
			 
			// echo $this->db->last_query();exit;
		     if($query->num_rows() ==''){
							return '';
			}else{
					return $query->row();
			}
	   }
	   public function get_hotel_booked_details($hotel_booking_info_id)
	   {
		   	 $this->db->select('*');
			 $this->db->from('hotel_booking_info');
			 $this->db->where('hotel_booking_info_id ',$hotel_booking_info_id);
		     $query = $this->db->get();
			 
			// echo $this->db->last_query();exit;
		     if($query->num_rows() ==''){
							return '';
			}else{
					return $query->row();
			}
	   }
	   public function get_hotel_booked_details_by_apiId($h_cus_contact_details_id)
	   {
				$this->db->select('*');
				$this->db->from('hotel_booking_info');
				$this->db->where('h_cus_contact_details_id ',$h_cus_contact_details_id);
				$query = $this->db->get();
				
				
				$res	= $query->result();
				// echo $res;exit;
				 if($query->num_rows() ==''){
							return '';
				}else{
						return $query->row();
				}
		}
	   public function update_sup_hotel_inv_list($sup_hotel_id,$check_in,$check_out,$no_of_rooms,$room_code)
	   {

		$this->db->select('*');
		$this->db->from('sup_room_maintain_month');
		$this->db->where('sup_hotel_id ',$sup_hotel_id);
		$this->db->where('sup_room_details_id',$room_code);
		$this->db->where('date >=',$check_in);
		$this->db->where('date <',$check_out);

		$query = $this->db->get();

		$resAr	= $query->result();


		 //echo '<pre>';print_r($resAr);echo '</pre>';exit;
		for($i=0; $i<count($resAr); $i++) {

			$roomsCnt	= $resAr[$i]->avilable_rooms - $no_of_rooms;
			
			$data = array(
				'avilable_rooms'   => $roomsCnt
			);

			$where =array(
				'sup_room_maintain_month_id'   => $resAr[$i]->sup_room_maintain_month_id,
			);

			$this->db->update('sup_room_maintain_month',$data,$where);
			//echo  $this->db->last_query();exit;
			$id=$this->db->insert_id();
		}

		return true;

	}
	public function get_hotel_pay_details_by_id($h_cus_contact_details_id)
	{
		 $this->db->select('*');
		 $this->db->from('hotel_customer_contact_details');
		 $this->db->where('h_cus_contact_details_id ',$h_cus_contact_details_id);
		 $this->db->where('status',1);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
				return '';
		}else{
			return $query->result();
		}
	}	
	public function get_city_name_by_code($id)
	{
		 $this->db->select('*');
		 $this->db->from('global_cities');
		 $this->db->where('id',$id);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
				return '';
		}else{
			$row = $query->row();
			return $row->city_name;
		}
	}
	public function vocher_print($hotel_booking_info_id,$h_cus_contact_details_id)
	{
		$this->db->select('*');
		$this->db->from('hotel_customer_contact_details');
		$this->db->where('hotel_booking_info_id',$hotel_booking_info_id);
		$this->db->where('h_cus_contact_details_id',$h_cus_contact_details_id);
		$this->db->join('hotel_booking_info', 'hotel_customer_contact_details.h_cus_contact_details_id = hotel_booking_info.h_cus_contact_details_id');
		$query = $this->db->get();
		echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
	}
	
	
}
