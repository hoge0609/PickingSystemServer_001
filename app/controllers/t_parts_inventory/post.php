<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warnings = validate_t_parts_inventory(normalize_t_parts_inventory(array(
        'parts_id'              => $_POST['parts_id'],
        'parts_inventory_count' => $_POST['parts_inventory_count'],
        'delete_flag'           => $_POST['delete_flag'],
        'created_by'            => $_POST['created_by'],
        'create_at'             => $_POST['create_at'],
        'updated_by'            => $_POST['updated_by'],
        'updated_at'            => $_POST['updated_at'],
    )));
    if (!empty($warnings)) {
        warning($warnings);
    }
    if (isset($_GET['id'])) {
    } else {
        $resource = insert_t_parts_inventory(array(
            'values' => array(
                'parts_id'              => $_POST['parts_id'],
                'parts_inventory_count' => $_POST['parts_inventory_count'],
                'delete_flag'           => $_POST['delete_flag'],
                'created_by'            => $_POST['created_by'],
                'create_at'             => $_POST['create_at'],
                'updated_by'            => $_POST['updated_by'],
                'updated_at'            => $_POST['updated_at'],
            ),
        ));
        if (!$resource) {
            error('Insert error.');
        }
    }

    redirect('/t_parts_inventory/index');
} else {
    if (isset($_GET['id'])) {
    } else {
        $_view['data'] = default_t_parts_inventory();
    }
}
