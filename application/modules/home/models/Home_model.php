<?php
class Home_model extends CI_Model
{

    public function loans()
    {
        $date = date('Y-m-d');
        $user_level = $this->session->userdata('users_level');
        $user_id = $this->session->userdata('id');

        if ($user_level == 1 || $user_level == 2) {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans) a,
            (SELECT COUNT(*) as total_today FROM loans WHERE created_at LIKE '%$date%') b")
                ->result();
        } else {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans WHERE user_id = '$user_id') a,
            (SELECT COUNT(*) as total_today FROM loans WHERE created_at LIKE '%$date%' AND user_id = '$user_id') b")
                ->result();
        }
    }

    public function loans_approved()
    {
        $date = date('Y-m-d');
        $user_level = $this->session->userdata('users_level');
        $user_id = $this->session->userdata('id');

        if ($user_level == 1 || $user_level == 2) {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans_history WHERE status = 'approved') a,
            (SELECT COUNT(*) as total_today FROM loans_history WHERE date LIKE '%$date%' AND status = 'approved') b")
                ->result();
        } else {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans_history as lh JOIN loans as lo ON lh.loans_id = lo.id WHERE lo.user_id = '$user_id' AND lh.status = 'approved') a,
            (SELECT COUNT(*) as total_today FROM loans_history as lh JOIN loans as lo ON lh.loans_id = lo.id WHERE lh.date LIKE '%$date%' AND lo.user_id = '$user_id' AND lh.status = 'approved') b")
                ->result();
        }
    }

    public function loans_loaned()
    {
        $date = date('Y-m-d');
        $user_level = $this->session->userdata('users_level');
        $user_id = $this->session->userdata('id');

        if ($user_level == 1 || $user_level == 2) {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans_history WHERE status = 'loaned') a,
            (SELECT COUNT(*) as total_today FROM loans_history WHERE date LIKE '%$date%' AND status = 'loaned') b")
                ->result();
        } else {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans_history as lh JOIN loans as lo ON lh.loans_id = lo.id WHERE lo.user_id = '$user_id' AND lh.status = 'loaned') a,
            (SELECT COUNT(*) as total_today FROM loans_history as lh JOIN loans as lo ON lh.loans_id = lo.id WHERE lh.date LIKE '%$date%' AND lo.user_id = '$user_id' AND lh.status = 'loaned') b")
                ->result();
        }
    }

    public function loans_completed()
    {
        $date = date('Y-m-d');
        $user_level = $this->session->userdata('users_level');
        $user_id = $this->session->userdata('id');

        if ($user_level == 1 || $user_level == 2) {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans_history WHERE status = 'returned') a,
            (SELECT COUNT(*) as total_today FROM loans_history WHERE date LIKE '%$date%' AND status = 'returned') b")
                ->result();
        } else {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans_history as lh JOIN loans as lo ON lh.loans_id = lo.id WHERE lo.user_id = '$user_id' AND lh.status = 'returned') a,
            (SELECT COUNT(*) as total_today FROM loans_history as lh JOIN loans as lo ON lh.loans_id = lo.id WHERE lh.date LIKE '%$date%' AND lo.user_id = '$user_id' AND lh.status = 'returned') b")
                ->result();
        }
    }

    public function loans_rejected()
    {
        $date = date('Y-m-d');
        $user_level = $this->session->userdata('users_level');
        $user_id = $this->session->userdata('id');

        if ($user_level == 1 || $user_level == 2) {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans_history WHERE status = 'rejected') a,
            (SELECT COUNT(*) as total_today FROM loans_history WHERE date LIKE '%$date%' AND status = 'rejected') b")
                ->result();
        } else {
            return $this->db->query("SELECT total_all, total_today FROM
            (SELECT COUNT(*) as total_all FROM loans_history as lh JOIN loans as lo ON lh.loans_id = lo.id WHERE lo.user_id = '$user_id' AND lh.status = 'rejected') a,
            (SELECT COUNT(*) as total_today FROM loans_history as lh JOIN loans as lo ON lh.loans_id = lo.id WHERE lh.date LIKE '%$date%' AND lo.user_id = '$user_id' AND lh.status = 'rejected') b")
                ->result();
        }
    }
}