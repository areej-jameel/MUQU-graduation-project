
<!--Make Complaint page -->
<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/bootstrap5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="../css/bootstrap5/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script src="html5-qrcode.min.js"></script>
    <script src="../css/bootstrap5/dist/js/i18n/defaults-en_US.min.js"></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <title>Make Complaint</title>
    <link rel="icon" type="image/x-icon" href="../img/muqu2.png">

  </head>

  <!--CSS -->
  <style>

  .result{
      background-color: green;
      color:#fff;
      padding:20px;
    }
  .row{
      display:flex;
    }
.inv {
  display: none;
}
.form-label-width{
  width: =100px;

}
.choose_file{
    position:relative;
    display:inline-block;
    border-radius:38px;
    border:#6F92A0 solid 1px;
    width:120px;
    height: 40px;
    padding: 4px 6px 4px 8px;
    font: normal 14px Myriad Pro, Verdana, Geneva, sans-serif;
    color: #edf1f7;
    margin-top: 2px;
    background:#6F92A0
}
.choose_file input[type="file"]{
    -webkit-appearance:none;
    position:absolute;
    top:0; left:0;
    opacity:0;
}
.QRcodeB{
    position:relative;
    display:inline-block;
    border-radius:38px;
    border:#6F92A0 solid 1px;
    width:180px;
    height: 40px;
    padding: 4px 6px 4px 8px;
    font: normal 14px Myriad Pro, Verdana, Geneva, sans-serif;
    color: #edf1f7;
    margin-top: 2px;
    background:#6F92A0
}
.card-h{
  background:#2F5972

}
.Make-Complain{
  color: #edf1f7;
}
.card-body{
  background:#F6F4F1;

border:#2F5972 solid 1px;


}
.input-defult{
  background:#ffffff;
  width: 1040px;
  height: 40px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 1px solid rgb(212, 212, 212);
  border-radius: 4px;
}
/* uploas img button */
.download-button {
 position: relative;
 border-width: 0;
 color: white;
 font-size: 15px;
 font-weight: 600;
 border-radius: 4px;
 z-index: 1;
}

.download-button .docs {
display: flex;
align-items: center;
justify-content: space-between;
gap: 10px;
min-height: 40px;
padding: 0 10px;
border-radius: 4px;
z-index: 1;
background-color: #242a35;
border: solid 1px #e8e8e82d;
transition: all .5s cubic-bezier(0.77, 0, 0.175, 1);
}

.download-button:hover {
/* box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; */
}

.download {
position: absolute;
inset: 0;
display: flex;
align-items: center;
justify-content: center;
max-width: 90%;
margin: 0 auto;
z-index: -1;
border-radius: 4px;
transform: translateY(0%);
background-color: #2F5972;
border: solid 1px #01e0572d;
transition: all .5s cubic-bezier(0.77, 0, 0.175, 1);
}

.download-button:hover .download {
transform: translateY(100%)
}

.download svg polyline,.download svg line {
animation: docs 1s infinite;
}

@keyframes docs {
0% {
transform: translateY(0%);
}

50% {
transform: translateY(-15%);
}

100% {
transform: translateY(0%);
}
}

.buttonQR {
 color: #edf1f7;
 cursor: pointer;
 font-family: Helvetica,"sans-serif";
 transition: all .2s;
 padding: 10px 20px;
 border-radius: 100px;
 background: #2F5972;
 border: 1px solid transparent;
 display: flex;
 align-items: center;
 font-size: 15px;
}

.buttonQR:hover {
 background: #6F92A0;
}

.buttonQR > .svgQR {
 width: 28px;
 height: 28px;
 margin-left: 10px;
 transition: transform .3s ease-in-out;
}

.buttonQR:hover .svgQR {
 transform: translateX(5px);
}

.buttonQR:active {
 transform: scale(0.95);
}

