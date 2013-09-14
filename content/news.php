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
    } else {
        echo 'Page does not exist.';
    }

} else {
    echo '<h1>News</h1>
2013-09-13 - <a href="news.php?id=1">Etnaviv Milestone</a>';
}

?>

</div>

<?php
include "includes/footer.php";
?>
