<?php 
$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost') {
    // pripoj sa na localhost
    $db = mysqli_connect("localhost","root","","numplaywzsk2265");
    if(!$db){
        die("Pripojenie zlyhalo");
        header("location:505.html");
    }
    
} else {
    // pripoj sa na webzdarma.cz
    $db = mysqli_connect("sql2.webzdarma.cz","numplaywzsk2265","Vlado9","numplaywzsk2265");
    if(!$db){
        die("Pripojenie zlyhalo");
    }
}

?>