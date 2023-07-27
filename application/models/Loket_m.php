<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loket_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('loket');
        $this->db->order_by('name_loket', 'ASC');
        if($id != null){
            $this->db->where('loket_id', $id);
        }
        $query = $this->db->get();
        
        return $query;
    }

    public function get_id($table, $where){
		$this->db->where($where);
		$sql=$this->db->get($table);
		return $sql;
	}

    public function add($post)
    {
        $params['name_loket'] = $post['name_loket'];
        $params['kode_loket'] = $post['kode_loket'];
        $params['keterangan'] = $post['keterangan'];
        $this->db->insert('loket', $params);
    }

    public function del($id)
    {
        $this->db->where('loket_id', $id);
        $this->db->delete('loket');
    }

    public function edit($post)
    {
        $params['name_loket'] = $post['name_loket'];
        $params['keterangan'] = $post['keterangan'];
        $this->db->where('loket_id', $post['loket_id']);
        $this->db->update('loket', $params);
    }


}