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
    } elseif($product_id == 3) {
        include "articles/2014-03-24_guest_column_hocoslamfy.php";
    } elseif($product_id == 4) {
        include "articles/2014-06-22_game_release_the_sqrxz_series.php";
    } else {
        echo 'Page does not exist.';
    }

} else {
    echo '<h1>News</h1>
2014-06-22 - <a href="news.php?id=4">Game Release - The Sqrxz Series</a><br>
2014-03-24 - <a href="news.php?id=3">Guest column - The making of Hocoslamfy</a><br>
2013-10-13 - <a href="news.php?id=2">Game Release - Griffon Legend</a><br>
2013-09-13 - <a href="news.php?id=1">Etnaviv Milestone</a><br>
2013-08-30 - <a href="articles/2013-08-30_pax_2013.php">PAX 2013</a>';

}

?>

</div>

<?php
include "includes/footer.php";
?>
