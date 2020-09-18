<?php
class MY_Controller extends MX_Controller
{

	function __construct()
    {
        parent::__construct();
    }
    public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
    function prepare_flashmessage($msg,$type = 2)
	{
		$returnmsg='';
		switch($type){
			case 0: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-success'>
											<a  class='close' data-dismiss='alert'>&times;</a>
											<strong>Success!</strong> ". $msg."
										</div>
									<!-- </div> -->";
				break;
			case 1: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-danger'>
											<a  class='close' data-dismiss='alert'>&times;</a>
											<strong>Error!</strong> ". $msg."
										</div>
									<!-- </div> -->";
				break;
			case 2: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-info'>
											<a  class='close' data-dismiss='alert'>&times;</a>
											<strong>Info!</strong> ". $msg."
										</div>
									<!-- </div> -->";
				break;
			case 3: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-warning'>
											<a   class='close' data-dismiss='alert'>&times;</a>
											<strong>Warning!</strong> ". $msg."
										</div>
									<!-- </div> -->";
				break;
		}
		$this->session->set_flashdata("message",$returnmsg);
	}
}
?>