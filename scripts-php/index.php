<?php 
    session_start();
    if(!empty($_SESSION["email"])){
        $em = $_SESSION["email"];
        $link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));
        if(mysqli_num_rows(mysqli_query($link, "select * from ActivePlayers where email = '$em'")) == 1){
            $activep = "delete from ActivePlayers where email='$em'";
            mysqli_query($link, $activep);
        }
        mysqli_close($link);
        session_unset();
        session_destroy(); 
        
    }
?>
<html>
   <head>


<meta name="description" content="Flash Gaming Portal which has various kinds of Flash Games. All these games are made especially for children.You can play any game that you wish 
                    at anytime from anywhere as it's absolutely free.In our gaming portal you can compare your scores for different games with other 
                    players and see where you stand among them which makes this portal a place of real challenge. On sign-up you get subscribed 
                    to play all the available games here. All categories of games are present like shooting, racing, memory, brain teasers and 
                    quick reaction games. One's intelligence is tested in games like Tic-Tac-Toe, Maze and Memory.Even your quick reaction skills 
                    are also necessary for games like <strong>Galaxy War, Snake Classics, Jumping Ball, Copter Crash, Crystal Breakout, Rescue Pikachu. " />
<meta name="keywords" content="games, flash games, online games, free online games,html games, javascript and html games, tic-tact-toe , snake game,
      racing games online,pikachu game, galaxy war game, tetris game,find the correct pair game,crime game,jummping ball game, pingpong ball game,
      crystal breakout game, maze game,online scoreboard" />
        <title>flashNfun</title>
        <link rel="shortcut icon" href="flash.ico" />           
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
        <link type="text/css" rel="stylesheet" href="style1.css"/>
        <link type="text/css" rel="stylesheet" href="style3.css"/>
       <!-- <script src="js/script1.js"></script>-->
        
        <script type="text/javascript" src="jquery-3.2.0.js"></script> 
        <script src="js/bootstrap.js"></script>
        
        
        


        <style>
            .invalid{
                position: absolute;
                width: 350px;
                height: 60px;
                top: 35%;
                left: 35%;
                visibility: hidden;
                color: red;
                font-size: 15px;
                font-weight: bold;
                font-family: verdana;
                background-color: #c4e3f3;
                border-color: black;
                border-width: 15px;
                text-align: center;
            }
            .closeBtn{
                position: relative;
                margin-left: 15px;
                color: black;
                font-weight: bold;
                float: right;
                font-size: 15px;
                line-height: 20px;
                cursor: pointer;
                
               
            }
            </style>
    </head>
    <body>
    
    </div>
        <nav class="navbar" style="margin:3px; padding:3px;">
                    <div class="container-fluid">
                            <div class="navbar-header">
                                    <img src="image1.png" class="img-responsive img-thumbnail" alt="logo" width=40 style="margin:2px; padding:2px;"/>
                                   
                            </div>
                            <div class="collapse navbar-collapse" >
                                    <ul class="nav navbar-nav">
                                            <li><a href="index.php">Home</a><li>

                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Games
                                                    <span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="gamepagetictactoe1.html">4x4 Tic-Tac-Toe</a></li>
                                                        <li><a href="gamepagecrystal.html">Crystal Breakout</a></li>
                                                        <li><a href="gamepagepikachu.html">Rescue Out Pikachu</a></li>
                                                        <li><a href="gamepagesnake.html">Classic Snake</a></li>
                                                        <li><a href="gamepagemaze.html">Maze</a></li>
                                                        <li><a href="gamepagejumpingball.html">Jumping Ball</a></li>
                                                        <li><a href="gamepagecoptercrash.html">Copter Crash</a></li>
                                                        <li><a href="gamepagerush.html">Rush</a></li>
                                                        <li><a href="gamepagetetris.html">Tetris</a></li>
                                                        <li><a href="gamepagepingpong.html">Ping Pong</a></li>
                                                            
                                                    </ul>
                                            <li>
                                            <li><a href="#about">About Us</a><li>
                                            <li><a href="#contact">Contact Us</a><li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                            <li><a href="SignUpPage.php"><span class="glyphicon glyphicon-user"></span>  Sign Up</a><li>
                                            <li><a href="#SignInModal"  data-toggle="modal" data-target="#SignInModal">
                                                    <span class="glyphicon glyphicon-log-in"></span>  Log In</a><li>
                                    </ul>
                            </div>
                    </div>
        </nav>
        <div class="jumbotron" style="margin:5px; padding:5px">
            <div class="container text-center">
                <h1>flashNfun</h1>
                <p>Play these interesting games and have fun.</p>
                
            </div>
        </div>
        
        
        <div class="container">
        
     
            <section>
                <div class="page-header">
                
                <!--
                        <h2>Gallery</h2>
                </div>
             <div class="carousel" id="gallery-carousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                       <li data-target="#gallery-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#gallery-carousel" data-slide-to="1"></li>
                        <li data-target="#gallery-carousel" data-slide-to="2"></li>
                      <li data-target="#gallery-carousel" data-slide-to="3"></li>
                   // </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="GImage1.png" alt="text of the image" class="img-thumbnail">
                            <div class="carousel-caption">
                                    <h3>Perfect Gamer</h3>
                            </div>
                        </div>
                        <div class="item">
                            <img src="GImage2.png" alt="text of the image" class="img-thumbnail">
                            <div class="carousel-caption">
                                    <h3>Gaming makes people happy</h3>
                            </div>
                        </div>
                        <div class="item">
                            <img src="GImage3.png" alt="text of the image" class="img-thumbnail" height=60>
                            <div class="carousel-caption">
                                    <h3>Play and Enjoy</h3>
                            </div>
                        </div>
                            <div class="item">
                                <img src="GImage4.png" alt="text of the image" class="img-thumbnail" height=60>
                                <div class="carousel-caption">
                                        <h3>Game is Life</h3>
                                </div>
                            </div>
                    </div>
                    <a href="#gallery-carousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#gallery-carousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </section>
        </div>
        -->
        <div>
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_index_1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="6170250135"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        
        </div>
        <div style="position :absolute; right:0px;top:375px">
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_index_2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="7646983333"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        
        </div>
        <div style="position :absolute; right:0px;top:975px">
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_index_3 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="9123716539"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        
        </div> 
        <div style="position :absolute; right:0px;top:1575px">
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_index_4 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="1600449733"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        
        </div>
        
        <div style="position :absolute; right:0px;top:2175px">
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_index_5 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="6030649331"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        
        </div>
        <div style="position :absolute; right:0px;top:2775px">
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_index_6 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="8984115739"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        
        </div>
            
            <div style="position :absolute; right:0px;top:3375px">
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_index_7 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="1460848939"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        
        </div>
        <div>
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- fnf_index_8(responsive) -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6940337325831962"
     data-ad-slot="5891048531"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        
        </div>
        <div class="container">
            <section>
                    <div id="about" class="page-header">
                            <h2>About the Games</h2>
                    </div>
                    
                    
                    <div class="row">
                            <div class="col-sm-8">
                                    <h3>flashnfun.info</h3>
                                    <p>Games are fun to play and enjoyable to program too. Games provide an interesting way of learning all the aspects
                                    of a new programming language. In our gaming portal we have provided few interesting games. In order to access 
                                    those game you have to register to our portal. To maintain the competitive edge we have included the provision
                                    to see the top ten highest score scored by other users.</p>
                                    <p>Games are fun to play and enjoyable to program too. Games provide an interesting way of learning all the aspects of a new programming language. So, while learning JavaScript, HTML, CSS as a part of our regular course we decided to make an online gaming portal. So, what we have developed is an online gaming portal for which we have developed a few interesting games. In order to play these games, the user will have to create an account. This account will help the users to play the games of one&rsquo;s choice. The account will also enable the user to view one&rsquo;s highest score in a session and also their top scores in each game till date. To maintain the competitive edge, we have included the provisions for users to see the highest scores in each game made by other users. The games have been designed to run on web browsers and have been designed using JavaScript, HTML, and CSS. For the backend of the project i.e. to maintain the database we have used MySQL. </p>
                                    <p><strong>A summarized description of all the games are given below</strong></p>
                                    
                                   <hr> <p><h1>4x4 Tic-Tac-Toe</h1>It is artificial intelligence based flash game built mainly for children. This is an updated version over the classic 3x3 tic-tac-toe. Since in this version the board is bigger so every next move needs the player to think and plan deeper. The game consists of two players X and O; one is the player while the other one is computer(AI). They both take alternating turns marking the spaces in a 4&times;4 grid. The symbol given to the player is generated randomly every new game(X or O). The player or computer who succeeds in placing four of their marks in a horizontal, vertical, or diagonal row wins the game. If none of the players can place all four of their marks in a single row or column or diagonal but the board is filled then the game is declared draw. The game has three(3) levels namely: -&lsquo;Beginner&rsquo;, &lsquo;Novice&rsquo; and&lsquo;Expert&rsquo; signify their level of difficulty. The interface consists of a message bar which displays game status and next player&rsquo;s turn. It also consist of a scoreboard showing no of games played, no of games player won and no of games computer won. The difficulty level is shown separately in yellow rectangle box. The interface also has three buttons one is &lsquo;Start Over&rsquo; to play a new game/restart, another is &lsquo;Level Up&rsquo; to change game difficulty level and the last one is &lsquo;Quit&rsquo;. After any valid or invalid move or game status changed to won, lose or draw various informative and exciting sounds are played in background that keeps the game lively.</p>
                                   <br>
                                   <p>A <strong>Minimax Algorithm</strong> is used which is a recursive algorithm for choosing the next move in an n- player game, usually a two-player game. A value is associated with each position or state of the game. This value is computed by means of a position evaluation function and it indicates how good it would be for a player to reach that position. The player then makes the move that maximizes the minimum value of the position resulting from the opponent's possible following moves. If it is A's turn to move, A gives a value to each of his legal moves.A possible allocation method consists in assigning a certain win for A as +1 and for B as &#8722;1. The algorithm can be thought of as exploring the nodes of a game tree. The effective branching factor of the tree is the average number of children of each node (i.e., the average number of legal moves in a position).The performance of the na&iuml;ve minimax algorithm may be improved dramatically, without affecting the result, by the use of alpha-beta pruning.</p>
                                   <br>
                                   <p><strong>Alpha-beta pruning</strong> is a way of finding the optimal minimax solution while avoiding searching subtrees of moves which won't be selected. In the search tree for a two-player game, there are two kinds of nodes, nodes representing your moves and nodes representing your opponent's moves.Alpha-beta pruning gets its name from two bounds that are passed along during the calculation, which restrict the set of possible solutions based on the portion of the search tree that has already been seen.</p><hr>
                                   <p><h1>Crystal Breakout</h1>It is a simple 2d arcade flash game built mainly for the children. It is quite similar to that of the Atari breakout but we have given it a newer look and design. In this game we will get to see a layer of crystals lines the top of the canvas. A ball travels across the canvas bouncing off the top and side walls of the canvas and a paddle to hit the ball. When the crystals are hit, the ball bounces away and the crystal is destroyed. The player will lose a turn or life if the ball touches the ground of the canvas. To prevent this from happening the player has a movable paddle to bounce the ball upward, keeping it in play. The game has only 1 level. The player will get to see his score and his best score on the screen itself. The interface has two button one is &ldquo;Play&rdquo; button and the other one is &ldquo;Quit&rdquo; button. The game is provided with exciting sounds that are played in background to make the game lively.</p>
                                   <p>We have talked about the gameplay. Now, in this portion will see how the collision<br />
