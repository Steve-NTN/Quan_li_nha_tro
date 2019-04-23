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
<h1> Thông tin người thuê </h1>
<div class="btn-group">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">Lựa chọn
<span class="caret"></span></button>
<ul class="dropdown-menu dropdown-menu-right">
  <li><a href="them_nguoi.php"><i class="fas fa-user-plus"></i>  Thêm người</a></li>
  <li><a href="xoa_nguoi.php"><i class="fas fa-user-minus"></i>  Xóa người</a></li>
  <li><a href="loc_nguoi_thue.php"><i class="fas fa-filter"></i>  Lọc ra người cùng phòng</a></li>
  <li class="divider"></li>
  <li><a href="quan_li_tro.php"><i class="fas fa-long-arrow-alt-left"></i> Back</a></li>
</ul>
</div>
</div>


<table class=table>
<thead>
<tr>
  <th>Mã phòng</th>
  <th>Tên</th>
  <th>Số CMND</th>
  <th>Ngày sinh</th>
  <th>Nghề nghiệp</th>
  <th>Địa chỉ</th>
  <th>Số điện thoại</th>
</tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM nguoi_thue";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
 echo "<tr> <td>". $row["Ma_phong"] ."</td><td>". $row["Ten"] ."</td> <td>". $row["So_CMND"] ."</td> <td>". $row["Ngay_sinh"] ."</td> <td>". $row["Nghe_nghiep"] ."</td> <td>". $row["Dia_chi"] ."</td> <td>". $row["So_dien_thoai"] ."</td><tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 

  </tbody>
</table>
<br>
</body>
</html>