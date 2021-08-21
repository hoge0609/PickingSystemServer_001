<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warnings = validate_m_device(normalize_m_device(array(
        'device_id'   => $_POST['device_id'],
        'device_name' => $_POST['device_name'],
        'user_id'     => $_POST['user_id'],
        'mac_address' => $_POST['mac_address'],
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
        $resource = insert_m_device(array(
            'values' => array(
                'device_id'   => $_POST['device_id'],
                'device_name' => $_POST['device_name'],
                'user_id'     => $_POST['user_id'],
                'mac_address' => $_POST['mac_address'],
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

    redirect('/m_device/index');
} else {
    if (isset($_GET['id'])) {
    } else {
        $_view['data'] = default_m_device();
    }
}
