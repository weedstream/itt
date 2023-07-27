<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();  
        $this->load->model('antrianloket_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
        // $this->load->model('loket_m');
        $data['row'] = $this->antrianloket_m->getAll();
		$this->template->load('template', 'antrian/antrian_data', $data);
	}

    public function del()
    {
        $id = $this->input->post('antrian_id');
        $this->antrianloket_m->del($id);

        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data Berhasil Di Hapus');</script>";
        }
        echo "<script>window.location='".site_url('antrian')."';</script>";

    }
}
