<?
error_reporting(0);
session_start();
//print_r($_POST);

if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}
?>
<header>
    <? include_once('header.php') ?>
</header>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaL0ieAkLhzy1rDoLifajeowdXPwTvzmI"></script> -->
<?
$obj=$conn->query("select * from tbl_employee where id='".trim($_POST['edit_form'])."'")->fetch_object();

if(isset($_POST['edit']) & $_POST['edit']=='true')
    {
    if($_POST['edit_id']!='')
    {
       $qry = $conn->query("update tbl_employee set 
                    given_name = '".trim(mysqli_real_escape_string($conn,$_POST['fname']))."',
                    surname = '".trim(mysqli_real_escape_string($conn,$_POST['lname']))."',
                    contact_phone = '".trim(mysqli_real_escape_string($conn,$_POST['phone']))."',
                    job_title = '".trim(mysqli_real_escape_string($conn,$_POST['job']))."',
                    email_add = '".trim(mysqli_real_escape_string($conn,$_POST['email']))."',
                    inductioncard = '".trim($_POST['induction'])."',
                    pin = '".trim($_POST['pin'])."',
                    employer_id = '".trim($_POST['employer'])."'
                    where id = '".$_POST['edit_id']."'");
        $err1 = $_POST['fname']." updated.";
       ?>
      <script>
      $( document ).ready(function() {
              var error= '<?=$err1?>';
              //alert(error);
              window.location.href='employee.php';
          });
      </script>
      <?
      }
    }
?>
  <script>
   </script>
  <style>
 body{
  background-color: white;
 }

</style>
</head>

<body onbeforeunload=”HandleBackFunctionality()”>

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
<strong style='font-size:2.0rem'>Edit Employee</strong><br><br>

      <table   id="add_tbl" style='background-color: white;width: 30vw;
    padding: 16px;' >
          <form method="post" id="edit_employee" enctype="multipart/form-data" action="edit_employee.php">
          <input type="hidden" name="edit" value="true" />
          <input type="hidden" name="edit_id" value="<?=$obj->id?>" />
         <tr align="left"><th>First Name :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="fname" id="fname" placeholder="First Name" value="<?=$obj->given_name?>"/>
              </td>
          </tr>
         <tr align="left"><th>Last Name :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="lname" id="lname" placeholder="Last Name" value="<?=$obj->surname?>"/>
              </td>
          </tr> <tr align="left"><th>Employee Phone :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="phone" id="phone" placeholder="Employee Phone" value="<?=$obj->contact_phone?>"/>
              </td>
          </tr>
         <tr align="left"><th>Job Title :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="job" id="job" placeholder="Job Title" value="<?=$obj->job_title?>"/>
              </td>
          </tr>
         <tr align="left"><th>Email :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="email" id="email" placeholder="Email" value="<?=$obj->email_add?>"/>
              </td>
          </tr>
         <tr align="left"><th>Induction Card :<span style="color:red;">*</span></th>
            <td>
                <input type="number" name="induction" id="induction" placeholder="Induction Card" value="<?=$obj->inductioncard?>"/>
              </td>
          </tr>
         <tr align="left"><th>Pin :<span style="color:red;">*</span></th>
            <td>
                <input type="number" name="pin" id="pin" length="4" placeholder="Pin" value="<?=$obj->pin?>"/>
              </td>
          </tr>
          <tr align="left"><th>Current Employer ID :<span style="color:red;">*</span></th>
            <td>
                  <input type="text" name="current_employer" id="current_emp" value="<?=$obj->employer_id?>" style="background-color: #D2C6C3" readonly
            </td>
          </tr>

         <tr align="left"><th>New Employer :<span style="color:red;">*</span></th>
            <td>
               
                <select name="employer">
                     <? $employer_query=$conn->query("Select * From tbl_employer");
                      while ($row = $employer_query-> fetch_object()) { 
                    ?>
                  <option value="<? echo "$row->id" ?> selected="selected""> <? echo "$row->company_name" ?></option>
                
                      <? } ?>
                </select>
              </td>
          </tr>
            <tr align="center">
            <th colspan="2"  style="padding: 4px;">
              <input class="btn btn-primary" onClick="return validateForm()" type="button" value="Save"  style="margin-top: 1vh;margin-bottom: 1vh;margin-left: 10vw;"/>
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
  //if ($('#latlong').prop("checked")==true) {
         if($( "#fname" ).val() =='' || $( "#lname" ).val() ==''){
          alert('Please fill Name');
          $("#fname" ).focus();
          return false;
         }
         
   else{
      $('#edit_employee').submit();
      //window.location.href='event.php';
    return true;
   }
   
  //}  
}

</script>
 <? include_once('footer.php') ?>