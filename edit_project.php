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
$obj=$conn->query("select * from tbl_project where id='".trim($_POST['edit_form'])."'")->fetch_object();

if(isset($_POST['edit']) & $_POST['edit']=='true')
    {
    if($_POST['name']!='')
    {
       $qry = $conn->query("update tbl_project set 
                    project_name = '".trim(mysqli_real_escape_string($conn,$_POST['name']))."',
                    number = '".trim(mysqli_real_escape_string($conn,$_POST['number']))."' 
                    where id = '".$_POST['edit_id']."'");
      $err1 = $_POST['name']." updated.";
       ?>
      <script>
      $( document ).ready(function() {
              var error= '<?=$err1?>';
              //alert(error);
              window.location.href='project.php';
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
  <? include('test_side.php');?>
       
        <div class= "main_div" style="float: left; margin-top: 1vh;width:70% ; margin-left: 45vh ">
        <div>
      <center>
    <div style="">
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
      <center>
      
    <div style=" width:45vw;background-color:white;height:400px;border: 1px solid rgba(128, 128, 128, 0.57);margin-top:2vh;border-radius: 10px;"> 
<input type='button' value='Back' onclick='back()' style='float:left;margin-top:1vh;margin-left:.3vw;'><br><br>
<strong style='font-size:2.0rem'>Edit Project</strong><br><br>

      <table   id="add_tbl" style='background-color: white;width: 30vw;
    padding: 16px;' >
          <form method="post" id="add_ctgry" enctype="multipart/form-data" action="edit_project.php" >
          <input type="hidden" name="edit" value="true" />
          <input type="hidden" name="edit_id" value="<?=$obj->id?>" />
         <tr align="left"><th>Project Name :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="name" id="project_name" placeholder="Project Name" value="<?=$obj->project_name?>"/>
              </td>
          </tr>
         <tr align="left"><th>Number :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="number" id="number" placeholder="Number" value="<?=$obj->number?>"/>
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
        <div>
</div><!--container close-->
<script>
function back(){
  window.location.href='project.php';
}
function validateForm() {
  //if ($('#latlong').prop("checked")==true) {
         if($( "#project_name" ).val() =='' || $( "#number" ).val() ==''){
          alert('Please fill Project details.');
          $( "#project_name" ).focus();
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