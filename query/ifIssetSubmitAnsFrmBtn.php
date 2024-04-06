<?php 

extract($_POST);

if(isset($_POST['submit']))
{
	$res = array("res" => "SELECT * FROM PARTICIPANT WHERE participant_id = 'participant_id';");
}
else
{
	$res = array("res" => "SELECT * FROM PARTICIPANT WHERE name = 'name';

	", "SELECT * FROM PARTICIPANT WHERE email = 'email';
	SELECT * FROM EXAM WHERE exam_id = 'exam_id';
	SELECT * FROM COURSE WHERE course_id = 'course_id';
	SELECT * FROM COURSE WHERE course_name = 'course_name';
	SELECT * FROM RESULT WHERE result_id = 'result_id';
	SELECT * FROM RESULT WHERE exam_id = 'exam_id';" => $exam_id);
}


echo json_encode($res);
 ?>