<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Ping-Pong</title>
<style>
canvas { 
	
	position: absolute;
	background-image: url("ping_pong_canvas_background.png"); 
	top: 100px;
	left: 330px;
}
.score{
	position: absolute;
	left: 140px;
	width: max-content;
	height: max-content;
	color: red;
	font-family: verdana;
	font-size: 25px;
	text-align: center;
}
#P1{
	top: 160px;
}
#P2{
	top: 380px;
}
#name{
	position: absolute;
	top: 20px;
	left: 590px;
	width: max-content;
	height: max-content;
	color: red;
	font-family: verdana;
	font-size: 40px;
	text-align: center;
}
#gameover{
	position: absolute;
	top: 145px;
	left: 483px;
	height: 200px;
	width: 300px;
	border: 1px solid red;
	text-align: center;
	padding: 50px;
	font-family: verdana,areal;
	font-size: 50px;
	color: green;
	visibility: hidden;
	background-color: red;
	border-radius: 10px;
}
#gobutton{
	background-color: white;
	position: relative;
	margin-top: 25px;
	color: black;
	padding: 10px;
	font-size: 30px;
	border-radius: 10px;
}
#gobutton:hover{
	background-color: black;
	color: white;
}
#won{
	font-size: 35px;
	color: blue;
}
#sendMyScore{
    position: absolute;
    width: 100px;
    height: 70px;
    text-align: center;
    background-color:  #2f313d;
    color:   #ffffff;
    font-family: cooper;
    font-size: 22px;
    border: 1px dotted;
    border-radius: 25px/25px;
}
.backbtn{
    position:absolute;                           
    top:400px;
    left:1150px;
    width: 70px;
    height: 20px;
	cursor: pointer;
}
#foot{
	position: absolute;
    width: 100%;
    height: 42px;
	left: 0px;
    top: 595px;
    font-family: "cooper", serif;                
    font-size: 25px;
    text-align: center;
    background-color: #fc9
}
#timer {
	position: absolute;
	top: 160px;
	left: 1185px;
	font-size: 30px;
	color: red;
	text-align: center;
}
#bscore{
	position: absolute;
	left: 1137px;
	font-size: 30px;
	color: red;
	top: 270px;
	text-align: center;
}
#tm {
	position: absolute;
	left: 1168px;
	font-size: 30px;
	color: red;
	top: 130px;
	text-align: center;
}

</style>
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
    var bestscore = 0;

</script>
</head>
<body background="ping_pong_background.jpg"> 
<canvas id="myCanvas" width="712" height="400"></canvas>

<div id="name">
	Ping Pong	
</div>
<div id="tm">Timer</div>
<div id="timer">
</div>
<div id="bscore">Best score
<div id="bs">0</div>
</div>
<div class="score" id="P1">Player 1
	<div id="score1">0</div>
</div>
<div class="score" id="P2">Player 2
	<div id="score2">0</div>	
</div>
<div id = "gameover">
Times Up!!
<div id="won">0</div>
<button id="gobutton" onclick="newgame()">Play Again</button>
</div>

<div class="backbtn">
                
            <a id="sendMyScore" onclick="window.location.href='game10.php?pid=' + pid + '&score=' + bestscore;">
                <br>Quit
            </a>              
</div>
<div id="foot">
	Copyright &#169; flashnfun.info
</div>
<audio src="ping_pong_background_music.mp3" autoplay="true"></audio>
<audio id="hit" src="ping_pong_bounce.mp3"></audio>
<audio id="pad" src="ping_pong_paddlesound.mp3"></audio>
<audio id="mis" src="ping_pong_misssound.mp3"></audio>
<audio id="ovr" src="ping_pong_gameover.mp3"></audio>
<script>
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
var ballRadius = 10;
var x = canvas.width/2;
var y = canvas.height-30;

var bestscore = 0;
var dx = 2;
var dy = -2;
var paddleHeight = 10;
var paddleWidth = 80;
var paddleX = (canvas.width-paddleWidth)/2;
var rightPressed = false;
var leftPressed = false;
var aiHeight = 10;
var aiWidth = 80;
var aiX = (canvas.width-aiWidth)/2;
var aPressed = false;
var dPressed = false;
var mScore = 0;
var nScore = 0;
var flag = 1;
var ss = 60;
var s = 60;
var second = -1;
var gflag = 1;
var sflag = 1;
document.addEventListener("keydown", keyDownHandler, false);
document.addEventListener("keyup", keyUpHandler, false);

function keyDownHandler(e) {
    if(e.keyCode == 39) {
        rightPressed = true;
    }
    if(e.keyCode == 37) {
        leftPressed = true;
    }
	if(e.keyCode == 65) {
        aPressed = true;
    }
	else if(e.keyCode == 68) {
        dPressed = true;
    }
}
function keyUpHandler(e) {
    if(e.keyCode == 39) {
        rightPressed = false;
    }
    if(e.keyCode == 37) {
        leftPressed = false;
    }
	if(e.keyCode == 65) {
        aPressed = false;
    }
	else if(e.keyCode == 68) {
        dPressed = false;
    }
	
}



