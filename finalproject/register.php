<?php require_once('Connections/login.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "register")) {
  $insertSQL = sprintf("INSERT INTO logintab (Email, Password, FirstName, LastName) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString(sha1($_POST['password']), "text"),
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"));

  mysql_select_db($database_login, $login);
  $Result1 = mysql_query($insertSQL, $login) or die(mysql_error());

  $insertGoTo = "loginpage.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='http://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'><!-- Google font -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> <!--link to bootstrap css -->
  <link href="css/mytunes.css" rel="stylesheet" type="text/css">
  <link href="css/mytunes2.css" rel="stylesheet" type="text/css">
  <!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>
<body>   
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
        <a href="register.php">Register</a> | <a href="loginpage.php">Log in</a> || <a href="index.php"><b>HOME</b></a></div></div>
 
    </div>
  </div>
</div>    


<div id="wrapper">
  <!-- page header -->
  <header class="row"> 
    <div class="container">
      <h1><span class="red">MYRECORDBIN</span>|<span class="tangerine red"> Registration form</span></h1>
  </div>
</header>


<div class="centerpage"><br>
<img src="images/cw150eyeR.jpg" class="img-circle" width="150" height="150" alt="Me!"><br><br>
<p class="tangerine"> Welcome! &nbsp;Create your account please:</p>
<p></p>
<form action="<?php echo $editFormAction; ?><?php echo $editFormAction; ?>" name="register" id="register" method="POST">
<fieldset>
<table id="form1">
	<tr>
      <td class="left">Enter an email</td>
      <td><input name="email" type="text"></td>
    </tr>
    <tr>
      <td class="left">Enter a password</td>
      <td><input name="password" type="text"></td>
    </tr>
    <tr>
      <td class="left">Enter your first name:</td>
      <td><input name="firstname" type="text"></td>
    </tr>
      <td class="left">Enter your last name:</td>
      <td><input name="lastname" type="text"></td>
    </tr>
</table><br>
<input name="" type="submit" value="Create New User">
<input type="hidden" name="MM_insert" value="register">

</fieldset>
</form><br>
<!-- gradient color -->
<div class="header1">
        <div >
      <h1><span class="red font12">MyRecordBin | Already Signed Up? <a href="loginpage.php">Log In Here</a></span></h1>
      &copy; CWalker, Santa Rosa Junior College,1501 Mendocino Ave, Santa Rosa, California 95401
  </div>

</div>
</div> <!--wrapper ends -->
</body>
</html>