<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
        $this->load->model('Products_model', 'products_model', TRUE);
        $this->load->library('form_validation');
        $this->load->helper('file'); 
        $this->load->library('upload');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->load->library('userlevel');
    }

    public function productlist(){
        $data = $this->session->userdata;
        if(empty($data)){
            redirect(site_url('main/login/'));
        }
        $data['title'] = "Product List";
        $data['products'] = $this->products_model->getAllProducts();
            $this->load->view('header', $data);
            $this->load->view('navbar', $data);
            $this->load->view('container');
            $this->load->view('products', $data);
            $this->load->view('footer');
    }
    public function productadd($id = ''){
        $data = $this->session->userdata;
        if(empty($data)){
            redirect(site_url('main/login/'));
        }
        if(!empty($id)){
            $data['editproduct'] = $this->products_model->getProductById($id);
        }else{
            $data['editproduct'] = '';
        }
        $data['subCategory'] = $this->products_model->getSubCategory();
        $data['title'] = "Add Product";
            $this->load->view('header', $data);
            $this->load->view('navbar', $data);
            $this->load->view('container');
            $this->load->view('addproduct', $data);
            $this->load->view('footer');
    }
    public function productdelete($id){
        $data = $this->session->userdata;
        if(empty($data)){
            redirect(site_url('main/login/'));
        }
        if(!empty($id)){
            if(!$this->products_model->deleteProductById($id)){
                $this->session->set_flashdata('flash_message', 'Product deleted successfuly.');
            }else{
                $this->session->set_flashdata('success_message', 'New product has been added.');
            }
            redirect(site_url('products/productlist/'));
        }
    }
    public function addproduct(){
        $data = $this->session->userdata;
        if(empty($data['role'])){
            redirect(site_url('main/login/'));
        }
        $dataLevel = $this->userlevel->checkLevel($data['role']);
        $this->form_validation->set_rules('productid', 'Product ID', 'required');
		$this->form_validation->set_rules('producttype', 'Product Type', 'required');
        // $this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
        $this->form_validation->set_rules('productname', 'Product Name', 'required');
        $this->form_validation->set_rules('productsize', 'Product Size', 'required');
        $this->form_validation->set_rules('productdesc', 'Description', 'required');
        $this->form_validation->set_rules('productprice', 'Product Price', 'required');
        $this->form_validation->set_rules('productqty', 'Product Quantity', 'required');
        // $this->form_validation->set_rules('productcategory', 'Select Category', 'required');
        $data['title'] = "Add Product";
        if($this->input->post('row_id') > 0){
            $data['title'] = "Update Product";
        }
        if ($this->form_validation->run() == FALSE) {
            $data['subCategory'] = $this->products_model->getSubCategory();
			if($this->input->post('row_id') > 0){
				$this->session->set_flashdata('flash_message', 'Please fill all the details.');
                redirect(site_url('products/productadd/'.$this->input->post('row_id')),$data);
            }
            $this->load->view('header', $data);
            $this->load->view('navbar');
            $this->load->view('container');
            $this->load->view('addproduct', $data);
            $this->load->view('footer');
        }else{

         if($this->input->post('last_image') == '' OR $_FILES["product_img"]['name'] != ''){
             $new_name = str_replace(' ','',time().$_FILES["product_img"]['name']);
             $config['file_name'] = $new_name;
             $config['upload_path']   = './public/poster_images/'; 
             $config['allowed_types'] = 'gif|jpg|png'; 
             $config['max_width']     = 6000; 
             $config['max_height']    = 6000;
             $this->load->helper('file');
             $this->load->library('upload', $config);
             $this->upload->initialize($config);  
             if ( ! $this->upload->do_upload('product_img')) {
                $error = array('error' => $this->upload->display_errors()); 
                redirect(site_url('products/productlist/'),$error);
             } 
                $_POST['image_name'] = $new_name;
         }else{
                $_POST['image_name'] = $this->input->post('last_image');
         }   
            $post = $this->input->post(NULL, TRUE);
            if($this->input->post('row_id') > 0){
                if(!$this->products_model->updateProduct($post)){
                    $this->session->set_flashdata('flash_message', 'There was a problem add new product');
                    redirect(site_url('products/productadd/'));
                }else{
                    $this->session->set_flashdata('success_message', 'Product has been updated.');
                    redirect(site_url('products/productlist/'));
                }
            }else{
                if(!$this->products_model->insertProduct($post)){
                    $this->session->set_flashdata('flash_message', 'There was a problem add new product');
                    redirect(site_url('products/productadd/'));
                }else{
                    $this->session->set_flashdata('success_message', 'New product has been added.');
                    redirect(site_url('products/productlist/'));
                }
            }
        }
    }
	    public function newOrders(){
        $data = $this->session->userdata;
        $data['role'];
        $data['title'] = "New Orders";
        $data['orderlist'] = $this->products_model->getOrder(1);
        $this->load->view('header', $data);
        $this->load->view('navbar');
        $this->load->view('container');
        $this->load->view('listorders', $data);
        $this->load->view('footer');
    }
    public function complteOrder(){
        $data = $this->session->userdata;
        $data['role'];
        $data['title'] = "Completed Orders";
        $data['orderlist'] = $this->products_model->getOrder(2);
        $this->load->view('header', $data);
        $this->load->view('navbar');
        $this->load->view('container');
        $this->load->view('listorders', $data);
        $this->load->view('footer');
    }
    // public function updateProduct(){
    //     //$data = $this->products_model->getProductById($_POST['rowid']);
    //     $this->productadd($_POST['rowid']);
    // }
	public function viewInvoice($orderid){
        $result = $this->user_model->getAllSettings();
        $data['shipping_charge'] = $result->shipping_charge;
        $data['userdata'] = $this->products_model->getuserdetail($orderid);
        $resultRow = $this->products_model->getOrderProductDetails($orderid);
        if(count($resultRow) > 0){
            foreach($resultRow as $value){
                $response[] = $value;
            }
        }else{
            $response = array();
        }
        $data['response'] = $response;
        $this->load->view('invoice',$data);
    }
	public function productview($productid){
       $data['editproduct'] = $this->products_model->getProductById($productid); 
       $data['title'] = "View Product";
            $this->load->view('home/viewproduct', $data);
            $this->load->view('home/footer');
    }
    public function searchreasult(){
        $data = $this->session->userdata;
        $data['searchresult'] = $this->products_model->getSerachResult($this->input->post('search_value')); 
        $data['search_value'] = $this->input->post('search_value');
        $this->load->view('home/searchresult',$data);
        $this->load->view('home/footer');
    }
    public function changeOrderStatus(){
        if($this->products_model->updateorderstatus($_POST)){
            echo json_encode(array('status'=>'success','message'=>'Status Changes Successfully.'));
        }else{
            echo json_encode(array('status'=>'failed','message'=>'Status Changes Failed.'));
        }

    }
}