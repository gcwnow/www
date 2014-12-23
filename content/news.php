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
    } elseif($product_id == 5) {
        include "articles/2014-07-04_game_release_xump.php";
    } elseif($product_id == 6) {
        include "articles/2014-08-05_featured_game_tile_world.php";
    } elseif($product_id == 7) {
        include "articles/2014-08-17_guest_column_the_last_mission_remake.php";
    } elseif($product_id == 8) {
        include "articles/2014-11-11_game_release_wetspot2.php";
    } elseif($product_id == 9) {
        include "articles/2014-11-11_guest_column_rrootage.php";
    } elseif($product_id == 10) {
        include "articles/2014-11-18_game_release_enigma.php";
    } elseif($product_id == 11) {
        include "articles/2014-12-24_game_release_neverball_neverputt.php";
    } elseif($product_id == 12) {
        include "articles/2014-12-24_game_release_gianas_return.php";
    } else {
        echo 'Page does not exist.';
    }
/*
    } elseif($product_id == 11) {
        include "articles/2014-11-25_game_release_kens_labyrinth.php";
2014-11-25 - <a href="news.php?id=11">Game Release - Ken\'s Labyrinth</a><br>
*/
} else {
    echo '<h1>News</h1>
2014-12-24 - <a href="news.php?id=12">Game Release - Giana\'s Return</a><br>
2014-12-24 - <a href="news.php?id=11">Game Release - Neverball & Neverputt</a><br>
2014-11-18 - <a href="news.php?id=10">Game Release - Enigma</a><br>
2014-11-11 - <a href="news.php?id=9">Guest Column - rRootage</a><br>
2014-11-11 - <a href="news.php?id=8">Game Release - Wetspot 2</a><br>
2014-08-17 - <a href="news.php?id=7">Guest Column - Making of \'The Last Mission\' remake</a><br>
2014-08-05 - <a href="news.php?id=6">Featured Game - Tile World</a><br>
2014-07-04 - <a href="news.php?id=5">Game Release - Xump</a><br>
2014-06-22 - <a href="news.php?id=4">Game Release - The Sqrxz Series</a><br>
2014-03-24 - <a href="news.php?id=3">Guest Column - The making of Hocoslamfy</a><br>
2013-10-13 - <a href="news.php?id=2">Game Release - Griffon Legend</a><br>
2013-09-13 - <a href="news.php?id=1">Etnaviv Milestone</a><br>
2013-08-30 - <a href="articles/2013-08-30_pax_2013.php">PAX 2013</a>';

}

?>

</div>

<?php
include "includes/footer.php";
?>
