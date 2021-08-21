<?php

model();

db_transaction();

// index
{
    // data
    $insert_m_inventory_regist_type = array(
        1 => array(
            'inventory_regist_type_id'   => 1,
            'inventory_regist_type_name' => 'TEST1',
            'delete_flag'                => 1,
            'created_by'                 => 1,
            'create_at'                  => null,
            'updated_by'                 => 1,
            'updated_at'                 => null,
        ),
        2 => array(
            'inventory_regist_type_id'   => 2,
            'inventory_regist_type_name' => 'TEST2',
            'delete_flag'                => 2,
            'created_by'                 => 2,
            'create_at'                  => null,
            'updated_by'                 => 2,
            'updated_at'                 => null,
        ),
        3 => array(
            'inventory_regist_type_id'   => 3,
            'inventory_regist_type_name' => 'TEST3',
            'delete_flag'                => 3,
            'created_by'                 => 3,
            'create_at'                  => null,
            'updated_by'                 => 3,
            'updated_at'                 => null,
        ),
    );

    // insert
    foreach ($insert_m_inventory_regist_type as $insert_data) {
        $warnings = validate_m_inventory_regist_type(normalize_m_inventory_regist_type($insert_data));
        if (empty($warnings)) {
            insert_m_inventory_regist_type(array(
                'values' => $insert_data,
            ));
        } else {
            debug($warnings);
        }
    }

    // test
    $_params = array('m_inventory_regist_type', 'index');
    controller('m_inventory_regist_type/index.php');
    $html = view('m_inventory_regist_type/index.php', true);

    test_contains('m_inventory_regist_type/index 1', $html, '<td>' . $insert_m_inventory_regist_type[1]['id'] . '</td>');
    test_contains('m_inventory_regist_type/index 2', $html, '<td>' . $insert_m_inventory_regist_type[2]['id'] . '</td>');
    test_contains('m_inventory_regist_type/index 3', $html, '<td>' . $insert_m_inventory_regist_type[3]['id'] . '</td>');
}

// post
{
    // test
    $_params = array('m_inventory_regist_type', 'post');
    $_GET['id'] = 3;
    controller('m_inventory_regist_type/post.php');
    $html = view('m_inventory_regist_type/post.php', true);

    test_contains('m_inventory_regist_type/post', $html, 'value="' . $insert_m_inventory_regist_type[3]['id'] . '"');
}

db_rollback();
