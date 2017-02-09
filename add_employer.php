<?
//error_reporting(0);
session_start();
//print_r($_POST);

include_once('connect.php');
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}
   include_once('header.php');
  $sql =  $conn->query("select * from tbl_employer where email_add ='".$_POST["email"]."'");
if ($sql->num_rows > 0) 
{
    //$row = $sql->fetch_object();
    ?>
    <script>setInterval(function(){window.location.href='add_employer.php';
     <?$err= "<span style='color:red;font-size:1.2rem;' ><b>Employer already exists</b></span>"; ?>
     }, 3000);
    </script>
<? 
}
else 
{ 
if(isset($_POST['add']) & $_POST['add']=='true')
    {
    if($_POST['company']!='')
    { 
       $qry = $conn->query("insert into tbl_employer set 
                    company_name = '".trim(mysqli_real_escape_string($conn,$_POST['company']))."',
                    contact_person = '".trim(mysqli_real_escape_string($conn,$_POST['contact_person']))."',
                    phone_no = '".trim(mysqli_real_escape_string($conn,$_POST['phone']))."',
                    email_add = '".trim(mysqli_real_escape_string($conn,$_POST['email']))."',
                    address = '".trim($_POST['address'])."',
                    pin = '".trim($_POST['pin'])."'");
      $err1 = "Employer ".$_POST['company']." Created.";
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
        <div>
      <center>
    <div style="">
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
      <center>
      
    <div style=" width:45vw;background-color:white;height:400px;border: 1px solid rgba(128, 128, 128, 0.57);border-radius: 10px;"> 
<input type='button' value='Back' onclick='back()' style='float:left;margin-top:1vh;margin-left:.3vw;'><br><br>
<strong style='font-size:2.0rem;'>Add Employer</strong><br><br>

      <table   id="add_tbl" style='background-color: white;width: 30vw;
    padding: 16px;' >
          <form method="post" id="add_emp" enctype="multipart/form-data" action="add_employer.php" method="post" >
          <input type="hidden" name="add" value="true" />

         <tr align="left"><th>Company Name :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="company" id="company" placeholder="Company Name"/>
              </td>
          </tr>
         <tr align="left"><th>Contact Person :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="contact_person" id="contact_person" placeholder="Contact Person"/>
              </td>
          </tr>
         <tr align="left"><th>Employer Phone :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="phone" id="phone" placeholder="Employer Phone"/>
              </td>
         <tr align="left"><th>Email :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="email" id="email" placeholder="Email"/>
              </td>
          </tr>
         <tr align="left"><th>Address :<span style="color:red;">*</span></th>
            <td>
            <textarea name="address" id="address" placeholder="Employer Address"/></textarea>
              </td>
          </tr>
         <tr align="left"><th>Pin :<span style="color:red;">*</span></th>
            <td>
                <input type="number" name="pin" id="pin" length="4" placeholder="Pin"/>
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
  window.location.href='employer.php';
}
function validateForm() {
         if($( "#company" ).val() =='' || $( "#phone" ).val() ==''){
          alert('Please fill all required details.');
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
