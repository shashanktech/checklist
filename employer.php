<?php
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

if($_POST['del_tech']!=''){
   $data = $conn->query("delete from tbl_employer where id = '".$_POST['del_id']."'"); 
   //$data = $conn->query("delete from tbl_event where category = '".$_POST['del_tech']."'"); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<header>
    <? include_once('header.php') ?>
</header>

  <script>
/*  $("#add_catgry").click(function(){
   alert('test');
});*/
  function catadd()
{
  //alert('test');
  window.location.href='add_employer.php';
}
  </script>
 
</head>

<body>



<div id="container" >
<? include('test_side.php');?>
  <div id="container">
<? include('test_side.php');?>
       
        <div class= "main_div" style="float: left; margin-top: 1vh;width:70% ; margin-left: 45vh ">
        <div>
      <center>
    <div style="min-height:620px; border: 1px solid rgba(128, 128, 128, 0.57);  width:92%; background-color:white;border-radius: 10px;">
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
      <center>
      <div style="margin:2%;">
        <input type='button' class="btn btn-primary" value='Add New' style="margin-top: 20px" id='add_employer' onclick="catadd();"><br><br>
            <!-- </strong>Search:</strong>  -->
            <!-- <input id='filter_rep' type="text" list='desc_list' style="width: 16vw; height:3vh;" oninput="filter(this.value,$('#user'))"> -->
      </div><h2>Employer List</h2>
      </center>
      <table  class="table table-hover" style='width: 70%;border: 1px solid rgba(128, 128, 128, 0.57);'>
          <tr>
            
            <th>Company Name</th>
            <th>Contact Person</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Pin</th>
            <th style="text-align: center;">Update</th>
            <th style="text-align: center;">Delete</th>
          </tr>

         <tbody style="" id='user'>
              <?//echo "select * from tbl_category"; 
              
              $result = $conn->query("select * from tbl_employer order by id desc");
              
              while($row=$result->fetch_object())
                {?>
              
              <tr class="success"> 
              
                <td ><?=$row->company_name?></td>
                <td ><?=$row->contact_person?></td>
                <td ><?=$row->phone_no?></td>
                <td ><?=$row->email_add?></td>
                <td ><?=$row->address?></td>
                <td ><?=$row->pin?></td>
                <td>
                  <form id="edit_form<?=$row->id?>" method="post" action="edit_employer.php" >
                  <input type="hidden"  name="edit_form" value="<?=$row->id?>" />
                  <input type="submit" class="btn btn-primary" class="button edit_click1" value="Edit" style="cursor:pointer; width:100%" /> 
                </form>  
                </td>
                <td>
                  <form id="del<?=$row->id?>" method="post" action="employer.php" >
                     <input type="hidden" name="del_tech" value="<?=$row->company_name?>" />
                     <input type="hidden" name="del_id" value="<?=$row->id?>" />
                      <input type="button" class="btn btn-primary" class="button" value="Delete" style="cursor:pointer; width:100%" onclick='del(<?=$row->id?>)'/>
                  </form>
                
                </td>
              </tr>
             <? } ?>
          </tbody> 
      </table>
    </div>
    
    </center>
  </div><!---wraper close-->
        </div>
</div><!--container close-->

</body>
</html>
<script>


/*function catadd()
{
  alert('test');
 // window.location.href='add_category.php';
}*/
/*function filter(text_data, jo_object) {
  alert(jo_object);
        jo = jo_object.find('tr');

        var data4 = capitalize(text_data.trim());
        var data5 = text_data.toLowerCase().trim();
        var data6 = text_data.toUpperCase().trim();
        var data7 = text_data.trim();

        jo.hide();
        jo.filter(function(i, v) {
            var $t = $(this);

            if (($t.is(":contains('" + data4 + "')")) || ($t.is(":contains('" + data5 + "')")) || ($t.is(":contains('" + data6 + "')")) || ($t.is(":contains('" + data7 + "')"))) {
                return true;
            }

            return false;
        }).show();
    }*/

function del(id){
ysorn = confirm("Are you want to delete Employer ?");
if(ysorn)
$('#del'+id).submit();
}
</script>
 <? include_once('footer.php') ?>