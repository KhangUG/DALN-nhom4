<?php 
    include('connect.php');

    if (isset($_GET['question_id'])) {
        $id = $_GET['question_id'];

        // Chuẩn bị câu truy vấn
        $sql = "SELECT * FROM questions WHERE question_id = :question_id";
        $rs = $conn->prepare($sql);
        $rs->bindParam(':question_id', $id, PDO::PARAM_INT);
        $rs->execute();

        $result = $rs->fetch(PDO::FETCH_ASSOC);

        if ($result) echo json_encode($result, JSON_UNESCAPED_UNICODE);
        
    } 

    // $question_id = $GET['$question_id'];
    // $sql = "select * from questions where question_id = '".$question_id."'";
    // $rs = $conn->prepare($sql);
    // $rs->execute();
    // $result = $rs->fetch();
    // $q->questions = $result;
    // echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
