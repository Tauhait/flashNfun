<?php
    
    
session_start();
    if(isset($_SESSION["email"]) && !empty($_SESSION["email"])){
    	$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));                            
        extract($_GET);
        $getmyemail =  "select email from playerInfo where pid='$pid'";                                 
        $myEmail = mysqli_fetch_object(mysqli_query($link,$getmyemail))->email;   
        if($_SESSION["email"] != $myEmail)
             header('Location: http://flashnfun.info/index.php');        
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
               $mobile=$res[6];
              
       }
    }
?>
<html>
<head>
<title>flashNfun</title>
<link rel="shortcut icon" href="flash.ico" />
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-state=1"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
<link type="text/css" rel="stylesheet" href="style5.css"/>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>/*<![CDATA[*/var pid=<?php echo json_encode($pid, JSON_HEX_TAG);?>;function goBack(){var a="ProfilePage.php?pid="+pid;window.location.href=a}document.onkeydown=function(b){return !b.ctrlKey||67!==b.keyCode&&86!==b.keyCode&&85!==b.keyCode&&117!==b.keyCode};/*]]>*/
</script>
<style>#copyright{position:absolute;top:85%;left:2%;width:1335px;height:20px;//background-color:whitesmoke;font-family:papyrus;font-weight:bold;font-size:14px;color:firebrick}#fileTypeError{position:absolute;top:15%;left:45%;visibility:hidden;font-weight:bold;font-size:14px;color:firebrick}</style>
<style>
.invalid{
	position: absolute;
	left:45%;
	top:94%;
	font-family:verdana;
	color:red;
	font-size:15px;
}
.blue{
	position: absolute;
	left:38%;
	top:95%;
	font-family:verdana;
	color:blue;
	font-size:15px;
}
.green{
	position: absolute;
	left:45%;
	top:95%;
	font-family:verdana;
	color:green;
	font-size:15px;
}

</style>
</head>
<body oncontextmenu="return false">
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="photo" class="col-sm-3 control-label">Profile Photo</label>
<div class="col-sm-6">
<input type="file" name="dp" class="form-control upload">
</div>
<div class="col-sm-3">
<input type="submit" value="Upload" name="upload" class="btn btn-info btn-block"/>
</div>
</div>
</form>
<div class="container">
<form class="form-horizontal" role="form" method="post">
<h2>My Account Details</h2>
<div class="form-group">
<label for="firstName" class="col-sm-3 control-label">First Name</label>
<div class="col-sm-9">
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
<div class="col-sm-9">
<input type="text" id="lastName" disabled="" placeholder="Last Name" class="form-control" autofocus value="<?php
                            if(isset($lname))
                                    echo $lname;
                            else	
                                    echo false;
                    ?>">
</div>
</div>
<div class="form-group">
<label for="displayName"  class="col-sm-3 control-label">Display Name</label>
<div class="col-sm-9">
<input type="text" id="displayName" disabled="" name="displayName" class="form-control" autofocus value="<?php                           
                                    echo $dname;                            
                    ?>">
</div>
</div>

<div class="form-group">
<label for="email" class="col-sm-3 control-label">Email</label>
<div class="col-sm-9">
<input type="email" id="email" disabled="" placeholder="Email" class="form-control" autofocus value="<?php
                            if(isset($mail))
                                    echo $mail;
                            else	
                                    echo false;
                    ?>">
</div>
</div>
<div class="form-group">
<label for="password" class="col-sm-3 control-label">Password</label>
<div class="col-sm-9">
<input type="password" id="password" name="password" placeholder="Password" class="form-control" autofocus value="<?php
                            if(isset($pass))
                            	echo $pass;                          
                                    
                            else	
                                    echo false;
                    		?>">
</div>
</div>



<div class="form-group">
<label for="mobileno" class="col-sm-3 control-label">Mobile Number</label>
<div class="col-sm-9">
<input type="tel" id="mobileno"  name="mob" placeholder="10-digit indian mobile number connected to paytm" class="form-control" autofocus value="<?php
                            if(isset($mobile))
                                    echo $mobile;
                            else	
                                    echo "NULL";
                    		?>">
