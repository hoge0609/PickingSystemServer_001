<?php

model('m_product_structure.php');

db_transaction();

// insert
{
    // data
    $insert_m_product_structure = array(
        1 => array(
            'product_id'  => 1,
            'parts_id'    => 1,
            'parts_count' => 1,
            'delete_flag' => 1,
            'created_by'  => 1,
            'create_at'   => null,
            'updated_by'  => 1,
            'updated_at'  => null,
        ),
        2 => array(
            'product_id'  => 2,
            'parts_id'    => 2,
            'parts_count' => 2,
            'delete_flag' => 2,
            'created_by'  => 2,
            'create_at'   => null,
            'updated_by'  => 2,
            'updated_at'  => null,
        ),
        3 => array(
            'product_id'  => 3,
            'parts_id'    => 3,
            'parts_count' => 3,
            'delete_flag' => 3,
            'created_by'  => 3,
            'create_at'   => null,
            'updated_by'  => 3,
            'updated_at'  => null,
        ),
    );

    // insert
    foreach ($insert_m_product_structure as $insert_data) {
        $warnings = validate_m_product_structure(normalize_m_product_structure($insert_data));
        if (empty($warnings)) {
            insert_m_product_structure(array(
                'values' => $insert_data,
            ));
        } else {
            debug($warnings);
        }
    }

    // test
    $m_product_structure = select_m_product_structure(array(
        'limit' => 10,
    ));

    test_equals('count_m_product_structure', count($m_product_structure), 3);

    for ($i = 1; $i <= 3; $i++) {
        $inserted_data = array_shift($m_product_structure);
        $test_data     = array(
            $i => $inserted_data,
        );
        test_array_subset('insert_m_product_structure ' . $i, $test_data, $insert_m_product_structure[$i]);
    }
}

// update
{
    // data
    $update_m_product_structure = array(
        3 => array(
            'product_id'  => 3,
            'parts_id'    => 3,
            'parts_count' => 3,
            'delete_flag' => 3,
            'created_by'  => 3,
            'create_at'   => null,
            'updated_by'  => 3,
            'updated_at'  => null,
        ),
    );

    // update
    $warnings = validate_m_product_structure(normalize_m_product_structure($update_m_product_structure[3]));
    if (empty($warnings)) {
        update_m_product_structure(array(
            'set'   => $update_m_product_structure[3],
            'where' => 'product_id = 3',
        ));
    } else {
        debug($warnings);
    }

    // test
    $m_product_structure = select_m_product_structure(array(
        'limit' => 10,
    ));

    $updated_data = array_pop($m_product_structure);
    $test_data    = array(
        3 => $updated_data,
    );
    test_array_subset('update_m_product_structure', $test_data, $update_m_product_structure[3]);
}

// delete
{
    // delete
    delete_m_product_structure(array(
        'where' => 'product_id = 3',
    ));

    // test
    $m_product_structure = select_m_product_structure(array(
        'limit' => 10,
    ));

    test_equals('delete_m_product_structure', count($m_product_structure), 2);
}

db_rollback();
