<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'location-voiture-wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%X  nv.f:BUM~|!x%YyO/*(BuveFp|eakhq!->v]!.ar`];TqF%Iqfg`TY%s9a%v' );
define( 'SECURE_AUTH_KEY',  '>%MSE!D9R7fL4DUil]nYU`9V9| EWa0V]4Veb$Mc9(ALUq#Vp?E_0a g|NMp#jDt' );
define( 'LOGGED_IN_KEY',    ' 9J&T{2.<J7>tXtreI>PL*1MTk;,d`m~{E,u_>i[XdksYEGA=7@B;z_oVuBw9`lz' );
define( 'NONCE_KEY',        'yHzx:py 2WG/neyzEf|pW3jEy,@?*6: ]FeG%Jzy^=!lO.i@6XhLhDv<kL(<UR{j' );
define( 'AUTH_SALT',        '2uqvo$lCdvLM:I}1isC}Sb eEGD&. :V_d8Mxh+}V`[&`)RdkAfsyKeyE8h9aLR.' );
define( 'SECURE_AUTH_SALT', '-+Y3e-WX}uwZ @PemeKKl(@JJD- (.m><uwJJ~bMG[%C^:|}:Qn=l%W+/XfEcn{}' );
define( 'LOGGED_IN_SALT',   '/-V:JJm2E-4dEd2v$Zp ^.7D*(K)C)}Heri<nY;iJtpRI%3xDyV<uc=Dk%:E2xw4' );
define( 'NONCE_SALT',       'o?sd[zc26lEHbQ)}6@G0Rx^]X~=KkY[QR>h4_SJ/e{M^eyg3JakqD9N.30q_cP(i' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define( 'FS_METHOD', 'direct' );
