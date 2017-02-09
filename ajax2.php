<?php
include_once('connect.php');

$text2=$_POST['value_ajax'];



$result2 = $conn->query("Select tbl_employee.id,concat(tbl_employee.given_name ,' ',tbl_employee.surname) as name,tbl_employer.company_name FROM tbl_employee left join tbl_employer on  tbl_employee.employer_id = tbl_employer.id WHERE (tbl_employer.id is not null AND tbl_employee.id='".$text2."')");

$arr=mysqli_fetch_row($result2);
print_r (implode(",",$arr));




?>