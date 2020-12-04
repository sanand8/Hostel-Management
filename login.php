<?php

	$con = mysqli_connect('localhost','root','','hostelP') ;
	
	$rollNo = $_POST['student_roll_no'] ;
	$password = $_POST['pwd'] ;

	$query = "SELECT rollNo, password FROM USERS where rollNo='$rollNo' AND password='$password'" ;

	$run = mysqli_query($con,$query) ;

	$rows = mysqli_num_rows($run) ;
 
	if($rows == 1)
		echo '<script>;
			window.open("userPage.php","_self") ;
		</script>' ;
	if($rows != 1)
		echo '<script>
			alert("Invalid Cred") ;
			window.open("index.php","_self") ;
		</script>' ;

?>
