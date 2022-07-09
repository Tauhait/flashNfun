<html>
    <head>
        <title>flashNfun : New Password</title>
        <link rel="shortcut icon" href="flash.ico" />
        <script src="js/jquery-3.1.1.min.js"></script>
        <meta http-equiv="refresh" content="5;url=http://flashnfun.info/index.php"> 
        <style>
            .confirm{
                position: absolute;
                left: 35%;
                top: 40%;
                color: green;
                font-weight: bold;
                font-family: verdana;
                font-size: 12px;
                visibility: hidden;
                width: 550px;
                height: 30px;
            }
        </style>
    </head>
</html>
<?php
    extract($_GET);  
    $passkey=$_GET['passkey'];
    $link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun")                    
                or die("Could not connect database " .mysqli_error($link));
    $sql1 = "select email from forgotPass where confirmcode ='$passkey'";
    $result1 = mysqli_query($link,$sql1);
    $rows = mysqli_fetch_array($result1,MYSQLI_ASSOC);    
    $email = $rows['email'];
    $min = 1000;
    $max = 9999;
    $password = rand($min, $max);
    $encrypt_pass = md5($password);
    $passChange = mysqli_query($link, "update playerInfo set password = '$encrypt_pass' where email = '$email'");
    if($passChange){
        $to=$email;

        // Your subject
        $subject="Your new pin ";

        // From
        $header="from: flashNfun <no-reply@flashnfun.info>";

        // Your message
        $message="Your pin : $password \r\n";
        $message.="Login to your account using this pin \r\n";
        $message.="http://flashnfun.info/index.php";
 
        // send email
        $sentmail = mail($to,$subject,$message,$header);
        mysqli_query($link, "delete from forgotPass where email = '$email'");
        
    	echo '<div class="confirm">A pin has been sent to your email address.</div>';
    	echo "<script type='text/javascript'>$('.confirm').css('visibility','visible');</script>";
            
        
        
    }


