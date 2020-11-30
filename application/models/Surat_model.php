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

class Surat_model extends CI_Model
{
    public function get_all_surat()
    {
        $this->db->select('surat.*, siswa.*');
        $this->db->from('surat');
        $this->db->join('siswa', 'siswa.id = surat.siswa_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function count()
    {
        $query = $this->db->get('surat');
        return $query->num_rows();
    }

    public function get_surat($id)
    {
        $this->db->select('surat.*, siswa.*');
        $this->db->from('surat');
        $this->db->join('siswa', 'siswa.id = surat.siswa_id');
        $this->db->where('surat_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function set_surat()
    {
        $id_rombel = $this->input->post('rombel');
        $rombel = $this->db->get_where('rombel', array('id' => $id_rombel))->row();

        $date = date('Y-m-d');
        $data = array(
            'tanggal_surat' => $date,
            'siswa_id' => $this->input->post('siswa_id'),
            'waktu' => $this->input->post('waktu'),
            'rombel' => $rombel->nama_rombel,
        );

        return $this->db->insert('surat', $data);
    }

    public function delete_surat($id)
    {
        $this->db->delete('surat', array('surat_id' => $id));
    }
}