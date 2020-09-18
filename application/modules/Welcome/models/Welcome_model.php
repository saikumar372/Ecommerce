<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model{

		function get_products($offset){
			// $this->db->select('*');
			// $this->db->where('status','Active');
			// $this->db->order_by('product_id','desc');
			// $records = $this->db->get('products')->result_array();
			// return $records;

			$limit = HOME_PAGE_LIMIT_PRODUCTS;
        
       		$query = "SELECT * from products  where status='Active' ";
        
        	$products = $this->db->query($query)->result();
        	$this->numrows = $this->db->affected_rows();
	        if (count($products)>=0) {
	            $query  = $query." LIMIT ".$offset.", ".$limit." ";
	            $products = $this->db->query($query);
	        }
	        $products =  $products->result_array();
	        return $products;

		}

}
?>