<?php
class Register_model extends CI_Model{

    public function getJawaraLeds(){
        return $this->db->select('*')->from('leads')->get()->result();
    }

    public function cekNIK($nik){
        return $this->db->where('identity_card', $nik)->get('leads')->result();
    }

    public function cekEmail($email){
        return $this->db->where('email', $email)->get('leads')->result();
    }

    public function leds($data){

        $cekNik = $this->cekNik($data['identity_card']);
        $cekEmail = $this->cekEmail($data['email']);
        $cekPhone = $this->cekEmail($data['phone']);

        if($cekNik == NULL){
            if($cekEmail == NULL){
                if($cekPhone == NULL){
                    $this->db->insert('leads', $data);
                    $this->session->set_flashdata('success','REGISTRASI BERHASIL, MOHON MENUNGGU TINDAK LANJUTNYA DARI TEAM KAMI');
                    return TRUE;
                }else{
                    $this->session->set_flashdata('success','REGISTRASI GAGAL, NOMOR HANDPHONE YANDA ANDA MASUKKAN SUDAH TERDAFTAR');
                    return FALSE;
                }
            }else{
                $this->session->set_flashdata('success','REGISTRASI GAGAL, EMAIL YANDA ANDA MASUKKAN SUDAH TERDAFTAR');
                return FALSE;
            }
        }else{
            $this->session->set_flashdata('success','REGISTRASI GAGAL, NIK KTP ANDA SUDAH TERDAFTAR');
            return FALSE;
        }
    }

    public function awalan($data){
        return $this->db->insert('leads_awal', $data);
    }

    function get_provinsi()
    {
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('provinces');
        return $query->result();
    }

    function get_kabupaten($provinsi_id)
    {
        //ambil data kabupaten berdasarkan id provinsi yang dipilih
        $this->db->where('province_id', $provinsi_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('regencies');

        $output = '<option value="">-- Pilih Kabupaten --</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        //return data kabupaten
        return $output;
    }

    function get_kecamatan($kabupaten_id)
    {
        //ambil data kecamatan berdasarkan id kabupaten yang dipilih
        $this->db->where('regency_id', $kabupaten_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('districts');

        $output = '<option value="">-- Pilih Kecamatan --</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->name . '">' . $row->name . '</option>';
        }
        //return data kecamatan
        return $output;
    }

    function cekProvinsi($prov){
        return $this->db->where('id', $prov)->get('provinces')->result()[0]->name;
    }

    function cekKabupaten($kab){
        return $this->db->where('id', $kab)->get('regencies')->result()[0]->name;
    }

}
?>