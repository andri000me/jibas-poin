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

class Gtk_model extends CI_Model 
{
    public function get_all_gtk()
    {
        $hasil = $this->db->query(
            "SELECT 
                id, 
                nama_gtk, 
                npa, 
                lp, 
                no_hp, 
                alamat, 
                email 
            FROM gtk 
            ORDER BY nama_gtk ASC"
        );
        return $hasil;
    }

    public function destroy($id)
    {
        $this->db->delete('users', array('id' => $id));
        return TRUE;
    }
}