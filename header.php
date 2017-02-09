<?php
error_reporting(0);
session_start();
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else
{
	$user= $_SESSION['admin'];
}
?>

<!DOCTYPE html>
<html>
<header>
	<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico"/>
	<script src="js/jquery.min.1.12.0.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/upload.js" ></script>
	<link rel="stylesheet" href="css/sidebar.css">
	<link rel="stylesheet" href="index_files/mbcsmbmcp.css" type="text/css" />

</header>
<body>
<title> Landing Page </title>
<!-- <div class="logo"><img src="image/logo.png" style=" overflow: hidden; height: 50px; width: 50px;
    padding: 0;
    position: fixed;" /></div> -->
   <div>
      <div class ="Name" style="width: 100% ; float: left; background-color: #333; color:   #A9A9A9">  Home Page - Newcold  
<div class="logout" style="float: right;  ; background-color: #333; color: white"> <a href="logout.php" data-hover="Logout"> Logout 
</a>  </div>
      </div> 
      
      
   </div>
<div class="nav_wrap">
<nav id="primary_nav_wrap">
<div class="nav_container">
	<div id="mbmcpebul_wrapper">
  <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient38" style="width: 99px;"><div class="arrow"><a class="button_1" style="color:#A9A9A9">Safety</a></div></div>
    <ul class="gradient_menu gradient108">
    <li class="first_item"><a target="_blank" class="with_arrow" title="">Site Induction</a>
      <ul class="gradient_menu gradient252">
      <li class="first_item"><a target="_self" title="">Site Specific Video Inductions</a></li>
      <li class="sub-sub_menu"><a title="">Site Induction Test</a></li>
      <li class="sub-sub_menu"><a title="" href="site_induction_form.php">Site Induction Form</a></li>
      <li class="sub-sub_menu"><a title="">Ceiling Induction Form</a></li>
      <li class="sub-sub_menu"><a title="">Site Induction Register</a></li>
      <li><a title="">Visitor Induction</a></li>
      <li class="last_item"><a class="with_arrow" title="">Site Induction Register</a>
        <ul class="gradient_menu gradient72">
        <li class="first_item"><a title="" href="category.php">Site Admin</a></li>
        <li class="last_item"><a title="">Induction Register</a></li>
        </ul></li>
      </ul></li>
    <li><a class="with_arrow" title="">Permit To Work</a>
      <ul class="gradient_menu gradient288">
      <li class="first_item"><a title="">Permit To Work Authorisation</a></li>
      <li><a title="">Permit To Excavate</a></li>
      <li><a title="">Permit To Hotwork</a></li>
      <li><a title="">Permit To Enter Confined Space</a></li>
      <li><a title="">Permit To Enter Cold Room/Freezer</a></li>
      <li><a title="">Permit To Isolate Services</a></li>
      <li><a title="">Permit To Penetrate Surface</a></li>
      <li class="last_item"><a title="">Permit To Access ceiling</a></li>
      </ul></li>
    <li class="last_item"><a class="with_arrow" title="">Project Registers</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Site Induction Register</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Other Register- Site Induction</a></li>
        <li><a title="">Other Register- Visitor Induction</a></li>
        <li class="last_item"><a title="">Other Register- Site Attendance</a></li>
        </ul></li>
      <li><a class="with_arrow" title="">Permit To Work Register</a>
        <ul class="gradient_menu gradient252">
        <li class="first_item"><a title="">Permit to work Authorisation Register</a></li>
        <li><a title="">Permit To Excavate Register</a></li>
        <li><a title="">Permit To Hotwork Register</a></li>
        <li><a title="">Permit To Enter Confined Space Register</a></li>
        <li><a title="">Permit To Enter Cold Room / Freezer Register</a></li>
        <li><a title="">Permit To penetrate Surface Register</a></li>
        <li><a title="">Permit To Access Ceiling Register</a></li>
        <li><a title="">Permit To Isolate  Services Register</a></li>
        <li><a title="">Permit To Energise Electrical Register</a></li>
        <li><a title="">Permit To Energise Service Register</a></li>
   
        </ul></li>
      <li class="last_item"><a title="">Other Register (Still to come)</a></li>
      </ul></li>
    </ul></li>
  <li><div class="buttonbg gradient_button gradient38" id="buttonbg" style="width: 109px;"><a style="color:#A9A9A9">Quality</a></div></li>
  <li><div class="buttonbg gradient_button gradient38" style="width: 115px;"><a style="color:#A9A9A9">Environment</a></div></li>
  <li><div class="buttonbg gradient_button gradient38" style="width: 100px;"><a style="color:#A9A9A9">Design</a></div></li>
  <li><div class="buttonbg gradient_button gradient38" style="width: 200px;"><a style="color:#A9A9A9">Future Sub-headings</a></div></li>
  <li><div class="buttonbg gradient_button gradient38" style="width: 200px;"><a style="color:#A9A9A9">Future Sub-headings</a></div></li>
   <li><div class="buttonbg gradient_button gradient38" style="width: 200px;"><a style="color:#A9A9A9">Future Sub-headings</a></div></li>



  </ul>
  </ul>
  </ul>
</div>
	
</div>
</nav>
<!-- <div class ="search">
 <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q" style="margin-left: 20px;">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
 </div -->>
</div>


</body>

<style>
	
  body {
    background-color: white;
    height: 0vh;
    margin: 0px;
    overflow-x: hidden;
}




html *
{
  
   font-family: Arial;
}



.nav_container
{
	   
    margin-top: 1vh;
    margin-left: 3.5vw;
    float: left;
    margin-bottom: 1vh;
    font-size: 1.4vw;
   }

.nav_wrap
{
	
	
	
	float: left;
	width: 200%;
  height: 11vh;
	background-color: #333;
	margin-top: -2px;


}

.logout a
{
	   display: block;
    text-decoration: none;
    font-size: 13px;
    line-height: 32px;
    padding: 4px 25px;
    color: white;
    text-shadow:1px 1px 1px rgba(128,125,122,1);
  	font-weight:bold;color:white;
  	letter-spacing:1pt;
  	word-spacing:-10pt;
  	text-align:left;
  	font-family:Arial;
	
}

.logout a:hover
{
-webkit-transform: scale(1.2);
-ms-transform: scale(1.2);
transform: scale(1.2);
transition: 0.3s ease;

}

.effect_item:hover
{
box-shadow: 0 0 0 2px white;
transition: 0.4s ease;
}



.welcome
{ 	
	text-shadow:1px 1px 1px rgba(222,222,222,1);font-weight:normal;color:#255915;background-color:#EBFCA4;letter-spacing:2pt;word-spacing:6pt;font-size:15px;text-align:center;font-family:impact, sans-serif;line-height:1;
}

.logo
{
border: 1px solid black;
float: left;
height: 100%;
right: 0;
top: 0;
}

.sub-sub_menu
{
	background-color: white;
}

.Name
{
 padding-top: 1vw;
padding-left: 3.5vw;


  
  text-shadow:1px 1px 1px rgba(0,0,0,1);font-weight:normal;color:#F5F5F5;letter-spacing:1pt;word-spacing:2pt;font-size:27px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;
}
</style>
</html>