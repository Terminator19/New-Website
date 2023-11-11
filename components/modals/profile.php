<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header center">
        <h5 class="modal-title" id="exampleModalCenterTitle">Profile</h5>
        <button type="button" data-dismiss="modal"  class="btn-close" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <?php
include 'system/db.ini.php';

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        // Provádíme dotaz na databázi, abychom získali informace o uživateli na základě jeho ID
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Výpis informací o uživateli
            echo "User name: " . $row['name'] . "<br />";
            echo "Email: " . $row['email'] . "<br />";
            echo "User type: " . $row['role'] . "<br />";
            echo "Password: hide<br />";
            echo "Date registration: " . $row['reg_date'] . "<br />";
        } else {
            echo "Uživatel s tímto ID neexistuje.";
        }
        $stmt->close();
    } else {
        echo "Uživatel není přihlášen.";
    }
    ?>
</div>
     


      <div class="modal-footer">
      </div>
    </div>
  </div>
    </div>