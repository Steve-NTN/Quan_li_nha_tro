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
<h1> Xóa người thuê trọ </h1>
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
  if(isset($_POST["cmnd"])) $cmnd = $_POST["cmnd"];
  $sql1 = "SELECT COUNT(`So_CMND`) So_luong FROM `nguoi_thue` WHERE `Ma_phong` = $id";
  $re1 = $conn->query($sql1);
  $old = $re1->fetch_assoc();
  $sql = "DELETE FROM `nguoi_thue` WHERE `Ma_phong`= $id AND `So_CMND` = $cmnd";
  $re2 = $conn->query($sql1);
  $new = $re2->fetch_assoc();
  if($conn->query($sql) == TRUE) {
    if ($new["So_luong"] == $old["So_luong"]) {
      echo "Mã phòng hay số CMND không đúng.";
    }else {
      if($new < $old)
      echo "Xóa dữ liệu thành công.";
    }
  } else {
    echo "Có lỗi xảy ra: " . $sql . "<br>" . mysqli_error($conn);
  }
}
$conn->close();
?> 

  </tbody>
</table>
<br>
<p>Nhập mã phòng và số CMND: </p>
<form action="" method="post">
<table>
<tr>
<th>Mã phòng:</th>
<td><input type="text" name="id" value=""></td>
</tr>
<tr>
<th>Số CMND:</th>
<td><input type="text" name="cmnd" value=""></td>
</tr>
</table>
<button type="submit">Xác nhận</button>
<button><a href="nguoi_thue.php" style="color: #000000">Quay lại</a></button>
</form>
<h3 id="change" align="center"></h3>
</body>
</html>