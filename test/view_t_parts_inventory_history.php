<?php

// index
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

    // assign
    $_view['t_parts_inventory_history'] = $insert_t_parts_inventory_history;

    // test
    $html = view('t_parts_inventory_history/index.php', true);

    test_contains('t_parts_inventory_history/index 1', $html, '<td>' . $insert_t_parts_inventory_history[1]['id'] . '</td>');
    test_contains('t_parts_inventory_history/index 2', $html, '<td>' . $insert_t_parts_inventory_history[2]['id'] . '</td>');
    test_contains('t_parts_inventory_history/index 3', $html, '<td>' . $insert_t_parts_inventory_history[3]['id'] . '</td>');
}

// post
{
    // test
    $_view['data'] = $insert_t_parts_inventory_history[1];

    $html = view('t_parts_inventory_history/post.php', true);

    test_contains('t_parts_inventory_history/post', $html, 'value="' . $insert_t_parts_inventory_history[1]['id'] . '"');
}
