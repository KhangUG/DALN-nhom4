<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/./adminlte/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/./adminlte/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/./adminlte/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Câu hỏi</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button id="btnQuestion" class=" btn btn-success">+</button>

                    </div>
                </div>

                <?php include('connect.php') ?>
                <?php $sql = $conn->prepare("SELECT * FROM questions");
                      $sql->execute();
                      $index = 1;
                      while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr question_id = '.$result['question_id'].'>';
                        echo '<th scope="row">'.($index++).'</th>';
                        echo '<td class="text-primary">' . $result['question_text'] . '</td>'; 

                        echo '<td>' ;

                        echo '<input type="button" class="btn btn-xs btn-info" value="Xem" name="view"> &nbsp';
                        echo '<input type="button" class="btn btn-xs btn-warning" value="Sửa" name = "update"> &nbsp';
                        echo '<input type="button" class="btn btn-xs btn-danger" value="Xóa" name = "delete"> &nbsp';
                        
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>

<?php include('mdlQuestion.php') ?>

<script type="text/JavaScript">
    $('#btnQuestion').click(function(){
        $('#modalQuestion').modal();
    });

    function GetDetail(question_id){
        
        $.ajax({
            url:'detail.php',
            type: 'get',
            data: {
                id:question_id,
                
            
            },
            success:function (data){
                try {
                    var q = jQuery.parseJSON(data);
                    $('#txaQuestion').val(q['question_text']);
                    $('#modalQuestion').modal();
                    $('#txaOptionA').val(q['option_a']);
                    $('#txaOptionB').val(q['option_b']);
                    $('#txaOptionC').val(q['option_c']);
                    $('#txaOptionD').val(q['option_d']);

                    switch (q['correct_answer']) {
                        case 'A':
                            $('#rdOptionA').prop('checked', true);
                            break;
                        case 'B':
                            $('#rdOptionB').prop('checked', true);
                            break;
                        case 'C':
                            $('#rdOptionC').prop('checked', true);
                            break;
                        case 'D':
                            $('#rdOptionD').prop('checked', true);
                            break;

                    }
                } catch (error) {
                    console.error('Invalid JSON:', error);
                }
            }
        });
    }
    
    $("input[name='view']" ).click(function() {
        var bid = this.question_id; // button ID 
        var trid = $(this).closest('tr').attr('question_id'); // table row ID 
        // console.log(trid)
            GetDetail(trid);
            $('#txaQuestion').attr('readonly', 'readonly')
            $('#txaOptionA').attr('readonly', 'readonly')
            $('#txaOptionB').attr('readonly', 'readonly')
            $('#txaOptionC').attr('readonly', 'readonly')
            $('#txaOptionD').attr('readonly', 'readonly')

            $('#rdOptionA').attr('disabled', 'readonly')
            $('#rdOptionB').attr('disabled', 'readonly')
            $('#rdOptionC').attr('disabled', 'readonly')
            $('#rdOptionD').attr('disabled', 'readonly')       
    });

   
</script>