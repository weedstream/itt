<?php 

Class Fungsi {

    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    public function count_loket()
    {
        $this->ci->load->model('loket_m');
        return $this->ci->loket_m->get()->num_rows();
    }

    public function count_user()
    {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }

    public function count_antrianloket()
    {
        $this->ci->load->model('antrianloket_m');
        return $this->ci->antrianloket_m->getDay()->num_rows();
    }

    public function count_antriantotal()
    {
        $this->ci->load->model('antrianloket_m');
        return $this->ci->antrianloket_m->getAll()->num_rows();
    }

    // public function count_item()
    // {
    //     $this->ci->load->model('item_m');
    //     return $this->ci->item_m->get()->num_rows();
    // }
    // public function count_supplier()
    // {
    //     $this->ci->load->model('supplier_m');
    //     return $this->ci->supplier_m->get()->num_rows();
    // }
    // public function count_member()
    // {
    //     $this->ci->load->model('member_m');
    //     return $this->ci->member_m->get()->num_rows();
    // }
    // public function count_user()
    // {
    //     $this->ci->load->model('user_m');
    //     return $this->ci->user_m->get()->num_rows();
    // }
}