
 <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <!-- <li><a href="index.html">Home</a></li>
                        <li><a href="index.html">Home</a></li> -->
                        <!-- <li class="active"><a href="shop.html">Shop page</a></li>
                        <li><a href="single-product.html">Single product</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Contact</a></li> -->
                    </ul>
                </div>  
            </div>
        </div>
    </div>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <input type="hidden" id="offset" value="<?php echo $offset;?>">
            <div class="row products">
                <?php if(!empty($products)){?>
                    <?php foreach($products as $product){?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <img src="<?php echo PRODUCT_IMG_PATH.$product['product_image'];?>" alt="">
                            </div>
                            <h2><a href=""><?php echo $product['product_name'];?></a></h2>
                            <div class="product-carousel-price">
                                <ins><?php echo '₹'.$product['product_cost'];?></ins> <del><?php echo '₹'.$product['product_discount'];?></del>
                            </div>  
                            
                            <div class="product-option-shop">
                                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                            </div>
                        </div>
                    </div>
                <?php }}else{ ?>
                    <div class="col-md-12 no_products">
                        <h3>No Products</h3>
                    </div>
                <?php };?>
                 <!-- $('.single-product-area .row:first-child').append(div) -->
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <!-- <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav> -->
                        <?php if(!empty($products)){?>
                            <button type="button" id='view_more' class="btn btn-success">View More</button>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <script type="text/javascript">
     $("#view_more").on('click',function(){
        offset = $("#offset").val();
        var params = {};
        params['offset'] = offset;
        startLoader('.single-product-area')
        $.ajax({
            url: site_url+'Welcome/get_home_products',
            data:params,
            method: "post",
            success: function(response) {
                stopLoader('.single-product-area')
                response = $.parseJSON(response);
                // $(response.html).appendTo('.single-product-area .products').animate('slow');
                $('.single-product-area .products').append(response.html)
                $("#offset").val(response.offset);
                if(!response.next_page) {
                    $("#view_more").hide()
                }
            },
        })    

     })
 </script>