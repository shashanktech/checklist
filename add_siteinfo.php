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
   include_once('header.php');
  $sql =  $conn->query("select * from tbl_site_information where work_location ='".$_POST["work_location"]."'");
if ($sql->num_rows > 0) 
{
    //$row = $sql->fetch_object();
    ?>
    <script>setInterval(function(){window.location.href='add_project.php';
     <?$err= "<span style='color:red;font-size:1.2rem;' ><b>Site Information already exists</b></span>"; ?>
     }, 3000);
    </script>
<? 
}
else 
{ 
if(isset($_POST['add']) & $_POST['add']=='true')
    {
    if($_POST['work_location']!='')
    { 
      
       $qry = $conn->query("insert into tbl_site_information set 
                    work_location = '".trim(mysqli_real_escape_string($conn,$_POST['work_location']))."',
                    permit_to_excavate_task = '".trim(mysqli_real_escape_string($conn,$_POST['number']))."'");
      $err1 = "Site Information Created.";
       ?>
      <script>
      $( document ).ready(function() {
              var error= '<?=$err1?>';
              alert(error);
              window.location.href='siteinfo.php';
          });
      </script>
      <?
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
  <div id="wrapper" style='min-height: 82.5vh;'>
      <center>
    <div style="">
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
      <center>
      
    <div style=" width:45vw;background-color:white;height:400px;border: 1px solid rgba(128, 128, 128, 0.57);margin-top:2vh;border-radius: 10px;"> 
<input type='button' value='Back' onclick='back()' style='float:left;margin-top:1vh;margin-left:.3vw;'><br><br>
<strong style='font-size:2.0rem'>Add Site Information</strong><br><br>

      <table   id="add_tbl" style='background-color: white;width: 30vw;
    padding: 16px;' >
          <form method="post" id="add_ctgry" enctype="multipart/form-data" action="add_siteinfo.php">
          <input type="hidden" name="add" value="true" />

         <tr align="left"><th>Work Location :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="work_location" id="work_location" placeholder="Work Location"/>
              </td>
          </tr>
         <tr align="left"><th>Permit To Excavate Task :<span style="color:red;">*</span></th>
            <td>
                <input type="text" name="number" id="number" placeholder="Permit To Excavate Task"/>
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
</div><!--container close-->
<script>
function back(){
  window.location.href='category.php';
}
function validateForm() {
         if($( "#Work Location" ).val() =='' || $( "#number" ).val() ==''){
          alert('Please fill all the required fields.');
          $( "#name" ).focus();
          return false;
         }
         
   else{
      $('#add_ctgry').submit();
      //window.location.href='event.php';
    return true;
   }
}
</script>
 <? include_once('footer.php') ?>
