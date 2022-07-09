<?php
    session_start();
    $myEmail;
    if(isset($_SESSION["email"]) && !empty($_SESSION["email"])){
        $link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));                    
        extract($_GET);  
        $getmyemail =  "select email from playerInfo where pid='$pid'";                                 
        $myEmail = mysqli_fetch_object(mysqli_query($link,$getmyemail))->email;   
        if($_SESSION["email"] != $myEmail)
             header('Location: http://flashnfun.info/index.php');
         $hasPh = "select phoneNo from playerInfo where pid='$pid'";
         $number = mysqli_fetch_object(mysqli_query($link,$hasPh))->phoneNo;
         
         if(is_null($number)){
         	echo '<script>alert("Please update your phone number in settings!");</script>';
         }
         
    }
    else {        
        header('Location: http://flashnfun.info/index.php');
    }   
    if (!$link) {
        echo '<script>console.log("Could not connect to server. Please try again later.")</script>';

    } else {

       echo '<script>console.log("connected to database!");</script>';
      
       $qry = "select * from playerInfo where pid='$pid'";

       $resultset = mysqli_query($link,$qry);

       while($res=mysqli_fetch_row($resultset))
       {

               $fname=$res[1];
               $lname=$res[2];
               $dname=$res[4];
               $mail=$res[3];
               $pass=$res[5];
               if(mysqli_num_rows(mysqli_query($link, "select * from ActivePlayers where email = '$mail'")) == 0){
                   $activep = "insert into ActivePlayers (pid,email,dname) values ('$pid','$mail','$dname')";
                   mysqli_query($link, $activep);
               }
               
              
       }
    }
   
    
