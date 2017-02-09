 <?

  include('inc/config.php');

 $json = '{ 
	 
	  "datasite_ids": [{
		"induction_id": "-1"
	},{
		"induction_id": "-2"
	},{
		"induction_id": "-3"
	},{
		"induction_id": "-4"
	}],
 
 
 "datasite_attachment": [{
  "image_id": "0",
  "image_url": "1486382032",
  "isuploaded": "0",
  "induction_id": "-1"
 }, {
  "image_id": "1",
  "image_url": "1486382036",
  "isuploaded": "0",
  "induction_id": "-1"
 }],
 "datainduction_register": [{
  "id": "-1",
  "": "",
  "is_deleted": "0",
  "inducted_by": "",
  "empid": "3",
  "induction_card_no": "12345",
  "isuploaded": "0",
  "project_id": "1",
  "induction_date": "06\/02\/2017",
  "pincode": "2345",
  "created_date": "2017-02-06 11:54:12",
  "is_activated": "1"
 }],
 "dataemployee": [{
  "": "",
  "pin": "2345",
  "position": "Project Manager",
  "created_date": "2017-02-06 11:54:12",
  "is_activated": "1",
  "is_deleted": "0",
  "email_add": "p@gmail.com",
  "general_card_induction_num_cb": "1",
  "contact_person_name": "c person name",
  "isuploaded": "0",
  "surname": "s name",
  "id": "-1",
  "address": "Address",
  "inductioncard": "12345",
  "occupation": "y occupation",
  "date_issued": "06\/02\/2013",
  "their_phn_no": "345679865",
  "relationship": "relationships",
  "insert_detail": "Insert",
  "training_provider_name": "tp name",
  "contact_phone": "489865324567",
  "given_name": "f name",
  "DOB": "06\/02\/2015",
  "medical_check_box": "1"
 }],
 "datadeclaration": [{
  "edit_certifiy": "nnnn",
  "id": "-1",
  "todays_date": "",
  "your_signature": "nnnnkkkk",
  "isuploaded": "0"
 }],
 "datasite_induction_topic": [{
  "induction_topic_28": "1",
  "induction_topic_13": "1",
  "id": "-1",
  "induction_topic_5": "1",
  "induction_topic_23": "1",
  "induction_topic_19": "1",
  "induction_topic_33": "1",
  "induction_topic_6": "1",
  "induction_topic_29": "1",
  "induction_topic_14": "1",
  "induction_topic_24": "1",
  "induction_topic_7": "1",
  "induction_topic_34": "1",
  "induction_topic_8": "1",
  "induction_topic_15": "1",
  "induction_topic_25": "1",
  "induction_topic_10": "1",
  "induction_topic_9": "1",
  "induction_topic_edit_text_34": "",
  "isuploaded": "0",
  "induction_topic_20": "1",
  "induction_topic_16": "1",
  "induction_topic_30": "1",
  "induction_topic_26": "1",
  "induction_topic_11": "1",
  "induction_topic_1": "0",
  "induction_topic_21": "1",
  "induction_topic_17": "1",
  "induction_topic_31": "1",
  "induction_topic_2": "0",
  "induction_topic_27": "1",
  "induction_topic_12": "1",
  "induction_topic_3": "1",
  "induction_topic_22": "1",
  "induction_topic_18": "1",
  "induction_topic_32": "1",
  "induction_topic_4": "1"
 }]
}';

$exjson = json_decode($json, true);  // decode the json string to an array

$ids = array();

$new_id = "select max(id) as idnew From tbl_induction_register";
$new_id_result  = mysql_query($new_id);
$new_id_result2 = mysql_fetch_row($new_id_result);

$maxid = $new_id_result2[0];

foreach ( $exjson['datasite_ids'] as $row ) 
{  
 	 $maxid ++ ;
	 $ids = array_merge($ids, array($maxid=> $row['induction_id'].",".$maxid));
}
 
