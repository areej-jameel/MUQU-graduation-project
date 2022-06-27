<!--Manage page-->


<?php
session_start();
?>
<?php
// mysql connection000
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"muqu");

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$qury= "SELECT complaint.complaintId , complaint.status, complaint.date , complaint.category , deal.userId , deal.completeness ,deal.reason , worker.userId,worker.userName
          FROM  complaint INNER JOIN deal
          ON complaint.complaintId=deal.complaintId
          INNER JOIN worker
          ON worker.userId=deal.userId
          WHERE complaint.status='Under Processing'";

$result = $conn->query($qury);

?>
<!doctype html>
<html>
<head>
  <!-- Required meta tags -->
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<!--Bootstrap CSS Reference-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
<!-- jquery Reference-->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
<link rel="icon" type="image/x-icon" href="../img/muqu2.png">
<title>Mange Assign Tasks</title>

</head>
<!--CSS-->
<style>
  body {
    background: #eee
  }

  h6.mytitelscss {
    color: #676767;
    font-family: 'Rambla';
    font-size: 18px;
  }

  ul.nav li a,
  ul.nav li a:visited {
    color: #2F5972 !important;
    font-family: Roboto Condensed;
    font-size: 20px;
  }

  ul.nav li a,
  ul.nav li a:hover {
    color: #747f86 !important;
    font-family: Roboto Condensed;
    font-size: 20px;
  }

  .dropbtn {
    background-color: #eee;
    color: #2F5972;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  .dropdown {
    position: relative;
    display: inline-block;
    top: 15px;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: rgba(227, 231, 234, 0.61)
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  h6.mytitelscss {
    color: #676767;
    font-family: 'Rambla';
    font-size: 18px
  }

  h5.mytitelscs0 {
    color: #2F5972;
    font-family: 'Roboto Mono';
    font-size: 17px;
  }

  h5.mytiteldetails {
    color: #F6F4F1;
    font-family: 'Roboto Mono';
    font-size: 17px;
    /* //style */
    font-size: 23px;
  }

  tbody {
    background-color: #F6F4F1;
    color: #676767;
    font-family: 'Rambla';
    font-size: 15px;
    /* //style */
    font-size: 19px;
  }

  thead {
    background-color: #2F5972;
    color: #FFFFFF;
    font-family: 'Roboto Mono';
    font-size: 18px;
  }

  div .csstext {
    background: #F6F4F1;
    border-radius: 4px;
    border: 3px solid #2F5972;
  }

  h5.mytitelreson {
    color: #F6F4F1;
    font-family: 'Roboto Mono';
    font-size: 17px;
    font-size: 22px;
  }

  .xc {
    padding: 0;
    border: none;
    background: none;
    text-decoration: underline;
    font-weight: bold;
  }

  div.modelhedercss {
    background: #2F5972;
    height: 40px;
    width: 100%;
    border-radius: 00;
  }

  .search-bar {
    width: 270px;
    margin-top: 100px;
    height: 35px;
  }

  div.headerDatails {
    background: #2F5972;
    height: 40px;
    width: 100%;
    padding-bottom: 40px;
  }

  .closeX {
    margin-top: 90px;
  }

  .select-css {
    width: 100px;
  }

  .table-complaint {
    width: 900px;
  }

  .choose_file {
    position: relative;
    display: inline-block;
    border-radius: 38px;
    border: #6F92A0 solid 1px;
    width: 120px;
    height: 40px;
    padding: 4px 6px 4px 8px;
    font: normal 14px Myriad Pro, Verdana, Geneva, sans-serif;
    color: #edf1f7;
    margin-top: 2px;
  }

  .btn-primary,
  .btn-primary:active,
  .btn-primary:visited,
  .btn-primary:active:hover,
  .btn-primary.active,
  .open > .dropdown-toggle.btn-primary {
    background-color: #2F5972 !important;
    border-color: #2F5972 !important;
  }

  .btn-primary:hover {
    background-color: #6F92A0 !important;
    border-color: #6F92A0 !important;
  }

  .btn-secondary,
  .btn-secondary:active,
  .btn-secondary:visited,
  .btn-secondary:active:hover,
  .btn-secondary.active,
  .open > .dropdown-toggle.btn-secondary {
    background-color: white !important;
    border-color: white !important;
    color: #2F5972;
  }

  .btn-secondary:hover {
    background-color: #2F5972 !important;
    border-color: #edf1f7 !important;
    color: #edf1f7;
  }

  .btn-secondary:disabled {
    color: #2F5972;
  }

  .ontainer input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }

  .ontainer {
    display: block;
    position: relative;
    cursor: pointer;
    font-size: 17px;
    user-select: none;
  }

  .heckmark {
    position: relative;
    top: 0;
    left: 0;
    height: 17px;
    width: 18px;
    background-color: #ccc;
    border-radius: 25px;
    transition: 0.15s;
  }
  /* When the checkbox is checked, add a blue background */

  .ontainer input:checked ~ .heckmark {
    background-color: #2F5972;
    border-radius: 25px;
    transition: 0.15s;
  }
  /* Create the checkmark/indicator (hidden when not checked) */

  .heckmark:after {
    content: "";
    position: absolute;
    display: none;
  }
  /* Show the checkmark when checked */

  .ontainer input:checked ~ .heckmark:after {
    display: block;
  }
  /* Style the checkmark/indicator */

  .ontainer .heckmark:after {
    left: 0.48em;
    top: 0.16em;
    width: 0.2em;
    height: 0.5em;
    border: solid white;
    border-width: 0 0.15em 0.15em 0;
    transform: rotate(40deg);
  }

  .newclss {
    background-color: black;
  }

  .table-wrapper {
    position: relative;
  }

  .table-scroll {
    height: 150px;
    overflow: auto;
    margin-top: 20px;
  }

  .table-wrapper table {
    width: 100%;
  }

  .table-wrapper table * {
    background: yellow;
    color: black;
  }

  .table-wrapper table thead th .text {
    position: absolute;
    top: -20px;
    z-index: 2;
    height: 20px;
    width: 35%;
    border: 1px solid red;
  }
  /* Just common table stuff. Really. */

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    padding: 8px 16px;
  }

  th {
    background: #eee;
  }

  */ .pagetitle {
    font-family: "Times New Roman", Times, serif;
    color: #676767;
  }

  body {
    display: flex;
    flex-direction: column;
  }

  .ctaa {
    border: none;
    background: none;
  }

  .ctaa span {
    padding-bottom: 7px;
    letter-spacing: 4px;
    font-size: 10px;
    padding-right: 9px;
    text-transform: uppercase;
  }

  .ctaa svg {
    transform: translateX(-8px);
    transition: all 0.3s ease;
  }

  .ctaa:hover svg {
    transform: translateX(0);
  }

  .ctaa:active svg {
    transform: scale(0.9);
    color: #ccc;
  }

  .hover-underline-animation {
    color: #eee;
  }

  .ctaa:hover .hover-underline-animation:after {
    transform: scaleX(1);
    transform-origin: bottom left;
  }



  html,
  body {
    height: 100%;
  }

  #containerBODY {
    min-height: 100%;
  }

  #mainBODY {
    overflow: auto;
    padding-bottom: 50px;
    height: 650px;
  }

  #footer {
    position: relative;
    height: 100px;
    margin-top: -50px;
  }
  .hmarg{
margin-top: 63px;

  }
  .hmarg2{
 margin-top: 38px;

  }
  .hmarg3{
margin-top: 5px;

}
  /* footer */
