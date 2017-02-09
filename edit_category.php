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
   <? include('header.php'); ?>
</header>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaL0ieAkLhzy1rDoLifajeowdXPwTvzmI"></script> -->
<?
$obj=$conn->query("select * from tbl_access where id='".trim($_POST['edit_form'])."'")->fetch_object();

if(isset($_POST['edit']) & $_POST['edit']=='true')
    {
    if($_POST['category_name']!='')
    {
       $qry = $conn->query("update tbl_access set 
                    name = '".trim($_POST['category_name'])."' where id = '".$_POST['edit_id']."'");
      $err1 = $_POST['category_name']." updated.";
       ?>
      <script>
      $( document ).ready(function() {
              var error= '<?=$err1?>';
              alert(error);
              window.location.href='category.php';
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
<div style="margin-top: 40px;">
<strong style='font-size:2.0rem'>Edit Access</strong><br><br>
</div>
      <table   id="add_tbl" style='background-color: white;width: 30vw;
    padding: 16px;' >
          <form method="post" id="add_ctgry" enctype="multipart/form-data" >
          <input type="hidden" name="edit" value="true" />
          <input type="hidden" name="edit_id" value="<?=$obj->id?>" />
         <tr align="left"><th>Access Name :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="category_name" id="category_name" placeholder="Access Name" value="<?=$obj->name?>"/>
              </td>
          </tr>
          <tr align="center">
            <th colspan="2"  style="padding: 4px;">
              <input class="btn btn-primary" onClick="return validateForm()" type="submit" value="Save"  style="margin-top: 1vh;margin-bottom: 1vh;margin-left: 12vw;"/>
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
  window.location.href='category.php';
}
function validateForm() {
  //if ($('#latlong').prop("checked")==true) {
         if($( "#category_name" ).val() ==''){
          alert('Please fill Category Name');
          $( "#category_name" ).focus();
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