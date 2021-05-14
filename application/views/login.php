<div class="container-fluid login-margin">
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 m-auto">
			<div class="card" >
              <div class="card-header bg-primary text-light text-center h3">         
              Sign In to <strong>Admin</strong>  
                </div>
                <div class="card-body">
                	<form>
                		<div class="form-group">
                			<div class="col-xl-12">
                				<input type="text" name="username" placeholder="Username (Email Id)" id="username" class="form-control">
                                <span id="username_error" class="text-danger span_error"></span>
                			</div>
                		</div><!-- form group -->

                		<div class="form-group">
                			<div class="col-xl-12">
                				<input type="password" name="password" placeholder="Password" id="password" class="form-control">
                                <span id="password_error" class="text-danger span_error"></span>

                			</div>
                		</div><!-- form group -->
                		<div class="form-group text-right">
                			<button type="button" id="submit" name="submit" onclick="formSubmit();" class="btn btn-primary">Login</button>
                		</div><!-- form group -->

                        <p id="login_status" class="text-danger"></p>

                		<a href="signup"> <small><span class="text-dark">New to User?</span>  Create an account</small>
                        </a>
                	</form>
                      
                 </div>
                 
             </div>
			
		</div><!-- col 4 close -->
	</div><!-- row close -->
</div><!-- container close -->


<script type="text/javascript">
    function formSubmit(){
        var email = $('#username').val();        
        var password = $('#password').val();

        var if_error = '';

        if(email == ''){
            $('#username_error').html('Please Fill Your Username');
            $('#username').addClass("signup-error");

            if_error='yes';
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
            $('#password').removeClass("signup-error");

            $.ajax({
                type: 'POST',
                url: 'login_query',
                data:{email:email,password:password,},
                beforeSend:function()
                {
                    $('#submit').html("please wait..");
                    $('#submit').attr('disabled',true);
                },
                success:function(data)
                {
                    var response = jQuery.parseJSON(data);
                    if(response.result =='success')
                    {
                        window.location.href="admin_index";
                        //window.open('admin-index','_self')
                        //alert('ok')
                        //console.log('fine');
                    }else{
                        $('#login_status').html(response.msg);
                    }                  

                    $('#submit').html("Login");
                    $('#submit').attr('disabled',false);
                },

            });




            //alert('okk')
        }else{
            alert('Please fill all field')
        }

        
    }
    
</script>