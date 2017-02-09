<?php
error_reporting(0);
session_start();
include_once('connect.php');
if(isset($_POST['login_btn']))
{
 $pass_form= $_POST['pass'];
 $sql_query = "SELECT * FROM login WHERE (username = '" .mysqli_real_escape_string($conn,$_POST['user']) . "') and (password = '" .     mysqli_real_escape_string($conn,($_POST['pass'])) . "')";
$result_set = mysqli_query($conn,$sql_query);
$count= mysqli_num_rows($result_set);

  if($count>0){
  
      $_SESSION['admin'] = $_POST['user'];
      header("location:header.php");
    }
    else{ 
     
     $err="1";

    }
  
} 

?>

<html>
<title> Login - Site Admin </title>
<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico" />
<script src="js/prefixfree.min.js"></script>
<script src="js/jquery.min.1.12.0.js"></script>
<center><div class="welcome">Login </div> </center>


<div class="login">
  <form method= "POST" id= "login_form_id" name= "login_form_name">
  <input type="text" placeholder="Username" id="username" name="user" class="user_name_css"> <br> 
  <input type="password" placeholder="Password" id="password" name="pass" class= "password_css"> <br> 
  <input type="submit" value="Sign In" name = "login_btn" id="btn" onclick="validation()">
  <div id="error" style="<? if($err!='1'){ echo 'display:none;';}?> width:86%; height:60px; top:5px; color:red;"> 
    <h5 style="width: 120%;font-size:.9rem; text-align: center;">Please enter valid username/password<h5>
    </div>
    <div id="error2" style="<? if($err1!='1'){ echo 'display:none;';}?> width:86%; height:60px; top:5px; color:red;"> 
    <h5 style="width: 120%;font-size:.9rem; text-align: center;">Please enter valid username/password<h5> 
  </form>
</div>

<style>
    body{
    background-color:  #2c3338;
    height: 0vh;
    margin: 0px;
    }
    
    html *
{
  
   font-family: Arial;
}

    #a1:hover , #a2:hover , #a3:hover , #a4:hover , #a5:hover,#a6:hover,#a7:hover,#a8:hover{
    background-color:  #ab302a;
     }
     .active{
      background-color:  #ab302a;
     }
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    .navbar-inverse {
     background-color: #101010;; 
     border-color: #101010;; 
    }
   footer {
   position:fixed;
   left:0px;
   bottom:0px;
   height:50px;
   width:100%;
   background:grey;
   padding-left: 45%;
    }
   .login {
  background: white;
  border: 1px solid #42464b;
  border-radius: 6px;
  height: 257px;
  margin: 20px auto 0;
  width: 298px;
}
input[type="password"], input[type="text"] {
  background: url('http://i.minus.com/ibhqW9Buanohx2.png') center left no-repeat, linear-gradient(top, #d6d7d7, #dee0e0);
  border: 1px solid #a1a3a3;
  border-radius: 4px;
  box-shadow: 0 1px #fff;
  box-sizing: border-box;
  color: #696969;
  height: 39px;
  margin: 31px 0 0 29px;
  padding-left: 37px;
  transition: box-shadow 0.3s;
  width: 240px;
}
input[type="submit"] {
  width:240px;
  height:35px;
  display:block;
  font-family:Arial, "Helvetica", sans-serif;
  font-size:16px;
  font-weight:bold;
  color:black;
  text-decoration:none;
  text-transform:uppercase;
  text-align:center;
  text-shadow:1px 1px 0px #37a69b;
  padding-top:6px;
  margin: 29px 0 0 29px;
  position:relative;
  cursor:pointer;
  border: none;  
  background-color: #3498db;
  background-image: linear-gradient(top,#3db0a6,#3111);
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius:5px;
  box-shadow: inset 0px 1px 0px #2ab7ec, 0px 5px 0px 0px #497a78, 0px 10px 5px #999;
}
#btn:hover {
 
transform: skew(-10deg);
box-shadow:
1px 1px #373737,
2px 2px #373737,
3px 3px #373737,
4px 4px #373737,
5px 5px #373737,
6px 6px #373737;
-webkit-transform: translateX(-3px);
transform: translateX(-3px);
transition: 0.20s ease;
}

.welcome
{

height: 20px;
font-size: 25px;
height: auto;
background-color:  #2c3338;
font-family: "Comic Sans MS", cursive, sans-serif;
color: #3498db;
font-style: bold;
}

.error
{
	border: 2px solid;
	border-color: black;
	height: 10px;
}

</style>

</html>