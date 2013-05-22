<!DOCTYPE html>
<html>
<head>
<title>MyRecordBin-index</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Calvin Walker
     Santa Rossa Junior College
     May 20, 2013   
-->
  <script src="http://code.jquery.com/jquery.js"></script> <!-- remote link to Jquery file -->
  <script src="bootstrap/js/bootstrap.js"></script> <!-- Bootstrap code -->  
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> <!-- remote link to Jquery ui library -->
  <script src="css/jquery-ui-1.10.3.custom.min.css"></script> <!-- remote link to Jquery ui min file version -->
  <script src="js/nonmember.js"></script> <!-- link to visitor javascript code -->
  <script src="js/send-contact.js"></script> <!-- contactus javascript code -->  
  <link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'> <!--  link to google fonts -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> <!--link to bootstrap css -->
  <link href="css/mytunes.css" rel="stylesheet" media="screen"> <!--  link to mytunes.css -->
</head>
<body>
  <!-- page header -->
  <header class="row"> 
    <div class="container">
      <h1><span class="red">MyRecordBin|</span></h1>
  </div>
  </header>
  <!-- announces updates as new tracks added --> 
  <div class="container">
<!--  <div id="data-update" class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Your Data Has Been Updated.
    </div>
-->    
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
        <a href="register.php">Register</a> | <a data-toggle="modal" data-target="#about">About</a> || <a data-toggle="modal" data-target="#contactus">Contact</a> ||| <a href="loginpage.php">Log in</a></div>
 
    </div>
  </div>
</div>    

<!-- -->   
  	<section id="genre" class="row"></section>
 	<section id="track" class="row"></section>
 
  
</div>     
<!-- The page accordion file -->
<div class="accordion" id="pages">
	<div class="accordion-group">
     	<div class="accordion-heading, one-accordion">
        	<a class="accordion-toggle btn, one-accordion" data-toggle="collapse" data-parent="#pages" href="#home">Home</a>
    </div>
    	<div id="home" class="accordion-body collapse">
    		<div class="accordion-inner">
              <p class="darkfont">Hey! This is a great place to start sharing my musical tastes. I am just going to show some of the notes that keep me interesting. The "Hip Hop" category is a french vocalist I just threw out there, 
            because his rap is cool. Support his work, and I know he will appreciate it. I made a valiant attempt but can't find a "frame" of the dude and his team.<b> To do more with MyRECORDBIN consider becoming a registered member (below)!
              <a href="register.php">More...</a></b></p>
     		</div>
        </div>
</div>

<div class="accordion-group">
     	<div class="accordion-heading, one-accordion">
        	<a class="accordion-toggle btn, one-accordion" data-toggle="collapse" data-parent="#pages" href="#Jay-room">Jay &amp; Team - My Notes</a>
    </div>
    <div id="Jay-room" class="accordion-body collapse indent">
        <div class="accordion-inner">
            <p class="darkfont">My website design uses these items: <li>A circle frame for my picture on the registration page.</li><li>An accordion file on the index page and member page.</li>
            <li>NavBar on the index and subsequent pages.</li><li>A photo slide show on the index and member pages.</li><li>Dreamweaver log-in/out and redirect scripts.</li><li>Mysqli database from which songs are stored and pulled out.</li>
            <li>Modals &quot;About&quot; and &quot;Contact with a working form are contained on the index and member pages.</li><li>Last, certainly not least some really great tunes and photographs! Thanks for a great semester.</li>
            <li>* I tried using JsLint on my Javascript and it broke my code.</li><li>**<b>My biggest obstacle: I do not understand how to make my code look neat!</b></li>
            </p>
      </div>
    </div>
</div>

	<div class="accordion-group">
     	<div class="accordion-heading, one-accordion">
        	<a class="accordion-toggle btn,, one-accordion" data-toggle="collapse" data-parent="#pages" href="#contact">Registration</a>
    </div>
    	<div id="contact" class="accordion-body collapse">
    		<div class="accordion-inner">
    			<p class="darkfont">You can do way more on this site when you become a member: MEMBERSHIP HAS ITS PRIVILEGES. You actually get to update and delete my artists! <b><a href="register.php" title="Registration">Sign up here</a>, today!</b> WORD!</p>
     		</div>
        </div>
</div>
</div>

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
<!-- Accordion file ends -->
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
    <div class="item"><img class="item" src="images/goldcar.jpg" width="450" height="400" alt="never own 450 x 400"></div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    <p class="centerpage"><b> Photo Shack</b></p>
</div>
<script type="text/javascript">$('.carousel').carousel() </script>
</body>
</html>