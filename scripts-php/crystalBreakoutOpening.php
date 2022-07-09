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
    <head><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6940337325831962",
    enable_page_level_ads: true
  });
</script>
        <title>Crystal Breakout</title>
        <link rel="icon" type="image/png" href="icon.png" />
       <script src="js/jquery-3.1.1.min.js"></script>
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
            function instruc(){
                $('#continue').css('visibility','hidden');
                $('#instruc').css('visibility','visible');
            }
            function logo(){
                var url = 'crystal_breakout.php?pid='+pid;
                window.location.href= url; 
            }
        </script>
        <style>
            #continue{
                position: fixed;
                visibility: visible;
                top: 15%;
                left: 5%;
				width:25%;
                font-family: Papyrus;
                font-size: 22px;
                color: blanchedalmond;
                background-color:darkred;
            }
            video{
                position: fixed;
                visibility: visible;
                min-width: 100%;
                //min-height: 100%;
                width: auto;
                height: 750px;
                z-index: -100;
            }
            #instruc{
                position: fixed;
                width: 375px;
                height: 550px;
                top: 1%;
                left: 33%;
                visibility: hidden;
                font-family: Papyrus;
                font-size: 19px;
				font-weight:bold;
                color: khaki;
                background-color: firebrick;
                alignment-adjust: central;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
                //overflow-y: auto;
                
            }
            button {
                background-color: #4CAF50; /* Green */
                border: 2px solid #4CAF50; /* Green */
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                font-family: chiller;
                font-size: 50px;
				font-weight:bold;
                display: inline-block;
                width: 100%;
                //margin: 4px 2px;
                cursor: pointer;
                border-radius: 8px;
                transition-duration: 0.4s;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            }
            button:hover {
                background-color: palegreen; /* Green */
                color: #4CAF50;
            }
            span{
                color: lemonchiffon;
                font-weight: bold;
                
            }
            
        </style>
    </head>
    <body onkeypress="instruc();">
        <embed src="music.wav" autostart="true" loop="true" hidden="true">
        <video id="OpeningScene" loop autoplay ><source src="Crystal Breakout1.mp4" type="video/mp4"></video>
        <div id="continue">Press any key to continue...</div>
        <div id="instruc"><center><h2><span>How to play?</span></h2>This is a game where you will have to hit the crystals with the help of
			a ball and a paddle. To control the given paddle you have to press<span> left and right keys on your keyboard.</span><br>
            On every successful hit you will get <span> +50 points. </span><br>
            And if the ball fail to hit the paddle you will lose<br><span>-1 life </span><br>Let see how long you can survive!!<br><br>
            <span>Best of luck!!</span><br><br>
            <button onclick="logo();">Play</button></center>
        </div> 
        <!--img id="mylogo" src="tttLoading.gif" alt="logo"/-->
    </body>
</html>
