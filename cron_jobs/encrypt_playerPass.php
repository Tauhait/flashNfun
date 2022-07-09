<?php
$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));

$getEmails = mysqli_query($link,"select pid,email from playerInfo order by pid");
$subscribers = mysqli_num_rows($getEmails);
while($subscribers-- > 0){
	$getcurrEmail = mysqli_fetch_assoc($getEmails);
	$currEmail = $getcurrEmail["email"];
 	$getPass = mysqli_fetch_object(mysqli_query($link,"select password from playerInfo where email = '$currEmail'"))->password;
 	$pass = md5($getPass);
	mysqli_query($link,"update playerInfo set password = '$pass' where email = '$currEmail'");
}
