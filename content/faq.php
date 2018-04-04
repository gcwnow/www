<?php
$page = "faq";
include "includes/header.php";
?>

<div id="content">

<h1>Frequently Asked Questions</h1>

<p>
<ul id="faq">
<li><div class="faq_question">Are any of the games shown in the Kickstarter video commercial or closed source?</div><div class="faq_answer">
Yes, Sqrxz3 is a closed-source freeware title and Unnamed Monkey Game (UMG) is a commercial closed-source game.
Other games featured in the video might require commercial data files (ie. Duke Nukem 3D), but use an open-source engine.</div></li>
<li><div class="faq_question">What is the battery life on the console?</div><div class="faq_answer">
There are about 30 consoles with developers and early adopters. They report an average battery life of 7 to 10 hours, depending on the software running on the console.</div></li>
<li><div class="faq_question">Will people who pledged for the Kickstarter project have the choice between colours (black and white) before shipping?</div><div class="faq_answer">Yes, a survey will be sent after the KickStarter is over and is successful. The survey will verify your shipping address and colour preference before the console is shipped.</div></li>
<li><div class="faq_question">Why did you choose mini-USB over micro-USB?</div><div class="faq_answer">Mini-USB withstands the strain caused by attaching peripherals much better than micro-USB.<br>

The GCW Zero was designed to support extra peripherals such as game
controllers or keyboad and mouse combinations in conjunction with HDMI
and analog video output.<br>

<a href="http://www.wstaw.org/m/2013/01/13/gcw.jpg">Here</a> is an example with a USB Bluetooth dongle.

</div></li>
<li><div class="faq_question">Why did you choose internal microSD over NAND flash memory in the GCW Zero?</div><div class="faq_answer">The microSD card can be replaced if it breaks and can easily be upgraded to a faster or higher capacity microSD card.<br>

The reason for using an internal microSD card was to make upgrading
or replacing the internal storage easy. This effectively prolongs
the console's lifespan. If a NAND was used instead, replacement would
be costly.</div></li>
<li><div class="faq_question">Why did you choose a 3.5" LCD over 5" LCD and why a resolution of 320x240?</div><div class="faq_answer">A larger screen would result in shorter battery life, blurry rescaled graphics, lower emulation performance and a higher manufacturing cost.<br>

Since most supported retro games run at a 320x240 resolution at most,
there is no need for a larger screen. A larger screen would require
the CPU to waste processing power rescaling the image, resulting in
worse performance and a shorter battery life.</div></li>
<li><div class="faq_question">How many GCW Zeros can connect over the wifi?</div><div class="faq_answer">There is no real limit to the number of units that can be connected. However, connecting too many units when hosting a multiplayer game results in lag and disconnects due to the hardware bandwidth limitation.</div></li>
<li><div class="faq_question">How easy is it to change the controls for games?</div><div class="faq_answer">Depending on the game or application, controls can either be changed in settings files or in the game or application itself.</div></li>
<li><div class="faq_question">How much will the customs or handling fees be when it arrives in my country?</div><div class="faq_answer">When the items enter the destination country, the recipient is responsible for paying customs and handling fees. Items will leave the US through the US Postal Service to avoid costly brokerage fees associated with other carriers.</div></li>
<li><div class="faq_question">Can the GCW's battery be charged via USB? Will there be a power adapter supplied? If so, will it also work in Europe?</div><div class="faq_answer">The unit can be charged by usb through a PC or wall adapter, but much more slowly than a power adapter. A power adapter compatible with your region will be included with the console.</div></li>
<li><div class="faq_question">Does the USB port have USB host capabilities or drivers?</div><div class="faq_answer">USB OTG support is being worked on. Software support will be added in a futre OS update.</div></li>
<li><div class="faq_question">Could we use a Bluetooth USB dongle with the Zero for pairing with a game controller? </div><div class="faq_answer">Yes, this will be possible when BT support is added to the OS in a future update.</div></li>
</ul>
</p>

</div>

<?php
include "includes/footer.php";
?>
