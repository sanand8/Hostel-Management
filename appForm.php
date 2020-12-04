<!DOCTYPE html>
<head>
	<title> HM </title>
	<!-- meta data -->
	<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
	<!-- custome style sheet -->
	<link href="style3.css" rel="stylesheet" type="text/css" />
	<!-- custome style sheet -->

	<!-- fontawesome style sheet -->
	<link href="fontawesome-all.css" rel="stylesheet" />
	<!-- fontawesome style sheet -->
</head>

<body>
	<h1> Application Form </h1>
	
	<form method="POST" class="group">
	 
                <label> Roll Number </label>
                <div >
                   <input type="text" class="form-control" name="student_roll_no" placeholder="Roll No" required="required" />
                </div>
 	
        <div class="group3">
	  <h2> HOSTEL CHOICE : </h2>
	  PG-1 Hostel <input class="group1" type="radio" name="option"  value="PG-1" required="required"> 
                    
	  PG-2 Hostel <input class="group2" type="radio" name="option" value="PG-2" required="required"> <br>
	</div>
	<br>
	<button name="click" value="Submit"> Submit </button> <br><br>
	<a href="userPage.php" style="color : green ;"> Go Back </a>
	</form>
	<br>	
	<br>

        <p class="copy">  2019 DBMS Project. All Rights</p>
	
</body>
</html>

<?php
	session_start() ;
	$con = mysqli_connect('localhost','root','','hostelP') ;

	if(isset($_POST['click'])){
		global $con ;
		$rNo = $_SESSION['rollNo'] ;

		if($rNo == $_POST['student_roll_no']) {
			$rollNo = $_POST['student_roll_no'] ;
			$hostelChoice = $_POST['option'] ;

			$run = mysqli_query($con,"SELECT applicant_roll FROM APPLICATION_FORM WHERE applicant_roll='$rollNo'") ;
			$rows = mysqli_num_rows($run) ;

			if($rows == 1){
				?> <script> alert('already applied !') ; </script> <?php
			}
			else {
				$query = "INSERT INTO APPLICATION_FORM (hostel_choice, applicant_roll) VALUES ('$hostelChoice','$rollNo')" ;
				$run = mysqli_query($con,$query) ;
				if($run){
					?> <script> alert('application accepted!') ; </script> <?php
				}
			}
		}
		else{
			?> <script> alert('apply for urself only !') ; </script> <?php
		}
	}
?>

