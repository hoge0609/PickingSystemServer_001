<?php

model();

db_transaction();

// index
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
    $_params = array('m_product', 'index');
    controller('m_product/index.php');
    $html = view('m_product/index.php', true);

    test_contains('m_product/index 1', $html, '<td>' . $insert_m_product[1]['id'] . '</td>');
    test_contains('m_product/index 2', $html, '<td>' . $insert_m_product[2]['id'] . '</td>');
    test_contains('m_product/index 3', $html, '<td>' . $insert_m_product[3]['id'] . '</td>');
}

// post
{
    // test
    $_params = array('m_product', 'post');
    $_GET['id'] = 3;
    controller('m_product/post.php');
    $html = view('m_product/post.php', true);

    test_contains('m_product/post', $html, 'value="' . $insert_m_product[3]['id'] . '"');
}

db_rollback();
