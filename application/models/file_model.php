<?php
class File_model extends CI_Model {
	
	public function __construct()
	{
		
	}
	
	function resizeImage ($datatype, $filename, $image_width, $image_height){
		
		$file_type = $datatype;
		$prefix = "./uploads/";
		
		/*
		echo '--------------------- file_model 1';
		echo '<pre>';
		print_r($file_type);
		echo '</pre>';
		*/
		
		if(!$file_type || $file_type != "image"){
			
			return array('success' => false, 'error' => "File doesnt exist or isnt a image");
			
		}
		
		$this->load->library('image_lib');
		
		$target_width = 135;
		$target_height = 135;
		
		$current_ratio = $image_width / $image_height;
		$target_ratio =  $target_width/$target_height;
		$config['source_image'] = $prefix.$filename;
		
		$config['maintain_ratio'] = True;
		
		
		if($current_ratio > $target_ratio){
			
			//$config['height'] = $target_height;
			//$config['width'] = $target_height * $current_ratio;
			$config['width'] = $target_width;
			
			$this->image_lib->initialize($config);
			
			if(!$this->image_lib->resize()){
				return array('success' => false, 'error' => "There was an error while resizeing this Image");
			}
			
			$config['width'] = $target_width;
			
			$this->image_lib->initialize($config);
			
			if($this->image_lib->crop()){
				return array('success' =>true);
			}else{
				return array('success' => false, 'error' => "There was an error cropping this image");
			}
			
			
		}else{
			
			$config['width'] = $target_width;
			//$config['height'] = $target_height;
			
			$this->image_lib->initialize($config);
			
			if($this->image_lib->resize()){
				return array('success' => true);
			}else{
				return array('success' =>false , 'error' => "there was an error resizing this image");
			}
			
		}
		
		
	}
	
	
}

?>