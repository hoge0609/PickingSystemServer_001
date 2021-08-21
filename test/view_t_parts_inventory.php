<?php

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

    // assign
    $_view['t_parts_inventory'] = $insert_t_parts_inventory;

    // test
    $html = view('t_parts_inventory/index.php', true);

    test_contains('t_parts_inventory/index 1', $html, '<td>' . $insert_t_parts_inventory[1]['id'] . '</td>');
    test_contains('t_parts_inventory/index 2', $html, '<td>' . $insert_t_parts_inventory[2]['id'] . '</td>');
    test_contains('t_parts_inventory/index 3', $html, '<td>' . $insert_t_parts_inventory[3]['id'] . '</td>');
}

// post
{
    // test
    $_view['data'] = $insert_t_parts_inventory[1];

    $html = view('t_parts_inventory/post.php', true);

    test_contains('t_parts_inventory/post', $html, 'value="' . $insert_t_parts_inventory[1]['id'] . '"');
}
