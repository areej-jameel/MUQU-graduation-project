
<?php
// confirm complain

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"muqu");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// get value from post requests in manage pages
foreach($_POST as $key => $value) {
  if (strpos($key, 'box_') === 0) {
    $complainID = str_replace("box_", '', $key) ;

    // set complaint status to solved when confirming
    $updateSql = "UPDATE complaint
           		  	SET status = 'solved'
           				WHERE complaintid = $complainID ";

           				if ($conn->query($updateSql) === TRUE) {
                    "Record UPDATE successfully 1 ";
           }
                 else {
                     "Error UPDATE record: " . $conn->error;
           }

           // delate complaint from deal table when  confirming
          $sql2  ="DELETE FROM deal WHERE complaintId ='$complainID'" ;

           if ($conn->query($sql2) === TRUE) {
              "Record deleted successfully2 ";
           } else {
             echo "Error deleting record: " . $conn->error;
           }
            // back to manage page
             echo '<meta http-equiv="refresh" content="0; url=Manage.php">';
    }

}
 ?>
