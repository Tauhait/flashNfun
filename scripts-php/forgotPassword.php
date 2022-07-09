<html>
<head>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6940337325831962",
    enable_page_level_ads: true
  });
</script>

		<title>flashNfun</title>
                <link rel="shortcut icon" href="flash.ico" />
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-state=1"/>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
                <style>
                    #copyright{
                        position: absolute;
                        top: 85%;
                        left: 2%;
                        width: 1335px;
                        height: 20px;            
                        //background-color: whitesmoke;
                        font-family: papyrus;
                        font-weight: bold;
                        font-size: 14px;
                        color: firebrick;
                    }
                   .dupEmail{
                        position: absolute;
                        left: 34%;
                        top: 60%;
                        color: red;
                        font-weight: bold;
                        font-family: verdana;
                        font-size: 12px;
                        visibility: hidden;
                        width: 550px;
                        height: 30px;
                    }
		   .navbar
		   {
			top: 0px;
			height: 75px;
			background-image:url('background.png');
			margin: 3px; 
			padding: 3px;
			font-family: cooper;
			color:#95b7b6;
                    }
                    .confirm{
                        position: absolute;
                        left: 35%;
                        top: 80%;
                        color: green;
                        font-weight: bold;
                        font-family: verdana;
                        font-size: 12px;
                        visibility: hidden;
                        width: 550px;
                        height: 30px;
                    }
                    .cancel{
                        position: absolute;
                        left: 35%;
                        top: 80%;
                        color: red;
                        font-weight: bold;
                        font-family: verdana;
                        font-size: 12px;
                        visibility: hidden;
                        width: 550px;
                        height: 30px;
                    }
                    .send{
                    	background-color: lightgreen;
                    	border-radius: 8px;
                    	font-size: 18px;
                    }
            </style>
            <script>
                function goBack(){
                    var url = 'http://flashnfun.info/index.php';
                    window.location.href = url;
                }
            </script>
	</head>
	<body >
	    <div class = "navbar">
                <h1>flashNfun.info</h1>
	    </div>
            <div class="container">
                <div class="row">
                   
                    <h3>Give your email id then click on <span class="send"> Send Pin </span> &nbsp and we will mail you a confirmation link.
                        <br>Click on the link to set your password to a temporary pin. You can change it after login.
                    </h3>
                    <hr class="colorgraph">
                    <form method="post">                

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="email" name="email" id="email" class="form-control input-lg" 
                                placeholder="Email" tabindex="1" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <input type="submit" value="Send Pin" name="change_passw" class="btn btn-success btn-block">
                            </div>
                            <div class="col-sm-3 ">
                                <input onclick="goBack();" name="Cancel" class="btn btn-danger btn-block" value="Cancel" />
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
            <div id="copyright"><center>Copyright &#169; flashnfun.info</center></div>
	</body>
</html>
    
<?php
    extract($_POST);
    $link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));
    if(isset($_POST['change_passw'])){
        if (!$link) {               
               echo '<h1>Could not connect to server. Please try again later.</h1>';
            }else {      
                    $dupcheck = "select pid from playerInfo where email='$email'";
                    $dupres = mysqli_query($link, $dupcheck);
                    $count1 = mysqli_num_rows($dupres);
                    if($count1 == 0){
                        //echo "duplicate email id!";
                        echo '<div class="dupEmail">Email-id does not exist! Please enter existing email-id or signup.</div>';
                        echo "<script type='text/javascript'>$('.dupEmail').css('visibility','visible');</script>";                   
                        echo "<script type='text/javascript'>setTimeout(function(){\$('.dupEmail').css('visibility','hidden');},2000);</script>";
                    }
                    else {
                        $confirm_code = md5(uniqid(rand())); 
                        $tempQry = "insert into forgotPass (email,confirmcode) values "
                                . "('$email','$confirm_code')";
                        $tempPasswResult = mysqli_query($link, $tempQry);
                        if($tempPasswResult){
                            // send e-mail to ...
                            $to=$email;

                            // Your subject
                            $subject="Your forgot key confirmation link ";

                            // From
                            $header="from: flashNfun <no-reply@flashnfun.info>";

                            // Your message
                            $message="Your Confirmation link here \r\n";
                            $message.="Click on this link to set a temporary pin for your account \r\n";
                            $message.="http://flashnfun.info/confirmPass.php?passkey=$confirm_code";

                            // send email
                            $sentmail = mail($to,$subject,$message,$header);
                        }



                        // if your email succesfully sent
                        if($sentmail){
                            echo '<div class="confirm">A confirmation link has been sent to your email address.</div>';
                            echo "<script type='text/javascript'>$('.confirm').css('visibility','visible');</script>";
                        }
                        else {
                            echo '<div class="cancel">Opps! Cannot send confirmation link to your e-mail address!!</div>';
                            echo "<script type='text/javascript'>$('.confirm').css('visibility','visible');</script>";
                        }
                    }
                }
            }
    

