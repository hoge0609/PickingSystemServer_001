<?php import('app/views/header.php') ?>

        <h2>製品構成マスタ; InnoDB free: 0 kB</h2>
        <form action="<?php t(MAIN_FILE) ?>/m_product_structure/post" method="post">
            <fieldset>
                <legend>製品構成マスタ; InnoDB free: 0 kB</legend>
                <dl>
                    <dt>製品ID(required)</dt>
                        <dd><input type="text" name="product_id" size="10" value="<?php t($_view['data']['product_id']) ?>"></dd>
                    <dt>部品ID(required)</dt>
                        <dd><input type="text" name="parts_id" size="10" value="<?php t($_view['data']['parts_id']) ?>"></dd>
                    <dt>部品数(required)</dt>
                        <dd><input type="text" name="parts_count" size="10" value="<?php t($_view['data']['parts_count']) ?>"></dd>
                    <dt>削除フラグ(required)</dt>
                        <dd><input type="text" name="delete_flag" size="10" value="<?php t($_view['data']['delete_flag']) ?>"></dd>
                    <dt>作成ユーザー(required)</dt>
                        <dd><input type="text" name="created_by" size="10" value="<?php t($_view['data']['created_by']) ?>"></dd>
                    <dt>作成日時</dt>
                        <dd><input type="text" name="create_at" size="10" value="<?php t($_view['data']['create_at']) ?>"></dd>
                    <dt>更新ユーザー(required)</dt>
                        <dd><input type="text" name="updated_by" size="10" value="<?php t($_view['data']['updated_by']) ?>"></dd>
                    <dt>更新日時</dt>
                        <dd><input type="text" name="updated_at" size="10" value="<?php t($_view['data']['updated_at']) ?>"></dd>
                </dl>
                <p><input type="submit" value="post"></p>
            </fieldset>
        </form>

<?php import('app/views/footer.php') ?>
