<div class="container-fluid signup-margin" >
	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-10 col-12 m-auto">
			<div class="card" >
              <div class="card-header bg-primary text-light text-center h3">         
              Sign Up to <strong>User</strong>  
                </div>
                <div class="card-body">
                	<form id="signup-form" enctype="multipart/form-data">
                		<div class="form-group">
                			<label>Full Name <span class="text-danger">*</span></label>
                				<input type="text" name="name" id="name" placeholder="Full Name" class="form-control">
                				<span id="name_error" class="text-danger span_error"></span>
                		</div><!-- form group -->

                		<div class="form-group">
                			<label>Email <span class="text-danger">*</span></label>
                				<input type="text" id="email" name="email" placeholder="Email Id" class="form-control">
                				<span id="email_error" class="text-danger span_error"></span>
                		</div><!-- form group -->                	
                		<div class="form-group">
                			<label>Password <span class="text-danger">*</span></label>
                				<input type="password" name="password" placeholder="Password" id="password" class="form-control">
                				<span id="password_error" class="text-danger span_error"></span>
                		</div><!-- form group --> 

                		<div class="form-group">
                			<label>Your Photo*</label>
                			<input type="file" name="image" id="image" class="form-control">
                			<?php 
                			if(isset($error)){
                			echo $error;                			
                			} 
                			?>

                		
                		</div>               		

                		<div class="form-group text-right">
                			<button type="button" name="submit" id="submit" onclick="formSubmit();" class="btn btn-primary">Register</button>
                		</div><!-- form group -->
                			<p id="signup-status" class="text-danger"></p>

                			<a href="index"><small><span class="text-dark">Exiting User?</span> Log in</small> 
</a>

                		
                	</form>
                      
                 </div>
                 
             </div>            
			
		</div><!-- col 4 close -->
	</div><!-- row close -->
</div><!-- container close -->

<script type="text/javascript">
	function formSubmit(){
		var name = $('#username').val();
		var email = $('#email').val();
		var password = $('#password').val();

		// img
		var img = document.getElementById("image"),
       photo = img.files[0];

		var if_error = '';

		if(name == ''){
			$('#name_error').html('Please Fill Your Name');
			$('#username').addClass("signup-error");

			if_error='yes';
		}
		if(email == ''){
			$('#email_error').html('Please Fill Your Email Address');
			if_error='yes';
			$('#email').addClass("signup-error");

		}
		
		if(password == ''){
			$('#password_error').html('Please Fill Your Password');
			if_error='yes';
			$('#password').addClass("signup-error");

		}
		

		if(if_error == '')
		{
			$('.span_error').html('');
			$('#username').removeClass("signup-error");
			$('#email').removeClass("signup-error");
			$('#password').removeClass("signup-error");

			$.ajax({
				type: 'POST',
				url: 'signup_query',
				data:{name:name,email:email,password:password,image:photo},
				beforeSend:function()
				{
					$('#submit').html("please wait..");
					$('#submit').attr('disabled',true);
				},
				success:function(respo)
				{
					alert("You are successfully registered");
					$('#signup-status').html(respo);

					$('#signup-form')[0].reset();

					$('#submit').html("Register");
					$('#submit').attr('disabled',false);
				},
				error:function(){
               
				     $('#signup-status').html("You are not registered <br> Please try again");
				     $('#submit').html("Register");
					$('#submit').attr('disabled',false);

            }

			});




			//alert('okk')
		}else{
			alert('Please fill all field')
		}

		
	}
	
</script>