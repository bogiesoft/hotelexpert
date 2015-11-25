<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
		$this->load->model('admin_model');
		$this->load->model('common_model');
	  	$this->load->database(); 
		
        $this->load->library("pagination");
	}
	
	function manage_cities()
	{
		if (!$this->session->userdata('admin_logged_in') || $this->session->userdata('admin_logged_in')=='') {
			redirect('index/login', 'refresh'); 
		} 
		if($this->session->userdata('manage_cities')==1)
		{

			$data['result'] = $this->common_model->get_city_details();
			$this->load->view('admin/city_list',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	
	function manage_regions()
	{
		if (!$this->session->userdata('admin_logged_in') || $this->session->userdata('admin_logged_in')=='') {
			redirect('index/login', 'refresh'); 
		} 
		$data['result'] = $this->common_model->get_region_details();
		$this->load->view('admin/region_list',$data);	
	}
	
	public function update_region_list($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->common_model->update_region_list($id,$status);
		redirect('home/manage_regions/', 'refresh'); 		
	}
	public function update_city_list($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->common_model->update_city_list($id,$status);
		redirect('home/manage_cities/', 'refresh'); 	
	}
	  public function add_regions()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$region_name = $this->input->post('region_name');
		$this->common_model->add_regions($region_name);
		redirect('home/manage_regions', 'refresh'); 
	}
	public function add_cities()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$city_name = $this->input->post('city_name');
		$reg_id = $this->input->post('reg_id');
		$this->common_model->add_cities($city_name,$reg_id);
		redirect('home/manage_cities', 'refresh'); 
	}
	
	public function update_region_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result']=$this->common_model->get_single_region_details($id);
		$this->load->view('admin/edit_region',$data);
	}
	
	public function view_b2b_user_details()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_travel_agents')==1)
		{
			$keyword= $this->input->post('keyword');
			$config = array();
			$config["base_url"] = base_url() . "index.php/home/view_b2b_user_details";
			$config["total_rows"] = $this->common_model->record_count_b2buser();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['sup_details'] = $this->common_model->get_b2b_all_users($config["per_page"], $page,$keyword);
			$data["links"] = $this->pagination->create_links();
			// echo '<pre>';print_r($data);echo '</pre>';die();
			$this->load->view('admin/view_b2b_user_details',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function update_b2b_user($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_travel_agents')==1)
		{
			$this->common_model->update_b2b_user($id,$status);
			redirect('home/view_b2b_user_details', 'refresh');
		}else {
			redirect('index/access_denied');
		}
	}
		
	public function edit_b2b_user($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('edit_travel_agents')==1)
		{
			$data['sup_user'] =$this->common_model->get_details_of_b2b_user($id);
			$this->load->view('admin/edit_b2b_user',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function update_b2b_registration_page($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('comform_password', 'Confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|numeric');
		/*$this->form_validation->set_rules('office_phone_no', 'Office Phone ', 'required|numeric');
		$this->form_validation->set_rules('contact_person_name', 'Contact person name', 'required');
		$this->form_validation->set_rules('desig_of_contact', 'Designation of Contact', 'required');
		$this->form_validation->set_rules('notes', 'Notes', 'required');*/
		
		if($this->form_validation->run()==FALSE)
		{
			$data['sup_user'] =$this->common_model->get_details_of_sup_user($id);
			$this->load->view('admin/edit_supplier_user',$data);
		}
		else {

			$email= $this->input->post('email');
			$name= $this->input->post('name');
			$password= $this->input->post('password');
			$address =$this->input->post('address');
			$mobile_no= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$contact_person_name= $this->input->post('contact_person_name');
			$desig_of_contact= $this->input->post('desig_of_contact');
			$notes= $this->input->post('notes');
			$image1 = $this->input->post('image1');
			$b2buser_logo ='';
			
			if(isset($_FILES['b2buser_logo']['name']) && $_FILES['b2buser_logo']['name'] != '')
			{
				$b2buser_logo  	= $_FILES['b2buser_logo']['name']; 
				$target_path1 = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/supplier_logos';
				$target_path = 	rtrim($target_path1,'/').'/'.basename($_FILES['b2buser_logo']['name']);
				$move1 		 =  move_uploaded_file($_FILES['b2buser_logo']['tmp_name'], $target_path);
			}
			else {
				$b2buser_logo=$image1;
			}
			
			$this->common_model->update_b2b_registration_page($email,$password,$name,$address,$mobile_no,$office_phone_no,$contact_person_name,
			$desig_of_contact,$notes,$id,$b2buser_logo);
			//redirect('home/view_b2b_user_details','refresh');
			redirect('home/edit_b2b_user/'.$id,'refresh');
		}
	}
	public function add_b2b_user()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('add_travel_agents')==1)
		{
			$this->load->view('admin/add_b2b_user');
		}else {
			redirect('index/access_denied');
		}
	}
	public function b2b_registration_page()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[b2buser.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('comform_password', 'Confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|numeric');
		/*$this->form_validation->set_rules('office_phone_no', 'Office Phone ', 'required|numeric');
		$this->form_validation->set_rules('contact_person_name', 'Contact person name', 'required');
		$this->form_validation->set_rules('desig_of_contact', 'Designation of Contact', 'required');
		$this->form_validation->set_rules('notes', 'Notes', 'required');*/
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('admin/add_b2b_user');
		}
		else {
			//print '<pre >';print_r($_POST);exit;
			
			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$name= $this->input->post('name');
			$address =$this->input->post('address');
			$mobile_no= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$contact_person_name= $this->input->post('contact_person_name');
			$desig_of_contact= $this->input->post('desig_of_contact');
			$notes= $this->input->post('notes');
			
			$b2buser_logo = $_FILES['b2buser_logo']['name'];
			//print_r($hotel_logo);die();
			$target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/supplier_logos';
			$target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['b2buser_logo']['name']); 
			
			if(move_uploaded_file($_FILES['b2buser_logo']['tmp_name'], $target_path)) {
			//echo "The file ".  basename( $_FILES['hotel_logo']['name']). " has been uploaded";
			} else{
			//echo "There was an error uploading the file, please try again!";
			}
			
			$this->common_model->b2b_registration_details($email,$password,$name,$address,$mobile_no,$office_phone_no,$contact_person_name,$desig_of_contact,$notes,$b2buser_logo);
			redirect('home/view_b2b_user_details');
		}
		
	
	}
	function manage_orders()
	{
		if (!$this->session->userdata('admin_logged_in') || $this->session->userdata('admin_logged_in')=='') {
			redirect('index/login', 'refresh'); 
		} 
		
		if($this->session->userdata('view_order')==1)
		{
			$data['result'] = $this->common_model->view_orders();
			$this->load->view('admin/manage_orders',$data);
		}else {
			redirect('index/access_denied');
		}
	}


	public function add_orders()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('create_order')==1)
		{	
			$this->load->view('admin/new_orders');
		}else {
			redirect('index/access_denied');
		}

	}
	public function new_orders()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
			$b2c_id= $this->input->post('b2c_id');
			$b2b_id= $this->input->post('b2b_id');
			$from_date= $this->input->post('from_date');
			$to_date= $this->input->post('to_date');
			$customer_street_address= $this->input->post('customer_street_address');
			$customer_city= $this->input->post('customer_city');
			$customer_country= $this->input->post('customer_country');
			$customer_phone= $this->input->post('customer_phone');
			$customer_mobile= $this->input->post('customer_mobile');
			$extra_products= $this->input->post('extra_products');
			$supplier_type= $this->input->post('supplier_type');		
			$total_cost= $this->input->post('total_cost');
			$product_id= $this->input->post('product_id');
			$total_amount= $this->input->post('total_amount');
			$supplier_id= $this->input->post('supplier_id');	
			$pay_amount= $this->input->post('pay_amount');
			$product_name= $this->input->post('product_name');		
			$payment_method= $this->input->post('payment_method');
			$payment_status= $this->input->post('payment_status');	
			
			$this->common_model->new_orders(
			$b2c_id,
			$b2b_id,
			$from_date,
			$to_date,
			$customer_street_address,
			$customer_city,
			$customer_country,
			$customer_phone,
			$customer_mobile,
			$extra_products,
			$supplier_type,	
			$total_cost,
			$product_id,
			$total_amount,
			$supplier_id,
			$pay_amount,
			$product_name,
			$payment_method,
			$payment_status);
	
			redirect('home/manage_orders', 'refresh');

	}
	public function del_order($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_order')==1)
		{
			$this->common_model->del_order($id);
			redirect('home/view_orders', 'refresh');
		}else {
			redirect('index/access_denied');
		}
	}
	public function manage_individual_order($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('edit_order')==1)
		{
			$data['result'] = $this->common_model->manage_individual_order($id);
			$this->load->view('admin/manage_individual_order',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function save_managed_order($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
			$b2c_id= $this->input->post('id');
			$b2b_id= $this->input->post('b2b_id');
			$from_date= $this->input->post('from_date');
			$to_date= $this->input->post('to_date');
			$customer_street_address= $this->input->post('customer_street_address');
			$customer_city= $this->input->post('customer_city');
			$customer_country= $this->input->post('customer_country');
			$customer_phone= $this->input->post('customer_phone');
			$customer_mobile= $this->input->post('customer_mobile');
			$pay_amount= $this->input->post('pay_amount');
			$product_id= $this->input->post('product_id');
			$product_name= $this->input->post('product_name');
			$payment_method= $this->input->post('payment_method');
			$payment_status= $this->input->post('payment_status');
			$order_status= $this->input->post('order_status');
			$order_comments= $this->input->post('order_comments');
			$payment_clear=$this->input->post('payment_clear');
			$supplier_called=$this->input->post('supplier_called');
			$customer_called=$this->input->post('customer_called');
			$order_confirmed=$this->input->post('order_confirmed');
			
			
			$this->common_model->save_managed_order(
			$b2c_id,
			$b2b_id,
			$from_date,
			$to_date,
			$customer_street_address,
			$customer_city,
			$customer_country,
			$customer_phone,
			$customer_mobile,
			$pay_amount,
			$product_id,
			$product_name,
			$payment_method,
			$payment_status,
			$order_status,
			$order_comments,
			$payment_clear,
			$supplier_called,
			$customer_called,
			$order_confirmed,
			$id
		);
	
			redirect('home/manage_individual_order/'.$id, 'refresh');

	}
	public function edit_city_list($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		$data['result'] = $this->admin_model->get_part_city_list($id);
		$this->load->view('admin/edit_city_list',$data);
	}
	public function update_cities($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$city_name = $this->input->post('city_name');
		$reg_id = $this->input->post('reg_id');
		$this->admin_model->update_cities($city_name,$reg_id,$id);
		redirect('home/manage_cities', 'refresh'); 
	}
	public function edit_region_list($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->get_part_region_list($id);
		$this->load->view('admin/edit_region_list',$data);
	}
	public function update_regions($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$region_name = $this->input->post('region_name');
		$this->admin_model->update_regions($region_name,$id);
		redirect('home/manage_regions', 'refresh'); 
	}
	function discount_rules()
	{
		if (!$this->session->userdata('admin_logged_in') || $this->session->userdata('admin_logged_in')=='') {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('manage_discounts')==1)
		{
			 
		$data['result'] = $this->common_model->get_discount_rules();
		$this->load->view('admin/discount_rules',$data);
		}else {
			redirect('index/access_denied');
		}	
	}
		public function update_discount_rules($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->common_model->update_discount_rules($id,$status);
		redirect('home/discount_rules/', 'refresh'); 		
	}
	public function new_discount_rules()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
			$this->load->view('admin/add_discount_rules');
	}
	
	public function add_discount_rules_type1($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$days= $this->input->post('days');
			$customer_type= $this->input->post('customer_type');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			
			$this->common_model->add_discount_rules_type1($rule_name,$days,$discount_rate,$basis,$s,$customer_type,$from,$to);
			$msg= "Discount rule successfully added";
			echo json_encode($msg);
			exit();
	}
	public function add_discount_rules_type2($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$costs= $this->input->post('costs');
			$currency= $this->input->post('currency');
			$customer_type= $this->input->post('customer_type');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			
			$this->common_model->add_discount_rules_type2($rule_name,$costs,$currency,$discount_rate,$basis,$s,$customer_type,$from,$to);
			$msg= "Discount rule successfully added";
			echo json_encode($msg);
			exit();
	}
	public function add_discount_rules_type3($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$product= $this->input->post('product');
			$product_name= $this->input->post('product_name');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			$customer_type= $this->input->post('customer_type');
			$room_type3= $this->input->post('room_type3');
			
			$this->common_model->add_discount_rules_type3($rule_name,$product,$product_name,$from,$to,$discount_rate,$basis,$s,$customer_type,$room_type3);
			$msg= "Discount rule successfully added";
			echo json_encode($msg);
			exit();
	}

	public function add_discount_rules_type4($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			$customer_type= $this->input->post('customer_type');
			$product= $this->input->post('product');
			
			$this->common_model->add_discount_rules_type4($rule_name,$from,$to,$discount_rate,$basis,$s,$customer_type,$product);
			$msg= "Discount rule successfully added";
			echo json_encode($msg);
			exit();
	}
		public function add_discount_rules_type5($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$city= $this->input->post('city');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			$customer_type= $this->input->post('customer_type');
			$product= $this->input->post('product');
			$product_name= $this->input->post('product_name');
				$room_type= $this->input->post('room_type');
			
			$this->common_model->add_discount_rules_type5($rule_name,$city,$product,$product_name,$from,$to,$discount_rate,$basis,$s,$customer_type,$room_type);
			$msg= "Discount rule successfully added";
			echo json_encode($msg);
			exit();
	}
	

	public function edit_discount_rule($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result']=$this->common_model->edit_discount_rule($id);
		$this->load->view('admin/edit_discount_rule',$data);
	}
	public function update_discount_rules_type1($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$days= $this->input->post('days');
			$id= $this->input->post('id');
			$customer_type= $this->input->post('customer_type');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			
			$this->common_model->update_discount_rules_type1($rule_name,$days,$discount_rate,$basis,$s,$id,$customer_type,$from,$to);
			$msg= "Discount rule successfully updated";
			echo json_encode($msg);
			exit();
	}
	public function update_discount_rules_type2($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$costs= $this->input->post('costs');
			$currency= $this->input->post('currency');
			$id= $this->input->post('id');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			$customer_type= $this->input->post('customer_type');
			
			$this->common_model->update_discount_rules_type2($rule_name,$costs,$currency,$discount_rate,$basis,$s,$id,$from,$to,$customer_type);
			$msg= "Discount rule successfully updated";
			echo json_encode($msg);
			exit();
	}
	public function update_discount_rules_type3($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$product= $this->input->post('product');
			$product_name= $this->input->post('product_name');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			$id= $this->input->post('id');
			$room_type= $this->input->post('room_type');
			$customer_type= $this->input->post('customer_type');
			
						
						
			$this->common_model->update_discount_rules_type3($rule_name,$product,$product_name,$from,$to,$discount_rate,$basis,$s,$id,$customer_type,$room_type);
			$msg= "Discount rule successfully updated";
			echo json_encode($msg);
			exit();
	}
	
	
	
	public function update_discount_rules_type4($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			$id= $this->input->post('id');
			$customer_type= $this->input->post('customer_type');
			$product= $this->input->post('product');
			
			$this->common_model->update_discount_rules_type4($rule_name,$from,$to,$discount_rate,$basis,$s,$id,$customer_type,$product);
			$msg= "Discount rule successfully edited";
			echo json_encode($msg);
			exit();
	}
	public function update_discount_rules_type5($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$city= $this->input->post('city');
			$from= $this->input->post('from');
			$product= $this->input->post('product');
			$product_name= $this->input->post('product_name');
			$to= $this->input->post('to');
			$id= $this->input->post('id');
			$customer_type= $this->input->post('customer_type');
			$room_type= $this->input->post('room_type');
			
			$this->common_model->update_discount_rules_type5($rule_name,$city,$from,$to,$discount_rate,$basis,$s,$id,$product,$product_name,$customer_type,$room_type);
			$msg= "Discount rule successfully Updated";
			echo json_encode($msg);
			exit();
	}
	
	public function update_discount_rules_type51($s)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
		
			$rule_name= $this->input->post('rule_name');
			$discount_rate= $this->input->post('discount_rate');
			$basis= $this->input->post('basis');
			$product= $this->input->post('product');
			$product_name= $this->input->post('product_name');
			$from= $this->input->post('from');
			$to= $this->input->post('to');
			$id= $this->input->post('id');
			$customer_type= $this->input->post('customer_type');
			$room_type= $this->input->post('room_type');
			$city= $this->input->post('city');
			
			$this->common_model->update_discount_rules_type51($rule_name,$product,$product_name,$from,$to,$discount_rate,$basis,$s,$id,$customer_type,$room_type,$city);
			$msg= "Discount rule successfully updated";
			echo json_encode($msg);
			exit();
	}
	
	public function get_product_name($product)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($product == "hotel"){
		$product_name = $this->common_model->get_product_name("hotel");
		$msg = $product_name[0]->hotel_name;
		}
		
		if($product == "villa"){
		$product_name = $this->common_model->get_product_name("villa");
		$msg=$product_name[0]->villa_name;
		}
		$this->load->view('admin/add_discount_rule',$product_name);
		echo json_encode($msg);
		exit();
	}
	function hotel_commission()
	{
		if (!$this->session->userdata('admin_logged_in') || $this->session->userdata('admin_logged_in')=='') {
			redirect('index/login', 'refresh'); 
		} 
		if($this->session->userdata('commision')==1)
		{
			$data['result'] = $this->common_model->get_hotel_commission();
			$this->load->view('admin/hotel_commission',$data);	
		}else {
			redirect('index/access_denied');
		}
	}
	function villa_commission()
	{
		if (!$this->session->userdata('admin_logged_in') || $this->session->userdata('admin_logged_in')=='') {
			redirect('index/login', 'refresh'); 
		} 
		if($this->session->userdata('commision')==1)
		{
			$data['result'] = $this->common_model->get_villa_commission();
			$this->load->view('admin/villa_commission',$data);	
		}else {
			redirect('index/access_denied');
		}
	}
	function car_rentals_commission()
	{
		if (!$this->session->userdata('admin_logged_in') || $this->session->userdata('admin_logged_in')=='') {
			redirect('index/login', 'refresh'); 
		} 
		if($this->session->userdata('commision')==1)
		{
			$data['result'] = $this->common_model->get_car_commission();
			$this->load->view('admin/car_rentals_commission',$data);	
		}else {
			redirect('index/access_denied');
		}
	}
	public function update_commission($product,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->common_model->update_commission($id,$status);
		if($product == "hotel"){
			redirect('home/hotel_commission/', 'refresh'); 	
		}
		else if($product == "villa"){
			redirect('home/villa_commission/', 'refresh'); 	
		}
		else if($product == "car"){
			redirect('home/car_rentals_commission/', 'refresh'); 	
		}
	}
	  public function check_hotel_commission()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$hotel = $this->input->post('hotel');
		$agents = $this->input->post('agents');
		$commission_rate = $this->input->post('commission_rate');
		
		$data2['result2'] = $this->common_model->check_hotel_commission_exist($hotel,$agents,$commission_rate);
		if($data2['result2']){
		$data2['msg'] = 'Data Already Exist';
		//$this->load->view('admin/hotel_commission',$data2);
		redirect('home/hotel_commission', 'refresh'); 
		}
		else{
		$data2['result2'] = $this->common_model->check_hotels_and_agents_in_commission($hotel,$agents);
		if($data2['result2']){
		 $this->common_model->update_hotel_commission($hotel,$agents,$commission_rate,$data2['result2'][0]->id);
		 $data2['msg'] = 'Data Updated';
		 //$this->load->view('admin/hotel_commission',$data2);
		 redirect('home/hotel_commission', 'refresh'); 
		}
		else{
		$this->common_model->add_hotel_commission($hotel,$agents,$commission_rate);
		$data2['msg'] = 'Data Inserted';
		 //$this->load->view('admin/hotel_commission',$data2);
		 redirect('home/hotel_commission', 'refresh');
		}
		}
		
		//redirect('home/hotel_commission', 'refresh'); 
	}
	
	 public function check_villa_commission()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$villa = $this->input->post('villa');
		$agents = $this->input->post('agents');
		$commission_rate = $this->input->post('commission_rate');
		
		$data2['result2'] = $this->common_model->check_villa_commission_exist($villa,$agents,$commission_rate);
		if($data2['result2']){
		$data2['msg'] = 'Data Already Exist';
		//$this->load->view('admin/villa_commission',$data2);
		redirect('home/villa_commission', 'refresh'); 
		}
		else{
		$data2['result2'] = $this->common_model->check_villas_and_agents_in_commission($villa,$agents);
		if($data2['result2']){
		 $this->common_model->update_villa_commission($villa,$agents,$commission_rate,$data2['result2'][0]->id);
		 $data2['msg'] = 'Data Updated';
		 //$this->load->view('admin/villa_commission',$data2);
		 redirect('home/villa_commission', 'refresh'); 
		}
		else{
		$this->common_model->add_villa_commission($villa,$agents,$commission_rate);
		$data2['msg'] = 'Data Inserted';
		 //$this->load->view('admin/villa_commission',$data2);
		 redirect('home/villa_commission', 'refresh');
		}
		}
		
		//redirect('home/villa_commission', 'refresh'); 
	}
	
	 public function check_car_rental_commission()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$car = $this->input->post('car');
		$agents = $this->input->post('agents');
		$commission_rate = $this->input->post('commission_rate');
		
		$data2['result2'] = $this->common_model->check_car_rental_commission_exist($car,$agents,$commission_rate);
		if($data2['result2']){
		$data2['msg'] = 'Data Already Exist';
		//$this->load->view('admin/car_rentals_commission',$data2);
		redirect('home/car_rentals_commission', 'refresh'); 
		}
		else{
		$data2['result2'] = $this->common_model->check_car_rentals_and_agents_in_commission($car,$agents);
		if($data2['result2']){
		 $this->common_model->update_car_rental_commission($car,$agents,$commission_rate,$data2['result2'][0]->id);
		 $data2['msg'] = 'Data Updated';
		 //$this->load->view('admin/car_rentals_commission',$data2);
		 redirect('home/car_rentals_commission', 'refresh'); 
		}
		else{
		$this->common_model->add_car_rental_commission($car,$agents,$commission_rate);
		$data2['msg'] = 'Data Inserted';
		 //$this->load->view('admin/car_rentals_commission',$data2);
		 redirect('home/car_rentals_commission', 'refresh');
		}
		}
		
		//redirect('home/car_rentals_commission', 'refresh'); 
	}
	function view_suppliers($supplier_type_Id)
	{
		//echo $supplier_type_Id;exit;
		$sup_name ='';
		if($supplier_type_Id != 'select') {
	    $sup_name	= $this->common_model->get_supp_all_users($supplier_type_Id);
		}
		//print'<pre/>';print_r($sup_name);exit;
			 
		//$this->load->view('admin/new_orders',$name);
		
		echo  '<select onchange="view_product_name(this.value)" name="supplier_id"  style="width: 209px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required >
                  <option value="select">Select Supplier</option>';
              if(!empty($sup_name)) {    
                 foreach($sup_name as $sup){
                  
                     echo  '<option value="'.$sup->user_id.'">SUP/'.$sup->user_id.'-'.$sup->firstname.'</option>';
                   
                    }
			  }
                    
                   
            echo  '</select>';exit;
		
		
		
		
	}
	
	function view_product_name($supplier_Id,$supplier_type)
	{
		//echo $supplier_type_Id;exit;
		$products ='';
		if($supplier_Id != 'select') {
	    $products	= $this->common_model->view_product_name($supplier_Id,$supplier_type);
		}
		//print'<pre/>';print_r($sup_name);exit;
			 
		//$this->load->view('admin/new_orders',$name);
		
		echo  '<select name="product_name"  style="width: 209px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required onchange="getrooms_and_extraprod(this.value)">
                  <option value="select">Select</option>';
              //if(!empty($sup_name)) {   
			  if($supplier_type == '2'){ 
                 foreach($products as $product){
                  
                     echo  '<option value="'.$product->sup_villa_id.'">VILLA/'.$product->custom_villa_id.'-'.$product->villa_name.'</option>';
                   
                    }                    
			 }
			 // } 
			 else  if($supplier_type == '1'){ 
                 foreach($products as $product){
                  
                     echo  '<option value="'.$product->sup_hotel_id.'">HOTEL/'.$product->custom_hotel_id.'-'.$product->hotel_name.'</option>';
                   
                    }                    
			 } 
            echo  '</select>';exit;	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */