<?php
class M_login extends CI_Model {
    public function cek_admin($username) {
        // Mengambil data pengguna berdasarkan username
        $query = $this->db->get_where('admin', array('username' => $username));
    
        // Periksa apakah hasil query mengandung baris data
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null; // atau sesuaikan dengan penanganan kesalahan yang Anda inginkan
        }
    } 
}
?>
