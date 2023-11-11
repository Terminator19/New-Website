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

  <link rel="stylesheet" href="video_style.css">
  <script src="https://kit.fontawesome.com/0e05c28199.js" crossorigin="anonymous"></script>
   
</head>
<style>
* {
  box-sizing: content-box;
  box-sizing: border-box;
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
     <div class="container-fluid">

<hr>
<h1 style="display: flex;justify-content: center;">Films and serials</h1>
<hr>

<br>

<?php include 'components/navigation.php'; ?>
          <br>


 
        <div class="card mb-3 kontent" >
            <div class="card-header" >
            <div class="nazov font-weight" style="margin-top:25px;">
               <div><h1>LEGO® príbeh</h1></div>
			    <hr>
          </div>
        
			   <div style="font-size: 9pt; padding-bottom: 10px;float:left; ">


<i class="fa fa-clock-o" style="font-size: 16px; padding-right: 5px; position:relative; top:2px;" aria-hidden="true"></i>

<span style="font-size: 9pt;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">101 min</font></font></span>

        <i style="padding-left:8px;padding-right:8px; position:relative; top:0px; font-size: 5px;vertical-align: middle;" class="fa fa-circle-thin" aria-hidden="true"></i>
            Animovaný / 
            Fantasy / 
            Dobrodružný / 
            Komedie / 
            Rodinný
</div>
<div class="card" style="float:right;margin-right:5px; display: flex;flex-direction: row;padding: 5px;align-items: center;">Language: 
  <a href="#"><img style="height: 20px;margin-left:5px;opacity:1;" src="components/img/server_img/cz.svg"></a>
  <a href="#"><img style="height: 20px;margin-left:5px;opacity:0.5;" src="components/img/server_img/sk.svg"></a>
  <a href="#"><img style="height: 20px;margin-left:5px;opacity:0.5;" src="components/img/server_img/gb.svg"></a>
  
  </div>
</div>

        <div class="card-body" style="display:block;" >
      <!-- upravovať -->
	
        <div class="card-1" style="min-height: 250px;">
	      <br>
				  
         <div class="vid-container" >
    <div class="video_player" >
      <div id="error" class="errorvid" style="display: none;"><i style="margin-right: 10px;color: black;" class="fa-solid fa-film"></i>  This video is unavailable</div>
        <video id="videoplayer" class="video" poster="components/img/movies_img/EMOJI-FILM.jpg" preload="metadata" style="display: flex;">
        
        </video>
        <div class="start_button" id="FirstPlayBtn"><i class="fa-regular fa-circle-play"></i></div>
        <div class="load_spinicon" id="spin"><i style="color: black;" class="fa-solid fa-spinner fa-spin-pulse"></i></div>
        <div class="text-subtitle" style="font-family:'Trebuchet MS';font-weight:normal;"  id="subtitles" ></div>
          <div class="controls"  id="controls-all" >
          <script src="system/video-system/controls.js"></script></div>
        
    </div>
   </div>
            </div>     
		   
                 

                  
	   
      </div>
    <br>
	  
	       
      
      
      
      
    <!-- upravovať -->

    

    <!-- upravovať -->
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

  <script src="https://cdn.jsdelivr.net/npm/hls.js" sourceMap="false" crossorigin="anonymous"></script>
      <script src="system/video-system/script.js"></script>
      <script src="system/video-system/controls-system.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
</body>
</html>   