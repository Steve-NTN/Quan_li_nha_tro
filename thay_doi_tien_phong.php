<html lang="vn">
<head>
  <title>Thay đổi tiền phòng</title>
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
<h1> Chỉnh sửa tiền phòng </h1>
</div>

<?php

$id = "";
$tien_phong = "";
$tien_nuoc = "";
$tien_dien = "";
$tien_mang = "";
$ng_th_toan = "";
$ng_thu_tien = "";
$th_toan = "";
$no = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["id"])) $id = $_POST["id"];
  if(isset($_POST["tien_phong"])) $tien_phong = $_POST["tien_phong"];
  if(isset($_POST["tien_dien"])) $tien_dien = $_POST["tien_dien"];
  if(isset($_POST["tien_nuoc"])) $tien_nuoc = $_POST["tien_nuoc"];
  if(isset($_POST["tien_mang"])) $tien_mang = $_POST["tien_mang"];
  if(isset($_POST["ng_th_toan"])) $ng_th_toan = $_POST["ng_th_toan"];
  if(isset($_POST["ng_thu_tien"])) $ng_thu_tien = $_POST["ng_thu_tien"];
  if(isset($_POST["th_toan"])) $th_toan = $_POST["th_toan"];
  if(isset($_POST["no"])) $no = $_POST["no"];
  $sql = "UPDATE `tien_phong` SET `Tien_phong`=$tien_phong,`Tien_nuoc`= $tien_nuoc,`Tien_dien`=$tien_dien,`Tien_mang`=$tien_mang,`Ngay_thanh_toan`='$ng_th_toan',`Ngay_thu_tien`='$ng_thu_tien',`Thanh_toan`='$th_toan',`Tien_no`=$no WHERE `Ma_phong` =". $id;
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
<th>Tiền phòng:</th>
<td><input type="text" name="tien_phong" value=""></td>
</tr>
<tr>
<th>Tiền nước:</th>
<td><input type="text" name="tien_nuoc" value=""></td>
</tr>
<tr>
<th>Tiền điện:</th>
<td><input type="text" name="tien_dien" value=""></td>
</tr>
<tr>
<th>Tiền mạng:</th>
<td><input type="text" name="tien_mang" value=""></td>
</tr>
<tr>
<th>Ngày thanh toán:</th>
<td><input type="date" name="ng_th_toan" value=""></td>
</tr>
<tr>
<th>Ngày thu tiền:</th>
<td><input type="date" name="ng_thu_tien" value=""></td>
</tr>
<tr>
<th>Thanh toán:</th>
<td><input type="text" name="th_toan" value=""></td>
</tr>
<tr>
<th>Tiền còn nợ:</th>
<td><input type="text" name="no" value=""></td>
</tr>
</table>
<button type="submit">Xác nhận</button>
<button><a href="tien_phong.php" style="color: #000000">Quay lại</a></button>
</form>
<h3 id="change" align="center"></h3>
</body>
</html>