<!DOCTYPE html>
<html>
<head>
  <title>CheckList</title>
  <link rel="image icon" type="image/png" sizes="160x160" href="image/recon1.png">
  <link rel="image icon" type="image/png" href="image/filtrzicon.png">
  

<script src="js/jquery-1.11.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.2.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
  <style>
    body{
    background-color: #d6dce2;
    height: 0vh;
    margin: 0px;
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
    .logout_btn
    {
    float: right;
    font-family: Impact, Charcoal, sans-serif;
    padding: 5px;
    font-size: large;
    background-color: gold;
    }
   footer {
      background-color: black;
      color: white;
      padding: 15px;
      margin-right: -20px;
    }
  </style>


</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <!--  <a class="navbar-brand">
           <img src="image/recon1.png" alt="logo" style=" float:left;margin-top: -2vh;">
        </a> -->
    </div>
    <center>
     <div class="collapse navbar-collapse" id="myNavbar" style="">
        <ul class="nav navbar-nav" style="font-size: 1.4vw;margin-top: 1vh;margin-left: 8vw;margin-bottom: 1vh;">
          <li >
            <a <? if(basename($_SERVER['PHP_SELF'])=='category.php' || basename($_SERVER['PHP_SELF'])=='add_category.php' || basename($_SERVER['PHP_SELF'])=='edit_category.php'){ ?>class="active"<? } ?> id="a1" href="category.php" style="color:white;margin-left:18vw;">Access
            </a>
          </li>
          <li>
            <a id="a3" style="color:white;margin-left: .5vw;" <? if(basename($_SERVER['PHP_SELF'])=='employee.php' || basename($_SERVER['PHP_SELF'])=='add_employee.php' || basename($_SERVER['PHP_SELF'])=='edit_employee.php'){ ?>class="active"<? } ?> href="employee.php">Employee
            </a>
          </li>
          <li>
            <a id="a3" style="color:white;margin-left: .5vw;" <? if(basename($_SERVER['PHP_SELF'])=='employer.php' || basename($_SERVER['PHP_SELF'])=='add_employer.php' || basename($_SERVER['PHP_SELF'])=='edit_employer.php'){ ?>class="active"<? } ?> href="employer.php">Employer
            </a>
          </li>
          <li>
            <a id="a3" style="color:white;margin-left: .5vw;" <? if(basename($_SERVER['PHP_SELF'])=='project.php' || basename($_SERVER['PHP_SELF'])=='add_project.php' || basename($_SERVER['PHP_SELF'])=='edit_project.php'){ ?>class="active"<? } ?> href="project.php">Project
            </a>
          </li>
          <li>
            <a id="a3" style="color:white;margin-left: .5vw;" <? if(basename($_SERVER['PHP_SELF'])=='siteinfo.php' || basename($_SERVER['PHP_SELF'])=='add_siteinfo.php' || basename($_SERVER['PHP_SELF'])=='edit_siteinfo.php'){ ?>class="active"<? } ?> href="siteinfo.php">Site Information
            </a>
          </li>
        </ul>
        <!-- <ul class="nav navbar-nav navbar-right" style="font-size: 1.4vw;margin-top: 1vh;margin-bottom: 1vh;">
          <li >
            <a  href="logout.php" id="a8"  style="color:white;">Logout
            </a>
          </li>
        </ul> -->
      </div>
    </center>
  </div>
</nav>

<form method="POST" name="logout_form" class= "logout_btn">
  <a href="logout.php"> Logout </a>
</form>

 
<!-- <center><div class="container" style="width:90vw;margin-top:7vh;height:auto;min-height:79vh;">
 -->  