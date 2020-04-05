<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."third_party/paytmlib/config_paytm.php");
require_once(APPPATH."third_party/paytmlib/encdec_paytm.php");

class Graphicmain extends CI_Controller {

    public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
        $this->load->model('Products_model', 'products_model', TRUE);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->load->library('userlevel');
    }

    //index dasboard
    public function contact()
    {
            $this->load->view('home/contact');
            $this->load->view('home/footer');
    }
    public function shop()
    {
            $data['products'] = $this->products_model->getAllProducts();
            $this->load->view('home/shop',$data);
            $this->load->view('home/footer');
    }

    public function index()
    {
        $data['products'] = $this->products_model->getAllProducts();
            $this->load->view('home/header');
            $this->load->view('home/index_index',$data);
            $this->load->view('home/footer');
    }

    public function placeorder(){
        $data = $this->session->userdata;
        $data['groups'] = $this->user_model->getUserInfo($data['id']);
        $data['title'] = "Placeorder";
            $this->load->view('header', $data);
            $this->load->view('navbar', $data);
            $this->load->view('container');
            $this->load->view('home/placeorder', $data);
            $this->load->view('footer');   
    }

    public function add_to_cart(){ 
       $current_cart = $this->cart->contents();
       $key = array_search($this->input->post('product_id'), array_column($current_cart, 'id'));
        if($key){
            foreach ($current_cart as $item) {
                if ( $item['id'] == $this->input->post('product_id') ) {
                    $data = array('rowid'=>$item['rowid'],'qty'=> 0 );
                    $this->cart->update($data);
                    }
                }
            }
        $data = array(
            'id' => $this->input->post('product_id'), 
            'price' => $this->input->post('product_price'), 
            'qty' => $this->input->post('quantity'),
            'name' =>  $this->input->post('product_name'),
            'image' =>  $this->input->post('product_image'),
        );
        if($this->cart->insert($data)){
            $result = array('status' => 'success', 'message'=>'Cart updated successfully.'); 
        }else{
            $result = array('status' => 'error', 'message'=>'Please try again.'); 
        }        
           echo json_encode($result);
           die();
    }

    public function deleteItem(){
        $data = array('rowid'=>$this->input->post('rowid'),'qty'=> 0 );
        if($this->cart->update($data)){
            $result = array('status' => 'success', 'message'=>'Cart updated successfully.'); 
        }else{
            $result = array('status' => 'error', 'message'=>'Please try again.'); 
        }        
        echo json_encode($result);
        die();
    }
    public function updateItem(){
        $data = array('rowid'=>$this->input->post('rowid'),'qty'=> $this->input->post('p_count') );
        if($this->cart->update($data)){
            $result = array('status' => 'success', 'message'=>'Cart updated successfully.'); 
        }else{
            $result = array('status' => 'error', 'message'=>'Please try again.'); 
        }        
        echo json_encode($result);
        die();
    }

    public function paytm()
        {
          $this->load->view('TxnTest');
        }

    public function PaytmGateway()
        {

         // following files need to be included
         require_once(APPPATH . "/third_party/paytmlib/config_paytm.php");
         require_once(APPPATH . "/third_party/paytmlib/encdec_paytm.php");

        $checkSum = "";
        $paramList = array();

        $ORDER_ID = rand(10000,99999999); 
        // $CUST_ID = 1; echo "<br>";
        // $INDUSTRY_TYPE_ID = 'Retail'; echo "<br>";
        // $CHANNEL_ID = 'WEB'; echo "<br>";
        // $TXN_AMOUNT = '1'; echo "<br>";
        $TXN_AMOUNT = 0;
        $current_cart = $this->cart->contents();
        //print_r($current_cart);
        foreach($current_cart as $value){
            $data['order_id'] = $ORDER_ID;
            $data['product_id'] = $value['id']; 
            $data['product_price'] = $value['price']; 
            $data['product_qty'] = $value['qty']; 
            $data['product_name'] = $value['name']; 
            $data['prduct_image'] = $value['image']; 
            $data['product_subtotal'] = $value['subtotal'];

            $total =  $value['price'] * $value['qty'];
            $TXN_AMOUNT += $total;
            
            // $this->products_model->insertOrderProduct($data);
        }

        // Create an array having all required parameters for creating checksum.
         $paramList["MID"] =PAYTM_MERCHANT_MID;
         $paramList["ORDER_ID"] = $ORDER_ID;
         $paramList["CUST_ID"] = $_POST['CUST_ID'];
         $paramList["INDUSTRY_TYPE_ID"] = 'RETAIL';
         $paramList["CHANNEL_ID"] = 'WEB';
         $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
         $paramList["WEBSITE"] =PAYTM_MERCHANT_WEBSITE;
         $paramList["CALLBACK_URL"]    = site_url().'graphicmain/PaytmResponse';
         $paramList["MSISDN"] = $_POST['contact']; //Mobile number of customer
         $paramList["VERIFIED_BY"] = $_POST['contact']; // Verified by

         /*
         $paramList["EMAIL"] = $EMAIL; //Email ID of customer
         $paramList["IS_USER_VERIFIED"] = "YES"; //

         */
         $data['order_id'] = $ORDER_ID;
         $data['cust_id'] = $_POST['CUST_ID'];
         $data['order_total'] = $ORDER_ID;
         $data['shipping_address'] = $ORDER_ID;
         $data['order_date'] = strtotime(date('d-m-Y'));
         $data['shipping_address'] = $_POST['address'].' * '.$_POST['city'].' * '.$_POST['state'].' * '.$_POST['zip_code'];
        $this->products_model->insertOrderDetails($data);
        //Here checksum string will return by getChecksumFromArray() function.
         $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

         echo "<html>
        <head>
        <title>Merchant Check Out Page</title>
        </head>
        <body>
            <center><h1>Please do not refresh this page...</h1></center>
                <form method='post' action='".PAYTM_TXN_URL."' name='f1'>
        <table border='1'>
         <tbody>";

         foreach($paramList as $name => $value) {
         echo '<input type="hidden" name="' . $name .'" value="' . $value .         '">';
         }

         echo "<input type='hidden' name='CHECKSUMHASH' value='". $checkSum . "'>
         </tbody>
        </table>
        <script type='text/javascript'>
         document.f1.submit();
        </script>
        </form>
        </body>
        </html>";
    }

    public function PaytmResponse()
    {
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";
        $insert_data = array();
        $paramList = $_POST;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
        
        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
        
       if($isValidChecksum == "TRUE")
       {
           if ($_POST["STATUS"] == "TXN_SUCCESS")
           { /// put your to save into the database // tansaction successfull
               //var_dump($paramList);

               //echo '<pre>';print_r($paramList);
                $insert_data['orderID'] = $_POST['ORDERID'];
                $insert_data['mID'] = $_POST['MID'];
                $insert_data['txnID'] = $_POST['TXNID'];
                $insert_data['txnAmount'] = $_POST['TXNAMOUNT'];
                $insert_data['paymentMode'] = $_POST['PAYMENTMODE'];
                $insert_data['currency'] = $_POST['CURRENCY'];
                $insert_data['txnDate'] = date('Y-m-d H:i:s',strtotime($_POST['TXNDATE']));
                $insert_data['txnStatus'] = $_POST['STATUS'];
                $insert_data['respCode'] = $_POST['RESPCODE'];
                $insert_data['respMsg'] = $_POST['RESPMSG'];
                $insert_data['getwayName'] = $_POST['GATEWAYNAME'];
                $insert_data['bankTxnID'] = $_POST['BANKTXNID'];
                $insert_data['bankName'] = $_POST['BANKNAME'];
                $insert_data['checksumHash'] = $_POST['CHECKSUMHASH'];
                $insert_data['dateAdded'] = date('Y-m-d H:i:s');
                if($this->db->insert('payment_response',$insert_data))
                {
                    $this->cart->destroy();
                    redirect(base_url('graphicmain/shop'));
                }
           }
           else {/// failed
               //var_dump($paramList);
               //echo '<pre>else';print_r($paramList);
                $insert_data['orderID'] = $_POST['ORDERID'];
                $insert_data['mID'] = $_POST['MID'];
                $insert_data['txnID'] = $_POST['TXNID'];
                $insert_data['txnAmount'] = $_POST['TXNAMOUNT'];
                $insert_data['paymentMode'] = $_POST['PAYMENTMODE'];
                $insert_data['currency'] = $_POST['CURRENCY'];
                $insert_data['txnDate'] = date('Y-m-d H:i:s',strtotime($_POST['TXNDATE']));
                $insert_data['txnStatus'] = $_POST['STATUS'];
                $insert_data['respCode'] = $_POST['RESPCODE'];
                $insert_data['respMsg'] = $_POST['RESPMSG'];
                $insert_data['getwayName'] = $_POST['GATEWAYNAME'];
                $insert_data['bankTxnID'] = $_POST['BANKTXNID'];
                $insert_data['bankName'] = $_POST['BANKNAME'];
                $insert_data['checksumHash'] = $_POST['CHECKSUMHASH'];
                $insert_data['dateAdded'] = date('Y-m-d H:i:s');
                if($this->db->insert('payment_response',$insert_data))
                {
                    redirect(base_url('graphicmain/shop'));
                }
           }
           

       }else
       {//////////////suspicious
          // put your code here
      
       }
    } 
}
  