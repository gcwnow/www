<?php
$page = "updates";
include "includes/header.php";
?>

<div id="content">

<h1>Firmware Updates</h1>

<p>The update process depends on which firmware version your Zero is currently running. To check the version, go to the "Settings" tab and start "System Info". Look at the dates on the <code>Compiled on</code> lines.</p>

<dl>
<dt>Older than October 2013:</dt>
<dd>Update to the October 2013 firmware first, then read on below.
<dt>October 2013: (2013-10-04)</dt>
<dd>Install the <a href="files/gcw0-anti-corruption-update-2014-05-05.opk">special anti-corruption mini-update</a> to fix a data corruption issue that can prevent the full update from succeeding. After that, install the 2014-05-05 update and finally the 2014-08-20 update.</dd>
<dt>May 2014: (2014-05-05)</dt>
<dd>You can install the 2014-08-20 update right away.
</dl>

<p>You can find installation instructions <a href="#instructions">below the change logs</a>.</p>

<h2>OpenDingux Release 2014-08-20</h2>

<p>Download: <a href="files/gcw0-update-2014-08-20.opk">OpenDingux Update for GCW Zero</a></p>

<h3>Image Scaling:</h3>
<p>The hardware image processor (IPU) is now used to rescale video to fit the Zero's 320x240 screen. This is already useful for some applications and is an essential step towards HDMI and analog TV-out.</p>
<p>Applications can be modified to request resolutions smaller than 320x240, which will then be scaled up in hardware. This can allow for example some emulators to run a bit faster. By default, scaling will preserve the aspect ratio, but if you prefer to have no black borders even if that means distorting the image, you can switch modes using Power+A.</p>
<p>Applications can also set the key <code>X-OD-NeedsDownscaling=true</code> in their OPK metadata to request the use of resolutions higher than 320x240 which are then downscaled to 320x240. This can help in porting PC applications that need for example 640x480 output resolution. For applications that can render in either low (320x240 or below) or high resolution, we suggest to not set this key and render in low resolution, since outputting fewer pixels is better for performance and battery life.</p>

<h3>G-sensor:</h3>
<p>A driver was added that makes the g-sensor in the Zero available as a joystick. Applications that want to use this should set <code>X-OD-NeedsGSensor=true</code> in their OPK metadata.</p>

<h3>Rumble:</h3>
<p>A driver was added for the rumble motor inside the Zero. It can be used via the <a href="https://wiki.libsdl.org/CategoryForceFeedback">SDL2 haptic API</a>.</p>

<h3>GMenu2X Improvements:</h3>
<p>The file selector is now a lot faster when entering directories with lots of files. Also the button repeat rate is now configurable, so you can increase this if you think scrolling is too slow.</p>
<p>Preview images (such as screenshots or cover art for game ROMs) are shown semi-transparently full screen behind the file list. Preview images should be placed in a directory named <code>previews</code> below the directory containing the data files, where the preview image has the same file name as the corresponding data file, but with the file extension <code>.png</code>. For example for <code>my-favorite-game.rom</code> the preview image would be <code>previews/my-favorite-game.png</code>.</p>
<p>The displaying of manuals was made faster, bugs were fixed and support for non-Latin scripts was improved. Unicode support was enhanced and long line wrapping is supported in more places now. Messages appearing on selecting the Power Off/Reboot menu entries make more sense now. There were lots of smaller tweaks, bug fixes and optimizations as well.</p>
<p>Two new translations were added:</p>
<ul>
<li>Norwegian by Lithium Flower</li>
<li>Polish by Artur "zear" Rojek</li>
</ul>

<h3>Date and Time Changes:</h3>
<p>We switched to a different hardware clock (RTC) driver. A side effect of this is that the first time you run the new firmware, the date will be reset to 1970 (the beginning of time in the UNIX world). The easiest way to correct the time is to connect to a WiFi access point, then the right time will be fetched over the network (via NTP). Alternatively, you can manually set the time using the clock application.</p>
<p>When the system time is updated via the network (NTP), it is now properly saved in the hardware clock (RTC) on shutdown; previously a bug prevented this.</p>
<p>A time zone database was added. There is no GUI for it yet, but from the command line you can create a symlink from <code>/etc/local/timezone</code> to the file under <code>/usr/share/zoneinfo/uclibc/</code> representing your local time zone.</p>

