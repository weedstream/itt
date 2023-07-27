<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ambil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['loket_m', 'antrian_m', 'antrianloket_m']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $loket = $this->loket_m->get()->result();
        $antrianl = $this->antrianloket_m->get()->result();
        $antrian = $this->antrian_m->get()->result();
        $data = array(
            'loket' => $loket,
            'antrian' => $antrian,
            'antrianloket' => $antrianl
        );
        $this->template->load('tempcard', 'card', $data);
    }

    public function saveAntrian($loket_id, $antri)
    {
        $tanggal = date("Y-m-d");
        $status = '<span class="label label-warning blok">Belum terlayani</span>';
        // $no_antrian_loket = $this->input->post('nomer_loket');
        $tambah = $antri + 1;

        $this->db->set('loket_id', $loket_id);
        $this->db->set('no_antrian_loket', $tambah);
        $this->db->set('status', $status);
        $this->db->set('tgl_antrian_loket', $tanggal);
        // $this->db->insert('antrian_loket');
        $this->db->query('CALL insert_antrian_loket( \''.$loket_id.'\',\''.$tanggal.'\', \''.$status.'\')');


        $this->db->set('tgl_antrian', $tanggal);
        $this->db->set('no_antrian', $tambah); 
        $this->db->set('loket_id', $loket_id);
        $this->db->query('CALL nambah_antrian(\''.$tanggal.'\', \''.$loket_id.'\')');


        // $this->db->insert('antrian');
        
        redirect('ambil/print/');
        // redirect('ambil');
    }

    public function print()
    {
        // $tanggal = date("Y-m-d");
        // $where =array('tgl_antrian_loket' => date('Y-m-d'));

        $loket = $this->loket_m->get()->result();
        $antrianl = $this->antrianloket_m->get()->result();
        $antrian = $this->antrian_m->get()->result();

        $data = array(
            'loket' => $loket,
            'antrian' => $antrian,
            'antrianloket' => $antrianl
            //           'antrian' => $antrian,
        );
        $this->load->view('print/print', $data);
    }
}
