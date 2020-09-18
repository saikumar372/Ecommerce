<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->session->flashdata('message'); ?>
			<div class="panel panel-default">

 				<div class="panel-heading">
 					<?php if(isset($pagetitle)) echo $pagetitle;?>

 					<a title="Go To List" class="btn btn-primary btn-xs pull-right" href="<?php echo URL_PRODUCTS_INDEX; ?>"><i class="fa fa-list"></i>
 					</a>
 				</div>
	 			<div class="panel-body">
	 				<div class="row">

	 						<form name="category_form" id="category_form" method="POST" action="<?php echo URL_EDIT_PRODUCTS;?>" enctype="multipart/form-data">
	 							<div class="col-md-6">
	 								<div class="form-group">
	 									<label>Product Category<?php echo required_symbol();?></label>
	 									<select class="form-control" name="product_category">
	 									<?php if(!empty($category)){
	 										foreach ($category as $key => $value) {?>
	 											<option value="<?php echo $value->category_id;?>" <?php if($value->category_id == $records->prodct_category_id){echo 'selected' ;}?>><?php echo $value->category_name;?></option>
	 									<?php }} else{?>
	 										 <option >No Categories</option>
	 									<?php }?>
	 									</select>	 									
	 								</div>
	 								<div class="form-group">
	 									<label>Product Name<?php echo required_symbol();?></label>
	 									<input type="text" class="form-control" name="product_name" value="<?php echo $records->product_name?>" >
	 									<?php echo form_error('product_name'); ?>
	 								</div>
	 								<div class="form-group">
	 									<label>Product Cost<?php echo required_symbol();?></label>
	 									<input type="text" class="form-control" name="product_cost" value="<?php echo $records->product_cost?>">
	 									<?php echo form_error('product_cost'); ?>
	 								</div>
	 								<div class="form-group">
	 									<label>Product Discount<?php echo required_symbol();?></label>
	 									<input type="text" class="form-control" name="product_discount" value="<?php echo $records->product_discount?>">
	 									<?php echo form_error('product_discount'); ?>
	 								</div>
	 								<div class="form-group">
	 									<label>Product Image<?php echo required_symbol();?></label>
	 									<input type="file" name="image" onchange="photo(this,'product_image')" value="<?php echo $records->product_image;?>">
	 									<?php 
										$src = "";
										$style="display:none;";
										if(isset($records->product_image) && $records->product_image != "" && file_exists(PRODUCT_IMG_UPLOAD_PATH_URL.$records->product_image)) 
										{
											$src = PRODUCT_IMG_PATH.$records->product_image;
											$style="";
										}
										?>
	 									<img src="<?php echo $src;?>" id='product_image' alt="Product Image">
	 								</div>
	 							</div>
	 							<div class="col-md-6">
	 								<div class="form-group">
	 									<label>Description<?php echo required_symbol();?></label>
	 									<textarea class="form-control" name="description" maxlength="150"><?php echo $records->product_description;?></textarea>
	 								</div>
	 								<div class="form-group">
	 									<label>Status<?php echo required_symbol();?></label>
	 									<select class="form-control" name='status'>
	 										<option value="Active" <?php if($records->status == 'Active'){echo 'selected';}?>>Active</option>
	 										<option value="Inactive" <?php if($records->status == 'Inactive'){echo 'selected';}?>>Inactive</option>
	 									</select>
	 								</div>
	 							</div>	
		 					</div>

 							<div class="form-group pull-right">	
 									<input type="hidden" name="product_id" value="<?php echo $records->product_id;?>">
 									<button type="submit" name="update_products" value="update_products" class="btn btn-primary" id="update_products">Save Product</button>

 									<a class="btn btn-warning" href="<?php echo URL_PRODUCTS_INDEX;?>">Cancel</a>
 								</div>
	 						</form> 						
	 				</div>
 				</div>
 			</div>
 			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo JS_BOOSTRAP_MAX_LENGTH;?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#category_form').validate({
			rules:{
				'product_name':{
					required:true,
				},
				'product_cost':{
					required:true,
					number:true
				},
				'description':{
					required:true,
				},
				// 'image':{
				// 	required: true,
				// }
			},
			messages:{
				'product_name':{
					required:'Please enter Product Name'
				},
				'product_cost':{
					required:'Please enter Product Cost',
					digits:'Only numbers allowed'
				},
				'description':{
					required:'Please enter Description',
				},
				// 'image':{
				// 	required: 'Please upload image',
				// }
			},				
		})
	})
</script>
<script type="text/javascript">
	$('textarea').maxlength({
        alwaysShow: true,
        threshold: 10,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        separator: ' out of ',
        preText: 'You write ',
        postText: ' chars.',
        validate: true
    });

    function photo(input,name){
    	if (input.files && input.files[0]) 
	    {
	      var reader = new FileReader();
	      reader.onload = function (e) 
	      {
	        input.style.width = '50%';
	        $('#'+name+'').attr('src', e.target.result);
	        $('#'+name+'').fadeIn();
	      };
	      reader.readAsDataURL(input.files[0]);
	    }
    }
</script>
