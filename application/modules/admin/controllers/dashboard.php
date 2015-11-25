<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
		$this->load->model('dashboard_model');
	  	$this->load->database(); 
        $this->load->library("pagination");
	}
	function getrooms_and_extraprod($product_Id,$supplier_type)
	{
		//echo $supplier_type_Id;exit;
		$products_name ='';
		if($product_Id != 'select') {
	    $products_name	= $this->dashboard_model->getrooms_and_extraprod($product_Id,$supplier_type);
		}
		//print'<pre/>';print_r($sup_name);exit;
			 
		echo  '<select onchange="get_extra_product_price(this.value)" name="supplier_id"  style="width: 209px; line-height:30px; padding:3px; border-radius:5px; height:30px; border:1px solid #ccc" required >
                  <option value="select">Select Extra Products</option>';
              if(!empty($products_name)) {    
                 foreach($products_name as $product_name){
                  
                     echo  '<option value="'.$product_name->price.'">'.$product_name->product_name.'</option>';
                   
                    }
			  }
                    
                   
            echo  '</select>';exit;
		
		
		
		
	}
	
	public function update_hotel_image_desc($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$hotel_id = $this->input->post('hotel_id');
		$image_desc = $this->input->post('image_desc_'.$id);
		$this->dashboard_model->update_hotel_image_desc($id,$image_desc);
		redirect('index/add_hotel_images/'.$hotel_id, 'refresh'); 
	}

}