<?php
$page = "home";
include "includes/header.php";
?>

<div id="carousel_container">
<div id="carousel" class="black">
<img class="slideshow1" src="images/slideshow/02.png" style="position: absolute;">
<img class="slideshow2" src="images/slideshow/12.png" style="position: absolute;">
<div id="slideshow_overlay_container">
<a href="#" class="pause"><div></div><div></div></a>
<ul id="slideshow_overlay"></ul>
<a class="controls" href="#" onclick="previousImage()"><span><</span></a>
<a class="controls" href="#" onclick="nextImage()"><span>></span></a>
<a id="model" class="controls" href="#" title="Switch the colors of the model."><span>W</span></a>
</div>
</div>
</div>

<div id="banner">
<a href="about">
</a>
</div>

<div class="tile_left">
<div class="tile_box_left">
<div class="tile_box_text">
<a target="_blank" href="http://www.kickstarter.com/projects/gcw/gcw-zero-open-source-gaming-handheld">
<h1>Kickstarter Funded!</h1>
With $238,498 pledged of the initial goal of $130,000 the Kickstarter campaign has been a great success! Thank you for supporting us! >>
</a>
</div>
</div>
</div>

<div class="tile_right">
<div class="tile_box_right">
<div class="tile_box_text">
<a href="media#games">
<h1>Games</h1>
It is powerful enough to run classic PC games, emulate the game consoles we grew up with and run homebrew games seamlessly at high frame rates. >>
</a>
</div>
</div>
</div>

<?php
include "includes/footer.php";
?>