.btnSUB {
 background-image: linear-gradient(45deg, #2F5972 0%, #6F92A0  100%, #2F5972  60%)
}

.btnSUB {
 height: 40px;
 margin: 5px;
 padding: 8px 25px 10px 25px;
 text-align: center;
 transition: 0.5s;
 background-size: 200% auto;
 color: white;
 border-radius: 100px;
 display: block;
 border: 0px;
 box-shadow: 0px 0px 14px -7px #f09819;
}

.btnSUB:hover {
 background-position: right center;
 color: #fff;
 text-decoration: none;
}
body {
    background: #eee
}

/* css for icons */


ul.nav li a, ul.nav li a:visited {
           color: #2F5972 !important;
           font-family: Roboto Condensed ;
            font-size: 20px;}
            ul.nav li a, ul.nav li a:hover {
                       color: #747f86 !important;
                       font-family: Roboto Condensed ;
                        font-size: 20px;}

                        .dropbtn {
                          background-color:#eee;
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
                          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                          z-index: 1;
                        }

                        .dropdown-content a {
                          color: black;
                          padding: 12px 16px;
                          text-decoration: none;
                          display: block;
                        }

                        .dropdown-content a:hover
                        {      background-color: rgba(227, 231, 234, 0.61)
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
                         color:#ccc;
                        }

                        .hover-underline-animation {

                         color:#eee;

                        }



                        .ctaa:hover .hover-underline-animation:after {
                         transform: scaleX(1);
                         transform-origin: bottom left;
                        }
                        *{
                        padding: 0;
                        margin: 0;}

                        html,body{height: 100%; }

                        #containerBODY{min-height: 100%;}

                        #mainBODY{overflow: auto;
                        padding-bottom: 50px;
                        height:650px;}

                        #footer{position: relative;
                        height: 100px;
                        margin-top: -50px;}
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

  <body>

    <!--PHP -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,"muqu");

    if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}


     // Get room bumber from DB
     $sql1 = "SELECT roomNumber FROM classroom WHERE roomType!='Lab'";
     $sql2 = "SELECT roomNumber FROM classroom WHERE roomType='Lab'";
     $result1 = $conn->query($sql1);
     $result2 = $conn->query($sql2);
     $rowcount1=mysqli_num_rows($result1);
     $rowcount2=mysqli_num_rows($result2);
    ?>

    <div class="b-example-divider pt-3">
      <!-- header -->
      <header class="p-3 ms-3 mb-3 border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="../FacultyMemberHome.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"> <img class="card-img-top imglogo" src="../img/muqu2.png" width="100" height="80" alt=""></svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="../FacultyMemberHome.php" class="nav-link px-2 ps-5 link-secondary hmarg">Home</a></li>
              <li><a href="Make Complaint.php" class="nav-link  ps-5 px-2 link-dark hmarg">Make Complaint</a></li>
              <li><a href="#" class="nav-link ps-5 px-2 link-dark hmarg">Statistics</a></li>
            </ul>
            <form class="hmarg2 col-12 pe-5 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <div class="dropdown ">

              <button class="dropbtn ">

                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>

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
	<header class="navbar navbar-expand-md navbar-dark bd-navbar" > </header>
	<div class="container-fluid">
		<div class="row justify-content-center ">
			<div class="col-md-8">
			<div class="card text-left">
			  <div class="card-h">
				<h2 class="Make-Complain m-3"> Make Complaint</h2>
			  </div>
			  <div class="card-body">
          <!--Make Complaint Form -->
					<form action="saveComplain.php" id="form" name ="myFormName" method="POST" class="row g-3 ms-3 needs-validation" enctype="multipart/form-data" novalidate>
              <div id="errorDiv">   </div>

						<div class="col col-md-12">
              <label class="form-label me-5 ms- mb-2" for="target">Room Number <img src="../img/star.png" width="10" height="10" alt=""></label>

							<div class="input-group mb-3 ">
							  <select class="form-select me-4"  name="roomNum" id="target" required>
								<option selected disabled value="">select room number</option>
									<?php
									  for($i=1;$i<=$rowcount1;$i++){
									  $row1=mysqli_fetch_array($result1);
									 ?>
									<option class="content_1"  value="<?php echo $row1["roomNumber"]?>"> <?php echo $row1["roomNumber"]?> </option>
									<?php
								  }
									 ?>
									 <?php
									   for($i=1;$i<=$rowcount2;$i++){
									   $row2=mysqli_fetch_array($result2);
									  ?>
									 <option class="content_2"  value="<?php echo $row2["roomNumber"]?>"> <?php echo $row2["roomNumber"]?> </option>
									 <?php
								 }
									  ?>
							  </select>
							    <div class="invalid-feedback">
								  Please select a room number .
								</div>
							</div>
						</div>
              <!-- floor number  -->
						<div class="row">
							 <label class="visually- form-label mb-3 me-5 ms- mb-2 mt-3 " for="floorNum">Floor</label>
							<div class="input-group  col mb-3 me- ps-">
							  <input type="text" class=" input-defult ms- form-label-width" id="floorNum" name="floorNum" placeholder="floor" disabled>
							</div>
						</div>
              <!-- building number  -->
						<div class="row mb-3">
							 <label class="form-label mb-3 me-5 mb-2 mt-3 " for="BuildingNum" >Building</label>
							<div class="input-group ps-">
							  <input type="text" class="input-defult ms- form-label-width" id="BuildingNum" name="BuildingNum" placeholder="Building" disabled>
							</div>
						</div>
             <!-- complaint description  -->
						  <div class="mb-3 mt-3 me-4">
                <span class="me-1 mb-3 me-5 ms- mb-4 " for ="desc">Description <img src="../img/star.png" width="10" height="10" alt=""></span>
								<div class="input-group mb-2 mt-3">
									<textarea class="form-control form-label-width ms- me-4" aria-label="Leave a comment here" placeholder ="Description" id="desc" name ="desc" style="  resize: none;"required></textarea>
									 <div class="invalid-feedback">
										Please leave a Description
									</div>
								</div>
						  </div>

						<div class="col-12">
              <!-- upload img input  -->
							<div class="" style="height:0px;overflow:hidden">
                <span class="position-absolute ps-2 pt-1"></span>

							  <input type="file" class="" id="inputGroupFile02" name="inputGroupFile" accept="image/*">
							</div>
              <!-- upload img botton -->
              <button type="button" class=" download-button" onclick="chooseFile();">
                    <div class="docs">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                      <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                      <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                    </svg></div>
                    <div class="download">
                      <!-- <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="24" width="24" viewBox=""><path d=""></path><polyline points=""></polyline></svg> -->

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                      </svg>
                    </div>
                  </button>
					     	</div>
              <!-- gategory without PC  -->
						  <div class="col-12 mt-5 ">
						   <fieldset class="row mb-3 inv" id="content_1">
								<legend class="col-form-label col-sm-2 pt-0">Category</legend>
								<div class="col-sm-10">
                  <div class="form-check">
                  <input type="checkbox" name="cat1Visit" id="cat1Visit"  value="Needs an inspection visit"   class="form-check-input" checked/>
                  <label class="form-check-label" for="cat1Visit">
                    Needs an inspection visit
                  </label>
                  </div>
								  <div class="form-check">
									<input type="checkbox" name="cat1Proj" id="cat1Proj"  value="Projector"  class="form-check-input" />
									<label class="form-check-label" for="cat1Proj">
									  Projector
									</label>
								  </div>
								  <div class="form-check">
									<input type="checkbox" name="cat1Air" id="cat1Air" value="Air conditiong"  class="form-check-input" >
									<label class="form-check-label" for="cat1Air">
									  Air conditiong
									</label>
								  </div>
								  <div class="form-check disabled">
									<input type="checkbox" name="cat1Smart"  id="cat1Smart"  class="form-check-input"   value="Smart board">
									<label class="form-check-label" for="cat1Smart">
									  Smart board
									</label>
								  </div>
								</div>
							  </fieldset>

                <!-- gategory with PC  -->
						  	<fieldset class="row mb-3 inv" id="content_2">
								<legend class="col-form-label col-sm-2 pt-0">Category</legend>
								<div class="col-sm-12">
                  <div class="form-check">
                  <input type="checkbox" name="cat2Visit" id="cat2Visit"  value="Needs an inspection visit"   class="form-check-input" checked/>
                  <label class="form-check-label" for="cat2Visit">
                    Needs an inspection visit
                  </label>
                  </div>
								  <div class="form-check">
									<input type="checkbox" name="cat2Proj" id="cat2Proj"  value="Projector"  class="form-check-input" />
									<label class="form-check-label" for="cat2Proj">
									  Projector
									</label>
								  </div>
								  <div class="form-check">
									<input type="checkbox" name="cat2Air" id="cat2Air" value="Air conditiong"  class="form-check-input" >
									<label class="form-check-label" for="cat2Air">
									  Air conditiong
									</label>
								  </div>
								  <div class="form-check ">
									<input type="checkbox" name="cat2Smart" id="cat2Smart"  class="form-check-input"   value="Smart board">
									<label class="form-check-label" for="cat2Smart">
									  Smart board
									</label>
								  </div>
								 <div class="form-check ">
								  <div class="col-12">
									<input type="checkbox" name="cat2Pc"  id="cat2Pc" class="form-check-input"   value="PC">
									<label class="form-check-label" for="cat2Pc">
									  PC
									</label>
									</div>
									 <div class="">
										<div class="input-group mb-3 row">
										  <label class="form-label mt-4 mb-3"  id="selectPickerLbl" for="inputGroupSelect01">Computer Number <img src="../img/star.png" width="10" height="10" alt=""></label>
										  <select class="form-select me-2 selectpicker" id="mySelectpicker" multiple   name="pcnum"   onchange="changeFun();">
											<option>pc1</option>
											<option>pc2</option>
											<option>pc3</option>
										  </select>
										</div>
										<input name = "selectpickerArray" value="" type="hidden" id="selectpickerArray">
									</div>
								  </div>
								</div>
                <input name = "category" value="" type="hidden" id="category">‏
							 </fieldset>
							</div>
               <!-- QR code button -->
              <div class="d-grid gap-2 col-4 mx-auto">
              <button type="button" class="ms-3 buttonQR QRcodeB" onclick="myFunction()">
                <span>Scan QR code</span>

                  <svg class="svgQR" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                    <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z"/>
                    <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z"/>
                    <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z"/>
                    <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z"/>
                    <path d="M12 9h2V8h-2v1Z"/>
                  </svg>
              </button>
             </div>

             <div id="myDIV" style="display:none" >
               <div  class="row ">
                 <div class="col me-5 ">
                 <center><div style="width:300px;" id="reader"></div></center>
                  </div>
                </div>
             </div>


             <span class="border-top mb-4">
            	<div class="mt-3">

                <!-- submit button  -->
             <button class=" buttonQR mt-3 mb-3 ms-4 me-4 " name="submit" data-bs-toggle="modal" data-bs-target="#exampleModal1" type="submit">Submit</button>
             </span>
              </div>
						</form>
					 </div>
			    </div>
			 	</div>
			</div>
		</div>

            <footer id="footer"class=" fotter text-center text-white p-0 mt-5" style="background-color: #2F5972 ;">
              <!-- Grid container -->
              <div class="container pt-2">
                <!-- Section: Social media -->
                <section class="mb-3">
                  <!-- Twitter -->
                  <button class="ctaa"> <a href="https://twitter.com/">
                  <span class="hover-underline-animation">     <svg xmlns="" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">

                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                  </svg> </a></span>
                </button>

                  <!-- Outlook -->
                  <button class="ctaa"> <a href="https://outlook.live.com/owa/">
                <span class="hover-underline-animation">     <svg xmlns="" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                  </svg></a> </span>

                </button>

                  <!-- Instagram -->
                  <button class="ctaa"><a href="https://www.instagram.com/">
                  <span class="hover-underline-animation">     <svg xmlns="" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">

                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                  </svg></a> </span>
                  </button>

                  <!-- contact-->
                  <button class="ctaa"><a href="#">
                  <span class="hover-underline-animation">     <svg xmlns="" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">

                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>

                  </svg> </a></span>
                  </button>



                </section>
                <!-- Section: Social media -->
              </div>
              <!-- Grid container -->

              <!-- Copyright -->
              <div class="text-center text-white p-3 " style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022<em>Copyright</em> :
                <a class="text-white" href="../FacultyMemberHome.php">MUQU.com</a>
              </div>
              <!-- Copyright -->
      </footer>

      <!--JS -->
