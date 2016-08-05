<?php

/**
 * Description of Users
 *
 * @author mubasharkk
 */
class Users extends CI_Model{
    
    const TABLE = 'users';
    
    static $roles = array(
        'admin' => 'Administrator',
        'hr' => 'Human Resource Manager',
        'mis' => 'Manager Information Systems'
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
    
    
    static function displayRoles($role_ids){
        
        $role_ids = !is_array($role_ids) ? json_decode($role_ids) : $role_ids;
        
        return array_intersect_key(self::$roles, array_flip($role_ids));
        
    }
    
    
    function checkLogin($username, $pass){
        
        $this->db->where(array(
            'username' => $username,
            'password' => md5($pass)
        ));
        
        $query = $this->db->get(self::TABLE);
        
        return $query->row();
        
    }
    
    
    function isAuthorized (){
        
        $uid = $this->session->has_userdata('uid');
        
        return $uid ? TRUE : FALSE;
    }
}
