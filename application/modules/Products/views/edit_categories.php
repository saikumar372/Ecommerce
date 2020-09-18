<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->session->flashdata('message'); ?>
			<div class="panel panel-default">

 				<div class="panel-heading">
 					<?php if(isset($pagetitle)) echo $pagetitle;?>

 					<a title="Go To List" class="btn btn-primary btn-xs pull-right" href="<?php echo URL_CATEGORIES_INDEX; ?>"><i class="fa fa-list"></i>
 					</a>
 				</div>
	 			<div class="panel-body">
	 				<div class="row">

	 						<form name="category_form" id="category_form" method="POST" action="<?php echo URL_EDIT_CATEGORY;?>" enctype="multipart/form-data">
	 							<div class="col-md-6">
	 								<div class="form-group">
	 									<label>Category Name<?php echo required_symbol();?></label>
	 									<input type="text" class="form-control" name="cat_name" value="<?php echo $records->category_name?>">
	 									<?php echo form_error('cat_name'); ?>
	 								</div>
	 								<div class="form-group">
	 									<label>Status<?php echo required_symbol();?></label>
	 									<select class="form-control" name='status'>
	 										<option value="Active" <?php if($records->status == 'Active'){echo 'selected' ;} ?>>Active</option>
	 										<option value="Inactive" <?php if($records->status == 'Inactive'){echo 'selected' ;} ?>>Inactive</option>
	 									</select>
	 								</div>
	 							</div>
		 					</div>

 							<div class="form-group pull-right">
 									<input type="hidden" name="cat_id" value="<?php echo $records->category_id;?>">
 									<button type="submit" name="edit_category" value="edit_category" class="btn btn-primary" id="edit_category">Add Category</button>

 									<a class="btn btn-warning" href="<?php echo URL_CATEGORIES_INDEX;?>">Cancel</a>
 								</div>
	 						</form> 						
	 				</div>
 				</div>
 			</div>
 			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#category_form').validate({
			rules:{
				'cat_name':{
					required:true,
				},
			},
			messages:{
				'cat_name':{
					required:'Please enter Category Name'
				},
			},				
		})
	})
</script>
<script type="text/javascript">
	// $('textarea').maxlength({
 //        alwaysShow: true,
 //        threshold: 10,
 //        warningClass: "label label-success",
 //        limitReachedClass: "label label-danger",
 //        separator: ' out of ',
 //        preText: 'You write ',
 //        postText: ' chars.',
 //        validate: true
 //    });

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
