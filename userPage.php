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
	<link href="style2.css" rel="stylesheet" type="text/css" />
	<!-- custome style sheet -->

	<!-- fontawesome style sheet -->
	<link href="fontawesome-all.css" rel="stylesheet" />
	<!-- fontawesome style sheet -->

</head>

<body>
	<h1> User Profile </h1>
	<!-- styling the content -->
	<form method="POST">
         <div>
	 <button class="group1" type="button " name="option1"  value="View Profile Details" > View Profile Details<br>
	
         </div> 
	<br>
	<br>
	<div>       
	 <button class="group2" type="button " name="option2" value="Apply for Rooms" >Apply for Rooms <br>
	</div> 
<br>
	<br>	 
	<div> 
	
	<button class="group3" type="button " name="option3" value="View Current Fees" > View Current Fees <br>
	</div>
<br>
	<br> 
	<div>
       	 <button class="group4" type="button " name="option4" value="View Room Allocation Status" > View Room Allocation Status <br>
	</div> 
<br>
	<br>
	<div>
       	 <button class="group5" type="button " name="option5" value="LOGOUT" > <b>LOGOUT</b> <br>
	</div>
 	</form>
        <p class="copy">  2019 DBMS Project. All Rights</p>
	
</body>
</html>

<?php
	session_start() ;
	$con = mysqli_connect('localhost','root','','hostelP') ;

	if(isset($_POST['option1'])){
			global $con ;
			$roll = $_SESSION['rollNo'] ;
			$query = "SELECT * FROM USERS WHERE rollNo='$roll'" ;
			$run = mysqli_query($con,$query) ;
			$data = mysqli_fetch_assoc($run) ;
		?>
			<script> 
				var val1 = "<?php echo $data['first name'] ?>" ; 
				var val2 = "<?php echo $data['middle name'] ?>" ;
				var val3 = "<?php echo $data['last name'] ?>" ;
				var val4 = "<?php echo $data['rollNo'] ?>" ;
				var val5 = "<?php echo $data['department'] ?>" ;
				var val6 = "<?php echo $data['phone no'] ?>" ;
				var val7 = "<?php echo $data['emailID'] ?>" ;
				var val8 = "<?php echo $data['year'] ?>" ;
				alert("Profile Details :-\n\n" + val1 + " " + val2 + " " + val3 + "\n" + val4 + "\n" + val5 + "\n" + val6 + "\n" + val7 + "\n" + val8) ;
			</script>
		<?php
	}
	if(isset($_POST['option2'])){
		?>
			<script>
				window.open('appForm.php','_self') ;
			</script>
		<?php
	}
	if(isset($_POST['option3'])){
			global $con ;
			$roll = $_SESSION['rollNo'] ;
			$query = "SELECT * FROM FEES WHERE rollNo='$roll'" ;
			$run = mysqli_query($con,$query) ;
			$data = mysqli_fetch_assoc($run) ;
		?>
			<script> 
				var val1 = "<?php echo $data['rollNo'] ?>" ; 
				var val2 = "<?php echo $data['fees'] ?>" ;
				alert("Hey User : " + val1 + "\nYour Current Fee is :\n"  + val2) ;
			</script>
		<?php
	}
	if(isset($_POST['option4'])){
			global $con ;
			$roll = $_SESSION['rollNo'] ;
			$query = "SELECT * FROM APPLICATION_FORM WHERE applicant_roll='$roll'" ;
			$run = mysqli_query($con,$query) ;
			$rows = mysqli_num_rows($run) ;
			if ($rows == 1){
				$data = mysqli_fetch_assoc($run) ;
				$sNo = $data['serial_no'] ;

				$run = mysqli_query($con,"SELECT * FROM ROOM WHERE serial_no='$sNo'") ;
				$rows = mysqli_num_rows($run) ;
				if($rows == 0) {
					?> <script> alert('Pending' + '\n' + 'Please ! Contact Your Hostel Admin.') ; </script> <?php
				}else {
					$data = mysqli_fetch_assoc($run) ;
					?>
				<script> 
					var val1 = "<?php echo $data['hostel_name'] ?>" ; 
					var val2 = "<?php echo $data['room_no'] ?>" ;
				
					alert("Allocated\nRoom No : " + val2 + "\nHostel Name : " + val1) ;
				</script>
		<?php
				}
			}
			else {
				?> <script> alert('You have not applied for any of the hostel yet.') ; </script> <?php
			}
	}
	if(isset($_POST['option5'])){
		?> <script> window.open('index.php','_self') ; </script> <?php
	}
?>

