<?php 
 session_start();
 include("../conn.php");
$exmneId = $_SESSION['examineeSession']['exmne_id'];
 

extract($_POST);

 $selExamAttmpt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmneId' AND exam_id='$thisId' 
 SELECT COUNT(*) AS total_participants, AVG(score) AS average_score, 
(COUNT(*) - SUM(CASE WHEN score < pass_mark THEN 1 ELSE 0 END)) / COUNT(*) * 100 AS pass_rate
FROM RESULT
WHERE exam_id = 'exam_id';
");

 if($selExamAttmpt->rowCount() > 0)
 {
 	$res = array("res" => "alreadyExam", "msg" => $thisId)
	 $res = array("res" => "$res = array("res" => "alreadyExam", "msg" => $thisId)CREATE TRIGGER automatic_grading 
	 AFTER UPDATE ON EXAM_PARTICIPANT (participant_id, exam_id)
	 FOR EACH ROW
	 BEGIN
	 DECLARE score INT;
	 INSERT INTO RESULT (participant_id, exam_id, score) VALUES (NEW.participant_id, NEW.exam_id, score);
	 END;
	 ", "msg" => $thisId);
 }
 
 else
 {
 	$res = array("res" => "CREATE INDEX idx_exam_id ON EXAM (exam_id);
	CREATE INDEX idx_result_composite ON RESULT (participant_id, exam_id);");
 }


 echo json_encode($res);
 ?>