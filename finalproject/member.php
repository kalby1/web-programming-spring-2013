<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "php/thankyou.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "loginpage.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Member</title>
  <link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'> <!--  link to google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'> <!--  link to google fonts -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="http://code.jquery.com/jquery.js"></script> <!-- remote link to Jquery file -->
  <script src="bootstrap/js/bootstrap.js"></script> <!-- Bootstrap code -->  
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> <!-- remote link to Jquery ui library -->
  <script src="css/jquery-ui-1.10.3.custom.min.css"></script> <!-- remote link to Jquery ui min file version -->
  <script src="js/mytunes.js"></script> <!-- link to javascript code -->
  <script src="js/send-contact.js"></script> <!-- contactus javascript code -->  
  
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> <!--link to bootstrap css -->
  <link href="css/mytunes.css" rel="stylesheet" media="screen"> <!--  link to mytunes.css -->
  
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
  <!-- page header -->
  <header class="row"> 
    <div class="container">
      <h1><span class="red">MYRECORDBIN</span>|<span class="tangerine red"> Member</span></h1>
  </div>
  </header>
  <!-- announces updates as new tracks added --> 
  <div class="container">
  <div id="data-update" class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Your Data Has Been Updated.
    </div>
    
    <!--NavBar --> 
<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
 
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <!-- Be sure to leave the brand out there if you want it shown -->
      <a class="brand" href="#"></a>
      <p class="brand">FINAL PROJECT CS53.11b </p>
      <!-- Everything you want hidden at 940px or less, place within here -->
      <div class="nav-collapse collapse rightalign">
        <!-- .nav, .navbar-search, .navbar-form, etc -->
        <a href="register.php">Register</a> | <a data-toggle="modal" data-target="#about">About</a> || <a data-toggle="modal" data-target="#contactus">Contact</a> ||| <a href="<?php echo $logoutAction ?>">Log out</a></div>
    </div>
  </div>
</div>    
<!--Navbar starts -->   
<!-- Sections start -->
  	<section id="genre" class="row"></section>
 	<section id="track" class="row"></section>
<!-- Sections ends --> 

<!-- Add a new track -->    
<div id="addtrack" class="modal hide fade">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Add a New Track</h3>
      </div>
      <div class="modal-body">
        	<p id="newtrackname" contenteditable="true">New Track Name</p>
      </div>
      <div class="modal-footer">
            <a href="#"  data-dismiss="modal" class="btn">Close</a>
            <a href="#" class="btn btn-primary" id="newtrack">Save new</a>
      </div>
</div>
<!-- New track ends -->
  
</div>     
    <!-- Add a new genre -->
	<div id="addgenre" class="modal hide fade">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Add a  Genre</h3>
      </div>
      <div class="modal-body">
        <p id="newgenrename" contenteditable="true">New Genre</p>
      </div>
      <div class="modal-footer">
                        <a href="#" class="btn btn-primary" id="newgenre">Save new</a>
      </div>
</div>
<!-- Add a new genre ends -->

<!-- The page accordion home file -->
<div class="accordion" id="pages">
	<div class="accordion-group">
     	<div class="accordion-heading, one-accordion">
        	<a class="accordion-toggle btn, one-accordion" data-toggle="collapse" data-parent="#pages" href="#home">Home</a>
    </div>
    <div id="home" class="accordion-body collapse">
        <div class="accordion-inner">
            <p class="darkfont">Hey! This is a great place to start seeing my musical tastes. I am just going to show some of the notes that keep me interesting. The "Hip Hop" category is a french singer I just threw out there, 
                because he cool. Support his work, and I am sure he will appreciate it. I made a valiant attempt but can't find a "frame" of the dude and his team.<b> To do more with MyrecordBin consider becoming a registered member (below)!
                Now that you are on my team (Big Ups!) take care of my stuff for me. Honest! Do not <em>delete</em> my songs,at least not before everyone in class gets a chance to listen. MUCH APPRECIATED!!</b> 
            </p>
            <p class="darkfont"> CHECK THIS OUT! Of all the songs listed, all which are special to me, what is my most precious song? <b><em>Court and Spark</em></b> by <b>Joni Mitchell</b>. Oddly, it's a song I will always associate with
                a 1974 love.... Nearly, the best two minutes plus song of my life! At that time, I did not know how special I would feel about this song so many years later....Lordy.
            </p>     
        </div>
    </div>
</div>

<div class="accordion-group">
     	<div class="accordion-heading, one-accordion">
        	<a class="accordion-toggle btn, one-accordion indent" data-toggle="collapse" data-parent="#pages" href="#Jay-room">Jay &amp; Team - My Notes</a>
    </div>
    <div id="Jay-room" class="accordion-body collapse indent">
        <div class="accordion-inner">
            <p class="darkfont">My website design uses these items: <li>A circle frame for my picture on the registration page.</li><li>An accordion file on the index page and member page.</li>
            <li>NavBar on the index and subsequent pages.</li><li>A photo slide show on the index and member pages.</li><li>Dreamweaver log-in/out and redirect scripts.</li><li>Mysqli database from which songs are stored and pulled out.</li>
            <li>Modals &quot;About&quot; and &quot;Contact with a working form are contained on the index and member pages.</li><li>Last, certainly not least some really great tunes and photographs! Thanks for a great semester.</li>
            <li>* I tried using JsLint on my Javascript and it broke my code. </li><li>**<b>My biggest obstacle: I do not understand how to make my code look neat!</b></li>
            </p>
      </div>
    </div>
