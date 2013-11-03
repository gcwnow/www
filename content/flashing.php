<?php
$page = "flashing";
include "includes/header.php";
?>

<div id="content">

<h1>Firmware Flashing</h1>

<p>This page is mainly intended for resellers who flash the units before they go to customers, but it might be useful as well for end users who have a non-booting unit and want to attempt to restore it themselves.</p>
<p><b>NOTE: This is not how you should update your GCW Zero; the flashing procedure will wipe all data!</b> If you want to update your firmware, follow the instructions on <a href="updates">this page</a> instead.</p>

<h2>2013-10-04</h2>
<p>The following image files are needed to flash the GCW Zero:</p>
<ul>
<li><a href="files/flash/mbr.2013-10-04.bin">master boot record</a></li>
<li>boot loader <a href="files/flash/ubiboot-v11_ddr2_256mb.2013-10-04.bin">for prototype (256MB) units</a> or <a href="files/flash/ubiboot-v20_mddr_512mb.2013-10-04.bin">for production (512MB) units</a><br>(resellers should use the latter)</li>
<li><a href="files/flash/system.2013-10-04.bin">system partition</a></li>
<li><a href="files/flash/data.2013-11-03.bin">data partition</a></li>
</ul>

<h2>ingenic-boot</h2>
<p>The tool used for flashing is ingenic-boot. It runs on Linux only. You can find pre-built binaries here:</p>
<ul>
<li><a href="files/flash/ingenic-boot-bin.32bit.2013-06-08.tar.gz">ingenic-boot 32-bit (i686) binaries</a></li>
<li><a href="files/flash/ingenic-boot-bin.64bit.2013-06-07.tar.gz">ingenic-boot 64-bit (x86_64) binaries</a></li>
</ul>
<p>You can check whether you're running a 32-bit or 64-bit Linux using the <code>arch</code> command line tool. You may need to install the packages for <code>libusb</code> and <code>libconfuse</code>, if those are not already installed.</p>
<p>Alternatively, you can install ingenic-boot <a href="https://github.com/gcwnow/ingenic-boot">from source</a>.</p>


<h2>Flashing a Unit</h2>

<p>Make sure the Zero is off. While holding the SELECT key, power on the unit with the power slider. This puts the JZ4770 into USB boot mode.</p>

<p>Then run the following command to do the actual flashing:</p>
<pre>$ ./ingenic-boot --mbr=mbr.<i>date</i>.bin --boot=ubiboot-v20_mddr_512mb.<i>date</i>.bin --system=system.<i>date</i>.bin --data=data.<i>date</i>.bin</pre>

<p>If you are flashing a prototype instead of a production unit, use <code>--boot=ubiboot-v11_ddr2_256mb.<i>date</i>.bin</code> instead of the <code>--boot</code> option listed above and also add <code>--config=gcw0_v11_ddr2_256mb</code> to the options.</p>

<p>You only have to copy-paste the command once; the second time you can use the cursor-up to get the command from the command history.</p>

<p>Once you see letters on the unit's screen, the flashing is complete. On first boot, the unit will resize its data partition from the flashed image size to the full size of the SD card. This will take several minutes. The unit doesn't have to stay connected to the PC during this time. However, make sure it doesn't run out of battery charge while resizing!</p>

<p>Note that the menu will go to power saving mode after a minute of inactivity. The unit is not off unless the green LED is off.</p>

<h2>Troubleshooting</h2>

<p>If you want to test if ingenic-boot and USB boot mode are working, run this:</p>
<pre>$ ./ingenic-boot --probe
probe only
 CPU data: JZ4770V1</pre>

<p>Above is the correct output. If the device is not in USB boot mode, or not seen by the PC, you will get the following output:</p>
<pre>$ ./ingenic-boot --probe
probe only
Error - no XBurst device found</pre>

<p>Sometimes the PC doesn't see the unit. In this case, disconnect the unit from the PC, hold SELECT, press the reset button (front, next to USB socket) and then reconnect the unit to the PC. If problems persist, try again with a different USB cable.</p>

<p>If the unit boots into the factory test application, you didn't press SELECT properly or too late. You can power down the unit by holding the power slider in the upper position for a few seconds.</p>


<h2>Flashing Multiple Units from One PC</h2>

<p>If you have multiple units connected to the same PC, you must tell the tool which one you want to flash. This is easiest if you can connect devices to separate USB buses. Put multiple devices in USB boot mode and connect them to your PC, then run the following command:</p>
<pre>$ lsusb | grep 4770
Bus 001 Device 117: ID a108:4770
Bus 002 Device 007: ID a108:4770</pre>

<p>In this example, one device is connected to bus "001" and one is connected to bus "002". If you have devices on separate buses, you can select the one to flash like this:</p>
<pre>$ IBBUS=001 ./ingenic-boot --mbr=mbr.<i>date</i>.bin --boot=ubiboot-v20_mddr_512mb.<i>date</i>.bin --system=system.<i>date</i>.bin --data=data.<i>date</i>.bin</pre>

<p>Note that you have to use the exact string such as "001": if you try to use just "1" no devices will match.</p>

<p>If, no matter which USB ports you plug the devices into, you can only have devices on the same bus, you can select one using the device number instead. The device number is increased every time you plug a new device. For example, if you want to flash device 117, use this command:</p>
<pre>$ IBDEV=117 ./ingenic-boot --mbr=mbr.bin --boot=ubiboot-v20_mddr_512mb.bin --system=system.bin --data=data.bin</pre>


<h2>Further Information</h2>

<p>Full documentation can be found on <a href="https://github.com/gcwnow/ingenic-boot/wiki">the wiki</a> for our ingenic-boot fork.


</div>

<?php
include "includes/footer.php";
?>
