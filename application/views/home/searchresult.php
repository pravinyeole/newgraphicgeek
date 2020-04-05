<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>GraphicHome</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Infinitude Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="<?php echo base_url().'public/css/bootstrap.css' ?>">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'public/css/style.css' ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url().'public/css/cart_style.css' ?>" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="<?php echo base_url().'public/css/font-awesome.css' ?>" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <script
  src="http://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<style type="text/css">

</style>
</head>

<body>
    <!--/home -->
    <div id="home" class="inner-w3pvt-page">
        <div class="overlay-innerpage">
            <!--/top-nav -->
            <div class="top_w3pvt_main container">
                <!--/header -->
                <header class="nav_w3pvt text-center" id="myHeader">
                    <!-- nav -->
                    <nav class="wthree-w3ls">
                    <div id="logo">
                        <a class="navbar-brand px-0 mx-0" href="<?php echo base_url();?>">
                            <img src="<?php echo base_url().'public/images/logo.png'; ?>" width="160px" height="50px" alt="Graphic Geek">
                            </a>
                    </div>

                    <label for="drop" class="toggle"><i class="fa fa-bars"></i></label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mr-auto">
                        <li class="active"><a href="<?php echo site_url();?>">Home</a></li>
                        <!-- <li><a href="<?php echo site_url('/graphicmain/shop');?>">Shop</a></li>  -->
                            <!-- First Tier Drop Down -->
                         <li>
                            <label for="drop-2" class="toggle toggle-2">Shop <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Shop  </a>
                            <input type="checkbox" id="drop-2" />
                            <ul>

                                <li><a href="<?php echo site_url('graphicmain/posters');?>" class="drop-text">Posters</a></li>
                                <li><a href="<?php echo site_url('graphicmain/paitings');?>" class="drop-text">Pratiksha's collection</a></li>
                                <!-- <li><a href="team.html" class="drop-text">Team</a></li>
                                <li><a href="typo.html" class="drop-text">Typography</a></li>
                                <li><a href="error.html" class="drop-text">Faq's</a></li>
                                <li><a href="error.html" class="drop-text">Social Media</a></li> -->
                            </ul>
                        </li> 
                        <!-- <li><a href="#gallery">Projects</a></li> -->
                        <li style="margin-right:160px !important;"><a href="<?php echo site_url('graphicmain/contact');?>">Contact</a></li>
                        <li><form id="searchform" action="<?php echo site_url('products/searchreasult')?>/" method="post">
                          <input type="search" id="search_value" name="search_value" required>
                         <button type="submit"><i class="search-fa fa fa-search fa-2x"></i></button> 
                        </form></li>
                        <!-- <li><a href="<?php echo site_url('/main');?>">SignIn</a></li> -->
                        <?php 
                        $data = $this->session->userdata;
                            if(empty($data['íd'])){
                                echo '<li><a href="'.site_url('/main/login').'">Sign In</a></li>';
                            }else{
                                echo '<li><a href="'.site_url('/main/logout').'">Sign Out</a></li>';
                            }
                        ?>

<!--                         <li id="cart_cont_refresh"><a href="#" style="color: white;margin-right:0px;"><i class="fa fa-shopping-cart fa-lg " aria-hidden="true"> </i></a><?php if(count($this->cart->contents()) > 0){ echo "<span class='badge badge-warning' id='lblCartCount'>".count($this->cart->contents())."</span>" ; } ?> </li> -->

<!--                         <li class="social-icons ml-lg-3"><a href="#" class="p-0 social-icon"><span class="fa fa-facebook-official" aria-hidden="true"></span>
                                <div class="tooltip">Facebook</div>
                            </a> </li>
                        <li class="social-icons"><a href="#" class="p-0 social-icon"><span class="fa fa-twitter" aria-hidden="true"></span>
                                <div class="tooltip">Twitter</div>
                            </a> </li>
                        <li class="social-icons"><a href="#" class="p-0 social-icon"><span class="fa fa-instagram" aria-hidden="true"></span>
                                <div class="tooltip">Instagram</div>
                            </a> 
                        </li> -->
                    </ul>
                </nav>
                    <!-- //nav -->
                </header>
                <!--//header -->
            </div>
            <!-- //top-nav -->
        </div>
    </div>
    <!-- //home -->
    <section class="about-info py-5 px-lg-5">
        <div class="content-w3ls-inn px-lg-5">
            <?php 
                $count = 0;
                if(count($searchresult) > 0){
                    echo '<center><h3> Your Search result for <u>'.$search_value.'</u></h3></center><br><br>';
            echo '<div class="row">';
                foreach($searchresult as $value){  
                    $count++;
                    if($value->p_id <= 20 ){
                echo '<div class="col-lg-3 gal-img mob_container_poster" >
                    <a href="'.site_url('products/productview/'.$value->p_id).'" target="_blank">
                    <img src="'.base_url().'public/poster_images/'.$value->p_image.'"  alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info col-sm-12"><center><h4>'.$value->p_name.'<br>र '.$value->p_price.'</h4></center>
                    </div>
                    <center><button type="button" id="product_qty_'.$value->p_id.'" onclick="addtocart('.$value->p_id.')" class="btn btn-danger" style="width: 110px;padding: 5px;">Add to Cart</button></center>
                </div>';
                }
             } 
             echo "</div>";
         }else{
            echo "<center><h2>Ohhh Sorry...! </h2><br><h3> Your Search product not available, Please try with different keywords.</h3></center>";
           }?>   
        </div>
    </section>
    <!-- //Contact -->