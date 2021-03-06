<?php

/*******************************************************************************

 levis: Configuration File

*******************************************************************************/

/********* Main ***************************************************************/

define('MAIN_FILE', $_SERVER['SCRIPT_NAME']);
define('MAIN_LIBRARY_PATH', '');
define('MAIN_APPLICATION_PATH', '');
define('MAIN_DEFAULT_MODE', 'home');
define('MAIN_DEFAULT_WORK', 'index');
define('MAIN_INTERNAL_ENCODING', 'UTF-8');
define('MAIN_CHARSET', 'utf-8');
define('MAIN_TIME', 0);

/********* Database ***********************************************************/

define('DATABASE_TYPE', 'pdo_mysql');
define('DATABASE_PORT', '');
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // ローカル環境
    define('DATABASE_HOST', 'localhost');
    define('DATABASE_USERNAME', 'root');
    define('DATABASE_PASSWORD', '');
} else {
    // 本番環境
    define('DATABASE_HOST', 'mysql1.php.xdomain.ne.jp');
    define('DATABASE_USERNAME', 'hoge0609_user');
    define('DATABASE_PASSWORD', 'password2021');
}
define('DATABASE_NAME', 'hoge0609_demo001');
define('DATABASE_PREFIX', '');
define('DATABASE_CHARSET', 'UTF8');
define('DATABASE_CHARSET_INPUT_FROM', 'UTF-8');
define('DATABASE_CHARSET_INPUT_TO', 'UTF-8');
define('DATABASE_CHARSET_OUTPUT_FROM', 'UTF-8');
define('DATABASE_CHARSET_OUTPUT_TO', 'UTF-8');
define('DATABASE_MIGRATE_PATH', 'migrate/');
define('DATABASE_SCAFFOLD_PATH', 'scaffold/');
define('DATABASE_BACKUP_PATH', 'backup/');

/********* Session ************************************************************/

define('SESSION_AUTOSTART', true);
define('SESSION_LIFETIME', 0);
define('SESSION_PATH', dirname($_SERVER['SCRIPT_NAME']));
define('SESSION_CACHE', 'none');

/********* Token **************************************************************/

define('TOKEN_SPAN', 60 * 60);

/********* Regexp *************************************************************/

define('REGEXP_TYPE', 'preg');

/********* Page ***************************************************************/

define('PAGE_PATH', 'page/');
define('PAGE_CONTROLLER', 'page');

/********* Test ***************************************************************/

define('TEST_PATH', 'test/');

/********* Debug **************************************************************/

define('DEBUG_LEVEL', 1);
define('DEBUG_PASSWORD', '');
define('DEBUG_ADDR', '');

/********* Logging ************************************************************/

define('LOGGING_PATH', 'log/');
define('LOGGING_MESSAGE', false);
define('LOGGING_GET', false);
define('LOGGING_POST', false);
define('LOGGING_FILES', false);
