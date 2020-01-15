<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestApi extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Api_model');
	}


	public function index(){
		$this->load->view('test_api');
		$result['data'] = $this->Api_model->get();
		json_encode($result);
	}
	public function tampil()
	{
		$result = $this->Api_model->get();
		echo json_encode($result);
	}
	public function tampilid()
	{
		$id		= $this->input->post('id');
		$result = $this->Api_model->getid($id);
		echo json_encode($result);
	}
	public function tambah()
	{

		$nama		= $this->input->post('nama');
		$email		= $this->input->post('email');
		$password	= $this->input->post('password');
		$role		= $this->input->post('role');
		$result = $this->Api_model->post($nama, $email, $password, $role);
		json_encode($result);
	}
	public function edit()
	{
		$id		= $this->input->post('id');
		$nama		= $this->input->post('nama');
		$email		= $this->input->post('email');
		$password	= $this->input->post('password');
		$role		= $this->input->post('role');
		$result = $this->Api_model->put($id, $nama, $email, $password, $role);
		json_encode($result);
	}
	public function hapus()
	{
		$id = $this->input->post('id');
		$result = $this->Api_model->delete($id);
		json_encode($result);
	}
}
