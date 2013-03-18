<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>Age Project</title>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/age.css" rel="stylesheet" media="screen">
<style> <!--round corners for a border-->
div
{
	border:2px solid #a1a1a1;
	padding:10px 40px;
	width:500px;
	border-radius:25px;
	-moz-border-radius:25px; /* Old Firefox */
	background-color: #333;
}
</style>
</head>
<body>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<div id="container">
<header><h1>Age Calculator</h1></header>
<?php 
//check to see if the page is loading from a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
// if there was a POST, create a confirmation page 
//  the age function calculates age in years based on a date passed as an argument
function age($birthdate) {
	return (strtotime('now') - strtotime($birthdate))/(60*60*24*365);
}	
// assign the result of calling the age( ) function passing the input date as the argument to a variable
$age =  age($_POST['birthdate']);
// determine if the value of the variable is greater than 21
if ($age > 21) {
	// if so, display a positive result , including the age and a smiley face image
	?>
  <h2 style="color:green">You are <?php echo intval($age) ?>, Have fun, but drink responsibly.</h2>
    <img src="http://nelsonaspen.com/blog/wp-content/uploads/2012/05/smile.jpg" width=100 height=100 />
    <?php

} else {
	//otherwise display a negative result, with a frowny face
	?>
    <h2 style="color:red">Sorry, you are  <?php echo intval($age) ?> , too young.  How about some root beer?</h2>
    <img src=http://ronekissrichmond.files.wordpress.com/2011/11/frown1.jpg width=100 height=100 />
    <?php
}
} else {
	// if there wasn't a POST, display an input form  using an input type of date - which is supported in Chrome
	?>
	<form action="" method="post">
	<input name="birthdate" type="date">
    <input name="" type="submit">
	</form>
	<?php
}
?>
</div>
</body>
</html>