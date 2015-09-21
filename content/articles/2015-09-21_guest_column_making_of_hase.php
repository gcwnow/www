<h1>News :: Guest Column - Making of Hase</h1>
<span class="article_data">Date: 2015-09-21, Author: Ziz, Editors: Zear &amp; Surkow
</span>

<blockquote>Thanks to developer Alexander "Ziz" Matthes, another new homebrew title sees the light of day and contributes to the GCW Zero game collection. It features hares shooting projectiles, a completely destructible environment and network play. It's a fully cross platform title which supports many popular open handhelds thanks to the inclusion of Sparrow3D, a multi platform game framework.</blockquote>

<h2>Introduction</h2>

<p>Hase, a Worms-like game, features hares shooting projectiles and a completely destructible environment. It has a stronger focus on gravity compared to classics like the original Worms from Team 17 and the open-source Hedgewars and superficially resembles the gameplay mechanics in Super Mario Galaxy. In the game, gravity depends on the mass of the objects you reside on. The gravitational fields are shown around you with arrows, and they help you to estimate the trajectory of your projectile (which is of course a turnip, because you are a hare!).

<!--
<ul class="gallery2" style="width: 330px;">
<li><img src="images/articles/hase_screenshot_gcw_ingame2.png"><p>Hase on the GCW Zero.</p></li>
</ul>
-->

<p>There have been four releases thus far. The first release tried to achieve a fast gravitational field calculation, the second one implemented network play and the third one tried to make the whole game feel more like a Worms game. The most recent iteration focuses on polishing the experience now that the core foundation has been finished.</p>

<ul class="gallery2" style="width: 660px;">
<li><img src="images/articles/hase_screenshot_gcw_ingame3.png"><p>In-game screenshot on the GCW Zero.</p></li>
<li><img src="images/articles/hase_screenshot_gcw_lobby.png"><p>Online multiplayer lobby on the GCW Zero.</p></li>
</ul>

<p>Because of my multi platform game framework Sparrow3D, there is no need to adjust the screen size and button captions when targeting different platforms. The game is written once and consecutively compiled for every target Sparrow3D supports. I developed, tested and debugged the game completely with my Linux PC. With each iteration the framework creates versions for the GCW Zero or other open handhelds like the Pandora, Caanoo, Dingoo A320, Wiz and GP2X.</p>


<ul class="gallery2" style="width: 660px;">
<li><a href="images/articles/hase_screenshot_pandora_local_game.png"><img class="small" src="images/articles/hase_screenshot_pandora_local_game.png"></a><p>Creating a local game on the Pandora.</p></li>
<li><a href="images/articles/hase_screenshot_pc_ingame.png"><img class="small" src="images/articles/hase_screenshot_pc_ingame.png"></a><p>In-game screenshot of the PC version of Hase.</p></li>
</ul>

<h2>Why another Worms game!?</h2>

<p>Hase (German for "hare") is one of the many existing Worms clones out there. At thirteen years old I attempted to create a Worms game in DOS. The game allowed you to walk around and shoot a bazooka, taking wind into account. Like many of my other initial efforts at making games, I never ended up finishing the project.</p>

<p>A number of years later I made a second attempt in Windows using a direct framebuffer access library. I flattered myself thinking that the code would be much faster by doing everything myself. Using Win32 API calls directly was a logical consequence of this, mainly because I assumed it to be faster than Delphi or similar solutions. Due to the complexity, this second attempt at a Worms-like game failed even earlier.</p>

<h2>The third attempt; a different approach</h2>

<p>Even if I had continued development, something was missing: novel ideas of my own. I always concentrated on copying Worms, but never thought about improving the game's concept or bringing in some ideas of my own (beyond renaming and re-illustrating the weapons).</p>

<p>I finally came up with a new idea of how to improve a Worms-like game, to give it something special, something new which would change the game principles and hopefully improve it: gravity. The basic idea is: gravity depends on the mass of the object you reside on. It is quite easy to calculate a gravitational field from a randomly generated level design. However, one of the biggest goals was to recalculate the gravitational field quickly when the level design was altered; e.g. if I shoot a hole in the environment.</p>

<p>For the third approach I made a small prototype to test how to calculate a gravitational field quickly and to recalculate it fast whenever the environment was modified. The Open Pandora "Crap Game Competition" coincided with it, therefore I used this opportunity to get feedback for my idea and participated.</p>

