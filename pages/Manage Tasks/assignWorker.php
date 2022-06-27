<?php
   // re-assign worker

	 $servername = "localhost";
	 $username = "root";
	 $password = "";

	 // Create connection
	 $conn = mysqli_connect($servername, $username, $password,"muqu");

	 if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	 }
	 // get value from ajax requests in manage pages
	 $complainId=$_GET['complainId'];
	 $workerId=$_GET['workerId'];
	 mysqli_select_db($conn,"muqu");

	 // delate complaint from deal table when re-assign worker
	  $sql1  ="DELETE FROM deal WHERE complaintId ='$complainId'" ;

	if ($conn->query($sql1) === TRUE) {
	  echo "\n Record deleted successfully 1 ";
	} else {
	  echo "Error deleting record: " . $conn->error;
	}
	 $vv= 0;

	 // re-assign complaint to worker
	 $sql = "INSERT INTO assign (userId, compliantId , saved) VALUES ('$workerId', '$complainId', '$vv')";

	if ($conn->query($sql) === TRUE) {
	  echo "\n Record inserted successfully";
	} else {
	  echo "Error inserted record: " . $conn->error;
	}

	$conn->close();
	 echo "\n sucess";
 ?>
