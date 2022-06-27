<!DOCTYPE html>
<html>
<body>

<!--PHP-->
<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"muqu");

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$q=$_GET['q'];
mysqli_select_db($conn,"muqu");

$sql="SELECT complaintId, date ,roomNum , category , description  FROM complaint WHERE complaintId= '".$q."'";
$sql1="SELECT images FROM complaint WHERE complaintId= '".$q."'";

$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);
?>
<?php
  $i = 0;
  while($rows = mysqli_fetch_array($result)) {
  $i++;
?>

  <!--CSS-->
<style>

labe.mytitelscss{
color: #676767;
font-family: 'Rambla';font-size: 18px;

}
h5.mytitelscs0{
  color: #2F5972;
  font-family: 'Roboto Mono';font-size: 17px;

  }

  .mtop{

color:rgb(18, 57, 98);
font-size: 20px;

 }
.input-info{
  background:##F6F4F1;

  box-sizing: border-box;

  border: none;
  font-style: italic;
  font-size: 20px;

}
</style>

<form>
<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="mtop col-form-label">Complaint ID :</label>
  </div>
  <div class="col-auto">
    <input    class="input-info form-control-plaintext " type="text" value="<?php echo $rows["complaintId"]; ?>" aria-label="Disabled input example" disabled readonly>
  </div>
</div>

<div class="row g-3 align-items-center mt-">
  <div class="col-auto">
    <label for="inputPassword6" class="mtop col-form-label">Room Number :</label>
  </div>
  <div class="col-auto">
    <input class="input-info form-control-plaintext" type="text"  value="<?php echo $rows["roomNum"]; ?>" aria-label="Disabled input example" disabled readonly>
  </div>
</div>
<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="mtop col-form-label">Category :</label>
  </div>
  <div class="col-auto">
    <input class="input-info form-control-plaintext" type="text"  value="<?php echo $rows["category"]; ?>"aria-label="Disabled input example" disabled readonly>
  </div>
</div>
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="mtop col-form-label">Date :</label>
  </div>
  <div class="col-auto">
    <input class="input-info form-control-plaintext" type="text"  value="<?php echo $rows["date"]; ?>" aria-label="Disabled input example" disabled readonly>
  </div>
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="mtop col-form-label">Description :</label>
  </div>
  <div class="col-auto">
    <input class="input-info form-control-plaintext" type="text"  value="<?php echo $rows["description"]; ?>" aria-label="Disabled input example" disabled readonly>
  </div>
</div>
  <?php
  $ii = 0;
  while($row1 = mysqli_fetch_array($result1)){
  $ii++;
  if( !empty($row1["images"])){
    ?>
      <label for="inputPassword6" class="mtop col-form-label">Image :</label>
   <p><img src="<?php echo $row1["images"]; ?>" width="100" height="100" /> </p>

  <?php }
  else {?>
    <p></p>
    <?php }?>
    <?php }?>
    <?php }
  if ($i <1) {
  ?>
<tr><td colspan="11">There are no complaint</td></tr>
<?php
}
 ?>
</form>
</body>
</html>
