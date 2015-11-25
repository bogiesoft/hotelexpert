<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
    { 
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('form_validation');
	  	$this->load->database(); 
		$this->load->library("pagination");
		$this->load->model('index_model');
		$this->load->library('session');
	}
	
	public function index()
	{		
		$this->load->view('home_index');
	}
	public function login()
	{
		if($_POST)
		{
		$this->form_validation->set_rules('email', 'Email-Id', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ( $this->form_validation->run() !== false ) {
		  $email		= $this->input->post('email');
		  $password		= $this->input->post('password');

		$login = $this->index_model->login($email,$password);
		if ($login !== false ) {
						
                 				
					 $sessionUserInfo = array( 
					 'name' 	=> $login[0]->name,
					 'email' => $login[0]->email,
					 'user_id' => $login[0]->user_id,
					 'logged_in'   => true
					 );	
					 $this->session->set_userdata($sessionUserInfo);	
					//print_r($_SESSION);exit;
						//print_r($_SESSION);
						echo "User logged In";
						
	
				 }else{
					//redirect('index/registration', 'refresh'); 
					echo "invalid User";
	
				 }
			 }
		}
		//$this->load->view('home_index');
	}
	
	public function logout()
	{
		if($_POST)
		{
		 $this->session->unset_userdata('name');
		 $this->session->unset_userdata('user_id');
		 $this->session->unset_userdata('logged_in');
		 echo "logged_out";
		}
		//$this->load->view('home_index');
	}
	
	public function registration()
	 { 
		$name		= $this->input->post('name');
		$lname		= $this->input->post('lname');
		$email	= $this->input->post('email');
		$password	= $this->input->post('password');
		$token	= $this->input->post('token');

			if($_POST)
			{
				$id = $this->index_model->add_user();
				if($id == true){
				
				
					if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.245')
				 {
				  $urlLocal = '<a href="'.WEB_URL.'index/verify_email/?id='.$id.'&token='.$token.'">'.WEB_URL.'index/verify_email/?id='.$id.'&token='.$token.'</a>';
				 } else {
				  $urlLocal = '<a href="'.WEB_URL.'index/verify_email/?id='.$id.'&token='.$token.'">'.WEB_URL.'index/verify_email/?id='.$id.'&token='.$token.'</a>';
				  }

			$config['protocol'] = 'smtp';
		
			$config['smtp_host'] = 'mail.provab.com';
			$config['smtp_port'] = 25;
			$config['smtp_user'] = 'christin@provab.com';
			$config['smtp_pass'] = 'provab123';

			$config['wordwrap'] = FALSE;
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$msg='<html>';
			$msg.='<body>';
			$msg.='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
			$msg.='<tr><td>Dear  <b>'.ucfirst($name).'</b>,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Greetings From goghoom.com,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Many thanks for registering with us. Please click the below link to activate your account. <br> '.$urlLocal.' </td></tr>
			<tr><td> <b>Your  login details are given below</b> </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Username : '.$email.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Password : '.$password.' </td></tr>
			<tr><td>&nbsp;</td></tr>';
			$msg.='
			<tr><td>&nbsp;</td></tr>
			<tr><td> Thanks & Regards,</td></tr>
			<tr><td><b> Team - goghoom.com </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
			
			$from = 'bookings@goghoom.com';
			$sub = 'User Registration - goghoom.com';
			$this->email->from($from,'goghoom');
			$to = strip_tags($email);
			$this->email->to($to);
			$this->email->subject($sub);
			$this->email->message($msg);


				if($this->email->send())
				{
						echo "1"; exit;
				}
				else
				{
					show_error($this->email->print_debugger());
				}
				
			}
				
			}
		
	 }
	 public function check_email()
	 {
	 $this->load->library('form_validation');
	 if($_POST)
		{
			$email	= $this->input->post('email');
			$test = $this->form_validation->set_rules('email', 'Email', 'valid_email');
			//print_r($test);exit;
			if ($this->form_validation->run() == FALSE)
			{
				echo "2";
				exit;
			}
			else
			{
				$result = $this->index_model->email_exists($email);

				if($result->num_rows() > 0)
				{ 
					echo "1";
					exit;
				}
		
			}
		}
	 }
	
	 public function fb_login()
    {
	   
		$base_url = $this->config->item('base_url');     

	    parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
        $this->load->library('facebook');
        $user = null;
        $user_profile = null;
 
        // See if there is a user from a cookie
        $user = $this->facebook->getUser();

		if ($user) {
		  try {
			// Proceed knowing you have a logged in user who's authenticated.
			$user_profile = $this->facebook->api('/me');
			$data['user_profile'] = $user_profile;
			$sessionUserInfo = array( 
					 'name' 	=> $data['user_profile']['name'],
					 'email' => $data['user_profile']['email'],
					 'user_id' => $data['user_profile']['id'],
					 'logged_in'   => true
					 );	
			$this->session->set_userdata($sessionUserInfo);
			
		  } catch (FacebookApiException $e) {
			error_log($e);
			$user = null;
		  }
		}

		// Login or logout url will be needed depending on current user state.
		if ($user) {

		$logoutUrl = $this->facebook->getLogoutUrl(array( 'next' => ('http://localhost/crs/index.php/index/fb_logout') ));
		$data['logoutUrl']=   $logoutUrl;
		$data['user'] = $user;
		$user_profile = $this->facebook->api('/me');
		$data['user_profile'] = $user_profile;
		/**echo "<a href='$data[logoutUrl]'>Logout</a>";
		echo "<h3>You</h3>"; 
		echo "<img src='https://graph.facebook.com/$data[user]/picture'>";

		echo "<h3>Your User Object (/me)</h3>";
		echo "<pre>"; print_r( $data['user_profile'] ); echo "</pre>" ;**/
		} else {

		  $loginUrl = $this->facebook->getLoginUrl( array(
				'display'   => 'popup',
				'next'      => 'http://localhost/crs?loginsucc=1',
				'cancel_url'=> 'http://localhost/crs?cancel=1',
				'req_perms' => 'email,user_birthday',
			));
			
		$data['loginUrl']=   $loginUrl;
		echo "<div>";
		echo "Login using OAuth 2.0 handled by the PHP SDK:"; 
		echo "<a href='$data[loginUrl]' id='facebook'>Login with Facebook</a>";
		echo "</div>";
		//header('Location: '.$loginUrl);
		}

    }
	
	public function fb_logout()
	{
		$this->load->library('facebook');
		setcookie('fbs_'.$this->facebook->getAppId(), '', time()-100, '/', 'domain.com');
		session_destroy();
		redirect('/', 'refresh');
		
	}
	 
	 public function forgot_password()
	 {
	 $this->load->library('form_validation');
	 if($_POST)
		{
				$email = $this->input->post('email');
				
				$this->form_validation->set_rules('email', 'Email', 'valid_email');
				if ($this->form_validation->run() == FALSE)
				{
					echo "1";
					exit;
				}
				else
				{
					$Query="select * from  users  where email ='".$email."'"; 
					$query=$this->db->query($Query);
					
					if ($query->num_rows() > 0)
					{
						$result =  $query->row();
						$name = $result->name;
						$email = $result->email;
					
						$psw =  substr(md5(rand(0, 1000000)), 0, 15);
						$res = $this->index_model->reset_psw($email,$psw);
						
						
						if($res == TRUE){
						
							$config['protocol'] = 'smtp';

							$config['smtp_host'] = 'mail.provab.com';
							$config['smtp_port'] = 25;
							$config['smtp_user'] = 'christin@provab.com';
							$config['smtp_pass'] = 'provab123';

							$config['wordwrap'] = FALSE;
							$config['mailtype'] = 'html';
							$config['charset'] = 'utf-8';
							$config['crlf'] = "\r\n";
							$config['newline'] = "\r\n";
							$this->load->library('email', $config);
							$this->email->set_newline("\r\n");
							$msg='<html>';
							$msg.='<body>';
							$msg.='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
							$msg.='<tr><td>Dear  <b>'.ucfirst($name).'</b>,</td></tr>';
							$msg.= '<tr><td>&nbsp;</td></tr>';
							$msg.='<tr><td>Greetings From gogoom.com,</td></tr>';
							$msg.= '<tr><td>&nbsp;</td></tr>';
							$msg.='<tr><td>Forget Password Details : </td></tr>
							<tr><td> <b>Your  login details are given below</b> </td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td> Username : '.$email.' </td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td> Password : '.$psw.' </td></tr>
							<tr><td>&nbsp;</td></tr>';
							$msg.='
							<tr><td>&nbsp;</td></tr>
							<tr><td> Thanks & Regards,</td></tr>
							<tr><td><b> Team - goghoom.com </b></td></tr>';
							$msg.='<tr><td>&nbsp;</td></tr>';
							$msg.='</table></body></html>';
							//echo $msg;
							$from = 'admin@goghoom.com';
							$sub = 'Forget Password - goghoom.com ';
							$this->email->from($from,'goghoom');
							$to = strip_tags($email);
							$this->email->to($to);
							$this->email->subject($sub);
							$this->email->message($msg);


							if($this->email->send())
							{
							echo "3"; exit;
							}
							else
							{
							show_error($this->email->print_debugger());
							}
							
						}
					}else{
						echo "2";
						exit;
					}
				}
		}
		$this->load->view('forgot_password');
	 }
	 
	 public function verify_email(){
		 $id = $this->input->get('id');
		 $token = $this->input->get('token');
		 if(isset($id) && isset($token)){
			$result = $this->index_model->email_verify($id,$token);
			if($result == true){
			redirect('/', 'refresh');
			}
		 }
		 $this->load->view('home_index');
	 }
	 public function user_profile()
	 {
		$id = $this->session->userdata('user_id');
		$user_info = $this->index_model->user_info($id);
		$data['user_info'] = $user_info;
		 $this->load->view('account/user_profile',$data);
	 }
	 
	  public function edit_profile()
	 {
		
		$id = $this->session->userdata('user_id');
		$user_info = $this->index_model->user_info($id);
		$data['user_info'] = $user_info;
		if($_POST){
				
				$image = $this->input->post('image');
				$name = $this->input->post('name');
				$lname = $this->input->post('lname');
				$email = $this->input->post('email');
				$adress = $this->input->post('address');
				$no = $this->input->post('mobile_no');
				$fax = $this->input->post('fax');
				$city = $this->input->post('city');
				$zip = $this->input->post('zip_code');
				$user_logo ='';

				if(isset($_FILES['user_logo']['name']) && $_FILES['user_logo']['name'] != '')
				{
				$user_logo  	= $_FILES['user_logo']['name']; 
				$target_path1 = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/crs/user_logos';
				$target_path = 	rtrim($target_path1,'/').'/'.basename($_FILES['user_logo']['name']);
				$move1 		 =  move_uploaded_file($_FILES['user_logo']['tmp_name'], $target_path);
				}
				else {
				$user_logo=$image;
				}
				$result = $this->index_model->update_user($id,$name,$lname,$email,$adress,$city,$zip,$no,$user_logo,$fax);
				if($result == true){
					redirect('index/user_profile', 'refresh');
				}
				
			
		}
		
		$this->load->view('account/edit_profile',$data);
	 }
	 
	  public function account_overview()
	 {
		 $this->load->view('account/account_overview');
	 }
	  public function view_orders($user_id)
	 {
	 
		// $id = $this->session->userdata('user_id');
		$user_info = $this->index_model->user_info($user_id);
		
		$car_pay_data = $this->Car_Model->get_all_car_pay_details_by_userid($user_id);

		$data['user_info'] = $user_info;
		$data['result_view'] = array();
		$data['result_view'] = $car_pay_data;
		
		// echo '<pre>';print_r($data);echo '</pre>';
			// exit;
		$this->load->view('account/view_orders',$data);
	 }
	 
	 public function change_password()
	 {
		$id = $this->session->userdata('user_id');
		$new_psw = $this->input->post('new_psw');
		$con_psw = $this->input->post('con_psw');
		$result = $this->index_model->change_password($id);
		if($result == true){
				echo "1"; exit;
		}
	 }
	 
	 public function check_psw()
	 {
		$id = $this->input->get('id');
		$old_psw = $this->input->post('old_psw');
		$result = $this->index_model->check_password($id);
		if($result != true){
		echo "1"; exit;
		}
	 }
	 
	 public function fetch_city()
	 {
			$fetch_city = $this->index_model->fetch_city();
			$data['fetch_city'] = $fetch_city;
			echo "<select name='cities' id='cities'>";
			for($p=0;$p <count($fetch_city);$p++)
			{
			echo "<option value=".$fetch_city[$p]['id'].">".$fetch_city[$p]['city_name']."</option>";
			}
			 echo "</select>";
	 }
	 public function slide_panel_open_close()
	 {
		// echo "dsfsg";exit;
		 $this->load->view('slide_panel');
	 }
	 public function my_booking_page()
	 {
		  if($this->session->userdata('logged_in'))
	 	  {
		 	$this->load->view('account/my_booking_page');
		  }else {
			  redirect('hotel/index','refresh');
		  }
	 }
 

}