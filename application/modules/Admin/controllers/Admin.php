<?php
class Admin extends MY_Controller
{

	function __construct(){
		$access = check_access('admin');
        if($access['status'] == 0){
            $this->prepare_flashmessage($access['message'], $access['status_code']);
            redirect(SITEURL);
        }

        $this->load->model('admin_model');
	}
	
	function index(){
		
		//get modules count
		$data['modules_count'] 	= $this->admin_model->get_modules_count();
		$data['content'] = 'admin_dashboard';
		$this->load->view('common/admin/admin_template',$data);
	}	
}