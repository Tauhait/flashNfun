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
<title>Jumping Ball Instructions</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
	body{
	background-image: url("Start.jpg");
    }
	#start{
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
	top: 400px;
	left: 595px;
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
<body>
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
localStorage.setItem('scr1', 0);
</script>
	<div id="start" >
		<br>Welcome to Jumping Ball
		<br>
		<br>
		<br>
		<br>Use the on screen jump button to jump the <span style="color:red;">ball</span>
		<br>Good Luck and Have Fun! <span style="color:yellow; size:40px">&#x263A</span>
	</div>
	
<a href="Jump_ball_game.php" onclick="location.href=this.href+'?pid='+pid;return false;">
	<button class="button">START</button>
	</a>

</body>
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

