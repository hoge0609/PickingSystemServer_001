<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warnings = validate_t_parts_inventory_history(normalize_t_parts_inventory_history(array(
        'parts_inventory_history_id' => $_POST['parts_inventory_history_id'],
        'parts_id'                   => $_POST['parts_id'],
        'product_id'                 => $_POST['product_id'],
        'device_id'                  => $_POST['device_id'],
        'inventory_regist_type_id'   => $_POST['inventory_regist_type_id'],
        'variable_count'             => $_POST['variable_count'],
        'delete_flag'                => $_POST['delete_flag'],
        'created_by'                 => $_POST['created_by'],
        'create_at'                  => $_POST['create_at'],
        'updated_by'                 => $_POST['updated_by'],
        'updated_at'                 => $_POST['updated_at'],
    )));
    if (!empty($warnings)) {
        warning($warnings);
    }
    if (isset($_GET['id'])) {
    } else {
        $resource = insert_t_parts_inventory_history(array(
            'values' => array(
                'parts_inventory_history_id' => $_POST['parts_inventory_history_id'],
                'parts_id'                   => $_POST['parts_id'],
                'product_id'                 => $_POST['product_id'],
                'device_id'                  => $_POST['device_id'],
                'inventory_regist_type_id'   => $_POST['inventory_regist_type_id'],
                'variable_count'             => $_POST['variable_count'],
                'delete_flag'                => $_POST['delete_flag'],
                'created_by'                 => $_POST['created_by'],
                'create_at'                  => $_POST['create_at'],
                'updated_by'                 => $_POST['updated_by'],
                'updated_at'                 => $_POST['updated_at'],
            ),
        ));
        if (!$resource) {
            error('Insert error.');
        }
    }

    redirect('/t_parts_inventory_history/index');
} else {
    if (isset($_GET['id'])) {
    } else {
        $_view['data'] = default_t_parts_inventory_history();
    }
}
