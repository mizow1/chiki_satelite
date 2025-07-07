<?php
require_once(MODEL.'front/controller/AbstractControllerClass.php');
require_once(MODEL.'front/uranai/ApiModelClass.php');
class TopAction extends AbstractController{
	function __construct($controller='',$action='',&$session_data=array(),$device=''){
		$this->init($controller,$action,$session_data,$device);
	}
	function Execute($get_data=array(),&$session_data=array()){


		$disp_array = array();

		$api = new ApiModel();
		$disp_array = $api->getApi(API_TOP);
		
		$this->display($disp_array, 'preview_rakuten');
	}
	function PostExecute($get_data=array(),$post_data=array(),$file_data=array(),&$session_data=array()){

	}
}
