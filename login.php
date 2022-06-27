
<!--login page-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="icon" type="image/x-icon" href="pages/img/muqu2.png">
</head>

<!--CSS-->
<style media="screen">
  html,
  body {
    width: 100%;
    height: 100%;
  }

  body {
    background: linear-gradient(-45deg, #2F5972, #8ca2af, #142747, #2F5972);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
  }

  @keyframes gradient {
    0% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
    100% {
      background-position: 0% 50%;
    }
  }

  body {
    margin: 0;
    padding-top: 90;
    height: 100vh;
  }

  .input-defult {
    background: #ffffff;
    width: 5px;
    height: 40px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 1px solid rgb(212, 212, 212);
    border-radius: 0px;
    border: none;
    border-bottom: 1px solid rgb(212, 212, 212);
  }

  .input-failed {
    outline: 0;
    border-width: 0 0 2px;
    border-color: #b2bdc3;
    width: 800px;
    transition: all .8s;
  }

  .input-failed:focus {
    border-color: #3a7293
  }

  .login-div {
    border: #2F5972 solid 1px;
    color: #2F5972;
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
    border-radius: 20px;
  }

  .btn-primary {
    border-radius: 20px!important;
  }

  .btn-primary {
    border-radius: 20px;
  }

  .Forget {
    background-color: white;
    border: none;
    color: rgb(189, 31, 64);
  }

  .Forget:hover {
    color: rgb(230, 192, 200);
  }

  input {
    accent-color: #3a7293;
  }

  .login {
    background-color: rgb(255, 255, 255)
  }

  #error {
    display: none;
  }
</style>

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

if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];
// Get user information from database
$sql=
"SELECT userEmail,userPassword,userId,userName ,usertype FROM facultymember  WHERE userEmail = '$username' AND  userPassword = '$password'
UNION SELECT userEmail,userPassword,userId ,userName,usertype FROM manager WHERE   userEmail = '$username' AND userPassword = '$password'
UNION SELECT userEmail, userPassword,userId ,userName,usertype FROM worker  WHERE userEmail = '$username' AND userPassword = '$password' ";
$result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
$check = mysqli_fetch_array($result);
// check the user type
           if(isset($check)){
                if($check['usertype'] =="1"){
                            header("location:pages/FacultyMemberHome.php");
                        }
                        else if($check['usertype'] == "2"){
                            header("location:pages/WorkerHome.php");
                        }
                        else if($check['usertype'] == "3"){
                            header("location:pages/ManagerHome.php");
                        }
                        session_start();
                        $_SESSION['userid'] = $check['userId'];
                        $_SESSION['userName'] = $check['userName'];
            }else{
              echo "<style>
                    #error{
                      display:block;
                    }
                    }
                    </style>";
                 }
               }
?>

  <body>
    <div id="login" class="mt-5 pt-5">
      <div class="container ">
        <div id="login-row" class="row justify-content-center align-items-center">
          <div id="login-column" class="col-md-6">
            <div id="login-box container " class="col-md-12">
              <form id="login-form container " class="form container login login-div needs-validation" action="login.php" method="post" novalidate>
                <h1 class="text-center mt-5 ">Login</h1>
                <div class="container ">
                  <div class="form-group row mt-5">
                    <div class="alert alert-danger" id="error" role="alert">
                      Invalid UserEmail or Password
                    </div>
                  </div>
                  <div class="form-group row mt-5">
                    <h5><label for="username " class="mb-3">User Email:</label></h5>
                    <br>
                    <input type="text" name="username" id="username" class="input-failed" placeholder="user email" required>
                    <div class="invalid-feedback">
                      Please enter your user email.
                    </div>
                  </div>
                  <div class="form-group row mt-5">
                    <h5>  <label for="password" class="mb-3 mt-3">Password:</label></h5>
                    <br>
                    <input type="password" name="password" id="password" class="input-failed" placeholder="password" required>
                    <div class="invalid-feedback">
                      Please enter your password.
                    </div>
                    <label for="remember-me" class="mt-5"><span><input id="remember-me" name="remember-me" type="checkbox"></span><span> Remember me</span> </label>
                    <br>
                  </div>
                  <div class="form-group col-sm-1-12 strat-100 mt-5 position-relative">
                    <input type="submit" name="submit" class="btn btn-primary  btn-md" value="submit">
                    <button type="button" class="Forget position-absolute bottom-0 end-0" name="button">Forget password? </button>
                  </div>
                  <div class="form-group row mt-5"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!--JS-->
      <script>
        (function() {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function(form) {
              form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }

                form.classList.add('was-validated')
              }, false)
            })
        })()
      </script>
  </body>
</html>
