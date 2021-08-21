<?php

model();

db_transaction();

// index
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
    $_params = array('t_parts_inventory', 'index');
    controller('t_parts_inventory/index.php');
    $html = view('t_parts_inventory/index.php', true);

    test_contains('t_parts_inventory/index 1', $html, '<td>' . $insert_t_parts_inventory[1]['id'] . '</td>');
    test_contains('t_parts_inventory/index 2', $html, '<td>' . $insert_t_parts_inventory[2]['id'] . '</td>');
    test_contains('t_parts_inventory/index 3', $html, '<td>' . $insert_t_parts_inventory[3]['id'] . '</td>');
}

// post
{
    // test
    $_params = array('t_parts_inventory', 'post');
    $_GET['id'] = 3;
    controller('t_parts_inventory/post.php');
    $html = view('t_parts_inventory/post.php', true);

    test_contains('t_parts_inventory/post', $html, 'value="' . $insert_t_parts_inventory[3]['id'] . '"');
}

db_rollback();
