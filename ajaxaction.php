<?php
    Include('db.php');
    
    // Chen du lieu
    if(isset($_POST['hovaten'])){ // kiem tra bien co ton tai hay ko 
        // $_POST thu thap du lieu tu file index gui qua bang hinh thuc POST
        $hovaten = $_POST['hovaten'];
        $sodienthoai = $_POST['sodienthoai'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $ghichu = $_POST['ghichu'];
        // thuc hien truy van
        // $con: dat ten file ket noi voi database in file db.php
        mysqli_query($con,"INSERT INTO tbl_khachhang(hovaten,sodienthoai,diachi,email,ghichu) VALUES('$hovaten','$sodienthoai','$diachi','$email','$ghichu')");
    }

    // Lay du lieu
    $output = '';
    $sql_select = mysqli_query($con, "SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC");
    $output .= '
        <div class="table table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>Họ và tên</td>
                    <td>Số điện thoại</td>
                    <td>Địa chỉ</td>
                    <td>Email</td>
                    <td>Ghi chú</td>
                </tr>
    ';
    if (mysqli_num_rows($sql_select)>0){
        while($rows = mysqli_fetch_array($sql_select)){
            $output .= '
                <tr>
                    <td>'.$rows['hovaten'].'</td>
                    <td>'.$rows['sodienthoai'].'</td>
                    <td>'.$rows['diachi'].'</td>
                    <td>'.$rows['email'].'</td>
                    <td>'.$rows['ghichu'].'</td>
                </tr>
            ';
        }
    } else{
        $output .='
            <tr>
                <td colspan="5">Dữ liệu chưa có</td>
            </tr>
            ';
    }
    $output .='
        </table></div>
    ';

    echo $output;
?>