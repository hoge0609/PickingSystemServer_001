<?php import('app/views/header.php') ?>

        <h2>ユーザーマスタ; InnoDB free: 0 kB</h2>
        <form action="<?php t(MAIN_FILE) ?>/m_user/post" method="post">
            <fieldset>
                <legend>ユーザーマスタ; InnoDB free: 0 kB</legend>
                <dl>
                    <dt>ユーザーID(required)</dt>
                        <dd><input type="text" name="user_id" size="10" value="<?php t($_view['data']['user_id']) ?>"></dd>
                    <dt>ユーザー名(required)</dt>
                        <dd><input type="text" name="user_name" size="30" value="<?php t($_view['data']['user_name']) ?>"></dd>
                    <dt>ログインID(required)</dt>
                        <dd><input type="text" name="login_id" size="30" value="<?php t($_view['data']['login_id']) ?>"></dd>
                    <dt>ログインパスワード(required)</dt>
                        <dd><input type="text" name="login_password" size="30" value="<?php t($_view['data']['login_password']) ?>"></dd>
                    <dt>管理者フラグ(required)</dt>
                        <dd><input type="text" name="administrator_flag" size="10" value="<?php t($_view['data']['administrator_flag']) ?>"></dd>
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
