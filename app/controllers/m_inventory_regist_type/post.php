<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warnings = validate_m_inventory_regist_type(normalize_m_inventory_regist_type(array(
        'inventory_regist_type_id'   => $_POST['inventory_regist_type_id'],
        'inventory_regist_type_name' => $_POST['inventory_regist_type_name'],
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
        $resource = insert_m_inventory_regist_type(array(
            'values' => array(
                'inventory_regist_type_id'   => $_POST['inventory_regist_type_id'],
                'inventory_regist_type_name' => $_POST['inventory_regist_type_name'],
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

    redirect('/m_inventory_regist_type/index');
} else {
    if (isset($_GET['id'])) {
    } else {
        $_view['data'] = default_m_inventory_regist_type();
    }
}
