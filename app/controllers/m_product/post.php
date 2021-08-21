<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warnings = validate_m_product(normalize_m_product(array(
        'product_id'   => $_POST['product_id'],
        'product_name' => $_POST['product_name'],
        'delete_flag'  => $_POST['delete_flag'],
        'created_by'   => $_POST['created_by'],
        'create_at'    => $_POST['create_at'],
        'updated_by'   => $_POST['updated_by'],
        'updated_at'   => $_POST['updated_at'],
    )));
    if (!empty($warnings)) {
        warning($warnings);
    }
    if (isset($_GET['id'])) {
    } else {
        $resource = insert_m_product(array(
            'values' => array(
                'product_id'   => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'delete_flag'  => $_POST['delete_flag'],
                'created_by'   => $_POST['created_by'],
                'create_at'    => $_POST['create_at'],
                'updated_by'   => $_POST['updated_by'],
                'updated_at'   => $_POST['updated_at'],
            ),
        ));
        if (!$resource) {
            error('Insert error.');
        }
    }

    redirect('/m_product/index');
} else {
    if (isset($_GET['id'])) {
    } else {
        $_view['data'] = default_m_product();
    }
}
