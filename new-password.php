<?php
include 'system/function.php';

if (isset($_SESSION['user_role'])) {
  header("Location: index.php");
  exit();
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
    .alert{
      background-color: #2c0b0e;
      border-color: #842029;
      color: #ea868f;
     
    }

    .btn{
  font-weight:bold;
}
  </style>
</head>
<body style="background-image:url(pozadie.jpg); background-repeat: no-repeat; background-position: center; background-attachment: fixed; background-size: cover;height:0">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" style="">
        <h3>New Password</h3>
      </div>
      <div class="card-body">
        <form method="post">
            <?php 
           /* if (!empty($errorMessageslog)) {
              echo '<div class="alert alert-danger" role="alert">';
              foreach ($errorMessageslog as $errorMessagelog) {
                echo $errorMessagelog . '<br>';
              }
              echo '</div>';
            }*/
            ?>
      
            <div class="form-group" style="display:flex;">
              <input type="password" name="password" class="form-control" placeholder="Create new password" id="password1">
              <div class="col-auto" style="padding: 0 0 0 5;">
              <a id="pas-visible1" class="btn btn-dark mb-3" style="height:38px; width: 46px; "><i id="eye-icon1" style=" margin-top: 4px;" class="fa-solid fa-eye-slash"></i></a>
            </div>
            </div>
          
          <div class="form-group" style="display:flex;">
            <input type="password" name="password" class="form-control" placeholder="Confirm you password" id="password2">
            <div class="col-auto" style="padding: 0 0 0 5;">
            <a id="pas-visible2" class="btn btn-dark mb-3" style="height:38px; width: 46px; "><i id="eye-icon2" style=" margin-top: 4px;" class="fa-solid fa-eye-slash"></i></a>
          </div>
          </div>
          <input type="submit" class="btn btn-success btn-block" value="Change" name="change">
        </form>
       
        
      </div>
    </div>
  </div>
</body>
<script>
        const pasVisibleButton1 = document.getElementById("pas-visible1");
        const pasVisibleButton2 = document.getElementById("pas-visible2");
        const eyeIcon1 = document.getElementById("eye-icon1");
        const eyeIcon2 = document.getElementById("eye-icon2");
        const passwordInput1 = document.getElementById("password1");
        const passwordInput2 = document.getElementById("password2");

        pasVisibleButton1.addEventListener("click", () => {

            if (passwordInput1 && eyeIcon1) {
                if (passwordInput1.type === "password") {
                    passwordInput1.type = "text";
                    eyeIcon1.classList.remove("fa-eye-slash");
                    eyeIcon1.classList.add("fa-eye");
                } else {
                    passwordInput1.type = "password";
                    eyeIcon1.classList.remove("fa-eye");
                    eyeIcon1.classList.add("fa-eye-slash");
                }
            }


        });

        pasVisibleButton2.addEventListener("click", () => {

            if (passwordInput2 && eyeIcon2) {
                if (passwordInput2.type === "password") {
                    passwordInput2.type = "text";
                    eyeIcon2.classList.remove("fa-eye-slash");
                    eyeIcon2.classList.add("fa-eye");
                } else {
                    passwordInput2.type = "password";
                    eyeIcon2.classList.remove("fa-eye");
                    eyeIcon2.classList.add("fa-eye-slash");
                }
            }


            });
    </script>
</html>