detection is done and how the crystals disappear when it is hit. We have to check that if<br />
the center of the ball is inside the co-ordinates of one our brick then we&rsquo;ll change the<br />
direction of the ball. For this the following statement needs to be true:<br />
&bull; X position of the ball is greater than the x position the crystal.<br />
&bull; X position of the ball is less than the x position of the crystal plus its<br />
width.<br />
&bull; Y position of the ball is greater than the y position of the crystal<br />
&bull; Y position of the ball is less than the y position of the brick plus its height.<br />
Then we have initialized status property to each crystal object, if the status is 1 then the<br />
crystal will be drawn and if it is 0 then the crystal is hit by the ball and it disappears from<br />
the canvas.</p>

<p>The logic behind losing in this game is very simple. If the player misses the ball with the<br />
paddle and the ball hit the bottom part of the canvas, then the player will lose one life at a<br />
time. If the player losses three lives then the game is over and then a function will be called<br />
which display a message &ldquo;YOU LOSE&rdquo; in red color.<br />
Similarly, when the player completes the game without losing a single life then<br />
also the game will be over and this time different function will be called which display a message &ldquo;YOU WIN&rdquo; in white color.</p>
<hr>
<p><h1>Snake Classics</h1><p>It is a game where the player maneuvers a block which grows in length, with the block itself being the primary obstacle. This game is the customized and modified version of the game that we used to play in the old nokia phones in the 1990s. The player controls a small block, resembling a snake, which roams around on a bordered canvas, picking up food, trying to avoid hitting its own tail or the walls that surrounds the playing area. This game works in a FIFO concept where the data is stored in a queue. Each time the snake eats a piece of food, the player should try to move the snake in a direction, avoiding the snake to hit its own tail or the walls that surround the playing area. Each time the snake eats a piece of food, its tail grows longer, making the game increasingly difficult. As the snake keeps on growing and the player scores points, after scoring some points, the color of the snake changes at frequent intervals resembling that the player has reached a level harder than the previous one. It becomes difficult to control the snake as it grows longer. The user controls the direction of the snake&rsquo;s head (w=up, s=down, a=left, d=right) and the snake&rsquo;s body follows. The player cannot stop the snake from moving while the game is in progress and cannot make the snake go in reverse. There is as start button where the player clicks and moves to the second page where the game is to be played. Inside a green canvas the playing arena is created where the snake snatches it food and if it fails the game gets over and the score is displayed in the screen and the player is redirected to the first page. Some of the interactive sounds are provided in the background to create the atmosphere of excitement when the gameplay is in progress. Moreover when you click on the game you can hear the audio commentary of the game instruction made to make you understand more easily.</p>

