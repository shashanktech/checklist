<?
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
<header>
    <? include_once('header.php') ?>
</header>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaL0ieAkLhzy1rDoLifajeowdXPwTvzmI"></script> -->
<?
$obj=$conn->query("select * from tbl_employer where id='".trim($_POST['edit_form'])."'")->fetch_object();

if(isset($_POST['edit']) & $_POST['edit']=='true')
    {
    if($_POST['edit_id']!='')
    {
       $qry = $conn->query("update tbl_employer set 
                    company_name = '".trim(mysqli_real_escape_string($conn,$_POST['company']))."',
                    contact_person = '".trim(mysqli_real_escape_string($conn,$_POST['contact_person']))."',
                    phone_no = '".trim(mysqli_real_escape_string($conn,$_POST['phone']))."',
                    email_add = '".trim(mysqli_real_escape_string($conn,$_POST['email']))."',
                    address = '".trim($_POST['address'])."',
                    pin = '".trim($_POST['pin'])."'
                    where id = '".$_POST['edit_id']."'");
      $err1 = $_POST['company']." updated.";
       ?>
      <script>
      $( document ).ready(function() {
              var error= '<?=$err1?>';
              //alert(error);
              window.location.href='employer.php';
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
          <form method="post" id="edit_employer" enctype="multipart/form-data" action="edit_employer.php">
          <input type="hidden" name="edit" value="true" />
          <input type="hidden" name="edit_id" value="<?=$obj->id?>" />

         <tr align="left"><th>Company Name :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="company" id="company" placeholder="Company Name" value="<?=$obj->company_name?>" />
              </td>
          </tr>
         <tr align="left"><th>Contact Person :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="contact_person" id="contact_person" placeholder="Contact Person" value="<?=$obj->contact_person?>" />
              </td>
          </tr>
         <tr align="left"><th>Employer Phone :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="phone" id="phone" placeholder="Employer Phone" value="<?=$obj->phone_no?>" />
              </td>
         <tr align="left"><th>Email :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="email" id="email" placeholder="Email" value="<?=$obj->email_add?>" />
              </td>
          </tr>
         <tr align="left"><th>Address :<span style="color:red;">*</span></th>
            <td>
            <textarea name="address" id="address" placeholder="Employer Address" /> <?=$obj->address?></textarea>
              </td>
          </tr>
         <tr align="left"><th>Pin :<span style="color:red;">*</span></th>
            <td>
                <input type="number" name="pin" id="pin" length="4" placeholder="Pin" value="<?=$obj->pin?>" />
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
  window.location.href='employer.php';
}
function validateForm() {
  //if ($('#latlong').prop("checked")==true) {
        if($( "#company" ).val() =='' || $( "#phone" ).val() ==''){
          alert('Please fill all required details.');
          $( "#category_name" ).focus();
          return false;
        }
   else{
      $('#edit_employer').submit();
      //window.location.href='event.php';
    return true;
   }
   
  //}  
}

</script>
 <? include_once('footer.php') ?>