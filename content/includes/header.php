<?php
require_once "includes/connect.php";
require_once "includes/functions.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <title>GCW Zero - An Open Source Gaming Console Built by Gamers for Gamers...</title>
  <META HTTP-EQUIV="content-type" content="text/html; charset=ISO-8859-1">
  <link href="css/base.css" rel="stylesheet" title="base style" type="text/css">
  <link href="images/fav2.png" rel="shortcut icon" type="image/png">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="js/slideshow.js"></script>

<?php

if($page == "home") {
    echo '<script type="text/javascript">
onload = function() {
    var interval = 4000;
    var dir = "images/slideshow/";
    var img = ["01.png", "02.png", "12.png", "08b.png", "04.png", "05.png", "03b.png", "09b.png", "06.png", "05b.png", "07.png", "08.png", "09.png", "11.png", "10.png"];
    img = appendValue(dir, img);
    img.current = 0;
    autoSwitch(img, interval);
}
</script>
';
} elseif($page == "specifications") {
    echo '<script type="text/javascript">
onload = function() {
    var interval = 3000;
    var dir = "images/specifications/";
    var img = ["01.png", "02.png", "03.png", "04.png", "05.png", "06.png", "07.png", "08.png", "09.png", "10.png", "11.png", "12.png", "13.png", "14.png", "15.png", "16.png"];
    img = appendValue(dir, img);
    img.current = 0;
    autoSwitch(img, interval);
}
</script>
';
}

?>

 </head>
 <body>

<div id="header">
<div id="header_box">
GCW Zero
<ul id="navigation">
<li><a href='/'><span class="gcwlogo1">GCW</span><span class="gcwlogo2">ZERO</span></a></li>
<!--<li><a href='news'>News</a></li>-->

<li><a href='specifications'>Specifications</a></li>
<li><a href='media'>Media</a></li>
<li><a href='store'>Where To Buy</a></li>
<li><a href='develop'>Development</a></li>
</ul>

</div>
</div>

<div id="container">