function drawBall() {
    ctx.beginPath();
    ctx.arc(x, y, ballRadius, 0, Math.PI*2);
    ctx.fillStyle = "white";
    ctx.fill();
    ctx.closePath();
}
function drawPaddle() {
    ctx.beginPath();
    ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
    ctx.fillStyle = "yellow";
    ctx.fill();
    ctx.closePath();
}
function drawAi() {
	ctx.beginPath();
	ctx.rect(aiX, aiHeight-10, aiWidth, aiHeight);
	ctx.fillStyle = "lightblue";
    ctx.fill();
    ctx.closePath();
}
function time() {
	
	if(ss<10)
		s = "0" + ss;
	else
		s = ss;	
	
	if(gflag === 1){
		document.getElementById('timer').innerHTML = s;
		ss--;
		if(ss < 0){
		sflag = 0;
		var audio = document.getElementById("ovr");
			audio.play();
			document.getElementById("gameover").style.visibility = "visible";
			if(mScore > nScore){
				if(bestscore < mScore){
					bestscore = mScore ;
					document.getElementById("bs").innerHTML = bestscore*10;
				}
				document.getElementById("won").innerHTML = "Player 1 won";
			}
			if(mScore < nScore){
				if(bestscore < nScore){
					bestscore = nScore ;
					document.getElementById("bs").innerHTML = bestscore*10;
				}
				document.getElementById("won").innerHTML = "Player 2 won";
			}
			if(mScore === nScore){
				document.getElementById("won").innerHTML = "Match Draw";
				document.getElementById("bs").innerHTML = bestscore*0;
				}
			gflag = 0;
			flag = 0;
	}
		second++;
		setTimeout(time,1000);
	}
}


function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawBall();
    drawPaddle();
	drawAi();

 
	
    if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
        dx = -dx;
		var audio = document.getElementById("hit");
		audio.play();
    }
    
	if(y + dy < ballRadius) {
		if(x > aiX && x < aiX + aiWidth) {
            dy = -dy;
			var audio = document.getElementById("pad");
			audio.play();
        }
		else {
		var audio = document.getElementById("mis");
		audio.play();
		document.getElementById("score2").innerHTML = ++nScore*10;
		if(sflag === 0){
			var audio = document.getElementById("ovr");
			audio.play();
			document.getElementById("gameover").style.visibility = "visible";
			if(bestscore > second){
				bestscore = second;
				document.getElementById("bs").innerHTML = bestscore + " Seconds ";
			}
			document.getElementById("won").innerHTML = "Player 2 won";
			flag = 0;
			gflag = 0;
			startgame();
			
		}
		
        x = 300;
		y = 20;
		dy = -dy;
		x += dx;
		y += dy;
		}
		
    }
	
    else if(y + dy > canvas.height-ballRadius) {
		
        if(x > paddleX && x < paddleX + paddleWidth) {
            dy = -dy;
			var audio = document.getElementById("pad");
			audio.play();
			
        }
		
        else {
		
			var audio = document.getElementById("mis");
			audio.play();
			
			document.getElementById("score1").innerHTML = ++mScore*10;
			if(sflag === 0){
			var audio = document.getElementById("ovr");
			audio.play();
			document.getElementById("gameover").style.visibility = "visible";
			if(bestscore > second){
				bestscore = second;
				document.getElementById("bs").innerHTML = bestscore;
			}
			document.getElementById("won").innerHTML = "Player 1 won";
			flag = 0;
			gflag = 0;
			startgame();
			
		}
			x = canvas.width/2;
            y = canvas.height-30;
			dy = -dy;
			x += dx;
			y += dy;
        }
    }
    
    if(rightPressed && paddleX < canvas.width-paddleWidth) {
        paddleX += 5;
    }
    if(leftPressed && paddleX > 0) {
        paddleX -= 5;
    }
    if(dPressed && aiX < canvas.width-aiWidth) {
        aiX += 5;
    }
	else if(aPressed && aiX > 0) {
        aiX -= 5;
    }
	
	
    x += dx;
    y += dy;
}
function startgame(){

	if(flag == 1){
		draw();
		setTimeout(startgame,7);
	}
}
function initiate(){
x = canvas.width/2;
y = canvas.height-30;

 dx = 2;
 dy = -2;
 paddleX = (canvas.width-paddleWidth)/2;
 rightPressed = false;
 leftPressed = false;

 aiX = (canvas.width-aiWidth)/2;
 aPressed = false;
 dPressed = false;
 mScore = 0;
 nScore = 0;
 flag = 1;
 ss = 60;
 s = 60;
 second = -1;
 gflag = 1;
 sflag =  1;
}
function newgame(){
document.getElementById("gameover").style.visibility = "hidden";
document.getElementById("score1").innerHTML = 0;
document.getElementById("score2").innerHTML = 0;
initiate();
startgame();
time();
}
startgame();
time();
</script>
</body>
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

