

$(document).ready(function() {
    // Načítanie tabuľky pri načítaní stránky
    $.ajax({
        url: "table.php",
        type: "GET",
        success: function(result) {
            $("#employeeTable tbody").html(result); // Vložíme obsah tabuľky do tbody
           
        },
        error: function(xhr, status, error) {
            console.error("Chyba pri načítavaní tabuľky: " + error);
        }
    });



    // Pridanie zamestnanca
    $("#addEmployeeForm").submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: "system/add.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                location.reload(); // Obnoví stránku
                $("#addEmployeeModal").modal("hide");
            },
            error: function(xhr, status, error) {
                console.error("Chyba pri pridávaní: " + error);
            }
        });
    });



// upravovať zamestnanca

    // Pri kliknutí na tlačidlo úpravy otvoríme modal a získame údaje cez AJAX
    $(document).on('click', '.edit', function () {
        var employeeID = $(this).data('employee-id');
        
        // AJAX požiadavka na serverový skript, ktorý poskytne údaje o zamestnancovi
        $.ajax({
            url: 'system/edit.php?id=' + employeeID, // Upravte cestu k vášmu skriptu
            type: 'GET',
            success: function (data) {
                var employee = JSON.parse(data);
                $('#editName').val(employee.name);
                $('#editEmail').val(employee.email);
                $('#editAddress').val(employee.address);
                $('#editPhone').val(employee.phone);
                $('#editEmployeeForm').attr('data-employee-id', employeeID); // Nastavenie id do formulára
                
               
            }
        });
    
    
    // Pri odoslaní formulára na úpravu pošleme údaje cez AJAX na server
    $('#editEmployeeForm').on('submit', function (e) {
        e.preventDefault();
        
        var employeeID = $(this).data('employee-id');
        var newName = $('#editName').val();
        var newEmail = $('#editEmail').val();
        var newAddress = $('#editAddress').val();
        var newPhone = $('#editPhone').val();
        
        // AJAX požiadavka na serverový skript, ktorý upraví údaje v databáze
        $.ajax({
            url: 'system/edit.php?id=' + employeeID, // Upravte cestu k vášmu skriptu
            type: 'POST',
            data: {
                id: employeeID,
                name: newName,
                email: newEmail,
                address: newAddress,
                phone: newPhone
            },
            success: function (response) {
                // Tu môžete zobraziť oznámenie o úspechu alebo obnoviť stránku s novými údajmi
                console.log(response); // Pre kontrolu
                location.reload(); // Obnoví stránku
               
              
            $('#editEmployeeModal').modal('hide'); // Zatvorí modal
            }
        });
    });
});

 
    // Pri kliknutí na tlačidlo mazania otvoríme modal a získame ID zamestnanca
    $(document).on('click', '.delete', function () {
        var employeeID = $(this).data('employee-id');
        $('#deleteEmployeeForm').attr('data-employee-id', employeeID); // Nastavenie id do formulára
    });
    
    // Pri odoslaní formulára na mazanie pošleme ID cez AJAX na server
    $('#deleteEmployeeForm').on('submit', function (e) {
        e.preventDefault();
        
        var employeeID = $(this).data('employee-id');
        
        // AJAX požiadavka na serverový skript, ktorý vymaže záznam z databázy
        $.ajax({
            url: 'system/delete.php',
            type: 'POST', // Zmenil som typ na POST
            data: {
                id: employeeID
            },
            success: function (response) {
                // Tu môžete zobraziť oznámenie o úspechu alebo obnoviť stránku s novými údajmi
                console.log(response); // Pre kontrolu
                location.reload(); // Obnoví stránku
                $('#deleteEmployeeModal').modal('hide'); // Zatvorí modal
            }
        });
    });



//////////////////////////////



});



