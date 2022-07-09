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

    
    //echo $pid;
    if(isset($_GET['getScore'])){        
        $rank = array();
        $displayName = array();
        $score = array();
        $index = 1;
        $r = 1;
        
        $getScorecard = "select pid,score from ".$gameType." order by score desc";
        $myScorecard = "select score from ".$gameType." where pid = '$pid'";
        $myName = "select displayname from playerInfo where pid = '$pid'";
        $p10 = mysqli_query($link, $getScorecard);
        
        while($index <= 11){
            $row = mysqli_fetch_assoc($p10);
            $hisId = $row["pid"];
            if ($hisId != $pid) {
                
                $displayName[$index] = mysqli_fetch_object(mysqli_query($link, "select displayname from playerInfo where pid = '$hisId'"))->displayname;
                $currScr = $row["score"];
                $score[$index] = $currScr;
                if($currScr == 0)
                    $rank[$index] = "--";
                else
                    $rank[$index] = $r;
                $index++;
                $r++;
            } else {
                $rank[0] = $index;
                $r++;
            }

            
        }
        if($rank[0] == null)
            $rank[0] = "--";
        
        $index = 1;          
        
        $displayName[0] = mysqli_fetch_object(mysqli_query($link,$myName))->displayname; 
        $score[0] = mysqli_fetch_object(mysqli_query($link,$myScorecard))->score;
        if($score[0] == 0)
            $rank[0] = "--";
    }
    
?>
<script type='text/javascript'>/*<![CDATA[*/<?php extract($_GET); ?>var pid=<?php echo json_encode($pid, JSON_HEX_TAG); ?>;window.onload=function(){var b=<?php echo json_encode($type, JSON_HEX_TAG); ?>;if(b!==null){changeGameName(b)}};function changeGameName(a){console.log("ghange game called");var b=["4x4 Tic-Tac-Toe","Crystal Breakout","Snake Classics","rescue Pikachu","Maze","Copter Crash","Jumping Ball","Rush","Tetris","Ping Pong","Galaxy War","Primal Crimes"];document.getElementById("gameName").innerHTML=b[a]}function goBack(){var a="ProfilePage.php?pid="+pid;window.location.href=a}document.onkeydown=function(b){return !b.ctrlKey||67!==b.keyCode&&86!==b.keyCode&&85!==b.keyCode&&117!==b.keyCode};/*]]>*/</script>
<link rel="shortcut icon" href="flash.ico" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
<link type="text/css" rel="stylesheet" href="style4.css"/>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<body oncontextmenu="return false">
<ul id="drop-nav" class="dropdown-toggle" data-toggle="dropdown">
<li style="font-family:'chiller';font-size:30px;color:yellow;padding:10px 10px">SELECT GAME
<ul class="list">
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game1&type=0&pid='+pid">
4x4 TIC-TAC-TOE</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game2&type=1&pid='+pid;return false;changeGameName(1)">
CRYSTAL BREAKOUT</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game3&type=2&pid='+pid;return false;changeGameName(2)">
SNAKE CLASSICS</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game4&type=3&pid='+pid;return false;changeGameName(3)">
RESCUE PIKACHU</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game5&type=4&pid='+pid;return false;changeGameName(4)">
MAZE</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game6&type=5&pid='+pid;return false;changeGameName(5)">
COPTER CRASH</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game7&type=6&pid='+pid;return false;changeGameName(6)">
JUMPING BALL</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game8&type=7&pid='+pid;return false;changeGameName(7)">
RUSH</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game9&type=8&pid='+pid;return false;changeGameName(8)">
TETRIS</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game10&type=9&pid='+pid;return false;changeGameName(9)">
PING-PONG</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game11&type=10&pid='+pid;return false;changeGameName(10)">
GALAXY WAR</a></li>
<li><a target="test1" class="p" href="scoreCard.php" onclick="location.href=this.href+'?getScore=true&gameType=game12&type=11&pid='+pid;return false;changeGameName(11)">
PRIMAL CRIMES</a></li>
</ul>
</li>
</ul>

