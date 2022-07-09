<?php 
session_start();
    if(isset($_SESSION["email"]) && !empty($_SESSION["email"])){                          
        extract($_GET);        
    }
    else {       
        header('Location: http://flashnfun.info/index.php');
    }

?>
<html>
<head><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6940337325831962",
    enable_page_level_ads: true
  });
</script>
<title>Ping Pong Instructions</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
	body{
	background-image: url("ping_pong_startpage.jpg");
    }
	
	#name{
	border: 1px transparent;
	text-align: center;
	font-family: cooper;
	font-size: 40px;
	color: red;
	padding: 20px;
	}
	
	#start{
	position: absolute;
	top: 70px;
	left: 180px;
	border: 1px transparent;
	text-align: center;
	font-family: cooper;
	font-size: 30px;
	color: white;
	padding: 20px;
	}
	
	
	.button{
	position: absolute;
	background-color: #f44336;
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	font-family: cooper;
    font-size: 22px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
	top: 480px;
	left: 600px;
	}
	
	.button {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
   }

	.button:hover {
    background-color: #f44336;
    color: white;
	}
	
	
</style>
</head>
<script>
 var message = "**Sorry!! You cannot check the source code**";

    function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }

    if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }

    document.onmousedown = rtclickcheck;
    document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false;
    }      
 }
    <?php extract($_GET); ?>
    var pid = <?php echo json_encode($pid, JSON_HEX_TAG); ?>;
</script>
<body>
	<div id="name">
		<br>Welcome to Ping Pong
	</div>
	<div id="start" >
		<br>
		<br>Grab your friend and play a round of Ping Pong
		<br>
		<br>Player 1 use A and D to move " <span style="color:yellow;" span="size:40px">&#8678</span> "  and  " <span style="color:yellow;" span="size:40px">&#8680</span> "
		<br>Player 2 use Left Arrow and Right Arrow to move " <span style="color:yellow;" span="size:40px">&#8678</span> "  and  " <span style="color:yellow;" span="size:40px">&#8680</span> " 
		<br>
		<br>Lets see who win in 60 seconds!!
		<br>
		<br>Good Luck and Have Fun! <span style="color:yellow;" span="size:40px">&#x263A</span>
	</div>
	
	<a href="ping_pong_gamepage.php" onclick="location.href=this.href+'?pid='+pid;return false;">
	<button class="button">START</button>
	</a>
	<audio src="ping_pong_Theme_music.mp3" autoplay="true"></audio>

</body>
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

