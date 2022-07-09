<html>
<head>
    <title>Tetris</title>
    <style>
        body {
            background: url(tetris_mania.jpg);
            display: flex;
            color: #fff;
            font-family: sans-serif;
            font-size: 2em;
            text-align: center;
        }
		
        .player {
            flex: 1 1 auto;
        }

        canvas {
            border: solid .2em #fff;
            height: 90vh;
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
	<audio src="Tetris.mp3" loop="true" autoplay="true"></audio>
    <div class="player">
        <div class="score"></div>
        <canvas class="tetris" width="240" height="400"></canvas>
    </div>

    <div class="player">
        <div class="score"></div>
        <canvas class="tetris" width="240" height="400"></canvas>
    </div>
		<a href="tetris_mania_index.php" onclick="location.href=this.href+'?pid='+pid;return false;">
<button class="button">Back</button>
</a>
    <script src="arena.js"></script>
    <script src="player.js"></script>
    <script src="tetris.js"></script>
    <script src="main.js"></script>
</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

