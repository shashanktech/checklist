<?php

require_once('inc/config.php');

$timestamp = $_REQUEST["timpstamp"];
date_default_timezone_set("UTC"); 


if ($db_found) 
{
					if(isset($timestamp))
					{
						$condition = "";
						if($timestamp != '')
						{
							$condition =" where modified_date >= '".$timestamp."'";
						}
						
						 //Data for Access table 
						 $data =  mysql_query("select * from tbl_access ".$condition) or die(mysql_error()); 
						 $rowsaccess = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rowsaccess[] = $r;
						 }

						 //Data for employee table 
						 $data =  mysql_query("select * from tbl_employee ".$condition) or die(mysql_error()); 
						 $rows_employee = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_employee[] = $r;
						 }

						 //Data for employer table 
						 $data =  mysql_query("select * from tbl_employer ".$condition) or die(mysql_error()); 
						 $rows_employer = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_employer[] = $r;
						 }
						 //Data for induction register table 
						 $data =  mysql_query("select * from tbl_induction_register ".$condition) or die(mysql_error()); 
						 $rows_induction_register = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_induction_register[] = $r;
						 }
						 //Data for project table 
						 $data =  mysql_query("select * from tbl_project ".$condition) or die(mysql_error()); 
						 $rows_project = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_project[] = $r;
						 }
						 //Data for project_register table 
						 $data =  mysql_query("select * from tbl_project_register ".$condition) or die(mysql_error()); 
						 $rows_project_register = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_project_register[] = $r;
						 }
						  //Data for site_induction_topics table 
						 $data =  mysql_query("select * from tbl_site_induction_topics left join tbl_induction_register on tbl_site_induction_topics.id = tbl_induction_register.id ".$condition) or die(mysql_error()); 
						 $rows_site_induction_topic = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_site_induction_topic[] = $r;
						 }
						 //Data for site_attachment table 
						 $data =  mysql_query("select * from tbl_site_upload_attachment left join tbl_induction_register on tbl_site_upload_attachment.induction_id = tbl_induction_register.id".$condition) or die(mysql_error()); 
						 $rows_site_attachment = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_site_attachment[] = $r;
						 }



						 
						 echo "{\"response\": \"200\",\"timestemp\": \"".gmdate("Y:m:d  H:i:s")."\",
						 \"dataaccess\":".json_encode($rowsaccess).",
						 \"dataemployee\":".json_encode($rows_employee).",
						 \"dataemployer\":".json_encode($rows_employer).",
						 \"datainduction_register\":".json_encode( $rows_induction_register).",
						 \"dataproject\":".json_encode( $rows_project).",<br>
						 \"dataproject_register\":".json_encode( $rows_project_register).",
						 \"datasite_induction_topic\":".json_encode($rows_site_induction_topic).",
						 \"datasite_attachment\":".json_encode($rows_site_attachment)."}";
					}
}
else
{
	echo "{\"responce\": \"201\",\"message\": \"some Error 8978987996\"}";
}



?>