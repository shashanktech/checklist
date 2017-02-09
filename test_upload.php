<? 
$image_path= 'college_image/';  
  $building_images_0  = $_FILES['images']['name'][0];
  $building_images_1  = $_FILES['images']['name'][1];
  $building_images_2  = $_FILES['images']['name'][2];
  $building_images_3  = $_FILES['images']['name'][3];
  $building_images_4  = $_FILES['images']['name'][4];
  $building_images_5  = $_FILES['images']['name'][5]; 
  $target0 = $image_path . $building_images_0;
  $target1 = $image_path . $building_images_1;
  $target2 = $image_path . $building_images_2;
  $target3 = $image_path . $building_images_3;
  $target4 = $image_path . $building_images_4;
  $target5 = $image_path . $building_images_5;
 
  move_uploaded_file($_FILES['images']['tmp_name'][0], $target0);
  move_uploaded_file($_FILES['images']['tmp_name'][1], $target1);
  move_uploaded_file($_FILES['images']['tmp_name'][2], $target2);
  move_uploaded_file($_FILES['images']['tmp_name'][3], $target3);
  move_uploaded_file($_FILES['images']['tmp_name'][4], $target4);
  move_uploaded_file($_FILES['images']['tmp_name'][5], $target5);
  $college_overview= $_POST['overview'];
  $college_video_title=$_POST['video_title'];
  $college_video_url=$_POST['video_url'];
  $sql_update = " UPDATE `college_matter` SET `college_overview` = '".$college_overview."',`college_logo`='".$building_images_0."',`college_image_1`='".$building_images_1."',`college_image_2`='".$building_images_2."',`college_image_3`='".$building_images_3."',`college_image_4`='".$building_images_4."',`college_image_5`='".$building_images_5."',`college_video_title`='".$college_video_title."',`college_video_url`= '".$college_video_url."' WHERE college_email='helo@gmail.com'";


  ?>


  <!DOCTYPE html>
<html>
<head>
    <title>Get File Details</title>
 </head>

<body style="font:13px Verdana;">
    <p><input type="file" id="file" multiple /></p>
    
    <p id="fp"></p>

    <p>
        <input type="submit" value="Show Details" onclick="FileDetails()" 
            style="font:150% Georgia;font-style:italic;" />
    </p>
</body>

<script>
    function FileDetails() {

        // GET THE FILE INPUT.
        var fi = document.getElementById('file');

        // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
        if (fi.files.length > 0) {

            // THE TOTAL FILE COUNT.
            document.getElementById('fp').innerHTML =
                'Total Files: <b>' + fi.files.length + '</b></br >';

            // RUN A LOOP TO CHECK EACH SELECTED FILE.
            for (var i = 0; i <= fi.files.length - 1; i++) {

                var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.

                // SHOW THE EXTRACTED DETAILS OF THE FILE.
                document.getElementById('fp').innerHTML =
                    document.getElementById('fp').innerHTML + '<br /> ' +
                        fname + ' (<b>' + fsize + '</b> bytes)';
            }
        }
        else { 
            alert('Please select a file.') 
        }
    }
</script>
</html>