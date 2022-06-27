<!--Worker Home page  -->


<?php
session_start();
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
     <!-- map tile layer link  -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!--Bootstrap CSS Reference-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      <!--Website Style Sheet Reference-->
      <link href="css/style.css" rel="stylesheet" />
      <title>Main Page</title>
      <link rel="icon" type="image/x-icon" href="img/muqu2.png">

    </head>
  <body>
    <!--CSS -->
    <style media="screen">
      #complaintTable {}

      #dev-table {
        border: 1px #345e73 solid;
        border-radius: 1em;
        margin-top: 20px;
      }

      #roomN {
        width: 21em;
        border: 1px #345e73 solid;
      }

      #dev-table-filter {
        border: 1px #345e73 solid;
      }

      .panel > .panel-heading {
        background-image: none;
        color: white;
      }

      #Ctable {
        width: 21em;
      }

      table {
        border-radius: 1em;
        border: 2px solid #345e73;
      }

      #pbd {
        display: none;
      }

      #content1 {
        display: none;
        width: 22em;
        margin-left: 0px;
      }

      #map {
        height: 500px;
        width: 1298px;
        margin: 00px 10px 100px 0px;
        border-radius: 10px;
      }

      .sidenavR {
        background-color: #fff;
        height: 490px;
        overflow-x: hidden;
        right: 0;
        border-radius: 30px;
        top: 0;
        transition: .5s;
        width: 0;
        z-index: 1000;
      }

      .sidenav a,
      .sidenavR a {
        color: #818181;
        display: block;
        font-size: 25px;
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        transition: .3s;
      }

      .sidenav a:hover,
      .offcanvas a:focus,
      .sidenavR a:hover,
      .offcanvas a:focus {
        color: #f1f1f1;
      }

      .sidenav .closebtn,
      .sidenavR .closebtn {
        font-size: 36px;
        margin-left: 50px;
        position: absolute;
        right: 25px;
        top: 0;
      }

      @media screen and max-height 450px {
        .sidenav,
        .sidenavR {
          padding-top: 15px;
        }
        .sidenav a,
        .sidenavR a {
          font-size: 13px;
        }
      }

      .cardS {
        background: rgba( 255, 255, 255, 0.2);
        box-shadow: 0 8px 32px 0 rgba(19, 22, 60, 0.37);
        backdrop-filter: blur( 6px);
        -webkit-backdrop-filter: blur( 6px);
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18);
        height: 200px;
        width: 200px;
      }

      .cardS-disc {
        margin: 50px;
        backdrop-filter: blur( 6px);
        height: 300px;
        width: 200px;
      }

      .carddice {
        border: 3px #345e73 solid;
        background: rgba( 255, 255, 255, 0.2);
        backdrop-filter: blur( 6px);
        -webkit-backdrop-filter: blur( 6px);
        border-radius: 10px;
        height: 500px;
        width: 380px;
      }

      #cardinfo {
        margin: 130px 0px 0px 0px;
        width: 1000px;
        height: 1px;
        border: 3px #345e73 solid;
      }

      #statistics {
        background-color: #2d3873;
        background-image: linear-gradient(to bottom right, #0D3749, #B2D5E2);
        border-radius: 10px;
      }

      #s2 {
        width: 150px;
        height: 150px;
      }

      #s3 {
        width: 160px;
        height: 170px;
      }

      .discribtion {
        text-align: center;
        color: #0c2837;
        font-family: Roboto Condensed;
      }

      .how-to-use {
        color: #0c2837;
        text-decoration: none;
      }

      .how-to-use::before {
        content: '';
        position: absolute;
        width: 220px;
        height: 4px;
        border-radius: 4px;
        background-color: rgb(104, 112, 117);
        bottom: 0;
        left: 50px;
        right: 50px;
        transform-origin: right;
        transform: scaleX(0);
        transition: transform .3s ease-in-out;
        margin-top: 20px;
        border-color: rgb(104, 112, 117);
      }

      .how-to-use:hover::before {
        transform-origin: left;
        transform: scaleX(1);
      }

      .how-to-use:hover {
        color: rgb(104, 112, 117);
      }

      .how-to-useT {
        color: #0c2837;
        text-decoration: none;
      }

      .how-to-useT::before {
        content: '';
        position: absolute;
        width: 220px;
        height: 4px;
        border-radius: 4px;
        background-color: rgb(104, 112, 117);
        bottom: 0;
        left: 30px;
        right: 50px;
        transform-origin: right;
        transform: scaleX(0);
        transition: transform .3s ease-in-out;
        margin-top: 20px;
        border-color: rgb(104, 112, 117);
      }

      .how-to-useT:hover::before {
        transform-origin: left;
        transform: scaleX(1);
      }

      .how-to-useT:hover {
        color: rgb(104, 112, 117);
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
        background-color: #ffffff;
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

      .banner {
        position: fixed;
        z-index: 9999;
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
    <div class="b-example-divider mb-5 pb- pe-">
      <header class=" p- ms-3 mb- border-bottom pb-3">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="WorkerHome.php" class="d-flex align-items-center mb- mb-lg-0 text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"> <img class="card-img-top imglogo" src="img/muqu2.png" width="100" height="80" alt=""></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto  justify-content-center mb-md-0">
              <li><a href="WorkerHome.php" class="nav-link px-2 ps-5 hedermaargin link-secondary hmarg">Home</a></li>
              <li><a href="Check Assigned Tasks/Check Assigned Tasks.php" class="nav-link px-2 ps-5 hedermaargin link-dark hmarg">Check Assigned Tasks</a></li>
              <li><a href="#" class="nav-link px-2 ps-5 hedermaargin link-dark hmarg">Statistics</a></li>
            </ul>

            <form class=" hmarg2 col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 heder-search  pe-5">
              <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <!-- dropdown -->
            <div class="dropdown ">
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
              <div class="dropdown-content banner">
                <a href="../logout.php">Sign out</a>
                <a href="#">About us</a>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>
    <div class="container mt-5">
      <div class="row position-relative">
        <!-- map -->
        <div id="map" class=" col-xs-12 col-sm-6   position-relative -5"></div>
       <!-- slid menu -->
        <div id="mySidenavR" class="position-absolute sidenavR   navbar mt-1 mme">
          <a href="javascript:void(0)" class="closebtn position-absolute" onclick="closeNavR()">×</a>
          <div id="content1" class="position-sticky ms-2 ">
            <div id="complaint" class="mb-4">
              <h2 class "panel-title lead">View Complaints</h2>
            </div>
            <form class="form-inline " action="/action_page.php">
              <div class="form-group">
                <select class="form-select   ms-1 form-control " aria-label=".form-select-lg example" id="roomN" onchange="selectRoomNum(this.value)">
                </select>
              </div>
              <div id="complaintTable" class="">
                <div class="form-group" id="pbd">
                  <div class="panel-heading mb-5">
                    <div class="pull-right ">
                      <span class="clickable filter " data-toggle="tooltip" title="Toggle table filter" data-container="body">
                        </span>
                    </div>
                  </div>
                  <div class="panel-body" id="pb">
                    <h4 class="panel-title   ">Complaint</h4>
                    <input type="text" onkeyup="myFunction()" type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Enter Complaint ID" />
                  </div>
                  <table class="table-hover table table-bordered rounded-3" id="dev-table">
                    <thead class="">
                      <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody id="Ctable" class="">
                    </tbody>
                  </table>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="container pt-5 mb-5 " id="statistics">
      <div class="row g-4 py-5 row-cols-1 pt-5 row-cols-lg-3 ps-5">
        <div class="cardS-disc col">
          <div class=" cardS feature ">
            <div class=" row-3 position-absolute top-50 start-50 translate-middle">
              <img id="s2" src="img/Site_visitors-removebg-preview.png" class="me-3">

            </div>


          </div>
          <div class="row-3 position-absolute">
            <h5 class="discribtion ms-5 me-4 mt-4">Site visitors</h5>
          </div>
        </div>
        <div class="cardS-disc col ">
          <div class=" cardS feature ">
            <div class=" row-3 position-absolute top-50 start-50 translate-middle">
              <img id="s2" width="100" height="80"  src="img/Number_of_complaints_resolved-removebg-preview.png" class=" me-3">

            </div>

          </div>
          <div class="row-3 position-absolute">
            <h5 class="discribtion ms-1 mt-4">Number of complaints resolved</h5>
          </div>
        </div>
        <div class="cardS-disc col">
          <div class="cardS feature">
            <div class=" row-3 position-absolute top-50 start-50 translate-middle">
              <img id="s2" src="img/Quick_response_and_repair-removebg-preview.png" class="imgS me-1">

            </div>

          </div>
          <div class="row-3 position-absolute">
            <h5 class="discribtion ms-1 mt-4">Quick response and repair</h5>
          </div>
        </div>
        <div class="cardS-disc col">
          <div class=" cardS feature ">
            <div class="imge-size row-3  position-absolute top-50 start-50 translate-middle">
              <img id="s2" src="img/_Number_of_complaints_filed-removebg-preview.png" class="me-1">

            </div>
          </div>
          <div class="row-3 position-absolute">
            <h5 class="discribtion ms-1 mt-4"> Number of complaints filed</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="container ps-5 pe-5 ps-5 mb-5 " id="abuotus">
      <div class="  d-flex justify-content-between position-relative row  pt-5 ">
        <div class=" carddice   feature col-2 mt-4 ps-4">
          <div class=" row-3 position-absolute top-0 start-50 mt-5 translate-middle-x">
            <img id="s3" src="img/abautua.png" class="ms-2">

          </div>
          <div class="position-absolute top-50  me-2 ">
            <h3 class="discribtion  mt-2 ms-3 me-3">Do you want to know more about MUQU team?</h3>

          </div>
          <div class="position-absolute bottom-0 ms-3 mb-5  ps-4 row">
            <h3>    <a id="" class="how-to-useT discribtion  mt-5 ms-5" href="">About us</a></h3>

          </div>
        </div>

        <div class="  d-flex flex-column feature carddice mt-4 ">
          <div class=" row-3 position-absolute top-0 start-50 mt-5 translate-middle-x">
            <img id="s3" src="img/How to use.png" class="">

          </div>
          <div class="position-absolute top-50 ms-2 me-2">
            <h3 class="discribtion  mt-2 ms-4 me-4">Do you want to learn how to use our website?</h3>
          </div>

          <div class="position-absolute bottom-0 ms-2 mb-5 me-4 ps-5 d-flex flex-column ">
            <h3><a class=" how-to-use discribtion  mt-5 ms-5" href="">How to use</a></h3>

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
        <a class="text-white" href="WorkerHome.php">MUQU.com</a>
      </div>
      <!-- Copyright -->
    </footer>


    <!--JS -->
    <script>
    // Open slid menue
      function openNavR() {
        document.getElementById("mySidenavR").style.width = "400px";
        document.getElementById("content1").style.display = "block";
      }
      // Clos slid menue
      function closeNavR() {
        document.getElementById("mySidenavR").style.width = "0";
        document.getElementById("content1").style.display = "none";
        document.getElementById("mySidenavR").style.border = "#fff";
      }
      // get room numbers in bullding A
      function LoadA(e) {
        openNavR();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("roomN").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "getRoom.php?q=A", true);
        xmlhttp.send();

      }
     // get room numbers in bullding B
      function LoadB(e) {
        openNavR();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("roomN").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "getRoom.php?q=B", true);
        xmlhttp.send();
      }
      //get complaint info for each Classroom
      function selectRoomNum(str) {
        var x
        if (str == "") {
          document.getElementById("complaintTable").innerHTML = "";
          return;
        }
        console.log(str)
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

            // border(document.getElementById("Ctable").innerHTML = this.responseText.length);
            document.getElementById("Ctable").innerHTML = this.responseText;


            document.getElementById("pbd").style.display = "block";
          };
        }
        xmlhttp.open("GET", "getComplaintMap.php?q=" + str, true);
        xmlhttp.send();
      }

      // coloring slid menu border according to the status
      // function border(x) {
      //   if (x == 59)
      //     document.getElementById("mySidenavR").style.border = "9px solid rgba(35, 210, 68, 0.76)";
      //   else
      //     document.getElementById("mySidenavR").style.border = "9px solid rgba(231, 23, 73, 0.77) ";
      // }


      //map
      var map = L.map('map').setView([21.651644, 39.716137], 19);

       // map tile layer link
      googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
      });
      googleSat.addTo(map);

      //Map MarkerA
      var singleMarkerA = L.marker([21.651846, 39.715863]).on('click', LoadA);
      singleMarkerA.addTo(map);

      //Map MarkerB
      var singleMarkerB = L.marker([21.651690, 39.716594]).on('click', LoadB);
      singleMarkerB.addTo(map);

      // reload table in menue
      $(document).ready(function() {

        // reload table in B
        function RefreshTable() {
          $("#complaintTable").load("map8.php #complaintTable");
        }
        singleMarkerB.on("click", RefreshTable);
        singleMarkerB.on("click", RefreshTable);


        // reload table in A
        function RefreshTable() {
          $("#complaintTable").load("map8.php #complaintTable");
        }
        singleMarkerA.on("click", RefreshTable);
      });

      //search in table
      function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("dev-table-filter");
        filter = input.value.toUpperCase();
        table = document.getElementById("dev-table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
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

    <!--Bootstrap js Reference-->
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>

  </body>
  </html>
