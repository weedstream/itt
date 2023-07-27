<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();     
        // check_admin();  
        $this->load->model('user_m');
        $this->load->model('loket_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
        
        $user = $this->user_m->get()->result();
        $userloket = $this->user_m->getUserLoket()->result();
        $data = array(
            'user' => $user,
            'userloket' => $userloket
        );
		$this->template->load('template', 'user/user_data', $data);
    }
    
    public function add()
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
            array('matches' => '%s tidak sesuai')
        );
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('loket_id', 'Loket_id');

        $this->form_validation->set_message('required', '%s Masih Kosong');
        $this->form_validation->set_message('min_length', '%s Minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s sudah ada');


        
        if($this->form_validation->run() == FALSE)
        {
            $loket = $this->loket_m->get()->result();
            $data = array(
                'loket' => $loket
            );
            $this->template->load('template', 'user/user_form_add', $data);
        } else {
            $post = $this->input->post(null, TRUE);
             $this->user_m->add($post);
            if($this->db->affected_rows() > 0){
                echo "<script>alert('Data Berhasil Di Simpan');</script>";
            }
            echo "<script>window.location='".site_url('user')."';</script>";
        }
    }

    public function del()
    {
        $id = $this->input->post('user_id');
        $this->user_m->del($id);

        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data Berhasil Di Hapus');</script>";
        }
        echo "<script>window.location='".site_url('user')."';</script>";

    }

    public function edit($id)
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        if($this->input->post('password')){
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]',
                array('matches' => '%s tidak sesuai')
            );
        } 
        if($this->input->post('passconf')){
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]',
                array('matches' => '%s tidak sesuai')
            );
        }
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s Masih Kosong');
        $this->form_validation->set_message('min_length', '%s Minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s sudah ada');


        
        if($this->form_validation->run() == FALSE)
        {
            $query = $this->user_m->get($id);
            if($query->num_rows() > 0){
                $data['row'] = $query->row();
                $this->template->load('template', 'user/user_form_edit', $data);
            } else {
                echo "<script>alert('Data Tidak Di Temukan');";
                echo "window.location='".site_url('user')."';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->edit($post);
            if($this->db->affected_rows() > 0){
                echo "<script>alert('Data Berhasil Di Simpan');</script>";
            }
            echo "<script>window.location='".site_url('user')."';</script>";
        }
    }

    function username_check(){
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if($query->num_rows > 0) {
            $this->form_validation->set_message('username_check', '%s sudah di pakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
