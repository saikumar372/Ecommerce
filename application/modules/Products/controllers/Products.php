<?php
class Products extends MY_Controller
{

	function __construct(){
        $access = check_access('admin');
        if($access['status'] == 0){
            $this->prepare_flashmessage($access['message'], $access['status_code']);
            redirect(SITEURL);
        }
		// print_r(1);die;
	}
	
	function index(){
		$data['ajaxrequest'] = array(
        'url' => URL_AJAX_GET_CATEGORIES,
        'disablesorting' => '0,3',
        );
		$data['content']         	= 'categories';
		$data['css_js_files']	 	= array('data_tables');
		$data['activemenu']			= 'categories';
        $data['pagetitle']          = 'Categories';
        
        $this->load->view('common/admin/admin_template',$data);
	}

	function ajax_get_categories(){
		if ($this->input->is_ajax_request()) {

             $data = array();
            $no = $_POST['start'];

            $conditions = array();
            //adding columns for where and order conditions; 
            $columns 	= array('category_name');
            $query      = "SELECT  * from categories where category_id != ''";
            $records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('category_id'=>'desc'));
            if (!empty($records)) {

            	foreach ($records as $key => $value) {
            		$no++;
            		$row = array();

            		$row[]		= $value->category_id;
            		$row[]		= $value->category_name;
            		$checked 	= '';
            		$class = 'badge danger';
                    if ($value->status == 'Active') {
                        $checked = ' checked';
                        $class = 'badge success';    
                    }
                    $row[] = '<span class="'.$class.'">'.$value->status.'</span>';
                    $dta = '';
                    $dta .= '<form action="'.URL_EDIT_CATEGORY.'" method="POST">';
                    $dta .= '<input type="hidden" name="category_id" value="'.$value->category_id.'">';
                    $dta .= '<button type="submit" name="edit_cat" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
                    $dta .= '</form>';
                    $dta .= '</span>';
                    
                    
                    $row[] = $dta;
                    $data[] =$row;
            	}
            }

        }

