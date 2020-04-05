<style>
.mySlides-one {display:none;}
.mySlides-two {display:none;}
.mySlides-three {display:none;}
.mySlides-four {display:none;}
.text-block {
  position: absolute;
  bottom: 10px;
  right: 20px;
  background-color: #f20909a6;
  color: white;
  padding-left: 10px;
  padding-right: 10px;
  margin-bottom: 15px;
  color:#fff;
  line-height: 1em !important;
  text-transform: uppercase;
}
#offers:hover{
    right:0;
    width:60em;
}
.text-block h4{
    font-family: !important;
    font-weight: revert;
    font-size: 3.0em;
}
    
</style>
<div id="homepage-slider" class="st-slider">
        <div class="images" style="max-height: 700px;">
            <div class="images-inner">
                <div class="image-slide">
                    <div class="banner-w3pvt-4">
                        <div class="overlay-w3ls">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="cart-tab visible" id="offers" style="margin: 170px -51px 0px 0px;">
          <a href="#" title="View your shopping cart" class="cart-link" style="color: white">
            <i class="fa fa-chevron-circle-right fa-3x " aria-hidden="true" style="color: red;"> <span class='badge badge-warning ' id='lblCartCount' ></span></i>
            </a>
            <div class="cart" style="height:30em;padding: 0px !important;width: 550px;">
              <img src="http://graphicgeeks.co.in/public/offers_images/1575569955offerimage.jpg" style="height: 100%;">
              <!-- @end .cart-items -->  
            </div><!-- @end .cart -->
      </div>
        <!-- banner slider -->
        <div id="homepage-slider" class="st-slider" style="margin:20px">
              <img class="mySlides-four" src="public/home_images/first_screen.jpg" style="width:100%;height:100%">
                <img class="mySlides-four" src="public/home_images/second_screen.jpg" style="width:100%;height:100%">
        </div>
        <!-- //banner slider -->
    </div>
    <!-- //banner -->

    <!-- /projects -->
    <section class="projects py-5" id="gallery" >
        <div class="container py-md-5" style="max-width: 100% !important;">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Stunning</span> Posters</h3>
            <div class="row">
                    <div class="col-lg-9 ">
                        <div class="row">
                    <?php 
                $count = 0;
                foreach($products as $value){  
                    $count++;
                    if($value->p_id <= 4 ){
                echo '<div class="col-lg-3 gal-img mob_container_poster" >
                    <a href="'.site_url('products/productview/'.$value->p_id).'" target="_blank">
                    <img src="'.base_url().'public/poster_images/'.$value->p_image.'"  alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info col-sm-12"><center><h4>'.$value->p_name.'<br>र '.$value->p_price.'</h4></center>
                    </div>
                    <input type="hidden" value="'.$value->p_price.'" id="product_price_'.$value->p_id.'">
                    <input type="hidden" id="quantity_'.$value->p_id.'" value="1" >
                    <input type="hidden" value="'.$value->p_name.$value->p_id.'" id="product_name_'.$value->p_id.'">
                    <input type="hidden" value="'.$value->p_image.'" id="product_image_'.$value->p_id.'">
                    <center><button type="button" id="product_qty_'.$value->p_id.'" onclick="addtocart('.$value->p_id.')" class="btn btn-danger" style="width: 110px;padding: 5px;">Add to Cart</button></center>
                </div>';
                }
             } ?>               
            </div>
            </div>
            <div class="col-lg-3 mob_container_cat">
                 <div class="text-block">
                    <a href="<?php echo site_url('graphicmain/subcategorywiseproduct/2') ?>"><h4>new arrival</h4></a>
                    <p>view all</p>
                  </div>
                <img class="mySlides-one" src="http://graphicgeeks.co.in/public/poster_images/1.jpg" style="width:100%;height:100%">
                <img class="mySlides-one" src="http://graphicgeeks.co.in/public/poster_images/2.jpg" style="width:100%;height:100%">
                <img class="mySlides-one" src="http://graphicgeeks.co.in/public/poster_images/3.jpg" style="width:100%;height:100%">
            </div>
        </div>
        </div>
    <!--    <a href="<?php echo site_url('graphicmain/shop/1');?>"><h3 class="tittle-w3ls text-right mb-5">Let`s go</h3></a> -->
    
    
        <div class="container py-md-5" style="max-width: 100% !important;">
            <div class="row">
                    
                    <div class="col-lg-9 ">
           
                        <div class="row">
                    <?php 
                $count = 0;
                foreach($products as $value){  
                    $count++;
                    if($value->p_id >= 5  && $value->p_id <= 8){
                echo '<div class="col-lg-3 gal-img mob_container_poster" >
                    <a href="'.site_url('products/productview/'.$value->p_id).'" target="_blank">
                    <img src="'.base_url().'public/poster_images/'.$value->p_image.'"  alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info col-sm-12"><center><h4>'.$value->p_name.'<br>र '.$value->p_price.'</h4></center>
                    </div>
                    <input type="hidden" value="'.$value->p_price.'" id="product_price_'.$value->p_id.'">
                    <input type="hidden" id="quantity_'.$value->p_id.'" value="1" >
                    <input type="hidden" value="'.$value->p_name.$value->p_id.'" id="product_name_'.$value->p_id.'">
                    <input type="hidden" value="'.$value->p_image.'" id="product_image_'.$value->p_id.'">
                    <center><button type="button" id="product_qty_'.$value->p_id.'" onclick="addtocart('.$value->p_id.')" class="btn btn-danger" style="width: 110px;padding: 5px;">Add to Cart</button></center>
                </div>';

                }
             } ?>               
            </div>
            </div>
            <div class="col-lg-3 mob_container_cat">
                <div class="text-block">
                    <a href="<?php echo site_url('graphicmain/subcategorywiseproduct/3') ?>"><h4>best selling</h4></a>
                    <p>view all</p>
                  </div>
                <img class="mySlides-two" src="http://graphicgeeks.co.in/public/poster_images/5.jpg" style="width:100%;height:100%">
                <img class="mySlides-two" src="http://graphicgeeks.co.in/public/poster_images/6.jpg" style="width:100%;height:100%">
                <img class="mySlides-two" src="http://graphicgeeks.co.in/public/poster_images/7.jpg" style="width:100%;height:100%">
            </div>
        </div>
        </div>
            <div class="container py-md-5" style="max-width: 100% !important;">
            <div class="row">
                    
                    <div class="col-lg-9 ">
          
                        <div class="row">
                    <?php 
                $count = 0;
                foreach($products as $value){  
                    $count++;
                    if($value->p_id >= 9  && $value->p_id <= 12){
                echo '<div class="col-lg-3 gal-img mob_container_poster" >
                    <a href="'.site_url('products/productview/'.$value->p_id).'" target="_blank">
                    <img src="'.base_url().'public/poster_images/'.$value->p_image.'"  alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info col-sm-12"><center><h4>'.$value->p_name.'<br>र '.$value->p_price.'</h4></center>
                    </div>
                    <input type="hidden" value="'.$value->p_price.'" id="product_price_'.$value->p_id.'">
                    <input type="hidden" id="quantity_'.$value->p_id.'" value="1" >
                    <input type="hidden" value="'.$value->p_name.$value->p_id.'" id="product_name_'.$value->p_id.'">
                    <input type="hidden" value="'.$value->p_image.'" id="product_image_'.$value->p_id.'">
                    <center><button type="button" id="product_qty_'.$value->p_id.'" onclick="addtocart('.$value->p_id.')" class="btn btn-danger" style="width: 110px;padding: 5px;">Add to Cart</button></center>
                </div>';
                }
             } ?>               
            </div>
            </div>
            <div class="col-lg-3 mob_container_cat">
                <div class="text-block">
                    <a href="<?php echo site_url('graphicmain/subcategorywiseproduct/4') ?>"><h4>limited edition</h4></a>
                    <p>view all</p>
                  </div>
                <img class="mySlides-three" src="http://graphicgeeks.co.in/public/poster_images/9.jpg" style="width:100%;height:100%">
                <img class="mySlides-three" src="http://graphicgeeks.co.in/public/poster_images/10.jpg" style="width:100%;height:100%">
                <img class="mySlides-three" src="http://graphicgeeks.co.in/public/poster_images/11.jpg" style="width:100%;height:100%">
            </div>
        </div>
        </div>
        
          <a href="<?php echo site_url('graphicmain/posters');?>"><h3 class="tittle-w3ls text-right mb-5" style="margin-right: 60px;">Let`s go</h3></a>
    </section>
 
    <!--/services-->
      <section class="testmonials" id="test">
        <div class="over-lay-blue py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls two text-center mb-5">Our Service</h3>
                <div class="row my-4">
                    <div class="col-lg-4 testimonials_grid mt-3">
                        <div class="p-lg-6 p-4 testimonials-gd-vj" style="height:260px;">
                            <!-- <p class="sub-test">
                                <span class="fa fa-quote-left s4" aria-hidden="true"></span> Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimus, omnis voluptas.
                            </p> -->
                            <center><img src="<?php echo base_url().'public/images/custome_design.png'; ?>" ></center>
                            <div class="mt-4">
                                    <h2 class="mb-2">CUSTOMIZE DESIGN</h2><br>
                                    <p>Get Your Own Design</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 testimonials_grid mt-3">
                        <div class="p-lg-6 p-4 testimonials-gd-vj" style="height:260px;">
                            <!-- <p class="sub-test"><span class="fa fa-quote-left s4" aria-hidden="true"></span>Quisque sagittis lacus eu lorem , cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimus.
                            </p> 
                            <div class="row mt-4">
                                <div class="col-3 testi-img-res">
                                    <img src="<?php echo base_url().'public/images/t2.jpg';?>" alt=" " class="img-fluid">
                                </div>
                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">Adam Ster</h5>
                                    <p>Add xxxx</p>
                                </div>
                            </div> -->
                            <center><img src="<?php echo base_url().'public/images/free_shipping.png'; ?>" ></center>
                           <div class="mt-4">
                                    <h2 class="mb-2">FREE SHIPPING</h2><br>
                                    <p>We Treate Your Shipment Like It's Ours</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 testimonials_grid mt-3">
                        <div class="p-lg-6 p-4 testimonials-gd-vj" style="height:260px;">
                            <!-- <p class="sub-test"><span class="fa fa-quote-left s4" aria-hidden="true"></span> Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimus, omnis voluptas.
                            </p>
                            <div class="row mt-4">
                                <div class="col-3 testi-img-res">
                                    <img src="<?php echo base_url().'public/images/t1.jpg';?>" alt=" " class="img-fluid">
                                </div>
                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">Dane Walker</h5>
                                    <p>Add xxxx</p>
                                </div>
                            </div> -->
                            <center><img src="<?php echo base_url().'public/images/24_7_support.png'; ?>" ></center>
                             <div class="mt-4">
                                    <h2 class="mb-2">24/7 LIVE SUPPORT</h2><br>
                                    <p>Press Nothing...We Answer Each Phone with Real Voice</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//testimonials-->
