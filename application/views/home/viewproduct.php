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
            <div class="col-sm-12" style="padding:20px;max-height:500px">
                <div class="row">
            <?php foreach($editproduct as $value){?>
                    <div class="col-sm-6">
                        <center><a href="<?php echo base_url('public/poster_images/').$value->p_image; ?>" target="_blank"><img src="<?php echo base_url('public/poster_images/').$value->p_image; ?>"  alt="w3pvt" class="img-fluid" style="width: 350px;height: 450px;"></a></center>
                    </div>
                    <div class="col-sm-6" >
                        <div >
                            <h1><p class="pname"><?php echo $value->p_name;?></p></h1>
                        </div>
                        <div style="margin:20px;">
                            <h3><?php echo $value->discription;?></h3>
                        </div>
                        <div class="row" style="margin:20px;">
                            <h3 style="margin-right:50px;text-decoration: line-through;">Rs. : 200.00 </h3>
                            <h2 style="margin-right:50px;">Rs. : <?php echo $value->p_price ?> </h2>
                        </div>
                        <div class="row" style="margin:20px;">
                                <label>
                                <h3 style="margin-right:50px;">Size : <?php echo $value->size?> </h3> 
                                </label>
                        </div>
                        <div class="row" >
                            <div class="col-sm-6" >
                                <h4><label>Choose Size</label></h4>
                                <select name="product_size_<?php echo $value->p_id ?>" id="product_size_<?php echo $value->p_id ?>" class="form-control" required>
                                    <option value="" selected disabled>Choose Size</option>
                                    <option value="a3">A3</option>
                                    <option value="a4">A4</option>
                                    <option value="a5">A5</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <h4><label>Quantity</label></h4><br>
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" style="height: 35px;font-size: 18px;" onclick="minusValue('<?php echo $value->p_id ?>');">
                                    <input type="text" step="1" min="1" max="" name="quantity" id="quantity_<?php echo $value->p_id ?>" value="1" title="Qty" class="input-text qty text" size="4" readonly pattern="[0-9]" inputmode="">
                                    <input type="button" style="height: 35px;font-size: 18px;" value="+" onclick="plusValue('<?php echo $value->p_id ?>');">
                                </div>
                            </div>
                                <input type="hidden" value="<?php echo $value->p_price ?>" id="product_price_<?php echo $value->p_id ?>">
                                <input type="hidden" value="<?php echo $value->p_name ?><?php echo $value->p_id ?>" id="product_name_<?php echo $value->p_id ?>">
                                <input type="hidden" value="<?php echo $value->p_image ?>" id="product_image_<?php echo $value->p_id ?>">
                            <button type="button" id="product_qty_<?php echo $value->p_id ?>" onclick="addtocart('<?php echo $value->p_id ?>')" class="btn btn-danger" style="width:100%;margin-top: 10px;">Add Cart</button>
                        </div>
                       <?php } ?> 
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="padding:20px;">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="a-container">
                          <li class="a-items">
                            <input type="radio" name="ac" id="a1" />
                            <label for="a1">Poster</label>
                            <div class="a-content">
                              <table>
                                <tbody>
                                <tr>
                                    <td><p>&nbsp;</p><p><strong>Main Description</strong></p>
                                    </td>
                                    <td><p>Final product doesn't carry PosterGully watermark. There might be a small signature from the artist.</p></td>
                                </tr>
                                <tr>
                                    <td><p>&nbsp;</p><p><strong>Texture &amp; Appearance</strong></p></td>
                                    <td>\<p>Artwork is printed on 250 GSM high quality matte paper. Printed with one inch white border</p></td>
                                </tr>
<tr>
<td>
<p><b>Size</b></p>
</td>
<td>
<p>Size is approximate and varies slightly based on aspect ratio.</p>
</td>
</tr>
<tr>
<td>
<p><strong>Shipping</strong></p>
</td>
<td>
<p>Free Shipping. Dispatched within 24-72 Hours</p>
</td>
</tr>
<tr>
<td>
<p><strong>Packaging</strong></p>
</td>
<td>
<p>The poster is securely packed in sturdy cardboard tubes which prevents any wear during transportation.</p>
</td>
</tr>
</tbody>
</table>
  </li>
  
    <!-- item02 -->
    <li class="a-items">
    <input type="radio" name="ac" id="a2" />
    <label for="a2">Giant Poster</label>
    <div class="a-content">
      <table>
