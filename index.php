<?php 
//require connection to the database
	require "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Advyte</title>
	<link rel = "stylesheet" href="css/bootstrap.css" />
	<link rel = "stylesheet" href = "css/style.css" />
	<link >
</head>
<?php
	if(isset($_POST['signUp'])) { // user signing up
		require "signup.php";
	}
	if(isset($_POST['login'])) {
		require "login.php";
	}
	
?>
<body>

	<nav class="navbar navbar-inverse" role = "navigation">
        <div class="container">
         	<div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class = "hidden navbar-brand" href = "#logo"> <h3>Advyte</h3> </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   <li><a href="#login" data-toggle = "modal">Login</a></li>
                   <li><a href = "#signup" data-toggle = "modal">Sign Up </a></li>
                </ul>
            </div>
        </div>
    </nav>      

	<div id = "login" class = "modal fade" data-toggle="modal" role = "dialog" aria-labelledby="modalLabel" tabindex="-1">
		<div class = "modal-dialog" role = "document">
			<div class = "modal-content">
				<div class = "modal-header">
					<h3>Login</h3>
					<button type = "button" class = "close" data-dismiss="modal" aria-label="close">
				         <span aria-hidden="true">&times;</span>
				    </button> <!-- close button -->
				</div><!--modal header-->
				
				<div class = "modal-body">
					<form action="login.php" method="POST" autocomplete="off">
						<div class="form-group">
							
							<label for = "email_Username">Email or Username</label>
								<input class="form-control" type="text" name="email" autofocus="on" required="required" autocomplete="off" placeholder="Please enter your email address or username">
							
								<label for ="password" >Password</label>
								<input class="form-control" type="password" required="required" autocomplete="off" name="password">
							

							
								<span class = "error"></span>
								<input type="submit" name="login" value = "Login"/>
							

						</div>
						
					</form> <!-- login form -->
				</div> <!-- modal body-->
			</div> <!-- modal content -->
		</div> <!-- modal dialog -->
	</div> <!-- modal #login -->
	
    <div class = "modal fade" id = "signup" data-toggle = "modal" aria-labelledby="modal" role = "dialog" tabindex="-1">
		<div class = "modal-dialog" role = "document">
			<div class = "modal-content">
				<div class ="modal-header">
					<h3>Sign up</h3>
					<button type = "button" class = "close" data-dismiss="modal" aria-label="close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- modal header -->
                <div class = "modal-body">
					
					<form  method="POST" action="register.php" autocomplete="off">
						<div class="form-control">
							
								<label for = "Name">username</label>
								
									<input class="form-control" type="text" name="username" required="required" placeholder="Enter a username.." autocomplete="off" autofocus="on" />
								
							
							
								<label for = "fname"> First name</label>
								<input class="form-control" type="text" name = "fname" required="required" placeholder="Enter your first name"/>
							
							
								<label for = "lname"> Last name</label>
								<input class="form-control" type="text" name = "lname" required="required" placeholder="Enter your last name"/>
							
							
								<label for = "Email">Email</label>
								
									<input class="form-control" type="email" name="email" required="required" placeholder="Enter a valid email address"/>
								
							
							
							
								
									<label for = "password">password</label>
								
								
									<input class="form-control" type="password" name="password" required="required" placeholder="Enter your password"/>
								
							
							
														
								
									<label for = "password">confirm_password</label>
								
								
									<input class="form-control" type="password" name="confirm_password" required="required" placeholder="Enter your password"/>
								
							
							
														
								
									<label for = "password">phone</label>
								
								
									<input class="form-control" type="tel" name="phone" required="required" placeholder="Enter your password"/>
								
							

							
								<span class = "error"></span>
								
									<input type="submit" name="signUp" value="submit"/>
								
								
									<input type="submit" id = "reset" name="reset" value="Reset"/>
								
								
							
						</div>
					</form> <!-- sign up form -->
			</div><!-- modal content -->
		</div> <!-- modal dialog -->
	</div><!-- modal #signup -->


	


	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src = "js/bootstrap.min.js" ></script>
		<!--<script>
			$(input#reset).on('click',function(){
			   input.value = '';
			   return false;
			   });
			else {
				return true;
			}
			
		</script>-->
</body>
</html>