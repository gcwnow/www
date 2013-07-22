<?php
$page = "updates";
include "includes/header.php";
?>

<div id="content">

<h1>Firmware Updates</h1>

<p>You only need to download the latest updater: it includes the full firmware so it will bring your Zero up-to-date regardless of the version you're updating from.</p>

<h2>2013-07-22</h2>
<p>Download: <a href="files/gcw0-update-2013-07-22.opk">OpenDingux Update for GCW Zero</a></p>
<p>Changes:</p>
<ul>
<li>fixed problem where a headphone wouldn't activate if plugged in when an application was already running</li>
<li>completely turn off sound at minimum volume setting</li>
<li>reduced pops when starting and stopping audio</li>
<li>improved file type detection, in particular for data files used by emulators</li>
<li>fixed problem where powering off the device by holding the power slider for 3 seconds didn't work in some situations</li>
<li>gmenu2x will pick up new OPK files (uploaded through FTP, for example) without restarting</li>
<li>the file selector in gmenu2x will accept all files by default</li>
<li>added clock to bottom bar in gmenu2x</li>
</ul>

<h2>2013-07-06</h2>
<p>Download: <a href="files/gcw0-update-2013-07-06.opk">OpenDingux Update for GCW Zero</a></p>
<p>Changes:</p>
<ul>
<li>improved video performance (enabled framebuffer caching)</li>
<li>made vsync more robust (eliminated glitches on page flipping)</li>
<li>made the FTP server list hidden files (names starting with a dot)</li>
<li>improved Unicode support in both gmenu2x and command line tools</li>
<li>fixed bug that powered off the system if the power slider was raised, released, then raised again soon after</li>
<li>list IP addresses in System Info application</li>
<li>added unrar command line tool</li>
<li>added shared memory support (allows more applications to be ported)</li>
</ul>

<h2>How it works</h2>

<p>
First make sure you have a backup of all valuable user data you have on your GCW Zero, such as save games.
</p>

<p>
Download the most recent updater application above. Transfer the application (OPK file) to the <code>apps/</code> directory on your GCW Zero. Then start the application from the menu:
</p>
<ul class="gallery">
<li><img src="images/update/menu.png"></li>
<li><img src="images/update/notice.png"></li>
</ul>
<p>
You can select an option with the d-pad and confirm your choice with the <span style="font-variant: small-caps;">start</span> button.
</p>
<p>
While the update is in progress, you'll see progress information being printed showing what the updater is doing. The update process takes a few minutes, please be patient while it does its work, even if you don't see anything happening for a while on the screen. The output should look like this:
</p>
<ul class="gallery">
<li><img src="images/update/progress.png"></li>
<li><img src="images/update/done.png"></li>
</ul>
<p>
When you press <span style="font-variant: small-caps;">start</span> again, the system will restart. After the restart you can check that the new kernel and rootfs were installed in the System Info application:
</p>
<ul class="gallery">
<li><img src="images/update/menu-systeminfo.png"></li>
<li><img src="images/update/systeminfo.png"></li>
</ul>
<p>
The compile date for the kernel and rootfs should be equal to or very close to the date of the updater application.
</p>

</div>

<?php
include "includes/footer.php";
?>