<ul class="gallery2" style="width: 660px;">
<li>
<object width="650" height="400" class="center_container_description"
   	data="https://www.youtube.com/v/gHofzZKK1LQ"
   	type="application/x-shockwave-flash">
 <param name="movie"
    	value="https://www.youtube.com/v/gHofzZKK1LQ"></param>
 <param name="allowScriptAccess" value="always"></param>
 <a class="image_center_a" href="https://www.youtube.com/watch?v=gHofzZKK1LQ" title="Watch video on YouTube" style="background-image: url('http://img.youtube.com/vi/gHofzZKK1LQ/0.jpg);"></a>
</object>
</li>
<li class="description"><p>Very first version of Hase</p></li>
</ul>

<h2>Why hares?</h2>

<p>As seen in the video, the recalculation of the gravitational field is pretty fast. I did some measurements on different devices, but even on the GP2X it takes under a second to recalculate everything. A bigger problem was the movement. If you make a classic platformer you have to take into account downward gravity (alongside the y-axis). It is quite easy to make a pixel-collision-based "physics engine". But what if the whole level rotates and the gravity may vary in force and direction? This was the main reasoning behind making the player collision box a circle. Circular pixel collision-detection is quite easy and the easiest way to move in such an environment is to jump. But "Jumping circles in space" is not a fantastic game name. That is why I had to decide on a player character which would fit in a circle and was easy to animate. My girlfriend found the perfect character: a hare.</p>

<p>I received a lot of good feedback for the first prototype, even if you could only kill your own character in the game. But, there was no game goal. Therefore, I added a second player, aiming lines, textures for the level, and made the level randomly generated.</p>

<ul class="gallery2" style="width: 660px;">
<li>
<object width="650" height="400" class="center_container_description"
   	data="https://www.youtube.com/v/lATtwxgTeuY"
   	type="application/x-shockwave-flash">
 <param name="movie"
    	value="https://www.youtube.com/v/lATtwxgTeuY"></param>
 <param name="allowScriptAccess" value="always"></param>
 <a class="image_center_a" href="https://www.youtube.com/watch?v=lATtwxgTeuY" title="Watch video on YouTube" style="background-image: url('http://img.youtube.com/vi/lATtwxgTeuY/0.jpg);"></a>
</object>
</li>
<li class="description"><p>Finished first prototype of Hase</p></li>
</ul>

<h2>The second prototype</h2>

<p>I left it at that for some months. Because of the positive feedback, some people even wanted it removed from the Pandora "Crap Game Competition", for not being crappy enough. I had other projects like Snowman which I needed to finish first. Furthermore, I made some releases exclusive to the GCW Zero like Glutexto and OPKManager, and was mainly occupied with day-to-day matters.</p>

<p>Although I never attempted to create a networked game before, I couldn't stop thinking about adding network support to one of my existing games. All I knew is that I couldn't make it a real-time game. Wireless latency is way too high for fast networked gaming, especially over the Internet. We have to face it: it is quite seldom that you have other GCW Zero or Pandora users in your immediate vicinity, therefore the goal was Internet play from the very beginning.</p>

<p>Because Hase is turn-based, there is no problem in pausing the game if a player's turn data is missing. Therefore I decided to use Hase as a test game for my very first network implementation. The idea is not to transmit the game's state, but instead to transmit the buttons the users press. With this, it was quite easy to synchronize the games. My background library for making games for different targets like the GCW Zero, Open Pandora, Caanoo, Dingoo A320, Wiz, or GP2X, abstracts every device to a generic device with one D-Pad and 8 buttons (4 Action buttons, 2 Shoulder buttons and 2 buttons like Select, Start, Menu or similar). To save network traffic, I compressed this data bitwise. For every millisecond, I use twelve bits to tell which buttons are pressed. With this I need only 1.5 kB per second to transmit the button presses. Therefore you could even play on-the-go with your mobile phone over GPRS! If input data is missing, the game is paused until it arrives. If the player doesn't react for a whole minute he is kicked and for the rest of the game the server will replace the player. Without the server sending button presses in place of the disconnected player, you would have to wait endlessly for his turn to end.</p>

<p>The server itself is quite simple. It doesn't check the player turns, it just maintains the data for the game, players, and turns in a database and sends them on request. With this, I could write the server completely in PHP. The added benefit being that it could be hosted almost anywhere.</p>

<ul class="gallery2" style="width: 660px;">
<li><img src="images/articles/screenshot029hase.png"></li>
<li><img src="images/articles/screenshot034hase.png"></li>
<li><img src="images/articles/screenshot041hase.png"></li>
<li><img src="images/articles/screenshot050hase.png"></li>
<li class="description"><p>Community members: Nebuleon, Kouen Hasuki, Lasharus, zear, sabotender, JohnnyonFlame, and Dnilo playing the second prototype of Hase with network support.</p></li>
</ul>

