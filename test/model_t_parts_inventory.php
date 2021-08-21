<?php

model('t_parts_inventory.php');

db_transaction();

// insert
{
    // data
    $insert_t_parts_inventory = array(
        1 => array(
            'parts_id'              => 1,
            'parts_inventory_count' => 1,
            'delete_flag'           => 1,
            'created_by'            => 1,
            'create_at'             => null,
            'updated_by'            => 1,
            'updated_at'            => null,
        ),
        2 => array(
            'parts_id'              => 2,
            'parts_inventory_count' => 2,
            'delete_flag'           => 2,
            'created_by'            => 2,
            'create_at'             => null,
            'updated_by'            => 2,
            'updated_at'            => null,
        ),
        3 => array(
            'parts_id'              => 3,
            'parts_inventory_count' => 3,
            'delete_flag'           => 3,
            'created_by'            => 3,
            'create_at'             => null,
            'updated_by'            => 3,
            'updated_at'            => null,
        ),
    );

    // insert
    foreach ($insert_t_parts_inventory as $insert_data) {
        $warnings = validate_t_parts_inventory(normalize_t_parts_inventory($insert_data));
        if (empty($warnings)) {
            insert_t_parts_inventory(array(
                'values' => $insert_data,
            ));
        } else {
            debug($warnings);
        }
    }

    // test
    $t_parts_inventory = select_t_parts_inventory(array(
        'limit' => 10,
    ));

    test_equals('count_t_parts_inventory', count($t_parts_inventory), 3);

    for ($i = 1; $i <= 3; $i++) {
        $inserted_data = array_shift($t_parts_inventory);
        $test_data     = array(
            $i => $inserted_data,
        );
        test_array_subset('insert_t_parts_inventory ' . $i, $test_data, $insert_t_parts_inventory[$i]);
    }
}

// update
{
    // data
    $update_t_parts_inventory = array(
        3 => array(
            'parts_id'              => 3,
            'parts_inventory_count' => 3,
            'delete_flag'           => 3,
            'created_by'            => 3,
            'create_at'             => null,
            'updated_by'            => 3,
            'updated_at'            => null,
        ),
    );

    // update
    $warnings = validate_t_parts_inventory(normalize_t_parts_inventory($update_t_parts_inventory[3]));
    if (empty($warnings)) {
        update_t_parts_inventory(array(
            'set'   => $update_t_parts_inventory[3],
            'where' => 'parts_id = 3',
        ));
    } else {
        debug($warnings);
    }

    // test
    $t_parts_inventory = select_t_parts_inventory(array(
        'limit' => 10,
    ));

    $updated_data = array_pop($t_parts_inventory);
    $test_data    = array(
        3 => $updated_data,
    );
    test_array_subset('update_t_parts_inventory', $test_data, $update_t_parts_inventory[3]);
}

// delete
{
    // delete
    delete_t_parts_inventory(array(
        'where' => 'parts_id = 3',
    ));

    // test
    $t_parts_inventory = select_t_parts_inventory(array(
        'limit' => 10,
    ));

    test_equals('delete_t_parts_inventory', count($t_parts_inventory), 2);
}

db_rollback();
