<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers_model extends CI_Model {

    public $status; 
    public $roles;
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();        
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->banned_users = $this->config->item('banned_users');
    }
    public function getUsedCoupns($userid){
        $this->db->select('GROUP_CONCAT(used_promocode) as usedcodes');
        $this->db->from('user_order_details');
        $this->db->where('cust_id',$userid);
        $this->db->where('order_payment_status',1);
        $this->db->group_by('cust_id');
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = array();
            return $row;
        }
    }
    public function getAllCoupns($status = '',$usedcoupns=''){
    	$this->db->select('toc.*');
        $this->db->from('tbl_offers_coupn as toc');
        if(!empty($status) && $status > 0){
            if(count($usedcoupns)){
		        $this->db->where_not_in('toc.c_id',explode(',',$usedcoupns[0]->usedcodes));
            }
          $this->db->where('toc.offer_status',$status);
        }else{
          $this->db->where('toc.offer_status !=',3);
        }
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = array();
            return $row;
        }
    }
    public function updateOffer($post_data){
            $string = array(
                'coupn_code'=>$post_data['coupn_code'],
                'discount_type'=>$post_data['disc_type'],
                'disc_amount'=>$post_data['disc_amount'],
                'min_purchase_amt'=>$post_data['min_purchase_amt'],
                'offer_image'=>$post_data['image_name'],
                'offer_status'=>$post_data['offer_status'],
                'description'=>$post_data['description']
            );
        $this->db->where('c_id', $post_data['row_id']);
        $this->db->update('tbl_offers_coupn', $string); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updaterecord('.$post_data['row_id'].')');
            return false;
        }        
        return true;
    }
    public function insertOffer($post_data){
        $string = array(
                'coupn_code'=>$post_data['coupn_code'],
                'discount_type'=>$post_data['disc_type'],
                'disc_amount'=>$post_data['disc_amount'],
                'min_purchase_amt'=>$post_data['min_purchase_amt'],
                'offer_image'=>$post_data['image_name'],
                'offer_status'=>$post_data['offer_status'],
                'description'=>$post_data['description']
            );
            $q = $this->db->insert_string('tbl_offers_coupn',$string);             
            $this->db->query($q);
            return $this->db->insert_id();
    }
    public function getCoupnById($offerid){
        $this->db->select('*');
        $this->db->from('tbl_offers_coupn');
        $this->db->where('c_id', $offerid);
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = array();
            return $row;
        }
    }
    public function deleteCoupnById($cid){
        $this->db->where('c_id', $cid);
        $this->db->update('tbl_offers_coupn', array('offer_status' => 3)); 
        if ($this->db->affected_rows() == '1') {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    public function findDuplicate($offer_name,$row_id){
        $this->db->select('*');
        $this->db->from('tbl_offers_coupn');
        $this->db->where('coupn_code', $offer_name);
        $this->db->where('c_id !=', $row_id);
        $this->db->where('offer_status !=', 3);
        $query = $this->db->get();
        return $query->num_rows();
    }
}