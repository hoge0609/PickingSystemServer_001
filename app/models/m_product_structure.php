<?php

/**
 * Validate for 製品構成マスタ; InnoDB free: 0 kB
 *
 * @param array $queries
 *
 * @return array
 */
function validate_m_product_structure($queries)
{
    $messages = array();

    // 製品ID
    if (isset($queries['product_id'])) {
        if ($queries['product_id'] === '') {
            $messages[] = 'The 製品ID is required.';
        }
    }

    // 部品ID
    if (isset($queries['parts_id'])) {
        if ($queries['parts_id'] === '') {
            $messages[] = 'The 部品ID is required.';
        }
    }

    // 部品数
    if (isset($queries['parts_count'])) {
        if ($queries['parts_count'] === '') {
            $messages[] = 'The 部品数 is required.';
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
 * Default for 製品構成マスタ; InnoDB free: 0 kB
 *
 * @return array
 */
function default_m_product_structure()
{
    return array(
        'product_id'  => 0,
        'parts_id'    => 0,
        'parts_count' => 0,
        'delete_flag' => 0,
        'created_by'  => 0,
        'create_at'   => null,
        'updated_by'  => 0,
        'updated_at'  => null,
    );
}
