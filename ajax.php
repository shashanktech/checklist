
<?php
include_once('connect.php');
 
$text1 = $_POST['text1'];





$result=$conn->query("Select * FROM tbl_employer WHERE  id='".$text1."'");
$arr=mysqli_fetch_row($result);

print_r (implode(",",$arr));






?>