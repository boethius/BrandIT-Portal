<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_portal_id')){

	function get_portal_id(){
	  	
        $ci=& get_instance();
        $ci->load->database(); 
	
	  	$remote_host = $ci->input->server('SERVER_NAME');
	  	log_message('debug', "remote host {$remote_host}");
	  	
	  	//$remote_host = "portalseite.ch.amphora.sui-inter.net";
	  	
	  	$remote_host_array = explode($remote_host,'.');
	  	
	  	if($remote_host_array[0] == "www"){
	  		$domain = "{$remote_host_array[1]}.{$remote_host_array[1]}";
	  	}
	  	else {
	  		$domain = $remote_host;
	  	}
	  	
        $sql = "SELECT
        			portal_id
        		FROM
        			domains"; 
        $query = $ci->db->get_where("domains",array("domain_name" => $domain));
        $row = $query->row_array();
        $id = $row['portal_id'];
       
        
        if(sizeof($row) == 0){
        	$id = 0;
        }
        
        return $id;
   }
   
	function get_domain(){
        $ci=& get_instance();
        $ci->load->database(); 
	
	  	$remote_host = $ci->input->server('SERVER_NAME');
	  	log_message('debug', "remote host {$remote_host}");
	  	
	  	//$remote_host = "portalseite.ch.amphora.sui-inter.net";
	  	
	  	$remote_host_array = explode($remote_host,'.');
	  	
	  	if($remote_host_array[0] == "www"){
	  		$domain = "{$remote_host_array[1]}.{$remote_host_array[1]}";
	  	}
	  	else {
	  		$domain = $remote_host;
	  	}
	  	
	  	return $domain;
	
	}
	
	function get_portal_property(){
	  	
        $ci=& get_instance();
        $ci->load->database(); 
	
	  	$remote_host = $ci->input->server('SERVER_NAME');
	  	log_message('debug', "remote host {$remote_host}");
	  	
	  	//$remote_host = "portalseite.ch.amphora.sui-inter.net";
	  	
	  	$remote_host_array = explode($remote_host,'.');
	  	
	  	if($remote_host_array[0] == "www"){
	  		$domain = "{$remote_host_array[1]}.{$remote_host_array[1]}";
	  	}
	  	else {
	  		$domain = $remote_host;
	  	}
	  	
        $sql = "SELECT
        			name
        		FROM
        			domains"; 
        $query = $ci->db->get_where("domains",array("domain_name" => $domain));
        $row = $query->row_array();
       
        return $row;
   }


}

?>