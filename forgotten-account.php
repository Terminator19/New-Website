<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgotten account</title>
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
  </style>
</head>
<body style="background-image:url(pozadie.jpg); background-repeat: no-repeat; background-position: center; background-attachment: fixed; background-size: cover;">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
        <h3>forgotten account</h3>
      </div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <label>Username and email</label><br>
            <input type="email" name="name" class="form-control" placeholder="Username">
          </div>

          <br>
          <input type="submit" class="btn btn-success btn-block" value="Log in" name="submit">
        </form>
       
        <div class="text-center">
          
        </div>
      </div>
    </div>
  </div>
</body>
</html>