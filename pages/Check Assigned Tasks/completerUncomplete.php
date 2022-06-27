<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "muqu";

 $con = mysqli_connect($servername, $username, $password, $dbname);
 if (!$con) {
   die('Could not connect: ' . mysqli_error($con));
 }
if(isset($_POST['submit']) || isset($_POST['submit2']))
{

  $finalList=$_POST['chk_id'];
  var_dump($_POST['chk_complaint']);

  foreach ($_POST['chk_complaint'] as $key => $value)
  {
  	if(in_array($_POST['chk_complaint'][$key], $finalList))
  	{
  	$woekerID=$_POST['chk_wrkid'][$key];
  	$complaintID= $_POST['chk_complaint'][$key];
    $insertqry="";
    if (isset($_POST['comment']) && $_POST['comment'] != "")
    {
      $reason= $_POST['comment'];
      $insertqry="INSERT INTO `deal`(`userId`, `complaintId`, `completeness`,`reason`)
      VALUES ('$woekerID','$complaintID','Uncompleted','$reason')";
      mysqli_query($con,$insertqry);
    }
    else{
   $insertqry="INSERT INTO `deal`(`userId`, `complaintId`, `completeness`) VALUES ('$woekerID','$complaintID','Completed')";
   $insertqry=mysqli_query($con,$insertqry);
    }
    //make it =1 to delete it

   $updateqry="UPDATE assign set saved='1' where compliantId ='$complaintID' and userId='$woekerID'";
   $insertqry=mysqli_query($con,$updateqry);
        header("Location: Check Assigned Tasks.php");
if(!mysqli_error($con))
  echo '<meta http-equiv="refresh" content="0; url=Check Assigned Tasks.php">';
}

  }
  }
 ?>
