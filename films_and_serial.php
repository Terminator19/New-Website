
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


if(isset($_GET["akce"])) {
if($_GET["akce"] == "odhlasit") {
    session_start();
    session_destroy();
    header("Location: login.php");
}
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
<style>
 .scroll::-webkit-scrollbar {
    width: 0;
    background: transparent;
  }
.kategorie{
  transform: translate3d(0px, 40px, 0px)!important;
}
</style>
<body id="page-top" >

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
   <a class="navbar-brand mr-1" href="index.php">Numplay.sk</a>
   
      <ul  class="navbar-nav ml-auto ml-md-0">
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
          <div class="dropdown-menu p-4 text-body-secondary  dropdown-menu-right" style="max-width: 200px;">
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
          <a class="dropdown-item" >Status:</a>
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
   
    

    <div id="content-wrapper" >
     <div class="container-fluid" >
        <hr>
        <h1 style="display: flex;justify-content: center;">Films and serials</h1>
        <hr>

        

        <?php include 'components/navigation.php'; ?>
          <br>

          <div class="card yt-box" >
          <div class="card-body" style="display:block;">
            
            <div class="container-gallery card" style="flex-direction: row;">
         <div class="card-body" style="width:100%;height:auto;">
            <div class="ratio ratio-16x9">
            <iframe width="1280" height="720" style="border-radius:0.375rem;" src="https://www.youtube.com/embed/jY2NOnIcpaY" title="Núdzový let (6.11.2018 o 20:40 na PLUSke)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
        
</div>
              <div   style="height: 341px;margin-left: 10px; ">
                <div class="card-body scroll" style="padding: 10px;align-items: normal;overflow-y: scroll;scrollbar-width: none;">
                <div class="card" style="margin-bottom: 5px;">
                    <div class="card-body" style="padding: 10px; align-items: normal; flex-direction: row; flex: none;">
                        <img src="https://i.ytimg.com/vi/nMYaz5Pq8aw/mqdefault.jpg" style="width: 106px;">
                        <div style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div style="width: 140px; margin: 0px 7px; font-size: 15px; height: 44px;">Insidious: Červené dveře</div>
                            <div style="margin: 0px 7px; font-size: 12px; height: 17px;">12922 zhliadnutí</div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 5px;">
                    <div class="card-body" style="padding: 10px; align-items: normal; flex-direction: row; flex: none;">
                        <img src="https://i.ytimg.com/vi/nMYaz5Pq8aw/mqdefault.jpg" style="width: 106px;">
                        <div style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div style="width: 140px; margin: 0px 7px; font-size: 15px; height: 44px;">Insidious: Červené dveře</div>
                            <div style="margin: 0px 7px; font-size: 12px; height: 17px;">12922 zhliadnutí</div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 5px;">
                    <div class="card-body" style="padding: 10px; align-items: normal; flex-direction: row; flex: none;">
                        <img src="https://i.ytimg.com/vi/nMYaz5Pq8aw/mqdefault.jpg" style="width: 106px;">
                        <div style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div style="width: 140px; margin: 0px 7px; font-size: 15px; height: 44px;">Insidious: Červené dveře</div>
                            <div style="margin: 0px 7px; font-size: 12px; height: 17px;">12922 zhliadnutí</div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 5px;">
                    <div class="card-body" style="padding: 10px; align-items: normal; flex-direction: row; flex: none;">
                        <img src="https://i.ytimg.com/vi/nMYaz5Pq8aw/mqdefault.jpg" style="width: 106px;">
                        <div style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div style="width: 140px; margin: 0px 7px; font-size: 15px; height: 44px;">Insidious: Červené dveře</div>
                            <div style="margin: 0px 7px; font-size: 12px; height: 17px;">12922 zhliadnutí</div>
                        </div>
                    </div>
                </div>




                </div>
            </div>
  </div>
          

         
          </div>
        </div>
        <br>

        <div class=" card mb-3 kontent">
          <div class="card-body" style="display: flex;flex-direction: row;"  >
           
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Movies</li>
                <li class="breadcrumb-item active" aria-current="page">Series</li>
              </ol>
            </nav>
            
          </div>
        </div>
        <div class="card mb-3 kontent" >
            <div class="card-header" style="padding:16px;">
               
            <form class="search-box256" action="" method="get">
              <div class="input-group md-form form-sm form-2 pl-0" style="float: right;">
                <input value="" class="form-control my-0 py-1 red-border" type="text" name="q_titul" placeholder="Search" maxlength="100px" aria-label="Search">
                <div class="input-group-append">
                  <button style="float: right;" class="input-group-text red lighten-3" type="submit" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                </div>
              </div>
            </form>
   
            <div class="btn-group ">
                            <button type="button" class="btn btn-primary dropdown-toggle" style="box-shadow: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All
                            </button>
                        <?php
                              $kategorie = array( 
                                'all', 'Populárne filmy', 'Skutočná udalosť', 'Akčné', 'Dobrodružné', 'Animované', 'Komédie', 'Krimi',
                                'Dráma', 'Rodiný', 'Horror', 'Romantický', 'Sci-Fi', 'Thriller', 'Fantasy', 'Životopisný', 'Mysteriózní',
                                'Dokumentární', 'Sportoví', 'Válečný', 'Historický', 'Psychologický', 'Pohádka', 'Katastrofický', 'Erotický',
                                'Hudební', 'Western'
                              );
                              ?>
                       
                            <div class="dropdown-menu kategorie"  style="  position: absolute; will-change: transform; top: 0px; left: 0px;  overflow-y: scroll; height: 450px; padding: 0;" >
                                <?php foreach($kategorie as $kat) { ?>
                                    <a class="dropdown-item<?php if($kat == 'all') echo ' active'; ?>" href="?page=&kategorie=<?php echo urlencode($kat); ?>"><?php echo $kat; ?></a>
                                <?php } ?>
                            </div>
            </div>           
        </div>
            <div class="card-body">
                          <div class="row" style="place-content: center;">
          <!--carty system-->
          <div class="card" style="width: 14rem;margin: 5px;padding:0px;">
            <a href="fs_view.php" style="text-decoration:none;color:white;">
              <img src="http://numplay.wz.sk/test2/components/img/movies_img/lego%20movie%202.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">nazov filmu</h5>       
                <span class="badge badge-success">CZ</span>
              </div>
            </a>
          </div>

          <div class="card" style="width: 14rem;margin: 5px;padding:0px;">
            <a href="#" style="text-decoration:none;color:white;">
              <img src="http://numplay.wz.sk/test2/components/img/movies_img/lego%20movie%202.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">nazov filmu</h5>       
                <span class="badge badge-success" >CZ</span>
              </div>
            </a>
          </div>
          <div class="card" style="width: 14rem;margin: 5px;padding:0px;">
            <a href="#" style="text-decoration:none;color:white;">
              <img src="http://numplay.wz.sk/test2/components/img/movies_img/lego%20movie%202.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">nazov filmu</h5>       
                <span class="badge badge-success" >CZ</span>
              </div>
            </a>
          </div>

          <div class="card" style="width: 14rem;margin: 5px;padding:0px;">
            <a href="#" style="text-decoration:none;color:white;">
              <img src="http://numplay.wz.sk/test2/components/img/movies_img/lego%20movie%202.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">nazov filmu</h5>       
                <span class="badge badge-success" >CZ</span>
              </div>
            </a>
          </div>

         


            </div>
    
        <br>

                <span>Zobrazuji 20 výsledků z 29</span>
                <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

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
</html>   