<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo CSS_FOLDER;?>bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo CSS_FOLDER;?>font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo CSS_FOLDER;?>owl.carousel.css">
    <link rel="stylesheet" href="<?php echo CSS_FOLDER;?>style.css">
    <link rel="stylesheet" href="<?php echo CSS_FOLDER;?>responsive.css">
</head>
<body>
	<div class="header-area">
        <?php echo $this->session->flashdata('message'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-right">
                        <!-- <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul> -->
                        <ul class="list-unstyled list-inline">
                            <!-- <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li> -->
                            <?php if($this->authentication->getUserId() > 0){?>
                                <li><a href="<?php echo LOGOUT;?>"><i class="fa fa-user"></i> Logout</a></li>
                            <?php }else{?>
                                <li><a href="<?php echo SITEURL;?>" class='<?php if($content == 'home'){echo 'active_header';}?>'><i class="fa fa-heart"></i> Home</a></li>
                                <li><a href="<?php echo REGISTER;?>"  class='<?php if($content == 'register'){echo 'active_header';}?>'><i class="fa fa-user"></i> Register</a></li>
                                <li><a href="<?php echo LOGIN;?>" class='<?php if($content == 'login'){echo 'active_header';}?>'><i class="fa fa-user"></i> Login</a></li>
                            <?php }?>
                        </ul>   
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- End header area -->
    <?php if(!in_array($content,['login','register'])){?>
     <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="<?php echo DEFAULT_IMAGES_PATH;?>/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6p">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    <?php };?>

	<!-- Latest jQuery form server -->
    <!-- <script src="https://code.jquery.com/jquery.min.js"></script> -->
    <script src="<?php echo PUBLIC_JS;?>"></script>
    <script src="<?php echo JS_VALIDATE;?>"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="<?php echo JS_FOLDER;?>bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="<?php echo JS_FOLDER;?>owl.carousel.min.js"></script>
    <script src="<?php echo JS_FOLDER;?>jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="<?php echo JS_FOLDER;?>jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="<?php echo JS_FOLDER;?>main.js"></script>
    <script type="text/javascript">
        var site_url = "<?php echo SITEURL;?>";
        function startLoader(sec){
            $(sec).addClass('ajax-load')
        }
        function stopLoader(sec){
            $(sec).removeClass('ajax-load')
        }

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if(scroll > 1){
                $(".header-area").addClass('is-sticky')
            }else{
                $(".header-area").removeClass('is-sticky')

            }
        })    
    </script>
</body>
</html>