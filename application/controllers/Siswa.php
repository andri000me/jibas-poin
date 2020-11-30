<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Name         : e-Poin v.1.0
 * Author       : DEDE ISKANDAR
 * Github       : https://github.com/ddiskandar
 * Facebook     : https://www.facebook.com/dzulqarnayn
 * Email        : d3215k@gmail.com
 * WA/Telegram  : +62 856 2402 8940
 *
 * Description:  Aplikasi e-Poin ini dibuat dan dikembangkan bertujuan membantu sekolah 
 * dalam mencatat poin pelanggaran dan kebaikan peserta didik untuk pendidikan 
 * karakter generasi penerus bangsa yang lebih baik.
 *
 * Donasi : Support developer untuk terus mengembangkan aplikasi
 * dengan memberikan donasi pengembangan.
 * 
 */

class Siswa extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->helper('url_helper');

		$this->load->model('rombel_model');
		$this->load->model('poin_model');
		
		if ( ! $this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

	}

	public function index()
	{
		$data['rombel'] = $this->rombel_model->get_rombel();
		$data['siswa'] = $this->siswa_model->get_all_siswa();
		$data['title'] = 'Daftar Peserta Didik';
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('siswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($id)
	{
		$data['siswa'] = $this->siswa_model->get_siswa_by_id($id);
		$data['poin'] = $this->poin_model->get_catatan_poin_siswa($id);

		if (empty($data['siswa'])) {
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('siswa/detail', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$this->siswa_model->destroy($id);
		$this->session->set_flashdata('delete', 'Data Peserta Didik berhasil dihapus!');

		redirect('siswa');
	}
}
