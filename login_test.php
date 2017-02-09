<?
session_start();
//echo $_SESSION["db_name"];

//print_r($_POST);

if(empty($_POST)){
  $_SESSION["db_name"]='db_admin';
 
}
else{
  $_SESSION["db_name"]=$_POST['cmpnyname'];

}
 include_once('connect.php');
if(!empty($_POST))
{
  //echo "SELECT  * FROM tbl_user where username='".$_POST['username']."' AND password ='".md5($_POST['password'])."'";
    $sql = "SELECT  * FROM tbl_user where username='".$_POST['username']."' AND password ='".md5($_POST['password'])."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
     // $row = $result->fetch_object();
      $row = $result->fetch_object();
      $_SESSION["username"]=$row->username;
      header("location: home.php");
    }
  else
  {
    $err="1";
  } 
  //unset($_POST);
 $conn->close();    
//$conn = null;   
}
else
{
  $err ="";
}

?> 

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
	
  <title>Contractor</title>
   <script src="js/prefixfree.min.js"></script>
   <script src="js/jquery.min.1.12.0.js"></script>
   <link rel="shortcut icon" type="image/png" href="/image/favicon.png"/>
<script>
  function validateForm() {
    if ($("#comp_name").val().trim() == "") 
    {
      $("#comp_name").css('border','1px solid red');
      $("#comp_name").focus();
      /*if ($("#password").val().trim() == "")
        $("#password").css('border','2px solid red');*/
    }     
   else if ($("#username").val().trim() == "") 
    {
        $("#username").css('border','2px solid red');
        $("#username").focus();
    }
    else if ($("#password").val().trim() == "") 
    {
        $("#password").css('border','2px solid red');
        $("#password").focus();
    }
    else
    {    
      $("#spinner").show();
      $("#myform").submit();
    }
  }

  $(document).ready(function(){
    $("#comp_name").focus();
      $("#comp_name").on('input',function(e){
         $("#comp_name").css('border','1px solid #CCC');
          $("#error").hide();
        });
    //$("#username").focus();
      $("#username").on('input',function(e){
         $("#username").css('border','1px solid #CCC');
          $("#error").hide();
        });
      $("#password").on('input',function(e){
         $("#password").css('border','1px solid #CCC');
          $("#error").hide();
      });
  });
$(function() {

    //$("#button").click(function() {
    $("#comp_name").on('input', function () {
        var val = $('#comp_name').val()
        var xyz = $('#CompanyName option').filter(function() {
            return this.value == val;
        }).data('xyz');
        var msg = xyz ? xyz : 'No Match';
        $('#cmpnyname').val(msg);

    })

})

</script>
    <style>
@import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
  margin: 0;
  padding: 0;
  background: #fff;

  color: #fff;
  font-family: Arial;
  font-size: 12px;
}

.body{
  position: absolute;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  width: 100%;
  height: 100%;
  background-image: url("image/bg.jpg");
  background-size: cover;
 // -webkit-filter: blur(5px);
  z-index: 0;
}

.grad{
  position: absolute;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  width: auto;
  height: auto;
  //background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
  z-index: 1;
 // opacity: 0.7;
}

.header{
  position: absolute;
  top: calc(50% - 35px);
  left: calc(50% - 255px);
  z-index: 2;
}

.header div{
  float: left;
  color: #000;
  font-family: 'Exo', sans-serif;
  font-size: 35px;
  font-weight: 200;
}

.header div span{
  color: #5379fa !important;
}

.login{
  background-color: white;
    position: absolute;
    top: calc(10%);
    left: calc(40%);
    height: 270px;
    width: 270px;
    padding: 20px;
    z-index: 2;
    border-radius: 51px;
    border-color: black;
    border: 1px solid black;
}

.login input[type=text]{
  width: 250px;
  height: 30px;
  background: transparent;
  border: 1px solid rgba(0,0,0,0.9);
  border-radius: 2px;
  color: #000;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 4px;
}

.login input[type=password]{
  width: 250px;
  height: 30px;
  background: transparent;
  border: 1px solid rgba(0,0,0,0.9);
  border-radius: 2px;
  color: #000;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 4px;
  margin-top: 10px;
}

.login input[type=button]{
  width: 126px;
  height: 40px;
  background: #b20b2b;
  border: 1px solid #000;
  cursor: pointer;
  border-radius: 2px;
  color: #000;
  font-family: 'Exo', sans-serif;
  font-size: 20px;
  font-weight: 400;
  padding: 6px;
  margin-top: 10px;
}

.login input[type=button]:hover{
 // opacity: 0.8;
}

.login input[type=button]:active{
 // opacity: 0.6;
}

.login input[type=text]:focus{
  outline: none;
  border: 1px solid rgba(0,0,0,0.9);
}

.login input[type=password]:focus{
  outline: none;
  border: 1px solid rgba(0,0,0,0.9);
}

.login input[type=button]:focus{
  outline: none;
}

::-webkit-input-placeholder{
   color: rgba(0,0,0,0.9);
}

::-moz-input-placeholder{
   color: rgba(0,0,0,0.9);
}
</style>

   

</head>

<body>

  <div class="body"></div>
    <div class="grad"></div>
  
    <br>
    <form  id='myform' name="myform" method="POST"  class="form-horizontal"   >
    <div class="login">
        <div><img src="image/cont.png" alt="icon" style="width:250px;height:42px;"></div><br/>
      <input id="comp_name" type="text"  name="CompanyName" list="CompanyName" placeholder="Company Name" >
           <datalist id="CompanyName">
             <?
			// $con = new mysqli('localhost', 'root', '', 'db_admin');
             $con = new mysqli('132.148.86.127', 'contracktor', 'Uve52^s6', 'db_admin');
          $res = $con->query("select * from tbl_company where isactive = 1");
               while($cam = $res->fetch_object())
               {
               ?><option data-xyz="<?=$cam->DBname?>" value="<?=$cam->CompanyName?>" >
              <?  }  $con->close();   ?>
            </datalist><br>
        <input type='hidden' value='' id='cmpnyname' name='cmpnyname'><br>
        <input type="text" placeholder="username" id="username" name="username"><br>
        <input type="password" placeholder="password" name="password" id="password" ><br>
       <input type="button" value="Signup" id="signup"> <input type="button" value="Login" id="login" onclick="validateForm()"> <br>
        <div id="error" style="<? if($err!='1'){ echo 'display:none;';}?> width:86%; height:60px; top:5px; color:red;"> 
    <h5 style="width: 107%;font-size:.8rem;">Please enter valid company/username & password<h5>
      </div> 
    </div>
  </form>

  <script src='https://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>