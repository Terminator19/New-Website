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
<h1 style="display: flex;justify-content: center;">Application</h1>
<hr>



<?php include 'components/navigation.php'; ?>
          <br>
          <div class="card yt-box" >
  <div class="card-body">
  
  </div>
</div>
<br>

<!--samotný vypis-->

        <div class="card mb-3 kontent" >
            <div class="card-header" style="padding:16px;">
               
              <form style="width:203px;margin-top: 23;float: right;" action="" method="get">
                        
                <div class="input-group md-form form-sm form-2 pl-0" style="float: right;">
               
                  <input value="" class="form-control my-0 py-1 red-border" type="text" name="q_titul" placeholder="Search" maxlength="100px" aria-label="Search">
                  <div class="input-group-append">
                      <button style="float:right;" class="input-group-text red lighten-3" type="submit" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                  </div>
                  
               
          </div>
      </form>
                
                 
            <div class="btn-group ">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategorie
                            </button>
                        <?php
                            $kategorie = array(
                            'Vše', 'Antivirus software','Office applications',' Graphic design','Software development','PC repair and maintenance tools','Audio and video applications',
                            'Internet browsers',
                            'Password management and security',
                            'Files and backups',
                            'Multimedia applications',
                            'Game applications',
                            'Communication applications',
                            'Online trading',
                            'Virtual reality and augmented reality',
                            'Personal finance',
                            'Interior design',
                            'Video calls and conferences',
                            'CRM and business applications',
                            'Web creation tools and CMS',
                            'Educational applications'
                         );
                        ?>
                            <div class="dropdown-menu"  style="position: absolute;will-change: transform;top: 0px;left: 0px;transform: translate3d(106px, 0px, 0px);overflow-y: scroll;height: 450px;padding: 0;">
                                <?php foreach($kategorie as $kat) { ?>
                                    <a class="dropdown-item<?php if($kat == 'Vše') echo ' active'; ?>" href="?page=&kategorie=<?php echo urlencode($kat); ?>"><?php echo $kat; ?></a>
                                <?php } ?>
                            </div>
            </div>           
        </div>
            <div class="card-body">
                          <div class="row" style="place-content: center;">
          <!--carty system-->
         <?php 
         
         
         
         ?>
                    <div class="card text-center" style="width: 14rem;margin: 5px; " >
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Minecraft</h5>
                                      <p class="card-text">Open World / Sandbox</p>
                                      <hr>
                                      <img src="components/img/games_img/minecraft.png">
                                     <hr>
                                      <a href="view-games.php?id=1" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
                              
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Alien isolation</h5>
                                      <p class="card-text">Action,Horror,Sci-fi</p>
                                      <hr>
                                      <img src="components/img/games_img/alien_isolation.png">
                                      <hr>
                                      <a href="view-games.php?id=2" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
           
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Black mesa</h5>
                                      <p class="card-text">Action</p>
                                      <hr>
                                      <img src="components/img/games_img/black mesa 1.png">
                                      <hr>
                                      <a href="view-games.php?id=3" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
            
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Alien vs predator</h5>
                                      <p class="card-text">Action,Horror,Sci-fi</p>
                                      <hr>
                                      <img src="components/img/games_img/alien vs predator.png">
                                      <hr>
                                      <a href="view-games.php?id=4" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
            
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Call of duty black ops 2</h5>
                                      <p class="card-text">Action</p>
                                      <hr>
                                      <img src="components/img/games_img/call of duty black ops 2 .png">
                                      <hr>
                                      <a href="view-games.php?id=5" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
           
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Cluster truck</h5>
                                      <p class="card-text">Adventure</p>
                                      <hr>
                                      <img src="components/img/games_img/cluster truck.png">
                                      <hr>
                                      <a href="view-games.php?id=6" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
           
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Call of duty black ops </h5>
                                      <p class="card-text">Action</p>
                                      <hr>
                                      <img src="components/img/games_img/call of duty black ops 1.png">
                                      <hr>
                                      <a href="view-games.php?id=7" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
           
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Counter strike</h5>
                                      <p class="card-text">Action</p>
                                      <hr>
                                      <img src="components/img/games_img/counter strike source.png">
                                      <hr>
                                      <a href="view-games.php?id=8" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
            
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Don 't starve</h5>
                                      <p class="card-text">Survival</p>
                                      <hr>
                                      <img src="components/img/games_img/dontstarve.png">
                                      <hr>
                                      <a href="view-games.php?id=9" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
           
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Doom </h5>
                                      <p class="card-text">RPG</p>
                                      <hr>
                                      <img src="components/img/games_img/doom 2016.png">   
                                      <hr>
                                      <a href="view-games.php?id=10" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
           
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Doom 3</h5>
                                      <p class="card-text">RPG</p>
                                      <hr>
                                      <img src="components/img/games_img/doom3.png">
                                      <hr>
                                      <a href="view-games.php?id=11" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
            
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Far cry</h5>
                                      <p class="card-text">Strategy</p>
                                      <hr>
                                      <img src="components/img/games_img/far cry.png">
                                      <hr>
                                      <a href="view-games.php?id=12" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
         
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Forza Horizon 4</h5>
                                      <p class="card-text">Sci-fi</p>
                                      <hr>
                                      <img src="components/img/games_img/ForzaHorizon4-lg.png">
                                      <hr>
                                      <a href="view-games.php?id=13" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
          
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Geometry dash</h5>
                                      <p class="card-text">Adventure</p>
                                      <hr>
                                      <img src="components/img/games_img/geometry dash.png">
                                      <hr>
                                      <a href="view-games.php?id=14" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
            
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Hackenet</h5>
                                      <p class="card-text">Simulation</p>
                                      <hr>
                                      <img src="components/img/games_img/Hacknet.png">
                                      <hr>
                                      <a href="view-games.php?id=15" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
         
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Half live 2</h5>
                                      <p class="card-text">Open World / Sandbox</p>
                                      <hr>
                                      <img src="components/img/games_img/half-life 2.png">
                                      <hr>
                                      <a href="view-games.php?id=16" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
           
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">IGI 1</h5>
                                      <p class="card-text">Shooter</p>
                                      <hr>
                                      <img src="components/img/games_img/igi1.png">
                                      <hr>
                                      <a href="view-games.php?id=17" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
           
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">IGI 2</h5>
                                      <p class="card-text">Shooter</p>
                                      <hr>
                                      <img src="components/img/games_img/igi 2.png">
                                      <hr>
                                      <a href="view-games.php?id=18" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                              </div>
         
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Max payne 2</h5>
                                      <p class="card-text">Strategy</p>
                                      <hr>
                                      <img src="components/img/games_img/MaxPayne2.png">
                                      <hr>
                                      <a href="view-games.php?id=19" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
                                </div>
                    <div class="card text-center" style="width: 14rem;margin: 5px;">
                                  <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Mirrors edge</h5>
                                      <p class="card-text">Hack and Slash</p>
                                      <hr>
                                      <img src="components/img/games_img/mirrors edge.png">
                                      <hr>
                                      <a href="view-games.php?id=20" class="btn btn-primary" style="padding-top: 5px;">Download</a>
                                  </div>
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