<?php
// Pripojenie k databáze
$db = new mysqli("localhost", "root", "", "crud");

// Overenie pripojenia k databáze
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Získanie ID zamestnanca zo vstupných údajov
$id = $_POST['id'];

// SQL príkaz na vymazanie zamestnanca z databázy na základe ID
$sql = "DELETE FROM crud_table WHERE id = $id";

if ($db->query($sql) === TRUE) {
    echo "Employee deleted successfully";
} else {
    echo "Error deleting employee: " . $db->error;
}

// Uzavretie spojenia s databázou
$db->close();
?>