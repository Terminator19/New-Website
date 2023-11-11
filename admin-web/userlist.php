<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!----======== Bootstrap CSS ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<style>
.logout:hover{
 background-color: #dc3545!important;
}

</style>
<body>
<?php include 'componnent/navigation.php'; ?>

    <section class="home" >
        <div class="text">Games table</div>

        <div class="page">
            
         <?php  include 'componnent/user.php'; ?> 
           
        
          
  
        </div>
        </div>
    </section>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

 <script src="componnent/system.js"></script>
<script>
    $(document).ready(function() {
    var noDataFoundRow = $('#noDataFound');
    var dataNotFoundLogged = false; // Premenná na sledovanie, či sa správa už vypísala

    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val().toLowerCase();
        var rows = $('#employeeTable tbody tr');

        var hasVisibleRows = false;

        rows.each(function() {
            var filterCell = $(this).find('td[data-filter="search"]');
            if (filterCell.length > 0) { // Zabezpečte, že stĺpec má atribút data-filter="search"
                if (filterCell.text().toLowerCase().includes(searchTerm)) {
                    $(this).css('display', 'table-row');
                    hasVisibleRows = true;
                } else {
                    $(this).css('display', 'none');
                }
            }
        });

        // Zmena stavu riadku s oznamom "No data found"
        var DataFound = $('#noDataFound');
        if (hasVisibleRows) {
            DataFound.css('display', 'none');
            dataNotFoundLogged = false; // Resetujte premennú pre vypisovanie správy
        } else {
            if (!dataNotFoundLogged) {
                console.log('Data not found');
                DataFound.css('display', 'table-row');
                dataNotFoundLogged = true; // Nastavte premennú, aby sa správa vypísala iba raz
            }
        }

    });
});

   </script>
</body>
</body>
</html>