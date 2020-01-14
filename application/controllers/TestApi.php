<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestApi extends CI_Controller{
	public function index(){
		$this->load->view('test_api');
	}
}
