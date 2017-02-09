<?php
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


if($_POST['del_tech']!=''){
   $data = $conn->query("delete from tbl_access where name = '".$_POST['del_tech']."'"); 
   //$data = $conn->query("delete from tbl_event where category = '".$_POST['del_tech']."'"); 
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
   <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/sidebar.css">
<head>
<header>
 <? include('header.php'); ?>

</header>

  <script>
/*  $("#add_catgry").click(function(){
   alert('test');
});*/
  function catadd()
{
  //alert('test');
  window.location.href='add_category.php';
}

  </script>
 
</head>
<body style="background-color: white">
<div id="container">
<? include('test_side.php');?>
       
        <div class= "main_div" style="float: left; margin-top: 1vh;width:70% ; margin-left: 45vh ">
        <center>
         <div style="margin-top: 85px">
        <input type='button' class="btn btn-primary" value='Add New' id='add_catgry' onclick="catadd();"><br><br>
            <!-- </strong>Search:</strong> 
            <!-- <input id='filter_rep' type="text" list='desc_list' style="width: 16vw; height:3vh;" oninput="filter(this.value,$('#user'))"> -->
      </div><h2>Access List</h2>
      </center>
      <table  class="table table-hover" style='width:100% ;border: 1px solid rgba(128, 128, 128, 0.57);'>
          <tr>
            
            <th>Name</th>
            <th style="text-align: center;">Update</th>
            <th style="text-align: center;">Delete</th>
          </tr>

         <tbody style="" id='user'>
              <?//echo "select * from tbl_category"; 
              
              $result = $conn->query("select * from tbl_access order by id desc");
              
              while($row=$result->fetch_object())
                {?>
              
              <tr class="success"> 
              
                <td >
                  <?=$row->name?>
                </td>
                <td>
                  <form id="edit_form<?=$row->id?>" method="post" action="edit_category.php" >
                  <input type="hidden"  name="edit_form" value="<?=$row->id?>" />
                  <input type="submit" class="btn btn-primary" class="button edit_click1" value="Edit" style="cursor:pointer; width:80%" /> 
                </form>  
                </td>
                <td>
                  <form id="del<?=$row->id?>" method="post" action="category.php" >
                     <input type="hidden" name="del_tech" value="<?=$row->name?>" />
                     <input type="hidden" name="deltech" value="<?=$row->id?>" />
                      <input type="button" class="btn btn-primary" class="button" value="Delete" style="cursor:pointer; width:80%" onclick='del(<?=$row->id?>)'/>
                  </form>
                
                </td>
              </tr>
             <? } ?>
          </tbody> 
      </table>
      </center>
        </div>
        

</div><!--container close-->


</body>
</html>

<script>

function del(id){

ysorn = confirm("Are you sure you want to delete this");  
if(ysorn)
$('#del'+id).submit();

}

</script>
