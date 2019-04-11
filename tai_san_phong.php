<html>
<head>
  <title>Customer List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
<h1> Đồ dùng của phòng </h1>
<div class="btn-group">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">Lựa chọn
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right">
      <li><a href="#">Tài sản phòng</a></li>
      <li><a href="#">Thông tin người thuê</a></li>
      <li><a href="#">Tiền phòng</a></li>
      <li class="divider"></li>
      <li><a href="quan_li_tro.php"><i class="fas fa-long-arrow-alt-left"></i> Back</a></li>
    </ul>
</div>
</div>


<table class=table>
<thead>
<tr>
  <th>Mã phòng</th>
  <th>Số điều hòa</th>
  <th>Số nóng lạnh</th>
  <th>Số bóng đèn</th>
</tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM tai_san_phong";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
     echo "<tr> <td>". $row["Ma_phong"] ."</td><td>". $row["So_luong_dieu_hoa"] ."</td> <td>". $row["So_luong_nong_lanh"] ."</td> <td>". $row["So_luong_bong"] ."</td><tr>";
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