<script>
//jquery for button upload
function chooseFile() {
    $("#inputGroupFile02").click();
 }
//display of QR code scanner button
      function myFunction() {
              var x = document.getElementById("myDIV");
              if (x.style.display === "none") {
                x.style.display = "block";
              } else {
                  x.style.display = "none";
              }
            }

function displaySelectOptionFn(str) {
	$.selectOptionFn(str);
 };
 function changeFun(){
	 $.changeFun();

 };

 function clearAllCheckBoxs(){

	 //cat 1
	 document.getElementById("cat1Proj").checked = false;
	 document.getElementById("cat1Air").checked = false;
	 document.getElementById("cat1Smart").checked = false;
	 //cat2
	 document.getElementById("cat2Proj").checked = false;
	 document.getElementById("cat2Air").checked = false;
	 document.getElementById("cat2Smart").checked = false;
	 document.getElementById("cat2Pc").checked = false;
	 $.clearSelectPicker();

 }
document.getElementById('target').addEventListener('change', function () {
	var e = document.getElementById("target").selectedIndex;
	var value = this.value;
	var otionClassName = document.getElementsByTagName("option")[e].className
	clearAllCheckBoxs();
	document.getElementById("content_1").style.display = otionClassName == "content_1" ? 'block' : 'none';
	if(otionClassName == "content_2"){

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
			  displaySelectOptionFn(this.responseText);
		  }
		};
		xmlhttp.open("GET", "getPc.php?roomNum=" + value, true);
		xmlhttp.send();


	}
	document.getElementById("content_2").style.display = otionClassName == "content_2" ? 'block' : 'none';

	if (value.length == 0) {
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

			const myArray = this.responseText.split("-");
			document.getElementById("floorNum").value = myArray[0];
			document.getElementById("BuildingNum").value = myArray[1];
      }
    };
    xmlhttp.open("GET", "getFloorAndBuild.php?roomNum=" + value, true);
    xmlhttp.send();
  }
});
	function getExtension(filename) {
	  var parts = filename.split('.');
	  return parts[parts.length - 1];
	}


  $(document).ready(function(){


	$('#cat2Pc').click(function() {

      $('#mySelectpicker').selectpicker('deselectAll');
        if(this.checked) {

			$("#mySelectpicker").prop("required", true);
			$('#mySelectpicker').selectpicker('show');
			$('#selectPickerLbl').show();

        }else {
			$('#mySelectpicker').removeAttr("required");
			$('#mySelectpicker').selectpicker('hide');
			$('#selectPickerLbl').hide();
		}

		  $("#mySelectpicker").selectpicker("refresh");
    });


	  $.clearSelectPicker =function() {
			$('#mySelectpicker').find('option').remove();
			$('#mySelectpicker').removeAttr("required");
			$('#mySelectpicker').selectpicker('hide');
			$('#selectPickerLbl').hide();
			$("#mySelectpicker").selectpicker("refresh");
			$.changeFun();
	  };
	  $.selectOptionFn = function(prt) {
		  $('#mySelectpicker')
			.find('option')
			.remove()
			.end()
			.append(prt);
		$("#mySelectpicker").selectpicker("refresh");

         };


	$('#mySelectpicker').selectpicker();
	$('#mySelectpicker').selectpicker('hide');
	$('#selectPickerLbl').hide();


	$.changeFun=function(){
		$('#selectpickerArray').val($("#mySelectpicker").selectpicker('val'));
	};

    $("form").submit(function(){
		function failValidation(msg) {
		  alert(msg);
		  return false;
		}

		var e = document.getElementById("target").selectedIndex;

		var otionClassName = document.getElementsByTagName("option")[e].className;
		let category = [1, 123.43];
		category =[];

		if(otionClassName == "content_1"){
      if(document.getElementById("cat1Visit").checked ){
          category.push(document.getElementById("cat1Visit").value);
      }
			if(document.getElementById("cat1Proj").checked ){
		  		category.push(document.getElementById("cat1Proj").value);
			}
			if( document.getElementById("cat1Air").checked ){
						category.push(document.getElementById("cat1Air").value);
					}
			if( document.getElementById("cat1Smart").checked ){
						category.push(document.getElementById("cat1Smart").value);
					}
			$.clearSelectPicker();
		}else if(otionClassName == "content_2"){
			//cat2
      if(document.getElementById("cat2Visit").checked ){
          category.push(document.getElementById("cat2Visit").value);
      }
			 if(document.getElementById("cat2Proj").checked ){
						category.push(document.getElementById("cat2Proj").value);
					}
			if( document.getElementById("cat2Air").checked){
						category.push(document.getElementById("cat2Air").value);
					}
			 if(document.getElementById("cat2Smart").checked){
						category.push(document.getElementById("cat2Smart").value);
					}
			 if(document.getElementById("cat2Pc").checked ){
						category.push(document.getElementById("cat2Pc").value);
					}
		}
			document.getElementById("category").value = category;

		var error = document.getElementById("error");
		if ($('input:checkbox').filter(':checked').length < 1){
			  error.textContent = "Please enter at least one checkbox";
			  error.style.color = "red";
			}
		var file = $('#inputGroupFile02');
    });
});



function onScanSuccess(qrCodeMessage) {
var qrresult=qrCodeMessage;
	document.getElementById('target').value=qrresult;
     document.getElementById('target').dispatchEvent(new Event('change'));

     if(qrresult!=document.getElementById('target').value){
       document.getElementById('errorDiv').innerHTML="Please, enter a valid QR code";
       document.getElementById('errorDiv').classList.add('alert', 'alert-danger');
      //  document.getElementById('hi').setAttribute("class", "alert alert-danger");‏
    }else{
      var xx = document.getElementById("errorDiv");
         xx.style.display = "none";
    }


   }


function onScanError(errorMessage) {
  //handle scan error
}

var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);





(function () {
'use strict'

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })

})();
</script>

</body>
</html>
