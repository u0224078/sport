<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php require_once('Connections/user1.php'); ?>
<?php session_start(); ?>
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



/*if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) 
*/
if($_POST["rebuttom"]){
if(!empty($_POST['first'])=="")
	echo "<script>alert('姓不能為空')</script>";
else if(!empty($_POST['last'])=="")
	echo "<script>alert('名子不能為空')</script>";
else if(!empty($_POST['username'])=="")
	echo "<script>alert('帳號不能為空')</script>";
	else if(!empty($_POST['password'])=="")
	echo "<script>alert('密碼不能為空')</script>";
else if(!empty($_POST['email'])&&!ereg("([0-9a-zA-Z]+)([@])([0-9a-zA-Z]+)(.)([0-9a-zA-Z]+)",$_POST['email']))
	echo "<script>alert('信箱輸入錯誤')</script>";
else{
  $insertSQL = sprintf("INSERT INTO user (email, first_name, last_name, user, password) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['first'], "text"),
                       GetSQLValueString($_POST['last'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"));
					   
					   

  //mysql_select_db($database_user1, $user1);
 
 
 mysql_select_db($database_user1, $user1);
  $Result1 = mysql_query($insertSQL, $user1) or die(mysql_error());

echo "<script>alert('恭喜你註冊成功，馬上進入登入畫面');location='index.php';</script>";
/*
  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
*/
	}
}
	
}
?>



<!DOCTYPE html>
<script language="javascript">
function chk(form){
	if (form.first.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("姓不能為空!");
		form.first.focus();   
		return (false);   
	}		
	if (form.last.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("名子不能為空!");
		form.last.focus();   
		return (false);   
	}	
		
	if (form.username.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("帳號不能為空!");
		form.username.focus();   
		return (false);   
	}		
	if (form.password.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("密碼不能為空!");
		form.password.focus();   
		return (false);   
	}	
	if (form.email.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("email不能為空!");
		form.email.focus();   
		return (false);   
	}		
	
		 
	
}
</script>






<html>
	<head>	
		<title>Register-login-form Website Template | Home :: w3layouts</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' ' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
		<style type="text/css">
		@import url("css/style2.css");
        body {
	background-image: url(images/gym-weights.jpg);
}
        </style>
		<!--webfonts-->
    <meta charset="big5">
	</head>
	<body>	
			<!--start-login-form-->
				<div class="main">
		    	  <div class="login-head"></div>
				  <div  class="wrap">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>註冊會員</h2>
						 	 </div>
						  	<form action="<?php echo $editFormAction; ?>" method="POST" name="form">
						  		<input name="first" type="text" required="required" id="first" placeholder="姓" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '姓';}" >
						  		<input name="last" type="text" required="required" id="last" placeholder="名子" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '名子';}" >
						  		<input name="email" type="text" required="required" id="email" placeholder="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" >
						  		<input name="username" type="text" required="required" id="username" placeholder="帳號" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '帳號';}" >
								<input name="password" type="password" required="required" id="password" placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
								<div class="Remember-me">
								<div class="p-container"></div>
												 
								<div class="submit">
									<input name="rebuttom" type="submit" id="rebuttom" formmethod="POST" onclick="myFunction()" value="註冊 >" >
								</div>
									<div class="clear"> </div>
								</div>
								<input type="hidden" name="MM_insert" value="form">
						  	</form>
					</div>
					
			</div>
				<!--//End-login-form-->
			  </div>
	</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
