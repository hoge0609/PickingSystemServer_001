<?php

model('m_user.php');

db_transaction();

// insert
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
    $m_user = select_m_user(array(
        'limit' => 10,
    ));

    test_equals('count_m_user', count($m_user), 3);

    for ($i = 1; $i <= 3; $i++) {
        $inserted_data = array_shift($m_user);
        $test_data     = array(
            $i => $inserted_data,
        );
        test_array_subset('insert_m_user ' . $i, $test_data, $insert_m_user[$i]);
    }
}

// update
{
    // data
    $update_m_user = array(
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

    // update
    $warnings = validate_m_user(normalize_m_user($update_m_user[3]));
    if (empty($warnings)) {
        update_m_user(array(
            'set'   => $update_m_user[3],
            'where' => 'user_id = 3',
        ));
    } else {
        debug($warnings);
    }

    // test
    $m_user = select_m_user(array(
        'limit' => 10,
    ));

    $updated_data = array_pop($m_user);
    $test_data    = array(
        3 => $updated_data,
    );
    test_array_subset('update_m_user', $test_data, $update_m_user[3]);
}

// delete
{
    // delete
    delete_m_user(array(
        'where' => 'user_id = 3',
    ));

    // test
    $m_user = select_m_user(array(
        'limit' => 10,
    ));

    test_equals('delete_m_user', count($m_user), 2);
}

db_rollback();