foreach ( $exjson['datasite_attachment'] as $row ) {  // loop the records
 
	$newID = getID($row['induction_id'],$ids);
	echo $newID;
     echo 'The datasite_attachment field:&nbsp;'.  $row['induction_id']. '<br/>';
     $query1 = "insert into tbl_site_upload_attachment (`image_id`,`induction_id`,`image_url`) VALUES ('".$row['image_id']."','".$newID."','".$row['image_url']."')";
 
     foreach ( $row as $field => $value ) {  // loop the fields
 
         // $field = field name
         // $row   = record
         // $value = field value
 
         echo $field . ': '. $value . '<br>';
     }
     echo '<br/>'; 
 }

 foreach ( $exjson['datainduction_register'] as $row ) {  // loop the records
 
     echo 'The datainduction_register field:&nbsp;'.  $row['id']. '<br/>';

	 echo $newID = getID($row['id'],$ids);
    $query2 = "insert into tbl_induction_register (`id`,`empid`,`induction_card_no`,`project_id`,`induction_date`,`pincode`,`created_date`) VALUES ('".$newID."','".$row['empid']."','".$row['induction_card_no']."','".$row['project_id']."','".$row['induction_date']."','".$row['pincode']."','".$row['created_date']."')";
     foreach ( $row as $field => $value ) {  // loop the fields
 
         // $field = field name
         // $row   = record
         // $value = field value
 
         echo $field . ': '. $value . '<br>';
     }
     echo '<br/>'; 
 }

 foreach ( $exjson['dataemployee'] as $row ) {  // loop the records
 
     echo 'The dataemployee field:&nbsp;'.  $row['id']. '<br/>';

   echo $newID = getID($row['id'],$ids);
  
   $query3 = "insert into tbl_employee (`id`, `given_name`, `surname`, `contact_phone`, `occupation`, 
 `email_add`, `emrg_contact_name`, `emrg_contact_phone`, `emrg_contact_relation`, 
 `inductioncard`, `pin`, `itp_name` ,`DOB`, `address`, `medical_condition_desc`, `medical_condition`, `created_date`, `position`,`gcic_issue_date`)
   VALUES ('".$newID."','".$row['given_name']."','".$row['surname']."','".$row['contact_phone']."','".$row['occupation']."','".$row['email_add']."','".$row['contact_person_name']."','".$row['their_phn_no']."','".$row['relationship']."','".$row['inductioncard']."','".$row['pin']."','".$row['training_provider_name']."','".$row['DOB']."','".$row['address']."','".$row['insert_detail']."','".$row['medical_check_box']."','".$row['created_date']."','".$row['position']."','".$row['date_issued']."')";
     foreach ( $row as $field => $value ) {  // loop the fields
 
         // $field = field name
         // $row   = record
         // $value = field value
 
         echo $field . ': '. $value . '<br>';
     }
     echo '<br/>'; 
 }
foreach ( $exjson['datadeclaration'] as $row ) {  // loop the records
 
     echo 'The datadeclaration field:&nbsp;'.  $row['id']. '<br/>';

   echo $newID = getID($row['id'],$ids);

$query4 = "insert into tbl_site_induction_declaration(`id`, `edit_certifiy`, `todays_date`, `your_signature`, 
 `isuploaded`)
   VALUES ('".$newID."','".$row['edit_certifiy']."','".$row['todays_date']."','".$row['your_signature']."','".$row['isuploaded']."')";

     foreach ( $row as $field => $value ) {  // loop the fields
 
         // $field = field name
         // $row   = record
         // $value = field value
 
         echo $field . ': '. $value . '<br>';
     }
     echo '<br/>'; 
 }

 foreach ( $exjson['datasite_induction_topic'] as $row ) {  // loop the records
 
     echo 'The datasite_induction_topic Field:&nbsp;'.  $row['id']. '<br/>';

   echo $newID = getID($row['id'],$ids);

$query5 = "insert into tbl_site_induction_topics(`id`,`induction_topic_1`,`induction_topic_2`,`induction_topic_3`,`induction_topic_4`,`induction_topic_5`,`induction_topic_6`,`induction_topic_7`,`induction_topic_8`,`induction_topic_9`,`induction_topic_10`,`induction_topic_11`,`induction_topic_12`,`induction_topic_13`,`induction_topic_14`,`induction_topic_15`,`induction_topic_16`,`induction_topic_17`,`induction_topic_18`,`induction_topic_19`,`induction_topic_20`,`induction_topic_21`,`induction_topic_22`,`induction_topic_23`,`induction_topic_24`,`induction_topic_25`,`induction_topic_26`,`induction_topic_27`,`induction_topic_28`,`induction_topic_29`,`induction_topic_30`,`induction_topic_31`,`induction_topic_32`,`induction_topic_33`,`induction_topic_34`)
   VALUES ('34','".$row['induction_topic_1']."','".$row['induction_topic_2']."','".$row['induction_topic_3']."','".$row['induction_topic_4']."','".$row['induction_topic_5']."','".$row['induction_topic_6']."','".$row['induction_topic_7']."','".$row['induction_topic_8']."','".$row['induction_topic_9']."','".$row['induction_topic_10']."','".$row['induction_topic_11']."','".$row['induction_topic_12']."','".$row['induction_topic_13']."','".$row['induction_topic_14']."','".$row['induction_topic_15']."','".$row['induction_topic_16']."','".$row['induction_topic_17']."','".$row['induction_topic_18']."','".$row['induction_topic_19']."','".$row['induction_topic_20']."','".$row['induction_topic_21']."','".$row['induction_topic_22']."','".$row['induction_topic_23']."','".$row['induction_topic_24']."','".$row['induction_topic_25']."','".$row['induction_topic_26']."','".$row['induction_topic_27']."','".$row['induction_topic_28']."','".$row['induction_topic_29']."','".$row['induction_topic_30']."','".$row['induction_topic_31']."','".$row['induction_topic_32']."','".$row['induction_topic_33']."','".$row['induction_topic_34']."')";

     foreach ( $row as $field => $value ) {  // loop the fields
 
         // $field = field name
         // $row   = record
         // $value = field value
 
         echo $field . ': '. $value . '<br>';
     }
     echo '<br/>'; 
 }

 function getID($oldid,$arrayIds)
 {
	 foreach ($arrayIds as $value) 
	 {
			list($old, $new) = split(',', $value);
			if($old == $oldid)
			{ 
				return $new;
			}
	 }
	
 }



 ?>