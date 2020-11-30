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

class Sinkronisasi_model extends CI_Model
{
    public function sync()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        $pegawai = $this->load->database('jbssdm', TRUE);

        $gtk = $pegawai->get_where('jbssdm.pegawai', array('pegawai.aktif' => 1))->result();

        foreach ($gtk as $item) {
            $data = array(
                'id' => $item->replid,
                'npa' => $item->nip,
                'nama_gtk' => strtoupper($item->nama),
                'tempat_lahir' => ucfirst(strtolower(($item->tmplahir))),
                'tanggal_lahir' => $item->tgllahir,
                'lp' => $item->kelamin,
                'alamat' => $item->alamat,
                'foto' => $item->foto,
                'no_hp' => $item->handphone,
                'email' => $item->email,
            );

            $this->db->replace('gtk', $data);
        }

        $query = $this->load->database('jbsakad', TRUE);

        $tahun_ajaran = $query->get('tahunajaran')->result();

        foreach ($tahun_ajaran as $item) {
            $data = array(
                'id' => $item->replid,
                'tahun_ajaran' => $item->tahunajaran,
                'aktif' => $item->aktif,
            );

            $this->db->replace('tahun_ajaran', $data);
        }

        $rombel = $query->get('kelas')->result();

        foreach ($rombel as $item) {
            $data = array(
                'id' => $item->replid,
                'nama_rombel' => $item->kelas,
                'tahun_ajaran_id' => $item->idtahunajaran,
                'npa_gtk' => $item->nipwali,
                'aktif' => $item->aktif,
            );

            $this->db->replace('rombel', $data);
        }

        $query->select('siswa.*');
        $query->from('siswa');
        $query->join('kelas', 'kelas.replid = siswa.idkelas');
        $query->join('tahunajaran', 'tahunajaran.replid = kelas.idtahunajaran');
        $query->where('tahunajaran.aktif', 1);
        $query->where('siswa.aktif', 1);
        $siswa = $query->get()->result();

        foreach ($siswa as $item) {
            $data = array(
                'id' => $item->replid,
                'nipd' => $item->nis,
                'nama' => strtoupper($item->nama),
                'nik' => $item->nik,
                'nisn' => $item->nisn,
                'tempat_lahir' => ucfirst(strtolower(($item->tmplahir))),
                'tanggal_lahir' => $item->tgllahir,
                'lp' => $item->kelamin,
                'rombel_id' => $item->idkelas,
                'ayah' => strtoupper($item->namaayah),
                'ibu' => strtoupper($item->namaibu),
                'alamat' => $item->alamatsiswa,
                'foto' => $item->foto,
            );

            $this->db->replace('siswa', $data);
        }

        $this->db->query('SET FOREIGN_KEY_CHECKS=1');

        $waktu = date('Y-m-d H:i:s');

        $this->db->set('sinkron', $waktu);
        $this->db->update('setting');

        return true;
    }

    public function jumlah_tahun_ajaran()
    {
        $query = $this->db->get('tahun_ajaran');
        return $query->num_rows();
    }

    public function jumlah_siswa_jibas()
    {
        $query = $this->load->database('jbsakad', TRUE);

        $query->select('siswa.replid');
        $query->from('siswa');
        $query->join('kelas', 'kelas.replid = siswa.idkelas');
        $query->join('tahunajaran', 'tahunajaran.replid = kelas.idtahunajaran');
        $query->where('tahunajaran.aktif', 1);
        $query->where('siswa.aktif', 1);
        return $query->get()->num_rows();
    }

    public function jumlah_rombel_jibas()
    {
        $query = $this->load->database('jbsakad', TRUE);

        $query->select('kelas.replid');
        $query->from('kelas');
        $query->join('tahunajaran', 'tahunajaran.replid = kelas.idtahunajaran');
        $query->where('tahunajaran.aktif', 1);
        return $query->get()->num_rows();
    }

}