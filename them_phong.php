<html lang="vn">
<head>
  <title>Thêm phòng trọ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="style.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quan_li_nha_tro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
?>
<div class="jumbotron text-center">
<h1> Thêm phòng trọ </h1>
</div>

<?php

$id = "";
$tang = "";
$dien_tich = "";
$so_ng = "";
$ngay_thue = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["id"])) $id = $_POST["id"];
  if(isset($_POST["tang"])) $tang = $_POST["tang"];
  if(isset($_POST["dien_tich"])) $dien_tich = $_POST["dien_tich"];
  if(isset($_POST["so_ng"])) $so_ng = $_POST["so_ng"];
  if(isset($_POST["ngay_thue"])) $ngay_thue = $_POST["ngay_thue"];
  $sql = "INSERT INTO `quan_li_phong`(`Ma_phong`, `Tang`, `Dien_tich`, `So_nguoi`, `Ngay_thue`) VALUES ('$id', '$tang', '$dien_tich', '$so_ng', '$ngay_thue')";
  if($conn->query($sql) == TRUE) {
    echo "Thêm dữ liệu thành công.";
  } else {
    echo "Có lỗi xảy ra: " . $sql . "<br>" . mysqli_error($conn);
  }

}
$conn->close();
?> 

  </tbody>
</table>
<br>
<form action="" method="post">
<table>
<tr>
<th>Mã phòng:</th>
<td><input type="text" name="id" value=""></td>
</tr>
<tr>
<th>Tầng:</th>
<td><input type="text" name="tang" value=""></td>
</tr>
<tr>
<th>Diện tích phòng:</th>
<td><input type="text" name="dien_tich" value=""></td>
</tr>
<tr>
<th>Số người:</th>
<td><input type="text" name="so_ng" value=""></td>
</tr>
<tr>
<th>Ngày thuê:</th>
<td><input type="date" name="ngay_thue" value=""></td>
</tr>
</table>
<button type="submit">Xác nhận</button>
<button><a href="quan_li_tro.php" style="color: #000000">Quay lại</a></button>
</form>
<h3 id="change" align="center"></h3>
</body>
</html>