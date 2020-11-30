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

class Dashboard extends CI_Controller
{
    
    public function index()
    {
        $this->load->model('rombel_model');
        $this->load->model('surat_model');
        $this->load->model('setting_model');
        $this->load->model('poin_model');

        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        $data['jumlah_poin_pelanggaran']    = $this->poin_model->jumlah_poin(0);
        $data['jumlah_poin_kebaikan']       = $this->poin_model->jumlah_poin(1);
        $data['jumlah_jenis_poin']          = $this->poin_model->jumlah_jenis_poin();
        $data['jumlah_siswa']               = $this->siswa_model->count();
        $data['setting']                    = $this->setting_model->get_setting();

        $data['siswa_pelanggaran'] = $this->poin_model->top_ten(0);
        $data['siswa_kebaikan'] = $this->poin_model->top_ten(1);

        $data['poin'] = $this->poin_model->get_latest_poin();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function get_stats()
    {
        $this->load->model('poin_model');
        $data = $this->poin_model->statistik_bulanan();
        echo json_encode($data);
    }
}