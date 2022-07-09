<!DOCTYPE html>
<html>
<head>


<title>flashNfun</title>
<link rel="shortcut icon" href=flash.ico />
<meta charset="utf-8"/>
<meta name=viewport content="width=device-width, initial-state=1"/>
<link type=text/css rel=stylesheet href="css/bootstrap.css"/>
<link rel=stylesheet href=http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css>
<link type=text/css rel=stylesheet href="style2.css"/>
<script src=js/jquery-3.1.1.min.js></script>
<script src=js/bootstrap.js></script>
<script>function goBack(){var a="index.php";window.location.href=a}function passMatch(){var b=document.getElementById("password").value;var a=document.getElementById("password_confirmation").value;if(b!==a){console.log("password not matched!");document.getElementById("passmatch").removeAttribute("hidden");document.getElementById("password").value="";document.getElementById("password_confirmation").value=""}setTimeout(function(){reset("passmatch")},2000)}function reset(a){document.getElementById(a).setAttribute("hidden","true")}function NCheck(c){var b=["first_name","last_name","display_name"];var a=document.getElementById(b[c]).value;if(c===0){if(!(/^[A-za-z][a-z`']*$/.test(a))){document.getElementById("flname").removeAttribute("hidden");document.getElementById(b[c]).value="";setTimeout(function(){reset("flname")},2000)}}else{if(c===1){if(!(/^[A-za-z][a-z]*$/.test(a))){document.getElementById("flname").removeAttribute("hidden");document.getElementById(b[c]).value="";setTimeout(function(){reset("flname")},2000)}}else{if(!(/^[a-zA-Z_][a-zA-Z_0-9]*$/.test(a))){document.getElementById("disname").removeAttribute("hidden");document.getElementById(b[c]).value="";setTimeout(function(){reset("disname")},2000)}}}}function passRegCheck(){var a=document.getElementById("password").value;a=a.toString();if(!(/^[a-zA-Z0-9~@#^*_+[\]|\\,.?: -]*$/.test(a))){document.getElementById("passRegexChk").removeAttribute("hidden");document.getElementById("password").value="";setTimeout(function(){reset("passRegexChk")},2000)}}function show_hide(a,b){if(a===1){if(b===1){document.getElementById("password").setAttribute("type","text");document.getElementById("show_hide1").setAttribute("src","hide.png")}else{document.getElementById("password").setAttribute("type","password");document.getElementById("show_hide1").setAttribute("src","show.png")}}else{if(b===1){document.getElementById("password_confirmation").setAttribute("type","text");document.getElementById("show_hide2").setAttribute("src","hide.png")}else{document.getElementById("password_confirmation").setAttribute("type","password");document.getElementById("show_hide2").setAttribute("src","show.png")}}}function validateEmail(){var a=document.getElementById("email").value;var b=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;if(!b.test(a)){document.getElementById("em").removeAttribute("hidden");document.getElementById("email").value="";setTimeout(function(){reset("em")},2000)}}document.onkeydown=function(b){return !b.ctrlKey||67!==b.keyCode&&86!==b.keyCode&&85!==b.keyCode&&117!==b.keyCode};</script>
<style>.dupEmail{position:absolute;left:34%;top:1%;color:red;font-weight:bold;font-family:verdana;font-size:12px;visibility:hidden;width:550px;height:30px}.confirm{position:absolute;left:32%;top:5%;color:green;font-weight:bold;font-family:verdana;font-size:12px;visibility:hidden;width:550px;height:30px}.cancel{position:absolute;left:30%;top:5%;color:red;font-weight:bold;font-family:verdana;font-size:12px;visibility:hidden;width:550px;height:30px}#show_hide{position:relative;width:32px;height:32px}.faqHeader{font-size:30px;margin:20px}.panel-heading [data-toggle="collapse"]:after{font-family:'Glyphicons Halflings';content:"\270f";float:right;color:gold;font-size:18px;line-height:22px;-webkit-transform:rotate(-90deg);-moz-transform:rotate(-90deg);-ms-transform:rotate(-90deg);-o-transform:rotate(-90deg);transform:rotate(-90deg)}.panel-heading [data-toggle="collapse"].collapsed:after{-webkit-transform:rotate(90deg);-moz-transform:rotate(90deg);-ms-transform:rotate(90deg);-o-transform:rotate(90deg);transform:rotate(90deg);color:#da8011}</style>
</head>
<body oncontextmenu="return false">
<nav class=navbar style=margin:3px;padding:3px>
<div class=container-fluid>
<div class=navbar-header>
<div class="nav navbar-nav">
<h2>flashNfun.info</h2>
</div>
</div>
</div>
</nav>
<div class=container>

<div class=row>
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
<div style=left:0vh;position:absolute>
<form role=form method=post>
<h3>Create your flashNfun account here.<small><b>It's free and always will be.</b></small></h3>
<hr class=colorgraph>
<div class=row>
<div class="col-xs-12 col-sm-6 col-md-6">
<div class=form-group>
<input type=text name=fname id=first_name class="form-control input-lg" placeholder="First Name" tabindex=1 required onchange=NCheck(0)>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<div class=form-group>
<input type=text name=lname id=last_name class="form-control input-lg" placeholder="Last Name" tabindex=2 required onchange=NCheck(1)>
</div>
</div>
</div>
<div class=form-group><p style=color:red id=flname hidden>Invalid! Only ` and ' can be used other than english letters in firstname.Only english letters in lastname.</p></div>
<div class=form-group>
<input type=email name=email id=email class="form-control input-lg" placeholder=Email tabindex=4 required onchange=validateEmail()>
</div>
<div class=form-group><p style=color:red id=em hidden>Invalid email!</p></div>
<div class=form-group><p style=color:red id=email-id-info>You must enter a valid email-id!</p></div>
<div class=form-group>
<input type=text name=displayname id=display_name class="form-control input-lg" placeholder="Display name" tabindex=3 required onchange=NCheck(2)>
</div>
<div class=form-group><p style=color:red id=disname hidden>Invalid display-name!First character should be a char or _ and rest characters can also include digits.</p></div>
<div class=row>
<div class="col-xs-12 col-sm-6 col-md-6">
<div class=form-group>
<input type=password name=password id=password class="form-control input-lg" placeholder=Password tabindex=5 required onchange=passRegCheck()>
<img id=show_hide1 src=show.png onmousedown=show_hide(1,1) onmouseup=show_hide(1,2) />
</div>
<div class=form-group><p style=color:red id=passRegexChk hidden>Invalid password!</p></div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<div class=form-group>
<input type=password name=repassword id=password_confirmation class="form-control input-lg" placeholder="Confirm Password" tabindex=6 onchange=passMatch() required>
<img id=show_hide2 src=show.png onmousedown=show_hide(2,1) onmouseup=show_hide(2,2) />
</div>
</div>
</div>
<div class=form-group><p style=color:red id=passmatch hidden>Password and Confirmation Password do not match!</p></div>
<div class=row>
<div class="col-xs-8 col-sm-9 col-md-12">
By clicking <strong class="label label-primary">Register</strong>, you agree to the
<a href=#t_and_c_m data-toggle=modal data-target=#t_and_c_m>Terms and Conditions</a>
set out by this site.
</div>
</div>
<hr class=colorgraph>
<div class=form-group>
<div class="col-sm-3 col-sm-offset-0"><button onclick=goBack() class="btn btn-warning btn-block btn-lg" name=Home value=Home tabindex=7 style=width:100px;height:45px>Home</button></div>
<div class=col-sm-9>
<input type=submit value=Register name=Register class="btn btn-success btn-block btn-lg">
</div>
</div><br>
</form>
</div>
</div>
</div>
<div class="modal fade" id=t_and_c_m tabindex=-1 role=dialog aria-labelledby=myModalLabel aria-hidden=true>
<div class="modal-dialog modal-lg">
<div class=modal-content>
<div class=modal-header>
<button type=button class=close data-dismiss=modal aria-hidden=true>x</button>
<h5 class=modal-title id=myModalLabel>Terms & Conditions</h5>
</div>
<div class=modal-body>
<h2 style=text-align:center>TERMS AND CONDITIONS</h2>
<ol><li><strong>Introduction</strong></li></ol>
<p>These Website Standard Terms and Conditions written on this webpage shall manage your use of this website. These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</p>
<p>Anyone and everyone can access this website and play flash games absolutely for free.</p>
<ol start=2><li><strong>Intellectual Property Rights</strong></li></ol>
<p>Other than the content you own, under these Terms, Flash N Fun and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>
<p>You are granted limited license only for purposes of viewing the material contained on this Website.</p>
<ol start=3><li><strong>Restrictions</strong></li></ol>
<p>You are specifically restricted from all of the following</p>
<ul><li>publishing any Website material in any other media;</li>
<li>selling, sublicensing and/or otherwise commercializing any Website material;</li>
<li>publicly performing and/or showing any Website material;</li>
<li>using this Website in any way that is or may be damaging to this Website;</li>
<li>using this Website in any way that impacts user access to this Website;</li>
<li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
<li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
<li>using this Website to engage in any advertising or marketing.</li>
</ul>
<p>Certain areas of this Website are restricted from being access by you and Flash N Fun may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.Users must register to the websites and play the games for free.</p>
<ol start=4><li><strong>Your Content</strong></li></ol>
<p>In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Flash N Fun a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>
<p>Your Content must be your own and must not be invading any third-party’s rights. Flash N Fun reserves the right to remove any of Your Content from this Website at any time without notice.</p>
<ol start=5><li><strong>No warranties</strong></li></ol>
<p>This Website is provided “as is,” with all faults, and Flash N Fun express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.</p>
<ol start=6><li><strong>Limitation of liability</strong></li></ol>
<p>In no event shall Flash N Fun, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract. &nbsp;Flash N Fun, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>
<ol start=7><li><strong>Indemnification</strong></li></ol>
<p>You hereby indemnify to the fullest extent Flash N Fun from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>
<ol start=8><li><strong>Severability</strong></li></ol>
<p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>
<ol start=9><li><strong>Variation of Terms</strong></li></ol>
<p>Flash N Fun is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>
<ol start=10><li><strong>Assignment</strong></li></ol>
<p>The Flash N Fun is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>
<ol start=11><li><strong>Entire Agreement</strong></li></ol>
<p>These Terms constitute the entire agreement between Flash N Fun and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>
</div>
<div class=modal-footer>
<button type=button class="btn btn-danger" data-dismiss=modal>I Agree</button>
</div>
</div>
</div>
</div>
<?php
	
	if(isset($_POST['Register']))
	{
           extract($_POST);
           $hacker1 = "a921956@mvrht.net";
           $hacker2 = "wzy26214@jajxz.com";
           $domain1 = "@mvrht.net";
           $domain2 = "@jajxz.com";
           if(strcasecmp($hacker1, $email) == 0 || strcasecmp($hacker2, $email) == 0 || 
                   strcasecmp($domain1, $email) == 0 || strcasecmp($domain2, $email) == 0){
               $to=$email;

                // Your subject
                $subject="You are blocked !";

                // From
                $header="from: flashNfun <no-reply@flashnfun.info>";

                // Your message
                $message="Thanks for making us experienced. We were noobes definitely but you made us experienced. \r\n";
                $message.="For security reasons you are not allowed \r\n";
               
                // send email
                $sentmail = mail($to,$subject,$message,$header);
                ///////////////////////////////////////////////
                $notifyMe = 'dt_tauhait@hotmail.com';
               

                // Your subject
                $subject="Hackers trying to access flashNfun!";

                // From
                $header="from: flashNfun <no-reply@flashnfun.info>";

                // Your message
                $message="This is an alert message \r\n";
                $message.="They have received their reply mail! Good job \r\nEmail id or domain used is ".$email;
               
                // send email
                $sentmail = mail($notifyMe,$subject,$message,$header);
                
                
               
           }
           else {
               $link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun")                    
                or die("Could not connect database " .mysqli_error($link));
           if (!$link) {               
               echo '<h1>Could not connect to server. Please try again later.</h1>';
            }else {                
                $dupcheck = "select pid from playerInfo where email='$email'";
                $dupres = mysqli_query($link, $dupcheck);
                $count1 = mysqli_num_rows($dupres);
               
                $count2 = mysqli_num_rows(mysqli_query($link, "select pid from playerInfo where displayname='$displayname'"));
                if($count1 == 1){
                    //echo "duplicate email id!";
                    echo '<div class="dupEmail">A same emailid already exists!</div>';
                    echo "<script type='text/javascript'>$('.dupEmail').css('visibility','visible');</script>";                   
                    echo "<script type='text/javascript'>setTimeout(function(){\$('.dupEmail').css('visibility','hidden');},4000);</script>";
                }
                else if($count2 == 1){
                    //echo "duplicate email id!";
                    echo '<div class="dupEmail">A same displayname already exists!</div>';
                    echo "<script type='text/javascript'>$('.dupEmail').css('visibility','visible');</script>";                   
                    echo "<script type='text/javascript'>setTimeout(function(){\$('.dupEmail').css('visibility','hidden');},4000);</script>";
                }
                else {
                    $confirm_code = md5(uniqid(rand())); 
                    $tempQry = "insert into tempPlayerInfo (firstname,lastname,email,displayname,password,confirmcode) values "
                            . "('$fname','$lname','$email','$displayname','$password','$confirm_code')";
                    $tempPlayerInfoResult = mysqli_query($link, $tempQry);
                    if($tempPlayerInfoResult){
                        // send e-mail to ...
                        $to=$email;

                        // Your subject
                        $subject="Your confirmation link ";

                        // From
                        $header="from: flashNfun <no-reply@flashnfun.info>";

                        // Your message
                        $message="Your Confirmation link here \r\n";
                        $message.="Click on this link to activate your account \r\n";
                        $message.="http://flashnfun.info/confirmEmail.php?passkey=$confirm_code";

                        // send email
                        $sentmail = mail($to,$subject,$message,$header);
                    }



                    // if your email succesfully sent
                    if($sentmail){
                        echo'<script>window.location="haveFun.php";</script>';
                    }
                    else {
                        echo '<div class="cancel">Opps! A confirmation link e-mail has already been sent to your email address!</div>';
                        echo "<script type='text/javascript'>$('.cancel').css('visibility','visible');</script>";
                    }
                }
            }
           }
        }           
        
        ?>
</body>
</html>