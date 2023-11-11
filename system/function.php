<?php
session_start();

include 'db.ini.php';

$errorMessagesreg = array(); // Pole pre ukladanie chybových správ

if (isset($_POST["registerBtn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $gdprCheckbox = $_POST["gdprCheckbox"] ?? "";
   
   // Kontrola, či sú vyplnené meno, email a heslo
   if (empty($name) || empty($email) || empty($password1) || empty($password2)) {
    $errorMessagesreg[] = "Všetky polia musia byť vyplnené a začiarknuté";
   } else {
    if ($password1 !== $password2) {
        $errorMessagesreg[] = "Heslá sa nezhodujú.";
    } else{
    // Kontrola, či heslá sa zhodujú a spĺňajú požadované podmienky
    if ($password1 !== $password2 || strlen($password1) < 8 || !preg_match("/[A-Z]/", $password1) || !preg_match("/\d/", $password1)) {
        $errorMessagesreg[] = "Heslo musí mať aspoň 8 znakov a obsahovať aspoň jedno veľké písmeno a jedno číslo.";
    } 
    else {
         // Kontrola, či je meno jedinečné
        if (!checkUniqueName($name, $db)) {
            $errorMessagesreg[] = "Meno je už obsadené. Prosím, vyberte iné meno.";
        } 
        // Kontrola, či heslá sa zhodujú a spĺňajú požadované podmienky
        else {
            // Kontrola, či je začiarknuté políčko súhlasu so spracovaním osobných údajov
            if (empty($gdprCheckbox)) {
                $errorMessagesreg[] = "Musíte súhlasiť so spracovaním osobných údajov.";
            } else {
                // Pokračovanie s registráciou, ak nie sú žiadne chyby
                registerUser($name, $email, $password1, $db);
            }
        }
    } 
 }

}


}

// Funkcia na vloženie nového používateľa do databázy
function registerUser($name, $email, $password, $db) {
    $role = "user"; // Predvolená hodnota pre rolu
    $reg_date = date("d-m-Y"); // Dátum registrácie
    $over_email = "no"; // Predvolená hodnota pre overenie emailu

    // Pripravenie dotazu s použitím prepared statements
    $sql = "INSERT INTO users (name, email, over_email, password, role, reg_date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Heslo sa ukladá ako hash

    $stmt->bind_param("ssssss", $name, $email, $over_email, $hashedPassword, $role, $reg_date);

    if ($stmt->execute()) {
        $successMessage = "Registrácia úspešná. Údaje boli uložené do databázy.";
        // Presmerovanie na inú stránku po úspešnej registrácii
        header("Location: login.php");
        exit; // Dôležité, aby sa ďalší kód nevykonával po presmerovaní
    } else {
        $errorMessagesreg[] = "Chyba pri registrácii: " . $stmt->error;
    }

    $stmt->close();
}

// Funkcia na kontrolu jedinečnosti mena v databáze
function checkUniqueName($name, $db) {
    $sql = "SELECT COUNT(*) FROM users WHERE name = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    
    return ($count == 0); // Vráti true, ak je meno jedinečné, a false inak
}

//LOGYN SYSTEM

$errorMessageslog = array();

if (isset($_POST['loginbtn'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);

    // Kontrola, či sú všetky polia vyplnené
    if (empty($username) || empty($password)) {
        $errorMessageslog[] = "Všetky polia musia byť vyplnené.";
    } else {
        // Pripravenie dotazu s použitím prepared statements
        $sql = "SELECT id, password, role FROM users WHERE name = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id_user, $stored_password, $user_role);
            $stmt->fetch();

            if (password_verify($password, $stored_password)) {
                // Heslo je správne, nastavíme údaje do relácie
                $_SESSION['user_role'] = $user_role;
                $_SESSION['user_id'] = $id_user;

                if ($remember_me) {
                    $remember_token = generateRememberToken();
                    setcookie('remember_token', $remember_token, time() + (60 * 60 * 24 * 30));
                    saveRememberTokenToDatabase($username, $remember_token, $db); // Uložíme do databázy
                } else {
                    // Ak "remember me" nie je zaškrtnuté, vymažeme cookie a token z databázy
                    setcookie('remember_token', '', time() - 3600); // Nastavíme starý čas
                    deleteRememberTokenFromDatabase($username, $db); // Funkcia na vymazanie tokena
                }

                header("Location: index.php");
                exit();
            } else {
                $errorMessageslog[] = "Nesprávne meno alebo heslo.";
            }
        } else {
            $errorMessageslog[] = "Používateľ neexistuje";
        }

        $stmt->close();
    }
}

// Funkcia pre uloženie "remember tokenu" do databázy s použitím pripraveného príkazu
function saveRememberTokenToDatabase($username, $token, $db) {
    // Vypočítajte dátum a čas expirácie, napr. za 30 dní od dnešného dátumu
    $expiration = date('Y-m-d H:i:s', strtotime('+30 days'));

    // Vytvorte pripravený príkaz pre vloženie do tabuľky
    $sql = "INSERT INTO remember_tokens (username, token, expiration) VALUES (?, ?, ?)";
    
    // Pripravte príkaz
    if ($stmt = mysqli_prepare($db, $sql)) {
        // Priradte hodnoty parametrom a nastavte typy
        mysqli_stmt_bind_param($stmt, "sss", $username, $token, $expiration);
        
        // Spustite pripravený príkaz
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; // Vloženie bolo úspešné
        } else {
            mysqli_stmt_close($stmt);
            return false; // Vloženie zlyhalo
        }
    } else {
        return false; // Chyba pri príprave príkazu
    }
}

// Funkcia pre vymazanie "remember tokenu" z databázy
function deleteRememberTokenFromDatabase($username, $db) {
    // Vytvorte pripravený príkaz pre vymazanie
    $sql = "DELETE FROM remember_tokens WHERE username = ?";
    
    // Pripravte príkaz
    if ($stmt = mysqli_prepare($db, $sql)) {
        // Priradte hodnoty parametrom a nastavte typy
        mysqli_stmt_bind_param($stmt, "s", $username);
        
        // Spustite pripravený príkaz
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; // Vymazanie bolo úspešné
        } else {
            mysqli_stmt_close($stmt);
            return false; // Vymazanie zlyhalo
        }
    } else {
        return false; // Chyba pri príprave príkazu
    }
}



