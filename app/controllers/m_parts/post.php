<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warnings = validate_m_parts(normalize_m_parts(array(
        'parts_id'    => $_POST['parts_id'],
        'parts_name'  => $_POST['parts_name'],
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
        $resource = insert_m_parts(array(
            'values' => array(
                'parts_id'    => $_POST['parts_id'],
                'parts_name'  => $_POST['parts_name'],
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

    redirect('/m_parts/index');
} else {
    if (isset($_GET['id'])) {
    } else {
        $_view['data'] = default_m_parts();
    }
}
