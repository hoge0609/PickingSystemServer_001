<?php

/**
 * Validate for ユーザーマスタ; InnoDB free: 0 kB
 *
 * @param array $queries
 *
 * @return array
 */
function validate_m_user($queries)
{
    $messages = array();

    // ユーザーID
    if (isset($queries['user_id'])) {
        if ($queries['user_id'] === '') {
            $messages[] = 'The ユーザーID is required.';
        }
    }

    // ユーザー名
    if (isset($queries['user_name'])) {
        if ($queries['user_name'] === '') {
            $messages[] = 'The ユーザー名 is required.';
        }
    }

    // ログインID
    if (isset($queries['login_id'])) {
        if ($queries['login_id'] === '') {
            $messages[] = 'The ログインID is required.';
        }
    }

    // ログインパスワード
    if (isset($queries['login_password'])) {
        if ($queries['login_password'] === '') {
            $messages[] = 'The ログインパスワード is required.';
        }
    }

    // 管理者フラグ
    if (isset($queries['administrator_flag'])) {
        if ($queries['administrator_flag'] === '') {
            $messages[] = 'The 管理者フラグ is required.';
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
 * Default for ユーザーマスタ; InnoDB free: 0 kB
 *
 * @return array
 */
function default_m_user()
{
    return array(
        'user_id'            => 0,
        'user_name'          => '',
        'login_id'           => '',
        'login_password'     => '',
        'administrator_flag' => 0,
        'delete_flag'        => 0,
        'created_by'         => 0,
        'create_at'          => null,
        'updated_by'         => 0,
        'updated_at'         => null,
    );
}
