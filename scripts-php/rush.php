<?php 
session_start();
    if(isset($_SESSION["email"]) && !empty($_SESSION["email"])){
    	$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));                            
        extract($_GET);
        $getmyemail =  "select email from playerInfo where pid='$pid'";                                 
        $myEmail = mysqli_fetch_object(mysqli_query($link,$getmyemail))->email;   
        if($_SESSION["email"] != $myEmail)
             header('Location: http://flashnfun.info/index.php');        
    }
    else {       
        header('Location: http://flashnfun.info/index.php');
    }

?>
<html>
<head>
<title>Rush</title>
<link rel="shortcut icon" href="titleLogo.ico" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>body{background-color:white}video{position:fixed;visibility:visible;min-width:100%;min-height:100%;width:auto;height:auto;z-index:-100}#continue{position:fixed;visibility:visible;top:75%;left:30%;font-family:Papyrus;font-size:50px;color:whitesmoke;background-color:black}#instruc{position:fixed;width:375px;height:500px;top:5%;left:33%;visibility:hidden;font-family:Papyrus;font-size:19px;color:whitesmoke;background-color:black;alignment-adjust:central;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);//overflow-y:auto}button{background-color:#4caf50;border:2px solid #4caf50;color:white;padding:15px 32px;text-align:center;text-decoration:none;font-family:chiller;font-size:50px;display:inline-block;width:100%;//margin:4px 2px;cursor:pointer;border-radius:8px;transition-duration:.4s;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}button:hover{background-color:chartreuse;color:white}span{color:crimson;font-weight:bold}#mylogo{position:absolute;visibility:hidden;width:300px;height:300px;left:40%;top:30%;border:0;animation-name:logo;animation-iteration-count:2;animation-timing-function:ease-in-out;animation-play-state:paused;animation-duration:6s}@keyframes logo{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}#loading{position:absolute;visibility:hidden;width:200px;height:100px;top:70%;left:45%;font-size:65px;font-family:Papyrus;font-weight:bold}#selectHeader{position:absolute;left:30%;top:15%}.carSelect{position:absolute;width:600px;height:500px;left:30%;top:25%;visibility:hidden;font-size:25px;font-family:Papyrus;font-weight:bold;color:white;//background-color:darkslategrey;overflow-x:auto}.select{position:relative;width:400px;height:200px;//border-bottom:black;margin-bottom:10px;cursor:pointer;//background-color:darkslategrey}.select:hover{color:#f44336}img{border-color:grey}div{border:0}</style>
<script type="text/javascript" src="jquery-3.2.0.js"></script>
<link rel="stylesheet" href="gameArenaDesign.css"/>
<script>/*<![CDATA[*/<?php extract($_GET); ?>var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;function instruc(){$("#continue").css("visibility","hidden"),$("#instruc").css("visibility","visible")}function logo(){$("#OpeningScene").css("visibility","hidden"),$("body").css("background-color","white"),$(".carSelect").css("visibility","hidden"),$("#mylogo").css("visibility","visible"),$("#mylogo").css("animation-play-state","running"),$("#loading").css("visibility","visible"),setTimeout(function(){var b="RaceArena.php?pid="+pid+"&color="+encodeURIComponent(imageUrl);window.location.href=b},6000)}function selectCar(){$("#continue").css("visibility","hidden"),$("#instruc").css("visibility","hidden"),$(".carSelect").css("visibility","visible"),$("body").css("background-color","grey")}function getCar(b){imageUrl=["car.png","green.png","red.png","orange.png","yellow.png","sky.png"][b],console.log(imageUrl)}var imageUrl;document.onkeydown=function(b){return !b.ctrlKey||67!==b.keyCode&&86!==b.keyCode&&85!==b.keyCode&&117!==b.keyCode};/*]]>*/</script>
</head>
<body onkeypress="instruc()" oncontextmenu="return false">
<video id="OpeningScene" loop autoplay><source src="openingScene.MKV" type="video/mp4"></video>
<div id="continue">Press any key to continue...</div>
<div id="instruc"><center><h2>How to play?</h2>Use <span> a : accelerate, h : horn, b : brake,<br> w : move left, s : move right</span><br>
Top panel have icons of play/pause, restart and exit game.<br>
Bottom panel contain 5 lives which will decrease one by one on collision with other vehicles.<br>
+25 points awarded on moving right<br>
+15 points awarded on moving left<br>
+2 points awarded on accelerating<br>
-30 deducted on collision<br>
-1 on applying brakes<br>
+500 awarded on completing race.<br>
<button onclick="selectCar()">Go to race arena!!</button></center>
</div>
<img id="mylogo" src="logo.png" alt="logo"/>
<div id="loading">loading...</div>
<div id="selectHeader" class="carSelect"><h3>Click on the car you wanna rush with..</h3></div>
<div class="carSelect">
<div class="select" onclick="getCar(0);logo()"><img src="blueThumb.png"/></div>
<div class="select" onclick="getCar(1);logo()"><img src="greenThumb.png"/></div>
<div class="select" onclick="getCar(2);logo()"><img src="redThumb.png"/></div>
<div class="select" onclick="getCar(3);logo()"><img src="orangeThumb.png"/></div>
<div class="select" onclick="getCar(4);logo()"><img src="yellowThumb.png"/></div>
<div class="select" onclick="getCar(5);logo()"><img src="skyThumb.png"/></div>
</div>
</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */