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
		<meta charset="utf-8" />
		<title>Crystal Breakout</title>
		<link rel="icon" type="image/png" href="icon.png"/>
		<link type="text/css" rel="stylesheet" href="HStyle.css"/>
		<style>
			#sendMyScore{
                            position: absolute;
                            top: 160px;
                            left: 10px;
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
                            top:160px;
                            left:1000px;
                            width: 70px;
                            height: 20px;
                        }
			canvas 
			{
				display:block;
				position:absolute;
				border:6px solid #ffff2a;
				
				opacity:0.73;
				display: block; 
				
				top:70px;
				bottom:0;
				right:0;
				left:20px;
			}
		</style>
	</head>
	<body background="HTB_back.png" style="height:600px">
		 <h1 style="font-family:cooper;  background-color: #ffffff;top: 15px; width:325px; text-align: center">Crystal Breakout</h1>
		<canvas id="myCanvas" width="750" height="500"></canvas>
		<div id="controls">
		<input type="button" class="button1" id="pause" value="PLAY" onclick="game_start.play();resume();">
		<!--<input type="button" class="button2" id="restart" value="QUIT" onClick="Quit();">-->
		<br/><br/>
	</div>
	<div id="controls1">
		<div>
			Score :
			<span id="scoreboard">0</span>
		</div>
        <div>
			Best Score : 
			<span id="scoreboardA">0</span>
		</div>
	</div>
                <div class="backbtn">
                
                   <a id="sendMyScore" onclick="goBack();
                   window.location.href='game2.php?pid=' + pid + '&score=' + myscore;">
                       <br>Quit
                   </a>
                   <!--<input type="button" id="homebtn" class="hmebtn" value="Quit" name="goHome" onclick="goBack();"  
                   <//%=request.getParameter("type")%> <//%=request.getParameter("myScore")%>/>       -->
               
            </div>
		<script>
                        <?php extract($_GET); ?>
                        var pid = <?php echo json_encode($pid, JSON_HEX_TAG); ?>;
                        console.log(pid);	
                        var play = false;
                        var myscore = 0;
                        var bestScr = document.getElementById('scoreboardA').innerText,currScr = 0;
                        if(bestScr > 0)
                            document.getElementById('scoreboardA').innerText = bestScr;
			var canvas = document.getElementById("myCanvas");
			var ctx = canvas.getContext("2d");
			var ballRadius=10;
			var x = canvas.width/3;
			var y = canvas.height-50;
			var dx = -2;
			var dy = -2;
			var game_start = document.createElement("AUDIO");
                        game_start.setAttribute("src","start.wav");
			var bouncingSound=new Audio("bounce.ogg");
			var breakingSound=new Audio("break.ogg");
			var missSound=new Audio("miss.mp3");
			var failureSound=new Audio("boo.mp3");
			var achievementSound=new Audio("applause.mp3");
			
			var paddleHeight=16;
			var paddleWidth=85;
			var paddleX= (canvas.width - paddleWidth)/2;
			var rightPressed=false;
			var leftPressed=false;
			
			var brickRowCount = 8;
			var brickColumnCount = 7;
			var brickWidth = 75;
			var brickHeight = 20;
			var brickPadding = 10;
			var brickOffsetTop = 30;
			var brickOffsetLeft = 30;
			
			var score=0;			
			var lives=3;			
			var gamePaused;	
                        var gameLoop;
			var bricks = [];
			for(c=0; c<brickColumnCount; c++) 
			{
				bricks[c] = [];
				for(r=0; r<brickRowCount; r++) 
				{
					bricks[c][r] = { x: 0, y: 0, status: 1 };
				}
			}
			document.addEventListener("keydown", keyDownHandler, false);
			document.addEventListener("keyup", keyUpHandler, false);
			function init(){
                            play = false;
                            lives = 3;
                            score = 0;
                            paddleHeight=16;
                            paddleWidth=85;
                            paddleX= (canvas.width - paddleWidth)/2;
                            rightPressed=false;
                            leftPressed=false;

                            brickRowCount = 8;
                            brickColumnCount = 7;
                            brickWidth = 75;
                            brickHeight = 20;
                            brickPadding = 10;
                            brickOffsetTop = 30;
                            brickOffsetLeft = 30;
                            x = canvas.width/3;
                            y = canvas.height-50;
                            dx = -2;
                            dy = -2;
                            bricks = [];
                            for(c=0; c<brickColumnCount; c++) 
                            {
                                bricks[c] = [];
                                for(r=0; r<brickRowCount; r++)
                                    bricks[c][r] = { x: 0, y: 0, status: 1 };                                    
                            }
                            resume();
                        }
                        function resume(){
                            //document.getElementById('scoreboardA').innerText = myscore;
                            if(play === false)
                                play = true;
                            else
                                play = false;
                            
                            if(play === true)
                                gameLoop = setInterval(draw,6);
                        }
			function keyDownHandler(e) 
			{
                            if(e.keyCode === 39) 
                                rightPressed = true;
                            else if(e.keyCode === 37) 
                                leftPressed = true;
				
			}
			function keyUpHandler(e) 
			{
                            if(e.keyCode === 39) 
                                rightPressed = false;                            
                            else if(e.keyCode === 37)                            
                                leftPressed = false;                                
			}
			
			function collisionDetection() 
			{
                            for(c=0; c<brickColumnCount; c++)                             
                                for(r=0; r<brickRowCount; r++) 
                                {
                                    var b = bricks[c][r];
                                    if(b.status === 1) 
                                    {
                                        if(x > b.x && x < b.x+brickWidth && y > b.y && y < b.y+brickHeight) 
                                        {
                                            dx = -dx;
                                            b.status = 0;
                                            score+=(1*100);
                                            scoreboard.innerHTML=score;
                                            breakingSound.play();
                                            if(score >= (100*(brickRowCount*brickColumnCount))) 
                                            {
                                                    achievementSound.play();//endGame();
                                                    //alert("Congratulation!! Your Score: "+score);
                                                    //document.location.reload();
                                                    bestScr = document.getElementById('scoreboardA').innerText;
                                                    currScr = score;
                                                    if(currScr > bestScr){
                                                        document.getElementById('scoreboardA').innerText = currScr;
                                                        myscore = currScr;
                                                    }
                                                    currScr = 0;
                                                    document.getElementById('scoreboard').innerText = 0;
                                                    
                                                    GameOver();

                                                    //endGame();
                                                    setTimeout(init,1500);
                                            }
                                        }
                                    }
                                }
                            
			}
			function drawBall() 
			{
                            ctx.beginPath();
                            ctx.arc(x, y, 10, 0, Math.PI*2);
                            ctx.fillStyle = "#FF002A";
                            ctx.fill();
                            ctx.closePath();
			}
                        function drawBallA(){
                            ctx.beginPath();
                            ctx.arc(x,y,10,0,Math.pi*2);
                            ctx.fillStyle = 'white';
                            ctx.fill();
                            ctx.closePath();
                        }
			function drawPaddle() 
			{
                            ctx.beginPath();
                            ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
                            ctx.fillStyle = "white";
                            ctx.fill();
                            ctx.closePath();
			}
                        function drawPaddleA(){
                            ctx.beginPath();
                            ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
                            ctx.fillStyle = "blue";
                            ctx.fill();
                            ctx.closePath();
                        }
			function drawBricks() 
			{
                            for(c=0; c<brickColumnCount; c++)                             
                                for(r=0; r<brickRowCount; r++)                               
                                    if(bricks[c][r].status === 1)
                                    {
                                            var brickX = (r*(brickWidth+brickPadding))+brickOffsetLeft;
                                            var brickY = (c*(brickHeight+brickPadding))+brickOffsetTop;

                                            bricks[c][r].x = brickX;
                                            bricks[c][r].y = brickY;

                                            ctx.beginPath();
                                            ctx.rect(brickX, brickY, brickWidth, brickHeight);
                                            ctx.fillStyle = "#55d4af";
                                            ctx.fill();
                                            ctx.closePath();
                                    }
                                
                            
			}
			function drawScore() 
			{
				ctx.font = "16px cooper";
				ctx.fillStyle = "#ffffff";
				ctx.fillText("Score: "+score, 8, 20);
			}
			function drawLives() 
			{
				ctx.font = "16px cooper";
				ctx.fillStyle = "#ff002a";
				ctx.fillText("Lives: "+lives, canvas.width-65, 20);
			}		
			function endGame() 
                        { 
                            clearInterval(gameLoop); 
                            //ctx.rect(0,0,canvas.width,canvas.height); 
                            ctx.fillRect(0,0,canvas.width,canvas.height); 
                            ctx.fillStyle="black"; 
                            ctx.font='60px cooper'; 
                            ctx.fillText('GAME OVER',220,210); 
                        }
                        function GameOver() 
                        { 
                            clearInterval(gameLoop); 
                            //ctx.rect(0,0,canvas.width,canvas.height); 
                            ctx.fillRect(0,0,canvas.width,canvas.height); 
                            ctx.fillStyle="green"; 
                            ctx.font='60px cooper'; 
                            ctx.fillText('GAME OVER',220,210); 
                        }

			function draw() 
			{
                            ctx.clearRect(0, 0, canvas.width, canvas.height);				
                            drawBricks();
                            drawBall();
                            drawPaddle();
                            drawScore();
                            drawLives();				
                            collisionDetection();

                            if(x + dx > canvas.width-ballRadius || x + dx < ballRadius)
                            {
                                    dx = -dx;
                                    bouncingSound.play();
                            }
                            if(y + dy < ballRadius)
                            {
                                    dy = -dy;
                                    bouncingSound.play();
                            }
                            else if(y + dy > canvas.height-ballRadius)
                            {
                                if(x > paddleX && x < paddleX + paddleWidth)
                                {
                                        dy = -dy;
                                        bouncingSound.play();
                                }
                                else
                                {
                                    lives--;
                                    missSound.play();drawBallA();drawPaddleA();

                                    if(lives===0)
                                    {	
                                    	score-=2500;				
                                        failureSound.play();
                                        //alert("GAME OVER!! Your Score: "+score);
                                        
                                        bestScr = document.getElementById('scoreboardA').innerText;
                                        currScr = score;
                                        if(currScr > bestScr){
                                            document.getElementById('scoreboardA').innerText = currScr;
                                            myscore = currScr;
                                        }
                                        currScr = 0;
                                        document.getElementById('scoreboard').innerText = 0;
                                        
                                        endGame();
                                        setTimeout(init,3500);
                                        
                                        //document.load();
                                        //document.location.reload();
                                    }
                                    else 
                                    {
                                        x = canvas.width/2;
                                        y = canvas.height-30;
                                        dx = -3;
                                        dy = -3;
                                        paddleX = (canvas.width-paddleWidth)/2;
                                    }
                                }
                            }
                            if(rightPressed && paddleX < canvas.width-paddleWidth) 				
                                paddleX += 7;

                            else if(leftPressed && paddleX > 0) 				
                                paddleX -= 7;

                            x += dx;
                            y += dy;
			}
			
                        function goBack(){
                         
                            myscore = document.getElementById('scoreboardA').innerText;                         
                            
                            console.log(myscore);
                        }
		</script>		
		<div id="foot">Copyright &#169; flashnfun.info
		</div>
	</body>
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

