<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatepost extends CI_Controller {
	public function __construct(){
		parent::__construct();
		session_start();
	}

	public function index()	
	{	$this->load->model('FetchdataMdl');		
		$post_id = isset($_GET['post_id']) ? $_GET['post_id'] : 0;
		$title = isset($_GET['title']) ? $_GET['title'] : NULL;
		$description = isset($_GET['description']) ? $_GET['description'] : NULL;		
		$return = $this->FetchdataMdl->update_data($post_id,$title,$description);

		if ($return == true) {
			$data['message'] = 'Success! Post Updated';
		} else {
			$data['message'] = 'Failed!';
		}
		
		$this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode($data)); 

	    $this->load->view('updatepost');    
	}
}
