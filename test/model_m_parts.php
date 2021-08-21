<?php

model('m_parts.php');

db_transaction();

// insert
{
    // data
    $insert_m_parts = array(
        1 => array(
            'parts_id'    => 1,
            'parts_name'  => 'TEST1',
            'delete_flag' => 1,
            'created_by'  => 1,
            'create_at'   => null,
            'updated_by'  => 1,
            'updated_at'  => null,
        ),
        2 => array(
            'parts_id'    => 2,
            'parts_name'  => 'TEST2',
            'delete_flag' => 2,
            'created_by'  => 2,
            'create_at'   => null,
            'updated_by'  => 2,
            'updated_at'  => null,
        ),
        3 => array(
            'parts_id'    => 3,
            'parts_name'  => 'TEST3',
            'delete_flag' => 3,
            'created_by'  => 3,
            'create_at'   => null,
            'updated_by'  => 3,
            'updated_at'  => null,
        ),
    );

    // insert
    foreach ($insert_m_parts as $insert_data) {
        $warnings = validate_m_parts(normalize_m_parts($insert_data));
        if (empty($warnings)) {
            insert_m_parts(array(
                'values' => $insert_data,
            ));
        } else {
            debug($warnings);
        }
    }

    // test
    $m_parts = select_m_parts(array(
        'limit' => 10,
    ));

    test_equals('count_m_parts', count($m_parts), 3);

    for ($i = 1; $i <= 3; $i++) {
        $inserted_data = array_shift($m_parts);
        $test_data     = array(
            $i => $inserted_data,
        );
        test_array_subset('insert_m_parts ' . $i, $test_data, $insert_m_parts[$i]);
    }
}

// update
{
    // data
    $update_m_parts = array(
        3 => array(
            'parts_id'    => 3,
            'parts_name'  => 'TEST3',
            'delete_flag' => 3,
            'created_by'  => 3,
            'create_at'   => null,
            'updated_by'  => 3,
            'updated_at'  => null,
        ),
    );

    // update
    $warnings = validate_m_parts(normalize_m_parts($update_m_parts[3]));
    if (empty($warnings)) {
        update_m_parts(array(
            'set'   => $update_m_parts[3],
            'where' => 'parts_id = 3',
        ));
    } else {
        debug($warnings);
    }

    // test
    $m_parts = select_m_parts(array(
        'limit' => 10,
    ));

    $updated_data = array_pop($m_parts);
    $test_data    = array(
        3 => $updated_data,
    );
    test_array_subset('update_m_parts', $test_data, $update_m_parts[3]);
}

// delete
{
    // delete
    delete_m_parts(array(
        'where' => 'parts_id = 3',
    ));

    // test
    $m_parts = select_m_parts(array(
        'limit' => 10,
    ));

    test_equals('delete_m_parts', count($m_parts), 2);
}

db_rollback();
