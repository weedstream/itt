<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tampil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['loket_m', 'antrian_m', 'antrianloket_m', 'tampil_m']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $loket = $this->tampil_m->get()->result();
        $data = array(
            'loket' => $loket,
        );
        $data['row'] = $this->tampil_m->get();
        $this->template->load('template', 'tampil_antrian/tampil_data', $data);
    }

    public function priview()
    {
        $data['loket'] = $this->loket_m->get()->result();
        $this->template->load('template2', 'tampil_antrian/tampil_preview', $data);
    }

    public function get_antri()
    {
        $tanggal = date("Y-m-d"); 
        $loket_id = $this->input->post('loket_id');
		$data['antri'] = $this->antrianloket_m->get_nomer(['loket_id' => $loket_id, 'tgl_antrian_loket' => $tanggal ,'status' => '<span class="label label-danger">Terpanggil</span>'])->row();
		if($data > 0){
			echo json_encode($data);
		}
		else{
			echo "&nbsp;";
		}
    }

    public function petugas()
    {
        $id = $this->session->userdata('userid');
        $user = $this->user_m->get($id)->row();
        $data['antrian'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['antrianlo'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['antrianloket'] = $this->next(-1, $this->antrianloket_m->getPanggil($user->loket_id));
        $data['loket'] = $this->loket_m->get_id('loket', array('loket_id' => $this->session->userdata('loket_id')))->row();
        $data['row'] = $this->tampil_m->getAll();
        $this->template->load('template2', 'tampil_antrian/tampil_petugas', $data);
    }

    public function next($current, $data)
    {
        $temporary = null;

        if ($current != -1) {
            foreach ($data->result() as $value) {
                if ($temporary != null) {
                    return $value;
                }
                if ($current == $value->no_antrian_loket) {
                    $temporary = $current;
                }
            }

            return null;
        } else {
            return $data->row();
        }
    }

    public function getNext($noAntrian)
    {
        $id = $this->session->userdata('userid');
        $user = $this->user_m->get($id)->row();
        $data['antrian'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['antrianlo'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['antrianloket'] = $this->next($noAntrian, $this->antrianloket_m->getPanggil($user->loket_id));
        $data['loket'] = $this->loket_m->get_id('loket', array('loket_id' => $this->session->userdata('loket_id')))->row();
        $data['row'] = $this->tampil_m->getAll();

        $this->template->load('template2', 'tampil_antrian/tampil_petugas', $data);
    }

    public function sudah($id, $noAntrian)
    {
        $i = $this->session->userdata('userid');
        $user = $this->user_m->get($i)->row();
        $set = '<span class="label label-success">Sudah terlayani</span>';
        $params['status'] = $set;
        $this->db->where('id_antrian_loket', $id);
        $this->db->update('antrian_loket' ,$params);

        $data['antrian'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['antrianlo'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['antrianloket'] = $this->next($noAntrian, $this->antrianloket_m->getPanggil($user->loket_id));
        $data['loket'] = $this->loket_m->get_id('loket', array('loket_id' => $this->session->userdata('loket_id')))->row();
        $data['row'] = $this->tampil_m->getAll();

        $this->template->load('template2', 'tampil_antrian/tampil_petugas', $data);

    }

    public function batal($id, $noAntrian)
    {
        $i = $this->session->userdata('userid');
        $user = $this->user_m->get($i)->row();
        $set = '<span class="label label-danger">Di Batalkan</span>';
        $params['status'] = $set;
        $this->db->where('id_antrian_loket', $id);
        $this->db->update('antrian_loket' ,$params);

        $data['antrian'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['antrianlo'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['antrianloket'] = $this->next($noAntrian, $this->antrianloket_m->getPanggil($user->loket_id));
        $data['loket'] = $this->loket_m->get_id('loket', array('loket_id' => $i))->row();
        $data['row'] = $this->tampil_m->getAll();


        // redirect('tampil/getNext/', $data);
        $this->template->load('template2', 'tampil_antrian/tampil_petugas', $data);


        // echo $id;
    }

    public function updateStatus() {
        $data = $this->input->post(NULL, TRUE);

        $set = '<span class="label label-danger">Terpanggil</span>';
        $params['status'] = $set;
        $this->db->where(['loket_id' => $data['loket_id'], 'no_antrian_loket' => $data['no_antrian_loket']]);
        $result = $this->db->update('antrian_loket' ,$params);
        
        if ($result) {
            echo 'k';
        }

    }

    // public function refresh()
    // {
        
    //     refresh();
    // }
}
