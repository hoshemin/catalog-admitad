<?php
include 'config.php';    
$conn = mysqli_connect($servername, $username, $password, $database);

$tovarNameDB = array();
$tovarNameCSV = array();
$row = 0;
if (($handle = fopen("test.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 20000, ";")) !== FALSE) {
        $row++;
        if($row===1) continue;
        
        if($row===2){
          $sql = "SELECT name FROM test WHERE shop='$data[0]'";
          $result = mysqli_query($conn, $sql);
          while ($res = mysqli_fetch_array($result)) {
             array_push($tovarNameDB, $res['name']);
          }
          
        }
        array_push($tovarNameCSV, $data[4]);
        if(in_array($data[4], $tovarNameDB)){
            if(!file_get_contents($data[5])){
                $sql = "DELETE FROM test WHERE name='$data[4]'";
                $result = mysqli_query($conn, $sql);
            }else{
                $sql = "UPDATE test SET price='$data[6]', img='$data[5]' WHERE name='$data[4]'";
                $result = mysqli_query($conn, $sql);
            }
        }else{
          if(file_get_contents($data[5])){
                $sql = "INSERT INTO test (shop, name, description, url, img, currency, price, shop_category, brands) VALUES 
                                         ('$data[0]', '$data[4]', '$data[3]', '$data[7]', '$data[5]', '$data[2]', '$data[6]', '$data[1]', '$data[8]')";
                $result = mysqli_query($conn, $sql);
            } 
        }
        
        
    }
    fclose($handle);
    for($i=0;$i<count($tovarNameDB);$i++){
        if(!in_array($tovarNameDB[$i], $tovarNameCSV)){
            $sql = "DELETE FROM test WHERE name='$tovarNameDB[$i]'";
            $result = mysqli_query($conn, $sql);
        }
    }
    

  mysqli_close($conn);
  echo "DONE!!!!";
}
?>