<script>
var myIndex_one = 0;
var myIndex_two = 0;
var myIndex_three = 0;
var myIndex_four = 0;
carousel_one();
carousel_two();
carousel_three();
carousel_four();

function carousel_one() {
  var i;
  var p = document.getElementsByClassName("mySlides-one");
  for (i = 0; i < p.length; i++) {
    p[i].style.display = "none";  
  }
  myIndex_one++;
  if (myIndex_one > p.length) {myIndex_one = 1}    
  p[myIndex_one-1].style.display = "block";  
  setTimeout(carousel_one, 5000); // Change image every 2 seconds
}
function carousel_two() {
   var j;
  var q = document.getElementsByClassName("mySlides-two");
  for (j = 0; j < q.length; j++) {
    q[j].style.display = "none";  
  }
  myIndex_two++;
  if (myIndex_two > q.length) {myIndex_two = 1}    
  q[myIndex_two-1].style.display = "block";  
  setTimeout(carousel_two, 5000);
}
function carousel_three() {
   var k;
  var r = document.getElementsByClassName("mySlides-three");
  for (k = 0; k < r.length; k++) {
    r[k].style.display = "none";  
  }
  myIndex_three++;
  if (myIndex_three > r.length) {myIndex_three = 1}    
  r[myIndex_three-1].style.display = "block";  
  setTimeout(carousel_three, 5000);
}
function carousel_four() {
   var l;
  var s = document.getElementsByClassName("mySlides-four");
  for (l = 0; l < s.length; l++) {
    s[l].style.display = "none";  
  }
  myIndex_four++;
  if (myIndex_four > s.length) {myIndex_four = 1}    
  s[myIndex_four-1].style.display = "block";  
  setTimeout(carousel_four, 5000);
}
</script>
