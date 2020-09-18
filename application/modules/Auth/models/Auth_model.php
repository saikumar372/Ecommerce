<?php
class Auth_Model extends CI_Model  
{

	public function check_user($email,$password){
		$this->db->select('*');
        $this->db->where('user_email',$email);
        $this->db->where('password',$password);
        $this->db->where('status','Active');
        $res = $this->db->get('users')->row_array();
        
        if(empty($res)){
            $result['success'] =0;
            $result['message'] ='Invalid login details';
        }else{
            $result['success'] =1;
            $result['message'] ='Login Succesfully';
            $result['data']    =$res;

        }
        return $result;

	}
    /*
    * check duplicate emails
    */
    function checkDuplicate($field, $value ,$table)
    {
        $this->db->select('*');
        $this->db->where($field,$value);
        $res = $this->db->get($table)->row_array();
        if(empty($res)){
            $result['success'] =1;
        }else{
            $result['success'] =0;
            $result['message'] ='Email already exists. Please try with different email.';
        }
        return $result;
    }
}