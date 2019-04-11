<html lang="vn">
<head>
  <title>Customer List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
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
<h1> Danh sách các phòng </h1>
<div class="btn-group">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">Lựa chọn
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right">
      <li><a href="tai_san_phong.php">Tài sản phòng</a></li>
      <li><a href="nguoi_thue.php">Thông tin người thuê</a></li>
      <li><a href="tien_phong.php">Tiền phòng</a></li>
      <li class="divider"></li>
      <li><a href="anh_phong.html">Ảnh các phòng</a></li>
    </ul>
</div>
</div>


<table class=table>
<thead>
<tr>
  <th>Phòng</th>
  <th>Tầng</th>
  <th>Diện tích</th>
  <th>Số người</th>
  <th>Ngày thuê</th>
</tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM quan_li_phong";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
     echo "<tr> <td>". $row["Ma_phong"] ."</td><td>". $row["Tang"] ."</td> <td>". $row["Dien_tich"] ."</td> <td>". $row["So_nguoi"] ."</td> <td>". $row["Ngay_thue"] ."</td><tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 

  </tbody>
</table>

</body>
</html>