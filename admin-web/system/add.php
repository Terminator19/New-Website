<?php

$db = new mysqli("localhost", "root", "", "crud");

// Overenie pripojenia k databáze
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Získanie údajov z POST premenných
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Príprava a vykonanie SQL príkazu pre vloženie údajov do databázy
$sql = "INSERT INTO crud_table (name, email, address, phone) VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $address, $phone);

if ($stmt->execute()) {
    echo "Údaje boli úspešne uložené do databázy.";
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}

// Uzavretie spojenia s databázou
$stmt->close();
$db->close();
?>
