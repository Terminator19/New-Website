<?php
include 'system/function.php';

if (isset($_SESSION['user_role'])) {
  header("Location: index.php");
  exit();
}

function generateRememberToken() {
  return bin2hex(random_bytes(32)); // Generuje náhodný reťazec v hexadecimálnom formáte
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="components/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="components/css/sb-admin.css" rel="stylesheet">
  <!--<link href="style.css" rel="stylesheet">-->

  <style>
    * {
      color: #ADB5Bd;
      font-weight:bold;
    }
    
    .card {
      background-color: #212121;
      
    }
    
    .form-control {
      background: #212121!important;
      border-color: #495057!important;
      color: #ADB5Bd!important;
    }
    
    .form-check-input {
      margin-top: 6px;
    }
    .alert-danger{
      background-color: #2c0b0e;
      border-color: #842029;
      color: #ea868f;
     
    }
    .alert-info{
      background-color: #032830;
      border-color: #087990;
      color: #6edff6;
     
    }
.card-header{

}
    .btn{
  font-weight:bold;
}
  </style>
</head>
<body style="background-image:url(pozadie.jpg); background-repeat: no-repeat; background-position: center; background-attachment: fixed; background-size: cover;height:0">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
        <h3>Login</h3>
      </div>
      <div class="card-body">
        <form method="post">
            <?php 
            if (!empty($errorMessageslog)) {
              echo '<div class="alert alert-danger" role="alert">';
              foreach ($errorMessageslog as $errorMessagelog) {
                echo $errorMessagelog . '<br>';
              }
              echo '</div>';
            }

            if (!empty($infoMessageslog)) {
              echo '<div class="alert alert-info" role="alert">';
              foreach ($infoMessageslog as $infoMessagelog) {
                  echo $infoMessagelog . '<br>';
              }
              echo '</div>';
          }
            ?>
              <label>Username</label><br>
          <div class="form-group">
          
            <input type="text" name="name" class="form-control" placeholder="Username">
          </div>
          <div class="form-group" style="height:70px;">  
            <label>Password</label><br>
          <div style="display:flex;" >
            <input type="password" name="password" class="form-control" placeholder="password" id="password">
            <div class="col-auto" style="padding: 0 0 0 5;">
            <a id="pas-visible" class="btn btn-dark mb-3" style="height:38px; width: 46px; "><i id="eye-icon" style=" margin-top: 4px;" class="fa-solid fa-eye-slash"></i></a>
          </div>
          </div>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="remember_me" type="checkbox" value="" id="remember_me">
            <label class="form-check-label" for="remember_me">
              Remember me
            </label>
          </div>   
          <a style="textdecoration:none;" href="forgot-password.php">Forgotten password?</a>
          <br><br>
          <input type="submit" class="btn btn-success btn-block" value="Log in" name="loginbtn">
        </form>
       
        <div class="text-center">

          <p>Not yet a member <a  style="textdecoration:none;" href="register.php">Singnup now</a></p>
        </div>
        
      </div>
    </div>
  </div>
</body>
<script>
        const pasVisibleButton = document.getElementById("pas-visible");
        const eyeIcon = document.getElementById("eye-icon");
        const passwordInput = document.getElementById("password");

        pasVisibleButton.addEventListener("click", () => {

            if (passwordInput && eyeIcon) {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    eyeIcon.classList.remove("fa-eye-slash");
                    eyeIcon.classList.add("fa-eye");
                } else {
                    passwordInput.type = "password";
                    eyeIcon.classList.remove("fa-eye");
                    eyeIcon.classList.add("fa-eye-slash");
                }
            }


        });
    </script>
</html>