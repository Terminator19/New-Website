<?php 


// Zahešování univerzálního uživatelského jména a hesla
$universal_username = 'root';
$universal_password = '1234';

// Zahešované univerzální uživatelské jméno a heslo
$hashed_universal_username = password_hash($universal_username, PASSWORD_DEFAULT);
$hashed_universal_password = password_hash($universal_password, PASSWORD_DEFAULT);

// Výpis zahešovaných údajů (jen pro účely demonstrace)
echo "Zahešované uživatelské jméno: <a>" . $hashed_universal_username . "</a><br>";
echo "Zahešované heslo: <a>" . $hashed_universal_password . "</a><br>";

$2y$10$Z2tu0o4D2/CR9tc02rX5tehiS9N0/uoCPya6iSfifVgtmsJTqdNU

$2y$10$NMbypDisQadpjSow28zRTeuzvwctkP0MfJphn06jZKJV0cQKX8pES



?>