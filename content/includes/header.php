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
    interval = 4000;
    dir = "images/slideshow/";
    img = ["13.png", "12.png", "08b.png", "04.png", "05.png", "03b.png", "09b.png", "06.png", "05b.png", "07.png", "08.png", "09.png", "11.png", "10.png", "14.png"];
    img = prependValue(dir, img);
    img.current = 0;
    preload(img);
    autoSwitch(interval);
    slideshowOverlay();
    loadBaseEvents();
}
</script>
';
} elseif($page == "specifications") {
    echo '<script type="text/javascript">
onload = function() {
    interval = 4000;
    dir = "images/specifications/";
    img = ["01.png", "02.png", "03.png", "04.png", "05.png", "06.png", "07.png", "08.png", "09.png", "10.png", "11.png", "12.png", "13.png", "14.png", "15.png", "16.png"];
    img = prependValue(dir, img);
    img.current = 0;
    loadBaseEvents();
    preload(img);
    autoSwitch(interval);
}
</script>
';
} elseif($page == "news" && $_GET["id"] == 16) {
    echo '<script type="text/javascript">
onload = function() {  
    dir = "images/articles/16/";
    file_format = "png";
    interval = 4000;
    img = ["P1000380", "P1000381", "P1000382", "P1000383", "P1000385", "P1000386", "P1000388", "P1000389", "P1000390", "P1000376", "P1000377", "P1000378", "P1000379", "redcentered2", "redcentered", "P1000351", "P1000352", "P1000353", "P1000354", "P1000355", "P1000356", "P1000357", "P1000358", "P1000359", "P1000360", "P1000361", "P1000362", "P1000363", "P1000364", "P1000366", "P1000367", "P1000368", "P1000369", "P1000370", "P1000371", "P1000372", "P1000373", "P1000374", "P1000375"];
    img_description = ["Installed DPAD", "Installed ABXY Buttons Isometric View", "Installed DPAD Isometric View", "Installed DPAD Front View",  "Installed ABXY Buttons", "Installed ABXY Buttons Side Profile View", "Installed ABXY Buttons Front View", "Installed DPAD Bottom View", "Installed DPAD Top View", "Prototypes Collage View 1", "Prototypes Collage View 2", "Prototypes Collage View 3", "Prototypes Collage View 4", "Connected ABXY Buttons View 1", "Connected ABXY Buttons View 2", "New ABXY Button and DPAD", "DPAD Isometric View", "DPAD Front View", "DPAD Side View", "DPAD Back View", "DPAD Side Profile", "DPAD Isometric View", "DPAD Front Profile", "DPAD Side Front View", "ABXY Side Profile", "ABXY Side Profile Comparison", "ABXY Isometric Comparison", "ABXY Front Comparison", "ABXY Keying Tab Comparison", "DPAD Front Comparison", "DPAD Side Profile Comparison", "DPAD Back Profile Comparison", "DPAD Isometric Comparison", "Connected DPAD View 1", "Connected DPAD View 2", "Connected DPAD View 3", "Connected DPAD View 4", "Connected DPAD View 5", "Connected DPAD View 6"];

    img = prependValue(dir, img);
    img.file_format = file_format;
    img.current = 0;
    createGallery(img, img_description);
}
</script>
';
} elseif($page == "news" && $_GET["id"] == 17) {
    echo '<script type="text/javascript">
onload = function() {
    dir = "images/articles/17/";
    file_format = "jpg";
    interval = 7000;
    img = ["P1000832", "P1000831", "P1000810", "P1000814", "P1000815", "P1000817", "P1000833", "P1000804", "P1000805", "P1000818", "P1000800", "P1000806", "P1000807", "P1000819", "P1000801", "P1000802", "P1000803", "P1000820", "P1000808", "P1000811", "P1000809", "P1000812", "P1000821", "P1000827", "P1000822", "P1000826", "P1000828", "P1000830"]
    img_description = ["Front view of the installed 3D printed buttons, with the new Ripple Cap and Start/Select buttons shown in white.", "Side view of the Ripple Cap and Start/Select buttons.", "Isometric view of the new Ripple Cap and Start/Select buttons shown in white.", "An overview showing the Ripple, Scoop and Dish Cap next to the original Analog Cap in black intended for use with the analog stick.", "Side view of each of the Analog Caps.", "Bottom view of each of the Analog Caps.", "The new Ripple Cap and Start/Select buttons shown in white.", "Side view of the Ripple Cap shown in white.", "Side view of the Ripple Cap shown in white.", "A comparison between the original Analog Cap and the Ripple Cap.", "Front view of the new Scoop Cap and Start/Select buttons shown in white.", "Side view of the new Scoop Cap shown in white.", "Side view of the new Scoop Cap shown in white.", "A comparison between the original Analog Cap and the Scoop Cap.", "The new Dish Cap and Start/Select buttons shown in white.", "Side view of the Dish Cap shown in white.", "Side view of the Dish Cap shown in white.", "A comparison between the original Analog Cap and the Dish Cap.", "Side view of the new Start/Select buttons shown in white.", "Side view of the new Start/Select buttons shown in white.", "Side view of the new Start/Select buttons shown in white.", "Side view of the new Start/Select buttons shown in white.", "Top view showing a comparison between the original Start/Select buttons and its 3D printed counterpart which can act as both a Start and Select button.", "Top view showing a comparison between the original Start/Select buttons and its 3D printed counterpart which can act as both a Start and Select button.", "Side view showing a comparison between the original Start/Select buttons and its 3D printed counterpart which can act as both a Start and Select button.", "Side view showing a comparison between the original Start/Select buttons and its 3D printed counterpart which can act as both a Start and Select button.", "Side view showing a comparison between the original Start/Select buttons and its 3D printed counterpart which can act as both a Start and Select button.", "Bottom view showing a comparison between the original Start/Select buttons and its 3D printed counterpart which can act as both a Start and Select button."]
    img = prependValue(dir, img);
    img.file_format = file_format;
    img.current = 0;
    createGallery(img, img_description);
}
</script>
';
} else {
    echo '<script type="text/javascript">
onload = function() {
        loadBaseEvents();
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
<li><a href='specifications'>Specs</a></li>
<li><a href='news'>News</a></li>
<li><a href='media'>Media</a></li>
<li><a href='downloads'>Downloads</a></li>
<li><a href='store'>Buy</a></li>
<li>
<!--<a href='#'>Development &#x25BE;</a>
<ul>
<li><a href='develop'>Develop Develop</a></li>
<li><a href='develop'>Develop etc</a></li>
</ul>
</li>-->
<li><a href='develop'>Develop</a></li>
<li>
<a href='#'>Support &#x25BE;</a>
<ul>
<li><a href='faq'>FAQ</a></li>
<li><a href='updates'>Firmware Updates</a></li>
<li><a href='flashing'>Firmware Flashing</a></li>
<li><a href='http://wiki.gcw-zero.com/Quick_Start_Guide'>Quick Start Guide</a></li>
<li><a href='http://wiki.gcw-zero.com/'>Community Wiki</a></li>
<li><a href='forums'>Forums</a></li>
<li><a href='irc'>IRC Chatroom</a></li>
<!--<li><a href='support'>Sales Support</a></li>-->
</ul>
</li>
</ul>

</div>
</div>

<div id="container">
