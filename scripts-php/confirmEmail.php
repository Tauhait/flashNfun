<?php session_start(); ?>
<?php
    
    extract($_GET);  
    
    
    $passkey=$_GET['passkey'];
    
    $link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun")                    
                or die("Could not connect database " .mysqli_error($link));
    // Retrieve data from table where row that match this passkey 
    $sql1 = "select * from tempPlayerInfo where confirmcode ='$passkey'";
    $result1 = mysqli_query($link,$sql1);
    
    if(mysqli_num_rows($result1) == 1){
	    $rows = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	    $fname = $rows['firstname'];
	    $lname = $rows['lastname'];
	    $email = $rows['email'];
	    $password = $rows['password'];
	    $password = md5($password); 
	    $displayname = $rows['displayname'];
	    $_SESSION["email"] = $email;
	    $qry = "insert into playerInfo (firstname,lastname,email,displayname,password) values ('$fname','$lname','$email','$displayname','$password')";
	    
	    $zero = 0;
	    $one = 1;
	    $two = 2;
	    $three = 3;
	    $four = 4;
	    $five = 5; 
	    $six = 6;
	    $seven = 7;
	    $eight = 8;
	    $nine = 9;
	    $ten = 10;
	    $eleven = 11;
	    $twelve = 12;
	    $res = mysqli_query($link,$qry);
	
    
	    if($res){
		    $delqry = "delete from tempPlayerInfo where email='$email'";
		    mysqli_query($link, $delqry); 
		    $pidQuery = "select pid from playerInfo where email='$email'";              
		    $pidUser = mysqli_fetch_object(mysqli_query($link,$pidQuery))->pid;   
		    
		    mysqli_query($link, "insert into game1 (pid,gid,score) values ('$pidUser','$one','$zero')"); 
		    mysqli_query($link, "insert into game2 (pid,gid,score) values ('$pidUser','$two','$zero')");
		    mysqli_query($link, "insert into game3 (pid,gid,score) values ('$pidUser','$three','$zero')");
		    mysqli_query($link, "insert into game4 (pid,gid,score) values ('$pidUser','$four','$zero')");
		    mysqli_query($link, "insert into game5 (pid,gid,score) values ('$pidUser','$five','$zero')");
		    mysqli_query($link, "insert into game6 (pid,gid,score) values ('$pidUser','$six','$zero')");
		    mysqli_query($link, "insert into game7 (pid,gid,score) values ('$pidUser','$seven','$zero')");
		    mysqli_query($link, "insert into game8 (pid,gid,score) values ('$pidUser','$eight','$zero')");
		    mysqli_query($link, "insert into game9 (pid,gid,score) values ('$pidUser','$nine','$zero')");
		    mysqli_query($link, "insert into game10 (pid,gid,score) values ('$pidUser','$ten','$zero')");
		    mysqli_query($link, "insert into game11 (pid,gid,score) values ('$pidUser','$eleven','$zero')");                
		    mysqli_query($link, "insert into game12 (pid,gid,score) values ('$pidUser','$twelve','$zero')");
		    echo "<div style='color: green; font-family: verdana; font-size:25px;position: absolute;left:15%;'>Your account has been verified! You will be redirected to your profile page shortly...</div>";
		    
		    
		    echo "<script type='text/javascript'>var piduser = \"$pidUser\";window.location.href = 'ProfilePage.php?pid=' + piduser;</script>";
	      }
	      
	}
        else {
	      	   echo "<div style='color: red; font-family: verdana; font-size:25px;position: absolute;left:30%;'>No record exits with this confirmation key.</div>";
	      	   
	}
    
