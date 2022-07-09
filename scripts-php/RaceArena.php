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

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Rush</title>
        <link rel="shortcut icon" href="titleLogo.ico" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="jquery-3.2.0.js"></script>  
        <script src='jquery.overlaps.js'></script>
        <script> 
            <?php extract($_GET); ?>
            
            var pid = <?php echo json_encode($pid, JSON_HEX_TAG); ?>;
            var randVal = 0;
            var leftLimit = [40,70,40,-110,-130,-195];
            var topPosRef = [60,80,75,-100,-120,-195];
            var rightLimit = [70,90,80,-90,-110,-175];
            var score = 0, bstscr = 0;
            var toy = $('#toy'); 
            var distance = 5100;//m
            var speed = 60;//m per sec
            var time = distance/speed;
            var brake,horn, crashSound, movingCar, countdown_timer;
            var vehicle = ["#truck","#redCar","#greenCar","#orangeCar","#yellowCar","#pinkCar"];
            var id = ['#scenery1','#scenery2','#truck','#pinkCar','#yellowCar','#orangeCar','#greenCar','#redCar'];
            carSounds(); //sound registration
            function requestFullScreen() {

                var el = document.documentElement;

                // Supports most browsers and their versions.
                var requestMethod =  el.webkitRequestFullScreen;/* 
                || el.mozRequestFullScreen || el.msRequestFullScreen;*/

                if (requestMethod) {

                  // Native full screen.
                  requestMethod.call(el);

                } 
              };
            
            window.onload = function(){           
               var url = document.location.href,
                params = url.split('?')[1].split('&'),
                data = {}, tmp;
                for (var i = 0, l = params.length; i < l; i++) {
                     tmp = params[i].split('=');
                     data[tmp[0]] = tmp[1];
                }
                console.log(data.color);
                $('#myCar').css('background','url(' + data.color + ')');
                
               message("Click Play/Pause button to rush!");
              if(sessionStorage.getItem('bestScore') !== null){
                  bstscr = sessionStorage.getItem('bestScore');
                  document.getElementById("bs").innerHTML = bstscr;
                }
                else bstscr = 0;
            };
            
           //globals declaration
           
           //var carClone;
           var collisionHappened = false;
           var crash = $('#crash');
                   
           var car = $('#myCar');                
           var road = $('#road');
           var scene1 = $('#scenery1');
           var scene2 = $('#scenery2');
           //var pid = 29;
           
          
           var engineStart = 0;
           var life = 5;
           var countdown = time+5;
           
           var playPause = $('#playPause');
           var icon = playPause.css('content');
           
           
           //end
           
          
           //functions to be called after each sec
            
            var interval1 = window.setInterval(function(){
               checkCollision(vehicle); // for all other traffic vehicles
            },15000);
            var interval2 = window.setInterval(function(){
                   collisionDetection();//player-car collision detection
                },100);
               
            var interval3 = window.setInterval(function(){
                  timer();
               },1000); 
               
           
            var interval4 = window.setInterval(function(){
                checkAllRoundCollision();
            },5000);
             //end
            
            function init(){             
                document.getElementById("sc").innerHTML = score;
                if(score > bstscr){
                    bstscr = score;
                    document.getElementById("bs").innerHTML = bstscr;                    
                }
                
            }
           
            //message is called
            function timer(){       //interval 3: message is displayed      
                icon = playPause.css('content');
                if(engineStart === 1 && icon === '"play"'){                    
                    --countdown;
                    
                    distance -= speed;
                    console.log(distance);
                    if(countdown <= 15){
                        document.getElementById("timer").style.fill="red";
                        countdown_timer.play();
                        message("Timer running out! Go faster");
                    }
                    document.getElementById('timer').innerHTML = countdown;                  
                    gameFinish();
                                           
                }           
                                
            }
            
            //overlaps, message, gameFinish, play are called
            function collisionDetection(){  //interval 2: player-car collision check             
               car = $('#myCar');crash = $('#crash');
               toy = $('#toy');
               icon = playPause.css('content');
               if(engineStart === 1 && icon === '"play"' && !collisionHappened){
                   //console.log("inside collision detection");
                    var collides = $('.other').overlaps(car);
                    
                    if(collides.hits.length){       
                        
                        crashSound.play();
                        collisionHappened = true;
                        //console.log(collides.targets);
                        car.css('visibility','hidden');                    
                        
                        score -= 30;
                        document.getElementById("sc").innerHTML = score;             
                        
                        distance += speed;
                        $('#l'+life).attr('src','heartBlack.png');
                        life -= 1;                      
                        message('OMG smashed! Now '+life+' more lives left. Be carefull.');
                        window.removeEventListener('keydown',turn,true);
                        //car.css('-webkit-animation-play-state','paused');*******************
                        
                        toy.css('-webkit-animation-play-state','paused');
                        
                        if(gameFinish() === 1)
                            setTimeout(function(){play();},1000);
                                
                        
                        
                    }       
                      
                }
            }
            
            //moveCar, message, scoreCalc, slowDown, speedUp are called
            function turn(e){       
               
                car = $('#myCar');
                
               if(e.keyCode === 37) //left   w W   ****left key                            
               {    
                   if(moveCar(0) === 1){
                       message("This is raw skill man, just awesome driving.");
                       scoreCalc(15);
                       car.css('top' ,(parseFloat(car.css('top')) - 10)+'px');
                    
                   }else message("Oops! Cannot move any further.");
                                        
               }                                             
               else if(e.keyCode === 39)//right   s S      ****right key     
               {    
                   if(moveCar(1) === 1){
                       scoreCalc(25);
                       message("Nicely dodged!");
                       car.css('top' ,(parseFloat(car.css('top')) + 10)+'px');
                       
                   }else message("Oops! Cannot move any further.");
                       
               }                                   
               else if(e.keyCode === 66){//brake b B
                   message("slowing down...");
                   scoreCalc(-1);
                   slowDown(0.1,5);
                   brake.play();
               }                   
               else if(e.keyCode === 65){//accelerate a
                   scoreCalc(2);
                   message("Speeding up..");
                   speedUp();
                   
               }
               else if(e.keyCode === 72)//       h H            
                    horn.play(); 
               //else if(e.keyCode === 68)
               
            }
            
            function speedUp(){//car, scenery, toy speed up
                icon = playPause.css('content');
                if(engineStart === 1 && icon === '"play"' && !collisionHappened && speed <= 67){
                    speed += 0.08;
                    distance -= 1;
                    toy.css('-webkit-animation-duration',(parseFloat(toy.css('-webkit-animation-duration')) - .01) + 's');
                    //car.css('-webkit-animation-duration',(parseFloat(car.css('-webkit-animation-duration')) - .01) + 's');*****
                    road.css('-webkit-animation-duration',(parseFloat(road.css('-webkit-animation-duration')) - .01) + 's');
                    scene1.css('-webkit-animation-duration',(parseFloat(scene1.css('-webkit-animation-duration')) - .01) + 's');
                    scene2.css('-webkit-animation-duration',(parseFloat(scene2.css('-webkit-animation-duration')) - .01) + 's');
                }
            }
            
            function slowDown(val,dist){//car, scenery, toy slow down
                icon = playPause.css('content');
                 if(engineStart === 1 && icon === '"play"' && !collisionHappened && speed >= 59){
                    speed -= val;   
                    distance += dist;
                    toy.css('-webkit-animation-duration',(parseFloat(toy.css('-webkit-animation-duration')) + val*0.8) + 's');
                    //car.css('-webkit-animation-duration',(parseFloat(car.css('-webkit-animation-duration')) + val) + 's');*****
                    road.css('-webkit-animation-duration',(parseFloat(road.css('-webkit-animation-duration')) + val) + 's');
                    scene1.css('-webkit-animation-duration',(parseFloat(scene1.css('-webkit-animation-duration')) + val) + 's');
                    scene2.css('-webkit-animation-duration',(parseFloat(scene2.css('-webkit-animation-duration')) + val) + 's');
                }
            }
            
            
            function message(str){                
                document.getElementById('msgBar').innerHTML = str;                
            }
           
            //randomizeVehicles, message, init, changeIcon are called
            function gameFinish(){
                var str = "Oops, you could'nt finish the race!  100 points are deducted";
                var toss = Math.floor(Math.random() * 100 + 1);
                toss = (toss % 17) === 0 ? 1 : 0;
                //console.log(toss);
                if(toss)//odd number
                    randomizeVehicles();
                if(life === 0 || countdown === 0 || distance <= 0){
                    clearInterval(interval1);
                    clearInterval(interval2);
                    clearInterval(interval3);
                    clearInterval(interval4);
                    engineStart = 0;
                    playPause.css('disabled','true');
                    playPause.css('visibility','hidden');
                    $(".play_pause").css('-webkit-animation-play-state','paused');
                    console.log(distance);
                    console.log(speed);
                    if(distance <= 0){
                        str = "Race over, nice driving!! +500 bonus points awarded";                        
                        score += 500;                        
                    }else {
                        score -= 100;                        
                    }
                    init();
                    setTimeout(function(){message(str);},1000);
                    countdown_timer.pause();
                    
                    ChangeIcon(2);   
                    movingCar.pause();
                    horn.pause();
                    movingCar.loop = false;
                    //console.log("game finished");
                    for(var i = 0; i < 6; i++){
                        $(vehicle[i]).css('visibility','hidden');
                    }
                    pause();
                    //console.log("game finished");
                    setTimeout(function(){message("GAME OVER! Hit reload to rush once more OR click on quit button to go home.");},6000);
                    return 0;
                }
                return 1;
            }
            
            //moveUp, moveDown is called
            function randomizeVehicles(){
                icon = playPause.css('content');
                if(engineStart === 1 && icon === '"play"'){ 
                    var rand = Math.floor((Math.random()*6)+1);
                    var vehicleNo = Math.floor((Math.random()*rand)+1) - 1;               
                    rand = Math.floor((Math.random()*10) + 1);
                    if(rand % 3 === 0)
                        moveDown(vehicle,vehicleNo);
                    else
                        moveUp(vehicle,vehicleNo);//if cannot move down
                    //checkCollision(vehicle);//for all vehicles on road
                }
            }
            
           
            function hasCollidedTrue(vehNo_i,vehNo_j){ //collided vehicles are paused
                icon = playPause.css('content');
                if(engineStart === 1 && icon === '"play"'){ 
                    $(vehicle[vehNo_i]).css('-webkit-animation-play-state','paused');
                    $(vehicle[vehNo_j]).css('-webkit-animation-play-state','paused');
                   // changeTrafficDirection(vehNo_i,vehNo_j);
                    setTimeout(function(){releaseTraffic(vehNo_i);},4500);//car 2
                    setTimeout(function(){releaseTraffic(vehNo_j);},500);//car 1
                    
                }
            }
            
            function releaseTraffic(i){//collided vehicles are released
                icon = playPause.css('content');
                if(icon === '"play"')
                    $(vehicle[i]).css('-webkit-animation-play-state','running');
               
                
            }
            
            //hasCollided, hasCollidedTrue are called
            function moveUp(vehicle,vehicleNo){
                var tmp;
                if(IsSafe(vehicleNo,1)){
                    $(vehicle[vehicleNo]).css('top',(parseInt($(vehicle[vehicleNo]).css('top')) - 10) + 'px');
                    tmp = hasCollided(vehicle,vehicleNo);
                    if(tmp !== -1)              
                        //$(vehicle[vehicleNo]).css('top',(parseInt($(vehicle[vehicleNo]).css('top')) + 15) + 'px');
                        if(tmp !== vehicleNo)
                            hasCollidedTrue(tmp,vehicleNo);
                }                
            }
            function moveDown(vehicle,vehicleNo){
                var tmp;
                if(IsSafe(vehicleNo,2)){
                    $(vehicle[vehicleNo]).css('top',(parseInt($(vehicle[vehicleNo]).css('top')) + 10) + 'px');
                    tmp = hasCollided(vehicle,vehicleNo);
                    if(tmp !== -1)              
                        //$(vehicle[vehicleNo]).css('top',(parseInt($(vehicle[vehicleNo]).css('top')) - 15) + 'px');
                        if(tmp !== vehicleNo)
                            hasCollidedTrue(tmp,vehicleNo);
                }            
                
            }
            
            
            function IsSafe(num,way){//is traffic save to move?
                //var vehicleTop = topPosRef[num];//initial value
                var currTop = parseInt($(vehicle[num]).css('top'),10);//current value
                if(way === 1)
                    currTop -= 10;
                else currTop += 10;
               // var diff = Math.abs(vehicleTop - currTop);
               // console.log(diff);
                if(currTop >= leftLimit[num] && currTop <= rightLimit[num])
                    return 1;
                else return 0;
            }
            
            
            function checkAllRoundCollision(){//interval 4: check traffic collision
                icon = playPause.css('content');
                if(engineStart === 1 && icon === '"play"'){
                    var i,tmp;
                    for(i = randVal; i < 6; i++){
                        tmp = hasCollided(vehicle,i);
                        if(tmp !== -1)
                            if(tmp !== i){
                                randVal = (randVal + 1) % 6;
                                hasCollidedTrue(tmp,i);
                                break;
                            }
                        
                    }
                }                               
                
            }
            
            
            function hasCollided(vehicle,vehicleNo){
                
                var collide;
                for(var i = 0; i < id.length; i++){
                    if(vehicleNo !== i){
                        collide = $(id[i]).overlaps(vehicle[vehicleNo]);
                        if(collide.hits.length > 0){                            
                            return i;
                        }
                            
                    }
                        
                }
                return -1;                
                
            }
            
            
            function checkCollision(vehicle){//interval 1: 
              icon = playPause.css('content');
                if(engineStart === 1 && icon === '"play"')
                    for(var i = 0; i < 6; i++){
                        for(var j = 0; j < 6; j++){
                            if(j !== i){
                                var collide = $(vehicle[i]).overlaps($(vehicle[j]));
                                if(collide.hits.length > 0){                                     
                                    changeTrafficDirection(i,j);
                                    break;
                                }

                            }
                        }
                    }
            }
            function changeTrafficDirection(i,j){
                $(vehicle[i]).css('top',(parseFloat($(vehicle[i]).css('top')) - 4) + 'px');//up i
                $(vehicle[j]).css('top',(parseFloat($(vehicle[j]).css('top')) + 2) + 'px');//down j
                $(vehicle[i]).css('-webkit-animation-duration',(parseFloat($(vehicle[i]).
                        css('-webkit-animation-duration')) - .03) + 's');//fast i
                $(vehicle[j]).css('-webkit-animation-duration',(parseFloat($(vehicle[j]).
                        css('-webkit-animation-duration')) + .01) + 's');//slow j
            }
            function moveCar(moveType){
                var move = parseInt(car.css('top'),10);
                //console.log(move);
                if(moveType === 1){
                   if(move + 10 <= 320) return 1;
                   else return 0;
                }else {
                   if(move - 10 >= 220) return 1;
                   else return 0;
                }
            }       
                
            function carSounds(){
                brake = document.createElement("AUDIO");
                brake.setAttribute("src","brake.wav");                      
                                
                horn = document.createElement("AUDIO");
                horn.setAttribute("src","horn.wav");
                
                crashSound = document.createElement("AUDIO");
                crashSound.setAttribute("src","crash.wav");
                
                movingCar = document.createElement("AUDIO");
                movingCar.setAttribute("src","runningCar.wav");
                
                countdown_timer = document.createElement("AUDIO");
                countdown_timer.setAttribute("src","countdown.wav");
            }
            
            function reloadGame(){                
                $('#refresh').css('animation-play-state','running');                
                setTimeout(function(){window.location.reload();},500);
            }
            
            //init, message,play,pause are called
            function ChangeIcon(buttonType){//1 = play/pause; 2 = refresh                
                
                if(buttonType === 2){                  
                    
                   engineStart = 0; 
                   $(".play_pause").css('-webkit-animation-play-state','paused');
                   $('#myCar').css('visibility','hidden');                   
                   init();
                  
                   window.onbeforeunload = function(){
                       sessionStorage.setItem("bestScore",bstscr);
                   };
                   
                }
                else {
                        playPause = $('#playPause');
                        icon = playPause.css('content');
                        playPause.css('animation-play-state','running');
                        window.setTimeout(function(){
                           playPause.css('animation-play-state','paused');
                        },150);
                        if(engineStart === 0){                                                  
                            engineStart = 1;
                            $('#start').css('visibility','hidden');
                            
                            message("Go! Go! Go!");
                            $('#truck').css('visibility','visible');
                            window.addEventListener('keydown',turn,true);
                            $(".play_pause").css('-webkit-animation-play-state','running'); 
                            playPause.css('background-image','url("pause.png")');
                            playPause.css('content','"play"');
                            for(var i = 0; i < 6; i++){
                                $(vehicle[i]).css('-webkit-animation-play-state','running');
                            }
                            
                              movingCar.play();
                              movingCar.loop = true;
                               
                           
                        }else {                  
                            //engineStart = 0;
                            //icon = playPause.css('content');
                            if(icon === '"play"'){
                                //engineStart = 0;
                                for(var i = 0; i < 6; i++){
                                    $(vehicle[i]).css('-webkit-animation-play-state','paused');
                                }
                                playPause.css('content','"pause"');
                                message("Game paused.");
                                pause();
                                
                            }                   
                            else {
                                //engineStart = 1;
                                for(var i = 0; i < 6; i++){
                                    $(vehicle[i]).css('-webkit-animation-play-state','running');
                                }
                                playPause.css('content','"play"');
                                message("keep Rushing...");
                                play();
                               
                            }
                    }
                }         
                     
                               
            }
            
            function play(){
                movingCar.play();                
                car.css('visibility','visible');
                message("Drive recklessly!");
                
                setTimeout(function(){collisionHappened = false;},4000);
                playPause.css('background-image','url("pause.png")');
                playPause.css('content','"play"'); 
                $(".play_pause").css('-webkit-animation-play-state','running'); 
                //movingCar.play();
                window.addEventListener('keydown',turn,true);
                crash.css('visibility','hidden');
                crash.css('-webkit-animation-play-state','paused');
                //car.css('-webkit-animation-play-state','play');
                toy.css('-webkit-animation-play-state','running');
            }
            
            function pause(){
               
                movingCar.pause();
                playPause.css('background-image','url("play.jpg")');
                playPause.css('content','"pause"');   
                $(".play_pause").css('-webkit-animation-play-state','paused'); 
                
                window.removeEventListener('keydown',turn,true);
                //car.css('-webkit-animation-play-state','paused');
                
            }            
                       
            function scoreCalc(val){
                score += val;
                document.getElementById("sc").innerHTML = score;
            }
            
            function goBack(){
                bstscr = document.getElementById("bs").innerHTML;
                var temp = 0;
                
                sessionStorage.setItem("bestScore",temp);
                console.log(bstscr);
            }
            
           
        </script>
        <link rel="stylesheet" href="gameArenaDesign.css"/>       
        
    </head>
    <body id="screen" class="play_pause">
        <div id="gameTitle"><center>Rush</center></div>
            <div class="rightPanel" class="play_pause">
                <div id="playPause" class="playPauseAnim" onclick="requestFullScreen();ChangeIcon(1);"></div>
                <div id="refresh" onclick="reloadGame();"></div>
                <div id="backbtn" onclick="goBack();window.location.href='game8.php?pid=' + pid + '&score=' + bstscr;">
                </div>
                <div class="countdown" >                     
                    <svg>
                        <filter id="timer_img" x="0%" y="0%" width="100%" height="100%">
                                <feImage xlink:href="timer.jpg"/>
                        </filter>
                        <g>
                            <circle r="35" cx="40" cy="40" stroke="red" stroke-width="5" filter="url(#timer_img)" />
                            <text id="timer" x="29" y="58" font-family="chiller" font-size="35" font-weight="bold">
                                <script>document.write(countdown);</script>
                            </text>
                        </g>
                     </svg>
                </div>
                <div id="scoreboard">
                    <div id="bestscore">

                        <table>
                            <caption>Best Score</caption>
                            <tr>                        
                                <td id="bs" ><center>0</center></td>
                            </tr>
                        </table>
                    </div>

                    <div id="score">                
                        <table>
                            <caption>Score</caption>
                            <tr>                        
                                <td id="sc"><center>0</center></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="gameScreen">                
                <div class="start">
                    <img id="start" src="startLine.jpg"/>
                    <p></p>
                </div>
                <div id="GameScreen1" class="play_pause">            
                    <div id="scenery1"  class="play_pause">                
                    </div>
                </div>
                <div id="roadscene" class="play_pause">
                    <div id="road" class="play_pause">
                        <div id="myCar" class="play_pause mine"><div id="crash" class="play_pause"></div></div>
                        <div id="truck" class="play_pause other"></div>  
                        <div id="greenCar" class="play_pause other"></div>
                        <div id="redCar" class="play_pause other"></div>
                        <div id="yellowCar" class="play_pause other"></div>
                        <div id="pinkCar" class="play_pause other"></div>                  
                        <div id="orangeCar" class="play_pause other"></div>
                    </div>  
                </div>
                <div id="GameScreen2" class="play_pause">          
                    <div id="scenery2" class="play_pause">                
                    </div>
                </div>  
            </div>
            <div class="bottomPanel">
                <div class="life">
                    <img id="l1" src="heart.png"/>
                    <img id="l2" src="heart.png"/>
                    <img id="l3" src="heart.png"/>
                    <img id="l4" src="heart.png"/>
                    <img id="l5" src="heart.png"/>
                </div>
                <div id="distanceMeter">
                    <img id="startPoint" src="start.png"/>
                    <img id="toy" class="play_pause" src="toy.png" />                    
                    <img id="distanceMap" src="roadMap.jpg"/>                   
                    <img id="finishPoint" src="finishLine.jpg"/>
                </div>
                <div class="alert"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <div id="msgBar">Click the Play/Pause button to rush!</div>                  
                </div>
            </div>          
        <div id="copyright"><center>Copyright &#169; flashnfun.info</center></div>
        
    </body>
</html>
                                            

