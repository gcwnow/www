<h1>News :: Guest Column - rRootage</h1>
<span class="article_data">Date: 2014-11-11, Author: Dan Silsby (senquack)</span>

<h2>A port of the intense 'bullet-hell' shooter by Kenta Cho</h2>

<blockquote class="small_italic">GCW Zero team member Dan 'senquack' Silsby has released a solid full-speed port of the popular freeware shoot-'em-up rRootage. It is one of the first ports in the <a href="http://repo.gcw-zero.com/">official repository</a> to make use of the GCW Zero's GPU. It supports screen-rotation, fully customizable controls, and even adds some new options the original game never had. With 160 individual levels to play across four unique game modes, it is a must-download if you enjoy fast-paced bullet-hell action.</blockquote>

<p>If you're a fan of freeware shoot-'em-ups, or 'SHMUPs' for short, you've more than likely heard of rRootage. Released for free with open source code for Windows in 2003, it was created by the multi-talented and prolific programmer, <a href="http://www.asahi-net.or.jp/~cs8k-cyu/">Kenta Cho</a>, of Japan, also known as 'ABA Games'. It built on the great success of his shooter game <a href="http://www.asahi-net.or.jp/~cs8k-cyu/windows/noiz2sa_e.html">Noiz2sa</a>, released a year prior. Both these games and many of his later titles feature a distinctive minimalistic vector-style of graphics that Kenta Cho says was primarly inspired by a <a href="https://en.wikipedia.org/wiki/Rez">favorite Playstation 2 game of his, Rez</a>.</p>

<object width="650" height="400" class="center_container"
        data="https://www.youtube.com/v/9rznKpou85o"
        type="application/x-shockwave-flash">
  <param name="movie"
         value="https://www.youtube.com/v/9rznKpou85o"></param>
  <param name="allowScriptAccess" value="always"></param>
  <a class="image_center_a" href="https://www.youtube.com/watch?v=9rznKpou85o" title="Watch video on YouTube" style="background-image: url('http://img.youtube.com/vi/9rznKpou85o/0.jpg');"></a>
</object>

<p>rRootage features randomly-generated bullet barrage patterns defined through his <a href="http://www.asahi-net.or.jp/~cs8k-cyu/bulletml/index_e.html">bulletML library</a>. BulletML was initially used for Noiz2sa, which was <a href="http://boards.dingoonity.org/gcw-releases/noiz2sa-v1-0/">ported to the GCW Zero by alekmaul</a>. Continuing with BulletML, rRootage's gameplay is a bit different: you control the same ship as before, but your enemy is now one large boss at the top of the screen that fires increasingly difficult patterns of bullets through which you have to dodge. You are armed with a laser that can be turned off in order to move faster while dodging bullets. The game features forty individual levels, and each level requires you to defeat five bosses in succession. If forty levels is not enough for you, there are four different modes of gameplay, essentially making it 160 levels for the player to complete. Levels can be completed in any order.</p>

<ul class="gallery2" style="width: 580px;">
<li><img src="images/articles/rrootage_gameplay_horiz.png"><p>Horizontal orientation</p></li>
<li><img src="images/articles/rrootage_gameplay_vert_ikamode.png"><p>Rotated & zoomed IKA mode</p></li>
</ul>

<p><span class="text_bold">Normal mode:</span> In this mode, you are given a limited amount of bombs which clear away a large swath of bullets. You will definitely need the full use of them, especially as you progress to higher levels.</p>
<p><span class="text_bold">IKA mode:</span> This mode is inspired by the highly-regarded SHMUP <a href="https://en.wikipedia.org/wiki/Ikaruga">"Ikaruga"</a> released in 2001 in arcades and, later, for the Dreamcast and Playstation 2. Your ship has two colors it can change between, and can absorb and reflect back bullets of the same color.</p>
<p><span class="text_bold">GW mode:</span> This mode is inspired by the game <a href="https://en.wikipedia.org/wiki/Giga_Wing">GigaWing</a>, released in 1999 in arcades for Capcom's CPS2 hardware. You have limited use of a special weapon and, when fully charged, makes you temporarily invisible and able to wipe out a large circle of bullets around you.</p>
<p><span class="text_bold">PSY mode:</span> Inspired by the <a href="https://en.wikipedia.org/wiki/Psyvariar">Psyvariar series of games</a> for Playstation 2, it is unique in that you are given points for getting as close to bullets as possible, weaving your way through them while activating your "special" to spin the ship faster and graze more bullets.</p>

