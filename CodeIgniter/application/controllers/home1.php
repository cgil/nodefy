<?php

class home1 extends CI_Controller{
	//Check if an access token exists in the database, store it if it does not
	function index(){
		//Enter your Application Id and Application Secret keys
        $config['appId'] = '335118356499155';
        $config['secret'] = 'd72553f11126e29528008cd83a376ac2';

        //Do you want cookies enabled?
        $config['cookie'] = true;
		//load Facebook php-sdk library with $config[] options
		$this->load->library('facebook', $config);
		$this->load->view('header');
		$this->load->view('scopebox');
		}