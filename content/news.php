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
    } elseif($product_id == 13) {
        include "articles/2015-05-11_guest_column_running_gcw_zero_applications_with_qemu.php";
    } elseif($product_id == 14) {
        include "articles/2015-09-21_guest_column_making_of_hase.php";
    } elseif($product_id == 15) {
        include "articles/2015-11-23_game_release_fruity.php";
    } elseif($product_id == 16) {
        include "articles/2015-11-11_guest_column_button_improvements.php";
    } elseif($product_id == 17) {
        include "articles/2016-11-20_guest_column_analog_caps_and_start_select_buttons.php";
    } else {
        echo 'Page does not exist.';
    }

} else {
    echo '<h1>News</h1>
2016-11-20 - <a href="news.php?id=17">GCW Parts Store Announces New Analog Caps and Start/Select Buttons</a><br>
2015-12-22 - <a href="news.php?id=16">The Wait Is Over! - Announcing The Official GCW 3D Printed Parts Store</a><br>
2015-11-23 - <a href="news.php?id=15">Game Release - Fruit\'Y</a><br>
2015-09-21 - <a href="news.php?id=14">Guest Column - Making of Hase</a><br>
2015-05-11 - <a href="news.php?id=13">Guest Column - Running GCW Zero applications with QEMU</a><br>
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
