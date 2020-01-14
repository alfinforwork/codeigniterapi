<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

class Api extends RestController{
	public function __construct() {
		parent::__construct();
		$this->load->model('Api_model');
	}

	public function index_get(){
			$result = $this->Api_model->get();
			if ($result) {
				$response = array();
				foreach ($result as $key) {
					$response = array(
						'id'		=>$key->id,
						'nama'		=>$key->nama,
						'email'		=>$key->email,
						'password'	=>$key->password,
						'create_at'	=>$key->create_at,
						'role'		=>$key->role
					);
				}
			} else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal dihapus'
				);
			}

		$this->response($response);
	}
	
	public function index_post(){
		$nama		= $this->post('nama');
		$email		= $this->post('email');
		$password	= $this->post('password');
		$role		= $this->post('role');
		if ($nama and $email and $password and $role) {
			$result = $this->Api_model->post($nama,$email,$password,$role);
			if ($result) {
				$response = array(
					'status'	=>'sukses',
					'message'	=>'data berhasil disimpan'
				);
			}else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal disimpan'
				);
			}
		}else {
			$response = array(
				'status'	=> 'gagal',
				'message'	=> 'data gagal disimpan'
			);
		}
		$this->response($response);
	}
	public function index_put(){
		$id			= $this->put('id');
		$nama		= $this->put('nama');
		$email		= $this->put('email');
		$password	= $this->put('password');
		$role		= $this->put('role');
		if (!$id) {
			$response = array(
				'status'	=> 'gagal',
				'message'	=> 'id tidak ada'
			);
		} elseif (!$nama) {
			$response = array(
				'status'	=> 'gagal',
				'message'	=> 'nama tidak ada'
			);
		} elseif (!$email) {
			$response = array(
				'status'	=> 'gagal',
				'message'	=> 'email tidak ada'
			);
		} elseif (!$password) {
			$response = array(
				'status'	=> 'gagal',
				'message'	=> 'password tidak ada'
			);
		} elseif (!$role) {
			$response = array(
				'status'	=> 'gagal',
				'message'	=> 'role tidak ada'
			);
		} elseif ($id and $nama and $email and $password and $role) {
			$result = $this->Api_model->put($id, $nama, $email, $password, $role);
			if ($result) {
				$response = array(
					'status'	=> 'sukses',
					'message'	=> 'data berhasil disimpan'
				);
			} else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal disimpan'
				);
			}
		}
		$this->response($response);
	}
	public function index_delete(){
		$id			= $this->delete('id');
		if (!$id) {
			$response = array(
				'status'	=> 'gagal',
				'message'	=> 'data gagal dihapus'
			);
		}else {
			$result = $this->Api_model->delete($id);
			if ($result) {
				$response = array(
					'status'	=> 'sukses',
					'message'	=> 'data berhasil dihapus'
				);
			} else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal dihapus'
				);
			}
		}

		$this->response($response);
	}
}
