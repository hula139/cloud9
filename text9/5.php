<?php
function write_data_to_csv(){
 $restaurants = [];
 $response = ;
 if(isset($response["result"]["error"])){
   return print("エラーが発生しました");
 }
 return print_r($restaurants);
}
write_data_to_csv();
?>
