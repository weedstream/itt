<?php defined('BASEPATH') or exit('No direct script access allowed');

class AntrianLoket_m extends CI_Model
{

    public function get($id = null)
    {
        $nowDate = date('Y-m-d');
        $this->db->limit('1');
        $this->db->select('*');
        $this->db->from('antrian_loket');
        $this->db->where('tgl_antrian_loket', $nowDate);
        $this->db->join('loket', 'loket.loket_id=antrian_loket.loket_id');
        $this->db->order_by('id_antrian_loket', 'DESC');
        if ($id != null) {
            $this->db->where('id_antrian_loket', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function getPanggil($loketId = null)
    {
        $nowDate = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('antrian_loket');
        $this->db->where('tgl_antrian_loket', $nowDate);
        $this->db->join('loket', 'loket.loket_id=antrian_loket.loket_id');
        $this->db->order_by('id_antrian_loket', 'ASC');
        if ($loketId != null) {
            $this->db->where('antrian_loket.loket_id', $loketId);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getAntrianByLoketId($loketId = null)
    {
        $nowDate = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('antrian_loket');
        $this->db->where('tgl_antrian_loket', $nowDate);
        $this->db->join('loket', 'loket.loket_id=antrian_loket.loket_id');
        $this->db->order_by('id_antrian_loket', 'ASC');
        if ($loketId != null) {
            $this->db->where('antrian_loket.loket_id', $loketId);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getDay($id = null)
    {
        $nowDate = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('antrian_loket');
        $this->db->where('tgl_antrian_loket', $nowDate);
        $this->db->join('loket', 'loket.loket_id=antrian_loket.loket_id');
        $this->db->order_by('id_antrian_loket', 'DESC');
        if ($id != null) {
            $this->db->where('id_antrian_loket', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getAll($id = null)
    {
        // $nowDate = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('antrian_loket');
        $this->db->join('loket', 'loket.loket_id=antrian_loket.loket_id');
        // $this->db->where('tgl_antrian_loket');
        if ($id != null) {
            $this->db->where('id_antrian_loket', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_nomer($where)
    {
        $tanggal = date("Y-m-d");
        $this->db->select_max('no_antrian_loket');
        $this->db->where($where);
        $this->db->where('tgl_antrian_loket', $tanggal);
        // $this->db->where($tanggal);
        return $this->db->get('antrian_loket');
    }

    // public function get_nomer($procedure_name, $params) {
    //     $query = "CALL $procedure_name($params)";
    //     $result = $this->db->query($query);
    //     return $this->db->get('antrian_loket');
    // }

    public function getAntrian()
    {
        $nowDate = date('Y-m-d');
        // $this->db->limit('1');
        $this->db->select('*');
        $this->db->from('antrian_loket');
        $this->db->where('no_antrian_loket');
        // $this->db->order_by('no_antrian_loket','DESC');
        // if($id != null){
        //     $this->db->where('id_antrian_loket', $id);
        // }
        $query = $this->db->get();
        return $query;
    }

    // public function add($post)
    // {
    //     $params['id_antrian'] = $post['id_antrian'];
    //     $params['loket_id'] = $post['loket_id'];
    //     $params['no_antrian_loket'] = $post['no_antrian_loket'];
    //     $this->db->insert('antrian_loket', $params);
    // }

    public function del($id)
    {
        $this->db->where('id_antrian_loket', $id);
        $this->db->delete('antrian_loket');
    }
}