</style>


<body oncontextmenu='return' class='snippet-body'>
  <!-- Header-->
  <div class="b-example-divider  pt-3 pb- pe- me-">
    <header class="p-3 ms-  mb- border-bottom ">
      <div class="container ">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="..\ManagerHome.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"> <img class="card-img-top imglogo" src="..\img/muqu2.png" width="100" height="80" alt=""></svg>
          </a>
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="..\ManagerHome.php" class="hmarg nav-link px-2 nav ps-5 hedermaargin link-secondary">Home</a></li>

            <li><a href="..\Assign Tasks\Assign.php" class="hmarg nav-link px-2 ms-4 hedermaargin link-dark">Assign Tasks</a></li>
            <li><a href="Manage.php" class="nav-link px-2 ms-4  hmarg hedermaargin link-dark">Manage Assigned Tasks</a></li>

            <li><a href="#" class="nav-link px-2 ms-4 hedermaargin hmarg link-dark">Statistics</a></li>
          </ul>

          <form class="hmarg2 col-12 col-lg-1 mb-3 mb-lg-0 me-lg-5 heder-search ">
            <input type="search" class=" form-control" placeholder="Search..." aria-label="Search">
          </form>


          <!-- dropdown -->
          <div class="dropdown me5 pe-">
            <button class="dropbtn col-sm-auto  col-1 col-lg-auto me-lg-auto mb-2  mb-md-0">


                              <!-- person icon  -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class=" hmarg3 bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                              </svg>
                              <!-- arrow icon -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-square-fill" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 4a.5.5 0 0 0-.374.832l4 4.5a.5.5 0 0 0 .748 0l4-4.5A.5.5 0 0 0 12 6H4z" />
                              </svg>
                              <p>
                                <?php
                                  echo $_SESSION['userName']; ?>
                              </p>
                            </button>
                            <div class="dropdown-content banner">
                              <a href="../../logout.php">Sign out</a>
                              <a href="#">About us</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </header>
                  </div>

  <div id="containerBODY">
    <div id="mainBODY">
      <div class="container position-relative table- pt-4 ">
        <div class="col-md-12 position-absolute mt- start-translate-middle ">
          <div class="card-body ">
            <div class="row page-">
            </div>
            <form id="form" name="myFormName" action="setStatusSolved.php" onsubmit="ajaxpost();" method="POST" class="row g-3 " "needs-validation">
              <h3 class="tableTitle mt-5 p-1 ms-4"style="font-family:Roboto Condensed ;  font-size: 33px ; font-weight: bold; color: #2F5972; ">Manage Assigned Tasks</h3>
                <!--Search for complaint id-->
              <input type="text" id="myInput" class="search-bar form-control mt-5" onkeyup="myFunction()" placeholder="Search for complaint id..">




              <br/>
              <br/>
              <div class="">

                <table id="myTable" class="table">
                  <thead class="">
                    <tr>
                      <th>
                        <label class="ontainer">
                          <input type="checkbox" value="bar1" onClick="toggle(this)" />
                          <div class="heckmark">
                      </th>
                      <th scope="col">ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Worker</th>
                      <th scope="col">Completeness</th>
                      <th scope="col">Reason </th>
                      <th scope="col">Re-Assign </th>

                    </tr>
                  </thead>
                  <tbody>

