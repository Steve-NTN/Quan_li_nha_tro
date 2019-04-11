<html lang="en">
<head>
  <title>Customer List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
<h1> Tiền phòng </h1>
<div class="btn-group">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">Lựa chọn
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right">
      <li><a href="#">Tổng tiền phải thanh toán</a></li>
      <li><a href="#"></a></li>
      <li><a href="#">Tiền phòng</a></li>
      <li class="divider"></li>
      <li><a href="quan_li_tro.php"><i class="fas fa-long-arrow-alt-left"></i> Back</a></li>
    </ul>
</div>
</div>


<table class=table>
<thead>
<tr>
  <th>Phòng</th>
  <th>Tiền phòng</th>
  <th>Tiền nước</th>
  <th>Tiền điện</th>
  <th>Tiền mạng</th>
  <th>Ngày thanh toán</th>
  <th>Ngày thu tiền</th>
  <th>Thanh toán</th>
  <th>Nợ</th>
</tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM tien_phong";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
     echo "<tr> <td>". $row["Ma_phong"] ."</td><td>". $row["Tien_phong"] ."</td> <td>".$row["Tien_nuoc"] ."</td> <td>". $row["Tien_dien"] ."</td> <td>". $row["Tien_mang"] ."</td> <td>".$row["Ngay_thanh_toan"] ."</td> <td>". $row["Ngay_thu_tien"] ."</td> <td>".
       $row["Thanh_toan"] ."</td> <td>". $row["Tien_no"] ."</td><tr>";
  }
} else {
  echo "0 results";
}

?> 

  </tbody>
</table>

<h4>Tổng tiền mỗi phòng phải thanh toán</h4>
<table class=table>
<thead>
<tr>
  <th>Phòng</th>
  <th>Số tiền phòng còn phải thanh toán</th>
</tr>
</thead>
<tbody>

<?php
$sql1 = "SELECT * FROM tien_phong";
$sql2 ="SELECT SUM(`Tien_phong` + `Tien_nuoc` + `Tien_dien` + `Tien_mang` + Tien_no) Sum FROM `tien_phong` WHERE Ma_phong = 101";
$result = $conn->query($sql1);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
     echo "<tr> <td>". $row["Ma_phong"] ."</td><td>". $row["Tien_no"] ."</td><tr>";
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