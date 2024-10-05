<?php
class Informations_model extends CI_Model
{
    public function get_informations()
    {
        $this->db->select('*');
        $this->db->from('informations');
        return $this->db->get()->result();
    }

    public function update_informations($update, $id)
    {
        $result = $this->db->where('id', $id)->update('informations', $update);

        if ($result) {
            $this->session->set_flashdata('success', 'Informasi berhasil diupdate');
            return TRUE;
        } else {
            $this->session->set_flashdata('success', 'Informasi gagal diupdate, Silahkan Coba Lagi');
            return FALSE;
        }
    }
}
