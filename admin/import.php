<?php
include 'config.php';    
$conn = mysqli_connect($servername, $username, $password, $database);

$tovarNameDB = array();
$tovarNameCSV = array();
$brandsNameCSV = array();
$brandsNameDB = array();
$shopNameDB = array();
$tovarUrlCSV = array();
$tovarDescCSV = array();
$tovarPriceCSV = array();
$tovarImgCSV = array();
$tovarShopCSV = array();
$tovarBrandsCSV = array();
$row = 0;
if (($handle = fopen("test.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
        $row++;
        if($row===1) continue;
   array_push($tovarNameCSV, $data[3]);
   array_push($tovarUrlCSV, $data[6]);
   array_push($tovarDescCSV, $data[2]);
   array_push($tovarPriceCSV, $data[5]);
   array_push($tovarImgCSV, $data[4]);
   array_push($tovarBrandsCSV, $data[7]);
   array_push($tovarShopCSV, $data[0]);
   array_push($brandsNameCSV, strtoupper($data[7]));
   $brandsNameCSV_u = array_values(array_diff(array_unique($brandsNameCSV),array('')));
   if($row===2){
       
       $sql = "SELECT name FROM shops";
       $result = mysqli_query($conn, $sql);
       while ($res = mysqli_fetch_array($result)) {
             array_push($shopNameDB, $res['name']);
        }
        if(!in_array($data[0], $shopNameDB)){
            $sql = "INSERT INTO shops (name) VALUES ('$data[0]')";
            $result = mysqli_query($conn, $sql);
      }
     }
     $sql = "SELECT name FROM tovar";
       $result = mysqli_query($conn, $sql);
       while ($res = mysqli_fetch_array($result)) {
             array_push($tovarNameDB, $res['name']);
        }
   
    }
   $sql = "SELECT name FROM brands";
       $result = mysqli_query($conn, $sql);
       while ($res = mysqli_fetch_array($result)) {
             array_push($brandsNameDB, $res['name']);
        }
        for($i=0;$i<count($brandsNameCSV_u);$i++){
            if(!in_array($brandsNameCSV_u[$i], $brandsNameDB)){
               $sql = "INSERT INTO brands (name) VALUES ('$brandsNameCSV_u[$i]')";
               $result = mysqli_query($conn, $sql);
          }
        } 
}
print_r($tovarNameCSV);


        
        for($i=0;$i<count($tovarNameCSV);$i++){
            if(in_array($tovarNameCSV[$i], $tovarNameDB)){
                if(!file_get_contents($tovarImgCSV[$i])){
                    
                    $sql = "DELETE FROM tovar WHERE name='$tovarNameCSV[$i]'";
                    $result = mysqli_query($conn, $sql);
                }else{
                    
                    $sql = "UPDATE tovar SET price='$tovarPriceCSV[$i]', img='$tovarImgCSV[$i]' WHERE name='$tovarNameCSV[$i]'";
                    $result = mysqli_query($conn, $sql);
             }
                
                
            }else if(!in_array($tovarNameCSV[$i], $tovarNameDB)){
                
               if(file_get_contents($tovarImgCSV[$i])){
                    
                $sql = "INSERT INTO tovar (id_shop, name, description, url, img, price, id_brands) VALUES 
                                         ((SELECT id FROM shops WHERE name='$tovarShopCSV[$i]'), '$tovarNameCSV[$i]', '$tovarDescCSV[$i]', '$tovarUrlCSV[$i]', '$tovarImgCSV[$i]', '$tovarPriceCSV[$i]', (SELECT id FROM brands WHERE name='$tovarBrandsCSV[$i]'))";
                $result = mysqli_query($conn, $sql);
                } 
         }
        for($i=0;$i<count($tovarNameDB);$i++){
           if(!in_array($tovarNameDB[$i], $tovarNameCSV)){
               
               $sql = "DELETE FROM tovar WHERE name='$tovarNameDB[$i]'";
               $result = mysqli_query($conn, $sql);
        }
    
        }     
    }  




?>