<h3>Changes for Developers:</h3>
<ul>
<li>The popular Love2D runtime is now part of the rootfs.</li>
<li>Added libraries: GLM (OpenGL Mathematics), SDL2 (no longer experimental), SDL2_image, SDL2_ttf, SDL2_mixer, SDL2_net.</li>
<li>Removed packages: links, newt, slang.</li>
</ul>

<h3>Other changes:</h3>
<ul>
<li>The button mapping in DinguxCommander was fixed.</li>
<li>When a Zero is used as a WiFi access point (AP), broadcast packets are now routed over WiFi. This allows a LAN-enabled game instances on two devices (for example, two Zeroes or a Zero and laptop) to find the each other.</li>
<li>Enabled support for huge files and EFI partition tables; this improves compatibility with external SD cards with atypical formatting.</li>
<li>The <code>7zr</code> tool was added, which can extract <code>.7z</code> archives. Together with the <code>tar</code>, <code>unzip</code> and <code>unrar</code> tools which have been available for a while, OpenDingux should be able to unpack all common archive formats.</li>
</ul>

<h2>OpenDingux Release 2014-05-05</h2>

<p>Download: <a href="files/gcw0-update-2014-05-05-take2.opk">OpenDingux Update for GCW Zero</a></p>

<p>If you encounter "<code>Flashed image is corrupted!</code>" error messages when installing the 2014-05-05 update, there is <a href="files/gcw0-anti-corruption-update-2014-05-05.opk">a special anti-corruption mini-update</a> to fix that issue. Install it and then retry the 2014-05-05 update. Note that this mini-update is intended only for October 2013 firmwares; you can find the firmware version in the System Info application under the Settings tab.</p>

<p>Root file-system changes:</p>
<ul>
<li>Triple buffering in SDL</li>
<li>Input through joydev instead of evdev for joysticks</li>
<li>Access point mode (ad-hoc WiFi between two Zeros)</li>
<li>Integrated WiFi manager (GCW Connect)</li>
<li>Integrated image viewer (o2xiv)</li>
<li>WiFi notifier (blinks the green LED slowly)</li>
<li>Low-power warning (blinks the green LED fast)</li>
<li>Root file-system based on Buildroot 2014.02</li>
<li>Root file-system now located on system partition</li>
<li>On-demand loading of the network daemons</li>
<li>Added command-line tool to launch OPKs, "opkrun"</li>
<li>Added WiFi modules for recent units</li>
<li>Added GNU Screen</li>
</ul>

<p>Kernel changes:</p>
<ul>
<li>Kernel based on Linux 3.12</li>
<li>Watchdog driver (automatic reboot on kernel crash/panic)</li>
<li>Optional joystick interface for built-in controls; an application can request the joystick interface using <a href="http://wiki.gcw-zero.com/OPK#OpenDingux-specific_metadata">the new X-OD-NeedsJoystick key</a></li>
<li>Supports loadable modules</li>
<li>rfkill (Internal USB bus powered on-demand)</li>
<li>Boot splash (press A for verbose boot)</li>
</ul>

<p>GMenu2X:</p>
<ul>
<li>UI improvements</li>
<li>Custom fonts supported</li>
<li>New themes</li>
<li>Full navigation with joystick</li>
<li>Launches OPKs with "opkrun"</li>
</ul>

<p>Power switch daemon:</p>
<ul>
<li>Fix the Power + X bug (crazy input events after the combo is used)</li>
<li>Sends SDLK_HOME if the switch is quickly flicked</li>
</ul>

<p>New important libraries:</p>
<ul>
<li>Allegro 4</li>
<li>OpenAL</li>
<li>Java (JamVM + GNU Classpath)</li>
<li>JavaScript: NodeJS</li>
<li>Lua: lua-jit</li>
<li>SDL2 (experimental)</li>
</ul>

