<!doctype html>
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
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
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
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
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
</head>
<?php 
    if(count($userdata) > 0){
        foreach($userdata as $user){
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
?>

<body>
    <div class="invoice-box">
        <div class="row">
            <div class="column">
                <img src="https://graphicgeeks.co.in/public/images/logo.png" style="width:60%; max-width:160px;">
            </div>
            <div class="column_two">
                Order Number #: <?php echo $orderid;?><br>
                Order Date: <?php echo $date;?><br>
            </div>
        </div>
        <div class="row" style="margin-bottom: 30px;">
            <div class="column">
                <?php echo $username;?><br>
                <?php echo $contact;?><br>
                <?php echo $email;?>
            </div>
            <div class="column" style="text-align: right">
                <?php echo $address;?>,<br>
                <?php echo $city;?>,<br>
                <?php echo $state;?>,
                <?php echo $pincode;?>
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
            </tr>
              <?php  $total=0;$count=1;
              if(count($response) > 0){
               foreach($response as $prod){
               
                echo '<tr >
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
              }} ?>
            <tr class="total ">
                <td></td>
                <td></td>
                <td></td>
                <td>Total :</td>
                
                <td>
                   <?php echo $total;?>
                </td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td>Shipping Charge :</td>
                <td>
                   <?php echo $shipping_charge;?>
                </td>
            </tr>
            <tr class="total heading">
                <td></td>
                <td></td>
                <td></td>
                <td>Grand Total :</td>
                <td>
                   <?php echo ((int)$shipping_charge + (int)$total);?>
                </td>
            </tr>
        </table>
              <h4> Payment Status: <?php echo $payment_status;?></h4>
        <footer>
            <h4><center> Thank you for shopping with us. </center></h4>
        </footer>
    </div>
</body>
</html>