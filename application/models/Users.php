<?php

/**
 * Description of Users
 *
 * @author mubasharkk
 */
class Users extends CI_Model{
    
    const TABLE = 'users';
    
    static $roles = array(
        1 => 'Administrator',
        2 => 'Human Resource Manager',
        3 => 'Manager Information Systems'
    );        
    
    function getAll(){
        $query = $this->db->get(self::TABLE);
        
        return $query->result();
    }
    
    function create($data){
        
        $data['created_at'] = date('Y-m-d h:i:s');
        $data['password'] = md5($data['password']);
        
        $this->db->insert(self::TABLE, $data);
        
    }
    
    function update($uid, $data){
        
        $data['created_at'] = date('Y-m-d h:i:s');
        $data['password'] = md5($data['password']);
        
        $this->db->where('uid', $uid);
        $this->db->update(self::TABLE, $data);
        
    }
    
    
    function getById($uid){
        $this->db->where('uid', $uid);
        
        $query = $this->db->get(self::TABLE);
        
        return $query->row();
    }
    
}
