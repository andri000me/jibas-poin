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

class Poin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('poin_model');
        $this->load->model('rombel_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    function get_jenis_poin()
    {
        $id = $this->input->post('id');
        $data = $this->poin_model->get_jenis_poin_by_jenis($id);
        echo json_encode($data);
    }

    public function rekap_poin()
    {
        if ( ! $this->ion_auth->in_group('bpbk') and !$this->ion_auth->in_group('walikelas')) {
            redirect('dashboard');
        }

        $npa = $this->ion_auth->user()->row()->gtk_id;

        if ($this->ion_auth->in_group('walikelas')) {
            $data['siswa'] = $this->poin_model->get_catatan_siswa_walikelas($npa);
        } else {
            $data['siswa'] = $this->poin_model->get_catatan_siswa_bpbk();
        }
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('poin/rekap', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('siswa_id', 'Siswa', 'required');
        $this->form_validation->set_rules('poin_id', 'Poin', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['rombel'] = $this->rombel_model->get_rombel();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('poin/tambah', $data);
            $this->load->view('templates/footer');

        } else {

            $this->poin_model->set_poin();
            $this->session->set_flashdata('success', 'Data berhasil ditambah!');
            redirect('poin/catatan');
        }
    }

    public function tambah_by_id($id)
    {
        $this->form_validation->set_rules('siswa_id', 'Siswa', 'required');
        $this->form_validation->set_rules('poin_id', 'Poin', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['siswa'] = $this->siswa_model->get_siswa_by_id($id);

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('poin/tambah_by_id', $data);
            $this->load->view('templates/footer');

        } else {

            $id_siswa = $this->input->post($id);
            $this->poin_model->set_poin();
            $this->session->set_flashdata('success', 'Data berhasil ditambah!');
            redirect('poin/catatan');
        }
    }

    public function catatan()
    {
        $gtk_id = $this->ion_auth->user()->row()->gtk_id;

        $data['poin'] = $this->poin_model->get_catatan_poin_by_gtk($gtk_id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('poin/catatan', $data);
        $this->load->view('templates/footer');
    }

    public function rekap_catatan()
    {
        if ( ! $this->ion_auth->in_group('bpbk') and !$this->ion_auth->in_group('walikelas')) {
            redirect('dashboard');
        }

        if ($this->ion_auth->in_group('bpbk') or $this->ion_auth->in_group('admin')) {

            $data['poin'] = $this->poin_model->get_all_catatan_poin();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('poin/catatan_bk', $data);
            $this->load->view('templates/footer');

        } elseif  ($this->ion_auth->in_group('walikelas')) {

            $gtk_id = $this->ion_auth->user()->row()->gtk_id;

            $data['poin'] = $this->poin_model->get_catatan_poin_wali($gtk_id);

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('poin/catatan', $data);
            $this->load->view('templates/footer');

        }
    }

    public function jenis()
    {
        if ( ! $this->ion_auth->in_group('bpbk')) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('jenis_poin', 'Jenis Poin', 'required');
        $this->form_validation->set_rules('nama_poin', 'Deskripsi Poin', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai Poin', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['poin'] = $this->poin_model->get_jenis_poin();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('poin/jenis', $data);
            $this->load->view('templates/footer');
        } else {

            $this->poin_model->set_jenis_poin();
            $this->session->set_flashdata('success', 'Jenis poin berhasil ditambahkan!');
            redirect('poin/jenis');
        }
    }

    public function edit_jenis($id)
    {
        $this->form_validation->set_rules('jenis_poin', 'Jenis Poin', 'required');
        $this->form_validation->set_rules('nama_poin', 'Deskripsi Poin', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai Poin', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['poins'] = $this->poin_model->get_jenis_poin_by_id(array('id' => $id))->result();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('poin/edit_jenis', $data);
            $this->load->view('templates/footer');

        } else {

            $this->poin_model->update_jenis_poin();
            $this->session->set_flashdata('success', 'Jenis poin berhasil diubah!');
            redirect('poin/jenis');

        }
    }

    public function delete($id)
    {
        $this->poin_model->delete_poin($id);
        $this->session->set_flashdata('delete', 'Poin berhasil dihapus!');

        redirect('poin/catatan');

    }
}