<!-- display table from database -->
<?php
while($row=$result->fetch_assoc()){
   echo"<tr>";
   echo"<td scope='row'> <label class='ontainer'><input type='checkbox' class='box' name='box_".$row["complaintId"]."' id='box_".$row["complaintId"]."' onchange='callFunction();callFunction1()' onclick='chk(this)' /> <div class='heckmark'></div></label></td>";
   echo'
  <td name=name_"'.$row["complaintId"].'">
  <button id="YourID" type="button" name='.$row["complaintId"].' value='.$row["complaintId"].'
    class="xc" data-toggle="modal" data-target="#exampleModal"
    onclick="ComplaintDetails(this)">
    '.$row["complaintId"].'</button></td>';
    echo"<td>".$row["date"]."</td>";
    echo"<td>".$row["userName"]."</td>";
    echo"<td>".$row["completeness"]."</td>";
    echo"<td>".$row["reason"]."</td>";
    echo "<td><input type='button' value='Reassign' class='btn btn-primary choose_file'  id='record_".$row["complaintId"]."'  data-toggle='modal'  data-target='#exampleModal2' onclick='idcomp(this)'></td>";
    echo"</tr>";
    }
?>
                  </tbody>
                </table>
                <!-- Confirm button -->
                <input type="submit" value="Confirm" class="btn btn-primary choose_file" onclick="cofirmMessge()" disabled id="Assign">
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>

      <!-- complaint detail window -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content csstext">
            <div class="modal-header modelhedercss float-right">

              <h5 class="mytiteldetails">Complaint Details</h5>
              <div class="text-right"> <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i> </div>
            </div>
            <div class="modal-body">
              <div>
                <table class="table ">

                  <tbody id="Ctable">

                  </tbody>
                </table>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary choose_file" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Re-assign Complaint window -->
      <div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalToggleLabel" aria-hidden="true">
        <div class="modal-dialog p-5 modal-lg">
          <div class="modal-content  csstext ">
            <div class="modal-header modelhedercss float-right ">

              <h5 class="mytitelreson">Reassign Complaint</h5>
              <div class="text-right">
                <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i> </div>
            </div>
            <form id="formReassign" name="FormName" onsubmit="ajaxpostReassign()" method="POST" class="row g-3 pe-5 ps-5 needs-validation">
              <div class=" row justify-content-center modal-body">
                <div class="col-12">
                  <div class="modal-body">
                    <div>
                      <h6 class="mb-3"></h6>

