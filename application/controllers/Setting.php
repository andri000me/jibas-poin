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

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        if (!$this->ion_auth->is_admin()) {
            redirect('dashboard');
        }

        $this->load->model('surat_model');
        $this->load->model('setting_model');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('periode_aktif', 'Periode aktif', 'required');
        $this->form_validation->set_rules('kepala_sekolah', 'Kepala sekolah', 'required');
        $this->form_validation->set_rules('nama_sekolah', 'Nama sekolah', 'required');
        $this->form_validation->set_rules('alamat_sekolah', 'Alamat sekolah', 'required');
        $this->form_validation->set_rules('kecamatan_sekolah', 'Kecamatan sekolah', 'required');
        $this->form_validation->set_rules('kabupaten_sekolah', 'Kabupaten sekolah', 'required');
        $this->form_validation->set_rules('npsn_sekolah', 'NPSN sekolah', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['setting'] = $this->setting_model->get_setting();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/setting', $data);
            $this->load->view('templates/footer');

        } else {
            if (isset($_FILES['kop_surat'])) {
                
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'jpg|png';
                $config['file_name']            = 'kop_surat.jpg';
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('kop_surat');
            }

            $this->setting_model->set_setting();
            $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
            redirect('setting');
        }
    }
}