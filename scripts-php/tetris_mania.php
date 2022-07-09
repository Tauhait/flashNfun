<!DOCTYPE html>
<head>
<title>Tetris_mania Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
	body {
                background: url("inst.jpg");
            }
	#start{
		border: 2px transparent;
		text-align: center;
		font-family: Comic Sans MS;
		color: white;
		font-size: 25px;
		padding: 20px;
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
		top:500px;
		left:610px;
		
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
</script>
</head>
<body>
<audio src="pain.mp3" loop="true" autoplay="true"></audio>

<h1 style="color:white;font-family: Comic Sans MS;font-size: 25px;background-color:purple; width: 270px; left: 520px;top:10px; position: absolute; text-align: center">Tetris</h1>
<div id="start">
<br>Welcome to the world of raining <b>BLOCKS</b>!!
<br>Welcome to the world of <b>TETRIS</b>
<br>Rearrange the falling blocks and prevent them from reaching the top!
<br>USE THE <font color="purple">LEFT</font>, <font color="purple">RIGHT</font> AND <font color="purple">DOWN</font> CURSOR KEYS ON YOUR KEYBOARD TO MOVE THE TETRIS BLOCKS LEFT, RIGHT AND DOWN RESPECTIVELY!!
<br>USE THE <font color="purple">'W'</font> KEY ON THE KEYBOARD TO ROTATE THE BLOCKS CLOCKWISE AND <font color="purple">'Q'</font> TO COUNTER CLOCKWISE.
<br> Lets see how long you can hold them off till they reach the top!!!!!
<br>FOR MULTI PLAYER
<br>PLAYER 1 USE <font color="purple">A</font>, <font color="purple">D</font>, <font color="purple">S</font> AND <font color="purple">Q</font> TO MOVE LEFT , RIGHT , DOWN AND ROTATE THE BLOCK
<br>PLAYER 1 USE <font color="purple">H</font>, <font color="purple">K</font>, <font color="purple">J</font> AND <font color="purple">I</font> TO MOVE LEFT , RIGHT , DOWN AND ROTATE THE BLOCK
</div>
<a href="tetris_mania_index.php" onclick="location.href=this.href+'?pid='+pid;return false;">
<button class="button">GO!!!</button>
</a>

</body><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

