<?php
function write_data_to_csv(){
 $restaurants = [];
 $response = ;
 if(isset($response["result"]["error"])){
   return print("エラーが発生しました");
 }
 if(isset($response["result"]["shop"])){
   foreach($response["result"]["shop"] as &$i){
     $restaurant_name = $i["name"];
     $restaurants[] = $restaurant_name;
   }
 }
 return print_r($restaurants);
}
write_data_to_csv();
?>
