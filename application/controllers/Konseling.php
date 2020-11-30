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

class Konseling extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();

        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        if ( ! $this->ion_auth->in_group('bpbk') && ! $this->ion_auth->in_group('walikelas')) {
            redirect('dashboard');
        }

        $this->load->model('konseling_model');
    }
    
    public function index()
    {
        $this->load->model('rombel_model');

        if ($this->ion_auth->in_group('bpbk') or $this->ion_auth->in_group('admin'))
        {
            $data['rombel'] = $this->rombel_model->get_rombel();
            $data['konseling'] = $this->konseling_model->get_all_konseling();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('konseling/index', $data);
            $this->load->view('templates/footer');

        } else
        {
            $gtk_id = $this->ion_auth->user()->row()->gtk_id;

            $this->load->model('siswa_model');

            $data['siswa'] = $this->siswa_model->get_siswa_by_walikelas($gtk_id);
            $data['konseling'] = $this->konseling_model->get_konseling_by_wali($gtk_id);

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('konseling/walikelas', $data);
            $this->load->view('templates/footer');
        }

    }

    public function add()
    {
        $result = $this->konseling_model->add(array(
            'siswa_id' => $this->input->post('siswa_id'),
            'masalah' => $this->input->post('masalah'),
            'solusi' => $this->input->post('solusi'),
            'gtk_id' => $this->ion_auth->user()->row()->gtk_id,
            'tgl_konseling' => $this->input->post('tgl_konseling'),
        ));

        if ($result) {
            redirect(base_url() . 'konseling');
        }
    }

    public function delete($id = '')
    {
        if($this->konseling_model->delete($id))
        {
            redirect(base_url() . 'konseling');
        }
    }

    public function update($id = '')
    {
        $data = array(
            'masalah' => 'masalah baru',
            'solusi' => 'solusi baru',
        );

        if ($this->konseling_model->update($id, $data)) {
            redirect(base_url() . 'konseling');
        }
    }


}