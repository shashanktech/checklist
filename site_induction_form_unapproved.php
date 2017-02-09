<?php

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


$obj=$conn->query("Select * FROM tbl_project WHERE id ='1'")->fetch_object();
$obj2=$conn->query("Select MAX(id)+1 AS 'id' FROM tbl_induction_register")->fetch_object();
$obj3=$conn->query("select tbl_access.id,name from tbl_project_register left join tbl_access on tbl_project_register.access_id = tbl_access.id where tbl_project_register.project_id = 1 group by access_id Limit 0,1")->fetch_object();
$obj4=$conn->query("Select * FROM tbl_employer");
$obj6=$conn->query("Select tbl_employee.id,concat(tbl_employee.given_name ,' ',tbl_employee.surname) as name,tbl_employer.company_name FROM tbl_employee left join tbl_employer on  tbl_employee.employer_id = tbl_employer.id where tbl_employer.id is not null");
$test = $conn->query ("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE inducted_by IS NULL AND tbl_induction_register.id = '".$_POST['unapproved_form']."'")->fetch_object();

$employer_name = $conn->query("Select * from tbl_employer where id = '".$test->empid."'")->fetch_object();





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>



<head>
<header>
 <? include('header.php'); ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>


<div class="Main_Form" style="float: left; background-color: white; width: 70%; border: solid 1px black; border-radius: 10px; margin-left: 18%;">
	
 <center>
 <table style='width: 70%;border: 1px solid rgba(128, 128, 128, 0.57);'>
          <center><div class="Form_name"> <span style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#FF5733 ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2;"> APPROVAL SITE INDUCTION FORM </span>
			</div>
			</center>

	<div class="col-lg-12 well">
	<div class="row">
				<form  name="site_form" method="POST" enctype="multipart/form-data">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>NAME OF PROJECT/SITE</label>
								<input type="text" placeholder="Enter First Name Here.." class="form-control" value="<? echo $obj ->project_name; ?>" readonly>
								
							</div>
							<div class="col-sm-4 form-group">
								<label>PROJECT NUMBER</label>
								<input type="text" placeholder="Enter Project Number Here.." class="form-control" value="<? echo $obj ->number; ?>" readonly>
							</div>
							<div class="col-sm-4 form-group">
								<label>CREATED DATE</label>
								<input type="text" class="form-control" value="<?echo $test->created_date;  ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Induction Number</label>
								<input type="text" name="induction_number" class="form-control" value="<? $value= str_pad($test->id, 4, '0', STR_PAD_LEFT); echo $value;
								?>" readonly>
							</div>
							<div class="col-sm-6 form-group">
								<label>Access Authority Issued</label>
								<input type="text" placeholder="Access Authority.." class="form-control" value="<? echo $obj3->name ?>" readonly>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>EMPLOYER DETAILS</u></p>
								
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Employer/Business Name</label>
								<p>
								
								<input type="text" class="form-control" value="<? echo $employer_name->company_name ?>" readonly>
								</p>
								
								
							</div>
		
							
							<div class="col-sm-6 form-group">
								<label>Phone Number</label>
								<input type="text" id="ph" name ="ph" class="form-control" 
								value="<? echo $employer_name->phone_no ?>" readonly>
							
							</div>
							
						</div>

							<div class="row">
							<div class="col-sm-6 form-group">
								<label>Employer Contact Person</label>
								<input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control"  value="<?php echo $employer_name->contact_person ?>" readonly>
							</div>
							<div class="col-sm-6 form-group">
								<label>Email Address</label>
								<input type="Email" id="email"  class="form-control" value="<? echo $employer_name->email_add; ?>" readonly>
							</div>
							</div>
							<div class="form-group">
							<label>Address  Of Your Employer/ Business </label>
							<textarea id="address"  class="form-control" readonly> <? echo $employer_name->address ?></textarea>
							</div>

						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>PERSON INDUCTED DETAILS</u></p>
								
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your First Name</label>
								<input type="text"  class="form-control" name="empe_name" value="<? echo $test->given_name; ?>" readonly>
							</div>
							<div class="col-sm-6 form-group">
								<label>Your Surname</label>
								<input type="text" class="form-control" name="empe_surname" value="<? echo $test->surname; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label>Your Address </label>
							<textarea  rows="2" class="form-control" name="empe_add" readonly> <? echo $test->address; ?></textarea>
						</div>

						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your Date of Birth</label>
								<input type="text" class="form-control"  value="<? echo $test->DOB; ?>" readonly> 
							</div>
							<div class="col-sm-6 form-group">
								<label>Your Contact Number</label>
								<input type="text" class="form-control"  value="<? echo $test->contact_phone; ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your Occupation</label>
								<input type="text"  class="form-control" name="empe_occupation" value="<? echo $test->occupation; ?>"readonly>
							</div>
							<div class="col-sm-6 form-group">
								<label>Your Position</label>
								<input type="text"  class="form-control" name="empe_position" value="<? echo $test->position; ?>"readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Your Email Address</label>
								<input type="Email"  class="form-control"  name="empe_email" value="<? echo $test->email_add; ?>"readonly>
							</div>
						
						</div>
						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>EMERGENCY CONTACT PERSON</u></p>
								
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Contact Person’s Name</label>
								<input type="text"  class="form-control" name="empe_emrg_name" value="<? echo $test->emrg_contact_name; ?>"readonly>
							</div>
							<div class="col-sm-4 form-group">
								<label>Their Contact Number</label>
								<input type="Number"  class="form-control" name="empe_emrg_number" value="<? echo $test->emrg_contact_phone; ?>"readonly>
							</div>
							<div class="col-sm-4 form-group">
								<label>Relationship To You</label>
								<input type="text"  class="form-control" name="empe_emrg_relation" value="<? echo $test->emrg_contact_relation; ?>"readonly>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>MEDICAL CONDITIONS</u></p>
								
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-sm-10 form-group">
								<p class="text" style="text-align: left;"> Do you have a medical condition that poses a health or safety risk to you or others on site? e.g. Diabetes, Deafness, Heart/Lung Condition, Allergy etc.)</p>
								
							</div>

							
						    <div class="col-md-2 col-sm-2">
						              
						        <label class="checkbox-inline">
						        <script>
						        	
						        	$( document ).ready(function() {
						        		$('#medical').click(function() {
										return false;
										});
										$('#induction_card').click(function() {
										return false;
										});


						        	});
						        </script>
						     
							    <input name="medical_check" id="medical" type="checkbox"  <?php echo ($test->medical_condition == 1 ? 'checked' : '');    ?> > <strong> Yes </strong>
 

					          	</label>
					          	
	          				</div>
						</div>

						<div class="form-group">
						<textarea name="medical_detail"  id="txt_1" rows="2" class="form-control" readonly="readonly">
						<? if(!empty($test->medical_condition_desc)) echo $test->medical_condition_desc;

						else echo "No Description Available";
						?>
						
						</textarea>
						</div>

						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>COMPETENCY CERTIFICATES / PROOF OF IDENTITY</u></p>
								
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5 form-group">
								<p class="text" style="text-align: left;">Have you completed a ‘General Construction Induction Card’?</p>
								
							</div>

							
						    <div class="col-md-2 col-sm-2">
						              
						        <label class="checkbox-inline">
							   
					            <input type="checkbox" Id="induction_card" <?php echo ($test->is_gcic == 1 ? 'checked' : '');    ?> ><strong>Yes</strong>

					            </label>
					          	
	          				</div>
	          				<div class="col-sm-5 form-group">
								<label class="inline">Date Issued</label>
								<input type="text"  class="form-control" value="<? echo $test->gcic_issue_date ?>" readonly>
							</div>


						</div>

						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Name Of Induction Training Provider</label>
								<input type="text"  class="form-control" value="<? echo $test->itp_name; ?>" readonly>
							</div>
							<div class="col-sm-6 form-group">
								<label>Induction Certification Number</label>
								<input type="Number"  class="form-control" value="<? echo $test->induction_card_no; ?>" readonly>
							</div>
					
						</div>

						<div class="row">
    					<div class="col-sm-12 form-group">
        				<p class="text" style="text-align: left; font-size: 15px">Upload General Construction Induction Card, Driver’s License,Trade Certificates, Prescribe Occupations, Licenses, First Aid Certificate, etc. related to your work on this site e.g. Electrician, Plant Operator, Crane, Rigger, First Aider, Demolitionetc.<strong>Upload Licenses
        				</strong>
        				</p>

   						</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload White Card Front:</label>
      						<input type="file" name="photo[]" id="imgInp1">
      						<img class="preview1" id="preview1" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label>Upload White Card Back:</label>
      						<input type="file" name="photo[]" id="imgInp2">
      						<img class="preview2" id="preview2" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>

						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Driver License Front:</label>
      						<input type="file" name="photo[]" id="imgInp3">
      						<img class="preview3" id="preview3" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Driver License Back:</label>
      						<input type="file" name="photo[]" id="imgInp4">
      						<img class="preview4" id="preview4" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp5">
      						<img class="preview5" id="preview5" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp6">
      						<img class="preview6" id="preview6" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    						<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp7">
      						<img class="preview7" id="preview7" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp8">
      						<img class="preview8" id="preview8" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp9">
      						<img class="preview9" id="preview9" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    						<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp10">
      						<img class="preview10" id="preview10" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp11">
      						<img class="preview11" id="preview11" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp12">
      						<img class="preview12" id="preview12" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
	    					<div class="col-sm-8 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp13">
      						<img class="preview13" id="preview13" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
	    					<div class="col-sm-4 form-group">
	    					<p style="text-align: left;">
	    					<label> Upload Competency/ Certificates:</label>
      						<input type="file" name="photo[]" id="imgInp14">
      						<img class="preview14" id="preview14" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
							</p>
	    					</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<p class="h4" style="text-align: left;"><u>INDUCTION TOPICS</u></p>
								
							</div>
							<div class="col-md-6 form-group">
						              
						        <label class="checkbox-inline">
							        
					            <input type="checkbox" id="select_all"><strong>Select All</strong>

					            </label>
					          	
	          				</div>

						</div>
						
						<div class="row">
								<div class="col-md-1">
								<p>1</p>
								</div>
								<div class="col-md-3">
								<p style="text-align: left;">Additional Inductions i.e. Visitor, Ceiling, Client. </p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="2" class="checkbox">

					            </label>
								</div>
								<div class="col-md-1">
								<p>27</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Minimum PPE - <ul>
												<li>Hard Hats, Steel Capped Boots.</li>
												<li>Protective Clothing Short Sleeve Shirt & Work Shorts are the Minimum Requirement.</li>
												<li>High Visibility Vests.</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="27" class="checkbox">

					            </label>
								</div>
						</div>

						<div class="row">
								<div class="col-md-1">
								<p>2</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>What We are Building – <ul>
												<li>Description.</li>
												<li>Expected Duration & Completion Date.</li>
												<li>Site Ph. No. etc.</li>
												<li>Site’s Hours.
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value= "2" class="checkbox">

					            </label>
								</div>

								<div class="col-md-1">
								<p>28</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Safety Signs & Barricades
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="28" class="checkbox">

					            </label>
								</div>
		
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>3</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Management Team – <ul>
												<li>Project Director and Site Manager.</li>
												<li>Foremen.</li>
												<li>Site Ph. No. etc.</li>
												<li>Site Safety Advisor (SSA).</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="3" class="checkbox">

					            </label>
								</div>
								<div class="col-md-1">
								<p>29</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Emergency Procedures -<ul>
												<li>Evacuation Procedures.</li>
												<li>Emergency Contact Details.</li>
												<li>Fire Fighting Equipment, etc.</li>
								
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="29" class="checkbox">

					            </label>
								</div>
		
						</div>

						<div class="row">
								<div class="col-md-1">
								<p>4</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Layout – <ul>
												<li>Offices, Amenities, First Aid, Parking, etc.</li>
												<li>Deliveries To Site</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="4" class="checkbox">

					            </label>
								</div>
								<div class="col-md-1">
								<p>30</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Incident Reporting Requirements -<ul>
												<li>Accidents</li>
												<li>Dangerous Events.</li>
												<li>Near Misses</li>
												<li>Hazard</li>
								
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="30" class="checkbox">

					            </label>
								</div>
		
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>5</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Policies – <ul>
												<li>WHS, Quality, Environment.</li>
												<li>Outline of CMP.</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="5" class="checkbox">

					            </label>
								</div>

								<div class="col-md-1">
								<p>31</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>First Aid Facility
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="31" class="checkbox">

					            </label>
								</div>
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>6</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Essential Health & Safety Requirements for site.
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="6" class="checkbox">

					            </label>
								</div>

								<div class="col-md-1">
								<p>32</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Amenities, Toilets & Drink Stations
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="32" class="checkbox">

					            </label>
								</div>
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>7</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Access & Security 
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="7" class="checkbox">

					            </label>
								</div>

								<div class="col-md-1">
								<p>34</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Environmental Compliance
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="34" class="checkbox">

					            </label>
								</div>
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>8</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Rules –e.g. Civil  Language & Behaviour
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="8" class="checkbox">

					            </label>
								</div>
								<div class="col-md-1"><br><br>
								<p>**</p>
								</div>
								<div class="col-md-2" style="text-align: left;"><br><br>
								<p>Information provided under Item 1. Addition Inductions
								</p>
								</div>
								<div class="col-sm-2 form-group"><br><br>
								
							        
					            <input type="text" Id="" value="" class="form-group">

					        
								</div>

								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>9</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Disciplinary Procedures – 
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="9" class="checkbox">

					            </label>
								</div>

								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>10</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Drugs and Alcohol -
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="10" class="checkbox">

					            </label>
								</div>

								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>11</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Smoking Policy, Designated Smoking Area’s
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="11" class="checkbox">

					            </label>
								</div>

								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>12</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Project Consultation & Communication
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="12" class="checkbox">

					            </label>
								</div>

								
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>13</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Specific Hazards
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="13" class="checkbox">

					            </label>
								</div>
						</div>
							<div class="row">
								<div class="col-md-1">
								<p>14</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Work Method Statement Requirements
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="14"  class="checkbox">

					            </label>
								</div>

						</div>
					
							<div class="row">
								<div class="col-md-1">
								<p>15</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Site Permits
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1"name="check_test[]" value="15" class="checkbox">

					            </label>
								</div>

						</div>
						
							<div class="row">
								<div class="col-md-1">
								<p>16</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Live Services
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="16" class="checkbox">

					            </label>
								</div>

						</div>
					
							<div class="row">
								<div class="col-md-1">
								<p>17</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Underground Services
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="17" class="checkbox">

					            </label>
								</div>

						</div>
				
							<div class="row">
								<div class="col-md-1">
								<p>18</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Mobile Plant 
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="18" class="checkbox">

					            </label>
								</div>

						</div>
							<div class="row">
								<div class="col-md-1">
								<p>19</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Working at Heights
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="19" class="checkbox">

					            </label>
								</div>

						</div>
					
							<div class="row">
								<div class="col-md-1">
								<p>20</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Safety Harnesses.
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="20" class="checkbox">

					            </label>
								</div>

						</div>
					
							<div class="row">
								<div class="col-md-1">
								<p>21</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Ladders
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="21" class="checkbox">

					            </label>
								</div>

						</div>
				
							<div class="row">
								<div class="col-md-1">
								<p>22</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Mobile and Fixed Scaffold.
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="22" class="checkbox">

					            </label>
								</div>

						</div>
						<div class="row">
								<div class="col-md-1">
								<p>23</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Electrical –<ul>
												<li>Portable equip/tools tested and tagged.</li>
												</ul>
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="23" class="checkbox">

					            </label>
								</div>
						</div>
						<div class="row">
								<div class="col-md-1">
								<p>24</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Fire Prevention
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="24" class="checkbox">

					            </label>
								</div>

						</div>	
						<div class="row">
								<div class="col-md-1">
								<p>25</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Hazardous Substances & MSDS
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="25" class="checkbox">

					            </label>
								</div>

						</div>
						<div class="row">
								<div class="col-md-1">
								<p>26</p>
								</div>
								<div class="col-md-3" style="text-align: left;">
								<p>Manual Handling
								</p>
								</div>
								<div class="col-md-2">
								<label class="checkbox-inline">
							        
					            <input type="checkbox" Id="1" name="check_test[]" value="26" class="checkbox">

					            </label>
								</div>

						</div>
						<script>
										$(document).ready(function(){
												    $('#select_all').on('click',function(){
												        if(this.checked){
												            $('.checkbox').each(function(){
												                this.checked = true;
												            });
												        }else{
												             $('.checkbox').each(function(){
												                this.checked = false;
												            });
												        }
												    });
												    
												    $('.checkbox').on('click',function(){
												        if($('.checkbox:checked').length == $('.checkbox').length){
												            $('#select_all').prop('checked',true);
												        }else{
												            $('#select_all').prop('checked',false);
												        }
												    });
												});
						</script>	
						<div class="row">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;"><u>PRIVACY NOTIFICATION:</u></p>
								
							</div>
							
						</div>	
						<div class="row" style="border: 1px solid black">
							<div class="col-sm-12 form-group">
								<p style="text-shadow:1px 1px 1px rgba(135,135,135,1);font-weight:normal;color:#000000;letter-spacing:1pt;word-spacing:2pt;font-size:14px;text-align:justify;font-family:tahoma, verdana, arial, sans-serif;line-height:1; padding-top: 5px">The personal information you have provided may be used for the purpose of contacting the person you have nominated in the event of an emergency. From time to time the information may be supplied to others such (as medical officers, ambulance officers) involved with the outcome of an emergency or medical situation. All disclosures will be subject to the provisions imposed by the Privacy Act 1988.</p>
								
							</div>
							
						</div>	<br><br>
						<div class="row" style="border-bottom: 1px solid black">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;">INDUCTION DECLARATION</p>
								
							</div>
							
						</div>
						<div class="row" style="border: 1px solid black">
							<div class="col-sm-12 form-group">
								<p class="h4" style="text-align: left;">I <input type="text" style="border: 0;border-bottom: 0.5px solid red;outline: 0;">&nbsp certify the following: </p>
								<ul style="text-align: left;">
									<li>All information givenby me verbally during the induction and written by me on this form is true and correct.</li>
									<li>I understand my Work Health and Safety, Quality and Environmental obligations and responsibilities on this project as explained to me during the Site Specific Induction and as ticked by meabove.</li>
									<li>I have all the relevant licences, experience, trainings, qualifications,knowledge and skills to do the tasksallocated to me on this project competently and in a safe way.</li>
									<li>I am medically fit to perform the respective tasks I am required to undertake while on site.</li>

								</ul>
								
							</div>
							
						</div>	
						<div class="row" style="border-bottom: 1px solid black">
							<div class="col-sm-3 form-group">
								<p class="h5" style="text-align: left;">Your Signature</p>
		
							</div>
							<div class="col-sm-3 form-group">
								<input type="text" style="border: 0;border-bottom: 0.5px solid red;outline: 0;padding-top: 5px;">
		
							</div>
							<div class="col-sm-3 form-group">
								<p class="h5" style="text-align: left;">Today’s Date</p>
		
							</div>
							<div class="col-sm-3 form-group">
								<input type="text" style="border: 0;border-bottom: 0.5px solid red;outline: 0; padding-top: 10px;" value="<? echo date("m/d/y"); ?>" readonly>
							
							</div>
							
						</div><br><br>	
						<div class="row">
							<p class="h4" style="text-align: left;"><u>PERSON CARRYING OUT INDUCTION</u></p>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								
								<label>Induction Number</label>
								<select id="induction_select"style="height: 34px; display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555; background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;" onchange="select3()">
								<option>Select Induction Number</option>
								<? while($row3= $obj6->fetch_object()) { ?>
									<option> <? echo $row3->id ?> </option>
									<? } ?>
								</select>	
							</div>
							<div class="col-sm-6 form-group" style="margin-top: 20px;">
							<label class="inline">Date</label>
								<input  class="inline" type="text"  class="form-control" style=" border-radius: 4px;height: 32px; width: 30%; background-color: #eee;padding-left: 30px ;font-size:14px" value="<? echo date("m/d/y"); ?>">
							</div>
							<script>
								  function select3() {
								  	
								   var e = document.getElementById("induction_select");
								   var strUser2 = e.options[e.selectedIndex].value;
									// alert(strUser2);
									$.ajax({
									    type: "POST",
									    url: "ajax2.php",
									    data: {
									        value_ajax: strUser2
									    },

									    success: function(data) {



									         var val_b = data.split(",");
									         $('#name_induction').val(val_b[1]);
									        $('#employer_induction').val(val_b[2]);
									        

									    }
									});
								}
								 </script>


							
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
						
								<label>Name</label>
								<input type="text" id= "name_induction" placeholder="Enter Name Here.." class="form-control" readonly>
							</div>
							<div class="col-sm-6 form-group">
						
								<label>Employer/ Business</label>
								<input id= "employer_induction" type="text" placeholder="Enter Employer/ Business Here.." class="form-control" readonly>
								
							</div>
					
							
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
						
								<button type="button" class="btn btn-lg btn-warning">Reset</button>
							</div>
							<div class="col-sm-6 form-group">
						
								
								<input type="submit"  value="Submit"  name="set" style="width:20vw; height:4rem; color:black;margin-top:3rem;" />
							</div>
							
						</div>
						
			
				</form> 

			</div>
	</div>
</table> 


</center>        
</div> 
 
  <style> 
 input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input[type="number"] {
    -moz-appearance: textfield;
}

input[type="date"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    margin: 0;
}


</style>

  

  


