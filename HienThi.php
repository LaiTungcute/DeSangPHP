<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td, th {
            padding: 10px;
        }

        button {
            border: 0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
            background-color: blue;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="FormThongTin.php"><button>Thêm</button></a>

    <table border="1" width="90%">
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Tháng</th>
            <th>Năm</th>
            <th>Số nước tiêu thụ</th>
            <th>Thành tiền</th>
            <th>Thuế VAT(10%)</th>
            <th>Thuế BVMT(15%)</th>
            <th>Tổng tiền</th>
        </tr>

        <?php 
            $file = fopen("water.txt", "r");
            $count = 0;
            while(!feof($file)) {
                $line = fgets($file);
                if($line != "") {
                    $content = explode("\t", $line);
                    $count++;

                    if($content[3]<=10) {
                       $tien = $content[3]*5000;
                    }
                    else if($content[3]<=20) {
                       $tien = (10 * 5000) + ($content[3] - 10) * 10000;
                    }
                    else if($content[3]<=30) {
                       $tien = (10 * 5000) + 10 * 10000 + ($content[3] - 20) * 15000;
                    }
                    else {
                       $tien = (10 * 5000) + 10 * 10000 + 10 * 15000 + ($content[3] - 30) * 20000;
                    }

                $thueVAT = $tien * (10/100);
                $thueBV = $tien * (15/100);
                ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $content[0]?></td>
                    <td><?= $content[1]?></td>
                    <td><?= $content[2]?></td>
                    <td><?= $content[3]?></td> 
                    <td><?= $tien?></td>
                    <td><?= $thueVAT?></td>
                    <td><?= $thueBV?></td>
                    <td><?= $tien + $thueVAT + $thueBV?></td>
                </tr>
                <?php
                }
            }
            fclose($file);
        ?>
    </table>
</body>
</html>