<?php 


$db = mysqli_connect("localhost", "root", "", "crud");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



$sql = "SELECT * FROM crud_table ";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr id="search">
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="<?php echo $row['id']; ?>"  >
                    <label for="checkbox"></label>
                </span>
            </td>
            <td data-filter="search"><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
                <a href="#editEmployeeModal" class="edit" data-toggle="modal" data-employee-id="<?php echo $row['id']; ?>">
                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                </a>
                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-employee-id="<?php echo $row['id']; ?>">
                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                </a>
            </td>
        </tr>
        <?php
    }
} else {
    ?>
      <tr>
                <td colspan="6">No employees found</td>
            </tr> 
    <?php
}

$db->close();
?>

   <tr id="noDataFound" style="display: none;">
    <td colspan="6" style="text-align: center;">Data not found</td>
</tr>
<script>

        $(document).ready(function() {
            var selectedCheckboxes = [];

            // Priraďte event listener na checkbox s ID "selectAll"
            $('#selectAll').change(function() {
                var checkboxes = $('.custom-checkbox input[type="checkbox"]');
                checkboxes.prop('checked', this.checked);

                if (this.checked) {
                    selectedCheckboxes = checkboxes.filter(function() {
                        return this.id !== 'selectAll';
                    }).map(function() {
                        return this.id;
                    }).get();
                } else {
                    selectedCheckboxes = [];
                }

                updateSelectedValuesText();
            });

            // Priraďte event listener na checkboxy vo vnorených elementoch span s classom "custom-checkbox"
            $('.custom-checkbox input[type="checkbox"]').change(function() {
                var checkboxes = $('.custom-checkbox input[type="checkbox"]');
                if (this.id === 'selectAll') {
                    var selectedCount = checkboxes.filter(':checked').not(this).length;
                    $('#selectAll').prop('checked', selectedCount === checkboxes.length - 1);
                } else {
                    selectedCheckboxes = checkboxes.filter(':checked').map(function() {
                        return this.id;
                    }).get();

                    // Kontrola, či by malo byť "selectAll" zaškrtnuté
                    $('#selectAll').prop('checked', selectedCheckboxes.length === checkboxes.length);
                }

                updateSelectedValuesText();
            });


            // Funkcia na aktualizáciu textu s vybranými hodnotami
            function updateSelectedValuesText() {
                $('#selectedValuesText').text('(' + selectedCheckboxes.join(', ') + ')');
            }

        
        });

</script>