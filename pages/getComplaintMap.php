

  <?php

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "muqu";

 $con = mysqli_connect($servername, $username, $password, $dbname);
 if (!$con) {
   die('Could not connect: ' . mysqli_error($con));
 }
 $q=$_GET['q'];
 mysqli_select_db($con,$dbname);
 $sql="SELECT * FROM complaint WHERE roomNum = '".$q."'";


 $result = mysqli_query($con,$sql);
 ?>
 <?php
 $i = 0;
 while($rows = mysqli_fetch_array($result)) {
   $i++;

   ?>
   <tr>
     <td> <?php echo  $rows["complaintId"]; ?> </td>
   <td> <?php echo  $rows["date"]; ?> </td>
 <td> <?php echo  $rows["category"]; ?> </td>
<td> <?php echo  $rows["status"]; ?> </td></tr>

  <?php
   }
   if ($i <1) {
?>
<tr><td colspan="11">There are no complaint</td></tr>
<?php
}
  ?>
