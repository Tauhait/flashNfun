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
<title>Rescue Chikachu</title>
<link rel="shortcut icon" href="pika.ico" />
<script type="text/javascript" src="jquery-3.2.0.js"></script>
<script src='jquery.overlaps.js'></script>
<script>
	function letsplay(){
		document.getElementById("letsplay").setAttribute("hidden","true");
		document.getElementById("gameboard").removeAttribute("hidden");
		setAudio();	
		startGame();
		setImg();
		
	}
</script>
<style>body{background:url("rocks2.png");margin:0;padding:0}#myCanvas{top:100px;left:250px;width:768px;height:500px;position:absolute;background:url("pikachu_background.jpg")}.backbtn{position:absolute;top:160px;left:1000px;width:70px;height:20px}.playAgain{position:absolute;top:3%;left:82%;width:150px;height:90px}#sendMyScore{position:absolute;top:160px;left:110px;width:100px;height:70px;text-align:center;background-color:#2f313d;color:#fff;font-family:cooper;font-size:22px;border:1px dotted;border-radius:25px/25px;cursor:pointer}#controls1{//background-color:black;position:absolute;height:20px;width:300px;top:0;left:0;font-family:cooper;font-size:30px;color:#fff;margin:10px}#controls2{//background-color:black;position:absolute;height:50px;width:350px;top:30px;left:0;font-family:cooper;font-size:30px;color:#fff;margin:10px}#foot{position:absolute;width:100%;height:30px;top:100%;font-family:"Cooper",serif;font-size:25px;text-align:center;background-color:#fc9}button{background-color:#4caf50;border:2px solid #4caf50;color:white;padding:15px 32px;text-align:center;text-decoration:none;font-family:chiller;font-size:25px;display:inline-block;width:100%;//margin:4px 2px;cursor:pointer;border-radius:10px;transition-duration:.4s;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}button:hover{background-color:#ffff2a;color:white}.life{position:absolute;top:85%;left:80%;width:200px;height:50px}#l3{visibility:visible}#l2{visibility:visible}#l1{visibility:visible}#bttn{position:absolute;top:50%;left:40%;width:150px;height:85px}</style>
</head>
<body oncontextmenu="return false">
<div id="letsplay" onclick="letsplay();">
<button class="w3-btn w3-white w3-hover-purple w3-border w3-border-red w3-round-large" id="bttn" onclick="letsplay();">Lets Play!</button>
</div>
<div id="gameboard" hidden>
<h1 style="color:white;font-weight:bold;font-family:Papyrus;font-size:30px;width:350px;left:500px;top:10px;position:absolute;text-align:center">Rescue Chikachu</h1>
<div id="controls1">
<div>
Score :
<span id="scoreboard">0</span>
</div>
</div>
<div id="controls2">
<div>
Best Score :
<span id="bestscore">0</span>
</div>
</div>
<div class="backbtn">
<a id="sendMyScore" onclick="goBack();window.location.href='game4.php?pid='+pid+'&score='+score">
<br>Quit
</a>
</div>
<button class="playAgain" onclick="playAgain()">
Play Again
</button>
<canvas id="myCanvas" width="800" height="482" style="border:#ffff2a solid">
</canvas>
<div class="life">
<img id="l1" src="heart.png"/>
<img id="l2" src="heart.png"/>
<img id="l3" src="heart.png"/>
</div>

</div>
<script><?php extract($_GET); ?>
var pid = <?php echo json_encode($pid, JSON_HEX_TAG); ?>;
console.log(pid);
</script>
<script src="chikachu.js"></script>


<div id="foot">Copyright&#169;flashnfun.info</div> 
</body>
</html>
<?php
