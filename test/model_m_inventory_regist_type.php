<?php

model('m_inventory_regist_type.php');

db_transaction();

// insert
{
    // data
    $insert_m_inventory_regist_type = array(
        1 => array(
            'inventory_regist_type_id'   => 1,
            'inventory_regist_type_name' => 'TEST1',
            'delete_flag'                => 1,
            'created_by'                 => 1,
            'create_at'                  => null,
            'updated_by'                 => 1,
            'updated_at'                 => null,
        ),
        2 => array(
            'inventory_regist_type_id'   => 2,
            'inventory_regist_type_name' => 'TEST2',
            'delete_flag'                => 2,
            'created_by'                 => 2,
            'create_at'                  => null,
            'updated_by'                 => 2,
            'updated_at'                 => null,
        ),
        3 => array(
            'inventory_regist_type_id'   => 3,
            'inventory_regist_type_name' => 'TEST3',
            'delete_flag'                => 3,
            'created_by'                 => 3,
            'create_at'                  => null,
            'updated_by'                 => 3,
            'updated_at'                 => null,
        ),
    );

    // insert
    foreach ($insert_m_inventory_regist_type as $insert_data) {
        $warnings = validate_m_inventory_regist_type(normalize_m_inventory_regist_type($insert_data));
        if (empty($warnings)) {
            insert_m_inventory_regist_type(array(
                'values' => $insert_data,
            ));
        } else {
            debug($warnings);
        }
    }

    // test
    $m_inventory_regist_type = select_m_inventory_regist_type(array(
        'limit' => 10,
    ));

    test_equals('count_m_inventory_regist_type', count($m_inventory_regist_type), 3);

    for ($i = 1; $i <= 3; $i++) {
        $inserted_data = array_shift($m_inventory_regist_type);
        $test_data     = array(
            $i => $inserted_data,
        );
        test_array_subset('insert_m_inventory_regist_type ' . $i, $test_data, $insert_m_inventory_regist_type[$i]);
    }
}

// update
{
    // data
    $update_m_inventory_regist_type = array(
        3 => array(
            'inventory_regist_type_id'   => 3,
            'inventory_regist_type_name' => 'TEST3',
            'delete_flag'                => 3,
            'created_by'                 => 3,
            'create_at'                  => null,
            'updated_by'                 => 3,
            'updated_at'                 => null,
        ),
    );

    // update
    $warnings = validate_m_inventory_regist_type(normalize_m_inventory_regist_type($update_m_inventory_regist_type[3]));
    if (empty($warnings)) {
        update_m_inventory_regist_type(array(
            'set'   => $update_m_inventory_regist_type[3],
            'where' => 'inventory_regist_type_id = 3',
        ));
    } else {
        debug($warnings);
    }

    // test
    $m_inventory_regist_type = select_m_inventory_regist_type(array(
        'limit' => 10,
    ));

    $updated_data = array_pop($m_inventory_regist_type);
    $test_data    = array(
        3 => $updated_data,
    );
    test_array_subset('update_m_inventory_regist_type', $test_data, $update_m_inventory_regist_type[3]);
}

// delete
{
    // delete
    delete_m_inventory_regist_type(array(
        'where' => 'inventory_regist_type_id = 3',
    ));

    // test
    $m_inventory_regist_type = select_m_inventory_regist_type(array(
        'limit' => 10,
    ));

    test_equals('delete_m_inventory_regist_type', count($m_inventory_regist_type), 2);
}

db_rollback();
