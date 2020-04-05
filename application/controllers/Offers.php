<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

    public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('Offers_model', 'offers_model', TRUE);
		$this->load->model('User_model', 'user_model', TRUE);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->load->library('userlevel');
    }
	public function viewoffers(){
		$data = $this->session->userdata;
        if(empty($data)){
            redirect(site_url('main/login/'));
        }
        $data['title'] = "Offers List";
        $data['offers'] = $this->offers_model->getAllCoupns();
            $this->load->view('header', $data);
            $this->load->view('navbar', $data);
            $this->load->view('container');
            $this->load->view('offers', $data);
            $this->load->view('footer');
	}
    public function editoffers($offerid){
        $data = $this->session->userdata;
        $data['title'] = "Offers List";
        $data['editproduct'] = $this->offers_model->getCoupnById($offerid);
            $this->load->view('header', $data);
            $this->load->view('navbar');
            $this->load->view('container');
            $this->load->view('addoffer', $data);
            $this->load->view('footer');
    }
    public function deleteoffer(){
        $data = $this->session->userdata;
        if(empty($data)){
            redirect(site_url('main/login/'));
        }
        if(!empty($this->input->post('productid'))){
            if(!$this->offers_model->deleteCoupnById($this->input->post('productid'))) {
                $response = array('status'=>'success','message'=>'Offer detelted successfully.');
            }else{
                $response = array('status'=>'failed','message'=>'Sorry,Please try again.');
            }
            echo json_encode($response);
        }
    }
	public function addoffers(){
		$data = $this->session->userdata;
        if(empty($data['role'])){
            redirect(site_url('main/login/'));
        }
        $dataLevel = $this->userlevel->checkLevel($data['role']);
        $this->form_validation->set_rules('coupn_code', 'Coupn Code', 'required');
		$this->form_validation->set_rules('disc_amount', 'Discount Amount', 'required');
        $this->form_validation->set_rules('disc_type', 'Discount Type', 'required');
        $this->form_validation->set_rules('min_purchase_amt', 'Minimum Purchase Amount', 'required');
        $this->form_validation->set_rules('offer_status', 'Offer Status', 'required');
        
        $data['title'] = "Add Offer";
        if($this->input->post('row_id') > 0){
            $data['title'] = "Update Product";
        }
        if ($this->form_validation->run() == FALSE) {
			if($this->input->post('row_id') > 0){
				$this->session->set_flashdata('flash_message', 'Please fill all the details.');
                redirect(site_url('offers/editoffers/'.$this->input->post('row_id')),$data);
            }
            $this->load->view('header', $data);
            $this->load->view('navbar');
            $this->load->view('container');
            $this->load->view('addoffer', $data);
            $this->load->view('footer');
        }else{

         if($this->input->post('last_image') == '' OR $_FILES["product_img"]['name'] != ''){
             $new_name = time().$_FILES["product_img"]['name'];
             $config['file_name'] = $new_name;
             $config['upload_path']   = './public/offers_images/'; 
             $config['allowed_types'] = 'gif|jpg|png'; 
             $config['max_width']     = 6000; 
             $config['max_height']    = 6000;
             $this->load->helper('file');
             $this->load->library('upload', $config);
             $this->upload->initialize($config);  
             if ( ! $this->upload->do_upload('product_img')) {
                $error = array('error' => $this->upload->display_errors()); 
                redirect(site_url('offers/viewoffers/'),$error);
             } 
                $_POST['image_name'] = $new_name;
         }else{
                $_POST['image_name'] = $this->input->post('last_image');
         }   
            $post = $this->input->post(NULL, TRUE);
            if($this->input->post('row_id') > 0){
                if(!$this->offers_model->updateOffer($post)){
                    $this->session->set_flashdata('flash_message', 'There was a problem add new product');
                    redirect(site_url('offers/addoffers/'));
                }else{
                    $this->session->set_flashdata('success_message', 'Offers Updated Successfully.');
                    redirect(site_url('offers/viewoffers/'));
                }
            }else{
                if(!$this->offers_model->insertOffer($post)){
                    $this->session->set_flashdata('flash_message', 'There was a problem add new product');
                    redirect(site_url('offers/addoffers/'));
                }else{
                    $this->session->set_flashdata('success_message', 'Offers Saved Successfully.');
                    redirect(site_url('offers/viewoffers/'));
                }
            }
        }
	}
    public function checkduplicateoffer(){
        $data = $this->session->userdata;
        if(empty($data)){
            redirect(site_url('main/login/'));
        }
        if(!empty($this->input->post('offer_name'))){
            if($this->offers_model->findDuplicate($this->input->post('offer_name'),$this->input->post('row_id'))) {
                $response = array('status'=>'success','message'=>'Offer Name already Exits');
            }else{
                $response = array('status'=>'failed','message'=>'');
            }
            echo json_encode($response);
        }
    }
    public function applaycoupncode(){
        $data = $this->session->userdata;
        if(empty($data)){
            redirect(site_url('main/login/'));
        }
        if(!empty($this->input->post('coupnocde'))){
            $shipping = $this->user_model->getAllSettings();
            $TXN_AMOUNT = 0 + $shipping->shipping_charge;
            $current_cart = $this->cart->contents();
            $coupndetail= $this->offers_model->getCoupnById($this->input->post('coupnocde'));
            if(count($coupndetail) > 0){
                foreach($current_cart as $value){
                    $data['product_subtotal'] = $value['subtotal'];
                    $total =  $value['price'] * $value['qty'];
                    $TXN_AMOUNT += $total;
                }
                $TXN_AMOUNT;
                foreach($coupndetail as $coupn){
                    //1 Cash
                    //2 Percent
                    if($TXN_AMOUNT > $coupn->min_purchase_amt){
                        if($coupn->discount_type == 1){
                            $billamount = $TXN_AMOUNT - $coupn->disc_amount;
                            $discount_amount = $coupn->disc_amount;
                        }else if($coupn->discount_type == 2){
                            $billamount = $TXN_AMOUNT - ($TXN_AMOUNT * ($coupn->disc_amount/100));
                            $discount_amount = $TXN_AMOUNT - $billamount; 
                        }
                        $response = array('status' => 'success',
                                          'message' => 'Coupn Code Applied Succesfully.',
                                           'amount_data' => $billamount.'-'.$discount_amount
                                            );
                    }else{
                        $response = array('status' => 'failed',
                                           'message' => 'Not applicable for discount' );
                    }
                }
            }else{
                $response = array('status' => 'failed',
                                  'message' => 'Invalid Coupn Selection' );
            }
            echo json_encode($response );
        }
    }
}
  