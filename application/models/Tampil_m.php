<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tampil_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('loket');
        if($id != null){
            $this->db->where('loket_id', $id);
        }
        $query = $this->db->get();
        
        return $query;
    }

    public function getAll($id = null)
    {
        $nowDate = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('antrian_loket');
        $this->db->where('tgl_antrian_loket',$nowDate);
        $this->db->join('loket','loket.loket_id=antrian_loket.loket_id');
        $this->db->order_by('id_antrian_loket','ASC');
        if($id != null){
            $this->db->where('id_antrian_loket', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}