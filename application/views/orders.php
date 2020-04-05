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
 color: white;
 background-color: red;
}

.quantity.buttons_added .plus {
 border-left: 0;
 border-radius: 10px;
 width: 40px;
 color: white; 
 background-color: green;
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
img{
border-radius: 50%;
width: 40px;
height: 40px;
}
</style>
             
                <div class="cart-items" id="cart_cont_refresh">
	                <table class="table table-hover table-bordered table-striped">
	                	<tr>
	                		<th>Sr.no</th>
	                		<th>Order ID</th>
	                		<th>Date</th>
	                		<th>Total</th>
	                		<th>Shipping Address</th>
	                		<th>Status</th>
	                		<th>Action</th>
	                		<?php
	                			
	                			if($this->session->userdata('role')=='1')
	                			{
	                		?>
	                		<?php
	                			}
	                		?>
	                	</tr>
	                <?php 
	                    $count = 1;
	                    foreach($myorders as $value){
	                        // <img src="'.site_url().'public/poster_images/" class="productimg">
	                        if ($value->order_status=='1'){
	                        	$order_status = 'New Order';
	                        }else if($value->order_status=='2'){
	                        	$order_status = 'Delivered';
	                        }else{
	                        	 $order_status ='Cancelled';
	                        } 
	                        
	                    echo  '<tr><td>'.$count++.'</td>
			                        <td>'.$value->order_id.'</td>
			                        <td>'.gmdate("d-m-Y",$value->order_date).'</td>
			                        <td>'.$value->order_total.'</td>       
			                        <td>'.str_replace("*", " ",$value->shipping_address) .'</td>
			                        <td>'.$order_status.'</td>
			                        <td><button class="btn btn-primary" onclick="getProduct('.$value->order_id.');">View Product</button> &nbsp;&nbsp; <a class="btn btn-primary" target="_blank" href="'.site_url('products/viewinvoice/'.$value->order_id).'">Invoice</a></td>
			                    </tr>';
	                     } ?>
	                </table> 
	            </div><!-- @end .cart-items -->
<!--	            <div class="row">	
	           
 <td><div class="quantity buttons_added" >
				                                
				                                <input type="number" step="1" min="1" max="" name="quantity" id="quantity_'.$value['id'].'" value="'.$value['qty'].'" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
				                              	<input type="hidden" id="product_row_'.$value['id'].'" name="product_row_'.$value['id'].'" value="'.$value['rowid'].'">
				                           		
				                            </div>
				                        </td> -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Order Details : <span id="oid"></span> </h4>
        </div>
        <div class="modal-body" >
        	<table class="table table-hover table-bordered table-striped">
        		<tr>
        			<th>Name</th>
        			<th>Price</th>
        			<th>Quantity</th>
        			<th>Image</th>
        		</tr>
        		<tbody id="product_table">
        			
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<script type="text/javascript">
	function getProduct(orderid){
		$('#oid').html(orderid);
		$('#product_table').empty();
		$.post( "<?php echo site_url('graphicmain/getProductDetails'); ?>", { orderid: orderid })
		  .done(function( data ) {
		  	var data = JSON.parse(data);
		    $('#product_table').append(data);
			$('#myModal').modal('show');
		 });
	}
</script>				                        