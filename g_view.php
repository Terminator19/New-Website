<?php

include 'system/function.php';

// Ak nie je používateľ prihlásený, presmerujte ho na prihlasovaciu stránku
if (!isUserLoggedIn()) {
  header('Location: login.php');
  exit;
}

// Ak je používateľ prihlásený, ale jeho účet je "banned", presmerujte ho na stránku pre zablokovaných užívateľov
if (isUserBanned()) {
  header('Location: banned.php');
  exit;
}


?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>web</title>
  <link href="components/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="components/css/sb-admin.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php">Numplay.sk</a>
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-danger">9+</span>
        </a>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger"></span>
        </a>
        <div class="dropdown-menu p-4 text-body-secondary dropdown-menu-right">
          <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
              </div>
              <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
              </div>
              <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
              </div>
              <span class="badge bg-primary rounded-pill">14</span>
            </li>
          </ol>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item">Status:</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter">profile</a>
          <a class="dropdown-item">Language</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item"  href="index.php?akce=odhlasit"  style="color: red;">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <div id="content-wrapper">
      <div class="container-fluid">
        <hr>
        <h1 style="display: flex;justify-content: center;">Game</h1>
        <hr>
        <br>
        <?php include 'components/navigation.php'; ?>
        <br>
        <?php
          include 'system/db.ini.php';
          $id = $_GET['id'];
          $sql = "SELECT * FROM hry WHERE id = $id";
          $result = $db->query($sql);
          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
          
        <div class="card mb-3" style="margin:auto;max-width: 950px;">
         
          <div class="card-header" style="padding:16px;">
          <h1><?php echo $row['title']; ?></h1>
          
          </div>
          <div class="card-body" style="display:block;">
            <div class="card-1">
                
            <span class="badge text-bg-secondary">  <?php echo str_replace(',', ' ', $row['category']); ?></span>
              <br>
              <br>
              <div class="obrazok" style="width:auto;height:auto;">
              <?php
                  $imageUrl = "components/img/games_background_img/" . $row['background-img'];
                  $imagePathJpg = $imageUrl . ".jpg";
                  $imagePathPng = $imageUrl . ".png";

                  if (file_exists($imagePathJpg)) {
                      $imageUrl = $imagePathJpg;
                  } elseif (file_exists($imagePathPng)) {
                      $imageUrl = $imagePathPng;
                  } else {
                      $imageUrl = ""; // Ak súbor neexistuje, nastavíme URL adresu na prázdny reťazec
                  }

                  if (!empty($imageUrl)) {
                      echo '<img loading="lazy" src="' . $imageUrl . '" class="card-img" alt="...">';
                  }
                  ?>
               

              </div>
            <br>
            <hr>
            <h2 class="card-title" style="text-align: center;">About the game</h2><br>
            <a><?php echo $row['info_game']; ?></a>
            <hr>
           
            <h2 class="card-title" style="text-align: center;">System request</h2>
            <br>
            <ul>
            <h5 class="card-title ">MINIMUM:</h5>
            <li><p class="text"><span style="font-weight: bold;">OS:</span> <?php echo $row['m-os']; ?></p></li>
            <li><p class="text"><span style="font-weight: bold;">CPU:</span> <?php echo $row['m-cpu']; ?></p></p></li>
            <li><p class="text"><span style="font-weight: bold;">RAM:</span> <?php echo $row['m-ram']; ?></p></p></li>
            <li><p class="text"><span style="font-weight: bold;">GPU:</span> <?php echo $row['m-gpu']; ?></p></p></li>
            <li><p class="text"><span style="font-weight: bold;">DirectX:</span> <?php echo $row['m-directx']; ?></p></p></li>
            <li><p class="text"><span style="font-weight: bold;">HDD/SSD:</span> <?php echo $row['m-hdd/ssd']; ?></p></p></li>
          
            <br>
            <h5 class="card-title">RECOMMENDED:</h5>
            <li><p class="text"><span style="font-weight: bold;">OS:</span> <?php echo $row['r-os']; ?></p></p></li>
            <li><p class="text"><span style="font-weight: bold;">CPU:</span> <?php echo $row['r-cpu']; ?></p></p></li>
            <li><p class="text"><span style="font-weight: bold;">RAM:</span> <?php echo $row['r-ram']; ?></p></p></li>
            <li><p class="text"><span style="font-weight: bold;">GPU:</span> <?php echo $row['r-gpu']; ?></p></p></li>
            <li><p class="text"><span style="font-weight: bold;">DirectX:</span> <?php echo $row['r-directx']; ?></p></p></li>
            <li><p class="text"><span style="font-weight: bold;">HDD/SSD:</span> <?php echo $row['r-hdd/ssd']; ?></p></p></li>
          </ul>

            <hr>
            <h2 class="card-title" style="text-align: center;">Screenshots</h2>
