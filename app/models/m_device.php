<?php

/**
 * Validate for デバイスマスタ; InnoDB free: 0 kB
 *
 * @param array $queries
 *
 * @return array
 */
function validate_m_device($queries)
{
    $messages = array();

    // デバイスID
    if (isset($queries['device_id'])) {
        if ($queries['device_id'] === '') {
            $messages[] = 'The デバイスID is required.';
        }
    }

    // デバイス名
    if (isset($queries['device_name'])) {
        if ($queries['device_name'] === '') {
            $messages[] = 'The デバイス名 is required.';
        }
    }

    // ユーザーID
    if (isset($queries['user_id'])) {
        if ($queries['user_id'] === '') {
            $messages[] = 'The ユーザーID is required.';
        }
    }

    // MACアドレス
    if (isset($queries['mac_address'])) {
        if ($queries['mac_address'] === '') {
            $messages[] = 'The MACアドレス is required.';
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
 * Default for デバイスマスタ; InnoDB free: 0 kB
 *
 * @return array
 */
function default_m_device()
{
    return array(
        'device_id'   => 0,
        'device_name' => '',
        'user_id'     => 0,
        'mac_address' => '',
        'delete_flag' => 0,
        'created_by'  => 0,
        'create_at'   => null,
        'updated_by'  => 0,
        'updated_at'  => null,
    );
}
