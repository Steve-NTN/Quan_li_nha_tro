<html lang="vn">
<head>
  <title>Danh sach nguoi thue</title>
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
<h1> Thêm người thuê trọ </h1>
</div>

<?php

$id = "";
$ten = "";
$cmnd = "";
$ng_sinh = "";
$nghe = "";
$dia_chi = "";
$sdt = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["id"])) $id = $_POST["id"];
  if(isset($_POST["ten"])) $ten = $_POST["ten"];
  if(isset($_POST["cmnd"])) $cmnd = $_POST["cmnd"];
  if(isset($_POST["ng_sinh"])) $ng_sinh = $_POST["ng_sinh"];
  if(isset($_POST["nghe"])) $nghe = $_POST["nghe"];
  if(isset($_POST["dia_chi"])) $dia_chi = $_POST["dia_chi"];
  if(isset($_POST["sdt"])) $sdt = $_POST["sdt"];
  $sql = "INSERT INTO `nguoi_thue` (`Ma_phong`, `Ten`, `So_CMND`, `Ngay_sinh`, `Dia_chi`, `Nghe_nghiep`, `So_dien_thoai`) VALUES ('$id', '$ten', '$cmnd', '$ng_sinh', '$dia_chi', '$nghe', '$sdt')";
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
<th>Tên:</th>
<td><input type="text" name="ten" value=""></td>
</tr>
<tr>
<th>Số CMND:</th>
<td><input type="text" name="cmnd" value=""></td>
</tr>
<tr>
<th>Ngày sinh:</th>
<td><input type="date" name="ng_sinh" value=""></td>
</tr>
<tr>
<th>Nghề nghiệp:</th>
<td><input type="text" name="nghe" value=""></td>
</tr>
<tr>
<th>Địa chỉ:</th>
<td><textarea cols="30" rows="5" name="dia_chi"></textarea></td>
</tr>
<tr>
<th>Số điện thoại:</th>
<td><input type="text" name="sdt" value=""></td>
</tr>
</table>
<button type="submit">Xác nhận</button>
<button><a href="nguoi_thue.php" style="color: #000000">Quay lại</a></button>
</form>
<h3 id="change" align="center"></h3>
</body>
</html>