<p>I have always loved playing Kenta Cho's games, especially rRootage, and so as a programmer I've tried to bring it to every handheld platform I've owned. I first began this habit when programming for the <a href="https://en.wikipedia.org/wiki/GP2X">GP2X handheld system</a>. With only a 200mhz ARM processor with no FPU, and no 3D-capable GPU, it would normally be impossible.  However, Laurent Desnogues and Cedric Cellier released a <a href="https://gna.org/projects/gpu940/">marvellous 3D library with OpenGL wrapper called GPU940</a> that made use of the often-ignored and difficult-to-use second CPU core of the device. I had little free time then to bring the port up to the level of polish I would have preferred. </p>
<p>Later, <a href="https://en.wikipedia.org/wiki/GP2X_Wiz">the successor to the GP2X handheld, the Wiz</a>, was released. It featured a 533MHz ARM chip, but, again, no FPU. I converted most of the game to use fixed-point math instead of floating point and also did a direct conversion from OpenGL to OpenGLES. However, I had even less free time than before and lacked knowledge of OpenGLES, so the port was not as good as it could have been.</p>
<p>This time around, I was determined to make the port as polished as I possibly could for the GCW Zero. Having an FPU, a GPU, L2 cache, and a 1GHz CPU, I was sure it would be possible to have a solid 100% full-speed portable version at last. I didn't think it would take as long as it did to achieve this, however.</p>
<p>My first difficulty was deciding whether to keep the fixed-point math I used in my OpenGLES port for the Wiz. I wrote my own <a href="https://github.com/senquack/fpbench">math benchmark suite</a> and did some testing and found that the FPU in the GCW Zero is actually quite powerful and using fixed-point math would not only provide no benefit, but would actually be significantly slower! I was glad for having taken this extra time to test, and proceeded to re-convert the new code back to floating-point math.<p>
<p>After a good bit of work, I was ready to try my new version of the GLES port on the GCW Zero. However, the speeds were not as good as I was imagining they would be, and realized that much more work would need to be done for things to run perfectly smooth in all scenes. First and foremost, the OpenGLES drawing would need to be done almost entirely in large batches.</p>

<p>In order to accomplish this, a lot of the game's rendering code needed to be completely <a href="https://github.com/senquack/rRootage-for-Handhelds/blob/master/screen.c">rewritten</a>, even more than already was the case. Each bullet is rotated independently of the other, and there can be as many as 1024 on-screen at once. Not only the bullets, but the whole rest of the game was being rendered very inefficiently, in individual pieces instead of batches. I converted most of the drawing code to be 2D in nature, as the original code used 3D in places where it didn't need to at all. I found that the game had its own internal sine/cosine lookup table, which is very fast compared to using the C math library. I figured out how to use this same table to write my own 2D and 3D vertex-transformation routines. </p>

<ul class="gallery2" style="width: 660px;">
<li><img src="images/articles/rrootage_corrupted_gfx1.png"><p>Working out bugs in custom rotation routines</p></li>
<li><img src="images/articles/rrootage_corrupted_gfx2.png"><p>Working out bugs in custom rotation routines</p></li>
</ul>

<p>Using these routines, I could pre-rotate and translate all the game's geometry and only after it was all computed, send it off to the GPU to be rendered in one huge batch. I went from 7FPS in some particularly intense scenes to 40 or 50 FPS. After a week or two more work, I had almost the entire rest of the game rendered in this batch-drawn fashion and had applied numerous other small optimizations here and there. I eventually had speeds shot up to a smooth 60FPS and was very happy.</p>

<p>After all the work on optimization, I then focused on making this the most polished port I've ever done. The original game lacked in-game options and what few it did have were only changed through parameters on the command line. First and foremost, I needed to make the game playable on a low-resolution device. That required rotating and zooming-in on the narrow playfield. Normally this sort of thing is easy under OpenGL, but getting the two layers of the game's drawing to be properly scaled and aligned and supporting both left and right rotation was a two-day affair.</p>

<ul class="gallery2" style="width: 660px;">
<li><img src="images/articles/rrootage_menu_settings.png"><p>Custom configuration utility</p></li>
<li><img src="images/articles/rrootage_menu_controls.png"><p>Custom configuration utility</p></li>
</ul>
<p>Next, I wanted to focus on game controls and options. Allowing for multiple screen orientations meant I needed to have very customizable controls. To this purpose, I wrote a custom configuration utility just for this port that would allow this customization. While I was at it, I decided to add all the options I'd wished I'd had before and imagined what other users might also like. Since the game is very difficult on higher levels, I added cheats and also added options like allowing the laser to be on-by-default, which makes playing on a handheld much more pleasant. I also added an option to remove the game's "bullet-time" frame limiter during intense scenes, if the user wanted a challenging and smooth always-full-framerate experience.</p>

<p>All in all, I ended up very satisfied with the results and hope people find this the most polished of my ports, as I've spent hundreds of hours on it. I also hope users will be encouraged to check out Kenta Cho's many other freeware games and that I will be able to bring more of them to this handheld.</p>

