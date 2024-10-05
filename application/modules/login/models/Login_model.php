<?php
class Login_model extends CI_Model
{

    function already($id)
    {
        $this->db->where('login_oauth_uid', $id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_google($data, $id)
    {
        $this->db->where('login_oauth_uid', $id);
        $this->db->update('users', $data);
    }

    function insert_google($data)
    {
        $this->db->insert('users', $data);
    }

    public function proses($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data_user = $query->row();

            $this->db->where('username', $username);
            $this->db->where("password='$password'");

            $result = $this->db->get('users')->result();

            if (!empty($result)) {
                if ($result[0]->status != 'pending') {
                    if ($result[0]->status != 'rejected') {
                        $this->session->set_userdata('id', $data_user->user_id);
                        $this->session->set_userdata('first_name', $data_user->first_name);
                        $this->session->set_userdata('last_name', $data_user->last_name);
                        $this->session->set_userdata('username', $data_user->username);
                        $this->session->set_userdata('email', $data_user->email);
                        $this->session->set_userdata('profile_picture', $data_user->profile_picture);
                        $this->session->set_userdata('users_level', $data_user->users_level);
                        $this->session->set_userdata('is_login', TRUE);

                        $info = $this->db->get('informations')->result()[0];
                        $this->session->set_userdata('apps_name', $info->name);
                        $this->session->set_userdata('apps_title', $info->title);
                        $this->session->set_userdata('apps_favicon', $info->favicon_logo);

                        $this->session->set_flashdata('success', 'Selamat datang di aplikasi ' . $info->title);
                        return TRUE;
                    } else {
                        $this->session->set_flashdata('success', 'Account anda di reject, silahkan hubungi pihak laboran.');
                        return FALSE;
                    }
                } else {
                    $this->session->set_flashdata('success', 'Account anda belum di approve, silahkan menunggu.');
                    return FALSE;
                }
            } else {
                $this->session->set_flashdata('success', 'Password Anda Salah!!!');
                return FALSE;
            }
        } else {
            $this->session->set_flashdata('success', 'NIP/NPM Anda Salah!!!');
            return FALSE;
        }
    }
}