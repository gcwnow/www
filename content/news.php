<?php
$page = "news";
include "includes/header.php";
?>

<div id="content">

<?php

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    if($product_id == 1) {
        include "articles/2013-09-13_milestone_etnaviv.php";
    } elseif($product_id == 2) {
        include "articles/2013-10-13_game_release_griffon_legend.php";
    } else {
        echo 'Page does not exist.';
    }

} else {
    echo '<h1>News</h1>
2013-10-13 - <a href="news.php?id=2">Game Release - Griffon Legend</a><br>
2013-09-13 - <a href="news.php?id=1">Etnaviv Milestone</a>';

}

?>

</div>

<?php
include "includes/footer.php";
?>
