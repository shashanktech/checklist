<?
error_reporting(0);
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
?>
<header>
    <? include_once('header.php') ?>
</header>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaL0ieAkLhzy1rDoLifajeowdXPwTvzmI"></script> -->
<?
$obj=$conn->query("select * from tbl_site_information where id='".trim($_POST['edit_form'])."'")->fetch_object();

if(isset($_POST['edit']) & $_POST['edit']=='true')
    {
    if($_POST['edit_id']!='')
    {
       $qry = $conn->query("update tbl_site_information set 
                    work_location = '".trim(mysqli_real_escape_string($conn,$_POST['work_location']))."',
                    permit_to_excavate_task = '".trim(mysqli_real_escape_string($conn,$_POST['number']))."'
                    where id = '".$_POST['edit_id']."'");
      $err1 = $_POST['work_location']." updated.";
      header("location:siteinfo.php");
      
      }
    }
?>
  <script>
   </script>
  <style>
 body{
  background-color: #d6dce2;
 }

</style>
</head>

<body onbeforeunload=”HandleBackFunctionality()”>


<div id="container" >
  <div id="wrapper" style='min-height: 82.5vh;'>
      <center>
    <div style="">
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
      <center>
      
    <div style=" width:45vw;background-color:white;height:400px;border: 1px solid rgba(128, 128, 128, 0.57);margin-top:2vh;border-radius: 10px;"> 
<input type='button' value='Back' onclick='back()' style='float:left;margin-top:1vh;margin-left:.3vw;'><br><br>
<strong style='font-size:2.0rem'>Edit Site Information</strong><br><br>

      <table   id="add_tbl" style='background-color: white;width: 30vw;
    padding: 16px;' >
          <form method="post" id="add_ctgry" enctype="multipart/form-data" action="edit_siteinfo.php" >
          <input type="hidden" name="edit" value="true" />
          <input type="hidden" name="edit_id" value="<?=$obj->id?>" />
         <tr align="left"><th>Work Location :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="work_location" id="work_location" placeholder="Work Location" value="<?=$obj->work_location?>"/>
              </td>
          </tr>
         <tr align="left"><th>Permit To Excavate Task :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="number" id="number" placeholder="Permit To Excavate Task" value="<?=$obj->permit_to_excavate_task?>"/>
              </td>
          </tr>
          <tr align="center">
            <th colspan="2"  style="padding: 4px;">
              <input class="btn btn-primary" onClick="return validateForm()" type="button" value="Save"  style="margin-top: 1vh;margin-bottom: 1vh;margin-left: 12vw;"/>
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
  window.location.href='siteinfo.php';
}
function validateForm() {
  //if ($('#latlong').prop("checked")==true) {
         if($( "#work_location" ).val() =='' || $( "#number" ).val() ==''){
          alert('Please fill site information required details.');
          $( "#work_location" ).focus();
          return false;
         }
         
   else{
      $('#add_ctgry').submit();
      //window.location.href='event.php';
    return true;
   }
   
  //}  
}

</script>
 <? include_once('footer.php') ?>