<?php

model('m_device.php');

db_transaction();

// insert
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
    $m_device = select_m_device(array(
        'limit' => 10,
    ));

    test_equals('count_m_device', count($m_device), 3);

    for ($i = 1; $i <= 3; $i++) {
        $inserted_data = array_shift($m_device);
        $test_data     = array(
            $i => $inserted_data,
        );
        test_array_subset('insert_m_device ' . $i, $test_data, $insert_m_device[$i]);
    }
}

// update
{
    // data
    $update_m_device = array(
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

    // update
    $warnings = validate_m_device(normalize_m_device($update_m_device[3]));
    if (empty($warnings)) {
        update_m_device(array(
            'set'   => $update_m_device[3],
            'where' => 'device_id = 3',
        ));
    } else {
        debug($warnings);
    }

    // test
    $m_device = select_m_device(array(
        'limit' => 10,
    ));

    $updated_data = array_pop($m_device);
    $test_data    = array(
        3 => $updated_data,
    );
    test_array_subset('update_m_device', $test_data, $update_m_device[3]);
}

// delete
{
    // delete
    delete_m_device(array(
        'where' => 'device_id = 3',
    ));

    // test
    $m_device = select_m_device(array(
        'limit' => 10,
    ));

    test_equals('delete_m_device', count($m_device), 2);
}

db_rollback();
