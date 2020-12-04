<?php
	session_start() ;
	$con = mysqli_connect('localhost','root','','hostelP') ;

	if(isset($_POST['logout'])){
		?>
			<script> window.open('login_admin.php','_self') ; </script>
		<?php
	}
	if(isset($_POST['submit1'])){
		global $con ;
		$roomNo = $_POST['del_room'] ;
		$admin_id = $_SESSION['admin'] ;
		$hostelName = $_POST['choice1'] ;

		$run = mysqli_query($con,"SELECT admin_id FROM HOSTEL WHERE hostel_name='$hostelName'") ;
		$data = mysqli_fetch_assoc($run) ;
		$admin = $data['admin_id'] ;

		if($admin == $admin_id) {
			$query = "SELECT flag_occupied FROM ROOM WHERE room_no='$roomNo' AND hostel_name='$hostelName'" ;
			$run = mysqli_query($con,$query) ;
			$rows = mysqli_num_rows($run) ;

			if($rows == 1) {
				$data = mysqli_fetch_assoc($run) ;
				$flag = $data['flag_occupied'] ;
		
				if($flag == 0){
					//delete vacant room
					$run = mysqli_query($con,"DELETE FROM ROOM WHERE room_no='$roomNo' AND hostel_name='$hostelName'") ;
					?> <script> alert('Room Deleted!') ; </script> <?php
				}
				if($flag == 1){
					//occupied room
					?> <script> alert('Room is occupied !\nDeallocate the room first.') ; </script> <?php
				}
		
			}
			else{
				?> <script> alert('Room Selection Invalid !') ; </script> <?php
			}
		}
		else {
			?> <script> alert('You are not an admin of this hostel!') ; </script> <?php
		}
	}
	if(isset($_POST['submit2'])){
		global $con ;
		$roomNo = $_POST['room2'] ;
		$admin_id = $_SESSION['admin'] ;
		$hostelName = $_POST['choice2'] ;

		$run = mysqli_query($con,"SELECT hostel_name , admin_id FROM HOSTEL WHERE hostel_name='$hostelName' AND admin_id='$admin_id'") ;
		$data = mysqli_fetch_assoc($run) ;
		$admin = $data['admin_id'] ;

		if($admin_id != $admin){
			?> <script> alert('You are not allowed to add room to this hostel!') ; </script> <?php
		}
		else{
			$run = mysqli_query($con,"SELECT * FROM ROOM WHERE room_no='$roomNo' AND hostel_name='$hostelName'") ;
			$rows = mysqli_num_rows($run) ;
	
			if($rows != 0) {
				?> <script> alert('This Room Already Present!') ; </script> <?php
			}
			if($rows == 0) {
				$query = "INSERT INTO ROOM VALUES ('$roomNo','$hostelName',0,NULL)" ;
				$run = mysqli_query($con,$query) ;
				if($run)
					?> <script> alert('Room Added!') ; </script> <?php
			}			
		}
	}
	if(isset($_POST['submit3'])){
		global $con ;
		$admin_id = $_SESSION['admin'] ;
		$roll = $_POST['update3'] ;
		$fee = $_POST['update33'] ;
	
		$run = mysqli_query($con,"SELECT * FROM APPLICATION_FORM WHERE applicant_roll='$roll'") ;
		$rows = mysqli_num_rows($run) ;
		if($rows == 1){
			$data = mysqli_fetch_assoc($run) ;
			$sNo = $data['serial_no'] ;

			$run = mysqli_query($con,"SELECT * FROM ROOM WHERE serial_no='$sNo'") ;
			$rows = mysqli_num_rows($run) ;
			if($rows == 1){
				$data = mysqli_fetch_assoc($run) ;

				$hostelName = $data['hostel_name'] ;
				$run = mysqli_query($con,"SELECT admin_id FROM HOSTEL WHERE hostel_name='$hostelName'") ;
				$data = mysqli_fetch_assoc($run) ;
				$admin = $data['admin_id'] ;

				if($admin == $admin_id){
					$run = mysqli_query($con,"UPDATE FEES SET fees='$fee' WHERE rollNo='$roll'") ;
					?> <script> alert('Fees Updated!') ; </script> <?php
				}else{
					?> <script> alert('You are not the admin of this room!') ; </script> <?php
				}		
			}else{
				?> <script> alert('User does not have the room yet!') ; </script> <?php
			}
		}else{
			?> <script> alert('User has not filled the application form yet !') ; </script> <?php
		}
	}
	if(isset($_POST['submit4'])){
		global $con ;
		$admin_id = $_SESSION['admin'] ;
		$roll = $_POST['allocate4'] ;

		$run = mysqli_query($con,"SELECT * FROM APPLICATION_FORM WHERE applicant_roll='$roll'") ;
			$rows = mysqli_num_rows($run) ;

			if($rows == 1){
				$data = mysqli_fetch_assoc($run) ;
				$hostelCh = $data['hostel_choice'] ;

				$sNo = $data['serial_no'] ;
				$zero = 0 ;
				$one = 1 ;

				$run = mysqli_query($con,"SELECT * FROM ROOM WHERE serial_no='$sNo'") ;
				$rows = mysqli_num_rows($run) ;
				if($rows == 1) {
					?> <script> alert('already allocated!') ; </script> <?php
				}else {
					$run = mysqli_query($con,"SELECT * FROM ROOM WHERE hostel_name='$hostelCh' AND flag_occupied=0 LIMIT 1") ;
					$rows = mysqli_num_rows($run) ;

					if($rows == 1){
						$data = mysqli_fetch_assoc($run) ;
						$roomNo = $data['room_no'] ;
						
						$hostelName = $data['hostel_name'] ;
						$run = mysqli_query($con,"SELECT admin_id FROM HOSTEL WHERE hostel_name='$hostelName'") ;
						$data = mysqli_fetch_assoc($run) ;
						$admin = $data['admin_id'] ;

						if($admin != $admin_id){
							?> <script> alert('Change Admin!') ; </script> <?php
						}else {
							$run = mysqli_query($con,"UPDATE ROOM SET serial_no='$sNo' WHERE room_no='$roomNo' AND hostel_name='$hostelCh'") ;
							$run = mysqli_query($con,"UPDATE ROOM SET flag_occupied=1 WHERE room_no='$roomNo' AND hostel_name='$hostelCh'") ;
							$run = mysqli_query($con,"INSERT INTO FEES VALUES ('$roll','$admin_id',980)") ;
							?> <script> alert('room allocated!') ; </script> <?php
						}
					}else if($rows == 0){
						?> <script> alert('add room to the hostel first!') ; </script> <?php
					}
				}
			}
			else {
				?> <script> alert('application form does not exist!') ; </script> <?php
			}		
	}
	if(isset($_POST['submit5'])){
		global $con ;
		$admin_id = $_SESSION['admin'] ;
		$roomNo = $_POST['deallocate5'] ;
		$hostelName = $_POST['deallocate55'] ;

		$run = mysqli_query($con,"SELECT * FROM ROOM WHERE room_no='$roomNo' AND Hostel_name='$hostelName'") ;
		$rows = mysqli_num_rows($run) ;
		if($rows == 1){
			$data = mysqli_fetch_assoc($run) ;
			$flag = $data['flag_occupied'] ;
			$sNo = $data['serial_no'] ;
			$hostelName = $data['hostel_name'] ;
			$run = mysqli_query($con,"SELECT admin_id FROM HOSTEL WHERE hostel_name='$hostelName'") ;
			$data = mysqli_fetch_assoc($run) ;
			$admin = $data['admin_id'] ;

			if($flag == 0){
				?> <script> alert('already deallocated or has not been occupied yet!') ; </script> <?php
			}else{
				if($admin == $admin_id){
					$run = mysqli_query($con,"UPDATE ROOM SET serial_no=NULL WHERE room_no='$roomNo' AND hostel_name='$hostelName'") ;
					$run = mysqli_query($con,"UPDATE ROOM SET flag_occupied=0 WHERE room_no='$roomNo' AND hostel_name='$hostelName'") ;

					$run = mysqli_query($con,"SELECT * FROM APPLICATION_FORM WHERE serial_no='$sNo'") ;
					$data = mysqli_fetch_assoc($run) ;
					$roll = $data['applicant_roll'] ;
					$run = mysqli_query($con,"DELETE FROM FEES WHERE rollNo='$roll'") ;

					?> <script> alert('room deallocated!') ; </script> <?php
				}else{
					?> <script> alert('Change Admin!') ; </script> <?php
				}
			}
		}else{
			?> <script> alert('invalid selection of room!') ; </script> <?php
		}
	}
