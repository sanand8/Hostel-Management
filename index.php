<!DOCTYPE html>
<html lang="en">

<head>
    <title>HMS</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    
</head>


<body>
    <h1>Hostel Room Allocation System</h1>
<div class=" w3l-login-form">
        <h2>User Login</h2>
        <form method="POST">

            <div class=" w3l-form-group">
                <label>ROLL NO:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="student_roll_no" placeholder="Roll No" required="required" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
                </div>
            </div>
            <!--<div class="forgot">
                <a href="#">Forgot Password?</a>
                <p><input type="checkbox">Remember Me</p>
            </div>-->
            <button type="submit" name="login-submit">Login</button>
        </form>
          <p class=" w3l-register-p">Login as<a href="login_admin.php" class="register"> Admin</a></p>
        <p class=" w3l-register-p">Don't have an account?<a href="signup.php" class="register"> Sign up</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2019 DBMS Project. All Rights</p>
    </footer>

</body>

</html>

<?php
	session_start() ;
	$con = mysqli_connect('localhost','root','','hostelP') ;

	if(isset($_POST['student_roll_no'])){
		global $con ;
		$rollNo = $_POST['student_roll_no'] ;
		$password = $_POST['pwd'] ;

		$query = "SELECT rollNo, password FROM USERS where rollNo='$rollNo' AND password='$password'" ;

		$run = mysqli_query($con,$query) ;

		$rows = mysqli_num_rows($run) ;
 		$_SESSION['rollNo'] = $rollNo ;
		if($rows == 1)
		echo '<script>
			window.open("userPage.php","_self") ;
		</script>' ;
		if($rows != 1)
			echo '<script>
			alert("Invalid Cred") ;
			window.open("index.php","_self") ;
			</script>' ;
	}
?>

