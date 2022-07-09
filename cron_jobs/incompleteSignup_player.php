<?php
$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));
$done = false;
$voidSubscribers = mysqli_query($link,"SELECT email,firstname,confirmcode FROM tempPlayerInfo ORDER BY email");
$no_ofvoidSubscriber = mysqli_num_rows($voidSubscribers);

while($no_ofvoidSubscriber-- > 0){
    $currEmail = mysqli_fetch_assoc($voidSubscribers);
    $currCrfmCode = $currEmail["confirmcode"];
    $to = $currEmail["email"];
    $currPlayer_name = $currEmail["firstname"];
    
    $subject = "Click on the below link to complete your signup  process";
    $message= "Hi $currPlayer_name,\r\nYou hadn't yet completed your signup process.\nPlease click on the below link to validate your email and signin to your flashNfun account.\nYour link goes here: \r\n";
    $message.="http://flashnfun.info/confirmEmail.php?passkey=$currCrfmCode";
    $message.="\n\nHappy playing!!!";
    $header = "from: flashNfun <no-reply@flashnfun.info>";
    mail($to,$subject,$message,$header);
    $done = true;
   
}
if($done){
    //inform boss
    $to = "flashnfun@gmail.com";
    $subject = "Mail to inform players about incomplete subscription";
    $message = "Hi boss, Subscribers have been informed to complete their signup process";
    $header = "from: flashNfun <no-reply@flashnfun.info>";
    mail($to,$subject,$message,$header);
    }
