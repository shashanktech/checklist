<?php
error_reporting(0);
include_once('connect.php');
if(isset($_POST['add']))
    {
 
       $qry = $conn->query(" insert into tbl_access set 
                    name = '".trim(mysqli_real_escape_string($conn,$_POST['name']))."'");
      $err1 = $_POST['name']." Created.";
       ?>
      <script>
      
             alert ('<?php echo $err1; ?>');
             window.location.href = "category.php";

        </script>
      <?
      
      }
    
?>

<html>
<header>
<? include('header.php'); ?>
</header>
  
<body>
<body onbeforeunload=”HandleBackFunctionality()”>

<div id="container" >
  <div id="wrapper" style='min-height: 82.5vh;'>
      <center>
    <div style="">
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
      <center>
      
    <div class="main_div" style=" width:85vw;background-color:white;height:500px;border: 1px solid rgba(128, 128, 128, 0.57);border-radius: 10px;"> 
<input type='button' value='Home' onclick='back()' style='float:left;margin-top:1vh;margin-left:.3vw;'><br><br>
<div style="margin-top: 40px;"><strong style='font-size:2.0rem'>Add Access</strong></div><br><br>

      <table  id="add_tbl" style='background-color: white ;width: 30vw;
    padding: 16px;' >
          <form method="post" id="add_ctgry" enctype="multipart/form-data" >
          <input type="hidden" name="add" value="true" />

         <tr align="left"><th>Access Name :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="name" id="category_name" placeholder="Access Name"/>
              </td>
          </tr>
          <tr align="center">
            <th colspan="2"  style="padding: 4px;">
              <input type='button' class="btn btn-primary" onClick="return validateForm()" type="submit" value="Add New"  style="margin-top: 5vh;margin-bottom: 1vh;margin-left: 10vw;"/>
              <br>
            </th>
          </tr>
          </form>
      </table>
      
    </div>
    </center>
  </div><!---wraper close-->
</div><!--container close-->
<script>
function back(){
  window.location.href='category.php';
}
function validateForm() {
         if($( "#category_name" ).val() ==''){
          alert('Please fill Access Name');
          $( "#category_name" ).focus();
          return false;
         }
         
   else{
      $('#add_ctgry').submit();
      //window.location.href='event.php';
    return true;
   }
}
</script>
</body>