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

class Gtk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        if ( ! $this->ion_auth->is_admin()) {
            redirect('dashboard', 'refresh');
        }

        $this->load->model('gtk_model');
    }

    public function index()
    {
        $data['gtk'] = $this->gtk_model->get_all_gtk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('gtk/index', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->gtk_model->destroy($id);
        $this->session->set_flashdata('delete', 'Data Pengguna berhasil dihapus!');

        redirect('siswa');
    }
}