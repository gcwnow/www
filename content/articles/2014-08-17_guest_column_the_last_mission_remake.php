<h1>News :: Guest Column - Making of 'The Last Mission' remake</h1>
<span class="article_data">Date: 2014-08-17, Author: Dmitry Smagin, Editor: Surkow</span>

<h2>Origins</h2>

<p>The Last Mission<a href=#1>[1]</a>, a maze shooter game, was originally released by Spanish company OperaSoft in 1987 on the following platforms: MSX1, MSX2, Amstrad CPC, ZX-Spectrum and 8086/88 PC. Due to varying hardware capabilities, all versions of the game differ in terms of graphics and sound. The most advanced of these ports was the MSX2 version, which featured rich-colored graphics and PSG sound supplied by the General Instruments AY-3-8910<a href=#2>[2]</a>.</p>

<object width="650" height="400" class="center_container"
        data="https://www.youtube.com/v/Uu2VlFzZkXE"
        type="application/x-shockwave-flash">
  <param name="movie"
         value="https://www.youtube.com/v/Uu2VlFzZkXE"></param>
  <param name="allowScriptAccess" value="always"></param>
  <a class="image_center_a" href="https://www.youtube.com/watch?v=Uu2VlFzZkXE" title="Watch video on YouTube" style="background-image: url('http://img.youtube.com/vi/Uu2VlFzZkXE/0.jpg');"></a>
</object>

<h2>First attempt</h2>

<p>The story started in 2006 when I stumbled upon an 8086/88 PC version of 'The Last Mission' which was in fact a hacked diskette image repacked in a small and tidy .com executable. The game ran extremely fast on a modern PC, and trying to slow it down I decided to disassemble the executable and patch it. While disassembling I found that the code inside was very weird and superfluous and could be optimized greatly with little effort. Its weirdness made me think that most part of it was macro-translated from z80 assembler to the x86 variant.</p>

<p>After a longer period of patching and data examination an idea of game reimplementation came to mind. For some crazy reason I chose Sphinx C-- as a primary language. It was a cross between C and assembler and could generate small executables for DOS and Windows. In addition to this a simple tool was written to extract game data from the .com executable and save in a text format, ready to be included in the source code.</p>

<p>The first alpha version could be compiled both for DOS and Windows (the latter used GDI bitmaps for graphics) and in-game you could do nothing more but move the flying cannon around, go from screen to screen and watch enemies here and there which didn't move (but were animated though). This version was never released and, in fact, the drawbacks and limitations of C-- made me put aside this game for some time.</p>
<h2>Second attempt</h2>

<p>After some years of stalling the game was revived. It was completely rewritten in FreeBasic<a href=#3>[3]</a> which was chosen because it was easy to use and its community was rather positive towards retro games. Unfortunately, the DOS version was dropped.</p>

<p>A fully playable game was released in 2009 and it featured some Adlib-emulated sound effects and title music.<a href=#4>[4]</a></p>

<ul class="gallery2" style="width: 660px;">
<li><a href="images/articles/0_58cb3_617579ba_orig.gif"><img class="small" src="images/articles/0_58cb3_617579ba_orig.gif"></a></li>
<li><a href="images/articles/0_58cb4_a4223970_orig.gif"><img class="small" src="images/articles/0_58cb4_a4223970_orig.gif"></a></li>
<li class="description"><p>FreeBasic version. Looking exactly like the original CGA port for 8086/88 PC.</p></li>
</ul>

<h2>Third attempt</h2>

<p>Due to my involvement in the Dingoo A320 scene I decided to port 'The Last Mission' to this nice retro handheld. As FreeBasic didn't support anything else but x86 as target, I rewrote the game once more, this time using plain C and SDL to ensure cross-platform compatibility.</p>

<p>The first release was made in 2011 supporting Dingoo Native OS and Dingux<a href=#5>[5]</a>. A year later in 2012 all game graphics were recolored using the MSX2 port as a reference and some elements of gameplay were made more faithful to the original. Sound effects remained the same, but the title music was replaced with a remixed version of the original Last Mission music, which I composed myself using Radtracker.</p>

