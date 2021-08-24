<?php
$_data = select_t_parts_inventory_history(array(
    'select' => 'parts_inventory_history_id, parts_id, product_id, device_id, inventory_regist_type_id, variable_count, created_by, create_at',
    'where' => 'delete_flag=0',
    'order_by' => 'parts_inventory_history_id DESC',
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