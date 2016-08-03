<?php

/**
 * Description of Users
 *
 * @author mubasharkk
 */
class Requests extends CI_Model{
    
    const TABLE = 'requests';
    
    static $officeLoc = array(
        1 => 'PHARMEVO',
        2 => 'FACTORY',
        3 => 'Other',
    );
    
    static $empType = array(
        1 => 'Colleague',
        2 => 'Contractor (MC)',
        3 => 'Third Party',
        4 => 'Services',
    );
    
    function getAll(){
        
        $this->db->order_by('created_at DESC');
        $query = $this->db->get(self::TABLE);
        
        return $query->result();
    }
    
    function create($data){
        
        $data['created_at'] = date('Y-m-d h:i:s');
        
        $this->db->insert(self::TABLE, $data);
        
    }
    
    function update($req_id, $data){
        
        $data['created_at'] = date('Y-m-d h:i:s');
        
        $this->db->where('req_id', $req_id);
        $this->db->update(self::TABLE, $data);
        
    }
    
    
    function getById($req_id){
        $this->db->where('req_id', $req_id);
        
        $query = $this->db->get(self::TABLE);
        
        return $query->row();
    }
    
}