<h2>The next iteration</h2>

<p>The feedback of the second prototype was amazing. This time I also released a version for the GCW Zero, Hase 1.4. I think the GCW Zero is the perfect device for games like this. But, I ran into an interesting problem in both the Dingoonity and Open Pandora communities: I got feedback and ideas to improve Hase, which would make a completely new game out of it. Some reviewers didn't see the Worms-like feel of the whole game and concentrated on the gravitational focus of the game, or gave entirely random game ideas. Furthermore, the first prototype concentrated on fast gravitational recalculation and network support. Everything else like the level design, the GUI design, even the character sprites were secondary, but criticized nonetheless. Therefore I decided to take some time for the third prototype to improve the GUI, the font, the sprites, and, especially, to make the game more Worms-like by adding multiple hares per team and adding different weapons.</p>

<ul class="gallery2" style="width: 660px;">
<li>
<object width="650" height="400" class="center_container_description"
   	data="https://www.youtube.com/v/41IM4Tm0RK8"
   	type="application/x-shockwave-flash">
 <param name="movie"
    	value="https://www.youtube.com/v/41IM4Tm0RK8"></param>
 <param name="allowScriptAccess" value="always"></param>
 <a class="image_center_a" href="https://www.youtube.com/watch?v=41IM4Tm0RK8" title="Watch video on YouTube" style="background-image: url('http://img.youtube.com/vi/41IM4Tm0RK8/0.jpg);"></a>
</object>
</li>
<li class="description"><p>Hase 1.4</p></li>
</ul>

<h2>Hase 1.5</h2>

<p>While version 1.4 included the most needed, basic features, with version 1.5 I could finally address a number of less important aspects of the game. I added two smaller build tools for more detailed adjustment of the level. This update also includes new types of warfare, with a total of 16 different weapons to choose from.</p>

<p>The new weapons consist of pistol-like weapons, which deal a constant amount of damage. Furthermore I added a special weapon which lets your enemy jump very high - very lethal when the gravity is low.</p>

<p>Every weapon costs a specific amount of action points to use. By default you receive three action points per turn. There are weak weapons, which you can use twice or even three times, but also very strong ones, which consume more than three action points. The stronger type of weapons require you to wait to harvest action points during your next turn or require you to collect an item, which gives you more action points.</p>

<p>Another new addition is the inclusion of randomly dropped items, which make the game more interesting. Those items are not only limited to the aforementioned action points, but also include health packages and mines.</p>

<p>The final big improvement is the change of the in-game chat system from a custom PHP implementation to the IRC protocol. With this, you can chat in #hase on freenode.org while playing, or the other way around.</p>
<p>And because it might be difficult to type fast on the GCW Zero, I also introduced a system of random insults, which can be entered with a single shortcut, for when someone killed your favourite hare.</p>

<p>Last, but not least are several small improvements in the department of graphics, better UI placement, bug fixes and so on.</p>

<p>Check out the video below to see these exciting additions to the game:</p>

<ul class="gallery2" style="width: 660px;">
<li>
<object width="650" height="400" class="center_container_description"
   	data="https://www.youtube.com/v/d02NCNcM9os"
   	type="application/x-shockwave-flash">
 <param name="movie"
    	value="https://www.youtube.com/v/41IM4Tm0RK8"></param>
 <param name="allowScriptAccess" value="always"></param>
 <a class="image_center_a" href="https://www.youtube.com/watch?v=d02NCNcM9os" title="Watch video on YouTube" style="background-image: url('http://img.youtube.com/vi/d02NCNcM9os/0.jpg);"></a>
</object>
</li>
<li class="description"><p>Hase 1.5</p></li>
</ul>

<h2>The future</h2>

<p>Of course, Hase is not finished. There is still a lot of work that remains to be done. The GUI needs more improvements, little bugs need to be fixed, the Hase sprites have to be polished, the colour setting should be improved, and, of course, plenty of new weapons are needed!</p>

<h2>Public invitation</h2>
We reach a part of the article where you - the reader - can help! Download the game from the <a href="http://repo.gcw-zero.com">GCW Software Repository</a> and aid me with beta testing.

I would also like to invite everybody to visit the <a href="http://webchat.freenode.net/?channels=hase&uio=d4">IRC channel</a> for Hase - a perfect place to look for other players and leave suggestions about the game.

<p>With this in mind: "All your hare are belong to us!"</p>