<button onclick="goBack()">Go back</button>
<br><br><br><br><br><br>
<h3 style="font-family:papyrus;font-size:85px" align="center" class="area"><strong>SCOREBOARD</strong></h3>
<div id="gameName"></div>
<br>
<table style="height:488px;width:804px" border="5" align="center">
<tbody>
<tr class="params">
<td style="width:100px"><strong>&nbsp;RANK</strong></td>
<td style="width:280px"><strong>&nbsp;DISPLAY NAME</strong></td>
<td style="width:200px"><strong>&nbsp;SCORE</strong></td>
</tr>
<tr class="p1">
<td style="width:100px">&nbsp;<?php echo $rank[1] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[1] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[1] ?></td>
</tr>
<tr class="p2">
<td style="width:100px">&nbsp;<?php echo $rank[2] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[2] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[2] ?></td>
</tr>
<tr class="p3">
<td style="width:100px">&nbsp;<?php echo $rank[3] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[3] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[3] ?></td>
</tr>
<tr class="p4">
<td style="width:100px">&nbsp;<?php echo $rank[4] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[4] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[4] ?></td>
</tr>
<tr class="p5">
<td style="width:100px">&nbsp;<?php echo $rank[5] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[5] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[5] ?></td>
</tr>
<tr class="p6">
<td style="width:100px">&nbsp;<?php echo $rank[6] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[6] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[6] ?></td>
</tr>
<tr class="p7">
<td style="width:100px">&nbsp;<?php echo $rank[7] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[7] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[7] ?></td>
</tr>
<tr class="p8">
<td style="width:100px">&nbsp;<?php echo $rank[8] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[8] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[8] ?></td>
</tr>
<tr class="p9">
<td style="width:100px">&nbsp;<?php echo $rank[9] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[9] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[9] ?></td>
</tr>
<tr class="p10">
<td style="width:100px">&nbsp;<?php echo $rank[10] ?></td>
<td style="width:280px">&nbsp;<?php echo $displayName[10] ?></td>
<td style="width:200px">&nbsp;<?php echo $score[10] ?></td>
</tr>
</tbody>
</table>
<table style="height:20px;width:804px" border="5" align="center">
<tbody>
<tr class="mine">
<td style="width:100px;background-color:cornsilk;color:#004d33;font-weight:bold">&nbsp;<?php echo $rank[0] ?></td>
<td style="width:280px;background-color:cornsilk;color:#004d33;font-weight:bold">&nbsp;<?php echo $displayName[0] ?></td>
<td style="width:200px;background-color:cornsilk;color:#004d33;font-weight:bold">&nbsp;<?php echo $score[0] ?></td>
</tr>
</tbody>
</table>
<div>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_scoreboard -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="9623244132"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</div>
</body>
<div id="copyright"><center>Copyright &#169; flashnfun.info</center></div>
<style>h3{color:#fff;font-size:5px;line-height:72px;margin:0 0 24px;text-align:center;text-transform:uppercase}td{color:#fff;font-family:'Bradley Hand ITC',sans-serif;font-size:30px;font-weight:800;line-height:36px;margin:0 0 22px;text-align:center}#gameName{position:absolute;left:50%;top:30%;visibility:visible;width:200px;height:40px;font-family:Bradley Hand ITC;font-size:15px;color:yellow}body{background:#0d201c;font-family:"Open Sans",Impact}.area{text-align:center;font-size:6.5em;color:#fff;letter-spacing:-7px;font-weight:700;font-family:cooper;text-transform:uppercase;animation:blur 5s ease-out infinite;text-shadow:0 0 5px #fff,0px 0 7px #fff}@keyframes blur{from{text-shadow:0 0 10px #fff,0px 0 10px #fff,0px 0 25px #fff,0px 0 25px #fff,0px 0 25px #fff,0px 0 25px #fff,0px 0 25px #fff,0px 0 25px #fff,0px 0 50px #fff,0px 0 50px #fff,0px 0 50px #7B96B8,0px 0 150px #7B96B8,0px 10px 100px #7B96B8,0px 10px 100px #7B96B8,0px 10px 100px #7B96B8,0px 10px 100px #7B96B8,0px -10px 100px #7B96B8,0px -10px 100px #7b96b8}}ul{font-size:20px}ul{list-style:none;padding:0;margin:0}ul li{display:block;position:relative;float:left;border:1px solid #0d201c}li ul{display:none}ul li a{font-family:'Bradley Hand ITC';display:block;background:#0d201c;padding:15px 10px 7px 25px;text-decoration:overline;left:120px;white-space:nowrap;color:yellow}ul li a:hover{background:black}li:hover ul{display:block;position:absolute}li:hover li{float:none}li:hover a{background:orange}li:hover li a:hover{background:#000}#drop-nav li ul li{border-top:5px}#copyright{position:relative;width:1341px;height:30px;background-color:#4caf50;font-family:Cooper}button{position:absolute;top:1%;left:90%;width:80px;height:50px;background-color:tomato;border:2px solid #4caf50;color:white;//padding:15px 32px;//text-align:center;text-decoration:none;font-family:chiller;font-size:22px;display:inline-block;//margin:4px 2px;cursor:pointer;border-radius:8px;transition-duration:.4s;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}button:hover{background-color:#2d2dac;color:white}</style>