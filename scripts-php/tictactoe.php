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
<title>Tic-Tac-Toe</title>
<link rel="shortcut icon" href="tttIcon.ico" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script>
	function letsplay(){		
		document.getElementById("letsplay").setAttribute("hidden","true");
		document.getElementById("gameboard").removeAttribute("hidden");
		startGame();
		compMove();
	}
</script>
<script>/*<![CDATA[*/<?php extract($_GET); ?>var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;console.log(pid);var sym1="X";var sym2="O";var currentLevel="Novice";var x=sym1.fontcolor("green");var o=sym2.fontcolor("red");var user=null;var computer=null;var turn=null;var tie=null;var winner=null;var gamesPlayed=0;var computerWon=0;var playerWon=0;var score=0;var oppMid=0;var cross,nought,game_over,err,you_won,you_lost,move_no;var board=[];var rivalRestrict_pos,winning_move,fork_move,fork_called=0,oppCorner,middleMove,break_fork_move;var array=[];var count1=0,count2=0;function move(){this.score=-1;this.move=0}move.prototype={constructor:move};function nextMoveConstructor(c,a){var b=new move();b.score=c;b.move=a;return b}function getNextMove(b,a){return nextMoveConstructor(b,a)}function init(){user=null;computer=null;turn=null;tie=null;winner=null;score=0;move_no=1;for(var a=1;a<=16;a++){board[a]=0}}function startGame(){init();setSound();if(computerWon===0&&playerWon===0){gamesPlayed=0}document.getElementById("g").innerText=gamesPlayed;document.getElementById("c").innerText=computerWon;document.getElementById("p").innerText=playerWon;++gamesPlayed;for(var a=1;a<=16;a++){clearBox(a)}if(Math.random()<0.5){user=x;computer=o;turn=user;if(Math.random()<0.5){turn=computer}}else{user=o;computer=x;turn=computer;if(Math.random()<0.5){turn=user}}playSound("start_game");callMessageSetter()}function setSound(){cross=document.createElement("AUDIO");cross.setAttribute("src","cross.wav");nought=document.createElement("AUDIO");nought.setAttribute("src","nought.wav");game_over=document.createElement("AUDIO");game_over.setAttribute("src","game-over.wav");err=document.createElement("AUDIO");err.setAttribute("src","err.wav");you_won=document.createElement("AUDIO");you_won.setAttribute("src","you_won.wav");you_lost=document.createElement("AUDIO");you_lost.setAttribute("src","you-lost.mp3");game_start=document.createElement("AUDIO");game_start.setAttribute("src","start.wav")}function playSound(a){switch(a){case"cross":cross.play();break;case"nought":nought.play();break;case"game_over":game_over.play();break;case"you_won":you_won.play();break;case"err":err.play();break;case"you_lost":you_lost.play();break;case"start_game":game_start.play();break}}function callMessageSetter(){if(turn!==computer){setMessage("You are "+user+". You start the game.")}else{setMessage("You are "+user+". Computer starts the game.")}}function setMessage(a){document.getElementById("message").innerHTML=a;document.getElementById("levelname").innerHTML="  Level : "+currentLevel}function opp_inMid(e,d,c,b){var a;oppMid=-1;if(computer===x){a=2}else{a=1}if(board[e]===a&&board[b]===0){oppMid=b}else{if(board[b]===a&&board[e]===0){oppMid=e}else{if(board[d]===a&&board[c]===0){oppMid=c}else{if(board[c]===a&&board[d]===0){oppMid=d}}}}if(oppMid!==-1){return true}else{return false}}function compMove(){var a=0;if(turn===computer){if(winner!==null){setMessage(turn+" has won the game!");document.getElementById("g").innerHTML=gamesPlayed;document.getElementById("c").innerHTML=computerWon;playSound("you_lost")}else{if(tie!==null){setMessage("Game Drawn!");document.getElementById("g").innerHTML=gamesPlayed;playSound("game_over")}else{var b=[];if(currentLevel==="Beginner"){b=cellsAvailable();a=takeBlindMove(b)}else{if(currentLevel==="Novice"){updateBoard();var e=Math.floor((Math.random()*10)+1);if(can_I_Win(1,2,3,4)||can_I_Win(5,6,7,8)||can_I_Win(9,10,11,12)||can_I_Win(13,14,15,16)||can_I_Win(1,5,9,13)||can_I_Win(2,6,10,14)||can_I_Win(3,7,11,15)||can_I_Win(4,8,12,16)||can_I_Win(1,6,11,16)||can_I_Win(4,7,10,13)){a=winning_move;console.log("win move = "+a)}else{if(isRivalWinning(1,2,3,4)||isRivalWinning(5,6,7,8)||isRivalWinning(9,10,11,12)||isRivalWinning(13,14,15,16)||isRivalWinning(1,5,9,13)||isRivalWinning(2,6,10,14)||isRivalWinning(3,7,11,15)||isRivalWinning(4,8,12,16)||isRivalWinning(1,6,11,16)||isRivalWinning(4,7,10,13)){a=rivalRestrict_pos;console.log("restrict move = "+a)}else{if(e>=5&&(can_I_fork(1,2,3,4,1,5,9,13)||can_I_fork(1,2,3,4,2,6,10,14)||can_I_fork(1,2,3,4,3,7,11,15)||can_I_fork(1,2,3,4,4,8,12,16)||can_I_fork(5,6,7,8,1,5,9,13)||can_I_fork(5,6,7,8,2,6,10,14)||can_I_fork(5,6,7,8,3,7,11,15)||can_I_fork(5,6,7,8,4,8,12,16)||can_I_fork(9,10,11,12,1,5,9,13)||can_I_fork(9,10,11,12,2,6,10,14)||can_I_fork(9,10,11,12,3,7,11,15)||can_I_fork(9,10,11,12,4,8,12,16)||can_I_fork(13,14,15,16,1,5,9,13)||can_I_fork(13,14,15,16,2,6,10,14)||can_I_fork(13,14,15,16,3,7,11,15)||can_I_fork(13,14,15,16,4,8,12,16)||can_I_fork(1,5,9,13,1,2,3,4)||can_I_fork(1,5,9,13,5,6,7,8)||can_I_fork(1,5,9,13,9,10,11,12)||can_I_fork(1,5,9,13,13,14,15,16)||can_I_fork(2,6,10,14,1,2,3,4)||can_I_fork(2,6,10,14,5,6,7,8)||can_I_fork(2,6,10,14,9,10,11,12)||can_I_fork(2,6,10,14,13,14,15,16)||can_I_fork(3,7,11,15,1,2,3,4)||can_I_fork(3,7,11,15,5,6,7,8)||can_I_fork(3,7,11,15,9,10,11,12)||can_I_fork(3,7,11,15,13,14,15,16)||can_I_fork(4,8,12,16,1,2,3,4)||can_I_fork(4,8,12,16,5,6,7,8)||can_I_fork(4,8,12,16,9,10,11,12)||can_I_fork(4,8,12,16,13,14,15,16)||can_I_fork(1,2,3,4,1,6,11,16)||can_I_fork(1,2,3,4,4,7,10,13)||can_I_fork(13,14,15,16,13,10,7,4)||can_I_fork(13,14,15,16,16,11,6,1))){var d=0;console.log(count1+","+count2);if(count1===2&&count2===2){a=fork_move}else{if(count1===1){for(var c=0;c<array.length/2;c++){d=array[c];if(d!==fork_move&&board[d]===0){a=d;break}}}else{for(var c=array.length/2;c<array.length;c++){d=array[c];if(d!==fork_move&&board[d]===0){a=d;break}}}}console.log("fork move = "+fork_move+",myMove = "+a)}else{if(opp_inCorner(1,4,13,16)){a=oppCorner;console.log("Opp corner = "+a)}else{a=move_anyCorner();if(a===-1){a=takeMasterMove(turn,a)}console.log("Moving to any corner = "+a)}}}}}else{updateBoard();if(move_no<=2){b=cellsAvailable();if(opp_inCorner(1,4,13,16)){a=oppCorner}else{a=move_anyCorner();if(a===-1){a=takeBlindMove(b)}}}else{if(can_I_Win(1,2,3,4)||can_I_Win(5,6,7,8)||can_I_Win(9,10,11,12)||can_I_Win(13,14,15,16)||can_I_Win(1,5,9,13)||can_I_Win(2,6,10,14)||can_I_Win(3,7,11,15)||can_I_Win(4,8,12,16)||can_I_Win(1,6,11,16)||can_I_Win(4,7,10,13)){a=winning_move}else{if(isRivalWinning(1,2,3,4)||isRivalWinning(5,6,7,8)||isRivalWinning(9,10,11,12)||isRivalWinning(13,14,15,16)||isRivalWinning(1,5,9,13)||isRivalWinning(2,6,10,14)||isRivalWinning(3,7,11,15)||isRivalWinning(4,8,12,16)||isRivalWinning(1,6,11,16)||isRivalWinning(4,7,10,13)){a=rivalRestrict_pos}else{if(hasUserForked(1,2,3,4,1,5,9,13)||hasUserForked(1,2,3,4,2,6,10,14)||hasUserForked(1,2,3,4,3,7,11,15)||hasUserForked(1,2,3,4,4,8,12,16)||hasUserForked(5,6,7,8,1,5,9,13)||hasUserForked(5,6,7,8,2,6,10,14)||hasUserForked(5,6,7,8,3,7,11,15)||hasUserForked(5,6,7,8,4,8,12,16)||hasUserForked(9,10,11,12,1,5,9,13)||hasUserForked(9,10,11,12,2,6,10,14)||hasUserForked(9,10,11,12,3,7,11,15)||hasUserForked(9,10,11,12,4,8,12,16)||hasUserForked(13,14,15,16,1,5,9,13)||hasUserForked(13,14,15,16,2,6,10,14)||hasUserForked(13,14,15,16,3,7,11,15)||hasUserForked(13,14,15,16,4,8,12,16)||hasUserForked(1,5,9,13,1,2,3,4)||hasUserForked(1,5,9,13,5,6,7,8)||hasUserForked(1,5,9,13,9,10,11,12)||hasUserForked(1,5,9,13,13,14,15,16)||hasUserForked(2,6,10,14,1,2,3,4)||hasUserForked(2,6,10,14,5,6,7,8)||hasUserForked(2,6,10,14,9,10,11,12)||hasUserForked(2,6,10,14,13,14,15,16)||hasUserForked(3,7,11,15,1,2,3,4)||hasUserForked(3,7,11,15,5,6,7,8)||hasUserForked(3,7,11,15,9,10,11,12)||hasUserForked(3,7,11,15,13,14,15,16)||hasUserForked(4,8,12,16,1,2,3,4)||hasUserForked(4,8,12,16,5,6,7,8)||hasUserForked(4,8,12,16,9,10,11,12)||hasUserForked(4,8,12,16,13,14,15,16)||hasUserForked(1,2,3,4,1,6,11,16)||hasUserForked(5,6,7,8,1,6,11,16)||hasUserForked(9,10,11,12,1,6,11,16)||hasUserForked(13,14,15,16,1,6,11,16)||hasUserForked(1,2,3,4,4,7,10,13)||hasUserForked(5,6,7,8,4,7,10,13)||hasUserForked(9,10,11,12,4,7,10,13)||hasUserForked(13,14,15,16,4,7,10,13)){a=break_fork_move}else{if(can_I_fork(1,2,3,4,1,5,9,13)||can_I_fork(1,2,3,4,2,6,10,14)||can_I_fork(1,2,3,4,3,7,11,15)||can_I_fork(1,2,3,4,4,8,12,16)||can_I_fork(5,6,7,8,1,5,9,13)||can_I_fork(5,6,7,8,2,6,10,14)||can_I_fork(5,6,7,8,3,7,11,15)||can_I_fork(5,6,7,8,4,8,12,16)||can_I_fork(9,10,11,12,1,5,9,13)||can_I_fork(9,10,11,12,2,6,10,14)||can_I_fork(9,10,11,12,3,7,11,15)||can_I_fork(9,10,11,12,4,8,12,16)||can_I_fork(13,14,15,16,1,5,9,13)||can_I_fork(13,14,15,16,2,6,10,14)||can_I_fork(13,14,15,16,3,7,11,15)||can_I_fork(13,14,15,16,4,8,12,16)||can_I_fork(1,5,9,13,1,2,3,4)||can_I_fork(1,5,9,13,5,6,7,8)||can_I_fork(1,5,9,13,9,10,11,12)||can_I_fork(1,5,9,13,13,14,15,16)||can_I_fork(2,6,10,14,1,2,3,4)||can_I_fork(2,6,10,14,5,6,7,8)||can_I_fork(2,6,10,14,9,10,11,12)||can_I_fork(2,6,10,14,13,14,15,16)||can_I_fork(3,7,11,15,1,2,3,4)||can_I_fork(3,7,11,15,5,6,7,8)||can_I_fork(3,7,11,15,9,10,11,12)||can_I_fork(3,7,11,15,13,14,15,16)||can_I_fork(4,8,12,16,1,2,3,4)||can_I_fork(4,8,12,16,5,6,7,8)||can_I_fork(4,8,12,16,9,10,11,12)||can_I_fork(4,8,12,16,13,14,15,16)||can_I_fork(1,2,3,4,1,6,11,16)||can_I_fork(1,2,3,4,4,7,10,13)||can_I_fork(13,14,15,16,13,10,7,4)||can_I_fork(13,14,15,16,16,11,6,1)){var d=0;console.log(count1+","+count2);if(count1===2&&count2===2){a=fork_move}else{if(count1===1){for(var c=0;c<array.length/2;c++){d=array[c];if(d!==fork_move&&board[d]===0){a=d;break}}}else{for(var c=array.length/2;c<array.length;c++){d=array[c];if(d!==fork_move&&board[d]===0){a=d;break}}}}console.log("fork move = "+fork_move+",myMove = "+a)}else{if(opp_inCorner(1,4,13,16)){a=oppCorner}else{a=takeMasterMove(turn,a)}}}}}}}}document.getElementById("b"+a).innerHTML=computer;move_no++;if(computer===x){playSound("cross")}else{playSound("nought")}switchTurn()}}}}function move_anyCorner(){if(board[1]===0){return 1}else{if(board[4]===0){return 4}else{if(board[13]===0){return 13}else{if(board[16]===0){return 16}else{return -1}}}}}function opp_inCorner(e,d,c,b){oppCorner=-1;var a=1,f=1;if(computer===x){a=1}else{a=2}if(a===1){f=2}if(board[e]===f&&board[b]===0){oppCorner=b}else{if(board[d]===f&&board[c]===0){oppCorner=c}else{if(board[b]===f&&board[e]===0){oppCorner=e}else{if(board[c]===f&&board[d]===0){oppCorner=d}}}}if(oppCorner!==-1){return true}else{return false}}function hasUserForked(j,i,h,g,f,d,c,b){var m=0,l=0,e,a=1;var k=[];if(user===x){e=1}else{e=2}if(e===1){a=2}if(board[j]===a||board[i]===a||board[h]===a||board[g]===a||board[f]===a||board[d]===a||board[c]===a||board[b]===a){return false}if(board[j]===e){++m}if(board[i]===e){++m}if(board[h]===e){++m}if(board[g]===e){++m}if(board[f]===e){++l}if(board[d]===e){++l}if(board[c]===e){++l}if(board[b]===e){++l}if(m>=2&&l>=2){k=[j,i,h,g,f,d,c,b];console.log(k);break_fork_move=findCommonMove(k);if(break_fork_move!==-1){return true}else{return false}}else{return false}}function can_I_fork(j,i,h,g,f,d,c,b){++fork_called;count1=0;count2=0;var e,a=1;if(computer===x){e=1}else{e=2}if(e===1){a=2}if(board[j]===a||board[i]===a||board[h]===a||board[g]===a||board[f]===a||board[d]===a||board[c]===a||board[b]===a){return false}if(board[j]===e){++count1}if(board[i]===e){++count1}if(board[h]===e){++count1}if(board[g]===e){++count1}if(board[f]===e){++count2}if(board[d]===e){++count2}if(board[c]===e){++count2}if(board[b]===e){++count2}if(count1>=1||count2>=1){array=[j,i,h,g,f,d,c,b];fork_move=findCommonMove(array);if(fork_move!==-1){console.log(array);return true}else{return false}}else{return false}}function findCommonMove(a){var d;for(var c=0;c<3;c++){d=a[c];for(var b=4;b<a.length;b++){if(a[b]===d&&board[a[b]]===0){return d}}}return -1}function can_I_Win(e,d,c,b){var f=0,a;if(computer===x){a=1}else{a=2}if(board[e]===a){++f}if(board[d]===a){++f}if(board[c]===a){++f}if(board[b]===a){++f}if(f===3){winning_move=findFree_pos(e,d,c,b);if(winning_move!==-1){return true}else{return false}}else{return false}}function isRivalWinning(e,d,c,b){var a,f=0;if(user===x){a=1}else{a=2}if(board[e]===a){++f}if(board[d]===a){++f}if(board[c]===a){++f}if(board[b]===a){++f}if(f===3){rivalRestrict_pos=findFree_pos(e,d,c,b);if(rivalRestrict_pos!==-1){return true}else{return false}}else{return false}}function findFree_pos(d,c,b,a){var e=-1;if(board[d]===0){e=d}else{if(board[c]===0){e=c}else{if(board[b]===0){e=b}else{if(board[a]===0){e=a}}}}return e}function getBestMove(n,k,h,f,m){var e=checkVictory(k);if(e==="computer"){return getNextMove(1,h)}else{if(e==="user"){return getNextMove(-1,h)}else{if(e==="tie"){return getNextMove(0,h)}}}var b=[],a=[];for(var d=1;d<=16;d++){if(board[d]===0){board[d]=n;var l;if(k===computer){if(computer===x){n=2}else{n=1}document.getElementById("b"+d).innerHTML=computer;l=getBestMove(n,user,d,f,m)}else{if(user===x){n=2}else{n=1}document.getElementById("b"+d).innerHTML=user;l=getBestMove(n,computer,d,f,m)}b.push(l);a.push(l.score);if(l.score>f){f=l.score}else{m=l.score}board[d]=0;document.getElementById("b"+d).innerHTML=""}if(f>=m){break}}var c=0;if(k===computer){var j=-99999;for(var g=0;g<a.length;g++){if(a[g]>j){c=g;j=a[g]}}}else{var j=99999;for(var g=0;g<a.length;g++){if(a[g]<j){c=g;j=a[g]}}}return b[c]}function checkVictory(a){if(checkforWinner(a)&&a===computer){return"computer"}else{if(checkforWinner(a)&&a===user){return"user"}else{if(checkforTie()){return"tie"}}}}function updateBoard(){for(var a=1;a<=16;a++){if(document.getElementById("b"+a).innerHTML===""){board[a]=0}else{if(document.getElementById("b"+a).innerHTML===x){board[a]=1}else{board[a]=2}}}}function takeBlindMove(a){if(a.length){return a[Math.floor(Math.random()*a.length)]}}function takeMasterMove(b,a){var c;if(computer===x){c=getBestMove(1,b,a,Number.MIN_VALUE,Number.MAX_VALUE).move}else{c=getBestMove(2,b,a,Number.MIN_VALUE,Number.MAX_VALUE).move}return c}function freeSpaces(){var a=[];for(var b=1;b<=16;b++){if(document.getElementById("b"+b).innerHTML===""){a[b]=b}else{a[b]=Number.NaN}}return a}function nextMove(a){if(turn!==computer){if(winner!==null){setMessage(turn+" has already won the game!")}else{if(a.innerHTML===""){a.innerHTML=user;move_no++;if(user===x){playSound("cross")}else{playSound("nought")}switchTurn()}else{if(tie!==null){setMessage("Game Drawn!");document.getElementById("g").innerHTML=gamesPlayed}else{setMessage("The square is already used.");playSound("err")}}}}setTimeout(compMove,500)}function switchTurn(){if(checkforWinner(turn)){if(turn===user){setMessage("Congratulations!! You won!");++playerWon;playSound("you_won")}else{setMessage("Alas!! You lose!");playSound("you_lost");++computerWon}winner=turn;document.getElementById("g").innerHTML=gamesPlayed}else{if(checkforTie()){tie="tied";setMessage("Its a tie!");playSound("game_over");document.getElementById("g").innerHTML=gamesPlayed}else{if(turn===user){turn=computer;setMessage("It's computer's turn.");setTimeout(compMove,500)}else{turn=user;setMessage("It's your turn.")}}}}function checkforTie(){return isTie()}function isTie(){var a=cellsAvailable();if(a.length){return false}else{return true}}function checkforWinner(b){var a=false;if(checkRow(1,2,3,4,b)||checkRow(5,6,7,8,b)||checkRow(9,10,11,12,b)||checkRow(13,14,15,16,b)||checkRow(1,6,11,16,b)||checkRow(4,7,10,13,b)||checkRow(1,5,9,13,b)||checkRow(2,6,10,14,b)||checkRow(3,7,11,15,b)||checkRow(4,8,12,16,b)){a=true}return a}function checkRow(h,f,j,i,g){var e=false;if(getBox(h)===g&&getBox(f)===g&&getBox(j)===g&&getBox(i)===g){e=true}return e}function cellsAvailable(){var a=[];for(var b=1;b<=16;b++){if(document.getElementById("b"+b).innerHTML===""){a.push(b)}}return a}function levelUp(){switch(currentLevel){case"Beginner":currentLevel="Novice";break;case"Novice":currentLevel="Expert";break;case"Expert":currentLevel="Beginner";break}gamesPlayed=0;computerWon=0;playerWon=0;document.getElementById("g").innerHTML=0;document.getElementById("c").innerHTML=0;document.getElementById("p").innerHTML=0;callMessageSetter()}function getBox(a){return document.getElementById("b"+a).innerHTML}function clearBox(a){document.getElementById("b"+a).innerHTML=""}function calcScore(){if(currentLevel==="Beginner"){return Math.floor(((playerWon*5)-50*computerWon)*0.1*gamesPlayed)}else{if(currentLevel==="Expert"){return Math.floor(((playerWon*100)-5*computerWon)*0.1*gamesPlayed)}else{return Math.floor(((playerWon*50)-2*computerWon)*0.1*gamesPlayed)}}}function setScore(a){score=a}function getScore(){return score}function goBack(){var a;a=calcScore();setScore(a);document.getElementById("hiddenScore").innerText=score;document.getElementById("gameType").innerText=1}document.onkeydown=function(a){return !a.ctrlKey||67!==a.keyCode&&86!==a.keyCode&&85!==a.keyCode&&117!==a.keyCode};/*]]>*/</script>
</script>
<style>body{background-image:url("ttt.png");height:700px;width:1000px}.msgs{font-family:cooper;color:blueviolet;width:400px;height:50px;font-size:20px;font-weight:bold;background-color:palegoldenrod;text-align:center}.levelmsgs{position:absolute;left:500px;top:25px;font-family:cooper;text-align:center;color:crimson;width:200px;height:50px;font-size:20px;font-weight:bold;background-color:yellow;text-align:center}#bigsq{width:400px;height:400px;border:2px;border-width:thin}.smallsq{width:100px;height:100px;border:2px;border-color:#000;border-style:groove;border-radius:15px/15px;background-color:#9fc;text-align:center;font-family:sans-serif;position:relative;font-weight:bold;font-size:80px}.arena{width:900px;height:530px;position:relative}#playarena{width:500px;height:450px;position:relative}.scorestat1{width:200px;height:100px;left:0;top:90px;font-family:cooper;font-size:15px;position:absolute;border:1px white dotted;border-right:3px #2d2dac dashed;border-bottom-right-radius:5px;background-color:white}.scorestat2{width:200px;height:100px;left:200px;top:90px;font-family:cooper;font-size:15px;position:absolute;border-right:3px #2d2dac dashed;border:1px white dotted;background-color:white;border-bottom-right-radius:5px}.scorestat3{width:200px;height:100px;left:400px;top:90px;position:absolute;border:1px white dotted;font-size:15px;font-family:cooper;background-color:white}input{font-family:cooper;font-size:25px;line-height:50px;text-align:center;color:#2d2dac;border-radius:25px/25px;box-shadow:0 0 2px rgba(0,0,0,.5),1px 1px rgba(0,0,0,.3);cursor:pointer}input:hover{background:tomato;color:black}#reset{top:10px;left:0;width:400px;height:50px}.scorecard{left:450px;top:120px;width:600px;height:100px;position:absolute;font-family:cooper;font-size:30px;font-style:oblique;color:blue;border:1px #177888 dotted;border-width:7px;text-align:center;background-color:#fc9}.scorebox{width:200px;height:100px;font-size:25px;font-family:sans-serif;text-align:center;background-color:peachpuff}#foot{width:1330px;height:60px;top:500px;font-family:"cooper",serif;font-size:25px;text-align:center;background-color:#fc9}#sendMyScore{position:absolute;top:170px;left:10px;width:100px;height:70px;text-align:center;background-color:#2f313d;color:#0080ff;font-family:cooper;font-size:22px;border:1px dotted;border-radius:25px/25px}.backbtn{position:absolute;top:170px;left:300px;width:70px;height:20px;cursor:pointer}.levelsetter{position:absolute;top:-100px;left:300px;height:70px;width:70px}#btn{position:absolute;top:50%;left:40%;width:150px;height:65px}</style>
</head>
<body oncontextmenu="return false">
<div id="letsplay">
<button class="w3-btn w3-white w3-hover-purple w3-border w3-border-red w3-round-large" id="btn" onclick="letsplay();">Lets Play!</button>
</div>
<div id="gameboard" hidden>
<h1 style="font-family:cooper;background-color:turquoise;width:400px">Play 4 X 4 Tic-Tac-Toe!</h1>
<div id="message" class="msgs">messages will go here!</div>
<div id="levelname" class="levelmsgs">level name</div>
<div class="arena">
<div id="playarena">
<table border="1" id="bigsq">
<tr>
<td id="b1" class="smallsq" onclick="nextMove(this,1)">
</td>
<td id="b2" class="smallsq" onclick="nextMove(this,2)">
</td>
<td id="b3" class="smallsq" onclick="nextMove(this,3)">
</td>
<td id="b4" class="smallsq" onclick="nextMove(this,4)">
</td>
</tr>
<tr>
<td id="b5" class="smallsq" onclick="nextMove(this,5)">
</td>
<td id="b6" class="smallsq" onclick="nextMove(this,6)">
</td>
<td id="b7" class="smallsq" onclick="nextMove(this,7)">
</td>
<td id="b8" class="smallsq" onclick="nextMove(this,8)">
</td>
</tr>
<tr>
<td id="b9" class="smallsq" onclick="nextMove(this,9)">
</td>
<td id="b10" class="smallsq" onclick="nextMove(this,10)">
</td>
<td id="b11" class="smallsq" onclick="nextMove(this,11)">
</td>
<td id="b12" class="smallsq" onclick="nextMove(this,12)">
</td>
</tr>
<tr>
<td id="b13" class="smallsq" onclick="nextMove(this,13)">
</td>
<td id="b14" class="smallsq" onclick="nextMove(this,14)">
</td>
<td id="b15" class="smallsq" onclick="nextMove(this,15)">
</td>
<td id="b16" class="smallsq" onclick="nextMove(this,16)">
</td>
</tr>
</table>
</div>
<div id="reset">
<input type="button" onclick="startGame();setTimeout(compMove,2000)" name="reset" value="Start Over" />
</div>
</div>
<div class="scorecard">
<h3>Scoreboard</h3>
<div class="scorestat1">
<p>#Games Played</p>
<table class="scorebox">
<tr>
<td>
<p id="g">0</p>
</td>
</tr>
</table>
</div>
<div class="scorestat2">
<p>#Computer Won</p>
<table class="scorebox">
<tr>
<td>
<p id="c">0</p>
</td>
</tr>
</table>
</div>
<div class="scorestat3">
<p>#Player Won</p>
<table class="scorebox">
<tr>
<td>
<p id="p">0</p>
</td>
</tr>
</table>
</div>
<div class="backbtn">
<a id="sendMyScore" onclick="goBack();window.location.href='game1.php?pid='+pid+'&score='+score">
Quit
</a>
</div>
<div>
<p hidden id="hiddenScore">MyScore</p>
<p hidden id="gameType">GameType</p>
</div>
<div id="level" class="levelsetter">
<input type="button" onclick="levelUp();startGame();setTimeout(compMove,2000)" name="setlevel" value="Level Up" />
</div>
</div>
<div id="foot">Copyright &#169; flashnfun.info
</div>
<div>
</div>
</div>
</body>
</html>