
<?php
include 'system/function.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banned</title>
  <link href="components/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="components/css/sb-admin.css" rel="stylesheet">
  <!--<link href="style.css" rel="stylesheet">-->
  <style>
    * {
      color: #ADB5Bd;
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


  </style>
</head>
<body style="background-image:url(pozadie.jpg); background-repeat: no-repeat; background-position: center; background-attachment: fixed; background-size: cover;">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div  class="p-3 mb-2 bg-danger text-secondary">
            <center><h1>Warning</h1></center>
        </div>
      <div class="card-body">
        <form method="post" >
            <div class="text-secondary"><h4>Váš účet bol zablokovaný</h4><br>
                <div class="dropdown-divider"></div>
                <center>
                    <a type="button" class="btn btn-danger" href="?akce=odhlasit">Odhlásit se</a>
                </center>    
            </div>
<?php
error_reporting(0);
if(isset($_GET["akce"])) {
if($_GET["akce"] == "odhlasit") {
    session_start();
    session_destroy();
    header("Location: login.php");
}
}
?>
          </form>
      </div>
    </div>
  </div>
</body>
</html>