<p>The game grid is made up of cells where the game is confined in absolute sized chunks of data. Each time the snake moves the value of the grid gets changed. The values of the grid increases or decreases according to the control of the user. The width and height denotes the amount of columns and rows of the grid respectively. The init function (discussed later) initializes a c*r grid with the direction variable d, where the variables c and r represents the updated width and height of the grid respectively.</p>

<p>The game grid is made up of cells where the game is confined in absolute sized chunks of data. Each time the snake moves the value of the grid gets changed. The values of the grid increases or decreases according to the control of the user. The width and height denotes the amount of columns and rows of the grid respectively. The init function (discussed later) initializes a c*r grid with the direction variable d, where the variables c and r represents the updated width and height of the grid respectively.</p>
<hr>
<p><h1>Rescue Out Pikachu</h1></p>
<p>This is a single player game. The objective of the player is to avoid the falling rocks<br>
from crashing into Pikachu. (whom the player has to save). The player can control<br>
Pikachu using the A and D buttons on the keyboard (A = left and D = right). After<br>
every rock has been successfully dodged by pika the score is increased by 100. A<br>
player gets 5 lives every round on exhaustment of which the final score is calculated<br>
and compared with previous best for the current session if any and updated. Anytime<br>
the player can press the quit button after which the highest score in that session is sent<br>
to the database and redirected to player&rsquo;s homepage.<br>
The canvas dimensions are width 800px and height 482px with a yellow border. The<br>
canvas consists of a landslide background, five round rocks of different color and sizes.<br>
Pikachu, a image, whom the player has to save from falling rocks.<br>
Pikachu is a image of dimension 54 x 50 whereas the rocks are all drawn as circles having<br>
different sizes.<br>
I start off by defining the rock objects. The rocks are simple canvas drawn circles with<br>
different colors (namely yellow, orange, green, yellow) of radius 50 pixels. Then I define<br>
the player i.e. the one that the user will have to save from crashing against the rocks. For<br>
displaying the player I have simply made a player object and defined the object as an<br>
image by providing the image url.<br>
Then we need to define the initial positions of the player as well as the rocks.<br>
</p>
<hr>

