<?php
/**
 * Send Mail
 * Create by Abed Putra
 * http://abedputra.com
 * Github: https://github.com/abedputra
 * 2017
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class SendMail{

    public function secureMail($fn,$ln,$em,$dt,$t,$tLe,$bro,$os,$ip,$url){
        $message = '';
        $message .= 'Hi ' .$fn.' '.$ln.',';
        $message .= '<br>';
        $message .= '<br>';
        $message .= 'Your account ' .$em.' was just used to sign in from '.$bro.' on '.$os.'.';
        $message .= '<br>';
        $message .= '<br>';
        $message .= '<table>';
        $message .= '<tr>';
        $message .= '<td>Your Username</td><td> : <b>' .$em.'</b></td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td>From Browser</td><td> : <b>'.$bro.'</b></td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td>From OS</td><td> : <b>'.$os.'</b><td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td>From IP</td><td> : <b>'.$ip.'</b></td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td>Date</td><td> : <b>'.$dt.'</b></td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td>Time</td><td> : <b>'.$t.'</b></td>';
        $message .= '</tr>';
        $message .= '</table>';
        $message .= '<br>';
        $message .= '<br>';
        $message .= 'Don\'t recognise this activity?';
        $message .= '<br>';
        $message .= 'Secure your account, from this link.';
        $message .= '<br>';
        $message .= '<a href='.$url.'><b>Login.</b></a>';
        $message .= '<br>';
        $message .= '<br>';
        $message .= 'Why are we sending this?<br>We take security very seriously and we want to keep you in the loop on important actions in your account.';
        $message .= '<br>';
        $message .= '<br>';
        $message .= 'Sincerely yours,<br>';
        $message .= $tLe;
        return $message;
    }
    
    public function sendRegister($ls,$em,$link,$tLe){
        
        $message = '';
        $message .= 'Hi, ' .$ls.'<br>';
        $message .= '<br>';
        $message .= 'Welcome! you have signed up with our website with the following information:<br>';
        $message .= '<br>';
        $message .= '<strong>Username : '.$em.'</strong><br>';
        $message .= '<strong>Password : (Not Set) </strong><br>';
        $message .= '<br>';
        $message .= 'Before you can login, you need to activate and set your Password';
        $message .= '<br>';
        $message .= 'account by clicking on this link:';
        $message .= '<br><br>';
        $message .= $link . '<br>';
        $message .= '<br>';
        $message .= 'Sincerely yours,<br>';
        $message .= $tLe;
        return $message;
    }
    
    public function sendForgot($ls,$em,$link,$tLe){
        
        $message = '';
        $message .= 'Hello, ' .$ls.'<br>';
        $message .= '<br>';
        $message .= 'We\'ve generated a new password for you at your<br>';
        $message .= 'request, you can use this new password with your username:<br>';
        $message .= '<br>';
        $message .= '<strong>Username : '.$em.'</strong><br>';
        $message .= '<strong>Password : (Forgot Password) </strong><br>';
        $message .= '<br>';
        $message .= 'To reset your Password please, clicking on this link:';
        $message .= '<br><br>';
        $message .= $link . '<br>';
        $message .= '<br>';
        $message .= 'Sincerely yours,<br>';
        $message .= $tLe;
        return $message;
    }

    public function sendInvoice($data){
        $message = '';
        $message .= '<!doctype html>
                        <html>
                        <head>
                            <meta charset="utf-8">
                            <title>A simple, clean, and responsive HTML invoice template</title>
                            
                          <style>
                        * {
                          box-sizing: border-box;
                        }
                        .row {
                          display: flex;
                        }
                        .column {
                          flex: 70%;
                          padding: 10px;
                        }
                        .column_two {
                          flex: 30%;
                          padding: 10px;
                        }
                            .invoice-box {
                                max-width: 800px;
                                margin: auto;
                                padding: 30px;
                                border: 1px solid #eee;
                                box-shadow: 0 0 10px rgba(0, 0, 0, .15);
                                font-size: 16px;
                                line-height: 24px;
                                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                                color: #555;
                                min-height: 800px;
                            }
                            
                            .invoice-box table {
                                width: 100%;
                                line-height: inherit;
                                text-align: left;
                            }
                            
                            .invoice-box table td {
                                padding: 5px;
                                vertical-align: top;
                            }
                            
                            .invoice-box table tr td:nth-child(2) {
                                text-align: right;
                            }
                            
                            .invoice-box table tr.top table td {
                                padding-bottom: 20px;
                            }
                            
                            .invoice-box table tr.top table td.title {
                                font-size: 45px;
                                line-height: 45px;
                                color: #333;
                            }
                            
                            .invoice-box table tr.information table td {
                                padding-bottom: 40px;
                            }
                            
                            .invoice-box table tr.heading td {
                                background: #eee;
                                border-bottom: 1px solid #ddd;
                                font-weight: bold;
                            }
                            
                            .invoice-box table tr.details td {
                                padding-bottom: 20px;
                            }
                            
                            .invoice-box table tr.item td{
                                border-bottom: 1px solid #eee;
                            }
                            
                            .invoice-box table tr.item.last td {
                                border-bottom: none;
                            }
                            
                            .invoice-box table tr.total td:nth-child(4) {
                                border-top: 2px solid #eee;
                                font-weight: bold;
                            }
                            
                            @media only screen and (max-width: 600px) {
                                .invoice-box table tr.top table td {
                                    width: 100%;
                                    display: block;
                                    text-align: center;
                                }
                                
                                .invoice-box table tr.information table td {
                                    width: 100%;
                                    display: block;
                                    text-align: center;
                                }
                            }
                            
                            /** RTL **/
                            .rtl {
                                direction: rtl;
                                font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                            }
                            
                            .rtl table {
                                text-align: right;
                            }
                            
                            .rtl table tr td:nth-child(2) {
                                text-align: left;
                            }
                                footer {
                                position: absolute;
                                bottom: 0;
                                width: 70%;
                                height: 2.5rem;
                                top: 730px;
                                text-align: center;           /* Footer height */
                                }
                            </style>
                        </head>';
                    if(count($data['userdata']) > 0){
                        foreach($data['userdata'] as $user){
                            $orderid = $user->order_id;
                            $date = gmdate("d-m-Y",$user->order_date);
                            $username = $user->first_name. ' ' .$user->last_name;
                            $contact = $user->contact;
                            $email = $user->email;
                            $address = $user->u_address;
                            $city = $user->u_city;
                            $state = $user->u_state;
                            $pincode = $user->u_zipcode;
                            if($user->order_payment_status ==1 ){
                                $payment_status = 'Completed';
                            }elseif($user->order_payment_status == 2){
                              $payment_status = 'Failed';  
                            } else{
                                $payment_status = 'Pending';
                            } 

                        }
                    } else{
                        $orderid = '';
                            $date = '';
                            $username = '';
                            $contact = '';
                            $email = '';
                            $address = '';
                            $city = '';
                            $state = '';
                            $pincode = '';
                            $payment_status = 'N/A';
                    }
                    $message .= '<body>
                        <div class="invoice-box">
                            <div class="row">
                                <div class="column">
                                    <img src="https://graphicgeeks.co.in/public/images/logo.png" style="width:60%; max-width:160px;">
                                </div>
                                <div class="column_two">
                                    Order Number #: ';
                                    $message .= $orderid;
                                    $message .='<br>
                                    Order Date: ';
                                    $message .= $date;
                                    $message .='<br>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 30px;">
                                <div class="column">
                                    ';
                                    $message .= $username;
                                    $message .='<br>';
                                    $message .= $contact;
                                    $message .='<br>';
                                    $message .= $email;
                                    $message .='
                                </div>
                                <div class="column" style="text-align: right">';
                                    $message .= $address;
                                    $message .=',<br>';
                                    $message .= $city;
                                    $message .=',<br>';
                                    $message .= $state;
                                    $message .=',';
                                    $message .= $pincode;
                                    $message .='
                                </div>
                            </div>
                            <table cellpadding="0" cellspacing="0">         
                                <tr class="heading">
                                    <td>
                                        Sr.No.
                                    </td>
                                    <td style="text-align: left;">
                                        Name
                                    </td>
                                    <td>
                                        Quantity
                                    </td>
                                    <td>
                                        Price
                                    </td>
                                    <td>
                                        Total
                                    </td>
                                </tr>';
                                  $total=0;$count=1;
                                  if(count($data['response']) > 0){
                                   foreach($data['response'] as $prod){
                                   
                                    $message .= '<tr >
                                            <td>
                                                '.$count++.'
                                            </td>
                                            <td style="text-align: left;">
                                                '.$prod->prod_name.'
                                            </td>
                                            <td>
                                                '.$prod->prod_qty.'
                                            </td>
                                            <td>
                                                '.$prod->prod_price.'
                                            </td>
                                            <td>
                                                '.$prod->total = ($prod->prod_qty * $prod->prod_price).'
                                            </td>
                                        </tr>';
                                        $total = ((int)$prod->total + (int)$total);
                                  }}
                                $message .='<tr class="total ">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total :</td>
                                    
                                    <td>
                                       ';
                                       $message .= $total;
                                       $message .='
                                    </td>
                                </tr>
                                <tr class="total">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Shipping Charge :</td>
                                    <td>';
                                       $message .= $data['shipping_charge'];
                                       $message .='
                                    </td>
                                </tr>
                                <tr class="total heading">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Grand Total :</td>
                                    <td>';
                                       $message .= ((int)$data['shipping_charge'] + (int)$total);
                                       $message .='
                                    </td>
                                </tr>
                            </table>
                                  <h4> Payment Status: ';
                                  $message .= $payment_status;
                                  $message .= '</h4>
                            <footer>
                                <h4><center> Thank you for shopping with us. </center></h4>
                            </footer>
                        </div>
                    </body>
                    </html>';
        return $message;
    }
}
