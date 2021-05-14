<div class="container-fluid signup-margin" >
	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-10 col-12 m-auto">
			<div class="card" >
              <div class="card-header bg-primary text-light text-center h3">         
              Sign Up to <strong>User</strong>  
                </div>
                <div class="card-body">
                	<form id="signup_form" name="signup_form" action="signup_query" method="POST" enctype="multipart/form-data">
                		<div class="form-group">
                			<label>Full Name <span class="text-danger">*</span></label>
             <input type="text" name="name" id="name" placeholder="Full Name" class="form-control" onKeyPress="return Validatename(event);" onkeyup="makeUpperName();" required>
                				
                		</div><!-- form group -->

                		<div class="form-group">
                			<label>Email <span class="text-danger">*</span></label>
                				<input type="email" id="email" name="email" placeholder="Email Id" class="form-control" required>
                				
                		</div><!-- form group -->                	
                		<div class="form-group">
                			<label>Password <span class="text-danger">*</span></label>
                				<input type="password" name="password" placeholder="Password" id="password" class="form-control" required>
                				
                		</div><!-- form group --> 

                		<div class="form-group">
                			<label>Your Photo*</label>
                			<input type="file" name="image" id="image" class="form-control" required>
                			<?php 
                			if(isset($error)){
                			echo $error;                			
                			} 
                			?>

                		
                		</div>               		

                		<div class="form-group text-right">
                			<button type="submit" name="submit" id="submit"  class="btn btn-primary">Register</button>
                		</div><!-- form group -->
                		<?php 
                			if(isset($success)){
                			echo '<p id="signup_status" class="text-danger">'.$success;
                			//print_r($ms);
                			} 
                			?>
                			</p>

                			<a href="index"><small><span class="text-dark">Exiting User?</span> Log in</small></a>

                		
                	</form>
                      
                 </div>
                 
             </div>            
			
		</div><!-- col 4 close -->
	</div><!-- row close -->
</div><!-- container close -->

<script type="text/javascript">
	function makeUpperName()
              {
                 document.signup_form.name.value= document.signup_form.name.value.toUpperCase();
    
              }

              
              function Validatename(evt) {
                        debugger;
                        var keyCode = (evt.which) ? evt.which : evt.keyCode
                        if ((keyCode >= 65 && keyCode <= 91) || (keyCode >= 96 && keyCode <= 122) || keyCode ==8)
                        return true;
                        return false;
                        }




</script>
