<?php 
session_start();
    if(isset($_SESSION["email"]) && !empty($_SESSION["email"])){
    	$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));                            
        extract($_GET);
        $getmyemail =  "select email from playerInfo where pid='$pid'";                                 
        $myEmail = mysqli_fetch_object(mysqli_query($link,$getmyemail))->email; 
        
        if($_SESSION["email"] != $myEmail){
             header('Location: http://flashnfun.info/index.php');             
        }
        if(mysqli_num_rows(mysqli_query($link, "select * from rush_modify where email = '$myEmail'")) == 0) {
            mysqli_query($link, "insert into rush_modify (email) values ('$myEmail')");
        }
    }
    else {       
        header('Location: http://flashnfun.info/index.php');
    }

?>
<title>Game Maintenance</title>
<style>
  body { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  body { font: 20px Helvetica, sans-serif; color: #333; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
  button{
      width: 100px;
      height: 40px;
      cursor: pointer;
      position: absolute;
      left: 45%;
      top: 80%; 
      color: blueviolet;
      font-family: verdana;
      
  }
</style>
<script>
    
    var pid = <?php echo json_encode($pid, JSON_HEX_TAG); ?>;   
    function home(){
        window.location.href = 'ProfilePage.php?pid='+pid;;
    }
</script>
<article>
    <h1>Rush game is currently not available!</h1>
    <div>
        <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. Rush will be back online shortly!</p>
        <p>We&rsquo;ll notify you through email when it becomes online!!</p>
        <p>&mdash; The flashNfun Team</p>
    </div>
</article>
<div id="home"><button onclick="home();">Go Home</button></div>


