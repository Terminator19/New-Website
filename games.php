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
<style>
  .kategorie{
    transform: translate3d(0px, 40px, 0px)!important;
  }
</style>
<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="#">Numplay.sk</a>
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
        <div class="dropdown-menu p-4 text-body-secondary dropdown-menu-right" style="max-width: 200px;">
          <p>
            Some example text that's free-flowing within the dropdown menu.
          </p>
          <p class="mb-0">
            And this is more example text.
          </p>
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
          <a class="dropdown-item" href="index.php?akce=odhlasit" style="color: red;">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid" >
      
        <hr>
        <h1 style="display: flex; justify-content: center;">Games</h1>
        <hr>
        <?php include 'components/navigation.php'; ?>
        <br>

        <div class="card yt-box">
          <div class="card-body">
          </div>
        </div>
      
        <br>
        <?php
          include 'system/db.ini.php';

          // Nastavenie parametrov paginácie
          $resultsPerPage = 20;
          $currentCategory = isset($_GET['category']) ? $_GET['category'] : 'All';
          $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
          $startFrom = ($currentPage - 1) * $resultsPerPage;

          // Získanie výsledkov pre aktuálnu stránku a kategóriu
          $query = "SELECT * FROM hry";
          if ($currentCategory !== 'All') {
            $query .= " WHERE category = '$currentCategory'";
          }
          $query .= " ORDER BY id LIMIT $startFrom, $resultsPerPage";
          $result = mysqli_query($db, $query);

          ?>




        <div class="card mb-3 kontent">
          <div class="card-header" style="padding: 16px;">
            <form class="search-box256" id="search-form" action="" method="get">
              <div class="input-group md-form form-sm form-2 pl-0" style="float: right;">
                <input value="" id="search-input" class="form-control my-0 py-1 red-border" type="text" name="q_titul" placeholder="Search" maxlength="100px" aria-label="Search">
                <div class="input-group-append">
                  <button style="float: right;" class="input-group-text red lighten-3" type="submit" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                </div>
              </div>
            </form>
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" style="box-shadow: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="category-label">All
              </button>
              <?php
              $category = array(
                'All', 'Action', 'Adult', 'Adventure', 'Anime', 'Building', 'Casual', 'Eroge', 'Hack and Slash',
                'Hidden Object', 'Horror', 'Management', 'Mature', 'Nudity', 'Open World / Sandbox', 'Point & Click',
                'Puzzle', 'Racing', 'RPG', 'RTS', 'Sci-fi', 'Shooter', 'Simulation', 'Sport', 'Strategy', 'Survival',
                'Text-Based', 'Tower Defense', 'Turn-Based', 'Visual Novel', 'VR'
              );
              ?>
              <div class="dropdown-menu kategorie" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(106px, 0px, 0px); overflow-y: scroll; height: 450px; padding: 0;">
              <?php foreach ($category as $kat) { ?>
                 <!-- <a class="dropdown-item<?php if ($kat == 'All') echo ' active'; ?>" href="?page=1&category=<?php echo urlencode($kat);?>" category="<?php echo urlencode($kat);?>"><?php echo $kat; ?></a> -->
                <a class="dropdown-item<?php if ($kat == 'All') echo ' active'; ?>" href="#" category="<?php echo urlencode($kat);?>"><?php echo $kat; ?></a>
                <?php } ?>
              </div>
            </div>
          </div>
            
          <div class="card-body" >
              <div class="row" id="games-write" style="place-content: center;">


              </div>

          <div id="button-position" style="text-align: center; margin: 10px;">
 
        
            <button class="btn btn-primary" id="change-page-button">Další</button>
        
          </div>
        </div>

         
          <div class="card-footer small text-muted">
            <div style="display: flex; justify-content: center;">
              <strong>Reklamy
             
              </strong>
            </div>
            <div class="dropdown-divider"></div>
            <nav aria-label="Page navigation example">
              <div class="reklama-large"></div>
              <div class="reklama-min" style="max-width: 230px; margin: 0px;"></div>
            </nav>
          </div>
        

      </div>
    </div>
  </div>
  
  <div class="modal " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="ajax-api/games.js"></script>
  <script src="components/vendor/jquery/jquery.min.js"></script>
  <script src="components/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="components/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="components/vendor/datatables/jquery.dataTables.js"></script>
  <script src="components/vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="components/js/sb-admin.min.js"></script>
  <script src="components/js/demo/datatables-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>