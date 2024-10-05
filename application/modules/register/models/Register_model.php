<?php
class Register_model extends CI_Model
{
    public function insertData($table, $data)
    {
        $username_check =  $this->db->select('*')
            ->from('users')
            ->where('username=', $data['username'])
            ->get()->result();

        $email_check = $this->db->select('*')
            ->from('users')
            ->where('email=', $data['email'])
            ->get()->result();

        if (!$username_check) {
            if (!$email_check) {
                $this->db->insert($table, $data);
                $this->session->set_flashdata('success', 'Account Berhasil Didaftarkan, Silahkan menunggu approval account dari laboran informatika. Terima Kasih');
                return TRUE;
            } else {
                $this->session->set_flashdata('success', 'Email sudah terdaftar. Jika anda merasa belum pernah mendaftar, anda dapat menghubungi pihak laboran Informarika. Terima Kasih');
                return FALSE;
            }
        } else {
            $this->session->set_flashdata('success', 'NIP/NPM sudah terdaftar. Jika anda merasa belum pernah mendaftar, anda dapat menghubungi pihak laboran Informarika. Terima Kasih');
            return FALSE;
        }
    }
}