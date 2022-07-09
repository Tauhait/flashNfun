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
<title>Snake Game</title>
<link rel="stylesheet" href="styles.css">
</head>
<audio id=myAudio controls autoplay hidden>
<source src="snake_instructions.mp3" type="audio/mpeg">
</audio>
<body id="board" background="light_snake.jpg">
<h1 align="center" style="color:BLACK">SNAKE CLASSICS</h1>
<div id="container">
<h2 id="instruct">Collect the <span style="color:purple">food</span>. Don't run into the walls.<br>Use a(left), w(up), d(right), s(down) to control the <span style="color:brown;padding:3px">snake</span>.<br>Good luck and have fun!</h2>
<input type="button" id="btn_start" value="START">
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
<a id="sendMyScore" onclick="goBack();window.location.href='game3.php?pid='+pid+'&score='+myscore">
<br>Quit
</a>
</div>
<script>/*<![CDATA[*/<?php extract($_GET); ?>var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;console.log(pid);var myscore=0,bestScr=0,currScr=0;var canvas,ctx,keystate,frames,score,dieScore,played;function goBack(){myscore=document.getElementById("scoreboardA").innerText}function setScore(a){bestScr=document.getElementById("scoreboardA").innerText;currScr=a;if(currScr>bestScr){document.getElementById("scoreboardA").innerText=currScr;bestScr=currScr}document.getElementById("scoreboard").innerText=0;myscore=bestScr}window.onload=function(){var d=26,q=26;var A=0,t=1,v=2;var n=0,e=1,l=2,r=3;var z=65,o=87,i=68,f=83;var x=new Audio("theme.mp3");x.volume=0.5;var u=new Audio("Jump.mp3");u.volume=0.2;var c=new Audio("level.mp3");c.volume=0.2;var y=new Audio("power.mp3");y.volume=0.4;var b=new Audio("buzzer.mp3");b.volume=0.2;var a={width:null,height:null,grid:null,init:function(E,F,D){this.width=F;this.height=D;this.grid=[];for(var C=0;C<F;C++){this.grid.push([]);for(var B=0;B<D;B++){this.grid[C].push(E)}}},set:function(D,C,B){this.grid[C][B]=D},get:function(C,B){return this.grid[C][B]}};var g={direciton:null,last:null,_queue:null,init:function(D,C,B){this.direction=D;this._queue=[];this.insert(C,B)},insert:function(C,B){this._queue.unshift({i:C,j:B});this.last=this._queue[0]},remove:function(){return this._queue.pop()}};function m(){var E=[];for(var D=0;D<a.width;D++){for(var C=0;C<a.height;C++){if(a.get(D,C)===A){E.push({i:D,j:C})}}}var B=E[Math.floor(Math.random()*E.length)];a.set(v,B.i,B.j)}function h(){canvas=document.createElement("canvas");canvas.width=d*20;canvas.height=q*20;ctx=canvas.getContext("2d");ctx.shadowBlur=20;ctx.shadowColor="DARKGREEN";container.appendChild(canvas);frames=0;keystate={};document.addEventListener("keydown",function(B){keystate[B.keyCode]=true});document.addEventListener("keyup",function(B){delete keystate[B.keyCode]});p();w()}function p(){score=0;played=false;snakeColor="brown";a.init(A,d,q);var B={i:Math.floor(d/2),j:q-1};g.init(e,B.i,B.j);a.set(t,B.i,B.j);m()}function w(){if(score>=150&&score<=160){if(score===160&&!played){c.play();played=true;snakeColor="darkgreen";board.style.backgroundColor="gold"}else{if(score===160){played=false}}}else{if(score>=100&&score<=110){if(score===110&&!played){c.play();played=true;snakeColor="lightgreen";board.style.backgroundColor="green"}else{if(score===110){played=false}}}else{if(score>=70&&score<=80){if(score===80&&!played){c.play();played=true;snakeColor="blue";board.style.backgroundColor="darkblue"}else{if(score===80){played=false}}}else{if(score>=40&&score<=50){if(score===50&&!played){c.play();played=true;snakeColor="orange";board.style.backgroundColor="lightblue"}else{if(score===50){played=false}}}}}}if(dieScore>=10&&score===0){x.pause();x.currentTime=0;ctx.fillStyle="#FFF";ctx.fillRect(0,0,canvas.width,canvas.height);ctx.fillStyle="#000";ctx.font="50pt Arial";setScore(dieScore);ctx.fillText("SCORE: "+dieScore,50,canvas.height/2);dieScore=0;y.play();setTimeout(function(){b.play()},750);setTimeout(s,4000);return false}document.getElementById("scoreboard").innerText=score;j();k();window.requestAnimationFrame(w,canvas)}function s(){container.removeChild(canvas);btn_start.style.display="block";instruct.style.display="block";board.style.backgroundColor="lightgreen"}function j(){frames++;if(keystate[z]&&g.direction!==l){g.direction=n}if(keystate[o]&&g.direction!==r){g.direction=e}if(keystate[i]&&g.direction!==n){g.direction=l}if(keystate[f]&&g.direction!==e){g.direction=r}if(frames%2===0){var B=g.last.i;var D=g.last.j;switch(g.direction){case n:B--;break;case e:D--;break;case l:B++;break;case r:D++;break}if(0>B||B>a.width-1||0>D||D>a.height-1||a.get(B,D)===t){return p()}if(a.get(B,D)===v){var C={i:B,j:D};score+=10;myScore=score;document.getElementById("scoreboard").innerText=score;u.play();dieScore=score;m()}else{var C=g.remove();a.set(A,C.i,C.j);C.i=B;C.j=D}a.set(t,C.i,C.j);g.insert(C.i,C.j)}}function k(){var B=canvas.width/a.width;var E=canvas.height/a.height;for(var D=0;D<a.width;D++){for(var C=0;C<a.height;C++){switch(a.get(D,C)){case A:ctx.fillStyle="#FFF";break;case t:ctx.fillStyle=snakeColor;break;case v:ctx.fillStyle="#8A2BE2";break}ctx.fillRect(D*B,C*E,B,E)}}ctx.fillStyle="#000";ctx.font="20px Arial";currScr=document.getElementById("scoreboard").innerHTML;ctx.fillText("SCORE: "+score,5,canvas.height-5)}btn_start.onclick=function(){myAudio.pause();x.play();btn_start.style.display="none";instruct.style.display="none";h()}};/*]]>*/</script>
<br><br><br><br><br><br>
<div id="foot">Copyright&#169; flashnfun.info
</div>
</body>
</html>