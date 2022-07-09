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
<!DOCTYPE html>
<html>
<head>
<title>Galaxy War</title>
<link rel=icon type=image/png href="ship.png"/>
<link type=text/css rel=stylesheet href="css/bootstrap.css"/>
<link rel=stylesheet href=http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css>
<script src=js/jquery-3.1.1.min.js></script>
<script src=js/bootstrap.js></script>
<script>var message="**Sorry!! You cannot check the source code**";function rtclickcheck(a){if(navigator.appName=="Netscape"&&a.which==3){alert(message);return false}if(navigator.appVersion.indexOf("MSIE")!=-1&&event.button==2){alert(message);return false}}document.onmousedown=rtclickcheck;document.onkeydown=function(a){if(a.keyCode==123){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="I".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="J".charCodeAt(0)){return false}if(a.ctrlKey&&a.keyCode=="U".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="C".charCodeAt(0)){return false}};<?php extract($_GET); ?>var score;var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;function goBack(){score=document.getElementById("bs").innerText};</script>
<style>body{background-image:url("GW_space1.png")}canvas{display:block;position:absolute;border:3px solid #172035;//opacity:.73;display:block;top:70px;bottom:0;right:0;left:20px}#background{z-index:-2}#main{z-index:-1}#ship{z-index:0}#play{width:80px;height:65px;left:950px;top:100px;background:#21120b;position:absolute;color:blanchedalmond;font-size:25px;font-family:papyrus;border-radius:20px/20px;border-color:moccasin;cursor:pointer;outline:0}#play:hover{background:seagreen;color:aquamarine;border-color:aquamarine}#quit{width:80px;height:65px;left:1150px;top:100px;background:#21120b;position:absolute;color:blanchedalmond;font-size:25px;font-family:papyrus;border-radius:20px/20px;border-color:moccasin;cursor:pointer;outline:0}#quit:hover{background:crimson;color:cornsilk;border-color:cornsilk}.game-over{position:absolute;top:42%;left:21%;color:deeppink;text-shadow:0 0 25px moccasin;font-family:cooper;font-size:35px;cursor:default;display:none}.game-over button{width:150px;height:48px;left:45px;//top:100px;background:#292a34;position:absolute;color:blanchedalmond;font-size:25px;font-family:papyrus;border-radius:10px/10px;border-color:moccasin;cursor:pointer;outline:0}.game-over button:hover{color:#cde4e2;border-color:#cde4e2}.loading{position:absolute;top:42%;left:21%;color:cornsilk;font-family:Papyrus;font-size:30px;cursor:none;visibility:disabled}#scoreboard{position:absolute;width:400px;height:100px;left:950px;top:200px}#scoreboard1{position:absolute;width:400px;height:100px;left:840px;top:298px}#bestscore{position:relative;width:100px;height:100px;left:0}#score{position:relative;width:100px;height:100px;left:300px;top:-100px}caption{font-family:fantasy;font-size:15px;width:105px;font-family:Lucida Console;font-weight:bold;color:mistyrose;background-color:lightcoral;border:3px solid darkmagenta}td{position:relative;//left:15%;background-color:lemonchiffon;font-family:Papyrus;font-weight:bold;font-size:20px;font-stretch:expanded}#foot{left:72%;position:absolute;//margin:0;width:250px;height:30px;top:620px;color:tomato;font-family:bradley hand itc;font-size:20px;font-weight:bold;text-align:center;background:#fff;opacity:.7}</style>
</head>
<body>
<script src=GW.js></script>
<h1 style=font-family:papyrus;font-weight:bold;background-color:#172035;color:white;margin:10px;top:10px;width:325px;height:48px;text-align:center>GALAXY WAR</h1>
<div id=controls>
<button id=play onclick=game_start.play();startGame()>Play</button>
<button id=quit onclick="goBack();window.location.href='game11.php?pid='+pid+'&score='+score">Quit</button>
</div>
<div id=scoreboard>
<div id=bestscore>
<table>
<caption>Best Score</caption>
<tr>
<td id=bs><center>0</center></td>
</tr>
</table>
</div>
</div>
<div id=scoreboard1>
<div id=score>
<table>
<caption>Score</caption>
<tr>
<td id=sc><center>0</center></td>
</tr>
</table>
</div>
</div>
<canvas id=background width=770 height=560>
Your browser does not support canvas. Please try again with a different browser.
</canvas>
<canvas id=main width=770 height=560>
</canvas>
<canvas id=ship width=770 height=560>
</canvas>
<div class=game-over id=game-over>GAME OVER<p><button onclick=game.restart()>Play Again</button></p></div>
<div class=loading id=loading>LOADING...<p>Please wait</p></div>
<div id=foot>Copyright &#169; flashnfun.info
</body>
</html>