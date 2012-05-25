<?php

class Logout extends CI_Controller {
	function __construct(){
		parent::__construct();
		//Enter your Application Id and Application Secret keys
        $config['appId'] = '335118356499155';
        $config['secret'] = 'd72553f11126e29528008cd83a376ac2';

        //Do you want cookies enabled?
        $config['cookie'] = true;
        
        //load Facebook php-sdk library with $config[] options
        $this->load->library('facebook', $config);
	}
	
	//Log user out, destroy their session, redirect to login
	function index(){
		try{
			$fbme = $this->facebook->api('/me');
		} catch (FacebookApiException $e){
				error_log($e);
		}
		
		if(isset($fbme) && $fbme){
			$auth_config['next'] = base_url();
			$logoutUrl = $this->facebook->getLogoutUrl($auth_config);
			$this->session->sess_destroy();
			redirect($logoutUrl, 'refresh');
		}
		else{
			$logoutUrl = base_url();
			redirect($logoutUrl, 'refresh');
		}
	}
}

?>