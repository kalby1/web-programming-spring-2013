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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=sha1($_POST['password']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "member.php";
  $MM_redirectLoginFailed = "loginpage.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_login, $login);
  
  $LoginRS__query=sprintf("SELECT Email, Password FROM logintab WHERE Email=%s AND Password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $login) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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
   <!-- page header -->
  <header class="row"> 
    <div class="container">
      <h1><span class="red">MYRECORDBIN</span> | <span class="tangerine red">Log in to do more!</span></h1>
  </div>
</header>
 
<!--This div centers the form on the page-->
<div class="centerpage tangerine">
<p></p>

<form ACTION="<?php echo $loginFormAction; ?>" id="login" method="POST">
  <fieldset>
    Enter an email <br><br>
      <input name="email" type="text"><br>
    Enter a password<br><br>
      <input name="password" type="text"><br><br>
      <input name="" type="submit" value="Enter">
  </fieldset>
</form>
</div><!-- End centerpage div -->
</body>
</html>