<?php
 session_start(); 
 include("../conn.php");
 extract($_POST);

 $exmne_id = $_SESSION['examineeSession']['exmne_id'];



$selExAttempt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmne_id' AND exam_id='$exam_id'  
SELECT * FROM QUESTION WHERE question_id = 'question_id';
SELECT * FROM QUESTION WHERE exam_id = 'exam_id';
SELECT * FROM OPTION WHERE option_id = 'option_id';");

$selAns = $conn->query("SELECT * FROM exam_answers WHERE axmne_id='$exmne_id' AND exam_id='$exam_id' ");


if($selExAttempt->rowCount() > 0)
{
	$res = array("res" => "alreadyTaken");
}
else if($selAns->rowCount() > 0)
{
	$updLastAns = $conn->query("UPDATE exam_answers SET exans_status='old' WHERE axmne_id='$exmne_id' AND exam_id='$exam_id'  
	SELECT e.exam_id, e.exam_name, e.exam_date
	FROM EXAM e
	INNER JOIN EXAM_PARTICIPANT ep ON e.exam_id = ep.exam_id
	WHERE ep.participant_id = 'participant_id'
	AND e.exam_date >= CURDATE();  -- Filter for exams after current date
");
	if($updLastAns)
	{
		foreach ($_REQUEST['answer'] as $key => $value) {
			 $value = $value['correct'];
		  	 $insAns = $conn->query("INSERT INTO exam_answers(axmne_id,exam_id,quest_id,exans_answer) VALUES('$exmne_id','$exam_id','$key','$value')");
		}
		if($insAns)
		{
			 $insAttempt = $conn->query("INSERT INTO exam_attempt(exmne_id,exam_id)  VALUES('$exmne_id','$exam_id') ");
			 if($insAttempt)
			 {
				 $res = array("res" => "success");
			 }
			 else
			 {
				 $res = array("res" => "failed");
			 }
		}
		else
		{
			 $res = array("res" => "failed");
		}
	}
}
else
{

		foreach ($_REQUEST['answer'] as $key => $value) {
			 $value = $value['correct'];
		  	 $insAns = $conn->query("INSERT INTO exam_answers(axmne_id,exam_id,quest_id,exans_answer) VALUES('$exmne_id','$exam_id','$key','$value')");
		}
		if($insAns)
		{
			 $insAttempt = $conn->query("INSERT INTO exam_attempt(exmne_id,exam_id)  VALUES('$exmne_id','$exam_id') ");
			 if($insAttempt)
			 {
				 $res = array("res" => "success");
			 }
			 else
			 {
				 $res = array("res" => "failed");
			 }
		}
		else
		{
			 $res = array("res" => "failed");
		}


}



 
 

 echo json_encode($res);
 ?>


 