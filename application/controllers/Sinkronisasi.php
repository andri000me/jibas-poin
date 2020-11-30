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

class Sinkronisasi extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('surat_model');
        $this->load->model('setting_model');
        $this->load->model('sinkronisasi_model');
        $this->load->model('rombel_model');
        $this->load->model('gtk_model');

        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        if ( ! $this->ion_auth->is_admin()) {
            redirect('dashboard', 'refresh');
        }
    }

    public function index()
    {
        $jbsakad = $this->load->database('jbsakad', TRUE);

        $connected = $jbsakad->initialize();

        if ($connected) {

            $data['jumlah_tahun_ajaran_aplikasi']   = $this->sinkronisasi_model->jumlah_tahun_ajaran();
            $data['jumlah_tahun_ajaran_jibas']      = $jbsakad->get('tahunajaran')->num_rows();
            $data['jumlah_siswa_aplikasi']          = $this->siswa_model->count();
            $data['jumlah_siswa_jibas']             = $this->sinkronisasi_model->jumlah_siswa_jibas();
            $data['jumlah_rombel_aplikasi']         = $this->rombel_model->count();
            $data['jumlah_rombel_jibas']            = $this->sinkronisasi_model->jumlah_rombel_jibas();
            $data['setting']                        = $this->setting_model->get_setting();

            $jbssdm = $this->load->database('jbssdm', TRUE);

            $data['jumlah_gtk_jibas']               = $jbssdm->get_where('jbssdm.pegawai', array('pegawai.aktif' => 1))->num_rows();
            $data['jumlah_gtk_aplikasi']            = $this->gtk_model->get_all_gtk()->num_rows();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/sinkronisasi', $data);
            $this->load->view('templates/footer');

        } else {
            echo 'Unable to connect with database with given db details.';
        }
        
        
    }

    public function sinkron()
    {

        $this->sinkronisasi_model->sync();
        $this->session->set_flashdata('success', 'Data berhasil disinkron!');
        redirect('sinkronisasi');
    }

}