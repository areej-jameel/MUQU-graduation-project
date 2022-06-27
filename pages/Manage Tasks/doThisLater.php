<?php
  // do this later

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

	 // delate complaint from deal table when chose do this later
	 $sql1  ="DELETE FROM deal WHERE complaintId ='$complainId'" ;

	if ($conn->query($sql1) === TRUE) {
	  echo "Record deleted successfully 1 ";
	} else {
	  echo "Error deleting record: " . $conn->error;
	}

	// delate complaint from assign table when chose do this later
	$sql2  ="DELETE FROM assign WHERE compliantId ='$complainId'" ;

	if ($conn->query($sql2) === TRUE) {
	  echo "Record deleted successfully2 ";
	} else {
	  echo "Error deleting record: " . $conn->error;
	}
	// set complaint status to Not Processed when press do this later
	 $sql = "UPDATE complaint SET status='Not Processed' WHERE complaintId='$complainId'" ;
	if ($conn->query($sql) === TRUE) {
	  echo "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . $conn->error;
	}
	$conn->close();
	 $result = mysqli_query($conn,$sql);
	 echo "sucess";
 ?>