?>
<html>
	<head>
	<div>
	
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_index_loginModal -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="1181647339"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	
	<div>
		<title>flashNfun</title>
                <link rel="shortcut icon" href="flash.ico" />
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-state=1"/>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
		<link type="text/css" rel="stylesheet" href="style4.css"/>
		<script src="js/jquery-3.1.1.min.js"></script>
		<?php                 
                        
                    $img = mysqli_query($link,"select * from profilePic where pid = '$pid'");                    
                   if($img){                       
                        $rows = mysqli_fetch_array($img,MYSQLI_ASSOC);
                        $imgPath = $rows['imgPath'];                        	
                    }
                    
		 ?>
		<script src="js/bootstrap.js"></script>
                <script type='text/javascript'>
                 window.onload = function () {
			    if (typeof history.pushState === "function") {
			        history.pushState("jibberish", null, null);
			        window.onpopstate = function () {
			            history.pushState('newjibberish', null, null);
			           
			        };
			    }
		}
                    var pid = <?php echo json_encode($pid, JSON_HEX_TAG); ?>;             
                    console.log(pid);
                    function sessionDestroy(){
                       
                      
                        
                    }
                </script>
                <style>
                    .welcome{
                        font-family: Papyrus;
                        font-size: 35px;
                        font-weight: bold;
                    }
                    #copyright{
                        position: absolute;
                        top: 90%;
                        left: 1%;
                        width: 195px;
                        height: 4px;            
                        background-color: #f0f0f0;
                        font-family: papyrus;
                        font-weight: bold;
                        font-size: 10px;
                    }


                        .faqHeader 
			{
				font-size: 30px;
				margin: 20px;
			}
			.panel-heading [data-toggle="collapse"]:after {
				font-family: 'glyphicon glyphicon-pencil';
				content: "0"; 
				float: right;
				color: gold;
				font-size: 18px;
				line-height: 22px;
				-webkit-transform: rotate(-90deg);
				-moz-transform: rotate(-90deg);
				-ms-transform: rotate(-90deg);
				-o-transform: rotate(-90deg);
				transform: rotate(-90deg);
			}
			.panel-heading [data-toggle="collapse"].collapsed:after {
       
				-webkit-transform: rotate(90deg);
				-moz-transform: rotate(90deg);
				-ms-transform: rotate(90deg);
				-o-transform: rotate(90deg);
				transform: rotate(90deg);
				color: #da8011;
			}
			/*.container
			{
				position:absolute;
				width:90%;
				height:70%;
			}*/
			.modal-header
			{
				background-image:url('BgImage.png');
			}
			.modal-title
			{
				font-family:papyrus;
				font-size:20px;
				font-weight:bold;
				color:firebrick;
			}
			.modal-title sub
			{
				font-family:cooper;
				font:15px;
			}
			.modal-footer
			{
				background-image:url('BgImage.png');
			}
			.panel-title
			{
				font-family:papyrus;
				color:firebrick;
			}
			#collapseOne
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseTwo
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseThree
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseFour
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseFive
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseSix
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseSeven
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseEight
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseNine
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseTen
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseEleven
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
			#collapseTwelve
			{
				background:#4c4a3c;
				font-family:bradley hand itc;
				font-weight:bold;
				color:floralwhite;
                                font-size:18px;
			}
                </style>
	</head>
	<body>
        <div class="mainbody container-fluid">
            <div class="row">
                <div class="navbar-wrapper">
                    <div class="container-fluid">
                        <div class="navbar navbar-default navbar-static-top" role="navigation">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span class="sr-only">Toggle navigation</span> 
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                    </button>
                                    <img src="image1.png" class="img-responsive img-thumbnail" width="40px" 
                                                                style="margin:2px; padding:2px;"/>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav">
                                        <li><a href="extrapage.html" target="test1">Home</a></li>
                                        <li><a href="scoreCard.php" target="test1" onclick="location.href=this.href+'?pid='+pid;return false;">Scorecard</a></li>
                                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                My Games<span class="caret"></span></a>
                                                <ul class="dropdown-menu">
        <li><a  href="tictactoe_instruc.php" onclick="location.href=this.href+'?pid='+pid;return false;">4x4 Tic-Tac-Toe</a></li>
        <li><a  href="crystalBreakoutOpening.php" onclick="location.href=this.href+'?pid='+pid;return false;">Crystal-Breakout</a></li>
        <li><a  href="snake.php" onclick="location.href=this.href+'?pid='+pid;return false;">Snake</a></li>
        <li><a  href="savPika_instruc.php" onclick="location.href=this.href+'?pid='+pid;return false;">Rescue Chikachu</a></li>
        <li><a  href="maze.php" onclick="location.href=this.href+'?pid='+pid;return false;">Solve the Maze</a></li>
        <li><a  href="copter_crash_instr.php" onclick="location.href=this.href+'?pid='+pid;return false;">Copter crash</a></li>
        <li><a  href="Jump_ball_instr.php" onclick="location.href=this.href+'?pid='+pid;return false;">Jumpping Ball</a></li>
        <li><a  href="Rush_maintenance.php" onclick="location.href=this.href+'?pid='+pid;return false;">Rush</a></li>
        <li><a  href="tetris_mania.php" onclick="location.href=this.href+'?pid='+pid;return false;">Tetris</a></li>
        <li><a  href="ping_pong_startpage.php" onclick="location.href=this.href+'?pid='+pid;return false;">Ping-Pong</a></li>
        <li><a  href="Gwar_openingPage.php" onclick="location.href=this.href+'?pid='+pid;return false;">Galaxy War</a></li>
        <li><a  href="pair.php" onclick="location.href=this.href+'?pid='+pid;return false;">Primal Crimes</a></li>
                                    </ul>
                                        </li>
                                        
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                                    <img src="<?php echo $imgPath?>" id="smallPP" class="img-responsive img-circle" width="30px" height="30px" alt="Your DP">
                                                </span>
                                                <span class="user-name">
                                                    <?php                                                    
                                                        if (!$link) {               
                                                            echo '<h1>Could not connect to server. Please try again later.</h1>';
                                                        }else {
                                                            //$pid = $_SESSION["pid"];
                                                            $dnameQuery = "select displayname from playerInfo where pid='$pid'";                           
                                                            $dName = mysqli_fetch_object(mysqli_query($link,$dnameQuery))->displayname;  
                                                            $fnameQuery = "select firstname from playerInfo where pid='$pid'";                           
                                                            $fName = mysqli_fetch_object(mysqli_query($link,$fnameQuery))->firstname;

                                                            echo $dName; 
                                                        }                                                                                      
                                                                                                        
                                                    ?>
                                                </span>
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="navbar-content">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="<?php echo $imgPath?>" id="pp" alt="DP" class="img-responsive img-circle" width="110px" height="110px"/>
                                                                <p class="text-center small">
                                                                    <a href="UserDetails.php" onclick="location.href=this.href+'?pid='+pid;return false;">Change Photo</a>
							        </p>
                                                            </div> 
                                                            <div class="col-md-7">
                                                                <span><?php
                                                                echo $dName; 
                                                                        ?>
                                                                </span>
                                                                
                                                                <div class="divider">
                                                                </div>
                                                               <a href="#settings" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#settings">
 <i class="fa fa-user-o" aria-hidden="true"></i> Profile
 </a>
                                                               
                                                                <a href="#faq" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#faq"> 

                                                                 <i class="fa fa-question-circle-o" aria-hidden="true">
                                                                  </i> 
                                                                 Help! 
                                                                   </a>
   
                                                                 </div>
                                                                 </div>
                                                                 </div>
                                            <div class="navbar-footer">
                                                        <div class="navbar-footer-content">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <a target="test1" href="UserDetails.php" onclick="location.href=this.href+'?pid='+pid;return false;"  class="btn btn-primary btn-sm">
                                                                                <i class="fa fa-cogs" aria-hidden="true"></i>Settings
                                                                        </a>
                                                                </div>
                                                                    <div class="col-md-6">
                                                                        <a href="index.php" onclick="sessionDestroy();" class="btn btn-danger btn-sm pull-right">
                                                                                    <i class="fa fa-power-off" aria-hidden="true"></i> Sign Out
                                                                                    
                                                                            </a>
                                                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div style="padding-top:50px;"> </div>
                        <!--div class="col-lg-3 col-md-3 hidden-sm hidden-xs"-->
                        <div class="col-sm-2">
                                <div class="panel panel-default">
                                        <div class="panel-body">
                                                <div class="media">
                                                        <div align="center">
                                                            <img class="img-responsive img-circle" id="bigPP" src="<?php echo $imgPath?>" width="300px" height="300px">
                                                        </div>
                                                        <div class="media-body"> 
                                                                <hr>
                                                                <h3><strong>Name</strong></h3>
                                                                        <h4 style="font-weight: lighter;color: #e38d13;font-family: Cooper">
                                                                            <strong><?php
                                                                                echo $fName; 
                                                                                ?></strong></h4>
                                                                <hr>
                                                                <h3><strong>Display Name</strong></h3>
                                                                <h4 style="font-weight: lighter;color: #e38d13;font-family: Cooper">
                                                                            <strong><?php
                                                                                echo $dName; 
                                                                                ?></strong></h4>

                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!--div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"-->
                        <div class="col-lg-10 col-md-10 col-sm-48 col-xs-48">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="pull-left">
                                        <h2 style="font-weight: lighter;color: #e38d13;font-family: serif">
                                        <?php
                                               echo '<div class="welcome">Welcome '.$dName.' to flashNfun!!</div>'; 
                                        ?></h1><hr>

                                        <iframe style="font-family:Papyrus;font-size: 25px;font-weight: lighter" src="extrapage.html" name="test1" width="800px" height="450px" scrolling="auto" frameborder=0>

                                        </iframe>
                                        <iframe style="font-family:Papyrus;font-size: 10px;font-weight: lighter" src="activePlayers.php" name="test1" width="185px" height="450px" scrolling="auto" frameborder=0>

                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
               	</div>
            </div>
		<div id="copyright"><center>Copyright &#169; flashnfun.info</center></div>
