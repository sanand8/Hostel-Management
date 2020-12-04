<!DOCTYPE html>
<head>
	<title> Signup Student </title>

	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="style4.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
</head>

<body>
	<h1> STUDENT SIGNUP </h1>
	<br>	
	<br>
	<div class="login-box">
		<img src="./images/av.png" class="avatar">
		<h2> Application Form </h2>
	<br>
		<form class="sign" method="POST" >
			<p>First Name<input type="text" name="first" required></p>
			<p>Middle Name<input type="text" name="middle" ></p>
			<p>Last Name<input type="text" name="last" ></p>
			<p>Roll Number<input type="text" name="username" required></p>
			<p>Programme<input type="text" name="programme" value="B.Tech" readonly></p>
			<p>Department<input type="text" name="dept" value="CS" readonly></p>
			<p>Year
				<select required>
					<option> value="3rd Year" </option>
					<option> value="4th Year" </option>
				</select>
			</p>	
			<p>Email Address<input type="text" name="emailid" ></p>
			<p>Password<input type="text" name="pwd" required></p>
	
			<input type="submit" name="submit" value="Submit Form">
			<a href="index.php" style="color : #0000ff ;"> Go to Home </a>
		</form>
		
	</div>
</body>



