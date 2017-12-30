<?php

Class FetchdataMdl extends CI_Model{
	public function __construct(){		
		require_once 'vendor/autoload.php'; // change path as needed
	}

	public function get_agora_pulse(){
		// Get access token using Graph API and enter token value here. Sample token I used to test end point given below. Due to privacy this will be useful for short time.
		
		$access_token = 'EAACEdEose0cBADi3LMqxBD0kA9GIPGeM3tP6HdCZC4tpxeNDDlwzLX8RWP9sePZB1DuNJZBN4UaGYlZBUaws86ZBlH3lOCtFK5gdKK4kn1ZCsD0si2Dz3g4nT1ZBZC3U8kuHAx2Ha9E7Bqkss9O0RocjUb7fHCkGjaoqvbEYMfxCsqDKxA2KOL6ZBgbsY7Xk1c6nrvGAVZC8ZBl1wZDZD';

		$token_url = "https://graph.facebook.com/208708862489818/feed?access_token=$access_token&fields=attachments{media},created_time,comments,likes{name,username,link},description,name";

		try{
			$Obj = file_get_contents($token_url);
		}catch(error $e){
			$Obj = $e;
		}

		return $Obj;
	}
	
	public function insert_data($json_data) {			
		$this->db->insert('agorapulse', $json_data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function fetch_data() {			
		$sql = "select * from (select * from `agorapulse` where `comments_counts` > 0 ORDER BY `id` DESC) AS `sqone` INNER JOIN (select `post_id`,Count(`post_id`) AS `postCount` from `agorapulse`GROUP BY `post_id`) AS `sqtwo` ON `sqone`.`post_id`=`sqtwo`.`post_id` where `sqtwo`.`postCount`>1";		
		return $this->db->query($sql);
	}

	public function delete_data($id) {			
		$sql = "delete from `agorapulse` where `post_id`='".$id."'";
		
		if($this->db->query($sql)){
			return true;
		}else{
			return false;
		}		
	}

	public function update_data($id,$title,$description) {			
		$sql = "update `agorapulse` set `title` = '".$title."',`description` = '".$description."' where `post_id`='".$id."'";
		
		if($this->db->query($sql)){
			return true;
		}else{
			return false;
		}		
	}

	public function search_post($searchstr){
		$sql = "select * from `agorapulse` where `description` like '%".$searchstr."%'";		
		return $this->db->query($sql);
	}
}

?>