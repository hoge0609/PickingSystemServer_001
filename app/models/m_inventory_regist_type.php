<?php

/**
 * Validate for 在庫登録種別マスタ; InnoDB free: 0 kB
 *
 * @param array $queries
 *
 * @return array
 */
function validate_m_inventory_regist_type($queries)
{
    $messages = array();

    // 在庫登録種別ID
    if (isset($queries['inventory_regist_type_id'])) {
        if ($queries['inventory_regist_type_id'] === '') {
            $messages[] = 'The 在庫登録種別ID is required.';
        }
    }

    // 在庫登録種別名
    if (isset($queries['inventory_regist_type_name'])) {
        if ($queries['inventory_regist_type_name'] === '') {
            $messages[] = 'The 在庫登録種別名 is required.';
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
 * Default for 在庫登録種別マスタ; InnoDB free: 0 kB
 *
 * @return array
 */
function default_m_inventory_regist_type()
{
    return array(
        'inventory_regist_type_id'   => 0,
        'inventory_regist_type_name' => '',
        'delete_flag'                => 0,
        'created_by'                 => 0,
        'create_at'                  => null,
        'updated_by'                 => 0,
        'updated_at'                 => null,
    );
}
