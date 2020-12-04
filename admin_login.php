<?php
	session_start() ;

	$con = mysqli_connect('localhost','root','','hostelP') ;
	
	$adminId = $_POST['username'] ;
	$password = $_POST['pwd'] ;

	$query = "SELECT admin_id, password FROM ADMIN where admin_id='$adminId' AND password='$password'" ;

	$run = mysqli_query($con,$query) ;

	$rows = mysqli_num_rows($run) ;
	
	$_SESSION['admin'] = $adminId ;

	if($rows == 1)
		echo '<script>
			window.open("adminPage.php","_self") ;
		</script>' ;

		
	if($rows != 1)
		echo '<script>
			alert("Invalid Cred") ;
			window.open("login_admin.php","_self") ;
		</script>' ;
?>
