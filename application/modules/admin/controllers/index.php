<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
		$this->load->model('admin_model');
	  	$this->load->database(); 
		
        $this->load->library("pagination");
	}
	
	public function index()
	{
		if ($this->session->userdata('admin_logged_in')) {
			redirect('index/dashboard', 'refresh'); 
		} else {
			redirect('index/login', 'refresh'); 
		}
		
	}
	public function login()
	{
		//session_start();
		//print_r($this->session->userdata);
		
		if ($this->session->userdata('admin_logged_in')) {
			redirect('index/dashboard', 'refresh'); 
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email-Id', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ( $this->form_validation->run() !== false ) {
			//echo $this->input->post('password'); exit;
			// $this->session->sess_create();
			 // then validation passed. Get from db
			 $this->load->model('admin_model');
			 $res = $this
					  ->admin_model
					  ->verify_user(
						 $this->input->post('email'), 
						 $this->input->post('password')
					  );

			 if ( $res !== false ) {
				 
				 
				 if($res->admin_type == 3)
				 {
					// echo 'dddd';exit;
					$sup = $this->admin_model->verify_supp_user($res->admin_type,$res->user_id,$res->roll_type); 
					$sessionUserInfo1 = array( 
					'email'	 		=> $res->email,
					'firstname'		=> $res->firstname,
					'user_id'       => $res->user_id,
					'roll_type'     => $res->roll_type,
					'admin_type'    => $res->admin_type,
					'view_order_reports' => $sup->view_order_reports,
					'view_sales_reports' => $sup->view_sales_reports,
					'add_travel_agents' => $sup->add_travel_agents,
					'edit_travel_agents' => $sup->edit_travel_agents,
					'delete_travel_agents' => $sup->delete_travel_agents,
					'view_travel_agents' => $sup->view_travel_agents,
					'add_admin' => $sup->add_admin,
					'edit_admin' => $sup->edit_admin,
					'delete_admin' => $sup->delete_admin,
					'view_admin_users' => $sup->view_admin_users,
					'add_admin_type' => $sup->add_admin_type,
					'edit_admin_type' => $sup->edit_admin_type,
					'delete_admin_type' => $sup->delete_admin_type,
					'view_admin_type' => $sup->view_admin_type,
					'add_supplier_type' => $sup->add_supplier_type,
					'edit_supplier_type' => $sup->edit_supplier_type,
					'delete_supplier_type' => $sup->delete_supplier_type,
					'view_supplier_type' => $sup->view_supplier_type,
					'view_supplier_users' => $sup->view_supplier_users,
					'add_supplier_user' => $sup->add_supplier_user,
					'edit_supplier_user' => $sup->edit_supplier_user,
					'delete_supplier_user' => $sup->delete_supplier_user,
					'static_pages' => $sup->static_pages,
					'email_templates' => $sup->email_templates,
					'top_destinations' => $sup->top_destinations,
					'deals' => $sup->deals,
					'news' => $sup->news,
					'add_b2c_customer' => $sup->add_b2c_customer,
					'edit_b2c_customer' => $sup->edit_b2c_customer,
					'delete_b2c_customer' => $sup->delete_b2c_customer,
					'view_b2c_customers' => $sup->view_b2c_customers,
					'create_order' => $sup->create_order,
					'edit_order' => $sup->edit_order,
					'delete_order' => $sup->delete_order,
					'view_order' => $sup->view_order,
					'amenity_list' => $sup->amenity_list,
					'currencies' => $sup->currencies,
					'payment_gateways' => $sup->payment_gateways,
					'commision' => $sup->commision,
					'manage_cities' => $sup->manage_cities,
					'manage_amenities'=> $sup->manage_amenities,
					'manage_discounts' => $sup->manage_discounts,
					'manage_previliges' => $sup->manage_previliges,
					'manage_room_categorys' => $sup->manage_room_categorys,
					'global_near_by_location' => $sup->global_near_by_location,
					'add_hotel' => $sup->add_hotel,
					'edit_hotel'=> $sup->edit_hotel,
					'delete_hotel' => $sup->delete_hotel,
					'view_hotels' => $sup->view_hotels,
					'add_hotel_rooms' => $sup->add_hotel_rooms,
					'edit_hotel_rooms' => $sup->edit_hotel_rooms,
					'delete_hotel_rooms' => $sup->delete_hotel_rooms,
					'view_hotel_rooms' => $sup->view_hotel_rooms,
					'hotel_room_inventory'=> $sup->hotel_room_inventory,
					'hotel_pricing' => $sup->hotel_pricing,
					'edit_villa' => $sup->edit_villa,
					'delete_villa' => $sup->delete_villa,
					'add_villa'=> $sup->add_villa,
					'view_villa'=> $sup->view_villa,
					'villa_room_inventory' => $sup->villa_room_inventory,
					'villa_pricing' => $sup->villa_pricing,
					'user_reports' => $sup->user_reports,
					'order_reports' => $sup->order_reports,
					'order_reports_status_wize' => $sup->order_reports_status_wize,
					'inventory_reports' => $sup->inventory_reports,
					'sales_reports' => $sup->sales_reports,
					'account_reports' => $sup->account_reports,
					'call_center_reports'=> $sup->call_center_reports,
					'call_center_tracking_reports' => $sup->call_center_tracking_reports,
					'add_car' => $sup->add_car,
					'edit_car' => $sup->edit_car,
					'delete_car'=> $sup->delete_car,
					'view_cars'=> $sup->view_cars,
					'car_room_inventory' => $sup->car_room_inventory,
					'car_pricing' => $sup->car_pricing,
					'admin_logged_in' 	=> TRUE
					);
					
					//print '<pre />';print_r($sessionUserInfo1);exit;
					
					$this->session->set_userdata($sessionUserInfo1);
					//$_SESSION['userdata'] = $sessionUserInfo1;
					//redirect('index/dashboard', 'refresh'); 
				}else {
					
					// echo 'ddddsdfsfasd';exit;
					$supp_all =$this->admin_model->verify_supp_all_user($res->admin_type,$res->roll_type); 
					$sessionUserInfo = array( 
					'email'	 		=> $res->email,
					'firstname'		=> $res->firstname,
					'user_id'       => $res->user_id,
					'roll_type'     => $res->roll_type,
					'admin_type'    => $res->admin_type,
					'view_order_reports' => $supp_all->view_order_reports,
					'view_sales_reports' => $supp_all->view_sales_reports,
					'add_travel_agents' => $supp_all->add_travel_agents,
					'edit_travel_agents' => $supp_all->edit_travel_agents,
					'delete_travel_agents' => $supp_all->delete_travel_agents,
					'view_travel_agents' => $supp_all->view_travel_agents,
					'add_admin' => $supp_all->add_admin,
					'edit_admin' => $supp_all->edit_admin,
					'delete_admin' => $supp_all->delete_admin,
					'view_admin_users' => $supp_all->view_admin_users,
					'add_admin_type' => $supp_all->add_admin_type,
					'edit_admin_type' => $supp_all->edit_admin_type,
					'delete_admin_type' => $supp_all->delete_admin_type,
					'view_admin_type' => $supp_all->view_admin_type,
					'add_supplier_type' => $supp_all->add_supplier_type,
					'edit_supplier_type' => $supp_all->edit_supplier_type,
					'delete_supplier_type' => $supp_all->delete_supplier_type,
					'view_supplier_type' => $supp_all->view_supplier_type,
					'view_supplier_users' => $supp_all->view_supplier_users,
					'add_supplier_user' => $supp_all->add_supplier_user,
					'edit_supplier_user' => $supp_all->edit_supplier_user,
					'delete_supplier_user' => $supp_all->delete_supplier_user,
					'static_pages' => $supp_all->static_pages,
					'email_templates' => $supp_all->email_templates,
					'top_destinations' => $supp_all->top_destinations,
					'deals' => $supp_all->deals,
					'news' => $supp_all->news,
					'add_b2c_customer' => $supp_all->add_b2c_customer,
					'edit_b2c_customer' => $supp_all->edit_b2c_customer,
					'delete_b2c_customer' => $supp_all->delete_b2c_customer,
					'view_b2c_customers' => $supp_all->view_b2c_customers,
					'create_order' => $supp_all->create_order,
					'edit_order' => $supp_all->edit_order,
					'delete_order' => $supp_all->delete_order,
					'view_order' => $supp_all->view_order,
					'amenity_list' => $supp_all->amenity_list,
					'currencies' => $supp_all->currencies,
					'payment_gateways' => $supp_all->payment_gateways,
					'commision' => $supp_all->commision,
					'manage_cities' => $supp_all->manage_cities,
					'manage_amenities'=> $supp_all->manage_amenities,
					'manage_discounts' => $supp_all->manage_discounts,
					'manage_previliges' => $supp_all->manage_previliges,
					'manage_room_categorys' => $supp_all->manage_room_categorys,
					'global_near_by_location' => $supp_all->global_near_by_location,
					'add_hotel' => $supp_all->add_hotel,
					'edit_hotel'=> $supp_all->edit_hotel,
					'delete_hotel' => $supp_all->delete_hotel,
					'view_hotels' => $supp_all->view_hotels,
					'add_hotel_rooms' => $supp_all->add_hotel_rooms,
					'edit_hotel_rooms' => $supp_all->edit_hotel_rooms,
					'delete_hotel_rooms' => $supp_all->delete_hotel_rooms,
					'view_hotel_rooms' => $supp_all->view_hotel_rooms,
					'hotel_room_inventory'=> $supp_all->hotel_room_inventory,
					'hotel_pricing' => $supp_all->hotel_pricing,
					'edit_villa' => $supp_all->edit_villa,
					'delete_villa' => $supp_all->delete_villa,
					'add_villa'=> $supp_all->add_villa,
					'view_villa'=> $supp_all->view_villa,
					'villa_room_inventory' => $supp_all->villa_room_inventory,
					'villa_pricing' => $supp_all->villa_pricing,
					'user_reports' => $supp_all->user_reports,
					'order_reports' => $supp_all->order_reports,
					'order_reports_status_wize' => $supp_all->order_reports_status_wize,
					'inventory_reports' => $supp_all->inventory_reports,
					'sales_reports' => $supp_all->sales_reports,
					'account_reports' => $supp_all->account_reports,
					'call_center_reports'=> $supp_all->call_center_reports,
					'call_center_tracking_reports' => $supp_all->call_center_tracking_reports,
					'add_car' => $supp_all->add_car,
					'edit_car' => $supp_all->edit_car,
					'delete_car'=> $supp_all->delete_car,
					'view_cars'=> $supp_all->view_cars,
					'car_room_inventory' => $supp_all->car_room_inventory,
					'car_pricing' => $supp_all->car_pricing,
					'admin_logged_in' 	=> TRUE
					);
					
					//print '<pre />';print_r($sessionUserInfo);exit;
					$this->session->set_userdata($sessionUserInfo);
					//print '<pre />asfasf';print_r($this->session->userdata);exit;
					//redirect('index/dashboard', 'refresh'); 
					//$_SESSION['userdata'] = $sessionUserInfo;
				}
				
				redirect('index/dashboard', 'refresh'); 
			 }

		}
				$this->load->view('admin/login_view');
	}
	
	function dashboard()
	{
		//session_start();
		//$this->session->sess_create();
		//echo 'sss';exit;
		//print'<pre />ggg';print_r($_SESSION['userdata']);exit;
		//$this->session->set_userdata($_SESSION['userdata']);
		
	    //print'<pre />tttt';print_r($this->session->userdata);exit;
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
	//	$this->load->view('header');
		
		$this->load->view('admin/dashboard');
		
	}
	public function logout()
    {
        $this->session->unset_userdata('sessionUserInfo');
		$this->session->unset_userdata('sessionUserInfo1');
		$this->session->sess_destroy();
        redirect('index/login', 'refresh'); 
    }
	public function super_admin()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('add_admin')==1)
		{
			$data['admin_details'] =$this->admin_model->get_admin_type_details();
			$this->load->view('admin/add_admin_user',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function admin_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_admin_type')==1)
		{
			
			$data['admin_details'] =$this->admin_model->get_admin_type_details();
			$this->load->view('admin/add_admin_type',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function access_denied()
	{
		$this->load->view('admin/access_denied');
	}
	public function add_admin_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$admin_type= $this->input->post('admin_type');
		$this->admin_model->add_admin_type($admin_type);
		redirect('index/admin_type', 'refresh');
	}
	public function update_admin_type($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_admin_type')==1)
		{
			$this->admin_model->update_admin_type($id,$status);
			redirect('index/admin_type', 'refresh');
		
		}else {
			redirect('index/access_denied');
		}
	}
	public function update_sub_admin_type($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_admin_type')==1)
		{
			$this->admin_model->update_sub_admin_type($id,$status);
			redirect('index/sub_admin_type', 'refresh');
		}else {
			redirect('index/access_denied');
		}
	}
	public function admin_user()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->load->view('admin/admin_register');
	}
	public function admin_registration_page()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//print '<pre >';print_r($_POST);exit;
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('comform_password', 'Confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|numeric');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('admin/add_admin_user');
		}
		else {
			//print '<pre >';print_r($_POST);exit;
			
			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$name= $this->input->post('name');
			$mobile_no= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$address =$this->input->post('address');
			$notes= $this->input->post('notes');
			
			$this->admin_model->admin_registration_details($email,$password,$name,$mobile_no,$office_phone_no,$address,$notes);
			redirect('index/view_admin_user');
		}
		
	
	}
	public function supplier_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_supplier_type')==1)
		{
			$data['sup_details'] =$this->admin_model->get_supplier_type_details();
			$this->load->view('admin/add_supplier_type',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function view_admin_user()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_admin_users')==1)
		{
			$data['admin_details'] = $this->admin_model->get_admin_all_users();
			$this->load->view('admin/view_admin_details',$data);
		}else {
			redirect('index/access_denied');
		}

	}
	public function update_admin_user($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_admin')==1)
		{
			$this->admin_model->update_admin_user($id,$status);
			redirect('index/view_admin_user', 'refresh');
		} else {
			redirect('index/access_denied');
		}
	}
	public function edit_admin_user($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('edit_admin')==1)
		{

			$data['admin_user'] =$this->admin_model->get_details_of_admin_user($id);
			$this->load->view('admin/edit_admin_user',$data);
		
		}else {
			redirect('index/access_denied');
		}
		
	}
	public function update_admin_registration_page($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre >';print_r($_POST);exit;
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('comform_password', 'Confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|numeric');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$data['admin_user'] =$this->admin_model->get_details_of_admin_user($id);
			$this->load->view('admin/edit_admin_user',$data);
			
		}
		else {
			//print '<pre >';print_r($_POST);exit;
			
			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$name= $this->input->post('name');
			$mobile_no= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$address =$this->input->post('address');
			$notes= $this->input->post('notes');
			
			$this->admin_model->update_admin_registration_page($email,$password,$name,$mobile_no,$office_phone_no,$address,$notes,$id);
			redirect('index/view_admin_user', 'refresh');
		}
		
		
		
	}
	public function add_supplier_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$supplier_type= $this->input->post('supplier_type');
		$this->admin_model->add_supplier_type($supplier_type);
		redirect('index/supplier_type', 'refresh');
	}
	public function update_supplier_type($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_supplier_type')) {
			
			$this->admin_model->update_supplier_type($id,$status);
			redirect('index/supplier_type', 'refresh');
		}else {
			
			redirect('index/access_denied');
		}
	}
	public function supplier_user()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('add_supplier_user')) {
			
			$this->load->view('admin/add_supplier_user');
		}else {
			
			redirect('index/access_denied');
		}
	}
	public function sup_registration_page()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//print '<pre >';print_r($_POST);exit;
		$this->form_validation->set_rules('supplier_type_id', 'Supplier Type', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');
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
			$this->load->view('admin/add_supplier_user');
		}
		else {
			//print '<pre >';print_r($_POST);exit;
			
			$supplier_type_id= $this->input->post('supplier_type_id');
			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$name= $this->input->post('name');
			$address =$this->input->post('address');
			$mobile_no= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$contact_person_name= $this->input->post('contact_person_name');
			$desig_of_contact= $this->input->post('desig_of_contact');
			$notes= $this->input->post('notes');
			
			$supplier_logo = $_FILES['supplier_logo']['name'];
			//print_r($hotel_logo);die();
			$target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/supplier_logos';
			$target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['supplier_logo']['name']); 
			
			if(move_uploaded_file($_FILES['supplier_logo']['tmp_name'], $target_path)) {
			//echo "The file ".  basename( $_FILES['hotel_logo']['name']). " has been uploaded";
			} else{
			//echo "There was an error uploading the file, please try again!";
			}
			
			$this->admin_model->sup_registration_details($supplier_type_id,$email,$password,$name,$address,$mobile_no,$office_phone_no,$contact_person_name,
			$desig_of_contact,$notes,$supplier_logo);
			redirect('index/view_supplier_details');
		}
		
	
	}
	public function view_supplier_details()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_supplier_users')==1)
		{

		$keyword= $this->input->post('keyword');
        $config = array();
        $config["base_url"] = base_url() . "index.php/index/view_supplier_details";
        $config["total_rows"] = $this->admin_model->record_count_suppliers();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["sup_details"] = $this->admin_model->get_sup_all_users($config["per_page"], $page,$keyword);
        $data["links"] = $this->pagination->create_links();
		//$data['sup_details'] = $this->admin_model->get_sup_all_users();
		$this->load->view('admin/view_supplier_details',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function update_sup_user($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_supplier_user')==1)
		{
			//echo $id.$status;exit;
			$this->admin_model->update_sup_user($id,$status);
			redirect('index/view_supplier_details', 'refresh');
		}else {
			redirect('index/access_denied');
		}
	}
		
	public function edit_sup_user($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('edit_supplier_user')==1)
		{
			$data['sup_user'] =$this->admin_model->get_details_of_sup_user($id);
			$this->load->view('admin/edit_supplier_user',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function update_sup_registration_page($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre >';print_r($_POST);exit;
		$this->form_validation->set_rules('supplier_type_id', 'Supplier Type', 'required');
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
			$data['sup_user'] =$this->admin_model->get_details_of_sup_user($id);
			$this->load->view('admin/edit_supplier_user',$data);
		}
		else {
			//print '<pre >';print_r($_POST);exit;
			
			$supplier_type_id= $this->input->post('supplier_type_id');
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
			$supplier_logo ='';
			
			if(isset($_FILES['supplier_logo']['name']) && $_FILES['supplier_logo']['name'] != '')
			{
				$supplier_logo  	= $_FILES['supplier_logo']['name']; 
				$target_path1 = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/supplier_logos';
				$target_path = 	rtrim($target_path1,'/').'/'.basename($_FILES['supplier_logo']['name']);
				$move1 		 =  move_uploaded_file($_FILES['supplier_logo']['tmp_name'], $target_path);
			}
			else {
				$supplier_logo=$image1;
			}
			
			$this->admin_model->update_sup_registration_page($supplier_type_id,$email,$password,$name,$address,$mobile_no,$office_phone_no,$contact_person_name,
			$desig_of_contact,$notes,$id,$supplier_logo);
			redirect('index/view_supplier_details','refresh');
		}
	}
	public function manage_hotels_old()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['sup_details'] = $this->admin_model->get_hotel_details();
		$this->load->view('hotel/view_hotel_list',$data);
	}
	
	
	
	public function manage_hotels($asc='') {
		
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_hotels')==1)
		{
				if($this->session->userdata('admin_type')== 1 || $this->session->userdata('admin_type')== 2 )
				{
					$keyword= $this->input->post('keyword');
					$config = array();
					$config["base_url"] = base_url() . "index.php/index/manage_hotels";
					$config["total_rows"] = $this->admin_model->record_count();
					$config["per_page"] = 10;
					$config["uri_segment"] = 3;
			
					$this->pagination->initialize($config);
			
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					$data["sup_details"] = $this->admin_model->fetch_hotels($config["per_page"], $page,$keyword, $asc);
					$data["links"] = $this->pagination->create_links();
					//print '<pre />';print_r($data["links"]);exit;
				} else {
					$user_id = $this->session->userdata('user_id');
					$keyword= $this->input->post('keyword');
					$config = array();
					$config["base_url"] = base_url() . "index.php/index/manage_hotels";
					$config["total_rows"] = $this->admin_model->record_count();
					$config["per_page"] = 10;
					$config["uri_segment"] = 3;
			
					$this->pagination->initialize($config);
			
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					$data["sup_details"] = $this->admin_model->fetch_hotels_supplier($config["per_page"], $page,$keyword, $asc,$user_id);
					$data["links"] = $this->pagination->create_links();
				}
				$this->load->view("hotel/view_hotel_list", $data);
		}else {
			redirect('index/access_denied');
		}
    }
	
	
	public function add_new_hotel()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('add_hotel')==1)
		{
			$this->load->view('hotel/add_hotel');
		}else {
			redirect('index/access_denied');
		}
	}
	public function add_hotel_details()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		$supplier_id= $this->input->post('supplier_id');
		$cus_hotel_id= $this->input->post('cus_hotel_id');
		$hotel_name= $this->input->post('hotel_name');
		$city_name =$this->input->post('city_name');
		$main_first_name= $this->input->post('main_first_name');
		$main_last_name= $this->input->post('main_last_name');
		$main_email= $this->input->post('main_email');
		$main_phone_no= $this->input->post('main_phone_no');
		$main_fax= $this->input->post('main_fax');
		$hotel_address= trim($this->input->post('hotel_address'));
		$hotel_desc = trim($this->input->post('hotel_desc'));
		$hotel_policies = trim($this->input->post('hotel_policies'));
		$latitude= $this->input->post('latitude');
		$longitude= $this->input->post('longitude');
		$near_by_area= $this->input->post('near_by_area');
		$near_by_attraction= $this->input->post('near_by_attraction');
		
		$this->admin_model->add_hotel_details($supplier_id,$cus_hotel_id,$hotel_name,$city_name,$main_first_name,$main_last_name,$main_email,
			$main_phone_no,$main_fax,$hotel_desc,$hotel_address,$hotel_policies,$latitude,$longitude,$near_by_area,$near_by_attraction);
			
		redirect('index/manage_hotels', 'refresh'); 
		
	}
	public function update_hotel_list($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_hotel')==1)
		{
			$this->admin_model->update_hotel_list($id,$status);
			redirect('index/manage_hotels', 'refresh'); 
	 	}else {
			redirect('index/access_denied');
		}

	}
	public function update_hotel_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('edit_hotel')==1)
		{
			$data['contact_inf']=$this->admin_model->get_sup_hotel_details($id);
			$this->load->view('hotel/edit_hotel',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function edit_hotel_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			
		$cus_hotel_id= $this->input->post('cus_hotel_id');
		$hotel_name= $this->input->post('hotel_name');
		$city_name =$this->input->post('city_name');
		$main_first_name= $this->input->post('main_first_name');
		$main_last_name= $this->input->post('main_last_name');
		$main_email= $this->input->post('main_email');
		$main_phone_no= $this->input->post('main_phone_no');
		$main_fax= $this->input->post('main_fax');
		$hotel_address=  trim($this->input->post('hotel_address'));
		$hotel_desc =  trim($this->input->post('hotel_desc'));
		$hotel_policies =  trim($this->input->post('hotel_policies'));
		$latitude= $this->input->post('latitude');
		$longitude= $this->input->post('longitude');
		$near_by_area= $this->input->post('near_by_area');
		$near_by_attraction= $this->input->post('near_by_attraction');
		
		$this->admin_model->edit_hotel_details($cus_hotel_id,$hotel_name,$city_name,$main_first_name,$main_last_name,$main_email,
			$main_phone_no,$main_fax,$hotel_desc,$hotel_address,$hotel_policies,$latitude,$longitude,$near_by_area,$near_by_attraction,$id);
			
		redirect('index/update_hotel_details/'.$id, 'refresh'); 
	}
	public function insert_amenities($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result']= $this->admin_model->get_all_hotel_facility();
		$data['hotel_facility']= $this->admin_model->get_all_hotel_available_facility($sup_hotel_id);
		$this->load->view('hotel/hotel_facilities',$data);
	}
	public function add_hotel_facility($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		 $facility_name = $this->input->post('facility_name');
		$this->admin_model->add_hotel_facility($facility_name,$sup_hotel_id);
		
		redirect('index/insert_amenities/'.$sup_hotel_id, 'refresh'); 
	}
	public function add_hotel_near_by_location($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		 $global_near_by_location_id = $this->input->post('global_near_by_location_id');
		$this->admin_model->add_hotel_near_by_location($global_near_by_location_id,$sup_hotel_id);
		
		redirect('index/hotel_near_by_location/'.$sup_hotel_id, 'refresh'); 
	}
	public function add_hotel_amenities()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$amenity_name = $this->input->post('amenity_name');
		$this->admin_model->add_hotel_amenities($amenity_name);
		redirect('index/amenity_list', 'refresh'); 
	}
	public function add_car_amenities()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$amenity_name = $this->input->post('amenity_name');
		$this->admin_model->add_car_amenities($amenity_name);
		redirect('index/car_amenity_list', 'refresh'); 
	}
	public function update_hotel_facility($sup_hotel_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_hotel_facility($id,$status);
		redirect('index/insert_amenities/'.$sup_hotel_id, 'refresh'); 
	}
	public function add_hotel_images($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->getImages($sup_hotel_id);
		$data['videos'] = $this->admin_model->getVideos($sup_hotel_id);
		$this->load->view('hotel/hotel_images_videos',$data);
	}

	public function hotel_images($sup_hotel_id)
	{
		 $hotel_image_name =$this->input->post('hotel_image_name');
		$image_name  = $_FILES['hotel_image_name']['name'];
		$target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/supplier_hotels_images';
		$target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['hotel_image_name']['name']); 
		$move 		 =  move_uploaded_file($_FILES['hotel_image_name']['tmp_name'], $target_path);
		
		$this->admin_model->insert_hotel_images($sup_hotel_id,$image_name); 
		redirect('index/add_hotel_images/'.$sup_hotel_id, 'refresh'); 
	}
	public function status_pic($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->status_pic();
		redirect('index/accomodation_pictures/'.$prop_id,'refresh');
	}
	public function delete_picture()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//echo $sup_hotel_images_id = $_REQUEST['picId'];exit;
		$data['result'] = $this->admin_model->delete_picture();
	}
	public function hotel_videos($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$hotel_video_name  = $_FILES['hotel_video_name']['name'];
		$target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/supplier_hotels_videos';
		$target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['hotel_video_name']['name']); 
		$move 		 =  move_uploaded_file($_FILES['hotel_video_name']['tmp_name'], $target_path);
		
		$this->admin_model->insert_hotel_videos($sup_hotel_id,$hotel_video_name); 
		redirect('index/add_hotel_images/'.$sup_hotel_id, 'refresh'); 
	}
	public function room_categoty_type($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['room_type'] =$this->admin_model->get_details_of_room_cat_type($sup_hotel_id);
		$this->load->view('hotel/room_categoty_type',$data);
		
	}
	public function add_room_categoty_type($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$categoty_type =$this->input->post('categoty_type');
		$this->admin_model->add_room_categoty_type($sup_hotel_id,$categoty_type); 
		
		redirect('index/room_categoty_type/'.$sup_hotel_id, 'refresh'); 
		
	}
	public function add_hotel_room_categoty_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$categoty_type =$this->input->post('category_type');
		$this->admin_model->add_hotel_room_categoty_type($categoty_type); 
		
		redirect('index/hotel_room_category_type', 'refresh'); 
		
	}
	public function add_near_by_location()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$categoty_type =$this->input->post('category_type');
		$this->admin_model->add_near_by_location($categoty_type); 
		
		redirect('index/global_near_by_location', 'refresh'); 
		
	}
	public function update_near_by_location($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_near_by_location($id,$status); 
		
		redirect('index/global_near_by_location', 'refresh'); 
		
	}
	public function update_room_hotel_facility($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_room_hotel_facility($id,$status); 
		
		redirect('index/hotel_room_category_type', 'refresh'); 
		
	}
	public function edit_room_categoty_type($sup_hotel_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] =$this->admin_model->get_room_category_type($id); 
		$this->load->view('hotel/edit_room_categoty_type',$data);
	}
	public function edit_hotel_room_categoty_type($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] =$this->admin_model->get_hotel_room_category_type($id); 
		$this->load->view('admin/edit_hotel_room_categoty_type',$data);
	}
	public function edit_near_by_location($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] =$this->admin_model->get_near_by_location_type($id); 
		$this->load->view('admin/edit_near_by_location',$data);
	}
	public function update_room_categoty_type($sup_hotel_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$category_type =$this->input->post('category_type');
		$this->admin_model->update_room_categoty_type($category_type,$id);
		redirect('index/room_categoty_type/'.$sup_hotel_id, 'refresh'); 
	}
	public function update_hotel_room_categoty_type($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$category_type =$this->input->post('category_type');
		$this->admin_model->update_hotel_room_categoty_type($category_type,$id);
		redirect('index/hotel_room_category_type', 'refresh'); 
	}
	public function update_near_by_location_type($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$category_type =$this->input->post('category_type');
		$this->admin_model->update_near_by_location_type($category_type,$id);
		redirect('index/global_near_by_location', 'refresh'); 
	}
	public function extra_products($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result']=$this->admin_model->get_avilable_products($sup_hotel_id);
		$this->load->view('hotel/extra_products',$data);
	}
	public function hotel_near_by_location($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result']= $this->admin_model->get_all_near_location();
		$data['near_location']= $this->admin_model->get_near_by_location_details($sup_hotel_id);
		$this->load->view('hotel/hotel_near_by_location',$data);
	}
	public function add_hotel_extra_product($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$product_name = $this->input->post('product_name');
		$payment_mode = $this->input->post('payment_mode');
		$price = $this->input->post('price');
		$this->admin_model->add_hotel_extra_product($sup_hotel_id,$product_name,$payment_mode,$price);
		redirect('index/extra_products/'.$sup_hotel_id, 'refresh'); 
	}
	public function update_hotel_extra_product($sup_hotel_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_hotel_extra_product($id,$status);
		redirect('index/extra_products/'.$sup_hotel_id, 'refresh'); 
	}
	public function hotel_inventory_pricing($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_hotel_rooms')==1)
		{	
			$keyword= $this->input->post('keyword');
			$config = array();
			$config["base_url"] = base_url() . "index.php/index/hotel_inventory_pricing/".$sup_hotel_id;
			$config["total_rows"] = $this->admin_model->record_count_hotels($sup_hotel_id);

			$config["per_page"] = 10;
			$config["uri_segment"] = 4;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
			$data['sup_hotel_id']	= $sup_hotel_id;
			$data['result']			= $this->admin_model->get_hotel_room_details_list($sup_hotel_id,$config["per_page"], $page,$keyword);
			$data['links'] 			= $this->pagination->create_links();
			// echo '<pre>';print_r($data);echo '</pre>';die();
			$this->load->view('hotel/view_hotel_rooms',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function amenity_list()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('manage_amenities')==1)
		{

		$data['result'] =$this->admin_model->get_global_amenities();
		$this->load->view('admin/hotel_amenity_list',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function car_amenity_list()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] =$this->admin_model->get_global_car_amenities();
		$this->load->view('admin/car_amenity_list',$data);
	}
	public function update_amenity_list($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_amenity_list($id,$status);
		redirect('index/amenity_list', 'refresh'); 
	}
	public function update_car_amenity_list($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_car_amenity_list($id,$status);
		redirect('index/car_amenity_list', 'refresh'); 
	}
	public function add_hotel_room_rates($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('add_hotel_rooms')==1)
		{
			$this->load->view('hotel/add_hotel_room_rates');
		}else {
			redirect('index/access_denied');
		}
	}
	public function getDates()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $results = $this->admin_model->getDates();
	}
	public function add_room_plan($sup_hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		
		    $global_room_category_type_id = $this->input->post('global_room_category_type_id');
			$room_name = $this->input->post('room_name');
			$room_desc = htmlentities(trim($this->input->post('room_desc')));
			$room_policies =  htmlentities(trim($this->input->post('room_policies')));
			$occupancy = $this->input->post('occupancy');
			$no_of_adults = $this->input->post('no_of_adults');
			$no_of_childs = $this->input->post('no_of_childs');
			$total_no_of_rooms = $this->input->post('total_no_of_rooms');
			$room_critical_level = $this->input->post('room_critical_level');
			$no_of_rooms_left = $this->input->post('no_of_rooms_left');
			
			$this->admin_model->add_room_plan($global_room_category_type_id,$room_name,$room_desc,$room_policies,$occupancy,$no_of_adults,$no_of_childs,
			$total_no_of_rooms,$room_critical_level,$no_of_rooms_left,$sup_hotel_id);
			
			redirect('index/hotel_inventory_pricing/'.$sup_hotel_id, 'refresh'); 
		
	  }
	  public function update_hotel_room_details($sup_hotel_id,$id,$status)
	  {
		  if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		  }
		  if($this->session->userdata('delete_hotel_rooms')==1)
		  {
			  $this->admin_model->update_hotel_room_details($id,$status);
			  redirect('index/hotel_inventory_pricing/'.$sup_hotel_id,'refresh');
		 }else {
			redirect('index/access_denied');
		}
	  }
	 
	  public function edit_hotel_room_details($sup_hotel_id,$id)
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		  }
		if($this->session->userdata('edit_hotel_rooms')==1)
		{
		  $data['hotel_room_details'] = $this->admin_model->get_hotel_room_price_details($id);
		  $this->load->view('hotel/edit_hotel_room_rates',$data);
		 }else {
			redirect('index/access_denied');
		}
	  }
	  public function getAvailDates()
	  {
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $results = $this->admin_model->getAvailDates();
	  }
	  public function update_room_plan($sup_hotel_id,$id)
	  {
		  if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		  // print '<pre />';print_r($_POST);exit;
		    $global_room_category_type_id = $this->input->post('global_room_category_type_id');
			$room_name = $this->input->post('room_name');
			$room_desc = htmlentities(trim($this->input->post('room_desc')));
			$room_policies =  htmlentities(trim($this->input->post('room_policies')));
			$occupancy = $this->input->post('occupancy');
			$no_of_adults = $this->input->post('no_of_adults');
			$no_of_childs = $this->input->post('no_of_childs');
			$total_no_of_rooms = $this->input->post('total_no_of_rooms');
			$room_critical_level = $this->input->post('room_critical_level');
			$no_of_rooms_left = $this->input->post('no_of_rooms_left');

			$this->admin_model->update_room_plan($global_room_category_type_id,$room_name,$room_desc,$room_policies,$occupancy,$no_of_adults,$no_of_childs,$total_no_of_rooms,$room_critical_level,$no_of_rooms_left,$sup_hotel_id,$id);
			
			redirect('index/edit_hotel_room_details/'.$sup_hotel_id.'/'.$id,'refresh');
		
	  }
	  public function edit_admin_type($id)
	  {
		  if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   if($this->session->userdata('edit_admin_type')==1)
			{
			  	$data['admin_name'] = $this->admin_model->get_partitucar_admin($id);
			   	$data['admin_details'] =$this->admin_model->get_admin_type_details();
				$this->load->view('admin/edit_admin_type',$data);
			}else {
				redirect('index/access_denied');
			}
	  }
	   public function edit_sub_admin_type($id)
	  {
		  if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		 if($this->session->userdata('edit_admin_type')==1)
		 {
			  $data['admin_name'] = $this->admin_model->get_partitucar_sub_admin($id);
			  $this->load->view('admin/edit_sub_admin_type',$data);
		 }else {
			redirect('index/access_denied');
		}
	  }
	  public function update_admin_type_details($id)
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   if($this->session->userdata('add_admin')==1)
			{
			   $admin_type =$this->input->post('admin_type');
			   $this->admin_model->update_admin_type_details($admin_type,$id);
			 	redirect('index/admin_type', 'refresh');
			}else {
				redirect('index/access_denied');
			} 
	  }
	   public function update_sub_admin_type_details($id)
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   
		   $admin_type =$this->input->post('admin_type');
		   $this->admin_model->update_admin_type_details($admin_type,$id);
		   	redirect('index/sub_admin_type', 'refresh'); 
	  }
	  public function edit_supplier_type($id)
	  {
		  if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		    if($this->session->userdata('edit_supplier_type')==1)
			{
		  	 $data['sup_name'] = $this->admin_model->get_partitucar_supplier($id);
		  	  $this->load->view('admin/edit_supplier_type',$data);
			 }else {
				redirect('index/access_denied');
			}
	  }
	  public function update_supplier_type_details($id)
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   $supplier_type =$this->input->post('supplier_type');
		   $this->admin_model->update_supplier_type_details($supplier_type,$id);
		   redirect('index/supplier_type', 'refresh'); 
	  }
	  public function update_hotel_images($sup_hotel_id,$id,$status)
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   $this->admin_model->update_hotel_images($id,$status);
		    redirect('index/add_hotel_images/'.$sup_hotel_id, 'refresh'); 
	  }
	  public function approve_hotel_reviews($sup_hotel_id)
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   $data['result'] = $this->admin_model->approve_hotel_reviews($sup_hotel_id);
		   $this->load->view('hotel/hotel_reviews',$data);
	  }
	  public function update_hotel_reviews($sup_hotel_id,$id,$status)
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   $this->admin_model->update_hotel_reviews($id,$status);
		   redirect('index/approve_hotel_reviews/'.$sup_hotel_id ,'refresh');
	  }
	  public function view_hotel_review($sup_hotel_id,$id)
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   $data['result'] = $this->admin_model->get_particular_hotel_review($id);
		  $this->load->view('hotel/view_hotel_reviews',$data);
	  }
	  public function hotel_roles_previlages()
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   if($this->session->userdata('manage_previliges')==1)
			{
				$keyword= $this->input->post('keyword');
				$admin['sup_details']= $this->admin_model->get_hotel_supplier_details(1,$keyword);
		   		$this->load->view('admin/hotel_roles_previlages',$admin);
			}else {
			redirect('index/access_denied');
			}
	  }
	  public function hotel_supplier_search()
	  {
			$keyword= $this->input->post('keyword');
			$admin['sup_details']= $this->admin_model->get_hotel_supplier_details(1,$keyword);
			$this->load->view('admin/hotel_supplier_search',$admin);
	  }
	  public function villa_supplier_search()
	  {
			$keyword= $this->input->post('keyword');
			$admin['sup_details']= $this->admin_model->get_hotel_supplier_details(2,$keyword);
			$this->load->view('admin/villa_supplier_search',$admin);
	  }
	  public function car_supplier_search()
	  {
			$keyword= $this->input->post('keyword');
			$admin['sup_details']= $this->admin_model->get_hotel_supplier_details(3,$keyword);
			$this->load->view('admin/car_supplier_search',$admin);
	  }
	  public function sub_admin_type_search()
	  {
			$keyword= $this->input->post('keyword');
			$data['admin'] = $this->admin_model->get_sub_admin_type_details($keyword);
			$this->load->view('admin/sub_admin_type_search',$data);
	  }
	  public function roles_super_admin()
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   if($this->session->userdata('manage_previliges')==1)
			{
			   $data['result'] = $this->admin_model->get_roles_super_admin();
			   $this->load->view('admin/super_admin_previliges',$data);
			 }else {
			redirect('index/access_denied');
			}
	  }
	  
	public function getHotelSupplierPrevilages($supplier_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->getHotelSupplierPrevilages($supplier_id);
	}
	public function getVillaSupplierPrevilages($supplier_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->getVillaSupplierPrevilages($supplier_id);
	}
	public function getCarSupplierPrevilages($supplier_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->getCarSupplierPrevilages($supplier_id);
	}
	
	public function set_hotel_previlages()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if(isset($_POST['jumpMenu'])){
			$user_id = $this->input->post('jumpMenu');
			$add_hotel = $this->input->post('add_hotel'); 
			$edit_hotel = $this->input->post('edit_hotel'); 
			$delete_hotel = $this->input->post('delete_hotel'); 
			$view_hotels = $this->input->post('view_hotels'); 
			$add_hotel_rooms = $this->input->post('add_hotel_rooms'); 
			$edit_hotel_rooms = $this->input->post('edit_hotel_rooms'); 
			$delete_hotel_rooms = $this->input->post('delete_hotel_rooms');
			$view_hotel_rooms = $this->input->post('view_hotel_rooms');  
			$hotel_room_inventory = $this->input->post('hotel_room_inventory');
			$hotel_room_pricing = $this->input->post('hotel_room_pricing');
			$view_order = $this->input->post('view_order');
			$view_order_reports = $this->input->post('view_order_reports');
			$view_sales_reports = $this->input->post('view_sales_reports');
			
			
			$this->admin_model->set_hotel_previlages($user_id,$add_hotel,$edit_hotel,$delete_hotel,$add_hotel_rooms,$edit_hotel_rooms,$delete_hotel_rooms,$hotel_room_inventory,$hotel_room_pricing,$view_order,$view_order_reports,$view_sales_reports,$view_hotel_rooms,$view_hotels);
			
			$data['user_id'] = $user_id;
		}
		$data['sup_details']= $this->admin_model->get_hotel_supplier_details(1);
		$this->load->view('admin/hotel_roles_previlages',$data);
	}
	public function villa_roles_previlages()
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		   if($this->session->userdata('manage_previliges')==1)
			{
				$keyword= $this->input->post('keyword');
				$admin['sup_details']= $this->admin_model->get_hotel_supplier_details(2,$keyword);
		   		$this->load->view('admin/villa_roles_previlages',$admin);
			}else {
			redirect('index/access_denied');
		}
	  }
	public function set_villa_previlages()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		if(isset($_POST['jumpMenu'])){
			$supplier_id = $this->input->post('jumpMenu');
			$add_villa = $this->input->post('add_villa'); 
			$edit_villa = $this->input->post('edit_villa'); 
			$delete_villa = $this->input->post('delete_villa'); 
			$view_villa = $this->input->post('view_villa'); 
			$villa_room_inventory = $this->input->post('villa_room_inventory');
			$villa_pricing = $this->input->post('villa_pricing');
			$view_order = $this->input->post('view_order');
			$view_order_reports = $this->input->post('view_order_reports');
			$view_sales_reports = $this->input->post('view_sales_reports');
			
			
			$this->admin_model->set_villa_previlages($supplier_id,$add_villa,$edit_villa,$delete_villa,$villa_room_inventory,$villa_pricing,$view_order,$view_order_reports,$view_sales_reports,$view_villa);
			
			$data['user_id'] = $supplier_id;
		}
		$data['sup_details']= $this->admin_model->get_hotel_supplier_details(2);
		$this->load->view('admin/villa_roles_previlages',$data);
	
	}
	public function car_roles_previlages()
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		    if($this->session->userdata('manage_previliges')==1)
			{
				$keyword= $this->input->post('keyword');
				$admin['sup_details']= $this->admin_model->get_hotel_supplier_details(3,$keyword);
		   		$this->load->view('admin/car_roles_previlages',$admin);
			}else {
				redirect('index/access_denied');
			}

	  }
    public function set_car_previlages()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		if(isset($_POST['jumpMenu'])){
			$supplier_id = $this->input->post('jumpMenu');
			$add_car = $this->input->post('add_car'); 
			$edit_car = $this->input->post('edit_car'); 
			$delete_car = $this->input->post('delete_car'); 
			$view_cars = $this->input->post('view_cars'); 
			$room_inventory = $this->input->post('car_room_inventory');
			$room_pricing = $this->input->post('car_pricing');
			$view_order = $this->input->post('view_order');
			$view_order_reports = $this->input->post('view_order_reports');
			$view_sales_reports = $this->input->post('view_sales_reports');
			
			
			$this->admin_model->set_car_previlages($supplier_id,$add_car,$edit_car,$delete_car,$room_inventory,$room_pricing,$view_order,$view_order_reports,$view_sales_reports,$view_cars);
			
			$data['user_id'] =$supplier_id;
		}
		$data['sup_details']= $this->admin_model->get_hotel_supplier_details(3);
		$this->load->view('admin/car_roles_previlages',$data);
	
	}
	public function sub_admin_roles_previliges()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('manage_previliges')==1)
		{
			$data['admin'] = $this->admin_model->get_sub_admin_type_details();
			$this->load->view('admin/sub_admin_previliges',$data);
		}else {
			redirect('index/access_denied');
		}

	}
	public function set_call_center_previlages()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		$create_order = $this->input->post('create_order'); 
		$edit_order = $this->input->post('edit_order'); 
		$delete_order = $this->input->post('delete_order'); 
		$view_order = $this->input->post('view_order');
		$create_complaint = $this->input->post('create_complaint');
		$edit_complaint = $this->input->post('edit_complaint');
		$delete_complaint = $this->input->post('delete_complaint');
		$static_pages = $this->input->post('static_pages');
		$email_templates = $this->input->post('email_templates');
		$top_destinations = $this->input->post('top_destinations');
		$deals = $this->input->post('deals');
		$news = $this->input->post('news');
		 
		$this->admin_model->set_call_center_previlages($create_order,$edit_order,$delete_order,$view_order,$create_complaint,$edit_complaint,$delete_complaint,$static_pages,$email_templates,$top_destinations,$deals,$news);
		
		redirect('index/call_center_roles_previliges','refresh');
	}
	public function data_entry_roles_previliges()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		
		$data['result'] = $this->admin_model->get_data_entry_roles_previliges();
		$this->load->view('admin/data_entry_previliges',$data);
	}
	public function set_data_entry_previlages()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		$add_hotel = $this->input->post('add_hotel'); 
		$edit_hotel = $this->input->post('edit_hotel'); 
		$delete_hotel = $this->input->post('delete_hotel'); 
		$add_hotel_rooms = $this->input->post('add_hotel_rooms');
		$edit_hotel_rooms = $this->input->post('edit_hotel_rooms');
		$delete_hotel_rooms = $this->input->post('delete_hotel_rooms');
		$hotel_room_inventory = $this->input->post('hotel_room_inventory');
		$hotel_pricing = $this->input->post('hotel_pricing');
		$add_villa = $this->input->post('add_villa');
		$edit_villa = $this->input->post('edit_villa');
		$delete_villa = $this->input->post('delete_villa');
		$villa_room_inventory = $this->input->post('villa_room_inventory');
		$villa_pricing = $this->input->post('villa_pricing'); 
		$add_car = $this->input->post('add_car'); 
		$edit_car = $this->input->post('edit_car');
		$delete_car = $this->input->post('delete_car');
		$car_room_inventory = $this->input->post('car_room_inventory');
		$car_pricing = $this->input->post('car_pricing');
		
		$this->admin_model->set_data_entry_previlages($add_hotel,$edit_hotel,$delete_hotel,$add_hotel_rooms,$edit_hotel_rooms,$delete_hotel_rooms,$hotel_room_inventory,$hotel_pricing,$add_villa,$edit_villa,$delete_villa,$villa_room_inventory,$villa_pricing,$add_car,$edit_car,$delete_car,$car_room_inventory,$car_pricing);
		
		redirect('index/data_entry_roles_previliges','refresh');
	}
	public function b2b_roles_previliges()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('manage_previliges')==1)
		{
			$data['result'] = $this->admin_model->get_b2b_roles_previliges();
			$this->load->view('admin/b2b_roles_previliges',$data);
		}else {
			redirect('index/access_denied');
		}

	}
	public function set_b2b_previlages()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		$edit_details = $this->input->post('edit_details'); 
		$view_reports = $this->input->post('view_reports'); 
		$this->admin_model->set_b2b_previlages($edit_details,$view_reports);
		redirect('index/b2b_roles_previliges','refresh');
	}
	public function set_super_admin_previlages()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$add_admin = $this->input->post('add_admin'); 
		$edit_admin = $this->input->post('edit_admin'); 
		$delete_admin = $this->input->post('delete_admin'); 
		$view_admin_users = $this->input->post('view_admin_users'); 
		$static_pages = $this->input->post('static_pages');
		$email_templates = $this->input->post('email_templates');
		$top_destinations = $this->input->post('top_destinations');
		$deals = $this->input->post('deals');
		$news = $this->input->post('news');
		$add_b2c_customer = $this->input->post('add_b2c_customer');
		$edit_b2c_customer = $this->input->post('edit_b2c_customer');
		$delete_b2c_customer = $this->input->post('delete_b2c_customer');
		$view_b2c_customers = $this->input->post('view_b2c_customers');
		$create_order = $this->input->post('create_order');
		$edit_order = $this->input->post('edit_order'); 
		$delete_order = $this->input->post('delete_order'); 
		$view_order = $this->input->post('view_order');
		$amenity_list = $this->input->post('amenity_list');
		$currencies = $this->input->post('currencies');
		$payment_gateways = $this->input->post('payment_gateways');
		$commision = $this->input->post('commision');
		$manage_cities = $this->input->post('manage_cities');
		$manage_amenities = $this->input->post('manage_amenities'); 
		$manage_discounts = $this->input->post('manage_discounts'); 
		$manage_previliges = $this->input->post('manage_previliges');
		$global_near_by_location = $this->input->post('global_near_by_location');
		
		$add_admin_type = $this->input->post('add_admin_type'); 
		$edit_admin_type = $this->input->post('edit_admin_type'); 
		$delete_admin_type = $this->input->post('delete_admin_type'); 
		$view_admin_type = $this->input->post('view_admin_type');
		$add_supplier_type = $this->input->post('add_supplier_type');
		$edit_supplier_type = $this->input->post('edit_supplier_type'); 
		$delete_supplier_type = $this->input->post('delete_supplier_type'); 
		$view_supplier_users = $this->input->post('view_supplier_users'); 
		$add_supplier_user = $this->input->post('add_supplier_user');
		$edit_supplier_user = $this->input->post('edit_supplier_user'); 
		$delete_supplier_user = $this->input->post('delete_supplier_user');
		$view_supplier_type = $this->input->post('view_supplier_type'); 
		
		
	/*	$add_hotel_supplier = $this->input->post('add_hotel_supplier'); 
		$edit_hotel_supplier = $this->input->post('edit_hotel_supplier'); 
		$delete_hotel_supplier = $this->input->post('delete_hotel_supplier'); 
		$view_hotel_suppliers = $this->input->post('view_hotel_suppliers');*/
		$add_hotel = $this->input->post('add_hotel');
		$edit_hotel = $this->input->post('edit_hotel');
		$delete_hotel = $this->input->post('delete_hotel');
		$view_hotels = $this->input->post('view_hotels');
		$add_hotel_rooms = $this->input->post('add_hotel_rooms');
		$edit_hotel_rooms = $this->input->post('edit_hotel_rooms');
		$delete_hotel_rooms = $this->input->post('delete_hotel_rooms');
		$view_hotel_rooms = $this->input->post('view_hotel_rooms');
		$hotel_room_inventory = $this->input->post('hotel_room_inventory');
		$hotel_pricing = $this->input->post('hotel_pricing');
		
	/*	$add_villa_supplier = $this->input->post('add_villa_supplier'); 
		$edit_villa_supplier = $this->input->post('edit_villa_supplier'); 
		$delete_villa_supplier = $this->input->post('delete_villa_supplier'); 
		$view_villa_suppliers = $this->input->post('view_villa_suppliers'); */
		$add_villa = $this->input->post('add_villa');
		$edit_villa = $this->input->post('edit_villa');
		$delete_villa = $this->input->post('delete_villa');
		$view_villa = $this->input->post('view_villa');
		$villa_room_inventory = $this->input->post('villa_room_inventory');
		$villa_pricing = $this->input->post('villa_pricing');
		
		/*$add_car_supplier = $this->input->post('add_car_supplier'); 
		$edit_car_supplier = $this->input->post('edit_car_supplier'); 
		$delete_car_supplier = $this->input->post('delete_car_supplier'); 
		$view_car_suppliers = $this->input->post('view_car_suppliers'); */
		$add_car = $this->input->post('add_car');
		$edit_car = $this->input->post('edit_car');
		$delete_car = $this->input->post('delete_car');
		$view_cars = $this->input->post('view_cars');
		$car_room_inventory = $this->input->post('car_room_inventory');
		$car_pricing = $this->input->post('car_pricing');
		
		$user_reports = $this->input->post('user_reports'); 
		$order_reports = $this->input->post('order_reports'); 
		$order_reports_status_wize = $this->input->post('order_reports_status_wize'); 
		$inventory_reports = $this->input->post('inventory_reports');
		$sales_reports = $this->input->post('sales_reports');
		$account_reports = $this->input->post('account_reports');
		$call_center_reports = $this->input->post('call_center_reports');
		$call_center_tracking_reports = $this->input->post('call_center_tracking_reports');
		
		/*$add_call_center_user = $this->input->post('add_call_center_user'); 
		$edit_call_center_user = $this->input->post('edit_call_center_user'); 
		$delete_call_center_user = $this->input->post('delete_call_center_user'); 
		$view_call_center_users = $this->input->post('view_call_center_users');*/ 
		$add_travel_agents = $this->input->post('add_travel_agents');
		$edit_travel_agents = $this->input->post('edit_travel_agents');
		$delete_travel_agents = $this->input->post('delete_travel_agents');
		$view_travel_agents = $this->input->post('view_travel_agents');
		$manage_room_categorys = $this->input->post('manage_room_categorys');
		
		$this->admin_model->set_super_admin_previlages($add_admin,$edit_admin,$delete_admin,$static_pages,$email_templates,$top_destinations,$deals,$news,$add_b2c_customer,$edit_b2c_customer,$delete_b2c_customer,$create_order,$edit_order,$delete_order,$view_order,$amenity_list,$currencies,$payment_gateways,$commision,$manage_cities,$manage_amenities,$manage_discounts,$manage_previliges,$add_hotel,$edit_hotel,$delete_hotel,$add_hotel_rooms,$edit_hotel_rooms,$delete_hotel_rooms,$hotel_room_inventory,$hotel_pricing,$add_villa,$edit_villa,$delete_villa,$villa_room_inventory,$villa_pricing,$add_car,$edit_car,$delete_car,$car_room_inventory,$car_pricing,$user_reports,$order_reports,$order_reports_status_wize,$inventory_reports,$sales_reports,$account_reports,$call_center_reports,$call_center_tracking_reports,$add_travel_agents,$edit_travel_agents,$delete_travel_agents,$view_admin_users,$view_b2c_customers,$view_hotels,$view_villa,$view_cars,$view_travel_agents,$view_hotel_rooms,$manage_room_categorys,$add_admin_type,$edit_admin_type,$delete_admin_type,$add_supplier_type,$edit_supplier_type,$delete_supplier_type,$view_supplier_users,$add_supplier_user,$edit_supplier_user,$delete_supplier_user,$view_supplier_type,$view_admin_type,$global_near_by_location);
		
		redirect('index/roles_super_admin','refresh');
	}
	public function hotel_room_category_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		   if($this->session->userdata('manage_room_categorys')==1)
			{
				$this->load->view('admin/hotel_room_category_type');
			} else {
			redirect('index/access_denied');
			}
	}
	public function global_near_by_location()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		   if($this->session->userdata('global_near_by_location')==1)
			{
				$this->load->view('admin/global_near_by_location');
			} else {
			redirect('index/access_denied');
			}
	}
	public function sub_admin_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_admin_type')==1)
		{

			$data['result'] = $this->admin_model->get_sub_admin_details();
			$this->load->view('admin/sub_admin_type',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	
	public function add_sub_admin_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		 $admin_type= $this->input->post('admin_type');
		$this->admin_model->add_sub_admin_type($admin_type);
		redirect('index/sub_admin_type', 'refresh');
	}
	public function view_sub_admin_user()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_admin_users')==1)
		{
			$keyword= $this->input->post('keyword');
			$config = array();
			$config["base_url"] = base_url() . "index.php/index/view_sub_admin_user";
			$config["total_rows"] = $this->admin_model->record_sub_admin_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['result'] = $this->admin_model->get_sub_admin_user_list($config["per_page"], $page,$keyword);
			$data["links"] = $this->pagination->create_links();
			// echo '<pre>';print_r($data);echo '</pre>';die();
			$this->load->view('admin/view_sub_admin_user',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function add_new_sub_admin_user()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('add_admin')==1)
		{
			$this->load->view('admin/add_new_sub_admin_user');
		}else {
			redirect('index/access_denied');
		}
	}
	public function sub_admin_registration_page()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//print '<pre >';print_r($_POST);exit;
		$this->form_validation->set_rules('sub_admin_type_id', 'Sub Admin Type', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('comform_password', 'Confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|numeric');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('admin/add_new_sub_admin_user');
		}
		else {
			//print '<pre >';print_r($_POST);exit;
			
			$sub_admin_type_id= $this->input->post('sub_admin_type_id');
			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$name= $this->input->post('name');
			$mobile_no= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$address =$this->input->post('address');
			$notes= $this->input->post('notes');
			
			$this->admin_model->sub_admin_registration_details($sub_admin_type_id,$email,$password,$name,$mobile_no,$office_phone_no,$address,$notes);
			redirect('index/view_sub_admin_user','refresh');
		}
		
	
	}
	public function update_sub_admin_user($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_admin')==1)
		{
			$this->admin_model->update_sub_admin_user($id,$status);
			redirect('index/view_sub_admin_user','refresh');
		}else {
			redirect('index/access_denied');
		}
	}
	public function edit_sub_admin_user($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('edit_admin')==1)
		{
			$data['admin_user'] =$this->admin_model->get_details_of_sub_admin_user($id);
			$this->load->view('admin/edit_sub_admin_user',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function update_sub_admin_registration_page($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre >';print_r($_POST);exit;
		$this->form_validation->set_rules('sub_admin_type_id', 'Sub Admin Type', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('comform_password', 'Confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|numeric');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		
		if($this->form_validation->run()==FALSE)
		{
			$data['admin_user'] =$this->admin_model->get_details_of_sub_admin_user($id);
			$this->load->view('admin/edit_sub_admin_user',$data);
			
		}
		else {
			//print '<pre >';print_r($_POST);exit;
			
			$sub_admin_type_id= $this->input->post('sub_admin_type_id');
			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$name= $this->input->post('name');
			$mobile_no= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$address =$this->input->post('address');
			$notes= $this->input->post('notes');
			
			$this->admin_model->update_sub_admin_registration_page($sub_admin_type_id,$email,$password,$name,$mobile_no,$office_phone_no,$address,$notes,$id);
			redirect('index/edit_sub_admin_user/'.$id, 'refresh');
		}
	}
	public function view_b2c_user_details()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('view_b2c_customers')==1)
		{
			$keyword= $this->input->post('keyword');
			$config = array();
			$config["base_url"] = base_url() . "index.php/index/view_b2c_user_details";
			$config["total_rows"] = $this->admin_model->record_count_b2cusers();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['sup_details'] = $this->admin_model->get_details_of_b2c($config["per_page"], $page,$keyword);
			$data["links"] = $this->pagination->create_links();
			// echo '<pre>';print_r($data);echo '</pre>';die();
			$this->load->view('admin/view_b2c_user_details',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function add_b2c_user()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('add_b2c_customer')==1)
		{
				$this->load->view('admin/add_b2c_user');
		}else {
			redirect('index/access_denied');
		}
	}
	public function b2c_registration_page()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//print '<pre >';print_r($_POST);exit;
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[b2c_users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('comform_password', 'Confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|numeric');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('admin/add_b2c_user');
		}
		else {
			//print '<pre >';print_r($_POST);exit;
			
			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$name= $this->input->post('name');
			$mobile_no= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$address =$this->input->post('address');
			$notes= $this->input->post('notes');
			
			$b2c_user_logo = $_FILES['b2c_user_logo']['name'];
			//print_r($hotel_logo);die();
			$target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/b2c_user_logo';
			$target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['b2c_user_logo']['name']); 
			
			if(move_uploaded_file($_FILES['b2c_user_logo']['tmp_name'], $target_path)) {
			//echo "The file ".  basename( $_FILES['hotel_logo']['name']). " has been uploaded";
			} else{
			//echo "There was an error uploading the file, please try again!";
			}
			
			$this->admin_model->b2c_registration_page($email,$password,$name,$mobile_no,$office_phone_no,$address,$notes,$b2c_user_logo);
			redirect('index/view_b2c_user_details','refresh');
		}
		
	
	}
	public function update_b2c_user($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('delete_b2c_customer')==1)
		{
			$this->admin_model->update_b2c_user($id,$status);
			redirect('index/view_b2c_user_details','refresh');
		}else {
			redirect('index/access_denied');
		}
		
	}
	public function edit_b2c_user($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('edit_b2c_customer')==1)
		{
			$data['admin_user'] =$this->admin_model->get_details_of_b2c_user($id);
			$this->load->view('admin/edit_b2c_user',$data);
		}else {
			redirect('index/access_denied');
		}
	}
	public function update_b2c_registration_page($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('comform_password', 'Confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|numeric');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$data['admin_user'] =$this->admin_model->get_details_of_b2c_user($id);
			$this->load->view('admin/edit_b2c_user',$data);
		}
		else {
			//print '<pre >';print_r($_POST);exit;
			
			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$name= $this->input->post('name');
			$mobile_no= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$address =$this->input->post('address');
			$notes= $this->input->post('notes');
			$image1 = $this->input->post('image1');
			$b2c_user_logo ='';
			
			if(isset($_FILES['b2c_user_logo']['name']) && $_FILES['b2c_user_logo']['name'] != '')
			{
				$b2c_user_logo  	= $_FILES['b2c_user_logo']['name']; 
				$target_path1 = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/b2c_user_logo';
				$target_path = 	rtrim($target_path1,'/').'/'.basename($_FILES['b2c_user_logo']['name']);
				$move1 		 =  move_uploaded_file($_FILES['b2c_user_logo']['tmp_name'], $target_path);
			}
			else {
				$b2c_user_logo=$image1;
			}			
			
		   $this->admin_model->update_b2c_registration_page($email,$password,$name,$mobile_no,$office_phone_no,$address,$notes,$id,$b2c_user_logo);
			redirect('index/edit_b2c_user/'.$id,'refresh');
		}
	}
	public function getSubAdminPrevilages($sub_admin_type_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->getSubAdminPrevilages($sub_admin_type_id);
	}
	public function set_sub_admin_previlages()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if(isset($_POST['jumpMenu'])){
			$sub_admin_type_id 	= $this->input->post('jumpMenu'); 
			$add_admin = $this->input->post('add_admin'); 
			$edit_admin = $this->input->post('edit_admin'); 
			$delete_admin = $this->input->post('delete_admin'); 
			$view_admin_users = $this->input->post('view_admin_users'); 
			$static_pages = $this->input->post('static_pages');
			$email_templates = $this->input->post('email_templates');
			$top_destinations = $this->input->post('top_destinations');
			$deals = $this->input->post('deals');
			$news = $this->input->post('news');
			$add_b2c_customer = $this->input->post('add_b2c_customer');
			$edit_b2c_customer = $this->input->post('edit_b2c_customer');
			$delete_b2c_customer = $this->input->post('delete_b2c_customer');
			$view_b2c_customers = $this->input->post('view_b2c_customers');
			$create_order = $this->input->post('create_order');
			$edit_order = $this->input->post('edit_order'); 
			$delete_order = $this->input->post('delete_order'); 
			$view_order = $this->input->post('view_order');
			$amenity_list = $this->input->post('amenity_list');
			$currencies = $this->input->post('currencies');
			$payment_gateways = $this->input->post('payment_gateways');
			$commision = $this->input->post('commision');
			$manage_cities = $this->input->post('manage_cities');
			$manage_amenities = $this->input->post('manage_amenities'); 
			$manage_discounts = $this->input->post('manage_discounts'); 
			$manage_previliges = $this->input->post('manage_previliges');
			$global_near_by_location = $this->input->post('global_near_by_location'); 
			
			$add_admin_type = $this->input->post('add_admin_type'); 
			$edit_admin_type = $this->input->post('edit_admin_type'); 
			$delete_admin_type = $this->input->post('delete_admin_type'); 
			$view_admin_type = $this->input->post('view_admin_type');
			$add_supplier_type = $this->input->post('add_supplier_type');
			$edit_supplier_type = $this->input->post('edit_supplier_type'); 
			$delete_supplier_type = $this->input->post('delete_supplier_type'); 
			$view_supplier_users = $this->input->post('view_supplier_users'); 
			$add_supplier_user = $this->input->post('add_supplier_user');
			$edit_supplier_user = $this->input->post('edit_supplier_user'); 
			$delete_supplier_user = $this->input->post('delete_supplier_user');
			$view_supplier_type = $this->input->post('view_supplier_type'); 
			
			
			
		/*	$add_hotel_supplier = $this->input->post('add_hotel_supplier'); 
			$edit_hotel_supplier = $this->input->post('edit_hotel_supplier'); 
			$delete_hotel_supplier = $this->input->post('delete_hotel_supplier'); 
			$view_hotel_suppliers = $this->input->post('view_hotel_suppliers');*/
			$add_hotel = $this->input->post('add_hotel');
			$edit_hotel = $this->input->post('edit_hotel');
			$delete_hotel = $this->input->post('delete_hotel');
			$view_hotels = $this->input->post('view_hotels');
			$add_hotel_rooms = $this->input->post('add_hotel_rooms');
			$edit_hotel_rooms = $this->input->post('edit_hotel_rooms');
			$delete_hotel_rooms = $this->input->post('delete_hotel_rooms');
			$view_hotel_rooms = $this->input->post('view_hotel_rooms');
			$hotel_room_inventory = $this->input->post('hotel_room_inventory');
			$hotel_pricing = $this->input->post('hotel_pricing');
			
		/*	$add_villa_supplier = $this->input->post('add_villa_supplier'); 
			$edit_villa_supplier = $this->input->post('edit_villa_supplier'); 
			$delete_villa_supplier = $this->input->post('delete_villa_supplier'); 
			$view_villa_suppliers = $this->input->post('view_villa_suppliers'); */
			$add_villa = $this->input->post('add_villa');
			$edit_villa = $this->input->post('edit_villa');
			$delete_villa = $this->input->post('delete_villa');
			$view_villa = $this->input->post('view_villa');
			$villa_room_inventory = $this->input->post('villa_room_inventory');
			$villa_pricing = $this->input->post('villa_pricing');
			
			/*$add_car_supplier = $this->input->post('add_car_supplier'); 
			$edit_car_supplier = $this->input->post('edit_car_supplier'); 
			$delete_car_supplier = $this->input->post('delete_car_supplier'); 
			$view_car_suppliers = $this->input->post('view_car_suppliers'); */
			$add_car = $this->input->post('add_car');
			$edit_car = $this->input->post('edit_car');
			$delete_car = $this->input->post('delete_car');
			$view_cars = $this->input->post('view_cars');
			$car_room_inventory = $this->input->post('car_room_inventory');
			$car_pricing = $this->input->post('car_pricing');
			
			$user_reports = $this->input->post('user_reports'); 
			$order_reports = $this->input->post('order_reports'); 
			$order_reports_status_wize = $this->input->post('order_reports_status_wize'); 
			$inventory_reports = $this->input->post('inventory_reports');
			$sales_reports = $this->input->post('sales_reports');
			$account_reports = $this->input->post('account_reports');
			$call_center_reports = $this->input->post('call_center_reports');
			$call_center_tracking_reports = $this->input->post('call_center_tracking_reports');
			
			/*$add_call_center_user = $this->input->post('add_call_center_user'); 
			$edit_call_center_user = $this->input->post('edit_call_center_user'); 
			$delete_call_center_user = $this->input->post('delete_call_center_user'); 
			$view_call_center_users = $this->input->post('view_call_center_users');*/ 
			$add_travel_agents = $this->input->post('add_travel_agents');
			$edit_travel_agents = $this->input->post('edit_travel_agents');
			$delete_travel_agents = $this->input->post('delete_travel_agents');
			$view_travel_agents = $this->input->post('view_travel_agents');
			$manage_room_categorys = $this->input->post('manage_room_categorys');
			
			$this->admin_model->set_sub_admin_previlages($add_admin,$edit_admin,$delete_admin,$static_pages,$email_templates,$top_destinations,$deals,$news,$add_b2c_customer,$edit_b2c_customer,$delete_b2c_customer,$create_order,$edit_order,$delete_order,$view_order,$amenity_list,$currencies,$payment_gateways,$commision,$manage_cities,$manage_amenities,$manage_discounts,$manage_previliges,$add_hotel,$edit_hotel,$delete_hotel,$add_hotel_rooms,$edit_hotel_rooms,$delete_hotel_rooms,$hotel_room_inventory,$hotel_pricing,$add_villa,$edit_villa,$delete_villa,$villa_room_inventory,$villa_pricing,$add_car,$edit_car,$delete_car,$car_room_inventory,$car_pricing,$user_reports,$order_reports,$order_reports_status_wize,$inventory_reports,$sales_reports,$account_reports,$call_center_reports,$call_center_tracking_reports,$add_travel_agents,$edit_travel_agents,$delete_travel_agents,$view_admin_users,$view_b2c_customers,$view_hotels,$view_villa,$view_cars,$view_travel_agents,$view_hotel_rooms,$sub_admin_type_id,$manage_room_categorys,$add_admin_type,$edit_admin_type,$delete_admin_type,$add_supplier_type,$edit_supplier_type,$delete_supplier_type,$view_supplier_users,$add_supplier_user,$edit_supplier_user,$delete_supplier_user,$view_supplier_type,$view_admin_type,$global_near_by_location);
			
			$data['user_id'] = $sub_admin_type_id;
		}
		$data['admin'] = $this->admin_model->get_sub_admin_type_details();
		$this->load->view('admin/sub_admin_previliges',$data);
	
	}
	public function global_car_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$this->load->view('admin/global_car_type');
	}
	public function add_global_car_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$car_type= $this->input->post('car_type');
		$this->admin_model->add_global_car_type($car_type);
		redirect('index/global_car_type','refresh');
	}
	public function update_car_type($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_car_type($id,$status);
		redirect('index/global_car_type','refresh');
	}
	public function edit_car_type($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->get_global_part_car_type($id);
		$this->load->view('admin/edit_car_type',$data);
	}
	public function update_car_type_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$car_type= $this->input->post('car_type');
		$this->admin_model->update_car_type_details($car_type,$id);
		redirect('index/global_car_type','refresh');
	}
	public function hotel_room_facility()
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$data['result']= $this->admin_model->get_all_hotel_facility();
		//$data['hotel_facility']= $this->admin_model->get_all_hotel_available_facility($sup_hotel_id);
		$this->load->view('hotel/hotel_room_facilities',$data);
	}
	public function add_hotel_room_facility($sup_hotel_id,$sup_room_details_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$facility_name = $this->input->post('facility_name');
		$this->admin_model->add_hotel_room_facility($facility_name,$sup_hotel_id,$sup_room_details_id);
		redirect('index/hotel_room_facility/'.$sup_hotel_id.'/'.$sup_room_details_id,'refresh');
	}
	public function change_password()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$admin_id	= $this->session->userdata('user_id');
			
		$data['admin_user'] = $this->admin_model->get_details_of_admin_user($admin_id);
		$this->load->view('admin/change_password',$data);
	}
	public function update_password() 
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$admin_id	= $this->session->userdata('user_id');
		$admin_type	= $this->session->userdata('admin_type');
	
		$this->form_validation->set_rules('old_password', 'Old Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[old_password]');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('comform_password', 'Confirm password', 'required|matches[new_password]');
		
		if($this->form_validation->run()==FALSE)
		{
			$data['admin_user'] = $this->admin_model->get_details_of_admin_user($admin_id);
			$this->load->view('admin/change_password',$data);
		}
		else {
			$password	= $this->input->post('new_password');
			
			$this->admin_model->update_password($admin_id,$password);
			
			$data['admin_user'] = $this->admin_model->get_details_of_admin_user($admin_id);
			// $this->load->view('admin/change_password',$data);
			redirect('index/dashboard', 'refresh'); 
		}
	}
	public function myacc_details()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$admin_id	= $this->session->userdata('user_id');
			
		$data['admin_user'] = $this->admin_model->get_details_of_admin_user($admin_id);
		$this->load->view('admin/user_profile',$data);
	}
	public function update_user_profile() 
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		$admin_id	= $this->session->userdata('user_id');
		$admin_type	= $this->session->userdata('admin_type');
		
		// print '<pre >';print_r($this->session);print '</pre >';exit;
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|numeric');
		//$this->form_validation->set_rules('office_phone_no', 'Office Phone ', 'required|numeric');
		if($admin_type == 3){
			$this->form_validation->set_rules('supplier_type_id', 'Supplier Type', 'required');
			$this->form_validation->set_rules('contact_person_name', 'Contact person name', 'required');
			$this->form_validation->set_rules('desig_of_contact', 'Designation of Contact', 'required');
		}
		if($admin_type == 2){
			$this->form_validation->set_rules('sub_admin_type_id', 'Sub Admin Type', 'required');
		}
		if($this->form_validation->run()==FALSE)
		{
			$data['admin_user'] = $this->admin_model->get_details_of_admin_user($admin_id);
			$this->load->view('admin/user_profile',$data);
		}
		else {
			$supplier_type_id		= '';
			$contact_person_name	= '';
			$desig_of_contact		= '';
			$sub_admin_type_id		= '';

			if($admin_type == 3){
				$supplier_type_id		= $this->input->post('supplier_type_id');
				$contact_person_name	= $this->input->post('contact_person_name');
				$desig_of_contact		= $this->input->post('desig_of_contact');
			} 
			if($admin_type == 2){
				$sub_admin_type_id	= $this->input->post('sub_admin_type_id');
			} 
			$email			= $this->input->post('email');
			$name			= $this->input->post('name');
			$address 		= $this->input->post('address');
			$mobile_no		= $this->input->post('mobile_no');
			$office_phone_no= $this->input->post('office_phone_no');
			$notes			= $this->input->post('notes');
			$image1 		= $this->input->post('image1');
			$supplier_logo	= '';
			
			if(isset($_FILES['supplier_logo']['name']) && $_FILES['supplier_logo']['name'] != '')
			{
				$supplier_logo	= $_FILES['supplier_logo']['name']; 
				$target_path1	= $_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/supplier_logos';
				$target_path	= rtrim($target_path1,'/').'/'.basename($_FILES['supplier_logo']['name']);
				$move1			= move_uploaded_file($_FILES['supplier_logo']['tmp_name'], $target_path);
			}
			else {
				$supplier_logo=$image1;
			}
			
			$this->admin_model->update_profile_page($admin_id,$email,$name,$address,$mobile_no,$office_phone_no,$notes,$supplier_logo, $supplier_type_id,$contact_person_name, $desig_of_contact,$sub_admin_type_id  );
			
			$data['admin_user'] = $this->admin_model->get_details_of_admin_user($admin_id);
			$this->load->view('admin/user_profile',$data);
		}
	}
	public function hotel_room_pricing($sup_hotel_id, $sup_room_details_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('hotel_room_inventory')== 1)
		{
			$searchDate= $this->input->post('keyword');
			if($searchDate != ''){
				$keyword = date("Y-m-d", strtotime($searchDate));
			} else {
				$keyword = '';
			}
			$config = array();
			$config["base_url"]		= base_url() . "index.php/index/hotel_room_pricing/".$this->uri->segment(3).'/'.$this->uri->segment(4);
			$config["total_rows"]	= $this->admin_model->record_count_room_inventory($sup_room_details_id);
			$config["per_page"]		= 10;
			$config["uri_segment"]	= 5;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

			$data['result'] = $this->admin_model->get_room_pricing_details_list($sup_hotel_id, $sup_room_details_id,$config["per_page"], $page, $keyword);
			$data["links"] = $this->pagination->create_links();
			$data['room_invenotory']=$this->admin_model->get_hotel_room_details($sup_hotel_id);
			$this->load->view('hotel/view_hotel_pricing',$data);
		} else {
			redirect('index/access_denied');
		}
	}
	public function hotel_room_inventory($sup_hotel_id, $sup_room_details_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('hotel_room_inventory')== 1)
		{
			$searchDate= $this->input->post('keyword');
			if($searchDate != ''){
				$keyword = date("Y-m-d", strtotime($searchDate));
			} else {
				$keyword = '';
			}
			$config = array();
			$config["base_url"]		= base_url() . "index.php/index/hotel_room_inventory/".$this->uri->segment(3).'/'.$this->uri->segment(4);
			$config["total_rows"]	= $this->admin_model->record_count_room_inventory($sup_room_details_id);
			$config["per_page"]		= 10;
			$config["uri_segment"]	= 5;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

			$data['result'] = $this->admin_model->get_room_pricing_details_list($sup_hotel_id, $sup_room_details_id,$config["per_page"], $page, $keyword);
			$data["links"] = $this->pagination->create_links();
			$data['room_invenotory']=$this->admin_model->get_hotel_room_details($sup_hotel_id);
			$this->load->view('hotel/view_hotel_inventory',$data);
		} else {
			redirect('index/access_denied');
		}
	}
	public function add_hotel_room_pricing($sup_hotel_id, $sup_room_details_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('hotel_pricing')==1) {
				$data['room_invenotory']=$this->admin_model->get_hotel_room_details($sup_hotel_id);
				$this->load->view('hotel/add_hotel_pricing',$data);
		} else {
			redirect('index/access_denied');
		}
	}
	public function add_hotel_room_inventory($sup_hotel_id, $sup_room_details_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
		redirect('index/login', 'refresh'); 
		}
		if($this->session->userdata('hotel_room_inventory')==1) {
				$data['room_invenotory']=$this->admin_model->get_hotel_room_details($sup_hotel_id);
				$this->load->view('hotel/add_hotel_inventory',$data);
		} else {
			redirect('index/access_denied');
		}
	}
	public function add_room_pricing($sup_hotel_id, $sup_room_details_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		
			$date_from = $this->input->post('sd');
			  $fromda = explode("-",$date_from);
		      $room_avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
			  	
			  $date_to = $this->input->post('ed');
			  $toda = explode("-",$date_to);
			  $room_avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
				
			
			
			$dates = $this->input->post('dates'); 
			//print '<pre />';print_r($dates);exit;
			$weekday = $this->input->post('weekday');
			$avilable_rooms = $this->input->post('avilable_rooms'); 
			 $cost_price = $this->input->post('cost_price'); 
			$markup = $this->input->post('markup'); 
			$selling_price = $this->input->post('selling_price'); 
			$discount_rule = $this->input->post('discount_rule'); 
			$final_price = $this->input->post('final_price');
			$check_markup =$this->input->post('check_markup');
			$check_discount =$this->input->post('check_discount');
			
			$this->admin_model->add_room_pricing($room_avail_date_from,$room_avail_date_to,$avilable_rooms,$cost_price,$markup,$selling_price,$discount_rule,$final_price,$dates,$weekday,$check_markup,$check_discount,$sup_hotel_id, $sup_room_details_id,$check_markup,$check_discount);
			
			redirect('index/hotel_room_pricing/'.$sup_hotel_id.'/'.$sup_room_details_id, 'refresh'); 
	}
	public function add_room_inventory($sup_hotel_id, $sup_room_details_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre />';print_r($_POST);exit;
		
			$date_from = $this->input->post('sd');
			  $fromda = explode("-",$date_from);
		      $room_avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
			  	
			  $date_to = $this->input->post('ed');
			  $toda = explode("-",$date_to);
			  $room_avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
				
			
			
			$dates = $this->input->post('dates'); 
			//print '<pre />';print_r($dates);exit;
			$weekday = $this->input->post('weekday');
			$avilable_rooms = $this->input->post('avilable_rooms'); 	
			$this->admin_model->add_room_inventory($room_avail_date_from,$room_avail_date_to,$avilable_rooms,$dates,$weekday,$sup_hotel_id, $sup_room_details_id);
			
			redirect('index/hotel_room_inventory/'.$sup_hotel_id.'/'.$sup_room_details_id, 'refresh'); 
	}
	  public function edit_hotel_room_price_details($sup_hotel_id,$sup_room_details_id,$id)
	  {
	  
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		  }
			if($this->session->userdata('hotel_pricing')==1) {
				
		  $data['room_invenotory']=$this->admin_model->get_hotel_room_details($sup_hotel_id);
		  $data['hotel_room_details'] = $this->admin_model->get_room_price_details($id);
		  $this->load->view('hotel/edit_hotel_room_price',$data);
		  } else {
			redirect('index/access_denied');
		}
		 
	  }
	  public function edit_hotel_room_inventory_details($sup_hotel_id,$sup_room_details_id,$id)
	  {
		   if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		  }
			if($this->session->userdata('hotel_room_inventory')==1) {
				
		  $data['room_invenotory']=$this->admin_model->get_hotel_room_details($sup_hotel_id);
		  $data['hotel_room_details'] = $this->admin_model->get_room_price_details($id);
		  $this->load->view('hotel/edit_hotel_inventory',$data);
		  } else {
			redirect('index/access_denied');
		}
		 
	  }
	   public function update_room_price($sup_hotel_id,$sup_room_details_id,$id)
	  {
		 if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		  // print '<pre />';print_r($_POST);exit;
		   
			
			$date_from = $this->input->post('sd');
			  $fromda = explode("-",$date_from);
		      $room_avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
			  	
			  $date_to = $this->input->post('ed');
			  $toda = explode("-",$date_to);
			  $room_avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
			
			$avail_dates = $this->input->post('dates');
				
			//print '<pre />';print_r($avail_dates);exit;
			$weekday = $this->input->post('weekday');
			$avilable_rooms = $this->input->post('avilable_rooms'); 
			$cost_price = $this->input->post('cost_price'); 
			$markup = $this->input->post('markup'); 
			$selling_price = $this->input->post('selling_price'); 
			$discount_rule = $this->input->post('discount_rule'); 
			$final_price = $this->input->post('final_price');
			$avail_datess = $this->input->post('datess');
			$check_markup = $this->input->post('check_markup');
			$check_discount = $this->input->post('check_discount');
			
			
			$this->admin_model->update_room_price($room_avail_date_from,$room_avail_date_to,$avail_dates,$avail_datess,$weekday,$avilable_rooms,$cost_price,$markup,$selling_price,$discount_rule,$final_price,$check_markup,$check_discount,$sup_hotel_id,$sup_room_details_id,$id);
			
			redirect('index/edit_hotel_room_price_details/'.$sup_hotel_id.'/'.$sup_room_details_id.'/'.$id,'refresh');
		
	  }
	  public function update_room_inventory($sup_hotel_id,$sup_room_details_id,$id)
	  {
		 if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		   }
		  // print '<pre />';print_r($_POST);exit;
		   
			
			$date_from = $this->input->post('sd');
			  $fromda = explode("-",$date_from);
		      $room_avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
			  	
			  $date_to = $this->input->post('ed');
			  $toda = explode("-",$date_to);
			  $room_avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
			
			$avail_dates = $this->input->post('dates');
				
			//print '<pre />';print_r($avail_dates);exit;
			$weekday = $this->input->post('weekday');
			$avilable_rooms = $this->input->post('avilable_rooms'); 
			$avail_datess = $this->input->post('datess');
			
			
			$this->admin_model->update_room_inventory($room_avail_date_from,$room_avail_date_to,$avail_dates,$avail_datess,$weekday,$avilable_rooms,$sup_hotel_id,$sup_room_details_id,$id);
			
			redirect('index/edit_hotel_room_inventory_details/'.$sup_hotel_id.'/'.$sup_room_details_id.'/'.$id,'refresh');
		
	  }
	  public function update_hotel_room_price_details($sup_hotel_id,$sup_room_details_id,$id,$status)
	  {
		  if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		  }
		  if($this->session->userdata('hotel_pricing')==1)
		  {
			  $this->admin_model->update_hotel_room_price_details($id,$status);
			  redirect('index/hotel_room_pricing/'.$sup_hotel_id.'/'.$sup_room_details_id,'refresh');
		 }else {
			redirect('index/access_denied');
		}
	  }
	  public function update_hotel_room_inventory_details($sup_hotel_id,$sup_room_details_id,$id,$status)
	  {
		  if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		  }
		  if($this->session->userdata('hotel_room_inventory')== 1)
		  {
			  $this->admin_model->update_hotel_room_price_details($id,$status);
			  redirect('index/hotel_room_inventory/'.$sup_hotel_id.'/'.$sup_room_details_id,'refresh');
		 }else {
			redirect('index/access_denied');
		}
	  }
	  public function hotel_refresh()
	 {
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $data['result_view']=$this->admin_model->hotel_refresh();
		redirect('index/dashboard');
	}
	
	
	
	
}