<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warnings = validate_m_product_structure(normalize_m_product_structure(array(
        'product_id'  => $_POST['product_id'],
        'parts_id'    => $_POST['parts_id'],
        'parts_count' => $_POST['parts_count'],
        'delete_flag' => $_POST['delete_flag'],
        'created_by'  => $_POST['created_by'],
        'create_at'   => $_POST['create_at'],
        'updated_by'  => $_POST['updated_by'],
        'updated_at'  => $_POST['updated_at'],
    )));
    if (!empty($warnings)) {
        warning($warnings);
    }
    if (isset($_GET['id'])) {
    } else {
        $resource = insert_m_product_structure(array(
            'values' => array(
                'product_id'  => $_POST['product_id'],
                'parts_id'    => $_POST['parts_id'],
                'parts_count' => $_POST['parts_count'],
                'delete_flag' => $_POST['delete_flag'],
                'created_by'  => $_POST['created_by'],
                'create_at'   => $_POST['create_at'],
                'updated_by'  => $_POST['updated_by'],
                'updated_at'  => $_POST['updated_at'],
            ),
        ));
        if (!$resource) {
            error('Insert error.');
        }
    }

    redirect('/m_product_structure/index');
} else {
    if (isset($_GET['id'])) {
    } else {
        $_view['data'] = default_m_product_structure();
    }
}
