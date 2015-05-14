<h1>News :: Guest Column - Running GCW Zero applications with QEMU</h1>
<span class="article_data">Date: 2015-05-11, Author: Dmitry Smagin, Editors: Zear &amp; Surkow</span>

<blockquote>
GCW Zero developer Dmitry Smagin has released pre-compiled binaries of OpenDingux for <a href="http://qemu.org">QEMU</a> (short for Quick Emulator), a popular free and open-source multi-architecture emulator and hypervisor. In this article Dmitry explains how he managed to run OpenDingux, an operating system for the GCW Zero handheld, on top of the <a href="http://www.linux-mips.org/wiki/MIPS_Malta">MIPS Malta board</a> emulation in QEMU. It supports running native software for the GCW Zero on your PC, remote debugging via telnet, SSH and file transfers via FTP and SFTP. Lack of GPU emulation means software relying on GLES will not work.
</blockquote>

<h2>Preamble</h2>

<p>Strictly speaking this is not GCW Zero hardware emulation but rather emulation of the OpenDingux environment on top of different hardware that can run native applications for the GCW Zero.</p>

<ul class="gallery2" style="width: 676px;">
<li><img src="images/articles/qemu-gcw0-01.png"></li>
<li><img src="images/articles/qemu-gcw0-08.png"></li>
<li class="description"><p style="max-width: 338;">Running gmenu2x in QEMU.</p></li>
</ul>

<p>The closest analogy would be running the same executable on the same operating system (on identical CPU architecture) but on different sets of hardware. Modern x86-based laptops may have different combinations of video, sound and network hardware with various degree of acceleration, but the same game executable runs on all its combinations.</p>
<p>In the same manner Raspberry Pi's debian-based operating system Raspbian is <a href="https://www.raspberrypi.org/forums/viewtopic.php?f=29&t=37386">emulated</a> on top of the ARM Versatile board in QEMU.</p>

<h2>Features</h2>

<p>It supports running native software for the GCW Zero on your PC, remote debugging via telnet, SSH and file transfers via FTP and SFTP.</p>

<object width="650" height="400" class="center_container"
        data="https://www.youtube.com/v/YiVz8aWkEug"
        type="application/x-shockwave-flash">
  <param name="movie"
         value="https://www.youtube.com/v/YiVz8aWkEug"></param>
  <param name="allowScriptAccess" value="always"></param>
  <a class="image_center_a" href="https://www.youtube.com/watch?v=YiVz8aWkEug" title="Watch video on YouTube" style="background-image: url('http://img.youtube.com/vi/YiVz8aWkEug/0.jpg);"></a>
</object>

<h2>Bugs and missing features</h2>

<p>The biggest missing feature is the lack of GPU emulation (Vivante GC860), so there's no OpenGL ES, SDL2 or Love2D. Applications that rely on OpenGL ES or SDL2 will not run, because these libraries are omitted in rootfs used for this package. Luckily, the majority of applications still use software rendering.</p>
<p>Malta board uses cirrusfb video driver which does not support vertical sync, nor double or triple buffering. Applications that rely on these features will still run fine, though frame rates may differ from what you expect to have on real hardware. Note that QEMU performs double-buffering itself which means you would hardly notice any tearing or flickering.</p>
<p>Moreover, there's no IPU (hardware up/downscaling), but it's not really needed. If an application requests a resolution that is different from 320x240, the cirrusfb video driver sets it as requested with no resizing. However, QEMU itself has its own resizing mechanism, so you can stretch your window to whatever size you desire thus simulating IPU behavior.</p>
<p>The other missing hardware include the analog joystick, g-sensor and rumble motor.</p>
<p>As for the network, there's no Wi-Fi (wlan) and ethernet via USB (usb0) but you have eth0 instead. Debugging could be done via serial port output which is redirected to console on Linux and to PuTTY or similar programs on Windows.</p>
<p>Another missing feature that should be named is the lack of <a href="http://wiki.gcw-zero.com/MXU">MXU</a> instructions which is an extension specific to Ingenic JZ47xx SoCs. QEMU emulates a generic MIPS 24Kc cpu which is mips32r2 with hardware float. Luckily for us, very few programs (if any) use MXU.</p>
<p>As for the sound, AC97 audio driver strictly follows the rule to have sample buffer of power of 2 (256, 512, 1024 etc) and if SDL (or any other library) requests arbitrary size, it just returns error. This is somewhat different from GCW Zero, which hardware doesn't imply such restriction and SDL can use any sample buffer size. This concerns Minislug, for example, which tries to set up sound buffer of 1088 samples which works on real device and fails in QEMU.</p>
<p>However, for true cross-platform compatibility all SDL applications must use a power of 2 for sample buffer. Most applications follow the rule and still run fine.</p>
<p>Note that after boot the sound is muted. To enable it go to Settings -> Sound Mixer, unmute all channels and raise volume to the maximum.</p>