</div>

<!-- The page accordion Contact Me file -->
<div class="accordion-group">
      <div class="accordion-heading, one-accordion">
          <a class="accordion-toggle btn,, one-accordion" data-toggle="collapse" data-parent="#pages" href="#contact">Contact Me</a>
      </div>
      
      <div id="contact" class="accordion-body collapse">
          <div class="accordion-inner">
            <p class="darkfont">I would love to know what you think about this and that. Hit me up. 
                
      <!--  Contact modals toggle switches start here -->
          <a data-toggle="modal" data-target="#contactus">Contact</a>
      <!-- About and Contact modals toggle switches end here -->

            <div id="about" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>About us</h3>
          </div>
          
    <div class="modal-body">
        <p class="hero-unit font12">With MyRECORDBIN having recently celebrated its second anniversary, the public’s desire for our building musical materials is growing everyday. Our catalog choices will soon be unparalleled. We will explore every oopportunity to unearth essential music tunes for your listening pleasure! Your visits and audio listening are treasured by all who work here. Be our  fans and <em>contributors</em> across the globe.
        </p>
        <p class="color2"> If you’re excited about working on web music technologies and have experience with HTML/CSS/JS and PHP, check out all the work staff openings coming soon down the pike with us.</p>
  
        <p class="color2"> @MYRECORDBIN on Facebook.</p>
    </div>
      
    <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Close</a>
    </div>
  </div> 
   
  	<!-- Contact us modal -->
    <div id="contactus" class="modal hide fade">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>MyRecordBin Contact Line</h3>
      </div>
      <div class="hero-unit2">
        <div class="row"><p class="span2">Name</p><input type="text" id="customername" class="span4" /></div>
        <div class="row"><p class="span2">Email</p><input type="email" id="email" class="span4" /></div>  	
        <div class="row"><p class="span2">Phone</p><input type="tel" id="phone" class="span4" /></div>
        <div class="row"><p class="span2">Comment</p><textarea name="comment" id="comment" class="span4" cols="" rows=""></textarea></div>
        <br />
        <p>Check boxes that apply!</p>
        
        <div class="row"><p class="span2">Prefer we call?</p><input type="checkbox" class="span4 choices" value="Yes" /></div>
        <div class="row"><p class="span2">Interested in a jam session?</p><input type="checkbox" class="span4 choices" value="Yes" /></div>
        <div class="row"><p class="span2">Should I allow albums to be added?</p><input type="checkbox" class="span4 choices" value="Yes" /></div>
        <br />
        <p>MYRECORDBIN IS on Twitter.</p>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Close</a>
        <a href="#" class-"btn btn-primary" data-dismiss="modal" id="send-contact" >Send</a>
      </div>
    </div>
    <!-- contactus modal ends here -->
  </div>
</div>
</div>
</div>
<!-- Accordion pages end here-->

<!-- Carousel starts here -->
<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item"><img class="item" src="images/excalibur400.jpg" width="450" height="400" alt="excalibur car 450 x 400"></div>
    <div class="item"><img class="item" src="images/Zeppelin.jpg" width="450" height="400" alt="zeppelin 450 x 400"></div>
    <div class="item"><img class="item" src="images/j_hendricks.jpg" width="450" height="400" alt="j_hendricks 450 x 400"></div>
    <div class="item"><img class="item" src="images/studebaker-president-classic-04.jpg" width="450" height="400" alt="studebaker 450 x 400"></div>
    <div class="item"><img class="item" src="images/joni.jpg" width="450" height="400" alt="joni 450 x 400"></div>
    <div class="item"><img class="item" src="images/blues.jpg" width="450" height="400" alt="blues 450 x 400"></div>
    <div class="item"><img class="item" src="images/Efitzgerald.jpg" width="450" height="400" alt="ellafitgerald 450 x 400"></div>
    <div class="item"><img class="item" src="images/gto.jpg" width="450" height="400" alt="gto 450 x 400"></div>
    <div class="item"><img class="item" src="images/pretenders.jpg" width="450" height="400" alt="pretenders 450 x 400"></div>
    <div class="item"><img class="item" src="images/neverown.jpg" width="450" height="400" alt="never own 450 x 400"></div>
    <div class="item"><img class="item" src="images/tina-turner.jpg" width="450" height="400" alt="tina-turner 450 x 400"></div>
    <div class="item"><img class="item" src="images/goldcar.jpg" width="450" height="400" alt="gold car 450 x 400"></div>
    <div class="item"><img class="item" src="images/luther450.jpg" width="450" height="400" alt="luther 450 x 400"></div>
    <div class="item"><img class="item" src="images/herbievw.jpg" width="450" height="400" alt="herbie car from Disney movie 450 x 400"></div>

  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    <p class="centerpage"><b> Photo Shack</b></p>
</div>
<!-- Carousel end here -->
<script type="text/javascript">$('.carousel').carousel() </script>
</body>
</html>