<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_model extends CI_Model {
 public function __construct()
 {
  parent::__construct();
 }
function login($email, $password)
 {
	$email=$this->input->post('email');
	$password=$this->input->post('password');
	   $this -> db -> select('user_id, name, email, password');
	   $this -> db -> from('users');
	   $this -> db -> where('user_type_id','2');
	   $this -> db -> where('email', $email);
	   $this -> db -> where('password', $password);
	   $this -> db -> where('status','1');
	   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();

   }
   else
   {
     return false;
   }
 }
 public function add_user()
 {
		
		  $data=array(
			'name'=>$this->input->post('name'),
			'last_name'=>$this->input->post('lname'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			'user_type_id'=>'2',
			'status'=>'0',
			'verify_token'=> $this->input->post('token')
		  );
		$result = $this->db->insert('users',$data);
		$id = $this->db->insert_id();
		return $id;
}
	


	public function email_exists($email) {
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('user_type_id','2');
    $this->db->where('email', $email);
	$result = $this -> db -> get();
	return $result;
	}
	
	public function reset_psw($email,$psw){
		$data= array('password'=> $psw);
		$result =	$this->db->where('email', $email);
		$this->db->update('users', $data);
		return $result;
		 
	}
	public function email_verify($id,$token){
		$data= array('status'=> '1');
		$result =	$this->db->where('user_id', $id);
		$this->db->where('verify_token', $token);
		$this->db->update('users', $data);
		return $result;
	}
	
	public function user_info($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$id);
		$this -> db -> limit(1);
		$query = $this->db->get();

		   if($query -> num_rows() == 1)
		   {
			 return $query->result();

		   }
		   else
		   {
			 return false;
		   }
	}
	
	public function update_user($id,$name,$lname,$email,$adress,$city,$zip,$no,$user_logo,$fax){
	
		$data= array('email'=> $email,'name'=>$name,'last_name'=>$lname,'address'=>$adress,'city'=>$city,'zip_code'=>$zip,'mobile_no'=>$no,'user_logo'=>$user_logo,'fax'=>$fax);
		$result =	$this->db->where('user_id', $id);
		$this->db->update('users', $data);
		return $result;
	}
	
	public function check_password($id){
		$old_psw = $this->input->post('old_psw');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$id);
		$this->db->where('password',$old_psw);
		$this -> db -> limit(1);
		$query = $this->db->get();

		   if($query -> num_rows() == 1)
		   {
			 return $query->result();

		   }
		   else
		   {
			 return false;
		   }
	
	}
	public function change_password($id){
		$new_psw = $this->input->post('new_psw');
		$data= array('password'=> $new_psw);
		$result =	$this->db->where('user_id', $id);
		$this->db->update('users', $data);
		return $result;
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
	
	public function get_all_hotel_pay_details_by_userid($user_id)
	{
		$this->db->select('*');
		$this->db->from('hotel_customer_contact_details');
		$this->db->where('user_id',$user_id);
		$this->db->join('hotel_booking_info', 'hotel_customer_contact_details.h_cus_contact_details_id = hotel_booking_info.h_cus_contact_details_id');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
	}

}
