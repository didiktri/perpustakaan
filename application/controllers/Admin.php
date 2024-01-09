<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url() . 'welcome?pesan=belumlogin');
		}
	}

	function index()
	{
		$data['transaksi'] = $this->db->query("select * from transaksi,buku,anggota where transaksi_mobil=buku_id and transaksi_kostumer=anggota_id")->result();
		$data['anggota'] = $this->db->query("select * from anggota order by anggota_id desc limit 5")->result();
		$data['buku'] = $this->db->query("select * from buku order by buku_id desc limit 5")->result();
		$this->load->view('admin/header');
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'welcome?pesan=logout');
	}

	function ganti_password()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/ganti_password');
		$this->load->view('admin/footer');
	}

	function ganti_password_act()
	{
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');
		$this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass', 'Ulangi Password Baru', 'required');

		if ($this->form_validation->run() != false) {
			$data = array(
				'admin_password' => md5($pass_baru)
			);
			$w = array(
				'admin_id' => $this->session->userdata('id')
			);
			$this->m_rental->update_data($w, $data, 'admin');
			redirect(base_url() . 'admin/ganti_password?pesan=berhasil');
		} else {
			$this->load->view('admin/header');
			$this->load->view('admin/ganti_password');
			$this->load->view('admin/footer');
		}
	}

	//CRUD DATA BUKU
	function buku()
	{
		$data['buku'] = $this->m_rental->get_data('buku')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/buku', $data);
		$this->load->view('admin/footer');
	}

	function buku_add()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/buku_add');
		$this->load->view('admin/footer');
	}

	function buku_add_act()
	{
		$judulbuku = $this->input->post('judulbuku');
		$pengarang = $this->input->post('pengarang');
		$penerbit = $this->input->post('penerbit');
		$tahun = $this->input->post('tahun');
		$jumlah = $this->input->post('jumlah');
		$status = $this->input->post('status');
		$this->form_validation->set_rules('judulbuku', 'Judul
			Buku', 'required');
		$this->form_validation->set_rules('status', 'Status
			Buku', 'required');
		if ($this->form_validation->run() != false) {
			$data = array(
				'judul_buku' => $judulbuku,
				'pengarang' => $pengarang,
				'penerbit' => $penerbit,
				'tahun_terbit' => $tahun,
				//'jumlah_buku' => $jumlah,
				'buku_status' => $status
			);
			$this->m_rental->insert_data($data, 'buku');

			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
				Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" area-label="Close">
				<span area-hidden="trus">&times;</span></button></div>');
			redirect(base_url() . 'admin/buku');
		} else {
			$this->load->view('admin/header');
			$this->load->view('admin/buku_add');
			$this->load->view('admin/footer');
		}
	}

	function buku_edit($id)
	{
		$where = array(
			'buku_id' => $id
		);
		$data['buku'] = $this->m_rental->edit_data($where, 'buku')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/buku_edit', $data);
		$this->load->view('admin/footer');
	}

	function buku_update()
	{
		$id = $this->input->post('id');
		$judulbuku = $this->input->post('judulbuku');
		$pengarang = $this->input->post('pengarang');
		$penerbit = $this->input->post('penerbit');
		$tahun = $this->input->post('tahun');
		$jumlah = $this->input->post('jumlah');
		$status = $this->input->post('status');
		$this->form_validation->set_rules('judulbuku', 'Judul
			Buku', 'required');
		$this->form_validation->set_rules('status', 'Status
			Buku', 'required');
		if ($this->form_validation->run() != false) {
			$where = array(
				'buku_id' => $id
			);
			$data = array(
				'judul_buku' => $judulbuku,
				'pengarang' => $pengarang,
				'penerbit' => $penerbit,
				'tahun_terbit' => $tahun,
				'jumlah_buku' => $jumlah,
				'buku_status' => $status
			);
			$this->m_rental->update_data($where, $data, 'buku');
			$this->session->set_flashdata('massage', '<div class="alert alert-warning" role="alert">
				Data Berhasil Di Update<button type="button" class="close" data-dismiss="alert" area-label="Close">
				<span area-hidden="trus">&times;</span></button></div>');
			redirect(base_url() . 'admin/buku');
		} else {
			$data['buku'] = $this->m_rental->edit_data($where, 'buku')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/buku_edit', $data);
			$this->load->view('admin/footer');
		}
	}

	function buku_hapus($id)
	{
		$where = array(
			'buku_id' => $id
		);
		$this->m_rental->delete_data($where, 'buku');
		$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
			Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" area-label="Close">
			<span area-hidden="trus">&times;</span></button></div>');
		redirect(base_url() . 'admin/buku');
	}
	// AKHIR CRUD MOBIL

	//CRUD DATA ANGGOTA
	function anggota()
	{
		$data['anggota'] = $this->m_rental->get_data('anggota')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/anggota/anggota', $data);
		$this->load->view('admin/footer');
	}

	function anggota_add()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/anggota/anggota_add');
		$this->load->view('admin/footer');
	}

	function anggota_add_act()
	{
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$hp = $this->input->post('hp');
		$ktp = $this->input->post('ktp');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		if ($this->form_validation->run() != false) {
			$data = array(
				'anggota_nama' => $nama,
				'anggota_jk' => $jk,
				'anggota_alamat' => $alamat,
				'anggota_hp' => $hp,
				'anggota_ktp' => $ktp
			);
			$this->m_rental->insert_data($data, 'anggota');

			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
				Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" area-label="Close">
				<span area-hidden="trus">&times;</span></button></div>');
			redirect(base_url() . 'admin/anggota/anggota');
		} else {
			$this->load->view('admin/header');
			$this->load->view('admin/anggota/anngota_add');
			$this->load->view('admin/footer');
		}
	}

	function anggota_edit($id)
	{
		$where = array(
			'anggota_id' => $id
		);
		$data['anggota'] = $this->m_rental->edit_data($where, 'anggota')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/anggota/anggota_edit', $data);
		$this->load->view('admin/footer');
	}

	function anggota_update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$hp = $this->input->post('hp');
		$ktp = $this->input->post('ktp');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		if ($this->form_validation->run() != false) {
			$where = array(
				'anggota_id' => $id
			);
			$data = array(
				'anggota_nama' => $nama,
				'anggota_jk' => $jk,
				'anggota_alamat' => $alamat,
				'anggota_hp' => $hp,
				'anggota_ktp' => $ktp
			);
			$this->m_rental->update_data($where, $data, 'anggota');
			$this->session->set_flashdata('massage', '<div class="alert alert-warning" role="alert">
				Data Berhasil Di Update<button type="button" class="close" data-dismiss="alert" area-label="Close">
				<span area-hidden="trus">&times;</span></button></div>');
			redirect(base_url() . 'admin/anggota/anggota');
		} else {
			$data['anggota'] = $this->m_rental->edit_data($where, 'anggota')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/anggota/anggota_edit', $data);
			$this->load->view('admin/footer');
		}
	}

	function anggota_hapus($id)
	{
		$where = array(
			'anggota_id' => $id
		);
		$this->m_rental->delete_data($where, 'anggota');
		$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
			Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" area-label="Close">
			<span area-hidden="trus">&times;</span></button></div>');
		redirect(base_url() . 'admin/anggota/anggota');
	}

	function transaksi()
	{
		
		$data['transaksi'] = $this->db->query("select * from transaksi,buku,anggota where transaksi_mobil=buku_id and transaksi_kostumer=anggota_id")->result();
		$this->load->view('admin/header');
		$this->load->view('admin/transaksi/transaksi', $data);
		$this->load->view('admin/footer');
	}

	function transaksi_add()
	{
		$b = array('buku_status' => '1');
		$data['buku'] = $this->m_rental->edit_data($b, 'buku')->result();
		$data['anggota'] = $this->m_rental->get_data('anggota')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/transaksi/transaksi_add', $data);
		$this->load->view('admin/footer');
	}

	function transaksi_add_act()
	{
		$anggota = $this->input->post('anggota');
		$buku = $this->input->post('buku');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$tgl_kembali = $this->input->post('tgl_kembali');
		//$harga = $this->input->post('harga');
		$denda = $this->input->post('denda');
		$this->form_validation->set_rules('anggota', 'Anggota', 'required');
		$this->form_validation->set_rules('buku', 'Buku', 'required');
		$this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
		$this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
		//$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('denda', 'Denda', 'required');
		if ($this->form_validation->run() != false) {
			$data = array(
				'transaksi_karyawan' => $this->session->userdata('id'),
				'transaksi_kostumer' => $anggota,
				'transaksi_mobil' => $buku,
				'transaksi_status' => '2',
				'transaksi_tgl_pinjam' => $tgl_pinjam,
				'transaksi_tgl_kembali' => $tgl_kembali,
				//'transaksi_harga' => $harga,
				'transaksi_denda' => $denda,
				'transaksi_tgl' => date('Y-m-d')
				
			);
			$this->m_rental->insert_data($data, 'transaksi');
			// update status buku yg di pinjam
			//$d = array(
			//	'buku_status' => '2'
			//);
			//$w = array(
			//	'buku_id' => $buku
			//);

			//$this->m_rental->update_data($w, $d, 'buku');
			redirect(base_url() . 'admin/transaksi/transaksi');
		} else {
			$w = array('buku_status' => '1');
			$data['buku'] = $this->m_rental->edit_data($w, 'buku')->result();
			$data['anggota'] = $this->m_rental->get_data('anggota')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/transaksi/transaksi_add', $data);
			$this->load->view('admin/footer');
		}
	}

	function transaksi_hapus($id)
	{
		$w = array(
			'transaksi_id' => $id
		);
		$data = $this->m_rental->edit_data($w, 'transaksi')->row();
		$ww = array(
			'buku_id' => $data->transaksi_mobil
		);
		$data2 = array(
			'buku_status' => '1'
		);
		$this->m_rental->update_data($ww, $data2, 'buku');
		$this->m_rental->delete_data($w, 'transaksi');
		redirect(base_url() . 'admin/transaksi/transaksi');
	}

	function transaksi_selesai($id)
	{
		$data['buku'] = $this->m_rental->get_data('buku')->result();
		$data['anggota'] = $this->m_rental->get_data('anggota')->result();
		$data['transaksi'] = $this->db->query("select * from
			transaksi,buku,anggota where transaksi_mobil=buku_id and
			transaksi_kostumer=anggota_id and transaksi_id='$id'")->result();
		$this->load->view('admin/header');
		$this->load->view('admin/transaksi/transaksi_selesai', $data);
		$this->load->view('admin/footer');
	}

	function transaksi_selesai_act()
	{
		$id = $this->input->post('id');
		$tgl_dikembalikan = $this->input->post('tgl_dikembalikan');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$buku = $this->input->post('buku');
		$denda = $this->input->post('denda');
		$this->form_validation->set_rules('tgl_dikembalikan', 'Tanggal Di Kembalikan', 'required');
		if ($this->form_validation->run() != false) {
			// menghitung selisih hari
			$batas_kembali = strtotime($tgl_kembali);
			$dikembalikan = strtotime($tgl_dikembalikan);
			$selisih = abs(($batas_kembali -
				$dikembalikan) / (60 * 60 * 24));
			$total_denda = $denda * $selisih;
			// update status transaksi
			$data = array(
				'transaksi_tgldikembalikan' => $tgl_dikembalikan,
				'transaksi_status' => '1',
				'transaksi_totaldenda' => $total_denda
			);
			$w = array(
				'transaksi_id' => $id
			);
			$this->m_rental->update_data($w, $data, 'transaksi');
			// update status buku
			$data2 = array(
				'buku_status' => '1'
			);
			$w2 = array(
				'buku_id' => $buku
			);
			$this->m_rental->update_data($w2, $data2, 'buku');
			redirect(base_url() . 'admin/transaksi');
		} else {
			$data['buku'] = $this->m_rental->get_data('buku')->result();
			$data['anggota'] = $this->m_rental->get_data('anggota')->result();
			$data['transaksi'] = $this->db->query("select * from
				transaksi,buku,anggota where transaksi_mobil=buku_id and
				transaksi_kostumer=anggota_id and transaksi_id='$id'")->result();
			$this->load->view('admin/header');
			$this->load->view('admin/transaksi_selesai', $data);
			$this->load->view('admin/footer');
		}
	}

	// LAPORAN
	function laporan(){
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$this->form_validation->set_rules('dari','Dari
			Tanggal','required');
		$this->form_validation->set_rules('sampai','Sampai
			Tanggal','required');
		if($this->form_validation->run() != false){
			$data['laporan'] = $this->db->query("select * from
				transaksi,buku,anggota where transaksi_mobil=buku_id and
				transaksi_kostumer=anggota_id and date(transaksi_tgl) >= '$dari'")->result();
			$this->load->view('admin/header');
			$this->load->view('admin/laporan_filter',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/laporan');
			$this->load->view('admin/footer');
		}
	}

	function laporan_print(){
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');
		if($dari != "" && $sampai != ""){
			$data['laporan'] = $this->db->query("select * from
				transaksi,buku,anggota where transaksi_mobil=buku_id and
				transaksi_kostumer=anggota_id and date(transaksi_tgl) >= '$dari'")->result();
			$this->load->view('admin/laporan_print',$data);
		}else{
			redirect('admin/laporan');
		}
	}

	function laporan_pdf(){
		$this->load->library('dompdf_gen');
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');
		$data['laporan'] = $this->db->query("select * from
			transaksi,buku,anggota where transaksi_mobil=buku_id and
			transaksi_kostumer=anggota_id and date(transaksi_tgl) >= '$dari'")->result();
		$this->load->view('admin/laporan_pdf', $data);
		$paper_size = 'A4'; // ukuran kertas
		$orientation = 'potrait'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan.pdf", array('Attachment'=>0));
		// nama file pdf yang di hasilkan
	}

}