<h2>OpenDingux Release 2014-04-27</h2>

<p>This update was retracted because the files it installed could be corrupted while copying and one of the checksum verifications that protects against activating corrupted installs didn't work either.</p>

<h2>OpenDingux Release 2013-10-04</h2>
<p>Download: <a href="files/gcw0-update-2013-10-04.opk">OpenDingux Update for GCW Zero</a></p>
<p>Changes:</p>
<ul>
<li>Included improvements in OpenGL ES from the Etnaviv project; read <a href="files/etnaviv-2013-10-04.html">details here</a></li>
<li>Set GPU clock to 500 MHz (was 432 MHz)</li>
<li>Set VPU memory bus clock to 166 MHz (was 333 MHz, but it didn't actually work at this speed); the VPU itself runs at 500 MHz</li>
<li>Print a reminder that the login name is "root" in the network configuration utility</li>
</ul>

<h2>OpenDingux Release 2013-09-13</h2>
<p>Download: <a href="files/gcw0-update-2013-09-13.opk">OpenDingux Update for GCW Zero</a></p>
<p>Changes:</p>
<ul>
<li>Added OpenGL ES 1 and 2 support; this is based on Etnaviv and Mesa, so fully open source; read <a href="files/etnaviv-2013-09-13.html">details here</a></li>
<li>Added network configuration utility under the "settings" tab in gmenu2x; you can choose between setting a random password (recommended) or passwordless login; login name is "root"</li>
<li>Fixed problem where the analog joystick (nub) sometimes wouldn't work</li>
<li>Added file type detection for DOS <code>.bat</code> and <code>.com</code> files</li>
<li>Show black screen when switching video mode, instead of leftover graphics data</li>
<li>Screenshots (power + Y) work now for all applications (16 bpp was broken before)</li>
<li>Mouse emulation (power + B) works again</li>
<li>GMenu2x can now be controlled by joystick</li>
<li>Several graphical cleanups in gmenu2x, also added an animation on tab switching</li>
<li>GMenu2x now shows large SD card capacities in gigabytes instead of megabytes</li>
<li>Reduced key repeat rate in gmenu2x</li>
<li>Fixes in the gmenu2x file selector</li>
</ul>

<h2>OpenDingux Release 2013-07-22</h2>
<p>Download: <a href="files/gcw0-update-2013-07-22.opk">OpenDingux Update for GCW Zero</a></p>
<p>Changes:</p>
<ul>
<li>Fixed problem where a headphone wouldn't activate if plugged in when an application was already running</li>
<li>Completely turn off sound at minimum volume setting</li>
<li>Reduced pops when starting and stopping audio</li>
<li>Umproved file type detection, in particular for data files used by emulators</li>
<li>Fixed problem where powering off the device by holding the power slider for 3 seconds didn't work in some situations</li>
<li>GMenu2x will pick up new OPK files (uploaded through FTP, for example) without restarting</li>
<li>The file selector in gmenu2x will accept all files by default</li>
<li>Added clock to bottom bar in gmenu2x</li>
</ul>

<h2>OpenDingux Release 2013-07-06</h2>
<p>Download: <a href="files/gcw0-update-2013-07-06.opk">OpenDingux Update for GCW Zero</a></p>
<p>Changes:</p>
<ul>
<li>Improved video performance (enabled framebuffer caching)</li>
<li>Made vsync more robust (eliminated glitches on page flipping)</li>
<li>Made the FTP server list hidden files (names starting with a dot)</li>
<li>Improved Unicode support in both gmenu2x and command line tools</li>
<li>Fixed bug that powered off the system if the power slider was raised, released, then raised again soon after</li>
<li>List IP addresses in System Info application</li>
<li>Added unrar command line tool</li>
<li>Added shared memory support (allows more applications to be ported)</li>
</ul>

<h2><a id="instructions">How it works</a></h2>

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
<p>
After the update is complete, you can remove the updater application (OPK file).
</p>

</div>

<?php
include "includes/footer.php";
?>
