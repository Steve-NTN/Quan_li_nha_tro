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
<h1> Chỉnh sửa tài sản phòng </h1>
</div>

<?php

$id = "";
$dieu_hoa = "";
$nong_lanh = "";
$bong = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["id"])) $id = $_POST["id"];
  if(isset($_POST["dieu_hoa"])) $dieu_hoa = $_POST["dieu_hoa"];
  if(isset($_POST["nong_lanh"])) $nong_lanh = $_POST["nong_lanh"];
  if(isset($_POST["bong"])) $bong = $_POST["bong"];
  $sql = "UPDATE `tai_san_phong` SET `So_luong_dieu_hoa`=$dieu_hoa,`So_luong_nong_lanh`=$nong_lanh,`So_luong_bong`=$bong WHERE `Ma_phong` =". $id;
  if($conn->query($sql) == TRUE) {
    echo "Sửa dữ liệu thành công.";
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
<th>Số điều hòa:</th>
<td><input type="text" name="dieu_hoa" value=""></td>
</tr>
<tr>
<th>Số nóng lạnh:</th>
<td><input type="text" name="nong_lanh" value=""></td>
</tr>
<tr>
<tr>
<th>Số bóng đèn:</th>
<td><input type="text" name="bong" value=""></td>
</tr>
</table>
<button type="submit">Xác nhận</button>
<button><a href="tai_san_phong.php" style="color: #000000">Quay lại</a></button>
</form>
<h3 id="change" align="center"></h3>
</body>
</html>