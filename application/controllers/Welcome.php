<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$this->data['hasil'] = $this->model_crud->getUser('bismit_fmipa');
		$this->load->view('welcome_message', $this->data);
	}
	public function form_input(){
		$this->load->view('form-input');
	}
	public function insert(){
		$id = $_POST['NIM'];
		$nama = $_POST['Nama'];
		$bidang = $_POST['Bidang'];
		$dept= $_POST['Departemen'];
		$data = array('NIM' => $id, 'Nama' => $nama, 'Bidang' => $bidang, 'Departemen' => $dept);
		$add = $this->model_crud->addData('bismit_fmipa',$data);
		if($add > 0){
			echo redirect('welcome/index');
		} else {
			echo 'Update Failed';
		}
	}

	public function delete($id){
		$hapus = $this->model_crud->deleteData('bismit_fmipa',$id);
		if($hapus > 0){
			echo redirect('welcome/index');
		} else {
			echo 'Update Failed';
		}
	}

	public function form_edit($id){
		$this->data['dataEdit'] = $this->model_crud->dataEdit('bismit_fmipa',$id);
		$this->load->view('form-edit',$this->data);
	}

	public function update($id){
		$id = $_POST['NIM'];
		$nama = $_POST['Nama'];
		$bidang = $_POST['Bidang'];
		$dept = $_POST['Departemen'];
		$data = array('NIM' => $id, 'Nama' => $nama, 'Bidang' => $Bidang, 'Departemen' => $dept);
		$edit = $this->model_crud->editData('bismit_fmipa',$data,$id);
		if($edit > 0){
			echo redirect('welcome/index');
		} else {
			echo 'Update Failed';
		}
	}
}
