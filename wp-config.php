<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/data/www/xiexiefa/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'xiexiefa');

/** MySQL数据库用户名 */
define('DB_USER', 'wordpress');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'fds82390u');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';JFY+nl$o^qoWpgdo: ~7V|D@|-}J-=s;_~l(:s}A8|>3cY~5[~Q(%g1fEua Kdm');
define('SECURE_AUTH_KEY',  'J$--8%-V_z,|F!U~)o-l{zOAz;(w>l[f3]NkpZ*31=A?#kg=SJ=ym-+N3$m)-V;.');
define('LOGGED_IN_KEY',    'bwN,p.=]F*~1`2=8WI+6;+ek@S5#KOMo]2PC,|Ur<:t(U|2z)W4dzDE:F.S^NUa`');
define('NONCE_KEY',        '3{-qQ xCsEf+6q~]0faRX!tqt]C%_o!DffoL|}FMQOM_`n:uqyiV5N|o *YAO9(2');
define('AUTH_SALT',        '[B,L~E^G_#{/Ut;{Yqc9dx#{]|/-uCuG?2`~~CW8~Hn$Mv(*Va@{~`;<[^uh$@B|');
define('SECURE_AUTH_SALT', '+Iu@>f$G({Ft_woTz+CazD71[:]K9PPAQNe;WAI!G[bR~E-1z#&uuF[~1$W9)RN^');
define('LOGGED_IN_SALT',   '-h;Dqyh+&#HlwosbTjN}>^qa2ld,o[4,Wgxb:RZ0g={8+{DpKYeO0N5Kgkob+7,W');
define('NONCE_SALT',       'wt<6x+U:;4NB4EYJ!:A$; |F0R#D$?@H6Z[E]U2u| o}ho*y9wYOn<yg%^@z!O6n');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
