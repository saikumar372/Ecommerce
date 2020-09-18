<?php if(!empty($products)){?>
    <?php foreach($products as $product){?>
    <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
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
    <h3>No Products</h3>
<?php };?>