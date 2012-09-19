<?php
class I18n_model extends CI_Model {

	public function __construct()
	{
		
	}
/*
	
	public function set_value($name, $value){
		
		if(get_value($name) != false){
		
			$settings = array(
				'$name' => $name,
				'$value' => $value
			);
			
			$this->db->insert('tw_settings', $settings);
		}
		else {
			update_value($name, $value);
			
		}
	}
*/

	public function get_value($key, $args = array()){
		
		$locale = "de_CH";
		
		$this->db->select($locale.' AS "locale"');
		
		
		
		$query = $this->db->get_where('i18n', array("key" => $key), 1);
		
		if($query->num_rows() > 0){
			$row = $query->row();
			$string = $row->locale;
			if(is_array($args)){
				for($i = 1; $i <= sizeof($args); $i++){
					$string = str_replace('%'.$i,$args[$i-1],$string);
				}
			}
			return $string;
		}
		else {
			return '[missing: '.$key.' in '.$locale.']';
		}
		
		
	}
	
	/*

	public function update_value($name, $value){
	
		$query = $this->db->update_where('tw_settings', array("name" => $name), 1);
		
		
		if(get_value($name) != false){
			$this->db->update('tw_settings',array('value' => $value), array('name' => $name));
		}
		else {
			set_value($name,$value);
		}
	}
*/

}