<ul class="gallery2" style="width: 660px;">
<li><a href="images/articles/0_71c2e_75da41d9_orig.png"><img class="small" src="images/articles/0_71c2e_75da41d9_orig.png"></a></li>
<li><a href="images/articles/0_71c2f_6f07a6f8_orig.png"><img class="small" src="images/articles/0_71c2f_6f07a6f8_orig.png"></a></li>
<li class="description"><p>Dingoo A320 version. Graphics were recolored using the MSX2 port as a reference.</p></li>
</ul>

<h2>Final touches...</h2>

<p>Of course, the game was compiled for GCW Zero handheld when it came to the scene but it was still the same Dingoo version. This could be the end of the story, as I didn't plan to continue developing. However, I was contacted by Alexey Pavlov who decided to port the game to iOS<a href=#6>[6]</a> devices. He added some very nice features like different backgrounds for levels, shadows, more weapons and bonuses. He also went as far as adding a secret level and a new set of sound effects and music made by Mark Braga. Most of these changes were included into the main source tree.</p>

<ul class="gallery2" style="width: 660px;">
<li><a href="images/articles/0_92873_2048b64_orig.png"><img class="small" src="images/articles/0_92873_2048b64_orig.png"></a></li>
<li><a href="images/articles/0_92875_d07f1c74_orig.png"><img class="small" src="images/articles/0_92875_d07f1c74_orig.png"></a></li>
<li class="description"><p>GCW Zero version. Backgrounds and numerous other features were added.</p></li>
</ul>

<h2>Back to its roots</h2>

<p>Unfortunately, according to Alexey, 'The Last Mission' didn't get much attention on iOS, but his efforts weren't  in vain because in early 2013 I was contacted by Pedro Ruiz, the original programmer of the game and founder of OperaSoft. He was very surprised to see his own game running on iOS and gave permission to distribute the remake under the GPL2 license<a href=#7>[7]</a>.</p>

<p>After that 'The Last Mission' remake was allowed to enter GCW Zero repository<a href=#8>[8]</a> and can be freely downloaded from there<a href=#9>[9]</a>.</p>

<p>
<a name="1"></a>[1] <a href="http://www.mobygames.com/game/last-mission">http://www.mobygames.com/game/last-mission</a><br>
<a name="2"></a>[2] <a href="http://en.wikipedia.org/wiki/General_Instrument_AY-3-8910">http://en.wikipedia.org/wiki/General_Instrument_AY-3-8910</a><br>
<a name="3"></a>[3] <a href="http://freebasic.net/forum/viewtopic.php?f=8&t=13058&hilit=last+mission">http://freebasic.net/forum/viewtopic.php?f=8&t=13058&hilit=last+mission</a><br>
<a name="4"></a>[4] <a href="http://games.freebasic.net/dumpbyid.php?input=134">http://games.freebasic.net/dumpbyid.php?input=134</a><br>
<a name="5"></a>[5] <a href="http://boards.dingoonity.org/dingoo-releases/the-last-mission-dingoo-sdl-remake-for-native-os/">http://boards.dingoonity.org/dingoo-releases/the-last-mission-dingoo-sdl-remake-for-native-os/</a><br>
<a name="6"></a>[6] <a href="http://www.youtube.com/watch?v=-aaPZMIKQY4">http://www.youtube.com/watch?v=-aaPZMIKQY4</a><br>
<a name="7"></a>[7] <a href="http://sourceforge.net/projects/lastmission/">http://sourceforge.net/projects/lastmission/</a><br>
<a name="8"></a>[8] <a href="http://repo.gcw-zero.com">http://repo.gcw-zero.com</a><br>
<a name="9"></a>[9] <a href="http://www.gcw-zero.com/file.php?file=last-mission.opk">http://www.gcw-zero.com/file.php?file=last-mission.opk</a>
</p>

