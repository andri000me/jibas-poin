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

class Poin_model extends CI_Model
{
    public function get_catatan_siswa_walikelas($npa)
    {
        $query = $this->db->query(
            "SELECT 
	        siswa.id, 
            siswa.nama, 
            if(sum(poin.jenis_poin) != 0, sum(poin.jenis_poin), 0) kebaikan,  
            if(SUM(!poin.jenis_poin) != 0, sum(!poin.jenis_poin), 0) pelanggaran, 
            SUM(CASE WHEN poin.nilai >= 0 then poin.nilai else 0 end) nilai_kebaikan, 
            sum(CASE WHEN poin.nilai < 0 then poin.nilai else 0 end) AS nilai_pelanggaran, 
            if(sum(poin.nilai) != 0, sum(poin.nilai), 0)  AS total_nilai, 
            rombel.nama_rombel kelas, 
            gtk.npa
            from siswa
            left JOIN siswa_poin
            on siswa_poin.siswa_id = siswa.id
            left JOIN poin
            on poin.id = siswa_poin.poin_id
            left join rombel
            on rombel.id = siswa.rombel_id
            left join gtk
            on gtk.npa = rombel.npa_gtk
            WHERE gtk.id = '$npa'
            GROUP by siswa.id"
        );

        return $query;
    }

    public function get_catatan_siswa_bpbk()
    {
        $query = $this->db->query(
            "SELECT 
	        siswa.id, 
            siswa.nama, 
            if(sum(poin.jenis_poin) = 0, sum(poin.jenis_poin), 0) kebaikan,  
            if(SUM(!poin.jenis_poin) = 0, sum(!poin.jenis_poin), 0) pelanggaran, 
            SUM(CASE WHEN poin.nilai >= 0 then poin.nilai else 0 end) nilai_kebaikan, 
            sum(CASE WHEN poin.nilai < 0 then poin.nilai else 0 end) AS nilai_pelanggaran, 
            if(sum(poin.nilai) != 0, sum(poin.nilai), 0)  AS total_nilai, 
            rombel.nama_rombel kelas, 
            gtk.npa
            from siswa
            left JOIN siswa_poin
            on siswa_poin.siswa_id = siswa.id
            left JOIN poin
            on poin.id = siswa_poin.poin_id
            left join rombel
            on rombel.id = siswa.rombel_id
            left join gtk
            on gtk.npa = rombel.npa_gtk
            GROUP by siswa.id"
        );

        return $query;
    }

    public function get_all_catatan_poin()
    {
        $this->db->select('siswa_poin.*, poin.*, siswa.*, rombel.nama_rombel, gtk.nama_gtk');
        $this->db->from('siswa_poin');
        $this->db->join('poin', 'poin.id = siswa_poin.poin_id');
        $this->db->join('siswa', 'siswa.id = siswa_poin.siswa_id');
        $this->db->join('rombel', 'rombel.id = siswa.rombel_id');
        $this->db->join('gtk', 'gtk.id = siswa_poin.gtk_id');
        return $this->db->get();
    }

    public function get_latest_poin()
    {
        $this->db->select('siswa_poin.*, poin.*, siswa.nama, siswa.id, rombel.nama_rombel, gtk.nama_gtk');
        $this->db->from('siswa_poin');
        $this->db->join('poin', 'poin.id = siswa_poin.poin_id');
        $this->db->join('siswa', 'siswa.id = siswa_poin.siswa_id');
        $this->db->join('rombel', 'rombel.id = siswa.rombel_id');
        $this->db->join('gtk', 'gtk.id = siswa_poin.gtk_id');
        $this->db->order_by('siswa_poin.id_poin', 'DESC');
        $this->db->limit(5);
        return $this->db->get();
    }

    public function get_catatan_poin_by_gtk($gtk_id)
    {
        $this->db->select('siswa_poin.*, poin.*, siswa.*, rombel.nama_rombel, gtk.nama_gtk');
        $this->db->from('siswa_poin');
        $this->db->join('poin', 'poin.id = siswa_poin.poin_id');
        $this->db->join('siswa', 'siswa.id = siswa_poin.siswa_id');
        $this->db->join('rombel', 'rombel.id = siswa.rombel_id');
        $this->db->join('gtk', 'gtk.id = siswa_poin.gtk_id');
        $this->db->where(array('gtk_id' => $gtk_id));
        return $this->db->get();
    }

