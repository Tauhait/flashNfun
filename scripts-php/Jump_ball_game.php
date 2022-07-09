<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
body{
	background-image: url("mb.jpg");
}
canvas {
    position: absolute;
	top: 60px;
	left: 300px;
    padding: 0;
    margin: auto;
    display: block;
    width: 800px;
    box-shadow: 0 8px 8px 0 rgba(200, 200, 200, 0.3), 0 6px 6px 0 rgba(200, 200, 200, 0.3);	
	border: 1px solid #d3d3d3;
    background-image: url("b1.png");
	background-size: contain;
	
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
	top: 520px;
	left: 620px;
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
#foot{
                position: absolute;
                width: 100%;
                height: 42px;
				left: 0px;
                top: 595px;
                font-family: "cooper", serif;                
                font-size: 25px;
                text-align: center;
                background-color: #fc9;
            }
            #sendMyScore{
                position: absolute;
                top: 300px;
                left: 150px;
                /*padding-left: 15px;*/
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
			
			#scorecard{
			position: absolute;
			top: 200px;
			left: 1150px;
			padding: 10px 10px;
			border: 1px solid black;
			font-family: cooper;
			font-size: 20px;
			background-color: #404040;
			color: white;
			}
			
			#play{
			position: absolute;
                top: 290px;
                left: 1180px;
                /*padding-left: 15px;*/
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
                top:80px;
                left:1030px;
                width: 70px;
                height: 20px;
            }

</style>
</head>
<body onload="startGame()">
<h1 style=" font-family: cooper;font-size: 25px; background-color: orange; width: 225px; left: 590px; position: absolute;color: white;">..Jumping BALL..</h1>
	<div id="scorecard">
        
		<div>
            Score :
            <span id="scoreboard">0</span>
        </div>
        <div>
			Best Score : 
			<span id="bestscore">0</span>
        </div>
    </div>
	<div align: center>
		<button id="play" onclick="rld()">Play Again</button>
	</div> 
	
    <div class="backbtn">
                
         <a id="sendMyScore" onclick="goBack();window.location.href='game7.php?pid=' + pid + '&score=' + bstScr;">
         <br>Quit
         </a>
                   <!--<input type="button" id="homebtn" class="hmebtn" value="Quit" name="goHome" onclick="goBack();"  
                   <//%=request.getParameter("type")%> <//%=request.getParameter("myScore")%>/>       -->
               
    </div>
			<div id="foot">Copyright &#169; flashnfun.info</div>
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
var myGamePiece;
var myObstacles = [];
var mySound;
var myMusic;
var myScore=0;
var score,bstScr;
var temp2;


function startGame() {
    myGamePiece = new component(25, 25, "r1.png", 20, 240, "image");
	mySound = new sound("pacman_death.wav");
	myMusic = new sound("pacman_beginning.mp3");
	myMusic.play();
	myScore = new component("15px", "Consolas", "black", 390, 150, "text");
    myGameArea.start();
}

var bestScr = localStorage.getItem('scr1');
	if(bestScr){
		document.getElementById('bestscore').innerHTML = bestScr;
	}
	
function goBack(){
        bstScr = document.getElementById('bestscore').innerHTML;
    }	

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 480;
        this.canvas.height = 270;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
	
    },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop : function() {
        clearInterval(this.interval);
    }
}

function component(width, height, color, x, y, type) {
	this.type = type;
  if (type == "image") {
    this.image = new Image();
    this.image.src = color;
  }
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;
    this.x = x;
    this.y = y;
	this.gravity = 0.03;
    this.gravitySpeed = 0;
    this.update = function() {
        ctx = myGameArea.context;
		if (type == "image") {
      ctx.drawImage(this.image, 
        this.x, 
        this.y,
        this.width, this.height);
	 }
   

	 else {
			ctx.fillStyle = color;
			ctx.fillRect(this.x, this.y, this.width, this.height);
		}
	ctx.beginPath();
	ctx.moveTo(0,270);
	ctx.lineTo(480, 270);
	ctx.stroke();
    }
 
	this.newPos = function() {
		this.gravitySpeed += this.gravity;
        this.x += this.speedX;
        this.y += this.speedY + this.gravitySpeed;
		
		this.hitBottom();
		this.hitroof();
    }
	this.hitBottom = function() {
        var rockbottom = myGameArea.canvas.height - this.height;
        if (this.y > rockbottom) {
            this.y = rockbottom;
            this.gravitySpeed = 0;
        }
    }
     this.hitroof = function() {
        var rooftop = 140;
        if (this.y < rooftop ) {
            this.y = rooftop;
            this.gravitySpeed = 0.3;
         }
    }
    this.crashWith = function(otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
        }
        return crash;
    }
}

function sound(src) {
    this.sound = document.createElement("audio");
    this.sound.src = src;
    this.sound.setAttribute("preload", "auto");
    this.sound.setAttribute("controls", "none");
    this.sound.style.display = "none";
    document.body.appendChild(this.sound);
    this.play = function(){
        this.sound.play();
    }
    this.stop = function(){
        this.sound.pause();
    }
}

function updateGameArea() {

	
	
    var x, height, gap, minHeight, maxHeight;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
		localStorage.setItem('scr1', document.getElementById('bestscore').innerHTML );
			mySound.play();
            myGameArea.stop();

            return;
        }
    }
    
	myGameArea.clear();
	myGameArea.frameNo += 1;
	myGameArea.frameNo += 1;
	
    
    var z = Math.floor((Math.random() * 70) + 5);
   
    
    if (myGameArea.frameNo == 1 || everyinterval(100)) {
        x = myGameArea.canvas.width;
        y = myGameArea.canvas.height - z;
        myObstacles.push(new component(10, 70, "green", x, y));
    }
	
	if (myGameArea.frameNo == 1 || everyinterval(200)) {
        x = myGameArea.canvas.width;
        y = myGameArea.canvas.height - z;
        myObstacles.push(new component(15, 70, "blue", x, y));
    }
	
	if (myGameArea.frameNo == 1 || everyinterval(300)) {
        x = myGameArea.canvas.width;
        y = myGameArea.canvas.height - z;
        myObstacles.push(new component(17, 70, "yellow", x, y));
    }
	
	if (myGameArea.frameNo == 1 || everyinterval(400)) {
        x = myGameArea.canvas.width;
        y = myGameArea.canvas.height - z;
        myObstacles.push(new component(20, 70, "black", x, y));
    }
	
	if (myGameArea.frameNo == 1 || everyinterval(300)) {
        x = myGameArea.canvas.width;
        y = myGameArea.canvas.height - z;
        myObstacles.push(new component(13, 70, "orange", x, y));
    }
	
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].x += -5;
        myObstacles[i].update();
    }
	
	
	
	myGamePiece.speedX = 0;
    myGamePiece.speedY = 0; 
	
	myScore=myGameArea.frameNo;
	document.getElementById("scoreboard").innerHTML = myScore;
	if(myScore>bestScr){
		document.getElementById('bestscore').innerHTML=myScore;
	}
	
	
    myGamePiece.newPos();
    myGamePiece.update();
	myScore.update();
}

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}
function accelerate(n) {
    myGamePiece.gravity = n;
	setTimeout(function myFu(){myGamePiece.gravity = -(n+0.5);},160)
}

function rld() {
    location.reload();
}

</script>
<br>
<div align="center">
<audio id="sound1" src="jump sound.mp3" preload="auto"></audio>
<button class="button" onclick="accelerate(-1),document.getElementById('sound1').play()">JUMP</button>
</div>




</body>
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

