<?php 

class common_model extends CI_Model {

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
	public function get_villa_id($cityVal,$sd,$ed){
	//echo $ed; exit;
		$this->db->select('*');
		$this->db->from('sup_villas');
		$this->db->where('city_name',$cityVal);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
			return '';			
		 }else{
		 
			$row=  $query->result_array();
			foreach($row as $res){
				$this->db->select('*');
				$this->db->from('sup_villa_room_maintain_month');
				$this->db->where('sup_villa_id',$res['sup_villa_id']);
				$this->db->where("date between '$sd' and '$ed'"); 
				$query1 = $this->db->get();
				$row1 =  $query1->result_array();
			   print_r($row1);
				
			}
				
			return array('result',$row1);	
		
		}
	}
	public function delete_crs_temp_result($ses_id)
	{
		$this->db->where('session_id',$ses_id);	
		$this->db->delete('api_villa_detail_t');	
	}
	 public function villa_refresh()
	{
		 $where = "api = 'crs'";
		
		
		$this->db->select('*')
			->from('sup_villas')
			->where('status', 1);
		$query = $this->db->get();
		$count = $query->num_rows; 
		foreach($query->result_array() as $row)
		{
			$api = 'crs';
			$villa_code = $row['sup_villa_id'];
			$sup_villa_id = $row['sup_villa_id'];
			$villa_name = $row['villa_name'];
			$city = $row['city_name'];
			$near_by_area = $row['near_by_area'];
			$near_by_location = $row['near_by_attraction'];
			//$star = $row['star'];
			$description = $row['villa_desc'];
			//$location = $row['detail_location'];
			$latitude = $row['latitude'];
			$longitude = $row['longitude'];
			$address = $row['villa_address'];
			$phone = $row['main_phone_no'];
			$fax = $row['main_fax'];
			$email = $row['main_email'];
			//$web = $row['website'];
			$targetFile = '';
				$this->db->select('image_name')
				->from('sup_villa_images')
				->where('sup_villa_id', $row['sup_villa_id'])
				->where('status', 1)
				->order_by('sup_villa_images_id', 'desc');
				$query1 = $this->db->get();
				
				
				if($query1->num_rows() > 0)
				{
					$row1 = $query1->row();
					$targetFile = WEB_DIR.'supplier_villas_images/'.$row1->image_name; 
				} else {
					
					$targetFile = '';
				}
				$villa_facilities='';
				$this->db->select('sup_villa_facilities.amenity_list_id as amenity_name')
				->from('sup_villa_facilities')
				->where('sup_villa_id', $row['sup_villa_id']);
				$this->db->join('global_amenity_list', 'sup_villa_facilities.amenity_list_id = global_amenity_list.amenity_list_id');
				
				$query2 = $this->db->get();
				//echo $this->db->last_query();exit;
				if($query2->num_rows() > 0){
				foreach($query2->result_array() as $row2)	{
					$villa_facilities.= $row2['amenity_name'].','; 
				}
				} else { $villa_facilities=''; };
				
				
				
				$villa_nearest_location='';
				$this->db->select('sup_villa_near_by_location.global_near_by_location_id  as location_name')
				->from('sup_villa_near_by_location')
				->where('sup_villa_id', $row['sup_villa_id']);
				$this->db->join('global_near_by_location', 'sup_villa_near_by_location.global_near_by_location_id = global_near_by_location.global_near_by_location_id');
				
				$query2 = $this->db->get();
				//echo $this->db->last_query();exit;
				if($query2->num_rows() > 0){
				foreach($query2->result_array() as $row2)	{
					$villa_nearest_location.= $row2['location_name'].','; 
				}
				} else { $villa_nearest_location=''; };
				
				//print '<pre />';print_r($room_facilities);exit;
			
			$villaRating =$this->get_villa_reviews($sup_villa_id);
			
			if(isset($villaRating[0])){
					if($villaRating[0]->star_rating !=''){
						$x		= $villaRating[0]->star_rating;
						
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
			$villa_details = $this->check_villa_permant($sup_villa_id);	
			
			if(!empty($villa_details))
			{
				$data = array(
							'api' => $api,
							'villa_name' => $villa_name,
							'city' => $city,
							'image' => $targetFile,
							'description' => $description,
							'latitude' => $latitude,
							'longitude' => $longitude,
							'address' => $address,
							'phone' => $phone,
							'email' => $email,
							'fax' => $fax,
							'near_by_area' => $near_by_area,
							'near_by_location' => $near_by_location,
							'villa_nearest_location' => $villa_nearest_location,
							'villa_facilities' => $villa_facilities,
							'star' => $star_rating
							
				);
				//print '<pre />';print_r($data);exit;
				$where ="sup_villa_id = $sup_villa_id";
				$this->db->update('api_permanent_villa',$data,$where);
			
			} else {
			
			$data1 = array(
							'api' => $api,
							'villa_code' => $villa_code,
							'villa_name' => $villa_name,
							'sup_villa_id' => $sup_villa_id,
							'city' => $city,
							'image' => $targetFile,
							'description' => $description,
							'latitude' => $latitude,
							'longitude' => $longitude,
							'address' => $address,
							'phone' => $phone,
							'email' => $email,
							'fax' => $fax,
							'near_by_area' => $near_by_area,
							'near_by_location' => $near_by_location,
							'villa_nearest_location' => $villa_nearest_location,
							'villa_facilities' => $villa_facilities,
							'star' => $star_rating
							
				);
			$this->db->insert('api_permanent_villa',$data1);
			$id = $this->db->insert_id();
			}
		}
	}
	
	public function get_villa_reviews($sup_villa_id)
	{
		$this->db->select_avg('star_rating');
		$this->db->from('sup_villa_reviews');
		$this->db->where('sup_villa_id',$sup_villa_id);
		$this->db->where("status =1");
		$query = $this->db->get();
		 
		//echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}
	}
	public function insert_crs_temp_result($sec_res,$api,$villa_code,$status_val,$adult,$child,$currencyv1,$city_code,$checkin,$checkout,$selling_price,$final_price,$totFinalPric,$number_of_rooms,$days_cnt)
	{ 
	
		$data = array(  'session_id'=>$sec_res,
						'api'=>$api,
						'villa_code'=> $villa_code,
						'status'=>$status_val,
						'adult'=>$adult,
						'child'=>$child,
						'xml_currency'=>$currencyv1,
						'total_cost'=>$final_price,
						'selling_price'=> $selling_price,
						'city'=>$city_code,
						'check_out'=>$checkout,
						'check_in'=>$checkin,
						'total_final_price'=>$totFinalPric,
						'grand_total'=>$totFinalPric,
						'no_of_rooms'=>$number_of_rooms,
						'no_of_days'=>$days_cnt
						);
					//print '<pre />'; print_r($data);exit;
		$this->db->insert('api_villa_detail_t',$data);
		//echo $this->db->last_query();exit;
		return $this->db->insert_id();
	}
	public function check_villa_permant($sup_villa_id)
	{
		 $this->db->select('*');
		 $this->db->from('api_permanent_villa');
		 $this->db->where('sup_villa_id',$sup_villa_id);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
			return '';			
		 }else{
		 
			return  $query->row();
							
		}
	}
	public function fetch_search_result($ses_id, $page=1, $minVal = '', $maxVal = '', $facilities='', $villa_name_val='',$villa_nearest_location='',$star_rating='') 
	{
	
		
		$display_perpage = 1;

		$start_pos = $display_perpage * ($page-1);
		$where = '';
		
		if(isset($facilities) && $facilities!='')
		{
			$f = array('"');
			$fac_arr=$facilities;
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
							$where.="p.villa_facilities LIKE '%$facility_value%' AND ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="p.villa_facilities LIKE '%$facility_value%'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		if(isset($villa_nearest_location) && $villa_nearest_location!='')
		{
			$f = array('"');
			$near_location=$villa_nearest_location;
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
							$where.="p.villa_nearest_location LIKE '%$location_name%' AND ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="p.villa_nearest_location LIKE '%$location_name%'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		if($villa_name_val!='' || $villa_name_val!='+')
		{
			// echo $car_name_vals;exit;
			$where.= " AND p.villa_name LIKE '$villa_name_val%' ";
		}
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if ($star_rating != 0) {
		
			$where.= "AND (p.star = $star_rating)";
		}
		$order = 'ORDER BY low_cost ASC';
		
		$where.= " AND `status` IN ('AVAILABLE', 'OK', 
			'Available', 'InstantConfirmation', 'true') ";
		
	
		$where.= "AND t.city = p.city  AND t.api = p.api ";
		/*$config = array();
		$config["base_url"] =  base_url()."index.php/villa/search/";
		$config["per_page"] = $limit = 3;
		$config["uri_segment"] = $page1= 3;*/

		//$page1 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost,MAX(t.total_cost) as high_cost FROM api_villa_detail_t t, api_permanent_villa p WHERE t.villa_code = p.villa_code AND session_id = '$ses_id' $where GROUP BY t.villa_code $order LIMIT $start_pos, $display_perpage";
		$query = $this->db->query($select);
		//echo $this->db->last_query();exit;
		
		if ($query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();
			
			$data['totRow'] = $count[0]->rowcount;
			
			/*$config["total_rows"] = $count[0]->rowcount;
			
			$this->pagination->initialize($config);		*/	
			
			$select2 = "SELECT MIN(t.total_cost) as minVal ,MAX(t.total_cost) as maxVal FROM api_villa_detail_t t, api_permanent_villa p WHERE t.villa_code = p.villa_code AND t.session_id = '$ses_id' $where";

			//$this->db->limit($config["per_page"],$page1);
			$query2 = $this->db->query($select2);
			//echo $this->db->last_query();exit;
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			/*$data["links"] = $this->pagination->create_links();*/
			//$data['totRow'] = $result2[0]->totRow;
			//print_r($data);
			return $data;
		}
		//print_r($data);exit;
      return false;
	
	
	}
	public function get_count_of_room_amenities($amenity_list_id,$ses_id,$checkin_date,$checkout_date,$number_of_rooms)
	{
		
		$check = explode('-',$checkin_date);
		$check_in = $check['2'].'-'. $check['1'].'-'.$check['0'];
		
		$check1 = explode('-',$checkout_date);
		$check_out = $check1['2'].'-'. $check1['1'].'-'.$check1['0'];
		
		//
		//echo $number_of_rooms;
		 $this->db->select('*');
		 $this->db->from('api_villa_detail_t as t');
		 $this->db->join('api_permanent_villa as p', 't.villa_code = p.villa_code');
		 $this->db->where('t.check_in',$check_in);
		 $this->db->where('t.check_out',$check_out);
		 $this->db->where('t.session_id',$ses_id);
		  $this->db->like('p.villa_facilities',$amenity_list_id);
		 $this->db->where('t.no_of_rooms',$number_of_rooms);
		 $this->db->group_by('t.villa_code');
		 $query = $this->db->get();
		 
		// echo $this->db->last_query();
		return $query->num_rows();
	}
	
	public function fetch_search_result_for_page2($ses_id, $page, $minVal = '', $maxVal = '', $facilities='', $villa_name_val='',$villa_nearest_location='',$star_rating='') 
	{
	
		
		$display_perpage = 1;

		$start_pos = $display_perpage * ($page-1);
		$where = '';
		
		if(isset($facilities) && $facilities!='')
		{
			$f = array('"');
			$fac_arr=$facilities;
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
							$where.="p.villa_facilities LIKE '%$facility_value%' AND ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="p.villa_facilities LIKE '%$facility_value%'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		if(isset($villa_nearest_location) && $villa_nearest_location!='')
		{
			$f = array('"');
			$near_location=$villa_nearest_location;
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
							$where.="p.villa_nearest_location LIKE '%$location_name%' AND ";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' AND ";
						}
						else{
							$where.="p.villa_nearest_location LIKE '%$location_name%'";
							//$r_facility_where.=" p.room_facilities LIKE '%$facility_value%' ";
						}
					}
					$i++;
				}
				$where.=")";
			}
		}
		
		if($villa_name_val!='' || $villa_name_val!='+')
		{
			// echo $car_name_vals;exit;
			$where.= " AND p.villa_name LIKE '$villa_name_val%' ";
		}
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if ($star_rating != 0) {
		
			$where.= "AND (p.star = $star_rating)";
		}
		$order = 'ORDER BY low_cost ASC';
		
		$where.= " AND `status` IN ('AVAILABLE', 'OK', 
			'Available', 'InstantConfirmation', 'true') ";
		
	
		$where.= "AND t.city = p.city  AND t.api = p.api ";
		/*$config = array();
		$config["base_url"] =  base_url()."index.php/villa/search/";
		$config["per_page"] = $limit = 3;
		$config["uri_segment"] = $page1= 3;*/

		//$page1 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost,MAX(t.total_cost) as high_cost FROM api_villa_detail_t t, api_permanent_villa p WHERE t.villa_code = p.villa_code AND session_id = '$ses_id' $where GROUP BY t.villa_code $order LIMIT $start_pos, $display_perpage";
		$query = $this->db->query($select);
		//echo $this->db->last_query();exit;
		
		if ($query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();
			
			$data['totRow'] = $count[0]->rowcount;
			
			/*$config["total_rows"] = $count[0]->rowcount;
			
			$this->pagination->initialize($config);		*/	
			
			$select2 = "SELECT MIN(t.total_cost) as minVal ,MAX(t.total_cost) as maxVal FROM api_villa_detail_t t, api_permanent_villa p WHERE t.villa_code = p.villa_code AND t.session_id = '$ses_id' $where";

			//$this->db->limit($config["per_page"],$page1);
			$query2 = $this->db->query($select2);
			//echo $this->db->last_query();exit;
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			/*$data["links"] = $this->pagination->create_links();*/
			//$data['totRow'] = $result2[0]->totRow;
			//print_r($data);
			return $data;
		}
		//print_r($data);exit;
      return false;
	
	
	}

	public function record_count(){
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost,MAX(t.total_cost) as high_cost FROM api_villa_detail_t t, api_permanent_villa p WHERE t.villa_code = p.villa_code AND session_id = '$ses_id' $where GROUP BY t.villa_code $order";
		$query = $this->db->query($select);
	//echo $this->db->last_query();exit;
		
		if ($query->num_rows > 0 ) {
		
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();
			return $data['totRow'] = $count[0]->rowcount;
		}
	}
	public function get_near_by_city_name($sup_villa_id)
	{
		 $this->db->select('*');
		 $this->db->from('sup_villas');
		 $this->db->where('sup_villa_id',$sup_villa_id);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
				return '';
		}else{
				$row =  $query->row();
				return $row->near_by_area;
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
	public function get_searchresult($id)
	{
		$this->db->select('*');
		$this->db->from('api_villa_detail_t');
		$this->db->where('api_temp_villa_id',$id);
		$this->db->join('api_permanent_villa', 'api_villa_detail_t.villa_code = api_permanent_villa.villa_code and api_villa_detail_t.city = api_permanent_villa.city  and api_villa_detail_t.api = api_permanent_villa.api ');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }
		
	}
	public function get_villa_images($sup_villa_id)
	{
		$this->db->select('*');
		$this->db->from('sup_villa_images');
		$this->db->where('sup_villa_id',$sup_villa_id);
		$this->db->where('status',1);
			
		$query=$this->db->get();
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();

			}
	}
	public function get_villa_ameenities($sup_villa_id,$amenity_list_id)
	{
		$this->db->select('*');
		$this->db->from('sup_villa_facilities');
		$this->db->where('sup_villa_id',$sup_villa_id);
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
	
	public function add_review()
	{
		 $data=array(	
			'sup_villa_id'=>$this->input->post('sup_villa_id'),		 
			'user_name'		=> $this->input->post('name'),
			'user_review'	=> $this->input->post('review'),
			'city'    => $this->input->post('city'),
			'star_rating'	=> $this->input->post('rating'),
			'date' => date('Y-m-d'),
			'status'=>'0',
		  );
		$result = $this->db->insert('sup_villa_reviews',$data);
		return $result;
	}
	
	public function get_review($id)
	{
		$this->db->select('*');
		$this->db->from('sup_villa_reviews');
		$this->db->where('sup_villa_id',$id);
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
	public function get_villa_prices_by_dates($sup_villa_room_details_id,$cin,$cout)
	{
		$this->db->select('date,selling_price');
		$this->db->from('sup_villa_room_maintain_month');
		$this->db->where('sup_villa_room_details_id',$sup_villa_room_details_id);
		$this->db->order_by("date", "asc"); 
		// $this->db->where('status',1);
		/*	$this->db->where("date BETWEEN '$cin' AND '$cout'");	*/
			/*$this->db->where("date<=$cin AND date>=$cout");	*/
		$this->db->where('date >=',$cin);
		$this->db->where('date <',$cout);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}

	}
	public function get_discounts_villa($cust_type, $prdct, $selling_tot_amt, $days, $cin, $cout, $present_day, $city_code, $villa_name)
	{
		$result6='';
		
		$select5 = "select * from discount_rules where status=1 AND customer_type='B2C'  AND (from_date <= '$cin' AND to_date >= '$cout') AND (days<=$days OR days IS NULL)  AND (product='villa' OR product IS NULL) AND (product_name ='$villa_name' OR product_name IS NULL) AND (costs<=$selling_tot_amt OR costs IS NULL) AND (city=$city_code OR city IS NULL) ORDER BY discount_rate DESC limit 0,1";


		$query5 = $this->db->query($select5);
		
		//echo $this->db->last_query();exit;
		$result5 = $query5->result();
		
		
		if(empty($result5)){
			$select6 = "select * from discount_rules where status=1 AND customer_type='B2C'  AND ((from_date <= '$cin' AND to_date >= '$cin') OR (from_date <= '$cout' AND to_date >= '$cout')) AND (days<=$days OR days IS NULL)  AND (product='villa' OR product IS NULL) AND (product_name ='$villa_name' OR product_name IS NULL) AND (costs<=$selling_tot_amt OR costs IS NULL) AND (city=$city_code OR city IS NULL) ORDER BY discount_rate DESC ";
		
			$query6 = $this->db->query($select6);

			//echo $this->db->last_query();exit;
			$result6 = $query6->result();
			
		}	
		
		$data['x'] = $result5;
		$data['y'] = $result6;
		
		return $data;
			
	}
	public function get_villa_extra_products($sup_villa_id)
	{
		$this->db->select('*');
		$this->db->from('sup_villa_extra_products');
		$this->db->where('sup_villa_id',$sup_villa_id);
		$this->db->where('status',1);
		
		$query = $this->db->get();
		
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}
	}
	 public function add_cart_to_villa($sessId,$api_temp_villa_id,$products_id, $products_name, $quanity, $payment_mode,$sub_total)
	 {
		   $data =array(
				'session_id' => $sessId,
				'product_id'	=> $products_id,
				'product_name' => $products_name,
				'quantity'   => $quanity,
				'payment_mode' =>$payment_mode,
				'sub_total' => $sub_total,
				'api_temp_villa_id' => $api_temp_villa_id,
				'status'    =>'1',
		         );
				 
			//print '<pre />';print_r($data);exit;
		     $this->db->insert('add_cart_villa',$data);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	  }
	  public function get_villa_add_cart_sum($sessId,$api_temp_villa_id)
	  {
		   $this->db->select_sum('sub_total','subTotal');
		   $this->db->from('add_cart_villa');
		   $this->db->where('session_id',$sessId);
		    $this->db->where('api_temp_villa_id',$api_temp_villa_id);
		   $this->db->where('status','1');
		   $query = $this->db->get();
		   
		  // echo  $this->db->last_query();exit;
		   if($query->num_rows() ==''){
				return '';			
			}else{
				return $query->result();				
			}
	  }	
	   public function update_api_villa_details($sessId, $sup_villa_id, $grand_total)
	   {
		   $data =array(
				'grand_total'   => $grand_total,
		         );
				 
			$where =array(
				'session_id'   => $sessId,
				'villa_code'   => $sup_villa_id,
				);
				 
			 
		     $this->db->update('api_villa_detail_t',$data,$where);
			 
			//echo $this->db->last_query();exit; 
			 $id=$this->db->insert_id();
			//echo  $id;exit;
			if(!empty($id))
		  	{
			 	return $id;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function get_villa_add_cart_details($sessId,$api_temp_villa_id)
	   {
		   $this->db->select('*');
		   $this->db->from('add_cart_villa');
		   $this->db->where('session_id',$sessId);
		    $this->db->where('api_temp_villa_id',$api_temp_villa_id);
		   $this->db->where('status','1');
		   $query = $this->db->get();
		   
		  // echo  $this->db->last_query();exit;
		   if($query->num_rows() ==''){
				return '';			
			}else{
				return $query->result();				
			}
	   }
	   public function get_add_cart_details_by_para($sessId,$product_id,$api_temp_villa_id)
	   {
		   $this->db->select('*');
		   // $this->db->select_sum('sub_total');
		   $this->db->from('add_cart_villa');
		   $this->db->where('session_id',$sessId);
		   $this->db->where('product_id',$product_id);
		    $this->db->where('api_temp_villa_id',$api_temp_villa_id);
		   $this->db->where('status','1');
		   $query = $this->db->get();
		   
		   
		  // echo  $this->db->last_query();exit;
		   if($query->num_rows() ==''){
				return '';			
			} else{
				return $query->result();				
			}
	   }
	   public function update_cart_to_villa($sessId,$api_temp_villa_id,$products_id, $quanity, $sub_total)
	   {
		   $data =array(
				'quantity'   => $quanity,
				'sub_total' => $sub_total,
		         );
				 
			$where =array(
				'session_id'   => $sessId,
				'product_id'   => $products_id,
				'api_temp_villa_id'   => $api_temp_villa_id,
				);
						 
		     $this->db->update('add_cart_villa',$data,$where);
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
	   public function delete_added_cart($id)
		{
			$where = "id = $id";
			$this->db->delete('add_cart_villa', $where);
		}
		public function get_villa_add_cart_details_by_Id($id)
		{
			$this->db->select('*');
		   // $this->db->select_sum('sub_total');
		   $this->db->from('add_cart_villa');
		   $this->db->where('id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			} else{
				return $query->result();				
			}
		}
	
	public function get_reviews($sup_villa_id)
	{
		 $this->db->select('*');
		 $this->db->from('sup_villa_reviews');
		 $this->db->where('sup_villa_id',$sup_villa_id);
		 $query = $this->db->get();
		 if($query->num_rows() ==''){
				return '';
		}else{
			$review['result'] = $query->result();
			$review['counts'] = $query->num_rows();
			return $review;
		}
	}
}
