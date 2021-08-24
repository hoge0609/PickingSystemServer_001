<?php
$_data = select_t_parts_inventory(array(
    'select' => 'parts_id, parts_inventory_count',
    'where' => 'delete_flag=0',
    'order_by' => 'parts_id DESC',
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