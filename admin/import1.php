<?php
ini_set('max_execution_time', 3600);
include 'config.php';    
$conn = mysqli_connect($servername, $username, $password, $database);
$tovarNameCSV = array();
$tovarShopCSV = array();
$tovarDescCSV = array();
$tovarPriceCSV = array();
$tovarImgCSV = array();
$tovarBrandsCSV = array();
$tovarUrlCSV = array();
$tovarIdCSV = array();
$tovarTagsCSV = array();
$tovarIdShop = array();
$tovarIdShopDB = array();
$shopNameDB = array();
$brandsNameDB = array();
$tagsName = array();
$row = 0;
if (($handle = fopen("220 вольт.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
        $row++;
        if($row===1){
            $InxShopCSV = array_search('shop', $data);
            $InxNameCSV = array_search('name', $data);
            $InxDescCSV = array_search('description', $data);
            $InxUrlCSV = array_search('url', $data);
            $InxImgCSV = array_search('picture', $data);
            $InxPriceCSV = array_search('price', $data);
            $InxBrandCSV = array_search('vendor', $data);
            $InxIdCSV = array_search('id', $data);
            $InxTagsCSV = array_search('categoryId', $data);
            continue;
        }
        
        
        
        array_push($tovarNameCSV, $data[$InxNameCSV]);
        array_push($tovarShopCSV, $data[$InxShopCSV]);
        array_push($tovarDescCSV, $data[$InxDescCSV]);
        array_push($tovarPriceCSV, $data[$InxPriceCSV]);
        array_push($tovarImgCSV, $data[$InxImgCSV]);
        array_push($tovarBrandsCSV, $data[$InxBrandCSV]);
        array_push($tovarUrlCSV, $data[$InxUrlCSV]);
        array_push($tovarIdCSV, $data[$InxIdCSV]);
        array_push($tovarTagsCSV, $data[$InxTagsCSV]);
        array_push($tovarIdShop, $data[$InxShopCSV]."_".$data[$InxIdCSV]);
        
        
        
        if($row===2){
            $sql = "SELECT name FROM shops";
            $result = mysqli_query($conn, $sql);
            while ($res = mysqli_fetch_array($result)) {
                 array_push($shopNameDB, $res['name']);
            }
            if(!in_array($tovarShopCSV[0], $shopNameDB)){
                 $sql = "INSERT INTO shops (name) VALUES ('$tovarShopCSV[0]')";
                 $result = mysqli_query($conn, $sql);
           }
        }
        
    }
    
   
}


$sql = "SELECT id_for_shop FROM tovar";
       $result = mysqli_query($conn, $sql);
       while ($res = mysqli_fetch_array($result)) {
             array_push($tovarIdShopDB, $res['id_for_shop']);
        }
        
$tovarBrandsCSV_u = array_values(array_diff(array_unique($tovarBrandsCSV),array('')));
   $sql = "SELECT name FROM brands";
       $result = mysqli_query($conn, $sql);
       while ($res = mysqli_fetch_array($result)) {
             array_push($brandsNameDB, $res['name']);
        }
        for($i=0;$i<count($tovarBrandsCSV_u);$i++){
            if(!in_array($tovarBrandsCSV_u[$i], $brandsNameDB)){
               $sql = "INSERT INTO brands (name) VALUES ('$tovarBrandsCSV_u[$i]')";
               $result = mysqli_query($conn, $sql);
          }
        }



//for($i=0;$i<count($tovarIdShop);$i++){
//            if(in_array($tovarIdShop[$i], $tovarIdShopDB)){
//                if(file_get_contents($tovarImgCSV[$i])){
                    
//                    $sql = "UPDATE tovar SET price='$tovarPriceCSV[$i]', img='$tovarImgCSV[$i]' WHERE id_for_shop='$tovarIdShop[$i]'";
//                    $result = mysqli_query($conn, $sql);
//             }
//                
                
//            }else if(!in_array($tovarIdShop[$i], $tovarIdShopDB)){
//                
//               if(file_get_contents($tovarImgCSV[$i])){
//                   
//                $sql = "INSERT INTO tovar (id_shop, name, description, url, img, price, id_brands, id_for_shop) VALUES 
//                                         ((SELECT id FROM shops WHERE name='$tovarShopCSV[$i]'), '$tovarNameCSV[$i]', '$tovarDescCSV[$i]', '$tovarUrlCSV[$i]', '$tovarImgCSV[$i]', '$tovarPriceCSV[$i]', (SELECT id FROM brands WHERE name='$tovarBrandsCSV[$i]'), '$tovarIdShop[$i]')";
//                $result = mysqli_query($conn, $sql);
//                } 
//         }
        
//}

$tagsName = array_combine($tovarIdShop, $tovarTagsCSV);
foreach ($tagsName as $key => $value) {
    $middleTags = explode("/", $value);
    for($i=0;$i<count($middleTags);$i++){
       $sql = "INSERT INTO tags (id_tovar, name) VALUES ('$key', '$middleTags[$i]')";
       $result = mysqli_query($conn, $sql);
    }
}

for($i=0;$i<count($tovarIdShopDB);$i++){
           if(!in_array($tovarIdShopDB[$i], $tovarIdShop)){
               $sql = "DELETE FROM tags WHERE id_tovar='$tovarIdShop[$i]'";
               $result = mysqli_query($conn, $sql);
               $sql = "DELETE FROM tovar WHERE id_for_shop='$tovarIdShop[$i]'";
               $result = mysqli_query($conn, $sql);
        }
    
        }
echo "DONE!!!!!!!";
?>