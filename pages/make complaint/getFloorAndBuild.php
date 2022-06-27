<?php


$q =  $_REQUEST["roomNum"];
$hint = "";
if ($q !== "") {
   $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,"muqu");

    if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
     // Get Floor and Building from DB
      $sql1 = "SELECT floor, building  FROM classroom WHERE roomNumber='$q'";

      $result1 = $conn->query($sql1);
     $rowcount1=mysqli_num_rows($result1);
	  for($i=1;$i<=$rowcount1;$i++){
		 $row1=mysqli_fetch_array($result1);
		$hint =  $row1["floor"] . '-'. $row1["building"];
  }

}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>
