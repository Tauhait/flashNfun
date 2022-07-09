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
<title>Rescue chika</title>
<link rel="shortcut icon" href="pika.ico" />
<style>#continue{position:fixed;visibility:visible;top:75%;left:30%;font-family:Papyrus;font-size:50px;color:whitesmoke;background-color:black}#instruc{position:fixed;width:375px;height:500px;top:15%;left:33%;visibility:hidden;font-family:Papyrus;font-size:21px;color:whitesmoke;background-color:black;alignment-adjust:central;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);//overflow-y:auto}button{background-color:#4caf50;border:2px solid #4caf50;color:white;padding:15px 32px;text-align:center;text-decoration:none;font-family:chiller;font-size:50px;display:inline-block;width:100%;//margin:4px 2px;cursor:pointer;border-radius:8px;transition-duration:.4s;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}button:hover{background-color:chartreuse;color:white}span{color:crimson;font-weight:bold}#mylogo{position:absolute;visibility:hidden;width:300px;height:300px;left:40%;top:30%;border:0;animation-name:logo;animation-iteration-count:2;animation-timing-function:ease-in-out;animation-play-state:paused;animation-duration:6s}@keyframes logo{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}</style>
<script type="text/javascript" src="jquery-3.2.0.js"></script>
<script>/*<![CDATA[*/<?php extract($_GET); ?>var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;function instruc(){$("#continue").css("visibility","hidden");$("#instruc").css("visibility","visible")}function logo(){var a="save_pikachu.php?pid="+pid;window.location.href=a}document.onkeydown=function(a){return !a.ctrlKey||67!==a.keyCode&&86!==a.keyCode&&85!==a.keyCode&&117!==a.keyCode};/*]]>*/</script>
</head>
<body onkeypress="instruc()" oncontextmenu="return false">

<div id="continue">Press any key to continue...</div>
<div id="instruc"><center><h2>How to play?</h2>To dodge chika use <br><span> a : move left, d : move right</span><br>
chikachu has lost all its powers so now go save her!!<br>
Save chika from colliding with big balls<br>
Bottom panel contain 5 lives which will decrease one by one on collision with big balls.<br>
+100 points awarded on dodging balls<br>
-50 deducted on collision<br>
<button onclick="logo()">Go save Chika!!</button></center>
</div>
</body>
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */