<?php
$page = "develop";
include "includes/header.php";
?>

<div id="content">

<h1>Developing for the GCW Zero</h1>

<h2>Toolchain</h2>

<?php
# TODO: Automatically list the alphabetically largest file name that matches
#       "files/gcw0-toolchain.*.tar.bz2".
?>
<p><a href="files/opendingux-gcw0-toolchain.2013-10-04.tar.bz2">GCW Zero Toolchain</a> 2013-10-04, for x86 Linux</a><br>
Changes: improved <a href="files/etnaviv-2013-10-04.html">OpenGL ES</a> support, experimental <a href="http://wiki.dingoonity.org/index.php?title=Development:MXU">MXU</a> support in inline assembly (pass <code>-mmxu</code> to GCC).</p>
<p><a href="files/opendingux-gcw0-toolchain.2013-09-13.tar.bz2">GCW Zero Toolchain</a> 2013-09-13, for x86 Linux</a><br>
Changes: compile for MIPS32R2 by default, added <a href="files/etnaviv-2013-09-13.html">OpenGL ES</a>.</p>
<p><a href="files/opendingux-gcw0-toolchain.2013-07-06.tar.bz2">GCW Zero Toolchain</a> 2013-07-06, for x86 Linux</a><br>
Changes: updated GCC to 4.8.1, added Boost, FluidSynth and libini.</p>
<p><a href="files/opendingux-gcw0-toolchain.2013-02-05.tar.bz2">GCW Zero Toolchain</a> 2013-02-05, for x86 Linux</a><br>
Changes: added libmodplug and enabled XPM support in SDL_image.</p>
<p><a href="files/opendingux-gcw0-toolchain.2013-01-25.tar.bz2">GCW Zero Toolchain</a> 2013-01-25, for x86 Linux</a><br>
Changes: enabled tslib and ALSA MIDI support.</p>
<p><a href="files/opendingux-gcw0-toolchain.2012-12-11.tar.bz2">GCW Zero Toolchain</a> 2012-12-11, for x86 Linux</a></p>

<p>The toolchain contains typical tools for C/C++ development, such as the compilers (GCC), binutils and remote debugger (gdb). It also contains the header files and libraries to compile and link against respectively.</p>
<p>If you want to develop in Python (pygame) exclusively, you don't need to download the toolchain.</p>

<p>To install the toolchain, become root and issue the following commands:</p>
<pre>
mkdir -p /opt
cd /opt
tar jxvf <i>/path/where/you/downloaded</i>/opendingux-gcw0-toolchain.<i>date</i>.tar.bz2
</pre>
<p>It has to be installed in <code>/opt</code>, otherwise some of the tools will not work.</p>

<p>You can add <code>/opt/gcw0-toolchain/usr/bin</code> to you <code>$PATH</code> if you want to be able to invoke the compiler and other tools without specifying the full path.</p>

<p>The toolchain is built using buildroot. If you'd like to build the toolchain yourself, you can find the customized sources in a <a href="https://github.com/gcwnow/buildroot">repository on github</a>, with build instructions in the associated <a href="https://github.com/gcwnow/buildroot/wiki">wiki</a>.</p>

</div>

<?php
include "includes/footer.php";
?>