?>

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
    <link href="style5.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    
</head>

<body>
	<h1> Welcome Admin </h1>
	
		
	<div class="admin-box">
	<br>
		<form class="admin" method="POST" >
			<img src="./images/admin.png" class="avatar"><br><br>
			<input type="submit" name="logout" value="Logout">

		</form>
		
	</div>
	
	<div class="delete-box">
	<br>
		<form class="delete" method="POST" >
			<h2> Delete Room </h2><br>
			PG-1 Hostel :
			<input type="radio" name="choice1" value="PG-1" required>
			PG-2 Hostel :
			<input type="radio" name="choice1" value="Pg-2" required> <br>
			<input type="text" name="del_room" ><br>
	<br>
			<input type="submit" name="submit1" value="DELETE">

		</form>
		
	</div>
	
	
	<div class="add-box">
	<br>
		<form class="add" method="POST" >
			<h2> Add Room </h2><br>
			PG-1 Hostel :
			<input type="radio" name="choice2" value="PG-1" required>
			PG-2 Hostel :
			<input type="radio" name="choice2" value="PG-2" required> <br>
			<input type="text" name="room2" ><br>
	<br>
			<input type="submit" name="submit2" value="ADD">

		</form>
		
	</div>

	<div class="update-box">
	<br>
		<form class="fees" method="POST">
			<h2> Update Fees </h2>
			Roll No :<br>
			<input type="text" name="update3" required="required" > <br><br>
			Recent Fee :<br>
			<input type="number" name="update33" required="required" > <br>
	<br>
			<input type="submit" name="submit3" value="UPDATE">
		</form>
	</div>

	<div class="allocate-box">
	<br>
		<form class="fees" method="POST">
			<h2> Allocate Room </h2>
			Roll No :<br>
			<input type="text" name="allocate4"> <br>
	<br>
			<input type="submit" name="submit4" value="ALLOCATE">
		</form>
	</div>

	<div class="deallocate-box">
	<br>
		<form class="deloacte" method="POST">
			<h2> Deallocate Room </h2>
			Room No :
			<input type="text" name="deallocate5" required="required" > <br><br>
			Hostel Name :
			<input type="text" name="deallocate55" required="required" ><br>
	<br>
			<input type="submit" name="submit5" value="DEALLOCATE">
		</form>
	</div>

</body>
</html>


