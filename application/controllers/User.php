<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('m_user');
	}

	//CRUD USER
	function index()
	{
		$data['admin'] = $this->db->query("select * from admin")->result();
		$this->load->view('admin/header');
		$this->load->view('user/user', $data);
		$this->load->view('admin/footer');
	}

	function user_add()
	{
		$this->load->view('admin/header');
		$this->load->view('user/user_add');
		$this->load->view('admin/footer');
	}

	function user_add_act()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() != false) {
			$data = array(
				'admin_nama' => $nama,
				'admin_username' => $username,
				'admin_password' => md5($password)
			);
			$this->m_user->insert_data($data, 'admin');

			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
				Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" area-label="Close">
				<span area-hidden="trus">&times;</span></button></div>');
			redirect(base_url() . 'user/');
		} else {
			$this->load->view('admin/header');
			$this->load->view('user/user_add');
			$this->load->view('admin/footer');
		}
	}

	function user_update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() != false) {
			$data = array(
				'admin_nama' => $nama,
				'admin_username' => $username,
				'admin_password' => md5($password)
			);
			$where = array (
				'admin_id' => $id
			);
			$this->m_user->update_data($where, $data, 'admin');
			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
				Data Berhasil Di Udpate<button type="button" class="close" data-dismiss="alert" area-label="Close">
				<span area-hidden="trus">&times;</span></button></div>');
			redirect(base_url() . 'user/');
		}
	}

	function user_hapus($id)
	{
		$where = array(
			'admin_id' => $id
		);
		$this->m_user->delete_data($where, 'admin');
		$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
			Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" area-label="Close">
			<span area-hidden="trus">&times;</span></button></div>');
		redirect(base_url() . 'user/');
	}

}