<tbody>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Main Description</strong></p>
</td>
<td>
<p>Giant posters are an excellent choice for quickly decorating a huge wall. Suited for living rooms, lounges, restaurants, cafes, hotels, pubs, and public spaces.</p>
</td>
</tr>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Texture &amp; Appearance</strong></p>
</td>
<td>
<p>Artwork is printed on 250 gsm thick ivory matte finish sheet. High-quality printing gives this poster it’s sharp appearance.</p>
</td>
</tr>
<tr>
<td>
<p><b>Size</b></p>
</td>
<td>
<p>Available in two huge sizes of 4.5 ft x 3 ft and 5.25 ft x 3.5 ft</p>
</td>
</tr>
<tr>
<td>
<p><strong>Shipping</strong></p>
</td>
<td>
<p>Free Shipping. Dispatched within 4 working days.</p>
</td>
</tr>
<tr>
<td>
<p><strong>Packaging</strong></p>
</td>
<td>
<p>The poster is securely packed in sturdy custom cardboard tubes which prevents any wear during transportation.</p>
</td>
</tr>
</tbody>
</table>
  </li>
  
    <!-- item03 -->  
    <li class="a-items">
    <input type="radio" name="ac" id="a3" />
    <label for="a3">Metal Print</label>
    <div class="a-content">
      <table>
<tbody>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Main Description</strong></p>
</td>
<td>
<p>Metal prints are thin, lightweight and durable aluminum sheets with high gloss finish that enhances color and produces sharp image details. Comes ready-to-hang with a sawtooth hanger attached to wooden frame at the back of the sheet to offset from the wall.</p>
</td>
</tr>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Texture &amp; Appearance</strong></p>
</td>
<td>
<p>Artwork is printed on 0.5 mm thick printable glossy aluminium sheet. High-quality printing gives metallic prints it’s vivid and sharp appearance.</p>
</td>
</tr>
<tr>
<td>
<p><b>Size</b></p>
</td>
<td>
<p>Available in two sizes of 20 x 28 cm and 28 x 40 cm</p>
</td>
</tr>
<tr>
<td>
<p><strong>Shipping</strong></p>
</td>
<td>
<p>Free Shipping. Dispatched within 24-72 Hours</p>
</td>
</tr>
<tr>
<td>
<p><strong>Packaging</strong></p>
</td>
<td>
<p>Metal prints are packaged between styrofoam and cardboard sheets wrapped up in a layer of bubble wrap to protect from scratches. The corners get extra padding so the print reaches you in mint condition.</p>
</td>
</tr>
</tbody>
</table>
    </div>
  </li>
    <!-- item04 -->  
  <li class="a-items">
    <input type="radio" name="ac" id="a4" />
    <label for="a4">Laminated Framed</label>
    <div class="a-content">
      <table>
<tbody>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Main Description</strong></p>
</td>
<td>
<p>Laminated frames are sturdy durable art prints covered with a protective UV coating that eliminates glare and gives the print its vivid sharp appearance. Final product doesn't carry PosterGully watermark. There might be a small signature from the artist.</p>
</td>
</tr>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Texture &amp; Appearance</strong></p>
</td>
<td>
<p>Our in house frames are crafted using traditional high quality materials and are backed by our price promise. Artwork is printed on thick ivory matte finish sheet. Size is approximate and varies slightly based on aspect ratio. Printed with one inch white border</p>
</td>
</tr>
<tr>
<td>
<p><b>Size</b></p>
</td>
<td>
<p>1.5cm x 1.5cm x 1.5cm elegant black frame suits your in-house/office space/living room decor. The chosen artwork is framed with Plastic-Acrylic frame in a finished with a vinyl coating across the periphery.</p>
</td>
</tr>
<tr>
<td>
<p><strong>Shipping</strong></p>
</td>
<td>
<p>Free Shipping. Dispatched within 4 working days.</p>
</td>
</tr>
<tr>
<td>
<p><strong>Packaging</strong></p>
</td>
<td>
<p>Framed prints are packaged between styrofoam and cardboard sheets wrapped up in a layer of bubble wrap to protect from scratches. The corners get extra padding so the print reaches you in mint condition.</p>
</td>
</tr>
</tbody>
</table>
    </div>
  </li>
  <li class="a-items">
    <input type="radio" name="ac" id="a5" />
    <label for="a5">Glass Framed</label>
    <div class="a-content">
      <table>
<tbody>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Main Description</strong></p>
</td>
<td>
<p>The classic glass framed prints are an elegant choice for decor lovers. Final product doesn't carry PosterGully watermark. There might be a small signature from the artist.</p>
</td>
</tr>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Texture &amp; Appearance</strong></p>
</td>
<td>
<p>Our in house frames are crafted using high quality materials. Artwork is printed on thick ivory matte finish sheet.</p>
</td>
</tr>
<tr>
<td>
<p><b>Size</b></p>
</td>
<td>
<p>Size is approximate and varies slightly based on aspect ratio. Printed with one inch white border.</p>
</td>
</tr>
<tr>
<td>
<p><strong>Shipping</strong></p>
</td>
<td>
<p>Free Shipping. Dispatched within 4 working days.</p>
</td>
</tr>
<tr>
<td>
<p><strong>Packaging</strong></p>
</td>
<td>
<p>To ensure that your glass framed poster is delivered in flawless condition, it is packed with utmost care between two layers of thermocol, bubble wrap and cardboard sheets to ensure the product reaches you as produced. Comes ready to hang with a sawtooth hanger.</p>
</td>
</tr>
</tbody>
</table>
    </div>
  </li>
  <li class="a-items">
    <input type="radio" name="ac" id="a6" />
    <label for="a6">Framed Canvas Print</label>
    <div class="a-content">
      <table>
