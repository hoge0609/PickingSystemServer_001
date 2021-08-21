<?php

model('m_product.php');

db_transaction();

// insert
{
    // data
    $insert_m_product = array(
        1 => array(
            'product_id'   => 1,
            'product_name' => 'TEST1',
            'delete_flag'  => 1,
            'created_by'   => 1,
            'create_at'    => null,
            'updated_by'   => 1,
            'updated_at'   => null,
        ),
        2 => array(
            'product_id'   => 2,
            'product_name' => 'TEST2',
            'delete_flag'  => 2,
            'created_by'   => 2,
            'create_at'    => null,
            'updated_by'   => 2,
            'updated_at'   => null,
        ),
        3 => array(
            'product_id'   => 3,
            'product_name' => 'TEST3',
            'delete_flag'  => 3,
            'created_by'   => 3,
            'create_at'    => null,
            'updated_by'   => 3,
            'updated_at'   => null,
        ),
    );

    // insert
    foreach ($insert_m_product as $insert_data) {
        $warnings = validate_m_product(normalize_m_product($insert_data));
        if (empty($warnings)) {
            insert_m_product(array(
                'values' => $insert_data,
            ));
        } else {
            debug($warnings);
        }
    }

    // test
    $m_product = select_m_product(array(
        'limit' => 10,
    ));

    test_equals('count_m_product', count($m_product), 3);

    for ($i = 1; $i <= 3; $i++) {
        $inserted_data = array_shift($m_product);
        $test_data     = array(
            $i => $inserted_data,
        );
        test_array_subset('insert_m_product ' . $i, $test_data, $insert_m_product[$i]);
    }
}

// update
{
    // data
    $update_m_product = array(
        3 => array(
            'product_id'   => 3,
            'product_name' => 'TEST3',
            'delete_flag'  => 3,
            'created_by'   => 3,
            'create_at'    => null,
            'updated_by'   => 3,
            'updated_at'   => null,
        ),
    );

    // update
    $warnings = validate_m_product(normalize_m_product($update_m_product[3]));
    if (empty($warnings)) {
        update_m_product(array(
            'set'   => $update_m_product[3],
            'where' => 'product_id = 3',
        ));
    } else {
        debug($warnings);
    }

    // test
    $m_product = select_m_product(array(
        'limit' => 10,
    ));

    $updated_data = array_pop($m_product);
    $test_data    = array(
        3 => $updated_data,
    );
    test_array_subset('update_m_product', $test_data, $update_m_product[3]);
}

// delete
{
    // delete
    delete_m_product(array(
        'where' => 'product_id = 3',
    ));

    // test
    $m_product = select_m_product(array(
        'limit' => 10,
    ));

    test_equals('delete_m_product', count($m_product), 2);
}

db_rollback();
