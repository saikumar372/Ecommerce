<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo DEFAULT_IMAGES_FOLDER?>bg-01.jpg);">
					<span class="login100-form-title-1">
						Register
					</span>
				</div>
				<form class="login100-form validate-form" id='register_form' method="POST" action="<?php echo REGISTER?>">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Uer Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="usermail" placeholder="Enter Email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password" id="pass">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="c_pass" placeholder="Enter Confirm password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id='register' name="register">
							Register 
						</button>
					</div>
				</form>
			</div>
		</div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo LOGIN_UTIL?>">
<link rel="stylesheet" type="text/css" href="<?php echo LOGIN_MAIN?>">
<script type="text/javascript">
	$(document).ready(function (){
		$('#register').on('click',function(){	
			$('#register_form').validate({
				rules:{
					'username':{
						required:true,
					},
					'usermail':{
						required:true,
						email:true
					},
					'pass':{
						required:true,
						min:6,
					},
					'c_pass':{
						required:true,
						equalTo:"#pass"
					},
				},
				messages:{
					'username':{
						required:'Please enter Username',
					},
					'usermail':{
						required:'Please enter Email',
						email:'Please enter valid email'
					},
					'pass':{
						required:'Please enter password',
						min:'Please enter minimum 6 characters',
					},
					'c_pass':{
						required:'Please enter confirm password',
						equalTo:"Password and confirm password should match"
					}
				}
			})
		})
})
</script>