<?php

require_once('inc/config.php');




if ($db_found) 
{
				
					 $data =  mysql_query("select * from tbl_user") or die(mysql_error()); 
					 $rows = array();
					 while($r = mysql_fetch_assoc($data))
					 {
							$rows[] = $r;
					 }

					 $data =  mysql_query("select * from tbl_user ") or die(mysql_error()); 
					 $rows1 = array();
					 while($r = mysql_fetch_assoc($data))
					 {
							$rows1[] = $r;
					 }
			    	 echo "{\"responce\": \"200\",\"timestemp\": \"date\",\"datauesr\":".json_encode($rows).",\"datauser1\":".json_encode($rows1)."}";
				
}
else
{
	echo "{\"responce\": \"201\",\"message\": \"some Error 8978987996\"}";
}



?>