<h2>Running QEMU</h2>

<p>If you are on Windows, download QEMU from <a href="http://lassauge.free.fr/qemu/">here</a> and unpack to the desired location. If you are on Linux install QEMU from your distro repository. At the time of writing the last official version of QEMU is 2.2.0 but no harm is done if an earlier version is used, at least 1.3.1 is confirmed to work.</p>

<object width="650" height="400" class="center_container"
        data="https://www.youtube.com/v/GFS8WHJksSI"
        type="application/x-shockwave-flash">
  <param name="movie"
         value="https://www.youtube.com/v/GFS8WHJksSI"></param>
  <param name="allowScriptAccess" value="always"></param>
  <a class="image_center_a" href="https://www.youtube.com/watch?v=GFS8WHJksSI" title="Watch video on YouTube" style="background-image: url('http://img.youtube.com/vi/GFS8WHJksSI/0.jpg);"></a>
</object>

<p>Unpack the provided archive to the same directory and click <code class="inline_code">run-gcw0.bat</code> for Windows or <code class="inline_code">run-gcw0.sh</code> for Linux (don't forget to make it executable with <code class="inline_code">chmod +x run-gcw0.sh</code> before running). After short period of time you'll see gmenu2x running inside QEMU and you can begin testing some pre-installed games.</p>

<ul class="gallery2" style="width: 676px;">
<li><img src="images/articles/qemu-gcw0-02.png"><p style="max-width: 338;">System Info overview.</p></li>
<li><img src="images/articles/qemu-gcw0-03.png"><p style="max-width: 338;">Note that sound is disabled after boot and you have to raise the volume manually in Alsa mixer.</p></li>
<li><img src="images/articles/qemu-gcw0-05.png"><p style="max-width: 338;">FreeDoom running in QEMU.</p></li>
<li><img src="images/articles/qemu-gcw0-06.png"><p style="max-width: 338;">WetSpot 2 running in QEMU.</p></li>
</ul>

<h2>Key mapping</h2>

<p>QEMU emulates a normal PS/2 keyboard and the GCW Zero keys are mapped as follows:</p>

<div style="text-align: center;">
<div class="table" style="display: inline-block;">
<div class="table-row"><div class="row0">Arrow keys</div><div class="row0">D-PAD</div></div>
<div class="table-row"><div class="row1">Left Ctrl</div><div class="row1">A</div></div>
<div class="table-row"><div class="row0">Left Alt</div><div class="row0">B</div></div>
<div class="table-row"><div class="row1">SPACE</div><div class="row1">Y</div></div>
<div class="table-row"><div class="row0">Left Shift</div><div class="row0">X</div></div>
<div class="table-row"><div class="row1">Left Ctrl</div><div class="row1">A</div></div>
<div class="table-row"><div class="row0">TAB</div><div class="row0">Left Shoulder</div></div>
<div class="table-row"><div class="row1">Backspace</div><div class="row1">Right Shoulder</div></div>
<div class="table-row"><div class="row0">Escape</div><div class="row0">Select</div></div>
<div class="table-row"><div class="row1">Enter</div><div class="row1">Start</div></div>
</div>
</div>

<p>Please keep the key mappings in mind when developing, otherwise you'll happen to use some key that is unavailable on a real GCW Zero.</p>

<h2>Network and adding more .OPK packages via SFTP</h2>

<p>Note: if your host system is Windows, please refer to <a href="http://prizma.bmstu.ru/~exmortis/posts/2015-05-02-gcw0-qemu.html">this</a> article to properly set up PuTTY to catch serial output from QEMU. Without it you can pretty much do nothing.</p>
<p>If you are on Linux just run run-gcw0.sh from console and you'll get kernel booting log directly in your console which should end with a command prompt.</p>

<ul class="gallery2" style="width: 338px;">
<li><a href="images/articles/qemu-gcw0-07.png"><img style="width: 328px" src="images/articles/qemu-gcw0-07.png"></a>
<p style="max-width: 338px;">Command prompt in Linux console terminal.</p></li>
</ul>

<p>Now you can enter commands and do various kinds of things that Linux can do. QEMU's network for the guest system is set to work in so-called user mode when guest and host systems are seen as one network entity to the outside world and interaction between them is limited. However, you can use SSH/SFTP/wget from guest to access remote servers and even your host machine (note: the latter only works for Linux, please contact me if you know how to do it for Windows).</p>
<p>Execute <code class="inline_code">sftp your_host_user_name@10.0.2.2</code>, enter your password and you are inside your host! Now you can browse the filesystem and download OPK files with the <code class="inline_code">get filename</code> command.</p>

<ul class="gallery2" style="width: 338px;">
<li><img src="images/articles/qemu-gcw0-04.png">
<p style="max-width: 338;">How the network is seen by Network Settings</p></li>
</ul>

<p>Note that connecting from host to guest is not possible with current QEMU settings. It is possible to set up tun/tap interface and bridge but this is fairly complex and isn't part of this article.</p>

<h2>More user-friendly way to add .OPK packages via virtual FAT disk</h2>

<p>QEMU has an interesting feature to create virtual FAT disks using any host directory, but its contents should not exceed 512MB. All you have to do is create any directory, put any .OPKs there and edit either <code class="inline_code">run-gcw0.bat</code> or <code class="inline_code">run-gcw0.sh</code> and append the following option to the final line which calls QEMU with parameters:</p>
<p><code class="inline_code">-hdc fat:rw:your_dir_name</code></p>
<p>Then run QEMU, start DinguxCommander, browse to <code class="inline_code">/media/QEMU VVFAT</code> and copy all needed files to <code class="inline_code">/media/data/apps</code>.</p>
<p>The undoubtful advantage is that you don't have to use the command line console at all. Note that you have to be careful when writing anything to a virtual FAT partition. File system writes are asynchronous so files do not immediately appear in your host directory when the guest finishes writing. Just wait a little and files will appear.</p>

<h2>Downloads</h2>

<p>Pre-compiled OpenDingux package for QEMU can be downloaded <a href="files/gcw0-qemu.zip">here</a>. It contains kernel and filesystem images with running scripts for both Windows and Linux platforms.</p>
<p>Note that you have to download and Install QEMU separately. Windows binaries can be downloaded <a href="http://lassauge.free.fr/qemu/">here</a>.</p>

<h2>Questions & Answers</h2>

<ul id="faq">
<li><div class="faq_question">Q: What operating systems does QEMU support?</div>
<div class="faq_answer">A: Windows, Linux, MacOS X or anything that can run QEMU images. Only Windows and Linux are properly tested though.</div></li>

<li><div class="faq_question">Q: So, is this a GCW Zero emulator?</div>
<div class="faq_answer">A: No, QEMU does not emulate the CPU of GCW Zero (Ingenic JZ4770 SoC) or any other of its hardware components. It simply allows you to run the GCW Zero software on a different, emulated MIPS platform (general MIPS 24Kc cpu on <a href="http://www.linux-mips.org/wiki/MIPS_Malta">Malta board</a>). It is thus not comparable to the real hardware and should never be used for any performance testing of GCW Zero software.</div></li>

<li><div class="faq_question">Q: Who is this package addressed to?</div>
<div class="faq_answer">A: This could be useful mostly for testers and developers who would like to taste the things before they acquire the real device, and for those curious ones who would like to see what OpenDingux for GCW Zero looks like.</div></li>

<li><div class="faq_question">Q: With so many differences with a real GCW Zero is this still useful?</div>
<div class="faq_answer">A: Well, there are many situations when the real handheld is not available but you have to develop or test something and compiling for x86 is not an option. E.g. when your host is Windows and your application uses some linux-specific features that MinGW or Cygwin can't handle. Or, when you are testing the behavior of your application in OpenDingux environment (using correct paths etc). Or, when you are developing an emulator with a MIPS dynarec and that obviously can't be compiled for other architectures.</div></li>

<li><div class="faq_question">Q: Hey, how it's done? Can I create my own OpenDingux images for QEMU?</div>
<div class="faq_answer">A: Everything is explained step by step in a more technical article <a href="http://prizma.bmstu.ru/~exmortis/posts/2015-05-02-gcw0-qemu.html">here</a>.</div></li>

<li><div class="faq_question">Q: My OPK doesn't start in emulator but it works on real GCW Zero! Why so?</div>
<div class="faq_answer">A: Most probably you have found another incompatibility. Contact the author and perhaps things could be fixed in the future.</div></li>

<li><div class="faq_question">Q: Hey, I noticed System Info shows only 256MB of RAM, can I have more?</div>
<div class="faq_answer">A: Well, no, at least for now. Despite the fact that Malta board supports up to 2Gb of RAM, the current kernel lacks proper highmem support for this board. That's why the maximum amount of ram is limited to 256 Megabytes which should be enough for most applications.</div></li>
