<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."third_party/paytmlib/config_paytm.php");
require_once(APPPATH."third_party/paytmlib/encdec_paytm.php");
require_once(APPPATH."third_party/PHPMailer/class.phpmailer.php");
require_once(APPPATH."third_party/PHPMailer/class.smtp.php");

class Graphicmain extends CI_Controller {

    public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
        $this->load->model('Products_model', 'products_model', TRUE);
        $this->load->model('Offers_model', 'offers_model', TRUE);
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
  public function sendContactUs(){
      $mail = new PHPMailer;
      $mail->isSMTP();
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
      //$mail->SMTPDebug = 4;
      $mail->Host = "mail.fancypantsmediasolution.com";
      $mail->Port = 25;
      $mail->SMTPAuth = true;                               
      $mail->Username = "contact@fancypantsmediasolution.com";                
      $mail->Password = "superuser123";

      $field_name = $_POST['name'];
      $field_email = $_POST['email'];
      $field_subject = $_POST['subject'];
      $field_message = $_POST['message'];
      $field_phone =  $_POST['contact'];

      $mail->setFrom('contact@fancypantsmediasolution.com','ADMIN');
      $mail->addAddress($field_email);
      $mail->addReplyTo('contact@fancypantsmediasolution.com');

      $mail->isHTML(true);
      $mail->Subject = 'Request Form User - '.$field_name;
      $mail->Body = '<h1> Hello Admin, </h1><p>See User Details Below</p><p>Name : - '.
      $field_name.'</p><p>Email : - '.$field_email.'</p><p>Phone No : - '.$field_phone.'</p><p>Subject : - '.$field_subject.'</p><p>Message : - '.$field_message.'</p>';

      if(!$mail->Send()) {
         $response_message =  'Message could not be sent.';
      } else{ 
          $response_message = 'Thank you for the message. We will contact you shortly.';
      } 
      echo json_encode($response_message);
    }
    
    public function testsms(){
      $apiKey = urlencode('hJHYVTiTfgw-HgFvyZEiBasu7uEBR8875YkSk9Vg3K');
                        // Message details
                        $numbers = array(8149136961,);
                        $sender = urlencode('TXTLCL');
                        $message = rawurlencode('This is your message'); 
                        $numbers = implode(',', $numbers);
                        // Prepare data for POST request
                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
                        // Send the POST request with cURL
                        $ch = curl_init('https://api.textlocal.in/send/');
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        print_r($response);
                        curl_close($ch);
    }