</div>
</div>
<div style="color: red;font-family:verdana;position:relative;font-size:15px;"><center>***Required for PayTm cash***</center></div>
<div class="form-group">
<div class="col-sm-5 col-sm-offset-3">
<input type="submit" name="Update" class="btn btn-info btn-block" value="Update" />
</div>
<div class="col-sm-4">
<input type="submit" name="Cancel" class="btn btn-danger btn-block" value="Cancel"/>
</div>
</div>
</form>
</div>
<!--<div id="copyright"><center>Copyright &#169; flashnfun.info</center></div>-->
</body>
</html>
<?php
    $allowed =  array('png' ,'jpg');
    if(isset($_POST['upload'])){  
        
        $imagename = $_FILES['dp']['name'];//img name
        $ext = pathinfo($imagename, PATHINFO_EXTENSION);
        if(!in_array($ext,$allowed) ) {
            echo '<div id="fileTypeError">Unsupported extension!</div>';
            echo "<script type='text/javascript'>$('#fileTypeError').css('visibility','visible');</script>";                   
            echo "<script type='text/javascript'>setTimeout(function(){\$('#fileTypeError').css('visibility','hidden');},3000);</script>";
        }
        else {
            $imagecontent = addslashes (file_get_contents($_FILES['dp']['tmp_name']));//img content
       
            $imgtype = $_FILES['dp']['type'];

            $target_dir = "profilePic/";
            $target_file = $target_dir.$_FILES['dp']['name'];


            if(move_uploaded_file($_FILES['dp']['tmp_name'], $target_file)) {


                if (mysqli_num_rows(mysqli_query($link, "select * from profilePic where pid = '$pid'"))) {
                    $imgquery = "update profilePic set imgPath = '$target_file' where pid = '$pid'";
                } else {
                    $imgquery = "insert into profilePic (pid,imgPath) values ('$pid','$target_file')";
                }
                mysqli_query($link, $imgquery); 
                    echo '<div id="fileTypeError">Profile pic has been uploaded succesfully!</div>';
                    echo "<script type='text/javascript'>$('#fileTypeError').css('visibility','visible');</script>"; 
                    echo "<script type='text/javascript'>$('#fileTypeError').css('color','green');</script>"; 
                    echo "<script type='text/javascript'>setTimeout(function(){\$('#fileTypeError').css('visibility','hidden');},3000);</script>";
            } else {
                echo '<script>console.log("Sorry, there was an error uploading your pic.")</script>';
            }
            
        }
    }
    
    if(isset($_POST['Update'])){
        extract($_POST);
        echo '<script>console.log("updating record.")</script/>';
        
        if (!preg_match("/^[a-zA-Z0-9~@#^*_+[\]|\\,.?: -]*$/", $password)) {
            echo '<div class="invalid"><center>Not a valid password!</center></div>';
        } 
        else if(!preg_match("/^[789]\d{9}$/",$mob))
            echo '<div class="invalid"><center>Not a valid mobile number!</center></div>';
        else if(strlen($mob) != 10)
            echo '<div class="invalid"><center>Mobile number should be of 10-digit!</center></div>';            
        else {
            $passchange = 0;
            $mobchange = 0;
            
            if($pass != $password && $pass != md5($password)){
            	$passchange = 1;
            	$password = md5($password);
            	mysqli_query($link, "update playerInfo set password = '$password' where pid = '$pid'");
            }
            
            if($mobile != $mob){
            	$mobchange = 1;
            	mysqli_query($link, "update playerInfo set phoneNo = '$mob' where pid = '$pid'");
            }
            if($passchange == 1 || $mobchange == 1){
            	echo '<div class="green">Your changes have been saved!</div>';
            	$passchange = 0;
            	$mobchange = 0;
           	echo '<script>setTimeout(function(){goBack();},2000);</script>';
           	
           }
           else {
           	echo '<div class="blue">You have not done any changes! Press Cancel to go home.</div>';           	
           }
        }          
        
    }
    
    if(isset($_POST['Cancel'])){
    	echo '<script>goBack();</script>';
    }