<?php
session_start();
$eleven = 11;
$one = 1;
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
$data = parse_url($actual_link,PHP_URL_QUERY);

parse_str($data, $params);
//print_r($params);
$pid = $params['pid'];
$score = $params['score'];

$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun")                    
            or die("Could not connect database " .mysqli_error($link));

if (!$link) {               
    echo '<h1>Could not connect to server. Please try again later.</h1>';
}else {       

    $prevScr = mysqli_fetch_object(mysqli_query($link, "select score from game4 where pid = '$pid'"))->score; 
    if($score > $prevScr){
        mysqli_query($link, "update game4 set score = '$score' where pid = '$pid'");
    }
    if((mysqli_num_rows(mysqli_query($link, "select * from gameUSP where gid = '$eleven' and pid = '$pid'"))) > 0){
        echo "<script type='text/javascript'>var piduser = \"$pid\";
                    window.location.href = 'ProfilePage.php?pid=' + piduser;
                    </script>"; 
        exit;
    }
}


?>
<html>
    <head>        
        <title>Redirecting..</title>
        <script type="text/javascript" src="jquery-3.2.0.js"></script>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
        <script src="js/bootstrap.js"></script>
        <style>
            .container{
                position: absolute;
                max-width: 500px;
                top: 25%;
                left: 20%;
            }
            .rating{
                position: absolute;
                top: 60%;
                left: 30%;
                visibility: hidden;  
                color: red;
            }
            .usrResponse{
                position: absolute;
                top: 60%;
                left: 30%;
                //visibility: hidden;  
                color: green;
            }
            .feedback{
                position: absolute;
                left: 30%;
                top: 75%;
                font-family: verdana;
                font-size: 18px; 
                width: 300px;
                height: 100px;
                cursor: pointer;
                color: blue;  
            }
        </style>
        <script>
            document.cookie = "rated=-1";
            function setUsp(id){
                for(var i = 1; i <= 5; i++){
                    $('#s'+i).attr('src','starEmpty.png');                    
                }
                for(var i = 1; i <= id; i++){
                    $('#s'+i).attr('src','filledStar.png');                    
                }   
                document.cookie = "rated="+id;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <form method="post">
                <div class="row">
                    <h3><center>How much did you like it?</center></h3>
                </div>
                <div class="row">
                    <div class="form-group"><center>
                        <div class="star">
                            <img onclick="setUsp(1);" width="50px" height="50px" id="s1" src="starEmpty.png">
                            <img onclick="setUsp(2);" width="50px" height="50px" id="s2" src="starEmpty.png">
                            <img onclick="setUsp(3);" width="50px" height="50px" id="s3" src="starEmpty.png">
                            <img onclick="setUsp(4);" width="50px" height="50px" id="s4" src="starEmpty.png">
                            <img onclick="setUsp(5);" width="50px" height="50px" id="s5" src="starEmpty.png">
                        </div></center>
                    </div>                                        
                </div>
                <div class="form-group">
                    <center>
                    <div class="col-sm-7"><input type="submit" value="Send Rating" name="Send_Rating" class="btn btn-success btn-block btn-lg"/></div>               
                    <div class="col-sm-5"><input type="submit" value="Skip" name="skip" class="btn btn-primary btn-block btn-lg"/></div>
                    </center>
                 </div>
            </form>
        </div>
        <div class="feedback"><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSdQ9U9t1REB9hnTncWZhKQdrMCY46Pp2Q6-P2gFOo2iBvG4oA/viewform?usp=sf_link">
                Give your feedback here</a></div>
  
    </body>
</html>
<?php
if(isset($_POST["skip"])){
    echo "<script type='text/javascript'>var piduser = \"$pid\";
            window.location.href = 'ProfilePage.php?pid=' + piduser;
            </script>"; 
    exit;
}

if(isset($_POST["Send_Rating"]) && ($_COOKIE['rated'] >= 0)){
    
    
        $currRate = $_COOKIE['rated'];         
        mysqli_query($link,"insert into gameUSP (gid,pid,usp) values ('$eleven','$pid','$currRate')");
        
        if(mysqli_num_rows(mysqli_query($link, "select * from avgUSP where gid = '$eleven'")) > 0){   
            $prevRate = mysqli_fetch_object(mysqli_query($link, "select usp_avg from avgUSP where gid = '$eleven'"))->usp_avg;
            $voters = mysqli_fetch_object(mysqli_query($link, "select t_voters from avgUSP where gid = '$eleven'"))->t_voters;
            $currRate = intval(($prevRate * $voters + $currRate)/($voters + 1));
            $voters++;
            mysqli_query($link, "update avgUSP set t_voters = '$voters',usp_avg = '$currRate' where gid = '$eleven'");
        }else{
            mysqli_query($link, "insert into avgUSP (gid,usp_avg,t_voters) values ('$eleven','$currRate','$one')"); 
        }
        echo '<div class="usrResponse">Thanks for your response.</div>';
        echo "<script type='text/javascript'>var piduser = \"$pid\";
            window.location.href = 'ProfilePage.php?pid=' + piduser;
            </script>"; 
        exit; 
    }else {
        echo '<div class="rating">You have not rated yet!</div>';
        echo "<script type='text/javascript'>$('.rating').css('visibility','visible');</script>";
        echo "<script type='text/javascript'>setTimeout(function(){\$('.rating').css('visibility','hidden');},3000);</script>";
    }
