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
<title>Maze Game</title>
<style>body{background:url("mazebackground.png")}#myCanvas{top:75px;left:150px;position:absolute}#scorebox{position:absolute;left:1150px;top:280px;width:160px;height:100px;border-radius:10px;background-color:#33b3f4;visibility:hidden}#bestscore{position:absolute;left:1000px;top:20px;width:320px;height:60px;border-radius:10px;background-color:#33b3f4;visibility:hidden;text-align:center;font-family:areal,verdana;font-size:25px;padding:5px;color:white;font-weight:bold}#bscore{color:black}#sendMyScore{position:absolute;top:300px;left:150px;width:100px;height:70px;text-align:center;background-color:#2f313d;color:#fff;font-family:cooper;font-size:22px;border:1px dotted;border-radius:25px/25px}.backbtn{position:absolute;top:160px;left:1000px;width:70px;height:20px}#scorecard,#scorecard2{position:absolute;left:1170px;font-family:cooper;font-size:30px;visibility:hidden}#scorecard2{top:300px;left:1190px;color:white}#scorecard{top:330px;left:1200px;color:black}#foot{position:absolute;width:100%;height:60px;top:665px;font-family:"cooper",serif;font-size:25px;text-align:center;background-color:#fc9}#start{position:absolute;width:100%;height:100%;background:url("maze1.jpg");background-size:100% 100%;background-repeat:no-repeat}.play{position:absolute;left:43vw;height:70px;width:170px;background-color:black;color:white;font-family:verdana;font-size:30px;border:1px solid black;opacity:1;border-radius:10px}#easy{top:52vh}#normal{top:64vh}#hard{top:76vh}.play:hover{background-color:white;color:black}#won{position:absolute;top:40%;left:30%;height:100px;width:500px;background-color:white;border:2px solid transparent;border-radius:10px;font-family:areal,verdana;background-color:#33b3f4;text-align:center;font-size:30px;visibility:hidden}#won:hover{background-color:white;border:2px solid black;cursor:pointer}#you{color:Black}#score{color:red;margin-top:20px}#play{position:absolute;left:50px;top:43%;height:50px;width:150px;background-color:#33b3f4;text-align:center;font-size:30px;font-family:areal,verdana;border-radius:10px;visibility:hidden;color:white}#play:hover{background-color:white;color:black;cursor:pointer}</style>
<script>/*<![CDATA[*/var message="**Sorry!! You cannot check the source code**";function rtclickcheck(a){if(navigator.appName=="Netscape"&&a.which==3){alert(message);return false}if(navigator.appVersion.indexOf("MSIE")!=-1&&event.button==2){alert(message);return false}}document.onmousedown=rtclickcheck;document.onkeydown=function(a){if(a.keyCode==123){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="I".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="J".charCodeAt(0)){return false}if(a.ctrlKey&&a.keyCode=="U".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="C".charCodeAt(0)){return false}};<?php extract($_GET); ?>var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;var bestscore=0;/*]]>*/</script>
</head>
<body>
<h1 id="head" style="font-family:cooper;font-size:25px;background-color:#0080ff;width:260px;left:500px;position:absolute;visibility:hidden">SOLVE THE MAZE!!!</h1>
<div id="scorebox"></div>
<div id="scorecard2">Time</div>
<div id="scorecard"></div>
<canvas id="myCanvas" width="990" height="570">
<script>/*<![CDATA[*/var width;var height;var time;var timex;var flag;var gFlag=1;var scr;var bestscore=0;var winFlag=0;function re(){if(timex<=0){gFlag=0}else{gFlag=1}show();initiate()}function easyplay(){document.getElementById("myCanvas").style.top="200px";document.getElementById("myCanvas").style.left="350px";width=60;height=30;time=120;show()}function normalplay(){document.getElementById("myCanvas").style.top="150px";document.getElementById("myCanvas").style.left="280px";width=80;height=40;time=250;show()}function hardplay(){document.getElementById("myCanvas").style.top="100px";document.getElementById("myCanvas").style.left="180px";width=90;height=50;time=400;show()}function LetsPlay(){gFlag=1;document.getElementById("play").style.visibility="hidden";iniCon();draw();timex=time;function a(){if(timex<0){flag=0;getresult()}document.getElementById("scorecard").innerHTML=timex--;if(gFlag===1){setTimeout(a,1000)}}if(gFlag===1){a()}}function getresult(){if(flag===0){document.getElementById("you").innerHTML="You Lose !";document.getElementById("score").innerHTML="Score: 0"}else{scr=timex*100;if(scr>bestscore){bestscore=scr;document.getElementById("bscore").innerHTML=bestscore}document.getElementById("you").innerHTML="You Won !";document.getElementById("score").innerHTML="Score: "+scr;gFlag=0}document.getElementById("won").style.visibility="visible";timex=0}function show(){document.getElementById("start").style.visibility="hidden";document.getElementById("scorebox").style.visibility="visible";document.getElementById("scorecard2").style.visibility="visible";document.getElementById("scorecard").style.visibility="visible";document.getElementById("head").style.visibility="visible";document.getElementById("won").style.visibility="hidden";document.getElementById("play").style.visibility="visible";document.getElementById("bestscore").style.visibility="visible"}var start_playing,background_music,win;var moves=0;var blockscovered=0;var generate=new Array();var final_score=0;var u=0;var l=0;var x=0;var y=0;var newx=0;var newy=0;var i=0,j=0,k=0,l=0,m=0;var gate_i=0,gate_j=0;var canvas=document.getElementById("myCanvas");var ctx=canvas.getContext("2d");var container=new Array();function iniCon(){for(i=0;i<height;i++){container[i]=new Array()}for(j=0;j<height;j++){for(k=0;k<width;k++){container[j][k]=1}}}function definesound(){start_sound=document.createElement("AUDIO");start_sound.setAttribute("src","start.wav");background_music=document.createElement("AUDIO");background_music.setAttribute("src","downed_intro_maze.wav");background_music.setAttribute("loop",true);background_music.play();win=document.createElement("AUDIO");win.setAttribute("src","you_won_maze.wav")}var directions=[1,2,3,4];Array.prototype.shuffle=function(){var b=this;for(var a=b.length-1;a>=0;a--){var c=Math.floor(Math.random()*(a+1));var d=b[c];b[c]=b[a];b[a]=d}return b};definesound();function generatemaze(){var a=0;var b=0;container[a][b]=0;carvepath(a,b);return container}function carvepath(b,d){directions.shuffle();for(var a=0;a<directions.length;a++){switch(directions[a]){case 1:if(b-2<=0){continue}if(container[b-2][d]!==0){container[b-2][d]=0;container[b-1][d]=0;carvepath(b-2,d)}break;case 2:if(d+2>=width-1){continue}if(container[b][d+2]!==0){container[b][d+2]=0;container[b][d+1]=0;carvepath(b,d+2)}break;case 3:if(b+2>=height-1){continue}if(container[b+2][d]!==0){container[b+2][d]=0;container[b+1][d]=0;carvepath(b+2,d)}break;case 4:if(d-2<=0){continue}if(container[b][d-2]!==0){container[b][d-2]=0;container[b][d-1]=0;carvepath(b,d-2)}break}}}function draw(){var a=0;var d=0;generate=generatemaze();for(var c=0;c<height;c++){for(var b=0;b<width;b++){if(generate[c][b]===0){gate_i=c;gate_j=b-1}}}generate[gate_i][gate_j]=2;for(var c=0;c<height;c++){for(var b=0;b<width;b++){if(generate[c][b]===0){ctx.fillStyle="#FF0000";ctx.fillRect(a,d,10,10);a+=10}else{if(generate[c][b]===1){ctx.fillStyle="#000000";ctx.fillRect(a,d,10,10);a+=10}else{if(generate[c][b]===2){ctx.fillStyle="#FFFF00";ctx.fillRect(a,d,10,10);a+=10}}}}a=0;d+=10}myplayer(0,0)}function myplayer(a,b){ctx.fillStyle="white";ctx.fillRect(a,b,10,10)}function doKeyDown(a){var b;if(winFlag===0){switch(a.keyCode){case 87:newy=y-5;b=collision();console.log(b);if(b===0){newy=y;b=1}else{if(b===2){win.play();winFlag=1;getresult()}}break;case 83:newy=y+5;b=collision();if(b===0){newy=y;b=1}else{if(b===2){win.play();winFlag=1;getresult()}}break;case 65:newx=x-5;b=collision();if(b===0){newx=x;b=1}else{if(b===2){win.play();winFlag=1;getresult()}}break;case 68:newx=x+5;b=collision();if(b===0){newx=x;b=1}else{if(b===2){win.play();winFlag=1;getresult()}}break}}ctx.clearRect(0,0,1000,580);draw();ctx.fillStyle="#FF0000";ctx.fillRect(0,0,10,10);myplayer(newx,newy);x=newx;y=newy}window.addEventListener("keydown",doKeyDown,true);function collision(){var c=ctx.getImageData(newx,newy,10,10);var b=1;for(var a=0;a<4*10*10;a+=4){red=c.data[a];green=c.data[a+1];blue=c.data[a+2];if(red===0){b=0}if(red===255&&green===255&&blue===0){b=2}}return b}function initiate(){winFlag=0;timex=time;x=0;y=0;newx=0;newy=0;i=0,j=0,k=0,l=0,m=0;gate_i=0,gate_j=0};/*]]>*/</script>
</canvas>
<div class="backbtn">
<a id="sendMyScore" onclick="window.location.href='game5.php?pid='+pid+'&score='+bestscore">
<br>Quit
</a>
</div>
<div id="foot">Copyright &#169; flashnfun.info</div>
<div id="won" onclick="re()"><div id="you"></div><div id="score"></div></div>
<div id="start">
<h1 style="text-align:center;font-size:40px;color:white">THE MAZE GAME</h1>
<p style="text-align:center;color:white;font-size:25px">Guide your player (the white box) to its destination (the yellow box) <br>by solving the maze within the stipulated time.</p>
<h2 style="text-align:center;color:white;position:absolute;top:250px;left:550px">SELECT DIFFICULTY</h2>
<button class="play" id="easy" onclick="easyplay()">Easy</button>
<button class="play" id="normal" onclick="normalplay()">Normal</button>
<button class="play" id="hard" onclick="hardplay()">Hard</button>
</div>
<div id="play" onclick="LetsPlay()">Play</div>
<div id="bestscore">Best Score
<div id="bscore">0</div>
</div>
</body>
</html>