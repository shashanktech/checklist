<?
include('inc/config.php');
mysql_query("SET AUTOCOMMIT=0");
mysql_query("START TRANSACTION");

 $query2 = "insert into tbl_induction_register (`id`,`empid`,`induction_card_no`,`project_id`,`induction_date`,`pincode`,`created_date`) VALUES ('80','3','12345','1','06/02/2017','2345','2017-02-06 11:54:12')";
   $query1 = "insert into tbl_site_upload_attachment (`image_id`,`induction_id`,`image_url`) VALUES ('229','80','1486382032')";
       $result1 = mysql_query($query1);
           $result2 = mysql_query($query2);
             

if ($result1 and $result2) {
    mysql_query("COMMIT");
    echo $query2;
    echo $query1;
    echo "Done";
} else {        
    mysql_query("ROLLBACK");
    echo "roll back";
}
?>