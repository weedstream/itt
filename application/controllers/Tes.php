<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

	// function __construct()
    // {
    //     parent::__construct();
    //     check_not_login();     
    //     check_admin();
    // }
    // function __construct()
    // {
    //     
    // }

	public function index()
	{
        $this->load->model('loket_m');
        $data['row'] = $this->loket_m->get();
		$this->template->load('tempcard', 'card', $data);
        // $this->load->view('card');
	}
}
