<?php

class common_model extends CI_Model {
   
	public function update_b2b_user($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "user_id = $id";
				if ($this->db->delete('users', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "user_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('users', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
  public function get_details_of_b2b_user($id)
	   {
		   $this->db->select('*');
		   $this->db->from('users');
		   $this->db->where('user_id',$id);
		   $this->db->where('user_type_id','1');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }
	public function get_b2b_all_users($limit, $start, $keyword='')
	   {
		   $this->db->limit($limit, $start);
		   
		   $this->db->select('*');
		   $this->db->from('users');
		   if($keyword!=''){
		  //print_r($keyword);exit;
				$this->db->like('users.name',$keyword);
				//$this->db->like('users.user_type_id','1');
				$this->db->or_like('users.email',$keyword);
				$this->db->or_like('users.address',$keyword);
				$this->db->or_like('users.contact_person_name',$keyword);
				$this->db->or_like('users.mobile_no',$keyword);
				//$this->db->like('user_type_id','1');
			}
		   $this->db->where('user_type_id','1');
		   
		   //echo $this->db->last_query();exit;
		   $query = $this->db->get();
		   
		   if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
	   }
	public function record_count_b2buser() {
				$this->db->from('users');
				$this->db->where('user_type_id','1');  
			return  $this->db->count_all_results();
		}
	public function get_city_details()
	   {
		   $this->db->select('*');
		   $this->db->from('global_cities');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }
	public function get_region_details()
	   {
		   $this->db->select('*');
		   $this->db->from('global_regions');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }
	   public function add_regions($region_name)
	   {
		   $data =array(
				'region_name' 	=> $region_name,
				'status' => '1'
				);
			$this->db->insert('global_regions',$data);
			$id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function add_cities($city_name,$reg_id)
	   {
		   $data =array(
				'city_name' 	=> $city_name,
				'reg_id' 	=> $reg_id,
				'status' => '1'
				);
			$this->db->insert('global_cities',$data);
			$id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   
	    public function get_all_regions()
	   {
		   $this->db->select('*');
		   $this->db->from('global_regions');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	 public function get_single_region_details($id)
	   {
		   $this->db->select('*');
		   $this->db->from('global_regions');
		   $this->db->where('id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   }
	   
	 

	  public function get_region($id)
	   {
		   $this->db->select('*');
		   $this->db->from('global_regions');
		   $this->db->where('id',$id);
		   $query = $this->db->get();
		  //echo  $this->db->last_query();exit;
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			$row= $query->row();	
			return $row->region_name;			
			}
	   }
	   
	   public function update_region_list($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "id = $id";
				if ($this->db->delete('global_regions', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('global_regions', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function update_city_list($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "id = $id";
				if ($this->db->delete('global_cities', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('global_cities', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	 public function verify_user($email, $password)
	   {
	   
			$this->db->select('*')
				->from('admin')
				->where('email', $email)
				->where('password', $password)
				->where('admin_type', 1)
				->where('status', 1)
				->limit(1);
			$query = $this->db->get();
			
		//echo $this->db->last_query();exit;
	
		  if ( $query->num_rows > 0 ) {
			 // person has account with us
			 return $query->row();
		  }
		  return false;
	   }
	   public function add_admin_type($admin_type)
	   {
		  $data =array(
					'admin_type' =>$admin_type,
					'status'     =>'1'	  
					) ;
					
		   $this->db->insert('admin_type',$data);
		  $id= $this->db->insert_id();
		  if(!empty($id))
		  {
			 return true;
		  }
		  else {
			  
			  return false;
		  }
	   }
	   public function get_admin_type_details()
	   {
		   $this->db->select('*');
		   $this->db->from('admin_type');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }
	   public function update_admin_type($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "admin_type_id  = $id";
				if ($this->db->delete('admin_type', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "admin_type_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('admin_type', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function get_details_of_admin()
	   {
		   $this->db->select('*');
		   $this->db->from('admin_type');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	   


	   public function get_supplier_type_details()
	   {
		   $this->db->select('*');
		   $this->db->from('supplier_type');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }
	   public function add_supplier_type($supplier_type)
	   {
		  $data =array(
					'supplier_type' =>$supplier_type,
					'status'     =>'1'	  
					) ;
					
		   $this->db->insert('supplier_type',$data);
		  $id= $this->db->insert_id();
		  if(!empty($id))
		  {
			 return true;
		  }
		  else {
			  
			  return false;
		  }
	   }
	   public function update_supplier_type($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "supplier_type_id  = $id";
				if ($this->db->delete('supplier_type', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "supplier_type_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('supplier_type', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function get_details_of_supplier()
	   {
		   $this->db->select('*');
		   $this->db->from('supplier_type');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	   public function b2b_registration_details($email,$password,$name,$address,$mobile_no,$office_phone_no,$contact_person_name,$desig_of_contact,$notes,$b2buser_logo)
	   {
		   $data =array(
				'email' 	=> $email,
				'user_type_id' => '1',
				'password'	=> $password,
				'name' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'contact_person_name' =>$contact_person_name,
				'desig_of_contact' => $desig_of_contact,
				'notes'     => $notes,
				'status'    =>'0',
				'user_logo'    =>$b2buser_logo
		         );
				 
			//print '<pre />';print_r($data);exit;
		     $this->db->insert('users',$data);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	    public function get_sup_all_users()
	   {
		   $this->db->select('*');
		   $this->db->from('supplier');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   } 
	   public function get_sup_type($id)
	   {
		   $this->db->select('*');
		   $this->db->from('supplier_type');
		   $this->db->where('supplier_type_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			$row= $query->row();
			return $row->supplier_type;				
			}
	   }
	   public function get_supp_type($id)
	   {
		   $this->db->select('*');
		   $this->db->from('supplier');
		   $this->db->where('supplier_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			$row= $query->row();
			return $row->supplier_type;				
			}
	   }
	   public function update_sup_user($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "supplier_id = $id";
				if ($this->db->delete('supplier', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "supplier_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('supplier', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }

	   public function update_b2b_registration_page($email,$password,$name,$address,$mobile_no,$office_phone_no,$contact_person_name,
			$desig_of_contact,$notes,$id,$b2buser_logo)
	   {
		    $data =array(
				'email' 	=> $email,
				'name' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'contact_person_name' =>$contact_person_name,
				'desig_of_contact' => $desig_of_contact,
				'notes'     => $notes,
				'user_logo' => $b2buser_logo
		         );
				//print '<pre />';print_r($data);exit;
			 $where = "user_id = $id";
		     $this->db->update('users',$data,$where);
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
	   public function add_villa_details($supplier_id,$cus_villa_id,$villa_name,$city_name,$main_first_name,$main_last_name,$main_email,
			$main_phone_no,$main_fax,$villa_desc,$villa_address,$villa_policies,$no_adults,$no_children,$latitude,$longitude,$max_no_of_people,$near_by_area,$near_by_attraction )
	   {
		   if($this->session->userdata('admin_type')==1 || $this->session->userdata('admin_type')==2 )
		  {
							$data =array(
								'supplier_id' => $supplier_id,
								'custom_villa_id' 	=> $cus_villa_id,
								'villa_name' => $villa_name,
								'city_name'   => $city_name,
								'main_first_name' =>$main_first_name,
								'main_last_name' => $main_last_name,
								'main_email' =>$main_email,
								'main_phone_no' => $main_phone_no,
								'main_fax'     => $main_fax,
								'villa_desc' =>$villa_desc,
								'villa_address' => $villa_address,
								'no_adults'     => $no_adults,
								'no_children'     => $no_children,
								'latitude'     => $latitude,
								'longitude'     => $longitude,
								'villa_policies' => $villa_policies,
								'max_no_of_people' => $max_no_of_people,
								'near_by_area' => $near_by_area,
								'near_by_attraction' => $near_by_attraction,
								'status' => '1'
				
								 );
								//print '<pre />';print_r($data);exit;
								  $this->db->insert('sup_villas',$data);
								  //echo  $this->db->last_query();exit;
							    $id=$this->db->insert_id();
		  }else {
			  
			  $user_id = $this->session->userdata('user_id');
			  $data1 =array(
								'supplier_id' => $user_id,
								'custom_villa_id' 	=> $cus_villa_id,
								'villa_name' => $villa_name,
								'city_name'   => $city_name,
								'main_first_name' =>$main_first_name,
								'main_last_name' => $main_last_name,
								'main_email' =>$main_email,
								'main_phone_no' => $main_phone_no,
								'main_fax'     => $main_fax,
								'villa_desc' =>$villa_desc,
								'villa_address' => $villa_address,
								'no_adults'     => $no_adults,
								'no_children'     => $no_children,
								'latitude'     => $latitude,
								'longitude'     => $longitude,
								'villa_policies' => $villa_policies,
								'max_no_of_people' => $max_no_of_people,
								'status' => '1'
				
								 );
								//print '<pre />';print_r($data);exit;
								  $this->db->insert('sup_villas',$data1);
								  //echo  $this->db->last_query();exit;
							    $id=$this->db->insert_id();
		  }
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function get_villa_details()
	   {
		   $this->db->select('*');
		   $this->db->from('sup_villas');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   }
	   public function record_count() {
			return $this->db->count_all("sup_villas");
		}
		
	   public function fetch_villa_details($limit, $start, $keyword='', $asc='')
	   {
		 $this->db->limit($limit, $start);
			
			$this->db->select('*');
			$this->db->from('sup_villas');
			$this->db->join('admin', 'sup_villas.supplier_id = admin.user_id');
			if($this->session->userdata('admin_type')==3) {
				$user_id =$this->session->userdata('user_id');
				$this->db->where('supplier_id',$user_id);
			}
			
			if($keyword!=''){
				$this->db->like('sup_villas.villa_name',$keyword);
				$this->db->or_like('admin.firstname',$keyword);
			}
			
			if($asc=='asc')
			{
				$this->db->order_by("admin.firstname", "asc");
			}
			else if($asc=='desc')
			{
				$this->db->order_by("admin.firstname", "desc");
			}
			else
			{
				$this->db->order_by("sup_villa_id", "desc");
			}
			
			$query = $this->db->get();
			//echo $this->db->last_query();//exit;
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}
				return $data;
			}
				return false;
		   
	   }
	   public function get_details_of_sup_user_selected($id)
	   {
		   $this->db->select('*');
		   $this->db->from('admin');
		   $this->db->where('user_id',$id);
		   $query = $this->db->get();
		  //echo  $this->db->last_query();exit;
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			$row= $query->row();	
			return $row->firstname;			
			}
	   }
	   public function update_villa_list($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "sup_villa_id = $id";
				if ($this->db->delete('sup_villas', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_villa_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_villas', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function get_sup_villa_details($id)
	   {
		   $this->db->select('*');
		   $this->db->from('sup_villas');
		   $this->db->where('sup_villa_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   }
	   public function edit_villa_details($cus_villa_id,$villa_name,$city_name,$main_first_name,$main_last_name,$main_email,
			$main_phone_no,$main_fax,$villa_desc,$villa_address,$villa_policies,$no_adults,$no_children,$latitude,$longitude,$id,$max_no_of_people,$near_by_area,$near_by_attraction)
	   {
		    $data =array(
				'custom_villa_id' 	=> $cus_villa_id,
				'villa_name' => $villa_name,
				'city_name'   => $city_name,
				'main_first_name' =>$main_first_name,
				'main_last_name' => $main_last_name,
				'main_email' =>$main_email,
				'main_phone_no' => $main_phone_no,
				'main_fax'     => $main_fax,
				'villa_desc' =>$villa_desc,
				'villa_address' => $villa_address,
				'max_no_of_people' => $max_no_of_people,
				'no_adults'     => $no_adults,
				'no_children'     => $no_children,
				'latitude'     => $latitude,
				'longitude'     => $longitude,
				'villa_policies' => $villa_policies,
				'near_by_area' => $near_by_area,
				'near_by_attraction' => $near_by_attraction

		         );
				 
				 $where ="sup_villa_id = $id";
				//print '<pre />';print_r($data);exit;
				  $this->db->update('sup_villas',$data,$where);
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
	   public function add_villa_facility($facility_name,$sup_villa_id)
	   {
		  $where2 = "sup_villa_id = $sup_villa_id";
		 $this->db->delete('sup_villa_facilities', $where2);
		// echo  count($facility_name);exit;
		   for($i=0;$i<count($facility_name);$i++)
		   {
			  //$i=1;
			   $data =array(
					'amenity_list_id' 	=> $facility_name[$i],
					'sup_villa_id' 	=> $sup_villa_id,
					'status' => '1'
					);
					//print '<pre />';print_r($data);exit;
		  
			$this->db->insert('sup_villa_facilities',$data);
		
			
		   }
		  
		   return true;
			
	   }
	     public function add_villa_room_facility($facility_name,$sup_villa_id,$sup_villa_room_details_id)
	   {
		  $where2 = "sup_villa_room_details_id = $sup_villa_room_details_id";
		 $this->db->delete('sup_villa_room_facilities', $where2);
		// echo  count($facility_name);exit;
		   for($i=0;$i<count($facility_name);$i++)
		   {
			  //$i=1;
			   $data =array(
					'amenity_list_id' 	=> $facility_name[$i],
					'sup_villa_id' 	=> $sup_villa_id,
					'sup_villa_room_details_id' => $sup_villa_room_details_id,
					'status' => '1'
					);
					//print '<pre />';print_r($data);exit;
		  
			$this->db->insert('sup_villa_room_facilities',$data);
		
			
		   }
		  
		   return true;
			
	   }
	   public function add_villa_amenities($amenity_name)
	   {
		   $data =array(
				'amenity_name' 	=> $amenity_name,
				'status' => '1'
				);
			$this->db->insert('global_amenity_list',$data);
			$id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   
	   public function update_villa_facility($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "sup_fac_id = $id";
				if ($this->db->delete('sup_villa_facilities', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_fac_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_villa_facilities', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function update_amenity_list($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "amenity_list_id  = $id";
				if ($this->db->delete('global_amenity_list', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "amenity_list_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('global_amenity_list', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
		public function uploadPhotos($fileName, $tempFile, $targetPath, $sup_villa_id)
		{
			
			$image =$fileName;
			$uploadedfile = $tempFile;
	 
			if($fileName) 
			{
				$fileName = stripslashes($fileName);
			
				$extension = $this->getExtension($fileName);
				$extension = strtolower($extension);
				$size=filesize($tempFile);
				if($extension=="jpg" || $extension=="jpeg")	{
					$src = imagecreatefromjpeg($tempFile);
				}
				else if($extension=="png")	{
					$src = imagecreatefrompng($tempFile);
				}
				else	{
					$src = imagecreatefromgif($tempFile);
				}
					
				list($width,$height)=getimagesize($tempFile);
					
				$newWidth=	320;	$newHeight=	220;
				$tmp=imagecreatetruecolor($newWidth,$newHeight);
				imagecopyresampled($tmp,$src,0,0,0,0,$newWidth,$newHeight,$width,$height);
				$fileName  = rtrim($targetPath,'/') . '/' . $image; 
				imagejpeg($tmp,$fileName,100);
				imagedestroy($src);
				imagedestroy($tmp);
				
				$data = array(
				'sup_villa_id' => $sup_villa_id,
				'image_name' => $image,
				'status' => 1
				);
				//print '<pre />';print_r($data);exit;
				$this->db->insert('sup_villa_images', $data);
				$id = $this->db->insert_id();
				return true;
			}	
		}
		public function getImages($sup_villa_id)
		{		
		 	$this->db->select('*');
		  	$this->db->from('sup_villa_images');
		    $this->db->where('sup_villa_id',$sup_villa_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function insert_villa_images($sup_villa_id,$image_name)
	   {
		   $data = array(
				'sup_villa_id' => $sup_villa_id,
				'image_name' => $image_name,
				'status' => 1
				);
			$this->db->insert('sup_villa_images', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	   public function delete_picture()
	   {
		
			$select = "SELECT image_name FROM sup_villa_images WHERE sup_villa_images_id = '".$_REQUEST['picId']."'";
			$query=$this->db->query($select);
			foreach ($query->result() as $row)	{
				$image_name = $row->image_name;
			}
			$targetPath = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/supplier_villas_images';
			$targetFile = 	rtrim($targetPath,'/') . '/' . $image_name;
			unlink($targetFile);
			
			$picId = $_REQUEST['picId'];
			$where = "sup_villa_images_id = $picId";
			if ($this->db->delete('sup_villa_images', $where)) {
				echo 'success';
			} else {
				return false;
			}
	   }
	   public function  status_pic()
	   {
			echo $picId = $_REQUEST['picId'];
			echo $status = $_REQUEST['status'];
			$this->db->query("UPDATE sup_villa_images SET status = '".$status."' WHERE sup_villa_images_id='".$picId."'");
			return true;
	  }
	   public function insert_villa_videos($sup_villa_id,$villa_video_name)
	   {
		   $data = array(
				'sup_villa_id' => $sup_villa_id,
				'video_name' => $villa_video_name,
				'status' => 1
				);
			$this->db->insert('sup_villa_videos', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	   public function add_room_categoty_type($sup_villa_id,$categoty_type)
	   {
		    $data = array(
				'sup_villa_id' => $sup_villa_id,
				'categoty_type' => $categoty_type,
				'status' => 1
				);
			$this->db->insert('sup_room_category_type', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	   public function get_details_of_room_cat_type($sup_villa_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_room_category_type');
		    $this->db->where('sup_villa_id',$sup_villa_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function update_room_villa_facility($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "sup_room_cate_type_id = $id";
				if ($this->db->delete('sup_room_category_type', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_room_cate_type_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_room_category_type', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function get_room_category_type($id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_room_category_type');
		    $this->db->where('sup_room_cate_type_id',$id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }
	   public function update_room_categoty_type($categoty_type,$id)
	   {
		   $data =array('categoty_type'=> $categoty_type );
		   $where ="sup_room_cate_type_id = $id";
		   $this->db->update('sup_room_category_type',$data,$where);
		 // echo  $this->db->last_query();exit;
		   $id = $this->db->insert_id();
			return true;
	   }
	   public function add_villa_extra_product($sup_villa_id,$product_name,$payment_mode,$price)
	   {
		   $data =array('product_name'=> $product_name ,
		   				'sup_villa_id'=> $sup_villa_id,
						'payment_mode'=> $payment_mode ,
		   				'price'=> $price,
						'status' =>1
		   
		   				);
				//print '<pre />';print_r($data);exit;
		    $this->db->insert('sup_villa_extra_products', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	   public function get_avilable_products($sup_villa_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_villa_extra_products');
		    $this->db->where('sup_villa_id',$sup_villa_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function update_villa_extra_product($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "sup_villa_extra_products_id  = $id";
				if ($this->db->delete('sup_villa_extra_products', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_villa_extra_products_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_villa_extra_products', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function get_global_amenities()
	   {		
		 	$this->db->select('*');
		  	$this->db->from('global_amenity_list');
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function get_all_villa_facility()
	   {		
		 	$this->db->select('*');
		  	$this->db->from('global_amenity_list');
			$this->db->where('status',1);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	    public function get_all_villa_available_facility($sup_villa_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_villa_facilities');
			$this->db->where('sup_villa_id',$sup_villa_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   
	  public  function get_villa_facilities($sup_villa_id, $id)
	  {	
	  	  
			$select = "SELECT * FROM sup_villa_facilities where sup_villa_id = ".$sup_villa_id." and amenity_list_id = ".$id." ";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
	 }
	  public  function get_villa_near_by_facilities($sup_villa_id, $id)
	  {	
	  	  
			$select = "SELECT * FROM sup_villa_near_by_location where sup_villa_id = ".$sup_villa_id." and global_near_by_location_id = ".$id." ";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
	 }
	 public  function get_villa_room_facilities($sup_villa_id,$sup_villa_room_details_id, $id)
	  {	
	  	  
			$select = "SELECT * FROM sup_villa_room_facilities where sup_villa_room_details_id = ".$sup_villa_room_details_id." and amenity_list_id = ".$id." ";
			//echo $select;exit;
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
	 }
    function getDates()
	{
		//$sds = explode(",",$_REQUEST['mmsd']);
		
		//$eds = explode(",",$_REQUEST['mmed']);
		//print_r($_REQUEST['mmed']);
		//echo count($_REQUEST['mmed']);
		//exit;
		$sds = $_REQUEST['mmsd'];
		
		$eds = $_REQUEST['mmed'];
		
		if(is_array($sds)) 
		{
		$k=0;
		for($i=0;$i<count($sds);$i++)
		{
			$sdate = explode("-",$sds[$i]);
		
		    $fromDate[$i] = $sdate[2].'/'.$sdate[1].'/'.$sdate[0];
		
		$edate = explode("-",$eds[$i]);
		
		$toDate[$i] = $edate[1].'/'.$edate[0].'/'.$edate[2];
		
		$dateMonthYearArr = array();
		$fromDateTS = strtotime($fromDate[$i]);
		$toDateTS = strtotime($toDate[$i]);
		
		
		for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) 
		{
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			
		}
		//echo count($dateMonthYearArr);
		//$combined = array_merge($dateMonthYearArr, $dateMonthYearArr);
		$result[] = $dateMonthYearArr;
		
	   }
	
		$counter = count($result);
		if($counter==1)  
		{
			$dates = array_merge($result[0]);
		}
		if($counter==2)  
		{
			$dates = array_merge($result[0], $result[1]);
		}
		if($counter==3)  
		{
			$dates = array_merge($result[0], $result[1], $result[2]);
		}
		if($counter==4)  
		{
			$dates = array_merge($result[0], $result[1], $result[2], $result[3]);
		}
		if($counter==5)  
		{
			$dates = array_merge($result[0], $result[1], $result[2], $result[3], $result[4]);
		}
		//print_r($dates);
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('dates'=>$dates)));
				
			  }
			  else
			  {
				// echo $_REQUEST['mmed'];exit;
						 $sds = explode("-",$_REQUEST['mmsd']);
						$fromDate = $sds[2].'/'.$sds[1].'/'.$sds[0];
						
						$eds = explode("-",$_REQUEST['mmed']);
						$toDate = $eds[1].'/'.$eds[0].'/'.$eds[2];
						
						$dateMonthYearArr = array();
						$fromDateTS = strtotime($fromDate);
						$toDateTS = strtotime($toDate);
						
						for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24))           {
						if($_REQUEST['selectedDays'] != 'All'){
							$checkDays = date("D",$currentDateTS);
							if(in_array($checkDays, $_REQUEST['selectedDays'])) {
								$currentDateStr = date("d-m-Y D",$currentDateTS);
								$dateMonthYearArr[] = $currentDateStr;
							}
							}
						else{
							$currentDateStr = date("d-m-Y D",$currentDateTS);
							$dateMonthYearArr[] = $currentDateStr;
						}
						}
						//print_r($dateMonthYearArr);
						$this->output->set_content_type('application/json');
						$this->output->set_output(json_encode(array('dates'=>$dateMonthYearArr)));
				}
					//print_r($result);
	}
	
	public function get_available_category($sup_villa_id)
	{
		$this->db->select('*');
		$this->db->from('sup_room_category_type');
		$this->db->where('sup_villa_id',$sup_villa_id,'status','1');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
		
	}
	public function add_room_plan($sup_villa_id,$room_name,$room_desc,$room_policies,$occupancy,$no_of_adults,$no_of_childs,$total_no_of_rooms,$room_critical_level,$no_of_rooms_left,$room_avail_date_from,$room_avail_date_to,$dates,$weekday,$avilable_rooms,$cost_price,$markup,$selling_price,$discount_rule,$final_price,$check_markup,$global_room_category_type_id,$check_discount)
	{
			//print '<pre />';print_r($cost_price);exit;
			
			//print'<pre>';print_r($room_avail_date_from);exit;
			$data = array(
						'sup_villa_id' => $sup_villa_id,
						'global_room_category_type_id' => $global_room_category_type_id,
						'room_avail_date_from' => $room_avail_date_from,
						'room_avail_date_to' => $room_avail_date_to,
						'check_markup' => $check_markup,
						'check_discount' => $check_discount,
						'status' => 1
						);
			
			
			//print'<pre>';print_r($data);exit;
			
			$this->db->insert('sup_villa_room_details',$data);
			$id = $this->db->insert_id();
			
						
						for($i=0; $i<sizeof($dates); $i++)
						{
							//$i=1;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								$date = $day[2].'-'.$day[1].'-'.$day[0]; 
								
								
								$data1 = array(
										'sup_villa_room_details_id' => $id,
										'sup_villa_id' => $sup_villa_id,
										'date' => $date,
										'week_day' => $weekday[$i],
										'day' => $day[0],
										'month' => $day[1],
										'year' => $day[2],
							            'avilable_rooms' => $avilable_rooms[$i],
										'cost_price' => $cost_price[$i],
										'markup' => $markup[$i],
										'selling_price' => $selling_price[$i],
										'discount_rule' => $discount_rule[$i],
										'final_price' => $final_price[$i],
										'status' => 1
										);
								//print'<pre>';print_r($data1);exit;
			
									$this->db->insert('sup_villa_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
						
							}
						}
						
				
	}
	public function add_villa_inventory($sup_villa_id,$room_avail_date_from,$room_avail_date_to,$dates,$weekday,$avilable_rooms)
	{
		$data = array(
						'sup_villa_id' => $sup_villa_id,
						'room_avail_date_from' => $room_avail_date_from,
						'room_avail_date_to' => $room_avail_date_to,
						'status' => 1
						);
			
			
			//print'<pre>';print_r($data);exit;
			
			$this->db->insert('sup_villa_room_details',$data);
			$id = $this->db->insert_id();
			
						
						for($i=0; $i<sizeof($dates); $i++)
						{
							//$i=1;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								$date = $day[2].'-'.$day[1].'-'.$day[0]; 
								
								
								$data1 = array(
										'sup_villa_room_details_id' => $id,
										'sup_villa_id' => $sup_villa_id,
										'date' => $date,
										'week_day' => $weekday[$i],
										'day' => $day[0],
										'month' => $day[1],
										'year' => $day[2],
							            'avilable_rooms' => $avilable_rooms[$i],
										'status' => 1
										);
								//print'<pre>';print_r($data1);exit;
			
									$this->db->insert('sup_villa_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
						
							}
						}
							
	}
	public function get_villa_room_details($sup_villa_id)
	{
		$this->db->select('*');
		$this->db->from('sup_villa_room_details');
		$this->db->where('sup_villa_id',$sup_villa_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} 
		else 
		{
			return false;	
		}
	}
	public function get_villa_room_details_list($sup_villa_id,$limit, $start, $keyword='')
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('sup_villa_room_details');
		$this->db->where('sup_villa_id',$sup_villa_id);
		if($keyword!=''){
			$this->db->where('sup_villa_room_details.room_avail_date_from <=',$keyword);
			$this->db->where('sup_villa_room_details.room_avail_date_to >=',$keyword);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} 
		else 
		{
			return false;	
		}
	}
	public function record_count_villa_inventory($sup_villa_id) {
		$this->db->from('sup_villa_room_details');
		$this->db->where('sup_villa_id',$sup_villa_id);
		return  $this->db->count_all_results();
	}
	public function get_avail_category_type($id)
	{
		$this->db->select('*');
		$this->db->from('sup_room_category_type');
		$this->db->where('sup_room_cate_type_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
				$row= $query->row();
				return $row->categoty_type;
		} 
		else 
		{
				return false;	
		}
	}
	public function update_villa_room_details($id,$status)
    {
			if($status == 2)
			{
				$where2 = "sup_villa_room_details_id  = $id";
				if ($this->db->delete('sup_villa_room_details', $where2)) {
					
					$this->db->delete('sup_villa_room_maintain_month', $where2);
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_villa_room_details_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_villa_room_details', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	  }
	public function get_villa_room_price_details($id)
	{
		$this->db->select('*');
		$this->db->from('sup_villa_room_details');
		$this->db->where('sup_villa_room_details_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
				return $query->row();
		} 
		else 
		{
				return false;	
		}
	}
	public function getAvailDates()
	{
		//print'<pre>';print_r($_REQUEST['mmed']);exit;
		if(isset($_REQUEST['da']) && $_REQUEST['da'] != '')
		{
			
		$sds = $_REQUEST['mmsd'];
		
		$eds = $_REQUEST['mmed'];
		if(is_array($sds)) 
		{
		$k=0;
		for($i=0;$i<count($sds);$i++)
		{
			$sdate = explode("-",$sds[$i]);
		
		    $fromDate[$i] = $sdate[2].'/'.$sdate[1].'/'.$sdate[0];
		
		$edate = explode("-",$eds[$i]);
		
		$toDate[$i] = $edate[1].'/'.$edate[0].'/'.$edate[2];
		
		$dateMonthYearArr = array();
		$fromDateTS = strtotime($fromDate[$i]);
		$toDateTS = strtotime($toDate[$i]);
		
		
		for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) 
		{
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			
		}
		//echo count($dateMonthYearArr);
		//$combined = array_merge($dateMonthYearArr, $dateMonthYearArr);
		$result[] = $dateMonthYearArr;
		
		
		
	}
	
			$counter = count($result);
			if($counter==1)  
			{
				$dates = array_merge($result[0]);
			}
			if($counter==2)  
			{
				$dates = array_merge($result[0], $result[1]);
			}
			if($counter==3)  
			{
				$dates = array_merge($result[0], $result[1], $result[2]);
			}
			if($counter==4)  
			{
				$dates = array_merge($result[0], $result[1], $result[2], $result[3]);
			}
			if($counter==5)  
			{
				$dates = array_merge($result[0], $result[1], $result[2], $result[3], $result[4]);
			}
			//print_r($dates);exit;
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array('dates'=>$dates)));
					
					
			
			
			
		  }
		  else
		  {
	            //echo $_REQUEST['mmed'];exit;
	         $sds = explode("-",$_REQUEST['mmsd']);
			$fromDate = $sds[2].'/'.$sds[1].'/'.$sds[0];
			
			$eds = explode("-",$_REQUEST['mmed']);
			$toDate = $eds[1].'/'.$eds[0].'/'.$eds[2];
			
			$dateMonthYearArr = array();
			$fromDateTS = strtotime($fromDate);
			$toDateTS = strtotime($toDate);
			
			for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24))           {
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			}
			//print_r($dateMonthYearArr);
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('dates'=>$dateMonthYearArr)));
	      }
	           //print_r($result);
	
			
			
			/*
			$sds = explode("-",$_REQUEST['mmsd']);
			$fromDate = $sds[2].'/'.$sds[1].'/'.$sds[0];
			
			$eds = explode("-",$_REQUEST['mmed']);
			$toDate = $eds[1].'/'.$eds[0].'/'.$eds[2];
			
			$dateMonthYearArr = array();
			$fromDateTS = strtotime($fromDate);
			$toDateTS = strtotime($toDate);
			
			for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24))           {
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			}
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('dates'=>$dateMonthYearArr)));
		*/}
		else
		{
			//echo $_REQUEST['rate_id'];exit;
			$select = "SELECT * FROM sup_villa_room_maintain_month where sup_villa_room_details_id = ".$_REQUEST['rate_id']." ORDER BY date ASC"; 
			$query	= $this->db->query($select); 
			if ($query->num_rows() > 0){
				$avail_dates = $query->result();
				//print'<pre />';print_r($avail_dates);exit;
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array('avail_dates'=>$avail_dates)));
			}
		}
	}
	public function update_villa_images($id,$status)
    {
			if($status == 2)
			{
				$where2 = "sup_villa_images_id  = $id";
				if ($this->db->delete('sup_villa_images', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_villa_images_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_villa_images', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	  }
	   public function getVideos($sup_villa_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_villa_videos');
		    $this->db->where('sup_villa_id',$sup_villa_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	    public function villa_reviews($sup_villa_id)
	   {
		   $this->db->select('*');
		   $this->db->from('sup_villa_reviews');
		   $this->db->where('sup_villa_id',$sup_villa_id);
		   $query = $this->db->get();
			
		  if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function update_villa_reviews($id,$status)
	   {
		  		$where = "sup_villa_reviews_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_villa_reviews', $data, $where)) {
					return true;
				} else {
					return false;
				}
			
	   }
	   public function get_villa_particular_review($id)
	   {
		    $this->db->select('*');
		    $this->db->from('sup_villa_reviews');
		    $this->db->where('sup_villa_reviews_id',$id);
		    $query = $this->db->get();
			
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }
	   public function update_room_plan($room_avail_date_from,$room_avail_date_to,$avail_dates,$weekday,$avilable_rooms,$cost_price,$markup,$selling_price,$discount_rule,$final_price,$avail_datess,$check_markup,$sup_villa_id,$id,$check_discount)
	   {
		   	$data = array(
						'room_avail_date_from' => $room_avail_date_from,
						'room_avail_date_to' => $room_avail_date_to,
						'check_markup' => $check_markup,
						'check_discount' => $check_discount
						);
			
			
			$where = "sup_villa_room_details_id = $id";
			//print'<pre>';print_r($data);exit;
			$this->db->update('sup_villa_room_details',$data,$where);
			$delqry = "DELETE FROM sup_villa_room_maintain_month WHERE sup_villa_room_details_id = ".$id.""; 
			$query=$this->db->query($delqry);
			
			 if(isset($avail_dates) && $avail_dates != "")
			 {
				 	$dates = $avail_dates;
					//print '<pre />';print_r($dates);exit;
				    $weekday = $weekday;
				    $avilable_rooms = $avilable_rooms;
				    $cost_price = $cost_price;
				    $markup = $markup;
				    $selling_price = $selling_price;
				    $discount_rule = $discount_rule;
				    $final_price = $final_price;

				 
					for($i=0; $i<sizeof($dates); $i++)
					{ 
					
					     //$i=0;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								 $date = $day[0].'-'.$day[1].'-'.$day[2]; 
								
								$data1 = array(
										'sup_villa_room_details_id' => $id,
										'sup_villa_id' => $sup_villa_id,
										'date' => $date,
										'week_day' => $weekday[$i],
										'day' => $day[2],
										'month' => $day[1],
										'year' => $day[0],
							            'avilable_rooms' => $avilable_rooms[$i],
										'cost_price' => $cost_price[$i],
										'markup' => $markup[$i],
										'selling_price' => $selling_price[$i],
										'discount_rule' => $discount_rule[$i],
										'final_price' => $final_price[$i],
										'status' => 1
										);
								//print'<pre>';print_r($data1);exit;
			
									$this->db->insert('sup_villa_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
							}
					}
			  }
			 if(isset($avail_datess) && $avail_datess != "")
			 {
				 	$dates = $avail_datess;
				    $weekday = $weekday;
				    $avilable_rooms = $avilable_rooms;
				    $cost_price = $cost_price;
				    $markup = $markup;
				    $selling_price = $selling_price;
				    $discount_rule = $discount_rule;
				    $final_price = $final_price;

				 
					for($i=0; $i<sizeof($dates); $i++)
					{  //$i=1;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								$date = $day[2].'-'.$day[1].'-'.$day[0]; 
								
								
								$data1 = array(
										'sup_villa_room_details_id' => $id,
										'sup_villa_id' => $sup_villa_id,
										'date' => $date,
										'week_day' => $weekday[$i],
										'day' => $day[0],
										'month' => $day[1],
										'year' => $day[2],
							            'avilable_rooms' => $avilable_rooms[$i],
										'cost_price' => $cost_price[$i],
										'markup' => $markup[$i],
										'selling_price' => $selling_price[$i],
										'discount_rule' => $discount_rule[$i],
										'final_price' => $final_price[$i],
										'status' => 1
										);
								//print'<pre>';print_r($data1);exit;
			
									$this->db->insert('sup_villa_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
							}
					}
			  }
	   }
	      public function update_villa_inventory($room_avail_date_from,$room_avail_date_to,$avail_dates,$weekday,$avilable_rooms,$avail_datess,$sup_villa_id,$id)
	   {
		   	$data = array(
						'room_avail_date_from' => $room_avail_date_from,
						'room_avail_date_to' => $room_avail_date_to
						);
			
			
			$where = "sup_villa_room_details_id  = $id";
			//print'<pre>';print_r($data);exit;
			$this->db->update('sup_villa_room_details',$data,$where);
			$delqry = "DELETE FROM sup_villa_room_maintain_month WHERE sup_villa_room_details_id = ".$id.""; 
			$query=$this->db->query($delqry);
			
			 if(isset($avail_dates) && $avail_dates != "")
			 {
				 	$dates = $avail_dates;
					//print '<pre />';print_r($dates);exit;
				    $weekday = $weekday;
				    $avilable_rooms = $avilable_rooms;
				 
					for($i=0; $i<sizeof($dates); $i++)
					{ 
					
					     //$i=0;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								 $date = $day[0].'-'.$day[1].'-'.$day[2]; 
								
								$data1 = array(
										'sup_villa_room_details_id' => $id,
										'sup_villa_id' => $sup_villa_id,
										'date' => $date,
										'week_day' => $weekday[$i],
										'day' => $day[2],
										'month' => $day[1],
										'year' => $day[0],
							            'avilable_rooms' => $avilable_rooms[$i],
										'status' => 1
										);
								//print'<pre>';print_r($data1);exit;
			
									$this->db->insert('sup_villa_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
							}
					}
			  }
			 if(isset($avail_datess) && $avail_datess != "")
			 {
				 	$dates = $avail_datess;
				    $weekday = $weekday;
				    $avilable_rooms = $avilable_rooms;
			 
					for($i=0; $i<sizeof($dates); $i++)
					{  //$i=1;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								$date = $day[2].'-'.$day[1].'-'.$day[0]; 
								
								
								$data1 = array(
										'sup_villa_room_details_id' => $id,
										'sup_villa_id' => $sup_villa_id,
										'date' => $date,
										'week_day' => $weekday[$i],
										'day' => $day[0],
										'month' => $day[1],
										'year' => $day[2],
							            'avilable_rooms' => $avilable_rooms[$i],
										'status' => 1
										);
								//print'<pre>';print_r($data1);exit;
			
									$this->db->insert('sup_villa_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
							}
					}
			  }
	   }
	    public function get_supp_all_users($id)
	   {
		   $this->db->select('*');
		   $this->db->from('admin');
		   $this->db->where('supplier_type_id',$id);
		    $this->db->where('status',1);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	
	   public function view_orders()
	   {
		   $this->db->select('*');
		   $this->db->from('orders');
		   $this->db->order_by('datetime','desc');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }

	    public function new_orders($b2c_id,$b2b_id,$from_date,$to_date,$customer_street_address,$customer_city,$customer_country,$customer_phone,$customer_mobile,$extra_products,$supplier_type,$total_cost,$product_id,$total_amount,$supplier_id,$pay_amount,$product_name,$payment_method,$payment_status)
	
	   {
	   			$date = date('Y/m/d h:i:s', time());
				
		   $data =array(
				'b2c_id' 	=> $b2c_id,
				'b2b_id' 	=> $b2b_id,
				'booking_range'		=> $from_date."-".$to_date,			
				'customer_street_address'=> $customer_street_address,
				'customer_city' 	=> $customer_city,
				'customer_country' 	=> $customer_country,
				'customer_phone' 	=> $customer_phone,
				'customer_mobile' 	=> $customer_mobile,
				'extra_products' 	=> $extra_products,
				'supplier_type'		=> $supplier_type,
				'total_cost' 		=> $total_cost,		
				'product_id'		=> $product_id,
				'total_amount' 		=> $total_amount,
				'supplier_id'		=> $supplier_id,
				'payment_amount'	=> $pay_amount,
				'product_name'		=> $product_name,
				'payment_method'	=> $payment_method,
				'payment_status'	=> $payment_status,
				'order_status'		=> 'pending',
				'datetime'	=> $date,
		         );
			
		     $this->db->insert('orders',$data);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
		
		public function del_order($id)
	   {
				$where2 = "id = $id";
				if ($this->db->delete('orders', $where2)) {
					return true;
				} else {
					return false;
				}
		}
		 public function get_supplier_name($id)
	   {
		   $this->db->select('*');
		   $this->db->from('admin');
		   $this->db->where('user_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	   
	    public function manage_individual_order($id)
	   {
		   $this->db->select('*');
		   $this->db->from('orders');
		   $this->db->where('id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }

	public function save_managed_order($b2c_id,$b2b_id,$from_date,$to_date,$customer_street_address,$customer_city,$customer_country,$customer_phone,$customer_mobile,$pay_amount,$product_id,$product_name,$payment_method,$payment_status,$order_status,$order_comments,$payment_clear,$supplier_called,$customer_called,$order_confirmed,$id)
	   {


		    $data =array(
				'b2c_id' 			=> $b2c_id,
				'b2b_id' 			=> $b2b_id,
				'booking_range'		=> $from_date."-".$to_date,	
				'customer_street_address'=> $customer_street_address,
				'customer_city' 	=> $customer_city,
				'customer_country' 	=> $customer_country,
				'customer_phone' 	=> $customer_phone,
				'customer_mobile' 	=> $customer_mobile,
				'payment_amount' 	=> $pay_amount,
				'product_id' 		=> $product_id,
				'product_name' 		=> $product_name,
				'payment_method' 	=> $payment_method,
				'payment_status' 	=> $payment_status,
				'order_status' 		=> $order_status,
				'order_comments'    => $order_comments,
				'payment_clear'     => $payment_clear,
				'supplier_called'   => $supplier_called,
				'customer_called'   => $customer_called,
				'order_confirmed'   => $order_confirmed,
		         );
				//print '<pre />';print_r($data);exit;
			 $where = "id = $id";
		     $this->db->update('orders',$data,$where);
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
	    public function get_details_b2b()
	   {
		   $this->db->select('*');
		   $this->db->from('b2buser');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	   public function get_details_b2c()
	   {
		   $this->db->select('*');
		   $this->db->from('b2c_users');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	   	public function get_discount_rules()
	   {
		   $this->db->select('*');
		   $this->db->from('discount_rules');
		   $this->db->order_by("modified", "desc");
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }
	    public function update_discount_rules($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "id = $id";
				if ($this->db->delete('discount_rules', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('discount_rules', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	    public function get_discount_parameters($id)
	   {
		   $this->db->select('*');
		   $this->db->from('discount_parameters');
		   $this->db->where('id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   }
	   public function get_all_discount_parameters()
	   {
		   $this->db->select('*');
		   $this->db->from('discount_parameters');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }
	   			
	   	   public function add_discount_rules_type1($rule_name,$days,$discount_rate,$basis,$s,$customer_type,$from,$to)
	   {
		   $data =array(
				'rule_name' => $rule_name,
				'discount_parameter' 	=> $s,
				'days'  	=> $days,
				'customer_type' 	=> $customer_type,
				'discount_rate' 	=> $discount_rate,
				'from_date' 	=> $from,
				'to_date' 		=> $to,
				'basis' 	=> $basis,
				'status' => '1'
				);
				$this->db->insert('discount_rules',$data);
				$id=$this->db->insert_id();
				if(!empty($id)){
					return true;
				}
				else {			  
					return false;
				}
		}
			   public function add_discount_rules_type2($rule_name,$costs,$currency,$discount_rate,$basis,$s,$customer_type,$from,$to)
	   {
		   $data =array(
				'rule_name' => $rule_name,
				'discount_parameter' 	=> $s,
				'costs'  	=> $costs,
				'customer_type' 	=> $customer_type,
				'currency'  => $currency,
				'discount_rate' 	=> $discount_rate,
				'basis' 	=> $basis,
				'from_date' 	=> $from,
				'to_date' 		=> $to,
				'status' => '1'
				);
				$this->db->insert('discount_rules',$data);
				$id=$this->db->insert_id();
				if(!empty($id)){
					return true;
				}
				else {			  
					return false;
				}
		}
		 public function add_discount_rules_type3($rule_name,$product,$product_name,$from,$to,$discount_rate,$basis,$s,$customer_type,$room_type3)
	   {
		   $data =array(
				'rule_name' => $rule_name,
				'discount_parameter' 	=> $s,
				'product'  	=> $product,
				'customer_type' 	=> $customer_type,
				'product_name'  => $product_name,
				'from_date' 	=> $from,
				'to_date' 		=> $to,
				'discount_rate' 	=> $discount_rate,
				'room_type' 	=> $room_type3,
				'basis' 	=> $basis,
				'status' => '1'
				);
				$this->db->insert('discount_rules',$data);
				$id=$this->db->insert_id();
				if(!empty($id)){
					return true;
				}
				else {			  
					return false;
				}
		}
		
		
		
	public function add_discount_rules_type4($rule_name,$from,$to,$discount_rate,$basis,$s,$customer_type,$product)
	{
	   $data =array(
			'rule_name' => $rule_name,
			'discount_parameter' 	=> $s,
			'from_date' 	=> $from,
			'to_date' 		=> $to,
			'customer_type' 	=> $customer_type,
			'discount_rate' 	=> $discount_rate,
			'basis' 	=> $basis,
			'product' 	=> $product,
			'status' => '1'
			);
		//print '<pre />';print_r($data);exit;
			$this->db->insert('discount_rules',$data);
			$id=$this->db->insert_id();
			if(!empty($id)){
				return true;
			}
			else {			  
				return false;
			}
	}
	
	public function add_discount_rules_type5($rule_name,$city,$product,$product_name,$from,$to,$discount_rate,$basis,$s,$customer_type,$room_type)
	{
	   $data =array(
			'rule_name' => $rule_name,
			'discount_parameter' 	=> $s,
			'city'  	=> $city,
			'product'  	=> $product,
			'product_name'  => $product_name,
			'room_type'  => $room_type,
			'from_date' 	=> $from,
			'to_date' 		=> $to,
			'customer_type' 	=> $customer_type,
			'discount_rate' 	=> $discount_rate,
			'basis' 	=> $basis,
			'status' => '1'
			);
			$this->db->insert('discount_rules',$data);
			$id=$this->db->insert_id();
			if(!empty($id)){
				return true;
			}
			else {			  
				return false;
			}
	}
		
	
		
	 public function get_product_name($product)
	 {
		if($product=="hotel"){$table="sup_hotels";}
		else if($product=="villa"){$table="sup_villas";}
		else if($product=="car"){$table="car_rental_details";}
		 $this->db->select('*');
		 $this->db->from($table);
		 $this->db->where('status',1);
		 $query = $this->db->get();
		 return $query->result();
	 }
	 
	 
	 public function get_room_type($product)
	 {
		if($product=="hotel"){$table="global_room_category_type";}
		else if($product=="car"){$table="global_car_type";}
		 $this->db->select('*');
		 $this->db->from($table);
		 $this->db->where('status',1);
		 $query = $this->db->get();
		 return $query->result();
	 }
	 
	 
	 
	 
	 
	 
	 	public function get_b2b_user_name($table)
	 {
		 $this->db->select('*');
		 $this->db->from($table);
		 $query = $this->db->get();
		 return $query->result();
	 }

	 	 public function edit_discount_rule($id)
	   {
		   $this->db->select('*');
		   $this->db->from('discount_rules');
		   $this->db->where('id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   }
	   
	   	
	   	   public function update_discount_rules_type1($rule_name,$days,$discount_rate,$basis,$s,$id,$customer_type,$from,$to)
	   {
	   $where = "id = $id";
		   $data =array(
				'rule_name' => $rule_name,
				'discount_parameter' 	=> $s,
				'days'  	=> $days,
				'discount_rate' 	=> $discount_rate,
				'customer_type' 	=> $customer_type,
				'from_date' 	=> $from,
				'to_date' 		=> $to,
				'basis' 	=> $basis,
				'status' => '1'
				);
				if ($this->db->update('discount_rules', $data, $where)) {
					return true;
				} else {
					return false;
				}
		}
			   public function update_discount_rules_type2($rule_name,$costs,$currency,$discount_rate,$basis,$s,$id,$from,$to,$customer_type)
	   {
	   $where = "id = $id";
		   $data =array(
				'rule_name' => $rule_name,
				'discount_parameter' 	=> $s,
				'costs'  	=> $costs,
				'currency'  => $currency,
				'discount_rate' 	=> $discount_rate,
				'customer_type' 	=> $customer_type,
				'basis' 	=> $basis,
				'from_date' 	=> $from,
				'to_date' 		=> $to,
				'status' => '1'
				);
				if ($this->db->update('discount_rules', $data, $where)) {
					return true;
				} else {
					return false;
				}
		}
		 public function update_discount_rules_type3($rule_name,$product,$product_name,$from,$to,$discount_rate,$basis,$s,$id,$customer_type,$room_type)
	   {
	   $where = "id = $id";
		   $data =array(
				'rule_name' 	=> $rule_name,
				'discount_parameter' 	=> $s,
				'product'  		=> $product,
				'product_name'  => $product_name,	
				'from_date' 	=> $from,
				'to_date' 		=> $to,
				'discount_rate' => $discount_rate,
				'customer_type' => $customer_type,
				'room_type' 	=> $room_type,
				'basis' 		=> $basis,
				'status' 		=> '1'
				);

				if ($this->db->update('discount_rules', $data, $where)) {
					return true;
				} else {
					return false;
				}
		}
		
		public function update_discount_rules_type4($rule_name,$from,$to,$discount_rate,$basis,$s,$id,$customer_type,$product)
	   {
	   $where = "id = $id";
		   $data =array(
				'rule_name' => $rule_name,
				'discount_parameter' 	=> $s,
				'from_date' 	=> $from,
				'to_date' 		=> $to,
				'discount_rate' 	=> $discount_rate,
				'customer_type' 	=> $customer_type,
				'product' 	=> $product,
				'basis' 	=> $basis,
				'status' => '1'
				);
				if ($this->db->update('discount_rules', $data, $where)) {
					return true;
				} else {
					return false;
				}
		}
		public function update_discount_rules_type5($rule_name,$city,$from,$to,$discount_rate,$basis,$s,$id,$product,$product_name,$customer_type,$room_type)
	   {
	   $where = "id = $id";
		   $data =array(
				'rule_name' => $rule_name,
				'discount_parameter' 	=> $s,
				'city'  	=> $city,
				'from_date' 	=> $from,
				'to_date' 		=> $to,
				'product'  => $product,
				'product_name'  => $product_name,
				'discount_rate' 	=> $discount_rate,
				'customer_type' 	=> $customer_type,
				'room_type' 	=> $room_type,
				'basis' 	=> $basis,
				'status' => '1'
				);
				if ($this->db->update('discount_rules', $data, $where)) {
					return true;
				} else {
					return false;
				}
		}
		
		public function update_discount_rules_type51($rule_name,$product,$product_name,$from,$to,$discount_rate,$basis,$s,$id,$customer_type,$room_type,$city)
	   {
	   $where = "id = $id";
		   $data =array(
				'rule_name' => $rule_name,
				'discount_parameter' 	=> $s,
				'product'  	=> $product,
				'product_name'  => $product_name,
				'from_date' 	=> $from,
				'to_date' 		=> $to,
				'discount_rate' 	=> $discount_rate,
				'customer_type' 	=> $customer_type,
				'room_type' 	=> $room_type,
				'city' 	=> $city,
				'basis' 	=> $basis,
				'status' => '1'
				);

				if ($this->db->update('discount_rules', $data, $where)) {
					return true;
				} else {
					return false;
				}
		}
		 	public function get_hotel_commission()
	   {
		   $this->db->select('*');
		   $this->db->from('commission');
		   $this->db->where('product',"hotel");
		   $this->db->order_by("updated_date", "desc");
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }
	   	public function get_villa_commission()
	   {
		   $this->db->select('*');
		   $this->db->from('commission');
		   $this->db->where('product',"villa");
		   $this->db->order_by("updated_date", "desc");
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }
	   	public function get_car_commission()
	   {
		   $this->db->select('*');
		   $this->db->from('commission');
		   $this->db->where('product',"car");
		   $this->db->order_by("updated_date", "desc");
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
		   
	   }
	     public function update_commission($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "id = $id";
				if ($this->db->delete('commission', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('commission', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   
	   //for hotel commission
	    public function check_hotel_commission_exist($hotel,$agents,$commission_rate)
	   {
		   $this->db->select('id');
		   $this->db->from('commission');
		   $this->db->where('product','hotel');
		   $this->db->where('product_name',$hotel);
		   $this->db->where('agents',$agents);
		   $this->db->where('commission_rate',$commission_rate);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	    public function check_hotels_and_agents_in_commission($hotel,$agents)
	   {
		   $this->db->select('id');
		   $this->db->from('commission');
		   $this->db->where('product','hotel');
		   $this->db->where('product_name',$hotel);
		   $this->db->where('agents',$agents);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	    public function update_hotel_commission($hotel,$agents,$commission_rate,$id)
	   {
		$data =array(
						'product'	 		=> 'hotel',
						'product_name'		=> $hotel,
						'agents'			=> $agents,
						'commission_rate' 	=> $commission_rate,
					);
		 $where = "id = $id";
		
				if ($this->db->update('commission', $data, $where)) {
					return true;
				} else {
					return false;
				}
	   }
	    public function add_hotel_commission($hotel,$agents,$commission_rate)
	   {
		   $data =array(
						'product'	 		=> 'hotel',
						'product_name'	=> $hotel,
						'agents'			=> $agents,
						'commission_rate' => $commission_rate,
						'status' 			=> '1',
					);
					
			$this->db->insert('commission',$data);
			$id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	     public function get_b2b_user($id)
	   {
		   $this->db->select('*');
		   $this->db->from('b2buser');
		   $this->db->where('id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   } 
	   public function get_hotel($id)
	   {
		   $this->db->select('*');
		   $this->db->from('sup_hotels');
		   $this->db->where('sup_hotel_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   }  
	   public function get_villa($id)
	   {
		   $this->db->select('*');
		   $this->db->from('sup_villas');
		   $this->db->where('sup_villa_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   }
	   
	     public function get_car($id)
	   {
		   $this->db->select('*');
		   $this->db->from('car_rental_details');
		   $this->db->where('car_rental_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   }
	   // for villa commission
	    public function check_villa_commission_exist($villa,$agents,$commission_rate)
	   {
		   $this->db->select('id');
		   $this->db->from('commission');
		   $this->db->where('product','villa');
		   $this->db->where('product_name',$villa);
		   $this->db->where('agents',$agents);
		   $this->db->where('commission_rate',$commission_rate);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	    public function check_villas_and_agents_in_commission($villa,$agents)
	   {
		   $this->db->select('id');
		   $this->db->from('commission');
		   $this->db->where('product','villa');
		   $this->db->where('product_name',$villa);
		   $this->db->where('agents',$agents);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	    public function update_villa_commission($villa,$agents,$commission_rate,$id)
	   {
		$data =array(
						'product'	 		=> 'villa',
						'product_name'		=> $villa,
						'agents'			=> $agents,
						'commission_rate' 	=> $commission_rate,
					);
		 $where = "id = $id";
		
				if ($this->db->update('commission', $data, $where)) {
					return true;
				} else {
					return false;
				}
	   }
	    public function add_villa_commission($villa,$agents,$commission_rate)
	   {
		   $data =array(
						'product'	 		=> 'villa',
						'product_name'	=> $villa,
						'agents'			=> $agents,
						'commission_rate' => $commission_rate,
						'status' 			=> '1',
					);
					
			$this->db->insert('commission',$data);
			$id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   //for cars commission
	    public function check_car_rental_commission_exist($car,$agents,$commission_rate)
	   {
		   $this->db->select('id');
		   $this->db->from('commission');
		   $this->db->where('product','car');
		   $this->db->where('product_name',$car);
		   $this->db->where('agents',$agents);
		   $this->db->where('commission_rate',$commission_rate);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	    public function check_car_rentals_and_agents_in_commission($car,$agents)
	   {
		   $this->db->select('id');
		   $this->db->from('commission');
		   $this->db->where('product','car');
		   $this->db->where('product_name',$car);
		   $this->db->where('agents',$agents);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	    public function update_car_rental_commission($car,$agents,$commission_rate,$id)
	   {
		$data =array(
						'product'	 		=> 'car',
						'product_name'		=> $car,
						'agents'			=> $agents,
						'commission_rate' 	=> $commission_rate,
					);
		 $where = "id = $id";
		
				if ($this->db->update('commission', $data, $where)) {
					return true;
				} else {
					return false;
				}
	   }
	    public function add_car_rental_commission($car,$agents,$commission_rate)
	   {
		   $data =array(
						'product'	 		=> 'car',
						'product_name'		=> $car,
						'agents'			=> $agents,
						'commission_rate' 	=> $commission_rate,
						'status' 			=> '1',
					);
					
			$this->db->insert('commission',$data);
			$id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function view_product_name($supplier_Id,$supplier_type)
	   {
		   if($supplier_type=="1"){
			    $table = "sup_hotels";
			   }
		   if($supplier_type=="2"){
			    $table = "sup_villas";
			   }
		  
		   $this->db->select('*');
		   $this->db->from($table);
		   $this->db->where('supplier_id',$supplier_Id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function get_all_near_location()
	   {		
		 	$this->db->select('*');
		  	$this->db->from('global_near_by_location');
			$this->db->where('status',1);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function get_near_by_location_details($sup_villa_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_villa_near_by_location');
		    $this->db->where('sup_villa_id',$sup_villa_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function add_villa_near_by_location($global_near_by_location_id,$sup_villa_id)
	   {
		  $where2 = "sup_villa_id = $sup_villa_id";
		 $this->db->delete('sup_villa_near_by_location', $where2);
		// echo  count($facility_name);exit;
			
		   for($i=0;$i<count($global_near_by_location_id);$i++)
		   {
			  //$i=1;
			   $data =array(
					'global_near_by_location_id' => $global_near_by_location_id[$i],
					'sup_villa_id' 	=> $sup_villa_id,
					'status' => '1'
					);
					//print '<pre />';print_r($data);exit;
		  
			$this->db->insert('sup_villa_near_by_location',$data);
		
			
		   }
		  
		   return true;
			
	   }

}