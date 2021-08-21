<?php

/**
 * Validate for 部品在庫履歴テーブル; InnoDB free: 0 kB
 *
 * @param array $queries
 *
 * @return array
 */
function validate_t_parts_inventory_history($queries)
{
    $messages = array();

    // 部品在庫履歴ID
    if (isset($queries['parts_inventory_history_id'])) {
        if ($queries['parts_inventory_history_id'] === '') {
            $messages[] = 'The 部品在庫履歴ID is required.';
        }
    }

    // 部品ID
    if (isset($queries['parts_id'])) {
        if ($queries['parts_id'] === '') {
            $messages[] = 'The 部品ID is required.';
        }
    }

    // 製品ID
    if (isset($queries['product_id'])) {
    }

    // デバイスID
    if (isset($queries['device_id'])) {
    }

    // 在庫登録種別ID
    if (isset($queries['inventory_regist_type_id'])) {
        if ($queries['inventory_regist_type_id'] === '') {
            $messages[] = 'The 在庫登録種別ID is required.';
        }
    }

    // 変動数
    if (isset($queries['variable_count'])) {
        if ($queries['variable_count'] === '') {
            $messages[] = 'The 変動数 is required.';
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
 * Default for 部品在庫履歴テーブル; InnoDB free: 0 kB
 *
 * @return array
 */
function default_t_parts_inventory_history()
{
    return array(
        'parts_inventory_history_id' => 0,
        'parts_id'                   => 0,
        'product_id'                 => null,
        'device_id'                  => null,
        'inventory_regist_type_id'   => 0,
        'variable_count'             => 0,
        'delete_flag'                => 0,
        'created_by'                 => 0,
        'create_at'                  => null,
        'updated_by'                 => 0,
        'updated_at'                 => null,
    );
}