<p><h1>The Maze Game</h1></p>
<p>&bull; The game is a single player game.<br> &bull; The game generates a different maze each time it is started.<br> &bull; The player has to solve the maze i.e. reach the yellow tile at the rightmost bottom of the maze within the stipulated time.<br> &bull; When the player reaches the yellow tile he/she gets a message that the maze has been solved and he/she gets to know ones score.<br> &bull; After knowing the score the maze gets reset and the player can start playing again.<br> &bull; The player can quit the game anytime by pressing the quit button by clicking on the quit button on the page.<br> &bull; The game has three difficulty levels namely: easy, normal and hard. Each level has a varying size of mazes and different stipulated times in which the player has to solve the maze.<br> &bull; When the player quits the game he/she is able to see their highest score in that particular session as the best score.</p>

<p>The main functions and algorithms that have been deployed to design the game have been described below: I have used the recursive backtracking algorithm to design the maze which is one of the basic algorithms to design a maze. The recursive backtracking algorithm can be described as: <br>1. Choose a starting point in the field. <br>2. Randomly choose a wall at that point and carve a passage through to the adjacent cell, but only if the adjacent cell has not been visited yet. This becomes the new current cell.<br> 3. If all adjacent cells have been visited, back up to the last cell that has uncarved walls and repeat.<br> 4. The algorithm ends when the process has backed all the way up to the starting point.</p>

<p>The array contains only 0s and 1s where 1 represent path and 0 represent walls. So initially the maze is composed of only walls. By default I choose (0,0) index of the generate array as the starting point. After this the control gets transferred the to the recursive function carvepath() which has been described below. The function returns the final state of the array generate which is used to draw the maze.</p>

<p>The recursive function that makes out the path in the maze according to the following procedure: <br>1. Generate an integer array with 4 random numbers to represent directions.<br> 2. Start a for loop to go for 4 times. <br>3. Set up a switch statement to take care of 4 directions.<br> 4. For that direction, check if the new cell will be out of maze or if it&rsquo;s a path already open. If so, do nothing.<br> 5. If the cell in that direction is a wall, set that cell to path and call recursive method passing the new current row and column.<br> 6. Done.</p>

<p>Contents of shuffling the array is done by the following way :- <br>1. Start at the end of our array by selecting the last item. <br>2. Then using the random function() select a random number from 0 to (size of the array - 2). <br>3. Then just swap the last element of the array with the element that is present in the array at the randomly selected index. <br>4. Repeat steps 1, 2, 3 for the second last element of the array and so on till the first element of the array. Successful implementation of these function gives us the generate array which helps in designing the maze.</p>

<p>For drawing on the webpage Html canvas has been used. The maze that have been drawn has red and black tiles. The red tiles represent path and the black tiles represent wall. The generate array is used to draw the maze in the following manner:<br> 1. Whenever the element in the array is 1 a red tile is drawn.<br> 2. Whenever the element in the array is 0 a black tile is drawn. Successful completion of all the iterations draws the complete maze on the webpage.</p>

<p>A function simply draws a 5*5 square at the starting point [i.e.(0,0) of the maze]. The next thing to implement is to make the blue player move using the arrow keys or WASD. The first step is to calculate the new X and Y-coordinate of the blue rectangle. The second step is to move the rectangle, if it can move, and to show a &quot;Congratulations!&quot; message if the player reached the end point (the yellow tile). A function takes the keycodes of the keys pressed by the user as an input and uses a switch case to move the player. For example the initial position of the player is represented by its x and y coordinates as x =0 and y=0. If the user presses the up W(up) key the y coordinate of the player decreases by 5(as the player&rsquo;s size is 5*5) and the x coordinate is the same. Correspondingly when down key is pressed the y coordinate is increased by 5 and so on. After the execution of the switch case the player is deleted from the previous position and drawn in the new position using the new x and y coordinates. This procedure enables the player to move about the maze. In addition to this a keydown listener is needed to get the code of the key pressed by the user. The above function allows the player to move about the maze. But the player cannot move through the wall. So we need to detect whether the tile in which the player is going to move is a wall or a path i.e. red or black. <br>1. Check whether the blue rectangle would move inside the bounds of the canvas.<br> 2. If that's the case, get the image data of the rectangle with x = newX, y = newY, width = 5, height = 5. I take 5 as width and height because that's the size of the player. Here newX and newY represent the new position of the played calculated using according to the key pressed by the user. <br> 3. Use a for loop to look at all pixels: if any of them has the color black, then the blue rectangle can't move. If any of them has the color yellow, then you reached the end point. This function returns whether the player can move or not to the next tile. Now we need to display the score according to the number of moves the user has used up to reach the ending point.</p>