<div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						<h5 class="modal-title" id="myModalLabel1">Frequently Asked Questions <sub>FAQ</sub></h5>
					</div>
					<div class="modal-body">
					<div>
					
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_profile_modal_1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="2518779733"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
					
					</div>
					<div>
					
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_profile_modal_2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="9902445735"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
					
					</div>
       <div class="panel-group" id="accordion">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><strong>Is this website free?</strong></a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                  Yes,absolutely.The platform does not charge for games and is free for everyone.The only requirement is to have the zeal towards games and online gaming.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen"><strong>How do I play the games. Should i register or by just clicking on any game i can play?</strong></a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                     Yes you have to register in the website by clicking on the <a href="http://flashnfun.info/SignUpPage.php"><strong><u>Sign Up</strong></u></a> button displayed on the top of the page. After clicking on the button do fill up your details and then read the <strong><u>Terms and Conditions</strong></u> of our website and click on the <strong><u>Register</strong></u> button. 
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven"><strong>Am I eligible if I am under 18?</strong></a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                    Yes you are.The minimum age requirement to register on the platform is 10 and above.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><strong><u>How many games are available on the portal at the moment?</strong></u></a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                   As of now there are 12 different games available on the portal.The details about the games and how to play them can be found on the site itself.We are constantly 
working to develop the games and introduce more innovative games on the platform.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><strong>Where will I get the instructions before playing a game?</strong></a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                   Go to <strong><u>My Games,</strong></u> click on any game that you want to play. The instructions are available when you click on the game.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><strong>Can I play the games offline?</strong></a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    No.This is a online gaming portal and all the games require moderate Internet connection to run at your computer.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><strong>What is the credibility of this gaming portal,how secure is it? Is my data secure?</strong></a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    We at <strong>flashNfun</strong> take customer security very seriously.We use and adapt the best of the technology and security measures available to keep our user data safe from 
the eyes of snooping and hacking.We use 256 bit SSL encryption techniques to protect the data.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight"><strong>Does the scoreboard shows only my score?</strong></a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body">
                 The <a href="http://flashnfun.info/scoreCard.php">scoreboard</a> shows the results of the top ten players via their <strong><u>Rank</strong></u> and <strong><u>Display Name</strong></u>. Your score is displayed at the end.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine"><strong>Can I upload my own profile photo in the website?</strong></a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body">
                    Yes you can upload your own <strong>Profile picture </strong> in our website. You need to <strong><u> Log In </strong></u> first and then on the right hand corner your profile is displayed. Click on <a href="http://flashnfun.info/UserDetails.php"><strong> <u>Profile</strong></u></a> a page will open. Click on <strong> Profile Photo--->Choose File(button)</strong> and then browse an image to upload and then click on <strong>Upload</strong> button. After clicking on <strong> Upload</strong> button your image will be uploaded.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><strong>In case I have any technical issue/glitch while Iam playing any game. What should I do?</strong></a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                   Email us at <u>"developers@flashnfun.info"</u>  and we will help you out.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><strong>I want to know everything about my acount. Tell me in brief</strong></a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="panel-body">
                  All your details regarding account is displayed on your profile placed at the right hand corner. When you click on the profile all your details will be displayed in<a href="http://flashnfun.info/UserDetails.php"> <strong><u>My Account Details</strong></u></a> section. If you want to modify your details you can only update your <strong><u> Display Name</strong></u> and <strong> <u>Password.</strong></u>
                </div>
            </div>
        </div>
		<div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve"><strong>Can I contact if I have some innovative ideas about the portal?Are there any job opportunities?</strong></a>
                </h4>
            </div>
            <div id="collapseTwelve" class="panel-collapse collapse">
                <div class="panel-body">
                  You and your ideas are always welcome.Here we always look after innovative approaches to advance the platform.If you have any idea for the betterment of the portal. you can contact us on our address given at <strong><u>Contact Us</strong></u> section at the bottom of our website. We started this portal as a project to bring something new for the users. At this point of time it is just us who are working on the site but whenever we take the plunge to expand
