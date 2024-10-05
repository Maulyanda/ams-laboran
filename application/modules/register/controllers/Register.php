<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

     function __construct()
     {
          parent::__construct();
          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');

          $this->load->model('Register_model', 'modelRegister');
          $this->load->model('Info_model');
     }

     function uploadKTP()
     {
          foreach ($_FILES as $name => $fileInfo) {
               $filename = $_FILES['file_identity_card']['name'];
               $tmpname = $_FILES['file_identity_card']['tmp_name'];
               $exp = explode('.', $filename);
               $ext = end($exp);
               $newname =  'KTP' . date('Ymdhis') . "." . $ext;
               $config['upload_path'] = './assets/berkas/ktp/';
               $config['upload_url'] =  base_url() . 'assets/berkas/ktp/';
               $config['allowed_types'] = "png|jpg|jpeg";
               $config['max_size'] = '2000';
               $config['file_name'] = $newname;
               $this->load->library('upload', $config);
               move_uploaded_file($tmpname, "assets/berkas/ktp/" . $newname);
               return $newname;
          }
     }

     function uploadKK()
     {
          foreach ($_FILES as $name => $fileInfo) {
               $filename = $_FILES['file_family_card']['name'];
               $tmpname = $_FILES['file_family_card']['tmp_name'];
               $exp = explode('.', $filename);
               $ext = end($exp);
               $newname =  'KK' . date('Ymdhis') . "." . $ext;
               $config['upload_path'] = './assets/berkas/kk/';
               $config['upload_url'] =  base_url() . 'assets/berkas/kk/';
               $config['allowed_types'] = "png|jpg|jpeg";
               $config['max_size'] = '2000';
               $config['file_name'] = $newname;
               $this->load->library('upload', $config);
               move_uploaded_file($tmpname, "assets/berkas/kk/" . $newname);
               return $newname;
          }
     }

     function uploadStore()
     {
          foreach ($_FILES as $name => $fileInfo) {
               $filename = $_FILES['file_store']['name'];
               $tmpname = $_FILES['file_store']['tmp_name'];
               $exp = explode('.', $filename);
               $ext = end($exp);
               $newname =  'STORE' . date('Ymdhis') . "." . $ext;
               $config['upload_path'] = './assets/berkas/store/';
               $config['upload_url'] =  base_url() . 'assets/berkas/store/';
               $config['allowed_types'] = "png|jpg|jpeg";
               $config['max_size'] = '2000';
               $config['file_name'] = $newname;
               $this->load->library('upload', $config);
               move_uploaded_file($tmpname, "assets/berkas/store/" . $newname);
               return $newname;
          }
     }

     function index()
     {
          $data['info'] = $this->Info_model->get_informations();
          $data['provinsi'] = $this->modelRegister->get_provinsi();

          $this->load->view("include/frontend/head", $data);
          $this->load->view('index', $data);
          $this->load->view("include/frontend/footer", $data);
          $this->load->view("include/alert");
     }

     // request data district berdasarkan id province yang dipilih
     function get_kabupaten()
     {
          if ($this->input->post('provinsi_id')) {
               echo $this->modelRegister->get_kabupaten($this->input->post('provinsi_id'));
          }
     }

     //request data district berdasarkan id kabupaten yang dipilih
     function get_kecamatan()
     {
          if ($this->input->post('kabupaten_id')) {
               echo $this->modelRegister->get_kecamatan($this->input->post('kabupaten_id'));
          }
     }

     public function leds()
     {
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('name', 'Name', 'required');
          $this->form_validation->set_rules('phone', 'Phone', 'required');
          $this->form_validation->set_rules('identity_card', 'Nik KTP', 'required');
          $this->form_validation->set_rules('family_card', 'Nik KK', 'required');
          $this->form_validation->set_rules('loan', 'Pinjaman', 'required');
          $this->form_validation->set_rules('home_address', 'Alamat Rumah', 'required');
          $this->form_validation->set_rules('home_rt', 'RT Rumah', 'required');
          $this->form_validation->set_rules('home_rw', 'RW Rumah', 'required');
          $this->form_validation->set_rules('home_no', 'Nomor Rumah', 'required');
          $this->form_validation->set_rules('business_address', 'Alamat Usaha', 'required');
          $this->form_validation->set_rules('business_rt', 'RT Usaha', 'required');
          $this->form_validation->set_rules('business_rw', 'RW Usaha', 'required');
          $this->form_validation->set_rules('business_no', 'Nomor Usaha', 'required');
          $this->form_validation->set_rules('province', 'Provinsi', 'required');
          $this->form_validation->set_rules('regency', 'Kabupaten/Kota', 'required');
          $this->form_validation->set_rules('district', 'Kecamatan', 'required');
          $this->form_validation->set_rules('postal_code', 'Kode Pos', 'required');

          $this->form_validation->set_rules('term_condition', 'Term Condition', 'required');

          if ($this->form_validation->run() == FALSE) {
               $this->session->set_flashdata('success', 'Hayoloh Anda Siapa ? :P');
               redirect();
          } else {
               $ktp = '';
               $store = '';
               $kk = '';

               if (!empty($_FILES['file_identity_card']['name'])) {
                    $newname = $this->uploadKTP();
                    $data['file_identity_card'] = $newname;
                    $ktp = $newname;
               }

               if (!empty($_FILES['file_store']['name'])) {
                    $newname = $this->uploadStore();
                    $data['file_store'] = $newname;
                    $store = $newname;
               }

               if (!empty($_FILES['file_family_card']['name'])) {
                    $newname = $this->uploadStore();
                    $data['file_family_card'] = $newname;
                    $store = $newname;
               }

               $x['email'] = $this->input->post('email');
               $x['name'] = $this->input->post('name');
               $x['phone'] = $this->input->post('phone');
               $x['identity_card'] = $this->input->post('identity_card');
               $x['family_card'] = $this->input->post('family_card');
               $x['loan'] = $this->input->post('family_card');
               $x['home_address'] = $this->input->post('home_address');
               $x['home_rt'] = $this->input->post('home_rt');
               $x['home_rw'] = $this->input->post('home_rw');
               $x['home_no'] = $this->input->post('home_no');

               $x['file_identity_card'] = base_url('assets/berkas/ktp/') . $ktp;
               $x['file_family_card'] = base_url('assets/berkas/kk/') . $kk;

               $x['business_address'] = $this->input->post('business_address');
               $x['business_rt'] = $this->input->post('business_rt');
               $x['business_rw'] = $this->input->post('business_rw');
               $x['business_no'] = $this->input->post('business_no');
               $x['province'] = $this->modelRegister->cekprovinsi($this->input->post('province'));
               $x['regency'] = $this->modelRegister->cekKabupaten($this->input->post('regency'));
               $x['district'] = $this->input->post('district');
               $x['postal_code'] = $this->input->post('postal_code');
               $x['file_store'] = base_url('assets/berkas/store/') . $store;

               if (
                    $x['regency'] == 'KOTA TANGERANG' ||
                    $x['regency'] == 'KABUPATEN TANGERANG' ||
                    $x['regency'] == 'KOTA TANGERANG SELATAN'
               ) {
                    $x['area'] = 'JABODETABEK - BANTEN';
               } else if (
                    $x['regency'] == 'KOTA JAKARTA UTARA' ||
                    $x['regency'] == 'KOTA JAKARTA SELATAN' ||
                    $x['regency'] == 'KOTA JAKARTA TIMUR' ||
                    $x['regency'] == 'KOTA JAKARTA BARAT' ||
                    $x['regency'] == 'KOTA JAKARTA PUSAT'
               ) {
                    $x['area'] = 'JABODETABEK - DKI JAKARTA';
               } else if (
                    $x['regency'] == 'KOTA BOGOR' ||
                    $x['regency'] == 'KABUPATEN BOGOR' ||
                    $x['regency'] == 'KOTA BEKASI' ||
                    $x['regency'] == 'KABUPATEN BEKASI' ||
                    $x['regency'] == 'KOTA DEPOK' ||
                    $x['regency'] == 'KABUPATEN KARAWANG'
               ) {
                    $x['area'] = 'JABODETABEK - JAWA BARAT';
               } else if (
                    $x['regency'] == 'KOTA SURABAYA' ||
                    $x['regency'] == 'KABUPATEN MOJOKERTO' ||
                    $x['regency'] == 'KOTA MOJOKERTO' ||
                    $x['regency'] == 'KABUPATEN GRESIK' ||
                    $x['regency'] == 'KABUPATEN SIDOARJO'
               ) {
                    $x['area'] = 'SURABAYA RAYA';
               } else if (
                    $x['regency'] == 'KOTA BANDUNG' ||
                    $x['regency'] == 'KABUPATEN BANDUNG' ||
                    $x['regency'] == 'KABUPATEN BANDUNG BARAT' ||
                    $x['regency'] == 'KOTA CIMAHI' ||
                    $x['regency'] == 'KABUPATEN SUMEDANG'
               ) {
                    $x['area'] = 'BANDUNG RAYA';
               } else if (
                    $x['province'] == 'KALIMANTAN UTARA' ||
                    $x['province'] == 'KALIMANTAN BARAT' ||
                    $x['province'] == 'KALIMANTAN SELATAN' ||
                    $x['province'] == 'KALIMANTAN TIMUR' ||
                    $x['province'] == 'KALIMANTAN TENGAH'
               ) {
                    $x['area'] = 'KALIMANTAN DAN SAMARINDA';
               } else {
                    $x['area'] = 'LAINNYA';
               }

               $kodeReferral = $this->input->post('referral_code');
               $kodeReferral2 = $this->input->post('referral_code2');
               if ($kodeReferral == 'LAINNYA') {
                    if ($kodeReferral2 == NULL) {
                         $x['referral_code'] = $this->input->post('referral_code');
                    } else {
                         $x['referral_code'] = strtoupper($this->input->post('referral_code2'));
                    }
               } else {
                    $x['referral_code'] = $this->input->post('referral_code');
               }

               // Cek Tanggal Lahir
               $a['tanggal_lahir'] = substr($x['identity_card'], 6, 2);
               if (intval($a['tanggal_lahir']) > 40) {
                    $a['tanggal_lahir'] = intval($a['tanggal_lahir']) - 40;
                    $gender = 'WANITA';
               } else {
                    $a['tanggal_lahir'] = intval($a['tanggal_lahir']);
                    $gender = 'PRIA';
               }

               // Cek Bulan Lahir
               $a['bulan_lahir'] = substr($x['identity_card'], 8, 2);

               $tahun_lahir = substr($x['identity_card'], 10, 2);
               $cek_tahun1 = substr($tahun_lahir, 0, 1);
               $cek_tahun2 = substr($tahun_lahir, 1, 2);

               if ($cek_tahun1 == 0) {
                    if (intval($cek_tahun2) <= 40) {
                         $a['tahun_lahir'] = '20' . $tahun_lahir;
                    } else {
                         $a['tahun_lahir'] = '19' . $tahun_lahir;
                    }
               } else {
                    if (intval($tahun_lahir) <= 40) {
                         $a['tahun_lahir'] = '20' . $tahun_lahir;
                    } else {
                         $a['tahun_lahir'] = '19' . $tahun_lahir;
                    }
               }

               $x['tanggal_lahir'] = $a['tahun_lahir'] . '-' . $a['bulan_lahir'] . '-' . $a['tanggal_lahir'];
               $x['gender'] = $gender;

               $x['created_at'] = date('Y-m-d H:i:s');
               $x['term_condition'] = $this->input->post('term_condition');

               $result = $this->modelRegister->leds($x);

               redirect();
          }
     }
}
