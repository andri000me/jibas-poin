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

class Database extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if ( ! $this->ion_auth->is_admin()) {
            redirect('dashboard', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/database');
        $this->load->view('templates/footer');
    }

    public function backup()
    {
        $this->load->dbutil();

        $config = array(
            'format'    => 'zip',
            'filename'    => 'database.sql'
        );

        $backup = &$this->dbutil->backup($config);

        $save = 'jibas-poin-backup-' . date("ymdHis") . '-db.zip';

        // $this->load->helper('file');
        // write_file($save, $backup);

        $this->load->helper('download');
        force_download($save, $backup);
    }
}