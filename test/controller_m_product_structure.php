<?php

model();

db_transaction();

// index
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
    $_params = array('m_product_structure', 'index');
    controller('m_product_structure/index.php');
    $html = view('m_product_structure/index.php', true);

    test_contains('m_product_structure/index 1', $html, '<td>' . $insert_m_product_structure[1]['id'] . '</td>');
    test_contains('m_product_structure/index 2', $html, '<td>' . $insert_m_product_structure[2]['id'] . '</td>');
    test_contains('m_product_structure/index 3', $html, '<td>' . $insert_m_product_structure[3]['id'] . '</td>');
}

// post
{
    // test
    $_params = array('m_product_structure', 'post');
    $_GET['id'] = 3;
    controller('m_product_structure/post.php');
    $html = view('m_product_structure/post.php', true);

    test_contains('m_product_structure/post', $html, 'value="' . $insert_m_product_structure[3]['id'] . '"');
}

db_rollback();
