<?php
class Welcome extends MY_Controller
{

	function __construct(){
		if($this->authentication->check_logged_in()){
			if($this->authentication->is_admin()){
				redirect(ADMIN_INDEX_URL);
			}
		}
		$this->load->model('welcome_model');
	}
	
	function index($start = ''){


		$offset  = 0;
		 // HOME_PAGE_LIMIT_PRODUCTS
		$records  = $this->welcome_model->get_products($offset);
		$data['content'] = 'home';
		$data['offset'] = $offset+HOME_PAGE_LIMIT_PRODUCTS;
		$data['products'] = $records;
		$this->load->view('common/front/front_template',$data);
	}

	/*
	*get new products
	*/
	function get_home_products(){
		if ($this->input->is_ajax_request()) {
			$offset = $this->input->post('offset');
			$offset = ($offset > 0)? $offset :0;

			$render_data['products']  = $this->welcome_model->get_products($offset);
			$total_products = $this->welcome_model->numrows;
			$data['offset'] = $offset +HOME_PAGE_LIMIT_PRODUCTS;
			$data['next_page'] = false;
			if($total_products > $data['offset']){
				$data['next_page'] = true;
			}

			$data['html'] = $this->parser->parse('pr_block_new',$render_data,true);
			echo json_encode($data);die;
		}
	}
}