<!-- display worker names from database -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "muqu";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,$dbname);
$sql1 = "SELECT userId,userName FROM worker";

$result1 = $con->query($sql1);
echo"<select  class='form-select' id='SelectPickerWorked' name='SelectPickerWorked'>";
echo "<option disabled class='' name='W'selected  value='".$row1["userId"]. "'> Select Worker</option>";
echo "<option value='0' class=''>select worker </option>";

while($row1=$result1->fetch_assoc()){
echo "<option class='' name='W' value='".$row1["userId"]. "'>".$row1["userName"]."</option>";
}
echo"</select>";
?>

</div>
<input type="hidden" readonly class="form-control-plaintext" value="" name="ClassroomN" id="compalintIDreassign"></input>
</div>
<div class="modal-footer row">
  <input type='hidden' value='' id='record_hidden_ComplianId'>
  <button type="submit" class="btn btn-primary choose_file" id="reassign_" onclick="reAssign(this);validateMyForm(event);" disabled>Re-assign</button>
  <button type="button" class="btn-secondary choose_file" onclick="doThisLater()">Do this later</button>
</div>

            </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <footer id="footer" class=" fotter text-center text-white p-0 mt-5" style="background-color: #2F5972 ;">
    <!-- Grid container -->
    <div class="container pt-2">
    <!-- Section: Social media -->
      <section class="mb-3">

        <!-- Twitter -->
        <button class="ctaa">
          <a href="https://twitter.com/">
            <span class="hover-underline-animation">     <svg xmlns="" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">

      <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
      </svg> </a></span>
        </button>

        <!-- Outlook -->
        <button class="ctaa">
          <a href="https://outlook.live.com/owa/">
            <span class="hover-underline-animation">     <svg xmlns="" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
      </svg></a> </span>

        </button>

        <!-- Instagram -->
        <button class="ctaa">
          <a href="https://www.instagram.com/">
            <span class="hover-underline-animation">     <svg xmlns="" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">

      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
      </svg></a> </span>
        </button>

        <!-- contact-->
        <button class="ctaa">
          <a href="#">
            <span class="hover-underline-animation">     <svg xmlns="" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">

        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>

      </svg> </a></span>
        </button>
      </section>

    </div>


    <!-- Copyright -->
    <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022<em>Copyright</em> :
     <a class="text-white" href="..\ManagerHome.php">MUQU.com</a>
    </div>
    <!-- Copyright -->



  </footer>

