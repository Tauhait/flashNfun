<?php
$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));
$mySubscribers = mysqli_query($link,"SELECT pid, email FROM playerInfo WHERE phoneNo IS NULL ORDER BY pid");
$no_ofSubscriber = mysqli_num_rows($mySubscribers);
$done=false;
while($no_ofSubscriber-- > 0){
    $currEmail = mysqli_fetch_assoc($mySubscribers);
    $to = $currEmail["email"];
    $subject = "Gear up to earn Paytm cash via flashNfun!!!!!";
    $message= "Hey player, \nWe have decided to reward the highest scorers of each game with Paytm cash every week. \nStarting from July the players at the top of the chart of each game on every sunday at 12 midnight will be rewarded with Rs. 20 via Paytm as an incentive of being the best player of the week. \nSo, for the purpose of payment we request you to go to the settings of your profile page and kindly update your mobile number. Make sure that you enter the number associated with your PayTm Account. \n***For the moment we are paying only through paytm***\nHappy playing!!!! ";
    $header= "from: flashNfun <no-reply@flashnfun.info>";
    mail($to,$subject,$message,$header);
    $done=true;
 
}
if($done){
   //inform boss
$to = "flashnfun@gmail.com";
$subject = "Mail to subscribers asking to add mobile numbers";
$message = "Hi boss,Subscribers have been informed about the payment process and asked to edit their profile and add their phone numbers";
$header = "from: flashNfun <no-reply@flashnfun.info>";
mail($to,$subject,$message,$header);
}