<?php


$q = $_REQUEST["roomNum"];
if ($q !== "") {
   $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,"muqu");

    if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    // Get PC Numbers
      $sql1 = "SELECT computerId FROM computer WHERE roomN='$q'";

      $result = $conn->query($sql1);
	  while($row = mysqli_fetch_array($result)) {
			echo ' <option  value="'.$row["computerId"].'">' .$row["computerId"].' </option>';


	  }
  }



?>
