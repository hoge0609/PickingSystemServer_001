<?php

model();

db_transaction();

// index
{
    // data
    $insert_m_user = array(
        1 => array(
            'user_id'            => 1,
            'user_name'          => 'TEST1',
            'login_id'           => 'TEST1',
            'login_password'     => 'TEST1',
            'administrator_flag' => 1,
            'delete_flag'        => 1,
            'created_by'         => 1,
            'create_at'          => null,
            'updated_by'         => 1,
            'updated_at'         => null,
        ),
        2 => array(
            'user_id'            => 2,
            'user_name'          => 'TEST2',
            'login_id'           => 'TEST2',
            'login_password'     => 'TEST2',
            'administrator_flag' => 2,
            'delete_flag'        => 2,
            'created_by'         => 2,
            'create_at'          => null,
            'updated_by'         => 2,
            'updated_at'         => null,
        ),
        3 => array(
            'user_id'            => 3,
            'user_name'          => 'TEST3',
            'login_id'           => 'TEST3',
            'login_password'     => 'TEST3',
            'administrator_flag' => 3,
            'delete_flag'        => 3,
            'created_by'         => 3,
            'create_at'          => null,
            'updated_by'         => 3,
            'updated_at'         => null,
        ),
    );

    // insert
    foreach ($insert_m_user as $insert_data) {
        $warnings = validate_m_user(normalize_m_user($insert_data));
        if (empty($warnings)) {
            insert_m_user(array(
                'values' => $insert_data,
            ));
        } else {
            debug($warnings);
        }
    }

    // test
    $_params = array('m_user', 'index');
    controller('m_user/index.php');
    $html = view('m_user/index.php', true);

    test_contains('m_user/index 1', $html, '<td>' . $insert_m_user[1]['id'] . '</td>');
    test_contains('m_user/index 2', $html, '<td>' . $insert_m_user[2]['id'] . '</td>');
    test_contains('m_user/index 3', $html, '<td>' . $insert_m_user[3]['id'] . '</td>');
}

// post
{
    // test
    $_params = array('m_user', 'post');
    $_GET['id'] = 3;
    controller('m_user/post.php');
    $html = view('m_user/post.php', true);

    test_contains('m_user/post', $html, 'value="' . $insert_m_user[3]['id'] . '"');
}

db_rollback();
