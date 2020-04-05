<script
  src="http://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<style type="text/css">
    /* -- quantity box -- */

.quantity {
 display: inline-block; }

.quantity .input-text.qty {
 width: 35px;
 height: 39px;
 padding: 0 5px;
 text-align: center;
 background-color: transparent;
 border: 1px solid #efefef;
}

.quantity.buttons_added {
 text-align: left;
 position: relative;
 white-space: nowrap;
 vertical-align: top; }

.quantity.buttons_added input {
 display: inline-block;
 margin: 0;
 vertical-align: top;
 box-shadow: none;
}

.quantity.buttons_added .minus,
.quantity.buttons_added .plus {
 padding: 7px 10px 8px;
 height: 41px;
 background-color: #ffffff;
 border: 1px solid #efefef;
 cursor:pointer;}

.quantity.buttons_added .minus {
 border-right: 0; 
 border-radius: 10px;
 width: 40px;
}

.quantity.buttons_added .plus {
 border-left: 0;
 border-radius: 10px;
 width: 40px; 
}

.quantity.buttons_added .minus:hover,
.quantity.buttons_added .plus:hover {
 background: #eeeeee; }

.quantity input::-webkit-outer-spin-button,
.quantity input::-webkit-inner-spin-button {
 -webkit-appearance: none;
 -moz-appearance: none;
 margin: 0; }
 
 .quantity.buttons_added .minus:focus,
.quantity.buttons_added .plus:focus {
 outline: none; }

.badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 2px 5px;
    vertical-align: top;
    margin-left: -16px;
}
.table-bordered td{
	text-align: center;
}
img {
  border-radius: 50%;
  width: 40px;
  height: 40px;
}
.fa-trash{
	font-size: 2em;
}
</style>
    <div class="jumbotron">
        <div class="container">
          <h1>Welcome, <?php echo $first_name; ?>!</h1>
          <p>Your are now inside the application</p>
        </div>
    </div>
          <?php 
          $data = $this->session->userdata;
          
          if(count($this->cart->contents()) > 0){
                if(!empty($data['id']) && $data['id'] > 1){ ?>
                <div class="cart-items" id="cart_cont_refresh">
	                <table class="table table-hover table-bordered table-striped">
	                	<tr>
	                		<th>Sr.no</th>
	                		<th>Image</th>
	                		<th>Name</th>
	                		<th>Quantity</th>
	                		<th>Price(1pc)</th>
	                		<th>Total</th>
	                	</tr>
	                <?php 
	                    $my_cart = $this->cart->contents();
	                    $grand_total = 0;
	                    $count = 1;
	                    foreach($my_cart as $value){ 
	                        // <img src="'.site_url().'public/poster_images/" class="productimg">
	                        if($value['image']){
	                        	$image = 'public/poster_images/'.$value['image'];
	                        }else{
	                        	$image = 'public/images/logo.png';
	                        }
	                     echo  '<tr><td>'.$count++.'</td>
			                        <td><img src='.base_url().$image.'  ></td>
			                        <td>'.$value['name'].'</td>
			                        <td><div class="quantity buttons_added" >
				                                <input type="button" style="height: 30px;font-size: 20px;" value="-"  onclick="minusValue('.$value['id'].');">
				                                <input type="text" step="1" min="1" max="" name="quantity" id="quantity_'.$value['id'].'" value="'.$value['qty'].'" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
				                                <input type="button" style="height: 30px;font-size: 20px;" value="+" onclick="plusValue('.$value['id'].');">
				                                <input type="hidden" id="product_row_'.$value['id'].'" name="product_row_'.$value['id'].'" value="'.$value['rowid'].'">
				                           		<a onclick="deleteItem('.$value['id'].');" style="margin-left:15px"><i class="fa fa-trash fa-3x" ></i></a> 
				                            </div>
				                        </td>
			                        <td><b>'.$value['price'] .'</b></td>
			                        <td><b>'.($value['qty'] * $value['price']) .'</b></td>
			                    </tr>';
	                      $grand_total = $grand_total + ($value['qty'] * $value['price']);
	                     } ?>
	                     <tr>
	                     	<td colspan="4"></td>
			                <td align="right"><b>₹ </b></td>
			                <td><b><?php echo $grand_total ; ?></b></td>
			            </tr>
	                </table> 
	            </div><!-- @end .cart-items -->
	            
	            <div class="row">	
	            	<a href="<?php echo site_url('graphicmain/posters') ;?>" class="pull-left btn btn-primary">Add More Items</a>  
	            	<a href="<?php echo site_url('graphicmain/placeorder') ;?>" class="pull-right btn btn-primary">Place Order</a>  
	            </div>
	<?php  } 
		} ?>