    public function posters()
    {       
        $typeid = 1;
        $data['products'] = $this->products_model->getAllProducts($typeid);
        $data['subCategory'] = $this->products_model->getSubCategory();
        $this->load->view('home/shop',$data);
        $this->load->view('home/footer');
    }
    public function paitings(){       
        $typeid = 2;
        $data['products'] = $this->products_model->getAllProducts($typeid);
        $data['subCategory'] = $this->products_model->getSubCategory();
        $this->load->view('home/shop',$data);
        $this->load->view('home/footer');
    }
    public function subcategorywiseproduct($typeid){       
        $data['products'] = $this->products_model->getAllSubProducts($typeid);
        $data['subCategory'] = $this->products_model->getSubCategory();
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
        $data['shipping'] = $this->user_model->getAllSettings();
        $data['groups'] = $this->user_model->getUserInfo($data['id']);
        $usedcoupns = $this->offers_model->getUsedCoupns($data['id']);
        $data['coupns'] = $this->offers_model->getAllCoupns(1,$usedcoupns);
        $data['TXN_AMOUNT'] = 0;
        $current_cart = $this->cart->contents();
        //print_r($current_cart);
        foreach($current_cart as $value){
            
            $total =  $value['price'] * $value['qty'];
            $data['TXN_AMOUNT'] += $total;
            
            // $this->products_model->insertOrderProduct($data);
        }
        $data['title'] = "Placeorder";
            $this->load->view('header', $data);
            $this->load->view('navbar', $data);
            $this->load->view('container');
            $this->load->view('home/placeorder', $data);
            $this->load->view('footer');   
    }
 function testmail(){
      $developmentMode = true;
      $mail = new PHPMailer($developmentMode);
      $mail->isSMTP();
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->SMTPDebug = 1;
      if ($developmentMode) {
        $mail->SMTPOptions = [
            'ssl'=> [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ];
      }                     
      $mail->Host = $this->config->item('host');
      $mail->SMTPAuth = true;     
      $mail->Username = $this->config->item('username');                
      $mail->Password = $this->config->item('password');
      $mail->SMTPSecure = $this->config->item('secure');
      $mail->Port = $this->config->item('port');
      
      $setfrom_add = $this->config->item('setfrom');

      $mail->setFrom($setfrom_add,'ADMIN');
      $mail->addAddress('anikettandale111@gmail.com');
    
      $mail->isHTML(true);
      $mail->AddAttachment('C:\Users\ADMIN\Downloads\ugc_net_191620308413.pdf', $name = 'ugc_net_191620308413.pdf',  $encoding = 'base64', $type = 'application/pdf');
      $mail->Subject = 'Request Form User - ';
      $mail->Body = '<h1> Hello Admin, </h1><p>See User Details Below</p><p>Name : - </p><p>Email : - </p><p>Phone No : - </p><p>Subject : - </p><p>Message : - </p>';
      if(!$mail->Send()) {
         $response_message =  'Message could not be sent.';
      } else{ 
          $response_message = 'Thank you for the message. We will contact you shortly.';
      } 
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
        $shipping = $this->user_model->getAllSettings();
        $TXN_AMOUNT = 0 + $shipping->shipping_charge;
    $discount_amount = 0;
        $ORDER_ID = rand(10000,99999999); 
          if(!empty($this->input->post('promocode'))){
            $promode = $this->input->post('promocode');
            $current_cart = $this->cart->contents();
            $coupndetail= $this->offers_model->getCoupnById($this->input->post('promocode'));
            if(count($coupndetail) > 0){
                foreach($current_cart as $value){
                    $data['product_subtotal'] = $value['subtotal'];
                    $total =  $value['price'] * $value['qty'];
                    $TXN_AMOUNT += $total;
                }
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
                        $TXN_AMOUNT = $billamount;
                        $response = array('status' => 'success',
                                          'message' => 'Coupn Code Applied Succesfully.',
                                           'amount_data' => $billamount.'-'.$discount_amount
                                            );
                    }else{
            $billamount = $TXN_AMOUNT;
                        $response = array('status' => 'failed',
                                           'message' => 'Not applicable for discount' );
                    }
                }
            }else{
        $billamount = $TXN_AMOUNT;
                $response = array('status' => 'failed',
                                  'message' => 'Invalid Coupn Selection' );
            }
        }else{
          $promode = 0;
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
            }
        }
        
        // Create an array having all required parameters for creating checksum.
         $paramList["MID"] =PAYTM_MERCHANT_MID;
         $paramList["ORDER_ID"] = $ORDER_ID;
         $paramList["CUST_ID"] = $_POST['CUST_ID'];
         $paramList["INDUSTRY_TYPE_ID"] = 'RETAIL';
         $paramList["CHANNEL_ID"] = 'WEB';
         $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
         $paramList["WEBSITE"] =PAYTM_MERCHANT_WEBSITE;
         $paramList["CALLBACK_URL"]    = site_url('graphicmain/PaytmResponse');
         $paramList["MSISDN"] = $_POST['contact']; //Mobile number of customer
         $paramList["VERIFIED_BY"] = $_POST['contact']; // Verified by

         /*
         $paramList["EMAIL"] = $EMAIL; //Email ID of customer
         $paramList["IS_USER_VERIFIED"] = "YES"; //

         */
         $data['order_id'] = $ORDER_ID;
         $data['cust_id'] = $_POST['CUST_ID'];
         $data['order_total'] = $TXN_AMOUNT;
         // $data['shipping_address'] = $ORDER_ID;
         $data['order_date'] = strtotime(date('d-m-Y'));
         $data['shipping_address'] = $_POST['address'].' * '.$_POST['city'].' * '.$_POST['state'].' * '.$_POST['zip_code'];
         $data['used_promocode'] = $promode;
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
         echo '<input type="hidden" name="' . $name .'" value="' . $value .        '">';
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
        $data = $this->session->userdata;
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
                $current_cart = $this->cart->contents();
                foreach ($current_cart as $item) {
                    $product_details = array('order_id'=> $_POST['ORDERID'],
                                              'prod_id' => $item['id'],
                                              'prod_qty' => $item['qty'],
                                              'prod_price' => $item['price'],
                                              'prod_name' => $item['name'],
                                              'prod_image' => $item['image']
                                            );
                    $this->db->insert('ordered_prod_details',$product_details);
                }
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
                $insert_id = $this->db->insert('payment_response',$insert_data);
                if($insert_id > 0)
                {
                $this->db->where('order_id',$_POST['ORDERID']);
                $this->db->update('user_order_details',array('order_payment_status' => 1,'order_status'=>1));
                foreach ($current_cart as $item) {
                    $this->db->where('p_id', $item['id']);
                    $this->db->set('stock_count', 'stock_count - '.$item['qty'], FALSE);
                    $this->db->update('products'); 
                }

                if($data['email']){
                  $result = $this->user_model->getAllSettings();
                  $data['shipping_charge'] = $result->shipping_charge;
                  $data['userdata'] = $this->products_model->getuserdetail($_POST['ORDERID']);
                  $resultRow = $this->products_model->getOrderProductDetails($_POST['ORDERID']);
                  if(count($resultRow) > 0){
                      foreach($resultRow as $value){
                          $response[] = $value;
                      }
                  }else{
                      $response = array();
                  }
                  $data['response'] = $response;
                  $this->load->library('sendmail');
                        
                        $developmentMode = true;
                          $mail = new PHPMailer($developmentMode);
                          $mail->isSMTP();
                          //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                          //$mail->SMTPDebug = 1;
                          if ($developmentMode) {
                            $mail->SMTPOptions = [
                                'ssl'=> [
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                                ]
                            ];
                          }  
                        $mail->Host = $this->config->item('host');
                        $mail->SMTPAuth = true;     
                        $mail->Username = $this->config->item('username');                
                        $mail->Password = $this->config->item('password');
                        $mail->SMTPSecure = $this->config->item('secure');
                        $mail->Port = $this->config->item('port');
                        $setfrom_add = $this->config->item('setfrom');
                        $message = $this->sendmail->sendInvoice($data);
                        $to_email = $data['email'];
                        $mail->setFrom($setfrom_add,'ADMIN'); //from sender, title email
                        $mail->addAddress($to_email);
                        $mail->Subject = 'Invoice Summary : #'.$_POST['ORDERID'];
                        $mail->Body = $message;
                        $mail->isHTML(true);
    
                        //Sending mail
                        $mail->Send();
                    }
                    if($data['contact']){
                       $apiKey = urlencode('hJHYVTiTfgw-HgFvyZEiBasu7uEBR8875YkSk9Vg3K');
                        // Message details
                        $numbers = array($data['contact'],);
                        $sender = urlencode('TXTLCL');
                        $message = rawurlencode('This is your message');
                         
                         $numbers = implode(',', $numbers);
                         
                        // Prepare data for POST request
                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
                        // Send the POST request with cURL
                        $ch = curl_init('https://api.textlocal.in/send/');
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                    }
                    $this->cart->destroy();
                    redirect(site_url('graphicmain/posters'));
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
                $this->db->where('order_id',$_POST['ORDERID']);
                $this->db->update('user_order_details',array('order_payment_status' => 2,'order_status'=>2));
                    redirect(site_url('graphicmain/posters'));
                }
           }
           

       }else
       {//////////////suspicious
          // put your code here
      
       }
    } 
    public function getProductDetails(){
        $resultRow = $this->products_model->getOrderProductDetails($_POST['orderid']);
        if(count($resultRow) > 0){
            foreach($resultRow as $value){
                $response[] = '<tr>
                                <td>'.$value->prod_name.'</td>
                                <td>'.$value->prod_price.'</td>
                                <td>'.$value->prod_qty.'</td>
                                <td><img src="'.site_url().'public/poster_images/'.$value->prod_image.'"></td>
                            </tr>';
            }
        }else{
            $response[] = '<tr><td colspan="3">No Details Found </td></tr>';
        }
        echo json_encode($response);
        die();
    }
}
  