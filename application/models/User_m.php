<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function login($post) 
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }
    
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        // $this->db->join('loket','loket.loket_id=user.loket_id');
        if($id != null){
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getUserLoket()
    {
        $this->db->select('*');
        $this->db->from('user');
        // $this->db->join('loket','loket.loket_id=user.loket_id');
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['level'] = $post['level'];
        $params['loket_id'] = $post['loket_id'];
        $this->db->insert('user', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])){
            $params['password'] = sha1($post['password']);
        }
        $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['level'] = $post['level'];
        $params['loket_id'] = $post['loket_id'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }
}