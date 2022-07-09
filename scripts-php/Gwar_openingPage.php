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
<title>Galaxy War</title>
<link rel="icon" type="image/png" href="ship.png" />
<script src="js/jquery-3.1.1.min.js"></script>
<script>/*<![CDATA[*/var message="**Sorry!! You cannot check the source code**";function rtclickcheck(a){if(navigator.appName=="Netscape"&&a.which==3){alert(message);return false}if(navigator.appVersion.indexOf("MSIE")!=-1&&event.button==2){alert(message);return false}}document.onmousedown=rtclickcheck;document.onkeydown=function(a){if(a.keyCode==123){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="I".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="J".charCodeAt(0)){return false}if(a.ctrlKey&&a.keyCode=="U".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="C".charCodeAt(0)){return false}};<?php extract($_GET); ?>var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;function instruc(){$("#continue").css("visibility","hidden");$("#instruc").css("visibility","visible")}function logo(){var a="GW.php?pid="+pid;window.location.href=a};/*]]>*/</script>
<style>#continue{position:fixed;visibility:visible;top:15%;left:5%;width:20%;font-family:bradley hand itc;font-size:22px;font-weight:bold;color:darkred;background-color:blanchedalmond}video{position:fixed;visibility:visible;min-width:100%;//min-height:100%;width:auto;height:auto;z-index:-100}#instruc{position:fixed;width:375px;height:550px;top:8%;left:38%;visibility:hidden;font-family:Papyrus;font-size:19px;font-weight:bold;color:indianred;background-color:khaki;alignment-adjust:central;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);//overflow-y:auto}button{background-color:#4caf50;border:2px solid #4caf50;color:white;padding:15px 32px;text-align:center;text-decoration:none;font-family:chiller;font-size:50px;font-weight:bold;display:inline-block;width:100%;//margin:4px 2px;cursor:pointer;border-radius:8px;transition-duration:.4s;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}button:hover{background-color:palegreen;color:#4caf50}span{color:darkolivegreen;font-weight:bold}#mylogo{position:absolute;visibility:hidden;width:500px;height:153px;left:30%;top:30%;border:0;animation-name:logo;animation-iteration-count:3;animation-timing-function:linear;animation-play-state:paused;animation-duration:2s}@keyframes logo{0%{transform:scale(1,1)}50%{transform:scale(1.5,1.5)}100%{transform:scale(1,1)}}</style>
</head>
<body onkeypress="instruc()">
<video id="OpeningScene" loop autoplay><source src="GWar.mp4" type="video/mp4"></video>
<div id="continue">Press any key to continue...</div>
<div id="instruc"><center><h2><span>How to play?</span></h2>This is a game where you will have to shoot all your enemies down.
To control the given spaceship you will have to press<span> Left, Right, Up and Down keys on your keyboard</span> and to shoot
you have to press the<span> Spacebar. </span><br>
On every successful hit you will get <span> +50 points. </span><br>
And if the enemy ship knock you down then you will gonna lose<br><span>-1000 points </span> from your pocket. <br>
Let see how long you can survive!!<br><br>
<span>Best of luck!!</span><br><br>
<button onclick="logo()">Go to Space Arena</button></center>
</div>
</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */