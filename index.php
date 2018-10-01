<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Start</title>
    <link rel="stylesheet" href="style.css">
    <script async src="script.js"></script>
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
</head>
<body>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-99868303-1', 'auto');
		ga('send', 'pageview');
	</script>
<?php
if ($_GET['run']) {
  # This code will run if ?run=true is set.
  shell_exec("/var/www/updatestartpage");
  sleep(5);
  header("Location: https://start.egblip.com");
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
            	<li><a href="https://drive.google.com/drive/my-drive">Drive</a></li>
		<li><a href="https://github.com/">GitHub</a></li>
		<li><a href="https://www.paypal.com/myaccount/home">PayPal</a></li>
		<li><a href="https://www.mylibertyonline.com/tob/live/usp-core/app/home">Liberty</a></li>
        </ul>
      </div>
      <div class="list left2">
        <h1 id="sidebarLeft2">School</h1>
        <ul>
	  <li><a href="https://www.desmos.com/calculator">Desmos</a></li>
	  <li><a href="https://www.symbolab.com/">Symbolab</a></li>
	  <li><a href="https://school.hbh7.com/pdfs">hbh7's School PDFs</a></li>
        </ul>
      </div>
      <div class="list right1">
        <h1 id="sidebarRight1">Media and Distractions</h1>
        <ul>
          <li><a href="https://netflix.com/">Netflix</a></li>
          <li><a href="https://plex.hbh7.com">Hunterflix</a></li>
          <li><a href="https://www.reddit.com/">Reddit</a></li>
          <li></li>
	  <li></li>
        </ul>
      </div>
      <div class="list right2">
        <h1 id="sidebarRight2" style="height: 24px">¯\_(ツ)_/¯</h1>
        <ul>
          <li><a href="http://patorjk.com/games/snake/">Snake</a></li>
          <li><a href="http://agar.io/">Agar</a></li>
          <li><a href="http://slither.io/">Slither</a></li>
	  <li><a href="http://2048game.com/">2048</a></li>
	  <li><a href="https://hbh7.com/games">hbh7's Games</a></li>
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
