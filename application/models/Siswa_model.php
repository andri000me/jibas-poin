<?php

class Siswa_Model extends CI_Model
{
    function get_siswa_by_rombel($id)
    {
        $hasil = $this->db->query(
            "SELECT 
                id, nama 
            FROM siswa 
            WHERE rombel_id='$id' 
            ORDER BY nama ASC"
            );
        return $hasil->result();
    }

    function get_siswa_by_walikelas($gtk_id)
    {
        $hasil = $this->db->query(
            "SELECT 
                siswa.id, siswa.nama 
            FROM siswa
            JOIN rombel
            ON rombel.id = siswa.rombel_id
            JOIN gtk
            ON gtk.npa = rombel.npa_gtk
            WHERE gtk.id=$gtk_id 
            ORDER BY siswa.nama ASC"
        );
        return $hasil->result();
    }

    public function get_all_siswa()
    {
        $this->db->select(
            'siswa.id, 
            siswa.nipd, 
            siswa.nama, 
            siswa.lp, 
            siswa.ayah, 
            siswa.ibu, 
            siswa.alamat, 
            rombel.nama_rombel
            ');
        $this->db->from('siswa');
        $this->db->join('rombel', 'rombel.id = siswa.rombel_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_siswa_by_id($id)
    {
        $query = $this->db->query(
            "SELECT 
                siswa.*,
                siswa.nama, 
                sum(poin.jenis_poin) kebaikan,  
                SUM(!poin.jenis_poin) pelanggaran, 
                SUM(CASE WHEN poin.nilai >= 0 then poin.nilai else 0 end) nilai_kebaikan, 
                sum(CASE WHEN poin.nilai < 0 then poin.nilai else 0 end) AS nilai_pelanggaran, 
                sum(poin.nilai) AS total_nilai, 
                rombel.nama_rombel
            FROM siswa
            LEFT JOIN rombel
            ON rombel.id = siswa.rombel_id
            LEFT JOIN siswa_poin
            ON siswa_poin.siswa_id = siswa.id
            LEFT JOIN poin
            ON poin.id = siswa_poin.poin_id
            WHERE siswa.id = '$id'
            GROUP by siswa.id"
        );
        
        return $query->row();
    }

    public function destroy($id)
    {
        return $this->db->delete('siswa', array('id' => $id));
    }

    public function count()
    {
        $query = $this->db->get('siswa');
        return $query->num_rows();
    }
}