<p>The game starts from leftmost top and ends at the right lowermost corner of the maze. So whenever the user presses the left or up arrow it mostly implies that the user has reached a dead end and is trying to backtrack to get to the correct path. So the user is penalized for every up or left move (only if up or left move is greater than 40). A function implements the timer and also determines what to do when the player loses or wins. To implement the timer I have just initiated a variable to the stipulated time and decrement it by 1 every 1 sec using the setTimeout function and printed that variable each second as the time remaining to solve the maze.</p>
<hr>
<p><h1>Copter Crash</h1></p>
<p>&bull; The game is a single player game.<br>
&bull; The game generates random vertical obstacles.<br>
&bull; The player has to fly the Copter through the obstacles.<br>
&bull; The game ends once the copter crashes into an obstacle.<br>
&bull; Throughout the gameplay, the player is able to see the current score.<br>
&bull; The player can quit the game anytime by pressing the quit button by clicking on<br>
the quit button on the page.<br>
&bull; When the player quits the game he/she is able to see their highest score in that<br>
particular session as the best score.</p>
<br>
<p>Canvas has been used as the basic html element to draw the components of the game</p>
<p>The <strong>Start </strong>function initializes all the components and variables in the game. It also loads the
background image and starts the background music playback. From this function all the
other necessary functions are called.
<p>The gameArena function initializes the area the canvas takes up on the screen. It sets the X- axis and<br>
Y- axis of the game area. It also uses the WINDOWS EVENT LISTENER to take the key<br>
presses as the inputs to control the game. Only the inputs of the &ldquo;UP&rdquo; and &ldquo;DOWN&rdquo;<br>
cursor keys are taken into consideration as the player object can only move vertically in<br>
the game area. The cursor is also hidden over the game area in this function. That is , if<br>
the mouse is hovered over the canvas, the cursor will disapper.</p>
<p>&bull; Obstacles are generated using the component function.<br>
&bull; Vertical Obstacles of random height are generated with a gap in between them for<br>
the player to pass through.<br>
&bull; The gap and obstacle height are maintained randomly, although there is a<br>
minimum gap and minimum height is also given by default.<br>
&bull; The player object image is also drawn.<br>
This component function also doubles up as the Collision Detection function. This is done by measuring the pixels taken up by the player object and the obstacles. If the pixels of<br>
each of them overlaps or comes in contact with each other, immediately the game is<br>
stopped with a &ldquo;Game Over&rdquo; music in the back ground. Once the game is over the<br>
canvas components stop moving and the player has to click on the &ldquo;Play Again&rdquo;<br>
button which reloads the page and that resets all the canvas elements.</p>
<p>On collision the updateGameArena function in the game stops the other components from being drawn. Here in this<br>
function, the score is also calculated. The score is actually the calculation of the number<br>
of frames. Number of frames per second are counted and are displayed on the screen via the document.getElementById().innerHTML tag. This is again stored locally in the<br>
browser&rsquo;s local storage through the localStorage.setItem tag for the ongoing session.<br>
Once the player hits the &ldquo;Quit&rdquo; button the value from the local storage is sent to the<br>
server using the goBack() function which contains the required code for backend.<br>
The background sounds are also stopped in this function.</p>

<hr>

<p><h1>Jumping Ball</h1></p>
<p>&bull; The game is a single player game.<br>
&bull; The game generates random obstacles at every time the game started and<br>
initialized the ball<br>
&bull; The player need to jump the ball using the jump button for every comping<br>
obstacles to score high.<br>
&bull; After knowing the score the player need to click on the play again button to restart<br>
the game.<br>
&bull; The player can quit the game anytime by pressing the quit button by clicking on<br>
the quit button on the page.<br>
&bull; When the player quits the game he/she is able to see their highest score in that<br>
particular session as the best score.</p>
<p>The canvas is used for graphical representation of the game entitled JUMPING BALL. It
uses mainly two types of fill functions namely- fillStyle and fillRect. The fillStyle
function is used for the obstacles. It is also used to change the text color. The fillRect
function draws a rectangle at the canvas at the (x , y) co-ordinate. The context of the
canvas is two dimensional in nature.</p>
<p>There are four buttons in the game namely- Start, Jump, Play Again and Quit. The Start
button is placed in the first page before the game starts and the other three buttons are
placed in the gaming page. All the buttons are designed using CSS. Box shadowing and
hovering also done in the Start and jump button and shadow color is also included as if when the player clicks the button it changes color. The Play Again button restarts the
game. The quit button quits the game and returns in the homepage of our website.</p>
<p>The update function is a very important function for the whole game. It helps to randomly generate the
obstacles after every 1 or 2 frame. It creates the obstacles those have random height.
There is different colored obstacle after every 100 milliseconds interval. It also helps to
maintain the obstacle approaching speed by calculating the frame number.</p>
<hr>
<p><h1>Rush</h1></p>
<p>Rush is a single player, time bound, racing game where the player&rsquo;s car has to dodge its<br>
way preventing collisions with traffic to reach the finishing line within the given time.<br>
The game has several modules categorized into four categories:<br>
&bull; Player-Car,<br>
&bull; Traffic,<br>
&bull; Game-Arena,<br>
&bull; Game-Control.<br>
Before the game starts instructions are displayed and also lets you choose your car from<br>
different colored cars. On clicking a car it is selected and you move to game arena. In the<br>
game arena within Game-Control section there&rsquo;s a play/pause button which helps to<br>
start/pause the game at any time.<br>
On clicking the play/pause button the game starts in full screen mode the start-line mark<br>
goes off and the scenery, your car, traffic all start moving. Initially the car moves at a<br>
certain constant speed which on accelerating moves faster. Traffic will move randomly<br>
each at different speeds and occasionally change their direction.<br>
When Player-Car collides with other vehicles a life is reduced from the initial set of 5<br>
lives. A recovery time of 4seconds is given to get back on track. Score is also reduced due<br>
to collision.<br>
The various forms of scoring is given as screenshot from the instruction panel at the end<br>
of the chapter.<br>
Traffic consists of different colored cars(red, green, yellow, pink, orange) and a truck<br>
having various speeds.<br>
Game-Arena is divided into several components and their subdivisions:<br>
&bull; Top-Panel:<br>
o Play/Pause button,<br>
o Refresh button,<br>
o Quit button,<br>
o Timer,<br>
o Scoreboard.<br>
&bull; Game-Panel:<br>
o Start-Line,<br>
o Left-Scenery,<br>
o Road,<br>
o Right-Scenery.<br>
&bull; Bottom-Panel:<br>
o Lives,<br>
o Distance-meter,<br>
o Message-Bar.<br>
Game-Control has Play/Pause button, Refresh button to start a new game and a Timer.<br>
Apart from these onscreen buttons there are also keyboard keys needed to control Player-<br>
Car described in instruction page screenshot.<br>
</p>
<p>The <strong>Design</strong> panel has five components each for a certain game-control function. All the three
buttons (Quit, Play/Pause, and Refresh) are actually images which are functioning as
buttons with animation implemented on them.
Timer is also a component of this panel which starts at a initial value of ninety seconds
and counts down to zero. It is again an image of a stopwatch with a value written over it
and the values decreases at each interval of one sec.
Scoreboard is designed using CSS. It has two subparts one shows current score and the
other best score for the current playing session.
This panel also consists of the game title, i.e. RUSH.
</p>
<p>The buttons have functions exactly same as their name suggests.<br>
Quit: to quit the game and go to profile page.<br>
Play/Pause: to start the game or pause it for some moment.<br>
Refresh: to start a new game. It resets current score and compares it with best score.<br>
The timer counts down to zero from ninety which marks the finishing of the game.<br>
The scoreboard section shows current score and best score. Best score is shown for the<br>
current session and not all time best score for the player in that game.</p>

