<?
include 'template/header.php';
include 'admin/config.php';
$id = $_GET['id'];
$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT * FROM test WHERE id='$id'";
$result = mysqli_query($conn, $sql);
          while ($res = mysqli_fetch_array($result)) {
            echo $res['name']."<br>"; 
            echo $res['description']."<br>"; 
            echo "<img src=".$res['img']."></img><br>";
            echo "<a href=".$res['url']." target='_blank'>В магазин</a><br>";
          }
?>