<!DOCTYPE html>
<html lang="zxx">
<?php error_reporting(0); ?>
<head>
    <title>GraphicHome</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
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
    /* -- quantity box -- */

.quantity {
 display: inline-block; }

.quantity .input-text.qty {
 width: 35px;
 height: 20px;
 text-align: center;
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
 height: 25px;
 background-color: #ffffff;
 border: 1px solid #efefef;
 cursor:pointer;}

.quantity.buttons_added .minus {
 border-right: 0; 
 border-radius: 10px;
 width: 25px;
 color: white;
 background-color: red;
}

.quantity.buttons_added .plus {
 border-left: 0;
 border-radius: 10px;
 width: 25px;
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
.testimonials-gd-vj img{
margin-bottom: 10px;
background-color:
#000000;
padding: 25px;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
}
.sticky + .content {
  padding-top: 102px;
}
.sticky {
  position: fixed;
  top: 0;
  background:white;
}
.stickyhight{
    height: 70px;
}
</style>
</head>

<body>
    <!-- home -->
    <div id="home">
        <!--/top-nav -->
        <div class="top_w3pvt_main container">
            <!--/header -->
            <header class="nav_w3pvt text-center " id="myHeader">
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
                       <!-- <li><a href="<?php echo site_url('graphicmain/shop');?>">Shop</a></li>  -->
                            <!-- First Tier Drop Down -->
                          <li>
                            <label for="drop-2" class="toggle toggle-2">Shop <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Shop  </a>
                            <input type="checkbox" id="drop-2" />
                            <ul>

                                <li><a href="<?php echo site_url('graphicmain/shop/1');?>" class="drop-text">Posters</a></li>
                                <li><a href="<?php echo site_url('graphicmain/shop/2');?>" class="drop-text">Paintings</a></li>
                                <!-- <li><a href="team.html" class="drop-text">Team</a></li>
                                <li><a href="typo.html" class="drop-text">Typography</a></li>
                                <li><a href="error.html" class="drop-text">Faq's</a></li>
                                <li><a href="error.html" class="drop-text">Social Media</a></li> -->
                            </ul>
                        </li> 	
                        <!-- <li><a href="#gallery">Projects</a></li> -->
                        <li><a href="<?php echo site_url('graphicmain/contact');?>">Contact</a></li>
                        <?php 
                        $data = $this->session->userdata;
                            if(empty($data['íd'])){ ?>
                                <li><a href="<?php echo site_url('main/login');?>">Sign In</a></li>
                           <?php }else{ ?>
                                <li><a href="<?php echo site_url('main/logout');?>">Sign Out</a></li>
						<?php } ?>
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