<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loket extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();     
        // check_admin();  
        $this->load->model('loket_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['row'] = $this->loket_m->get();
		$this->template->load('template', 'loket/loket_data', $data);
	}

    public function add()
	{
		$this->form_validation->set_rules('name_loket', 'Name_loket', 'required|is_unique[loket.name_loket]');
        $this->form_validation->set_rules('kode_loket', 'Kode_loket', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $this->form_validation->set_message('is_unique', '%s sudah ada');

        if($this->form_validation->run() == FALSE)
        {
            $this->template->load('template', 'loket/loket_form_add');
        } else {
            $post = $this->input->post(null, TRUE);
             $this->loket_m->add($post);
            if($this->db->affected_rows() > 0){
                echo "<script>alert('Data Berhasil Di Simpan');</script>";
            }
            echo "<script>window.location='".site_url('loket')."';</script>";
        }
    }

    public function del()
    {
        $id = $this->input->post('loket_id');
        $this->loket_m->del($id);

        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data Berhasil Di Hapus');</script>";
        }
        echo "<script>window.location='".site_url('loket')."';</script>";

    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name_loket', 'Name', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $query = $this->loket_m->get($id);
            if($query->num_rows() > 0){
                $data['row'] = $query->row();
                $this->template->load('template', 'loket/loket_form_edit', $data);
            } else {
                echo "<script>alert('Data Tidak Di Temukan');";
                echo "window.location='".site_url('loket')."';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->loket_m->edit($post);
            if($this->db->affected_rows() > 0){
                echo "<script>alert('Data Berhasil Di Simpan');</script>";
            }
            echo "<script>window.location='".site_url('loket')."';</script>";
        }
    }


    // public function process()
	// {
	// 	$post = $this->input->post(null, TRUE);
	// 	if(isset($_POST['add'])) {
	// 		$this->loket_m->add($post);
	// 	} else if(isset($_POST['edit'])) {
	// 		$this->loket_m->edit($post);
	// 	}

	// 	if($this->db->affected_rows() > 0){
    //         echo "<script>alert('Data Berhasil Di Simpan');</script>";
    //     }
    //     echo "<script>window.location='".site_url('loket')."';</script>";
    // }
}
