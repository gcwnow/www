<?php
$page = "updates";
include "includes/header.php";
?>

<div id="content">

<h1>Firmware Updates</h1>

<h2>2013-07-06</h2>
<p>Download: <a href="files/gcw0-update-2013-07-06.opk">OpenDingux Update for GCW Zero</a></p>
<p>Changes:</p>
<ul>
<li>made the FTP server list hidden files (names starting with a dot)</li>
<li>improved Unicode support in both gmenu2x and command line tools</li>
<li>fixed bug in pwswd that made it power off the system if the power slider was raised, released, then raised again soon after</li>
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
<p>
<img src="images/update/menu.png">
<img src="images/update/notice.png">
</p>
<p>
You can select an option with the d-pad and confirm your choice with the <span style="font-variant: small-caps;">start</span> button.
</p>
<p>
While the update is in progress, you'll see progress information being printed showing what the updater is doing. The update process takes a few minutes, please be patient while it does its work, even if you don't see anything happening for a while on the screen. The output should look like this:
</p>
<p>
<img src="images/update/progress.png">
<img src="images/update/done.png">
</p>
<p>
When you press <span style="font-variant: small-caps;">start</span> again, the system will restart. After the restart you can check that the new kernel and rootfs were installed in the System Info application:
</p>
<p>
<img src="images/update/menu-systeminfo.png">
<img src="images/update/systeminfo.png">
</p>
<p>
The compile date for the kernel and rootfs should be equal to or very close to the date of the updater application.
</p>

</div>

<?php
include "includes/footer.php";
?>
