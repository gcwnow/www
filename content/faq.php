<?php
$page = "press";
include "includes/header.php";
?>
<div id="content">

<h1>Frequently Asked Questions</h1>

<p>
<ul id="faq">
<li><div class="faq_question">Are any of the games shown in the Kickstarter video commercial or closed source?</div><div class="faq_answer">Yes. Two games presented in the video are not open-source. Sqrxz3 is a closed-source freeware title, while Unnamed Monkey Game (UMG) is a commercial closed-source game. Other games featured in the video might require commercial data files (ie. Duke Nukem 3D), but the game engine to them is open-source</div></li>
<li><div class="faq_question">What is the battery life on the console?</div><div class="faq_answer">We have about 30 consoles out with developers and early adopters. The average battery life they report is 7 to 10 hours according to what you are running on the console. </div></li>
<li><div class="faq_question">Will people who pledged for the Kickstarter project have the choice between colours (black and white) before shipping?</div><div class="faq_answer">Yes, we will send out a survey after the KickStarter is over and we are successful. It will verify your shipping address and color preference before we ship the console.</div></li>
<li><div class="faq_question">Why did you choose mini-USB over micro-USB?</div><div class="faq_answer">Mini-USB allows you to plug extra peripherals much better than
micro-USB. With micro-USB, we were afraid that the port would not
survive a heavy weight attached to it.<br>

GCW Zero was designed so you can attach extra peripherals such as game
controllers or keyboard/mouse combo of your choice and use them
together with HDMI/analog video out.<br>

<a href="http://www.wstaw.org/m/2013/01/13/gcw.jpg">Here</a> is an example with a USB Bluetooth dongle.

</div></li>
<li><div class="faq_question">Why did you choose internal microSD over NAND flash memory in the GCW Zero?</div><div class="faq_answer">If the microSD card breaks it can be always replaced. It also allows
for easy upgrade to a bigger storage capacity or faster microSD card.<br>

We wanted it easy for users to upgrade the internal storage and give
the console a longer life span. For example if the NAND failed you
would need to replace the console's NAND chips, which could be costly.
If the microSD card breaks it can be always replaced. It also allows
for easy upgrade to a bigger storage capacity or faster microSD card</div></li>
<li><div class="faq_question">Why did you choose a 3.5" LCD over 5" LCD and why a resolution of 320x240?</div><div class="faq_answer">A bigger screen on the GCW Zero = less battery life / more work on the
CPU / less fps in emulation / blurry, rescaled graphics and a higher
manufacturing cost...<br>

The reason behind choosing a 320x240 display isn't just monetary. Of
course, a larger display would have raised the final price of the
device, but it also has many other cons for a device aimed at retro
gaming. First of all, a higher resolution is not needed because most
retro games we support run at 320x240 at most. A larger screen would
require everything to be rescaled, so the CPU would have an extra load
of work and this would result in worse gaming performance and less
battery life.</div></li>
<li><div class="faq_question">How many GCW Zeros can connect over the wifi?</div><div class="faq_answer">There is no real theoretical limit (think of a couple of hundred units). The hardware however, has a bandwidth limitation which will result in lag and disconnects when too many units are connected to a GCW Zero hosting a multiplayer game.</div></li>
<li><div class="faq_question">How easy is it to change the controls for games?</div><div class="faq_answer">Controls are currently changed via settings files or via in game/application menus depending on the game/application.</div></li>
<li><div class="faq_question">How much will the customs or handling fees be when it arrives at my country?</div><div class="faq_answer">Any customs or handling fees are the responsibility of the backer/buyer when the items enter destination country.  Items will leave the US through the US Postal Service to avoid costly brokerage fees associated with other carriers.</div></li>
<li><div class="faq_question">Can the GCW's battery be charged via USB? Or will there be a power adapter supplied? If so: Will it also work in Europe?</div><div class="faq_answer">The unit can be charged via PC or with the help of USB wall adapter but it will take a considerable amount of time to charge the device. A power adapter specific for your country/region will be included with the console.</div></li>
<li><div class="faq_question">Does the USB port have USB host capabilities/driver?</div><div class="faq_answer">Currently we are working on implementing USB OTG: the hardware supports it and support for it will be added in a future OS update.</div></li>
<li><div class="faq_question">Could we use a Bluetooth USB dongle with the Zero for pairing with a game controller? </div><div class="faq_answer">Yes, this is possible when we add BT support to the OS in a future update.</div></li>
</ul>
</p>

</div>

<?php
include "includes/footer.php";
?>
