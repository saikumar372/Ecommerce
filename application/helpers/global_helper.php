<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sendEmail'))
{
	function sendEmail($from = NULL, $to = NULL, $sub = NULL, $msg = NULL, $cc = NULL, $bcc = NULL, $attachment = NULL, $multiuser = NULL)
	{
		$CI =& get_instance();
		$CI->load->library('email');
		$CI->email->clear();

		$config = Array(
						'protocol' 	=> 'smtp',//smtp
						'smtp_host' => $CI->config->item('smtp_host'),
						'smtp_port' => $CI->config->item('smtp_port'),
						'smtp_user' => $CI->config->item('smtp_user'),
						'smtp_pass' => $CI->config->item('smtp_pass'),
						'charset' 	=> 'utf-8',
						'mailtype' 	=> 'html',
						'newline' 	=> "\r\n",
						'wordwrap' 	=> TRUE
					);
		$CI->email->initialize($config);

		$CI->email->from($from,'Sample Project');

		$CI->email->reply_to($from);

		$CI->email->to($to);
		$CI->email->subject($sub);
		$CI->email->message($msg);
	}
}
if ( ! function_exists('required_symbol'))
{
	/**
	 * [required_symbol description]
	 * @return [type] [description]
	 */
	function required_symbol()
	{
		return '&nbsp;<font color="red">*</font>';
	}
}
if ( ! function_exists('check_access'))
{
	/**
	 * [check_access description]
	 * @param  string $type [description]
	 * @return [type]       [description]
	 */
	function check_access( $type = 'admin')
	{
		$CI	=&get_instance();
		
		if (!$CI->authentication->check_logged_in())
		{
			$res['message'] = 'Please login to continue';
			$res['status_code'] = 2;
			$res['status'] = 0;
			return $res;
		}
		elseif ($type == 'admin')
		{
			if (!$CI->authentication->is_admin())
			{
				$res['message'] = 'No Entry';
				$res['status_code'] = 2;
				$res['status'] = 0;
			}else{
				$res['status'] = 1;
			}
				return $res;

		}
		elseif ($type == 'user')
		{
			if (!$CI->authentication->is_member())
			{
				$CI->prepare_flashmessage('Please login to continue', 2);
				redirect(SITEURL);
			}
		}
	}
}
?>