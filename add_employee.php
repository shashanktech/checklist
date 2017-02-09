<?
//error_reporting(0);
session_start();
//print_r($_POST);

include_once('connect.php');
if(!isset($_SESSION['admin']))
header("location:logout.php");
   include_once('header.php');
  $sql =  $conn->query("select * from tbl_employee where email_add ='".$_POST["email"]."'");
if ($sql->num_rows > 0) 
{
    //$row = $sql->fetch_object();
    ?>
    <script>setInterval(function(){window.location.href='add_category.php';
     <?$err= "<span style='color:red;font-size:1.2rem;' ><b>employee name  already exists</b></span>"; ?>
     }, 3000);
    </script>
<? 
}
else 
{ 
if(isset($_POST['add']) & $_POST['add']=='true')
    {
    if($_POST['fname']!='')
    { 
       $qry = $conn->query("insert into tbl_employee set 
                    given_name = '".trim(mysqli_real_escape_string($conn,$_POST['fname']))."',
                    surname = '".trim(mysqli_real_escape_string($conn,$_POST['lname']))."',
                    contact_phone = '".trim(mysqli_real_escape_string($conn,$_POST['phone']))."',
                    job_title = '".trim(mysqli_real_escape_string($conn,$_POST['job']))."',
                    email_add = '".trim(mysqli_real_escape_string($conn,$_POST['email']))."',
                    inductioncard = '".trim($_POST['induction'])."',
                    pin = '".trim($_POST['pin'])."',
                    employer_id = '".trim($_POST['employer'])."'");
      $err1 = "Employee ".$_POST['fname']." Created.";
       ?>
      <script>
      $( document ).ready(function() {
              var error= '<?=$err1?>';
              alert(error);
              //window.location.href='employee.php';
          });
      </script>
      <?
      }
      else{
        $err = 'Please fill all required fields';
      }
    }
  }
?>
  <script>
   </script>

</head>

<body onbeforeunload=”HandleBackFunctionality()”>
<header>
  
</header>

<div id="container" >
  <div id="container">
<? include('test_side.php');?>
       
        <div class= "main_div" style="float: left; margin-top: 1vh;width:70% ; margin-left: 45vh ">
          <? include_once('test_side.php') ?>
  <div>
      <center>
    <div style="">
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
      <center>
      
    <div style=" width:45vw;background-color:white;height:400px;border: 1px solid rgba(128, 128, 128, 0.57);border-radius: 10px;"> 
<input type='button' value='Back' onclick='back()' style='float:left;margin-top:15px;margin-left:.3vw;'><br><br>
<strong style='font-size:2.0rem'>Add Employee</strong><br><br>

      <table   id="add_tbl" style='background-color: white;width: 30vw;
    padding: 16px;' >
          <form method="post" id="add_emp" enctype="multipart/form-data" action="add_employee.php" method="post" >
          <input type="hidden" name="add" value="true" />

         <tr align="left"><th>First Name :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="fname" id="fname" placeholder="First Name"/>
              </td>
          </tr>
         <tr align="left"><th>Last Name :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="lname" id="lname" placeholder="Last Name"/>
              </td>
          </tr>
         <tr align="left"><th>Employee Phone :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="phone" id="phone" placeholder="Employee Phone"/>
              </td>
          </tr>
         <tr align="left"><th>Job Title :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="job" id="job" placeholder="Job Title"/>
              </td>
          </tr>
         <tr align="left"><th>Email :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="email" id="email" placeholder="Email"/>
              </td>
          </tr>
         <tr align="left"><th>Induction Card :<span style="color:red;">*</span></th>
            <td>
                <input type="number" name="induction" id="induction" placeholder="Induction Card"/>
              </td>
          </tr>
         <tr align="left"><th>Pin :<span style="color:red;">*</span></th>
            <td>
                <input type="number" name="pin" id="pin" length="4" placeholder="Pin"/>
              </td>
          </tr>
         <tr align="left"><th>Employer :<span style="color:red;">*</span></th>
            <td>
              <select name="employer" id= "default_Select">
                  <option value="-1">Please Select an Employer</option>
                 <?php 

                $employer_query= $conn->query("select * from tbl_employer");
                while($row_employer=$employer_query->fetch_object()){ ?>

                <option value="<?php echo" $row_employer->id ";?>"> <?php echo $row_employer->company_name ?></option>
                <?php } ?>

                </select>
              </td>
          </tr>
          <tr align="center">
            <th colspan="2"  style="padding: 4px;">
              <input class="btn btn-primary" onClick="return validateForm()" type="button" value="Add New"  style="margin-top: 1vh;margin-bottom: 1vh;margin-left: 10vw;"/>
              <br>
            </th>
          </tr>
          </form>
      </table>
      
    </div>
    </center>
  </div><!---wraper close-->

        </div>
</div><!--container close-->
<script>
function back(){
  window.location.href='employee.php';
}
function validateForm() {
          if($( "#fname" ).val() =='' || $( "#lname" ).val() =='' || $( "#lphone" ).val() =='' || $( "#job" ).val() =='' || $( "#email" ).val() =='' || $( "#induction" ).val() =='' || $( "#pin" ).val() =='' || $("#employer").val() =='-1' || $("#default_Select").val() =='-1' ) {
          alert('Please fill Name');
          $( "#category_name" ).focus();
          return false;
         }         
   else{
      $('#add_emp').submit();
      //window.location.href='event.php';
    return true;
   }
}
</script>
 <? include_once('footer.php') ?>
