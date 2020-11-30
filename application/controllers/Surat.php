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

class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('surat_model');
        $this->load->model('rombel_model');
        $this->load->model('setting_model');
        $this->load->library('pdf');

        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        if ( ! $this->ion_auth->in_group('bpbk') && ! $this->ion_auth->is_admin()) {
            redirect('dashboard');
        }

    }

    function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('rombel', 'Rombel', 'required');
        $this->form_validation->set_rules('siswa_id', 'Siswa', 'required');
        $this->form_validation->set_rules('waktu', 'waktu', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['rombel'] = $this->rombel_model->get_rombel();
            $data['surat'] = $this->surat_model->get_all_surat();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('surat/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->surat_model->set_surat();
            $this->session->set_flashdata('success', 'Surat Keterangan berhasil dibuat!');
            redirect('surat');
        }
    }

    function get_siswa()
    {
        $id = $this->input->post('id');
        $data = $this->siswa_model->get_siswa_by_rombel($id);
        echo json_encode($data);
    }

    public function delete($id)
    {
        $this->surat_model->delete_surat($id);
        $this->session->set_flashdata('delete', 'Surat Keterangan berhasil dihapus!');

        redirect('surat');
    }

    function pdf($id)
    {
        $surat = $this->surat_model->get_surat($id);
        $setting = $this->setting_model->get_setting();
        $logo = base_url().'assets/images/kop_surat.jpg';
        // $ttd_kepsek = base_url().'assets/images/ttd_kepsek.png';
        $tinggi_baris = 6;

        // var_dump($surat);

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->SetMargins(25, 10, 30);
        $pdf->AddPage();
        $pdf->Image($logo, 23, 10, 0, 0, 'JPG');
        // $pdf->Image($ttd_kepsek, 120, 203, 50, 0, 'PNG');
        $pdf->ln(40);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(18, $tinggi_baris, 'Nomor', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ': ', 0, 0);
        $pdf->Cell(70, $tinggi_baris, $surat->surat_id. '/SKt-01/SMKP-ALFA/' . akhir_nomor_surat($surat->tanggal_surat), 0, 0);
        $pdf->Cell(0, $tinggi_baris, 'Sukabumi, ' . date_indo($surat->tanggal_surat), 0, 1);
        $pdf->Cell(18, $tinggi_baris, 'Lampiran', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ': ', 0, 0);
        $pdf->Cell(70, $tinggi_baris, '-', 0, 1);
        $pdf->Cell(18, $tinggi_baris, 'Perihal', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ': ', 0, 0);
        $pdf->Cell(70, $tinggi_baris, 'Panggilan Orang tua', 0, 0);
        $pdf->Cell(0, $tinggi_baris, 'Kepada Orang tua/wali', 0, 1);
        $pdf->Cell(104, $tinggi_baris, '', 0, 0);
        $pdf->Cell(0, $tinggi_baris, $surat->nama, 0, 1);
        $pdf->Cell(104, $tinggi_baris, '', 0, 0);
        $pdf->Cell(0, $tinggi_baris, 'di tempat.', 0, 1);
        $pdf->ln(6);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->SetFont('Times', 'BI', 12);
        $pdf->Cell(0, $tinggi_baris, "Assalamu'alaikum Wr. Wb.", 0, 1);
        $pdf->ln(3);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->SetFont('Times', '', 12);
        $pdf->MultiCell(140, $tinggi_baris, "Yang bertanda tangan di bawah ini, Kepala $setting->nama_sekolah $setting->kecamatan_sekolah $setting->kabupaten_sekolah, dengan ini menyampaikan kepada Bapak/Ibu/Wali siswa atas nama :", 0, 'J');
        $pdf->ln(3);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->Cell(30, $tinggi_baris, '       nama ', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(0, $tinggi_baris, $surat->nama, 0, 1);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->Cell(30, $tinggi_baris, '       rombel', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->Cell(0, $tinggi_baris, $surat->rombel, 0, 1);
        $pdf->ln(3);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->MultiCell(140, $tinggi_baris, "Telah beberapa kali melakukan pelanggaran tata tertib sekolah. Berkaitan dengan hal tersebut diatas, maka dengan ini kami sampaikan surat panggilan Orang Tua dengan harapan Bapak/Ibu dapat hadir di Sekolah pada $surat->waktu", 0, 'J');
        $pdf->ln(3);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->MultiCell(160, $tinggi_baris, "Demikian kami sampaikan, atas kehadiran Bapak/Ibu disampaikan terima kasih.", 0, 'J');
        $pdf->ln(3);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->SetFont('Times', 'BI', 12);
        $pdf->Cell(0, $tinggi_baris, "Wassalamu'alaikum Wr. Wb.", 0, 1);
        $pdf->ln(12);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->Cell(70, $tinggi_baris, 'Mengetahui,', 0, 1);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->Cell(70, $tinggi_baris, 'Kepala Sekolah', 0, 0);
        $pdf->Cell(0, $tinggi_baris, 'Wakasek Kesiswaan,', 0, 1);
        $pdf->Cell(20, $tinggi_baris, '', 0, 0);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(70, 40, 'Agus Syarif H., S.Sos', 0, 0);
        $pdf->Cell(0, 40, 'Ani Handayani', 0, 1);

        $pdf->Output('D', 'panggilOrtu_' . $surat->rombel . '_' .$surat->nama.'.pdf');
    }
}