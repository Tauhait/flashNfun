<?php
$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));
mysqli_query($link,"truncate table ActivePlayers");
$to = "flashnfun@gmail.com";
$subject = "Crob job notification";
$message = "Hi boss, Your cron job has executed. Users have been session timed-out.";
$header = "from: flashNfun <no-reply@flashnfun.info>";
mail($to,$subject,$message,$header);