<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Start</title>
    <link rel="stylesheet" href="style.css">
    <script async src="script.js"></script>
</head>
<body>
<?php
if ($_GET['run']) {
  # This code will run if ?run=true is set.
  shell_exec("/var/www/updatestartpage");
}
?>


<!— This link will add ?run=true to your URL, myfilename.php?run=true —>
<p style="text-align: left; margin: 0px"> 
<a href="?run=true" ;="" style="color:#4c4c4c;text-align:left;">Refresh</a>
</p>

    <div class="section">
      <div class="list left1">
        <h1 id="sidebarLeft1">Everyday</h1>
        <ul>
		   <li><a href="https://mail.google.com/mail/u/0/#inbox">Gmail</a></li>
           <li><a href="https://drive.google.com/drive/folders/0B79vVmLS8AbxR1hKR08zMXBuYWs">Drive</a></li>
           <li><a href="https://trello.com/">Trello</a></li>
		   <li><a href="https://www.amazon.com/gp/css/order-history?ie=UTF8&ref_=nav_youraccount_orders&">Amazon</a></li>
		   <li><a href="https://github.com/">GitHub</a></li>
        </ul>
      </div>
      <div class="list left2">
        <h1 id="sidebarLeft2">School</h1>
        <ul>
           <li><a href="http://www.pathwaystotechnology.com/groups.cfm?groupDashboardView=calendar">Pathways Portal</a></li>
           <li><a href="http://www.pathwaystotechnology.com/page.cfm?p=1">Pathways</a></li>
           <li><a href="https://powerschool.hartfordschools.org/public/home.html">Powerschool</a></li>
           <li><a href="https://connection.naviance.com/family-connection/auth/login/?hsid=hphspatd">Naviance</a></li>
           <li><a href="https://hs.studyisland.com/index.cfm?">Study Island</a></li>
		   <li><a href="https://www.desmos.com/calculator">Desmos</a></li>
		   <li><a href="https://www.symbolab.com/">Symbolab</a></li>
        </ul>
      </div>
      <div class="list right1">
        <h1 id="sidebarRight1">Media and Distractions</h1>
        <ul>
           <li><a href="https://netflix.com/">Netflix</a></li>
           <li><a href="https://emby.hbh7.com/web/home.html">Hunterflix</a></li>
           <li><a href="https://kissanime.to/">KissAnime</a></li>
           <li><a href="http://kisscartoon.me/">KissCartoon</a></li>
           <li><a href="http://www.reddit.com/">Reddit</a></li>
        </ul>
      </div>
      <div class="list right2">
        <h1 id="sidebarRight2">¯\_(ツ)_/¯</h1>
        <ul>
           <li><a href="http://patorjk.com/games/snake/">Snake</a></li>
           <li><a href="http://agar.io/">Agar</a></li>
           <li><a href="http://slither.io/">Slither</a></li>
		   <li></li>
		   <li></li>
		   <li></li>
		   <li></li>
        </ul>
      </div>
    </div>

    <div id="clock"></div>


    <input id="input" autofocus>
    <div id="search">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800">
            <path d="M550,520a310,310,0,0,0,80-210C630,140,500,0,320,0S10,140,10,310,150,620,320,620a310,310,0,0,0,190-60L740,790s20,20,40,0,0-40,0-40L550,520h0ZM70,310C70,170,180,60,320,60S580,170,580,310q0,0,0,2A250,250,0,0,1,70,310"/>
        </svg>
    </div>
    <div id="predictions"></div>
    <div id="weather"></div>
    <div id="all"></div>
    <div id="calculator">
        <div>
            <div id="ac">AC</div>
            <div id="clear">C</div>
        </div>
        <div class="add">
            <div>9</div>
            <div>8</div>
            <div>7</div>
            <div>6</div>
            <div>5</div>
            <div>4</div>
            <div>3</div>
            <div>2</div>
            <div>1</div>
            <div id="calc"></div>
            <div>.</div>
            <div>0</div>
        </div>
        <div class="add">
            <div>+</div>
            <div>-</div>
            <div>*</div>
            <div>/</div>
        </div>
    </div>

</body>
</html>
