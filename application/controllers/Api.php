<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

class Api extends RestController{
	public function __construct() {
		parent::__construct();
		$this->load->model('Api_model');
	}

	public function index_get()
	{
		$id				= $this->get('id');
		$nama			= $this->get('nama');
		$email			= $this->get('email');
		$create_from	= $this->get('create_from');
		$create_to		= $this->get('create_to');
		$role			= $this->get('role');
		if ($id) {
			$result = $this->Api_model->getid($id);

			if ($result) {
				$response = array();
				foreach ($result as $key) {
					$response[] = $key;
				}
			} else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal dihapus'
				);
			}
		}elseif ($nama) {
			$result = $this->Api_model->getnama($nama);

			if ($result) {
				$response = array();
				foreach ($result as $key) {
					$response[] = $key;
				}
			} else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal dihapus'
				);
			}
		}elseif ($email) {
			$result = $this->Api_model->getemail($email);

			if ($result) {
				$response = array();
				foreach ($result as $key) {
					$response[] = $key;
				}
			} else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal dihapus'
				);
			}
		}elseif ($create_from and $create_to) {
			$result = $this->Api_model->getcreate_at($create_from,$create_to);

			if ($result) {
				$response = array();
				foreach ($result as $key) {
					$response[] = $key;
				}
			} else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal dihapus'
				);
			}
		}elseif ($role) {
			if (($role=='Admin Super') or ($role=='Admin') or ($role=='User')) {
				$result = $this->Api_model->getrole($role);

				if ($result) {
					$response = array();
					foreach ($result as $key) {
						$response[] = $key;
					}
				} else {
					$response = array(
						'status'	=> 'gagal',
						'message'	=> 'data gagal dihapus'
					);
				}
			}else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal dihapus'
				);
			}
		}elseif (!$id and !$nama and !$email and !$role and !$create_from and !$create_to) {
			$result = $this->Api_model->get();

			if ($result) {
				$response = array();
				foreach ($result as $key) {
					$response[] = $key;
				}
			} else {
				$response = array(
					'status'	=> 'gagal',
					'message'	=> 'data gagal ditampilkan'
				);
			}
		}else {
			$response = array(
				'status'	=> 'gagal',
				'message'	=> 'data gagal ditampilkan'
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