<tbody>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Main Description</strong></p>
</td>
<td>
<p>An affordable alternative to original art, canvas prints have a rich texture, color and detail. The image is printed directly on the canvas and finished with a modern natural wooden frame</p>
</td>
</tr>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Texture &amp; Appearance</strong></p>
</td>
<td>
<p>We use imported canvases with high levels of white, to ensure that the colours are reproduced with brilliant tones. The artist-grade, acid-free cotton canvas is protected with a UV coating that eliminates glare.</p>
</td>
</tr>
<tr>
<td>
<p><b>Size</b></p>
</td>
<td>
<p>1.5cm x 1.5cm x 1.5cm elegant black frame suits your in-house/office space/living room décor</p>
</td>
</tr>
<tr>
<td>
<p><strong>Shipping</strong></p>
</td>
<td>
<p>Free Shipping. Usually dispatched within 4-5 working days</p>
</td>
</tr>
<tr>
<td>
<p><strong>Packaging</strong></p>
</td>
<td>
<p>Framed prints are packaged between styrofoam and cardboard sheets wrapped up in a layer of bubble wrap to protect from scratches. The corners get extra padding so the print reaches you in mint condition.</p>
</td>
</tr>
<tr>
<td>
<p><strong>Care</strong></p>
</td>
<td>
<p>Canvas prints are secured with a protective spray to prevent it from damage. However, we strongly recommend that you handle the canvas art prints very carefully and hang them away from direct sunlight and moisture.</p>
</td>
</tr>
</tbody>
</table>
    </div>
  </li>
  <li class="a-items">
    <input type="radio" name="ac" id="a7" />
    <label for="a7">Stretched Canvas</label>
    <div class="a-content">
      <table>
<tbody>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Main Description</strong></p>
</td>
<td>
<p>Size is approximate and varies slightly based on aspect ratio.</p>
</td>
</tr>
<tr>
<td>
<p>&nbsp;</p>
<p><strong>Texture &amp; Appearance</strong></p>
</td>
<td>
<p>We use imported canvases with high levels of white to ensure that the colours of are reproduced with brilliant tones. The stretched canvas comes ready to hang with a sawtooth hanger at the back.</p>
</td>
</tr>
<tr>
<td>
<p><b>Size</b></p>
</td>
<td>
<p>12 x 18 inches</p>
</td>
</tr>
<tr>
<td>
<p><strong>Shipping</strong></p>
</td>
<td>
<p>Free Shipping. Usually dispatched within 4-5 working days</p>
</td>
</tr>
<tr>
<td>
<p><strong>Packaging</strong></p>
</td>
<td>
<p>To ensure that our canvas prints are delivered in pristine condition, they are packed with utmost care. We use layers of paper, thermocol, bubble wrap and cardboard sheets to ensure the product reaches you as produced. Your canvas will arrive ready to hang.</p>
</td>
</tr>
<tr>
<td>
<p><strong>Care</strong></p>
</td>
<td>
<p>Canvas prints are secured with a protective spray to prevent it from damage. However, we strongly recommend that you handle the canvas art prints very carefully and hang them away from direct sunlight and moisture. We also recommend dusting occasionally with a soft cloth or soft brush. Please note that due to the stretching process, there may be slight at the corners of the canvas print. This is normal and adds to the natural feel of a canvas print.</p>
</td>
</tr>
</tbody>
</table>
    </div>
  </li>
</ul>


                    </div>
                    <div class="col-sm-6">
                        <div class="pg-offers" style="font-size: 18px;">
                           <h4 style="margin-bottom: 20px;">Special Offer</h4>
                           <span style="color:#ec4b6c;font-weight:bold;">Use Code TK350</span> at checkout and get <b>Flat <span class="money">Rs. 350.00</span> off</b> on minimum purchase of <span class="money">Rs. 1500.00</span>. Offer valid for limited time period only.
                           <span class="pg-click-copy" style="text-decoration: underline;padding: 0 0.5em;cursor:pointer;">Copy Code</span>
                          <input type="text" value="TK350" style="opacity:1;width:1px;height:1px;padding:0;" readonly="readonly">
                         </div>
                    </div>
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