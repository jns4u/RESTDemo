<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchposts extends CI_Controller {
	public function __construct(){
		parent::__construct();
		session_start();
	}

	public function index()	
	{	$this->load->model('FetchdataMdl');		
		$search_str = isset($_GET['search_str']) ? $_GET['search_str'] : NULL;
		$data = $this->FetchdataMdl->search_post($search_str);
		
		$this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode($data->result_array())); 

	    $this->load->view('searchposts'); 
	}
}