    public function get_catatan_poin_siswa($id)
    {
        $this->db->select('siswa_poin.*, poin.*, gtk.nama_gtk');
        $this->db->from('siswa_poin');
        $this->db->join('poin', 'poin.id = siswa_poin.poin_id');
        $this->db->join('gtk', 'gtk.id = siswa_poin.gtk_id');
        $this->db->where(array('siswa_poin.siswa_id' => $id));
        $this->db->order_by('siswa_poin.tgl_poin', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_jumlah_poin_siswa($id, $jenis)
    {
        $this->db->select_sum('poin.nilai');
        $this->db->from('poin');
        $this->db->join('siswa_poin', 'poin.id = siswa_poin.poin_id');
        $this->db->where(array('siswa_poin.siswa_id' => $id));
        $this->db->where(array('poin.jenis_poin' => $jenis));
        $query = $this->db->get();
        return $query;
    }

    public function get_catatan_poin_wali($gtk_id)
    {
        $this->db->select('siswa_poin.*, poin.*, siswa.*, rombel.nama_rombel, rombel.npa_gtk, gtk.nama_gtk');
        $this->db->from('siswa_poin');
        $this->db->join('poin', 'poin.id = siswa_poin.poin_id');
        $this->db->join('siswa', 'siswa.id = siswa_poin.siswa_id');
        $this->db->join('rombel', 'rombel.id = siswa.rombel_id');
        $this->db->join('gtk', 'gtk.id = siswa_poin.gtk_id');
        $this->db->where(array('gtk_id' => $gtk_id));
        return $this->db->get();
    }

    public function get_jenis_poin()
    {
        $query = $this->db->get('poin');
        return $query;
    }

    public function get_jenis_poin_by_id($id)
    {
        return $this->db->get_where('poin', $id);
    }

    public function get_jenis_poin_by_jenis($id)
    {
        $hasil = $this->db->query(
            "SELECT * 
            FROM poin 
            WHERE jenis_poin='$id' 
            ORDER BY nilai ASC"
            );
        return $hasil->result();
    }

    public function set_jenis_poin()
    {
        $data = array(
            'jenis_poin' => $this->input->post('jenis_poin'),
            'nama_poin' => $this->input->post('nama_poin'),
            'nilai' => $this->input->post('nilai'),
        );

        $this->db->insert('poin', $data);
    }

    public function update_jenis_poin()
    {
        $data = array(
            'jenis_poin' => $this->input->post('jenis_poin'),
            'nama_poin' => $this->input->post('nama_poin'),
            'nilai' => $this->input->post('nilai'),
        );

        $id = $this->input->post('id');
        
        $this->db->update('poin', $data, array('id' => $id));
    }

    public function set_poin()
    {
        $tahun_ajaran = $this->db->get_where('tahun_ajaran', array('aktif' => 1))->row();

        $data = array(
            'siswa_id' => $this->input->post('siswa_id'),
            'poin_id' => $this->input->post('poin_id'),
            'catatan' => $this->input->post('catatan'),
            'gtk_id' => $this->ion_auth->user()->row()->gtk_id,
            'tgl_poin' => $this->input->post('tgl_poin'),
            'tahun_ajaran_id' => $tahun_ajaran->id,
        );

        $this->db->insert('siswa_poin', $data);
    }

    public function delete_poin($id)
    {
        $this->db->delete('siswa_poin', array('id_poin' => $id));
    }

    public function jumlah_poin($jenis)
    {
        $this->db->select('siswa_poin.id_poin');
        $this->db->from('siswa_poin');
        $this->db->join('poin', 'siswa_poin.poin_id = poin.id');
        $this->db->where(array('jenis_poin' => $jenis));
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_jenis_poin()
    {
        $query = $this->db->get('poin');
        return $query->num_rows();
    }

    public function top_ten($jenis)
    {
        if ($jenis === 1) {
            $order = 'DESC';
        } else {
            $order = 'ASC';
        }

        $query = $this->db->query(
            "SELECT 
                siswa.id, 
                siswa.nama, 
                COUNT(id_poin) poin,
                SUM(poin.nilai) total,
                rombel.nama_rombel
            FROM siswa
            LEFT JOIN siswa_poin
            ON siswa_poin.siswa_id = siswa.id
            LEFT JOIN poin
            ON poin.id = siswa_poin.poin_id
            LEFT JOIN rombel
            ON rombel.id = siswa.rombel_id
            WHERE poin.jenis_poin = '$jenis'
            GROUP BY siswa.id
            ORDER BY total $order
            LIMIT 10
            "
        );

        return $query->result();
    }

    public function statistik_bulanan()
    {
        $query = $this->db->query(
            "SELECT 
                MONTH(tgl_poin) AS bulan,
                CASE
                    WHEN MONTH(tgl_poin) = 7 then 'Juli'
                    WHEN MONTH(tgl_poin) = 8 then 'Agustus'
                    WHEN MONTH(tgl_poin) = 9 then 'September'
                    WHEN MONTH(tgl_poin) = 10 then 'Oktober'
                    WHEN MONTH(tgl_poin) = 11 then 'November'
                    WHEN MONTH(tgl_poin) = 12 then 'Desember'
                    WHEN MONTH(tgl_poin) = 1 then 'Januari'
                    WHEN MONTH(tgl_poin) = 2 then 'Februari'
                    WHEN MONTH(tgl_poin) = 3 then 'Maret'
                    WHEN MONTH(tgl_poin) = 4 then 'April'
                    WHEN MONTH(tgl_poin) = 5 then 'Mei'
                    WHEN MONTH(tgl_poin) = 6 then 'Juni'
                    ELSE 'Eror' 
                END nama_bulan,
                SUM(poin.jenis_poin) kebaikan,
                SUM(!poin.jenis_poin) pelanggaran
            FROM siswa_poin
            LEFT JOIN poin
            ON poin.id = siswa_poin.poin_id
            GROUP BY bulan
            ORDER BY bulan ASC"
        );

        return $query->result();
    }
}