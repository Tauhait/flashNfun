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
<title>Tic-Tac-Toe</title>
<link rel="shortcut icon" href="tttIcon.ico" />
<script type="text/javascript" src="jquery-3.2.0.js"></script>
<script>/*<![CDATA[*/var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;function instruc(){$("#continue").css("visibility","hidden");$("#instruc").css("visibility","visible")}function logo(){$("#OpeningScene").css("visibility","hidden");$("#instruc").css("visibility","hidden");$("#mylogo").css("visibility","visible");$("body").css("background-color","white");$("#mylogo").css("animation-play-state","running");setTimeout(function(){var a="tictactoe.php?pid="+pid;window.location.href=a},6000)}document.onkeydown=function(a){return !a.ctrlKey||67!==a.keyCode&&86!==a.keyCode&&85!==a.keyCode&&117!==a.keyCode};/*]]>*/</script>
</script>
<style>#continue{position:fixed;visibility:visible;top:65%;left:80%;font-family:Papyrus;font-size:22px;color:whitesmoke;background-color:black}video{position:fixed;visibility:visible;min-width:100%;min-height:100%;width:auto;height:auto;z-index:-100}#instruc{position:fixed;width:375px;height:550px;top:1%;left:33%;visibility:hidden;font-family:Papyrus;font-size:19px;color:whitesmoke;background-color:black;alignment-adjust:central;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);//overflow-y:auto}button{background-color:#4caf50;border:2px solid #4caf50;color:white;padding:15px 32px;text-align:center;text-decoration:none;font-family:chiller;font-size:50px;display:inline-block;width:100%;//margin:4px 2px;cursor:pointer;border-radius:8px;transition-duration:.4s;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}button:hover{background-color:chartreuse;color:white}span{color:crimson;font-weight:bold}#mylogo{position:absolute;visibility:hidden;width:500px;height:153px;left:30%;top:30%;border:0;animation-name:logo;animation-iteration-count:3;animation-timing-function:linear;animation-play-state:paused;animation-duration:2s}@keyframes logo{0%{transform:scale(1,1)}50%{transform:scale(1.5,1.5)}100%{transform:scale(1,1)}}</style>
</head>
<body onkeypress="instruc()" oncontextmenu="return false">

<div id="continue">Press any key to continue...</div>
<div id="instruc"><center><h2>How to play?</h2>Use <span> left mouse click to put a mark O/X inside squares.</span><br>
Top panel has a message bar and a game-level mark<span> (Beginner, Novice, Expert).</span><br>
Bottom panel contains 2 buttons <br><span>StartOver : to restart new match,<br>LevelUp : to change game-level</span><br>
Game points depend on the level of gameplay.<br>
Playing in <span>Expert level</span> fetches most points.<br>
Playing in <span>Beginner level</span> fetches least points.<br>
Changing levels resets scoreboard<br>
Randomly it is chosen who will put the first mark between Machine and You<br>
Rules are same as basic 3x3 TTT but scaled to 4x4 TTT<br>
<button onclick="logo()">Play</button></center>
</div>
<img id="mylogo" src="tttLoading.gif" alt="logo"/>
</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */