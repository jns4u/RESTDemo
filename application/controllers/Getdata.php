<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getdata extends CI_Controller {

	public function index()
	{	$this->load->model('FetchdataMdl');		

		$data = $this->FetchdataMdl->fetch_data();
		
		$this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode($data->result_array())); 

	    $this->load->view('getdata');    
	}
}