		$output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->base_model->numrows,
            "recordsFiltered" => $this->base_model->numrows,
            "data" => $data,
            );
        // print_r($output);die;

		echo json_encode($output);
	}

	/*
    *   add category
    *
    */
    function add_cat(){
        if(isset($_POST['add_category'])){
    	

            // $msg='';
            // $status=0;
            
            $this->form_validation->set_rules('cat_name', 'Category Name', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == true){

                $data['category_name']      =  $_POST['cat_name'];
                $data['status']            =  $_POST['status'];
                if($this->base_model->insertCreation($data,'categories')){
                    $msg = 'Successfully inserted data';
                    $status = 0;
                }else{
                    $msg = 'Something went wrong!';
                    $status = 1;
                }
                if($msg != ''){
                    $this->prepare_flashmessage($msg, $status);    
                }
            }
            redirect(URL_CATEGORIES_INDEX,'refresh');
            
        }

        $data['css_js_files']  = array('form_validation','datepicker');
        $data['pagetitle']     = 'Add Category';
        $data['activemenu']      = "category";
        $data['content']          = 'add_category';
        $this->load->view('common/admin/admin_template',$data);
    }

    /*
    *
    *edit_category
    */

    function edit_cat(){

    	 if(isset($_POST['edit_category'])){
            
            $cat_id = $this->input->post('cat_id');
            $this->form_validation->set_rules('cat_name', 'Category Name', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if($this->form_validation->run() == true){

                $data['category_name']      =  $_POST['cat_name'];
                $data['status']            =  $_POST['status'];
                if($this->base_model->update_operation($data,'categories',array('category_id' => $cat_id))){
                    $msg = 'Successfully updated data';
                    $status = 0;
                }else{
                    $msg = 'Something went wrong!';
                    $status = 1;
                }
                if($msg != ''){
                    $this->prepare_flashmessage($msg, $status);    
                }
            }
            redirect(URL_CATEGORIES_INDEX,'refresh');
        }
        if(isset($_POST['edit_cat'])){
            $cat_id   = $this->input->post('category_id');
            if($cat_id > 0){
                $records = $this->base_model->fetch_records('categories',array('category_id' =>$cat_id));

                $data['records']    =$records[0];
            }else{
                redirect(URL_CATEGORIES_INDEX,'refresh');
            }

        }else{
            redirect(URL_CATEGORIES_INDEX,'refresh');
        }

        $data['css_js_files']  = array('form_validation','datepicker');
        $data['pagetitle']     = 'Edit Category';
        $data['activemenu']      = "categories";
        $data['content']          = 'edit_categories';
        $data['index_page']          = URL_CATEGORIES_INDEX;
        $this->load->view('common/admin/admin_template',$data);
    }


    /*
    *
    *to get products listing
    */

    function products_index(){
 		$data['ajaxrequest'] = array(
        'url' => URL_AJAX_GET_PRODUCTS,
        'disablesorting' => '0,6',
        );
		$data['content']         	= 'products';
		$data['css_js_files']	 	= array('data_tables');
		$data['activemenu']			= 'products';
        $data['pagetitle']          = 'Products';
        
        $this->load->view('common/admin/admin_template',$data);   	
    }
    /*
    *Ajax products list
    */

    function ajax_get_products(){
    	if ($this->input->is_ajax_request()) {

             $data = array();
            $no = $_POST['start'];

            $conditions = array();
            //adding columns for where and order conditions; 
            $columns 	= array('product_name');
            $query      = "SELECT p.*,c.category_name FROM products as  p LEFT JOIN categories c on p.prodct_category_id = c.category_id where p.product_id !=''";
            $records = $this->base_model->get_datatables($query, 'customnew', $conditions, $columns, array('p.product_id'=>'desc'));
            
            if (!empty($records)) {

            	foreach ($records as $key => $value) {
            		$no++;
            		$row = array();
            		$image = IMG_DEFAULT;
                    if ($value->product_image != '' && file_exists(PRODUCT_IMG_UPLOAD_PATH_URL.$value->product_image)) {
                        $image = PRODUCT_IMG_PATH.$value->product_image;
                    }

            		$row[]		= $value->product_id;
                    $row[]      = '<span><img src="'.$image.'" class="img-responsive center-block"/></span>';
            		$row[]		= $value->product_name;
            		$row[]		= $value->category_name;
            		$row[]		= $value->product_cost;
            		$checked 	= '';
            		$class = 'badge danger';
                    if ($value->status == 'Active') {
                        $checked = ' checked';
                        $class = 'badge success';    
                    }
                    $row[] = '<span class="'.$class.'">'.$value->status.'</span>';
                    $dta = '';
                    $dta .= '<form action="'.URL_EDIT_PRODUCTS.'" method="POST">';
                    $dta .= '<input type="hidden" name="product_id" value="'.$value->product_id.'">';
                    $dta .= '<button type="submit" name="edit_product" class="'.CLASS_EDIT_BTN.'"><i class="'.CLASS_ICON_EDIT.'" ></i></button>';
                    $dta .= '</form>';
                    $dta .= '</span>';
                    
                    
                    $row[] = $dta;
                    $data[] =$row;
            	}
            }

        }

		$output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->base_model->numrows,
            "recordsFiltered" => $this->base_model->numrows,
            "data" => $data,
            );
        // print_r($output);die;

		echo json_encode($output);
    }

    /*
    *Add products
    */
    function add_product(){
    	if(isset($_POST['add_products'])){
    	

            // $msg='';
            // $status=0;
            
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('product_cost', 'Product Cost', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required|max_length[100]');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == true){

                $data['product_name']     	 =  $_POST['product_name'];
                $data['product_cost']      	 =  $_POST['product_cost'];
                $data['product_discount']    =  $_POST['product_discount'];
                $data['product_description'] =  $_POST['description'];
                $data['status']              =  $_POST['status'];
                $data['prodct_category_id']  =  $_POST['product_category'];
                $data['added_date']          =  date('Y-m-d H:i:s');
                $data['modified_date']       =  date('Y-m-d H:i:s');

                if($this->base_model->insertCreation($data,'products')){
                    $msg = 'Successfully inserted data';
                    $status = 0;
                     //uploading event image
                    $insert_id   =$this->db->insert_id();
                    if ($insert_id > 0 && count($_FILES) > 0) {
                        if ($_FILES['image']['name'] != '' && $_FILES['image']['error'] != 4) {
                            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                            $file_name = 'product_'.$insert_id.time().'.'.$ext;
                            $config['upload_path']         = PRODUCT_IMG_UPLOAD_PATH_URL;
                            $config['allowed_types']     = ALLOWED_TYPES;
                            if(!is_dir(PRODUCT_IMG_UPLOAD_PATH_URL)){
                                mkdir(PRODUCT_IMG_UPLOAD_PATH_URL);
                            }

                            //deleted existing image
                            if($insert_id > 0){
                               $records = $this->base_model->fetch_records('products',array('product_id' =>$insert_id));
                               if(is_file(PRODUCT_IMG_UPLOAD_PATH_URL.$records[0]->product_image)){
                                    unlink(PRODUCT_IMG_UPLOAD_PATH_URL.$records[0]->product_image);
                                } 

                            }
                            

                            $config['file_name']  = $file_name;
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('image')) {
                                $data['product_image'] = $file_name;
                                $where['product_id'] = $insert_id;

                                $this->base_model->update_operation($data,'products',$where);
                            }else{
                                $msg.= ', but unable upload the image';
                            }
                        }
                    }


                }else{
                    $msg = 'Something went wrong!';
                    $status = 1;
                }
                if($msg != ''){
                    $this->prepare_flashmessage($msg, $status);    
                }
            }
            redirect(URL_PRODUCTS_INDEX,'refresh');
            
        }

        $category = $this->base_model->fetch_records('categories',array('status' =>'Active'));
 		$data['css_js_files']  = array('form_validation','datepicker');
        $data['pagetitle']     = 'Add Product';
        $data['activemenu']      = "products";
        $data['content']          = 'add_products';
        $data['category']          = $category;

        $this->load->view('common/admin/admin_template',$data);   	
    }

    /*
    *
    * edit products
    */

    function edit_product(){

  		if(isset($_POST['update_products'])){
  			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('product_cost', 'Product Cost', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required|max_length[100]');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == true){

            	$product_id =  $_POST['product_id'];
                $data['product_name']     	 =  $_POST['product_name'];
                $data['product_cost']      	 =  $_POST['product_cost'];
                $data['product_discount']    =  $_POST['product_discount'];
                $data['product_description'] =  $_POST['description'];
                $data['status']              =  $_POST['status'];
                $data['prodct_category_id']  =  $_POST['product_category'];
                $data['added_date']          =  date('Y-m-d H:i:s');
                $data['modified_date']       =  date('Y-m-d H:i:s');

                if($product_id > 0){
	                if($this->base_model->update_operation($data,'products',array('product_id'=>$product_id))){
	                    $msg = 'Successfully updated data';
	                    $status = 0;
	                     //uploading event image
	                    
	                    if ($product_id > 0 && count($_FILES) > 0) {
	                        if ($_FILES['image']['name'] != '' && $_FILES['image']['error'] != 4) {
	                            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
	                            $file_name = 'product_'.$product_id.time().'.'.$ext;
	                            $config['upload_path']         = PRODUCT_IMG_UPLOAD_PATH_URL;
	                            $config['allowed_types']     = ALLOWED_TYPES;
	                            if(!is_dir(PRODUCT_IMG_UPLOAD_PATH_URL)){
	                                mkdir(PRODUCT_IMG_UPLOAD_PATH_URL);
	                            }

	                            //deleted existing image
	                            if($product_id > 0){
	                               $records = $this->base_model->fetch_records('products',array('product_id' =>$product_id));
	                               if(is_file(PRODUCT_IMG_UPLOAD_PATH_URL.$records[0]->product_image)){
	                                    unlink(PRODUCT_IMG_UPLOAD_PATH_URL.$records[0]->product_image);
	                                } 

	                            }
	                            $config['min_width']  = 150;
                                $config['min_height'] = 150;
                                
                                $config['max_width']  = 250;
                                $config['max_height'] = 250;

	                            $config['file_name']  = $file_name;
	                            $this->load->library('upload', $config);
	                            $this->upload->initialize($config);
	                            if ($this->upload->do_upload('image')) {
	                                $data['product_image'] = $file_name;
	                                $where['product_id'] = $product_id;

	                                $this->base_model->update_operation($data,'products',$where);
	                            }else{
	                                $msg.= ', but unable upload the image';
	                            }
	                        }
	                    }


	                }else{
	                    $msg = 'Something went wrong!';
	                    $status = 1;
	                }
	                if($msg != ''){
	                    $this->prepare_flashmessage($msg, $status);    
	                }
                }
            }
  		}
  		if(isset($_POST['edit_product'])){
            $product_id   = $this->input->post('product_id');
            if($product_id > 0){
                $records = $this->base_model->fetch_records('products',array('product_id' =>$product_id));

                $data['records']    =$records[0];
            }else{
                redirect(URL_PRODUCTS_INDEX,'refresh');
            }

        }else{
            redirect(URL_PRODUCTS_INDEX,'refresh');
        }
        $category = $this->base_model->fetch_records('categories',array('status' =>'Active'));
        $data['css_js_files']  = array('form_validation','datepicker');
        $data['pagetitle']     = 'Edit Products';
        $data['activemenu']      = "products";
        $data['content']          = 'edit_products';
        $data['category']          = $category;
        // $data['index_page']          = URL_CATEGORIES_INDEX;
        $this->load->view('common/admin/admin_template',$data);  	
    }
}