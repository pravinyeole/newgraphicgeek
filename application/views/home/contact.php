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

                <!--/breadcrumb-->
                <div class="inner-w3pvt-page-info">
                    <ol class="breadcrumb d-flex">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>

                </div>
                <!--//breadcrumb-->
            </div>
            <!-- //top-nav -->
        </div>
    </div>
    <!-- //home -->
    <section class="about-info py-5 px-lg-5">
        <div class="content-w3ls-inn px-lg-5">
            <div class="container py-md-5 py-3">
                <div class="px-lg-5">
                    <h3 class="tittle-w3ls mb-lg-5 mb-4"><span class="pink">Contact</span> Us</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>INFORMATION</h4>
                                    <p>Phone: 7507383064 / 9674451795</p>
                                    <p>Email: service@graphicgeeks.in</p>  
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    <div class="contact-hny-form mt-lg-5 mt-3">
                        <h3 class="title-hny mb-lg-5 mb-3">
                            Drop a Line
                        </h3>
                          <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="w3lName">Your Name</label>
                                        <input type="text" name="name" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="w3lSender">Your Email ID</label>
                                        <input type="email" name="email" id="email" required>
                                    </div>
                                     <div class="form-group">
                                        <label for="w3lSender">Your Contact</label>
                                        <input type="text" name="contact" id="contact" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="w3lSubject">Subject</label>
                                        <input type="text" name="subject" id="subject" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="w3lSubject">Message</label>
                                        <textarea name="message" id="message" required>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group mx-auto mt-3">
                                    <button type="button" class="btn btn-default morebtn more black con-submit" onclick="sendContact();">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="map-w3pvt mt-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.27404345275!2d-118.69191921441556!3d34.02016130939095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos+Angeles%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1522474296007" allowfullscreen=""></iframe>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- //Contact -->
    <script type="text/javascript">
        function sendContact(){
            var name = $('#name').val();
            var email = $('#email').val();
            var subject = $('#subject').val();
            var message = $('#message').val();
            var contact = $('#contact').val();

            if(name == ''){
                alert('Name Required.');
                return false;
            }else if(message == ''){
                alert('Message Required.');
                return false;
            }else if(contact == ''){
                alert('Contact Required.');
                return false;
            }else if(subject == ''){
                alert('Subject Required.');
                return false;
            }else if(email == ''){
                alert('Email Required.');
                return false;
            }else{
            $.post( "<?php echo site_url('graphicmain/sendContactUs'); ?>", { name: name,message:message,subject:subject,email:email,contact:contact })
            .done(function( data ) {
              if(alert(data)){
                location.reload();
               }
                $('#name').val('');
                $('#email').val('');
                $('#subject').val('');
                $('#message').val('');
                $('#contact').val('');
            });
            }                
        }
    </script>