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


<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Copter Crash</title>
<style>
body {
                background: url("background.jpg");
            }
canvas {
    border:1px solid #d3d3d3;
    background-color: #f1f1f1;
	margin-top:10px;
	margin-left:100px;
	
}
            #sendMyScore{
                position: absolute;
                top: 240px;
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
			#play{
                position: absolute;
                top: 148px;
                left: 1148px;
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
			#rld{
                position: absolute;
                top: 280px;
                left: 1148px;
                /*padding-left: 15px;*/
                width: 130px;
                height: 80px;
                text-align: auto;
                background-color:  #2f313d;
               color:   #ffffff;
               font-family: cooper;
               font-size: 20px;
               border: 1px dotted;
               border-radius: 25px/25px;
            }
			
            .backbtn{
                position:absolute;                           
                top:160px;
                left:1000px;
                width: 70px;
                height: 20px;
				}
			#foot{
                position: absolute;
                width: 99%;
                height: 40px;
                top: 580px;
                font-family: "cooper", serif;                
                font-size: 25px;
                text-align: center;
                background-color: #fc9;
            }
	    button {
  margin-top: 10px;
  line-height: 40px;
  font-weight: bold;
  padding: 0 40px;
  background: salmon;
  border: none;
}
button:hover {
  background: lightsalmon;
}	
            

</style>
</head>
<body >
<h1 style=" font-family: Comic Sans MS;font-size: 25px;background-color:red; width: 270px; left: 1050px;top:10px; position: absolute; text-align: center">Copter Crash</h1>
      <div id="controls1">
        <div style=" font-family: Comic Sans MS, bold;font-size: 22px">
				<font color="white">
                <b>Score :
                <span id="scoreboard">0</span>
				</b>
				</font>
        </div>
      </div>
      <div id="controls2" >
        <div style=" font-family: Comic Sans MS, bold;font-size: 22px;">
				<font color="white">
                <b>Best Score :
                <span id="bestscore">0</span>
				</b>
				</font>
        </div>
      </div>
      <div class="backbtn">
                
            <a id="sendMyScore" onclick="goBack();
                   window.location.href='game6.php?pid=' + pid + '&score=' + score;">
                       <br>Quit
            </a>
                   <!--<input type="button" id="homebtn" class="hmebtn" value="Quit" name="goHome" onclick="goBack();"  
                   <//%=request.getParameter("type")%> <//%=request.getParameter("myScore")%>/>       -->
               
        </div>
		<div>
                       <button id="play" onclick="startGame()">Play</button>

					   </div>
		<div>
			 <button id="rld" onclick="location.reload()">Play Again</button>
			  
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
var myBackground;
var myScore=0;
var mySound;
var myMusic;
var myMusic2;
var score;
var temp2;
var m;
var h = -2;

function startGame() {
    myGamePiece = new component(50, 50, "copter2.png", 10, 420, "image");
	myGamePiece.gravity = 0.05;
	myBackground = new component(880, 430, "new_cave_bg.jpg", 0, 0, "image");
	
	mySound = new sound("blast.mp3");
	myMusic = new sound("background_main.mp3");
    myMusic.play(loop="true");
	myMusic2 = new sound("copter.mp3");
	myMusic2.play();
    myGameArea.start();
	
}
var bestScr = localStorage.getItem('scr');
	if(bestScr){
		document.getElementById('bestscore').innerHTML = bestScr;
	}

function goBack(){
        score = document.getElementById('bestscore').innerHTML;
    }

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 880;
        this.canvas.height = 430;
		this.canvas.style.cursor = "none"; //hide the original cursor
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 10);
		 window.addEventListener('keydown', function (e) {
            myGameArea.key = e.keyCode;
        })
        
        window.addEventListener('keyup', function (e) {
            myGameArea.key = false;
        })
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
	this.gravity = 0.05;
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
    }
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;
        this.hitBottom();
        
    }
    	
	this.hitBottom = function() {
        var rockbottom = myGameArea.canvas.height - this.height;
        if (this.y > rockbottom) {
            this.y = rockbottom;  
            
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
function GameOver(){
	ctx.fillRect(0,0,this.canvas.width,this.canvas.height);
	ctx.fillstyle="red";
	ctx.font='60ps Comic Sans MS, bold';
	ctx.filltext('Game Over',220,210);
	}


function updateGameArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
			localStorage.setItem('scr', document.getElementById('bestscore').innerHTML );
			
			myMusic.stop();
			myMusic2.stop();
			mySound.play(loop="false");
			GameOver();
			mySound.stop();
			
			
			myGameArea.stop();
			
            return;
        }
    }
    myGameArea.clear();
	myGameArea.frameNo += 1;
	myBackground.newPos(); 
    myBackground.update();
	myGamePiece.speedX = 0;
    myGamePiece.speedY = 0;
    
    if (myGameArea.key && myGameArea.key == 38) {myGamePiece.speedY = -1; }
    if (myGameArea.key && myGameArea.key == 40) {myGamePiece.speedY = 1; }
    if (myGameArea.touchX && myGameArea.touchY) {
        myGamePiece.x = myGameArea.x;
        myGamePiece.y = myGameArea.y; 
    }
    myGamePiece.newPos();
    myGameArea.frameNo += 1;
    
    if (myGameArea.frameNo == 1 || everyinterval(300)) {
        x = myGameArea.canvas.width;
        minHeight = 20;
        maxHeight = 200;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
        minGap = 70;
        maxGap = 150;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
        myObstacles.push(new component(15, height, "grey", x, 0));
        myObstacles.push(new component(15, x - height - gap, "grey", x, height + gap));
    }
    
    
    
    for (i = 0; i < myObstacles.length; i += 1) {
    	if(myScore>3000&&myScore<3002 || myScore>6000&&myScore<6002 || myScore>9000&&myScore<9002 || myScore>12000&&myScore<12002 || myScore>15000&&myScore1<5002 ){
	myObstacles[i].x -= 1;
        myObstacles[i].update();
	}
        myObstacles[i].x += h;
        myObstacles[i].update();
    }
	myGamePiece.update();
    myScore = myGameArea.frameNo;
	document.getElementById("scoreboard").innerHTML = myScore;
	if(myScore>bestScr){
		document.getElementById('bestscore').innerHTML=myScore;
	}
	
	
    myScore.update();
    
    myGamePiece.update();
	
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

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}
function stopMove() {
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0; 
}

</script>
</body>
</html>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

