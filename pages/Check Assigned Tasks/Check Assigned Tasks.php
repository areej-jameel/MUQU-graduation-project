<!--Check Assigned Tasks page-->

<!--PHP-->
<?php
// mysql connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "muqu";

$con = mysqli_connect($servername, $username, $password, $dbname) or die("Error: " . mysqli_error($con));

session_start();
$check['userId']=$_SESSION['userid'];
$userid= $check['userId'];
$result = @mysqli_query($con, "SELECT * FROM complaint pk, assign fk where pk.complaintId =fk.compliantId and fk.userId=$userid  and fk.saved='0'   ") or die("Error: " . mysqli_error($con));

echo(mysqli_error($con));

?>
  <!doctype html>
  <html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="icon" type="image/x-icon" href="../img/muqu2.png">
    <title>Check Assign tasks</title>
  </head>

  <!--CSS-->
  <style>
    body {
      background: #eee
    }

    .height {}

    .mytitelh3 {
      color: #F;
      font-size: 30px;
    }

    h6.mytitelscss {
      color: #676767;
      font-family: 'Roboto Mono';
      font-size: 18px;
    }
    /* css for icons */

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
      /* padding-bottom: 20px; */
    }

    .ctaa:hover .hover-underline-animation:after {
      transform: scaleX(1);
      transform-origin: bottom left;
    }

    * {
      padding: 0;
      margin: 0;
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

    body {
      /* margin: 50px; */
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
    }

    tbody {
      background-color: #F6F4F1;
      color: #676767;
      font-family: 'Rambla';
      font-size: 15px;
    }

    thead {
      background-color: #2F5972;
      color: #FFFFFF;
      font-family: 'Roboto Mono';
      font-size: 18px;
      /* font-style: italic; */
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
    }

    .xc {
      padding: 0;
      border: none;
      background: none;
      text-decoration: underline;
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
      /* background:#2F5972 */
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
    /* From uiverse.io by @martinval9 */
    /* Hide the default checkbox */

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
    /* Create a custom checkbox */

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

    body {
      background: #eee
    }

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
    .hmarg{
  margin-top: 63px;

    }
    .hmarg2{
   margin-top: 38px;

    }
    .hmarg3{
  margin-top: 5px;

  }
  </style>
  <body oncontextmenu='return' class='snippet-body'>

    <div class="b-example-divider pt- pb- pe-">

      <!-- beginning of header-->
      <header class=" p- ms-3 mb- border-bottom pb-3">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="../WorkerHome.php" class="d-flex align-items-center mb- mb-lg-0 text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"> <img class="card-img-top imglogo" src="../img/muqu2.png" width="100" height="80" alt=""></svg>
            </a>
              <ul class="nav col-12 col-lg-auto me-lg-auto  justify-content-center mb-md-0">
              <li><a href="../WorkerHome.php" class="nav-link px-2 ps-5 hedermaargin hmarg link-secondary">Home</a></li>
              <li><a href="Check Assigned Tasks.php" class="nav-link px-2 ps-5 hmarg hedermaargin link-dark">Check Assigned Tasks</a></li>
              <li><a href="#" class="nav-link px-2 ps-5 hedermaargin hmarg link-dark">Statistics</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 heder-search hmarg2 pe-5">
              <input type="search" class="form-control " placeholder="Search..." aria-label="Search">
            </form>

            <!-- dropdown -->
            <div class="  dropdown ">
              <button class="dropbtn ">

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
              <div class="dropdown-content ">
                <a href="../../logout.php">Sign out</a>
                <a href="#">About us</a>

              </div>
            </div>

          </div>
        </div>
      </header>
    </div>

    <!-- check Assigend tasks form-->
    <div id="containerBODY">
      <div id="mainBODY">

        <div class="container position-relative pt-4">
          <div class="col-md-12 position-absolute start-translate-middle">

            <div class="card-body  ">
              <div class="row page-">
              </div>
              <form method="post" id="form" action="completerUncomplete.php" class="">
                <input type="hidden" name="comment" id="comment2">
                <div class="col col-md-12">
                <h3 class="tableTitle mt-5 p-1 ms-4"style="font-family:Roboto Condensed ;  font-size: 33px ; font-weight: bold; color: #2F5972; ">Check Assigend Tasks</h3>

                  <!--Search for complaint id-->
                  <input type="text" id="myInput" onkeyup="myFunction()" class="search-bar form-control mt-5" placeholder="Search for complaint id..">
                  <br/>
                  <br/>
                  <table class="table" id="myTable">
                    <thead>
                      <tr>
                        <th>
                          <label class="ontainer">
                            <input type="checkbox" value="bar1" onclick="toggle(this)" />
                            <div class="heckmark"></div>
                          </label>
                        </th>
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Category</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>

                      <!--PHP-->
                      <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td scope="row">
                            <label class="ontainer">
                              <input name="chk_id[]" type="checkbox" class="box" onchange="callFunction();callFunction1()" onclick="chk(this)" class="chkbox" value="<?php echo $row['complaintId']; ?>" />
                              <div class="heckmark"></div>
                            </label>
                          </td>

                          <?php echo '
                                                         <td name=name_"' . $row["complaintId"] . '">
                                                         <button id="YourID" type="button" name=' . $row["complaintId"] . ' value=' . $row["complaintId"] . '
                                                          class="xc" data-toggle="modal" data-target="#exampleModal"
                                                           onclick="selectRoomNum(this)"><b>
                                                         ' . $row["complaintId"] . '</b></button></td>'; ?>


                            <input type="hidden" name="chk_complaint[]" value="<?php echo $row['complaintId']; ?>">
                            </td>

                            <td>
                              <label>
                                <?php echo $row['date']; ?>
                              </label>
                              <input type="hidden" name="chk_date[]" value="<?php echo $row['date']; ?>">
                            </td>

                            <td>
                              <label>
                                <?php echo $row['category']; ?>
                              </label>
                              <input type="hidden" name="chk_category[]" value="<?php echo $row['category']; ?>">
                            </td>


                            <td>
                              <input type="hidden" name="chk_wrkid[]" value="<?php echo $row['userId']; ?>">
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                  <input type="submit" value="completed" name="submit" class="btn btn-primary choose_file" disabled="disabled" id="Assign">
                  <input type="button" value="uncompleted" class="btn btn-primary choose_file" disabled id="" data-toggle="modal" disabled data-target="#exampleModal2" onclick="idcomp();idcomp1()">
                </div>
              </form>
            </div>
          </div>
        </div>



        <!-- Modal -->
        <!-- complaint detail -->
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

        <div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content  csstext ">
              <div class="modal-header modelhedercss ">
                <h5 class=" mytitelreson">Uccompleted<h5>
                <div class="text-right"><i data-dismiss="modal" aria-label="Close" class="  fa fa-close"></i></div>

              </div>
              <!-- reason model -->
                <div class="modal-body">
                <h6 class= "modal-title mytitelscss ">Please enter the reason</h6>

                <div class="form-outline divtext me-4">
                    <label>
                        <textarea onkeyup="disable();getTheReason();"  placeholder="reason" class="form-control resonBox" rows="4" id="comment" rows="5" cols="54"></textarea>
                    </label>
                </div>
            </div>

                            <input type="hidden" readonly class="form-control-plaintext" value="" name="workerIdname"
                                   id="workerIDUncomliet"/>
                            <input type="hidden" readonly class="form-control-plaintext" value="" name="ClassroomN"
                                   id="compalintIDreassign"/>
                                   <div class="modal-footer">

                                         <button type="button" class="btn btn-secondary choose_file " data-dismiss="modal">Close</button>
                                         <button form="form" id="subres" value="submit2" name="submit2" type="submit" class="btn btn-primary choose_file"disabled>Send</button>
                                     </div>
                        </div>
                      </div>

                      </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>User details</h5>
                <div class="text-right"> <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i> </div>
              </div>
              <div class="modal-body">
                <div>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Samso</td>
                        <td>Natto</td>
                        <td>@samso</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Tinor</td>
                        <td>Horton</td>
                        <td>@tinor_har</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Mythor</td>
                        <td>Bully</td>
                        <td>@myth_tobo</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022<em>Copyright</em> :
        <a class="text-white" href="../WorkerHome.php">MUQU.com</a>
      </div>
      <!-- Copyright -->
    </footer>




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
  	foreach($_POST as $key => $value) {
  		if (strpos($key, 'box_') === 0) {
  			$complainID = str_replace("box_", '', $key) ;
  			$pickerName = "SelectPicker_".$complainID;
  			$employeeId= $_POST[$pickerName];
  		$insertSql = "INSERT INTO assign (userId ,compliantId )
  					VALUES ( $employeeId, $complainID  )";
  			if ($conn->query($insertSql) === TRUE) {
  			$updateSql = "UPDATE complaint
  						SET status = 'Under Processing'
  						WHERE complaintid = $complainID ";
  				if ($conn->query($updateSql) === TRUE) {

  				}

  			}

  				if(!mysqli_error($conn))
  				  echo '<meta http-equiv="refresh" content="0; url=anothercopyassign.php">';
  		}
  	}

?>
       <!--JS-->
      <script>
        function selectRoomNum(strq) {
          var str = strq.value;

          if (str == "") {
            document.getElementById("exampleModal").innerHTML = "";
            return;
          }
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


              document.getElementById("Ctable").innerHTML = this.responseText;

            };
          }
          xmlhttp.open("GET", "../getComplaints.php?q=" + str, true);
          xmlhttp.send();
        }

        $(document).ready(function() {
          $('.chkbox').change(function() {
            var ckd = $('.chkbox:checked').length
              //alert(ckd);
            if (ckd > 0) {
              $('#save').prop("disabled", false);

            } else {
              $('#save').prop("disabled", true);
            }
          });
        });
        //select all
        function toggle(source) {
          var checkboxes = document.getElementsByClassName("box");
          for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
            chk(checkboxes[i]);

            callFunction();
            callFunction1();

          }
        }

        function mycomplaininfo() {

          var allCheBox = document.querySelectorAll(".box");
          for (var checkboxee of allCheBox) {
            var ourboxx = checkboxee.id;
            var ourBoxId = ourboxx.replace(/\D+/, "");
            var f = "129";

          }
        }

        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("dev-table");
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

        function callFunction() {
          var checkboxes = document.querySelectorAll('input[type="checkbox"]');
          var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);

          if (checkedOne) {
            document.querySelectorAll('input[type="submit"]')[0].disabled = false;
          } else
            document.querySelectorAll('input[type="submit"]')[0].disabled = true;
        }

        // for enable button2
        function callFunction1() {
          var checkboxes = document.querySelectorAll('input[type="checkbox"]');
          var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);

          if (checkedOne) {
            document.querySelectorAll('input[type="button"]')[0].disabled = false;
          } else
            document.querySelectorAll('input[type="button"]')[0].disabled = true;
        }
        //to checkbox enable

        function enable(boxx) {

          var ourbox = boxx.id;
          var ourBoxId = ourbox.replace(/\D+/, "");
          let part1 = "SelectPicker_";
          let result = part1.concat(ourBoxId);
          var ds = document.getElementById(result);
          ds.disabled = boxx.checked ? false : true;
          if (!ds.disabled) {
            ds.focus();
          } else {

            ds.value = 0;

          }
          var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

          if (checkboxes.length > 0) {
            document.querySelectorAll('input[type="submit"]')[0].disabled = false;


          } else
            document.querySelectorAll('input[type="submit"]')[0].disabled = true;

        }

        //change color of th row
        function chk(result) {
          if (result.checked) {
            result.parentNode.parentNode.parentNode.style.backgroundColor = "";
            result.parentNode.parentNode.parentNode.style.color = "black";
          } else {
            result.parentNode.parentNode.parentNode.style.backgroundColor = "";
            result.parentNode.parentNode.parentNode.style.color = "";
          }
        }





        function ajaxpost() {
          // (A) GET FORM DATA
          var form = document.getElementById("form");
          var data = new FormData(form);

          // (B) AJAX
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "SetComlintdone.php");
          // What to do when server responds
          xhr.onload = function() {
            console.log(this.response);
          };
          xhr.send(data);

          // (C) PREVENT HTML FORM SUBMIT
          return false;
        }

        //post Reassign form2 ajax
        function ajaxpostReassign() {
          var form1 = document.getElementById("formReassign");
          var data1 = new FormData(form1);

          // (B) AJAX
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "uncompletepost.php");
          // What to do when server responds
          xhr.onload = function() {
            console.log(this.response);
          };
          xhr.send(data1);

          // (C) PREVENT HTML FORM SUBMIT
          return false;
        }

        function idcomp() {
          var allCheckedBox = document.querySelectorAll('input[type="checkbox"]:checked');
          for (var checkbox of allCheckedBox) { // to check if it select an employee
            var ourbox = checkbox.id;
            var ourBoxId = ourbox.replace(/\D+/, "");
            // alert(ourBoxId);
            document.getElementById("compalintIDreassign").value = ourBoxId;

          }
        }



        ////////
        function idcomp1() {
          var allCheckedBox = document.querySelectorAll('input[type="checkbox"]:checked');
          for (var checkbox of allCheckedBox) { // to check if it select an employee
            var ourbox = checkbox.id;
            var ourBoxId = ourbox.replace(/\D+/, "");

            var ds = document.getElementById("Worker").value;
            document.getElementById("workerIDUncomliet").value = ds;


          }
        }
      </script>
      <script>
        function getTheReason() {
          let comment = $("#comment").val();
          $("#comment2").val(comment)
        }

        function disable() {
          if (document.getElementById("comment").value == "") {
            document.getElementById("subres").disabled = true;
          } else {
            document.getElementById("subres").disabled = false;
          }
        }
        /////////
        function myFunction() {
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
      </script>
      <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
  </body>

  </html>
