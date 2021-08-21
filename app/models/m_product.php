<?php

/**
 * Validate for 製品マスタ; InnoDB free: 0 kB
 *
 * @param array $queries
 *
 * @return array
 */
function validate_m_product($queries)
{
    $messages = array();

    // 製品ID
    if (isset($queries['product_id'])) {
        if ($queries['product_id'] === '') {
            $messages[] = 'The 製品ID is required.';
        }
    }

    // 製品名
    if (isset($queries['product_name'])) {
        if ($queries['product_name'] === '') {
            $messages[] = 'The 製品名 is required.';
        }
    }

    // 削除フラグ
    if (isset($queries['delete_flag'])) {
        if ($queries['delete_flag'] === '') {
            $messages[] = 'The 削除フラグ is required.';
        }
    }

    // 作成ユーザー
    if (isset($queries['created_by'])) {
        if ($queries['created_by'] === '') {
            $messages[] = 'The 作成ユーザー is required.';
        }
    }

    // 作成日時
    if (isset($queries['create_at'])) {
    }

    // 更新ユーザー
    if (isset($queries['updated_by'])) {
        if ($queries['updated_by'] === '') {
            $messages[] = 'The 更新ユーザー is required.';
        }
    }

    // 更新日時
    if (isset($queries['updated_at'])) {
    }

    return $messages;
}

/**
 * Default for 製品マスタ; InnoDB free: 0 kB
 *
 * @return array
 */
function default_m_product()
{
    return array(
        'product_id'   => 0,
        'product_name' => '',
        'delete_flag'  => 0,
        'created_by'   => 0,
        'create_at'    => null,
        'updated_by'   => 0,
        'updated_at'   => null,
    );
}
