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
    /* -- quantity box -- */
#logo h1{
margin-bottom:0px !important;
}

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
                        <h1> <a class="navbar-brand px-0 mx-0" href="<?php echo site_url();?>">
                            <img src="<?php echo base_url().'public/images/logo.png'; ?>" width="160px" height="50px" alt="Graphic Geek">
                            </a>
                        </h1>
                    </div>

                    <label for="drop" class="toggle"><i class="fa fa-bars"></i></label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mr-auto">
                        <li class="active"><a href="<?php echo site_url();?>">Home</a></li>
                        <!-- <li><a href="<?php echo site_url('graphicmain/shop');?>">Shop</a></li> -->
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
                        <!-- <li><a href="<?php echo site_url();?>main">SignIn</a></li> -->
                        <?php 
                        $data = $this->session->userdata;
                            if(empty($data['íd'])){
                                echo '<li><a href="'.site_url('main').'">Sign In</a></li>';
                            }else{
                                echo '<li><a href="'.site_url('main/logout').'">Sign Out</a></li>';
                            }
                        ?>

                    </ul>
                </nav>
                    <!-- //nav -->
                </header>
                
            </div>
            <!-- //top-nav -->
        </div>
    </div>

  <section class="projects py-5" id="gallery">
    <div class="container py-md-5" style="max-width: 100% !important;">
            <div class="row">
                <div class="col-sm-3">
                <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Stunning</span> Posters</h3>
                </div>
                <div class="col-sm-9">
                    <div class="pull-right">
                        <div class="row" style="width:275px;">
                            <p style="font-size: 20px;margin: 5px auto;">Sort By</p>
                            <select class="form-control" style="width:200px;">
                                <option>Select Sort By </option>
                                <option value="1">A-Z</option>
                                <option value="2">Z-A</option>
                                <option value="3">Price: High to Low</option>
                                <option value="4">Price: Low to High</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 mob_container_cat">  
                    <div class="list-group">
                        <h3>Filter By</h3>
                        <?php 
                        foreach($subCategory as $category):?>
                        <div class="list-group-item checkbox">
                            <label>
                                <h4><input type="checkbox" class="common_selector brand subcategory_<?php echo $category->sub_c_id; ?>" style="margin: 5px;" onchange="filterbycategory('<?php echo $category->sub_c_id; ?>')">
                                    <?php echo $category->sub_c_name; ?></h4> 
                            </label>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-lg-9 ">
                        <div class="row">
                    <?php 
                $count = 0;
                if(count($products) > 0){
                foreach($products as $value){  
                    $count++;
                    if($value->p_id <= 20 ){
                echo '<div class="col-lg-3 gal-img mob_container_poster hideallfirst show_'.$value->p_sub_category.'" >
                    <a href="'.site_url('products/productview/'.$value->p_id).'" target="_blank">
                    <img src="'.base_url().'public/poster_images/'.$value->p_image.'"  alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info col-sm-12"><center><h4>'.$value->p_name.'<br>र '.$value->p_price.'</h4></center>
                    </div>
                    <input type="hidden" value="'.$value->p_price.'" id="product_price_'.$value->p_id.'">
                    <input type="hidden" id="quantity_'.$value->p_id.'" value="1" >
                    <input type="hidden" value="'.$value->p_name.$value->p_id.'" id="product_name_'.$value->p_id.'">
                    <input type="hidden" value="'.$value->p_image.'" id="product_image_'.$value->p_id.'">
                    <center><button type="button" id="product_qty_'.$value->p_id.'" onclick="addtocart('.$value->p_id.')" class="btn btn-danger" style="width: 110px;padding: 5px;margin-bottom: 25px;">Add to Cart</button></center>
                </div>';
                }
             } }else{
            echo "<center><h2>Ohhh Sorry...! </h2><br><h3> We are out of stock now. Will be back In somtime with stunning new products.</h3></center>";
           }?>               
            </div>
            </div>
        </div>
    </div>
</section>

 <script type="text/javascript">
    var arrayFromPHP = <?php echo json_encode($products); ?>; 
    var arrayone = new Array(); 
    
    function filterbycategory(catid){
        if($('.subcategory_'+catid).prop("checked") == true) {
            arrayone.push(catid); 
        }else{
            for( var i = 0; i < arrayone.length; i++){ 
               if ( arrayone[i] === catid) {
                 arrayone.splice(i, 1); 
               }
            }
        }
        if(arrayone.length > 0){
            $('.hideallfirst').hide('fast');
            for( var i = 0; i < arrayone.length; i++){
                $('.show_'+arrayone[i]).show('fast');
            }
        }else{
            $('.hideallfirst').show('fast'); 
        }
        console.log(arrayone);
    }
 </script>   