<p>The functionality to these components are given using animation which are in paused or<br>
running state as per game&rsquo;s need. On clicking Play/Pause button the animation of the<br>
whole game arena gets paused. Jquery is used extensively for switching on/off component<br>
functionalities. Even components are shown / hidden by changing properties done using<br>
jquery.</p>

<p>Start-Line: It&rsquo;s shown just before game start. It is kept in front of Player-Car.<br>
Left-Scenery: A series of lush green field image animated with infinite repetition.<br>
Right-Scenery: It works same as left-scenery.<br>
Road: It has two categories of vehicles one Player-Car and the other is traffic. Traffic<br>
moves are randomized while the player&rsquo;s car moves according to user control.<br>
The Design components are again designed using images which are animated for proper<br>
functioning. It has a #lives section component, progress / distance meter component and a<br>
message bar.<br>
The lives section has images of red and black hearts. The message bar shows various<br>
messages during gameplay. The distance / progress meter shows how far the player-car is<br>
from the destination. It moves in a synchronized manner along with the car. It accelerates<br>
if you accelerate your game car and similarly slows down on braking.</p>
<hr>
<p><h1>Tetris</h1></p>
<p>&bull; The game is PRIMARILY a single player game which doubles up as a multiplayer<br>
game if you have a partner.<br>
&bull; The player has to move, rotate and arrange the falling blocks on top of each other<br>
in such a manner that they form complete row.<br>
&bull; Once a row is filled up, it disappears and player gains point.<br>
&bull; The bricks keep falling as a result they pile up. The main aim of the player is to<br>
prevent the piled up blocks from reaching the top.<br>
&bull; Once the pile hits the top, the game ends.<br>
&bull; The player can quit the game anytime by pressing the quit button by clicking on<br>
the quit button on the page.<br>
&bull; When the player quits the game he/she is able to see their highest score in that<br>
particular session as the best score.</p>

