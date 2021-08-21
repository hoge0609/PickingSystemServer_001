<?php import('app/views/header.php') ?>

        <h2>ユーザーマスタ; InnoDB free: 0 kB</h2>
        <ul>
            <li><a href="<?php t(MAIN_FILE) ?>/m_user/post">post</a></li>
        </ul>
        <table summary="ユーザーマスタ; InnoDB free: 0 kB">
            <tr>
                <th>ユーザーID</th>
                <th>ユーザー名</th>
                <th>ログインID</th>
                <th>ログインパスワード</th>
                <th>管理者フラグ</th>
                <th>削除フラグ</th>
                <th>作成ユーザー</th>
                <th>作成日時</th>
                <th>更新ユーザー</th>
                <th>更新日時</th>
            </tr>
            <?php foreach ($_view['m_user'] as $data) : ?>
            <tr>
                <td><?php h($data['user_id']) ?></td>
                <td><?php h($data['user_name']) ?></td>
                <td><?php h($data['login_id']) ?></td>
                <td><?php h($data['login_password']) ?></td>
                <td><?php h($data['administrator_flag']) ?></td>
                <td><?php h($data['delete_flag']) ?></td>
                <td><?php h($data['created_by']) ?></td>
                <td><?php h($data['create_at']) ?></td>
                <td><?php h($data['updated_by']) ?></td>
                <td><?php h($data['updated_at']) ?></td>
            </tr>
            <?php endforeach ?>
        </table>

<?php import('app/views/footer.php') ?>
