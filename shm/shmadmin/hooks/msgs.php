<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msgs {

	public function __construct()
	{
		$this->CI =&get_instance();
		$this->CI->load->model('msgs');
	}

	public function get_msgs_num()
	{
		return $this->CI->msgs->get_msgs_num();
	}


}

/* End of file msgs.php */
/* Location: .//home/http/shmms/adminer/hooks/msgs.php */
