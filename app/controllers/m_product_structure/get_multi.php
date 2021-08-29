<?php
$product_id = $_GET['product_id'];
$_data = select_m_product_structure(array(
    'select' => 'parts_id, parts_count',
    'where' => 'delete_flag=0 and product_id='.$product_id,
    'order_by' => 'product_id DESC',
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