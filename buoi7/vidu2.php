<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "mydb";

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
      <td><?php echo $item ->MSSV ?></td>
      <td><?php echo $item ->HOTen ?></td>
      <td><?php echo $item ->NgaySinh ?></td>
      <td><?php echo $item ->Diem ?></td>
    </tr>
  }
</table>