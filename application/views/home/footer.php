<style type="text/css">
    .list-info-wthree li a,.footer-grids p{
        color:orange !important;
    }
    .list-info-wthree li a:hover{
        color:#fff !important;
    }
</style>
    <!-- footer -->
   <footer class="py-lg-5 py-4">
        <div class="container py-sm-3">
            <div class="row footer-grids">
                <div class="col-lg-4 mt-4">

                    <h4 class="mb-4"> <a class="navbar-brand px-0 mx-0 mb-4" href="index.html">About us
                        </a>
                    </h4>
                    <p class="mb-3">Lorem Ipsum is simply text the printing and typesetting standard industry. Onec Consequat sapien ut cursus rhoncus. Nullam dui mi, vulputate ac metus.</p>
                    
                    <div class="icon-social mt-4">
                        <a href="#" class="button-footr">
                            <span class="fa fa-3x mx-2 fa-facebook"></span>
                        </a>
                        <a href="#" class="button-footr">
                            <span class="fa fa-3x mx-2 fa-twitter"></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <h4 class="mb-4">Quick Links</h4>
                    <div class="links-wthree d-flex">
                         <ul class="list-info-wthree">
                            <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Terms & Condition</a></li>
                            <li><a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span> Privacy Policy</a></li>
                        </ul>
                        <ul class="list-info-wthree ml-5">
                            <li>
                                <a href="<?php echo site_url();?>"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('graphicmain/posters');?>"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Posters
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('graphicmain/paitings');?>"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Pratiksha's collection
                                </a>
                            </li>
                            <!-- <li>
                                <a href="<?php echo site_url();?>"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Team
                                </a>
                            </li> -->
                            <li>
                                <a href="<?php echo site_url('graphicmain/contact');?>"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 ad-info">
                    <h4 class="mb-4">Contact Info</h4>
                    <!-- <p><span class="fa fa-map-marker"></span>Shivaji Nagar,
                        Pune.<span>Pune, Maharashtra, India.</span></p> -->
                    <p class="phone"><span class="fa fa-phone"></span> 7507383064  </p>
                    <p class="phone"><span class="fa fa-fax"></span> 9674451795 </p>
                    <p><span class="fa fa-envelope"></span><a href="mailto:service@graphicgeeks.in" style="color:orange;">service@graphicgeeks.in</a></p>
                </div>

            </div>
        </div>
    </footer> 
    <!-- //footer -->
    <!-- copyright -->
    <div class="copy_right p-3 d-flex">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-11 copy_w3pvt">
                    <p class="text-lg-left text-center" style="font-size:10px">GRAPHICGEEKS COPYRIGHT © 2019  | DEVELOPED BY:  
             <a href="http://fancypantsmediasolution.com/" target="_blank">
                 FANCY PANTS MEDIA SOLUTION LLP. </a> | ALL RIGHT RESERVED.</p>
                </div>
                <!-- move top -->
                <div class="col-lg-1 move-top text-lg-right text-center">
                    <a href="#home" class="move-top">
                        <span class="fa fa-angle-double-up mt-3" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- move top -->
            </div>
        </div>
    </div>
    <!-- //copyright -->
     <div class="cart-tab visible" id="cart_cont_refresh" >
     <?php if(count($this->cart->contents()) > 0){  ?>      
      <a href="#" title="View your shopping cart" class="cart-link" style="background-color: red;color: white">
        <!-- <span class="amount">$22.00</span> -->
        <i class="fa fa-shopping-cart fa-3x " aria-hidden="true"> <span class='badge badge-warning ' id='lblCartCount' ><?php echo count($this->cart->contents());?></span></i>
      </a>
            <div class="cart">
              <h2>Cart</h2>
              <div class="cart-items">
                <ul>
                <?php 
                    $my_cart = $this->cart->contents();
                    $grand_total = 0;
                    foreach($my_cart as $value){ 
                        // <img src="'.site_url().'public/poster_images/" class="productimg">
                     echo  '<li class="clearfix">
                        <h4>'.$value['name'].'</h4>
                        <span class="item-price">Price :'.$value['price'].'</span>
                        <span class="quantity">Qty :'.$value['qty'].'</span>
                        <span class="quantity">Total : <b>'.($value['qty'] * $value['price']) .'</b></span>
                      </li>';
                      $grand_total = $grand_total + ($value['qty'] * $value['price']);
                     } ?>
                    <h2> <span class="grand_total">Total : ₹. <?php echo $grand_total; ?></span></h2>
                </ul> 
              </div><!-- @end .cart-items -->  
              <?php  
              $data = $this->session->userdata;
                if(empty($data['íd'])){
                    echo '<a href="'.site_url('main/login/').'" class="checkout">Go To Checkout &rarr;</a>';
                }else{
                    echo '<a href="'.site_url('graphicmain/checkout').'" class="checkout">Go To Checkout &rarr;</a>';
                }
            ?>
            </div><!-- @end .cart -->
        <?php } ?>
      </div><!-- @end .cart-tab -->
</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    header.classList.remove("sticky");
    header.classList.remove("stickyhight");
});

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    header.classList.add("stickyhight");
  } else {
    header.classList.remove("sticky");
    header.classList.remove("stickyhight");
  }
}
function minusValue(pid){
    var current_val = $('#quantity_'+pid).val();
    if(current_val > 1){
        $('#quantity_'+pid).val(parseInt(current_val) - 1);
    }else{
        $('#quantity_'+pid).val(1);
    }
    get_product_qty(pid); 
}
function plusValue(pid){
    var current_val = $('#quantity_'+pid).val(); 
    $('#quantity_'+pid).val(parseInt(current_val) + 1); 
    get_product_qty(pid); 
}
function get_product_qty(pid){
    var product_price = $('#product_price_'+pid).val(); 
    var current_val = $('#quantity_'+pid).val(); 
    var total_value = product_price * current_val; 

    $('#total_price_'+pid).val(total_value);
}

function addtocart(pid){
    var product_id = pid;
    var product_price = $('#product_price_'+pid).val(); 
    var current_val = $('#quantity_'+pid).val();  
    var product_name = $('#product_name_'+pid).val(); 
    var product_image = $('#product_image_'+pid).val(); 

    $.post( "<?php echo site_url('graphicmain/add_to_cart'); ?>", { product_id: product_id, product_price: product_price , quantity:current_val, product_name:product_name,product_image:product_image})
        .done(function( data ) {
            var obj = JSON.parse(data);
        alert( obj.message );
        $("#cart_cont_refresh").load(location.href + " #cart_cont_refresh");
        $('#gal1_'+pid).dialog("close");
    });
}
$(function(){
  $('.checkout').on('click',function(e){
    e.preventDefault();
  });
})
</script>
