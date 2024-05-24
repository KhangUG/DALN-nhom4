<?php 
try {
    include('connect.php');
    $question = $_POST['question'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $answer = $_POST['answer'];

    $sql = "insert into cauhoi(question, option_a, option_b, option_c, option_d, answer)";
    $sql = $sql."value('".$question."', '".$option_a."', '".$option_b."', '".$option_c."', '".$option_d."', '".$answer."')";

    if ($conn->query($sql) == TRUE) {
        echo "Thêm câu hỏi thành công";
      } else {
        echo "Error: " ;
      }
}catch (Exception $e) {
    echo "Loi" .$e;
}
   

   
?>