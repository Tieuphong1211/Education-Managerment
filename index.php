<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <h3>Insert dữ liệu trong FORM</h3>
            <form method="post" id="insert_data_hoten">
                <label>Họ và tên</label>
                <input type="text" class="form-control" id="hovaten" placeholder="Điền họ và tên">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" id="sodienthoai" placeholder="Điền họ và tên">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" placeholder="Điền họ và tên">
                <label>Email</label>
                <input type="text" class="form-control" id="email" placeholder="Điền họ và tên">
                <label>Ghi chú</label>
                <input type="text" class="form-control" id="ghichu" placeholder="Điền họ và tên">
                <br>
                <input type="button" name="insert_data" value="Insert" id="button_insert" class="btn btn-primary">
            </form>

            <h3>Load du lieu bang Ajax</h3>
            <div id="load_data"></div>
        </div>
    </div>
        <script>
        $(document).ready(function(){
            function fetch_data(){
                $.ajax({
                    url:"ajaxaction.php",
                    type:"POST",
                    success:function(data){
                        $("#load_data").html(data)
                        fetch_data()
                    }
                })
            }
            fetch_data()
            // Insert du lieu len databate bang AJAX
            $('#button_insert').on('click',function(){
                var hovaten = $('#hovaten').val()
                var sodienthoai = $('#sodienthoai').val()
                var diachi = $('#diachi').val()
                var email = $('#email').val()
                var ghichu = $('#ghichu').val()
    
                if (hovaten =='' || sodienthoai =='' || diachi=='' || email =='' || ghichu =='' ) {
                    alert ("ko duoc de trong")
                } else {
                    $.ajax({
                        // dia chi file thuc thi lenh gui du lieu 
                        url: "ajaxaction.php",
                        // hinh thuc tai len (post, get, ...)
                        type: "POST",
                        // chi dinh du lieu tai len
                        data: {hovaten:hovaten,sodienthoai:sodienthoai,diachi:diachi,email:email,ghichu:ghichu},
                        // kiem tra trang thai tai du lieu 
                        success: function(data){
                            $("#insert_data_hoten")[0].reset();
                            fetch_data()
                        }
                    })
                }
            });
        })
        </script>
</body>
</html>