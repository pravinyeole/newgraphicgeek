<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public $status; 
    public $roles;
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();        
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->banned_users = $this->config->item('banned_users');
    }    
    
    //insert user into database
    public function insertUser($d)
    {  
            $string = array(
                'first_name'=>$d['firstname'],
                'last_name'=>$d['lastname'],
                'email'=>$d['email'],
                'contact'=>$d['mobile'],
                'role'=>2, 
                'status'=>$this->status[0],
                'banned_users'=>$this->banned_users[0]
            );
            $q = $this->db->insert_string('users',$string);             
            $this->db->query($q);
            return $this->db->insert_id();
    }
    
    //check is duplicate
    public function isDuplicate($email)
    {     
        $this->db->get_where('users', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }
    public function isDuplicateContact($mobile)
    {     
        $this->db->get_where('users', array('contact' => $mobile), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }
    
    //insert the token
    public function insertToken($user_id)
    {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
        
    }
    
    //check if token is valid
    public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn, 
            'tokens.user_id' => $uid), 1);                         
               
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    }    
    
    //get user info
    public function getUserInfo($id)
    {
        $q = $this->db->select('t1.*, t2.u_state, t2.u_city, t2.u_address, t2.u_zipcode')
             ->from('users as t1')
             ->where('t1.id', $id)
             ->join('user_details as t2', 't1.id = t2.user_id', 'LEFT')
             ->get();

        // $q = $this->db->get_where('users', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }
    
    //getUserName
    public function getUserAllData($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email );
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;
        }
        else
        {
            error_log('no user found getUserAllData('.$email.')');
            return false;
        }
    }
    
    //update data user
    public function updateUserInfo($post)
    {
        $data = array(
               'password' => $post['password'],
               'last_login' => date('Y-m-d h:i:s A'), 
               'status' => $this->status[1]
            );
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$post['user_id'].')');
            return false;
        }
        
        $user_info = $this->getUserInfo($post['user_id']); 
        return $user_info; 
    }
    
    //check login
    public function checkLogin($post)
    {
        $this->load->library('password');       
        $this->db->select('*');
        $this->db->where('email', $post['email']);
        $query = $this->db->get('users');
        $userInfo = $query->row();
        $count = $query->num_rows();
        
        if($count == 1){
            if(!$this->password->validate_password($post['password'], $userInfo->password))
            {
                error_log('Unsuccessful login attempt('.$post['email'].')');
                return false;
            }else{
                $this->updateLoginTime($userInfo->id);
            }
        }else{
            error_log('Unsuccessful login attempt('.$post['email'].')');
            return false;
        }
        
        unset($userInfo->password);
        return $userInfo; 
    }
    
    //update time login
    public function updateLoginTime($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', array('last_login' => date('Y-m-d h:i:s A')));
        return;
    }
    
    //get user from email
    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('users', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }
    
    //update password
    public function updatePassword($post)
    {   
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', array('password' => $post['password'])); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    } 
    
    //add user login
    public function addUser($d)
    {  
            $string = array(
                'first_name'=>$d['firstname'],
                'last_name'=>$d['lastname'],
                'email'=>$d['email'],
                'contact'=>$d['mobile'],
                'password'=>$d['password'], 
                'role'=>$d['role'], 
                'status'=>$this->status[1]
            );
            $q = $this->db->insert_string('users',$string);             
            $this->db->query($q);
            return $this->db->insert_id();
    }
    
    //update profile user
    public function updateProfile($post)
    {   
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', array('password' => $post['password'], 'email' => $post['email'], 'first_name' => $post['firstname'], 'last_name' => $post['lastname'])); 
        $success = $this->db->affected_rows(); 

        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user_details', array('u_state' => $post['state'], 'u_city' => $post['city'], 'u_address' => $post['address'], 'u_zipcode' => $post['zip_code']) );
        $success = $this->db->affected_rows(); 

        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    }
    
    //update user level
    public function updateUserLevel($post)
    {   
        $this->db->where('email', $post['email']);
        $this->db->update('users', array('role' => $post['level'])); 
        $success = $this->db->affected_rows();
        
        if(!$success){
            return false;
        }        
        return true;
    }
    
    //update user ban
    public function updateUserban($post)
    {   
        $this->db->where('email', $post['email']);
        $this->db->update('users', array('banned_users' => $post['banuser'])); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            return false;
        }        
        return true;
    }
    
    //get email user
    public function getUserData()
    {   
        $query = $this->db->get('users');
        return $query->result();
    }
    
    //delete user
    public function deleteUser($id)
    {   
        $this->db->where('id', $id);
        $this->db->delete('users');
        
        if ($this->db->affected_rows() == '1') {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    
    //get settings
    public function getAllSettings()
    {
        $this->db->select('*');
        $this->db->from('settings');
        return $this->db->get()->row();

    }
     public function updateSettingCharge($charge){
         $this->db->set('shipping_charge', $charge);
         $this->db->update('settings');
         $this->db->where('id', 1);
        $success = $this->db->affected_rows(); 
        if(!$success){
            return false;
        }        
        return true;
    }
    //do change settings
    public function settings($post)
    {   
        $this->db->where('id', $post['id']);
        $this->db->update('settings', 
            array(
                'site_title' => $post['site_title'], 
                'timezone' => $post['timezone'],
                'recaptcha' => $post['recaptcha'],
                'theme' => $post['theme']
            )
        ); 
        $success = $this->db->affected_rows(); 
        if(!$success){
            return false;
        }        
        return true;
    }
    public function getLoginUserOrder($custid){
        $this->db->select('od.o_id,od.order_id,od.order_date,od.order_status,od.order_total,od.shipping_address');
        $this->db->from('user_order_details as od');
        $this->db->where('od.cust_id',3);
        //  $this->db->select('od.o_id,od.order_id,od.cust_id,od.order_total,od.shipping_address,od.order_date,od.order_status,pd.*');
        // $this->db->from('user_order_details as od');
        // $this->db->join('ordered_prod_details as pd','pd.order_id=od.order_id','LEFT');
        // $this->db->where('od.cust_id',$custid);
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = 'No details founc';
            return $row;
        }
    }
}
