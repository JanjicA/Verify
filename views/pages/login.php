<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Login Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="logic/login.php" method="post">
                    <div class="alert alert-danger">
                        
                    </div>

					<input type="email" name="email" id="email" placeholder="Email"/>
					<input type="password" name="password" id="password" placeholder="Password"/>
                    <button type="submit" name="login" id="login" class="btn btn-primary btn-block btn-lg"> Login</button>
                    
				</form>
				<p class="mt-3">Don't have an Account? <a href="index.php?page=register"><strong>Sign Up!</strong></a></p>
			</div>
		</div>
    <!-- //main -->
</body>