<?php

include 'db.ini.php';

// Získanie kategórie zo zvolenej možnosti v AJAX dopyte
$currentCategory = isset($_GET['category']) ? $_GET['category'] : 'All';

// Nastavenie parametrov paginácie

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$resultsPerPage = 40;


// Získanie výsledkov pre aktuálnu stránku a kategóriu
$query = "SELECT * FROM hry";
if ($currentCategory !== 'All') {
    $safeCategory = mysqli_real_escape_string($db, $currentCategory); // Ochrana pred SQL injekciou
    $query .= " WHERE category = '$safeCategory'";
}
$query .= " ORDER BY id LIMIT 0, $currentPage";
$result = mysqli_query($db, $query);





?>

<div class="row" style="place-content: center;">
<!-- Výpis dát -->
<?php if ($result !== null && mysqli_num_rows($result) > 0) : ?>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

        <div class="card text-center" style="width: 14rem; margin: 5px;">
            <a href="g_view.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold cw "><?php echo $row['title']; ?></h5>
                    <p class="card-text cw "><?php echo $row['category']; ?></p>
                    <hr>
                    <img loading="lazy" src="components/img/games_img/<?php echo $row['img']; ?>">
                    <hr>
                </div>
            </a>
        </div>
    <?php endwhile; ?>
<?php else : ?>

    <div class="card text-center" style="width: 930px; margin: 5px; border: none; height: 400px;">
        <div class="card-body">
            <h5 class="card-title font-weight-bold cw ">Not Found</h5>
        </div>
    </div>

    <?php endif;  ?>
</div>
<br>
<?php echo "zobrazeních . $currentPage. "; ?>



 