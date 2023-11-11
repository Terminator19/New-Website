
<?php
// Pripojenie k databáze
$db = new mysqli("localhost", "root", "", "crud");

// Spracovanie údajov pre editáciu zamestnanca
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Získanie údajov z POST premenných
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // SQL príkaz pre aktualizáciu údajov zamestnanca v databáze
    $sql = "UPDATE crud_table SET name = '$name', email = '$email', address = '$address', phone = '$phone' WHERE id = $id";

    // Vykonanie SQL príkazu
    if ($db->query($sql) === TRUE) {
        echo "Údaje zamestnanca boli aktualizované.";
    } else {
        echo "Chyba pri aktualizácii údajov: " . $db->error;
    }
} else {
    // Získanie ID zamestnanca zo vstupných údajov
    $id = $_GET['id'];

    // SQL príkaz na získanie údajov zamestnanca z databázy na základe ID
    $sql = "SELECT * FROM crud_table WHERE id = $id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Získanie riadku s údajmi
        $row = $result->fetch_assoc();

        // Vytvorenie asociačného poľa s údajmi z databázy
        $employee = array(
            'name' => $row['name'],
            'email' => $row['email'],
            'address' => $row['address'],
            'phone' => $row['phone']
        );

        // Vrátenie údajov v JSON formáte
        echo json_encode($employee);
    } else {
        // Ak zamestnanec s daným ID neexistuje, vráti sa prázdny objekt
        echo json_encode(array());
    }
}

// Uzavretie spojenia s databázou
$db->close();

?>