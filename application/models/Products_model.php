<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public $status; 
    public $roles;
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();        
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->banned_users = $this->config->item('banned_users');
    }

    public function getAllProducts($typeid=''){
    	$this->db->select('*');
        $this->db->from('products');
		if(!empty($typeid)){
			 $this->db->where('p_type ',$typeid);
		}
        $this->db->where('stock_count >=','1');
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = array();
            return $row;
        }
    }
    public function getAllSubProducts($subactegory=''){
        $where = "FIND_IN_SET('".$subactegory."', p_sub_category)";  
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where($where);
        $this->db->where('stock_count >=','1');
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = array();
            return $row;
        }
    }
    public function getProductById($rowid){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('p_id',$rowid);
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = 'No details founc';
            return $row;
        }
    }
    public function deleteProductById($rowid){
        $this->db->where('p_id', $rowid);
        $this->db->delete('products');
        if ($this->db->affected_rows() == '1') {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    public function getSubCategory(){
        $this->db->select('*');
        $this->db->from('product_sub_category');
        $this->db->where('sub_c_status',1);
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = 'No details founc';
            return $row;
        }
    }
    public function insertOrderProduct($post_data){
        $string = array('order_id' => $post_data['order_id'],
                        'prod_id' => $post_data['product_id'],
                        'prod_qty' => $post_data['product_qty'],
                        'prod_price' => $post_data['product_price'],
                        'prod_name' => $post_data['product_name'],
                        'prod_image' => $post_data['prduct_image'] );
        
        $q = $this->db->insert_string('ordered_prod_details',$string);             
        $this->db->query($q);
        return $this->db->insert_id();
    }

    public function insertOrderDetails($post_data){
        $string = array('order_id' => $post_data['order_id'],
                        'cust_id' => $post_data['cust_id'],
                        'order_total' => $post_data['order_total'],
                        'used_promocode' => $post_data['used_promocode'],
                        'shipping_address' => $post_data['shipping_address'],
                        'order_date' => $post_data['order_date']
                         );
        $q = $this->db->insert_string('user_order_details',$string);             
        $this->db->query($q);
        return $this->db->insert_id();
    }

    public function insertProduct($post_data){
    	$string = array(
                'poster_id'=>$post_data['productid'],
			    'p_type'=>$post_data['producttype'],
                'p_sub_category'=> implode(',',$post_data['subcategory']),
                'p_name'=>$post_data['productname'],
                'p_image'=>$post_data['image_name'],
                'size'=>$post_data['productsize'],
                'discription'=>$post_data['productdesc'], 
                'p_price'=>$post_data['productprice'], 
                'stock_count'=>$post_data['productqty'], 
                'p_category'=>implode(',',$post_data['subcategory']), 
                'created_date'=> strtotime(date('d-m-Y')), 
                'status'=>1
            );
            $q = $this->db->insert_string('products',$string);             
            $this->db->query($q);
            return $this->db->insert_id();
    }
    public function updateProduct($post_data){
        $string = array(
                'poster_id'=>$post_data['productid'],
				'p_type'=>$post_data['producttype'],
                'p_sub_category'=>implode(',',$post_data['subcategory']),
                'p_name'=>$post_data['productname'],
                'p_image'=>$post_data['image_name'],
                'size'=>$post_data['productsize'],
                'discription'=>$post_data['productdesc'], 
                'p_price'=>$post_data['productprice'], 
                'stock_count'=>$post_data['productqty'], 
                'p_category'=>implode(',',$post_data['subcategory'])
            );
        $this->db->where('p_id', $post_data['row_id']);
        $this->db->update('products', $string); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updaterecord('.$post_data['row_id'].')');
            return false;
        }        
        return true;
    }
    public function getOrder($status = ''){
        $this->db->select('od.o_id,od.order_id,od.cust_id,od.order_total,od.shipping_address,od.order_date,od.order_status,u.email,u.first_name,u.last_name,u.contact,p.p_name,p.p_price,p.p_image,p.discription,p.brand,p.size');
        $this->db->from('user_order_details as od');
        $this->db->join('users as u','od.cust_id=u.id','LEFT');
        $this->db->join('ordered_prod_details as pd','pd.order_id=od.order_id','LEFT');
        $this->db->join('products as p','p.p_id=pd.prod_id','LEFT');
        if(isset($status) && $status != ''){
            $this->db->where('od.order_status',$status);
        }
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = 'No details founc';
            return $row;
        }
    }

    public function getOrderProductDetails($orderid){
        $this->db->select('*');
        $this->db->from('ordered_prod_details');
        $this->db->where('order_id',$orderid);
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = array();
            return $row;
        }
    }
	public function getuserdetail($orderid){
        $this->db->select('u.first_name,u.last_name,u.contact,u.email,ud.u_state,ud.u_city,ud.u_address,ud.u_zipcode,uod.order_id,uod.order_date,uod.order_payment_status');
        $this->db->from('users as u');
        $this->db->join('user_details as ud','ud.user_id=u.id','LEFT');
        $this->db->join('user_order_details as uod','u.id=uod.cust_id','LEFT');
        $this->db->where('uod.order_id',$orderid);
        $query = $this->db->get();
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = array();
            return $row;
        }
    }
    public function getSerachResult($str){
        $query = $this->db->query("SELECT `p`.* FROM `products` as `p` LEFT JOIN `product_sub_category` as `ps` ON `p`.`p_sub_category`=`ps`.`sub_c_id` WHERE `p`.`p_name` LIKE '%".$str."%' OR `ps`.`sub_c_name` LIKE '%".$str."%' ");
        if ( $query->num_rows() > 0 ){
            $row = $query->result();
            return $row;
        }else{
            $row = array();
            return $row;
        }
    }
    public function updateorderstatus($postdata){
        $oid = $postdata['oid'];
        $statusid = $postdata['statusid'];
        $query = $this->db->query('UPDATE user_order_details SET order_status='.$statusid.' WHERE o_id='.$oid);
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updaterecord('.$post_data['row_id'].')');
            return false;
        }        
        return true;
    }
}