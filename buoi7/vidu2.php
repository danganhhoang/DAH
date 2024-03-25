<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "MyDB";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$DB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit;
}
$sql = "select *from sinhvien";
$stm = $conn ->prepare($sql);
$data = $stm-> fetchAll(PDO::FETCH_OBJ);
print_r($data);
?>
<table border="1">
  <?php
  foreach($data as $item)
  {
    ?>
    <tr>
      <td><?php echo $item ->mssv ?></td>
      <td><?php echo $item ->hoten ?></td>
      <td><?php echo $item ->ngaysinh ?></td>
      <td><?php echo $item ->diem ?></td>
    </tr>
  }
</table>