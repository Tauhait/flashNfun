<?php
session_start();

$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));
$myemail = $_SESSION["email"];
$getOnlinePlayers = "select * from ActivePlayers where email <> '$myemail'";
$onlinePlist = mysqli_query($link, $getOnlinePlayers);
$No_of = mysqli_num_rows($onlinePlist);
echo "<h4>Players</h4>";
while($No_of > 0){
    
    $currP = mysqli_fetch_assoc($onlinePlist);
    $displayName = $currP["dname"];
    
    
    echo "<div class='rowP'><div id='$No_of'>".$displayName."<img width='15px' height='15px' src='online.png'></img></div></div>";
    $No_of--;
            
}

?>
<html>
    <head>
        <meta http-equiv="refresh" content="30; url=" />
        <style>
            .rowP{
                position: relative;
                height: 55px;
                width: 155px;
            }
            div{
                position: relative;
                height: 50px;
                width: 155px;
                font-family: Papyrus;
            }
            img{
                position: absolute;
                
                left: 97%;
                width: 15px;
                height: 15px;
            }
            h4{
                font-family: verdana;
                background-color: yellow;
            }
        </style>  
    </head>
    <body>
        
    </body>
</html>
