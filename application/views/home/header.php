<!DOCTYPE html>
<html lang="zxx">

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

</head>

<!-- <style type="text/css">
    #searchform{
    position: relative;
 /*   top: 50%;*/
    left: 50%;
    transform: translate(-50%,-15%);
    transition: all 1s;
  /*  width: 50px;*/
    height: 25px;
    background: white;
    box-sizing: border-box;
    border-radius: 25px;
  /*  border: 4px solid white;
    padding: 5px;*/
}

#searchform input{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;;
  
    line-height: 30px;
    outline: 0;
    border: 0;
    display: none;
    font-size: 1em;
    border-radius: 20px;
    padding: 0 20px;
    border: 1px solid;
}

.search-fa{
    box-sizing: border-box;
    padding: 10px;
    width: 35px;
    height: 35px;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
    color: #07051a;
    text-align: center;
    font-size: 1.2em;
    transition: all 1s;
    margin: 0px -15px 0px 0px;
}

#searchform:hover{
    width: 200px;
    cursor: pointer;
}

#searchform:hover input{
    display: block;
}

#searchform:hover .search-fa{
    background: #07051a;
    color: white;
}
</style> -->
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
                      <!--   <li><a href="<?php echo site_url('graphicmain/shop');?>">Shop</a></li> -->
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
                        <!-- <li><form class="example" action="action_page.php">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form></li> -->
                        <li><form id="searchform" action="<?php echo site_url('products/searchreasult')?>/" method="post">
                          <input type="search" id="search_value" name="search_value" required>
                         <button type="submit"><i class="search-fa fa fa-search fa-2x"></i></button> 
                        </form></li>
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
