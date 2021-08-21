<?php

model('t_parts_inventory_history.php');

db_transaction();

// insert
{
    // data
    $insert_t_parts_inventory_history = array(
        1 => array(
            'parts_inventory_history_id' => 1,
            'parts_id'                   => 1,
            'product_id'                 => null,
            'device_id'                  => null,
            'inventory_regist_type_id'   => 1,
            'variable_count'             => 1,
            'delete_flag'                => 1,
            'created_by'                 => 1,
            'create_at'                  => null,
            'updated_by'                 => 1,
            'updated_at'                 => null,
        ),
        2 => array(
            'parts_inventory_history_id' => 2,
            'parts_id'                   => 2,
            'product_id'                 => null,
            'device_id'                  => null,
            'inventory_regist_type_id'   => 2,
            'variable_count'             => 2,
            'delete_flag'                => 2,
            'created_by'                 => 2,
            'create_at'                  => null,
            'updated_by'                 => 2,
            'updated_at'                 => null,
        ),
        3 => array(
            'parts_inventory_history_id' => 3,
            'parts_id'                   => 3,
            'product_id'                 => null,
            'device_id'                  => null,
            'inventory_regist_type_id'   => 3,
            'variable_count'             => 3,
            'delete_flag'                => 3,
            'created_by'                 => 3,
            'create_at'                  => null,
            'updated_by'                 => 3,
            'updated_at'                 => null,
        ),
    );

    // insert
    foreach ($insert_t_parts_inventory_history as $insert_data) {
        $warnings = validate_t_parts_inventory_history(normalize_t_parts_inventory_history($insert_data));
        if (empty($warnings)) {
            insert_t_parts_inventory_history(array(
                'values' => $insert_data,
            ));
        } else {
            debug($warnings);
        }
    }

    // test
    $t_parts_inventory_history = select_t_parts_inventory_history(array(
        'limit' => 10,
    ));

    test_equals('count_t_parts_inventory_history', count($t_parts_inventory_history), 3);

    for ($i = 1; $i <= 3; $i++) {
        $inserted_data = array_shift($t_parts_inventory_history);
        $test_data     = array(
            $i => $inserted_data,
        );
        test_array_subset('insert_t_parts_inventory_history ' . $i, $test_data, $insert_t_parts_inventory_history[$i]);
    }
}

// update
{
    // data
    $update_t_parts_inventory_history = array(
        3 => array(
            'parts_inventory_history_id' => 3,
            'parts_id'                   => 3,
            'product_id'                 => null,
            'device_id'                  => null,
            'inventory_regist_type_id'   => 3,
            'variable_count'             => 3,
            'delete_flag'                => 3,
            'created_by'                 => 3,
            'create_at'                  => null,
            'updated_by'                 => 3,
            'updated_at'                 => null,
        ),
    );

    // update
    $warnings = validate_t_parts_inventory_history(normalize_t_parts_inventory_history($update_t_parts_inventory_history[3]));
    if (empty($warnings)) {
        update_t_parts_inventory_history(array(
            'set'   => $update_t_parts_inventory_history[3],
            'where' => 'parts_inventory_history_id = 3',
        ));
    } else {
        debug($warnings);
    }

    // test
    $t_parts_inventory_history = select_t_parts_inventory_history(array(
        'limit' => 10,
    ));

    $updated_data = array_pop($t_parts_inventory_history);
    $test_data    = array(
        3 => $updated_data,
    );
    test_array_subset('update_t_parts_inventory_history', $test_data, $update_t_parts_inventory_history[3]);
}

// delete
{
    // delete
    delete_t_parts_inventory_history(array(
        'where' => 'parts_inventory_history_id = 3',
    ));

    // test
    $t_parts_inventory_history = select_t_parts_inventory_history(array(
        'limit' => 10,
    ));

    test_equals('delete_t_parts_inventory_history', count($t_parts_inventory_history), 2);
}

db_rollback();
