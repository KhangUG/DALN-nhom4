<div class="modal" tabindex="-1" role="dialog" id="modalQuestion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">THÊM CÂU HỎI </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Thêm câu hỏi -->
                <div class="form-group">
                    <textarea class="form-control" id="txaQuestion" rows="1" placeholder="Thêm câu hỏi "></textarea>
                </div>
                <!-- Đáp án A  -->
                <div class="form-group">
                    <textarea class="form-control" id="txaOptionA" rows="1" placeholder="Đáp án A "></textarea>
                </div>
                <!-- Đáp án B  -->
                <div class="form-group">
                    <textarea class="form-control" id="txaOptionB" rows="1" placeholder="Đáp án B "></textarea>
                </div>
                <!-- Đáp án C  -->
                <div class="form-group">
                    <textarea class="form-control" id="txaOptionC" rows="1" placeholder="Đáp án C "></textarea>
                </div>
                <!-- Đáp án D  -->
                <div class="form-group">
                    <textarea class="form-control" id="txaOptionD" rows="1" placeholder="Đáp án D "></textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <!-- Đáp án A  -->
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="rdOptionA" name="optradio"
                                    value="option1">Đáp án A
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                        </div>

                        <!-- Đáp án B  -->
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="rdOptionB" name="optradio"
                                    value="option1">Đáp án B
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                        </div>

                        <!-- Đáp án C  -->
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="rdOptionC" name="optradio"
                                    value="option1">Đáp án C
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                        </div>

                        <!-- Đáp án D  -->
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="rdOptionD" name="optradio"
                                    value="option1">Đáp án D
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSubmit">Xác nhận</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#btnSubmit').click(function() {
    let question = $('#txaQuestion')
.val().trim(); // Lấy giá trị của textarea có id là txaQuestion gán cho biến question 
    let option_a = $('#txaOptionA')
.val().trim(); // Lấy giá trị của  textarea có id là txaOptionA gán cho biến option_a
    let option_b = $('#txaOptionB')
.val().trim(); // Lấy giá trị của  textarea có id là txaOptionB gán cho biến option_b
    let option_c = $('#txaOptionC')
.val().trim(); // Lấy giá trị của  textarea có id là txaOptionC gán cho biến option_c
    let option_d = $('#txaOptionD')
.val().trim(); // Lấy giá trị của  textarea có id là txaOptionD gán cho biến option_d

    let answer = $('#rdOptionA').is(':checked') ? 'A' : $('#rdOptionB').is(':checked') ? 'B' : $('#rdOptionC')
        .is(':checked') ? 'C' : $('#rdOptionD').is(':checked') ? 'D' :
        ''; // xem thằng nào đc check thì gán giá trị tương ứng , sdung thuật toán 3 ngôi 

    //console.log(question,option_a, option_b, option_c, option_d, answer);

    //Ràng buôjc dữ liệu 
    if (question.length == 0 || option_a.length == 0 || option_b.length == 0 || option_c.length == 0 || option_d.length == 0){
        alert('Vui lòng nhập đầy đủ câu hỏi và các đáp án !');
        return;
    }

    if (answer.length == 0) {
        alert('Vui lòng chọn đáp án đúng');
        return;
    }
    

    $.ajax({
        url: 'add_question.php',
        type: 'post',
        data: {
            question: question, // bên trái là thuộc tính , bên phải là giá trị <-> tên bên phía trên 
            option_a: option_a,
            option_b: option_b,
            option_c: option_c,
            option_d: option_d,
            answer: answer
        },

        success: function(data) {
            alert(data);
            //reset giá trị textarea
            $('#txaQuestion').val('');
            $('#txaOptionA').val('');
            $('#txaOptionB').val('');
            $('#txaOptionC').val('');
            $('#txaOptionD').val('');

            //reset giá trị cho radio button
            $('#rdOptionA').prop('checked', false);
            $('#rdOptionB').prop('checked', false);
            $('#rdOptionC').prop('checked', false);
            $('#rdOptionD').prop('checked', false);
        }

    });
})
</script>