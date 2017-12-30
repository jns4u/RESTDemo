<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fetchdata extends CI_Controller {

	public function __construct(){
		parent::__construct();
		session_start();
		require_once 'vendor/autoload.php';
	}

	public function index(){
		$this->load->model('FetchdataMdl');
		$agorafeed = json_decode($this->FetchdataMdl->get_agora_pulse());
		
		foreach ($agorafeed->data as $agrofeedval) {
			if(isset($agrofeedval->comments)){
				$agoradata['comments_counts'] = count($agrofeedval->comments->data);
			}else{
				$agoradata['comments_counts'] = 0;
			}			
			$agoradata['post_id'] = $agrofeedval->id;
			$agoradata['page_id'] = 208708862489818;
			$agoradata['title'] = $agrofeedval->name;
			$agoradata['description'] = $agrofeedval->description;
			$agoradata['image_url'] = $agrofeedval->attachments->data[0]->media->image->src;
			$agoradata['likes'] = '';
					
			$agoradata['published_date'] = $agrofeedval->created_time;

			$return = $this->FetchdataMdl->insert_data($agoradata);
		}
		
		if ($return == true) {
			$data['message'] = 'Success! Check table entries';
		} else {
			$data['message'] = 'Failed! Get token using API Explorer or probe';
		}

		$this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode($data));

		$this->load->view('fetchdata',$data);
	}
}

?>
