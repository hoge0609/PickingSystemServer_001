<?php

// index
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

    // assign
    $_view['m_parts'] = $insert_m_parts;

    // test
    $html = view('m_parts/index.php', true);

    test_contains('m_parts/index 1', $html, '<td>' . $insert_m_parts[1]['id'] . '</td>');
    test_contains('m_parts/index 2', $html, '<td>' . $insert_m_parts[2]['id'] . '</td>');
    test_contains('m_parts/index 3', $html, '<td>' . $insert_m_parts[3]['id'] . '</td>');
}

// post
{
    // test
    $_view['data'] = $insert_m_parts[1];

    $html = view('m_parts/post.php', true);

    test_contains('m_parts/post', $html, 'value="' . $insert_m_parts[1]['id'] . '"');
}
