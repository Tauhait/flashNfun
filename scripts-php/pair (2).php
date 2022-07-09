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
<body background=crimescene1.jpg>
<title>PRIMAL CRIMES</title>
<link rel=stylesheet href=primalcrimes_c.css>
<h1 align=center style=color:BLACK><strong><mark>PRIMAL CRIMES</mark></strong></h1>
<p><strong>TIMER</P></strong>
</head>
<script>function toggleFullScreen(){if((document.fullScreenElement&&document.fullScreenElement!==null)||(!document.mozFullScreen&&!document.webkitIsFullScreen)){if(document.documentElement.requestFullScreen){document.documentElement.requestFullScreen()}else{if(document.documentElement.mozRequestFullScreen){document.documentElement.mozRequestFullScreen()}else{if(document.documentElement.webkitRequestFullScreen){document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)}}}}else{if(document.cancelFullScreen){document.cancelFullScreen()}else{if(document.mozCancelFullScreen){document.mozCancelFullScreen()}else{if(document.webkitCancelFullScreen){document.webkitCancelFullScreen()}}}}}var message="**Sorry!! You cannot check the source code**";function rtclickcheck(a){if(navigator.appName=="Netscape"&&a.which==3){alert(message);return false}if(navigator.appVersion.indexOf("MSIE")!=-1&&event.button==2){alert(message);return false}}document.onmousedown=rtclickcheck;document.onkeydown=function(a){if(a.keyCode==123){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="I".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="J".charCodeAt(0)){return false}if(a.ctrlKey&&a.keyCode=="U".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="C".charCodeAt(0)){return false}};var countDownInterval=null;<?php extract($_GET); ?>var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;var myscore=0,bstscr=0,currScr=0;var c=0;var t;var timer_is_on=0;var myscore=0,bstscr=0,currScr=0;var sess=0;window.onload=function(){if(sessionStorage.getItem("bestScore")!==null){bstscr=sessionStorage.getItem("bestScore");document.getElementById("scoreboardA").innerHTML=bstscr}else{bstscr=0}};var score=0;function goBack(){myscore=document.getElementById("scoreboardA").innerText;sess=sessionStorage.setItem("bestScore","0");console.log(sess)}function setScore(a){bstscr=document.getElementById("scoreboardA").innerText;currScr=a;if(currScr>bstscr){document.getElementById("scoreboardA").innerText=currScr;bstscr=currScr}document.getElementById("scoreboard").innerText=0;myscore=bstscr}var nrTries=8;var tilesLeft=0;var countdown;var countdown_number;var time;var timex;var flag;var gFlag=1;var pair_array=["pairImg/001.jpg","pairImg/001.jpg","pairImg/002.jpg","pairImg/002.jpg","pairImg/003.jpg","pairImg/003.jpg","pairImg/004.jpg","pairImg/004.jpg","pairImg/005.jpg","pairImg/005.jpg","pairImg/006.jpg","pairImg/006.jpg","pairImg/007.jpg","pairImg/007.jpg","pairImg/008.jpg","pairImg/008.jpg","pairImg/009.jpg","pairImg/009.jpg","pairImg/010.jpg","pairImg/010.jpg","pairImg/011.jpg","pairImg/011.jpg","pairImg/012.jpg","pairImg/012.jpg"];var pair_values=[];var pair_tile_ids=[];var flipped_tiles=0;var tile1;var tile2;c=0;var t;Array.prototype.pair_tile_shuffle=function(){var d=this.length,b,a;while(--d>0){b=Math.floor(Math.random()*(d+1));a=this[b];this[b]=this[d];this[d]=a}};function gen_newBoard(){score=0;flipped_tiles=0;pair_values.length=0;tile1="";tile2="";var a="";pair_array.pair_tile_shuffle();for(var b=0;b<pair_array.length;b++){a=a+'<div id="tile_'+b+'" onclick="pairFlipTile(this,\''+pair_array[b]+"')\"></div>"}document.getElementById("game_arena").innerHTML=a;z=0}function pairFlipTile(b,d){if(b.innerHTML===""&&pair_values.length<2){b.style.background="#FA8072";b.innerHTML='<img src="'+d+'">';if(pair_values.length===0){pair_values.push(d);pair_tile_ids.push(b.id)}else{if(pair_values.length===1){pair_values.push(d);pair_tile_ids.push(b.id);if(pair_values[0]===pair_values[1]){flipped_tiles+=2;score=score+10;document.getElementById("scoreboard").innerText=score;pair_values=[];pair_tile_ids=[];if(flipped_tiles===pair_array.length){setScore(score);window.onbeforeunload=function(){sessionStorage.setItem("bestScore",bstscr)};alert("Yipee.. You won.. Generating a new board for you");location.reload();gen_newBoard()}}else{function a(){var f=document.getElementById(pair_tile_ids[0]);var e=document.getElementById(pair_tile_ids[1]);f.style.background="url(download.png) no-repeat";f.style.backgroundSize="120px 120px";f.innerHTML="";e.style.background="url(download.png) no-repeat";e.style.backgroundSize="120px 120px";e.innerHTML="";pair_values=[];pair_tile_ids=[]}setTimeout(a,1500)}if(bstScr>0&&final_score<bstScr){bstScr=final_score}else{if(bstScr===0){bstScr=final_score}}document.getElementById("scoreboardA").innerHTML=bstScr;console.log(bstScr)}}}}countdown=function(){var k={displayID:"display",finalClass:"final",overClass:"over",initialText:{value:"00:00",label:"Timer"},seconds:{value:90,label:"Time in Seconds"},finalCountdown:{value:10,label:"Warning start"},pauseLabel:{label:"Pause Text"},startLabel:{value:"CLOCK",label:"START"}};var q=k.seconds.value;var f=null;var j=null;var e=null;var d=null;var n=document.createElement("div");n.id=k.displayID;document.body.appendChild(n);n.innerHTML=k.initialText.value;var b=document.createElement("form");document.body.appendChild(b);var i=m("button","startButton",k.startLabel.value);i.onclick=h;b.appendChild(i);var p=m("button","pauseButton",k.pauseLabel.value);function h(){p.disabled=false;i.disabled=true;e=new Date();f=setInterval(countdown.doCountDown,100)}function o(){d=Math.ceil(q-(new Date()-e)/1000);var u=parseInt((d/60)%60);var r=d%60;var s=(u<10?"0":"")+parseInt(u)+":"+(r<10?"0":"")+(r%60);n.innerHTML=s;document.title=s;n.className=(d>k.finalCountdown.value)?"":k.finalClass;if(d===0){setScore(score);window.onbeforeunload=function(){sessionStorage.setItem("bestScore",bstscr)};alert("Game over");location.reload()}}function g(){window.clearTimeout(f);i.disabled=false;p.disabled=false;n.innerHTML=k.initialText.value;f=null;q=k.seconds.value;p.value=k.pauseLabel.value;resetButton.value=k.resetLabel.value;i.value=k.startLabel.value;n.className=""}function a(){if(p.value===k.pauseLabel.value){q=d;window.clearTimeout(f);p.value=k.resumeLabel.value}else{h();p.value=k.pauseLabel.value}}function m(s,v,u){var r=document.createElement("input");r.value=u;r.type=s;if(v){r.id=v}return r}function l(s,u){var r=document.createElement("label");r.appendChild(document.createTextNode(k[u].label));r.htmlFor=u;return r}return{doCountDown:o}}();function rld(){location.reload()};</script>
<div id=timer></div>
<div id=controls1>
<div>
<mark>Score  :   
<span id=scoreboard>0</span>
</mark>
</div>
<div>
<mark>Best Score :
<span id=scoreboardA>0</span>
</mark>
</div>
</div>

<div class=backbtn>
<a id=sendMyScore onclick="goBack();window.location.href='game12.php?pid='+pid+'&score='+myscore">
<br><strong>Quit</strong>
</a>
</div>
<div align: right>
<button id=play onclick=rld()><strong>Play Again</strong></button>
</div>
<audio controls loop autoplay hidden>
<source src=sher.mp3 type=audio/mpeg>
</audio>
<div id=game_arena></div>
<script>gen_newBoard();</script>
<br>
<div id=foot>Copyright&#169; flashNfun.info
</div>
</body>
</html>