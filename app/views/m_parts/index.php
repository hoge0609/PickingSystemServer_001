<?php import('app/views/header.php') ?>

        <h2>部品マスタ; InnoDB free: 0 kB</h2>
        <ul>
            <li><a href="<?php t(MAIN_FILE) ?>/m_parts/post">post</a></li>
        </ul>
        <table summary="部品マスタ; InnoDB free: 0 kB">
            <tr>
                <th>部品ID</th>
                <th>部品名</th>
                <th>削除フラグ</th>
                <th>作成ユーザー</th>
                <th>作成日時</th>
                <th>更新ユーザー</th>
                <th>更新日時</th>
            </tr>
            <?php foreach ($_view['m_parts'] as $data) : ?>
            <tr>
                <td><?php h($data['parts_id']) ?></td>
                <td><?php h($data['parts_name']) ?></td>
                <td><?php h($data['delete_flag']) ?></td>
                <td><?php h($data['created_by']) ?></td>
                <td><?php h($data['create_at']) ?></td>
                <td><?php h($data['updated_by']) ?></td>
                <td><?php h($data['updated_at']) ?></td>
            </tr>
            <?php endforeach ?>
        </table>

<?php import('app/views/footer.php') ?>
