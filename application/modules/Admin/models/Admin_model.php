<?php
class Admin_model extends CI_Model
{

	function get_modules_count(){

		//get categories count

		$data = array();
        
        $query="select * from categories ";
        $cat  = $this->db->query($query)->result();
        $data['cat'] = count($cat);

        //products count 

        $query="select * from products ";
        $products  = $this->db->query($query)->result();
        $data['products'] = count($products);

        return $data;
	} 

}
?>