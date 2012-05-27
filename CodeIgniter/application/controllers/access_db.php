<?php
/*	Query the database
 */
 
class Access_db extends CI_Controller{
	//Check if an access token exists in the database, store it if it does not
	function Store_access_token(){
		//Encryption library
		$this->load->library('encrypt');
		
		//Enter your Application Id and Application Secret keys
        $config['appId'] = '335118356499155';
        $config['secret'] = 'd72553f11126e29528008cd83a376ac2';

        //Do you want cookies enabled?
        $config['cookie'] = true;
		//load Facebook php-sdk library with $config[] options
		$this->load->library('facebook', $config);
		
		$access_token = $this->facebook->getAccessToken();
		
		//Encrypt Access token
		$encrypted_access_token = $this->encrypt->encode($access_token);
		
		//Query db and store access token if unique
		$this->load->model('Store_access_token_model');
		$this->Store_access_token_model->store_access_tok($encrypted_access_token);
		
		//Redirect to home page
		redirect('/scope/','refresh');
	}
	 
	 
}



?>