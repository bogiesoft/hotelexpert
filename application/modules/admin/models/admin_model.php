<?php

class Admin_model extends CI_Model {
	
	   public function verify_user($email, $password)
	   {
	   		
					$this->db->select('*')
						->from('admin')
						->where('email', $email)
						->where('password', $password)
						->where('status', 1)
						->limit(1);
					$query = $this->db->get();
					//echo $this->db->last_query();exit;
					 if ( $query->num_rows > 0 ) {
			 			// person has account with us
						 return $query->row();
		  			}
			
				//echo $this->db->last_query();exit;
	
		 
		  return false;
	   }
	   
	   public function verify_supp_user($admin_type,$user_id,$roll_type)
	   {
		   $this->db->select('*')
						->from('global_all_previliges')
						->where('admin_type', $admin_type)
						->where('user_id', $user_id)
						->where('roll_type', $roll_type);
				$query = $this->db->get();
				
				//echo $this->db->last_query();exit;
				 if ( $query->num_rows > 0 ) {
			 			// person has account with us
						 return $query->row();
		  			}
	   }
	   public function verify_supp_all_user($admin_type,$roll_type)
	   {
		   $this->db->select('*')
						->from('global_all_previliges')
						->where('admin_type', $admin_type)
						->where('roll_type', $roll_type);
				$query = $this->db->get();
				//echo $this->db->last_query();exit;
				 if ( $query->num_rows > 0 ) {
			 			// person has account with us
						 return $query->row();
		  			}
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
		   $this->db->order_by('admin_type_id',"asc");
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
	    public function update_sub_admin_type($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "sub_admin_type_id = $id";
				if ($this->db->delete('sub_admin_type', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sub_admin_type_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sub_admin_type', $data, $where)) {
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
	    public function get_details_of_sub_admin()
	   {
		   $this->db->select('*');
		   $this->db->from('sub_admin_type');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	   public function admin_registration_details($email,$password,$name,$mobile_no,$office_phone_no,$address,$notes)
	   {
		   $data =array(
		   		'admin_type' => 1,
				'email' 	=> $email,
				'password'	=> $password,
				'firstname' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'notes'     => $notes,
				'status'    =>'1',
				'roll_type' =>'super'
		         );
				 
			//print '<pre />';print_r($data);exit;
		     $this->db->insert('admin',$data);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function get_admin_all_users()
	   {
		   $this->db->select('*');
		   $this->db->from('admin');
		   $this->db->where('admin_type','1');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	   public function get_admin_type($id)
	   {
		   $this->db->select('*');
		   $this->db->from('admin_type');
		   $this->db->where('admin_type_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			$row= $query->row();
			return $row->admin_type;				
			}
	   }
	   public function update_admin_user($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "user_id = $id";
				if ($this->db->delete('admin', $where2)) {
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
				if ($this->db->update('admin', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function get_details_of_admin_user($id)
	   {
		   $this->db->select('*');
		   $this->db->from('admin');
		   $this->db->where('user_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }
	   public function get_details_of_sub_admin_user($id)
	   {
		   $this->db->select('*');
		   $this->db->from('admin');
		   $this->db->where('user_id',$id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }
	   public function update_admin_registration_page($email,$password,$name,$mobile_no,$office_phone_no,$address,$notes,$id)
	   {
		    $data =array(
				'email' 	=> $email,
				'password' 	=> $password,
				'firstname' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'notes'     => $notes
		         );
			$where = "user_id = $id";	 
			//print '<pre />';print_r($data);exit;
		     $this->db->update('admin',$data,$where);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
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
		  $roll_type= "sup".$id;
		  $where ="supplier_type_id = $id";
		
		  $data1 = array('sup_roll_type' =>$roll_type);
		  $this->db->update('supplier_type',$data1, $where);
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
	   public function sup_registration_details($supplier_type_id,$email,$password,$name,$address,$mobile_no,$office_phone_no,$contact_person_name,
			$desig_of_contact,$notes,$supplier_logo)
	   {
		   $roll_type= "sup".$supplier_type_id;
		   $data =array(
		   		'supplier_type_id' => $supplier_type_id,
				'roll_type' => $roll_type,
				'email' 	=> $email,
				'password'	=> $password,
				'firstname' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'contact_person_name' =>$contact_person_name,
				'desig_of_contact' => $desig_of_contact,
				'notes'     => $notes,
				'supplier_logo' => $supplier_logo,
				'admin_type' => '3',
				'status'    =>'1'
		         );
				 
			//print '<pre />';print_r($data);exit;
		     $this->db->insert('admin',$data);
			 $id=$this->db->insert_id();
			 
			 $data1 = array(
			 				'user_id' => $id,
							'admin_type' => '3',
							'roll_type' =>$roll_type,
							);
			 
			 $this->db->insert('global_all_previliges',$data1);
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	    public function get_sup_all_users($limit, $start, $keyword='')
	   {
		   $this->db->limit($limit, $start);
			
			$this->db->select('*,admin.status as admin_status');
			$this->db->from('admin');
			$this->db->join('supplier_type', 'admin.supplier_type_id = supplier_type.supplier_type_id');
			
			if($keyword!=''){
				$this->db->like('admin.firstname',$keyword);
				$this->db->or_like('admin.email',$keyword);
				$this->db->or_like('admin.mobile_no',$keyword);
				$this->db->or_like('supplier_type.supplier_type',$keyword);
			}
			
			
			$this->db->order_by("user_id", "desc");
			
			
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}
				return $data;
			}
				return false;
	   }
	    public function get_supp_all_users($id)
	   {
		   $this->db->select('*');
		   $this->db->from('admin');
		   $this->db->where('supplier_type_id',$id);
		    $this->db->where('status',1);
		   $query = $this->db->get();
		  //echo $this->db->last_query();exit;
		   if($query->num_rows() ==''){
				return '';			
			}else{
			return $query->result();				
			}
	   }
	    public function get_all_supplier_deatails($id)
	   {
		   $this->db->select('*');
		   $this->db->from('admin');
		   $this->db->where('admin_type',$id);
		    $this->db->where('status',1);
		   $query = $this->db->get();
		  //echo $this->db->last_query();exit;
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
	   public function update_sup_user($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "user_id = $id";
				if ($this->db->delete('admin', $where2)) {
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
				//$this->db->update('admin', $data, $where);
				//echo $this->db->last_query();exit;
				if ($this->db->update('admin', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function get_details_of_sup_user($id)
	   {
		   $this->db->select('*');
		   $this->db->from('admin');
		   $this->db->where('user_id',$id);
		   $query = $this->db->get();
		  //echo  $this->db->last_query();exit;
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }
	   public function update_profile_page($admin_id,$email,$name,$address,$mobile_no,$office_phone_no,$notes,$supplier_logo, $supplier_type_id,$contact_person_name, $desig_of_contact,$sub_admin_type_id)
	   {
		    $data =array(
				'email' 	=> $email,
				'firstname' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'supplier_logo' => $supplier_logo,
				'notes'     => $notes,
				'supplier_type_id' =>$supplier_type_id,
				'contact_person_name' => $contact_person_name,
				'desig_of_contact' => $desig_of_contact,
				'sub_admin_type_id'     => $sub_admin_type_id,
		         );
				 
			// print '<pre >';print_r($data);print '</pre >';exit;
			 $where = "user_id = $admin_id";
		     $this->db->update('admin',$data,$where);
			//echo  $this->db->last_query();exit;
			$admin_id=$this->db->insert_id();
			if(!empty($admin_id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function update_password($admin_id,$password)
	   {
		    $data = array(
				'password'     => $password
		         );
				 
			// print '<pre >';print_r($data);print '</pre >';exit;
			 $where = "user_id = $admin_id";
		     $this->db->update('admin',$data,$where);
			//echo  $this->db->last_query();exit;
			$admin_id=$this->db->insert_id();
			if(!empty($admin_id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function update_sup_registration_page($supplier_type_id,$email,$password,$name,$address,$mobile_no,$office_phone_no,$contact_person_name,
			$desig_of_contact,$notes,$id,$supplier_logo)
	   {
		   $roll_type= "sup".$supplier_type_id;
		    $data =array(
		   		'supplier_type_id' => $supplier_type_id,
				'roll_type' => $roll_type,
				'email' 	=> $email,
				'password' 	=> $password,
				'firstname' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'contact_person_name' =>$contact_person_name,
				'desig_of_contact' => $desig_of_contact,
				'supplier_logo' => $supplier_logo,
				'notes'     => $notes
		         );
				 
			//print '<pre />';print_r($data);exit;
			 $where = "user_id = $id";
		     $this->db->update('admin',$data,$where);
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
	   public function add_hotel_details($supplier_id,$cus_hotel_id,$hotel_name,$city_name,$main_first_name,$main_last_name,$main_email,
			$main_phone_no,$main_fax,$hotel_desc,$hotel_address,$hotel_policies,$latitude,$longitude,$near_by_area,$near_by_attraction)
	   {
		  if($this->session->userdata('admin_type')==1 || $this->session->userdata('admin_type')==2 )
		  {
			    
				$data =array(
					'supplier_id' => $supplier_id,
					'custom_hotel_id' 	=> $cus_hotel_id,
					'hotel_name' => $hotel_name,
					'city_name'   => $city_name,
					'main_first_name' =>$main_first_name,
					'main_last_name' => $main_last_name,
					'main_email' =>$main_email,
					'main_phone_no' => $main_phone_no,
					'main_fax'     => $main_fax,
					'hotel_desc' =>$hotel_desc,
					'hotel_address' => $hotel_address,
					'latitude'     => $latitude,
					'longitude'     => $longitude,
					'near_by_area'     => $near_by_area,
					'near_by_attraction'     => $near_by_attraction,
					'hotel_policies' => $hotel_policies,
					'status' => '1'
					 );
				//print '<pre />';print_r($data);exit;
				  $this->db->insert('sup_hotels',$data);
				  //echo  $this->db->last_query();exit;
					$id=$this->db->insert_id();

		    $data1 =array(
				'hotel_code' => 'CRS'.$id
		         );
				 
			//print '<pre />';print_r($data);exit;
			 $where1 = "sup_hotel_id = $id";
		     $this->db->update('sup_hotels',$data1,$where1);


					
		  }else {
			   $user_id = $this->session->userdata('user_id');
			  $data1 =  array(
					'supplier_id' => $user_id,
					'custom_hotel_id' 	=> $cus_hotel_id,
					'hotel_name' => $hotel_name,
					'city_name'   => $city_name,
					'main_first_name' =>$main_first_name,
					'main_last_name' => $main_last_name,
					'main_email' =>$main_email,
					'main_phone_no' => $main_phone_no,
					'main_fax'     => $main_fax,
					'hotel_desc' =>$hotel_desc,
					'hotel_address' => $hotel_address,
					'latitude'     => $latitude,
					'longitude'     => $longitude,
					'near_by_area'     => $near_by_area,
					'near_by_attraction'     => $near_by_attraction,
					'hotel_policies' => $hotel_policies,
					'status' => '1'
					 );
			 $this->db->insert('sup_hotels',$data1);
			  $id1 = $this->db->insert_id();
			  
			   $data2=array(
				'hotel_code' => 'CRS'.$id1
		        );
				 
			//print '<pre />';print_r($data);exit;
			 $where2 = "sup_hotel_id = $id1";
		     $this->db->update('sup_hotels',$data2,$where2);
				  //echo  $this->db->last_query();exit;
			 
			  
		  }
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function get_hotel_details()
	   {
		   $this->db->select('*');
		   $this->db->from('sup_hotels');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
		   
	   }
	   
		public function record_count() {
			return $this->db->count_all("sup_hotels");
		}
		public function record_count_suppliers() {
				$this->db->from('admin');
				$this->db->where('admin_type',3);
			return  $this->db->count_all_results();
		}
		
		public function fetch_hotels($limit, $start, $keyword='', $asc='') 
		{
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			$this->db->from('sup_hotels');
			$this->db->join('admin', 'sup_hotels.supplier_id = admin.user_id');
			
			if($keyword!=''){
				$this->db->like('sup_hotels.hotel_name',$keyword);
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
				$this->db->order_by("sup_hotel_id", "desc");
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
	   public function fetch_hotels_supplier($limit, $start, $keyword='', $asc='',$user_id) 
		{
			$this->db->limit($limit, $start);
			
			$this->db->select('*');
			$this->db->from('sup_hotels');
			$this->db->join('admin', 'sup_hotels.supplier_id = admin.user_id');
			$this->db->where('supplier_id',$user_id);
			
			if($keyword!=''){
				$this->db->like('sup_hotels.hotel_name',$keyword);
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
				$this->db->order_by("sup_hotel_id", "desc");
			}
			
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
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
	   public function update_hotel_list($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "sup_hotel_id = $id";
				if ($this->db->delete('sup_hotels', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_hotel_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_hotels', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function get_sup_hotel_details($id)
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
	   public function edit_hotel_details($cus_hotel_id,$hotel_name,$city_name,$main_first_name,$main_last_name,$main_email,
			$main_phone_no,$main_fax,$hotel_desc,$hotel_address,$hotel_policies,$latitude,$longitude,$near_by_area,$near_by_attraction,$id)
	   {
		    $data =array(
				'custom_hotel_id' 	=> $cus_hotel_id,
				'hotel_name' => $hotel_name,
				'city_name'   => $city_name,
				'main_first_name' =>$main_first_name,
				'main_last_name' => $main_last_name,
				'main_email' =>$main_email,
				'main_phone_no' => $main_phone_no,
				'main_fax'     => $main_fax,
				'hotel_desc' =>$hotel_desc,
				'hotel_address' => $hotel_address,
				'latitude'     => $latitude,
				'longitude'     => $longitude,
				'near_by_area'     => $near_by_area,
				'near_by_attraction'     => $near_by_attraction,
				'hotel_policies' => $hotel_policies

		         );
				 
				 $where ="sup_hotel_id = $id";
				//print '<pre />';print_r($data);exit;
				  $this->db->update('sup_hotels',$data,$where);
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
	   public function add_hotel_facility($facility_name,$sup_hotel_id)
	   {
		  $where2 = "sup_hotel_id = $sup_hotel_id";
		 $this->db->delete('sup_hotel_facilities', $where2);
		// echo  count($facility_name);exit;
			$hotel_code ="CRS".$sup_hotel_id;
		   for($i=0;$i<count($facility_name);$i++)
		   {
			  //$i=1;
			   $data =array(
					'amenity_list_id' 	=> $facility_name[$i],
					'sup_hotel_id' 	=> $sup_hotel_id,
					'hotel_code' 	=> $hotel_code,
					'status' => '1'
					);
					//print '<pre />';print_r($data);exit;
		  
			$this->db->insert('sup_hotel_facilities',$data);
		
			
		   }
		  
		   return true;
			
	   }
	   public function add_hotel_near_by_location($global_near_by_location_id,$sup_hotel_id)
	   {
		  $where2 = "sup_hotel_id = $sup_hotel_id";
		 $this->db->delete('sup_hotel_near_by_location', $where2);
		// echo  count($facility_name);exit;
			$hotel_code ="CRS".$sup_hotel_id;
		   for($i=0;$i<count($global_near_by_location_id);$i++)
		   {
			  //$i=1;
			   $data =array(
					'global_near_by_location_id' => $global_near_by_location_id[$i],
					'sup_hotel_id' 	=> $sup_hotel_id,
					'status' => '1',
					'hotel_code' => $hotel_code
					);
					//print '<pre />';print_r($data);exit;
		  
			$this->db->insert('sup_hotel_near_by_location',$data);
		
			
		   }
		  
		   return true;
			
	   }
	    public function add_hotel_room_facility($facility_name,$sup_hotel_id,$sup_room_details_id)
	   {
		  $where2 = "sup_room_details_id = $sup_room_details_id";
		 $this->db->delete('sup_hotel_room_facilities', $where2);
		// echo  count($facility_name);exit;
			$hotel_code ="CRS".$sup_hotel_id;
		   for($i=0;$i<count($facility_name);$i++)
		   {
			  //$i=1;
			   $data =array(
					'amenity_list_id' 	=> $facility_name[$i],
					'sup_hotel_id' 	=> $sup_hotel_id,
					'hotel_code' => $hotel_code,
					'sup_room_details_id' => $sup_room_details_id,
					'status' => '1'
					);
					//print '<pre />';print_r($data);exit;
		  
			$this->db->insert('sup_hotel_room_facilities',$data);
		
			
		   }
		  
		   return true;
			
	   }
	   public function add_hotel_amenities($amenity_name)
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
	    public function add_car_amenities($amenity_name)
	   {
		   $data =array(
				'amenity_name' 	=> $amenity_name,
				'status' => '1'
				);
			$this->db->insert('global_car_amenity_list',$data);
			$id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function update_hotel_facility($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "sup_fac_id = $id";
				if ($this->db->delete('sup_hotel_facilities', $where2)) {
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
				if ($this->db->update('sup_hotel_facilities', $data, $where)) {
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
	    public function update_car_amenity_list($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "car_amenitity_list_id  = $id";
				if ($this->db->delete('global_car_amenity_list', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "car_amenitity_list_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('global_car_amenity_list', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
		public function uploadPhotos($fileName, $tempFile, $targetPath, $sup_hotel_id)
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
				'sup_hotel_id' => $sup_hotel_id,
				'image_name' => $image,
				'status' => 1
				);
				//print '<pre />';print_r($data);exit;
				$this->db->insert('sup_hotel_images', $data);
				$id = $this->db->insert_id();
				return true;
			}	
		}
		public function getImages($sup_hotel_id)
		{		
		 	$this->db->select('*');
		  	$this->db->from('sup_hotel_images');
		    $this->db->where('sup_hotel_id',$sup_hotel_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function getVideos($sup_hotel_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_hotel_videos');
		    $this->db->where('sup_hotel_id',$sup_hotel_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function insert_hotel_images($sup_hotel_id,$image_name)
	   {
		   $hotel_code ="CRS".$sup_hotel_id;
		   $data = array(
				'sup_hotel_id' => $sup_hotel_id,
				'hotel_code' 	=> $hotel_code,
				'image_name' => $image_name,
				'status' => 1
				);
			$this->db->insert('sup_hotel_images', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	   public function delete_picture()
	   {
		
			$select = "SELECT image_name FROM sup_hotel_images WHERE sup_hotel_images_id = '".$_REQUEST['picId']."'";
			$query=$this->db->query($select);
			foreach ($query->result() as $row)	{
				$image_name = $row->image_name;
			}
			$targetPath = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/supplier_hotels_images';
			$targetFile = 	rtrim($targetPath,'/') . '/' . $image_name;
			unlink($targetFile);
			
			$picId = $_REQUEST['picId'];
			$where = "sup_hotel_images_id = $picId";
			if ($this->db->delete('sup_hotel_images', $where)) {
				echo 'success';
			} else {
				return false;
			}
	   }
	   public function  status_pic()
	   {
			echo $picId = $_REQUEST['picId'];
			echo $status = $_REQUEST['status'];
			$this->db->query("UPDATE sup_hotel_images SET status = '".$status."' WHERE sup_hotel_images_id='".$picId."'");
			return true;
	  }
	   public function insert_hotel_videos($sup_hotel_id,$hotel_video_name)
	   {
		   $data = array(
				'sup_hotel_id' => $sup_hotel_id,
				'video_name' => $hotel_video_name,
				'status' => 1
				);
			$this->db->insert('sup_hotel_videos', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	   public function add_room_categoty_type($sup_hotel_id,$categoty_type)
	   {
		    $data = array(
				'sup_hotel_id' => $sup_hotel_id,
				'categoty_type' => $categoty_type,
				'status' => 1
				);
			$this->db->insert('sup_room_category_type', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	   public function add_hotel_room_categoty_type($category_type)
	   {
		  // echo $category_type;
		    $data = array(
				'category_type' => $category_type,
				'status' => 1
				);
			//print '<pre />';print_r($data);exit;
			$this->db->insert('global_room_category_type', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	    public function add_near_by_location($category_type)
	   {
		  // echo $category_type;
		    $data = array(
				'location_name' => $category_type,
				'status' => 1
				);
			//print '<pre />';print_r($data);exit;
			$this->db->insert('global_near_by_location', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	   public function get_details_of_room_cat_type($sup_hotel_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_room_category_type');
		    $this->db->where('sup_hotel_id',$sup_hotel_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function update_room_hotel_facility($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "global_room_category_type_id = $id";
				if ($this->db->delete('global_room_category_type', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "global_room_category_type_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('global_room_category_type', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function update_near_by_location($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "global_near_by_location_id = $id";
				if ($this->db->delete('global_near_by_location', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "global_near_by_location_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('global_near_by_location', $data, $where)) {
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
	   public function get_hotel_room_category_type($id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('global_room_category_type');
		    $this->db->where('global_room_category_type_id',$id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }
	   public function get_near_by_location_type($id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('global_near_by_location');
		    $this->db->where('global_near_by_location_id ',$id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }
	   public function update_room_categoty_type($category_type,$id)
	   {
		   $data =array('category_type'=> $category_type );
		   $where ="sup_room_cate_type_id = $id";
		   $this->db->update('sup_room_category_type',$data,$where);
		 // echo  $this->db->last_query();exit;
		   $id = $this->db->insert_id();
			return true;
	   }
	   public function update_hotel_room_categoty_type($category_type,$id)
	   {
		   $data =array('category_type'=> $category_type );
		   $where ="global_room_category_type_id = $id";
		   $this->db->update('global_room_category_type',$data,$where);
		 // echo  $this->db->last_query();exit;
		   $id = $this->db->insert_id();
			return true;
	   }
	   public function update_near_by_location_type($category_type,$id)
	   {
		   $data =array('location_name'=> $category_type );
		   $where ="global_near_by_location_id  = $id";
		   $this->db->update('global_near_by_location',$data,$where);
		 // echo  $this->db->last_query();exit;
		   $id = $this->db->insert_id();
			return true;
	   }
	   public function add_hotel_extra_product($sup_hotel_id,$product_name,$payment_mode,$price)
	   {
		   $hotel_code ="CRS".$sup_hotel_id;
		   $data =array('product_name'=> $product_name ,
		   				'sup_hotel_id'=> $sup_hotel_id,
						'payment_mode'=> $payment_mode ,
		   				'price'=> $price,
						'hotel_code' => $hotel_code,
						'status' =>1
		   
		   				);
				//print '<pre />';print_r($data);exit;
		    $this->db->insert('sup_hotel_extra_products', $data);
			$id = $this->db->insert_id();
			return true;
	   }
	   public function get_avilable_products($sup_hotel_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_hotel_extra_products');
		    $this->db->where('sup_hotel_id',$sup_hotel_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function get_near_by_location_details($sup_hotel_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_hotel_near_by_location');
		    $this->db->where('sup_hotel_id',$sup_hotel_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function update_hotel_extra_product($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "sup_hotel_extra_products_id  = $id";
				if ($this->db->delete('sup_hotel_extra_products', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_hotel_extra_products_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_hotel_extra_products', $data, $where)) {
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
	    public function get_global_car_amenities()
	   {		
		 	$this->db->select('*');
		  	$this->db->from('global_car_amenity_list');
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function get_all_hotel_facility()
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
	    public function get_all_hotel_available_facility($sup_hotel_id)
	   {		
		 	$this->db->select('*');
		  	$this->db->from('sup_hotel_facilities');
			$this->db->where('sup_hotel_id',$sup_hotel_id);
		    $query = $this->db->get();
			
		 if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   
	  public  function get_hotel_facilities($sup_hotel_id, $id)
	  {	
	  	  
			$select = "SELECT * FROM sup_hotel_facilities where sup_hotel_id = ".$sup_hotel_id." and amenity_list_id = ".$id." ";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
	 }
	  public  function get_hotel_near_by_location($sup_hotel_id, $id)
	  {	
	  	  
			$select = "SELECT * FROM sup_hotel_near_by_location where sup_hotel_id = ".$sup_hotel_id." and global_near_by_location_id = ".$id." ";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
	 }
	 public function get_hotel_room_facilities($sup_hotel_id,$sup_room_details_id,$id)
	 {
		 $select = "SELECT * FROM sup_hotel_room_facilities where sup_room_details_id=".$sup_room_details_id." and amenity_list_id = ".$id." ";
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
	
	public function get_available_category()
	{
		$this->db->select('*');
		$this->db->from('global_room_category_type');
		$this->db->where('status ',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
		
	}
	public function get_available_car_category()
	{
		$this->db->select('*');
		$this->db->from('global_car_type');
		$this->db->where('status ',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
		
	}
	
	public function add_room_plan($global_room_category_type_id,$room_name,$room_desc,$room_policies,$occupancy,$no_of_adults,$no_of_childs,
			$total_no_of_rooms,$room_critical_level,$no_of_rooms_left,$sup_hotel_id)
	{
			//print '<pre />';print_r($cost_price);exit;
			
			//print'<pre>';print_r($room_avail_date_from);exit;
			$hotel_code ="CRS".$sup_hotel_id;
			$data = array(
						'sup_hotel_id' => $sup_hotel_id,
						'global_room_category_type_id' => $global_room_category_type_id,
						'hotel_code' => $hotel_code,
						'room_name' => $room_name,
						'room_desc' => $room_desc,
						'room_policies' => $room_policies,
						'occupancy' => $occupancy,
						'no_of_adults' => $no_of_adults,
						'no_of_childs' => $no_of_childs,
						'total_no_of_rooms' => $total_no_of_rooms,
						'room_critical_level' => $room_critical_level,
						'no_of_rooms_left' => $no_of_rooms_left,
						'status' => 1
						);
			
			
			//print'<pre>';print_r($data);exit;
			
			$this->db->insert('sup_hotel_room_details',$data);
			$id = $this->db->insert_id();
			
				
	}
	public function get_hotel_room_details_list($sup_hotel_id,$limit, $start, $keyword='')
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('sup_hotel_room_details');
		$this->db->where('sup_hotel_id',$sup_hotel_id);
		$this->db->join('global_room_category_type', 'sup_hotel_room_details.global_room_category_type_id = global_room_category_type.global_room_category_type_id');
		if($keyword!=''){
			$like = "(`sup_hotel_room_details`.`room_name` LIKE '%".$keyword."%' OR `sup_hotel_room_details`.`total_no_of_rooms` LIKE '%".$keyword."%' OR `global_room_category_type`.`category_type` LIKE '%".$keyword."%')";
			$this->db->where($like);
		}
		$query = $this->db->get();
		// echo $this->db->last_query();exit;
		if ($query->num_rows() > 0)
		{
				return $query->result();
		} 
		else 
		{
				return false;	
		}
	}
	public function get_hotel_room_details($sup_hotel_id)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_room_details');
		$this->db->where('sup_hotel_id',$sup_hotel_id);
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
	public function record_count_hotels($sup_hotel_id) {
		$this->db->from('sup_hotel_room_details');
		$this->db->where('sup_hotel_id',$sup_hotel_id);
		return  $this->db->count_all_results();
	}
	public function get_avail_category_type($id)
	{
		$this->db->select('*');
		$this->db->from('global_room_category_type');
		$this->db->where('global_room_category_type_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
				$row= $query->row();
				return $row->category_type;
		} 
		else 
		{
				return false;	
		}
	}
	public function get_partitucar_admin($id)
	{
		$this->db->select('*');
		$this->db->from('admin_type');
		$this->db->where('admin_type_id',$id);
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
	public function get_partitucar_sub_admin($id)
	{
		$this->db->select('*');
		$this->db->from('sub_admin_type');
		$this->db->where('sub_admin_type_id',$id);
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
	public function get_partitucar_supplier($id)
	{
		$this->db->select('*');
		$this->db->from('supplier_type');
		$this->db->where('supplier_type_id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if ($query->num_rows() > 0)
		{
			return $query->row();
				
		} 
		else 
		{
				return false;	
		}
	}
	public function update_hotel_room_details($id,$status)
    {
			if($status == 2)
			{
				$where2 = "sup_room_details_id  = $id";
				if ($this->db->delete('sup_hotel_room_details', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_room_details_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_hotel_room_details', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	  }
	public function get_hotel_room_price_details($id)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_room_details');
		$this->db->where('sup_room_details_id',$id);
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
	public function get_room_price_details($id)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_room_period_details');
		$this->db->where('sup_hotel_room_period_details_id',$id);
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
			$select = "SELECT * FROM sup_room_maintain_month where sup_hotel_room_period_details_id = ".$_REQUEST['rate_id']." ORDER BY date ASC"; 
			$query	= $this->db->query($select); 
			if ($query->num_rows() > 0){
				$avail_dates = $query->result();
				//print'<pre />';print_r($avail_dates);exit;
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array('avail_dates'=>$avail_dates)));
			}
		}
	}
	
	public function update_room_plan($global_room_category_type_id,$room_name,$room_desc,$room_policies,$occupancy,$no_of_adults,$no_of_childs,$total_no_of_rooms,$room_critical_level,$no_of_rooms_left,$sup_hotel_id,$id)
	{
		//print '<pre />';print_r($avilable_rooms);exit;
			$data = array(
						'global_room_category_type_id' => $global_room_category_type_id,
						'room_name' => $room_name,
						'room_desc' => $room_desc,
						'room_policies' => $room_policies,
						'occupancy' => $occupancy,
						'no_of_adults' => $no_of_adults,
						'no_of_childs' => $no_of_childs,
						'total_no_of_rooms' => $total_no_of_rooms,
						'room_critical_level' => $room_critical_level,
						'no_of_rooms_left' => $no_of_rooms_left
						);
			
			
			$where = "sup_room_details_id  = $id";
			//print'<pre>';print_r($data);exit;
			$this->db->update('sup_hotel_room_details',$data,$where);
			
							
	   }
	   public function update_admin_type_details($sub_admin_type,$id)
	   {
		   $data = array(
		   					'sub_admin_type'=> $sub_admin_type
							
		   				);
				$where="sub_admin_type_id = $id";
			$this->db->update('sub_admin_type', $data, $where);
			return true;
	   }
	   public function update_supplier_type_details($supplier_type,$id)
	   {
		   $data = array(
		   					'supplier_type'=> $supplier_type
							
		   				);
				$where="supplier_type_id  = $id";
			$this->db->update('supplier_type', $data, $where);
			return true;
	   }
	   public function update_hotel_images($id,$status)
	   {
			if($status == 2)
			{
				$where2 = "sup_hotel_images_id = $id";
				if ($this->db->delete('sup_hotel_images', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_hotel_images_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_hotel_images', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function approve_hotel_reviews($sup_hotel_id)
	   {
		   $this->db->select('*');
		   $this->db->from('sup_hotel_reviews');
		   $this->db->where('sup_hotel_id',$sup_hotel_id);
		   $query = $this->db->get();
			
		  if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	   public function update_hotel_reviews($id,$status)
	   {
		  
				$where = "sup_hotel_reviews_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_hotel_reviews', $data, $where)) {
					return true;
				} else {
					return false;
				}
			
	   }
	   public function get_particular_hotel_review($id)
	  {
		  $this->db->select('*');
		  $this->db->from('sup_hotel_reviews');
		  $this->db->where('sup_hotel_reviews_id',$id);
		  $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	  }
	public function get_hotel_supplier_details($id,$keyword='')
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('admin.supplier_type_id',$id);

		if($keyword!=''){
			$this->db->like('admin.firstname',$keyword);
			// $this->db->or_like('admin.email',$keyword);
			// $this->db->or_like('admin.mobile_no',$keyword);
		}
		$query = $this->db->get();
		// echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
			return '';			
		}else{
		 
			return $query->result();				
		}
	}
	  
	public function getHotelSupplierPrevilages($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$this->db->where('user_id',$supplier_id);
		$query = $this->db->get();
		if($query->result()){
			$hotelSupplierPrevilages= $query->result();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('hotelSupplierPrevilages'=>$hotelSupplierPrevilages)));
		}
		else{
			return array();
		}
	}
	public function getVillaSupplierPrevilages($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$this->db->where('user_id',$supplier_id);
		$query = $this->db->get();
		if($query->result()){
			$hotelSupplierPrevilages= $query->result();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('hotelSupplierPrevilages'=>$hotelSupplierPrevilages)));
		}
		else{
			return array();
		}
	}
	public function getCarSupplierPrevilages($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$this->db->where('user_id',$supplier_id);
		$query = $this->db->get();
		if($query->result()){
			$hotelSupplierPrevilages= $query->result();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('hotelSupplierPrevilages'=>$hotelSupplierPrevilages)));
		}
		else{
			return array();
		}
	}
	public function set_hotel_previlages($user_id,$add_hotel,$edit_hotel,$delete_hotel,$add_hotel_rooms,$edit_hotel_rooms,$delete_hotel_rooms,$hotel_room_inventory,$hotel_room_pricing,$view_order,$view_order_reports,$view_sales_reports,$view_hotel_rooms,$view_hotels)
	{
		
		$hotel_pre =$this->admin_model->check_hotel_supplier_previliges($user_id);
		if(!empty($hotel_pre))
					{
		$data = array(
						
						'add_hotel'  =>$add_hotel,
						'edit_hotel' =>$edit_hotel,
						'delete_hotel' =>$delete_hotel,
						'view_hotels' => $view_hotels,
						'add_hotel_rooms' => $add_hotel_rooms,
						'edit_hotel_rooms' => $edit_hotel_rooms,
						'delete_hotel_rooms'=> $delete_hotel_rooms,
						'hotel_room_inventory' =>$hotel_room_inventory,
						'hotel_pricing' => $hotel_room_pricing,
						'view_order' => $view_order,
						'view_order_reports' => $view_order_reports,
						'view_sales_reports' => $view_sales_reports,
						'view_hotel_rooms' => $view_hotel_rooms
						
						
					);
				//print '<pre />';print_r($data);exit;	
				$where ="user_id =$user_id";
				$this->db->update('global_all_previliges',$data,$where);
			
		}else {
			$data1 = array(
						'user_id' =>$user_id,
						'add_hotel'  =>$add_hotel,
						'edit_hotel' =>$edit_hotel,
						'delete_hotel' =>$delete_hotel,
						'view_hotels' => $view_hotels,
						'add_hotel_rooms' => $add_hotel_rooms,
						'edit_hotel_rooms' => $edit_hotel_rooms,
						'delete_hotel_rooms'=> $delete_hotel_rooms,
						'hotel_room_inventory' =>$hotel_room_inventory,
						'hotel_pricing' => $hotel_room_pricing,
						'view_order' => $view_order,
						'view_order_reports' => $view_order_reports,
						'view_sales_reports' => $view_sales_reports,
						'view_hotel_rooms' => $view_hotel_rooms,
						'admin_type' => 3,
						'roll_type' => 'sup1'
						
					);
			$this->db->insert('global_all_previliges',$data1);
			
		}
	}
	public function check_hotel_supplier_previliges($user_id)
	{
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->row();
		
	}
	public function check_villa_supplier_previliges($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$this->db->where('user_id',$supplier_id);
		$query = $this->db->get();
		return $query->row();
		
	}
	public function check_car_supplier_previliges($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$this->db->where('user_id',$supplier_id);
		$query = $this->db->get();
		return $query->row();
		
	}
	public function set_villa_previlages($supplier_id,$add_villa,$edit_villa,$delete_villa,$villa_room_inventory,$villa_pricing,$view_order,$view_order_reports,$view_sales_reports,$view_villa)
	{
		
		$hotel_pre =$this->admin_model->check_villa_supplier_previliges($supplier_id);
		if(!empty($hotel_pre))
					{
		$data = array(
						
						'add_villa'  =>$add_villa,
						'edit_villa' =>$edit_villa,
						'delete_villa' =>$delete_villa,
						'view_villa' => $view_villa,
						'villa_room_inventory' =>$villa_room_inventory,
						'villa_pricing' => $villa_pricing,
						'view_order' => $view_order,
						'view_order_reports' => $view_order_reports,
						'view_sales_reports' => $view_sales_reports
					
						
					);
				//print '<pre />';print_r($data);exit;	
				$where ="user_id =$supplier_id";
				$this->db->update('global_all_previliges',$data,$where);
			
		}else {
			$data1 = array(
						'user_id' =>$supplier_id,
						'add_villa'  =>$add_villa,
						'edit_villa' =>$edit_villa,
						'delete_villa' =>$delete_villa,
						'view_villa' => $view_villa,
						'villa_room_inventory' =>$villa_room_inventory,
						'villa_pricing' => $villa_pricing,
						'view_order' => $view_order,
						'view_order_reports' => $view_order_reports,
						'view_sales_reports' => $view_sales_reports,
						'admin_type' => 3,
						'roll_type' => 'sup2'

					);
			$this->db->insert('global_all_previliges',$data1);
			
		}
	}
	public function set_car_previlages($supplier_id,$add_car,$edit_car,$delete_car,$room_inventory,$room_pricing,$view_order,$view_order_reports,$view_sales_reports,$view_cars)
	{
		
		$hotel_pre =$this->admin_model->check_car_supplier_previliges($supplier_id);
		if(!empty($hotel_pre))
					{
		$data = array(
						
						'add_car'  =>$add_car,
						'edit_car' =>$edit_car,
						'delete_car' =>$delete_car,
						'car_room_inventory' =>$room_inventory,
						'car_pricing' => $room_pricing,
						'view_order' => $view_order,
						'view_cars' => $view_cars,
						'view_order_reports' => $view_order_reports,
						'view_sales_reports' => $view_sales_reports
						
					);
				//print '<pre />';print_r($data);exit;	
				$where ="user_id =$supplier_id";
				$this->db->update('global_all_previliges',$data,$where);
			
		}else {
			$data1 = array(
						'user_id' =>$supplier_id,
						'add_car'  =>$add_car,
						'edit_car' =>$edit_car,
						'delete_car' =>$delete_car,
						'view_cars' => $view_cars,
						'car_room_inventory' =>$room_inventory,
						'car_pricing' => $room_pricing,
						'view_order' => $view_order,
						'view_order_reports' => $view_order_reports,
						'view_sales_reports' => $view_sales_reports,
						'admin_type' => '3',
						'roll_type' => 'sup3'
						
						
					);
			$this->db->insert('global_all_previliges',$data1);
			
		}
	}
	public function set_call_center_previlages($create_order,$edit_order,$delete_order,$view_order,$create_complaint,$edit_complaint,$delete_complaint,$static_pages,$email_templates,$top_destinations,$deals,$news)
	{
		$data= array(
					'create_order' => $create_order,
					'edit_order' => $edit_order,
					'delete_order' => $delete_order,
					'view_order' => $view_order,
					'create_complaint' => $create_complaint,
					'edit_complaint' => $edit_complaint,
					'delete_complaint' => $delete_complaint,
					'static_pages' => $static_pages,
					'email_templates' => $email_templates,
					'top_destinations' => $top_destinations,
					'deals' => $deals,
					'news' => $news
		
					);
			$where ="previliges_call_center_agents_id =1";
			//print '<pre />';print_r($data);exit;
			$this->db->update('previliges_call_center_agents',$data, $where);
			return true;
	}
	public function get_call_center_previliges()
	{
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$query = $this->db->get();
		return $query->row();
	}
	public function get_data_entry_roles_previliges()
	{
		$this->db->select('*');
		$this->db->from('previliges_data_entry_agents');
		$query = $this->db->get();
		return $query->row();
	}
	public function get_b2b_roles_previliges()
	{
		$this->db->select('*');
		$this->db->from('previliges_b2b');
		$query = $this->db->get();
		return $query->row();
	}
	public function set_data_entry_previlages($add_hotel,$edit_hotel,$delete_hotel,$add_hotel_rooms,$edit_hotel_rooms,$delete_hotel_rooms,$hotel_room_inventory,$hotel_pricing,$add_villa,$edit_villa,$delete_villa,$villa_room_inventory,$villa_pricing,$add_car,$edit_car,$delete_car,$car_room_inventory,$car_pricing)
	{
		$data= array(
					'add_hotel' => $add_hotel,
					'edit_hotel' => $edit_hotel,
					'delete_hotel' => $delete_hotel,
					'add_hotel_rooms' => $add_hotel_rooms,
					'edit_hotel_rooms' => $edit_hotel_rooms,
					'delete_hotel_rooms' => $delete_hotel_rooms,
					'hotel_room_inventory' => $hotel_room_inventory,
					'hotel_pricing' => $hotel_pricing,
					'add_villa' => $add_villa,
					'edit_villa' => $edit_villa,
					'delete_villa' => $delete_villa,
					'villa_room_inventory' => $villa_room_inventory,
					'villa_pricing' => $villa_pricing,
					'add_car' => $add_car,
					'edit_car' => $edit_car,
					'delete_car' => $delete_car,
					'car_room_inventory' => $car_room_inventory,
					'car_pricing' => $car_pricing
		
					);
					
				$where ="previliges_data_entry_agents_id =1";
			$this->db->update('previliges_data_entry_agents',$data,$where);
	}
	public function set_b2b_previlages($edit_details,$view_reports)
	{
		$data= array(
					'edit_details' => $edit_details,
					'view_reports' => $view_reports
					);
			$where ="previliges_b2b_id =1";
		$this->db->update('previliges_b2b',$data,$where);
	}
	public function get_roles_super_admin()
	{
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$this->db->where('admin_type','1');
		$query = $this->db->get();
		return $query->row();
	}
	public function set_super_admin_previlages($add_admin,$edit_admin,$delete_admin,$static_pages,$email_templates,$top_destinations,$deals,$news,$add_b2c_customer,$edit_b2c_customer,$delete_b2c_customer,$create_order,$edit_order,$delete_order,$view_order,$amenity_list,$currencies,$payment_gateways,$commision,$manage_cities,$manage_amenities,$manage_discounts,$manage_previliges,$add_hotel,$edit_hotel,$delete_hotel,$add_hotel_rooms,$edit_hotel_rooms,$delete_hotel_rooms,$hotel_room_inventory,$hotel_pricing,$add_villa,$edit_villa,$delete_villa,$villa_room_inventory,$villa_pricing,$add_car,$edit_car,$delete_car,$car_room_inventory,$car_pricing,$user_reports,$order_reports,$order_reports_status_wize,$inventory_reports,$sales_reports,$account_reports,$call_center_reports,$call_center_tracking_reports,$add_travel_agents,$edit_travel_agents,$delete_travel_agents,$view_admin_users,$view_b2c_customers,$view_hotels,$view_villa,$view_cars,$view_travel_agents,$view_hotel_rooms,$manage_room_categorys,$add_admin_type,$edit_admin_type,$delete_admin_type,$add_supplier_type,$edit_supplier_type,$delete_supplier_type,$view_supplier_users,$add_supplier_user,$edit_supplier_user,$delete_supplier_user,$view_supplier_type,$view_admin_type,$global_near_by_location)
	{
		
		$data = array(
					'add_travel_agents' => $add_travel_agents,
					'edit_travel_agents' => $edit_travel_agents,
					'delete_travel_agents' => $delete_travel_agents,
					'view_travel_agents' => $view_travel_agents,
					'add_admin' => $add_admin,
					'edit_admin' => $edit_admin,
					'delete_admin' => $delete_admin,
					'view_admin_users' => $view_admin_users,
					'add_admin_type' => $add_admin_type,
					'edit_admin_type' => $edit_admin_type,
					'delete_admin_type' => $delete_admin_type,
					'view_admin_type' => $view_admin_type,
					'add_supplier_type' => $add_supplier_type,
					'edit_supplier_type' => $edit_supplier_type,
					'delete_supplier_type' => $delete_supplier_type,
					'view_supplier_users' => $view_supplier_users,
					'add_supplier_user' => $add_supplier_user,
					'edit_supplier_user' => $edit_supplier_user,
					'delete_supplier_user' => $delete_supplier_user,
					'view_supplier_type' => $view_supplier_type,
					'static_pages' => $static_pages,
					'email_templates' => $email_templates,
					'top_destinations' => $top_destinations,
					'deals' => $deals,
					'news' => $news,
					'add_b2c_customer' => $add_b2c_customer,
					'edit_b2c_customer' => $edit_b2c_customer,
					'delete_b2c_customer' => $delete_b2c_customer,
					'view_b2c_customers' => $view_b2c_customers,
					'create_order' => $create_order,
					'edit_order' => $edit_order,
					'delete_order' => $delete_order,
					'view_order' => $view_order,
					'amenity_list' => $amenity_list,
					'currencies' => $currencies,
					'payment_gateways' => $payment_gateways,
					'commision' => $commision,
					'manage_cities' => $manage_cities,
					'manage_amenities' => $manage_amenities,
					'manage_discounts' => $manage_discounts,
					'manage_previliges' => $manage_previliges,
					'global_near_by_location' => $global_near_by_location,
					'add_hotel' => $add_hotel,
					'edit_hotel' => $edit_hotel,
					'delete_hotel' => $delete_hotel,
					'view_hotels' => $view_hotels,
					'add_hotel_rooms' => $add_hotel_rooms,
					'edit_hotel_rooms' => $edit_hotel_rooms,
					'delete_hotel_rooms' => $delete_hotel_rooms,
					'view_hotel_rooms' => $view_hotel_rooms,
					'hotel_room_inventory' => $hotel_room_inventory,
					'hotel_pricing' => $hotel_pricing,
					'add_villa' => $add_villa,
					'edit_villa' => $edit_villa,
					'delete_villa' => $delete_villa,
					'view_villa' => $view_villa,
					'villa_room_inventory' => $villa_room_inventory,
					'villa_pricing' => $villa_pricing,
					'user_reports' => $user_reports,
					'order_reports' => $order_reports,
					'order_reports_status_wize' => $order_reports_status_wize,
					'inventory_reports' => $inventory_reports,
					'sales_reports' => $sales_reports,
					'account_reports' => $account_reports,
					'call_center_reports' => $call_center_reports,
					'call_center_tracking_reports' => $call_center_tracking_reports,
					'add_car' => $add_car,
					'edit_car' => $edit_car,
					'delete_car' => $delete_car,
					'view_cars' => $view_cars,
					'car_room_inventory' => $car_room_inventory,
					'car_pricing' => $car_pricing,
					'manage_room_categorys' => $manage_room_categorys
					);
			    $where ="admin_type = 1";
				$this->db->update('global_all_previliges',$data,$where);
	}
	public function get_global_city_list()
	{
		$this->db->select('*');
		$this->db->from('global_cities');
		$this->db->where('status',1);
		$query = $this->db->get();
		return $query->result();
		
	}
	public function get_global_room_cate_type()
	{
		$this->db->select('*');
		$this->db->from('global_room_category_type');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_global_near_by_location()
	{
		$this->db->select('*');
		$this->db->from('global_near_by_location');
		$query = $this->db->get();
		return $query->result();
	}
	public function add_sub_admin_type($sub_admin_type)
	{
		
		$data = array('sub_admin_type' =>$sub_admin_type ,'status'=>1);
		$this->db->insert('sub_admin_type',$data);
		$id= $this->db->insert_id();
		$roll_type= "sub".$id;
		$where ="sub_admin_type_id = $id";
		
		$data1 = array('sub_roll_type' =>$roll_type);
		$this->db->update('sub_admin_type',$data1, $where);
		return true;
	}
	public function get_sub_admin_details()
	{
		$this->db->select('*');
		$this->db->from('sub_admin_type');
		$query = $this->db->get();
		return $query->result();
		
	}
	public function record_sub_admin_count() {
		$this->db->from('admin');
		$this->db->where('admin_type',2);
		return  $this->db->count_all_results();
	}

	public function get_sub_admin_user_list($limit, $start, $keyword='')
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->join('sub_admin_type', 'admin.sub_admin_type_id = sub_admin_type.sub_admin_type_id');
		$this->db->where('admin_type',2);
		
		if($keyword!=''){
			$this->db->like('admin.firstname',$keyword);
			$this->db->or_like('admin.email',$keyword);
			$this->db->or_like('admin.mobile_no',$keyword);
			$this->db->or_like('sub_admin_type.sub_admin_type',$keyword);
		}

		$query = $this->db->get();
		return $query->result();
		
	}
	public function get_sub_admin_type($id)
	{
		$this->db->select('*');
		$this->db->from('sub_admin_type');
		$this->db->where('sub_admin_type_id',$id);
		$query = $this->db->get();
		$row = $query->row();
		return $row->sub_admin_type;
		
	}
	 public function sub_admin_registration_details($sub_admin_type_id,$email,$password,$name,$mobile_no,$office_phone_no,$address,$notes)
	 {
		 $roll_type ="sub".$sub_admin_type_id;
		   $data =array(
		   		'sub_admin_type_id' => $sub_admin_type_id,
				'roll_type' => $roll_type,
				'email' 	=> $email,
				'password'	=> $password,
				'firstname' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'notes'     => $notes,
				'admin_type' => '2',
				'status'    =>'1'
		         );
				 
			//print '<pre />';print_r($data);exit;
		     $this->db->insert('admin',$data);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function update_sub_admin_user($id,$status)
	   {
		   if($status == 2)
			{
				$where2 = "user_id = $id";
				if ($this->db->delete('admin', $where2)) {
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
				if ($this->db->update('admin', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	   }
	   public function update_sub_admin_registration_page($sub_admin_type_id,$email,$password,$name,$mobile_no,$office_phone_no,$address,$notes,$id)
	   {
		   $roll_type="sub".$sub_admin_type_id;
		    $data =array(
		   		'sub_admin_type_id' => $sub_admin_type_id,
				'roll_type' => $roll_type,
				'email' 	=> $email,
				'password'	=> $password,
				'firstname' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'notes'     => $notes,
		         );
			$where = "user_id = $id";	 
			//print '<pre />';print_r($data);exit;
		     $this->db->update('admin',$data,$where);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
		public function get_details_of_b2c($limit, $start, $keyword='')
		{
			$this->db->select('*');
			$this->db->from('users');
		    if($keyword!=''){
				$this->db->like('users.name',$keyword);
				$this->db->or_like('users.email',$keyword);
				$this->db->or_like('users.address',$keyword);
				$this->db->or_like('users.office_phone_no',$keyword);
				$this->db->or_like('users.mobile_no',$keyword);
				$this->db->or_like('users.notes',$keyword);
			}
			$this->db->where('user_type_id','2');
			
			$query = $this->db->get();
			
			return  $query->result();
		}
		public function record_count_b2cusers() {
				$this->db->from('users');
				$this->db->where('user_type_id','2');  
			return  $this->db->count_all_results();
		}
	 public function b2c_registration_page($email,$password,$name,$mobile_no,$office_phone_no,$address,$notes,$b2c_user_logo)
	 {
		   $data =array(
					'email' 	=> $email,
					'password'	=> $password,
					'name' => $name,
					'address'   => $address,
					'mobile_no' =>$mobile_no,
					'office_phone_no' => $office_phone_no,
					'notes'     => $notes,
					'user_logo'=>$b2c_user_logo,
					'status'    =>'1',
					'user_type_id' => '2'
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
	   public function update_b2c_user($id,$status)
	   {
		   if($status == 2)
			{
				$where2 = "user_id 	 = $id";
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
	   public function get_details_of_b2c_user($id)
	   {
		   $this->db->select('*');
		   $this->db->from('users');
		   $this->db->where('user_id',$id);
		   $this->db->where('user_type_id','2');
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->row();				
			}
	   }
	    public function update_b2c_registration_page($email,$password,$name,$mobile_no,$office_phone_no,$address,$notes,$id,$b2c_user_logo)
	   {
		    $data =array(
				'email' 	=> $email,
				'password'	=> $password,
				'name' => $name,
				'address'   => $address,
				'mobile_no' =>$mobile_no,
				'office_phone_no' => $office_phone_no,
				'user_logo'=>$b2c_user_logo,
				'notes'     => $notes
		         );
			$where = "user_id = $id";	 
			//print '<pre />';print_r($data);exit;
		     $this->db->update('users',$data,$where);
			 $id=$this->db->insert_id();
			if(!empty($id))
		  	{
			 	return true;
			 }
			else {
				  
				  return false;
			  }
	   }
	   public function get_sub_admin_type_details($keyword='')
	   {
		    $this->db->select('*');
		   $this->db->from('sub_admin_type');
		   $this->db->where('status',1);
			if($keyword!=''){
				$this->db->like('sub_admin_type.sub_admin_type',$keyword);
		    }
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	 public function getSubAdminPrevilages($sub_admin_type_id)
	{
		$roll_type="sub".$sub_admin_type_id;
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$this->db->where('roll_type',$roll_type);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->result()){
			$hotelSupplierPrevilages= $query->result();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('hotelSupplierPrevilages'=>$hotelSupplierPrevilages)));
		}
		else{
			return array();
		}
	}
	public function set_sub_admin_previlages($add_admin,$edit_admin,$delete_admin,$static_pages,$email_templates,$top_destinations,$deals,$news,$add_b2c_customer,$edit_b2c_customer,$delete_b2c_customer,$create_order,$edit_order,$delete_order,$view_order,$amenity_list,$currencies,$payment_gateways,$commision,$manage_cities,$manage_amenities,$manage_discounts,$manage_previliges,$add_hotel,$edit_hotel,$delete_hotel,$add_hotel_rooms,$edit_hotel_rooms,$delete_hotel_rooms,$hotel_room_inventory,$hotel_pricing,$add_villa,$edit_villa,$delete_villa,$villa_room_inventory,$villa_pricing,$add_car,$edit_car,$delete_car,$car_room_inventory,$car_pricing,$user_reports,$order_reports,$order_reports_status_wize,$inventory_reports,$sales_reports,$account_reports,$call_center_reports,$call_center_tracking_reports,$add_travel_agents,$edit_travel_agents,$delete_travel_agents,$view_admin_users,$view_b2c_customers,$view_hotels,$view_villa,$view_cars,$view_travel_agents,$view_hotel_rooms,$sub_admin_type_id,$manage_room_categorys,$add_admin_type,$edit_admin_type,$delete_admin_type,$add_supplier_type,$edit_supplier_type,$delete_supplier_type,$view_supplier_users,$add_supplier_user,$edit_supplier_user,$delete_supplier_user,$view_supplier_type,$view_admin_type,$global_near_by_location)
	{
		$roll_type= "sub".$sub_admin_type_id;
		$hotel_pre =$this->admin_model->check_sub_admin_previliges($roll_type);
		if(!empty($hotel_pre))
					{
		$data = array(
					'add_travel_agents' => $add_travel_agents,
					'edit_travel_agents' => $edit_travel_agents,
					'delete_travel_agents' => $delete_travel_agents,
					'view_travel_agents' => $view_travel_agents,
					'add_admin' => $add_admin,
					'edit_admin' => $edit_admin,
					'delete_admin' => $delete_admin,
					'view_admin_users' => $view_admin_users,
					'add_admin_type' => $add_admin_type,
					'edit_admin_type' => $edit_admin_type,
					'delete_admin_type' => $delete_admin_type,
					'view_admin_type' => $view_admin_type,
					'add_supplier_type' => $add_supplier_type,
					'edit_supplier_type' => $edit_supplier_type,
					'delete_supplier_type' => $delete_supplier_type,
					'view_supplier_users' => $view_supplier_users,
					'add_supplier_user' => $add_supplier_user,
					'edit_supplier_user' => $edit_supplier_user,
					'delete_supplier_user' => $delete_supplier_user,
					'view_supplier_type' => $view_supplier_type,
					'static_pages' => $static_pages,
					'email_templates' => $email_templates,
					'top_destinations' => $top_destinations,
					'deals' => $deals,
					'news' => $news,
					'add_b2c_customer' => $add_b2c_customer,
					'edit_b2c_customer' => $edit_b2c_customer,
					'delete_b2c_customer' => $delete_b2c_customer,
					'view_b2c_customers' => $view_b2c_customers,
					'create_order' => $create_order,
					'edit_order' => $edit_order,
					'delete_order' => $delete_order,
					'view_order' => $view_order,
					'amenity_list' => $amenity_list,
					'currencies' => $currencies,
					'payment_gateways' => $payment_gateways,
					'commision' => $commision,
					'manage_cities' => $manage_cities,
					'manage_amenities' => $manage_amenities,
					'manage_discounts' => $manage_discounts,
					'manage_previliges' => $manage_previliges,
					'global_near_by_location' => $global_near_by_location,
					'add_hotel' => $add_hotel,
					'edit_hotel' => $edit_hotel,
					'delete_hotel' => $delete_hotel,
					'view_hotels' => $view_hotels,
					'add_hotel_rooms' => $add_hotel_rooms,
					'edit_hotel_rooms' => $edit_hotel_rooms,
					'delete_hotel_rooms' => $delete_hotel_rooms,
					'view_hotel_rooms' => $view_hotel_rooms,
					'hotel_room_inventory' => $hotel_room_inventory,
					'hotel_pricing' => $hotel_pricing,
					'add_villa' => $add_villa,
					'edit_villa' => $edit_villa,
					'delete_villa' => $delete_villa,
					'view_villa' => $view_villa,
					'villa_room_inventory' => $villa_room_inventory,
					'villa_pricing' => $villa_pricing,
					'user_reports' => $user_reports,
					'order_reports' => $order_reports,
					'order_reports_status_wize' => $order_reports_status_wize,
					'inventory_reports' => $inventory_reports,
					'sales_reports' => $sales_reports,
					'account_reports' => $account_reports,
					'call_center_reports' => $call_center_reports,
					'call_center_tracking_reports' => $call_center_tracking_reports,
					'add_car' => $add_car,
					'edit_car' => $edit_car,
					'delete_car' => $delete_car,
					'view_cars' => $view_cars,
					'car_room_inventory' => $car_room_inventory,
					'car_pricing' => $car_pricing,
					'manage_room_categorys' => $manage_room_categorys
					
		
					);
				//	print '<pre />';print_r($data);exit;
			    $where =array('roll_type'=> $roll_type,'admin_type'=>'2');
				$this->db->update('global_all_previliges',$data,$where);
				//echo $this->db->last_query();exit;
				
		}else {
				
				$data1 = array(
					'roll_type' => $roll_type,
					'add_travel_agents' => $add_travel_agents,
					'edit_travel_agents' => $edit_travel_agents,
					'delete_travel_agents' => $delete_travel_agents,
					'view_travel_agents' => $view_travel_agents,
					'add_admin' => $add_admin,
					'edit_admin' => $edit_admin,
					'delete_admin' => $delete_admin,
					'view_admin_users' => $view_admin_users,
					'add_admin_type' => $add_admin_type,
					'edit_admin_type' => $edit_admin_type,
					'delete_admin_type' => $delete_admin_type,
					'view_admin_type' => $view_admin_type,
					'add_supplier_type' => $add_supplier_type,
					'edit_supplier_type' => $edit_supplier_type,
					'delete_supplier_type' => $delete_supplier_type,
					'view_supplier_users' => $view_supplier_users,
					'add_supplier_user' => $add_supplier_user,
					'edit_supplier_user' => $edit_supplier_user,
					'delete_supplier_user' => $delete_supplier_user,
					'view_supplier_type' => $view_supplier_type,
					'static_pages' => $static_pages,
					'email_templates' => $email_templates,
					'top_destinations' => $top_destinations,
					'deals' => $deals,
					'news' => $news,
					'add_b2c_customer' => $add_b2c_customer,
					'edit_b2c_customer' => $edit_b2c_customer,
					'delete_b2c_customer' => $delete_b2c_customer,
					'view_b2c_customers' => $view_b2c_customers,
					'create_order' => $create_order,
					'edit_order' => $edit_order,
					'delete_order' => $delete_order,
					'view_order' => $view_order,
					'amenity_list' => $amenity_list,
					'currencies' => $currencies,
					'payment_gateways' => $payment_gateways,
					'commision' => $commision,
					'manage_cities' => $manage_cities,
					'manage_amenities' => $manage_amenities,
					'manage_discounts' => $manage_discounts,
					'manage_previliges' => $manage_previliges,
					'global_near_by_location' => $global_near_by_location,
					'add_hotel' => $add_hotel,
					'edit_hotel' => $edit_hotel,
					'delete_hotel' => $delete_hotel,
					'view_hotels' => $view_hotels,
					'add_hotel_rooms' => $add_hotel_rooms,
					'edit_hotel_rooms' => $edit_hotel_rooms,
					'delete_hotel_rooms' => $delete_hotel_rooms,
					'view_hotel_rooms' => $view_hotel_rooms,
					'hotel_room_inventory' => $hotel_room_inventory,
					'hotel_pricing' => $hotel_pricing,
					'add_villa' => $add_villa,
					'edit_villa' => $edit_villa,
					'delete_villa' => $delete_villa,
					'view_villa' => $view_villa,
					'villa_room_inventory' => $villa_room_inventory,
					'villa_pricing' => $villa_pricing,
					'user_reports' => $user_reports,
					'order_reports' => $order_reports,
					'order_reports_status_wize' => $order_reports_status_wize,
					'inventory_reports' => $inventory_reports,
					'sales_reports' => $sales_reports,
					'account_reports' => $account_reports,
					'call_center_reports' => $call_center_reports,
					'call_center_tracking_reports' => $call_center_tracking_reports,
					'add_car' => $add_car,
					'edit_car' => $edit_car,
					'delete_car' => $delete_car,
					'view_cars' => $view_cars,
					'car_room_inventory' => $car_room_inventory,
					'car_pricing' => $car_pricing,
					'manage_room_categorys' => $manage_room_categorys,
					'admin_type' =>'2'
		
					);
			$this->db->insert('global_all_previliges',$data1);
			
		}
	}
	
	public function check_sub_admin_previliges($roll_type)
	{
		$this->db->select('*');
		$this->db->from('global_all_previliges');
		$this->db->where('roll_type',$roll_type);
		$query = $this->db->get();
		return $query->row();
		
	}
	public function add_global_car_type($car_type)
	{
		 $data =array(
				'car_type' 	=> $car_type,
				'status'	=> 1
				 );
		  $this->db->insert('global_car_type',$data);
		  $id=$this->db->insert_id();
	}
	public function get_global_car_type()
	{
		$this->db->select('*');
		$this->db->from('global_car_type');
		$query = $this->db->get();
		return $query->result();
	}
	public function update_car_type($id,$status)
	{
		   if($status == 2)
			{
				$where2 = "global_car_type_id = $id";
				if ($this->db->delete('global_car_type', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "global_car_type_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('global_car_type', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	 }
	 public function get_global_part_car_type($id)
	 {
		 $this->db->select('*');
		 $this->db->from('global_car_type');
		 $this->db->where('global_car_type_id',$id);
		 $query = $this->db->get();
		 return $query->row();
	 }
   	 public function update_car_type_details($car_type,$id)
	 {
		$data = array(
					'car_type' => $car_type
				);
		 $where = "global_car_type_id = $id";
		 $this->db->update('global_car_type',$data,$where);
	 }
	 public function get_global_city_details()
	 {
		 $this->db->select('*');
		 $this->db->from('global_cities');
		 $this->db->where('status',1);
		 $query = $this->db->get();
		 return $query->result();
	 }
	 public function get_part_city_list($id)
	 {
		  $this->db->select('*');
		 $this->db->from('global_cities');
		 $this->db->where('id',$id);
		 $query = $this->db->get();
		 return $query->row();
	 }
	  public function get_part_region_list($id)
	 {
		  $this->db->select('*');
		 $this->db->from('global_regions');
		 $this->db->where('id',$id);
		 $query = $this->db->get();
		 return $query->row();
	 }
	 public function update_cities($city_name,$reg_id,$id)
	 {
		$data = array(
					'city_name' => $city_name,
					'reg_id' => $reg_id
				);
		 $where = "id = $id";
		 $this->db->update('global_cities',$data,$where);
	 } 
	  public function update_regions($region_name,$id)
	 {
		$data = array(
					'region_name' => $region_name
				);
		 $where = "id = $id";
		 $this->db->update('global_regions',$data,$where);
	 } 
	 public function get_logged_in_user_details($id)
	 {
		  $this->db->select('*');
		 $this->db->from('admin');
		 $this->db->where('user_id',$id);
		 $query = $this->db->get();
		 return $query->row();
	 }
	 public function add_room_pricing($room_avail_date_from,$room_avail_date_to,$avilable_rooms,$cost_price,$markup,$selling_price,$discount_rule,$final_price,$dates,$weekday,$check_markup,$check_discount,$sup_hotel_id, $sup_room_details_id,$check_markup,$check_discount)
	 {
		 
		 //print'<pre>';print_r($room_avail_date_from);exit;
			$data = array(
						'sup_hotel_id' => $sup_hotel_id,
						'sup_room_details_id' => $sup_room_details_id,
						'room_avail_date_from' => $room_avail_date_from,
						'room_avail_date_to' => $room_avail_date_to,
						'check_markup' => $check_markup,
						'check_discount' => $check_discount,
						'status' => 1
						);
			
			
			//print'<pre>';print_r($data);exit;
			
			$this->db->insert('sup_hotel_room_period_details',$data);
			$id = $this->db->insert_id();
			if(isset($final_price) && $final_price != "")
					{
						
						for($i=0; $i<sizeof($dates); $i++)
						{
							//$i=0;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								$date = $day[2].'-'.$day[1].'-'.$day[0]; 
								
								
								$data1 = array(
										'sup_hotel_room_period_details_id' => $id,
										'sup_room_details_id' => $sup_room_details_id,
										'sup_hotel_id' => $sup_hotel_id,
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
			
									$this->db->insert('sup_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
						
							}
						}
					}			
	 }
	  public function add_room_inventory($room_avail_date_from,$room_avail_date_to,$avilable_rooms,$dates,$weekday,$sup_hotel_id, $sup_room_details_id)
	 {
		 
		 //print'<pre>';print_r($room_avail_date_from);exit;
		 	$hotel_code ="CRS".$sup_hotel_id;
			$data = array(
						'sup_hotel_id' => $sup_hotel_id,
						'hotel_code' => $hotel_code,
						'sup_room_details_id' => $sup_room_details_id,
						'room_avail_date_from' => $room_avail_date_from,
						'room_avail_date_to' => $room_avail_date_to,
						'status' => 1
						);
			
			
			//print'<pre>';print_r($data);exit;
			
			$this->db->insert('sup_hotel_room_period_details',$data);
			$id = $this->db->insert_id();
			
						
						for($i=0; $i<sizeof($dates); $i++)
						{
							//$i=0;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								$date = $day[2].'-'.$day[1].'-'.$day[0]; 
								
								
								$data1 = array(
										'sup_hotel_room_period_details_id' => $id,
										'sup_room_details_id' => $sup_room_details_id,
										'hotel_code' => $hotel_code,
										'sup_hotel_id' => $sup_hotel_id,
										'date' => $date,
										'week_day' => $weekday[$i],
										'day' => $day[0],
										'month' => $day[1],
										'year' => $day[2],
							            'avilable_rooms' => $avilable_rooms[$i],
										'status' => 1
										);
								//print'<pre>';print_r($data1);exit;
			
									$this->db->insert('sup_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
						
							}
						}
						
	 }
	 
	public function get_room_pricing_details($sup_hotel_id, $sup_room_details_id)
	 {
		 $this->db->select('*');
		 $this->db->from('sup_hotel_room_period_details');
		 $this->db->where('sup_room_details_id',$sup_room_details_id);
		 $this->db->order_by('room_avail_date_from','desc');
		 $query = $this->db->get();
		 return $query->result();
	 }
	public function get_room_pricing_details_list($sup_hotel_id, $sup_room_details_id,$limit, $start, $keyword='')
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('sup_hotel_room_period_details');
		$this->db->where('sup_room_details_id',$sup_room_details_id);
		 
		if($keyword!=''){
		// $this->db->like("'".$keyword."' between date_start and date_stop"); 
			$this->db->where('sup_hotel_room_period_details.room_avail_date_from <=',$keyword);
			$this->db->where('sup_hotel_room_period_details.room_avail_date_to >=',$keyword);
		}
		 $query = $this->db->get();
		// echo '<pre>';print_r($this->db->last_query());echo '</pre>';exit;
		 return $query->result();
	}
	public function record_count_room_inventory($sup_room_details_id) {
		$this->db->from('sup_hotel_room_period_details');
		$this->db->where('sup_room_details_id',$sup_room_details_id);
		return  $this->db->count_all_results();
	}

	 public function update_room_price($room_avail_date_from,$room_avail_date_to,$avail_dates,$avail_datess,$weekday,$avilable_rooms,$cost_price,$markup,$selling_price,$discount_rule,$final_price,$check_markup,$check_discount,$sup_hotel_id,$sup_room_details_id,$id)
	{
		//print '<pre />';print_r($avilable_rooms);exit;
			$hotel_code ="CRS".$sup_hotel_id;
			$data = array(
						'room_avail_date_from' => $room_avail_date_from,
						'room_avail_date_to' => $room_avail_date_to,
						'check_markup' => $check_markup,
						'check_discount' => $check_discount
						);
			
			
			$where = "sup_hotel_room_period_details_id = $id";
			//print'<pre>';print_r($data);exit;
			$this->db->update('sup_hotel_room_period_details',$data,$where);
			$delqry = "DELETE FROM sup_room_maintain_month WHERE sup_hotel_room_period_details_id = ".$id.""; 
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
					{ // $i=0;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								 $date = $day[0].'-'.$day[1].'-'.$day[2]; 
								
								$data1 = array(
										'sup_hotel_room_period_details_id' => $id,
										'sup_room_details_id' => $sup_room_details_id,
										'sup_hotel_id' => $sup_hotel_id,
										'hotel_code' => $hotel_code,
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
			
									$this->db->insert('sup_room_maintain_month',$data1);
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
										'sup_hotel_room_period_details_id' => $id,
										'sup_room_details_id' => $sup_room_details_id,
										'sup_hotel_id' => $sup_hotel_id,
										'hotel_code' => $hotel_code,
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
			
									$this->db->insert('sup_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
							}
					}
			  }
	   }
	   
	public function update_room_inventory($room_avail_date_from,$room_avail_date_to,$avail_dates,$avail_datess,$weekday,$avilable_rooms,$sup_hotel_id,$sup_room_details_id,$id)
	{
		//print '<pre />';print_r($avilable_rooms);exit;
			$hotel_code ="CRS".$sup_hotel_id;
			$data = array(
						'room_avail_date_from' => $room_avail_date_from,
						'room_avail_date_to' => $room_avail_date_to,
						);
			
			
			$where = "sup_hotel_room_period_details_id = $id";
			//print'<pre>';print_r($data);exit;
			$this->db->update('sup_hotel_room_period_details',$data,$where);
			$delqry = "DELETE FROM sup_room_maintain_month WHERE sup_hotel_room_period_details_id = ".$id.""; 
			$query=$this->db->query($delqry);
			
			 if(isset($avail_dates) && $avail_dates != "")
			 {
				 	$dates = $avail_dates;
					//print '<pre />';print_r($dates);exit;
				    $weekday = $weekday;
				    $avilable_rooms = $avilable_rooms;

				 
					for($i=0; $i<sizeof($dates); $i++)
					{ // $i=0;
							if(strtotime($dates[$i]))
							{
								$day  = explode("-",$dates[$i]);
								 $date = $day[0].'-'.$day[1].'-'.$day[2]; 
								
								$data1 = array(
										'sup_hotel_room_period_details_id' => $id,
										'sup_room_details_id' => $sup_room_details_id,
										'sup_hotel_id' => $sup_hotel_id,
										'hotel_code' => $hotel_code,
										'date' => $date,
										'week_day' => $weekday[$i],
										'day' => $day[2],
										'month' => $day[1],
										'year' => $day[0],
							            'avilable_rooms' => $avilable_rooms[$i],
										'status' => 1
										);
								//print'<pre>';print_r($data1);exit;
			
									$this->db->insert('sup_room_maintain_month',$data1);
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
										'sup_hotel_room_period_details_id' => $id,
										'sup_room_details_id' => $sup_room_details_id,
										'sup_hotel_id' => $sup_hotel_id,
										'hotel_code' => $hotel_code,
										'date' => $date,
										'week_day' => $weekday[$i],
										'day' => $day[0],
										'month' => $day[1],
										'year' => $day[2],
							            'avilable_rooms' => $avilable_rooms[$i],
										'status' => 1
										);
								//print'<pre>';print_r($data1);exit;
			
									$this->db->insert('sup_room_maintain_month',$data1);
									$in_id =$this->db->insert_id();
					
							}
					}
			  }
	   }
	 public function update_hotel_room_price_details($id,$status)
    {
			if($status == 2)
			{
				$where2 = "sup_hotel_room_period_details_id  = $id";
				if ($this->db->delete('sup_hotel_room_period_details', $where2)) {
					$this->db->delete('sup_room_maintain_month', $where2);
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_hotel_room_period_details_id  = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_hotel_room_period_details', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	  }
	public function hotel_refresh()
	{
		$where = "api = 'crs'";
		if ($this->db->delete('api_permanent', $where)) {
			$select ="TRUNCATE TABLE api_permanent";
			$this->db->query($select);
			//return true;
		} else {
			return false;
		}
		
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
				->where('status', 1);
				$query1 = $this->db->get();
				foreach($query1->result_array() as $row1)	{
					if(isset($row1['image_name']) && $row1['image_name'] != ''){
					$image = $row1['image_name']; 
					$targetFile = WEB_DIR_FRONT.'supplier_hotels_images/'.$row1['image_name']; 
					}
				}
				
				$room_facilities='';
				$this->db->select('amenity_name')
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
				$this->db->select('amenity_name')
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
				$this->db->select('location_name')
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
						'hotel_nearest_location' => $hotel_nearest_location
			);
			
			//print '<pre />';print_r($data);exit;
			//$sql="INSERT INTO api_permanent(api, hotel_code, hotel_name, city,  image, description, location, latitude, longitude, address, phone, fax, chain, postal, email, web, coun, room_facilities, hotel_facilities , near_by_loaction ,near_by_location) VALUES('$api', '$hotel_code', '$hotel_name', '$city', '$targetFile', '$description',  '$latitude', '$longitude', '$address', '$phone', '$fax', '', '', '$email', '$web', '', '$room_facilities', '$hotel_facilities','$near_by_loaction',$near_by_location)"; 
			//$rs=$this->db->query($sql);
			$this->db->insert('api_permanent',$data);
			$id = $this->db->insert_id();
		}
	}
	   
}

