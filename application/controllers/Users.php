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

class Users extends CI_Controller
{
    public $data = [];

    public function __construct()
    {
        parent::__construct();
        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if ( ! $this->ion_auth->is_admin()) {
            redirect('dashboard', 'refresh');
        }

        $this->load->database();
        $this->load->library(['form_validation']);
        $this->load->model('gtk_model');

        $this->load->helper(['url', 'language']);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');


    }

    /**
     * Redirect if needed, otherwise display the user list
     */
    public function index()
    {
        $this->data['title'] = $this->lang->line('index_heading');

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        //list the users
        $this->data['users'] = $this->ion_auth->users()->result();

        //USAGE NOTE - you can do more complicated queries like this
        //$this->data['users'] = $this->ion_auth->where('field', 'value')->users()->result();

        foreach ($this->data['users'] as $k => $user) {
            $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('auth/index', $this->data);
        $this->load->view('templates/footer');
    }
}