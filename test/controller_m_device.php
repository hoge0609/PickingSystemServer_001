<?php

model();

db_transaction();

// index
{
    // data
    $insert_m_device = array(
        1 => array(
            'device_id'   => 1,
            'device_name' => 'TEST1',
            'user_id'     => 1,
            'mac_address' => 'TEST1',
            'delete_flag' => 1,
            'created_by'  => 1,
            'create_at'   => null,
            'updated_by'  => 1,
            'updated_at'  => null,
        ),
        2 => array(
            'device_id'   => 2,
            'device_name' => 'TEST2',
            'user_id'     => 2,
            'mac_address' => 'TEST2',
            'delete_flag' => 2,
            'created_by'  => 2,
            'create_at'   => null,
            'updated_by'  => 2,
            'updated_at'  => null,
        ),
        3 => array(
            'device_id'   => 3,
            'device_name' => 'TEST3',
            'user_id'     => 3,
            'mac_address' => 'TEST3',
            'delete_flag' => 3,
            'created_by'  => 3,
            'create_at'   => null,
            'updated_by'  => 3,
            'updated_at'  => null,
        ),
    );

    // insert
    foreach ($insert_m_device as $insert_data) {
        $warnings = validate_m_device(normalize_m_device($insert_data));
        if (empty($warnings)) {
            insert_m_device(array(
                'values' => $insert_data,
            ));
        } else {
            debug($warnings);
        }
    }

    // test
    $_params = array('m_device', 'index');
    controller('m_device/index.php');
    $html = view('m_device/index.php', true);

    test_contains('m_device/index 1', $html, '<td>' . $insert_m_device[1]['id'] . '</td>');
    test_contains('m_device/index 2', $html, '<td>' . $insert_m_device[2]['id'] . '</td>');
    test_contains('m_device/index 3', $html, '<td>' . $insert_m_device[3]['id'] . '</td>');
}

// post
{
    // test
    $_params = array('m_device', 'post');
    $_GET['id'] = 3;
    controller('m_device/post.php');
    $html = view('m_device/post.php', true);

    test_contains('m_device/post', $html, 'value="' . $insert_m_device[3]['id'] . '"');
}

db_rollback();
