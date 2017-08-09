<?php
define('WP_AUTO_UPDATE_CORE', false);// This setting was defined by WordPress Toolkit to prevent WordPress auto-updates. Do not change it to avoid conflicts with the WordPress Toolkit auto-updates feature.
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
define('DB_NAME', 'artmashina');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '1234');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9D<[.EoS?<i7/GPh`vPSTC6L;G8;UIH1IR$7OGu6y%i>/9sh0=z++}0B%!,b]UH1');
define('SECURE_AUTH_KEY',  'mq{ bm -?7 5J*UVBL[3`>@j7kPi C#nL qE_HSv8D>wGoxlZ3Ab8B%~<B7OAZvt');
define('LOGGED_IN_KEY',    ']&z,V1jq*#J0hsy{@[gpa22$Y2ouaQOhU 3&_u6es@IAMo:slyLo&E76dkkic^O2');
define('NONCE_KEY',        'N/D^UN-nety$][|26pU8UQgJ$m~!{:i!2RMdTmHZ8o(>vKfq`bLJelfBkB-B](4I');
define('AUTH_SALT',        'E6 ]07S%Qz 4imQf:q^5ptI*W`m[zgVyolv!ClE}S:Nm&w<^43(jOD%OH>QPQ#n[');
define('SECURE_AUTH_SALT', 'Xo9Z!?vT_~XTT);u$H1pEw@7fS4+*X`H`j^$Wx{bRM*Jd`al6mUn,*shq87.oy:i');
define('LOGGED_IN_SALT',   '(KV]Q%Cm.M&X70%ykujvsr8viR9p=+E- CFK#}&g}CW=?^R|L[OvY@[K]W!^}/5I');
define('NONCE_SALT',       'HalR7LoT9avX&vy (SkO;lT3*@VBO|?8CRuL<}0K<>P/FMf8^Sf%k9eEE$|@5s8%');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'en_';

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
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