<p>The main functions and algorithms that have been deployed to design the game have been<br>
described below:<br>
A HTML canvas has been created inside which the game runs. The canvas is then filled up<br>
with matrices.<br>
This drawmatrix function draws the matrix pieces that are created by the createMatrix function. This<br>
also makes sure that random pieces are drawn and that each piece has its own color.<br>
Once the blocks start falling, they need to reach the bottom of the canvas and stay there.<br>
When another block reaches the same point, it needs to vertically align itself with all the<br>
previous blocks and merge with them horizontally. This function does that work.<br>
In order to rotate a matrix, we first need to swap the rows of the matrix with the colums<br>
and then we have to transpose and matrix and again swap the rows with columns. This<br>
function does this work. It follows the above mentioned process to generate a clockwise<br>
rotation and follows the step inversely to create a anti-clockwise rotation. This function<br>
uses the &ldquo;windows event listener&rdquo; function to assign the rotation functions to different<br>
keyboard key presses.</p>
<hr>
<p><h1>Ping-Pong</h1></p>
<p>&bull; The game is a multiplayer game.<br>
&bull; The game generates two player paddles one for player one and other for player<br>
two at every time the game started and initialized the ball<br>
&bull; The players need to move horizontally their paddles to give a hard battle for the<br>
opponent and to score max within 1 minute.<br>
&bull; After knowing the score the player need to click on the play again button to restart<br>
the game.<br>
&bull; The game shows individual score for every stage but there is only one best score<br>
for the wining person. The best score is changed if and only if the best score is<br>
higher from the previous best score. If the match draws the best score reset to 0.<br>
&bull; The player can quit the game anytime by pressing the quit button by clicking on<br>
the quit button on the page.<br>
&bull; When the player quits the game he/she is able to see their highest score in that<br>
particular session as the best score.</p>
<p>The canvas is used for graphical representation of the game entitled PING PONG. It uses
mainly two types of fill functions namely- fillStyle and fillRect. The fillStyle function is
used for the paddles. It is also used to change the text color. The fillRect function draws a
rectangle at the canvas at the(x,y) co-ordinate. The context of the canvas is two
dimensional in nature.</p>
<P>There are three buttons in the game namely- Start, Play Again and Quit. The Start button
is placed in the first page before the game starts and the other three buttons are placed in
the gaming page. All the buttons are designed using CSS. Box shadowing and hovering
also done in the Start button and shadow color is also included as if when the player
clicks the button it changes color. The Play Again button restarts the game but it only
appears when on a 60 second round is over. The quit button quits the game and returns in
the homepage of our website.</p>
<hr>
<p><h1>Galaxy-War</h1></p>
<p>Galaxy War is a single player 2d arcade flash game built mainly for the children. The
main objective of the game is to knock down the enemy ship before they knock you
down.
Before the game starts the instruction are displayed along with a video. In the
game, we will get to see a layer of enemy ship moving across the canvas and to knock
those enemy ships down we have given another spaceship.
On clicking the play button provided, the game starts of its own and what you
have to do is to shoot those enemy ships. To control the given spaceship, you have to
press left, right, up and down keys on your keyboard and to shoot you have to press the
spacebar. Once you shoot all the enemy ship down you will get another set of enemy
ships and this will continue until they knock you down. On every hit, you will be awarded
fifty point and you will lose hundred point from your pocket when they knock you down.
Some of the interactive sounds are provided in the background to create the
atmosphere of excitement when the gameplay is in progress.</p>
<p>The whole interface is designed using Html, JavaScript and Cascade Style Sheets.</p>
<p>The html document structure is quite simple, as the game is totally rendered on canvas
element.</p>
<p>The very first thing was to create a canvas element. In this game, we have used
three canvas element and all canvases are stacked on top of each other and we style them
in the proper order on the screen.
First canvas was used for scrolling the background which moves each frame.
Second canvas was created for the player spaceship and the third canvas was used for the
bullets that move each frame once they are on the screen.</p>
<p>Firstly, we have defined an object to hold all the images for our game so that we can use
one image as many time as we can in the game. We have used five images in our game
they are: - background image, player spaceship, player spaceship bullet, enemy ship
and enemy ship bullet.
These five images that we have used are all draw able objects. The Drawable object is
special object that all other objects of our game will inherit from. If we want to make
changes to how an object should function, we will have to change it from the Drawable
object.
This Drawable object has a method init which allows to set the values of x and y
position of the object in the canvas.
After all these things are done then we load the images in the game. </P>
<p>After loading all the object then we create the ship object that the player will control. The
ship is drawn on the second canvas i.e. “ship” canvas.
The ship object sets the speed of the spaceship and also creates the object pool for
the bullets. The player spaceship has 3 moves i.e. draw, move and fire.
For the bullets, we have created bullet object which the spaceship fires. These
bullets are drawn on the main canvas. The bullet object sets the initial state of bullets by
setting alive to be false. When the bullets are in use then the value will be true. To create
a new set of bullets we have used spawn() method and we take x and y value to
determine the speed of the bullet.
After setting the spaceship and bullet object then we call a method which says
that the ship can fire and we reset the counter to 0. The spaceship fires two bullet at a time. A method call is used to get two bullets from the spaceship at once and position them just above the two guns of the spaceship.</p>
<p>We have created enemy ship objects for enemy ship to perform. The enemies in our game
will imitate a movement i.e. moving back and forth across the screen. The enemies will
not move downwards they will just hit the side of the canvas.
For the enemy bullet, we have created enemyBullet object that handles all the
bullets for all the enemy ships which is controlled by the game object.</p>
<p>Galaxy War begins with a layer of enemy ships and a player spaceship using which you
have to shoot the enemy ship provided. After knocking down all the enemy ship you will
get another set of enemy ships and this will continue until they knock you down. On
every hit, you will get fifty points and you will lose thousand points if the enemy ship
knocks you down. You will get only one life with that one life you have shoot as many
enemy as you can</p>
<p>We have talked about the gameplay. Now, in this portion will see how the collision
detection is done. For the collision detection, we have used bounding box collision
detection algorithm.
In this bounding box collision detection, we are taking two object to see if the
bounds of the first object are within the bound of the second object or not.
In this game, the bullet of player spaceship will collide with the bullets of the
enemy ship.</p>
<p>The logic behind losing in this game is very simple. If you are hit by the enemy bullet you
will lose your life and game will get over. But you can restart the game by clicking the
PlayAgain button provided on the screen. This PlayAgain button will be visible when
the game is over. The PlayAgain button takes all the game elements back to the initial
state and starts the game over again.</p>
<p>After the basic structure of the game is complete then we have created the final object of
the game which will handle the entire game. To hold all the objects and data of our game
we have created an object called Game object.
We have created two methods in the Game object- the init function that holds all
the canvas element of our game and another function is start function which starts the
animation loop and it is called just after the init function returns the value true.
For the animation, we have created an animation loop in our game which calls
the requestAnimationFrame to optimize the game loop and draws all the game objects
on the canvas.</p>
<hr>
<p><h1>Primal Crimes</h1></p> 
                          <p>Educational games help children learn through interactive play. For small children and<br>
toddlers, memory games are a comprehensive option for teaching early math and reading<br>
skills. Memory game themes vary based on the ages of the players, but the concept of<br>
concentration and matching is common to each game. Primal Crimes is a strategy based<br>
memory game where you have to match the similar elements placed inside a canvas. Here<br>
the users need to find a match for the pictures placed in the canvas. This game tests one&rsquo;s<br>
memory and patience and also sees that the person can remember well or not. If a match<br>
occurs, then the corresponding matching pairs will be displayed on the screen and if no<br>
match occurs then the respective images are flipped back over to their original positions.<br>
In this game the memory skills of the player are tested in this way. When all matches are<br>
found the program reshuffles the entire board so that all of the cards are in new location.<br>
There is as start button where the player clicks and moves to the second page where the<br>
game is to be played. There are two options kept for the player to play the game. One is to<br>
play normally and the other is to play with the timer.<br>
The whole interface is designed using HTML, JavaScript and CSS.<br>
The canvas consists of a rectangular box under which there are the boxes containing<br>
respective images. The variable &lsquo;pair_array&rsquo; contains all the images (detective<br>
equipment&rsquo;s). The &lsquo;pair_array&rsquo; is mainly used to dynamically create all the images. Each<br>
tile is given respective ids. The images are dynamically placed into the canvas board. The<br>
canvas background color is also provided to increase its look and feel.<br>
The buttons have functions exactly same as their name suggests.<br>
Quit: To quit the game and go to profile page.<br>
Play: To start the game<br>
Play Again: To start a new game as the page reloads itself when this button is pressed. It<br>
resets current score and compares it with best score.<br>
Clock: This button is made for the ones who want to play using Timer in the game. The<br>
main purpose of this button is that the countdown starts accordingly when this button is<br>
clicked. The countdown runs with &rsquo;mm:ss&rsquo; representation where &lsquo;mm&rsquo; represents<br>
minutes and &lsquo;ss&rsquo; represents seconds.<br>
The scoreboard section shows current score and best score. Best score is shown for the<br>
current session and not all time best score for the player in that game.</p>

