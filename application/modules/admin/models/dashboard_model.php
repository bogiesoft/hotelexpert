<?php
class dashboard_model extends CI_Model {

    public function getrooms_and_extraprod($product_Id,$supplier_type)
	   {
		   if($supplier_type=="1"){
			    $table = "sup_hotel_extra_products";
				$field = "sup_hotel_id";
			   }
		   if($supplier_type=="2"){
			    $table = "sup_villa_extra_products";
				$field = "sup_villa_id";
			   }
		  
		   $this->db->select('*');
		   $this->db->from($table);
		   $this->db->where($field,$product_Id);
		   $query = $this->db->get();
		   if($query->num_rows() ==''){
				return '';			
			}else{
			 
			return $query->result();				
			}
	   }
	  
	  public function update_hotel_image_desc($id,$image_desc)
	   {
		    $data =array(
				'image_desc' 	=> $image_desc
		         );
				//print '<pre />';print_r($data);exit;
			 $where = "sup_hotel_images_id	 = $id";
		     $this->db->update('sup_hotel_images',$data,$where);
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
	   

	   
}
?>