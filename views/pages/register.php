<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="logic/register.php" method="post">
                    <div class="alert alert-danger">
                        
                    </div>

					<input class="mb-5"type="text" name="username" id="username" placeholder="Username"/>
					<input type="email" name="email" id="email" placeholder="Email"/>
					<input type="password" name="password" id="password" placeholder="Password"/>
					<input type="password" name="confpassword" id="confpassword" placeholder="Confirm Password"/>
                    <button type="submit" name="register" id="register" class="btn btn-primary btn-block btn-lg"> Sign Up</button>
                    
				</form>
				<p class="mt-3">Already have an Account? <a href="index.php?page=login"><strong>Login Now!</strong></a></p>
			</div>
		</div>
    <!-- //main -->
</body>
