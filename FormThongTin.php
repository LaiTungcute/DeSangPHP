<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="HoTen">Họ và tên chủ hộ: </label>
        <input type="text" name="HoTen">

        <label for="Thang">Tháng: </label>
        <input type="text" name="Thang">

        <label for="Nam">Năm: </label>
        <input type="text" name="Nam">

        <label for="ChiSoDau">Chỉ số đầu tháng: </label>
        <input type="text" name="ChiSoDau">

        <label for="ChiSoCuoi">Chỉ số cuối tháng: </label>
        <input type="text" name="ChiSoCuoi">

        <button type="submit" name="Luu">Lưu</button>
    </form>
</body>
</html>

<?php 
    if(isset($_POST['Luu'])) {
        $hoTen = $_POST['HoTen'];
        $thang = $_POST['Thang'];
        $nam = $_POST['Nam'];
        $ChiSoDau = $_POST['ChiSoDau'];
        $ChiSoCuoi = $_POST['ChiSoCuoi'];

        $SoNuoc = $ChiSoCuoi - $ChiSoDau;

        if(file_exists("water.txt")) {
            $file = fopen('water.txt', "a");
        }
        else {
            $file = fopen('water.txt', "w");
        }

        fwrite($file, "$hoTen\t$thang\t$nam\t$SoNuoc\n");
        fclose($file);
        header("location: HienThi.php");
    }
?>