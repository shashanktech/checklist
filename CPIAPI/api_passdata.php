 <?
require_once('inc/config.php');

 $json= '{ 
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

  
 
 }';
$arrayDecodedFromJSON = json_decode($json, true);
print_r($arrayDecodedFromJSON);

?>