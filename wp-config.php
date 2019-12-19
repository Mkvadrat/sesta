<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'mkvadrat_sesta' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'mkvadrat_sesta' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'xDS0nfB2' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=7{= 1Mm)!HpB2k1A%>FMBa@xwIa,:j:@ras#)N!FkKO7Is)kL7.mv6FvRy^4$Gs' );
define( 'SECURE_AUTH_KEY',  'ys2#/yz0m~^l8KMP~m9~2|[C3q*;(gR27*[L>H&1?5>%O~kV[O`J5ISNMX83:}|0' );
define( 'LOGGED_IN_KEY',    '=BK%7sJ/9Z,}-&f<urWc@Y4AfIKTNF&42b$_o$QCUeXXd]W& ^GBum<W_`E{>te(' );
define( 'NONCE_KEY',        '8GZxVL3SNu{2v%hi}CT::QE9~64R}*6?t`eqo;(DsS<(LV]lLZlbA-G|a7]$u{p`' );
define( 'AUTH_SALT',        'R0E-&1pSX[z/oC$S]Y*?T~rF4g&VMTj-f+G~J6EjgvP)_4?*`JWs4=j:^l7uJ!M=' );
define( 'SECURE_AUTH_SALT', '{q{`kdI;FVN|,TTxQ`%(]`DG8lHN{,{h1{qXc@eGLDyu9u8>; OQ%*E~Aj}JYeuj' );
define( 'LOGGED_IN_SALT',   '/Fu0cR>[m~rurvu;qK[79(g9rNmE;ISHCB#)8vRJA4$qZY_PK*Oi`hE(,Gpya~2:' );
define( 'NONCE_SALT',       'loc|gx^v`^v9d4ak3_FN<CN9^Gf#Xmm#ndoQ>;0U6i/0 [p`3>!;5eoJnIl6zu31' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
