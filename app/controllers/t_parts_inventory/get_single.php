<?php
$parts_id = $_GET['parts_id'];
$_data = select_t_parts_inventory(array(
    'select' => 'parts_inventory_count',
    'where' => 'delete_flag=0 and parts_id='.$parts_id,
    'limit' => '1'
));

header("Content-type: application/json; charset=UTF-8");
$data = json_encode($_data);
if(json_last_error() == JSON_ERROR_NONE){
    $data = json_encode($_data, JSON_UNESCAPED_UNICODE);
    // JSONでデータ出力
    echo $data;
}
else{
    http_response_code(500);
}
exit;