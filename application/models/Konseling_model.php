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

class Konseling_model extends CI_Model
{
    protected $table = 'konseling';
    protected $primary_key = 'konseling_id';

    public function get_all_konseling()
    {
        $this->db->select('konseling.*, siswa.nama, rombel.nama_rombel, gtk.nama_gtk');
        $this->db->from($this->table);
        $this->db->join('siswa', 'siswa.id = konseling.siswa_id');
        $this->db->join('rombel', 'rombel.id = siswa.rombel_id');
        $this->db->join('gtk', 'gtk.id = konseling.gtk_id');
        $this->db->order_by($this->primary_key, 'desc');
        return $this->db->get()->result();
    }

    public function get_konseling_by_wali($gtk_id)
    {
        $this->db->select('konseling.*, siswa.nama, rombel.nama_rombel, gtk.nama_gtk');
        $this->db->from($this->table);
        $this->db->join('siswa', 'siswa.id = konseling.siswa_id');
        $this->db->join('rombel', 'rombel.id = siswa.rombel_id');
        $this->db->join('gtk', 'gtk.id = konseling.gtk_id');
        $this->db->where('gtk_id', $gtk_id);
        $this->db->order_by($this->primary_key, 'desc');
        return $this->db->get()->result();
    }

    public function add($data=array())
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id='', $data=array())
    {
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table, $data);
        if ($this->db->affected_rows())
        {
            return TRUE;
        }
    }

    public function delete($id='')
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);
        return TRUE;
    }
}