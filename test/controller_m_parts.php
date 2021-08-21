<?php

model();

db_transaction();

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
    $_params = array('m_parts', 'index');
    controller('m_parts/index.php');
    $html = view('m_parts/index.php', true);

    test_contains('m_parts/index 1', $html, '<td>' . $insert_m_parts[1]['id'] . '</td>');
    test_contains('m_parts/index 2', $html, '<td>' . $insert_m_parts[2]['id'] . '</td>');
    test_contains('m_parts/index 3', $html, '<td>' . $insert_m_parts[3]['id'] . '</td>');
}

// post
{
    // test
    $_params = array('m_parts', 'post');
    $_GET['id'] = 3;
    controller('m_parts/post.php');
    $html = view('m_parts/post.php', true);

    test_contains('m_parts/post', $html, 'value="' . $insert_m_parts[3]['id'] . '"');
}

db_rollback();
