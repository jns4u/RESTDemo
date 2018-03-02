<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deletepost extends CI_Controller {

	public function index($post_id = NULL)
	{	$this->load->model('FetchdataMdl');
		
		$post_id = $this->uri->segment(2);
		$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : 0;
		$return = $this->FetchdataMdl->delete_data($post_id);

		if ($return == true) {
			$data['message'] = 'Success! Post Deleted';
		} else {
			$data['message'] = 'Failed!';
		}
		
		$this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode($data)); 

	    $this->load->view('deletepost');    
	}
}