<!--JS-->
<script>
//jquery for enable button when select worker
$(document).ready(function () {
  $('#SelectPickerWorked').val("0");

  $('#SelectPickerWorked').change(function () {
    selectVal = $('#SelectPickerWorked').val();

    if (selectVal == 0) {
       $('#reassign_').prop("disabled", true);
    }
    else {
      $('#reassign_').prop("disabled", false);
      var strUser = ds.options[ds.selectedIndex].value;
    }
  })
});


//ajax for get complaint details
function ComplaintDetails (strq) {
  var str= strq.value;

    if (str=="") {
  document.getElementById("exampleModal").innerHTML="";
  return;
}
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
  if (this.readyState==4 && this.status==200) {
    document.getElementById("Ctable").innerHTML=this.responseText;
  };
}
xmlhttp.open("GET","../getComplaints.php?q="+str,true);
xmlhttp.send();
}

function idcomp (str) {
var x=  str.id.replace("record_", "");
document.getElementById("record_hidden_ComplianId").value  = x;
}

//ajax for get send email to faculty member
function cofirmMessge () {
var complainId= document.getElementById("YourID").value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
if (this.readyState==4 && this.status==200) {
let confirmAction = "You perform a \"sendEmail\" successfully";
if (confirmAction) {
location.reload();
}
};
}
xmlhttp.open("GET","sendEmail.php?complainId="+complainId,true);
xmlhttp.send();
}
//ajax for get reassign complain
function reAssign () {
var complainId= document.getElementById("record_hidden_ComplianId").value;
var select = document.getElementById("SelectPickerWorked");
var workerId = select.options[select.selectedIndex].value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
if (this.readyState==4 && this.status==200) {

let confirmAction = "you Re-assign a work for new worked successfully";
if (confirmAction) {
location.reload();
}
};
}
xmlhttp.open("GET","assignWorker.php?complainId="+complainId+"&workerId="+workerId,true);
xmlhttp.send();
}
// ajax for get do this later
function doThisLater(){
var complainId= document.getElementById("record_hidden_ComplianId").value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
if (this.readyState==4 && this.status==200) {
let confirmAction = "You perform a \"do this later action\" successfully";
if (confirmAction) {
location.reload();
}
};
}
xmlhttp.open("GET","doThisLater.php?complainId="+complainId,true);
xmlhttp.send();
}

// search in table
function myFunction () {
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
table = document.getElementById("myTable");
tr = table.getElementsByTagName("tr");
for (i = 0; i < tr.length; i++) {
 td = tr[i].getElementsByTagName("td")[1];
 if (td) {
   txtValue = td.textContent || td.innerText;
   if (txtValue.toUpperCase().indexOf(filter) > -1) {
     tr[i].style.display = "";
   } else {
     tr[i].style.display = "none";
   }
 }
}
}


//enable button whne select row
function callFunction () {
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);

if (checkedOne) {
 document.querySelectorAll('input[type="submit"]')[0].disabled = false;
}	else
 document.querySelectorAll('input[type="submit"]')[0].disabled = true;
}

function callFunction1 () {
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);


}

 //select all rows
 function toggle (source) {
 var  checkboxes = document.getElementsByClassName("box");
 for(var i=0, n=checkboxes.length;i<n;i++) {
 checkboxes[i].checked = source.checked;
 chk(checkboxes[i]);
 callFunction();
 callFunction1();

     }
 }
// coloring checked row
function chk (result) {
if (result.checked) {
    result.parentNode.parentNode.style.backgroundColor = "";
    result.parentNode.parentNode.parentNode.style.color = "black";
} else {
    result.parentNode.parentNode.style.backgroundColor = "";
    result.parentNode.parentNode.parentNode.style.color  = "";
}
}
</script>
<!--Bootstrap js Reference-->
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'>
</script>
</body>
</html>