<br>
<?php echo $row['screen_game']; ?>
<!--<img src="https://staticg.sportskeeda.com/editor/2022/03/2ee4e-16481582659312-1920.jpg?w=840"  class="card-img">-->
<hr>

            <div class="download" style="display: flex;justify-content: center;">
              <div style="margin:1px;">
                <button type="button" class="btn btn-primary">Download 32bit</button>
              </div>
              <div style="margin:1px;">
                <button type="button" class="btn btn-primary">Download 64bit</button>
              </div>
            </div>
          

       

        </div>
        </div>
          <div class="card-footer small text-muted">
            <div style="display: flex;justify-content: center;">
              <strong>Reklamy</strong>
            </div>
            <div class="dropdown-divider"></div>
            <nav aria-label="Page navigation example">
              <div class="reklama-large"></div>
              <div class="reklama-min" style="max-width:230px;margin:0px;"></div>
            </nav>
          </div>
       
  
        
        
      </div>
      
      <div class="card mb-3" style="margin:auto;max-width: 950px;">
          <div class="card-body" style="display:block;">
          <h5><p class="fw-bold">20 Comments</p></h5>
          <hr>
          <div class="post-box">
                  <div class="avatar">
                    <div>G</div>
                  </div>
                  <div class="send-box">
                  <div class="card ">
                   
                    <div class="card-body" style="height: 150px;">
                      <textarea name="" id="myTextarea" cols="30" rows="10"></textarea>
                      
                    </div>
                    <div class="card-footer text-body-secondary" style="display:flex;align-items:center;">
                   <div class="edit-btn-comments">
                    <a type="button" id="bold" class="btn btn-dark"><i class="fa-solid fa-b"></i></a>
                    <a type="button" id="italic" class="btn btn-dark"><i class="fa-solid fa-italic"></i></a>
                    <a type="button" id="underline" class="btn btn-dark"><i class="fa-solid fa-underline"></i></a>
                    <a type="button" id="strick" class="btn btn-dark"><i class="fa-solid fa-strikethrough"></i></a>
                    <a type="button" id="link" class="btn btn-dark"><i class="fa-solid fa-link"></i></a>
                    <a type="button" id="eye-slash" class="btn btn-dark"><i class="fa-solid fa-eye-slash"></i></a>
                    <a type="button" id="code" class="btn btn-dark"><i class="fa-solid fa-code"></i></a>
                    <a type="button" id="quote" class="btn btn-dark"><i class="fa-solid fa-quote-left"></i></a>
                    </div>
                    <button type="button" class="btn btn-dark comment-btn">Comments</button>
                    </div>
                  </div>

                  </div>
          </div>
          <br><br>
        
     <?php include 'components/comment-test.html';?>
             <?php
              }
            } else {
              echo "
             
              <div class='card mb-3' style='margin:auto;max-width: 950px;'>
                <div class='card-body'>
                    <h5 class='card-title font-weight-bold cw '> Game Not Found</h5>
                </div>
                </div>
              
              ";
            }
            mysqli_close($db);
          
          
          ?>

    </div>
  </div>
</div>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header center">
          <h5 class="modal-title" id="exampleModalCenterTitle">Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label>User name:</label>
          <br />
          <label>Email:</label>
          <br />
          <label>User type:</label>
          <br />
          <label>password:</label>
          <br />
          <label>date registration:</label>
          <br />
        </div>
      </div>
    </div>
  </div>

  <script src="components/vendor/jquery/jquery.min.js"></script>
  <script src="components/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="components/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="components/vendor/datatables/jquery.dataTables.js"></script>
  <script src="components/vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="components/js/sb-admin.min.js"></script>
  <script src="components/js/demo/datatables-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<script>
    // Získaj referenciu na textarea
    const textarea = document.getElementById('myTextarea');

    // Získaj referencie na tlačidlá
    const boldButton = document.getElementById('bold');
    const italicButton = document.getElementById('italic');
    const underlineButton = document.getElementById('underline');
    const strickButton = document.getElementById('strick');
    const linkButton = document.getElementById('link');
    const eyeSlashButton = document.getElementById('eye-slash');
    const codeButton = document.getElementById('code');
    const quoteButton = document.getElementById('quote');

    // Pridaj event listener na kliknutie pre každé tlačidlo
    boldButton.addEventListener('click', () => {
        textarea.value += '<b></b>';
    });

    italicButton.addEventListener('click', () => {
        textarea.value += '<i></i>';
    });

    underlineButton.addEventListener('click', () => {
        textarea.value += '<u></u>';
    });

    strickButton.addEventListener('click', () => {
        textarea.value += '<s></s>';
    });

    linkButton.addEventListener('click', () => {
        textarea.value += '<a href=""></a>';
    });

    eyeSlashButton.addEventListener('click', () => {
        textarea.value += '<spoiler></spoiler>';
    });

    codeButton.addEventListener('click', () => {
        textarea.value += '<code></code>';
    });

    quoteButton.addEventListener('click', () => {
        textarea.value += '<q></q>';
    });
</script>
</html>
