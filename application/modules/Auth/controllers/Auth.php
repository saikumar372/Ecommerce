<?php
class Auth extends MY_Controller
{

	function __construct(){
		$this->load->model('auth_model');	
	}
		
	function login(){
		if($this->authentication->check_logged_in()){
	        redirect(SITEURL);
	       }
		if(isset($_POST['login'])){
			$this->form_validation->set_rules('username', 'User Name', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');
            if(!$this->form_validation->run()){
		        $status = '1';
		        $msg = strip_tags(validation_errors());
		        $this->prepare_flashmessage($msg, $status);
		        redirect(LOGIN);
		      }
			
			$email = $this->input->post('username');

      		$password = base64_encode($this->input->post('pass')); 
			$checkUser = $this->auth_model->check_user($email,$password);
			
			if($checkUser['success'] == 0 ){
		          $msg = $checkUser['message'];
		          $status = 1;
		          $this->prepare_flashmessage($msg, $status);
		          redirect(LOGIN);
		      }else{
		          $msg = $checkUser['message'];
		          $status = 0;
		          $this->authentication->setSessionValue($checkUser['data']);
		          
		          $this->prepare_flashmessage($msg, $status);
		          redirect(SITEURL);
		      }

		}

		$data['content'] ='login';
		$this->load->view('common/front/front_template',$data);
	}
	/*
	* user registration
	*/

	function register(){
		if($this->authentication->check_logged_in()){
	          redirect(SITEURL);
	      }
		if(isset($_POST['register'])){
			$this->form_validation->set_rules('username', 'User Name', 'required');
			$this->form_validation->set_rules('usermail', 'Email', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if(!$this->form_validation->run()){
		        $status = '1';
		        $msg = strip_tags(validation_errors());
		        $this->prepare_flashmessage($msg, $status);
		        redirect(REGISTER);
		      }

			$email = $this->input->post('usermail');
			
			//checking duplicate
			$duplicate_response = $this->auth_model->checkDuplicate('user_email',$email,'users');


			if(!$duplicate_response['success']){
				$status = '1';
		        $msg = $duplicate_response['message'];
		        $this->prepare_flashmessage($msg, $status);
		        redirect(REGISTER);
			}

			$data  = array(
				'user_name' 	=> $this->input->post('username'),
				'user_email' 	=> $this->input->post('usermail'),
				'password'		=> base64_encode($this->input->post('pass')),
				'status'		=> 'Active',
				'added_at'		=> date('Y-m-d H:i:s'),
				'modified_at'	=> date('Y-m-d H:i:s')

			);
			

			//insert operation 
			if($this->base_model->insertCreation($data,'users')){
				  $group_data['user_id'] 	= $this->db->insert_id();
				  $group_data['group_id'] = 2;
				  $this->base_model->insertCreation($group_data,'user_groups');
		          $msg = 'Registered succesfully';
		          $status = 0;
		      }else{
		          $msg = 'Something went wrong! Please try again later';
		          $status = 1;
		      }
		          $this->prepare_flashmessage($msg, $status);
		          redirect(REGISTER);

		}

		$data['content'] ='register';
		$this->load->view('common/front/front_template',$data);
	}
	/*
	* logout
	*/
	function logout(){
      if(!$this->authentication->check_logged_in()){
          redirect(SITEURL);
      }
      $this->authentication->logout();
      $this->prepare_flashmessage('Logout Successfully',0);
      redirect(SITEURL);
    }
}