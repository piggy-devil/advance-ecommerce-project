
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @LaravelDompdfThaiFont
    <title>รายงานผลการเรียนนักเรียนชั้น ป.1/10</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'THSarabunNew', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 align="center">ผลการเรียน</h2>
        <table class="table table-striped">
            <tr>
                <th>เลขที่</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เกรดเฉลี่ย</th>
            </tr>
            <tr>
                <td>1</td>
                <td>ลูพี่</td>
                <td>หมวกฟาง</td>
                <td>3.99</td>
            </tr>
            <tr>
                <td>2</td>
                <td>สุรสิทธิ์</td>
                <td>รักเรียน</td>
                <td>3.58</td>
            </tr>
            <tr>
                <td>3</td>
                <td>นายสมัคร</td>
                <td>รักดี</td>
                <td>3.65</td>
            </tr>
            <tr>
                <td>4</td>
                <td>นายกิตติ</td>
                <td>ใฝ่ดี</td>
                <td>3.30</td>
            </tr>
            <tr>
                <td>5</td>
                <td>นายจักรเพชร</td>
                <td>ลุยสวน</td>
                <td>3.65</td>
            </tr>
            <tr>
                <td>6</td>
                <td>นายดราก้อน</td>
                <td>ลูกการ์ป</td>
                <td>3.65</td>
            </tr>
            <tr>
                <td>7</td>
                <td>จ่าการ์ป</td>
                <td>รักดี</td>
                <td>3.21</td>
            </tr>
            <tr>
                <td>8</td>
                <td>นางสาวนามิ</td>
                <td>รักดี</td>
                <td>4.00</td>
            </tr>
        </table>
        <p align="right">ครูที่ปรึกษา : <i>Kong RuksiamStudio</i></p>
        <a href="MyReport.pdf" class="btn btn-primary">โหลดผลการเรียน (pdf)</a>
    </div>
</body>