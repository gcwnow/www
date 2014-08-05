<h1>News :: Guest Column - The making of Hocoslamfy</h1>
Date: 2014-03-24, Author: Nebuleon Fumika

<h2>About the game</h2>

<!--<blockquote class="block_style">-->
<p>Made in the style of classic cave flying games, in this reimplementation of the widely popular game Flappy Bird by Dong Nguyen, you are a bee and you must avoid crashing into bamboo.</p><!--</blockquote>-->

<object width="650" height="400" class="center_container">
  <param name="movie"
         value="https://www.youtube.com/v/UtVR4qMC6ZU"></param>
  <param name="allowScriptAccess" value="always"></param>
  <embed src="https://www.youtube.com/v/UtVR4qMC6ZU"
         type="application/x-shockwave-flash"
         allowscriptaccess="always"
         width="650" height="400"></embed>
</object>


<h2>Cave flying revisited</h2>

<p>I'd say that the development of hocoslamfy has been really weird, starting with its name.</p>

<p>I had learned, within the same day (2014-02-08), both that Flappy Bird even existed, and that its creator was about to pull it from all app stores. On IRC, we were discussing this, and basically said that Dong Nguyen could have just made this game effortlessly with Game Maker.</p>

<p>It then dawned upon me that I could make a similar game in SDL and C. I had never made an SDL application from scratch before, so making hocoslamfy was a nice challenge.</p>

<p>I set up the project directory and Makefile, reusing lots of code from ReGBA<a href=#1>[1]</a>, and made a simple version without any graphics. The name was decided hastily, but kind of stuck after the events that followed. It took me only 5:30 hours of coding, and there it was! The first version of hocoslamfy!</p>

<ul class="gallery2" style="margin: -5px auto; width: 660px;">
<li><img src="images/articles/screenshot114.png"><p>Playing the first version.</p></li>
<li><img src="images/articles/screenshot113.png"><p>The first high score.</p></li>
</ul>

<p>It was ugly, but it played well. The physics were easy to code, but difficult to fine-tune so that the physics didn't seem too contrived.</p>

<p>Already, hi-ban (our graphics artist) had started making graphics for the game. He also integrated the graphics into the game, which is the first time he's ever coded for a game. He thought it was cool to actually make the code that drew his graphics to the screen.</p>

<ul class="gallery2" style="margin: -5px auto; width: 660px;">
<li><img src="images/articles/screenshot115.png"><p>hi-ban's graphics, version 1.</p></li>
<li><img src="images/articles/screenshot117.png"><p>A much improved high score.</p></li>
</ul>

<p>We then learned that Apple and Google were taking out any application that referenced Flappy Bird using the words "Flappy" and "Bird" from their app stores. The name hocoslamfy stuck even more.</p>

<p>Users were already posting high scores, but I had no high score keeping system yet. jxv provided this later, making the local collection of high scores easier. He didn't care much about the copyright of that code, so he assigned it to me and agreed that his code was under the GPL v2.</p>

<p>While that was happening, hi-ban was making a second version of the graphics "in a style inspired by Yoshi's Island and its crayon-drawn backgrounds", and he said we'd need alpha blending for a new semi-transparent anti-aliased background. He also made an early version of an image for the columns that the player must pass through.</p>

<p>I looked into using a 32 bpp video mode, and the performance characteristics of everything. As hi-ban gave me the layers, I integrated them into the game, using the Y coordinates he gave, and found that the game now had 95% of CPU usage!</p>

<p>My attempts to improve the CPU usage were odd. I first found some documentation online about an SDL function called SDL_DisplayFormat. It converted textures to an optimised format for the display, allowing the CPU usage to drop. But I was then met with an ugly background.</p>

<p>After getting it to work with SDL_DisplayFormatAlpha, hi-ban started to work on making bamboo in the same style as the rest of the graphics.</p>

<ul class="gallery2" style="margin: -5px auto; width: 660px;">
<li><img src="images/articles/screenshot118.png"><p>Early problems with 32 bpp surfaces.</p></li>
<li><img src="images/articles/screenshot119.png"><p>Reducing the CPU usage had its problems.</p></li>
<li><img src="images/articles/screenshot120.png"><p>hi-ban's bee, version 2.</p></li>
<li><img src="images/articles/screenshot152.png"><p>And now the bamboo.</p></li>
</ul>

<p>We still needed to find some good sound to accompany the game, and I tested the game with my sister. After lending her my GCW Zero and watching her play the game, I noticed that she never made comments on the score until her games were over, which was the opposite of what she did in Flappy Bird. I had to tell her the score because she couldn't look at it while playing the game, so I decided I'd do something about that.</p>

<p>Surkow found some music; I listened to a few tracks and decided on one. The search for sound effects was odder, because people were giving me actual insect sounds, and not cartoony effects. Being creeped out by flying insect sounds, I refused to open any sound I was given, instead searching for them myself.</p>

<p>All the sound is Creative Commons licensed, and I took some time to record the origin of every sound file and all the modifications I had made to them.</p>

<p>After all the sound, it was time to tear down the score display and be novel. Independently suggested by a Dingoonity<a href=#2>[2]</a> forum user, Gab1975, was a way to see the score you had while playing, after a fair amount of back-and-forth on the title screen animation.</p>

<p>I eventually chose to display the score a player could have if he or she passed the bamboos in the middle of the spaces themselves.</p>

<ul class="gallery2" style="margin: -5px auto; width: 660px;">
<li><img src="images/articles/hocoslamfy-score-shown-1.png"><p>How the score was shown before.</p></li>
<li><img src="images/articles/hocoslamfy-score-shown-2.png"><p>Now the player can see it better.</p></li>
</ul>

<p>And there you go! A pretty fun game, using only Creative Commons assets and open-source code<a href=#3>[3]</a>. It was even fun to make the game, not just play it! Hocoslamfy can be downloaded at the GCW Zero Repository<a href=#4>[4]</a>.</p>

<p>
<a name="1"></a>[1] <a href="https://github.com/Nebuleon/ReGBA">https://github.com/Nebuleon/ReGBA</a><br>
<a name="2"></a>[2] <a href="http://boards.dingoonity.org/">http://boards.dingoonity.org/</a><br>
<a name="3"></a>[3] <a href="https://github.com/Nebuleon/hocoslamfy/">https://github.com/Nebuleon/hocoslamfy/</a><br>
<a name="4"></a>[4] <a href="http://repo.gcw-zero.com">http://repo.gcw-zero.com</a></p>