<hr>
                            </div>
                            <div class="col-sm-4">
                                    <img src="icon3.png" class="img-responsive img-thumbnail" alt="" width=1300 />
                            </div>
                    </div>
                    
            </section>
           
        <footer>
            <hr>
                <div class="container">
                    <div class="row">
                        <div id="contact" class="col-sm-6">
                                <h4>Quick Contact</h4>
                                				
                                <p>Email: flashnfun@gmail.com</p>
                                <p>Facebook page: Flashnfun.info </p>
                        </div>
                         <!--<div class="col-sm-6">
                                <h4>Stay Connected</h4>
                                <!--div class="pull-right"
                                <a href=""><i class="fa fa-facebook-square fa-3x"></i></a>
                                <a href=""><i class="fa fa-twitter-square fa-3x"></i></a>
                                <a href=""><i class="fa fa-youtube-square fa-3x"></i></a>
                                <a href=""><i class="fa fa-google-plus-square fa-3x"></i></a>
                                <a href=""><i class="fa fa-linkedin-square fa-3x"></i></a>
                                <a href=""><i class="fa fa-google fa-3x"></i></a>
                        </div>-->
                    </div>
                </div>
                <hr>
                <div class="footer-bottom">
                    <div class="container">
                        <p class="pull-left"> Copyright &copy; flashnfun.info. </p>
                        <!--<div class="pull-right">
                                <i class="fa fa-cc-visa"></i>
                                <i class="fa fa-cc-mastercard"></i>
                                <i class="fa fa-cc-diners-club"></i>
                                <i class="fa fa-cc-paypal"></i> 
                        </div>-->
                    </div>
                </div>
            </footer>
        <div class="modal fade brandmodal" id="SignInModal" role="dialog" >
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
        
        </div>
           
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">x</button>
                        <h4 class="modal-title"><img src="image1.png" alt="" class="modal-logo" /></h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" autocomplete="off">
                                <h4><i class="fa fa-lock"></i> <strong>Log In</strong></h4>
                                <div class="modalform-group">
                                    <div class="form-group">
                                        <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-envelope"></i></span>
                                                <input type="email" id="em" name="email" class="form-control" placeholder="Email" required="" />
                                        </div>
                                        <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-key"></i> </span>
                                                <input type="password" id="pass" name="password"  class="form-control" placeholder="Password" required="" />
                                        </div>
                                        
                                        </div>
                                        
                                    <input type="submit" name="login" value="Sign In" class="btn btn-block btn-danger" />
                                     <!--<div class="form-group" >
                                            <p style="color: red" id="invalid">
                                                </p>
                                    </div>  -->
                                </div>
                        </form> 
                    </div>
                    <div class="modal-footer">
                        <span class="pull-left"><a href="forgotPassword.php" class="btn btn-default btn-sm ">
                            <i title="Forgot Password ?" class="fa fa-1x fa-question-circle"></i> Forgot Password ? </a></span>
                    </div>
                    <div class="pr-wrap">
                        <div class="pass-reset">
                            <label>
                                    Enter the email you signed up with
                            </label>
                            <input type="email" placeholder="Email" />
                            <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                        </div>
                    </div>
            </div>
        </div>
    </div>
   
<br>

<div align="center"><img src="http://simplehitcounter.com/hit.php?uid=2279650&f=16777215&b=0" border="0" height="18" width="90" alt="web counter"></a><br><a href="#" onclick="window.location.reload(true);">NO OF VISITS</a></div>


    </body>
</html>
<?php
    $errormsg = "";
     
     if(isset($_POST['login'])){
     
        extract($_POST);
       
        $link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") 
                or die("Could not connect database " .mysqli_error($link));
         if (!$link) {
             echo '<script>console.log("Could not connect to server. Please try again later.")</script>';
            
         } else {
            session_start();           
            
            $password = md5($password);
            $qry = "select pid from playerInfo where email='$email' and password = '$password'";
            $resultset = mysqli_query($link, $qry);
                  
            $count = mysqli_num_rows($resultset);
            if ($count == 1) {                
            	
                $pidUser= mysqli_fetch_object($resultset)->pid;             
                $_SESSION["email"] = $email;
                echo "<script type='text/javascript'>var piduser = \"$pidUser\";
                    window.location.href = 'ProfilePage.php?pid=' + piduser;
                    </script>";
                
                exit;
            } else {
                echo '<div class="invalid"><span class="closeBtn" onclick="this.parentElement.style.display="none";">&times;</span><br>Invalid emaild or password!</div>';                 
                echo "<script type='text/javascript'>$('.invalid').css('visibility','visible');</script>";                   
                echo "<script type='text/javascript'>setTimeout(function(){\$('.invalid').css('visibility','hidden');},3000);</script>";
            }
        }
     }
    
?>
