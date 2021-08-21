<?php import('app/views/header.php') ?>

        <h2>在庫登録種別マスタ; InnoDB free: 0 kB</h2>
        <ul>
            <li><a href="<?php t(MAIN_FILE) ?>/m_inventory_regist_type/post">post</a></li>
        </ul>
        <table summary="在庫登録種別マスタ; InnoDB free: 0 kB">
            <tr>
                <th>在庫登録種別ID</th>
                <th>在庫登録種別名</th>
                <th>削除フラグ</th>
                <th>作成ユーザー</th>
                <th>作成日時</th>
                <th>更新ユーザー</th>
                <th>更新日時</th>
            </tr>
            <?php foreach ($_view['m_inventory_regist_type'] as $data) : ?>
            <tr>
                <td><?php h($data['inventory_regist_type_id']) ?></td>
                <td><?php h($data['inventory_regist_type_name']) ?></td>
                <td><?php h($data['delete_flag']) ?></td>
                <td><?php h($data['created_by']) ?></td>
                <td><?php h($data['create_at']) ?></td>
                <td><?php h($data['updated_by']) ?></td>
                <td><?php h($data['updated_at']) ?></td>
            </tr>
            <?php endforeach ?>
        </table>

<?php import('app/views/footer.php') ?>
