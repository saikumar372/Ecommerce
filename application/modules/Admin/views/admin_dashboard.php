<div id="page-wrapper" class="bg-silver" >
	<div class="row">
		<!-- categories -->
		<div class="col-md-4 col-lg-3">
			<a href="<?php echo URL_CATEGORIES_INDEX;?>" title="Menu">
		        <div class="media stats-media-white bg-white">
		            <div class="media-left">
		                <img src="<?php echo DEFAULT_IMAGES_FOLDER.'categories.png';?>" width="50" height="50" alt="Categories">
		            </div>
		            <div class="media-body text-right">
		                <p>Categories</p>
		                <h4><?php if(isset($modules_count['cat'])){echo $modules_count['cat'];}?></h4>
		            </div>
		        </div>
			</a>	
	    </div>
	    <!-- products -->
	    <div class="col-md-4 col-lg-3">
			<a href="<?php echo URL_PRODUCTS_INDEX;?>" title="Menu">
		        <div class="media stats-media-white bg-white">
		            <div class="media-left">
		                <img src="<?php echo DEFAULT_IMAGES_FOLDER.'product.png';?>" width="50" height="50" alt="Products">
		            </div>
		            <div class="media-body text-right">
		                <p>Products</p>
		                <h4><?php if(isset($modules_count['products'])){echo $modules_count['products'];}?></h4>
		            </div>
		        </div>
			</a>	
	    </div>
	</div>
</div>