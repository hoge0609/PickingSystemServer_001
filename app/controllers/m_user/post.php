<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warnings = validate_m_user(normalize_m_user(array(
        'user_id'            => $_POST['user_id'],
        'user_name'          => $_POST['user_name'],
        'login_id'           => $_POST['login_id'],
        'login_password'     => $_POST['login_password'],
        'administrator_flag' => $_POST['administrator_flag'],
        'delete_flag'        => $_POST['delete_flag'],
        'created_by'         => $_POST['created_by'],
        'create_at'          => $_POST['create_at'],
        'updated_by'         => $_POST['updated_by'],
        'updated_at'         => $_POST['updated_at'],
    )));
    if (!empty($warnings)) {
        warning($warnings);
    }
    if (isset($_GET['id'])) {
    } else {
        $resource = insert_m_user(array(
            'values' => array(
                'user_id'            => $_POST['user_id'],
                'user_name'          => $_POST['user_name'],
                'login_id'           => $_POST['login_id'],
                'login_password'     => $_POST['login_password'],
                'administrator_flag' => $_POST['administrator_flag'],
                'delete_flag'        => $_POST['delete_flag'],
                'created_by'         => $_POST['created_by'],
                'create_at'          => $_POST['create_at'],
                'updated_by'         => $_POST['updated_by'],
                'updated_at'         => $_POST['updated_at'],
            ),
        ));
        if (!$resource) {
            error('Insert error.');
        }
    }

    redirect('/m_user/index');
} else {
    if (isset($_GET['id'])) {
    } else {
        $_view['data'] = default_m_user();
    }
}