and bring in some cool members into the team we will definitely notify on the portal itself. Cheers!!
                </div>
            </div>
		</div>
       </div>
</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal">Okay</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						<h5 class="modal-title" id="myModalLabel1">Profile</h5>
					</div>
					<div class="modal-body">
					
					<div>
					
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_help_modal_1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="3855912131"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
					
					</div>
					<div>
					
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_help_modal_2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="6809378534"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
					
					</div>
					
						
                                            <div class="container">
					
                                             
                
                                            <form class="form-horizontal" role="form" method="post">
                                                <div class="form-group">
                                                    <div class="col-sm-9">
                                                    <div class="user-avatar pull-left" style="margin-left:38%; margin-top:-5px;">
                                                        <img src="<?php echo $imgPath?>" id="smallPP" class="img-responsive img-circle" width="200px" height="200px" alt="Your DP"/>
                                                    </div>
                                                    </div>
                                                </div>
                
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="firstName" disabled="" placeholder="First Name" class="form-control" autofocus value="<?php
                            if(isset($fname))
                                    echo $fname;
                            else	
                                    echo false;
                    ?>">
                </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="lastName" disabled="" placeholder="Last Name" class="form-control" autofocus value="<?php
                            if(isset($lname))
                                    echo $lname;
                            else	
                                    echo false;
                    ?>">
                </div>
                </div>
                <div class="form-group">
                    <label for="displayName" class="col-sm-3 control-label">Display Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="displayName" disabled="" name="displayName" class="form-control" autofocus value="<?php                           
                                    echo $dname;                            
                    ?>">                            
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" id="email" disabled="" placeholder="Email" class="form-control" autofocus value="<?php
                            if(isset($mail))
                                    echo $mail;
                            else	
                                    echo false;
                    ?>">
                    </div>
                </div>
                
                               
                <!--<div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="text" id="password" disabled="" name="password" placeholder="Password" class="form-control" autofocus value="<?php
                            if(isset($pass))
                                    echo $pass;
                            else	
                                    echo false;
                    		?>">
                	</div>
                </div>-->
                
                
                                
            </form>
                
        
                                        </div>				
                                        
</div><!-- /.modal-body -->
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal">Okay</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
	</body>
</html>

    
  