<?php

/**
 * Validate for 部品マスタ; InnoDB free: 0 kB
 *
 * @param array $queries
 *
 * @return array
 */
function validate_m_parts($queries)
{
    $messages = array();

    // 部品ID
    if (isset($queries['parts_id'])) {
        if ($queries['parts_id'] === '') {
            $messages[] = 'The 部品ID is required.';
        }
    }

    // 部品名
    if (isset($queries['parts_name'])) {
        if ($queries['parts_name'] === '') {
            $messages[] = 'The 部品名 is required.';
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
 * Default for 部品マスタ; InnoDB free: 0 kB
 *
 * @return array
 */
function default_m_parts()
{
    return array(
        'parts_id'    => 0,
        'parts_name'  => '',
        'delete_flag' => 0,
        'created_by'  => 0,
        'create_at'   => null,
        'updated_by'  => 0,
        'updated_at'  => null,
    );
}