$db->close();




////overenia/////
// Funkcia na overenie, či je používateľ prihlásený
function isUserLoggedIn() {
    return isset($_SESSION['user_role']);
}

// Funkcia na overenie, či je používateľ s rolou "banned"
function isUserBanned() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'banned';
}

// Funkcia na overenie, či je používateľ s rolou "admin"
function isUserAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

// Funkcia na overenie, či je používateľ s rolou "user"
function isUserRegular() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user';
}

// Funkcia na overenie, či je používateľ s rolou "majtel"
function isUserMajtel() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'majtel';
     }


/*


// Ak nie je používateľ prihlásený, presmerujte ho na prihlasovaciu stránku
if (!isUserLoggedIn()) {
    header('Location: prihlasenie.php');
    exit;
}

// Ak je používateľ prihlásený, ale jeho účet je "banned", presmerujte ho na stránku pre zablokovaných užívateľov
if (isUserBanned()) {
    header('Location: banned.php');
    exit;
}

// Ak je používateľ prihlásený a je admin, umožníme mu prístup na admin stránku
if (isUserAdmin()) {
    // Tu môžete vložiť obsah admin stránky
    // ...
    exit;
}

// Ak je používateľ prihlásený a je majtel, umožníme mu prístup na majtel stránku
if (isUserMajtel()) {
    // Tu môžete vložiť obsah stránky pre majtelov
    // ...
    exit;
}

// Ak je používateľ prihlásený a je bežný používateľ (user), umožníme mu prístup na stránku pre bežných užívateľov
if (isUserRegular()) {
    // Tu môžete vložiť obsah stránky pre bežných užívateľov
    // ...
    exit;
}


*/ 



?>
<script src="https://kit.fontawesome.com/0e05c28199.js" crossorigin="anonymous"></script>
