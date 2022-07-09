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
<title>PRIMAL CRIMES</title>
<audio controls loop autoplay hidden>
<source src=mp.mp3 type=audio/mpeg>
</audio>
<link rel=stylesheet href=primalcrimes_c.css>
<script>var message="**Sorry!! You cannot check the source code**";function rtclickcheck(a){if(navigator.appName=="Netscape"&&a.which==3){alert(message);return false}if(navigator.appVersion.indexOf("MSIE")!=-1&&event.button==2){alert(message);return false}}document.onmousedown=rtclickcheck;document.onkeydown=function(a){if(a.keyCode==123){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="I".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="J".charCodeAt(0)){return false}if(a.ctrlKey&&a.keyCode=="U".charCodeAt(0)){return false}if(a.ctrlKey&&a.shiftKey&&a.keyCode=="C".charCodeAt(0)){return false}};<?php extract($_GET); ?>var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;</script>
<style>body,html{margin:0;padding:0;height:100%}body{background-size:cover;font-family:'Cabin Condensed',sans-serif;display:flex;flex-direction:column;justify-content:center;align-items:center}svg{font-weight:bold;max-width:600px;height:auto}#start{border:2px transparent;text-align:center;font-family:Comic Sans MS;color:white;font-size:25px;padding:20px}button{background-color:#4caf50;border:2px solid #4caf50;color:white;padding:15px 32px;text-align:center;text-decoration:none;font-family:chiller;font-size:50px;font-weight:bold;display:inline-block;width:100%;//margin:4px 2px;cursor:pointer;border-radius:8px;transition-duration:.4s;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}.button{background-color:white;color:black;border:2px solid #f44336}.button:hover{background-color:#f44336;color:white}mark{background-color:white;color:black}</style>
</head>
<body background=pair_img.jpg>
<h1 align=center style=color:BLACK><mark><strong>PRIMAL CRIMES</strong></mark></h1>
<div id=container>
<h2 id=instruct><mark><span style=color:violet>Click on the </span><span style=color:indigo>boxes</span>.<span style=color:blue>Find the correct pair of images. </span><br><span style=color:Green>If the pair matches then you can see the images of the corresponding pair displayed in the screen and you get 10 points. </span><br><span style=color:#FFD700>You can use Timer to play the game or you can play normally. Choice is yours!! </span><span style=color:orange>To play using Timer, click on Clock Button displayed on the screen.</span><span style=color:red>Click on the Start Button to play the game</span></mark></h2>
<input type=button onclick="document.location.href='pair (2).php?pid='+pid" id=btn_start value="START";">
</div>
<svg viewbox="0 0 100 20">
<defs>
<linearGradient id=gradient x1=0 x2=0 y1=0 y2=1>
<stop offset=5% stop-color="#326384"/>
<stop offset=95% stop-color="#123752"/>
</linearGradient>
<pattern id=wave x=0 y=0 width=120 height=20 patternUnits=userSpaceOnUse>
<path id=wavePath d="M-40 9 Q-30 7 -20 9 T0 9 T20 9 T40 9 T60 9 T80 9 T100 9 T120 9 V20 H-40z" mask=url(#mask) fill=url(#gradient)>
<animateTransform attributeName=transform begin=0s dur=1.5s type=translate from=0,0 to=40,0 repeatCount=indefinite />
</path>
</pattern>
</defs>
<text text-anchor=middle x=50 y=15 font-size=17 fill=url(#wave) fill-opacity=0.6>GOOD LUCK</text>
<text text-anchor=middle x=50 y=15 font-size=17 fill=url(#gradient) fill-opacity=0.1>GOOD LUCK</text>
</svg>
</body>