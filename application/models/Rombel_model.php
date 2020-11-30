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

class Rombel_model extends CI_Model
{
    public function count()
    {
        $this->db->select('rombel.id');
        $this->db->from('rombel');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id = rombel.tahun_ajaran_id');
        $this->db->where('tahun_ajaran.aktif', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_rombel()
    {
        $this->db->select('rombel.*');
        $this->db->from('rombel');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id = rombel.tahun_ajaran_id');
        $this->db->where('tahun_ajaran.aktif', 1);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function cek_wali($gtk)
    {
        $this->db->select('rombel.id');
        $this->db->from('rombel');
        $this->db->join('gtk', 'gtk.npa = rombel.npa_gtk');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id = rombel.tahun_ajaran_id');
        $this->db->where('tahun_ajaran.aktif', 1);
        $this->db->where('gtk.npa', $gtk);
        $query = $this->db->get();
        return $query->num_rows();
    }
}