<?php
$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));
$count = 1;
while($count < 13){
	$gameQ = "select pid from game".$count." where score = ( select max(score) from game".$count." )";	
	$getTop_player = mysqli_query($link,$gameQ);
	$noOftopPlayers = mysqli_num_rows($getTop_player);
	if($noOftopPlayers > 1){
		$tiedPlayers = mysqli_fetch_array($getTop_player);
		for( $i = 1; $i <= $noOftopPlayers; $i++){
			$currPid = $tiedPlayers['pid'];
			$em = mysqli_fetch_object(mysqli_query($link,"select email from playerInfo where pid = '$currPid'"))->email;
			
			/*$to = $em;
			$sub = "";
			$msg = "";
			$from = "from: flashNfun <no-reply@flashnfun.info>";
			mail($to,$sub,$msg,$from);*/
		} 
	}
	$topplayerQ = mysqli_fetch_assoc($getTop_player);
	$currentBest_playerPid = $topplayerQ["pid"];
	echo $currentBest_playerPid;
	
	$getBestplayerDetails = mysqli_query($link,"select firstname,lastname,email,phoneNo,displayname from playerInfo where pid = '$currentBest_playerPid'");
	$topPlayerdetails = mysqli_fetch_assoc($getBestplayerDetails);
	
	$fname = $topPlayerdetails["firstname"];
	$lname = $topPlayerdetails["lastname"];
	$em = $topPlayerdetails["email"];
	$ph = $topPlayerdetails["phoneNo"];
	$dname = $topPlayerdetails["displayname"];
	mysqli_query($link,"update Top_players set pid = '$currentBest_playerPid',email = '$em',display_name = '$dname',phone_num = '$ph',firstname = '$fname',lastname = '$lname' where gid = '$count'");
	
	$count++;
}
