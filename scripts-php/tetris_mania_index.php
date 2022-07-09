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
<head>
    <title>Tetris_mania</title>
    <style>
      body {
        background: url(tetris_mania.jpg);
        color: #fff;
        font-family: sans-serif;
        font-size: 2em;
		text-align: center;
      }
      canvas {
        border: solid .2em #fff;
        height: 90vh;
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
			
			.backbtn{
                position:absolute;                           
                top:160px;
                left:1000px;
                width: 70px;
                height: 20px;
				cursor: pointer;
				}
			.button{
				position: absolute;
				background-color: #f44336;
				border: none;
				color: white;
				padding: 16px 32px;
				text-align: center;
				display: inline-block;
				font-family: Comic Sans MS;
				font-size: 22px;
				margin: 4px 2px;
				transition-duration: 0.4s;
				cursor: pointer;
				top:45%;
				left:85%;
		
			}
			.button{
				background-color:white;
				color:black;
				border: 2px solid #f44336;
			}	
			.button:hover{
				background-color: purple;
				color:white;
			}
			#score{
				position: absolute;
				top: 5px;
				left:55%;
				height: 25px;
				width:max-content;
				font-family: Comic Sans MS;
				font-size: 30px;
				color: yellow;
				}
			#bestscore{
				position: absolute;
				top: 40%;
				left: 10%;
				height: 25px;
				width:max-content;
				font-family: Comic Sans MS;
				font-size: 30px;
				color: white;
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
   
         var score;   
    var pid = <?php echo json_encode($pid, JSON_HEX_TAG); ?>;
    function goBack(){
            score = document.getElementById('bstScr').innerText;
        }
</script>
 
</head>
<body>
    
	<h1 style=" font-family: Comic Sans MS;font-size: 25px;background-color:red; width: 270px; left: 1050px;top:10px; position: absolute; text-align: center">TeTris</h1>
	<audio src="bensound-dubstep.mp3" loop="true" autoplay="true"></audio>
    <div>
	Score :
		<div id = "score">0
		</div>
      </div>
	<div id="bestscore">    
				Best Score : <div id="bstScr">0</div>					
    </div>
	<div class="backbtn">
                
            <a id="sendMyScore" onclick="goBack();
                   window.location.href='game9.php?pid=' + pid + '&score=' + score;">
                       <br>Quit
            </a>
                   <!--<input type="button" id="homebtn" class="hmebtn" value="Quit" name="goHome" onclick="goBack();"  
                   <//%=request.getParameter("type")%> <//%=request.getParameter("myScore")%>/>       -->
               
        </div>
		<a href="tetris2p.php" onclick="location.href=this.href+'?pid='+pid;return false;">
		<button class="button">Multi Player</button>
		</a>
        <canvas id="tetris" width="240" height="400" >
   <script src="tetris_mania.js">        
    </script>
    </canvas>
</body>
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

